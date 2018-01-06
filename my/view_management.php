<?php
$_GET['no_text'] = 'y';

include "base.php";

  if($_SESSION['Username'] != '' or (($actually_page == 'read' or $_GET['read'] == 'y') and $_SESSION['Username'] == '')){
    if($_GET['SQL_type'] == 'contextapp'){
      if($_GET['id'] == 'home'){
	$APP_name = 'Pagina iniziale';
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/home.png';
	$APP_id = 'home';
      }elseif($_GET['id'] == 'desktop'){
	$APP_name = "$TRAD_desktop2";
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/desktop.png';
	$APP_id = 'desktop';
      }elseif($_GET['id'] == 'files'){
	$APP_name = "$TRAD_files";
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/files.png';
	$APP_id = 'files';
      }elseif($_GET['id'] == 'share'){
	$APP_name = "$TRAD_share";
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/share.png';
	$APP_id = 'share';
      }elseif($_GET['id'] == 'test'){
	$APP_name = "$TRAD_app_test";
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/test.png';
	$APP_id = 'test';
      }elseif($_GET['id'] == 'register'){
	$APP_name = "$TRAD_register";
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/register.png';
	$APP_id = 'register';
      }elseif($_GET['id'] == 'diary'){
	$APP_name = "$TRAD_diary2";
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/diary.png';
	$APP_id = 'diary';
      }elseif($_GET['id'] == 'timetable'){
	$APP_name = "$TRAD_timetable";
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/timetable.png';
	$APP_id = 'timetable';
      }elseif($_GET['id'] == 'business'){
	$APP_name = 'Contabilit&agrave;';
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/business.png';
	$APP_id = 'business';
      }elseif($_GET['id'] == 'messages'){
	$APP_name = "$TRAD_messages";
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/mail.png';
	$APP_id = 'messages';
      }elseif($_GET['id'] == 'people'){
	$APP_name = "$TRAD_people";
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/people.png';
	$APP_id = 'people';
      }elseif($_GET['id'] == 'trash'){
	$APP_name = "$TRAD_trash";
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/'.$trash_icon.'_trash.png';
	$APP_id = 'trash';
      }elseif($_GET['id'] == 'settings'){
	$APP_name = "$TRAD_settings";
	$APP_icon = $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/settings.png';
	$APP_id = 'settings';
      }else{
	$APP_name = $_GET['id'];
      }
      ?>
	<p class="close" onclick="closecontextapp()">[X] Chiudi menu</p>
	<?php if($_GET['id'] == 'register'){ ?>
	  <span onclick="">Non ci sono classi preferite</span>
	  <span class="nohover context_app_hr"><hr class="white"/></span>
	<?php } ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/<?= $_GET['id'] ?>"><img src='<?= $APP_icon ?>' />Apri <i><?php echo($APP_name); ?></i></a>
	<?php if(in_array("$APP_id", $USER_taskbar)){ ?>
	  <span onclick="taskbar_app('<?= $APP_id ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/fav_filled.png' ?>' />Rimuovi dalla barra</span>
	<?php }else{ ?>
	  <span onclick="taskbar_app('<?= $APP_id ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/fav.png' ?>' />Aggiungi alla barra</span>
	<?php } if($_GET['type'] == 'taskbar'){ ?>
	  <span class="nohover context_app_hr"><hr class="white"/></span>
	  <span onclick="customize_taskbar()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/settings.png' ?>' />Impostazioni barra</span>
	<?php } ?>
      <?php
    }elseif($_GET['SQL_type'] == 'taskbar'){
      if($_GET['actually_page'] == 'desktop'){
	$PAGE_title = "Ciao $USER_name <img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/smile.png'>";
	$desktop_SELECTED = 'selected';
      }elseif($_GET['actually_page'] == 'files'){
	if($_GET['f'] == ''){
	  $PAGE_title = "I miei file";
	}else{
	  $PAGE_title = $FOLDER_name;
	}
	$FILES_SELECTED = 'selected';
      }elseif($_GET['actually_page'] == 'share'){
	$PAGE_title = 'Condivisi con me';
	$SHARE_SELECTED = 'selected';
      }elseif($_GET['actually_page'] == 'register'){
	$PAGE_title = 'Registro di classe';
	$REGISTER_SELECTED = 'selected';
      }elseif($_GET['actually_page'] == 'diary'){
	$PAGE_title = 'Il mio diario';
	$DIARY_SELECTED = 'selected';
      }elseif($_GET['actually_page'] == 'timetable'){
	$PAGE_title = 'Il mio orario';
	$TIMETABLE_SELECTED = 'selected';
      }elseif($_GET['actually_page'] == 'messages'){
	if($_GET['folder'] == '' or $_GET['folder'] == 'inbox'){
	  $PAGE_title = 'Messaggi in arrivo';
	}elseif($_GET['folder'] == 'sent'){
	  $PAGE_title = 'Messaggi inviati';
	}
	$MESSAGES_SELECTED = 'selected';
      }elseif($_GET['actually_page'] == 'settings'){
	$PAGE_title = 'Impostazioni';
	$SETTINGS_SELECTED = 'selected';
      }
      ?>
      <a href="javascript:void(0)" onclick="main_menu()" class="main_menu_button app <?= $START_SELECTED ?>"><img src="<?= $USER_image ?>" class="main_menu_image profile_picture_image" style="border-radius: 50%; height: 25px; width: 25px" /><span><?php echo($USER_name); ?></span></a>
      <?php if(in_array("home", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/home" app_name="home" class="app <?= $HOME_SELECTED ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/home.png" /><span>Home</span></a>
      <?php } if(in_array("desktop", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/desktop" app_name="desktop" class="app <?= $desktop_SELECTED ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/desktop.png" /><span>Desktop</span></a>
      <?php } if(in_array("files", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/files" app_name="files" class="app <?= $FILES_SELECTED ?>" <?php if($_GET['f'] != ''){ ?> ondrop="drop(event, '/')" ondragover="allowDrop(event)" <?php } ?>><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/files.png" /><span>Quaderni</span></a>
      <?php } if(in_array("share", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/share" app_name="share" class="app <?= $SHARE_SELECTED ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/share.png" /><span>Condivisi</span></a>
      <?php } if(in_array("test", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/test" app_name="test" class="app <?= $TEST_SELECTED ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/test.png" /><span>Quiz</span></a>
      <?php } if(in_array("register", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/register" app_name="register" class="app <?= $REGISTER_SELECTED ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/register.png" /><span>Registro</span></a>
      <?php } if(in_array("diary", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/diary" app_name="diary" class="app <?= $DIARY_SELECTED ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/diary.png" /><span>Diario</span></a>
      <?php } if(in_array("timetable", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/timetable" app_name="timetable" class="app <?= $TIMETABLE_SELECTED ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/timetable.png" /><span>Orario</span></a>
      <?php }if(in_array("business", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/business" app_name="business" class="app <?= $BUSINESS_SELECTED ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/business.png" /><span>Contabilit&agrave;</span></a>
      <?php } if(in_array("messages", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/messages" app_name="messages" class="app <?= $MESSAGES_SELECTED ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/mail.png" /><span>Messaggi</span></a>
      <?php } if(in_array("people", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/people" app_name="people" class="app <?= $PEOPLE_SELECTED ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/people.png" /><span>Rubrica</span></a>
      <?php } if(in_array("trash", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/trash" app_name="trash" class="app <?= $TRASH_SELECTED ?>" <?php if($actually_page == 'files'){ ?> ondrop="drop(event, 'c')" ondragover="allowDrop(event)" <?php } ?>><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/<?= $trash_icon ?>_trash.png" /><span>Cestino</span></a>
      <?php } if(in_array("settings", $USER_taskbar)){ ?>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/settings" app_name="settings" class="settings_app app <?= $SETTINGS_SELECTED ?>" style="margin-right: 20px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/settings.png" /><span>Impostazioni</span></a>
      <?php } ?>
    <?php }else{
      if($_GET['SQL_type'] == 'business_online'){
	$DBName_text = $DBName2;
      }elseif($_GET['SQL_type'] == 'schools' or $_GET['SQL_type'] == 'school_card'){
	$DBName_text = $DBName3;
      }else{
	$DBName_text = $DBName;
      }
      $GENERAL_conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName_text);

      // check connection
      if ($GENERAL_conn->connect_error) {
      
      }
      
      $FILES_ORDER_TEXT = "(CASE WHEN type = 'folder' THEN '1' WHEN type = 'file' THEN '2' WHEN type = 'notebook' THEN '2' WHEN type = 'stuff' THEN '3' ELSE type END), name";
      
      if($_GET['SQL_type'] == 'desktop'){
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$Username' AND (type = 'folder' OR type = 'notebook' OR type = 'file' OR type = 'notebook' OR type = 'ebook' OR type = 'stuff') AND fav = 'y' AND NOT trash = 'y' ORDER BY $FILES_ORDER_TEXT";
	$SQL_no_num_text = 'Nessun collegamento sul Desktop';
	$COL_ICON = $USER_icon_set_black;
      }elseif($_GET['SQL_type'] == 'people_contacts'){
	$GENERAL_sql = "SELECT * FROM MY_peoples WHERE Username = '$Username' AND group_username = '' ORDER BY surname, name";
	$SQL_no_num_text = 'Nessun contatto salvato';
	$COL_ICON = $USER_icon_set2;
      }elseif($_GET['SQL_type'] == 'people_groups'){
	$GENERAL_sql = "SELECT * FROM MY_peoples WHERE Username = '$Username' AND NOT group_username = '' ORDER BY surname, name";
	$SQL_no_num_text = 'Nessun gruppo creato';
	$COL_ICON = $USER_icon_set2;
      }elseif($_GET['SQL_type'] == 'files'){
	if($_GET['f'] != ''){
	  $LOAD_folder = $_GET['f'];
	}else{
	  $LOAD_folder = '/';
	}
	
	if($actually_page == 'share_read'){
	  $write_username = $SHARED_username;
	}else{
	  $write_username = $Username;
	}
	
	$LOAD_folder = $GENERAL_conn->real_escape_string($LOAD_folder);
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$write_username' AND (type = 'folder' OR type = 'notebook' OR type = 'file' OR type = 'notebook' OR type = 'stuff') AND history = '' AND folder = '$LOAD_folder' AND NOT trash = 'y' ORDER BY $FILES_ORDER_TEXT";
	$SQL_no_num_text = 'Nessun file';
	$COL_ICON = $USER_icon_set_black;
      }elseif($_GET['SQL_type'] == 'search_files'){
	$ESCAPE_q = $GENERAL_conn->real_escape_string($_GET['q']);
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$Username' AND (type = 'folder' OR type = 'notebook' OR type = 'file' OR type = 'notebook' OR type = 'stuff') AND history = '' AND (name like '%$ESCAPE_q%' OR html like '%$ESCAPE_q%') ORDER BY $FILES_ORDER_TEXT";
	$SQL_no_num_text = 'Nessun file';
	$COL_ICON = $USER_icon_set_black;
      }elseif($_GET['SQL_type'] == 'folder'){
	$LOAD_folder = $_GET['f'];
	$LOAD_folder = $GENERAL_conn->real_escape_string($LOAD_folder);
	if($actually_page == 'share_read'){
	  $write_username = $SHARED_username;
	}else{
	  $write_username = $Username;
	}
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$write_username' AND type = 'folder' AND id = '$LOAD_folder' LIMIT 1";
	$SQL_no_num_text = 'Nessun file';
	$COL_ICON = $USER_icon_set_black;
      }elseif($_GET['SQL_type'] == 'quiz'){
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$Username' AND type = 'quiz'";
	$SQL_no_num_text = 'Nessun quiz';
	$COL_ICON = $USER_icon_set2;
      }elseif($_GET['SQL_type'] == 'trash_files'){
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '".$_SESSION['Username']."' AND (type = 'folder' OR type = 'notebook' OR type = 'file' OR type = 'notebook' OR type = 'stuff') AND history = '' AND trash = 'y' ORDER BY $FILES_ORDER_TEXT";
	$SQL_no_num_text = 'Nessun elemento nel cestino';
	$COL_ICON = $USER_icon_set2;
      }elseif($_GET['SQL_type'] == 'trash_diary'){
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '".$_SESSION['Username']."' AND type = 'diary' AND trash = 'y' ORDER BY diary_type, name";
	$SQL_no_num_text = 'Nessun elemento nel cestino';
	$COL_ICON = $USER_icon_set2;
      }elseif($_GET['SQL_type'] == 'search_diary'){
	$ESCAPE_q = $GENERAL_conn->real_escape_string($_GET['q']);
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '".$_SESSION['Username']."' AND type = 'diary' AND (name like '%$ESCAPE_q%' OR diary_type like '%$ESCAPE_q%' OR CONCAT(diary_type, ' di ', name) like '%$ESCAPE_q%') ORDER BY diary_type, name";
	$SQL_no_num_text = 'Nessun elemento nel cestino';
	$COL_ICON = $USER_icon_set2;
      }elseif($_GET['SQL_type'] == 'business_online'){
	if($_GET['id'] != ''){
	  $GETIDESCAPE = $GENERAL_conn->real_escape_string($_GET['id']);
	  $extend_sql = " AND id = '$GETIDESCAPE'";
	}else{
	  $extend_sql = "";
	}
	$GENERAL_sql = "SELECT * FROM attivita WHERE UserID = '$USER_uniqueid' $extend_sql";
	$SQL_no_num_text = 'Non ci sono attivit&agrave; online';
	$COL_ICON = $USER_icon_set2;
      }elseif($_GET['SQL_type'] == 'register_lessons'){
	$GENERAL_sql = "SELECT * FROM MY_REG_lessons WHERE class = '".$_GET['class']."' AND day = '".$_GET['day']."'";
	$SQL_no_num_text = '<br/><br/>Nessuna lezione oggi';
	$COL_ICON = $USER_icon_set2;
      }elseif($_GET['SQL_type'] == 'register_marks_student'){
	$GENERAL_sql = "SELECT * FROM MY_REG_marks WHERE class = '".$_GET['class']."' AND student = '$Username'";
	$SQL_no_num_text = 'Nessun voto presente dai tuoi docenti';
	$COL_ICON = $USER_icon_set2;
	
	$REGISTER_marks_subject_array = array();
      }elseif($_GET['SQL_type'] == 'share'){
	if($_GET['username'] != ''){
	  $extend_sql = "AND Sender = '".$_GET['username']."'";
	}
	$GENERAL_sql = "SELECT * FROM MY_share WHERE Receiving = '$USER_uniqueid' $extend_sql ORDER BY Sender, id";
	$SQL_no_num_text = 'Nessun file condiviso';
	$COL_ICON = $USER_icon_set2;
	
	$ARRAY_sender = array();
	$ARRAY_sender2 = array();
      }elseif($_GET['SQL_type'] == 'folder_tree'){
	$GETFTREEESCAPE = $GENERAL_conn->real_escape_string($_GET['f_tree']);
	if($GETFTREEESCAPE == ''){
	  $GETFTREEESCAPE = '/';
	}
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$Username' AND type = 'folder' AND folder = '$GETFTREEESCAPE' AND trash = '' ORDER BY name";
	$SQL_no_num_text = '<span>Nessun elemento</span>';
	$COL_ICON = $USER_icon_set2;
      }elseif($_GET['SQL_type'] == 'diary'){
	$day_num = $GENERAL_conn->real_escape_string($day_num);
	$month = $GENERAL_conn->real_escape_string($month);
	$year = $GENERAL_conn->real_escape_string($year);
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$Username' AND type = 'diary' AND diary_date = '$day_num/$month/$year' AND NOT trash = 'y'";
	$SQL_no_num_text = '';
      }elseif($_GET['SQL_type'] == 'diary_more'){
	$day = $GENERAL_conn->real_escape_string($_GET['day']);
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$Username' AND type = 'diary' AND diary_date = '$day' AND NOT trash = 'y'";
	$SQL_no_num_text = 'Nessun evento diario';
      }elseif($_GET['SQL_type'] == 'diary_element' or $_GET['SQL_type'] == 'diary_element_edit'){
	$GETIDESCAPE = $GENERAL_conn->real_escape_string($_GET['id']);
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$Username' AND type = 'diary' AND id = '$GETIDESCAPE' LIMIT 1";
	$SQL_no_num_text = '';
      }elseif($_GET['SQL_type'] == 'file_info' or $_GET['SQL_type'] == 'file_share' or $_GET['SQL_type'] == 'file_lim' or $_GET['SQL_type'] == 'file_export' or $_GET['SQL_type'] == 'file_embed' or $_GET['SQL_type'] == 'quick_peek' or $_GET['SQL_type'] == 'file_history' or $_GET['SQL_type'] == 'file_rename' or $_GET['SQL_type'] == 'file_delete' or $_GET['SQL_type'] == 'file_restore' or $_GET['SQL_type'] == 'file_icon' or $_GET['SQL_type'] == 'set_profile_image'){
	$GETIDESCAPE = $GENERAL_conn->real_escape_string($_GET['id']);
	if($_GET['type'] == 'subject'){
	  $TABLE = 'timetable';
	}else{
	  $TABLE = 'files';
	}
	$GENERAL_sql = "SELECT * FROM MY_$TABLE WHERE (Username = '$Username' AND (id = '$GETIDESCAPE' OR MD5(id) = '$GETIDESCAPE')) OR (MD5(id) = '$GETIDESCAPE') LIMIT 1";
	$SQL_no_num_text = "<br/>Nessun file trovato";
	$COL_ICON = $USER_icon_set_black;
      }elseif($_GET['SQL_type'] == 'read' or $_GET['SQL_type'] == 'writer'){
	if($actually_page == 'share_read'){
	  $write_username = $SHARED_username;
	}else{
	  $write_username = $Username;
	}
	$GETIDESCAPE = $GENERAL_conn->real_escape_string($_GET['id']);
	$GENERAL_sql = "SELECT * FROM MY_files WHERE (Username = '$write_username' AND (id = '$GETIDESCAPE' OR MD5(id) = '$GETIDESCAPE')) OR (MD5(id) = '$GETIDESCAPE') LIMIT 1";
	$COL_ICON = $USER_icon_set2;
      }elseif($_GET['SQL_type'] == 'timetable' or $_GET['SQL_type'] == 'timetable_subject'){
	$GENERAL_sql = "SELECT * FROM MY_timetable WHERE Username = '$Username' ORDER BY day_of_week, hour_of_day";
	if($_GET['SQL_type'] == 'timetable'){
	  $SQL_no_num_text = '<br/><br/>Nessun orario trovato';
	}elseif($_GET['SQL_type'] == 'timetable_subject'){
	  $SQL_no_num_text = '<br/>Nessun orario trovato<br/><br/>';
	}
      }elseif($_GET['SQL_type'] == 'file_history_list'){
	$GETIDESCAPE = $GENERAL_conn->real_escape_string($_GET['id']);
	$GENERAL_sql = "SELECT * FROM MY_files WHERE (Username = '$Username' AND (history = '$GETIDESCAPE' OR MD5(id) = '$GETIDESCAPE')) OR (MD5(id) = '$GETIDESCAPE') AND type = 'notebook' ORDER BY id DESC";
	$SQL_no_num_text = 'Nessuna cronologia modifiche per questo quaderno';
	$COL_ICON = $USER_icon_set2;
      }elseif($_GET['SQL_type'] == 'move'){
	$GETFESCAPE = $GENERAL_conn->real_escape_string($_GET['f']);
	if($actually_page == 'wallpaper'){
	  $extend_sql = "((type = 'file' AND file_type like 'image/%') OR type = 'folder')";
	  $SQL_no_num_text = 'Non ci sono cartelle o immagini dentro questa cartella.';
	}else{
	  $extend_sql = "type = 'folder'";
	  $SQL_no_num_text = 'Non ci sono cartelle dentro questa cartella.';
	}
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$Username' AND $extend_sql AND NOT trash = 'y' AND folder = '$GETFESCAPE' ORDER BY $FILES_ORDER_TEXT";
	$COL_ICON = $USER_icon_set2;
      }elseif($_GET['SQL_type'] == 'context'){
	$GETIDESCAPE = $GENERAL_conn->real_escape_string($_GET['id']);
	if($_GET['type'] == 'subject'){
	  $GENERAL_sql = "SELECT * FROM MY_timetable WHERE Username = '$Username' AND id = '$GETIDESCAPE' LIMIT 1";
	  $SQL_no_num_text = "<span><img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' />Nessuna materia trovata</span>";
	}else{
	  $GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$Username' AND id = '$GETIDESCAPE' LIMIT 1";
	  $SQL_no_num_text = "<span><img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/cross.png' />Nessun file trovato</span>";
	}
	$COL_ICON = $USER_icon_set1;
      }elseif($_GET['SQL_type'] == 'people_share'){
	$GENERAL_sql = "SELECT * FROM MY_peoples WHERE Username = '$Username' ORDER BY name, surname";
	$SQL_no_num_text = 'Nessun contatto trovato';
      }elseif($_GET['SQL_type'] == 'people_contacts'){
	$GENERAL_sql = "SELECT * FROM MY_peoples WHERE Username = '$Username' AND NOT saved_username = '' ORDER BY name, surname";
	$SQL_no_num_text = 'Nessun contatto trovato';
      }elseif($_GET['SQL_type'] == 'delete_people'){
	$GETIDESCAPE = $GENERAL_conn->real_escape_string($_GET['id']);
	$GENERAL_sql = "SELECT * FROM MY_peoples WHERE Username = '$Username' AND id = '$GETIDESCAPE' LIMIT 1";
	$SQL_no_num_text = 'Nessun contatto trovato';
      }elseif($_GET['SQL_type'] == 'list_share'){
	$GETIDESCAPE = $GENERAL_conn->real_escape_string($_GET['id']);
	$GENERAL_sql = "SELECT * FROM MY_share WHERE Sender = '$USER_uniqueid' AND file_id = '$GETIDESCAPE'";
	$SQL_no_num_text = 'Nessuna condivisione';
      }elseif($_GET['SQL_type'] == 'messages_list'){
	$GETIDESCAPE = $GENERAL_conn->real_escape_string($_GET['id']);
	if($_GET['junk'] != 'y'){
	  $EXTEND_SQL = "NOT";
	  $SQL_no_num_text = 'Nessun messaggio in arrivo';
	}else{
	  $EXTEND_SQL = "";
	  $SQL_no_num_text = 'Nessun messaggio in Posta indesiderata';
	}
	$GENERAL_sql = "SELECT * FROM MY_messages WHERE ((Receiving like '%$Username%' AND NOT group_id = '') OR Receiving = '$Username' OR Sender = '$Username') AND Sender $EXTEND_SQL IN ('".implode($USER_block_list, "', '")."') ORDER BY id DESC";
      }elseif($_GET['SQL_type'] == 'messages_content'){
	$username2 = $GENERAL_conn->real_escape_string($_GET['username']);
	$GENERAL_sql = "SELECT * FROM MY_messages WHERE ((Sender = '$Username' AND Receiving = '$username2') OR (Receiving = '$Username' AND Sender = '$username2')) OR ((Sender = '$Username' AND group_id = '$username2') OR (Receiving like '%$Username%' AND group_id = '$username2')) ORDER BY id ASC";
	$SQL_no_num_text = 'Nessun messaggio trovato';
      }elseif($_GET['SQL_type'] == 'register_overview'){
	if($_GET['allclass'] == 'y' and $_GET['previous'] == 'y'){
	  $GENERAL_sql = "SELECT * FROM MY_REG_class WHERE school IN ('".implode($USER_code_school, "', '")."') AND NOT year = '2015/2016' ORDER BY name ASC";
	}elseif($_GET['allclass'] == 'y'){
	  $GENERAL_sql = "SELECT * FROM MY_REG_class WHERE school IN ('".implode($USER_code_school, "', '")."') AND year = '2015/2016' ORDER BY name ASC";
	}elseif($_GET['previous'] == 'y'){
	  $GENERAL_sql = "SELECT * FROM MY_REG_class WHERE school IN ('".implode($USER_code_school, "', '")."') AND NOT year = '2015/2016' AND Component like '%$Username%' ORDER BY school, name ASC";
	}else{
	  $GENERAL_sql = "SELECT * FROM MY_REG_class WHERE school IN ('".implode($USER_code_school, "', '")."') AND year = '2015/2016' AND Component like '%$Username%' ORDER BY school, name ASC";
	}
	$SQL_no_num_text = "Non fai parte di nessuna classe.";
      }elseif($_GET['SQL_type'] == 'register_sidebar'){
	$GETIDESCAPE = $GENERAL_conn->real_escape_string($_GET['class']);
	$GENERAL_sql = "SELECT * FROM MY_REG_class WHERE school IN ('".implode($USER_code_school, "', '")."') AND id = '$GETIDESCAPE' LIMIT 1";
	$SQL_no_num_text = 'Nessuna classe trovata';
      }elseif($_GET['SQL_type'] == 'register_appello'){
	$GETIDESCAPE = $GENERAL_conn->real_escape_string($_GET['class']);
	$GENERAL_sql = "SELECT * FROM MY_REG_class WHERE school IN ('".implode($USER_code_school, "', '")."') AND id = '$GETIDESCAPE' LIMIT 1";
	$SQL_no_num_text = 'Nessuna classe trovata';
      }elseif($_GET['SQL_type'] == 'justify_required'){
	$GETUSERNAMEESCAPE = $GENERAL_conn->real_escape_string($_GET['username']);
	$ESCAPE_type = $GENERAL_conn->real_escape_string($_GET['type']);
	$GENERAL_sql = "SELECT * FROM MY_REG_justify WHERE Studente = '$GETUSERNAMEESCAPE' AND justified = '0' AND type2 = '$ESCAPE_type'";
	$SQL_no_num_text = "Niente da giustificare";
      }elseif($_GET['SQL_type'] == 'status_marker'){
	$GETUSERNAMEESCAPE = $GENERAL_conn->real_escape_string($_GET['username']);
	$GETCLASSESCAPE = $GENERAL_conn->real_escape_string($_GET['class']);
	$GETDAYSESCAPE = $GENERAL_conn->real_escape_string($_GET['day']);
	if($GETDAYSESCAPE == ''){
	  $GETDAYSESCAPE = $date_now_IT;
	}
	$GENERAL_sql = "SELECT * FROM MY_REG_appello WHERE class = '$GETCLASSESCAPE' AND day = '$GETDAYSESCAPE' LIMIT 1";
	$SQL_no_num_text = 'Nessuna utente corrispondente ai requisiti trovato';
      }elseif($_GET['SQL_type'] == 'devices'){
	$GENERAL_sql = "SELECT * FROM MY_access WHERE Username = '$Username' AND type = '".$_GET['extend']."' ORDER BY id DESC";
	$SQL_no_num_text = 'Nessun dispositivo collegato in questa sezione.';
      }elseif($_GET['SQL_type'] == 'social'){
	$ESCAPE_people = $GENERAL_conn->real_escape_string($_GET['people']);
	$GENERAL_sql = "SELECT * FROM MY_users WHERE (name like '%$ESCAPE_people%' OR surname like '%$ESCAPE_people%' OR EmailAddress like '%$ESCAPE_people%' OR CONCAT(name, ' ', surname) like '%$ESCAPE_people%' OR CONCAT(surname, ' ', name) like '%$ESCAPE_people%') AND deleted = 'n' AND deactivated = 'n' AND visible = 'y' ORDER BY surname, name";
	$SQL_no_num_text = 'Nessun utente trovato.';
      }elseif($_GET['SQL_type'] == 'schools'){
	$ESCAPE_q = $GENERAL_conn->real_escape_string($_GET['school']);
	$ESCAPE_regione = $GENERAL_conn->real_escape_string($_GET['regione']);
	
	if($ESCAPE_q != '' and $ESCAPE_regione != ''){
	  $GENERAL_sql = "SELECT * FROM SC_users WHERE (name like '%$ESCAPE_q%' OR mecc = '$ESCAPE_q') AND surname = '' AND school_id = '' AND regione = '$ESCAPE_regione' AND NOT regione = '' AND NOT city = '' AND NOT mecc = '' ORDER BY name";
	  $SQL_no_num_text = 'Nessuna scuola trovata.';
	}else{
	  $GENERAL_sql = "SELECT * FROM SC_users WHERE (name = '' OR mecc = '') AND surname = '' AND school_id = '' AND regione = '$ESCAPE_regione' AND NOT regione = '' AND NOT city = '' AND NOT mecc = '' ORDER BY name";
	  $SQL_no_num_text = 'Inserisci il nome di una scuola!';
	}
      }elseif($_GET['SQL_type'] == 'school_card'){
	$ESCAPE_id = $GENERAL_conn->real_escape_string($_GET['id']);
	$GENERAL_sql = "SELECT * FROM SC_users WHERE UserID = '$ESCAPE_id' AND surname = '' AND school_id = '' AND NOT regione = '' AND NOT city = '' AND NOT mecc = '' LIMIT 1";
	$SQL_no_num_text = 'Nessuna scuola trovata.';
      }else{
	$GENERAL_sql = "error";
	$SQL_no_num_text = 'Qualcosa &egrave; andato storto...';
      }
      $GENERAL_rs=$GENERAL_conn->query($GENERAL_sql);

      if($GENERAL_rs === false) {
	echo "Pagina non disponibile. Errore fatale nella query SQL.";
      } else {
	$GENERAL_rows_returned = $GENERAL_rs->num_rows;
      }
      $GENERAL_rs->data_seek(0);
      $GENERAL_num = $GENERAL_rs->num_rows;
      
      if($GENERAL_num == 0){
	if($_GET['SQL_type'] == 'diary'){
	  echo('<br/><br/>');
	}else{
	  echo("$SQL_no_num_text");
	}
      }else{
	if($_GET['SQL_type'] == 'list_share'){
	  echo('Attualmente condiviso con:');
	}elseif($_GET['SQL_type'] == 'timetable_subject'){
	  $SUBJECT_array = array();
	}elseif($_GET['SQL_type'] == 'messages_list'){
	  $MESSAGES_people_array = array();
	}elseif($_GET['SQL_type'] == 'diary'){
	  echo('<br/><span style="color: '.$USER_accent.'" class="text_min">&#9679;</span>');
	}else{
	  echo("<span style='display: none' class='nothing_found_files'>Nessun file trovato</span>");
	}
	while($GENERAL_row = $GENERAL_rs->fetch_assoc()){
	  if($_GET['SQL_type'] == 'people_contacts' or $_GET['SQL_type'] == 'people_groups' or $_GET['SQL_type'] == 'delete_people' or $_GET['SQL_type'] == 'people_share'){
	    $PEOPLE_name = $GENERAL_row['name'];
	    $PEOPLE_surname = $GENERAL_row['surname'];
	    $PEOPLE_username = $GENERAL_row['saved_username'];
	    $PEOPLE_group_username = $GENERAL_row['group_username'];
	    $PEOPLE_id = $GENERAL_row['id'];
	    $PEOPLE_image = lightschool_get_user($PEOPLE_username, 'profile_image');
	    
	    if($GENERAL_people_username == ''){
	      $GENERAL_people_username2 = $PEOPLE_name;
	    }else{
	      $GENERAL_people_username2 = $PEOPLE_username;
	    }
	  }elseif($_GET['SQL_type'] == 'social'){
	    $SOCIAL_Username = $GENERAL_row['Username'];
	  }elseif($_GET['SQL_type'] == 'schools' or $_GET['SQL_type'] == 'school_card'){
	    $SCHOOL_id = $GENERAL_row['UserID'];
	    $SCHOOL_name = $GENERAL_row['name'];
	    $SCHOOL_city = $GENERAL_row['city'];
	    $SCHOOL_regione = $GENERAL_row['regione'];
	    $SCHOOL_address = $GENERAL_row['address'];
	    $SCHOOL_phone = $GENERAL_row['phone'];
	    $SCHOOL_type = $GENERAL_row['type'];
	    $SCHOOL_type2 = $GENERAL_row['type2'];
	    $SCHOOL_regione = str_replace("_", " ", $SCHOOL_regione);
	    
	    if($SCHOOL_type == 1){
	      $SCHOOL_type_text = "Scuola primaria";
	    }elseif($SCHOOL_type == 2){
	      $SCHOOL_type_text = "Scuola secondaria di primo grado";
	    }elseif($SCHOOL_type == 3){
	      $SCHOOL_type_text = "Scuola secondaria di secondo grado";
	    }elseif($SCHOOL_type == 4){
	      $SCHOOL_type_text = "Universit&agrave;";
	    }
	    
	    $SCHOOL_profile_image = $GENERAL_row['profile_image'];
	    
	    if($SCHOOL_profile_image == ''){
	      $SCHOOL_profile_image = $BLOB_gray;
	    }
	  }elseif($_GET['SQL_type'] == 'status_marker'){
	    $REGISTER_present = $GENERAL_row['present'];
	    $REGISTER_absent = $GENERAL_row['absent'];
	    
	    $REGISTER_present = explode(", ", $REGISTER_present);
	    $REGISTER_absent = explode(", ", $REGISTER_absent);
	  }elseif($_GET['SQL_type'] == 'register_lessons'){
	    $REGISTER_lesson_docente = $GENERAL_row['Username'];
	    $REGISTER_lesson_suject = $GENERAL_row['subject'];
	    $REGISTER_lesson_type = $GENERAL_row['type'];
	    $REGISTER_lesson_hour = $GENERAL_row['hour'];
	    $REGISTER_lesson_num_hour = $GENERAL_row['num_hour'];
	    $REGISTER_lesson_day = $GENERAL_row['day'];
	    $REGISTER_lesson_html = $GENERAL_row['html'];
	  }elseif($_GET['SQL_type'] == 'register_marks_student'){
	    $REGISTER_marks_docente = $GENERAL_row['Username'];
	    $REGISTER_marks_subject = $GENERAL_row['subject'];
	    $REGISTER_marks_mark = $GENERAL_row['mark'];
	    $REGISTER_marks_date = $GENERAL_row['date'];
	  }elseif($_GET['SQL_type'] == 'register_overview' or $_GET['SQL_type'] == 'register_sidebar' or $_GET['SQL_type'] == 'register_appello'){
	    $REGISTER_id = $GENERAL_row['id'];
	    $REGISTER_name = $GENERAL_row['name'];
	    $REGISTER_component = $GENERAL_row['Component'];
	    $REGISTER_year = $GENERAL_row['year'];
	    $REGISTER_school = $GENERAL_row['school'];
	    $REGISTER_image = $GENERAL_row['image'];
	    $REGISTER_coordinatore = $GENERAL_row['coordinatore'];
	    
	    $no_register_image_text2 = 'Cambia la foto della classe';
	    if($REGISTER_image == ''){
	      $no_register_image_text = 'Carica una foto della classe';
	      $no_register_image_text2 = $no_register_image_text;
	      $no_register_image_class = 'sidebar_no_photo';
	    }
	    
	    $REGISTER_component_array = explode(", ", $REGISTER_component);
	  }elseif($_GET['SQL_type'] == 'messages_list' or $_GET['SQL_type'] == 'messages_content'){
	    $MESSAGES_sender = $GENERAL_row['Sender'];
	    $MESSAGES_receiving = $GENERAL_row['Receiving'];
	    $MESSAGES_group_id = $GENERAL_row['group_id'];
	    $MESSAGES_body = $GENERAL_row['body'];
	    $MESSAGES_date = $GENERAL_row['date'];
	    $MESSAGES_is_read = $GENERAL_row['is_read'];
	    $MESSAGES_id = $GENERAL_row['id'];
	    
	    $THIS_IS_GROUP = false;
	    $MESSAGES_receiving = explode(", ", $MESSAGES_receiving);
	    if(count($MESSAGES_receiving) == 1){
	      $MESSAGES_receiving = $MESSAGES_receiving[0];
	    }else{
	      $THIS_IS_GROUP = true;
	    }
	    
	    if($MESSAGES_subject == ''){
	      $MESSAGES_subject = '<i>Nessun oggetto</i>';
	    }
	    
	    $bubble = 'bubble_left';
	    if($MESSAGES_sender == $_SESSION['Username']){
	      $other_user = $MESSAGES_receiving;
	      $other_user_type = 'destinatario';
	      $bubble = 'bubble_right';
	    }elseif($MESSAGES_receiving == $_SESSION['Username']){
	      $other_user = $MESSAGES_sender;
	      $other_user_type = 'mittente';
	    }
	    
	    if($_GET['select'] == $other_user and $MESSAGES_group_id == ''){
	      $EXTEND_CLASS3 = "selected";
	    }else{
	      $EXTEND_CLASS3 = "";
	    }
	    
	    if($MESSAGES_is_read == 'n' and $MESSAGES_group_id == ''){
	      $MESSAGES_is_read_trad = 'Non letto';
	      
	      if($_GET['SQL_type'] == 'messages_content' and $MESSAGES_receiving == $_SESSION['Username']){
		$validate = lightschool_mark_read($MESSAGES_sender, $Username);
	      }
	    }else{
	      $MESSAGES_is_read_trad = $MESSAGES_is_read;
	    }
	    
	    $IMG = '<img src="'.lightschool_get_user($other_user, 'profile_image').'" style="float: left; margin-right: 20px; border-radius: 50%; width: 45px; height: 45px; border: 1px solid black; margin-top: -3px" onerror="imgError(this);" />';
	    
	    if($THIS_IS_GROUP === false){
	      if(lightschool_get_user($other_user, 'name') != 'not_exists'){
		$COMPLETE = lightschool_get_user($other_user, 'name_surname');
		$COMPLETE2 = $COMPLETE;
	      }else{
		$COMPLETE2 = "<i style='font-family: Roboto'>Account disattivato</i>";
	      }
	    }else{
	      $COMPLETE2 = lightschool_is_people_id_correct($MESSAGES_group_id, 'name_group_stranger');
	    }
	  }elseif($_GET['SQL_type'] == 'share' or $_GET['SQL_type'] == 'list_share'){
	    $GENERAL_share_receiving = $GENERAL_row['Receiving'];
	    $GENERAL_share_sender = $GENERAL_row['Sender'];
	    $GENERAL_share_date = $GENERAL_row['share_date'];
	    $GENERAL_share_id = $GENERAL_row['file_id'];
	    $GENERAL_share_id2 = $GENERAL_row['id'];
	    
	    $GENERAL_share_sender = lightschool_get_user($GENERAL_share_sender, 'id_to_username');
	    $GENERAL_share_receiving = lightschool_get_user($GENERAL_share_receiving, 'id_to_username');
	    
	    if($_GET['SQL_type'] == 'share'){
	      $SHAREFILE_conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	      // check connection
	      if ($SHAREFILE_conn->connect_error) {
	      
	      }
	      
	      $GETIDESCAPE = $GENERAL_conn->real_escape_string($GENERAL_share_id);
	      $COL_ICON = $USER_icon_set2;
	      
	      $SHAREFILE_query = "SELECT * FROM MY_files WHERE Username = '$GENERAL_share_sender' AND id = '$GETIDESCAPE' LIMIT 1";
	      $SHAREFILE_rs=$SHAREFILE_conn->query($SHAREFILE_query);

	      if($SHAREFILE_rs === false) {
		echo "false";
	      } else {
		$SHAREFILE_rows_returned = $SHAREFILE_rs->num_rows;
	      }
	      $SHAREFILE_rs->data_seek(0);
	      $SHAREFILE_num = $SHAREFILE_rs->num_rows;
	      
	      if($SHAREFILE_num == 1){
		while($SHAREFILE_row = $SHAREFILE_rs->fetch_assoc()){
		  $GENERAL_id = $SHAREFILE_row['id'];
		  $GENERAL_username = $SHAREFILE_row['Username'];
		  $GENERAL_name = $SHAREFILE_row['name'];
		  $GENERAL_type = $SHAREFILE_row['type'];
		  $GENERAL_icon = $SHAREFILE_row['icon'];
		  $GENERAL_html = $SHAREFILE_row['html'];
		  $GENERAL_folder = $SHAREFILE_row['folder'];
		  $GENERAL_file_url = $SHAREFILE_row['file_url'];
		  $GENERAL_file_size = $SHAREFILE_row['file_size'];
		  $GENERAL_file_type = $SHAREFILE_row['file_type'];
		  $GENERAL_create_date = $SHAREFILE_row['create_date'];
		  $GENERAL_last_edit = $SHAREFILE_row['last_edit'];
		  $GENERAL_last_view = $SHAREFILE_row['last_view'];
		  
		  $GENERAL_diary_type = $SHAREFILE_row['diary_type'];
		  $GENERAL_diary_date = $SHAREFILE_row['diary_date'];
		  
		  if($GENERAL_create_date == ''){
		    $GENERAL_create_date = 'Errore';
		  }
		  if($GENERAL_last_edit == ''){
		    $GENERAL_last_edit = 'Mai';
		  }
		  if($GENERAL_last_view == ''){
		    $GENERAL_last_view = 'Mai';
		  }
		  
		  $GENERAL_file_size_show = 'Dimensione: '.round($GENERAL_file_size/1024/1024, 2).' MB';
		  $GENERAL_file_type_show = str_replace("image","Immagine ","$GENERAL_file_type");
		  $GENERAL_file_type_show = str_replace("text/html","Pagina web","$GENERAL_file_type_show");
		  $GENERAL_file_type_show = str_replace("application/vnd.openxmlfo","File Microsoft Office","$GENERAL_file_type_show");
		  $GENERAL_file_type_show = str_replace("application/octet-stream","File Microsoft Office Powerpoint","$GENERAL_file_type_show");
		  $GENERAL_file_type_show = str_replace("application/vnd.ms-powerp","File Microsoft Office Powerpoint","$GENERAL_file_type_show");
		  $GENERAL_file_type_show = str_replace("application/msword","File Microsoft Office Word","$GENERAL_file_type_show");
		  $GENERAL_file_type_show = str_replace("application/pdf","Documento PDF","$GENERAL_file_type_show");
		  $GENERAL_file_type_show = str_replace("application/vnd.ms-excel","File Microsoft Office Excel","$GENERAL_file_type_show");
		  $GENERAL_file_type_show = str_replace("/","","$GENERAL_file_type_show");
		  $GENERAL_file_type_show = 'Tipo file: '.$GENERAL_file_type_show;
		  
		  if($GENERAL_type == 'notebook'){
		    $back_link = 'files';
		  }elseif($GENERAL_type == 'diary'){
		    $back_link = 'diary';
		  }elseif($GENERAL_type == 'folder'){
		    $back_link = 'folder';
		  }
		  
		  if($GENERAL_icon == ''){
		    if($GENERAL_type == 'folder'){
		      $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/folder.png";
		    }elseif($GENERAL_type == 'notebook'){
		      $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/files.png";
		    }elseif($GENERAL_type == 'diary'){
		      $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/diary.png";
		    }elseif($GENERAL_type == 'file'){
		      if(strpos($GENERAL_file_type,'image') !== false){
			$GENERAL_icon = "$UPLOAD_MAIN_DIRECTORY/$GENERAL_file_url";
		      }elseif(strpos($GENERAL_file_type,'text/html') !== false){
			$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/html.png";
		      }elseif(strpos($GENERAL_file_type,'application/pdf') !== false){
			$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/pdf.png";
		      }
		      
		      if(strpos($GENERAL_name,'doc') !== false or strpos($GENERAL_name,'docx') !== false){
			$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/word.png";
		      }elseif(strpos($GENERAL_name,'xls') !== false or strpos($GENERAL_name,'xlsx') !== false){
			$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/excel.png";
		      }elseif(strpos($GENERAL_name,'ppt') !== false or strpos($GENERAL_name,'pptx') !== false){
			$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/powerpoint.png";
		      }
		    }
		  }elseif($GENERAL_icon != '' and $GENERAL_type != 'stuff' and $GENERAL_type != 'file'){
		    $GENERAL_icon = "$ROOT_DIRECTORY/images/icons/".$GENERAL_icon;
		  }elseif($GENERAL_icon != '' and $GENERAL_type != 'stuff'){
		    $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/unknown_file.png";
		  }
		  
		  if($GENERAL_type == 'folder'){
		    $GENERAL_type_translate = 'Cartella';
		    $GENERAL_quick_peek_open = ' cartella';
		    $GENERAL_quick_peek_subtitle = $GENERAL_type_translate;
		    $GENERAL_link_type = "$MY_MAIN_DIRECTORY/s/$GENERAL_share_id2";
		  }elseif($GENERAL_type == 'notebook'){                              
		    $GENERAL_type_translate = 'Quaderno';
		    $GENERAL_quick_peek_open = ' nel lettore';
		    $GENERAL_quick_peek_subtitle = $GENERAL_type_translate;
		    $GENERAL_link_type = "$MY_MAIN_DIRECTORY/s/$GENERAL_share_id2";
		  }elseif($GENERAL_type == 'file'){
		    $GENERAL_type_translate = 'File';
		    $GENERAL_quick_peek_subtitle = $GENERAL_file_size_show.'<br/>'.$GENERAL_file_type_show;
		    $GENERAL_link_type = "$UPLOAD_MAIN_DIRECTORY/$GENERAL_file_url";
		  }elseif($GENERAL_type == 'diary'){
		    $GENERAL_name = $GENERAL_diary_type.' di '.$GENERAL_name;
		    $GENERAL_type_translate = '<b style="color: black">Il</b> '.$GENERAL_diary_date;
		    $GENERAL_link_type = "$MY_MAIN_DIRECTORY/s/$GENERAL_share_id2";
		    $GENERAL_quick_peek_subtitle = $GENERAL_type_translate;
		  }elseif($GENERAL_type == 'stuff'){
		    $GENERAL_type_translate = 'Materiale';
		    $GENERAL_link_type = "$MY_MAIN_DIRECTORY/r/$GENERAL_share_id2";
		    $GENERAL_quick_peek_subtitle = $GENERAL_type_translate;
		  }
		  
		  $user_id_share = lightschool_get_user($GENERAL_share_sender, 'id');
		  
		  if($_GET['username'] == ''){
		    if(!in_array("$GENERAL_share_sender", $ARRAY_sender2)){
		      array_push($ARRAY_sender2, $GENERAL_share_sender);
		      $user_share_name = lightschool_get_user($GENERAL_share_sender, 'name');
		      $user_share_surname = lightschool_get_user($GENERAL_share_sender, 'surname');
		      $user_share_profile_image = lightschool_get_user($GENERAL_share_sender, 'profile_image');
		      ?>
			<div class="icon_files" id="opencloseGroupShare_icon_<?= $user_id_share ?>" onclick="opencloseGroupShare('<?= $user_id_share ?>')">
			  <img src="<?= $user_share_profile_image ?>" class="quick_peek_image" style="border-radius: 50%; border: 1px solid black" /><span class="title_files" id="title_<?= $GENERAL_id ?>" file_name="<?= $GENERAL_name ?>" <?= $STYLE_HISTORY2 ?>><?php echo($user_share_name.' '.$user_share_surname); ?></span><br/>
			  <span class="subtitle" id="subtitle_<?= $GENERAL_id ?>">&nbsp;</span>
			</div>
		      <?php
		    }
		  }else{
		    if(!in_array("$GENERAL_share_sender", $ARRAY_sender2)){
			array_push($ARRAY_sender2, $GENERAL_share_sender);
			$user_share_name = lightschool_get_user($GENERAL_share_sender, 'name');
			$user_share_surname = lightschool_get_user($GENERAL_share_sender, 'surname');
			$user_share_profile_image = lightschool_get_user($GENERAL_share_sender, 'profile_image');
			?>
			  <div class="icon_files" id="<?= $GENERAL_id ?>" onclick="opencloseGroupShare('<?= $user_id_share ?>')" style="border: 1px solid transparent">
			    <img src="<?= $user_share_profile_image ?>" class="quick_peek_image" style="border-radius: 50%; border: 1px solid black" /><span class="title_files" id="title_<?= $GENERAL_id ?>" file_name="<?= $GENERAL_name ?>" <?= $STYLE_HISTORY2 ?>><?php echo($user_share_name.' '.$user_share_surname); ?></span><br/>
			    <span class="subtitle" id="subtitle_<?= $GENERAL_id ?>">&nbsp;</span>
			  </div>
			<?php
		      }
		      ?>
		      <div class="icon_files" id="<?= $GENERAL_id ?>" <?= $USER_click_type ?>="window.location.href = '<?= $GENERAL_link_type ?>'">
			<img src="<?= $GENERAL_icon ?>" class="quick_peek_image" /><span class="title_files" id="title_<?= $GENERAL_id ?>" file_name="<?= $GENERAL_name ?>" <?= $STYLE_HISTORY2 ?>><?php echo($GENERAL_name); ?></span><br/>
			<span class="subtitle" id="subtitle_<?= $GENERAL_id ?>"><?php echo($GENERAL_type_translate); ?></span>
		      </div>
		    <?php
		  }
		}
		?>
		<span id="group_share_<?= $user_id_share ?>" style="border: 1px solid <?= $USER_accent ?>; padding: 0px 20px; display: none">Caricamento...</span>
		<?php
	      }
	    }
	  }elseif($_GET['SQL_type'] == 'folder'){
	    $FOLDER_name = $GENERAL_row['name'];
	    $FOLDER_fav = $GENERAL_row['fav'];
	  }elseif($_GET['SQL_type'] == 'justify_required'){
	    $REGISTER_JUSTIFY_date = $GENERAL_row['date'];
	    
	    if($ESCAPE_type == 'uscite' or $ESCAPE_type == 'ritardi'){
	      $REGISTER_JUSTIFY_hour = " ".$GENERAL_row['more'];
	    }
	  }elseif($_GET['SQL_type'] == 'diary' or $_GET['SQL_type'] == 'diary_element' or $_GET['SQL_type'] == 'trash_diary' or $_GET['SQL_type'] == 'search_diary' or $_GET['SQL_type'] == 'diary_more'){
	    $DIARY_name = $GENERAL_row['name'];
	    $DIARY_type = $GENERAL_row['diary_type'];
	    $DIARY_id = $GENERAL_row['id'];
	    $DIARY_fore_color = $GENERAL_row['diary_fore_color'];
	    $DIARY_date = $GENERAL_row['diary_date'];
	    $DIARY_reminder = $GENERAL_row['diary_reminder'];
	    $DIARY_details = $GENERAL_row['html'];
	    
	    if($DIARY_details == ''){
	      $DIARY_details = '<i style="color: gray">Nessuna descrizione</i>';
	    }
	    $DIARY_icon = "$IMAGES_MAIN_DIRECTORY/$USER_icon_set_black/diary.png";
	  }elseif($_GET['SQL_type'] == 'business_online'){
	    $BUSINESS_activity_id = $GENERAL_row['id'];
	    $BUSINESS_activity_name = $GENERAL_row['name'];
	    $BUSINESS_activity_type = $GENERAL_row['type'];
	  }elseif($_GET['SQL_type'] == 'timetable' or $_GET['SQL_type'] == 'timetable_subject' or ($_GET['SQL_type'] == 'context' and $_GET['type'] == 'subject')){
	    $TIMETABLE_day_num = $GENERAL_row['day_of_week'];
	    $TIMETABLE_subject = $GENERAL_row['subject'];
	    $TIMETABLE_fore_color = $GENERAL_row['fore_color'];
	    $TIMETABLE_hour_of_day = $GENERAL_row['hour_of_day'];
	    $TIMETABLE_book = $GENERAL_row['book'];
	    $TIMETABLE_id = $GENERAL_row['id'];
	    
	    $GENERAL_id = $TIMETABLE_id;
	    $GENERAL_name = $TIMETABLE_subject;
	    
	    if($_GET['SQL_type'] == 'timetable_subject' and $TIMETABLE_fore_color == ''){
	      $TIMETABLE_fore_color = '#000000';
	    }
	    if($TIMETABLE_day_num == '1'){
	      $TIMETABLE_day_text = 'Luned&igrave;';
	    }elseif($TIMETABLE_day_num == '2'){
	      $TIMETABLE_day_text = 'Marted&igrave;';
	    }elseif($TIMETABLE_day_num == '3'){
	      $TIMETABLE_day_text = 'Mercoled&igrave;';
	    }elseif($TIMETABLE_day_num == '4'){
	      $TIMETABLE_day_text = 'Gioved&igrave;';
	    }elseif($TIMETABLE_day_num == '5'){
	      $TIMETABLE_day_text = 'Venerd&igrave;';
	    }elseif($TIMETABLE_day_num == '6'){
	      $TIMETABLE_day_text = 'Sabato';
	    }elseif($TIMETABLE_day_num == '7'){
	      $TIMETABLE_day_text = 'Domenica';
	    }else{
	      $TIMETABLE_day_text = 'Errore';
	    }
	  }else{
	    $GENERAL_id = $GENERAL_row['id'];
	    $GENERAL_username = $GENERAL_row['Username'];
	    $GENERAL_name = $GENERAL_row['name'];
	    $GENERAL_type = $GENERAL_row['type'];
	    $GENERAL_icon = $GENERAL_row['icon'];
	    $GENERAL_html = $GENERAL_row['html'];
	    $GENERAL_folder = $GENERAL_row['folder'];
	    $GENERAL_file_url = $GENERAL_row['file_url'];
	    $GENERAL_file_size = $GENERAL_row['file_size'];
	    $GENERAL_file_type = $GENERAL_row['file_type'];
	    $GENERAL_create_date = $GENERAL_row['create_date'];
	    $GENERAL_last_edit = $GENERAL_row['last_edit'];
	    $GENERAL_last_view = $GENERAL_row['last_view'];
	    $GENERAL_fav = $GENERAL_row['fav'];
	    $GENERAL_trash = $GENERAL_row['trash'];
	    $GENERAL_history = $GENERAL_row['history'];
	    
	    if($_GET['SQL_type'] == 'writer' and $GENERAL_history != ''){
	      echo("Non puoi modificare un quaderno partendo da una sua versione precedente.");
	      exit();
	    }
	    
	    if($GENERAL_create_date == ''){
	      $GENERAL_create_date = 'Errore';
	    }
	    if($GENERAL_last_edit == ''){
	      $GENERAL_last_edit = 'Mai';
	    }
	    if($GENERAL_last_view == ''){
	      $GENERAL_last_view = 'Mai';
	    }
	    
	    $GENERAL_file_size_show = 'Dimensione: '.round($GENERAL_file_size/1024/1024, 2).' MB';
	    $GENERAL_file_type_show = str_replace("image","Immagine ","$GENERAL_file_type");
	    $GENERAL_file_type_show = str_replace("text/html","Pagina web","$GENERAL_file_type_show");
	    $GENERAL_file_type_show = str_replace("application/vnd.openxmlfo","File Microsoft Office","$GENERAL_file_type_show");
	    $GENERAL_file_type_show = str_replace("application/octet-stream","File Microsoft Office Powerpoint","$GENERAL_file_type_show");
	    $GENERAL_file_type_show = str_replace("application/vnd.ms-powerp","File Microsoft Office Powerpoint","$GENERAL_file_type_show");
	    $GENERAL_file_type_show = str_replace("application/msword","File Microsoft Office Word","$GENERAL_file_type_show");
	    $GENERAL_file_type_show = str_replace("application/pdf","Documento PDF","$GENERAL_file_type_show");
	    $GENERAL_file_type_show = str_replace("application/vnd.ms-excel","File Microsoft Office Excel","$GENERAL_file_type_show");
	    $GENERAL_file_type_show = str_replace("/","","$GENERAL_file_type_show");
	    $GENERAL_file_type_show = 'Tipo file: '.$GENERAL_file_type_show;
	    
	    if($GENERAL_type == 'notebook'){
	      $back_link = 'files';
	    }elseif($GENERAL_type == 'diary'){
	      $back_link = 'diary';
	    }
	    
	    if($GENERAL_type == 'folder' and $GENERAL_icon != ''){
	      $GENERAL_icon2 = "$IMAGES_MAIN_DIRECTORY/color/".$GENERAL_icon;
	    }
	      
	    if($GENERAL_icon == ''){
	      if($GENERAL_type == 'folder'){
		$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/folder.png";
		$GENERAL_icon2 = "$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/folder.png";
	      }elseif($GENERAL_type == 'notebook'){
		$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/files.png";
	      }elseif($GENERAL_type == 'quiz'){
		$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/test.png";
	      }elseif($GENERAL_type == 'diary'){
		$GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/diary.png";
	      }elseif($GENERAL_type == 'file'){
		if(strpos($GENERAL_file_type,'image') !== false){
		  $GENERAL_icon = "$UPLOAD_MAIN_DIRECTORY/$GENERAL_file_url";
		}elseif(strpos($GENERAL_file_type,'text/html') !== false){
		  $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/html.png";
		}elseif(strpos($GENERAL_file_type,'application/pdf') !== false){
		  $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/pdf.png";
		}elseif(strpos($GENERAL_file_type,'java') !== false or strpos($GENERAL_file_type,'text/x-c++') !== false){
		  $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/java.png";
		}
		
		if(strpos($GENERAL_name,'doc') !== false or strpos($GENERAL_name,'docx') !== false){
		  $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/word.png";
		}elseif(strpos($GENERAL_name,'xls') !== false or strpos($GENERAL_name,'xlsx') !== false){
		  $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/excel.png";
		}elseif(strpos($GENERAL_name,'ppt') !== false or strpos($GENERAL_name,'pptx') !== false){
		  $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/powerpoint.png";
		}
		
		if($GENERAL_icon == ''){
		  $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/unknown_file.png";
		}
	      }
	    }elseif($GENERAL_icon != '' and $GENERAL_type != 'stuff' and $GENERAL_type != 'file'){
	      $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/color/".$GENERAL_icon;
	    }elseif($GENERAL_icon != '' and $GENERAL_type != 'stuff'){
	      $GENERAL_icon = "$IMAGES_MAIN_DIRECTORY/$COL_ICON/unknown_file.png";
	    }
	    
	    if($actually_page == 'share_read'){
	      $open_folder = 's';
	      $open_file = 's';
	      $open_diary = 's';
	    }else{
	      $open_folder = 'f';
	      $open_file = 'r';
	      $open_diary = 'r';
	    }
	    
	    if($GENERAL_type == 'folder'){
	      $GENERAL_type_translate = lightschool_get_folder_element_num($GENERAL_id).' elementi';
	      $GENERAL_quick_peek_open = ' '.$TRAD_folder;
	      $GENERAL_quick_peek_subtitle = $TRAD_folder;
	      $GENERAL_context = $TRAD_folder;
	      $GENERAL_link_type = "$MY_MAIN_DIRECTORY/$open_folder/$GENERAL_id";
	    }elseif($GENERAL_type == 'notebook'){
	      $GENERAL_type_translate = $TRAD_notebook;
	      $GENERAL_context = $TRAD_notebook;
	      $GENERAL_quick_peek_open = ' nel lettore';
	      $GENERAL_quick_peek_subtitle = $GENERAL_type_translate;
	      $GENERAL_link_type = "$MY_MAIN_DIRECTORY/$open_file/$GENERAL_id";
	    }elseif($GENERAL_type == 'file'){
	      $GENERAL_type_translate = $TRAD_file;
	      $GENERAL_context = $TRAD_file;
	      $GENERAL_quick_peek_subtitle = $GENERAL_file_size_show.'<br/>'.$GENERAL_file_type_show;
	      $GENERAL_link_type = "$UPLOAD_MAIN_DIRECTORY/$GENERAL_file_url";
	    }elseif($GENERAL_type == 'diary'){
	      $GENERAL_type_translate = $TRAD_diary_event;
	      $GENERAL_context = $TRAD_diary_event;
	      $GENERAL_link_type = "$MY_MAIN_DIRECTORY/$open_diary/$GENERAL_id";
	      $GENERAL_quick_peek_subtitle = $GENERAL_type_translate;
	      $GENERAL_name = $GENERAL_diary_type.' di '.$GENERAL_name;
	    }elseif($GENERAL_type == 'stuff'){
	      $GENERAL_type_translate = $TRAD_stuff;
	      $GENERAL_context = $TRAD_stuff;
	      $GENERAL_link_type = "$MY_MAIN_DIRECTORY/r/$GENERAL_id";
	      $GENERAL_quick_peek_subtitle = $GENERAL_type_translate;
	    }elseif($GENERAL_type == 'quiz'){
	      $GENERAL_type_translate = $TRAD_quiz;
	      $GENERAL_context = $TRAD_quiz;
	      $GENERAL_link_type = "$MY_MAIN_DIRECTORY/quiz/$GENERAL_id";
	      $GENERAL_quick_peek_subtitle = $GENERAL_type_translate;
	    }
	    
	    if($_GET['SQL_type'] == 'file_history_list'){
	      $GENERAL_type_translate = 'Quaderno del '.$GENERAL_create_date;
	      $STYLE_HISTORY = ' style="width: 100% !important"';
	      $STYLE_HISTORY2 = ' style="width: calc(100% - 50px) !important"';
	    }
	    
	    if($GENERAL_fav == 'y'){
	      $FAV_icon = 'fav_filled';
	      $FAV_text = "Rimuovi dal";
	    }else{
	      $FAV_icon = 'fav';
	      $FAV_text = "Aggiungi al";
	    }
	  }
	  if($_GET['SQL_type'] == 'desktop' or $_GET['SQL_type'] == 'files' or $_GET['SQL_type'] == 'file_history_list' or $_GET['SQL_type'] == 'trash_files' or $_GET['SQL_type'] == 'search_files'){
	    if($actually_page == 'share_read'){
	      $checkbox = '';
	      $NO_FOLDER = true;
	    }else{
	      $checkbox = "<input type='checkbox' class='file_selector' id='file_selector_$GENERAL_id' value='$GENERAL_id' />";
	      $NO_FOLDER = false;
	    }
	    if(($NO_FOLDER == false) or ($NO_FOLDER == true and $GENERAL_type != 'folder')){
	    ?>
	      <a class="icon_files" file_id="<?= $GENERAL_id ?>" title="<?= $GENERAL_name ?>" id="<?= $GENERAL_id ?>" <?= $USER_click_type ?>="window.location.href = '<?= $GENERAL_link_type ?>'" name="<?= strtolower($GENERAL_name) ?>" draggable="true" <?php if($GENERAL_type == 'folder'){ ?> ondrop="drop(event, this.id)" ondragover="allowDrop(event)" <?php } ?> ondragstart="drag(event, this.id)" <?= $STYLE_HISTORY ?> href="javascript:void(0);">
		<div id="count_<?= $GENERAL_id ?>" class="count_selected"></div><?php echo($checkbox); ?>
		<img src="<?= $GENERAL_icon ?>" class="quick_peek_image" id="<?= $GENERAL_id ?>" /><span class="title_files" id="title_<?= $GENERAL_id ?>" file_name="<?= $GENERAL_name ?>" <?= $STYLE_HISTORY2 ?>><?php echo($GENERAL_name); ?></span><br/>
		<span class="subtitle" id="subtitle_<?= $GENERAL_id ?>"><?php echo($GENERAL_type_translate); ?></span>
	      </a>
	    <?php
	    }
	  }elseif($_GET['SQL_type'] == 'trash_diary' or $_GET['SQL_type'] == 'search_diary' or $_GET['SQL_type'] == 'diary_more'){
	  ?>
	    <a class="icon_files diary_event_single" title="<?= $DIARY_name ?>" id="<?= $DIARY_id ?>" diary_id="<?= $DIARY_id ?>" diary_name="<?= $DIARY_type.' di '.$DIARY_name ?>" name="<?= strtolower($DIARY_name) ?>" href="javascript:void(0);">
	      <div id="count_<?= $DIARY_id ?>" class="count_selected"></div><input type='checkbox' style='float: right; display: none' class='file_selector' id='file_selector_<?= $DIARY_id ?>' value='<?= $DIARY_id ?>' />
	      <img src="<?= $DIARY_icon ?>" class="quick_peek_image" id="<?= $DIARY_id ?>" /><span class="title_files" id="title_<?= $DIARY_id ?>" file_name="<?= $DIARY_name ?>" <?= $STYLE_HISTORY2 ?>><?php echo("$DIARY_type di $DIARY_name"); ?></span><br/>
	      <span class="subtitle" id="subtitle_<?= $DIARY_id ?>"><?php echo($DIARY_date); ?></span>
	    </a>
	  <?php
	  }elseif($_GET['SQL_type'] == 'quiz'){
	  ?>
	    <div class="icon_files" title="<?= $GENERAL_name ?>" id="<?= $GENERAL_id ?>" <?= $USER_click_type ?>="window.location.href = '<?= $GENERAL_link_type ?>'" name="<?= strtolower($GENERAL_name) ?>" style="height: 26px !important">
	      <img src="<?= $GENERAL_icon ?>" class="quick_peek_image" style="width: 16px !important; height: 16px !important" /><span class="title_files" id="title_<?= $GENERAL_id ?>" file_name="<?= $GENERAL_name ?>"><?php echo($GENERAL_name); ?></span>
	    </div>
	  <?php
	  }elseif($_GET['SQL_type'] == 'folder_tree'){
	    if($GENERAL_name == $FOLDER_name){
	      $IF_CURRENT = 'background-color: '.$USER_accent_darker;
	    }else{
	      $IF_CURRENT = '';
	    }
	  ?>
	    <span class="sidebar_span_element" style="display: block; width: auto; <?= $IF_CURRENT ?>" ondrop="drop(event, '<?= $GENERAL_id ?>')" ondragover="allowDrop(event)"><img src="<?= $GENERAL_icon2 ?>" style="width: 13px; height: 13px; margin-top: 5px; display: inline-block; float: left" onclick="tree_folder('<?= $GENERAL_id ?>')" />&nbsp;<span onclick="window.location.href = '<?= $GENERAL_id ?>'" style="width: auto; padding: 0px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; width: calc(100% - 20px); display: inline-block; margin-top: 2px; height: 20px"><?php echo($GENERAL_name); ?></span></span>
	    <div class="indent_tree" id="tree_<?= $GENERAL_id ?>"></div>
	  <?php
	  }elseif($_GET['SQL_type'] == 'timetable'){
	    if($TIMETABLE_day_text != $day_list){
	      echo('<br/><br/><span class="day">'.$TIMETABLE_day_text.'</span>');
	    }
	    ?>
	      <span style="color: <?= $TIMETABLE_fore_color ?> !important" id="<?= $TIMETABLE_id ?>" <?php if($TIMETABLE_book != ''){ ?> data-hint="<?= $TIMETABLE_book ?>" class="hint--bottom timetable_subject" <?php }else{ ?> class="timetable_subject"<?php } ?>><?php echo($TIMETABLE_subject); ?></span>
	    <?php
	    $day_list = $TIMETABLE_day_text;
	  }elseif($_GET['SQL_type'] == 'timetable_subject'){
	    if(!in_array("$TIMETABLE_subject", $SUBJECT_array)){
	    ?>
	      <p onclick="compile_subject(this.id, '<?= $TIMETABLE_fore_color ?>', '<?= $TIMETABLE_book ?>')" class="p_list_share" id="<?= $TIMETABLE_subject ?>" style="color: <?= $TIMETABLE_fore_color ?>" subject="<?= strtolower($TIMETABLE_subject) ?>"><?php echo($TIMETABLE_subject); ?></p>
	    <?php
	    }
	    array_push($SUBJECT_array, "$TIMETABLE_subject");
	  }elseif($_GET['SQL_type'] == 'quick_peek'){
	  ?>
	    <br/>
	    <?php if($GENERAL_type == 'file'){ ?>
	    <a href="<?= $GENERAL_link_type ?>" style="float: right; color: <?= $USER_accent ?>; text-decoration: none; display: inline-block; margin-right: 10px" download>Scarica</a>
	    <?php } ?><a href="<?= $GENERAL_link_type ?>" style="float: right; color: <?= $USER_accent ?>; text-decoration: none; display: inline-block; margin-right: 10px">Apri <?php echo($GENERAL_quick_peek_open); ?></a>
	    <img src="<?= $GENERAL_icon ?>" style="width: 28px; height: 32px; float: left; margin-right: 10px; margin-top: 3px; padding-bottom: 10px" /><span style="display: inline-block; font-size: 14pt; width: 240px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis"><?php echo($GENERAL_name); ?></span><br/>
	    <span style="font-size: 10pt"><?php echo(ucfirst($GENERAL_quick_peek_subtitle)); ?></span><br/><br/>
	    <div style="max-height: 300px; width: 100%; overflow: auto" class="quick_peek_content_html"><?php echo($GENERAL_html); ?></div>
	  <?php
	  }elseif($_GET['SQL_type'] == 'diary'){
	  ?>
	    <span class="text_complete diary_event_single" style="color: <?= $DIARY_fore_color ?>" diary_id="<?= $DIARY_id ?>" diary_name="<?= $DIARY_type.' di '.$DIARY_name ?>"><?php echo($DIARY_type.' di '.$DIARY_name); ?></span><br/>
	  <?php
	  }elseif($_GET['SQL_type'] == 'diary_element'){
	  ?>
	    <p style="font-size: 16pt; color: <?= $DIARY_fore_color ?>; max-width: calc(100% - 70px)"><?php echo($DIARY_type.' di '.$DIARY_name); ?></p><span style="float: right; margin-top: -50px !important; margin-right: 30px !important; display: inline-block; cursor: pointer; color: <?= $DIARY_fore_color ?>" onclick="update_diary()">Modifica</span><span style="float: right; margin-top: -50px !important; margin-right: 120px !important; display: inline-block; cursor: pointer; color: <?= $DIARY_fore_color ?>" onclick="closeDialog(); delete_f('<?= $DIARY_id ?>', '<?= $DIARY_type ?> <?= $DIARY_name ?>')">Elimina</span>
	    <p><?php echo($DIARY_details); ?></p>
	  <?php
	  }elseif($_GET['SQL_type'] == 'diary_element_edit'){
	  ?>
	    <br/>
	    <?php
	      $_GET['EDITOR_type'] = 'min';
	      $_GET['EDITOR_kind'] = 'edit_diary';
	      include_once "editor.php";
	    ?>
	    <label for="type">Tipo</label><br/>
	    <select id="type2" name="type" style="width: 320px !important">
	      <option><?php echo($DIARY_type); ?></option>
	      <option disabled="disabled">----------------</option>
	      <option>Compiti</option>
	      <option>Interrogazione</option>
	      <option>Verifica</option>
	      <option>Relazione</option>
	      <option>Saggio</option>
	      <option>Esame</option>
	      <option>Attivit&agrave; di laboratorio</option>
	      <option>Uscita didattica</option>
	      <option>Vacanza</option>
	      <option>Compleanno</option>
	      <option>Altro</option>
	    </select><br/><br/>
	    <input type="text" id="accentcolor2" name="accentcolor" placeholder="Colore" value="<?= $DIARY_fore_color ?>" style="color: <?= $DIARY_fore_color ?>; background-color: <?= $DIARY_fore_color ?>; width: 10px; height: 10px; border-radius: 50%; margin-right: 10px" readonly="readonly" autocomplete="off" /><input type="text" id="subject2" name="subject" placeholder="Materia" oninput="subject_input_fun(this.value)" autocomplete="off" style="width: 260px !important" value="<?= $DIARY_name ?>" />
	    <div id="subject_input_autosuggestion" class="autosuggestion" style="width: 270px !important; max-width: 270px !important; min-width: 270px !important">
	      <?php
		$_GET['SQL_type'] = 'timetable_subject';
		include "view_management.php";
	      ?>
	    </div><br style="line-height: 20px"/>
	    <label for="date2">Data:</label><br/>
	    <input type="text" id="date2" name="date" placeholder="Data" autocomplete="off" readonly="readonly" style="width: 300px !important" value="<?= $DIARY_date ?>" /><br/>
	    <label for="reminder2">Promemoria</label><br/>
	    <input type="text" id="reminder2" name="reminder" placeholder="Promemoria" autocomplete="off" readonly="readonly" style="width: 300px !important" value="<?= $DIARY_reminder ?>" /><br/><br/>
	    <button style="margin-right: 25px" onclick="update_diary_confirm()">Salva</button>
	  <?php
	  }elseif($_GET['SQL_type'] == 'file_info'){
	    ?>
	      <span style="float: right; display: inline-block; margin-right: 10px; font-weight: bold; color: black; cursor: pointer; width: 20px" onclick="closeSidebar()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/cross.png' ?>' style='width: 20px; height: 20px; margin-right: 5px' /></span>
	      <?php if($_GET['combo'] != ''){ 
		echo('<span style="font-size: 16pt">'.$_GET['combo'].' file selezionati</span><br/><br/>');
	      }else{ ?>
	      <span style="font-size: 16pt">Informazioni</span><br/><br/>
	      <?php if($GENERAL_type == 'notebook'){ ?><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https:<?= $MY_MAIN_DIRECTORY.'/r/'.md5($GENERAL_id) ?>&choe=UTF-8' style='width: 50px; height: 50px; margin-right: 5px; float: right' onmouseover="zoominqr()" onmouseleave="zoomoutqr()" id="qrcode_img" /><?php } ?>
	      <img src="<?= $GENERAL_icon ?>" style="width: 28px; height: 32px; float: left; margin-right: 10px; margin-top: 3px; padding-bottom: 80px; cursor: pointer" title="Cambia icona" onclick="change_icon('<?= $GENERAL_id ?>', '<?= $GENERAL_name ?>')" /><span style="display: inline-block; font-size: 14pt; width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis"><?php echo($GENERAL_name); ?></span><br/>
	      <span style="font-size: 10pt"><?php echo(ucfirst($GENERAL_quick_peek_subtitle)); ?></span><br/>
	      <?php if($GENERAL_type == 'notebook' or $GENERAL_type == 'file'){ ?>
		<br/>
		<span style="font-size: 10pt"><span style="display: inline-block; font-weight: bold; width: 115px">Creazione:</span> <?php echo($GENERAL_create_date); ?></span><br/>
	      <?php } ?>
	      <?php if($GENERAL_type == 'notebook'){ ?>
		<span style="font-size: 10pt"><span style="display: inline-block; font-weight: bold; width: 115px">Ultima modifica:</span> <?php echo($GENERAL_last_edit); ?></span><br/>
		<span style="font-size: 10pt"><span style="display: inline-block; font-weight: bold; width: 115px">Ultima apertura:</span> <?php echo($GENERAL_last_view); ?></span>
		<br/><br/>
		<?php if($_GET['read'] != 'y'){ ?>
		  <span style="font-size: 16pt">Contenuto</span><br/>
		  <div style="height: calc(100% - 350px) !important; width: 100%; overflow: auto"><?php echo($GENERAL_html); ?></div>
		<?php } ?>
	      <?php } ?>
	    <?php
	    }
	  }elseif($_GET['SQL_type'] == 'move'){
	  ?>
	    <div class="icon_files" id="<?= $GENERAL_id ?>" style="" title="<?= $GENERAL_name ?>">
	      <img src="<?= $GENERAL_icon ?>" /><span class="title_files" id="title_<?= $GENERAL_id ?>"><?php echo($GENERAL_name); ?></span><br/>
	      <?php if($GENERAL_type == 'file' and strpos($GENERAL_file_type,'image') !== false){ ?>
	      <span class="subtitle link" id="subtitle_<?= $GENERAL_id ?>" onclick="selectWallpaper('<?= $GENERAL_file_url ?>')" style="display: inline-block !important; color: <?= $USER_accent ?>">Seleziona quest'immagine</span>
	      <?php }else{ ?>
	      <?php if($actually_page == 'wallpaper'){ ?>
		<span class="subtitle link" id="subtitle_<?= $GENERAL_id ?>" onclick="$('#wallpaper_frame').load('<?= $MY_MAIN_DIRECTORY ?>/wallpaper.php?f=<?= $GENERAL_id ?>&sidebar=no');" style="display: inline-block !important;  color: <?= $USER_accent ?>">Apri</span>
	      <?php }else{ ?>
		<span class="subtitle link" id="subtitle_<?= $GENERAL_id ?>" onclick="$('#move_frame').load('<?= $MY_MAIN_DIRECTORY ?>/move.php?id=' + <?= $_GET['id'] ?> + '&f=<?= $GENERAL_id ?>&sidebar=no');" style="display: inline-block !important; color: <?= $USER_accent ?>; width: auto !important; width: auto !important">Apri</span>
		&nbsp;|&nbsp;<span class="subtitle link" id="subtitle_<?= $GENERAL_id ?>" onclick="confirm_move(JSON.stringify('<?= $_GET['id'] ?>'), '<?= $GENERAL_id ?>')" style="display: inline-block !important; color: <?= $USER_accent ?>; width: auto !important; width: auto !important">Sposta in questa cartella</span>
	      <?php } } ?>
	    </div>
	  <?php
	  }elseif($_GET['SQL_type'] == 'file_rename'){
	  ?>
	    <br/>
	    <input type="text" id="rename_input" name="rename_input" placeholder="Rinomina" value="<?= $GENERAL_name ?>" style="width: calc(100% - 170px)" /><button style="margin-left: 10px" onclick="confirm_rename('<?= $_GET['id'] ?>')">Rinomina</button>
	  <?php
	  }elseif($_GET['SQL_type'] == 'file_delete'){
	    $_GET['combo'] = json_decode($_GET['combo'], true);
	    $combo_array = implode(", ", $_GET['combo']);
	    ?>
	    <br/>
	    <?php
	    if(count(array_filter($_GET['combo'])) > 1){
	    }else{
	      $combo_array = $_GET['id'];
	    }
	    if($GENERAL_trash != 'y'){ ?>
	    Come si desidera eliminare il file selezionato?<br/><br/>
	    <?php
	      if($_GET['type'] == '' or $_GET['type'] == 'diary'){ ?>
		<button style="float: left" onclick="confirm_delete_trash('<?= $combo_array ?>')">Sposta nel cestino</button>
	      <?php
	      }
	    }else{
	    ?>
	      Sei sicuro di voler eliminare definitivamente il file?<br/><br/>
	    <?php } ?>
	    <button style="float: right; margin-right: 20px" onclick="confirm_delete('<?= $combo_array ?>')">Elimina definitivamente</button>
	  <?php
	  }elseif($_GET['SQL_type'] == 'delete_people'){
	    if($PEOPLE_group_username != ''){
	      $show_text = "gruppo";
	    }else{
	      $show_text = "contatto";
	    }
	  ?>
	    <br/>
	    Sei sicuro di voler eliminare il <?php echo($show_text); ?>?<br/><br/>
	    <button style="float: right; margin-right: 20px" onclick="confirm_delete('<?= $PEOPLE_id ?>')">Elimina</button>
	  <?php
	  }elseif($_GET['SQL_type'] == 'file_restore'){
	    $_GET['combo'] = json_decode($_GET['combo'], true);
	    $combo_array = implode(", ", $_GET['combo']);
	    ?>
	    <br/>
	    <?php
	    if(count(array_filter($_GET['combo'])) > 1){
	      ?>
		Vuoi ripristinare nelle rispettive cartelle d'origine <?php echo(count(array_filter($_GET['combo']))); ?> file?<br/><br/>
	      <?php
	    }else{
	      $combo_array = $_GET['id'];
	      ?>
		Vuoi ripristinare nella cartella d'origine il file?<br/><br/>
	      <?php } ?>
	    <button style="float: right; margin-right: 20px" onclick="confirm_restore('<?= $combo_array ?>')">Ripristina</button>
	  <?php
	  }elseif($_GET['SQL_type'] == 'file_export'){
	  ?>
	    <br/>
	    Come si desidera esportare il quaderno selezionato?<br/><br/>
	    <button style="float: left; width: 190px" onclick="window.open('<?= $MY_MAIN_DIRECTORY ?>/word_converter?id=<?= $GENERAL_id ?>','_blank');" class="icon-16 icon-word-16">Microsoft Word</button><button style="float: right; width: 190px" onclick="window.open('<?= $MY_MAIN_DIRECTORY ?>/pdf_converter?id=<?= $GENERAL_id ?>','_blank');" class="icon-16 icon-pdf-16">File PDF</button>
	  <?php
	  }elseif($_GET['SQL_type'] == 'context'){
	  ?>
	    <p class="close" onclick="closecontext()">[X] Chiudi menu</p>
	    <?php if($GENERAL_trash == 'y'){ ?>
	      <span onclick="restore('<?= $GENERAL_id ?>', '<?= $GENERAL_name ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/back.png' ?>' />Ripristina</span>
	      <span onclick="delete_f('<?= $GENERAL_id ?>', '<?= $GENERAL_name ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' /><?php echo($TRAD_delete); ?></span>
	      <?php if($GENERAL_type != 'diary'){ ?>
		<span onclick="info('<?= $GENERAL_id ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/info.png' ?>' /><?php echo($TRAD_info); ?></span>
	    <?php } }else{ ?>
	    <?php if($_GET['type'] == 'subject'){ ?>
	      <span onclick="newTimetable('<?= $TIMETABLE_id ?>', '<?= $TIMETABLE_day_num ?>', '<?= $TIMETABLE_hour_of_day ?>', '<?= $TIMETABLE_subject ?>', '<?= $TIMETABLE_book ?>', '<?= $TIMETABLE_fore_color ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/edit.png' ?>' />Modifica</span>
	    <?php }else{ ?>
	      <?php if($_GET['combo'] == ''){ ?>
	      <a href="<?= $GENERAL_link_type ?>"><img src='<?= $GENERAL_icon ?>' /><?php echo($TRAD_open); ?> <?php echo(lcfirst($GENERAL_context)); ?></a>
	      <?php } if((($GENERAL_type == 'notebook' or $GENERAL_type == 'diary' or $GENERAL_type == 'file' or $GENERAL_type == 'folder') and $_GET['combo'] == '') or $_GET['combo'] != ''){ ?>
	      <span onclick="share('<?= $GENERAL_id ?>', '<?= $GENERAL_name ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/share.png' ?>' /><?php echo($TRAD_share); ?></span>
	      <?php } if($_GET['combo'] == ''){ ?>
	      <span onclick="rename('<?= $GENERAL_id ?>', '<?= $GENERAL_name ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/edit.png' ?>' /><?php echo($TRAD_rename); ?></span>
	      <?php } ?>
	      <span onclick="move('<?= $GENERAL_id ?>', '<?= $GENERAL_folder ?>', '<?= $GENERAL_type_translate ?>', '<?= $GENERAL_name ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/folder.png' ?>' /><?php echo($TRAD_move); ?></span>
	    <?php } ?>
	      <span onclick="delete_f('<?= $GENERAL_id ?>', '<?= $GENERAL_name ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' /><?php echo($TRAD_delete); ?></span>
	    <?php if($_GET['type'] == ''){ ?>
	      <span onclick="info('<?= $GENERAL_id ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/info.png' ?>' /><?php echo($TRAD_info); ?></span>
	      <?php if(($GENERAL_type == 'notebook' or $GENERAL_type == 'file' or $GENERAL_type == 'folder') and $_GET['combo'] == ''){ ?>
	      <span onclick="$(this).hide(); $('.context_hidden').slideDown(200);"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/more.png' ?>' style='float: right; margin-top: -2px; height: 3px' /></span>
	      <?php } ?>
	      <div class="context_hidden">
		<?php if($_GET['combo'] == ''){ if($GENERAL_type != 'diary'){ ?>
		<?php if($GENERAL_type == 'file'){ ?>
		<?php if(strpos($GENERAL_file_type,'image') !== false){ ?>
		  <span onclick="profile_picture('<?= $GENERAL_id ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/picture.png' ?>'/>Imposta foto come...</span>
		<?php } ?>
		<a href="<?= $GENERAL_link_type ?>" download><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/download.png' ?>'/>Scarica</a>
		<?php }elseif($GENERAL_type == 'notebook'){ ?>
		<span onclick="export_file('<?= $GENERAL_id ?>', '<?= $GENERAL_name ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/download.png' ?>' />Esporta</span>
		<?php } ?>
		<?php } if($GENERAL_type == 'notebook'){ ?>
		<span onclick="lim('<?= $GENERAL_id ?>', '<?= $GENERAL_name ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/lim.png' ?>' />Proietta su LIM</span>
		<span onclick="embed('<?= $GENERAL_id ?>', '<?= $GENERAL_name ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/embed.png' ?>' />Incorpora</span>
		<span onclick="history('<?= $GENERAL_id ?>', '<?= $GENERAL_name ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/history.png' ?>' />Cronologia modifiche</span>
		<span onclick="copy('<?= $GENERAL_id ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/copy.png' ?>' />Copia</span>
		<!-- <span onclick="shortcut('<?= $GENERAL_id ?>', '<?= $GENERAL_name ?>')"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/shortcut.png' ?>' />Crea collegamento</span> -->
		<?php } ?>
		<span action="fav_button" id="<?= $GENERAL_id ?>"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/'.$FAV_icon.'.png' ?>' id="fav_icon" /><font id="fav_<?= $GENERAL_id ?>"><?php echo($FAV_text); ?></font> Desktop</span>
		<?php } ?>
	      </div>
	    <?php } } ?>
	  <?php
	  }elseif($_GET['SQL_type'] == 'file_share'){
	  ?>
	    <?php
	      $_GET['combo'] = json_decode($_GET['combo'], true);
	      $combo_array = implode(", ", $_GET['combo']);
	      
	      if(count(array_filter($_GET['combo'])) > 1){
		// echo('<p style="color: red">Eventuali cartelle selezionate non verranno condivise</p>');
	      }else{
		$combo_array = $_GET['id'];
	      }
	    ?>
	    <p>Condividi con un utente LightSchool scrivendo qui sotto il suo nome utente o il nome e cognome se &egrave; presente nella tua rubrica.</p>
	      <input type="text" id="share_input" name="share_input" placeholder="Nome, cognome o nome utente" style="margin-right: 10px; width: calc(100% - 130px)" oninput="share_input_fun(this.value)" /><button onclick="share_confirm('<?= $combo_array ?>')">Condividi</button>
	      <div id="share_err" style="display: none" class="warning">
		
	      </div>
	      <div id="share_input_autosuggestion" class="autosuggestion">
		<?php
		  $_GET['SQL_type'] = 'people_share';
		  include "view_management.php";
		?>
	      </div>
	    <?php if(count(array_filter($_GET['combo'])) < 2){
	      if($GENERAL_type != 'folder'){ ?>
	      <p>Se l'utente non &egrave; iscritto a LightSchool, condividi il link sottostante.</p>
	      <input type="text" placeholder="Link" value="https:<?= $MY_MAIN_DIRECTORY.'/r/'.md5($GENERAL_id) ?>" onclick="this.select();" readonly="readonly" style="width: calc(100% - 40px)" />
	    <?php } ?>
	    <div id="share_list_users" style="min-height: 0px; border-radius: 0px; background-color: transparent; height: 100%; max-height: 250px; display: block; padding: 10px; width: calc(100% - 40px) !important">
	      <?php
		$_GET['SQL_type'] = 'list_share';
		include "view_management.php";
	      ?>
	    </div>
	  <?php
	    }elseif(count($_GET['combo']) > 2){ echo('<p>Link pubblico e lista condivisioni non disponibili. Seleziona singolarmente i file.</p>'); }
	  }elseif($_GET['SQL_type'] == 'set_profile_image'){
	    ?>
	      <p>Per un risultato ottimale l'immagine dovrebbe essere in formato 1:1 e con una risoluzione minima di 32x32 px.</p>
	      <img src="<?= $UPLOAD_MAIN_DIRECTORY.'/'.$GENERAL_file_url ?>" style="max-width: 450px">
	      <button style="float: right; margin-top: 10px; margin-right: 0px; margin-bottom: -10px" onclick="setImage('<?= $GENERAL_file_url ?>')">Applica</button>
	    <?php
	  }elseif($_GET['SQL_type'] == 'file_lim'){
	  ?>
	    <p>Proietta su una LIM o su un qualsiasi altro dispositivo.</p>
	      <input type="text" id="lim_project" name="lim_project" placeholder="Nome o Codice LIM" style="margin-right: 10px; width: calc(100% - 130px)" oninput="lim_input_fun(this.value)" /><button onclick="project_confirm('<?= $_GET['id'] ?>')">Proietta</button>
	      <div id="share_err" style="display: none" class="warning">
		
	      </div>
	      <div id="lim_input_autosuggestion" class="autosuggestion">
		<?php
		  foreach($USER_lim_array as $lim_id){
		    ?>
		      <p onclick="$('#lim_project').val('<?= $lim_id ?>'); $('#lim_input_autosuggestion').slideUp(200);" class="p_list_share" lim="<?= strtolower($lim_id) ?>"><?php echo($lim_id); ?></p>
		    <?php
		  }
		?>
	      </div>
	  <?php
	  }elseif($_GET['SQL_type'] == 'file_embed'){
	  ?>
	    <p>Copia e incolla questo codice per integrare il quaderno nella tua pagina web.</p>
	    <textarea onclick="this.select();" readonly="readonly" style="width: calc(100% - 40px); height: 80px; padding: 10px">&lt;iframe src="https:<?= $MY_MAIN_DIRECTORY.'/embed/'.md5($GENERAL_id) ?>" frameborder="0" width="100%" height="300"&gt;&lt;/iframe&gt;</textarea>
	  <?php
	  }elseif($_GET['SQL_type'] == 'file_icon'){
	  ?>
	    <script type="text/javascript">
	      function switch_tabIcon(tab){
		window.currentTabIcon = tab;
		$('.tab_tab').hide();
		$('.tab_'+tab).show();
		$('.tabs_tabs').removeClass('selected');
		$('.tabs_'+tab).addClass('selected');
	      }
	      
	      if(typeof window.currentTabIcon === "undefined"){
		window.currentTabIcon = 'all';
	      }
	      switch_tabIcon(window.currentTabIcon);
	    </script>
	    <div class="tab" style="width: calc(100% - 10px); max-height: 700px">
	      <div class="tabs">
		<span onclick="switch_tabIcon('all')" class="tabs_tabs tabs_all">Tutte</span>
		<!-- <span onclick="switch_tabIcon('subjects')" class="tabs_tabs tabs_subjects">Materie</span>
		<span onclick="switch_tabIcon('flags')" class="tabs_tabs tabs_flags">Bandiere</span>
		<span onclick="switch_tabIcon('logos')" class="tabs_tabs tabs_logos">Loghi</span>
		<span onclick="switch_tabIcon('animals')" class="tabs_tabs tabs_animals">Animali</span>
		<span onclick="switch_tabIcon('other')" class="tabs_tabs tabs_other">Altro</span> -->
		<span style="float: right" icon_name="" id="restore_original_icon">Ripristina originale</span>
	      </div>
	      <div class="tab_content" style="max-height: 600px; overflow-y: auto">
		<div class="tab_tab tab_all"><?php
		if($handle = opendir('../images/icons')){
		  $thelist = array();
		  while(false !== ($file = readdir($handle))){
		    if($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'png'){
		      $file2 = $bodytag = str_replace(".png", "", "$file");
		      $file2 = ucfirst($file2);
		      array_push($thelist, "<div icon_name='$file2.png' class='icons_for_file' style='background-image: url(//www.lightschool.it/images/icons/$file)' title='$file2'></div>");
		    }
		  }
		  closedir($handle);
		}
		asort($thelist);
		
		foreach($thelist as $file){
		  echo("$file");
		}
		?></div>
		<div class="tab_tab tab_subjects">Immagine 2</div>
		<div class="tab_tab tab_flags">Immagine 3</div>
		<div class="tab_tab tab_logos">Immagine 4</div>
		<div class="tab_tab tab_animals">Immagine 5</div>
		<div class="tab_tab tab_other">Immagine 6</div>
	      </div>
	    </div>
	  <?php
	  }elseif($_GET['SQL_type'] == 'people_share'){
	  ?>
	    <p onclick="share_people(this.id)" class="p_list_share" id="<?= strtolower($PEOPLE_username) ?>" username="<?= strtolower($PEOPLE_username) ?>" name="<?= strtolower($PEOPLE_name) ?>" surname="<?= strtolower($PEOPLE_surname) ?>" complete_name="<?= strtolower($PEOPLE_name.' '.$PEOPLE_surname) ?>" complete_name_inv="<?= strtolower($PEOPLE_surname.' '.$PEOPLE_name) ?>"><?php echo($PEOPLE_name.' '.$PEOPLE_surname) ?>
	    <?php if($PEOPLE_username != ''){ ?>
	      (<?php echo($PEOPLE_username); ?>)</p>
	    <?php
	    }
	  }elseif($_GET['SQL_type'] == 'list_share'){
	    $validate_name = lightschool_get_user($GENERAL_share_receiving, 'name');
	    if($validate_name == 'not_exists'){
	      ?>
		<p><i>Account disattivato</i><span id="<?= $GENERAL_share_id2 ?>" onclick="remove_share(this.id)" style="float: right; cursor: pointer"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_black.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></p>
	      <?php
	    }else{
	      ?>
		<p><?php echo($validate_name.' '.lightschool_get_user($GENERAL_share_receiving, 'surname')); ?><span id="<?= $GENERAL_share_id2 ?>" onclick="remove_share(this.id)" style="float: right; cursor: pointer"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_black.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></p>
	      <?php
	    }
	  }elseif($_GET['SQL_type'] == 'file_history'){
	  ?>
	    <div id="file_history" style="min-height: 0px; border-radius: 0px; background-color: transparent; height: 100%; max-height: 250px; display: block; padding: 10px; width: calc(100% - 40px) !important">
	      <?php
		$_GET['SQL_type'] = 'file_history_list';
		include "view_management.php";
	      ?>
	    </div>
	  <?php
	  }elseif($_GET['SQL_type'] == 'messages_list'){
	    if(!in_array("$other_user", $MESSAGES_people_array) and (($MESSAGES_receiving == $_SESSION['Username'] or $MESSAGES_sender == $_SESSION['Username']) or (in_array($_SESSION['Username'], $MESSAGES_receiving)))){
	      if($MESSAGES_is_read == 'n' and $MESSAGES_receiving == $Username and $MESSAGES_group_id == ''){
		$EXTEND_CLASS = "selected";
		$EXTEND_CLASS2 = " style='font-weight: bold' ";
	      }else{
		$EXTEND_CLASS = "";
		$EXTEND_CLASS2 = "";
	      }
	      if($MESSAGES_group_id != ''){
		$send_variable = "'$MESSAGES_group_id', 'group'";
		$message_id = "$MESSAGES_group_id";
	      }else{
		$send_variable = "'$other_user', 'single'";
		$message_id = "$other_user";
	      }
	      ?>
		<div class="messages_list_element <?= $EXTEND_CLASS.$EXTEND_CLASS3 ?>" <?= $EXTEND_CLASS2 ?> onclick="read_message(<?= $send_variable ?>);" id="message_<?= $message_id ?>" username_message="<?= $message_id ?>" complete_name="<?= strtolower($COMPLETE) ?>">
		  <?php echo($IMG); ?><span class="messages_sender"><?php echo($COMPLETE2); ?></span><span class="messages_count"><?php echo lightschool_get_num($message_id, 'messages_number'); ?></span><br/>
		  <span class="messages_date"><?php echo($MESSAGES_date); ?></span>
		</div>
		<?php
	      }
	    array_push($MESSAGES_people_array, "$other_user");
	  }elseif($_GET['SQL_type'] == 'messages_content' and (($MESSAGES_receiving == $_SESSION['Username'] or $MESSAGES_sender == $_SESSION['Username']) or (in_array($_SESSION['Username'], $MESSAGES_receiving)))){
	  ?>
	    <div class="bubble2 <?= $bubble ?>" style="margin-bottom: 30px">
	      <?php echo($MESSAGES_body); ?><br/>
	      <span style="font-size: 10pt; display: block; text-align: right; margin-top: -30px"><strong>Inviato:</strong> <?php echo($MESSAGES_date); ?><?php if($MESSAGES_sender == $Username and $MESSAGES_group_id == ''){ ?>&nbsp;&nbsp;<strong>Letto:</strong> <?php echo($MESSAGES_is_read_trad); ?><?php } ?></span>
	    </div>
	  <?php
	  }elseif($_GET['SQL_type'] == 'register_overview' and in_array("$REGISTER_school", $USER_code_school) and ((in_array("$Username", $REGISTER_component_array) and $_GET['allclass'] != 'y') or ($_GET['allclass'] == 'y' and $USER_type == 'docente'))){
	    $REGISTER_overview_count = 0; ?>
	    <?php if(($REGISTER_year == '2015/2016' and $_GET['previous'] != 'y') or ($REGISTER_year != '2015/2016' and $_GET['previous'] == 'y')){
	      $REGISTER_overview_count++; ?>
	      <div class="register_icon" <?= $USER_click_type ?>="window.location.href = '<?= $MY_MAIN_DIRECTORY ?>/register?class=<?= $REGISTER_id ?>&tab=overview'" class_name="<?= strtolower($REGISTER_name) ?>">
		<center><span class="register_name"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/fav.png" style="width: 28px; height: 28px"><?php echo($REGISTER_name); ?></span></center>
		<?php if($USER_type == 'docente'){ ?>
		  <a href="<?= $MY_MAIN_DIRECTORY ?>/register?class=<?= $REGISTER_id ?>&tab=appello"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/tick.png" />Appello</a>
		<?php } ?>
		<a href="<?= $MY_MAIN_DIRECTORY ?>/register?class=<?= $REGISTER_id ?>&tab=marks"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/tick.png" />Voti</a>
		<a href="<?= $MY_MAIN_DIRECTORY ?>/register?class=<?= $REGISTER_id ?>&tab=lessons"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/lim.png" />Lezioni</a>
		<a href="<?= $MY_MAIN_DIRECTORY ?>/register?class=<?= $REGISTER_id ?>&tab=notes"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/fastnote.png" />Note disciplinari</a>
		<a href="<?= $MY_MAIN_DIRECTORY ?>/register?class=<?= $REGISTER_id ?>&tab=scrutini"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/test.png" />Scrutini</a>
		<?php if($REGISTER_coordinatore == $Username){ ?>
		  <a href="<?= $MY_MAIN_DIRECTORY ?>/register?class=<?= $REGISTER_id ?>&tab=coordinatore"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/coordinatore.png" />Coordinatore</a>
		<?php } ?>
	      </div>
	    <?php }else{
	      $PREVIOUS_YEAR = 'y';
	    } ?>
	  <?php
	  }elseif($_GET['SQL_type'] == 'register_sidebar' and in_array("$REGISTER_school", $USER_code_school)){ ?>
	    <div class="sidebar_photo <?= $no_register_image_class ?>" title="<?= $no_register_image_text2 ?>" style="background-image: url('<?= $REGISTER_image ?>')">
	      <?php echo($no_register_image_text); ?>
	    </div>
	    <div class="sidebar_stat">
	      <?php
		if(!in_array("$Username", $REGISTER_component_array)){
		  ?>
		  <span style="font-family: 'Roboto'; font-size: 14pt; display: inline-block; margin-bottom: 10px">Non sei un docente di questa classe</span><br/>
		  <?php
		}
		$STUD = 0;
		$DOC = 0;
		foreach($REGISTER_component_array as $usernameregister){
		  $result2 = lightschool_get_user($usernameregister, 'type');
		  if($result2 == 'studente'){
		    $STUD++;
		  }
		  if($result2 == 'docente'){
		    $DOC++;
		  }
		}
		
		if($STUD == 1){
		  $term_s = 'e';
		}else{
		  $term_s = 'i';
		}
		
		if($DOC == 1){
		  $term_d = 'e';
		}else{
		  $term_d = 'i';
		}
		if(($STUD + $DOC) == 1){
		  $term_p = 'e';
		}else{
		  $term_p = 'i';
		}
	      ?>
	      <span style="font-family: 'Roboto'; font-size: 20pt; display: inline-block; margin-bottom: 10px"><?php echo($STUD+$DOC); ?> partecipant<?php echo($term_p); ?></span><br/>
	      <span style="display: inline-block; width: 30px"><?php echo($STUD); ?></span> student<?php echo($term_s); ?><br/>
	      <span style="display: inline-block; width: 30px"><?php echo($DOC); ?></span> docent<?php echo($term_d); ?></span><br/><br/><br/>
	      <span style="font-family: 'Roboto'; font-size: 20pt; display: inline-block; margin-bottom: 10px">Comunicazioni</span><br/>
	      <span>Nessuna comunicazione da leggere</span>
	    </div>
	  <?php
	  }elseif($_GET['SQL_type'] == 'justify_required'){
	    ?>
	      <span style='color: <?= $USER_accent ?>; text-decoration: underline; cursor: pointer; display: block; margin-bottom: 10px' student='<?= $GETUSERNAMEESCAPE ?>' date='<?= $REGISTER_JUSTIFY_date ?>' class='justify_text'><?php echo($REGISTER_JUSTIFY_date.$REGISTER_JUSTIFY_hour); ?></span>
	    <?php
	  }elseif($_GET['SQL_type'] == 'status_marker'){
	    if(in_array("$GETUSERNAMEESCAPE", $REGISTER_present)){
	      $RADIO_PRESENT = "checked='checked'";
	    }else{ 
	      $RADIO_ABSENT = "checked='checked'";
	    }
	    ?>
	      <br/>
	      L'alunno &egrave; <label style="margin-right: 20px"><input type="radio" name="status" id="status" style="margin-right: 10px" onclick="window.changeUserStatus_type = 'presente'" <?= $RADIO_PRESENT ?>>Presente</label><label><input type="radio" name="status" id="status" style="margin-right: 10px" onclick="window.changeUserStatus_type = 'assente'" <?= $RADIO_ABSENT ?>>Assente</label><br/>
	      <input type="button" value="Applica" onclick="changeUserStatus('<?= $GETUSERNAMEESCAPE ?>')" style="float: right; width: 120px" />
	    <?php
	  }elseif($_GET['SQL_type'] == 'register_marks_student'){
	    if(!in_array("$REGISTER_marks_subject", $REGISTER_marks_subject_array)){
	      array_push($REGISTER_marks_subject_array, "$REGISTER_marks_subject");
	      
	      $DOC_surname = lightschool_get_user($REGISTER_marks_docente, 'surname');
	      $DOC_name = lightschool_get_user($REGISTER_marks_docente, 'name');
	      $DOC_profile_image = lightschool_get_user($REGISTER_marks_docente, 'profile_image');
	      
	      // marks
	      $MARK_s = lightschool_get_marks($REGISTER_marks_docente, $_SESSION['Username'], $_GET['class'], $REGISTER_marks_subject, 's', 'value');
	      $MARK_o = lightschool_get_marks($REGISTER_marks_docente, $_SESSION['Username'], $_GET['class'], $REGISTER_marks_subject, 'o', 'value');
	      $MARK_p = lightschool_get_marks($REGISTER_marks_docente, $_SESSION['Username'], $_GET['class'], $REGISTER_marks_subject, 'p', 'value');
	      $MARK_media = lightschool_get_marks_media($REGISTER_marks_docente, $_SESSION['Username'], $_GET['class'], $REGISTER_marks_subject, 'value');
	      
	      $MARK_media_graph = $MARK_media[0];
	      $MARK_media_value = $MARK_media[1];
	      
	      if($MARK_media_value > 6){
		$add_class2 = ' insufficient';
	      }else{
		$add_class2 = '';
	      }
	      
	      echo("<div user_surname='".strtolower($DOC_surname)."' username='".strtolower($DOC_name)."' user_name='".strtolower($DOC_name)."' user_complete='".strtolower($DOC_name.' '.$DOC_surname)."' user_completeinv='".strtolower($DOC_surname.' '.$DOC_name)."' class='list_item $add_class $add_class2'><span class='register_surname_and_name' style='padding: 0px; max-width: 200px'>$REGISTER_marks_subject</span><span style='background-color: transparent; display: inline-block; width: 16px; height: 16px; float: left; margin-right: 10px; margin-top: 2px; cursor: pointer' class='status_marker' username='".strtolower($REGISTER_marks_docente)."'></span><img src='$DOC_profile_image' class='profile_picture_register_user' style='width: 16px; height: 16px; float: left; margin-right: 10px; border-radius: 10px; border: 1px solid black; margin-top: 20px' /><pre class='text_min2'></pre><span style='display: inline-block; width: calc(33% - 133px)'>$MARK_s</span><pre class='text_min2'></pre><span style='display: inline-block; width: calc(33% - 173px)'>$MARK_o</span><pre class='text_min2'></pre><span style='display: inline-block; width: calc(33% - 133px)'>$MARK_p</span><pre class='text_min2'></pre><span style='display: inline-block; width: 100px'>$MARK_media_graph</span></div>");
	    }
	  }elseif($_GET['SQL_type'] == 'register_lessons'){
	    $REGISTER_lesson_id = $GENERAL_row['id'];
	    
	    if($REGISTER_lesson_num_hour == 1){
	      $REGISTER_lesson_num_hour_fin = 'a';
	    }else{
	      $REGISTER_lesson_num_hour_fin = 'e';
	    }
	    
	    $DOC_surname = lightschool_get_user($REGISTER_lesson_docente, 'surname');
	    $DOC_name = lightschool_get_user($REGISTER_lesson_docente, 'name');
	    $DOC_profile_image = lightschool_get_user($REGISTER_lesson_docente, 'profile_image');
	    ?>
	      <div class="list_item" style="margin-bottom: 20px" id="<?= $REGISTER_lesson_id ?>">
	      	<span style="display: inline-block; font-weight: bold; width: calc(25% - 30px)"><img src="<?= $DOC_profile_image ?>" style="width: 16px; float: left; height: 16px; border-radius: 50%; border: 1px solid black; margin-right: 10px" /><?php echo($DOC_surname.' '.$DOC_name); ?></span><pre class='text_min2'></pre>
	      	<span style="display: inline-block; width: 50px"><?php echo($REGISTER_lesson_hour); ?><sup>a ora</sup></span>
	      	<span style="display: inline-block; width: calc(25% - 30px)"><?php echo($REGISTER_lesson_num_hour); ?>&nbsp;or<?php echo($REGISTER_lesson_num_hour_fin); ?> di <?php echo(lcfirst($REGISTER_lesson_suject)); ?></span><pre class='text_min2'></pre>
	      	<span style="display: inline-block; width: calc(25% - 30px)"><?php echo($REGISTER_lesson_type); ?></span><br/><pre class='text_min2'></pre>
	      	<span style="display: inline-block; width: 100%"><?php echo($REGISTER_lesson_html); ?></span>
	      </div>
	    <?php
	  }elseif($_GET['SQL_type'] == 'business_online'){
	    if($_GET['id'] != ''){
	      ?>
		<div class="draggable_dialog" id="dialogClienti">
		  <div class="draggable_dialog_title">Clienti<img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/cross2.png" onclick="$('#dialogClienti').fadeOut(200)" class="dialog_close"></div>
		  <div class="draggable_dialog_content">Database clienti</div>
		</div>
		<div class="draggable_dialog" id="dialogInformazioni">
		  <div class="draggable_dialog_title">Informazioni su Contabilit&agrave;<img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/cross2.png" onclick="$('#dialogInformazioni').fadeOut(200)" class="dialog_close"></div>
		  <div class="draggable_dialog_content">LightSchool Contabilit&agrave; &egrave; un simulatore di software gestionale aziendale. Permette l'apprendimento delle operazioni elementari della P.D. (Partita Doppia), della gestione dell'evasione degli ordini e dei rapporti con la P.A. (Pubblica Amministrazione).<br/><br/>
		  Versione 0.01 Pre-alpha</div>
		</div>
	      <?php
	    }else{
	      ?>
		<div class="list_item" style="margin-bottom: 20px" id="<?= $BUSINESS_activity_id ?>" onclick="window.location.href = '<?= $MY_MAIN_DIRECTORY ?>/business?id=<?= $BUSINESS_activity_id ?>'">
		  <?php echo($BUSINESS_activity_name); ?>&nbsp;&nbsp;&nbsp;&nbsp;<strong>(<?php echo(strtoupper($BUSINESS_activity_type)); ?>)</strong>
		</div>
	      <?php
	    }
	  }elseif($_GET['SQL_type'] == 'people_contacts' or $_GET['SQL_type'] == 'people_groups'){
	    $PEOPLE_name_verified = lightschool_get_user($PEOPLE_username, 'name');
	    
	    if($_GET['SQL_type'] == 'people_groups'){
	      $PEOPLE_username = $PEOPLE_group_username;
	    }
	    if(($PEOPLE_name_verified != 'not_exists' and $_GET['SQL_type'] == 'people_contacts') or $_GET['SQL_type'] == 'people_groups'){
	    ?>
	      <div class="icon_files" title="<?= $PEOPLE_surname.' '.$PEOPLE_name ?>" id="<?= $PEOPLE_id ?>" complete_name="<?= strtolower($PEOPLE_name.' '.$PEOPLE_surname) ?>" complete_surname="<?= strtolower($PEOPLE_surname.' '.$PEOPLE_name) ?>" username="<?= $PEOPLE_username ?>">
		<?php if($_GET['SQL_type'] == 'people_contacts'){ ?><input type='checkbox' style='float: right; display: none' class='file_selector file_selector_<?= $PEOPLE_id ?>' id='<?= $PEOPLE_id ?>' value='<?= $PEOPLE_username ?>' /><img src="<?= $PEOPLE_image ?>" class="quick_peek_image" id="<?= $PEOPLE_id ?>" style="border-radius: 50%; border: 1px solid black" /><?php } ?><span class="title_files" id="title_<?= $PEOPLE_id ?>"><?php echo($PEOPLE_surname.' '.$PEOPLE_name); ?></span><br/>
		<span class="subtitle" id="subtitle_<?= $PEOPLE_id ?>"><?php echo($PEOPLE_username); ?></span>
	      </div>
	    <?php
	    }else{
	    ?>
	      <div class="icon_files" title="<?= $PEOPLE_surname.' '.$PEOPLE_name ?>" id="<?= $PEOPLE_id ?>" complete_name="<?= strtolower($PEOPLE_name.' '.$PEOPLE_surname) ?>" complete_surname="<?= strtolower($PEOPLE_surname.' '.$PEOPLE_name) ?>">
		<span class="title_files" id="title"><?php echo($PEOPLE_surname.' '.$PEOPLE_name); ?></span><br/>
		<span class="subtitle" id="subtitle">Account disattivato</span>
	      </div>
	    <?php
	    }
	  }elseif($_GET['SQL_type'] == 'devices'){
	    $DEVICES_ip = $GENERAL_row['ip'];
	    $DEVICES_allow = $GENERAL_row['allow'];
	    $DEVICES_logged_in = $GENERAL_row['logged_in'];
	    $DEVICES_date = $GENERAL_row['date'];
	    $DEVICES_id = $GENERAL_row['id'];
	    
	    if($DEVICES_allow == 'y'){
	      $bkg_color = 'darkgreen';
	    }else{
	      $bkg_color = 'red';
	    }
	    ?>
	      <div class="icon_files" id="<?= $DEVICES_id ?>" ip="<?= strtolower($DEVICES_ip) ?>">
		<div style="background-color: <?= $bkg_color ?>; width: 37px; height: 37px; float: left; margin-right: 10px; margin-bottom: 10px; border-radius: 50%"></div><span class="title_files" id="title_<?= $PEOPLE_id ?>"><?php echo($DEVICES_ip); ?></span><br/>
		<span class="subtitle" id="subtitle_<?= $PEOPLE_id ?>"><?php echo($DEVICES_date); ?></span>
	      </div>
	    <?php
	  }elseif($_GET['SQL_type'] == 'social'){
	    ?>
	      <div class="icon_files" id="<?= $SOCIAL_Username ?>">
		<img src="<?= lightschool_get_user($SOCIAL_Username, 'profile_image') ?>" class="quick_peek_image" id="<?= $PEOPLE_id ?>" style="border-radius: 50%; border: 1px solid black" /><span class="title_files" id="title_<?= $SOCIAL_Username ?>"><?php echo(ucfirst(lightschool_get_user($SOCIAL_Username, 'surname')).' '.ucfirst(lightschool_get_user($SOCIAL_Username, 'name'))); ?></span><br/>
		<span class="subtitle" id="subtitle_<?= $SOCIAL_Username ?>"><?php echo($SOCIAL_Username); ?></span>
	      </div>
	    <?php
	  }elseif($_GET['SQL_type'] == 'schools'){
	    ?>
	      <div class="cards" id="<?= $SCHOOL_id ?>">
		<img src="<?= $SCHOOL_profile_image ?>" alt="Foto scuola" />
		<div class="caption"><?php echo("$SCHOOL_type2 $SCHOOL_name"); ?><br/><span style="font-size: 10pt"><?php echo($SCHOOL_city); ?></span><br/><br/><?php if(!in_array($SCHOOL_id, $USER_code_school)){ ?><button class="btn_green" onclick="join_leave_school('<?= $SCHOOL_id ?>')">Unisciti</button><?php }else{ ?><button class="btn_red" onclick="join_leave_school('<?= $SCHOOL_id ?>')">Lascia</button><?php } ?><button class="info_button_school" id="<?= $SCHOOL_id ?>">Informazioni</button></div>
	      </div>
	    <?php
	  }elseif($_GET['SQL_type'] == 'school_card'){
	    ?>
	      <div style="margin-bottom: 30px; text-align: right; padding: none; margin: -10px" id="titlebar">
		<span onclick="closeDetailedDialog()" style="cursor: pointer"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span>
	      </div>
	      <img src="<?= $SCHOOL_profile_image ?>" alt="Foto scuola" class="school_photo" style="float: left; margin-right: 20px; margin-bottom: 20px; margin-top: 20px" />
	      <p style="display: inline-block">
		<span style="font-family: 'Roboto'; font-size: 20pt"><?php echo("$SCHOOL_type2 $SCHOOL_name"); ?></span><br/>
		di <?php echo($SCHOOL_city); ?>, <?php echo($SCHOOL_regione); ?><br/><br/>
		<i><?php echo($SCHOOL_type_text); ?></i><br/><br/>
		<?php echo($SCHOOL_address); ?><br/><br/>
		<b>TELEFONO</b><br/>
		<a href="tel:<?php echo($SCHOOL_phone); ?>" style="color: white"><?php echo($SCHOOL_phone); ?></a>
	      </p>
	    <?php
	  }
	}
	if($_GET['SQL_type'] == 'messages_content' and (($MESSAGES_receiving == $_SESSION['Username'] or $MESSAGES_sender == $_SESSION['Username']) or (in_array($_SESSION['Username'], $MESSAGES_receiving)))){
	   if(lightschool_get_user($other_user, 'name') != 'not_exists' or (($MESSAGES_receiving == $_SESSION['Username'] or $MESSAGES_sender == $_SESSION['Username']) or (in_array($_SESSION['Username'], $MESSAGES_receiving)))){
	  ?>
	    <div class="send_message" onclick="$('.send_message textarea').focus();">
	      <textarea class="send_message_content" rows="5"></textarea><input type="submit" value="" style="height: 80px; width: 32px; margin-top: 5px" onclick="sendmessage('<?= $other_user ?>', $('.send_message_content').val())" />
	    </div>
	  <?php
	  }
	}
	if($REGISTER_overview_count == 0 and $_GET['SQL_type'] == 'register_overview'){
	  echo('Non fai parte di nessuna classe. Chiedi alla tua scuola di aggiungerti.');
	}
      }
    }
  }
?>

