<?php
  include_once "ABSOLUTE_PATH_TO_PUBLIC_HTML/Subdomains/LightSchool/base.php";
  
  $IS_PREVIEW = 'n';
  $CURRENT_VERSION = 5.2;
  
  if($IS_PREVIEW == 'y'){ 
    $SITE_TITLE = "LightSchool Preview";
    $IS_PREVIEW_PUBLIC = 'n';
    $LS_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_preview';
    $MY_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_my_preview';
    $MAIN_DIRECTORY = $LS_MAIN_DIRECTORY;
    $ROOT_DIRECTORY = "//MAIN_HTTP_ADDRESS";
    $IMAGES_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/images_sub';
    $UPLOAD_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
    $SUPPORT_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my/support';
    $SCHOOL_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_school';
  }else{                    
    $SITE_TITLE = "LightSchool";
    $LS_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS';
    $MY_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
    $MAIN_DIRECTORY = $LS_MAIN_DIRECTORY;
    $ROOT_DIRECTORY = $LS_MAIN_DIRECTORY;
    $IMAGES_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/images_sub';
    $UPLOAD_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
    $SUPPORT_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my/support';
    $SCHOOL_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_school';
    
    if(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'){ }else{
      $redirect2 = basename($_SERVER['REQUEST_URI']);
      header("location: https:$MY_MAIN_DIRECTORY/".$redirect2);
    }
  }
  $path_to_unknown_user_image1 = $IMAGES_MAIN_DIRECTORY.'/monochromatic/black/profile_male.png';
  
  $EMAIL_SUPPORT = 'MAIL_SUPPORT_ADDRESS';
  $EMAIL_INFO = 'info@lightschool.it';
  
  $DBServer = 'localhost';
  $DBUser   = 'DB_USER_VALUE';
  $DBPass   = 'DB_PASSWORD_VALUE';
  $DBName   = 'DB_DATABASE_VALUE';
  $DBName2  = 'DB_CONFIG_NOT_SHIPPED';
  $DBName3  = 'DB_CONFIG_NOT_SHIPPED';
    
  $date_now = date("d-m-Y");
  $date_now_IT = date("d/m/Y");
  $date_now_IT_HR = date("d/m/Y H:i:s");
  $option_separator = "<option disabled='disabled'>------------------------------</option>";
  
  include_once "blob.php";
  
  if($_GET['only_reference'] != 'true'){
    session_start();
    date_default_timezone_set('Europe/Rome');
    include_once 'Mobile_Detect.php';
    $detect = new Mobile_Detect();
    
    $actually_page = basename($_SERVER['PHP_SELF']);
    
    $order = array(".php");
    $actually_page = str_replace($order, "", $actually_page);
    $_GET['f'] = str_replace($order, "", $_GET['f']);
    $_GET['id'] = str_replace($order, "", $_GET['id']);
    $_GET['s'] = str_replace($order, "", $_GET['s']);
    $_GET['class'] = str_replace($order, "", $_GET['class']);
    
    $VALID_lang = array("it-IT", "en-EN", "es-ES");
    
    $NO_LANGUAGE_SELECT = true;
    if($_COOKIE['language'] == '' || !$NO_LANGUAGE_SELECT){
      include_once "language.php";
      exit();
    }
    include_once("ABSOLUTE_PATH_TO_PUBLIC_HTML/Subdomains/LightSchool/System/Languages/".$_COOKIE["language"].".php"); 
    
    if($_COOKIE['language'] != ''){
      $include_lang = $_COOKIE['language'];
    }
    
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
    $USER_icon_set_black = 'monochromatic/black';
    $USER_icon_set_white = "monochromatic/white";
    
    // language value
    $LANG_it = 'it-IT';
    $LANG_en = 'en-EN';
      
    if($_SESSION['Username'] != ''){
      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

      // check connection
      if ($conn->connect_error) {
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
      $sql="SELECT * FROM MY_users WHERE Username = '$USERNAMESESSIONESCAPE' AND (deactivated = 'n' OR deactivated <= 15) LIMIT 1";

      $rs=$conn->query($sql);

      if($rs === false) {
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
      } else {
	$rows_returned = $rs->num_rows;
      }
      $rs->data_seek(0);
      $numUSER = $rs->num_rows;

      if($numUSER == '1'){
	$USER_notification = 0;
	
	while($row = $rs->fetch_assoc()){
	  $USER_uniqueid = $row['UserID'];
	  $USER_name = $row['name'];
	  $USER_surname = $row['surname'];
	  $Username = $row['Username'];
	  $USERNAMEUSERNAME = $row['Username'];
	  $USERPASSWORDENCRYPTED = $row['Password'];
	  $USER_email = $row['EmailAddress'];
	  $USER_type = $row['User_type'];
	  $USER_DOC_subject = $row['DOC_subject'];
	  $USER_pwd_changed = $row['pwd_changed'];
	  $USER_event = $row['event'];
	  $USER_date_of_birth = $row['date_of_birth'];
	  $USER_message = $row['message'];
	  $USER_as_read = $row['as_read'];
	  $USER_sex = $row['sex'];
	  $USER_LS_version = $row['version'];
	  $USER_deactivated = $row['deactivated'];
	  
	  $USER_first_login = $row['first_login'];
	  $USER_accent = $row['accent'];
	  $USER_icon_set = $row['icon_set'];
	  $USER_taskbar = $row['taskbar'];
	  $USER_skin = "minimal";
	  $USER_taskbar_size = "normal";
	  $USER_taskbar_position = "bottom";
	  $USER_taskbar_size = "normal";
	  $USER_image = $row['profile_image'];
	  $USER_background = $row['background'];
	  $USER_phone = $row['phone_number'];
	  $USER_code_school = $row['code_school'];
	  $USER_regione = $row['regione'];
	  $USER_lim = $row['lim'];
	  $USER_email_new_message = $row['email_new_message'];
	  $USER_email_new_mark = $row['email_new_mark'];
	  $USER_email_new_share = $row['email_new_share'];
	  $USER_click_type = "ondblclick";
	  $USER_language = $row['language'];
	  $USER_autosave_timer = $row['autosave_timer'];
	  $USER_visible = $row['visible'];
	  $USER_visible_email = $conn->real_escape_string($row['visible_email']);
	  $USER_visible_school = $conn->real_escape_string($row['visible_school']);
	  $USER_block_list = $row['block_list'];
	  
	  $USER_send_email_access = $row['send_email_on_access'];
	  $USER_access_pc = $row['pc'];
	  $USER_access_mobile = $row['mobile'];
	  $USER_access_tablet = $row['tablet'];
	  $USER_access_androidapp = $row['android_app'];
	  $USER_access_winapp = $row['win_app'];
	  $USER_access_wpapp = $row['wp_app'];
	  $USER_access_control = $row['access_control'];
	  
	  $USER_uniqueid = $conn->real_escape_string($USER_uniqueid);
	  $USER_name = $conn->real_escape_string($USER_name);
	  $USER_surname = $conn->real_escape_string($USER_surname);
	  $Username = $conn->real_escape_string($Username);
	  $USERNAMEUSERNAME = $Username;
	  $USERPASSWORDENCRYPTED = $conn->real_escape_string($USERPASSWORDENCRYPTED);
	  $USER_email = $conn->real_escape_string($USER_email);
	  $USER_type = $conn->real_escape_string($USER_type);
	  
	  $USER_DOC_subject = $conn->real_escape_string($USER_DOC_subject);
	  $USER_DOC_subject_text = $USER_DOC_subject;
	  $USER_DOC_subject = explode(", ", $USER_DOC_subject);
	    
	  $USER_max_file_size = $conn->real_escape_string($USER_max_file_size);
	  $USER_pwd_changed = $conn->real_escape_string($USER_pwd_changed);
	  $USER_event = $conn->real_escape_string($USER_event);
	  $USER_date_of_birth = $conn->real_escape_string($USER_date_of_birth);
	  $USER_message = $conn->real_escape_string($USER_message);
	  $USER_as_read = $conn->real_escape_string($USER_as_read);
	  $USER_LS_version = $conn->real_escape_string($USER_LS_version);
	  $USER_bubble_main_menu = $conn->real_escape_string($USER_bubble_main_menu);
	  $USER_deactivated = $conn->real_escape_string($USER_deactivated);
	  
	  $USER_first_login = $conn->real_escape_string($USER_first_login);
	  $USER_fastnote = $conn->real_escape_string($USER_fastnote);
	  $USER_accent = $conn->real_escape_string($USER_accent);
	  $USER_skin = $conn->real_escape_string($USER_skin);
	  $USER_icon_set = $conn->real_escape_string($USER_icon_set);
	  $USER_taskbar = $conn->real_escape_string($USER_taskbar);
	  $USER_taskbar_position = $conn->real_escape_string($USER_taskbar_position);
	  $USER_taskbar_size = $conn->real_escape_string($USER_taskbar_size);
	  $USER_taskbar_text = $USER_taskbar;
	  $USER_taskbar = explode(", ", $USER_taskbar);
	  
	  $USER_image = $conn->real_escape_string($USER_image); 
	  $USER_background = $conn->real_escape_string($USER_background);
	  $USER_transparent = $conn->real_escape_string($USER_transparent);
	  $USER_button_style = $conn->real_escape_string($USER_button_style);
	  $USER_phone = $conn->real_escape_string($USER_phone);
	  $USER_sex = $conn->real_escape_string($USER_sex);
	  $USER_code_school = $conn->real_escape_string($USER_code_school);
	  $USER_code_school_text = $USER_code_school;
	  $USER_code_school = explode(", ", $USER_code_school);
	  
	  $USER_provincia = $conn->real_escape_string($USER_provincia);
	  $USER_regione = $conn->real_escape_string($USER_regione);
	  $USER_lim = $conn->real_escape_string($USER_lim);
	  $USER_lim_array = explode(", ", $USER_lim);
	  $USER_dock = $conn->real_escape_string($USER_dock);
	  $USER_files_order = $conn->real_escape_string($USER_files_order);
	  $USER_email_new_message = $conn->real_escape_string($USER_email_new_message);
	  $USER_email_new_mark = $conn->real_escape_string($USER_email_new_mark);
	  $USER_email_new_share = $conn->real_escape_string($USER_email_new_share);
	  $USER_click_type = $conn->real_escape_string($USER_click_type);
	  $USER_language = $conn->real_escape_string($USER_language);
	  $USER_class = $conn->real_escape_string($USER_class);
	  $USER_class_array = explode(", ", $USER_class);
	  
	  $USER_autosave_timer = $conn->real_escape_string($USER_autosave_timer);
	  $USER_accessibility_font = $conn->real_escape_string($USER_accessibility_font);
	  $USER_diary_view = $conn->real_escape_string($USER_diary_view);
	  $USER_visible = $conn->real_escape_string($USER_visible);
	  $USER_block_list = $conn->real_escape_string($USER_block_list);
	  $USER_block_list_text = $USER_block_list;
	  $USER_block_list = explode(", ", $USER_block_list);
	  $USER_font = $conn->real_escape_string($USER_font);
	  
	  $USER_access_pc = $conn->real_escape_string($USER_access_pc);
	  $USER_send_email_access = $conn->real_escape_string($USER_send_email_access);
	  $USER_access_mobile = $conn->real_escape_string($USER_access_mobile);
	  $USER_access_tablet = $conn->real_escape_string($USER_access_tablet);
	  $USER_access_androidapp = $conn->real_escape_string($USER_access_androidapp);
	  $USER_access_winapp = $conn->real_escape_string($USER_access_winapp);
	  $USER_access_wpapp = $conn->real_escape_string($USER_access_wpapp);
	  $USER_access_control = $conn->real_escape_string($USER_access_control);
	  
	  $USER_is_beta = $conn->real_escape_string($USER_is_beta);
	  $USER_win8_beta = $conn->real_escape_string($USER_win8_beta);
	  $USER_use_banner = $conn->real_escape_string($USER_use_banner);
	  
	  $USER_skin = "minimal";
	  
	  $include_lang = $USER_language;
	  setcookie('language', "$include_lang", time() + (86400 * 360), "/", ".francescosorge.com");
	  
	  $_SESSION['USER_code_school'] = $USER_code_school;
	  $_SESSION['USER_code_school_text'] = $USER_code_school_text;
	  
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
	    
	  if(($USER_sex == '' or $USER_date_of_birth == '' or $USER_type == 'ask') and $actually_page != 'tour' and $actually_page != 'wizard' and $actually_page != 'formpost'){
	    header("location: $MY_MAIN_DIRECTORY/wizard");
	  }
	  
	  if($USER_deactivated != 'n'){
	    $USER_notification++;
	  }
	  
	// determina se colore è chiaro o scuro
	$hex = substr($USER_accent, 1); //Bg color in hex, without any prefixing #!

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
	  $USER_themeset = 'dark';
	}else{
	  $USER_themeset = 'light';
	}
	
	if($USER_themeset == 'dark'){
	  $COL1 = 'black';
	  $COL2 = 'white';
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
	  if($USER_image != 'default'){
	    $USER_image = $UPLOAD_MAIN_DIRECTORY.'/'.$row['profile_image'];
	    $USER_image2 = $USER_image;
	  }else{
	    $USER_image = "$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/profile_$USER_sex.png";
	    $USER_image2 = "$IMAGES_MAIN_DIRECTORY/$USER_icon_set2/profile_$USER_sex.png";
	  }
	}

	$path_to_unknown_user_image1 = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/black/profile_male.png';
	$total_string = $Username.$USER_email;
	$target_path = 'upload/'.md5($total_string).'/'.$date_now.'/';
	$target_path2 = 'upload/'.md5($total_string).'/';
    
	
	$_SESSION['USER_icon_set1'] = $USER_icon_set1;
	$_SESSION['USER_icon_set2'] = $USER_icon_set2;
	
	$USER_accent_alterate = Array(
	    hexdec(substr($USER_accent,1,2)),
	    hexdec(substr($USER_accent,3,2)),
	    hexdec(substr($USER_accent,5,2))
	);
	
	$darker = Array(
	    $USER_accent_alterate[0]/1.3,
	    $USER_accent_alterate[1]/1.3,
	    $USER_accent_alterate[2]/1.3
	);
	
	$darker2 = Array(
	    $USER_accent_alterate[0]/1.6,
	    $USER_accent_alterate[1]/1.6,
	    $USER_accent_alterate[2]/1.6
	);
	
	$lighter = Array(
	    255-(255-$USER_accent_alterate[0])/1.3,
	    255-(255-$USER_accent_alterate[1])/1.3,
	    255-(255-$USER_accent_alterate[2])/1.3
	);
	
	$lighter2 = Array(
	    255-(255-$USER_accent_alterate[0])/7,
	    255-(255-$USER_accent_alterate[1])/7,
	    255-(255-$USER_accent_alterate[2])/7
	);
	$USER_accent_darker = "#".sprintf("%02X%02X%02X", $darker[0], $darker[1], $darker[2]);
	$USER_accent_darker2 = "#".sprintf("%02X%02X%02X", $darker2[0], $darker2[1], $darker2[2]);
	$USER_accent_lighter = "#".sprintf("%02X%02X%02X", $lighter[0], $lighter[1], $lighter[2]);
	$USER_accent_lighter2 = "#".sprintf("%02X%02X%02X", $lighter2[0], $lighter2[1], $lighter2[2]);
	
	$hex_lighter2 = substr($USER_accent_lighter2, 1); //Bg color in hex, without any prefixing #!
	//break up the color in its RGB components
	$r_lighter2 = hexdec(substr($hex_lighter2,0,2));
	$g_lighter2 = hexdec(substr($hex_lighter2,2,2));
	$b_lighter2 = hexdec(substr($hex_lighter2,4,2));
	
	$conn2 = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn2->connect_error) {
	  trigger_error("$TRAD_database_error ".$conn2->connect_error, E_USER_ERROR);
	}
	$sql2="SELECT * FROM MY_files WHERE Username = '$Username' AND folder = 'c'";

	$rs2=$conn2->query($sql2);

	if($rs2 === false) {
	  trigger_error("$TRAD_error SQL: " . $sql2 . " $TRAD_error: " . $conn2->error, E_USER_ERROR);
	} else {
	  $rows_returned2 = $rs2->num_rows;
	}
	$rs2->data_seek(0);
	$numTRASH = $rs2->num_rows;
	
	$trash = $numTRASH;
	$USER_trash = $numTRASH;
	
	if($trash == '0'){
	  $trash = '&egrave; vuoto';
	  $trash_icon = 'e';
	}
	else{
	  $trash = 'contiene elementi';
	  $trash_icon = 'f';
	}
	
	$conn3 = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn3->connect_error) {
	   trigger_error("$TRAD_database_error ".$conn2->connect_error, E_USER_ERROR);
	}
	$sql3="SELECT * FROM MY_messages WHERE Receiving = '$Username' AND Sender NOT IN ('".implode($USER_block_list, "', '")."') AND is_read = 'n'";

	$rs3=$conn3->query($sql3);

	if($rs3 === false) {
	  trigger_error("$TRAD_error SQL: " . $sql2 . " $TRAD_error: " . $conn2->error, E_USER_ERROR);
	} else {
	  $rows_returned2 = $rs3->num_rows;
	}
	$rs3->data_seek(0);
	$numMESSAGES = $rs3->num_rows;
	
	if($numMESSAGES > 0){
	  $USER_notification++;
	}
      }else{
	header("location: $MY_MAIN_DIRECTORY/logout");
      }
    }
    
    // global
    $GLOBAL_email = "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set2/email.png' style='width: 16px; height: 16px; margin-right: 3px' />";
    $GLOBAL_phone = "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set2/phone.png' style='width: 16px; height: 16px; margin-right: 3px' />";
    
    include_once "user_system.php";
    $USER_icon_set1 = 'monochromatic/white';
    $USER_icon_set2 = 'monochromatic/black';
    $USER_icon_set_black = 'monochromatic/black';
    $USER_icon_set_white = "monochromatic/white";
  }
    
  if($_GET['no_text'] != 'y'){ ?>
    <!DOCTYPE html>
    <div class="background_agent" id="background_agent"></div>
    <div class="emergency">
      <div style="color: white; top: 15%; left: 47%; position: absolute"><span style="font-size: 30px; font-size: 15.5vw;">!</span></div>
      <p style="color: white; top: 50%; left: 40%; position: absolute"><span style="font-size: 20px; font-size: 3.5vw; font-family: 'Roboto'"><?= $TRAD_emergency ?></span></p>
    </div>
    <script type="text/javascript">
      console.log('Do Not Track attivo');
    </script>
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
	$(".background_agent").load("<?= $MY_MAIN_DIRECTORY ?>/keep_user_alive.php");
      }, 300000); <?php // 300000 every 5 minutes ?>
    </script>
    <div class="cookie_bar" style="display: none"><?= $TRAD_cookie ?><span onclick="AcceptAndCloseCookieBar()" style="float: right; cursor: pointer"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
    <?php
  }
?>