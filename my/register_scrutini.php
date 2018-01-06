<?php include_once "base.php";
if($_SESSION['Username'] != ''){
  $SCHOOL_id = lightschool_get_class_details($Username, $_GET['class'], 'school_id');
  $SCHOOL_periodo = lightschool_get_class_details($Username, $_GET['class'], 'periodo');
    
  if($_GET['period'] == 'first'){
    $DATE_array = array($SCHOOL_periodo[0], $SCHOOL_periodo[1]);
  }elseif($_GET['period'] == 'second'){
    $DATE_array = array($SCHOOL_periodo[2], $SCHOOL_periodo[3]);
  }
?>
  <span style="font-family: 'Roboto'; font-size: 20pt; display: inline-block; margin-bottom: 10px">Scrutinio</span>
    <?php if($USER_type == 'docente'){
      $_GET['SQL_type'] = "register_appello";
      include "view_management.php";
      
      $REGISTER_component_array_order = array();
      
      foreach($REGISTER_component_array as $usernameregister){
	// validate
	$usernameregistertype = lightschool_get_user($usernameregister, 'type');
	  if($usernameregistertype != $USER_type){
	  $usernameregistername = lightschool_get_user($usernameregister, 'name');
	  if($usernameregistername != 'not_exists'){
	    // get user's details
	    $usernameregistersurname = lightschool_get_user($usernameregister, 'surname');
	    $usernameregisterprofileimage = lightschool_get_user($usernameregister, 'profile_image');
	    $MARK_scrutinio = lightschool_get_marks($_SESSION['Username'], $usernameregister, $_GET['class'], $_GET['subject'], 'scrutini', 'graph2', $DATE_array);
	    
	    // marks
	    $MARK_media = lightschool_get_marks_media($_SESSION['Username'], $usernameregister, $_GET['class'], $_GET['subject'], 'scrutini', $DATE_array);
	    
	    $MARK_media_graph = $MARK_media[0];
	    $MARK_media_value = $MARK_media[1];
	    $MARK_media_value2 = $MARK_media_value;
	    
	    if($MARK_scrutinio == false){
	      $MARK_scrutinio = 'Nessun voto proposto';
	    }
	    
	    if($MARK_media_value == 0){
	      $MARK_media_value2 = "n.c.";
	    }
	    
	    if($MARK_s != '' or $MARK_o != '' or $MARK_p != ''){
	      $add_class = 'hide_mark';
	    }else{
	      $add_class = '';
	    }
	    
	    if($MARK_media_value < 5.75){
	      $add_class2 = ' assent_highlight';
	    }else{
	      $add_class2 = '';
	    }
	    
	    // row
	    $ROW_CONTENT = "<div user_surname='".strtolower($usernameregistersurname)."' username='".strtolower($usernameregister)."' user_name='".strtolower($usernameregistername)."' user_complete='".strtolower($usernameregistername.' '.$usernameregistersurname)."' user_completeinv='".strtolower($usernameregistersurname.' '.$usernameregistername)."' class='list_item $add_class $add_class2'><span class='register_surname_and_name' style='padding: 0px; max-width: 200px'>$usernameregistersurname $usernameregistername</span><span style='background-color: transparent; display: inline-block; width: 16px; height: 16px; float: left; margin-right: 10px; margin-top: 20px; cursor: pointer' class='status_marker' username='".strtolower($usernameregister)."'></span><img src='$usernameregisterprofileimage' class='profile_picture_register_user' style='width: 16px; height: 16px; float: left; margin-right: 10px; border-radius: 10px; border: 1px solid black;' /><pre class='text_min2'></pre><span style='display: inline-block; width: 100%; max-width: 100px'>$MARK_media_value2</span><pre class='text_min2'></pre><span style='display: inline-block; width: 100%; max-width: 230px'>$MARK_scrutinio</span><pre class='text_min2'></pre><span style='display: inline-block; width: auto'>Proponi un voti e aggiungi un'annotazione...</span></div>";
	    array_push($REGISTER_component_array_order, "$ROW_CONTENT");
	  }
	}
      } ?>
      <span style="font-family: 'Roboto'; font-size: 20pt; display: inline-block; margin-bottom: 10px"> di
      <?php
	asort($USER_DOC_subject);
	foreach($USER_DOC_subject as $other_subject){
	  ?>
	    <span <?php if($other_subject != $_GET['subject']){ ?> class="link" onclick="switchSubject('<?= $other_subject ?>')" style="display: inline-block; margin-left: 10px; margin-right: 10px" <?php }else{ ?>  style="display: inline-block; margin-left: 10px; margin-right: 10px; text-decoration: underline" <?php } ?>><?php echo($other_subject); ?></span>
	  <?php
	}
	?> <span <?php if($_GET['period'] == 'second'){ ?> class="link" onclick="switchPeriod('first')" style="display: inline-block; margin-left: 10px; margin-right: 10px" <?php }else{ ?>  style="display: inline-block; margin-left: 10px; text-decoration: underline; margin-right: 10px" <?php } ?>>1<sup>o</sup></span>/<span <?php if($_GET['period'] == 'first'){ ?> class="link" onclick="switchPeriod('second')" style="display: inline-block; margin-left: 10px; margin-right: 10px" <?php }else{ ?>  style="display: inline-block; margin-left: 10px; text-decoration: underline; margin-right: 10px" <?php } ?>>2<sup>o</sup></span>periodo
      </span><pre class='text_min2'></pre><pre class='text_min2'></pre><button style="float: right" onclick="finischScrutinio()">Finalizza</button>
      <br/>
      <?php
	asort($REGISTER_component_array_order);
	
	if(count($REGISTER_component_array_order) == 0){
	  echo('<p>Nessun utente fa parte di questa classe. Chiedi alla tua scuola di aggiungerne.</p>');
	}else{
	  ?>
	    <span style="font-weight: bold"><span class="register_surname_and_name" style="max-width: 195px">Cognome e nome</span>
	    <span style='display: inline-block; width: 100%; max-width: 100px'>Media</span><span style='display: inline-block; width: 100%; max-width: 230px'>Voto proposto</span></span>
	    <div style='display: none' class='nothing_found_users'>Nessun utente trovato</div>
	<?php
	  foreach($REGISTER_component_array_order as $usernameregister2){
	    echo($usernameregister2);
	  }
	}
      ?>
    <?php }else{ ?>
      <br/>
      <br/>
      <div style='display: none' class='nothing_found_users'>Nessuna materia corrispondente al termine di ricerca trovata</div>
      <span style="font-weight: bold"><span class="register_surname_and_name" style="max-width: 200px">Materia</span>
      <span style='display: inline-block; width: calc(33% - 133px)'>Voto finale</span></span>
      <?php
	// $_GET['SQL_type'] = 'register_scrutini_student';
	// include "view_management.php";
      ?>
    <?php } ?>
<?php }else{
  include_once "login.php";
} ?>
