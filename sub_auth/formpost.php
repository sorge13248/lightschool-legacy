<?php
$debug = 'n';
include "base.php";

if($debug == 'y'){
  $_POST['user_share'] = 'fsorge';
  $_POST['fileID'] = '2187';
}
if($numUSER == 1){
  if($_GET['type'] == 'start_share'){
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if($conn->connect_error){ }
    $user_share = $conn->real_escape_string($_POST['user_share']);
    $fileID = $conn->real_escape_string($_POST['fileID']);
    $sql="SELECT * FROM MY_users WHERE Username = '$user_share' AND deactivated = 'n' LIMIT 1";
    $rs = $conn->query($sql);

    if($rs === false){ }else{
      $rows_returned = $rs->num_rows;
    }
    $rs->data_seek(0);
    $num = $rs->num_rows;

    if($num == 1){
      $conn3 = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
      
      if(mysqli_connect_errno()){
	echo('false');
	exit();
      }
      
      $sql3="SELECT * FROM MY_files WHERE Username = '$USER_APP_USERNAME' AND id = '$fileID' LIMIT 1";
      $rs3=$conn3->query($sql3);

      if($rs3 === false){
	trigger_error('Errore SQL: ' . $sql3 . ' Errore: ' . $conn3->error, E_USER_ERROR);
      }else{
	$rows_returned3 = $rs3->num_rows;
      }
      $rs3->data_seek(0);
      $num3 = $rs3->num_rows;

      if($num3 == 1){
	$conn4 = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	
	if(mysqli_connect_errno()){
	  echo('false');
	  exit();
	}
	$user_share_id = lightschool_get_user($user_share, 'id');
	$sql4="INSERT INTO MY_share (Sender, Receiving, file_id, share_date) VALUES ('$USER_APP_UserID', '$user_share_id', '$fileID', '$date_now_IT')";
	$rs4=$conn4->query($sql4);
	echo('{"Formpost":['.json_encode(array("response" => "true")).']}');

	if($rs4 === false){
	  trigger_error('Errore SQL: ' . $sql4 . ' Errore: ' . $conn4->error, E_USER_ERROR);
	}else{
	  $rows_returned4 = $rs4->num_rows;
	}
	$rs4->data_seek(0);
	
	$num4 = $rs4->num_rows;
	$conn4->close();
	
      
      }else{
	echo('{"Formpost":['.json_encode(array("response" => "false1")).']}');
      }
    }else{
      echo('{"Formpost":['.json_encode(array("response" => "false2")).']}');
    }
  }
}else{
  echo("Authentication error");
}
?>