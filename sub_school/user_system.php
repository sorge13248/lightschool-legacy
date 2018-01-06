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
	  return "not_exists";
	}
      }
      
      if($numUSER == 1){
	while($row = $rs->fetch_assoc()){
	  $USER_FOUND_uniqueid = $row['UserID'];
	  $USER_FOUND_name = $row['name'];
	  $USER_FOUND_surname = $row['surname'];
	  $USER_FOUND_password = $row['Password'];
	  $USER_FOUND_username = $row['Username'];
	  $USER_FOUND_email = $row['EmailAddress'];
	  $USER_FOUND_type = $row['User_type'];
	  $USER_FOUND_DOC_subject = $row['DOC_subject'];
	  $USER_FOUND_max_file_size = $row['max_file_size'];
	  $USER_FOUND_pwd_changed = $row['pwd_changed'];
	  $USER_FOUND_event = $row['event'];
	  $USER_FOUND_date_of_birth = $row['date_of_birth'];
	  $USER_FOUND_message = $row['message'];
	  $USER_FOUND_as_read = $row['as_read'];
	  $USER_FOUND_sex = $row['sex'];
	  $USER_FOUND_LS_version = $row['version'];
	  $USER_FOUND_bubble_main_menu = $row['bubble_main_menu'];
	  
	  $USER_FOUND_first_login = $row['first_login'];
	  $USER_FOUND_fastnote = $row['fastnote'];
	  $USER_FOUND_accent = $row['accent'];
	  $USER_FOUND_skin = $row['skin'];
	  $USER_FOUND_taskbar = $row['taskbar'];
	  if($row['profile_image'] == 'default' or $row['profile_image'] == ''){
	    $USER_FOUND_image = $IMAGES_MAIN_DIRECTORY.'/'.$_SESSION['USER_icon_set2'].'/profile_'.$USER_FOUND_sex.'.png';
	  }else{
	    $USER_FOUND_image = '//my.lightschool.it/'.$row['profile_image'];
	  }
	  $USER_FOUND_background = $row['background'];
	  $USER_FOUND_transparent = $row['transparent'];
	  $USER_FOUND_phone = $row['phone_number'];
	  $USER_FOUND_school = $row['school'];
	  $USER_FOUND_provincia = $row['provincia'];
	  $USER_FOUND_regione = $row['regione'];
	  $USER_FOUND_lim = $row['lim'];
	  $USER_FOUND_dock = $row['use_dock'];
	  $USER_FOUND_files_order = $row['files_order'];
	  $USER_FOUND_files_view = $row['files_view'];
	  $USER_FOUND_email_new_message = $row['email_new_message'];
	  $USER_FOUND_email_new_mark = $row['email_new_mark'];
	  $USER_FOUND_email_new_share = $row['email_new_share'];
	  $USER_FOUND_click_type = $row['click_type'];
	  $USER_FOUND_language = $row['language'];
	  $USER_FOUND_class = $row['class'];
	  $USER_FOUND_autosave_timer = $row['autosave_timer'];
	  $USER_FOUND_accessibility_font = $row['accessibilityfont'];
	  $USER_FOUND_diary_view = $row['diary_view'];
	  $USER_FOUND_visible = $row['visible'];
	  $USER_FOUND_block_list = $row['block_list'];
	  $USER_FOUND_font = $row['font'];
	  
	  $USER_FOUND_send_email_access = $row['send_email_on_access'];
	  $USER_FOUND_access_pc = $row['pc'];
	  $USER_FOUND_access_mobile = $row['mobile'];
	  $USER_FOUND_access_tablet = $row['tablet'];
	  $USER_FOUND_access_winapp = $row['win_app'];
	  $USER_FOUND_access_wpapp = $row['wp_app'];
	  $USER_FOUND_access_control = $row['access_control'];
	  
	  $USER_FOUND_is_beta = $row['is_beta'];
	  $USER_FOUND_win8_beta = $row['is_winbeta'];
	  $USER_FOUND_use_banner = $row['ads'];
	  
	  // registro elettronico
	  $USER_FOUND_assent = $row['assent'];
	  
	  $USER_FOUND_uniqueid = $conn->real_escape_string($USER_FOUND_uniqueid);
	  $USER_FOUND_name = $conn->real_escape_string($USER_FOUND_name);
	  $USER_FOUND_surname = $conn->real_escape_string($USER_FOUND_surname);
	  $USER_FOUND_password = $conn->real_escape_string($USER_FOUND_password);
	  $USER_FOUND_username = $conn->real_escape_string($USER_FOUND_username);
	  $USER_FOUND_email = $conn->real_escape_string($USER_FOUND_email);
	  $USER_FOUND_type = $conn->real_escape_string($USER_FOUND_type);
	  
	  $USER_FOUND_DOC_subject = $conn->real_escape_string($USER_FOUND_DOC_subject);
	  $USER_FOUND_max_file_size = $conn->real_escape_string($USER_FOUND_max_file_size);
	  $USER_FOUND_pwd_changed = $conn->real_escape_string($USER_FOUND_pwd_changed);
	  $USER_FOUND_event = $conn->real_escape_string($USER_FOUND_event);    
	  $USER_FOUND_date_of_birth = $conn->real_escape_string($USER_FOUND_date_of_birth);
	  $USER_FOUND_message = $conn->real_escape_string($USER_FOUND_message);
	  $USER_FOUND_as_read = $conn->real_escape_string($USER_FOUND_as_read);
	  $USER_FOUND_LS_version = $conn->real_escape_string($USER_FOUND_LS_version);
	  $USER_FOUND_bubble_main_menu = $conn->real_escape_string($USER_FOUND_bubble_main_menu);
	  
	  $USER_FOUND_first_login = $conn->real_escape_string($USER_FOUND_first_login);
	  $USER_FOUND_fastnote = $conn->real_escape_string($USER_FOUND_fastnote);
	  $USER_FOUND_accent = $conn->real_escape_string($USER_FOUND_accent);
	  $USER_FOUND_skin = $conn->real_escape_string($USER_FOUND_skin);
	  $USER_FOUND_taskbar = $conn->real_escape_string($USER_FOUND_taskbar);
	  $USER_FOUND_image = $conn->real_escape_string($USER_FOUND_image); 
	  $USER_FOUND_background = $conn->real_escape_string($USER_FOUND_background);    
	  $USER_FOUND_transparent = $conn->real_escape_string($USER_FOUND_transparent); 
	  $USER_FOUND_phone = $conn->real_escape_string($USER_FOUND_phone);
	  $USER_FOUND_sex = $conn->real_escape_string($USER_FOUND_sex);
	  $USER_FOUND_school = $conn->real_escape_string($USER_FOUND_school);
	  $USER_FOUND_provincia = $conn->real_escape_string($USER_FOUND_provincia);
	  $USER_FOUND_regione = $conn->real_escape_string($USER_FOUND_regione);
	  $USER_FOUND_lim = $conn->real_escape_string($USER_FOUND_lim);
	  $USER_FOUND_dock = $conn->real_escape_string($USER_FOUND_dock);
	  $USER_FOUND_files_order = $conn->real_escape_string($USER_FOUND_files_order);
	  $USER_FOUND_email_new_message = $conn->real_escape_string($USER_FOUND_email_new_message);
	  $USER_FOUND_email_new_mark = $conn->real_escape_string($USER_FOUND_email_new_mark);
	  $USER_FOUND_email_new_share = $conn->real_escape_string($USER_FOUND_email_new_share);
	  $USER_FOUND_click_type = $conn->real_escape_string($USER_FOUND_click_type);
	  $USER_FOUND_language = $conn->real_escape_string($USER_FOUND_language);
	  $USER_FOUND_class = $conn->real_escape_string($USER_FOUND_class);
	  $USER_FOUND_autosave_timer = $conn->real_escape_string($USER_FOUND_autosave_timer);
	  $USER_FOUND_accessibility_font = $conn->real_escape_string($USER_FOUND_accessibility_font);
	  $USER_FOUND_diary_view = $conn->real_escape_string($USER_FOUND_diary_view);
	  $USER_FOUND_visible = $conn->real_escape_string($USER_FOUND_visible);
	  $USER_FOUND_block_list = $conn->real_escape_string($USER_FOUND_block_list);
	  $USER_FOUND_font = $conn->real_escape_string($USER_FOUND_font);
	  
	  $USER_FOUND_access_pc = $conn->real_escape_string($USER_FOUND_access_pc);
	  $USER_FOUND_send_email_access = $conn->real_escape_string($USER_FOUND_send_email_access);
	  $USER_FOUND_access_mobile = $conn->real_escape_string($USER_FOUND_access_mobile);
	  $USER_FOUND_access_tablet = $conn->real_escape_string($USER_FOUND_access_tablet);
	  $USER_FOUND_access_winapp = $conn->real_escape_string($USER_FOUND_access_winapp);
	  $USER_FOUND_access_wpapp = $conn->real_escape_string($USER_FOUND_access_wpapp);
	  $USER_FOUND_access_control = $conn->real_escape_string($USER_FOUND_access_control);
	  
	  $USER_FOUND_is_beta = $conn->real_escape_string($USER_FOUND_is_beta);
	  $USER_FOUND_win8_beta = $conn->real_escape_string($USER_FOUND_win8_beta);
	  $USER_FOUND_use_banner = $conn->real_escape_string($USER_FOUND_use_banner);

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
	  }elseif($get_type == 'assent'){
	    return $USER_FOUND_assent;
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
    
    if($_SESSION['Username'] != ''){
      function lightschool_get_num($Username_function, $get_type){
	$_GET['only_reference'] = 'true';
	include "base.php";

	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn->connect_error) {
	}
	
	$USERNAMESESSIONESCAPE = $conn->real_escape_string($Username_function);
	$sql="SELECT * FROM MY_messages WHERE (Sender = '$USERNAMESESSIONESCAPE' AND Receiving = '".$_SESSION['Username']."') OR (Receiving = '$USERNAMESESSIONESCAPE' AND Sender = '".$_SESSION['Username']."')";

	$rs=$conn->query($sql);

	if($rs === false) {
	} else {
	  $rows_returned = $rs->num_rows;
	}
	$rs->data_seek(0);
	$numUSER = $rs->num_rows;
	
	return $numUSER;
      }
      
      function lightschool_get_register_status($Username_function, $day, $class, $get_type){
	$_GET['only_reference'] = 'true';
	include "base.php";

	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn->connect_error) {
	}
	
	$GETUSERNAMEESCAPE = $conn->real_escape_string($Username_function);
	$GETCLASSESCAPE = $conn->real_escape_string($class);
	$GETDAYSESCAPE = $conn->real_escape_string($day);
	
	if($GETDAYSESCAPE == ''){
	  $GETDAYSESCAPE = date("d/m/Y");
	}
	
	$sql="SELECT * FROM MY_REG_appello WHERE day = '$GETDAYSESCAPE' AND class = '$GETCLASSESCAPE' LIMIT 1";

	$rs=$conn->query($sql);

	if($rs === false) {
	} else {
	  $rows_returned = $rs->num_rows;
	}
	$rs->data_seek(0);
	$num = $rs->num_rows;
	
	if($num == 0){
	  return '';
	}else{
	  while($GENERAL_row = $rs->fetch_assoc()){
	    $REGISTER_present = $GENERAL_row['present'];
	    $REGISTER_absent = $GENERAL_row['absent'];
	  }
	  
	  $REGISTER_present = explode(", ", $REGISTER_present);
	  $REGISTER_absent = explode(", ", $REGISTER_absent);
	  
	  if(!in_array("$GETUSERNAMEESCAPE", $REGISTER_absent)){
	    return 'darkgreen';
	  }elseif(in_array("$GETUSERNAMEESCAPE", $REGISTER_absent)){ 
	    return 'red';
	  }
	}
      }
      
      function lightschool_is_class_correct($class){
	$_GET['only_reference'] = 'true';
	include "base.php";
	
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn->connect_error) {
	}
	
	$GETCLASSESCAPE = $conn->real_escape_string($class);
	
	$sql="SELECT * FROM MY_REG_class WHERE school = '".$_SESSION['USER_code_school']."' AND id = '$GETCLASSESCAPE' AND Component like '%".$_SESSION['Username']."%'";
	
	$rs=$conn->query($sql);

	if($rs === false) {
	} else {
	  $rows_returned = $rs->num_rows;
	}
	$rs->data_seek(0);
	$num = $rs->num_rows;
	
	if($num == 0){
	  return 'error';
	}else{
	  while($GENERAL_row = $rs->fetch_assoc()){
	    $REGISTER_component = $GENERAL_row['Component'];
	  }
	  
	  $REGISTER_component = explode(", ", $REGISTER_component);
	  
	  if(in_array($_SESSION['Username'], $REGISTER_component)){
	    return 'ok';
	  }else{
	    return 'error';
	  }
	}
      }
      
      function lightschool_is_school_class_correct($class){
	$_GET['only_reference'] = 'true';
	include "base.php";

	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn->connect_error) {
	}
	
	$GETCLASSESCAPE = $conn->real_escape_string($class);
	
	$sql="SELECT * FROM MY_REG_class WHERE school = '".$_SESSION['USER_code_school']."' AND id = '$GETCLASSESCAPE'";
	
	$rs=$conn->query($sql);

	if($rs === false) {
	} else {
	  $rows_returned = $rs->num_rows;
	}
	$rs->data_seek(0);
	$num = $rs->num_rows;
	
	if($num == 0){
	  return 'error';
	}else{
	  return 'ok';
	}
      }
      
      function lightschool_get_present_status($day, $class, $get_type){
	$_GET['only_reference'] = 'true';
	include "base.php";

	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn->connect_error) {
	}
	
	$GETUSERNAMEESCAPE = $conn->real_escape_string($Username_function);
	$GETCLASSESCAPE = $conn->real_escape_string($class);
	$GETDAYSESCAPE = $conn->real_escape_string($day);
	
	if($GETDAYSESCAPE == ''){
	  $GETDAYSESCAPE = date("d/m/Y");
	}
	
	$sql="SELECT * FROM MY_REG_appello WHERE day = '$GETDAYSESCAPE' AND class = '$GETCLASSESCAPE' LIMIT 1";
	$rs=$conn->query($sql);

	if($rs === false) {
	} else {
	  $rows_returned = $rs->num_rows;
	}
	$rs->data_seek(0);
	$num = $rs->num_rows;
	
	if($num == 0){
	  return '';
	}else{
	  while($GENERAL_row = $rs->fetch_assoc()){
	    $REGISTER_present = $GENERAL_row['present'];
	    $REGISTER_absent = $GENERAL_row['absent'];
	  }
	  
	  $REGISTER_present = explode(", ", $REGISTER_present);
	  $REGISTER_absent = explode(", ", $REGISTER_absent);
	  
	  if($get_type == 'present'){
	    return $REGISTER_present;
	  }elseif($get_type == 'absent'){
	    return $REGISTER_absent;
	  }
	}
      }
      
      function lightschool_is_user_member($class, $Username_function){
	$_GET['only_reference'] = 'true';
	include "base.php";

	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn->connect_error) {
	}
	
	$GETCLASSESCAPE = $conn->real_escape_string($class);
	$GETUSERNAMEESCAPE = $conn->real_escape_string($Username_function);
	
	$sql="SELECT * FROM MY_REG_class WHERE id = '$GETCLASSESCAPE' AND Component like '%$GETUSERNAMEESCAPE%' LIMIT 1";
	$rs=$conn->query($sql);

	if($rs === false) {
	} else {
	  $rows_returned = $rs->num_rows;
	}
	$rs->data_seek(0);
	$num = $rs->num_rows;
	
	if($num == 0){
	  return '';
	}else{
	  while($GENERAL_row = $rs->fetch_assoc()){
	    $REGISTER_Component = $GENERAL_row['Component'];
	  }
	  
	  $REGISTER_Component = explode(", ", $REGISTER_Component);
	  
	  if(in_array($Username_function, $REGISTER_Component)){
	    return 'ok';
	  }else{
	    return $REGISTER_Component;
	  }
	}
      }
      
      function generateRandomString($length) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
	    $randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
      }
      
      function lightschool_get_folder_element_num($id){
	$_GET['only_reference'] = 'true';
	include "base.php";

	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn->connect_error) {
	}
	
	$GETIDESCAPE = $conn->real_escape_string($id);
	
	$sql="SELECT * FROM MY_files WHERE folder = '$GETIDESCAPE'";
	$rs=$conn->query($sql);

	if($rs === false) {
	} else {
	  $rows_returned = $rs->num_rows;
	}
	$rs->data_seek(0);
	$num = $rs->num_rows;
	
	return $num;
      }
      
      function lightschool_get_register_marks($class, $Username_function, $subject, $mark_type){
	$_GET['only_reference'] = 'true';
	include "base.php";
	
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn->connect_error) {
	
	}
	$GETCLASSESCAPE = $conn->real_escape_string($class);
	$GETUSERNAMEESCAPE = $conn->real_escape_string($Username_function);
	$subject = $GENERAL_conn->real_escape_string($subject);
	
	$sql="SELECT * FROM MY_REG_marks WHERE Username = '".$_SESSION['Username']."' AND Student = '$GETUSERNAMEESCAPE' AND class = '$GETCLASSESCAPE' AND subject = '$subject' AND type = '$mark_type' ORDER BY subject";
	$rs=$conn->query($sql);

	if($rs === false) {
	  echo "false";
	} else {
	  $rows_returned = $rs->num_rows;
	}
	$rs->data_seek(0);
	$num = $rs->num_rows;
	
	
	if($num > 0){
	  while($row = $rs->fetch_assoc()){
	    $mark = $row['mark'];
	    $mark_id = $row['id'];
	    $mark_subject = $row['subject'];
	    
	    $last_subject = $mark_subject;
	    
	    $mark_array = explode('.', $mark);
	    if($mark_array[1] >= 75){
	      $additional = '-';
	      $mark_array[0]++;
	    }elseif($mark_array[1] >= 50){
	      $additional = ' &frac12;';
	    }elseif($mark_array[1] >= 25){
	      $additional = '+';
	    }
	    $class = 'mark mark_';
	    
	    if($mark >= 9){
	      $class .= 'perfect';
	    }elseif($mark >= 6){
	      $class .= 'good';
	    }elseif($mark >= 5.75){
	      $class .= 'soso';
	    }elseif($mark >= 0){
	      $class .= 'bad';
	    }
	    $show .= "&nbsp;<span class='$class' mark_id='$mark_id'>".$mark_array[0].$additional."</span>";
	  }
	  return $show;
	}
      }
      
      function lightschool_get_lesson($lesson_id){
	$_GET['only_reference'] = 'true';
	include "base.php";
	
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn->connect_error) {
	
	}
	$lesson_id = $conn->real_escape_string($lesson_id);
	
	$sql="SELECT * FROM MY_REG_lessons WHERE id = '$lesson_id' AND Username = '".$_SESSION['Username']."' LIMIT 1";
	$rs=$conn->query($sql);

	if($rs === false) {
	  echo "false";
	} else {
	  $rows_returned = $rs->num_rows;
	}
	$rs->data_seek(0);
	$num = $rs->num_rows;
	
	
	if($num == 0){
	  return false;
	}elseif($num == 1){
	  return true;
	}
      }
      
      function lightschool_is_people_id_correct($contact_id, $get_type){
	$_GET['only_reference'] = 'true';
	include "base.php";
	
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if ($conn->connect_error) {
	
	}
	$contact_id = $conn->real_escape_string($contact_id);
	
	$sql="SELECT * FROM MY_peoples WHERE id = '$contact_id' AND Username = '".$_SESSION['Username']."' LIMIT 1";
	$rs=$conn->query($sql);

	if($rs === false) {
	  echo "false";
	} else {
	  $rows_returned = $rs->num_rows;
	}
	$rs->data_seek(0);
	$num = $rs->num_rows;
	
	
	if($num == 0){
	  return false;
	}elseif($num == 1){
	  while($row = $rs->fetch_assoc()){
	    if($get_type == 'ask'){
	      $saved_username = $row['saved_username'];
	    }elseif($get_type == 'name_group'){
	      $saved_username = $row['name'];
	    }elseif($get_type == 'group'){
	      $saved_username = explode(", ", $row['group_username']);
	    }
	    return $saved_username;
	  }
	}
      }
    }
?>