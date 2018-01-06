<?php
$debug = 'n';
include "base.php";

if($numUSER == 1){
  header('Content-Type: application/json');

  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
  
  // check connection
  if($conn->connect_error){ }
  $sql = "SELECT * FROM MY_timetable WHERE Username = '$USER_APP_USERNAME' ORDER BY day_of_week, hour_of_day";

  $rs = $conn->query($sql);

  if($rs === false){ }else{
    $rows_returned = $rs->num_rows;
  }
  $rs->data_seek(0);
  $num = $rs->num_rows;

  if($num == 0){
    $array[] = array("id" => "", "name" => "", "color" => "");
  }else{
    while($row = $rs->fetch_assoc()){
      $TIMETABLE_day_num = $row['day_of_week'];
      $TIMETABLE_subject = $row['subject'];
      $TIMETABLE_fore_color = $row['fore_color'];
      $TIMETABLE_hour_of_day = $row['hour_of_day'];
      $TIMETABLE_book = $row['book'];
      $TIMETABLE_id = $row['id'];
      
      $GENERAL_id = $TIMETABLE_id;
      $GENERAL_name = $TIMETABLE_subject;
      
      if($_GET['SQL_type'] == 'timetable_subject' and $TIMETABLE_fore_color == ''){
	$TIMETABLE_fore_color = '#000000';
      }
      if($TIMETABLE_day_num == '1'){
	$TIMETABLE_day_text = 'Luned&igrave;';
      }elseif($TIMETABLE_day_num == '2'){
	$TIMETABLE_day_text = 'Marted&igrave;';
      }elseif($TIMETABLE_day_num == '3'){
	$TIMETABLE_day_text = 'Mercoled&igrave;';
      }elseif($TIMETABLE_day_num == '4'){
	$TIMETABLE_day_text = 'Gioved&igrave;';
      }elseif($TIMETABLE_day_num == '5'){
	$TIMETABLE_day_text = 'Venerd&igrave;';
      }elseif($TIMETABLE_day_num == '6'){
	$TIMETABLE_day_text = 'Sabato';
      }elseif($TIMETABLE_day_num == '7'){
	$TIMETABLE_day_text = 'Domenica';
      }else{
	$TIMETABLE_day_text = 'Errore';
      }
      
      if($TIMETABLE_day_text != $day_list){
	$array[] = array("id" => 0, "name" => "$TIMETABLE_day_text", "color" => "DAY");
      }
	    
      $array[] = array("id" => $TIMETABLE_id, "name" => "$TIMETABLE_subject", "color" => "$TIMETABLE_fore_color");
      $day_list = $TIMETABLE_day_text;
    }
    
    print('{"Timetable":'.json_encode($array).'}');
  }
}else{
  echo("Authentication Error");
}
?>