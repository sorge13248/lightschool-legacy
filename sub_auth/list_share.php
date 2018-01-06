<?php
$debug = 'n';
include "base.php";

if($numUSER == 1){
  header('Content-Type: application/json');

  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

  // check connection
  if($conn->connect_error){ }
  $ESCAPE_id = $conn->real_escape_string($_GET['id']);
  $sql = "SELECT * FROM MY_share WHERE Sender = '$USER_APP_UserID' AND file_id = '$ESCAPE_id' ORDER BY id DESC";

  $rs = $conn->query($sql);

  if($rs === false){ }else{
    $rows_returned = $rs->num_rows;
  }
  $rs->data_seek(0);
  $num = $rs->num_rows;

  if($num == 0){
    $array[] = array("id" => "empty", "user" => "", "date" => "");
  }else{
    while($row = $rs->fetch_assoc()){
      $SHARE_id = $row['id'];
      $SHARE_receiving = $row['Receiving'];
      $SHARE_date = $row['share_date'];
      
      $complete = lightschool_get_user($SHARE_receiving, 'id_to_complete');
      
      $array[] = array("id" => "$SHARE_id", "user" => "$complete", "date" => "$SHARE_date");
    }
  }
  print('{"List_share":'.json_encode($array).'}');
}else{
  echo("Authentication error");
}
?>