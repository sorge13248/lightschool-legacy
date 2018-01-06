<?php
$debug = 'n';
include "base.php";

if($numUSER == 1){
  header('Content-Type: application/json');

  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

  // check connection
  if($conn->connect_error){ }
  $USER_APP_USERNAME = $conn->real_escape_string($USER_APP_USERNAME);
  $sql = "SELECT * FROM MY_messages WHERE (Receiving = '$USER_APP_USERNAME' OR Sender = '$USER_APP_USERNAME') ORDER BY id DESC";

  $rs = $conn->query($sql);

  if($rs === false){ }else{
    $rows_returned = $rs->num_rows;
  }
  $rs->data_seek(0);
  $num = $rs->num_rows;

  if($num == 0){
    $array[] = array("id" => "empty", "other_user" => "", "other_user_name" => "", "other_user_image" => "", "date" => "");
  }else{
    $MESSAGES_people_array = array();
    
    while($row = $rs->fetch_assoc()){
      $MESSAGES_sender = $row['Sender'];
      $MESSAGES_receiving = $row['Receiving'];
      $MESSAGES_subject = $row['subject'];
      $MESSAGES_body = $row['body'];
      $MESSAGES_date = $row['date'];
      $MESSAGES_is_read = $row['is_read'];
      $MESSAGES_id = $row['id'];
      
      if($MESSAGES_sender == $USER_APP_USERNAME){
	$other_user = $MESSAGES_receiving;
	$other_user_type = 'destinatario';
      }elseif($MESSAGES_receiving == $USER_APP_USERNAME){
	$other_user = $MESSAGES_sender;
	$other_user_type = 'mittente';
      }
      
      $IMG = lightschool_get_user($other_user, 'profile_image');
      
      if(lightschool_get_user($other_user, 'name') != 'not_exists'){
	$COMPLETE = lightschool_get_user($other_user, 'name_surname');
	$COMPLETE2 = $COMPLETE;
      }else{
	$COMPLETE2 = 'deactivated';
      }

      if(!in_array("$other_user", $MESSAGES_people_array)){
	$array[] = array("id" => "$MESSAGES_id", "other_user" => "$other_user", "other_user_name" => "$COMPLETE2", "other_user_image" => "$IMG", "date" => "$MESSAGES_date");
      }
      array_push($MESSAGES_people_array, "$other_user");
    }
  }
  print('{"Messages":'.json_encode($array).'}');
}else{
  echo("Authentication error");
}
?>