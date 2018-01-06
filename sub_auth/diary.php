<?php
include "base.php";
if($numUSER == '1'){
  header('Content-Type: application/json');

  $hostname_localhost ="localhost";
  $database_localhost ="DB_DATABASE_VALUE";
  $username_localhost ="DB_USER_VALUE";
  $password_localhost ="";
  $localhost = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
  or
  trigger_error(mysql_error(),E_USER_ERROR);
  
  mysql_select_db($database_localhost, $localhost);

  $USER_APP_USERNAME = $conn->real_escape_string($USER_APP_USERNAME);
  $query_search = "SELECT * FROM MY_files WHERE Username = '$USER_APP_USERNAME' AND type = 'diary' AND folder = '/' AND NOT trash = 'y' ORDER BY diary_subject";
  $query_exec = mysql_query($query_search) or die(mysql_error());
  $rows = array();
  while($row = mysql_fetch_assoc($query_exec)) {
      $rows[] = $row;
  }
  print ('{"Diary":'.json_encode($rows).'}');
  //echo $rows;
}else{
  echo("Authentication Error");
}
?>
