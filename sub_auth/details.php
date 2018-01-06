<?php
include "base.php";
$debug = 'n';

if($debug == 'y'){
  $numUSER = 1;
  $USER_APP_USERNAME = '';
  $_GET['id'] = "2194";
}

if($numUSER == 1){
  header('Content-Type: application/json');

  $hostname_localhost ="localhost";
  $database_localhost ="DB_DATABASE_VALUE";
  $username_localhost ="DB_USER_VALUE";
  $password_localhost ="";
  $localhost = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
  or
  trigger_error(mysql_error(),E_USER_ERROR);
  
  mysql_select_db($database_localhost, $localhost);

  $query_search = "SELECT * FROM MY_files WHERE Username = '$USER_APP_USERNAME' AND id = '".$_GET['id']."' LIMIT 1";
  $query_exec = mysql_query($query_search) or die(mysql_error());
  $rows = array();
  
  while($row = mysql_fetch_assoc($query_exec)) {
      $rows[] = $row;
  }
  
  print ('{"Files":'.json_encode($rows).'}');
  //echo $rows;
}else{
  echo("Authentication Error");
}
?>
