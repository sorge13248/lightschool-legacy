<?php include_once "base.php";
if($_SESSION['Username'] != ''){
  $_GET['SQL_type'] = "register_appello";
  include "view_management.php";
  
  $REGISTER_component_array_order = array();
  
  foreach($REGISTER_component_array as $usernameregister){
    $usernameregistertype = lightschool_get_user($usernameregister, 'type');
    if($usernameregistertype != $USER_type){
      $usernameregistername = lightschool_get_user($usernameregister, 'name');
      if($usernameregistername != 'not_exists'){
	$usernameregistersurname = lightschool_get_user($usernameregister, 'surname');
	$usernameregisterprofileimage = lightschool_get_user($usernameregister, 'profile_image');
	$usernameregisterdateofbirth = lightschool_get_user($usernameregister, 'date_of_birth');
	
	$usernameregisterassent = lightschool_get_justify($usernameregister, 'num', false, "");
	
	if($usernameregisterassent > 0){
	  $assent_text = $TRAD_register_justify_req;
	  $assent_highlight = 'assent_highlight';
	}else{
	  $assent_text = '';
	  $assent_highlight = '';
	}
	
	$ROW_CONTENT = "<div user_surname='".strtolower($usernameregistersurname)."' username='".strtolower($usernameregister)."' user_name='".strtolower($usernameregistername)."' user_complete='".strtolower($usernameregistername.' '.$usernameregistersurname)."' user_completeinv='".strtolower($usernameregistersurname.' '.$usernameregistername)."' title='$assent_text' class='list_item $assent_highlight'><span class='register_surname_and_name' style='padding: 0px'>$usernameregistersurname $usernameregistername</span><span style='background-color: ".lightschool_get_register_status($usernameregister, $_GET['day'], $_GET['class'], 'general_status_marker_color')."; display: inline-block; width: 16px; height: 16px; float: left; margin-right: 10px; margin-top: 2px; cursor: pointer' class='status_marker' username='".strtolower($usernameregister)."'></span><img src='$usernameregisterprofileimage' class='profile_picture_register_user' style='width: 16px; height: 16px; float: left; margin-right: 10px; border-radius: 10px; border: 1px solid black' />";
	if($USER_type == 'docente'){
	  $ROW_CONTENT .= "<pre class='text_min2'></pre>$usernameregisterdateofbirth";
	}
	$ROW_CONTENT .= "</div>";
	array_push($REGISTER_component_array_order, "$ROW_CONTENT");
      }
    }
  }
  ?>
    <span style="font-family: 'Roboto'; font-size: 20pt; display: inline-block; margin-bottom: 10px; margin-right: 20px"><?= $TRAD_register_appello ?></span><?php if(count($REGISTER_component_array) > 0){ ?><span onclick="appello()" class="link"><?= $TRAD_register_start_appello ?></span><?php } ?><br/>
    <span style="font-weight: bold"><span class="register_surname_and_name"><?= $TRAD_surname_and_name ?></span>
    <?php if($USER_type == 'docente'){ ?><span class="text_complete"><?= $TRAD_date_of_birth ?></span><?php } ?></span>
    <div style='display: none' class='nothing_found_users'><?= $TRAD_no_user ?></div>
    <?php
      asort($REGISTER_component_array_order);
      
      if(count($REGISTER_component_array_order) == 0){
	echo("<p>$TRAD_no_student</p>");
      }else{
	foreach($REGISTER_component_array_order as $usernameregister2){
	  echo($usernameregister2);
	}
      }
    ?>
  <?php }else{
    include_once "login.php";
  } ?>