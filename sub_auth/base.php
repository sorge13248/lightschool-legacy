<?php
  $NO_LANGUAGE_SELECT = true;
  include_once "ABSOLUTE_PATH_TO_PUBLIC_HTML/Subdomains/LightSchool/System/Core.php";
  
$DEBUG_general = 'n';

if($debug == 'y' or $DEBUG_general == 'y'){
  $_POST['EmailAddress'] = $_POST['email'] = '';
  $_POST['Password'] = $_POST['password'] = '';
}
if($_GET["email"]){
  $_POST['EmailAddress'] = $_POST['email'] = $_GET["email"];
}
if($_GET["password"]){
  $_POST['Password'] = $_POST['password'] = $_GET["password"];
}

$DBServer = 'localhost';
$DBUser   = 'DB_USER_VALUE';
$DBPass   = 'DB_PASSWORD_VALUE';
$DBName   = 'DB_DATABASE_VALUE';

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

// check connection
if ($conn->connect_error) {
}
$POSTEMAILESCAPE = $conn->real_escape_string($_POST['EmailAddress']);
$POSTPASSWORD = $conn->real_escape_string(md5($_POST['Password']));
$sql="SELECT * FROM MY_users WHERE EmailAddress = '$POSTEMAILESCAPE' AND Password = '$POSTPASSWORD' LIMIT 1";

$rs=$conn->query($sql);

if($rs === false){

} else {
  $rows_returned = $rs->num_rows;
}
$rs->data_seek(0);
$numUSER = $rs->num_rows;

if($numUSER == '1'){
  while($row = $rs->fetch_assoc()){
    $USER_APP_USERNAME = $row['Username'];
    $USER_APP_UserID = $row['UserID'];
    
    $date_now_IT = date("d/m/Y H:i:s");
  }
  include_once "user_system.php";
}
$FILES_ORDER_TEXT = "(CASE WHEN type = 'folder' THEN '1' WHEN type = 'file' THEN '2' WHEN type = 'notebook' THEN '2' WHEN type = 'stuff' THEN '3' ELSE type END), name";
?>