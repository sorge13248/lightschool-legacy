<?php
  $_GET['no_text'] = 'y';
  include "base.php";
  
  if($_SESSION['Username'] != ''){
    $username_validate = lightschool_is_people_id_correct($_GET['id'], 'ask');
    if($username_validate !== false){
      if($username_validate != ''){
	$text_visible1 = '';
	$text_visible2 = '';
	$text_visible3 = 'contatto';
	$get_email = lightschool_get_user($username_validate, 'email_address');
	
	if($get_email != 'not_exists'){
	  $user_exists = true;
	  ?>
	    <img src="<?php echo(lightschool_get_user($username_validate, 'profile_image')); ?>" style="border-radius: 50%; width: 64px; height: 64px; border: 1px solid black; float: left; margin-right: 20px" />
	    <span style="font-size: 25pt; font-family: 'Roboto'; display: inline-block; margin-bottom: 5px"><?php echo(lightschool_get_user($username_validate, 'surname')); ?> <?php echo(lightschool_get_user($username_validate, 'name')); ?></span><br/>
	    <span style="font-size: 12pt; font-family: 'Roboto'; display: inline-block; margin-bottom: 20px; max-width: calc(100% - 100px); overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo(lightschool_get_user($username_validate, 'date_of_birth')); ?><pre class='text_min2'></pre><span class="text_complete">&nbsp;&bull;&nbsp;</span><span title="<?= $get_email ?>" onclick="alert('<?= $get_email ?>');" style="cursor: pointer"><?php echo($get_email); ?></span></span>
	<?php
	}
      }else{
	$user_exists = true;
	$text_visible1 = $TRAD_group1;
	$text_visible2 = $TRAD_group2;
	$text_visible3 = lcfirst($TRAD_group);
	$name_group_validate = lightschool_is_people_id_correct($_GET['id'], 'name_group');
	$usernames_group_validate = lightschool_is_people_id_correct($_GET['id'], 'group');
	
	$name_group_validate2 = $name_group_validate."($TRAD_group)";
	
	$COUNT_usernames_group_validate = count($usernames_group_validate);
	$i = 1;
	
	foreach($usernames_group_validate as $username_from_people_group){
	  $surname_validate = lightschool_get_user($username_from_people_group, 'surname');
	  $name_validate = lightschool_get_user($username_from_people_group, 'name');
	  
	  if($name_validate != 'not_exists'){
	    $usernames_group_validate_text .= "$surname_validate $name_validate";
	  }else{
	    $usernames_group_validate_text .= "$TRAD_deactivated_account ($username_from_people_group)";
	  }
	  
	  if($i < $COUNT_usernames_group_validate){
	    $usernames_group_validate_text .= ', ';
	  }
	  $i++;
	}
	?>
	<span style="font-size: 25pt; font-family: 'Roboto'; display: inline-block; margin-bottom: 5px"><?php echo($name_group_validate); ?></span><br/>
	<span style="font-size: 12pt; font-family: 'Roboto'; display: inline-block; margin-bottom: 20px; max-width: 350px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; cursor: pointer" title="<?php echo($usernames_group_validate_text); ?>" onclick="alert('<?php echo($usernames_group_validate_text); ?>')"><?php echo($usernames_group_validate_text); ?></span>
	<?php
      }
      if($user_exists === true){
	?>
	<br/>
	<a class="link" style="margin-bottom: 10px; display: inline-block" href="<?= $MY_MAIN_DIRECTORY ?>/messages?to=<?= $username_validate.$name_group_validate2 ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/mail.png" style="width: 16px; height: 16px; float: left; margin-right: 10px; padding-top: 1px" /><?= $TRAD_send_message ?><?php echo($text_visible1); ?></a><br/>
	<!-- <span class="link" style="margin-bottom: 10px; display: inline-block"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/messages.png" style="width: 16px; height: 16px; float: left; margin-right: 10px; padding-top: 1px" />Inizia chat<?php echo($text_visible2); ?></span><br/> -->
	<a class="link" style="margin-bottom: 10px; display: inline-block" href="<?= $MY_MAIN_DIRECTORY ?>/messages?share=<?= $username_validate.$name_group_validate2 ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/share.png" style="width: 16px; height: 16px; float: left; margin-right: 10px; padding-top: 1px" /><?= $TRAD_share ?> <?php echo($text_visible3); ?></a><br/>
      <?php 
      }else{
	?>
	  <p style="max-width: 400px"><?= $TRAD_people_user_deactivated_descr ?></p>
	<?php
      }
      if($username_validate != '' and $username_validate != 'lightschool'){
	if(in_array($username_validate, $USER_block_list)){
	  $START_text = $TRAD_unblockuser;
	}else{
	  $START_text = $TRAD_blockuser;
	} ?>
	<span class="link" style="margin-bottom: 10px; display: inline-block" onclick="block_management('<?= $username_validate ?>')"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/shield.png" style="width: 16px; height: 16px; float: left; margin-right: 10px; padding-top: 1px" /><span id="block_text_<?= $username_validate ?>"><?php echo($START_text); ?></span></span><br/>
      <?php } 
      if($username_validate == '' and $CURRENT_VERSION >= 5.5){ ?>
	<span class="link" style="margin-bottom: 10px; display: inline-block"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/edit.png" style="width: 16px; height: 16px; float: left; margin-right: 10px; padding-top: 1px" /><?= $TRAD_edit_group ?></span><br/>
      <?php } ?>
      <span class="link" onclick="delete_p('<?= $_GET['id'] ?>')"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/cross.png" style="width: 16px; height: 16px; float: left; margin-right: 10px; padding-top: 1px" /><?= $TRAD_delete ?> <?php echo($text_visible3); ?></span><br/>
      <?php
    }else{
      echo($TRAD_invalid_contact);
    }
  }else{
    echo("$TRAD_not_logged_error");
  }
?>