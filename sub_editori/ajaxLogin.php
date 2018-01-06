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
  $DBPass   = '';
  $DBName   = 'DB_CONFIG_NOT_SHIPPED';
  
  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

  // check connection
  if ($conn->connect_error) {
  
  }
  $uName = $conn->real_escape_string($_POST['EmailAddress']);  
  $pWord = $conn->real_escape_string($_POST['Password']);
  
  $uName_COOKIE = $conn->real_escape_string($_POST['cookie_username']);  
  $pWord_COOKIE = $conn->real_escape_string($_POST['cookie_password']);
  
  $pWordINSERT = $pWord;
  
  $pWord_noMD5 = $pWord;
  $pWord = md5($pWord);
  
  $sql="SELECT * FROM PB_users WHERE (EmailAddress = '$uName' AND Password = '$pWord') OR (Username = '$uName_COOKIE' AND Password = '$pWord_COOKIE')";

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
    
    if($pWord_COOKIE != $pWord_noMD5){
      $pWordINSERT = $pWord;
    }
    
    if($_POST['remember_me'] == 'y'){
      setcookie('LOGIN_username', $LOGIN_username, time() + (86400 * 360), "/");
      setcookie('LOGIN_password', $pWordINSERT, time() + (86400 * 360), "/");
    }

    /* include_once "user_system.php";
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
	
	$sql = "INSERT INTO MY_access (Username, ip, allow, logged_in, date, type) VALUES ('$LOGIN_username', '$ip', 'y', 'y', '$date_now_IT', '$device_type')";
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
	echo "Non puoi accedere a questo account";
      }
    }else{
      echo("true");
    }
    */
      echo("true");
  }else{
    echo "Indirizzo e-mail o password errata";
  }
?>