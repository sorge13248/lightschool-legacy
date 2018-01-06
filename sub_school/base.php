<?php
  include_once "ABSOLUTE_PATH_TO_PUBLIC_HTML/System/Core.php";
  
  $LS_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/';
  $MY_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_school';
  $MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/preview_sub';
  $IMAGES_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/images_sub';
  $UPLOAD_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_school';
  $SUPPORT_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_school/support';
  $path_to_unknown_user_image1 = $IMAGES_MAIN_DIRECTORY.'/monochromatic/black/profile_male.png';
  
  $EMAIL_SUPPORT = 'MAIL_SUPPORT_ADDRESS';
  $EMAIL_INFO = 'info@lightschool.it';

  if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
  }else{
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  
  $DBServer = 'localhost';
  $DBUser   = 'DB_USER_VALUE';
  $DBPass   = 'DB_PASSWORD_VALUE';
  $DBName   = 'DB_CONFIG_NOT_SHIPPED';
  $DBName2  = 'DB_CONFIG_NOT_SHIPPED';
  $DBName3  = 'DB_DATABASE_VALUE';
  
  if($_GET['only_reference'] != 'true'){
    session_start();
    date_default_timezone_set('Europe/Rome');
    include_once 'Mobile_Detect.php';
    $detect = new Mobile_Detect();
    
    if($_COOKIE['language'] != ''){
      $include_lang = $_COOKIE['language'];
    }else{
      $include_lang = 'it-IT';
    }
    
    if(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'){ }else{
      $redirect2 = basename($_SERVER['REQUEST_URI']);
      header("location: https:$MY_MAIN_DIRECTORY/".$redirect2);
    }

    if(!isset($_COOKIE['USER_language'])) {
      $_COOKIE['USER_language'] = 'it-IT';
    }
    
    $date_now = date("d-m-Y");
    $date_now_IT = date("d/m/Y");
    
    $USER_accent = '#0067CF';
    $USER_accent_darker = '#004F9F';
    $USER_accent_darker2 = '#004081';
    $USER_themeset = 'light';
    $USER_themeset2 = 'dark';
    $r = '0';
    $g = '103';
    $b = '207';
    $USER_fore_opposite = 'white';
    $USER_font = 'open-sans-light';
    $COL1 = 'white';
    $COL2 = 'black';
    $USER_skin = 'minimal';
    $USER_taskbar_position = 'bottom';
    
    $actually_page = basename($_SERVER['PHP_SELF']);
    
    $order = array(".php");
    $actually_page = str_replace($order, "", $actually_page);
    $_GET['f'] = str_replace($order, "", $_GET['f']);
    $_GET['id'] = str_replace($order, "", $_GET['id']);
    $_GET['s'] = str_replace($order, "", $_GET['s']);
    $_GET['class'] = str_replace($order, "", $_GET['class']);
      
    if($_SESSION['Username'] != ''){
      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

      // check connection
      if ($conn->connect_error) {
	?>
	<html>
	  <head>
	    <title>LIGHTSCHOOL &Egrave; OFFLINE</title>
	  </head>
	  <body style="background-color: #0001AB; color: white; font-family: courier new; padding: 3%">
	    LightSchool &egrave; offline a causa di un problema che sta affliggendo i nostri database.<br>
	    Non c&rsquo;&egrave; motivo di allarmarsi, stiamo lavorando per risolvere il pi&ugrave; velocemente questo problema.<br/><br/>
	    Il personale del supporto tecnico potrebbe trovare utile questo codice errore:<br/>LS_webinterface_main_connector.
	    <br><br>In quanto la piattaforma &egrave; completamente offline, l&rsquo;indirizzo e-mail di supporto
	    tecnico principale non &egrave; funzionante, inviare una segnalazione a <a href="mailto:sorgefrancesco97@outlook.com" style="color: white; text-decoration: none">sorgefrancesco97@outlook.com</a>.
	  </body>
	</html>
      <?php
      }
      $USERNAMESESSIONESCAPE = $conn->real_escape_string($_SESSION['Username']);
      $sql="SELECT * FROM SC_users WHERE Username = '$USERNAMESESSIONESCAPE' LIMIT 1";

      $rs=$conn->query($sql);

      if($rs === false) {
	?>
	<html>
	  <head>
	    <title>LIGHTSCHOOL &Egrave; OFFLINE</title>
	  </head>
	  <body style="background-color: #0001AB; color: white; font-family: courier new; padding: 40px">
	    LightSchool &egrave; offline a causa di un problema che sta affliggendo i nostri database.<br>
	    Non c&rsquo;&egrave; motivo di allarmarsi, stiamo lavorando per risolvere il pi&ugrave; velocemente questo problema.<br/><br/>
	    Il personale del supporto tecnico potrebbe trovare utile questo codice errore:<br/>LS_webinterface_main_sql.
	    <br><br>In quanto la piattaforma &egrave; completamente offline, l&rsquo;indirizzo e-mail di supporto
	    tecnico principale non &egrave; funzionante, inviare una segnalazione a <a href="mailto:sorgefrancesco97@outlook.com" style="color: white; text-decoration: none">sorgefrancesco97@outlook.com</a>.
	  </body>
	</html>
      <?php
      } else {
	$rows_returned = $rs->num_rows;
      }
      $rs->data_seek(0);
      $numUSER = $rs->num_rows;

      if($numUSER == '1'){
	while($row = $rs->fetch_assoc()){
	  $USER_uniqueid = $conn->real_escape_string($row['UserID']);
	  $USER_name = $conn->real_escape_string($row['name']);
	  $USER_surname = $conn->real_escape_string($row['surname']);
	  $Username = $conn->real_escape_string($row['Username']);
	  $USERNAMEUSERNAME = $Username;
	  $USERPASSWORDENCRYPTED = $conn->real_escape_string($row['Password']);
	  $USER_email = $conn->real_escape_string($row['EmailAddress']);
	  $USER_language = $conn->real_escape_string($row['language']);;
	  $USER_school_id = $conn->real_escape_string($row['school_id']);
	  $USER_image = $conn->real_escape_string($row['profile_image']);
	  $USER_sex = $conn->real_escape_string($row['sex']);
	  
	  if($USER_image != 'default'){
	    $USER_image2 = $USER_image;
	    $USER_image = $UPLOAD_MAIN_DIRECTORY.'/'.$row['profile_image'];
	  }else{
	    $USER_image = "$IMAGES_MAIN_DIRECTORY/monochromatic/white/profile_$USER_sex.png";
	    $USER_image2 = "$IMAGES_MAIN_DIRECTORY/monochromatic/black/profile_$USER_sex.png";
	  }
	  
	  include "language_$USER_language.php";
	}
	
	$conn2 = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if($conn2->connect_error){
	
	}
	
	$sql2="SELECT * FROM SC_users WHERE UserID = '$USER_school_id' LIMIT 1";

	$rs2=$conn2->query($sql2);

	if($rs2 === false){
	
	}else{
	  $rows_returned = $rs2->num_rows;
	}
	$rs2->data_seek(0);
	$num2 = $rs2->num_rows;

	if($num2 == '1'){
	  while($row2 = $rs2->fetch_assoc()){
	    $SCHOOL_name = $row2['name'];
	  }
	}
    }else{
      header("location: $MY_MAIN_DIRECTORY/logout");
    }
  }
  
    
    if($_GET['no_text'] != 'y'){ ?>
      <!DOCTYPE html>
      <div class="background_agent" id="background_agent"></div>
      <div class="emergency">
	<div style="color: white; top: 15%; left: 47%; position: absolute"><span style="font-size: 30px; font-size: 15.5vw;">!</span></div>
	<p style="color: white; top: 50%; left: 40%; position: absolute"><span style="font-size: 20px; font-size: 3.5vw; font-family: 'Roboto'">Emergenza</span></p>
      </div>
      <?php if($actually_page != 'writer'){ ?>
	<div class="transparent"></div>
      <?php
      } ?>
      <script type="text/javascript">
	function AcceptAndCloseCookieBar(){
	  localStorage.setItem("accept_cookie", "y");
	  $(".cookie_bar").slideUp(200);
	}
	setInterval(function() {
	  // $(".background_agent").load("<?= $MY_MAIN_DIRECTORY ?>/keep_user_alive.php");
	}, 300000); <?php // 300000 every 5 minutes ?>
	
	$(document).keyup(function(e){
	  if (e.keyCode == 27) {
	    if($('.dialog').is(':visible')) {
	      closeDialog();
	    }else{
	      if($('.context').is(':visible')) {
		closecontext();
	      }else{	  
		if($('#sidebar_file').is(':visible')) {
		  closeSidebar();
		}
	      }
	    }
	  }
	});
      </script>
      <div class="cookie_bar" style="display: none">LightSchool utilizza i cookie per migliorare la tua esperienza d'uso e per ricordare le tue credenziali, se accettato, al momento dell'accesso. Visitando il sito, dichiari di essere a conoscenza e di accettare la nostra informativa sui cookie.<span onclick="AcceptAndCloseCookieBar()" style="float: right; cursor: pointer"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/black/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <?php
    }
  }
?>