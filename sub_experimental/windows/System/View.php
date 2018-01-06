<?php
  $ALLOW_STRANGER = true; $NO_STYLE = true; $NO_SCRIPT = true; $NO_TOUCH = true; $NO_TEXT = true;
  include_once "Core.php";
  
  if($_SESSION['Username'] != ''){
    $REQUEST = $_GET['request'];
    
    if($REQUEST === "register_students"){
      $ID = $conn->real_escape_string($_GET['class_id']);
      $REQUEST = array("register_students", "SELECT * FROM MY_REG_class WHERE id = '$ID' LIMIT 1");
    }elseif($REQUEST === "Security_UniKey"){
      $REQUEST = array("Security_UniKey", "SELECT UniKey FROM MY_users WHERE Username = '$Username' LIMIT 1");
    }
    
    $REQUEST_type = $REQUEST[0];
    $REQUEST_sql = $REQUEST[1];
    
    
    if($REQUEST === "context"){
      if($_GET['app'] != ''){
	$APP = $_GET['app'];
	
	if($APP === "wallpaper"){
	  ?>
	    <span onclick="open_dialog('settings', 'Impostazioni di sistema', 'System/Window.php?window=settings&panel=customize'); closeContext();"><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/desktop.png" />Cambia sfondo</span>
	    <hr/>
	    <span onclick="open_dialog('settings', 'Impostazioni di sistema', 'System/Window.php?window=settings'); closeContext();"><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/settings.png" />Impostazioni di sistema</span>
	  <?php
	  return false;
	}
	$APP_real_name = $_GET['app_real_name'];
	
	$icon = $APP;
	if($APP === "trash"){
	  $icon = $trash_icon.'_'.$icon;
	}
	?>
	  <span onclick="open_dialog('<?= $APP ?>', '<?= $APP_real_name ?>', 'System/Window.php?window=<?= $APP ?>'); closeContext()"><img src="<?php echo("$IMAGES_DIRECTORY/$USER_icon_set1/$icon.png"); ?>" />Apri <?php echo($APP_real_name); ?></span>
	  <span onclick="removeAppTaskbar('<?= $APP ?>'); closeContext()"><img src="<?php echo("$IMAGES_DIRECTORY/$USER_icon_set1/fav.png"); ?>" />Rimuovi dalla barra</span>
	<?php
      }
    }else{
      if($REQUEST_type === "" or $REQUEST_sql === "" or !is_array($REQUEST)){
	echo("Errore: nessuna richiesta o query specificata. Codice errore: 3");
	exit();
      }else{
	if($conn->connect_error){ echo("Errore di collegamento. Codice errore: 1"); exit(); }
	
	$rs = $conn->query($REQUEST_sql);
	
	if($rs === false){ echo("Errore di esecuzione query. Codice errore: 2"); exit(); }else{
	  $rows_returned = $rs->num_rows;
	}
	
	if(strpos($REQUEST_sql,'SELECT') !== false){
	  $rs->data_seek(0);
	  $num = $rs->num_rows;
	}
	
	if($REQUEST_type === "start_menu"){
	  if($num === 0){
	    echo("<i>Questa &egrave; la tua lista personale. Puoi modificarla con gli elementi che preferisci.</i>");
	  }else{
	    while($row = $rs->fetch_assoc()){
	      $ICON_SET = $USER_icon_set1;
	      include "File.php";
	      ?>
		<span onclick="open_dialog('<?= $app_name ?>', '<?= $app_real_name ?>', 'System/Window.php?window=<?= $app_name ?>&id=<?= $id ?>'); closeStart();"><img src="<?= $icon ?>" <?= $style ?> /><?php echo($name); ?></span>
	      <?php
	    }
	  }
	}elseif($REQUEST_type === "files"){
	  if($num === 0){
	    echo("<i>Nessun file presente in questa cartella.</i>");
	  }else{
	    while($row = $rs->fetch_assoc()){
	      include "File.php";
	      ?>
		<span app_name="<?= $app_name ?>" app_real_name="<?= $app_real_name ?>" file_id="<?= $id ?>" tooltip="files" context="files" class="icon_file"><img src="<?= $icon ?>" class="icon_file_img" <?= $style ?> /><span class="first_row truncate"><?php echo($name); ?></span><span class="second_row truncate"><?php echo($second_row); ?></span></span>
	      <?php
	    }
	  }
	}elseif($REQUEST_type === "viewer"){
	  if($num === 0){
	    echo("<i>Visualizzatore file non &egrave; in grado di aprire questo file perch&eacute; non &egrave; stato riconosciuto oppure perch&eacute; non esiste.</i>");
	  }else{
	    while($row = $rs->fetch_assoc()){
	      include "File.php";
	    }
	  }
	}elseif($REQUEST_type === "reader"){
	  if($num === 0){
	    echo("<i>Lettore non &egrave; in grado di aprire questo quaderno perch&eacute; non &egrave; stato riconosciuto oppure perch&eacute; non esiste.</i>");
	  }else{
	    while($row = $rs->fetch_assoc()){
	      include "File.php";
	      
	      echo($html);
	    }
	  }
	}elseif($REQUEST_type === "timetable"){
	  if($num === 0){
	    echo("<i>Comincia a compilare il tuo orario cliccando sul + in alto a destra nella barra del titolo.</i>");
	  }else{
	    $DAY_WEEK = array();
	    $i = 0;
	    
	    while($row = $rs->fetch_assoc()){
	      $id = $conn->real_escape_string($row['id']);
	      $subject = $conn->real_escape_string($row['subject']);
	      $day_of_week = $conn->real_escape_string($row['day_of_week']);
	      $hour_of_day = $conn->real_escape_string($row['hour_of_day']);
	      $fore_color = $conn->real_escape_string($row['fore_color']);
	      $book = $conn->real_escape_string($row['book']);
	      
	      if(!in_array($day_of_week, $DAY_WEEK)){
		if($i > 0){
		  echo("<br/>");
		}
		echo("<span style='color: $USER_accent; font-weight: bold; display: inline-block; width: 150px; padding: 10px 0px'>".$DAY_NAMES[$day_of_week]."</span> ");
		array_push($DAY_WEEK, $day_of_week);
	      }
	      echo("<span style='display: inline-block; width: 150px; padding: 5px 10px; cursor: pointer; color: $fore_color' class='truncate'>$subject</span>");
	      $i++;
	    }
	  }
	}elseif($REQUEST_type === "register_list_class" || $REQUEST_type === "register_class"){
	  if($num === 0){
	    echo("<i>Non fai parte di nessuna classe.</i>");
	  }else{
	    $SCHOOLS_ARRAY = array();
	    
	    while($row = $rs->fetch_assoc()){
	      $id = $conn->real_escape_string($row['id']);
	      $school = $school_id = $conn->real_escape_string($row['school']);
	      $school = $LightSchool->request_string_database("school", "name", "$school_id");
	      $school = "{$school}, {$LightSchool->request_string_database('school', 'city', $school_id)}";
	      $name = $conn->real_escape_string($row['name']);
	      
	      if($num === 1 && $REQUEST_type === "register_list_class"){
		$_GET['request'] = array("register_class", "SELECT * FROM MY_REG_class WHERE id = '$id' AND Component like '%$Username%' AND year = '$CURRENT_SCHOOL_YEAR' LIMIT 1");
		include "View.php";
		exit();
	      }
	      
	      if($REQUEST_type === "register_list_class"){
		if(!in_array($school, $SCHOOLS_ARRAY)){
		  echo("<div class='separator_with_text'><h3>$school</h3></div>");
		  array_push($SCHOOLS_ARRAY, $school);
		}
		echo("<span style='display: inline-block; width: 100px; padding: 5px 10px; cursor: pointer; font-size: 15pt; font-family: Roboto; font-weight: 300' class_id='$id' class='truncate element class_list_item class_selector_element'>$name</span>");
	      }elseif($REQUEST_type === "register_class"){
		?>
		  <h3><?php echo($name); ?></h3>
		<?php
	      }
	    }
	  }
	}elseif($REQUEST_type === "register_students"){
	  if($num === 0){
	    echo("<i>Codice classe errato.</i>");
	  }else{
	    $Student = array();
	    
	    while($row = $rs->fetch_assoc()){
	      $Component = $conn->real_escape_string($row['Component']);
	      $Component = explode(", ", $Component);
	      
	      foreach($Component as $i => $comp){
		$user_type = $LightSchool->request_string_database("student_teacher", "User_type", "$comp");
		
		if($user_type === "studente"){
		  $name = $LightSchool->request_string_database("student_teacher", "name", "$comp");
		  $surname = $LightSchool->request_string_database("student_teacher", "surname", "$comp");
		  $FN_sex = $LightSchool->request_string_database("student_teacher", "sex", "$comp");
		  $image = $LightSchool->request_string_database("student_teacher", "profile_image", "$comp");
		  
		  $element = "<div surname='$surname' name='$name' username='$comp' class='list hover_accent student_appello'><img src='$image' class='round' style='width: 16px; height: 16px; margin-top: -14px' /><span class='truncate' style='display: inline-block; width: calc(100% - 230px)'>$surname $name</span><div class='round student_status 1_hour'>1</div></div>";
		  
		  array_push($Student, $element);
		}
	      }
	      
	      asort($Student);
	      
	      foreach($Student as $i => $stud){
		echo($stud);
	      }
	    }
	  }
	}elseif($REQUEST_type === "Security_UniKey"){
	  $UniKey = $conn->real_escape_string($row['UniKey']);
	  
	  if($UniKey === ""){
	    echo("<i>Nessuna richiesta di collegamento da dispositivo attendibile in corso.</i>");
	  }else{
	    ?>
	    <p>Immettere il seguente codice quando richiesto nella schermata di accesso tramite dispositivo attendibile:</p>
	    <input type="text" id="SecUniKey" name="SecUniKey" value="<?= $UniKey ?>" style="text-align: center; font-size: 15pt" disabled />
	    <p style="font-size: 10pt"><b>N.B.:</b> Il codice &egrave; case-sensitive. Questo codice &egrave; valido solamente una volta. Se desideri autorizzare pi&ugrave; dispositivi alla volta, avvia e termina questa procedura su un dispositivo alla volta.</p>
	    <?php
	  }
	}
      }
    }
  }else{
    include_once "../404.php";
  }
?>