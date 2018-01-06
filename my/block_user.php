<?php
  $_GET['no_text'] = 'y';
  include "base.php";
  
  if($_SESSION['Username'] != ''){
    if($_GET['dialog'] == 'true'){
      $MAX_WIDTH = " style='max-width: 400px'";
    }
    ?>
      <div <?= $MAX_WIDTH ?> id="block_management_content">
	<script type="text/javascript">
	  function block_management(username){
	    $.ajax({
	      type: "POST",
	      url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=block_management",
	      data: "username="+username,
	      success: function(html){
		if(html.indexOf('Utente') > -1){
		  $(".toast").css("background-color", "darkgreen");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
		  <?php if($_GET['only_block_script'] !== true){ ?>
		    $("#block_management_content").load("<?= $MY_MAIN_DIRECTORY ?>/block_user.php?dialog=<?= $_GET['dialog'] ?>");
		    $('.update_messages_list').load('<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=messages_list');
		  <?php } if($_GET['people'] === true){ ?>
		    if(html.indexOf('sbloccato') > -1){
		      $("#block_text_" + escapeSelector(username) + ", .block_text_" + escapeSelector(username)).html("<?= $TRAD_blockuser ?>");
		    }else if(html.indexOf('bloccato') > -1){
		      $("#block_text_" + escapeSelector(username) + ", .block_text_" + escapeSelector(username)).html("<?= $TRAD_unblockuser ?>");
		    }
		  <?php } ?>
		}else{
		  $(".toast").css("background-color", "red");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
		}
	      },
	      beforeSend:function(){
		$(".toast").css('background-color', 'orange');
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	      }
	    });
	    $(".toast").slideDown(400);
	  }
	</script>
	<?php
	if($_GET['only_block_script'] !== true){
	  if($_GET['dialog'] != 'true'){ ?>
	    <label><?= $TRAD_blockuser2 ?></label><br/>
	    <span class="settings_subtitle"><?= $TRAD_block_descr ?></span>
	  <?php } ?>
	  <br/>
	  <div class="container no_selection">
	    <input type="text" id="new_username" name="new_username" class="Username" placeholder="Scrivi il nome utente di chi vuoi bloccare" style="width: 100% !important; max-width: calc(100% - 65px) !important; border-left: 0px; border-top: 0px; border-right: 0px; background-color: transparent" /><img src='<?= "$IMAGES_MAIN_DIRECTORY/$USER_icon_set_black/tick.png" ?>' style='display: inline-block; width: 14px; height: 14px; padding-bottom: 4px; padding-left: 7px' title='Blocca' onclick="block_management($('#new_username').val());" />
	    <?php if(count(array_filter($USER_block_list)) == 0){ ?>
	      <span style="background-color: transparent !important; color: black !important; cursor: default"><?= $TRAD_no_blocked_user ?></span>
	    <?php }else{
	      foreach($USER_block_list as $username_blocked){
		if($username_blocked != ''){
		  $get_name = lightschool_get_user($username_blocked, 'name');
		  $get_surname = lightschool_get_user($username_blocked, 'surname');
		  echo("<span>$get_name $get_surname ($username_blocked) <img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set_black/cross.png' style='width: 14px; height: 14px; margin-top: 3px; float: right' title='$TRAD_unblockuser' id='$username_blocked' onclick='block_management(this.id);' /></span>");
		}
	      }
	    } ?>
	  </div>
	<?php } ?>
      </div>
    <?php
  }
?>