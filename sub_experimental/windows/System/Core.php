<?php
  // avvio sessione PHP
  if(!isset($_SESSION)){
    session_start();
  }
  
  // variabili base
  $CURRENT_VERSION = 6.0;
  $IS_PREVIEW = true;
  $SITE_force_https = false;
  $SITE_debugging = false;
  $SITE_language = $_COOKIE['language'];
  
  include_once "ABSOLUTE_PATH_TO_PUBLIC_HTML/Subdomains/LightSchool/System/Core.php";
  
  // selezione variabili corrette
  if($IS_PREVIEW === true){
    $ROOT_DIRECTORY = "//MAIN_HTTP_ADDRESS";
    $SITE_TITLE = "LightSchool Windows";
    $MY_DIRECTORY = "//MAIN_HTTP_ADDRESS/sub_experimental/windows";
    $SITE_logo = "$IMAGES_DIRECTORY/logo.png";
    $UPLOAD_DIRECTORY = "//MAIN_HTTP_ADDRESS/my";
    // $UPLOAD_DIRECTORY = "$MY_DIRECTORY/Users/".md5($_SESSION['Username']."/uploads");
    $SUPPORT_DIRECTORY = "//MAIN_HTTP_ADDRESS/support";
    $SCHOOL_DIRECTORY = "//MAIN_HTTP_ADDRESS/sub_school";
  }else{
    $ROOT_DIRECTORY = "//MAIN_HTTP_ADDRESS";
    $SITE_TITLE = "LightSchool";
    $MY_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
    $UPLOAD_DIRECTORY = "$MY_DIRECTORY/Users/".md5($_SESSION['Username']."/uploads");
    $SUPPORT_DIRECTORY = "//MAIN_HTTP_ADDRESS/support";
    $SCHOOL_DIRECTORY = "//MAIN_HTTP_ADDRESS/sub_school";
  }
  $EMAIL_SUPPORT = 'MAIL_SUPPORT_ADDRESS';
  $EMAIL_INFO = 'info@lightschool.it';
  
  // credenziali accesso ai database
  $DBServer = 'localhost';
  $DBUser   = 'DB_USER_VALUE';
  $DBPass   = 'DB_PASSWORD_VALUE';
  $DBName   = 'DB_DATABASE_VALUE';
  $DBName2  = 'DB_CONFIG_NOT_SHIPPED';
  $DBName3  = 'DB_CONFIG_NOT_SHIPPED';
  
  if($ONLY_REFERENCES !== true){
    $USER_accent = $USER_accent_text = '#0067CF';
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
    $USER_icon_set_black = 'monochromatic/black';
    $USER_icon_set_white = "monochromatic/white";
    $date_now = date("d/m/Y H:i:s");
      
    if($_SESSION['Username'] != ''){
      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

      if($conn->connect_error){
	?>
	<html>
	  <head>
	    <title><?= $TRAD_LS_down ?></title>
	  </head>
	  <body style="background-color: #0001AB; color: white; font-family: courier new; padding: 3%">
	    <?= $TRAD_LS_down1 ?>
	  </body>
	</html>
      <?php
      }
      $USERNAMESESSIONESCAPE = $conn->real_escape_string($_SESSION['Username']);
      $sql = "SELECT * FROM MY_users WHERE Username = '$USERNAMESESSIONESCAPE' AND (deactivated = 'n' OR deactivated <= 15) LIMIT 1";

      $rs = $conn->query($sql);

      if($rs === false){
	?>
	<html>
	  <head>
	    <title><?= $TRAD_LS_down ?></title>
	  </head>
	  <body style="background-color: #0001AB; color: white; font-family: courier new; padding: 40px">
	    <?= $TRAD_LS_down2 ?>
	  </body>
	</html>
      <?php
      }else{
	$rows_returned = $rs->num_rows;
      }
      $rs->data_seek(0);
      $numUSER = $rs->num_rows;

      if($numUSER === 1){
	$row = $rs->fetch_assoc();
	$USER_notification = 0;
	
	$USER_uniqueid = $conn->real_escape_string($row['UserID']);
	$USER_name = $conn->real_escape_string($row['name']);
	$USER_surname = $conn->real_escape_string($row['surname']);
	$Username = $USERNAMEUSERNAME = $conn->real_escape_string($row['Username']);
	$USERPASSWORDENCRYPTED = $conn->real_escape_string($row['Password']);
	$USER_email = $conn->real_escape_string($row['EmailAddress']);
	$USER_type = $conn->real_escape_string($row['User_type']);
	$USER_DOC_subject = $USER_DOC_subject_text = $conn->real_escape_string($row['DOC_subject']);
	$USER_DOC_subject = explode(", ", $USER_DOC_subject);
	$USER_pwd_changed = $conn->real_escape_string($row['pwd_changed']);
	$USER_event = $conn->real_escape_string($row['event']);
	$USER_date_of_birth = $conn->real_escape_string($row['date_of_birth']);
	$USER_as_read = $conn->real_escape_string($row['as_read']);
	$USER_sex = $conn->real_escape_string($row['sex']);
	$USER_deactivated = $conn->real_escape_string($row['deactivated']);
	
	$USER_first_login = $conn->real_escape_string($row['first_login']);
	$USER_accent = $conn->real_escape_string($row['accent']);
	$USER_icon_set = $conn->real_escape_string($row['icon_set']);
	$USER_taskbar = $USER_taskbar_text = $conn->real_escape_string($row['taskbar']);
	$USER_taskbar = explode(", ", $USER_taskbar);
	$USER_taskbar_position = $conn->real_escape_string($row['taskbar_position']);
	$USER_taskbar_size = $conn->real_escape_string($row['taskbar_size']);
	$USER_image = $conn->real_escape_string($row['profile_image']);
	$USER_background = $conn->real_escape_string($row['background']);
	$USER_transparent = $conn->real_escape_string($row['transparent']);
	$USER_phone = $conn->real_escape_string($row['phone_number']);
	$USER_code_school = $USER_code_school_text = $conn->real_escape_string($row['code_school']);
	$USER_code_school = explode(", ", $USER_code_school);
	$USER_provincia = $conn->real_escape_string($row['provincia']);
	$USER_regione = $conn->real_escape_string($row['regione']);
	$USER_lim = $conn->real_escape_string($row['lim']);
	$USER_lim_array = explode(", ", $USER_lim);
	$USER_email_new_message = $conn->real_escape_string($row['email_new_message']);
	$USER_email_new_mark = $conn->real_escape_string($row['email_new_mark']);
	$USER_email_new_share = $conn->real_escape_string($row['email_new_share']);
	$USER_click_type = 'onclick';
	$USER_language = $conn->real_escape_string($row['language']);
	$USER_class = $conn->real_escape_string($row['class']);
	$USER_class_array = explode(", ", $USER_class);
	$USER_autosave_timer = $conn->real_escape_string($row['autosave_timer']);
	$USER_accessibility_font = $conn->real_escape_string($row['accessibilityfont']);
	$USER_visible = $conn->real_escape_string($row['visible']);
	$USER_visible_email = $conn->real_escape_string($row['visible_email']);
	$USER_visible_school = $conn->real_escape_string($row['visible_school']);
	$USER_block_list = $USER_block_list_text = $conn->real_escape_string($row['block_list']);
	$USER_block_list = explode(", ", $USER_block_list);
	
	$USER_send_email_access = $conn->real_escape_string($row['send_email_on_access']);
	$USER_access_pc = $conn->real_escape_string($row['pc']);
	$USER_access_mobile = $conn->real_escape_string($row['mobile']);
	$USER_access_tablet = $conn->real_escape_string($row['tablet']);
	$USER_access_androidapp = $conn->real_escape_string($row['android_app']);
	$USER_access_winapp = $conn->real_escape_string($row['win_app']);
	$USER_access_wpapp = $conn->real_escape_string($row['wp_app']);
	$USER_access_control = $conn->real_escape_string($row['access_control']);
	
	$SITE_language = $USER_language;
	setcookie('language', "$SITE_language", time() + (86400 * 360), "/", ".lightschool.it");
	
	$_SESSION['USER_code_school'] = $USER_code_school;
	$_SESSION['USER_code_school_text'] = $USER_code_school_text;
	$_SESSION['USER_icon_set1'] = $USER_icon_set1;
	$_SESSION['USER_icon_set2'] = $USER_icon_set2;
	
	if($USER_taskbar_position == "bottom"){
	  $USER_taskbar_position_translate = "$TRAD_USER_taskbar_position_translate_bottom";
	}elseif($USER_taskbar_position == "left"){
	  $USER_taskbar_position_translate = "$TRAD_USER_taskbar_position_translate_left";
	}elseif($USER_taskbar_position == "right"){
	  $USER_taskbar_position_translate = "$TRAD_USER_taskbar_position_translate_right";
	}
	
	if($USER_taskbar_size == "normal"){
	  $USER_taskbar_size_translate = "$TRAD_USER_taskbar_size_translate_normal";
	}elseif($USER_taskbar_size == "small"){
	  $USER_taskbar_size_translate = "$TRAD_USER_taskbar_size_translate_small";
	}
	  
	if(($USER_sex == '' or $USER_date_of_birth == '' or $USER_type == 'ask') and $current_page != 'tour' and $current_page != 'wizard' and $current_page != 'formpost' and $current_page != 'logout'){
	  header("location: $MY_DIRECTORY/wizard");
	}
	
	if($USER_deactivated != 'n'){
	  $USER_notification++;
	}
	
	// [INIZIO determina se il colore è chiaro o scuro]
	$hex = substr($USER_accent, 1); 

	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));

	if($r + $g + $b > 382){
	  $USER_themeset = 'dark';
	  $COL1 = 'black';
	  $COL2 = 'white';
	}else{
	  $USER_themeset = 'light';
	}
  
	if($USER_icon_set == 'monochromatic'){
	  $USER_icon_set1 = $USER_icon_set.'/'.$COL1;
	  $USER_icon_set2 = $USER_icon_set.'/'.$COL2;
	  $USER_icon_set_white = $USER_icon_set.'/white';
	  $USER_icon_set_black = $USER_icon_set.'/black';
	}else{
	  $USER_icon_set1 = $USER_icon_set;
	  $USER_icon_set2 = $USER_icon_set;
	  $USER_icon_set_white = $USER_icon_set;
	  $USER_icon_set_black = $USER_icon_set;
	}
	// [FINE determina se il colore è chiaro o scuro]
	
	if($USER_image != 'default'){
	  $USER_image = $USER_image2 = $UPLOAD_DIRECTORY.'/'.$USER_image;
	}else{
	  $USER_image = "$IMAGES_DIRECTORY/$USER_icon_set1/profile_$USER_sex.png";
	  $USER_image2 = "$IMAGES_DIRECTORY/$USER_icon_set2/profile_$USER_sex.png";
	}    
	
	// ottieni diverse gradazioni di colore
	$accent_alterate = Array(hexdec(substr($USER_accent,1,2)), hexdec(substr($USER_accent,3,2)), hexdec(substr($USER_accent,5,2)));
	$darker = Array($accent_alterate[0]/1.3, $accent_alterate[1]/1.3, $accent_alterate[2]/1.3);
	$darker2 = Array($accent_alterate[0]/1.6, $accent_alterate[1]/1.6, $accent_alterate[2]/1.6);
	$lighter = Array(255-(255-$accent_alterate[0])/1.3, 255-(255-$accent_alterate[1])/1.3, 255-(255-$accent_alterate[2])/1.3);
	$lighter2 = Array(255-(255-$accent_alterate[0])/7, 255-(255-$accent_alterate[1])/7, 255-(255-$accent_alterate[2])/7);
	$USER_accent_darker = "#".sprintf("%02X%02X%02X", $darker[0], $darker[1], $darker[2]);
	$USER_accent_darker2 = "#".sprintf("%02X%02X%02X", $darker2[0], $darker2[1], $darker2[2]);
	$USER_accent_lighter = "#".sprintf("%02X%02X%02X", $lighter[0], $lighter[1], $lighter[2]);
	$USER_accent_lighter2 = "#".sprintf("%02X%02X%02X", $lighter2[0], $lighter2[1], $lighter2[2]);
	$hex_lighter2 = substr($USER_accent_lighter2, 1);
	$hex_darker = substr($USER_accent_darker, 1);
	$r_lighter2 = hexdec(substr($hex_lighter2, 0, 2));
	$g_lighter2 = hexdec(substr($hex_lighter2, 2, 2));
	$b_lighter2 = hexdec(substr($hex_lighter2, 4, 2));
	$r_darker = hexdec(substr($hex_darker, 0, 2));
	$g_darker = hexdec(substr($hex_darker, 2, 2));
	$b_darker = hexdec(substr($hex_darker, 4, 2));
	
	if($USER_themeset === "dark"){
	  $USER_accent_lighter = $USER_accent_darker;
	  $USER_accent_lighter2 = $USER_accent_darker;
	  $USER_accent_text = "black";
	}else{
	  $USER_accent_text = $USER_accent;
	}
	
	$sql = "SELECT * FROM MY_files WHERE Username = '$Username' AND folder = 'c'";
	$rs = $conn->query($sql);

	$USER_trash = $rs->num_rows;
	
	if($USER_trash === 0){
	  $trash = '&egrave; vuoto';
	  $trash_icon = 'e';
	}
	else{
	  $trash = 'contiene elementi';
	  $trash_icon = 'f';
	}
	
	$sql = "SELECT * FROM MY_messages WHERE Receiving = '$Username' AND Sender NOT IN ('".implode($USER_block_list, "', '")."') AND is_read = 'n'";
	$rs = $conn->query($sql);

	$numMESSAGES = $rs->num_rows;
	
	if($numMESSAGES > 0){
	  $USER_notification++;
	}
	
	$USER_taskbar_real = "";
	$DAY_NAMES = array("", "Luned&igrave;", "Marted&igrave;", "Mercoled&igrave;", "Gioved&igrave;", "Venerd&igrave;", "Sabato", "Domenica");
	
	$APP_array_name = array("diary" => "Diario", "security" => "Centro sicurezza", "trash" => "Cestino", "share" => "Condivisi", "files" => "File", "messages" => "Messaggi", "settings" => "Impostazioni", "timetable" => "Orario", "test" => "Quiz", "register" => "Registro", "people" => "Rubrica");
	
	foreach($USER_taskbar as $app){
	  $icon = $app;
	  if($app === "trash"){
	    $icon = $trash_icon.'_'.$icon;
	  }
	  $app_real_name = $APP_array_name[$app];
	  $USER_taskbar_real .= '<span app_name="'.$app.'" app_real_name="'.$app_real_name.'" href="'.$MY_DIRECTORY.'/'.$app.'"><img src="'.$IMAGES_DIRECTORY.'/'.$USER_icon_set1.'/'.$icon.'.png" /><app_name class="mobile">'.$app_real_name.'</app_name></span>';
	}
	$FILES_ORDER_TEXT = "(CASE WHEN type = 'folder' THEN '1' WHEN type = 'file' THEN '2' WHEN type = 'notebook' THEN '2' WHEN type = 'stuff' THEN '3' ELSE type END), name";
      }else{
	header("location: $MY_DIRECTORY/logout");
      }
    }
    
    // valori global per le traduzioni. Servono a far si che alcuni elementi compresi nelle stringhe delle traduzioni rimangano identiche attraverso le diverse traduzioni
    $GLOBAL_email = "<img src='$IMAGES_DIRECTORY/$USER_icon_set_black/email.png' style='width: 16px; height: 16px; margin-right: 3px' />";
    $GLOBAL_phone = "<img src='$IMAGES_DIRECTORY/$USER_icon_set_black/phone.png' style='width: 16px; height: 16px; margin-right: 3px' />";
    $default_profile_image_black_generic = "$IMAGES_DIRECTORY/$USER_icon_set_black/profile_male.png";
    $default_profile_image_black_to_complete = "$IMAGES_DIRECTORY/$USER_icon_set_black/profile_";
   
    // carica il file della lingua selezionata
    include_once "/home/lightsch/public_html/System/Languages/$SITE_language.php";
    $LANGUAGE_AVAILABLE = array("it-IT" => "Italiano", "en-EN" => "English");
    $SCHOOLS_SYSTEM_AVAILABLE = array("it-IT" => "Italiano", "en-UK" => "British");
    
    // carica i file di sistema da System
    if($NO_STYLE !== true){ include_once "Style.php"; }
    if($NO_MENU !== true){ include_once "Menu.php"; }
    if($NO_SCRIPT !== true){ include_once "Script.php"; }
    if($NO_FUNCTION !== true){ include_once "Function.php"; }
    if($NO_TOUCH !== true){ include_once "Touch.php"; }
    
    if($NO_TEXT !== true){ ?>
      <!DOCTYPE html>
    <?php }
    
    if($_SESSION['Username'] == '' && $ALLOW_STRANGER !== true){
      include_once "./login.php";
      exit();
    }
  }
?>