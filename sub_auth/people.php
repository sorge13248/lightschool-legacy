<?php
$debug = 'n';
include "base.php";

if($numUSER == 1){
  header('Content-Type: application/json');

  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

  // check connection
  if($conn->connect_error){ }
  $USER_APP_USERNAME = $conn->real_escape_string($USER_APP_USERNAME);
  if($_GET['tab'] == 'contacts'){
    $sql = "SELECT * FROM MY_peoples WHERE Username = '$USER_APP_USERNAME' AND NOT saved_username = '' ORDER BY name, surname";
  }elseif($_GET['tab'] == 'groups'){
    $sql = "SELECT * FROM MY_peoples WHERE Username = '$USER_APP_USERNAME' AND NOT group_username = '' ORDER BY surname, name";
  }

  $rs = $conn->query($sql);

  if($rs === false){ }else{
    $rows_returned = $rs->num_rows;
  }
  $rs->data_seek(0);
  $num = $rs->num_rows;

  if($num == 0){
    $array[] = array("id" => "empty", "name" => "", "img" => "", "saved_username" => "");
  }else{
    while($row = $rs->fetch_assoc()){
      $GENERAL_id = $row['id'];
      $GENERAL_name = $row['name'];
      $GENERAL_surname = $row['surname'];
      $GENERAL_saved_username = $row['saved_username'];
      $GENERAL_group_username = $row['group_username'];
      
      if($GENERAL_saved_username != ''){
	$IMG = lightschool_get_user($GENERAL_saved_username, 'profile_image');
      }
      if($GENERAL_group_username != ''){
	$GENERAL_saved_username = $GENERAL_group_username;
      }
      
      $array[] = array("id" => "$GENERAL_id", "name" => "$GENERAL_name $GENERAL_surname", "img" => "$IMG", "saved_username" => "$GENERAL_saved_username");
    }
  }
  
  print('{"People":'.json_encode($array).'}');
}else{
  echo("Authentication error");
}
?>