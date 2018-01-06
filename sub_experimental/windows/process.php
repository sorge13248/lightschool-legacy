<?php
  $ALLOW_STRANGER = true; $NO_STYLE = true; $NO_SCRIPT = true; $NO_TOUCH = true; $NO_TEXT = true;
  include_once "System/Core.php";
  
  $REQUEST = $_GET['type'];
  
  if(!$conn){
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
  }
  if($_SESSION['Username'] == ''){
    if($REQUEST === "login"){
      $_SESSION['TrustedUsername'] = "";
      $TRUSTED = $_POST['trusted'];
      
      // check connection
      if($conn->connect_error){ echo "Errore di collegamento ai database"; }
      
      if($TRUSTED === "true"){
	$username = $conn->real_escape_string($_POST['username']);
	$SQL = "SELECT * FROM MY_users WHERE Username = '$username' AND (deactivated = 'n' OR deactivated <= 15) LIMIT 1";
      }else{
	$uName = $conn->real_escape_string($_POST['email']);
	$pWord = md5($conn->real_escape_string($_POST['password']));
	$SQL = "SELECT * FROM MY_users WHERE EmailAddress = '$uName' AND Password = '$pWord' AND (deactivated = 'n' OR deactivated <= 15) LIMIT 1";
      }
      $rs = $conn->query($SQL);
      
      if($rs === false){ echo "Errore nell'esecuzione dell'operazione"; }else{ $rows_returned = $rs->num_rows; }
      
      $rs->data_seek(0);
      $num = $rs->num_rows;
      
      if($num == 1){
	$row = $rs->fetch_assoc();
	
	$LOGIN_username = $row['Username'];
	
	if($TRUSTED === "true"){
	  $_SESSION['Trusted_Username'] = $LOGIN_username;
	  $ACCESS_ALLOWED = true;
	}else{
	  $_SESSION['Username'] = $LOGIN_username;
      
	  setcookie('LOGIN_username', $LOGIN_username, time() + (86400 * 360), "/", "MAIN_HTTP_ADDRESS");
	  setcookie('LOGIN_password', $pWordINSERT, time() + (86400 * 360), "/", "MAIN_HTTP_ADDRESS");
	  require_once 'Library/Mobile_Detect.php';
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
	  
	  if($LOGIN_access_control == 'y'){
	    if($LOGIN_verify_ip == 'add'){
	      $date_now_IT = date("d/m/Y H:i:s");
	      $agent = $_SERVER['HTTP_USER_AGENT'];
	      
	      $sql = "INSERT INTO MY_access (Username, ip, allow, logged_in, date, type, agent) VALUES ('$LOGIN_username', '$ip', 'y', 'y', '$date_now_IT', '$device_type', '$agent')";
	      $conn->query($sql);
	    }
	    if($LOGIN_verify_ip == 'allow'){
	      $sql = "UPDATE MY_access SET logged_in = 'y', type = '$device_type' WHERE Username = '$LOGIN_username' AND ip = '$ip' LIMIT 1";
	      $conn->query($sql);
	    }
	    
	    if($LOGIN_verify_ip != 'block'){
	      if($LOGIN_first_login == 'n'){
		$ACCESS_ALLOWED = true;
	      }elseif($LOGIN_first_login == 'y'){
		echo("first_login");
	      }
	    }else{
	      echo "$login_error2";
	    }
	  }else{
	    $ACCESS_ALLOWED = true;
	  }
	}
	
	if($ACCESS_ALLOWED === true){
	  if($TRUSTED === "true"){
	    $temporary_key = $LightSchool->generateRandomString(6);
	    $sql = "UPDATE MY_users SET UniKey = '$temporary_key' WHERE Username = '$LOGIN_username' LIMIT 1";
	    $rs = $conn->query($sql);
	    ?>
	      <span style="display: none">starting_trusted_procedure</span>
	      <p>Immettere il codice disponibile nel tuo account in Impostazioni > Sicurezza > Autorizza accesso.</p>
	      <form method="post" action="<?= $MY_DIRECTORY ?>/process.php?type=login_code" class="login">
		<input type="text" id="code" name="code" placeholder="Codice accesso temporaneo" /><br/>
		<input type="submit" value="Accedi" style="float: right; width: auto" id="login_code" />
	      </form>
	    <?php
	  }else{
	    echo("true");
	  }
	}
      }else{
	echo "$login_error1";
      }
    }elseif($REQUEST === "login_code"){
      include_once "System/TrustedLogin.php";
    }else{
      $request_not_found = true;
    }
  }elseif($_SESSION['Username'] != ''){
    if($REQUEST === "taskbar"){
      if($_POST['previous_array_taskbar'] === $_POST['array_taskbar']){
	echo("true hidden Taskbar uguale a prima");
      }else{
	$Taskbar = $_POST['array_taskbar'];
	
	$Taskbar = $conn->real_escape_string($Taskbar);
	$Username = $conn->real_escape_string($Username);
	
	$_GET['request'] = array("update_taskbar", "UPDATE MY_users SET taskbar = '$Taskbar' WHERE Username = '$Username' LIMIT 1");
	include_once "System/View.php";
	
	if($_POST['kind'] === "add"){
	  $text_result = "App aggiunta correttamente alla taskbar";
	}elseif($_POST['kind'] === "remove"){
	  $text_result = "App rimossa correttamente alla taskbar";
	}elseif($_POST['kind'] === "reorder"){
	  $text_result = "Taskbar riordinata correttamente";
	}
	
	echo("$text_result");
      }
    }elseif($REQUEST === "customize"){
      $Background = $_POST['background'];
      $Accent = $_POST['accent'];
      $IconSet = $_POST['icon_set'];
      
      $Background = $conn->real_escape_string($Background);
      $Accent = $conn->real_escape_string($Accent);
      $IconSet = $conn->real_escape_string($IconSet);
      
      if(!$Background){
	$Background = $USER_background;
      }
      
      if(!$Accent){
	$Accent = $USER_accent;
      }
      
      if(!$IconSet){
	$IconSet = $USER_icon_set;
      }
      
      $_GET['request'] = array("customize", "UPDATE MY_users SET background = '$Background', accent = '$Accent', icon_set = '$IconSet' WHERE Username = '$Username' LIMIT 1");
      include_once "System/View.php";
      
      echo("Impostazioni salvate correttamente");
    }else{
      $request_not_found = true;
    }
  }
  
  if($request_not_found === true){
    echo("Tipo di richiesta non trovato.");
  }
?>