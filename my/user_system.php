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
  
  function lightschool_recovery_pwd($variable1, $variable2){
    $_GET['only_reference'] = 'true';
    include "base.php";
    
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if ($conn->connect_error) {
    
    }
    $variable1 = $conn->real_escape_string($variable1);
    $variable2 = $conn->real_escape_string(md5($variable2));
    
    $sql = "UPDATE MY_users SET Password = '$variable2', recovery_key = '', pwd_changed = '$date_now_IT_HR' WHERE recovery_key = '$variable1'";
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
    }else{
      return true;
    }
  }
  
  function lightschool_register_justify($get_student, $get_date, $get_type, $get_class){
    $_GET['only_reference'] = 'true';
    include "base.php";
    
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if ($conn->connect_error) {
    
    }
    $get_student = $conn->real_escape_string($get_student);
    $get_date = $conn->real_escape_string($get_date);
    $get_type = $conn->real_escape_string($get_type);
    $get_class = $conn->real_escape_string($get_class);
    
    if($get_type == 'add_assent'){
      $sql = "INSERT INTO MY_REG_justify (Docente, Studente, class, date, type2) VALUES ('".$_SESSION['Username']."', '$get_student', '$get_class', '$get_date', 'assent')";
    }
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
    }else{
      return true;
    }
  }
  
  function lightschool_get_justify($get_student, $get_type, $get_justified, $get_date){
    $_GET['only_reference'] = 'true';
    include "base.php";
    
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if ($conn->connect_error) {
    
    }
    $get_student = $conn->real_escape_string($get_student);
    $get_type = $conn->real_escape_string($get_type);
    $get_justified = $conn->real_escape_string($get_justified);
    $get_date = $conn->real_escape_string($get_date);
    
    if($get_date != ""){
      $sql = "SELECT * FROM MY_REG_justify WHERE Studente = '$get_student' AND date = '$get_date' AND type2 = '$get_type' LIMIT 1";
    }else{
      $sql = "SELECT * FROM MY_REG_justify WHERE Studente = '$get_student' AND justified = '0' LIMIT 1";
    }
    $rs=$conn->query($sql);

    if($rs === false) {
      echo "false";
    } else {
      $rows_returned = $rs->num_rows;
    }
    $rs->data_seek(0);
    $num = $rs->num_rows;
    
    if($get_justified == 'hour' and ($get_type == 'ritardi' or $get_type == 'uscite')){
      while($GENERAL_row = $rs->fetch_assoc()){
	$return = $GENERAL_row['more'];
	return $return;
      }
    }else{
      return $num;
    }
  }
  
  function lightschool_mark_read($Sender_username, $Username_function){
    $_GET['only_reference'] = 'true';
    include "base.php";
    
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if ($conn->connect_error) {
    
    }
    $Sender_username = $conn->real_escape_string($Sender_username);
    $Username_function = $conn->real_escape_string($Username_function);
    
    $sql = "UPDATE MY_messages SET is_read = '$date_now_IT_HR' WHERE Sender = '$Sender_username' AND Receiving = '$Username_function' AND is_read = 'n'";
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
    }else{
      return true;
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
	
	if(in_array("$GETUSERNAMEESCAPE", $REGISTER_present)){
	  $return = 'darkgreen';
	}else{ 
	  $return = 'transparent';
	}
	if(in_array("$GETUSERNAMEESCAPE", $REGISTER_absent)){ 
	  $return = 'red';
	}
	return $return;
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
      
      $sql="SELECT * FROM MY_REG_class WHERE school IN ('".implode($_SESSION['USER_code_school'], "', '")."') AND id = '$GETCLASSESCAPE'";
      
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
    
    function lightschool_get_file($file_id, $get_type){
      $_GET['only_reference'] = 'true';
      include "base.php";
      
      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

      // check connection
      if ($conn->connect_error) {
      
      }
      $contact_id = $conn->real_escape_string($contact_id);
      
      $sql="SELECT * FROM MY_files WHERE id = '$file_id' AND Username = '".$_SESSION['Username']."' LIMIT 1";
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
	  if($get_type == 'name'){
	    $return = $row['name'];
	  }elseif($get_type == 'html'){
	    $return = $row['html'];
	  }elseif($get_type == 'f'){
	    $return = $row['folder'];
	  }elseif($get_type == 'fav'){
	    $return = $row['fav'];
	  }elseif($get_type == 'create_date'){
	    $return = $row['create_date'];
	  }
	  return $return;
	}
      }
    }
    
    function lightschool_get_lim($lim_id, $get_type){
      $_GET['only_reference'] = 'true';
      include "base.php";
      
      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

      // check connection
      if ($conn->connect_error) {
      
      }
      $lim_id = $conn->real_escape_string($lim_id);
      
      $sql="SELECT * FROM MYLIM_users WHERE Username = '$lim_id' LIMIT 1";
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
	  if($get_type == 'id'){
	    $return = $row['UserID'];
	  }
	  return $return;
	}
      }
    }
  }
  
  function getUserAgent($agent){
    if(empty($agent)){
      $agent = $_SERVER['HTTP_USER_AGENT'];
    }
    if(stripos($agent, 'Firefox') !== false ){
      $agent = 'firefox';
    }elseif (stripos($agent, 'MSIE') !== false ){
      $agent = 'ie';
    }elseif (stripos($agent, 'iPad') !== false ){
      $agent = 'ipad';
    }elseif (stripos($agent, 'Android') !== false ){
      $agent = 'android';
    }elseif (stripos($agent, 'Chrome') !== false ){
      $agent = 'chrome';
    }elseif(stripos($agent, 'Safari') !== false ){
      $agent = 'safari';
    }elseif(stripos($agent, 'AIR') !== false ){
      $agent = 'air';
    }elseif(stripos($agent, 'Fluid') !== false ){
      $agent = 'fluid';
    }
    return $agent;
  }
  
  function lightschool_get_marks($Username_function, $Student_function, $get_class, $get_subject, $get_type_mark, $get_type, $between_dates){
    $_GET['only_reference'] = 'true';
    include "base.php";
    
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if ($conn->connect_error) {
    
    }
    $Username_function = $conn->real_escape_string($Username_function);
    $Student_function = $conn->real_escape_string($Student_function);
    $get_class = $conn->real_escape_string($get_class);
    $get_subject = $conn->real_escape_string($get_subject);
    $get_type_mark = $conn->real_escape_string($get_type_mark);
    $get_type = $conn->real_escape_string($get_type);
    
    $between_dates0 = $between_dates[0];
    $between_dates1 = $between_dates[1];
    
    $between_dates0 = DateTime::createFromFormat('d/m/Y', $between_dates0);
    $between_dates0 = $between_dates0->format('Y-m-d');
    
    $between_dates1 = DateTime::createFromFormat('d/m/Y', $between_dates1);
    $between_dates1 = $between_dates1->format('Y-m-d');
    
    $sql="SELECT * FROM MY_REG_marks WHERE Username = '$Username_function' AND Student = '$Student_function' AND class = '$get_class' AND subject = '$get_subject' AND type = '$get_type_mark' AND STR_TO_DATE(date,'%d/%m/%Y') >= '$between_dates0' AND STR_TO_DATE(date,'%d/%m/%Y') <  '$between_dates1' ORDER BY STR_TO_DATE(date,'%d/%m/%Y')";
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
    }else{
      while($row = $rs->fetch_assoc()){
	if($get_type == 'id'){
	  $return = $row['id'];
	}elseif($get_type == 'value' or $get_type == 'graph1' or $get_type == 'graph2'){
	  $mark_subject = $row['subject'];
	  $mark = $row['mark'];
	  
	  if($mark == 'plus'){
	    $return .= "<span class='mark mark_good' mark_id='$mark_id' style='margin-right: 5px'>+";
	    if($get_type == 'graph1'){
	      $return .= "<br/><font style='font-size: 8pt'>".strtoupper($get_type_mark)." $date</font>";
	    }
	    $return .= "</span>";
	  }elseif($mark == 'minus'){
	    $return .= "<span class='mark mark_bad' mark_id='$mark_id' style='margin-right: 5px'>-";
	    if($get_type == 'graph1'){
	      $return .= "<br/><font style='font-size: 8pt'>".strtoupper($get_type_mark)." $date</font>";
	    }
	    $return .= "</span>";
	  }elseif($mark == 0){
	    $return .= "<span class='mark mark_never_mind' mark_id='$mark_id' style='margin-right: 5px'>n.c.";
	    if($get_type == 'graph1'){
	      $return .= "<br/><font style='font-size: 8pt'>".strtoupper($get_type_mark)." $date</font>";
	    }
	    $return .= "</span>";
	  }else{
	    if($get_type == 'value'){
	      $return = $mark;
	    }elseif($get_type == 'graph1' or $get_type == 'graph2'){
	      $date = substr($row['date'], 0, 5);
	      
	      $mark_array = explode('.', $mark);
	      
	      if($mark_array[1] >= 75){
		$additional = '-';
		$mark_array[0]++;
	      }elseif($mark_array[1] >= 50){
		$additional = ' &frac12;';
	      }elseif($mark_array[1] >= 25){
		$additional = '+';
	      }else{
		$additional = '';
	      }
	      
	      $class = 'mark mark_';
	      
	      if($mark >= 9){
		$class .= 'perfect';
	      }elseif($mark >= 6){
		$class .= 'good';
	      }elseif($mark >= 5.75){
		$class .= 'soso';
	      }elseif($mark >= 3){
		$class .= 'bad';
	      }elseif($mark >= 0){
		$class .= 'never_mind';
	      }
	      
	      $return .= "<span class='$class' mark_id='$mark_id' style='margin-right: 5px'>".$mark_array[0].$additional;
	      if($get_type == 'graph1'){
		$return .= "<br/><font style='font-size: 8pt'>".strtoupper($get_type_mark)." $date</font>";
	      }
	      $return .= "</span>";
	    }
	  }
	}
      }
      return $return;
    }
  }
  
  function lightschool_get_marks_media($Username_function, $Student_function, $get_class, $get_subject, $get_type, $between_dates){
    $_GET['only_reference'] = 'true';
    include "base.php";
    
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if ($conn->connect_error) {
    
    }
    $Username_function = $conn->real_escape_string($Username_function);
    $Student_function = $conn->real_escape_string($Student_function);
    $get_class = $conn->real_escape_string($get_class);
    $get_subject = $conn->real_escape_string($get_subject);
    $get_type = $conn->real_escape_string($get_type);
    
    $between_dates0 = $between_dates[0];
    $between_dates1 = $between_dates[1];
    
    $between_dates0 = DateTime::createFromFormat('d/m/Y', $between_dates0);
    $between_dates0 = $between_dates0->format('Y-m-d');
    
    $between_dates1 = DateTime::createFromFormat('d/m/Y', $between_dates1);
    $between_dates1 = $between_dates1->format('Y-m-d');
    
    $sql="SELECT * FROM MY_REG_marks WHERE Username = '$Username_function' AND Student = '$Student_function' AND class = '$get_class' AND subject = '$get_subject' AND STR_TO_DATE(date,'%d/%m/%Y') >= '$between_dates0' AND STR_TO_DATE(date,'%d/%m/%Y') <  '$between_dates1' AND NOT type = 'scrutini'";
    $rs=$conn->query($sql);

    if($rs === false) {
      echo "false";
    } else {
      $rows_returned = $rs->num_rows;
    }
    $rs->data_seek(0);
    $num = $rs->num_rows;
    
    if($get_type != 'scrutini'){
      $date_row = "<br/><font style='font-size: 8pt'>No voto</font>";
      $date_row2 = "<br/><font style='font-size: 8pt'>Media</font>";
    }
    
    if($num == 0){
      $return = array("<span class='mark mark_never_mind' style='cursor: help' title='Non ci sono voti per fare una media'>n.c.$date_row</span>", "0");
    }else{
      $MARKS_MEDIA = array();
      $relative_marks = 0;
      
      while($row = $rs->fetch_assoc()){
	$mark = $row['mark'];
	
	if($mark == 'plus'){
	  $relative_marks += 0.25;
	}elseif($mark == 'minus'){
	  $relative_marks -= 0.25;
	}else{
	  array_push($MARKS_MEDIA, $mark);
	}
      }
      $sum = 0;
      
      foreach($MARKS_MEDIA as $i){
	$sum += $i;
      }
      
      $media = $sum / count($MARKS_MEDIA);
      $media_round = round($media, 2);
      $media_round += $relative_marks;
      $media_array = explode('.', $media_round);
      
      if($media_array[1] >= 75){
	$additional = '-';
	$media_array[0]++;
      }elseif($media_array[1] >= 50 or $media_array[1] == 5){
	$additional = ' &frac12;';
      }elseif($media_array[1] >= 25){
	$additional = '+';
      }else{
	$additional = '';
      }
      
      $class = 'mark mark_';
      
      if($media_round >= 9){
	$class .= 'perfect';
      }elseif($media_round >= 6){
	$class .= 'good';
      }elseif($media_round >= 5.75){
	$class .= 'soso';
      }elseif($media_round >= 3){
	$class .= 'bad';
      }elseif($media_round >= 0){
	$class .= 'never_mind';
      }
      
      $return = array("<span class='$class'>".$media_array[0].$additional."$date_row2</span>", $media_round);
    }
    return $return;
  }
  
  function lightschool_get_school_details($Username_function, $School_function, $get_type){
    $_GET['only_reference'] = 'true';
    include "base.php";
    
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName3);

    // check connection
    if ($conn->connect_error) {
    
    }
    $Username_function = $conn->real_escape_string($Username_function);
    $School_function = $conn->real_escape_string($School_function);
    $get_type = $conn->real_escape_string($get_type);
    
    if($get_type == 'periodo'){
      $sql="SELECT * FROM SC_period WHERE school_id = '$School_function' LIMIT 1";
    }else{
      $sql="SELECT * FROM SC_users WHERE UserID = '$School_function' LIMIT 1";
    }
    $rs=$conn->query($sql);

    if($rs === false) {
      echo "false";
    } else {
      $rows_returned = $rs->num_rows;
    }
    $rs->data_seek(0);
    $num = $rs->num_rows;
    
    if($num == 0){
      $return = false;
    }else{
      while($row = $rs->fetch_assoc()){
	if($get_type == 'periodo'){
	  $first_quad = $row['first'];
	  $second_quad = $row['second'];
	  
	  $first_quad = explode(", ", $first_quad);
	  $second_quad = explode(", ", $second_quad);
	  
	  $return = array($first_quad[0], $first_quad[1], $second_quad[0], $second_quad[1]);
	}elseif($get_type == 'name'){
	  $name = $row['name'];
	  $return = $name;
	}
      }
    }
    return $return;
  }
  
  function lightschool_get_class_details($Username_function, $Class_function, $get_type){
    $_GET['only_reference'] = 'true';
    include "base.php";
    
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if ($conn->connect_error) {
    
    }
    $Username_function = $conn->real_escape_string($Username_function);
    $Class_function = $conn->real_escape_string($Class_function);
    $get_type = $conn->real_escape_string($get_type);
    
    $sql="SELECT * FROM MY_REG_class WHERE id = '$Class_function' LIMIT 1";
    $rs=$conn->query($sql);

    if($rs === false) {
      echo "false";
    } else {
      $rows_returned = $rs->num_rows;
    }
    $rs->data_seek(0);
    $num = $rs->num_rows;
    
    if($num == 0){
      $return = false;
    }else{
      while($row = $rs->fetch_assoc()){
	if($get_type == "school_id"){
	  $return = $row['school'];
	}elseif($get_type == "class_year"){
	  $return = $row['year'];
	}elseif($get_type == "blocked"){
	  $return = $row['blocked'];
	}elseif($get_type == 'periodo'){
	  $first_quad = $row['first'];
	  $second_quad = $row['second'];
	  
	  $first_quad = explode(", ", $first_quad);
	  $second_quad = explode(", ", $second_quad);
	  
	  $return = array($first_quad[0], $first_quad[1], $second_quad[0], $second_quad[1]);
	}
      }
    }
    return $return;
  }
?>