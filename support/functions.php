<?php
  if($_SESSION['Username'] != ''){
    function lightschool_get_ticket($Username_function, $id_function){
      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

      // check connection
      if ($conn->connect_error) {
      }
      
      $id_function = $conn->real_escape_string($id_function);
      $Username_function = $conn->real_escape_string($Username_function);
      
      $sql="SELECT * FROM SU_messages WHERE (Sender = '$Username_function' OR Receiving = '$Username_function') AND ticket_id = '$id_function'";

      $rs=$conn->query($sql);

      if($rs === false) {
      } else {
	$rows_returned = $rs->num_rows;
      }
      $rs->data_seek(0);
      $num = $rs->num_rows;
      
      if($num == 0){
	return false;
      }else{
	while($row = $rs->fetch_assoc()){
	  $TICKET_id = $row['id'];
	  $TICKET_read = $row['read'];
	  $TICKET_html = $row['html'];
	  $TICKET_date = $row['date'];
	  
	  $return = array($TICKET_id, $TICKET_read, $TICKET_html, $TICKET_date);
	  return $return;
	}
      }
    }
  }
?>