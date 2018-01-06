<?php
  $_GET['no_text'] = 'y';
  include "base.php";
    
  if($_SESSION['Username'] != ''){
    $date_now = date("d/m/Y H:i:s");
    
    if($_GET['bubble'] == 'remove_main_menu'){
      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
      
      if (mysqli_connect_errno()) {
	exit();
      }
      
      $conn->query("UPDATE MY_users SET bubble_main_menu = 'n' WHERE Username = '$Username' LIMIT 1");
      
      $conn->close();
    }else{
      if($_GET['type'] == 'remove_first_login'){
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	
	if (mysqli_connect_errno()) {
	  exit();
	}
	
	$sql = "UPDATE MY_users SET first_login = 'n' WHERE Username = '$Username' LIMIT 1";
	$conn->query($sql);
	
	$conn->close();
      }elseif($_GET['type'] == 'change_icon'){
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	
	if (mysqli_connect_errno()) {
	  exit();
	}
	
	$icon_name = strtolower($conn->real_escape_string($_POST['icon_name']));
	$file_id = $conn->real_escape_string($_POST['id']);
	$sql = "UPDATE MY_files SET icon = '$icon_name' WHERE Username = '$Username' AND id = '$file_id' LIMIT 1";
	$conn->query($sql);
	
	$conn->close();
	echo("true");
      }elseif($_GET['type'] == 'profile_picture'){
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	
	if (mysqli_connect_errno()) {
	  exit();
	}
	
	$ESCAPE_url = $conn->real_escape_string($_POST['url']);
	
	if($ESCAPE_url == ''){
	  $ESCAPE_url = "default";
	}
	
	$sql = "UPDATE MY_users SET profile_image = '$ESCAPE_url' WHERE Username = '$Username' LIMIT 1";
	$conn->query($sql);
	
	$conn->close();
	
	echo("true");
      }elseif($_GET['type'] == 'change_taskbar'){
	if($_POST['taskbar_size'] != '' and $_POST['taskbar_position'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    exit();
	  }
	  
	  $ESCAPE_position = $conn->real_escape_string($_POST['taskbar_position']);
	  $ESCAPE_size = $conn->real_escape_string($_POST['taskbar_size']);
	  
	  $sql = "UPDATE MY_users SET taskbar_position = '$ESCAPE_position', taskbar_size = '$ESCAPE_size' WHERE Username = '$Username' LIMIT 1";
	  $conn->query($sql);
	  
	  $conn->close();
	  
	  echo("true");
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 19');
	}
      }elseif($_GET['type'] == 'fav_read'){
	$GENERAL_fav = lightschool_get_file($_POST['id'], "fav");
	
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	
	if (mysqli_connect_errno()) {
	  exit();
	}
	
	$ESCAPE_id = $conn->real_escape_string($_POST['id']);
	
	if($GENERAL_fav == 'n'){
	  $sql = "UPDATE MY_files SET fav = 'y' WHERE Username = '$Username' AND id = '$ESCAPE_id' LIMIT 1";
	  echo("$TRAD_add_to2");
	}elseif($GENERAL_fav == 'y'){
	  $sql = "UPDATE MY_files SET fav = 'n' WHERE Username = '$Username' AND id = '$ESCAPE_id' LIMIT 1";
	  echo("$TRAD_remove_from2");
	}else{
	  echo("$TRAD_general_error");
	}
	$conn->query($sql);
	
	$conn->close();
      }elseif($_GET['type'] == 'deactivate'){
	if($_POST['deactivate_pwd'] != ''){
	  $_POST['deactivate_pwd'] = md5($_POST['deactivate_pwd']);
	  
	  if($_POST['deactivate_pwd'] == $USERPASSWORDENCRYPTED){
	    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	    
	    if (mysqli_connect_errno()) {
	      exit();
	    }
	    
	    $sql = "UPDATE MY_users SET deactivated = '0' WHERE Username = '$Username' LIMIT 1";
	    $conn->query($sql);
	    
	    $conn->close();
	    
	    echo('true');
	  }else{
	    echo("$TRAD_pwd_error1");
	  }
	}else{
	  echo("$TRAD_pwd_error2");
	}
      }elseif($_GET['type'] == 'reactivate'){
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	
	if (mysqli_connect_errno()) {
	  exit();
	}
	
	$sql = "UPDATE MY_users SET deactivated = 'n' WHERE Username = '$Username' LIMIT 1";
	$conn->query($sql);
	
	$conn->close();
	
	echo('true');
      }elseif($_GET['type'] == 'taskbar_app'){
	if($_POST['app_id'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }          
	  
	  $POSTIDESCAPE = $conn->real_escape_string($_POST['app_id']);
	  
	  // rimuovi o aggiungi
	  if(in_array($POSTIDESCAPE, $USER_taskbar)){
	    $update_taskbar = array_diff($USER_taskbar, array("$POSTIDESCAPE"));
	    $update_taskbar = implode(", ", $update_taskbar);
	    $conn->query("UPDATE MY_users SET taskbar = '$update_taskbar' WHERE Username = '$Username' LIMIT 1");
	    
	    echo("true remove");
	  }else{
	    $update_taskbar = $USER_taskbar;
	    array_push($update_taskbar, "$POSTIDESCAPE");
	    $update_taskbar = implode(", ", $update_taskbar);
	    $conn->query("UPDATE MY_users SET taskbar = '$update_taskbar' WHERE Username = '$Username' LIMIT 1");
	    
	    echo("true add");
	  }
	  
	  $conn->close();
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 8');
	}
      }elseif($_GET['type'] == 'join_leave_school'){
	if($_POST['id'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }          
	  
	  $ESCAPE_id = $conn->real_escape_string($_POST['id']);
	  
	  // rimuovi o aggiungi
	  if(in_array($ESCAPE_id, $USER_code_school)){
	    $update_school = array_diff($USER_code_school, array("$ESCAPE_id"));
	    $update_school = implode(", ", $update_school);
	    $conn->query("UPDATE MY_users SET code_school = '$update_school' WHERE Username = '$Username' LIMIT 1");
	    
	    echo("$TRAD_left_school");
	  }else{
	    $update_school = $USER_code_school;
	    array_push($update_school, "$ESCAPE_id");
	    $update_school = implode(", ", $update_school);
	    $conn->query("UPDATE MY_users SET code_school = '$update_school' WHERE Username = '$Username' LIMIT 1");
	    
	    echo("$TRAD_join_school");
	  }
	  
	  $conn->close();
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 26');
	}
      }elseif($_GET['type'] == 'block_management'){
	if($_POST['username'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }          
	  
	  $ESCAPE_username = $conn->real_escape_string($_POST['username']);
	  $validate = lightschool_get_user($ESCAPE_username, 'name');
	  
	  // rimuovi o aggiungi
	  if(in_array($ESCAPE_username, $USER_block_list)){
	    $update_list = array_diff($USER_block_list, array("$ESCAPE_username"));
	    $update_list = implode(", ", $update_list);
	    $conn->query("UPDATE MY_users SET block_list = '$update_list' WHERE Username = '$Username' LIMIT 1");
	    
	    echo("$TRAD_unblocked_user");
	  }else{
	    if($validate == 'not_exists'){
	      echo("Nome utente inesistente");
	    }elseif($validate != 'not_exists' and $ESCAPE_username == $Username){
	      echo("$TRAD_general_error");
	    }else{
	      $update_list = $USER_block_list;
	      array_push($update_list, "$ESCAPE_username");
	      $update_list = implode(", ", $update_list);
	      $conn->query("UPDATE MY_users SET block_list = '$update_list' WHERE Username = '$Username' LIMIT 1");
	      
	      echo("$TRAD_blocked_user");
	    }
	  }
	  $conn->close();
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 21');
	}
      }elseif($_GET['type'] == 'save_fastnote'){
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	
	if (mysqli_connect_errno()) {
	  echo('false');
	  exit();
	}
	
	$POSTCONTENTFASTNOTEESCAPE = $conn->real_escape_string($_POST['fastnote_content']);
	
	$conn->query("UPDATE MY_users SET fastnote = '$POSTCONTENTFASTNOTEESCAPE' WHERE Username = '$Username' LIMIT 1");
	
	$conn->close();
	
	echo('true');
      }elseif($_GET['type'] == 'move'){
	if($_POST['f'] != '' and $_POST['id'] != ''){
	  $array_id = json_decode($_POST['id'], true);
	  
	  if(in_array($_POST['f'], $array_id)){
	    echo "$TRAD_invalid_operation";
	    exit();
	  }
	  
	  // Create connection
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	  // Check connection
	  if($conn->connect_error){
	    die("Connection failed: ".$conn->connect_error);
	  }
	  
	  if($_POST['f'] == 'c'){
	    // prepare and bind
	    $stmt = $conn->prepare("UPDATE MY_files SET trash = 'y' WHERE Username = ? AND id = ?");
	    $stmt->bind_param("ss", $prepare_username, $prepare_id);
	    
	    foreach($array_id as $current_id){
	      $prepare_username = "$Username";
	      $prepare_id = "$current_id";
	      $stmt->execute();
	    }
	  }else{
	    // prepare and bind
	    $stmt = $conn->prepare("UPDATE MY_files SET folder = ?, trash = '' WHERE Username = ? AND id = ?");
	    $stmt->bind_param("sss", $prepare_folder, $prepare_username, $prepare_id);
	  
	    foreach($array_id as $current_id){
	      $prepare_folder = $_POST['f'];
	      $prepare_username = "$Username";
	      $prepare_id = "$current_id";
	      $stmt->execute();
	    }
	  }
	  
	  $stmt->close();
	  $conn->close();
	  
	  echo('true');
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 1');
	}
      }elseif($_GET['type'] == 'copy'){
	if($_POST['f'] != '' and $_POST['id'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }          
	  
	  $POSTFOLDERESCAPE = $conn->real_escape_string($_POST['f']);
	  $POSTIDESCAPE = $conn->real_escape_string($_POST['id']);
	  
	  $_GET['id'] = $POSTIDESCAPE;
	  
	  $_GET['SQL_type'] = "read";
	  include "view_management.php";
	  
	  $GENERAL_html = $conn->real_escape_string($GENERAL_html);
	  
	  $SQL = "INSERT INTO MY_files (Username, type, name, folder, create_date, html, last_view) VALUES ('$Username', '$GENERAL_type', '$GENERAL_name', '$POSTFOLDERESCAPE', '$GENERAL_create_date', '$GENERAL_html', '$GENERAL_last_view')";
	  $conn->query($SQL);
	  
	  $conn->close();
	  
	  echo('true');
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 13');
	}
      }elseif($_GET['type'] == 'register_add_mark'){
	if($_POST['student'] != '' and $_POST['mark'] != '' and $_POST['subject'] != '' and $_POST['type'] != '' and $_POST['class'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }
	  
	  if($_POST['date'] == ''){
	    $_POST['date'] = $date_now_IT;
	  }
	  
	  $ESCAPE_student = $conn->real_escape_string($_POST['student']);
	  $ESCAPE_class = $conn->real_escape_string($_POST['class']);
	  $ESCAPE_subject = $conn->real_escape_string($_POST['subject']);
	  $ESCAPE_mark = $conn->real_escape_string($_POST['mark']);
	  $ESCAPE_date = $conn->real_escape_string($_POST['date']);
	  $ESCAPE_type = $conn->real_escape_string($_POST['type']);
	  $ESCAPE_html = $conn->real_escape_string($_POST['html']);
	  
	  $ADD_QUERY = false;
	  
	  if($ESCAPE_type == 'scrutini'){
	    $SCHOOL_id = lightschool_get_class_details($Username, $_POST['class'], 'school_id');
	    $SCHOOL_periodo = lightschool_get_class_details($Username, $_POST['class'], 'periodo');
	    
	    if($_POST['period'] == 'first'){
	      $DATE_array = array($SCHOOL_periodo[0], $SCHOOL_periodo[1]);
	    }elseif($_POST['period'] == 'second'){
	      $DATE_array = array($SCHOOL_periodo[2], $SCHOOL_periodo[3]);
	    }
	    
	    $ADD_QUERY = lightschool_get_marks($_SESSION['Username'], $ESCAPE_student, $ESCAPE_class, $ESCAPE_subject, 'scrutini', 'graph2', $DATE_array);
	    
	    if($ADD_QUERY != false){
	      $SQL = "UPDATE MY_REG_marks SET mark = '$ESCAPE_mark' WHERE Student = '$ESCAPE_student' AND class = '$ESCAPE_class' AND subject = '$ESCAPE_subject' AND type = 'scrutini' AND final_mark = ''";
	    }
	  }
	  
	  if($ADD_QUERY == false){
	    $SQL = "INSERT INTO MY_REG_marks (Username, Student, class, subject, mark, date, create_date, type, html) VALUES ('$Username', '$ESCAPE_student', '$ESCAPE_class', '$ESCAPE_subject', '$ESCAPE_mark', '$ESCAPE_date', '$date_now_IT', '$ESCAPE_type', '$ESCAPE_html')";
	  }
	  $conn->query($SQL);
	  
	  $conn->close();
	  
	  echo("true");
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 20');
	}
      }elseif($_GET['type'] == 'register_justify'){
	if($_POST['student'] != '' and $_POST['class'] != '' and $_POST['date'] != '' and $_POST['type'] != ''){
	  $status = false;
	  
	  $date = $_POST['date'];
	  $get_assent_justify = lightschool_get_justify($_POST['student'], 'assent', false, "$date");
	  
	  if($get_assent_justify == 1){
	    $status = true;
	    $type = "assent";
	    $type2 = "validate";
	  }
	  
	  if($text == ""){
	    $get_ritardi_justify = lightschool_get_justify($_POST['student'], 'ritardi', false, "$date");
	  }
	  if($get_ritardi_justify == 1){
	    $status = true;
	    $type = "ritardi";
	    $type2 = "validate2";
	  }
	  
	  if($text == ""){
	    $get_uscite_justify = lightschool_get_justify($_POST['student'], 'uscite', false, "$date");
	  }
	  if($get_uscite_justify == 1){
	    $status = true;
	    $type = "uscite";
	    $type2 = "validate3";
	  }else{
	    if($status !== true){
	      $status = false;
	    }
	  }
	  
	  if($status === true){
	    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	    
	    if (mysqli_connect_errno()) {
	      echo('false');
	      exit();
	    }
	    
	    $ESCAPE_student = $conn->real_escape_string($_POST['student']);
	    $ESCAPE_class = $conn->real_escape_string($_POST['class']);
	    $ESCAPE_date = $conn->real_escape_string($_POST['date']);
	    $ESCAPE_type = $conn->real_escape_string($_POST['type']);
	    $ESCAPE_html = $conn->real_escape_string($_POST['html']);
	    
	    $SQL = "UPDATE MY_REG_justify SET Docente_justify = '$Username', create_date = '$date_now_IT', type = '$ESCAPE_type', html = '$ESCAPE_html', justified = '1' WHERE Studente = '$ESCAPE_student' AND date = '$ESCAPE_date' LIMIT 1";
	    $conn->query($SQL);
	    
	    $conn->close();
	    
	    echo('true');
	  }else{
	    echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 28');
	  }
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 27');
	}
      }elseif($_GET['type'] == 'addpeople'){
	if($_POST['name'] != '' and $_POST['surname'] != '' and $_POST['saved_username'] != ''){
	  if(lightschool_get_user($_POST['saved_username'], 'id') != 'not_exists'){
	    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	    
	    if (mysqli_connect_errno()) {
	      echo('false');
	      exit();
	    }          
	    
	    $name = $conn->real_escape_string($_POST['name']);
	    $surname = $conn->real_escape_string($_POST['surname']);
	    $saved_username = $conn->real_escape_string($_POST['saved_username']);
	    
	    $SQL = "INSERT INTO MY_peoples (Username, name, surname, saved_username) VALUES ('$Username', '$name', '$surname', '$saved_username')";
	    $conn->query($SQL);
	    
	    $conn->close();
	    
	    echo('true');
	  }else{
	    echo("$TRAD_user_not_exists");
	  }
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 15');
	}
      }elseif($_GET['type'] == 'creategroup'){
	if($_POST['name'] != '' and $_POST['group'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }          
	  
	  $name = $conn->real_escape_string($_POST['name']);
	  $group = $_POST['group'];
	  
	  $group2 = json_decode($group, true);
	  $group2 = implode(", ", $group2);
	  
	  $SQL = "INSERT INTO MY_peoples (Username, name, group_username) VALUES ('$Username', '$name', '$group2')";
	  $conn->query($SQL);
	  
	  $conn->close();
	  
	  echo('true');
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 16');
	}
      }elseif($_GET['type'] == 'start_share'){
	if($_POST['share_input'] != '' and $_POST['id'] != ''){
	  if($_POST['share_input'] == $_SESSION['Username']){
	    echo("<script>$('.toast').css('background-color', 'red');</script><img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />Ti credi simpatico? -_-&quot;");
	  }else{
	    $array_id = json_decode($_POST['id'], true);
	    $array_id = explode(", ", $array_id);
	    
	    // Create connection
	    $conn_start = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	    // Check connection
	    if($conn_start->connect_error){
		die("Connection failed: " . $conn_start->connect_error);
	    }
	    
	    // prepare and bind
	    $stmt_start = $conn_start->prepare("INSERT INTO MY_share (Sender, Receiving, file_id, share_date) VALUES (?, ?, ?, ?)");
	    $stmt_start->bind_param("ssss", $prepare_sender, $prepare_receiving, $prepare_file_id, $prepare_share_date);
	    
	    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
		
	    if (mysqli_connect_errno()) {
	      echo('false');
	      exit();
	    }
	    $_POST['share_input'] = lightschool_get_user($_POST['share_input'], 'id');
	    
	    $POSTSHAREINPUTESCAPE = $conn->real_escape_string($_POST['share_input']);
	    $sql="SELECT * FROM MY_users WHERE UserID = '$POSTSHAREINPUTESCAPE' AND deactivated = 'n' LIMIT 1";
	    
	    $rs=$conn->query($sql);

	    if($rs === false) {
	      trigger_error('Errore SQL: ' . $sql . ' Errore: ' . $conn->error, E_USER_ERROR);
	    } else {
	      $rows_returned = $rs->num_rows;
	    }
	    $rs->data_seek(0);
	    $num = $rs->num_rows;

	    if($num == 1){
	      foreach($array_id as $current_id){
		$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
		
		if(mysqli_connect_errno()){
		  echo('false');
		  exit();
		}
		
		$POSTIDESCAPE = $conn->real_escape_string($current_id);
		$sql="SELECT * FROM MY_files WHERE Username = '$Username' AND id = '$POSTIDESCAPE' LIMIT 1";
		
		$rs=$conn->query($sql);

		if($rs === false){
		  trigger_error('Errore SQL: ' . $sql . ' Errore: ' . $conn->error, E_USER_ERROR);
		}else{
		  $rows_returned = $rs->num_rows;
		}
		$rs->data_seek(0);
		$num = $rs->num_rows;

		if($num == 1){
		  while($GENERAL_row = $rs->fetch_assoc()){
		    $GENERAL_name = $GENERAL_row['name'];
		    $GENERAL_type = $GENERAL_row['type'];
		    $GENERAL_icon = $GENERAL_row['icon'];
		    $GENERAL_file_url = $GENERAL_row['file_url'];
		    $GENERAL_file_type = $GENERAL_row['file_type'];
		    $COL_ICON = $USER_icon_set1;
	  
		    if($GENERAL_icon != ''){
		      if($GENERAL_type == 'folder' or $GENERAL_type == 'notebook'){
			$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/color/$GENERAL_icon";
		      }
		    }
		    
		    if($GENERAL_icon == ''){
		      if($GENERAL_type == 'folder'){
			$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/folder.png";
			$GENERAL_icon2 = "$IMAGES_MAIN_DIRECTORY/white/folder.png";
		      }elseif($GENERAL_type == 'notebook'){
			$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/files.png";
		      }elseif($GENERAL_type == 'diary'){
			$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/diary.png";
		      }elseif($GENERAL_type == 'file'){
			if(strpos($GENERAL_file_type,'image') !== false){
			  $GENERAL_icon = "$UPLOAD_MAIN_DIRECTORY/$GENERAL_file_url";
			}elseif(strpos($GENERAL_file_type,'text/html') !== false){
			  $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/file_type/html.png";
			}elseif(strpos($GENERAL_file_type,'application/pdf') !== false){
			  $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/file_type/pdf.png";
			}
			
			if(strpos($GENERAL_name,'doc') !== false or strpos($GENERAL_name,'docx') !== false){
			  $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/file_type/word.png";
			}elseif(strpos($GENERAL_name,'xls') !== false or strpos($GENERAL_name,'xlsx') !== false){
			  $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/file_type/excel.png";
			}elseif(strpos($GENERAL_name,'ppt') !== false or strpos($GENERAL_name,'pptx') !== false){
			  $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/file_type/powerpoint.png";
			}
		      }
		    }
		    $REPORT .= "<script>$('.toast').css('background-color', '$USER_accent');</script><strong><img src='$GENERAL_icon' style='float: left; width: 14px; height: 14px; margin-right: 10px; margin-top: 3px' />$GENERAL_name:</strong> ";
		  }
		  if($GENERAL_type == 'folder_remove_this_part_to_block_folders'){
		    $REPORT .= "<strong><i>Le cartelle non sono condivisibili attualmente</i></strong>";
		  }else{
		    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
		    
		    if(mysqli_connect_errno()){
		      echo('false');
		      exit();
		    }
		    
		    $sql="SELECT * FROM MY_share WHERE Sender = '$USER_uniqueid' AND Receiving = '$POSTSHAREINPUTESCAPE' AND file_id = '$POSTIDESCAPE' LIMIT 1";
		    
		    $rs=$conn->query($sql);

		    if($rs === false){
		      trigger_error('Errore SQL: ' . $sql . ' Errore: ' . $conn->error, E_USER_ERROR);
		    }else{
		      $rows_returned = $rs->num_rows;
		    }
		    $rs->data_seek(0);
		    $num = $rs->num_rows;

		    if($num == 0){
		      // set parameters and execute
		      $prepare_sender = "$USER_uniqueid";
		      $prepare_receiving = "$POSTSHAREINPUTESCAPE";
		      $prepare_file_id = "$POSTIDESCAPE";
		      $prepare_share_date = "$date_now";
		      $stmt_start->execute();
		      
		      $REPORT .= "$TRAD_shared_correctly";
		    }else{
		      $REPORT .= "$TRAD_file_already_shared";
		    }
		  }
		  $conn->close();
		}else{
		  $REPORT .= "<script>$('.toast').css('background-color', 'red');</script><img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_file_not_exists";
		}
		$REPORT .= '<br/>';
	      }
	    }else{
	      $REPORT = "<script>$('.toast').css('background-color', 'red');</script><img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_user_not_exists";
	    }
	    echo($REPORT);
	  }
	}else{
	  echo("<script>$('.toast').css('background-color', 'red');</script><img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />Compila i campi.");
	}
      }elseif($_GET['type'] == 'start_project'){
	if($_POST['id'] != '' and $_POST['project_input'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }
	  
	  $ESCAPE_project_input = $conn->real_escape_string($_POST['project_input']);
	  $ESCAPE_id = $conn->real_escape_string($_POST['id']);
	  
	  $ESCAPE_project_input = lightschool_get_lim($ESCAPE_project_input, 'id');
	  
	  $date_now = $conn->real_escape_string($date_now);
	
	  $sql="INSERT INTO MYLIM_connection (LimID, UserID, FileID, date) VALUES ('$ESCAPE_project_input', '$USER_uniqueid', '$ESCAPE_id', '$date_now')";
	  
	  $rs=$conn->query($sql);
	  
	  $conn->close();
	  
	  echo('true');
	}else{
	  echo("$TRAD_fill_field");
	}
      }elseif($_GET['type'] == 'ip_actions'){
	if($_POST['ip_address'] != '' and $_POST['type'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }
	  
	  $ESCAPE_ip_address = $conn->real_escape_string($_POST['ip_address']);
	  $ESCAPE_type = $conn->real_escape_string($_POST['type']);
	  
	  if($ESCAPE_type == 'forget'){
	    $sql="DELETE FROM MY_access WHERE Username = '".$_SESSION['Username']."' AND id = '$ESCAPE_ip_address'";
	    $response = "$TRAD_forgotten";
	    $response2 = 'close remove';
	  }elseif($ESCAPE_type == 'block'){
	    $sql="UPDATE MY_access SET allow = 'n' WHERE Username = '".$_SESSION['Username']."' AND id = '$ESCAPE_ip_address'";
	    $response = "$TRAD_blocked";
	  }elseif($ESCAPE_type == 'add'){
	    $sql="INSERT INTO MY_access (Username, allow, ip, date, type) VALUES ('$Username', 'n', '$ESCAPE_ip_address', '$date_now_IT_HR', 'manual')";
	    $response = "$TRAD_blocked";
	  }elseif($ESCAPE_type == 'logout'){
	    $sql="UPDATE MY_access SET logged_in = 'n' WHERE Username = '".$_SESSION['Username']."' AND id = '$ESCAPE_ip_address'";
	    $response = "$TRAD_logged_out";
	  }elseif($ESCAPE_type == 'logoutall'){
	    $ip = $conn->real_escape_string($ip);
	    $sql="UPDATE MY_access SET logged_in = 'n' WHERE Username = '".$_SESSION['Username']."' AND NOT ip = '$ip'";
	    $response = "$TRAD_logged_out_all";
	  }
	  
	  $rs=$conn->query($sql);
	  
	  $conn->close();
	  
	  echo("<span style='display: none'>true $response2</span>$response correttamente");
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 18');
	}
      }elseif($_GET['type'] == 'create_folder'){
	if($_POST['title'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }
	  
	  $POSTNAMEFESCAPE = $conn->real_escape_string($_POST['title']);
	  $GETFOLDERESCAPE = $conn->real_escape_string($_POST['f']);
	  $date_now = $conn->real_escape_string($date_now);
	  
	  if($GETFOLDERESCAPE == ''){
	    $GETFOLDERESCAPE = '/';
	  }
	
	  $sql="INSERT INTO MY_files (Username, type, name, folder, create_date) VALUES ('$Username', 'folder', '$POSTNAMEFESCAPE', '$GETFOLDERESCAPE', '$date_now')";
	  
	  $rs=$conn->query($sql);
	  
	  $conn->close();
	  
	  echo('true');
	}else{
	  echo("$TRAD_fill_field");
	}
      }elseif($_GET['type'] == 'stop_share'){
	if($_POST['share_id'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }          
	  
	  $POSTIDESCAPE = $conn->real_escape_string($_POST['share_id']);
	  
	  $conn->query("DELETE FROM MY_share WHERE Sender = '$USER_uniqueid' AND id = '$POSTIDESCAPE' LIMIT 1");
	  
	  $conn->close();
	  
	  echo('true');
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 2');
	}
      }elseif($_GET['type'] == 'empty'){
	if($_POST['type_files'] != "false" or $_POST['type_diary'] != "false" or $_POST['type_all'] != "false"){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }
	  
	  if($_POST['type_files'] == "true"){
	    $conn->query("DELETE FROM MY_files WHERE Username = '$Username' AND trash = 'y' AND (type = 'notebook' OR type = 'folder' OR type = 'file' OR type = 'stuff')");
	  }
	  if($_POST['type_diary'] == "true"){
	    $conn->query("DELETE FROM MY_files WHERE Username = '$Username' AND trash = 'y' AND type = 'diary'");
	  }
	  if($_POST['type_all'] == "true"){
	    $conn->query("DELETE FROM MY_files WHERE Username = '$Username' AND trash = 'y' AND (type = 'notebook' OR type = 'folder' OR type = 'files' OR type = 'stuff' OR type = 'diary')");
	  }
	  
	  $conn->close();
	  
	  echo("true");
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 25');
	}
      }elseif($_GET['type'] == 'delete_trash'){
	if($_POST['file_id'] != ''){
	  $_POST['file_id'] = json_decode($_POST['file_id']);
	  $_POST['file_id'] = explode(", ", $_POST['file_id']);
	  
	  foreach($_POST['file_id'] as $current_id){
	    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	    
	    if (mysqli_connect_errno()) {
	      echo('false');
	      exit();
	    }          
	    
	    $POSTIDESCAPE = $conn->real_escape_string($current_id);
	    if($_GET['subject'] == 'y'){
	      $TABLE = 'timetable';
	    }else{
	      $TABLE = 'files';
	    }
	    $QUERY = "UPDATE MY_$TABLE SET trash = 'y' WHERE Username = '$Username' AND id = '$POSTIDESCAPE' LIMIT 1";
	    $conn->query($QUERY);
	    
	    $conn->close();
	  }
	  echo('true');
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 22');
	}
      }elseif($_GET['type'] == 'delete_forever'){
	if($_POST['file_id'] != ''){
	  $_POST['file_id'] = json_decode($_POST['file_id']);
	  $_POST['file_id'] = explode(", ", $_POST['file_id']);
	  
	  foreach($_POST['file_id'] as $current_id){
	    if($_GET['subject'] == ''){
	      $SHAREFILE_conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	      // check connection
	      if ($SHAREFILE_conn->connect_error) {
	      
	      }
	      
	      $GETIDESCAPE = $SHAREFILE_conn->real_escape_string($current_id);
	      
	      $SHAREFILE_rs=$SHAREFILE_conn->query("SELECT * FROM MY_files WHERE Username = '$Username' AND id = '$GETIDESCAPE' LIMIT 1");

	      if($SHAREFILE_rs === false) {
		echo "false";
	      } else {
		$SHAREFILE_rows_returned = $SHAREFILE_rs->num_rows;
	      }
	      $SHAREFILE_rs->data_seek(0);
	      $SHAREFILE_num = $SHAREFILE_rs->num_rows;
	      
	      if($SHAREFILE_num == 1){
		while($SHAREFILE_row = $SHAREFILE_rs->fetch_assoc()){
		  $FILE_TYPE = $SHAREFILE_row['type'];
		  $FILE_URL = $SHAREFILE_row['file_url'];
		}
	      }
	      $SHAREFILE_conn->close();
	      if($FILE_TYPE == 'file'){
		if(!unlink($FILE_URL)){
		  
		}
	      }
	    }
	    
	    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	    
	    if (mysqli_connect_errno()) {
	      echo('false');
	      exit();
	    }          
	    
	    $POSTIDESCAPE = $conn->real_escape_string($current_id);
	    if($_GET['subject'] == 'y'){
	      $TABLE = 'timetable';
	    }else{
	      $TABLE = 'files';
	    }
	    $QUERY = "DELETE FROM MY_$TABLE WHERE Username = '$Username' AND id = '$POSTIDESCAPE' LIMIT 1";
	    $conn->query($QUERY);
	    
	    $conn->close();
	  }
	  echo('true');
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 5');
	}
      }elseif($_GET['type'] == 'delete_people'){
	if($_POST['id'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }          
	  
	  $ESCAPE_id = $conn->real_escape_string($_POST['id']);
	  $QUERY = "DELETE FROM MY_peoples WHERE Username = '$Username' AND id = '$ESCAPE_id' LIMIT 1";
	  $conn->query($QUERY);
	  
	  $conn->close();
	  
	  echo('true');
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 23');
	}
      }elseif($_GET['type'] == 'restore'){
	if($_POST['file_id'] != ''){
	  $_POST['file_id'] = json_decode($_POST['file_id']);
	  $_POST['file_id'] = explode(", ", $_POST['file_id']);
	  
	  foreach($_POST['file_id'] as $current_id){
	    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	    
	    if (mysqli_connect_errno()) {
	      echo('false');
	      exit();
	    }          
	    
	    $POSTIDESCAPE = $conn->real_escape_string($current_id);
	    if($_GET['subject'] == 'y'){
	      $TABLE = 'timetable';
	    }else{
	      $TABLE = 'files';
	    }
	    $QUERY = "UPDATE MY_$TABLE SET trash = '' WHERE Username = '$Username' AND id = '$POSTIDESCAPE' LIMIT 1";
	    $conn->query($QUERY);
	    
	    $conn->close();
	  }
	  echo('true');
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 21');
	}
      }elseif($_GET['type'] == 'rename'){
	if($_POST['id'] != ''){
	  if($_POST['rename'] != ''){
	    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	    
	    if (mysqli_connect_errno()) {
	      echo('false');
	      exit();
	    }
	    
	    $POSTRENAMEESCAPE = $conn->real_escape_string($_POST['rename']);
	    $POSTIDESCAPE = $conn->real_escape_string($_POST['id']);
	    
	    $conn->query("UPDATE MY_files SET name = '$POSTRENAMEESCAPE' WHERE Username = '$Username' AND id = '$POSTIDESCAPE' LIMIT 1");
	    
	    $conn->close();
	
	    echo('true');
	  }else{
	    echo("$TRAD_fill_field");
	  }
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 3');
	}
      }elseif($_GET['type'] == 'add_diary'){
	if($_POST['date'] != '' and $_POST['subject'] != '' and $_POST['type'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }
	  
	  $POSTDATEESCAPE = $conn->real_escape_string($_POST['date']);
	  $POSTTYPEESCAPE = $conn->real_escape_string($_POST['type']);
	  $POSTSUBJECTESCAPE = $conn->real_escape_string($_POST['subject']);
	  $POSTACCENTCOLORESCAPE = $conn->real_escape_string($_POST['accentcolor']);
	  $POSTREMINDERESCAPE = $conn->real_escape_string($_POST['reminder']);
	  $POSTHTMLESCAPE = $conn->real_escape_string($_POST['content_editable_true_div']);
	  
	  $conn->query("INSERT INTO MY_files (Username, type, name, diary_type, diary_date, diary_reminder, diary_fore_color, html, create_date) VALUES ('$Username', 'diary', '$POSTSUBJECTESCAPE', '$POSTTYPEESCAPE', '$POSTDATEESCAPE', '$POSTREMINDERESCAPE', '$POSTACCENTCOLORESCAPE', '$POSTHTMLESCAPE', '$date_now')");
	  
	  $conn->close();
      
	  echo('true');
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 6');
	}
      }elseif($_GET['type'] == 'update_diary'){
	if($_POST['date'] != '' and $_GET['id'] != '' and $_POST['subject'] != '' and $_POST['type'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }
	  
	  $POSTDATEESCAPE = $conn->real_escape_string($_POST['date']);
	  $POSTTYPEESCAPE = $conn->real_escape_string($_POST['type']);
	  $POSTSUBJECTESCAPE = $conn->real_escape_string($_POST['subject']);
	  $POSTACCENTCOLORESCAPE = $conn->real_escape_string($_POST['accentcolor']);
	  $POSTREMINDERESCAPE = $conn->real_escape_string($_POST['reminder']);
	  $POSTHTMLESCAPE = $conn->real_escape_string($_POST['content_editable_true_div']);
	  $GETIDESCAPE = $conn->real_escape_string($_GET['id']);
	  
	  $sql = "UPDATE MY_files SET name = '$POSTSUBJECTESCAPE', diary_type = '$POSTTYPEESCAPE', diary_date = '$POSTDATEESCAPE', diary_reminder = '$POSTREMINDERESCAPE', diary_fore_color = '$POSTACCENTCOLORESCAPE', html = '$POSTHTMLESCAPE' WHERE Username = '$Username' AND id = '$GETIDESCAPE'";
	  $conn->query($sql);
	  
	  $conn->close();
      
	  echo('true');
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 7');
	}
      }elseif($_GET['type'] == 'add_subject'){
	if($_POST['day'] != '' and $_POST['hour'] != '' and $_POST['subject'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }
	  
	  $POSTDAYESCAPE = $conn->real_escape_string($_POST['day']);
	  $POSTHOURESCAPE = $conn->real_escape_string($_POST['hour']);
	  $POSTSUBJECTESCAPE = $conn->real_escape_string($_POST['subject']);
	  $POSTFORECOLORESCAPE = $conn->real_escape_string($_POST['fore_color']);
	  $POSTBOOKESCAPE = $conn->real_escape_string($_POST['book']);
	  $ESCAPE_id = $conn->real_escape_string($_POST['id']);
	  
	  if($ESCAPE_id == ''){
	    $conn->query("INSERT INTO MY_timetable (Username, day_of_week, hour_of_day, subject, fore_color, book) VALUES ('$Username', '$POSTDAYESCAPE', '$POSTHOURESCAPE', '$POSTSUBJECTESCAPE', '$POSTFORECOLORESCAPE', '$POSTBOOKESCAPE')");
	  }else{
	    $conn->query("UPDATE MY_timetable SET day_of_week = '$POSTDAYESCAPE', hour_of_day = '$POSTHOURESCAPE', subject = '$POSTSUBJECTESCAPE', fore_color = '$POSTFORECOLORESCAPE', book = '$POSTBOOKESCAPE' WHERE Username = '$Username' AND id = '$ESCAPE_id'");
	  }
	  
	  $conn->close();
      
	  echo('true');
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 4');
	}
      }elseif($_GET['type'] == 'send_message'){
	if($_POST['username'] != '' and $_POST['content'] != ''){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }
	  
	  $POSTUSERNAMEESCAPE = $conn->real_escape_string($_POST['username']);
	  $POSTCONTENTESCAPE = $conn->real_escape_string($_POST['content']);
	  
	  $verify = lightschool_get_user($POSTUSERNAMEESCAPE, 'name');
	  $accept = true;
	  
	  if(strpos($POSTUSERNAMEESCAPE,"($TRAD_group)") !== false){
	    $accept = lightschool_is_people_id_correct($POSTUSERNAMEESCAPE, 'groupname_to_exists');
	    if($accept !== false){
	      $group_id = lightschool_is_people_id_correct($POSTUSERNAMEESCAPE, 'groupname_to_id');
	      $POSTUSERNAMEESCAPE = $accept;
	      $accept = true;
	    }
	    $verify = 'ok';
	  }
	  
	  if($verify != 'not_exists' and $accept === true){
	    $conn->query("INSERT INTO MY_messages (Sender, Receiving, group_id, body, date, is_read) VALUES ('$Username', '$POSTUSERNAMEESCAPE', '$group_id', '<br/>$POSTCONTENTESCAPE<br/><br/>', '$date_now', 'n')");
	    echo('true');
	  }else{
	    echo('Utente o gruppo inesistente');
	  }
	  $conn->close();
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 9');
	}
      }elseif($_GET['type'] == 'save_notebook'){
	if($_POST['content'] != ''){
	  if($_POST['f'] == ''){
	    $_POST['f'] = '/';
	  }	  
	  
	  $conn = mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);
	  
	  if (mysqli_connect_errno()){
	    echo('false');
	    exit();
	  }
	  
	  $POSTFESCAPE = $conn->real_escape_string($_POST['f']);
	  $ESCAPE_id = $conn->real_escape_string($_POST['id']);
	  $POSTCONTENTESCAPE = $conn->real_escape_string($_POST['content']);
	  $title = $conn->real_escape_string($_POST['title']);
	  
	  if($_POST['id'] == ''){
	    $SQL = "INSERT INTO MY_files (Username, type, name, html, create_date, folder) VALUES ('$Username', 'notebook', '$title', '<br/>$POSTCONTENTESCAPE<br/><br/>', '$date_now', '$POSTFESCAPE')";
	  }else{
	    $ex_title = lightschool_get_file($ESCAPE_id, 'name');
	    $ex_html = lightschool_get_file($ESCAPE_id, 'html');
	    $ex_create_date = lightschool_get_file($ESCAPE_id, 'create_date');
	    $f = lightschool_get_file($ESCAPE_id, 'f');
	    
	    $SQL = "UPDATE MY_files SET name = '$title', html = '$POSTCONTENTESCAPE', create_date = '$ex_create_date', last_edit = '$date_now_IT_HR' WHERE Username = '$Username' AND id = '$ESCAPE_id';";
	    $SQL .= "INSERT INTO MY_files (Username, type, name, html, create_date, folder, history) VALUES ('$Username', 'notebook', '$ex_title', '$ex_html', '$ex_create_date', '$f', '$ESCAPE_id');";
	  }
	  
	  // Execute multi query
	  if (mysqli_multi_query($conn,$SQL))
	  {
	    do
	      {
	      // Store first result set
	      if ($result=mysqli_store_result($conn))
		{
		while ($row=mysqli_fetch_row($result))
		  {
		  printf("%s\n",$row[0]);
		  }
		mysqli_free_result($conn);
		}
	      }
	    while (mysqli_next_result($conn));
	  }
	  
	  mysqli_close($con);
      
	  echo('true');
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 14');
	}
      }elseif($_GET['type'] == 'upload'){
	if(!empty($_FILES)){
	  $filename = $_FILES['file']['name'];
	  $fileSize = $_FILES['file']['size'];
	  $ext = pathinfo($filename, PATHINFO_EXTENSION);
	  $maxsize = 1000000;
	  
	  $temp_file = $_FILES['file']['tmp_name'];
	  
	  $target_file = $target_path.$_FILES['file']['name'];
	  
	  $allowed =  array('gif', 'png', 'jpg', 'jpeg', 'bmp', 'png', 'txt', 'rtf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'html', 'htm', 'css', 'pdf', 'odt', 'ods', 'odp', 'odd', 'java', 'class');
	  
	  if(($_FILES['file']['size'] >= $maxsize) or ($_FILES["file"]["size"] <= 0)){
	    header($_SERVER['SERVER_PROTOCOL'].' 406 File too large', true, 406);
	  }else{
	    if(in_array($ext,$allowed)){
	      if(!file_exists($target_path)){
		mkdir($target_path, 0777, true);
	      }
	      if(!file_exists($target_file)){
		if(file_exists($target_path)){
		  /*
		  CODICE SCANSIONE ANTIVIRUS CON VIRUSTOTAL.COM
		  function virustotal_upload($path){
		    $ch = curl_init();
		    //Set HTTP Version to 1.0 as stated in the api-doku
		    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
		    curl_setopt($ch, CURLOPT_VERBOSE, 0);
		    curl_setopt($ch, CURLOPT_VERBOSE, 0);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($ch, CURLOPT_POST, true);
		    curl_setopt($ch, CURLOPT_URL, 'https://www.virustotal.com/api/scan_file.json');
		    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		    
		    $post_array = array(
		    "file" => "@".$path,
		    //you can get the key after signing up at virustotal.com
		    "key" => $config['VIRUSTOTAL_API']
		    );
		    
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array);
		    $response = curl_exec($ch);
		    return json_decode($response,true);
		  }
		  
		  function virustotal_parse($hash){
		    //remove the timestamp from the hash
		    $cut_hash = substr($hash,0,strpos($hash,"-"));
		    $ch = curl_init();
		    //Set HTTP Version to 1.0 as stated in the api-doku
		    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
		    curl_setopt($ch, CURLOPT_VERBOSE, 0);
		    curl_setopt($ch, CURLOPT_VERBOSE, 0);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($ch, CURLOPT_POST, true);
		    curl_setopt($ch, CURLOPT_URL, 'https://www.virustotal.com/api/get_file_report.json');
		    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		    
		    $post_array = array(
		    "resource" => $cut_hash,
		    "key" => $config['VIRUSTOTAL_API']
		    );
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array);
		    $response = curl_exec($ch);
		    
		    $json = json_decode($response,true);
		    
		    $s = "";
		    //if its not done scanning, tell the user
		    if($json['result']!=1){
		    $s.= "Scanning...";
		    }else{
		    //if done scanning, count how many scanners found a virus
		    //(You can do anything else with the data you get)
		    $antivir = $json['report'][1];
		    $c = 0;
		    foreach($antivir as $item){
		    if($item!=""){
		    $c++;
		    }
		    }
		    $s.= $c."/".count($antivir);
		    }
		    //create a link to the report and return it
		    return('Virustotal: '.$s.'');
		  }
		  
		  $obj = virustotal_upload($temp_path);
		  //the scanID to store in a database along with other inforamtion about the file
		  $scanID = $obj['scan_id'];
		  
		  echo(virustotal_parse($scanID));
		  */
		  
		  move_uploaded_file($temp_file, $target_file);
		  
		  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	  
		  if (mysqli_connect_errno()) {
		    echo('false');
		    exit();
		  }
		  
		  if($_GET['f'] == ''){
		    $_GET['f'] = '/';
		  }
		  
		  $filename = $conn->real_escape_string($filename);
		  $GETFOLDERESCAPE = $conn->real_escape_string($_GET['f']);
		  $fileSize = $conn->real_escape_string($fileSize);
		  
		  
		  $finfo = new finfo(FILEINFO_MIME);

		  $type = $finfo->file($target_file);
		  $fileType = $conn->real_escape_string($type);
		  
		  $conn->query("INSERT INTO MY_files (Username, type, name, folder, file_url, file_type, file_size, create_date) VALUES ('$Username', 'file', '$filename', '$GETFOLDERESCAPE', '$target_file', '$fileType', '$fileSize', '$date_now')");

		  $conn->close();
		  
		  echo('true');
		}else{
		  header($_SERVER['SERVER_PROTOCOL'].' 500 Internal Server Error', true, 500);
		}
	      }else{
		header($_SERVER['SERVER_PROTOCOL'].' 404 File exists', true, 404);
	      }  
	    }else{
	      header($_SERVER['SERVER_PROTOCOL'].' 405 File not allowed', true, 405);
	    }
	  }
	}
      }elseif($_GET['type'] == 'register_appello'){
	if($_POST['presente'] != '' and $_POST['assente'] != '' and $_GET['class'] != ''){
	  $con = mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);
	  
	  // Check connection
	  if (mysqli_connect_errno())
	    {
	    echo "Failed to connect to MySQL: " . mysqli_connect_error();
	    }

	  $_POST['presente'] = json_decode($_POST['presente'], true);
	  $_POST['presente'] = implode(", ", $_POST['presente']);
	  
	  $_POST['assente'] = json_decode($_POST['assente'], true);
	  $_POST['assente'] = implode(", ", $_POST['assente']);
	  
	  if($_GET['day'] == ''){
	    $_GET['day'] = $date_now_IT;
	  }
	  
	  $POSTPRESENTEESCAPE = mysqli_real_escape_string($con, $_POST['presente']);
	  $POSTASSENTEESCAPE = mysqli_real_escape_string($con, $_POST['assente']);
	  $GETCLASSESCAPE = mysqli_real_escape_string($con, $_GET['class']);
	  $GETDAYESCAPE = mysqli_real_escape_string($con, $_GET['day']);
	  
	  $sql = "DELETE FROM MY_REG_appello WHERE class = '$GETCLASSESCAPE' and day = '$GETDAYESCAPE';";
	  $sql .= "INSERT INTO MY_REG_appello (class, day, Username, present, absent) VALUES ('$GETCLASSESCAPE', '$GETDAYESCAPE', '$Username', '$POSTPRESENTEESCAPE', '$POSTASSENTEESCAPE')";

	  // Execute multi query
	  if (mysqli_multi_query($con,$sql))
	  {
	    do
	      {
	      // Store first result set
	      if ($result=mysqli_store_result($con))
		{
		while ($row=mysqli_fetch_row($result))
		  {
		  printf("%s\n",$row[0]);
		  }
		mysqli_free_result($con);
		}
	      }
	    while (mysqli_next_result($con));
	  }

	  mysqli_close($con);
      
	  echo("true");
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 10');
	}
      }elseif($_GET['type'] == 'register_changeuserstatus'){
	if($_GET['username'] != '' and $_GET['request_type'] != '' and $_GET['class'] != '' and $_GET['day'] != ''){
	  if(lightschool_is_class_correct($_GET['class']) == 'ok'){
	    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
    
	    if (mysqli_connect_errno()) {
	      echo('false');
	      exit();
	    }
	    
	    $GETUSERNAMEESCAPE = $conn->real_escape_string($_GET['username']);
	    $GETTYPEESCAPE = $conn->real_escape_string($_GET['type']);
	    $GETDAYESCAPE = $conn->real_escape_string($_GET['day']);
	    
	    $REGISTER_present = lightschool_get_present_status($_GET['day'], $_GET['class'], 'present');
	    $REGISTER_absent = lightschool_get_present_status($_GET['day'], $_GET['class'], 'absent');
	    
	    print_r($REGISTER_absent);
	    
	    if($_GET['request_type'] == 'present'){
	      $REGISTER_absent = array_diff($REGISTER_absent, array($_GET['username']));
	      array_push($REGISTER_present, $_GET['username']);
	    }elseif($_GET['request_type'] == 'absent'){
	      $REGISTER_present = array_diff($REGISTER_present, array($_GET['username']));
	      array_push($REGISTER_absent, $_GET['username']);
	    }
	    
	    $REGISTER_absent = implode(", ", $REGISTER_absent);
	    $REGISTER_present = implode(", ", $REGISTER_present);
	    
	    $sql = "UPDATE MY_REG_appello SET present = '$REGISTER_present', absent = '$REGISTER_absent' WHERE day = '$GETDAYESCAPE'";
	    $conn->query($sql);

	    $conn->close();
	    echo $REGISTER_absent;
	  }else{
	    echo("$TRAD_not_part_of_classroom <b>$TRAD_code</b> 12");
	  }
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 11');
	}
      }elseif($_GET['type'] == 'settings'){
	$value_status = 'true';
	
	if($_POST['emailaddress'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_email<br/>";
	  $value_status = 'error';
	}else{
	  if(!filter_var($_POST['emailaddress'], FILTER_VALIDATE_EMAIL)){
	    $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_not_valid_email<br/>";
	    $value_status = 'error';
	  }
	}
	
	if($_POST['language'] == 'undefined' or $_POST['language'] == ''){
	  $_POST['language'] = 'it-IT';
	}
	
	/*
	if($_POST['regione'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />Regione non pu&ograve; essere vuoto<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['provincia'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />Provincia non pu&ograve; essere vuoto<br/>";
	  $value_status = 'error';
	} */
	
	if($_POST['accentcolor'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_accent<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['icon_set'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_icon<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['timer'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_timer<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['accesscontrol'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_access_control<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['pc'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_pc<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['tablet'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_tablet<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['mobile'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_mobile<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['android'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_android<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['windows'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_windows<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['wp'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_wp<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['visibility'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_visibility<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['show_email'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_show_email<br/>";
	  $value_status = 'error';
	}
	
	if($_POST['show_school'] == ''){
	  $error .= "<img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' style='width: 14px; height: 14px; margin-right: 5px' />$TRAD_no_show_school<br/>";
	  $value_status = 'error';
	}
	
	if($value_status == 'true'){
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
  
	  if (mysqli_connect_errno()) {
	    echo('false');
	    exit();
	  }
	  
	  $ESCAPE_emailaddress = $conn->real_escape_string($_POST['emailaddress']);
	  $ESCAPE_language = $conn->real_escape_string($_POST['language']);
	  $ESCAPE_regione = $conn->real_escape_string($_POST['regione']);
	  $ESCAPE_accentcolor = $conn->real_escape_string($_POST['accentcolor']);
	  $ESCAPE_icon_set = $conn->real_escape_string($_POST['icon_set']);
	  $ESCAPE_timer = $conn->real_escape_string($_POST['timer']);
	  $ESCAPE_accesscontrol = $conn->real_escape_string($_POST['accesscontrol']);
	  $ESCAPE_pc = $conn->real_escape_string($_POST['pc']);
	  $ESCAPE_tablet = $conn->real_escape_string($_POST['tablet']);
	  $ESCAPE_mobile = $conn->real_escape_string($_POST['mobile']);
	  $ESCAPE_android = $conn->real_escape_string($_POST['android']);
	  $ESCAPE_windows = $conn->real_escape_string($_POST['windows']);
	  $ESCAPE_wp = $conn->real_escape_string($_POST['wp']);
	  $ESCAPE_visibility = $conn->real_escape_string($_POST['visibility']);
	  $ESCAPE_show_email = $conn->real_escape_string($_POST['show_email']);
	  $ESCAPE_show_school = $conn->real_escape_string($_POST['show_school']);
	  $ESCAPE_phonenumber = $conn->real_escape_string($_POST['phonenumber']);
	  $ESCAPE_subject = $conn->real_escape_string($_POST['subject']);
	  $ESCAPE_wallpaper_url = $conn->real_escape_string($_POST['wallpaper_url']);
	  $ESCAPE_lim = $conn->real_escape_string($_POST['lim']);
	  
	  $sql = "UPDATE MY_users SET EmailAddress = '$ESCAPE_emailaddress', phone_number = '$ESCAPE_phonenumber', background = '$ESCAPE_wallpaper_url', regione = '$ESCAPE_regione', accent = '$ESCAPE_accentcolor', DOC_subject = '$ESCAPE_subject', pc = '$ESCAPE_pc', tablet = '$ESCAPE_tablet', mobile = '$ESCAPE_mobile', access_control = '$ESCAPE_accesscontrol', language = '$ESCAPE_language', autosave_timer = '$ESCAPE_timer', visible = '$ESCAPE_visibility', visible_school = '$ESCAPE_show_school', visible_email = '$ESCAPE_show_email', icon_set = '$ESCAPE_icon_set' WHERE Username = '".$_SESSION['Username']."'";
	  $executed_query = $conn->query($sql);

	  $conn->close();
	  
	  if($executed_query){
	    echo('true');
	  }else{
	    echo("$sql $TRAD_something_went_wrong_support QS_16");
	  }
	}else{
	  echo($error);
	}
      }elseif($_GET['type'] == 'restore_alerts'){
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	if(mysqli_connect_errno()){
	  echo('false');
	  exit();
	}
	
	$sql = "UPDATE MY_users SET first_login = 'y', bubble_main_menu = 'y' WHERE Username = '".$_SESSION['Username']."'";
	$conn->query($sql);

	$conn->close();
	
	echo('true');
      }elseif($_GET['type'] == 'change_pwd'){
	if($_POST['new_pwd'] != '' and $_POST['old_pwd'] != ''){
	  $_POST['new_pwd'] = md5($_POST['new_pwd']);
	  $_POST['old_pwd'] = md5($_POST['old_pwd']);
	  
	  if($_POST['old_pwd'] == $USERPASSWORDENCRYPTED){
	    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	    if(mysqli_connect_errno()){
	      echo('false');
	      exit();
	    }
	    
	    $sql = "UPDATE MY_users SET Password = '".$_POST['new_pwd']."' WHERE Username = '".$_SESSION['Username']."'";
	    $conn->query($sql);

	    $conn->close();
	    
	    echo('true');
	  }else{
	    echo("$TRAD_current_password_wrong");
	  }
	}else{
	  echo($TRAD_error_form_post.' <b>'.$TRAD_code.'</b> 17');
	}
      }elseif($_GET['type'] == 'finish_wizard'){
	$value_status = 'error';
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	if(mysqli_connect_errno()){
	  echo('false');
	  exit();
	}
	
	$ESCAPE_sex = secure_data_input($_POST['sex']);
	$ESCAPE_type = secure_data_input($_POST['type']);
	$ESCAPE_date = secure_data_input($_POST['date']);
	
	if($USER_sex == '' and ($ESCAPE_sex == 'male' or $ESCAPE_sex == 'female')){
	  $value_status = 'true';
	}
	
	if($USER_type == 'ask' and ($ESCAPE_type == 'student' or $ESCAPE_type == 'teacher' or $ESCAPE_type == 'school')){
	  $value_status = 'true';
	}
	
	if($USER_date_of_birth == '' and $ESCAPE_date != ''){
	  $value_status = 'true';
	}
	
	if($USER_sex != ''){
	  $ESCAPE_sex = $USER_sex;
	}
	if($USER_type != 'ask'){
	  $ESCAPE_type = $USER_type;
	}
	if($USER_date_of_birth != ''){
	  $ESCAPE_date = $USER_date_of_birth;
	}
	
	if($value_status == 'true'){
	  $sql = "UPDATE MY_users SET sex = '$ESCAPE_sex', User_type = '$ESCAPE_type', date_of_birth = '$ESCAPE_date' WHERE Username = '".$_SESSION['Username']."'";
	  $conn->query($sql);
	  
	  echo('true');
	}else{
	  echo("$TRAD_general_error");
	}

	$conn->close();
      }else{
	echo("$TRAD_formpost_general_error");
      }
    }
  }else{
    if($_GET['type'] == 'register'){
      function generateRandomString($length) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
	    $randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
      }
      
      // anti spam system
      $FORM_boh = secure_data_input($_POST['boh']);
      
      $FORM_name = secure_data_input($_POST['name']);
      $FORM_surname = secure_data_input($_POST['surname']);
      $FORM_email = secure_data_input($_POST['email']);
      $FORM_password = secure_data_input(md5($_POST['password']));
      $FORM_username = secure_data_input($_POST['username']);
      $Activation_Code = strtoupper(md5(secure_data_input(generateRandomString(15))));
      $User_Agent = secure_data_input($_SERVER['HTTP_USER_AGENT']);
      $Taskbar = secure_data_input("desktop, files, share, diary, timetable");
      
      $EXIST_USERNAME = lightschool_get_user($FORM_username, 'nothing');
      $EXIST_EMAIL = lightschool_get_user($FORM_email, 'email');
      
      if($FORM_name == '' or $FORM_surname == '' or $FORM_email == '' or $FORM_password == '' or $FORM_username == ''){
	echo($TRAD_fill_field);
      }else{
	if($FORM_boh != ''){
	  echo('Non puoi continuare perch&eacute; sei un robot.');
	}else{
	  if($EXIST_USERNAME != 1){
	    if($EXIST_EMAIL != 1){
	      if(var_dump(preg_match('/\s/',$FORM_username)) == 0){
		  $User_Type = secure_data_input('studente');
		
		// Create connection
		$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
		// Check connection
		if($conn->connect_error){
		    die("Connection failed: " . $conn->connect_error);
		}

		// prepare and bind
		$stmt = $conn->prepare("INSERT INTO MY_users (name, surname, Username, User_type, Password, activation_code, EmailAddress, registred_from, taskbar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssss", $prepare_firstname, $prepare_surname, $prepare_username, $prepare_user_type, $prepare_password, $prepare_activation_code, $prepare_emailaddress, $prepare_registred_from, $prepare_taskbar);

		include_once "mail/send.php";
		$send_email_status = lightschool_send_email('register', "$FORM_email", "$FORM_name", "$FORM_surname", "$FORM_username", "", "m", "#0174DF", "black", "$Activation_Code", "", "", "it-IT");
		?>
		  <span style="display: none">true</span>
		  <h2 style="font-family: 'Roboto'">Benvenuto su LightSchool</h2>
		  <?php
		    if($send_email_status != 'true'){
			echo("$TRAD_register_send_email_error <b>".$send_email_status."</b>");
		    }
		  ?>
		  <?php echo($TRAD_register_welcome); ?>
		<?php
		// set parameters and execute
		$prepare_firstname = "$FORM_name";
		$prepare_surname = "$FORM_surname";
		$prepare_username = "$FORM_username";
		$prepare_user_type = "$User_Type";
		$prepare_password = "$FORM_password";
		$prepare_activation_code = "$Activation_Code";
		$prepare_emailaddress = "$FORM_email";
		$prepare_registred_from = "$User_Agent";
		$prepare_taskbar = "$Taskbar";
		 $stmt->execute();
		
		$stmt->close();
		$conn->close();
	      }else{
		echo("$TRAD_register_invalid_username");
	      }
	    }else{
	      echo("$TRAD_register_invalid_email");
	    }
	  }else{
	    echo("$TRAD_register_invalid_username2");
	  }
	}
      }
    }elseif($_GET['type'] == 'activate_user'){
      $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

      if(mysqli_connect_errno()){
	echo('false');
	exit();
      }
      
      $ESCAPE_code = $conn->real_escape_string($_GET['code']);
      $sql = "UPDATE MY_users SET activation_code = '' WHERE activation_code = '$ESCAPE_code' LIMIT 1";
      $conn->query($sql);

      $conn->close();
    }elseif($_GET['type'] == 'recover'){
      function generateRandomString($length) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for($i = 0; $i < $length; $i++){
	  $randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
      }
      if($_GET['code'] != ''){
	
      }else{
	$user_username = lightschool_get_user($_POST['email'], 'email_to_username');
	
	if($user_username == 'not_exists'){
	  echo("$TRAD_recover_pwd_no_user");
	}else{
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	  if(mysqli_connect_errno()){
	    echo('false');
	    exit();
	  }
	  
	  $recovery_key = strtoupper(md5(secure_data_input(generateRandomString(15))));
	  $ESCAPE_email = $conn->real_escape_string($_POST['email']);
	  $sql = "UPDATE MY_users SET recovery_key = '$recovery_key' WHERE EmailAddress = '$ESCAPE_email' LIMIT 1";
	  $conn->query($sql);

	  $conn->close();
	  
	  $name = lightschool_get_user($user_username, 'name');
	  $surname = lightschool_get_user($user_username, 'surname');
	  $accent_color = lightschool_get_user($user_username, 'accent_color');
	  
	  include_once "mail/send.php";
	  $send_email_status = lightschool_send_email('recover', "$ESCAPE_email", "$name", "$surname", "$user_username", "", "", "$accent_color", "black", "$recovery_key", "", "", "it-IT");
	  
	  echo "true";
	}
      }
    }else{
      echo("$TRAD_formpost_general_error");
    }
  }
?>