<?php
  function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
	$randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  include_once "base.php";
  
  $sql = "";
  
  if($_GET['type'] == 'start'){
    if(($_POST['email'] == '' and $_POST['password'] == '' and $_POST['temporary_email'] != '') or ($_POST['email'] != '' and $_POST['password'] != '' and $_POST['temporary_email'] == '')){
      if($_SESSION['Username'] != ''){
	echo("ok_login");
	exit();
      }
      if($_POST['email'] == '' and $_POST['password'] == '' and $_POST['temporary_email'] != ''){
	$email = $_POST['temporary_email'];
	$INCLUDE_MAIL_ACTION = "send_temporary_email";
	$Activation_Code = strtoupper(md5(generateRandomString(15)));
	include_once "mail/send.php";
	
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName4);
	  
	if (mysqli_connect_errno()) {
	  echo('false');
	  exit();
	}          
	
	$email = $conn->real_escape_string($email);
	$Activation_Code = $conn->real_escape_string($Activation_Code);
	
	$SQL = "INSERT INTO temporary_user (EmailAddress, activation_code) VALUES ('$email', '$Activation_Code')";
	$conn->query($SQL);
	
	$conn->close();
	
	echo("ok_temporary");
      }elseif($_POST['email'] != '' and $_POST['password'] != '' and $_POST['temporary_email'] == ''){
	if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
	  $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
	}else{
	  $ip = $_SERVER['REMOTE_ADDR'];
	}
	  
	$DBServer = 'localhost';
	$DBUser   = 'DB_USER_VALUE';
	$DBPass   = '';
	$DBName   = 'DB_DATABASE_VALUE';
	
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn->connect_error) {
	
	}
	$uName = $conn->real_escape_string($_POST['email']);
	$pWord = md5($conn->real_escape_string($_POST['password']));
	
	$sql="SELECT * FROM MY_users WHERE EmailAddress = '$uName' AND Password = '$pWord' AND (deactivated = 'n' OR deactivated <= 15) LIMIT 1";

	$rs=$conn->query($sql);

	if($rs === false) {
	
	} else {
	  $rows_returned = $rs->num_rows;
	}
	$rs->data_seek(0);
	$numUSER = $rs->num_rows;

	if($numUSER == 1){
	  while($row = $rs->fetch_assoc()){
	    session_start();
	    $LOGIN_username = $row['Username'];
	    $_SESSION['Username'] = $LOGIN_username;
	  }
	  
	  setcookie('LOGIN_username', $LOGIN_username, time() + (86400 * 360), "/", ".lightschool.it");
	  setcookie('LOGIN_password', $pWord, time() + (86400 * 360), "/", ".lightschool.it");

	  include_once "user_system.php";
	  require_once 'Mobile_Detect.php';
	  $detect = new Mobile_Detect;
	  
	  if($detect->isTablet()){
	    $device_type = 'tablet';
	  }else{
	    if($detect->isMobile() && !$detect->isTablet()){
	      $device_type = 'mobile';
	    }else{
	      $device_type = 'pc';
	    }
	  }
	  
	  $LOGIN_access_control = lightschool_get_user($LOGIN_username, 'access_control');
	  $LOGIN_verify_ip = lightschool_get_ip_status($LOGIN_username, $ip);
	  
	  if($LOGIN_access_control == 'y'){
	    if($LOGIN_verify_ip == 'add'){
	      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	      
	      if (mysqli_connect_errno()) {
		exit();
	      }
	      
	      $date_now_IT = date("d/m/Y H:i:s");
	      $agent = $_SERVER['HTTP_USER_AGENT'];
	      
	      $sql = "INSERT INTO MY_access (Username, ip, allow, logged_in, date, type, agent) VALUES ('$LOGIN_username', '$ip', 'y', 'y', '$date_now_IT', '$device_type', '$agent')";
	      $conn->query($sql);
	      
	      $conn->close();
	    }
	    if($LOGIN_verify_ip == 'allow'){
	      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	      
	      if (mysqli_connect_errno()) {
		exit();
	      }
	      
	      $sql = "UPDATE MY_access SET logged_in = 'y', type = '$device_type' WHERE Username = '$LOGIN_username' AND ip = '$ip' LIMIT 1";
	      $conn->query($sql);
	      
	      $conn->close();
	    }
	    
	    if($LOGIN_verify_ip != 'block'){
	      echo("ok_login");
	    }else{
	      echo "$login_error2";
	    }
	  }else{
	    echo("ok_login");
	  }
	}else{
	  echo "$login_error1";
	}
      }else{
	echo('Select and compile only one form!');
      }
    }else{
      echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 1');
    }
  }elseif($_GET['type'] == 'save' and $_SESSION['Username'] != ''){
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName4);
    
    if (mysqli_connect_errno()) {
      exit();
    }
    
    $Username = $conn->real_escape_string($_SESSION['Username']);
    $lang = $conn->real_escape_string($_GET['language']);
    $kind = $conn->real_escape_string($_GET['kind']);
    $array = $conn->real_escape_string($_GET['array']);
    $array = htmlentities($array, ENT_QUOTES);
    
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName4);

    // check connection
    if ($conn->connect_error) {
    }
    
    $sql="SELECT * FROM translations WHERE Username = '$Username' AND language = '$lang' LIMIT 1";

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
      $response = true;
    }
    
    if($response === false){
      $query = $conn->query("INSERT INTO translations (Username, language, array, type) VALUES ('$Username', '$lang', '$array', '$kind')");
    }elseif($response === true){
      $query = $conn->query("UPDATE translations SET array = '$array', type = '$kind' WHERE Username = '$Username' AND language = '$lang' LIMIT 1");
    }
    
    if($query === true){
      echo("true");
    }elseif($query === false){
      echo("false");
    }
    
    $conn->close();
  }else{
    echo("$TRAD_formpost_general_error");
  }
?>