<?php include_once "base.php";
if($_SESSION['Username'] != ''){

if($USER_icon_set == 'monochromatic'){
  $MONO_selected = "icon-tick-16";
}elseif($USER_icon_set == 'color'){
  $COLOR_selected = "icon-tick-16";
}
?>
<html>
  <head>
    <title><?= $TRAD_settings ?> - LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <script type="text/javascript">
      $(document).ready(function(){
	if($(document).width() < 630){
	  $(".tab_content").hide();
	}
	$(window).on("resize", function(){
	  if($(window).width() > 630){
	    if($('.sidebar:visible').length == 0){
	      $(".sidebar").fadeIn(300);
	      $("#general_tab").fadeIn(300);
	      $(".tab_content").fadeOut(300);
	    }
	  }
	});
	
	
	$('#general').on('click',function(){
	  $('.sidebar span').css("background-color", "");
	  if($('#general_tab:visible').length == 0){
	    $(".tab_content").fadeOut(300).delay(305);
	    $(this).css("background-color", "<?= $USER_accent_darker ?>");
	    if($(document).width() < 630){
	      $(".sidebar").fadeOut(300);
	    }
	    $("#general_tab").fadeIn(300);
	  }
	});
	
	$('#customize').on('click',function(){
	  $('.sidebar span').css("background-color", "");
	  if($('#customize_tab:visible').length == 0){
	    $(".tab_content").fadeOut(300).delay(301);
	    $(this).css("background-color", "<?= $USER_accent_darker ?>");
	    if($(document).width() < 630){
	      $(".sidebar").fadeOut(300);
	    }
	    $("#customize_tab").fadeIn(300);
	  }
	});
	
	$('#security').on('click',function(){
	  $('.sidebar span').css("background-color", "");
	  if($('#security_tab:visible').length == 0){
	    $(".tab_content").fadeOut(300).delay(301);
	    $(this).css("background-color", "<?= $USER_accent_darker ?>");
	    if($(document).width() < 630){
	      $(".sidebar").fadeOut(300);
	    }
	    $("#security_tab").fadeIn(300);
	  }
	});
	
	$('#notification').on('click',function(){
	  $('.sidebar span').css("background-color", "");
	  if($('#notification_tab:visible').length == 0){
	    $(".tab_content").fadeOut(300).delay(301);
	    $(this).css("background-color", "<?= $USER_accent_darker ?>");
	    if($(document).width() < 630){
	      $(".sidebar").fadeOut(300);
	    }
	    $("#notification_tab").fadeIn(300);
	  }
	});
	
	$('#change_pwd').on('click',function(){
	  $('.sidebar span').css("background-color", "");
	  if($('#password_tab:visible').length == 0){
	    $(".tab_content").fadeOut(300).delay(301);
	    $(this).css("background-color", "<?= $USER_accent_darker ?>");
	    if($(document).width() < 630){
	      $(".sidebar").fadeOut(300);
	    }
	    $("#password_tab").fadeIn(300);
	  }
	});
	
	$('#deactivate').on('click',function(){
	  $('.sidebar span').css("background-color", "");
	  if($('#deactivate_tab:visible').length == 0){
	    $(".tab_content").fadeOut(300).delay(301);
	    $(this).css("background-color", "<?= $USER_accent_darker ?>");
	    if($(document).width() < 630){
	      $(".sidebar").fadeOut(300);
	    }
	    $("#deactivate_tab").fadeIn(300);
	  }
	});
	
	$('#info').on('click',function(){
	  $('.sidebar span').css("background-color", "");
	  if($('#info_tab:visible').length == 0){
	    $(".tab_content").fadeOut(300).delay(301);
	    $(this).css("background-color", "<?= $USER_accent_darker ?>");
	    if($(document).width() < 630){
	      $(".sidebar").fadeOut(300);
	    }
	    $("#info_tab").fadeIn(300);
	  }
	});
	
	$('#softwareVer').on('click',function(){
	  $('#dialog_overlay').fadeIn(200);
	  $('#software_dialog').fadeIn(200);
	});
	
	$(document).on('change','#subject_select',function(){
	  if($("#subject_select option:selected" ).text() == 'Altro'){
	    $('#subject_text').show();
	  }else{
	    $('#subject_text').hide();
	  }
	});
	
	$(document).on('input change','input',function(){
	  $("#notice").show("highlight");
	});
	
	$('.horizontal_slider_selector > div').on('click',function () {
	  var selected_new_set = $(this).attr("set");
	  $('.icon-16-3-position').removeClass("icon-tick-16");
	  $('div[set='+selected_new_set+'] span').addClass("icon-tick-16");
	  $("#icon_set").val(selected_new_set);
	  $('.app img, .header img').each(function(){
	    if(selected_new_set == 'monochromatic'){
	      var newurl = $(this).attr('src').replace('color','monochromatic/<?= $COL1 ?>');
	    }else if(selected_new_set == 'color'){
	      var newurl = $(this).attr('src').replace('monochromatic/<?= $COL1 ?>','color');
	    }
	    $(this).attr('src', newurl);
	  });
	});
      });
      
      function doSearch(q){
	if(q.length == 0){
	  $('.setting_container').show();
	  $('.nothing_found_files').hide();
	}else{
	  $('.setting_container').hide();
	  q = q.toString().toLowerCase();
	  $('.setting_container[setting*="'+q+'"]').show();  
	  if($('.setting_container').is(':visible')) {
	    $('.nothing_found').hide();
	  }else{
	    $('.nothing_found').show();
	  }
	}
      }
      
      function backToSidebar(){
	$('.sidebar').delay(200).fadeIn(200);
	$('.tab_content').fadeOut(200);
      }
      
      function changeTransparent(value){
	$('.transparent').css('background-color', 'rgba(255,255,255, '+value+')');
	$('.tab').attr('style', 'background-color: rgba(255,255,255, '+value+') !important');
      }
      
      function changeWallpaper(){
	document.getElementById("wallpaper_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#wallpaper_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#context_overlay').fadeOut(200);
	$('#wallpaper_frame').load('<?= $MY_MAIN_DIRECTORY ?>/wallpaper.php?f=/&dialog=true');
      }
      
      function selectWallpaper(url){
	$('#wallpaper_url').val(url);
	$('html').attr('style', "background-image: url('<?= $UPLOAD_MAIN_DIRECTORY ?>/"+url+"'); background-attachment: fixed; background-size: contain");
	closeDialog();
      }
      
      function saveSettings(){
	var emailaddress = $('#emailaddress').val();
	var phonenumber = $('#phonenumber').val();
	var school = $('#school').val();
	var subject = $('#subject').val();
	var language = $('#language').val();
	var regione = $('#regione').val();
	var provincia = $('#provincia').val();
	
	var accentcolor = $('#accentcolor').val();
	var wallpaper_url = $('#wallpaper_url').val();
	var transparent = $('#transparent').val();
	var icon_set = $("#icon_set").val();
	var lim = $('#lim').val();
	var click_type = $('#click_type').val();
	var timer = $('#timer').val();
	
	var accesscontrol = $('#accesscontrol').val();
	var pc = $('#pc').val();
	var tablet = $('#tablet').val();
	var mobile = $('#mobile').val();
	var android = $('#android').val();
	var windows = $('#windows').val();
	var wp = $('#wp').val();
	var visibility = $('#visibility').val();
	var show_email = $('#show_email').val();
	var show_school = $('#show_school').val();
	
	$.ajax({
	  type: "POST",
	  url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=settings",
	  data: "emailaddress="+emailaddress+"&phonenumber="+phonenumber+"&school="+school+"&subject="+subject+"&language="+language+"&regione="+regione+"&provincia="+provincia+"&accentcolor="+accentcolor+"&wallpaper_url="+wallpaper_url+"&transparent="+transparent+"&lim="+lim+"&click_type="+click_type+"&timer="+timer+"&accesscontrol="+accesscontrol+"&pc="+pc+"&tablet="+tablet+"&mobile="+mobile+"&android="+android+"&windows="+windows+"&wp="+wp+"&visibility="+visibility+"&icon_set="+icon_set+"&show_email="+show_email+"&show_school="+show_school,
	  success: function(html){
	    if(html=='true'){
	      $(".toast").css("background-color", "darkgreen");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_settings_updated ?>");
	    }else{
	      $(".toast").css('background-color', 'red');
	      $(".toast").html(html);
	    }
	  },
	  beforeSend:function(){
	    $(".toast").css('background-color', 'orange');
	    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	  }
	});
	$(".toast").slideDown(400);
      }
      
      function change_pwd_btn(){
	var new_pwd = $('#new').val();
	var newnew_pwd = $('#newnew').val();
	var old_pwd = $('#old').val();
	
	if(newnew_pwd == new_pwd){
	  $.ajax({
	    type: "POST",
	    url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=change_pwd",
	    data: "new_pwd="+new_pwd+"&old_pwd="+old_pwd,
	    success: function(html){
	      if(html=='true'){
		$(".toast").css("background-color", "darkgreen");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_pwd_updated ?>");
	      }else{
		$(".toast").css('background-color', 'red');
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	      }
	    },
	    beforeSend:function(){
	      $(".toast").css('background-color', 'orange');
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	    }
	  });
	}else{
	  $(".toast").css('background-color', 'red');
	  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_pwd_error ?>");
	}
	$(".toast").slideDown(400);
      }
      
      function deactivate_btn(){
	var deactivate_pwd = $('#password').val();
	
	if(deactivate_pwd != ''){
	  $.ajax({
	    type: "POST",
	    url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=deactivate",
	    data: "deactivate_pwd="+deactivate_pwd,
	    success: function(html){
	      if(html=='true'){
		$(".toast").slideUp(400);
		$('#deactivated_dialog').fadeIn(200);
		$('#dialog_overlay').fadeIn(200);
		$('#background_agent').load("<?= $MY_MAIN_DIRECTORY ?>/logout?forget=y");
	      }else{
		$(".toast").css('background-color', 'red');
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	      }
	    },
	    beforeSend:function(){
	      $(".toast").css('background-color', 'orange');
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	    }
	  });
	}else{
	  $(".toast").css('background-color', 'red');
	  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_pwd_error2 ?>");
	}
	$(".toast").slideDown(400);
      }
      
      function restoreAlerts(){
	$.ajax({
	  type: "POST",
	  url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=restore_alerts",
	  success: function(html){
	    if(html=='true'){
	      $(".toast").css("background-color", "darkgreen");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_settings_alert_restore ?>");
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
    <style>
      .tab{
	width: calc(100% - 200px);
	background-color: rgba(255,255,255, <?= $USER_transparent ?>) !important;
      }
    </style>
    <div class="dialog" id="wallpaper_dialog">
      <div class="title">Cambia sfondo<span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="wallpaper_frame"></div>
    </div>
    <div class="dialog" id="software_dialog" style="max-width: 550px">
      <div class="title"><?= $TRAD_settings_software ?><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="software_frame" style="height: 300px">
	<table style="width: calc(100% - 20px)" cellspacing="20" class="table_software_ver">
	  <tr style="font-weight: bold">
	    <td></td>
	    <td><?= $TRAD_name ?></td>
	    <td><?= $TRAD_version ?></td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo.png" /></td>
	    <td>LightSchool</td>
	    <td>5.5</td>
	  </tr>
	  <tr>
	    <td></td>
	    <td colspan="2"><?= $TRAD_code_name ?> <b>Alfa</b></td>
	  </tr>
	  <tr>
	    <td></td>
	    <td></td>
	    <td></td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/register.png" /></td>
	    <td><?= $TRAD_register ?></td>
	    <td>1.0 Alpha</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $USER_image2 ?>" style="border-radius: 50%; border: 1px solid black" /></td>
	    <td><?= $TRAD_main_menu ?></td>
	    <td>1.5</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/alert.png" /></td>
	    <td><?= $TRAD_notification_center ?></td>
	    <td>1.0</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/search.png" /></td>
	    <td><?= $TRAD_immediate_search ?></td>
	    <td>1.0</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/test.png" /></td>
	    <td><?= $TRAD_test2 ?></td>
	    <td>2.0 Alpha</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/transparent.png" style="background-color: <?= $USER_accent ?>" /></td>
	    <td><?= $TRAD_taskbar ?></td>
	    <td>2.0</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/desktop.png" /></td>
	    <td><?= $TRAD_desktop2 ?></td>
	    <td>3.0</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/shield.png" /></td>
	    <td><?= $TRAD_devices ?></td>
	    <td>3.0</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/messages.png" /></td>
	    <td><?= $TRAD_messages ?></td>
	    <td>3.5</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/people.png" /></td>
	    <td><?= $TRAD_people ?></td>
	    <td>3.5</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/diary.png" /></td>
	    <td><?= $TRAD_diary ?></td>
	    <td>4.3</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/timetable.png" /></td>
	    <td><?= $TRAD_timetable2 ?></td>
	    <td>4.0</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/settings.png" /></td>
	    <td><?= $TRAD_settings ?></td>
	    <td>4.5</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/share.png" /></td>
	    <td><?= $TRAD_share2 ?></td>
	    <td>4.0</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/search.png" /></td>
	    <td><?= $TRAD_search3 ?></td>
	    <td>4.0</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/e_trash.png" /></td>
	    <td><?= $TRAD_trash ?></td>
	    <td>5.0</td>
	  </tr>
	  <tr>
	    <td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/files.png" /></td>
	    <td><?= $TRAD_files2 ?></td>
	    <td>5.2</td>
	  </tr>
	</table>
      </div>
    </div>
    <div class="dialog" id="deactivated_dialog">
      <div class="title"><?= $TRAD_deactivated_account ?></div>
      <div class="content" id="deactivated_frame" style="color: black">
	<?= $TRAD_deactivated_account_descr ?>
      </div>
    </div>
    <?php
      if($USER_language == 'it-IT'){
	$USER_language_translate = 'Italiano - Italia';
      }elseif($USER_language == 'en-EN'){
	$USER_language_translate = 'English - International';
      }elseif($USER_language == 'fr-FR'){
	$USER_language_translate = 'France - Fran&ccedil;ais';
      }elseif($USER_language == 'es-ES'){
	$USER_language_translate = 'Espa&ntilde;ol - Espa&ntilde;a';
      }
      
      $school_order = array();
      
      if(count($USER_code_school) >= 1){
	foreach($USER_code_school as $current_school_id){
	  //$GET_school_name = lightschool_get_school_details($Username, $current_school_id, 'name');
	  
	  if($GET_school_name !== false){
	    array_push($school_order, "$GET_school_name");
	  }
	}
	
	asort($school_order);
	
	$school_order_text = implode($school_order, ", ").". <a href='$MY_MAIN_DIRECTORY/schools'>$TRAD_search_another_school</a>";
      }else{
	$school_order_text = "Non fai parte di nessuna scuola. <a href='$MY_MAIN_DIRECTORY/schools'>$TRAD_search_school</a>";
      }
    ?>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="settings">
      <div class="sidebar settings_sidebar">
	<span id="general" class="sidebar_span_element" style="background-color: <?= $USER_accent_darker ?>"><?= $TRAD_general ?></span>
	<span id="customize" class="sidebar_span_element"><?= $TRAD_customize ?></span>
	<span id="security" class="sidebar_span_element"><?= $TRAD_security ?></span>
	<?php if($CURRENT_VERSION >= 5.5){ ?>
	  <span id="notification" class="sidebar_span_element"><?= $TRAD_notification ?></span>
	<?php } ?>
	<hr class="<?= $COL1 ?>" />
	<span id="change_pwd" class="sidebar_span_element"><?= $TRAD_change_pwd ?></span>
	<span id="deactivate" class="sidebar_span_element"><?= $TRAD_deactivate?></span>
	<span id="info" class="sidebar_span_element"><?= $TRAD_info_LS ?></span>
      </div>
      <div class="settings_content">
	<span onclick="backToSidebar()" class="link text_min">&lt; <?= $TRAD_settings ?><br/><br/></span>
	<div class="tab">
	  <div class="tab_content" id="general_tab" style="display: block">
	    <img src="<?= $USER_image2 ?>" style="width: 64px; height: 64px; border-radius: 50%; border: 1px solid black; margin-right: 15px; float: left; margin-top: -5px" /><span style="font-size: 20pt; display: block; margin-bottom: -10px"><?php echo($USER_name.' '.$USER_surname); ?></span>
	    <span style="font-size: 12pt; color: gray"><?php echo($USER_email.' &#8226; '.$Username); ?></span><br/><br/>
	    <div class="setting_container" setting="<?= strtolower($TRAD_email) ?>">
	      <label for="emailaddress"><?= $TRAD_email ?></label><input type="email" id="emailaddress" name="emailaddress" placeholder="<?= $TRAD_email ?>" value="<?= $USER_email ?>" /><br/>
	      <span class="settings_subtitle"><?= $TRAD_settings_email_descr ?></span><br/>
	    </div>
	    <?php if($CURRENT_VERSION >= 999999999999){ ?>
	      <div class="setting_container" setting="numero di telefono">
		<label for="phonenumber">Numero di telefono</label><input type="num" id="phonenumber" name="phonenumber" placeholder="Numero di telefono" value="<?= $USER_phone ?>" /><br/>
		<span class="settings_subtitle">Sar&agrave; il numero di telefono che ricever&agrave; i codici di accesso monouso</span><br/>
	      </div>
	    <?php } ?>
	    <?php if($CURRENT_VERSION >= 5.5){ ?>
	      <div class="setting_container" setting="<?= strtolower($TRAD_school2) ?>">
		<label for="school"><?= $TRAD_school2 ?></label><?php echo($school_order_text); ?><br/>
		<span class="settings_subtitle"><?= $TRAD_settings_school_descr ?></span><br/>
	      </div>
	    <?php } ?>
	    <?php if($USER_type == 'docente'){ ?>
	      <div class="setting_container" setting="<?= strtolower($TRAD_settings_subject) ?>">
		<label for="subject"><?= $TRAD_settings_subject ?></label><input type="text" id="subject" name="subject" placeholder="Materie" value="<?= $USER_DOC_subject_text ?>" /><br/>
		<span class="settings_subtitle"><?= $TRAD_settings_subject_descr ?></span><br/>
	      </div>
	    <?php } ?>
	    <div class="setting_container" setting="<?= strtolower($TRAD_settings_language) ?>">
	      <label for="language"><?= $TRAD_settings_language ?></label>
	      <select id="language" name="language" data-placeholder="<?= $TRAD_settings_language ?>" class="chosen">
		<option value="en-EN">English - International</option>
		<?php if($CURRENT_VERSION >= 5.5){ ?>
		  <option value="fr-FR">Fran&ccedil;ais - France</option>
		<?php } ?>
		<option value="it-IT">Italiano - Italia</option>
		<option value="es-ES">Espa&ntilde;ol - Espa&ntilde;a</option>
	      </select><br/>
	      <span class="settings_subtitle"><?= $TRAD_settings_language_descr ?></span><br/>
	    </div>
	    <?php if($USER_language == 'it-IT'){ ?>
	      <div class="setting_container" setting="<?= strtolower($TRAD_settings_region) ?>">
		<label for="regione"><?= $TRAD_settings_region ?></label>
		<select id="regione" name="regione">
		  <option>Abruzzo</option>
		  <option>Basilicata</option>
		  <option>Calabria</option>
		  <option>Campania</option>
		  <option>Emilia-Romagna</option>
		  <option>Friuli-Venezia Giulia</option>
		  <option>Lazio</option>
		  <option>Liguria</option>
		  <option>Lombardia</option>
		  <option>Marche</option>
		  <option>Molise</option>
		  <option>Piemonte</option>
		  <option>Puglia</option>
		  <option>Sardegna</option>
		  <option>Sicilia</option>
		  <option>Toscana</option>
		  <option>Trentino-Alto Adige</option>
		  <option>Umbria</option>
		  <option>Valle d'Aosta</option>
		  <option>Veneto</option>
		</select><br/>
		<span class="settings_subtitle"><?= $TRAD_settings_region_descr ?></span><br/>
	      </div>
	      <div class="setting_container" setting="<?= strtolower($TRAD_settings_provincia) ?>">
		<label for="provincia"><?= $TRAD_settings_provincia ?></label>
		<select id="provincia" name="provincia">
		  <option value="Agrigento">Agrigento</option>
		  <option value="Alessandria">Alessandria</option>
		  <option value="Ancona">Ancona</option>
		  <option value="Arezzo">Arezzo</option>
		  <option value="Ascoli Piceno">Ascoli Piceno</option>
		  <option value="Asti">Asti</option>
		  <option value="Avellino">Avellino</option>
		  <option value="Bari">Bari</option>
		  <option value="Barletta-Adria-Trani">Barletta-Adria-Trani</option>
		  <option value="Belluno">Belluno</option>
		  <option value="Benevento">Benevento</option>
		  <option value="Bergamo">Bergamo</option>
		  <option value="Biella">Biella</option>
		  <option value="Bologna">Bologna</option>
		  <option value="Bolzano">Bolzano</option>
		  <option value="Brescia">Brescia</option>
		  <option value="Brindisi">Brindisi</option>
		  <option value="Cagliari">Cagliari</option>
		  <option value="Caltanissetta">Caltanissetta</option>
		  <option value="Campobasso">Campobasso</option>
		  <option value="Carbonia-Iglesias">Carbonia-Iglesias</option>
		  <option value="Caserta">Caserta</option>
		  <option value="Catania">Catania</option>
		  <option value="Catanzaro">Catanzaro</option>
		  <option value="Chieti">Chieti</option>
		  <option value="Como">Como</option>
		  <option value="Cosenza">Cosenza</option>
		  <option value="Cremona">Cremona</option>
		  <option value="Crotone">Crotone</option>
		  <option value="Cuneo">Cuneo</option>
		  <option value="Enna">Enna</option>
		  <option value="Fermo">Fermo</option>
		  <option value="Ferrara">Ferrara</option>
		  <option value="Firenze">Firenze</option>
		  <option value="Foggia">Foggia</option>
		  <option value="Forl&igrave;-Cesena">Forl&igrave;-Cesena</option>
		  <option value="Frosinone">Frosinone</option>
		  <option value="Genova">Genova</option>
		  <option value="Gorizia">Gorizia</option>
		  <option value="Grosseto">Grosseto</option>
		  <option value="Imperia">Imperia</option>
		  <option value="Isernia">Isernia</option>
		  <option value="La Spezia">La Spezia</option>
		  <option value="L'Aquila">L'Aquila</option>
		  <option value="Latina">Latina</option>
		  <option value="Lecce">Lecce</option>
		  <option value="Lecco">Lecco</option>
		  <option value="Livorno">Livorno</option>
		  <option value="Lodi">Lodi</option>
		  <option value="Lucca">Lucca</option>
		  <option value="Macerata">Macerata</option>
		  <option value="Mantova">Mantova</option>
		  <option value="Massa-Carrara">Massa-Carrara</option>
		  <option value="Matera">Matera</option>
		  <option value="Messina">Messina</option>
		  <option value="Milano">Milano</option>
		  <option value="Modena">Modena</option>
		  <option value="Monza e della Brianza">Monza e della Brianza</option>
		  <option value="Napoli">Napoli</option>
		  <option value="Novara">Novara</option>
		  <option value="Nuoro">Nuoro</option>
		  <option value="Olbia-Tempio">Olbia-Tempio</option>
		  <option value="Oristano">Oristano</option>
		  <option value="Padova">Padova</option>
		  <option value="Palermo">Palermo</option>
		  <option value="Parma">Parma</option>
		  <option value="Pavia">Pavia</option>
		  <option value="Perugia">Perugia</option>
		  <option value="Pesaro e Rubino">Pesaro e Urbino</option>
		  <option value="Pescara">Pescara</option>
		  <option value="Piacenza">Piacenza</option>
		  <option value="Pisa">Pisa</option>
		  <option value="Pistoia">Pistoia</option>
		  <option value="Pordenone">Pordenone</option>
		  <option value="Potenza">Potenza</option>
		  <option value="Prato">Prato</option>
		  <option value="Ragusa">Ragusa</option>
		  <option value="Ravenna">Ravenna</option>
		  <option value="Reggio Calabria">Reggio Calabria</option>
		  <option value="Reggio Emilia">Reggio Emilia</option>
		  <option value="Rieti">Rieti</option>
		  <option value="Rimini">Rimini</option>
		  <option value="Roma">Roma</option>
		  <option value="Rovigo">Rovigo</option>
		  <option value="Salerno">Salerno</option>
		  <option value="Medio Campidano">Medio Campidano</option>
		  <option value="Sassari">Sassari</option>
		  <option value="Savona">Savona</option>
		  <option value="Siena">Siena</option>
		  <option value="Siracusa">Siracusa</option>
		  <option value="Sondrio">Sondrio</option>
		  <option value="Taranto">Taranto</option>
		  <option value="Teramo">Teramo</option>
		  <option value="Terni">Terni</option>
		  <option value="Torino">Torino</option>
		  <option value="Ogliastra">Ogliastra</option>
		  <option value="Trapani">Trapani</option>
		  <option value="Trento">Trento</option>
		  <option value="Treviso">Treviso</option>
		  <option value="Trieste">Trieste</option>
		  <option value="Udine">Udine</option>
		  <option value="Varese">Varese</option>
		  <option value="Venezia">Venezia</option>
		  <option value="Verbano-Cusio-Ossola">Verbano-Cusio-Ossola</option>
		  <option value="Vercelli">Vercelli</option>
		  <option value="Verona">Verona</option>
		  <option value="Vibo Valentia">Vibo Valentia</option>
		  <option value="Vicenza">Vicenza</option>
		  <option value="Viterbo">Viterbo</option>
		</select><br/>
		<span class="settings_subtitle"><?= $TRAD_settings_provincia_descr ?></span><br/>
	      </div>
	    <?php } ?>
	  </div>
	  <div class="tab_content" id="customize_tab">
	    <div class="setting_container" setting="colore preferito">
	      <label for="accentcolor"><?= $TRAD_settings_accent ?></label><input type="text" id="accentcolor" name="accentcolor" value="<?= $USER_accent ?>" readonly="readonly" /><br/>
	      <?php include_once "color_management.php"; ?>
	      <span class="settings_subtitle"><?= $TRAD_settings_accent_descr ?></span><br/>
	    </div>
	    <div class="setting_container" setting="sfondo">
	      <label for="wallpaper"><?= $TRAD_settings_wallpaper ?></label><button id="wallpaper" name="wallpaper" onclick="changeWallpaper()"><?= $TRAD_browse ?></button><input type="hidden" style="display: none" id="wallpaper_url" name="wallpaper_url" value="<?= $USER_background ?>" /><br/>
	      <span class="settings_subtitle"><?= $TRAD_settings_wallpaper_descr ?></span><br/>
	    </div>
	    <div class="setting_container" setting="trasparenza">
	      <label for="transparent"><?= $TRAD_settings_transparent ?></label><?= $TRAD_settings_transparent1 ?><input type="range" min="0.00" max="1.00" value="<?= $USER_transparent ?>" step="0.05" id="transparent" name="transparent" style="height: 10px" onchange="changeTransparent(this.value)" /><?= $TRAD_settings_transparent2 ?><br/>
	      <span class="settings_subtitle"><?= $TRAD_settings_transparent_descr ?></span><br/>
	    </div>
	    <!-- <label for="position">Posizione</label>
	    <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/black/adatta.png" style="border: 2px solid <?= $USER_accent ?>; margin-right: 20px; position: absolute; top: 520px; left: 720px" />
	    <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/black/centra.png" style="border: 2px solid <?= $USER_accent ?>; margin-right: 20px; position: absolute; top: 520px; left: 810px" />
	    <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/black/sequenza.png" style="border: 2px solid <?= $USER_accent ?>; margin-right: 20px; position: absolute; top: 520px; left: 900px" /><br/>
	    <span class="settings_subtitle">Seleziona la posizione dell'immagine di sfondo.</span><br/> -->
	    <div class="setting_container" setting="icone">
	      <label for="icons"><?= $TRAD_settings_icons ?></label><br/><input type="hidden" style="display: none" id="icon_set" name="icon_set" value="<?= $USER_icon_set ?>" />
	      <div class="horizontal_slider_selector">
		<div set="monochromatic">
		  <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/files.png" />
		  <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/diary.png" />
		  <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/timetable.png" />
		  <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/settings.png" />
		  <span class="icon-16-3-position <?= $MONO_selected ?>"><?= $TRAD_settings_icons_mono ?></span>
		</div>
		<div set="color">
		  <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/color/files.png" />
		  <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/color/diary.png" />
		  <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/color/timetable.png" />
		  <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/color/settings.png" />
		  <span class="icon-16-3-position <?= $COLOR_selected ?>"><?= $TRAD_settings_icons_color ?></span>
		</div>
	      </div><br/>
	      <span class="settings_subtitle"><?= $TRAD_settings_icons_descr ?></span><br/>
	    </div>
	    <div class="setting_container" setting="lim predefinita">
	      <label for="lim">LIM predefinita</label><input type="text" id="lim" name="lim" placeholder="LIM predefinita" value="<?= $USER_lim ?>" /><br/>
	      <span class="settings_subtitle"><?= $TRAD_settings_lim_descr ?></span><br/>
	    </div>
	    <div class="setting_container" setting="apertura file">
	      <label for="click_type"><?= $TRAD_settings_open ?></label>
	      <select id="click_type" name="click_type">
		<option value="ondblclick"><?= $TRAD_settings_open1 ?></option>
		<option value="onclick"><?= $TRAD_settings_open2 ?></option>
	      </select><br/>
	      <span class="settings_subtitle"><?= $TRAD_settings_open_descr ?></span><br/>
	    </div>
	    <div class="setting_container" setting="timer salvataggio automatico quaderni">
	      <label for="timer"><?= $TRAD_settings_timer ?></label>
	      <select id="timer" name="timer">
		<option value="0"><?= $TRAD_settings_timer_no ?></option>
		<option value="5">5 <?= $TRAD_seconds ?></option>
		<option value="10">10 <?= $TRAD_seconds ?></option>
		<option value="15">15 <?= $TRAD_seconds ?></option>
		<option value="20">20 <?= $TRAD_seconds ?></option>
		<option value="40">40 <?= $TRAD_seconds ?></option>
		<option value="60">1 <?= $TRAD_minute ?></option>
		<option value="120">2 <?= $TRAD_minutes ?></option>
		<option value="180">3 <?= $TRAD_minutes ?></option>
		<option value="240">4 <?= $TRAD_minutes ?></option>
		<option value="300">5 <?= $TRAD_minutes ?></option>
		<option value="600">10 <?= $TRAD_minutes ?></option>
		<option value="1200">20 <?= $TRAD_minutes ?></option>
		<option value="1800">30 <?= $TRAD_minutes ?></option>
		<option value="2400">40 <?= $TRAD_minutes ?></option>
		<option value="3000">50 <?= $TRAD_minutes ?></option>
		<option value="3600">60 <?= $TRAD_minutes ?></option>
	      </select><br/>
	      <span class="settings_subtitle"><?= $TRAD_settings_timer_descr ?></span>
	    </div>
	    <br/><br/>
	    <span class="link" onclick="restoreAlerts()"><?= $TRAD_settings_restore_alert ?></span><br/>
	    <span class="settings_subtitle"><?= $TRAD_settings_restore_alert_descr ?></span>
	    <br/>
	  </div>
	  <div class="tab_content" id="security_tab">
	    <h2 id="security_content"><?= $TRAD_security2 ?><span style="display: inline-block; margin-left: 20px; font-size: 11pt"><?= $TRAD_go_to ?> <a href="#privacy_content"><?= $TRAD_privacy ?> &gt;</a></span></h2>
	    <hr class="left" />
	    <label for="accesscontrol"><?= $TRAD_access_control ?></label><button onclick="window.location.href = '<?= $MY_MAIN_DIRECTORY ?>/devices'" style="float: right"><?= $TRAD_settings_access_history ?></button>
	    <select id="accesscontrol" name="accesscontrol">
	      <option value="y"><?= $TRAD_active ?></option>
	      <option value="n"><?= $TRAD_deactive ?></option>
	    </select><br/>
	    <span class="settings_subtitle"><?= $TRAD_access_control_descr ?></span><br/><br/>
	    <label style="max-width: 500px"><?= $TRAD_access_browser ?></label><br/>
	    <label for="pc">PC</label>
	    <select id="pc" name="pc">
	      <option value="y"><?= $TRAD_allow ?></option>
	      <option value="n"><?= $TRAD_deny ?></option>
	    </select><br/>
	    <span class="settings_subtitle"><?= $TRAD_allow_descr ?> PC.</span><br/>
	    <label for="tablet">Tablet</label>
	    <select id="tablet" name="tablet">
	      <option value="y"><?= $TRAD_allow ?></option>
	      <option value="n"><?= $TRAD_deny ?></option>
	    </select><br/>
	    <span class="settings_subtitle"><?= $TRAD_allow_descr ?> tablet.</span><br/>
	    <label for="mobile">Cellulare</label>
	    <select id="mobile" name="mobile">
	      <option value="y"><?= $TRAD_allow ?></option>
	      <option value="n"><?= $TRAD_deny ?></option>
	    </select><br/>
	    <span class="settings_subtitle"><?= $TRAD_allow_descr ?> cellulare.</span><br/><br/>
	    <label>Accesso dalle app</label><br/>
	    <label for="android">Android</label>
	    <select id="android" name="android">
	      <option value="y"><?= $TRAD_allow ?></option>
	      <option value="n"><?= $TRAD_deny ?></option>
	    </select><br/>
	    <span class="settings_subtitle"><?= $TRAD_allow_app_descr ?> Android.</span><br/>
	    <label for="windows">Windows 10</label>
	    <select id="windows" name="windows">
	      <option value="y"><?= $TRAD_allow ?></option>
	      <option value="n"><?= $TRAD_deny ?></option>
	    </select><br/>
	    <span class="settings_subtitle"><?= $TRAD_allow_app_descr ?> Windows 10.</span><br/>
	    <label for="wp">Windows 10 Mobile</label>
	    <select id="wp" name="tablet">
	      <option value="y"><?= $TRAD_allow ?></option>
	      <option value="n"><?= $TRAD_deny ?></option>
	    </select><br/>
	    <span class="settings_subtitle"><?= $TRAD_allow_app_descr ?> Windows 10 Mobile.</span>
	    <br/><br/>
	    <h2 id="privacy_content"><?= $TRAD_privacy ?><span style="display: inline-block; margin-left: 20px; font-size: 11pt"><?= $TRAD_go_to ?> <a href="#security_content"><?= $TRAD_security2 ?> &gt;</a></span></h2>
	    <hr class="left" />
	    <label for="visibility"><?= $TRAD_settings_visibility ?></label>
	    <select id="visibility" name="visibility">
	      <option value="y"><?= $TRAD_visible ?></option>
	      <option value="n"><?= $TRAD_invisible ?></option>
	    </select><br/>
	    <span class="settings_subtitle"><?= $TRAD_settings_visibility_trad ?></span><br/>
	    <label for="show_email"><?= $TRAD_settings_show_email ?></label>
	    <select id="show_email" name="show_email">
	      <option value="y"><?= $TRAD_show ?></option>
	      <option value="n"><?= $TRAD_hide ?></option>
	    </select><br/>
	    <span class="settings_subtitle"><?= $TRAD_settings_show_email_descr ?></span><br/>
	    <label for="show_email"><?= $TRAD_settings_show_school ?></label>
	    <select id="show_school" name="show_school">
	      <option value="y"><?= $TRAD_show ?></option>
	      <option value="n"><?= $TRAD_hide ?></option>
	    </select><br/>
	    <span class="settings_subtitle"><?= $TRAD_settings_show_school_descr ?></span><br/>
	    <?php
	      include_once "block_user.php";
	    ?>
	  </div>
	  <div class="tab_content" id="notification_tab">
	    <span class="settings_subtitle"></span><br/>
	    <label>&nbsp;</label><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/email.png" style="width: 16px; height: 16px; margin-right: 15px" /><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/phone.png" style="width: 16px; height: 16px" /><br/>
	    <label><?= $TRAD_settings_access_notification ?></label><input type="checkbox" name="email_access" id="email_access" value="y" /><input type="checkbox" name="phone_access" id="phone_access" value="y" /><br/>
	    <label><?= $TRAD_settings_new_messages ?></label><input type="checkbox" name="email_messages" id="email_messages" value="y" /><input type="checkbox" name="phone_messages" id="phone_messages" value="y" /><br/>
	    <label><?= $TRAD_settings_new_shares ?></label><input type="checkbox" name="email_share" id="email_share" value="y" /><input type="checkbox" name="phone_share" id="phone_share" value="y" /><br/>
	  </div>
	  <div class="tab_content" id="password_tab">
	    <?php
	      if($USER_pwd_changed == ''){
		$USER_pwd_changed_text = $TRAD_never;
	      }else{
		$USER_pwd_changed_text = $USER_pwd_changed;
	      }
	    ?>
	    <strong><?= $TRAD_settings_last_pwd_change ?></strong> <?php echo($USER_pwd_changed_text); ?><br/><br/>
	    <label for="old"><?= $TRAD_settings_this_pwd ?></label><input type="password" id="old" name="old" placeholder="<?= $TRAD_settings_this_pwd ?>" /><br/>
	    <label for="new"><?= $TRAD_settings_new_pwd ?></label><input type="password" id="new" name="new" placeholder="<?= $TRAD_settings_new_pwd ?>" /><br/>
	    <label for="newnew"><?= $TRAD_settings_new_new_pwd ?></label><input type="password" id="newnew" name="newnew" placeholder="<?= $TRAD_settings_new_new_pwd ?>" /><br/>
	    <label style="font-weight: normal; max-width: 700px !important"><input type="checkbox" value="y" id="disconnect" style="min-width: 20px !important; padding: 0px; margin: 0px; width: 20px !important" /><?= $TRAD_settings_change_pwd_devices ?></label><br/>
	    <button style="padding: 10px 40px" onclick="change_pwd_btn()"><?= $TRAD_change_pwd ?></button>
	  </div>
	  <div class="tab_content" id="deactivate_tab">
	    <?= $TRAD_settings_deactivated ?><br/>
	    <label for="password"><?= $TRAD_pwd ?></label><input type="password" id="password" name="password" placeholder="<?= $TRAD_pwd ?>" /><br/>
	    <button style="padding: 10px 40px" onclick="deactivate_btn()"><?= $TRAD_deactivate ?></button>
	  </div>
	  <div class="tab_content" id="info_tab">
	    <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo.png" style="width: 64px; height: 64px; float: left; margin-right: 10px; margin-bottom: 10px" /><span class="font_title">LightSchool Alfa<span class="settings_subtitle" style="font-size: 11pt; display: inline-block; margin-left: 25px">Versione <?= $CURRENT_VERSION ?></span><br style="line-height: 0px"/><span class="settings_subtitle" style="font-size: 11pt">&copy; 2012-2015 <?= $TRAD_credits ?></span></span><br/><br/>
	    <label style="width: 180px; text-align: right"><?= $TRAD_website ?></label><a href="<?= $LS_MAIN_DIRECTORY ?>" target="_blank"><?php echo(substr($LS_MAIN_DIRECTORY, 2)); ?></a><br/>
	    <label style="width: 180px; text-align: right"><?= $TRAD_support ?>:</label><a href="mailto:<?= $EMAIL_SUPPORT ?>"><?php echo($EMAIL_SUPPORT); ?></a><br/>
	    <label style="width: 180px; text-align: right"><?= $TRAD_general_info ?>:</label><a href="mailto:<?= $EMAIL_INFO ?>"><?php echo($EMAIL_INFO); ?></a><br/>
	    <label style="width: 180px; text-align: right">App:</label><span class="link" id="softwareVer"><?= $TRAD_software_version ?></span><br/><br/>
	    <?= $TRAD_credits2 ?><br/>
	    <?= $TRAD_exists_by ?>&nbsp;<?php
	      function delta_tempo($data_iniziale,$data_finale,$unita){
		$data1 = strtotime($data_iniziale);
		$data2 = strtotime($data_finale);
		
		  switch($unita){
		    case "m": $unita = 1/60; break; 	//MINUTI
		    case "h": $unita = 1; break;		//ORE
		    case "g": $unita = 24; break;		//GIORNI
		    case "a": $unita = 8760; break;         //ANNI
		  }
		  
		$differenza = (($data2-$data1)/3600)/$unita;
		return $differenza;
	      }
	      
	      echo floor(delta_tempo("2012-05-27", date("Y-m-d"), "g"));
	    ?> giorni!<br/>
	    <?php
	    if(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'){
	      $secured = "<span style='color: green; font-weight: bold'>$TRAD_connection_protected</span>";
	    }else{
	      $secured = "<span style='color: red; font-weight: bold'>$TRAD_connection_unprotected</span>";
	    }
	    echo($secured);
	    ?></span><br/>
	    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="margin-top: 10px; width: 200px" class="paypalform">
	      <input type="hidden" name="cmd" value="_s-xclick">
	      <input type="hidden" name="hosted_button_id" value="WCSKJPUUHMPPQ">
	      <input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - Il metodo rapido, affidabile e innovativo per pagare e farsi pagare.">
	      <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
	    </form>
	  </div>
	</div>
      </div>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>