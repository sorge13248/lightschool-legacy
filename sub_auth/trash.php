<?php
$debug = 'n';
include "base.php";

if($numUSER == 1){
  header('Content-Type: application/json');

  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

  // check connection
  if($conn->connect_error){ }
  $USER_APP_USERNAME = $conn->real_escape_string($USER_APP_USERNAME);
  if($_GET['tab'] == 'files'){
    $sql = "SELECT * FROM MY_files WHERE Username = '$USER_APP_USERNAME' AND (type = 'folder' OR type = 'notebook' OR type = 'file' OR type = 'notebook' OR type = 'stuff') AND history = '' AND trash = 'y' ORDER BY $FILES_ORDER_TEXT";
  }elseif($_GET['tab'] == 'diary'){
    $sql = "SELECT * FROM MY_files WHERE Username = '$USER_APP_USERNAME' AND (type = 'diary') AND trash = 'y' ORDER BY diary_type, name";
  }

  $rs = $conn->query($sql);

  if($rs === false){ }else{
    $rows_returned = $rs->num_rows;
  }
  $rs->data_seek(0);
  $num = $rs->num_rows;

  if($num == 0){
    $array[] = array("id" => "empty", "type" => "", "name" => "", "icon" => "", "file_type" => "", "file_url" => "", "diary_type" => "", "diary_date" => "");
  }else{
    while($row = $rs->fetch_assoc()){
      $GENERAL_id = $row['id'];
      $GENERAL_name = $row['name'];
      if($_GET['tab'] == 'diary'){
	$GENERAL_DIARY_type = $row['diary_type'];
	$GENERAL_DIARY_date = $row['diary_date'];
      }
      $GENERAL_type = $row['type'];
      $GENERAL_icon = $row['icon'];
      $GENERAL_file_type = $row['file_type'];
      $GENERAL_file_url = $row['file_url'];
      
      $array[] = array("id" => "$GENERAL_id", "type" => "$GENERAL_type", "name" => "$GENERAL_name", "icon" => "$GENERAL_icon", "file_type" => "$GENERAL_file_type", "file_url" => "$GENERAL_file_url", "diary_type" => "$GENERAL_DIARY_type", "diary_date" => "$GENERAL_DIARY_date");
    }
  }
  
  print('{"Trash":'.json_encode($array).'}');
}else{
  echo("Authentication error");
}
?>