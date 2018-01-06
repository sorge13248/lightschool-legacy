<?php include_once "base.php";
if($_SESSION['Username'] != ''){
  $_GET['SQL_type'] = "register_appello";
  include "view_management.php";
  
  $REGISTER_component_array_order = array();
  $REGISTER_component_array_order2 = array();
  
  if($USER_type == 'studente'){
    $heading1 = "Docenti";
    $heading2 = "Studenti";
  }else{
    $heading1 = "Studenti";
    $heading2 = "Docenti";
  }
  
  foreach($REGISTER_component_array as $usernameregister){
    $usernameregistertype = lightschool_get_user($usernameregister, 'type');
    if($usernameregistertype != $USER_type){
      $usernameregistername = lightschool_get_user($usernameregister, 'name');
      if($usernameregistername != 'not_exists'){
	$usernameregistersurname = lightschool_get_user($usernameregister, 'surname');
	$usernameregisterprofileimage = lightschool_get_user($usernameregister, 'profile_image');
	
	if($usernameregistertype == 'studente'){
	  $EXTEND = "<span style='background-color: ".lightschool_get_register_status($usernameregister, $_GET['day'], $_GET['class'], 'general_status_marker_color')."; display: inline-block; width: 16px; height: 16px; float: left; margin-right: 10px; margin-top: 2px; cursor: pointer' class='status_marker' username='".strtolower($usernameregister)."'></span>";
	}else{
	  $EXTEND = "";
	}
	
	$ROW_CONTENT = "<div surname='".strtolower($usernameregistersurname)."' username='".strtolower($usernameregister)."' name='".strtolower($usernameregistername)."' user_complete='".strtolower($usernameregistername.' '.$usernameregistersurname)."' user_completeinv='".strtolower($usernameregistersurname.' '.$usernameregistername)."' title='$assent_text' class='profile_frame $assent_highlight'><img src='$usernameregisterprofileimage' class='image'></img><div class='caption'>$EXTEND $usernameregistersurname $usernameregistername</div></div></div>";
	array_push($REGISTER_component_array_order, "$ROW_CONTENT");
      }
    }
  }
  
  foreach($REGISTER_component_array as $usernameregister){
    $usernameregistertype = lightschool_get_user($usernameregister, 'type');
    if($usernameregistertype == $USER_type){
      $usernameregistername = lightschool_get_user($usernameregister, 'name');
      if($usernameregistername != 'not_exists'){
	$usernameregistersurname = lightschool_get_user($usernameregister, 'surname');
	$usernameregisterprofileimage = lightschool_get_user($usernameregister, 'profile_image');
	
	if($usernameregistertype == 'studente'){
	  $EXTEND = "<span style='background-color: ".lightschool_get_register_status($usernameregister, $_GET['day'], $_GET['class'], 'general_status_marker_color')."; display: inline-block; width: 16px; height: 16px; float: left; margin-right: 10px; margin-top: 2px; cursor: pointer' class='status_marker' username='".strtolower($usernameregister)."'></span>";
	}else{
	  $EXTEND = "";
	}
	
	$ROW_CONTENT = "<div surname='".strtolower($usernameregistersurname)."' username='".strtolower($usernameregister)."' name='".strtolower($usernameregistername)."' user_complete='".strtolower($usernameregistername.' '.$usernameregistersurname)."' user_completeinv='".strtolower($usernameregistersurname.' '.$usernameregistername)."' title='$assent_text' class='profile_frame $assent_highlight'><img src='$usernameregisterprofileimage' class='image'></img><div class='caption' style='$assent_highlight'>$EXTEND $usernameregistersurname $usernameregistername</div></div></div>";
	array_push($REGISTER_component_array_order2, "$ROW_CONTENT");
      }
    }
  }
  ?>
  <marquee>Nessuna nuova comunicazione</marquee>
    <div style='display: none' class='nothing_found_users'>Nessun utente trovato</div>
    <?php
      asort($REGISTER_component_array_order);
      asort($REGISTER_component_array_order2);
    ?>
    <blockquote>
    <h1><?php echo($heading1); ?></h1>
    <?php
      if(count($REGISTER_component_array_order) == 0){
	echo('<p>Nessuno studente fa parte di questa classe. Chiedi alla tua scuola di aggiungerne.</p>');
      }else{
	foreach($REGISTER_component_array_order as $usernameregister2){
	  echo($usernameregister2);
	}
      }
    ?>
    </blockquote>
    <blockquote>
    <h1><?php echo($heading2); ?></h1>
    <?php
      if(count($REGISTER_component_array_order2) == 0){
	echo('<p>Nessun docente fa parte di questa classe. Chiedi alla tua scuola di aggiungerne.</p>');
      }else{
	foreach($REGISTER_component_array_order2 as $usernameregister2){
	  echo($usernameregister2);
	}
      }
    ?>
    </blockquote>
  <?php }else{
    include_once "login.php";
  } ?>