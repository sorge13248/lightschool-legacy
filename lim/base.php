<?php
  include_once "ABSOLUTE_PATH_TO_PUBLIC_HTML/System/Core.php";
  
session_start();
date_default_timezone_set('Europe/Rome');

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
$USER_icon_set1 = 'monochromatic/white';
$USER_icon_set2 = 'monochromatic/black';

if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
  $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
}else{
  $ip = $_SERVER['REMOTE_ADDR'];
}

$LIM_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/lim';
$MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/';
$IMAGES_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/images_sub';
$UPLOAD_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';

if(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'){ }else{
  $redirect2 = basename($_SERVER['REQUEST_URI']);
  header("location: https:$LIM_MAIN_DIRECTORY/".$redirect2);
}

$current_page = basename($_SERVER['PHP_SELF']);

$order = array(".php");
$current_page = str_replace($order, "", $current_page);

$DBServer = 'localhost';
$DBUser   = 'DB_USER_VALUE';
$DBPass   = 'DB_PASSWORD_VALUE';
$DBName   = 'DB_DATABASE_VALUE';
$DBName2   = 'DB_CONFIG_NOT_SHIPPED';

if($_SESSION['UsernameLIM'] != ''){

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
      $USERNAMESESSIONESCAPE = $conn->real_escape_string($_SESSION['UsernameLIM']);
      $sql="SELECT * FROM MYLIM_users WHERE Username = '$USERNAMESESSIONESCAPE' LIMIT 1";
      
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
	  $UsernameLIM = $row['Username'];
	  $IDLIM = $row['UserID'];
	  $USER_nameLIM = $row['name'];
	  $USER_accentLIM = $row['accent'];
	  $USER_schoolLIM = $row['school'];
	  $USER_provinciaLIM = $row['provincia'];
	  $USER_phoneLIM = $row['phone_number'];
	}
      }
			
	
	// determina se colore è chiaro o scuro
	$hex = substr($USER_accentLIM, 1); //Bg color in hex, without any prefixing #!

	//break up the color in its RGB components
	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));

	//do simple weighted avarage
	//
	//(This might be overly simplistic as different colors are perceived
	// differently. That is a green of 128 might be brighter than a red of 128.
	// But as long as it's just about picking a white or black text color...)
	if($r + $g + $b > 382){
	    $theme_setLIM = 'dark';
	}else{
	    $theme_setLIM = 'light';
	}
	
	if($theme_setLIM == 'light'){
		$color_linkLIM = 'white';
	}
	else{
		$color_linkLIM = 'black';
	}
	
	$USER_accent_alterateLIM = Array(
	    hexdec(substr($USER_accentLIM,1,2)),
	    hexdec(substr($USER_accentLIM,3,2)),
	    hexdec(substr($USER_accentLIM,5,2))
	);
	
	$darkerLIM = Array(
	    $USER_accent_alterateLIM[0]/1.3,
	    $USER_accent_alterateLIM[1]/1.3,
	    $USER_accent_alterateLIM[2]/1.3
	);
	
	$lighterLIM = Array(
	    255-(255-$USER_accent_alterateLIM[0])/1.3,
	    255-(255-$USER_accent_alterateLIM[1])/1.3,
	    255-(255-$USER_accent_alterateLIM[2])/1.3
	);
	
	$darkerLIM = "#".sprintf("%02X%02X%02X", $darkerLIM[0], $darkerLIM[1], $darkerLIM[2]);
	$lighterLIM = "#".sprintf("%02X%02X%02X", $lighterLIM[0], $lighterLIM[1], $lighterLIM[2]);

}
?>
