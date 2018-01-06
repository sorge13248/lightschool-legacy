<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<html>
  <head>
    <title>Rubrica - LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <script type="text/javascript">
      function switch_tab(tab){
	window.currentTab = tab;
	$('.tab_tab').hide();
	$('.tab_'+tab).show();
	if(creating_group === false || (creating_group === true && tab != 'contacts')){
	  $('.tab_'+tab).html('<?= $TRAD_loading ?>');
	  $('.tab_'+tab).load("<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=people_"+tab);
	}
	$('.tabs_tabs').removeClass('selected');
	$('.tabs_'+tab).addClass('selected');
      }
      
      function addPeople(name, surname, saved_username, type){
	closecontext();
	window.newTimetableType = type;
	if(type != ''){
	  $('#add_people_button').html('Modifica contatto');
	  $('#new_people .title .people_title').html('Modifica contatto');
	}else{
	  $('#add_people_button').html('<?= $TRAD_add_contact ?>');
	  $('#new_people .title .people_title').html('<?= $TRAD_save_contact ?>');
	}
	$('#new_people').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
      }
      
      function savePeople(){
	name = $("#name").val();
	surname = $("#surname").val();
	username = $("#username").val();
	
	if(name != '' && surname != '' && username != ''){
	  $.ajax({
	    type: "POST",
	    url: "formpost.php?type=addpeople",
	    data: "name="+name+"&surname="+surname+"&saved_username="+username,
	    success: function(html){
	      if(html=='true'){
		$(".toast").css("background-color", "darkgreen");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_contact_added ?>");
		
		$("#name").val('');
		$("#surname").val('');
		$("#username").val('');
		$("#name").focus();
		
		switch_tab(window.currentTab);
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
      
      var creating_group = false;
      var selected_people = new Array();
      
      function addGroup(){
	if($('.tab_groups').is(':visible')){
	  switch_tab('contacts');
	}
	$('.header .title').html('<input class="group_title" placeholder="<?= $TRAD_group_title ?>" />');
	$('.people_header').html('<span class="add" onclick="finishGroup()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/tick.png" style="width: 18px; float: left; margin-right: 10px"><span class="text_complete"><?= $TRAD_finished ?></span></span><span class="add" onclick="cancel()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/cross.png" style="width: 18px; float: left; margin-right: 10px"><span class="text_complete"><?= $TRAD_cancel ?></span></span>');
	creating_group = true;
	$('.header').css('background-color', '<?= $USER_accent_darker ?>');
	$('.file_selector').show();
      }
      
      $(document).ready(function(e){
	$(function(){
	  $("#people").on("click",".file_selector",function(e){
	    e.stopPropagation();
	    if($(this).is(':checked')){
	      selected_people[selected_people.length] = $(this).attr('value');
	      $('#'+$(this).attr('id')).addClass('selected_file');
	    }else{
	      var index = selected_people.indexOf($(this).attr('value'));
	      selected_people.splice(index, 1);
	      $('#'+$(this).attr('id')).removeClass('selected_file');
	    }
	  });
	  
	  $("#people").on("click",".icon_files",function(){
	    var this_id = $(this).attr('id');
	    var this_complete_name = $(this).attr('title');
	    
	    $('#contact_dialog .title font').html(this_complete_name);
	    $("#contact_frame").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	    $('#contact_dialog').fadeIn(200);
	    $('#dialog_overlay').fadeIn(200);
	    $('#contact_frame').load('<?= $MY_MAIN_DIRECTORY ?>/people_dialog.php?id='+this_id);
	  });
	});
	
	switch_tab('contacts');
      });
      
      function finishGroup(){
	var group_title = $(".group_title").val();
	if(group_title != ''){
	  if(selected_people.length >= 2){
	    $.ajax({
	      type: "POST",
	      url: "formpost.php?type=creategroup",
	      data: "name="+group_title+"&group="+JSON.stringify(selected_people),
	      success: function(html){
		if(html=='true'){
		  $(".toast").css("background-color", "darkgreen");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_group_created ?>");
		  $('.tab_groups').load('view_management.php?SQL_type=people_groups');
		  cancel();
		  switch_tab(window.currentTab);
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
	    $(".toast").slideDown(400);
	  }else{
	    cancel();
	  }
	}else{
	  $(".toast").css("background-color", "red");
	  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_fill_field ?>");
	  $(".group_title").focus();
	  $(".toast").slideDown(400);
	}
      }
      
      function cancel(){
	selected_people = [];
	$('.file_selector').attr('checked', false); // Unchecks it
	$('.icon_files').removeClass('selected_file');
	$('.header .title').html('<?= $TRAD_people ?>');
	$('.people_header').html("<span class='add' onclick='addPeople(0,0,0,0)'><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png' style='width: 18px; float: left'><span class='text_complete'><?= $TRAD_contact ?></span></span><span class='add' onclick='addGroup()'><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png' style='width: 18px; float: left'><span class='text_complete'><?= $TRAD_group ?></span></span>");
	creating_group = false;
	$('.file_selector').hide();
	$('.header').css('background-color', '<?= $USER_accent ?>');
      }
      
      function doSearch(q){
	if(q.length == 0){
	  $('.icon_files').show();
	  $('.nothing_found_people').hide();
	}else{
	  $('.icon_files').hide();
	  q = q.toString().toLowerCase();
	  $('.icon_files[complete_name*="'+q+'"]').show();
	  $('.icon_files[complete_surname*="'+q+'"]').show();
	  $('.icon_files[username*="'+q+'"]').show();
	  if($('.icon_files').is(':visible')) {
	    $('.nothing_found_people').hide();
	  }else{
	    $('.nothing_found_people').show();
	  }
	}
      }
      
      function delete_p(id){
	closeDialog();
	document.getElementById("delete_frame").innerHTML = "<br/><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#delete_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#delete_frame').load('<?= $MY_MAIN_DIRECTORY ?>/delete_p.php?id=' + id + '&dialog=true');
      }
      
      function confirm_delete(id){
	$.ajax({
	  type: "POST",
	  url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=delete_people",
	  data: "id="+id,
	  success: function(html){
	    if(html=='true'){
	      $(".toast").css("background-color", "darkgreen");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_contact_deleted ?>");
	      closeDialog();
	      switch_tab(window.currentTab);
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
	$(".toast").slideDown(400);
      }
    </script>
    <div class="dialog" id="new_people">
      <div class="title"><font class="people_title"><?= $TRAD_add_contact ?></font><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="new_people_frame">
	<input type="text" id="name" name="name" placeholder="<?= $TRAD_name ?>" autocomplete="off" style="width: 217px; margin-right: 20px" /><input type="text" id="surname" name="surname" placeholder="<?= $TRAD_surname ?>" autocomplete="off" style="width: 217px" /><br/>
	<input type="text" id="username" name="username" placeholder="<?= $TRAD_username ?>" autocomplete="off" style="width: calc(100% - 30px)" /><br/>
	<span class="subtitle" style="font-size: 11pt; display: inline-block; width: calc(100% - 0px)"><?= $TRAD_add_contact_descr ?></span><br/><br/>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/social"><?= $TRAD_add_contact_find ?></a><button style="float: right; margin-right: 15px" id="add_people_button" onclick="savePeople()"><?= $TRAD_save_contact ?></button>
      </div>
    </div>
    <div class="dialog" id="contact_dialog">
      <div class="title"><font></font><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="contact_frame"></div>
    </div>
    <div class="dialog" id="delete_dialog" style="min-width: 500px; max-width: 100% !important">
      <div class="title"><?= $TRAD_delete ?><span id="fileName6" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content">
	<div id="delete_frame" style="overflow-y: auto; min-height: 100px; max-height: 500px; height: 50%; min-width: 500px"></div>
      </div>
    </div>
    <?php
      $_GET['only_block_script'] = true;
      $_GET['people'] = true;
      include_once "block_user.php";
    ?>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="content" id="people">
      <div class="tab">
	<div class="tabs">
	  <span onclick="switch_tab('contacts')" class="tabs_tabs tabs_contacts"><?= $TRAD_contacts ?></span>
	  <span onclick="switch_tab('groups')" class="tabs_tabs tabs_groups"><?= $TRAD_groups ?></span>
	</div>
	<div class="tab_content">
	  <div class="tab_tab tab_contacts" style="display: block"></div>
	  <div class="tab_tab tab_groups"></div>
	</div>
      </div>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>