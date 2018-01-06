<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<html>
  <head>
    <title><?= $TRAD_devices ?> - LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <script type="text/javascript">
      $(document).ready(function(){
	$(".icon_files").click(function(){
	  document.getElementById("ip_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	  $('#ip_dialog').fadeIn(200);
	  $('#dialog_overlay').fadeIn(200);
	  document.getElementById("ipaddress").innerHTML = $(this).attr('ip');
	  $('#ip_frame').load('<?= $MY_MAIN_DIRECTORY ?>/ip.php?ip=' + $(this).attr('ip') + '&dialog=true');
	});
	
	$("#add_ip").click(function(){
	  $("#add_ip").attr("disabled", "disabled");
	  ip_address=$("#ip_address").val();
	  type=$("#type").val();
	  
	  if(ip_address == "" || type == ""){
	    $(".toast").css('background-color', 'red');
	    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_no_ip ?>");
	    $("#add_ip").removeAttr("disabled");
	  }else{
	    $.ajax({
	      type: "POST",
	      url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=ip_actions",
	      data: "ip_address="+ip_address+"&type="+type,
	      success: function(html){
		if(html == 'true'){
		  $(".toast").css("background-color", "darkgreen");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_ip_blocked_manually ?>");
		  $("#add_ip").removeAttr("disabled");
		}else{
		  $(".toast").css('background-color', 'red');
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
		  $("#add_ip").removeAttr("disabled");
		}
	      },
	      beforeSend:function(){
		$(".toast").css("background-color", "orange");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	      }
	    });
	  }
	  $(".toast").slideDown(400);
	  return false;
	});
      });
      
      function doSearch(q){
	if(q.length == 0){
	  $('.icon_files').show();
	  $('.nothing_found_files').hide();
	}else{
	  $('.icon_files').hide();
	  q = q.toString().toLowerCase();
	  $('.icon_files[ip*="'+q+'"]').show();  
	  if($('.icon_files').is(':visible')) {
	    $('.nothing_found').hide();
	  }else{
	    $('.nothing_found').show();
	  }
	}
      }
	
      function ip(ip_address, type){
	if(ip_address == '' || type == ''){
	  $(".toast").css('background-color', 'red');
	  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_empty_field ?>");
	}else{
	  $.ajax({
	    type: "POST",
	    url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=ip_actions",
	    data: "ip_address="+ip_address+"&type="+type,
	    success: function(html){
	      if(html.indexOf('true') >= 0){
		$(".toast").css("background-color", "darkgreen");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
		if(html.indexOf('close') >= 0){
		  closeDialog();
		}
		if(html.indexOf('remove') >= 0){
		  $("#"+ip_address).remove();
		}
	      }else{
		$(".toast").css('background-color', 'red');
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	      }
	    },
	    beforeSend:function(){
	      $(".toast").css("background-color", "orange");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	    }
	  });
	}
	$(".toast").slideDown(400);
      }
      
      function addIp(){
	$('#add_ip_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
      }
    </script>
    <div class="dialog" id="ip_dialog">
      <div class="title">IP <span id="ipaddress" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="ip_frame" style="padding: 35px 0px 0px 0px !important; margin: 0px !important"></div>
    </div>
    <div class="dialog" id="add_ip_dialog">
      <div class="title"><?= $TRAD_add_ip ?><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="add_ip_frame" style="max-width: 500px">
	<form method="post" action="<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=ip_actions">
	  <?= $TRAD_add_ip_descr ?><br/><br/>
	  <input type="hidden" style="display: none" hidden="hidden" id="type" name="type" value="add" />
	  <input type="text" id="ip_address" name="ip_address" placeholder="<?= $TRAD_add_ip_placeholder ?>" style="width: calc(100% - 150px)" /><input type="submit" value="Blocca" style="float: right" id="add_ip" />
	</form>
      </div>
    </div>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="content" id="devices">
      <?php if($USER_access_control == 'y'){ ?>
	<strong><?= $TRAD_pc ?></strong><br/>
	<?php
	  $_GET['SQL_type'] = "devices";
	  $_GET['extend'] = "pc";
	  include "view_management.php";
	?><br/><br/>
	<strong><?= $TRAD_mobiles ?></strong><br/>
	<?php
	  $_GET['SQL_type'] = "devices";
	  $_GET['extend'] = "mobile";
	  include "view_management.php";
	?><br/><br/>
	<strong><?= $TRAD_tablet ?></strong><br/>
	<?php
	  $_GET['SQL_type'] = "devices";
	  $_GET['extend'] = "tablet";
	  include "view_management.php";
	?><br/><br/>
	<strong><?= $TRAD_manually_blocked ?></strong><br/>
	<?php
	  $_GET['SQL_type'] = "devices";
	  $_GET['extend'] = "manual";
	  include "view_management.php";
	?><br/><br/>
	<strong><?= $TRAD_not_recoginez ?></strong><br/>
	<?php
	  $_GET['SQL_type'] = "devices";
	  $_GET['extend'] = "";
	  include "view_management.php";
	?>
      <?php }else{ ?>
	<img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/shield.png" style="float: left; margin-right: 10px; margin-bottom: 10px" /><span style="font-family: 'Roboto'; font-size: 20pt"><?= $TRAD_devices_deactivated ?></span><br/><br/>
	<?= $TRAD_devices_deactivated_descr ?>
      <?php } ?>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>