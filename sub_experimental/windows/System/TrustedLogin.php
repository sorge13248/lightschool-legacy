<?php
  $ALLOW_STRANGER = true; $NO_STYLE = true; $NO_SCRIPT = true; $NO_TOUCH = true; $NO_TEXT = true;
  include_once "Core.php";
  
  if($_SESSION['Trusted_Username']){
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
    $response = $LightSchool->request_string_database("TrustedLogin", "UniKey", $_SESSION['Trusted_Username']);
    
    if($response === $_POST['code']){
      $sql = "UPDATE MY_users SET UniKey = '' WHERE Username = '".$_SESSION['Trusted_Username']."' LIMIT 1";
      $rs = $conn->query($sql);
	    
      $_SESSION['Username'] = $_SESSION['Trusted_Username'];
      $_SESSION['Trusted_Username'] = "";
      
      echo("true");
    }else{
      echo("Codice non valido. Riprovare.");
    }
  }
?>