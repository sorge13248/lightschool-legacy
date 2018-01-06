<?php
$debug = 'n';
include "base.php";

if($numUSER == 1){
  header('Content-Type: application/json');

  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
  
  // check connection
  if($conn->connect_error){ }
  $sql = "SELECT * FROM MY_files WHERE Username = '$USER_APP_USERNAME' AND fav = 'y' AND (type = 'notebook' OR type = 'folder' OR type = 'file' OR type = 'stuff') AND history = '' AND NOT trash = 'y' ORDER BY $FILES_ORDER_TEXT";
  $rs = $conn->query($sql);

  if($rs === false){ }else{
    $rows_returned = $rs->num_rows;
  }
  $rs->data_seek(0);
  $num = $rs->num_rows;

  if($num == 0){
    $array[] = array("id" => "empty", "name" => "", "type" => "", "icon" => "", "folder" => "", "file_type" => "", "file_url" => "");
  }else{
    while($row = $rs->fetch_assoc()){
      $FILES_name = $row['name'];
      $FILES_type = $row['type'];
      $FILES_icon = $row['icon'];
      $FILES_folder = $row['folder'];
      $FILES_file_type = $row['file_type'];
      $FILES_file_url = $row['file_url'];
      $FILES_id = $row['id'];
      
      $array[] = array("id" => "$FILES_id", "name" => "$FILES_name", "type" => "$FILES_type", "icon" => "$FILES_icon", "folder" => "$FILES_folder", "file_type" => "$FILES_file_type", "file_url" => "$FILES_file_url");
    }
    
    print('{"Files":'.json_encode($array).'}');
  }
}else{
  echo("Authentication Error");
}
?>