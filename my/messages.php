<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<html>
  <head>
    <?php include_once "style_$USER_skin.php"; ?>
    <?php include_once "file_management.php"; ?>
    <?php include "menu.php"; ?>
    <title><?= $PAGE_title ?> - LightSchool</title>
    <script type="text/javascript">
      function read_message(username){
	if(username == 'new_message'){
	  $('.messages_content').load('new_message.php');
	}else{
	  $('.messages_content').load('view_management.php?SQL_type=messages_content&username='+username+'', function() {
	    $(".messages_content").scrollTop($(".messages_content")[0].scrollHeight);
	  });
	  $('.selected2').removeClass("selected2");
	  $(".messages_list_element[username_message='"+username+"']").addClass("selected2");
	}
      }
      
      function newMessage(id, type){
	$('#message_NEW').show();
	$("#message_NEW").addClass("selected2");
	$('.messages_content').load('new_message.php?to=<?= $_GET['to'] ?>&share=<?= $_GET['share'] ?>');
      }
      
      $(document).ready(function(){
	<?php if($_GET['to'] != '' or $_GET['share'] != ''){ ?>
	  newMessage("", "new");
	<?php } ?>
      });
      
      function sendmessage(username, content){
	$(".toast").slideDown(400);
	
	if(username == '' || content == ''){
	  $(".toast").css("background-color", "red");
	  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_empty_message ?>");
	}else{
	  $.ajax({
	    type: "POST",
	    url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=send_message",
	    data: "username="+username+"&content="+content,
	    success: function(html){
	      if(html=='true'){
		$(".toast").css("background-color", "darkgreen");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_message_sent ?>");
		$('.update_messages_list').load('<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=messages_list&select='+username);
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
	}
      }
      function share_input_fun(name){
	if(name.length == 0){
	  $('#share_input_autosuggestion').slideUp(200);
	  $(".to").html("<i><?= $TRAD_no_to ?></i>");
	}else{
	  $("#share_err").css('display', 'none', 'important');
	  $("#share_err").html("");
	  name = name.toString().toLowerCase();
	  $('.autosuggestion > p').hide();
	  $('[username*="'+name+'"]').show();
	  $('[name*="'+name+'"]').show();
	  $('[surname*="'+name+'"]').show();
	  $('[complete_name*="'+name+'"]').show();
	  $('[complete_name_inv*="'+name+'"]').show();
	  $('#share_input_autosuggestion').slideDown(200);
	  $(".to").html(name);
	}
      }
      
      function share_people(name){
	$('#share_input').val(name);
	$('#share_input_autosuggestion').slideUp(200);
	$(".to").html(name);
      }
      
      function doSearch(q){
	if(q.length == 0){
	  $('.messages_list_element').show();
	  $('.nothing_found_people').hide();
	}else{
	  $('.messages_list_element').hide();
	  q = q.toString().toLowerCase();
	  $('.messages_list_element[complete_name*="'+q+'"]').show();
	  if($('.messages_list_element').is(':visible')) {
	    $('.nothing_found_people').hide();
	  }else{
	    $('.nothing_found_people').show();
	  }
	}
      }
      
      function block(){
	document.getElementById("block_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#block_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#block_frame').load('<?= $MY_MAIN_DIRECTORY ?>/block_user.php?dialog=true');
      }
      
      function junk(){
	$('.messages_content').html('<?= $TRAD_click_show_message ?>');
	if(typeof window.junk2 === "undefined"){
	  window.junk2 = "n";
	}
	if(window.junk2 == "y"){
	  $(".update_messages_list").load("<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=messages_list");
	  window.junk2 = "n";
	  $('.header .title').html("<?= $TRAD_app_messages ?>");
	  $('.junk_button .text_complete').html("<?= $TRAD_go_to_spam_folder ?>");
	}else{
	  $(".update_messages_list").load("<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=messages_list&junk=y");
	  window.junk2 = "y";
	  $('.header .title').html("<?= $TRAD_spam_folder ?>");
	  $('.junk_button .text_complete').html("<?= $TRAD_go_back_messages ?>");
	}
      }
      
      $(".messages_content").on("click",".link",function(e){
	// var username = $(this).attr("shared_contact");
	alert();
      });
    </script>
    <div class="dialog" id="block_dialog">
      <div class="title"><?= $TRAD_blockuser2 ?><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="block_frame"></div>
    </div>
  </head>
  <body>
    <div class="content" id="messages">
      <div class="messages_list scrollable">
	<div class="messages_list_element" onclick="read_message('new_message'); $('.selected2').removeClass('selected2'); $('#message_NEW').addClass('selected2');" id="message_NEW" style="display: none">
	  <div class="messages_sender"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/plus.png" style="float: left; margin-right: 10px; border-radius: 50%; width: 28px; height: 28px; border: 1px solid black; padding: 10px" onerror="imgError(this);" /><?= $TRAD_to ?>&nbsp;<span class="to" style="font-size: 12pt">
	  <?php if($_GET['to'] != ''){
	    echo($_GET['to']);
	  }else{ ?>
	  <i>
	  <?= $TRAD_no_to ?>
	  </i>
	  <?php } ?>
	  </span></div>
	</div>
	<div class="update_messages_list">
	  <?php
	    $_GET['SQL_type'] = "messages_list";
	    include "view_management.php";
	  ?>
	</div>
      </div>
      <div class="messages_content scrollable">
	<?= $TRAD_click_show_message ?>
      </div>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>