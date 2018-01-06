<?php include_once "base.php";
if($_SESSION['Username'] != ''){
  include_once "style_$USER_skin.php";
  
  if($_GET['username'] != ''){
    $_GET['username'] = strtolower($_GET['username']);
    
    $FOUND_visible = lightschool_get_user($_GET['username'], 'visible');
    
    if($FOUND_visible == 'y'){
      $FOUND_name = lightschool_get_user($_GET['username'], 'name');
      $FOUND_surname = lightschool_get_user($_GET['username'], 'surname');
      $FOUND_profile_image = lightschool_get_user($_GET['username'], 'profile_image');
      $FOUND_email_address = lightschool_get_user($_GET['username'], 'email_address');
      $FOUND_school = lightschool_get_user($_GET['username'], 'school');
      
      $FOUND_visible_email = lightschool_get_user($_GET['username'], 'visible_email');
      $FOUND_visible_school = lightschool_get_user($_GET['username'], 'visible_school');
      
      $FOUND_school = explode(", ", $FOUND_school);
      
      $FOUND_school_order = array();
	
      foreach($FOUND_school as $current_school_id){
	$GET_school_name = lightschool_get_school_details($Username, $current_school_id, 'name');
	
	if($GET_school_name !== false){
	  array_push($FOUND_school_order, "$GET_school_name");
	}
      }
      
      asort($FOUND_school_order);
      
      $FOUND_school_order_text = implode($FOUND_school_order, ", ");
      
      $FOUND_complete = "$FOUND_name $FOUND_surname";
      
      $_GET['only_block_script'] = true;
      $_GET['people'] = true;
      include_once "block_user.php";
      
      $_GET['people'] = "";
      
      if(in_array($_GET['username'], $USER_block_list)){
	$START_text = $TRAD_unblockuser;
      }else{
	$START_text = $TRAD_blockuser;
      }
      ?>
	<script type="text/javascript">
	  function savePeople(name, surname, username){
	    if(name != '' && surname != '' && username != ''){
	      $.ajax({
		type: "POST",
		url: "formpost.php?type=addpeople",
		data: "name="+name+"&surname="+surname+"&saved_username="+username,
		success: function(html){
		  if(html=='true'){
		    $(".toast").css("background-color", "darkgreen");
		    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />Contatto aggiunto");
		  }else{
		    $(".toast").css("background-color", "red");
		    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
		  }
		},
		beforeSend:function(){
		  $(".toast").css("background-color", "orange");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
		}
	      });
	    }else{
	      $(".toast").css("background-color", "red");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_fill_field ?>");
	    }
	    $(".toast").slideDown(400);
	  }
	  
	  function report_user(){
	    $('#report_dialog').fadeIn(200);
	    $('#dialog_overlay').fadeIn(200);
	  }
	</script>
	<div class="dialog" id="report_dialog">
	  <div class="title"><span style="float: left"><?= $TRAD_report_user ?></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
	  <div class="content" id="report_frame" style="max-width: 500px">
	    <?= $TRAD_report_user_descr ?><br/>
	    <span class="link" style="margin-bottom: 10px; display: inline-block" onclick="block_management('<?= $_GET['username'] ?>')"><span class="block_text_<?= $_GET['username'] ?>"><?php echo($START_text); ?></span></span>
	    <button style="float: right" onclick="window.location.href = '<?= $SUPPORT_MAIN_DIRECTORY ?>/submit?action=report&username=<?= $_GET['username'] ?>'"><?= $TRAD_report_user ?></button>
	  </div>
	</div>
      <?php
    }
  }
?>
<html>
  <head>
    <title>Social - LightSchool</title>
    <script type="text/javascript">
      $(document).ready(function(){
	$("#social").on("click", ".icon_files", function(e){
	  window.location.href = "<?= $MY_MAIN_DIRECTORY ?>/social?username="+$(this).attr("id");
	});
      });
    </script>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="content" id="social">
      <form action="" method="get">
	<input type="text" id="people" name="people" placeholder="<?= $TRAD_search_by ?>" style="width: 100%" value="<?= $_GET['people'].$FOUND_complete ?>" />
      </form>
      <?php
	if($_GET['username'] != '' and $FOUND_name != 'not_exists' and $FOUND_visible == 'y'){
	  ?>
	    <h2><img src="<?= $FOUND_profile_image ?>" style="width: 32px; height: 32px; border: 1px solid black; border-radius: 50%; float: left; margin-right: 10px; margin-bottom: 10px" /><?php echo($FOUND_complete); ?><small><?php echo($_GET['username']); ?></small></h2>
	    <p><?php if($FOUND_visible_email == 'y'){ echo($FOUND_email_address); } if($FOUND_visible_email == 'y' and $FOUND_visible_school == 'y'){ echo("&nbsp;&bull;&nbsp;"); } if($FOUND_visible_school == 'y'){ echo($FOUND_school_order_text); } ?></p><br/>
	    <a class="link" style="margin-bottom: 10px; display: inline-block" href="<?= $MY_MAIN_DIRECTORY ?>/messages?to=<?= $_GET['username'] ?>"><?= $TRAD_send_message ?></a><br/>
	    <?php if($_GET['username'] != 'lightschool'){ ?>
	      <span class="link block_text_<?= $_GET['username'] ?>" style="margin-bottom: 10px; display: inline-block" onclick="block_management('<?= $_GET['username'] ?>')"><?php echo($START_text); ?></span><br/>
	    <?php } ?>
	    <span class="link" style="margin-bottom: 10px; display: inline-block" onclick="savePeople('<?= $FOUND_name ?>', '<?= $FOUND_surname ?>', '<?= $_GET['username'] ?>')"><?= $TRAD_add_to_contact ?></span><br/>
	    <?php if($_GET['username'] != 'lightschool'){ ?>
	      <?php if($SUPPORT_MAIN_DIRECTORY == '//support.lightschool.it'){ ?>
		<span class="link" onclick="report_user()"><?= $TRAD_report_user ?></span><br/>
	      <?php } ?>
	    <?php } ?>
	  <?php
	}else{
	  if($_GET['people'] != ''){
	    $_GET['SQL_type'] = "social";
	    include "view_management.php";
	  }
	}
      ?>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>