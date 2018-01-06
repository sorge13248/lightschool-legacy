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
	    
	    // marks
	    $MARK_s = lightschool_get_marks($_SESSION['Username'], $usernameregister, $_GET['class'], $_GET['subject'], 's', 'graph1', $DATE_array);
	    $MARK_o = lightschool_get_marks($_SESSION['Username'], $usernameregister, $_GET['class'], $_GET['subject'], 'o', 'graph1', $DATE_array);
	    $MARK_p = lightschool_get_marks($_SESSION['Username'], $usernameregister, $_GET['class'], $_GET['subject'], 'p', 'graph1', $DATE_array);
	    $MARK_media = lightschool_get_marks_media($_SESSION['Username'], $usernameregister, $_GET['class'], $_GET['subject'], 'graph1', $DATE_array);
	    $STATUS = lightschool_get_register_status($usernameregister, $_GET['day'], $_GET['class'], 'general_status_marker_color');
	    
	    $MARK_media_graph = $MARK_media[0];
	    $MARK_media_value = $MARK_media[1];
	    
	    if($MARK_s != '' or $MARK_o != '' or $MARK_p != ''){
	      $add_class = 'hide_mark';
	    }else{
	      $add_class = '';
	    }
	    
	    if($MARK_media_value >= 5.75){
	      $add_class2 = ' insufficient';
	    }else{
	      $add_class2 = '';
	    }
	    
	    if($STATUS != 'darkgreen'){
	      $add_class3 = "present";
	    }else{
	      $add_class3 = '';
	    }
	    
	    // row
	    $ROW_CONTENT = "<div user_surname='".strtolower($usernameregistersurname)."' username='".strtolower($usernameregister)."' user_name='".strtolower($usernameregistername)."' user_complete='".strtolower($usernameregistername.' '.$usernameregistersurname)."' user_completeinv='".strtolower($usernameregistersurname.' '.$usernameregistername)."' class='list_item $add_class $add_class2 $add_class3'><span class='register_surname_and_name' style='padding: 0px; max-width: 200px'>$usernameregistersurname $usernameregistername</span><span style='background-color: ".$STATUS."; display: inline-block; width: 16px; height: 16px; float: left; margin-right: 10px; margin-top: 20px; cursor: pointer' class='status_marker' username='".strtolower($usernameregister)."'></span><img src='$usernameregisterprofileimage' class='profile_picture_register_user' style='width: 16px; height: 16px; float: left; margin-right: 10px; border-radius: 10px; border: 1px solid black; margin-top: 20px' /><pre class='text_min2'></pre><span style='display: inline-block; width: calc(33% - 133px)'>$MARK_s</span><pre class='text_min2'></pre><span style='display: inline-block; width: calc(33% - 173px)'>$MARK_o</span><pre class='text_min2'></pre><span style='display: inline-block; width: calc(33% - 133px)'>$MARK_p</span><pre class='text_min2'></pre><span style='display: inline-block; width: 100px'>$MARK_media_graph</span></div>";
	    array_push($REGISTER_component_array_order, "$ROW_CONTENT");
	  }
	}
      } ?>
      <span style="font-family: 'Roboto'; font-size: 20pt; display: inline-block; margin-bottom: 10px"><?= $TRAD_register_marks_of ?> 
      <?php
	asort($USER_DOC_subject);
	foreach($USER_DOC_subject as $other_subject){
	  ?>
	    <span <?php if($other_subject != $_GET['subject']){ ?> class="link" onclick="switchSubject('<?= $other_subject ?>')" style="display: inline-block; margin-left: 10px; margin-right: 10px" <?php }else{ ?>  style="display: inline-block; margin-left: 10px; margin-right: 10px; text-decoration: underline" <?php } ?>><?php echo($other_subject); ?></span>
	  <?php
	}
	?><?= $TRAD_register_marks_for ?> <span <?php if($_GET['period'] == 'second'){ ?> class="link" onclick="switchPeriod('first')" style="display: inline-block; margin-left: 10px; margin-right: 10px" <?php }else{ ?>  style="display: inline-block; margin-left: 10px; text-decoration: underline; margin-right: 10px" <?php } ?>>1<sup>o</sup></span>/<span <?php if($_GET['period'] == 'first'){ ?> class="link" onclick="switchPeriod('second')" style="display: inline-block; margin-left: 10px; margin-right: 10px" <?php }else{ ?>  style="display: inline-block; margin-left: 10px; text-decoration: underline; margin-right: 10px" <?php } ?>>2<sup>o</sup></span>periodo
      </span>
      <br/>
      <a href="javascript:void(0)" id="marks_settings"><span id="indicator" style="display: inline-block; width: 20px; text-align: center">+</span><?= $TRAD_register_filter ?></a><br/>
      <div class="hidden_settings marks_settings">
	<h4><?= $TRAD_register_filter_what ?></h4>
	<label><input type="checkbox" value="n" id="show_present"><?= $TRAD_register_filter1 ?></label><br/>
	<label><input type="checkbox" value="n" id="show_no_marks"><?= $TRAD_register_filter2 ?></label><br/>
	<label><input type="checkbox" value="n" id="show_insufficient"><?= $TRAD_register_filter3 ?></label><br/>
      </div>
      <br/>
      <?php
	asort($REGISTER_component_array_order);
	
	if(count($REGISTER_component_array_order) == 0){
	  echo("<p>$TRAD_no_student</p>");
	}else{
	  ?>
	    <span style="font-weight: bold"><span class="register_surname_and_name" style="max-width: 200px">Cognome e nome</span>
	    <span style='display: inline-block; width: calc(33% - 133px)'><?= $TRAD_register_s ?></span><span style='display: inline-block; width: calc(33% - 133px)'><?= $TRAD_register_o ?></span><span style='display: inline-block; width: calc(33% - 133px)'><?= $TRAD_register_p ?></span><span style='display: inline-block; width: 100px'><?= $TRAD_register_m ?></span></span>
	    <div style='display: none' class='nothing_found_users'><?= $TRAD_no_user ?></div>
	  <?php
	  foreach($REGISTER_component_array_order as $usernameregister2){
	    echo($usernameregister2);
	  }
	}
      ?>
    <?php }else{ ?>
      <div style='display: none' class='nothing_found_users'><?= $TRAD_no_subject ?></div>
      <span style="font-weight: bold"><span class="register_surname_and_name" style="max-width: 200px">Materia</span>
      <span style='display: inline-block; width: calc(33% - 133px)'><?= $TRAD_register_s ?></span><span style='display: inline-block; width: calc(33% - 133px)'><?= $TRAD_register_o ?></span><span style='display: inline-block; width: calc(33% - 133px)'><?= $TRAD_register_p ?></span><span style='display: inline-block; width: 100px'><?= $TRAD_register_m ?></span></span>
      <div style='display: none' class='nothing_found_users'><?= $TRAD_no_subject ?></div>
      <?php
	$_GET['SQL_type'] = 'register_marks_student';
	include "view_management.php";
      ?>
    <?php } ?>
  <?php }else{
    include_once "login.php";
  } ?>