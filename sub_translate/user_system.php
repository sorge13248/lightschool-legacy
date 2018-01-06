<?php
  function secure_data_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  function lightschool_get_user($Username_function, $get_type){
    $_GET['only_reference'] = 'true';
    include "base.php";

    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if ($conn->connect_error) {
    }
    
    $USERNAMESESSIONESCAPE = $conn->real_escape_string($Username_function);
    if($get_type == 'email'){
      $sql="SELECT * FROM MY_users WHERE EmailAddress = '$USERNAMESESSIONESCAPE' AND deactivated = 'n' LIMIT 1";
    }elseif($get_type == 'id_to_username'){
      $sql="SELECT * FROM MY_users WHERE UserID = '$USERNAMESESSIONESCAPE' AND deactivated = 'n' LIMIT 1";
    }elseif($get_type == 'recovery_key'){
      $sql="SELECT * FROM MY_users WHERE recovery_key = '$USERNAMESESSIONESCAPE' LIMIT 1";
    }else{
      $sql="SELECT * FROM MY_users WHERE Username = '$USERNAMESESSIONESCAPE' AND deactivated = 'n' LIMIT 1";
    }
    
    if($get_type == 'complete_to_username'){
      $sql="SELECT * FROM MY_users WHERE concat(surname, ' ', name) = '$USERNAMESESSIONESCAPE' AND deactivated = 'n' LIMIT 1";
    }elseif($get_type == 'activation_code_to_username'){
      $sql="SELECT * FROM MY_users WHERE activation_code = '$USERNAMESESSIONESCAPE' AND deactivated = 'n' AND NOT activation_code = '' LIMIT 1";
    }elseif($get_type == 'email_to_username'){
      $sql="SELECT * FROM MY_users WHERE EmailAddress = '$USERNAMESESSIONESCAPE' AND deactivated = 'n' LIMIT 1";
    }

    $rs=$conn->query($sql);

    if($rs === false) {
    } else {
      $rows_returned = $rs->num_rows;
    }
    $rs->data_seek(0);
    $numUSER = $rs->num_rows;
    
    if($numUSER == 0){
      if($get_type == 'profile_image'){
	return $path_to_unknown_user_image1;
      }else{
	return 'not_exists';
      }
    }
    
    if($numUSER == 1){
      if($get_type == 'recovery_key'){
	return true;
	exit();
      }
      while($row = $rs->fetch_assoc()){
	$USER_FOUND_uniqueid = $conn->real_escape_string($row['UserID']);
	$USER_FOUND_name = $conn->real_escape_string($row['name']);
	$USER_FOUND_surname = $conn->real_escape_string($row['surname']);
	$USER_FOUND_password = $conn->real_escape_string($row['Password']);
	$USER_FOUND_username = $conn->real_escape_string($row['Username']);
	$USER_FOUND_email = $conn->real_escape_string($row['EmailAddress']);
	$USER_FOUND_type = $conn->real_escape_string($row['User_type']);
	$USER_FOUND_DOC_subject = $conn->real_escape_string($row['DOC_subject']);
	$USER_FOUND_pwd_changed = $conn->real_escape_string($row['pwd_changed']);
	$USER_FOUND_event = $conn->real_escape_string($row['event']);
	$USER_FOUND_date_of_birth = $conn->real_escape_string($row['date_of_birth']);
	$USER_FOUND_as_read = $conn->real_escape_string($row['as_read']);
	$USER_FOUND_sex = $conn->real_escape_string($row['sex']);
	$USER_FOUND_LS_version = $conn->real_escape_string($row['version']);
	
	$USER_FOUND_first_login = $conn->real_escape_string($row['first_login']);
	$USER_FOUND_fastnote = $conn->real_escape_string($row['fastnote']);
	$USER_FOUND_accent = $conn->real_escape_string($row['accent']);
	if($row['profile_image'] == 'default' or $row['profile_image'] == ''){
	  $USER_FOUND_image = $IMAGES_MAIN_DIRECTORY.'/'.$_SESSION['USER_icon_set2'].'/profile_'.$USER_FOUND_sex.'.png';
	}else{
	  $USER_FOUND_image = '//my.lightschool.it/'.$conn->real_escape_string($row['profile_image']);
	}
	$USER_FOUND_background = $conn->real_escape_string($row['background']);
	$USER_FOUND_transparent = $conn->real_escape_string($row['transparent']);
	$USER_FOUND_phone = $conn->real_escape_string($row['phone_number']);
	$USER_FOUND_provincia = $conn->real_escape_string($row['provincia']);
	$USER_FOUND_regione =$conn->real_escape_string( $row['regione']);
	$USER_FOUND_lim = $conn->real_escape_string($row['lim']);
	$USER_FOUND_files_order = $conn->real_escape_string($row['files_order']);
	$USER_FOUND_files_view = $conn->real_escape_string($row['files_view']);
	$USER_FOUND_email_new_message = $conn->real_escape_string($row['email_new_message']);
	$USER_FOUND_email_new_mark = $conn->real_escape_string($row['email_new_mark']);
	$USER_FOUND_email_new_share = $conn->real_escape_string($row['email_new_share']);
	$USER_FOUND_click_type = $conn->real_escape_string($row['click_type']);
	$USER_FOUND_language = $conn->real_escape_string($row['language']);
	$USER_FOUND_class = $conn->real_escape_string($row['class']);
	$USER_FOUND_autosave_timer = $conn->real_escape_string($row['autosave_timer']);
	$USER_FOUND_visible = $conn->real_escape_string($row['visible']);
	$USER_FOUND_visible_email = $conn->real_escape_string($row['visible_email']);
	$USER_FOUND_visible_school = $conn->real_escape_string($row['visible_school']);
	$USER_FOUND_block_list = $conn->real_escape_string($row['block_list']);
	
	$USER_FOUND_send_email_access = $conn->real_escape_string($row['send_email_on_access']);
	$USER_FOUND_access_pc = $conn->real_escape_string($row['pc']);
	$USER_FOUND_access_mobile = $conn->real_escape_string($row['mobile']);
	$USER_FOUND_access_tablet = $conn->real_escape_string($row['tablet']);
	$USER_FOUND_access_winapp = $conn->real_escape_string($row['win_app']);
	$USER_FOUND_access_wpapp = $conn->real_escape_string($row['wp_app']);
	$USER_FOUND_access_control = $conn->real_escape_string($row['access_control']);
	
	// registro elettronico
	if($get_type == 'assent'){
	  return $conn->real_escape_string($row['assent']);
	}elseif($get_type == 'ritardi'){
	  return $conn->real_escape_string($row['ritardi']);
	}elseif($get_type == 'uscite'){
	  return $conn->real_escape_string($row['uscite']);
	}

	if($USER_FOUND_date_of_birth == ''){
	  $USER_FOUND_date_of_birth = 'Non specificata';
	}
	
	// registro elettronico
	$USER_FOUND_assent = $conn->real_escape_string($USER_FOUND_assent);
	
	$USER_FOUND_accent_NOHASH = substr($USER_FOUND_accent, 1);
	
	if($get_type == 'id'){
	  return $USER_FOUND_uniqueid;
	}elseif($get_type == 'username' or $get_type == 'id_to_username' or $get_type == 'activation_code_to_username' or $get_type == 'email_to_username'){
	  return $USER_FOUND_username;
	}elseif($get_type == 'name'){
	  return $USER_FOUND_name;
	}elseif($get_type == 'surname'){
	  return $USER_FOUND_surname;
	}elseif($get_type == 'password'){
	  return $USER_FOUND_password;
	}elseif($get_type == 'name_surname'){
	  return $USER_FOUND_name.' '.$USER_FOUND_surname;
	}elseif($get_type == 'email_address'){
	  return $USER_FOUND_email;
	}elseif($get_type == 'profile_image'){
	  return $USER_FOUND_image;
	}elseif($get_type == 'type'){
	  return $USER_FOUND_type;
	}elseif($get_type == 'date_of_birth'){
	  return $USER_FOUND_date_of_birth;
	}elseif($get_type == 'complete_to_username'){
	  return $USER_FOUND_username;
	}elseif($get_type == 'first_login'){
	  return $USER_FOUND_first_login;
	}elseif($get_type == 'access_control'){
	  return $USER_FOUND_access_control;
	}elseif($get_type == 'accent_color'){
	  return $USER_FOUND_accent;
	}elseif($get_type == 'DOC_subject'){
	  return $USER_FOUND_DOC_subject;
	}elseif($get_type == 'visible'){
	  return $USER_FOUND_visible;
	}elseif($get_type == 'visible_email'){
	  return $USER_FOUND_visible_email;
	}elseif($get_type == 'visible_school'){
	  return $USER_FOUND_visible_school;
	}elseif($get_type == 'school'){
	  $USER_FOUND_code_school = $conn->real_escape_string($row['code_school']);
	  return $USER_FOUND_code_school;
	}else{
	  return true;
	}
      }
    }
  }
    
  function lightschool_get_ip_status($Username_function, $get_ip){
      $_GET['only_reference'] = 'true';
      include "base.php";
      
      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

      // check connection
      if ($conn->connect_error) {
      }
      
      $Username_function = $conn->real_escape_string($Username_function);
      $get_ip = $conn->real_escape_string($get_ip);
      
      $sql="SELECT * FROM MY_access WHERE Username = '$Username_function' AND ip = '$get_ip' LIMIT 1";

      $rs=$conn->query($sql);

      if($rs === false) {
      } else {
	$rows_returned = $rs->num_rows;
      }
      $rs->data_seek(0);
      $num = $rs->num_rows;
      
      if($num == 0){
	return 'add';
      }else{
	while($GENERAL_row = $rs->fetch_assoc()){
	  $allow = $GENERAL_row['allow'];
	}
	
	if($allow == 'y'){
	  return 'allow';
	}else{
	  return 'block';
	}
      }
    }
  
  function lightschool_get_ip($Username_function, $get_ip, $get_type){
      $_GET['only_reference'] = 'true';
      include "base.php";
      
      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

      // check connection
      if ($conn->connect_error) {
      }
      
      $Username_function = $conn->real_escape_string($Username_function);
      $get_ip = $conn->real_escape_string($get_ip);
      $get_type = $conn->real_escape_string($get_type);
      
      $sql="SELECT * FROM MY_access WHERE Username = '$Username_function' AND ip = '$get_ip' LIMIT 1";

      $rs=$conn->query($sql);

      if($rs === false) {
      } else {
	$rows_returned = $rs->num_rows;
      }
      $rs->data_seek(0);
      $num = $rs->num_rows;
      
      if($num == 0){
	return false;
      }else{
	while($GENERAL_row = $rs->fetch_assoc()){
	  if($get_type == 'id'){
	    $return = $GENERAL_row['id'];
	  }elseif($get_type == 'agent'){
	    $return = $GENERAL_row['agent'];
	    
	    if($return == ''){
	      $return = "<span style='font-size: 10pt; color: gray'>$TRAD_user_agent_not_available</span>";
	    }
	  }
	  
	  return $return;
	}
      }
    }
  
  function check_translation($Username_function, $get_lang, $get_type){
    $_GET['only_reference'] = 'true';
    include "base.php";
    
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName4);

    // check connection
    if ($conn->connect_error) {
    }
    
    $Username_function = $conn->real_escape_string($Username_function);
    $get_lang = $conn->real_escape_string($get_lang);
    $get_type = $conn->real_escape_string($get_type);
    
    $sql="SELECT * FROM translations WHERE Username = '$Username_function' AND language = '$get_lang' LIMIT 1";

    $rs=$conn->query($sql);

    if($rs === false) {
    } else {
      $rows_returned = $rs->num_rows;
    }
    $rs->data_seek(0);
    $num = $rs->num_rows;
    
    if($num == 0){
      return false;
    }else{
      return true;
    }
  }
?>