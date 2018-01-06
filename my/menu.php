<?php
include "base.php";
if($actually_page == 'read' or $actually_page == 'share_read'){
    if($GENERAL_fav == 'y'){
      $FAV_icon = 'fav_filled';
    }else{
      $FAV_icon = 'fav';
    }
    ?>
      <?php if($GENERAL_username == $_SESSION['Username'] and $actually_page == 'read'){ ?>
	<!-- <div class="header" style="width: auto; left: 0px; z-index: 9997;  padding-top: 13px; padding-left: 5px; height: 30px">
	  <span style="cursor: pointer" title="Indietro" id="backbutton"><img src="<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/back.png' ?>" style="width: 24px; height: 23px; margin-top: 4px" /></span>
	</div> -->
      <?php } ?>
      <div class="header" style="text-align: center; height: auto">
	<div class="title" id="notebook_title"><?php echo($GENERAL_name); ?></div>
      </div>
      <div class="header" style="width: auto; right: -35px; left: auto; background-color: rgba(<?= $r ?>,<?= $g ?>,<?= $b ?>,0.8); padding-top: 4px">
	<span class="tray">
	  <?php if($GENERAL_username == $_SESSION['Username'] and $_SESSION['Username'] != '' and $GENERAL_history == ''){ ?>
	    <a href="<?= $MY_MAIN_DIRECTORY ?>/writer?id=<?= $_GET['id'] ?>" id="edit_btn" title="<?= $TRAD_edit ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/edit.png" id="edit_img" /></a>
	  <?php } ?>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/print?id=<?= $_GET['id'] ?>" title="<?= $TRAD_print ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/print.png" /></a>
	  <?php if($GENERAL_history == ''){ ?>
	    <span onclick="history('<?= $_GET['id'] ?>', '<?= $GENERAL_name ?>')" title="<?= $TRAD_edit_history ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/history.png" /></span>
	    <?php if($GENERAL_username == $_SESSION['Username'] and $_SESSION['Username'] != ''){ ?>
	      <span onclick="share('<?= $_GET['id'] ?>', '<?= $GENERAL_name ?>')" title="<?= $TRAD_share ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/share.png" /></span>
	      <span onclick="lim('<?= $_GET['id'] ?>', '<?= $GENERAL_name ?>')" title="<?= $TRAD_project_lim ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/lim.png" /></span>
	      <span id="<?= $_GET['id'] ?>" action="fav_button" title="<?php echo($FAV_text); ?> desktop"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/<?= $FAV_icon ?>.png" id="fav_icon" /></span>
	    <?php } ?>
	    <span onclick="info('<?= $_GET['id'] ?>')" style="display: inline-block; padding-right: 5% !important" title="<?= $TRAD_info ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/info.png" /></span>
	  <?php } ?>
	</span>
      </div>
    <?php
  }else{
    if($_SESSION['Username'] != ''){
      if($actually_page == 'home'){
	$PAGE_title = "$TRAD_hello $USER_name";
	$HOME_SELECTED = 'selected';
      }elseif($actually_page == 'desktop'){
	$PAGE_title = "$TRAD_desktop";
	$desktop_SELECTED = 'selected';
      }elseif($actually_page == 'files' or $actually_page == 'files_share'){
	if($_GET['f'] == '/'){
	  $PAGE_title = "$TRAD_files";
	}else{
	  if($FOLDER_fav == 'y'){
	    $FAV_icon = 'fav_filled';
	  }else{
	    $FAV_icon = 'fav';
	  }
	  $PAGE_title = "<span id='".$_GET['f']."' action='fav_button' title='$TRAD_add_remove_desktop' style='display: inline-block; margin-right: 10px'><img src='$IMAGES_MAIN_DIRECTORY/$USER_icon_set1/$FAV_icon.png' id='fav_icon' style='width: 20px; height: 20px' /></span>".$FOLDER_name;
	}
	$FILES_SELECTED = 'selected';
      }elseif($actually_page == 'share'){
	$PAGE_title = "$TRAD_share";
	$SHARE_SELECTED = 'selected';
      }elseif($actually_page == 'register' and $_GET['class'] != '' and $REGISTER_name != ''){
	$PAGE_title = $TRAD_class." ".$REGISTER_name.' - '.$_GET['day'];
	$REGISTER_SELECTED = 'selected';
      }elseif($actually_page == 'register' and $_GET['class'] == ''){
	$PAGE_title = "$TRAD_register";
	$REGISTER_SELECTED = 'selected';
      }elseif($actually_page == 'diary'){
	$PAGE_title = "$TRAD_diary2";
	$DIARY_SELECTED = 'selected';
      }elseif($actually_page == 'timetable'){
	$PAGE_title = "$TRAD_timetable";
	$TIMETABLE_SELECTED = 'selected';
      }elseif($actually_page == 'business'){
	if($_GET['id'] != ''){
	  $PAGE_title = $BUSINESS_activity_name;
	}else{
	  $PAGE_title = 'Contabilit&agrave;';
	}
	$BUSINESS_SELECTED = 'selected';
      }elseif($actually_page == 'messages'){
	$PAGE_title = "$TRAD_messages";
	$MESSAGES_SELECTED = 'selected';
      }elseif($actually_page == 'settings'){
	$PAGE_title = "$TRAD_settings";
	$SETTINGS_SELECTED = 'selected';
      }elseif($actually_page == 'support'){
	$PAGE_title = "$TRAD_support";
      }elseif($actually_page == 'test'){
	$PAGE_title = "$TRAD_test";
	$TEST_SELECTED = 'selected';
      }elseif($actually_page == 'create_test'){
	$PAGE_title = "$TRAD_create_test";
	$TEST_SELECTED = 'selected';
      }elseif($actually_page == 'people'){
	$PAGE_title = "$TRAD_people";
	$PEOPLE_SELECTED = 'selected';
      }elseif($actually_page == 'devices'){
	$PAGE_title = "$TRAD_devices";
	$SETTINGS_SELECTED = 'selected';
      }elseif($actually_page == 'social'){
	$PAGE_title = "$TRAD_social";
	$PEOPLE_SELECTED = 'selected';
      }elseif($actually_page == 'trash'){
	$PAGE_title = "$TRAD_trash";
	$TRASH_SELECTED = 'selected';
      }elseif($actually_page == 'search'){
	$PAGE_title = "$TRAD_search2 ".$_GET['q'];
      }elseif($actually_page == 'schools'){
	$PAGE_title = "$TRAD_school";
      }elseif($actually_page == 'wizard'){
	$PAGE_title = "$TRAD_wizard";
      }else{
	$PAGE_title = $actually_page;
      }
      ?>
      <script type="text/javascript">
	function startTime(){
	  var today=new Date();
	  var h=today.getHours();
	  var m=today.getMinutes();
	  var s=today.getSeconds();
	  m = checkTime(m);
	  s = checkTime(s);
	  document.getElementById('clock').innerHTML = "<p>"+h+":"+m+"<span style='display: none'>:"+s+"</span><br/><span style='font-size: 10pt'>"+today.getDate()+"/"+(today.getMonth()+1)+"/"+today.getFullYear()+"</span></p>";
	  var t = setTimeout(function(){startTime()},500);
	}

	function checkTime(i) {
	  if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
	  return i;
	}
	
	$(document).ready(function(){
	  startTime();
	});
	
	$(function(){
	  
	  $(document).on("contextmenu", ".taskbar a[app_name]",function(e){
	    <?php if($USER_taskbar_position == 'bottom'){ ?>
	      var left = e.pageX-130;
	      var bottom = 50;
	      
	      if(left <= 20){
	      left = 0;
	      }
	      if($(document).width() < 630){
		left = 0;
		bottom = 0;
	      }
	      $("#contextapp").css({left: left, bottom: bottom, top: 'auto', position: 'fixed'});
	    <?php }elseif($USER_taskbar_position == 'left'){ ?>
	      var left = 50;
	      var top = e.pageY-130;
	      
	      if(top <= 20){
	      top = 0;
	      }
	      if($(document).width() < 630){
		top = 0;
		left = 0;
	      }
	      $("#contextapp").css({left: left, top: top, bottom: 'auto', position: 'fixed'});
	    <?php }elseif($USER_taskbar_position == 'right'){ ?>
	      var right = 50;
	      var top = e.pageY-130;
	      
	      if(top <= 20){
	      top = 0;
	      }
	      if($(document).width() < 630){
		top = 0;
		right = 0;
	      }
	      $("#contextapp").css({right: right, top: top, bottom: 'auto', position: 'fixed'});
	    <?php } ?>
	    contextmenuapp($(this).attr('app_name'), 'taskbar');
	    e.preventDefault();
	  });
	  $(".taskbar").bind("contextmenu",function(e){
	    e.preventDefault();
	  });
	  
	  $(".main_menu a[app_name]").bind("contextmenu",function(e){
	    var left = e.pageX;
	    var top = e.pageY;
	    if(e.pageX+300 > $(document).width()){
	      left = $(document).width() - 300;
	    }
	    if($(document).width() < 630){
	      left = '0';
	      top = '0';
	    }
	    // alert('Sinistra: '+left+'   dimensioni: '+$(document).width());
	    $("#contextapp").css({left: left, top: top, position: 'fixed'});
	    contextmenuapp($(this).attr('app_name'), 'main_menu');
	    e.preventDefault();
	  });
	  $(".main_menu").bind("contextmenu",function(e){
	    e.preventDefault();
	  });
	  
	  var file_id_copy = localStorage.getItem("file_id_copy");
	  if(file_id_copy){
	    $('.paste').show();
	  }
	});

	function contextmenuapp(id, type){
	  $('#contextapp').html('<span class="nohover"><?= $TRAD_loading ?></span>');
	  $('#contextapp').load('<?= $MY_MAIN_DIRECTORY ?>/contextmenuapp.php?id='+id+'&type='+type);
	  window.contextmenuapp_type = type;
	  window.contextmenuapp_id_name = id;
	  if(type == 'taskbar'){
	    <?php if($USER_taskbar_position == 'bottom'){ ?>
	      $('#contextapp').show("slide", { direction: "down" }, 200);
	    <?php }elseif($USER_taskbar_position == 'left'){ ?>
	      $('#contextapp').show("slide", { direction: "left" }, 200);
	    <?php }elseif($USER_taskbar_position == 'right'){ ?>
	      $('#contextapp').show("slide", { direction: "right" }, 200);
	    <?php } ?>
	  }else{
	    $('#contextapp').show("slide", { direction: "up" }, 200);
	  }
	  $('#contextapp_overlay').fadeIn(200);
	}
	
	function taskbar_app(id){
	  if(id != ''){
	    $.ajax({
	      type: "POST",
	      url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=taskbar_app",
	      data: "app_id="+id,
	      success: function(html){
		if(html.indexOf("true") >= 0){
		  $('.taskbar').load('<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=taskbar&actually_page=<?= $actually_page ?>');
		  $('#contextapp').load('<?= $MY_MAIN_DIRECTORY ?>/contextmenuapp.php?id='+window.contextmenuapp_id_name+'&type='+window.contextmenuapp_type);
		}else{
		  $(".toast").css("background-color", "red");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
		  $(".toast").slideDown(400);
		}
	      },
	      beforeSend:function(){
		$(".toast").slideUp(400);
	      }
	    });
	  }
	}
	function customize_taskbar(){
	  document.getElementById("customize_taskbar_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	  $('#customize_taskbar_dialog').fadeIn(200);
	  $('#dialog_overlay').fadeIn(200);
	  $('#contextapp_overlay').fadeOut(200);
	  $('#contextapp').hide("slide", { direction: "down" }, 200);
	  $('#customize_taskbar_frame').load('<?= $MY_MAIN_DIRECTORY ?>/customize_taskbar.php?dialog=true', function(){
	    $('#taskbar_position option').filter(function() { 
		return ($(this).text() == '<?= $USER_taskbar_position_translate ?>'); //To select Blue
	    }).prop('selected', true); 
	    $('#taskbar_size option').filter(function() { 
		return ($(this).text() == '<?= $USER_taskbar_size_translate ?>'); //To select Blue
	    }).prop('selected', true); 
	  });
	}
	
	function closecontext(){
	  $('#context').slideUp(200);
	  $('.search_field').slideUp(300);
	  $('#context_overlay').fadeOut(200);
	}
	function closecontextapp(){
	  if(window.contextmenuapp_type == 'taskbar'){
	    <?php if($USER_taskbar_position == 'bottom'){ ?>
	      $('#contextapp').hide("slide", { direction: "down" }, 200);
	    <?php }elseif($USER_taskbar_position == 'left'){ ?>
	      $('#contextapp').hide("slide", { direction: "left" }, 200);
	    <?php }elseif($USER_taskbar_position == 'right'){ ?>
	      $('#contextapp').hide("slide", { direction: "right" }, 200);
	    <?php } ?>
	  }else{
	    $('#contextapp').hide("slide", { direction: "up" }, 200);
	  }
	  $('#contextapp_overlay').fadeOut(200);
	}
	
	function main_menu(){
	  if($('.main_menu:visible').length == 0){ 
	    $('.bubble_main_menu').fadeOut(500);
	    if($(document).width() > 630){
	      $('.main_menu a').delay(100).each(function(i) {
		$(this).delay(i++ * 150).fadeTo(1000, 1);
	      });
	      <?php if($USER_taskbar_position == 'bottom'){ ?>
		$('.main_menu').show("slide", { direction: "down" }, 300);
	      <?php }elseif($USER_taskbar_position == 'left'){ ?>
		$('.main_menu').show("slide", { direction: "left" }, 300);
	      <?php }elseif($USER_taskbar_position == 'right'){ ?>
		$('.main_menu').show("slide", { direction: "right" }, 300);
	      <?php } ?>
	    }else{
	      $('.main_menu a').each(function(i) {
		$(this).fadeTo(00, 1);
	      });
	      $(".menu_icon_header").attr("style", "margin-right: 25px; margin-top: -5px; margin-left: -25px");
	      $('.main_menu').show("slide", { direction: "left" }, 300);
	    }
	    $('.main_menu_button').css("background-color", "<?= $USER_accent_darker2 ?>");
	  }else{
	    if($(document).width() > 630){
	      <?php if($USER_taskbar_position == 'bottom'){ ?>
	      $('.main_menu').hide("slide", { direction: "down" }, 300);
	      <?php }elseif($USER_taskbar_position == 'left'){ ?>
		$('.main_menu').hide("slide", { direction: "left" }, 300);
	      <?php }elseif($USER_taskbar_position == 'right'){ ?>
		$('.main_menu').hide("slide", { direction: "right" }, 300);
	      <?php } ?>
	      $(".main_menu a").fadeTo(1000, 0);
	    }else{
	      $('.main_menu').hide("slide", { direction: "left" }, 300);
	      $(".menu_icon_header").attr("style", "margin-right: 10px; margin-top: -5px; margin-left: -10px");
	      $(".main_menu a").fadeTo(350, 0);
	    }
	    $('.main_menu_button').css("background-color", "");
	  }
	}
      
	function fastnote(){
	  var fastnoteVisibleCss = document.getElementById("fastnote").style.display;
	  if(fastnoteVisibleCss == 'none' || fastnoteVisibleCss == ''){
	    $("#fastnote_title").html("Fastnote");
	    $('#fastnote').fadeIn(300);
	  }else{
	    $('#fastnote').fadeOut(300);
	  }
	}
	$("#fastnotesave").click(function(){
	  fastnote_content = $("#fastnote_content").html();
	  fastnote_content = escape(fastnote_content);
	  
	  //alert(fastnote_content);
	  
	  $.ajax({
	    type: "POST",
	    url: "formpost.php?type=save_fastnote",
	    data: "fastnote_content="+fastnote_content,
	    success: function(html){
	      if(html=='true'){
		$("#fastnote_title").html("Fastnote");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/white/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />Fastnote salvate");
		$(".toast").slideDown(400);
		// $("#fastnote_title").html(html);
	      }else{
		$("#fastnote_title").html("ERRORE");
		// $("#fastnote_title").html(html);
	      }
	    },
	    beforeSend:function(){
		$("#fastnote_title").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' />Salvataggio...");
	    }
	  });
	  return false;
	});
	
	function open_add_menu(){
	  if($('.new_menu:visible').length == 0){
	    if($(document).width() < 630){
	      $("#context").css({left: 0, top: 0});
	      $('#context').html('<p class="close" onclick="closecontext()">[X] Chiudi menu</p>'+$(".new_menu").html());
	      $('#context').slideDown(200);
	      $('#context_overlay').fadeIn(200);
	    }else{
	      $(".new_menu").fadeIn(300);
	      $(".open_menu img").attr("class", "rotate_img_45");
	    }
	  }else{
	    $(".new_menu").fadeOut(300);
	    $(".open_menu img").attr("class", "");
	  }
	}
	    
	function paste(){
	  if(typeof(Storage) !== "undefined"){
	    var file_id_copy = localStorage.getItem("file_id_copy");
	    if(!file_id_copy){
	      $(".toast").css("background-color", "darkgreen");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/white/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_paste_error ?>");
	      $(".toast").slideDown(400);
	    }else{
	      confirm_copy(file_id_copy, '<?= $_GET['f'] ?>');
	    }
	  }else{
	    $(".toast").css("background-color", "red");
	    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><a href='<?= $MY_MAIN_DIRECTORY ?>/browser_update' style='color: white; cursor: pointer; text-decoration: none'><?= $TRAD_localstorage_error ?></a>");
	    $(".toast").slideDown(400);
	  }
	}
	
	function search(){
	  $(".search_field").slideDown(300);
	  $("#context_overlay").fadeIn(300);
	}
	
	function notificationcenter(){
	  $("#notificationcenter_overlay").fadeIn(300);
	  $(".notification_center").show("slide", { direction: "right" }, 300);
	}
      </script>
	
      <?php if($actually_page != 'wizard'){ ?>
	<div class="taskbar <?= $USER_taskbar_size ?>_taskbar">
	  <?php
	    $_GET['SQL_type'] = 'taskbar';
	    include "view_management.php";
	  ?>
	  <div class="taskbar_tray">
	    <span id="clock" class="clock"></span>
	      <a href="javascript:void(0)" onclick="notificationcenter()" class="notification_app app"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/alert.png" /><span><?= $TRAD_notification_center ?></span>
	    <?php if($USER_notification > 0){ ?><div class="counter"><?php echo($USER_notification); ?></div><?php } ?></a>
	  </div>
	</div>
	  <div class="notification_center">
	    <div class="notification_content">
	      <h2><?= $TRAD_notification_center ?> <a href="javascript:void(0)" onclick="closenotificationcenter()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_black.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-left: 5px; float: right' /></a></h2>
	      <hr/>
	    </div>
	    <div class="notification_container">
	      <?php if($USER_notification > 0){ ?>
		<?php if($USER_deactivated != 'n'){ ?>
		  <script>
		    function reactivateuser(){
		      $.ajax({
			type: "POST",
			url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=reactivate",
			success: function(html){
			  if(html == "true"){
			    $('.notification#deactivation').remove();
			  }else{
			    $(".toast").css("background-color", "red");
			    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_reactivate_error ?>");
			    $(".toast").slideDown(400);
			  }
			},
			beforeSend:function(){
			  $(".toast").slideUp(400);
			}
		      });
		    }
		  </script>
		  <div class="notification" id="deactivation">
		    <div class="notification_title"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo.png" /><?= $TRAD_deactivating ?></div>
		    <div class="notification_descr"><?= $TRAD_deactivating_descr ?></div>
		    <div class="notification_actions"><button onclick="reactivateuser()" class="btn_green"><?= $TRAD_reactivate ?></button></div>
		  </div>
		<?php } if($numMESSAGES > 0){ ?>
		  <div class="notification" id="unread_messages">
		    <div class="notification_title"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/messages.png" /><?= $TRAD_unread_messages ?></div>
		    <div class="notification_descr"><?= $TRAD_unread_messages_descr ?></div>
		    <div class="notification_actions"><?php if($actually_page != 'messages'){ ?><button onclick="window.location.href = '<?= $MY_MAIN_DIRECTORY ?>/messages'" class="btn"><?= $TRAD_unread_messages_btn ?></button><?php } ?></div>
		  </div>
		<?php } ?>
	      <?php }else{ ?>
		<div class="notification">
		  <div class="notification_title"><?= $TRAD_no_notification ?></div>
		  <div class="notification_descr">&nbsp;</div>
		</div>
	      <?php } ?>
	    </div>
	  </div>
      <?php } ?>
      <div class="header">
	<span class="title" style="float: left; font-family: 'Roboto'"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/menu.png" class="menu_icon_header text_min" style="margin-right: 10px; margin-top: -5px; margin-left: -10px" onclick="main_menu()" /><?php echo($PAGE_title); ?></span>
	<?php if($actually_page == 'diary'){
	  if(strlen($month) == 1){
	    $string .= $month + 1;
	    $string = "0".$string;
	  }else{
	    $string = $month + 1;
	  }
	  
	  if($month == 12){
	    $nextyear = $year + 1;
	    $string = '01';
	  }else{
	    $nextyear = $year;
	  }
	  
	  if(strlen($month) == 1){
	    $string2 .= $month - 1;
	    $string2 = "0".$string;
	  }else{
	    $string2 = $month - 1;
	  }
	  
	  if($month == 01){
	    $prevyear = $year - 1;
	    $string2 = '12';
	  }else{
	    $prevyear = $year;
	  }
	  ?>
	  <span class="add" onclick="newDiary('')"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png" style="width: 18px"><span class="text_complete"><?= $TRAD_new ?></span></span>
	  <a href="diary?month=<?= $string2 ?>&year=<?= $prevyear ?>" class="add"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/back.png" style="width: 18px; height: 15px; padding-top: 3px"><span class="text_complete"><?= $TRAD_prev_month ?></span></a>
	  <a href="diary?month=<?= $string ?>&year=<?= $nextyear ?>" class="add"><span class="text_complete"><?= $TRAD_next_month ?></span><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/forward.png" style="width: 18px; height: 13px; padding-top: 5px"></a>
	<?php }elseif($actually_page == 'home'){ ?>
	  <span class="add" onclick="edit()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/edit.png" style="width: 18px; float: left; margin-right: 10px"><span class="text_complete">Personalizza contenuti</span></span>
	<?php
	}elseif($actually_page == 'timetable'){ ?>
	  <span class="add" onclick="newTimetable('', '', '', '', '', '')"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png" style="width: 18px; float: left"><span class="text_complete"><?= $TRAD_new ?></span></span>
	<?php }elseif($actually_page == 'trash'){ ?>
	  <span class="add" onclick="emptyTrash()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/f_trash.png" style="width: 18px; float: left; margin-right: 10px"><span class="text_complete"><?= $TRAD_empty_trash ?></span></span>
	<?php }elseif($actually_page == 'people'){ ?>
	  <div class="people_header">
	    <span class="add" onclick="addPeople('', '', '', '')"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png" style="width: 18px; float: left"><span class="text_complete"><?= $TRAD_contact ?></span></span>
	    <span class="add" onclick="addGroup()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png" style="width: 18px; float: left"><span class="text_complete"><?= $TRAD_group ?></span></span>
	  </div>
	<?php }elseif($actually_page == 'test'){ ?>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/create/test" class="add"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png" style="width: 18px; float: left"><span class="text_complete"><?= $TRAD_new ?></span></a>
	<?php }elseif($actually_page == 'devices'){
	  if($USER_access_control == 'y'){ ?>
	    <span class="add" onclick="addIp()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png" style="width: 18px; float: left"><span class="text_complete"><?= $TRAD_add_ip ?></span></span>
	  <?php }else{ ?>
	    <span class="add"><div style="background-color: red; width: 16px; height: 16px; float: left; margin-right: 10px; margin-bottom: 10px; border-radius: 50%"></div><span class="text_complete"><?= $TRAD_out_of_service ?></span></span>
	  <?php } ?>
	<?php }elseif($actually_page == 'messages'){
	  if($_GET['folder'] == ''){
	    $_GET['folder'] = 'inbox';
	  } ?>
	  <span class="add" onclick="newMessage('', 'new')"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png" style="width: 18px; float: left"><span class="text_complete"><?= $TRAD_new ?></span></span>
	  <span class="add" onclick="block()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/alert.png" style="width: 18px; float: left; margin-right: 5px"><span class="text_complete"><?= $TRAD_blockuser2 ?></span></span>
	  <span class="add junk_button" onclick="junk()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/messages.png" style="width: 18px; float: left; margin-right: 5px"><span class="text_complete"><?= $TRAD_go_to_spam_folder ?></span></span>
	<?php }elseif($actually_page == 'register' and $_GET['class'] == ''){
	  if($USER_type == 'docente' and $_GET['previous'] == 'y'){ ?>
	    <a class="add" href="<?= $MY_MAIN_DIRECTORY ?>/register?allclass=y&previous=y"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/lim.png" style="width: 18px; float: left; margin-right: 5px" class="button_img"><span class="text_complete button_text"><?= $TRAD_all_class ?></span></a>
	  <?php } if($_GET['previous'] == ''){ ?>
	    <?php if($USER_type == 'docente'){ ?>
	      <a class="add" href="<?= $MY_MAIN_DIRECTORY ?>/register?allclass=y"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/lim.png" style="width: 18px; float: left; margin-right: 5px" class="button_img"><span class="text_complete button_text"><?= $TRAD_all_class ?></span></a>
	    <?php } ?>
	    <a class="add" href="<?= $MY_MAIN_DIRECTORY ?>/register?previous=y"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/back.png" style="width: 18px; float: left; margin-right: 5px" class="button_img"><span class="text_complete button_text"><?= $TRAD_prev_year ?></span></a>
	  <?php } }elseif($actually_page == 'register' and $_GET['class'] != ''){ ?>
	    <input type="text" id="date" name="date" placeholder="Data" value="<?= $_GET['day'] ?>" autocomplete="off" readonly="readonly" style="width: 0px !important; background-color: <?= $USER_accent ?>; border: 1px solid <?= $USER_accent ?>; cursor: default; height: 33px" /><span class="add" onclick="change_date()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/diary.png" style="width: 18px; float: left; margin-right: 5px"><span class="text_complete"><?= $TRAD_change_date ?></span></span>
	  <?php }elseif($actually_page == 'settings'){ ?>
	  <button style="float: right; height: 50px; background-color: <?= $USER_accent_darker ?>; cursor: pointer" id="settings_save" onclick="saveSettings()"><?= $TRAD_apply2 ?></button>
	  <span style="float: right; display: none; padding-top: 15px; padding-right: 15px" id="notice" title="<?= $TRAD_settings_apply_descr ?>" onclick="alert('<?= $TRAD_settings_apply_descr2 ?>');"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/info.png" style="width: 16px; height: 16px; margin-right: 10px; float: left !important" /><?= $TRAD_info2 ?></span>
	<?php }elseif($actually_page == 'business'){
	  if($_GET['id'] != ''){ ?>
	    <div class="dropdown_menu">
	      <div class="menu" id="azienda" onclick="showMenu('azienda')">Azienda</div>
	      <div class="menu" id="fornitori" onclick="showMenu('fornitori')">Fornitori</div>
	      <div class="menu" id="clienti" onclick="showMenu('clienti')">Clienti</div>
	      <div class="menu" id="pa" onclick="showMenu('pa')">Pubblica amministrazione</div>
	      <div class="menu" id="bilancio" onclick="showMenu('bilancio')">Bilancio</div>
	      <div class="menu" id="imp" onclick="showMenu('imp')">Impostazioni e informazioni</div>
	    </div>
	  <?php }else{ ?>
	    <span class="add" onclick="startActivity()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png" style="width: 18px; float: left; margin-right: 5px"><span class="text_complete">Avvia attivit&agrave;</span></span>
	  <?php } ?>
	<?php }elseif(($actually_page == 'files' and $_GET['s'] == '') or ($actually_page == 'files_share' and $_GET['s'] != '')){
	  if($actually_page == 'files'){
	    if($_GET['f'] != ''){
	      $extend_url = '?f='.$_GET['f'];
	    }
	    ?>
	    <span class="add open_menu" onclick="open_add_menu()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png" style="width: 18px; float: left; margin-right: 5px"><span class="text_complete"><?php echo($TRAD_new); ?></span></span>
	    <span class="new_menu"><span style="background-color: <?= $USER_accent_darker ?>; padding: 0px"><span onclick="new_folder()"><?= $TRAD_folder ?></span><span onclick="window.location.href = '<?= $MY_MAIN_DIRECTORY ?>/writer<?= $extend_url ?>'"><?= $TRAD_notebook ?></span><!--<span onclick="window.location.href = '<?= $MY_MAIN_DIRECTORY ?>/app/word'">Documento Word</span>--><span onclick="upload_file()"><?= $TRAD_upload ?></span></span></span>
	    <span class="add paste" style="display: none" onclick="paste()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/paste.png" style="width: 18px; float: left; margin-right: 5px"><?= $TRAD_paste ?></span>
	  <?php } ?>
	  <!-- <span class="add"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/sort.png" style="width: 18px; float: left; margin-right: 5px">Ordina</span>
	  <span class="add"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/view.png" style="width: 18px; float: left; margin-right: 5px">Visualizza</span> -->
	<?php } ?>
	<?php if($actually_page != 'wizard'){ ?>
	  <span class="text_complete tray">
	    <form method="get" action="<?= $MY_MAIN_DIRECTORY ?>/search">
	      <?php if($actually_page != 'settings'){ ?>
		<!-- <span onclick="fastnote()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/fastnote.png" style="width: 18px"></span> -->
	      <?php } ?>
	      <span onclick="search()" class="text_min"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/search.png" style="width: 18px"></span>
	      <?php if($actually_page != 'settings'){ ?>
		<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>" class="help_tour"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/help.png" style="width: 18px"></a>
		<a href="<?= $MY_MAIN_DIRECTORY ?>/logout?forget=y"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/logout.png" style="width: 18px"></a>
	      <?php } ?>
	      <input type="search" id="q" name="q" placeholder="<?= $TRAD_search ?>" value="<?= $_GET['q'] ?>" class="text_complete" oninput="doSearch(this.value)" />
	    </form>
	  </span>
	<?php } ?>
      </div>
      
      <form method="get" action="search" class="search_field">
	<input type="search" id="q" name="q" placeholder="<?= $TRAD_search ?>" value="<?= $_GET['q'] ?>" oninput="doSearch(this.value)" style="width: calc(100% - 40px) !important; margin-left: 20px; margin-top: 7px" />
      </form>
      
      <?php if($actually_page != 'wizard'){ ?>
	<div class="main_menu">
	  <form method="get" action="<?= $MY_MAIN_DIRECTORY ?>/search" class="text_min" style="float: left">
	    <input type="search" id="q" name="q" placeholder="<?= $TRAD_search ?>" value="<?= $_GET['q'] ?>" oninput="doSearch(this.value)" />
	  </form><br/><br/>
	  <!-- <a href="<?= $MY_MAIN_DIRECTORY ?>/home" app_name="home" class="app <?= $HOME_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/home.png" /></div><br/><?= $TRAD_app_home ?></a> -->
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/desktop" app_name="desktop" class="app <?= $desktop_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/desktop.png" /></div><br/><?= $TRAD_app_desktop ?></a>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/files" app_name="files" class="app <?= $FILES_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/files.png" /></div><br/><?= $TRAD_app_files ?></a>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/share" app_name="share" class="app <?= $SHARE_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/share.png" /></div><br/><?= $TRAD_app_share ?></a>
	  <?php if($CURRENT_VERSION >= 5.5){ ?>
	    <a href="<?= $MY_MAIN_DIRECTORY ?>/test" app_name="test" class="app <?= $TEST_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/test.png" /></div><br/><?= $TRAD_app_test ?></a>
	    <a href="<?= $MY_MAIN_DIRECTORY ?>/register" app_name="register" class="app <?= $REGISTER_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/register.png" /></div><br/><?= $TRAD_app_register ?></a>
	  <?php } ?>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/diary" app_name="diary" class="app <?= $DIARY_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/diary.png" /></div><br/><?= $TRAD_app_diary ?></a>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/timetable" app_name="timetable" class="app <?= $TIMETABLE_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/timetable.png" /></div><br/><?= $TRAD_app_timetable ?></a>
	  <!-- <a href="<?= $MY_MAIN_DIRECTORY ?>/business" app_name="business" class="app <?= $BUSINESS_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/business.png" /></div><br/>Contabilit&agrave;</a> -->
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/messages" app_name="messages" class="app <?= $MESSAGES_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/messages.png" /></div><br/><?= $TRAD_app_messages ?></a>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/people" app_name="people" class="app <?= $PEOPLE_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/people.png" /></div><br/><?= $TRAD_app_people ?></a>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/trash" app_name="trash" class="app <?= $TRASH_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/<?= $trash_icon ?>_trash.png" /></div><br/><?= $TRAD_app_trash ?></a>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/settings" app_name="settings" class="app <?= $SETTINGS_SELECTED ?>"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/settings.png" /></div><br/><?= $TRAD_settings ?></a>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>" class="text_min"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/help.png" /></div><br/><?= $TRAD_support ?></a>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/logout?forget=y" class="text_min"><div class="border"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/logout.png" /></div><br/><?= $TRAD_logout ?></a>
	</div>
      <?php } ?>
      
      <!-- <script type="text/javascript">
	$(document).ready(function(){
	  $('#fastnote').draggable({
	    stop: function() {
	      $.cookie("top_fastnote", $("#fastnote").css('top'), { expires: 365, path: '/' });
	      $.cookie("left_fastnote", $("#fastnote").css('left'), { expires: 365, path: '/' });
	    }
	  });
	  $('#fastnote').css({"top":$.cookie("top_fastnote"), "left": $.cookie("left_fastnote")});
	});
      </script> -->
      
      <script type="text/javascript">
	$(document).ready(function(){
	  $('#q').on('focus',function(){
	    $(".search_panel").slideDown(300);
	  });
	  $('#q').on('focusout',function(){
	    if($('.search_panel:visible').length > 0){
	      $(".search_panel").slideUp(300);
	    }
	  });
	});
	
	function changeTaskbar(){
	  var taskbar_size = $("#taskbar_size").val();
	  var taskbar_position = $("#taskbar_position").val();

	  $.ajax({
	    type: "POST",
	    url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=change_taskbar",
	    data: "taskbar_size="+taskbar_size+"&taskbar_position="+taskbar_position,
	    success: function(html){
	      if(html == "true"){
		$(".toast").css("background-color", "darkgreen");
		if(taskbar_position != '<?= $USER_taskbar_position ?>'){
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_taskbar_changed ?>");
		}else{
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_edit_applied ?>");
		}
		$(".taskbar").attr("class", "taskbar " + taskbar_size + "_taskbar");
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
      
      <div id="fastnote">
	<span style="font-family: 'Roboto'; display: inline-block; margin-top: 5px; margin-left: 10px" id="fastnote_title">Fastnote</span><input type="submit" id="fastnotesave" value="" /><br/>
	<div contenteditable="true" id="fastnote_content"><?php echo($USER_fastnote); ?></div>
	</div>
      </div>
      
      <div class="dialog" id="customize_taskbar_dialog">
	<div class="title"><?= $TRAD_taskbar_settings ?><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
	<div class="content">
	  <div id="customize_taskbar_frame" style="overflow-y: auto; min-height: 200px; max-height: 500px; height: 50%; min-width: 400px"></div>
	</div>
      </div>
    
      <!-- <?php if($USER_bubble_main_menu == 'y'){
	$_GET['bubble'] = 'remove_main_menu';
	include "formpost.php";
	?>
	<div class="bubble bubble_main_menu" onclick="$('.bubble_main_menu').fadeOut(300)">
	  <span style="font-size: 16pt; font-family: 'Roboto'">Ecco il nuovo menu principale!</span><br/>
	  Clicca sulla tua foto profilo per aprirlo quando ne hai bisogno. Qui puoi vedere tutte le app di LightSchool e aggiungere quelle preferite alla taskbar.
	</div>
      <?php } ?> -->
<?php } } ?>