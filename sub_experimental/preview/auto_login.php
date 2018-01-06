<?php
  if($_COOKIE['LOGIN_username'] != '' and $_COOKIE['LOGIN_password'] != '' and $_SESSION['Username'] == ''){
    $DBServer = 'localhost';
    $DBUser   = 'DB_USER_VALUE';
    $DBPass   = '';
    $DBName   = 'DB_DATABASE_VALUE';
    
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
    $ESCAPE_username = $conn->real_escape_string($_COOKIE['LOGIN_username']);
    $ESCAPE_password = $conn->real_escape_string($_COOKIE['LOGIN_password']);
    $sql="SELECT * FROM MY_users WHERE Username = '$ESCAPE_username' AND Password = '$ESCAPE_password' AND (deactivated = 'n' OR deactivated <= 15) LIMIT 1";

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

    if($numUSER == 1){
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
	$USER_max_file_size = $row['max_file_size'];
	$USER_pwd_changed = $row['pwd_changed'];
	$USER_event = $row['event'];
	$USER_date_of_birth = $row['date_of_birth'];
	$USER_message = $row['message'];
	$USER_as_read = $row['as_read'];
	$USER_sex = $row['sex'];
	$USER_LS_version = $row['version'];
	$USER_bubble_main_menu = $row['bubble_main_menu'];
	$USER_deactivated = $row['deactivated'];
	
	$USER_first_login = $row['first_login'];
	$USER_fastnote = $row['fastnote'];
	$USER_accent = $row['accent'];
	$USER_skin = $row['skin'];
	$USER_icon_set = $row['icon_set'];
	$USER_taskbar = $row['taskbar'];
	$USER_taskbar_position = $row['taskbar_position'];
	$USER_image = $row['profile_image'];
	$USER_background = $row['background'];
	$USER_transparent = $row['transparent'];
	$USER_button_style = $row['button_style'];
	$USER_phone = $row['phone_number'];
	$USER_school = $row['school'];
	$USER_code_school = $row['code_school'];
	$USER_provincia = $row['provincia'];
	$USER_regione = $row['regione'];
	$USER_lim = $row['lim'];
	$USER_dock = $row['use_dock'];
	$USER_files_order = $row['files_order'];
	$USER_files_view = $row['files_view'];
	$USER_email_new_message = $row['email_new_message'];
	$USER_email_new_mark = $row['email_new_mark'];
	$USER_email_new_share = $row['email_new_share'];
	$USER_click_type = $row['click_type'];
	$USER_language = $row['language'];
	$USER_class = $row['class'];
	$USER_autosave_timer = $row['autosave_timer'];
	$USER_accessibility_font = $row['accessibilityfont'];
	$USER_diary_view = $row['diary_view'];
	$USER_visible = $row['visible'];
	$USER_block_list = $row['block_list'];
	$USER_font = $row['font'];
	
	$USER_send_email_access = $row['send_email_on_access'];
	$USER_access_pc = $row['pc'];
	$USER_access_mobile = $row['mobile'];
	$USER_access_tablet = $row['tablet'];
	$USER_access_androidapp = $row['android_app'];
	$USER_access_winapp = $row['win_app'];
	$USER_access_wpapp = $row['wp_app'];
	$USER_access_control = $row['access_control'];
	
	$USER_is_beta = $row['is_beta'];
	$USER_win8_beta = $row['is_winbeta'];
	$USER_use_banner = $row['ads'];
	
	$USER_uniqueid = $conn->real_escape_string($USER_uniqueid);
	$USER_name = $conn->real_escape_string($USER_name);
	$USER_surname = $conn->real_escape_string($USER_surname);
	$Username = $conn->real_escape_string($Username);
	$_SESSION['Username'] = $Username;
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
	$USER_taskbar_text = $USER_taskbar;
	$USER_taskbar = explode(", ", $USER_taskbar);
	
	$USER_image = $conn->real_escape_string($USER_image); 
	$USER_background = $conn->real_escape_string($USER_background);
	$USER_transparent = $conn->real_escape_string($USER_transparent);
	$USER_button_style = $conn->real_escape_string($USER_button_style);
	$USER_phone = $conn->real_escape_string($USER_phone);
	$USER_sex = $conn->real_escape_string($USER_sex);
	$USER_school = $conn->real_escape_string($USER_school);
	$USER_code_school = $conn->real_escape_string($USER_code_school);
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
	$USER_autosave_timer = $conn->real_escape_string($USER_autosave_timer);
	$USER_accessibility_font = $conn->real_escape_string($USER_accessibility_font);
	$USER_diary_view = $conn->real_escape_string($USER_diary_view);
	$USER_visible = $conn->real_escape_string($USER_visible);
	$USER_block_list = $conn->real_escape_string($USER_block_list);
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
	
	
	if($USER_image != 'default'){
	  $USER_image = $UPLOAD_MAIN_DIRECTORY.'/'.$row['profile_image'];
	  $USER_image2 = $USER_image;
	}else{
	  $USER_image = "$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/profile_$USER_sex.png";
	  $USER_image2 = "$IMAGES_MAIN_DIRECTORY/$USER_icon_set2/profile_$USER_sex.png";
	}
      }
    }else{
      setcookie("LOGIN_username","",time()-3600,"/", ".lightschool.it");
      setcookie("LOGIN_password","",time()-3600,"/", ".lightschool.it");
    }
  }
?>