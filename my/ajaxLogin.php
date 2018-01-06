<?php  
  if($_POST['remember_me'] == 'false'){
    $_POST['remember_me'] = 'n';
  }elseif($_POST['remember_me'] == 'true'){
    $_POST['remember_me'] = 'y';
  }

  if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
  }else{
    $ip = $_SERVER['REMOTE_ADDR'];
  }
    
  $DBServer = 'localhost';
  $DBUser   = 'DB_USER_VALUE';
  $DBPass   = 'DB_PASSWORD_VALUE';
  $DBName   = 'DB_DATABASE_VALUE';
  
  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

  // check connection
  if ($conn->connect_error) {
  die("error 1");
  }
  $uName = $conn->real_escape_string($_POST['EmailAddress']);  
  $pWord = $conn->real_escape_string($_POST['Password']);
  
  $uName_COOKIE = $conn->real_escape_string($_POST['cookie_username']);  
  $pWord_COOKIE = $conn->real_escape_string($_POST['cookie_password']);
  
  $pWordINSERT = $pWord;
  
  $pWord_noMD5 = $pWord;
  if($_GET['classic'] != 'y'){
    $pWord = md5($pWord);
  }else{
    $pWord = $pWord;
  }
  
  $sql="SELECT * FROM MY_users WHERE ((EmailAddress = '$uName' AND Password = '$pWord') OR (Username = '$uName_COOKIE' AND Password = '$pWord_COOKIE')) AND (deactivated = 'n' OR deactivated <= 15) LIMIT 1";

  $rs=$conn->query($sql);
  if($rs === false) {
  die("error 2");
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

    
    if($pWord_COOKIE != $pWord_noMD5){
      $pWordINSERT = $pWord;
    }
    $_POST['remember_me'] = 'y';
    if($_POST['remember_me'] == 'y'){
      setcookie('LOGIN_username', $LOGIN_username, time() + (86400 * 360), "/", "MAIN_HTTP_ADDRESS");
      setcookie('LOGIN_password', $pWordINSERT, time() + (86400 * 360), "/", "MAIN_HTTP_ADDRESS");
    }

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
    $LOGIN_first_login = lightschool_get_user($LOGIN_username, 'first_login');
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
	if($LOGIN_first_login == 'n'){
	  echo("true");
	}elseif($LOGIN_first_login == 'y'){
	  echo("first_login");
	}
      }else{
	echo "$login_error2";
      }
    }else{
      echo("true");
    }
  }else{
    if(!$login_error1){
      $login_error1 = "Indirizzo e-mail e/o password errati";
    }
    echo "$login_error1";
  }
?>