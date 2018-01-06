<?php
$_GET['only_reference'] = 'true';
include "base.php";
session_start();

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

if (mysqli_connect_errno()) {
  exit();
}

$sql = "UPDATE MY_access SET logged_in = 'n' WHERE Username = '".$_SESSION['Username']."' AND ip = '$ip' LIMIT 1";
$conn->query($sql);

$conn->close();

if($_GET['forget'] == 'y'){
  setcookie("LOGIN_username", "", time() - 3600);
  setcookie("LOGIN_password", "", time() - 3600);
}

$_SESSION['Username'] = '';
session_destroy();
  
header("Location: home");
?>