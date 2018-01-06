<?php
include "base.php";

$_SESSION = array();
session_destroy();
$_SESSION['UsernameLIM'] = '';
header("location: home");
?>
