<?php
  include_once "base.php";
  
  if($_SESSION['Username'] != ''){
    if($_GET['lang'] != ''){
      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName4);

      // check connection
      if ($conn->connect_error) {
      }
      
      $lang = $conn->real_escape_string($_GET['lang']);
      $sql="SELECT * FROM translations WHERE Username = '".$_SESSION['Username']."' AND language = '$lang' LIMIT 1";
      
      $rs=$conn->query($sql);

      if($rs === false) {
      } else {
	$rows_returned = $rs->num_rows;
      }
      $rs->data_seek(0);
      $num = $rs->num_rows;
      
      if($num == 0){
	$response = false;
      }else{
	while($GENERAL_row = $rs->fetch_assoc()){
	  $array = $GENERAL_row['array'];
	  
	  echo($array);
	}
      }
    }else{
      echo("Bad request.");
    }
  }else{
    echo("You cannot access this page because you're not logged in.");
  }
?>