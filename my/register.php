<?php include_once "base.php";
if($_SESSION['Username'] != ''){
if($_GET['class'] != ''){

  if($_GET['day'] == ''){
    $_GET['day'] = $date_now_IT;
  }
  
  if($_GET['subject'] == ''){
    $_GET['subject'] = $USER_DOC_subject[0];
  }
  
  $SCHOOL_id = lightschool_get_class_details($Username, $_GET['class'], 'school_id');
  $SCHOOL_periodo = lightschool_get_class_details($Username, $_GET['class'], 'periodo');
  
  if($_GET['period'] == ''){
    $_GET['period'] = 'first';
  }
  
  if($_GET['period'] == 'first'){
    $DATE_array = array($SCHOOL_periodo[0], $SCHOOL_periodo[1]);
  }elseif($_GET['period'] == 'second'){
    $DATE_array = array($SCHOOL_periodo[2], $SCHOOL_periodo[3]);
  }
  
  $BLOCK_EDITS = false;
  
  $paymentDate = date('d/m/Y');
  $paymentDate=date('d/m/Y', strtotime($paymentDate));;
  //echo $paymentDate; // echos today! 
  $contractDateBegin = date('d/m/Y', strtotime($DATE_array[0]));
  $contractDateEnd = date('d/m/Y', strtotime($DATE_array[1]));

  if ((($paymentDate > $contractDateBegin) and ($paymentDate < $contractDateEnd)) or lightschool_get_class_details($Username, $_GET['class'], 'blocked') == 1)
  {
    $BLOCK_EDITS = true;
  }
  else
  {
    $BLOCK_EDITS = false; 
  }
  
  if($_GET['tab'] == ''){
    $_GET['tab'] = 'overview';
  }
  ?>
<html>
  <head>
    <title><?= $TRAD_register ?> - LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <?php include_once "css/jquery-ui.php"; ?>
  </head>
  <body>
    <?php if(lightschool_is_school_class_correct($_GET['class']) == 'ok'){ ?>
      <div class="sidebar settings_sidebar register_sidebar" style="width: 290px !important; max-width: 290px !important; min-width: 290px !important; ">
	<?php
	  if($BLOCK_EDITS === true){
	    echo("<div style='background-color: red; padding: 10px'>$TRAD_register_block</div>");
	  }
	  
	  $_GET['SQL_type'] = "register_sidebar";
	  include "view_management.php";
	?>
      </div>
      <style type="text/css">
	.mce-tooltip{
	  display: none !important;
	}
	#mark_form input, #mark_form select{
	  display: block;
	}
	#mark_form input{
	  width: calc(100% - 30px);
	}
	#mark_form select{
	  width: calc(100% + 20px) !important;
	}
	#mark_form textarea{
	  margin-top: 20px;
	  width: calc(100% - 30px);
	  display: block;
	}
      </style>
      <script type="text/javascript">
	window.currentSubject = '<?= $_GET['subject'] ?>';
	window.currentPeriod = '<?= $_GET['period'] ?>';
	
	if(localStorage.getItem("currentPeriod") == 'second'){
	  window.currentPeriod = 'second';
	}
	if(localStorage.getItem("currentSubject") !== null){
	  window.currentSubject = localStorage.getItem("currentSubject");
	}
      
	function getParameterByName(name){
	  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"), results = regex.exec(location.search);
	  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
	
	function switch_tab(tab){
	  window.currentTab = tab;
	  var current_url = $(location).attr('href');
	  var tab_url = getParameterByName('tab');
	  var updated_url = current_url.replace(tab_url, tab);
	  window.history.pushState("", "", updated_url);
	  document.title = $('.tabs_'+tab).html() + " <?= lcfirst($TRAD_app_register) ?> - LightSchool";
	  
	  $('.tab_tab').hide();
	  $('.tab_'+tab).show();
	  if(tab != 'activities' && tab != 'coordinatore'){
	    $('.tab_'+tab).html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_black.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	    var dates = JSON.stringify('<?= $SCHOOL_periodo ?>');
	    $('.tab_'+tab).load("<?= $MY_MAIN_DIRECTORY ?>/register_"+tab+"?class=<?= $_GET['class'] ?>&day=<?= $_GET['day'] ?>&subject="+window.currentSubject+"&period="+window.currentPeriod);
	  }else{
	    <?php if($USER_type == 'docente'){ ?>
	      if(tab == 'activities'){
		$('.tab_activities').html("<?= $TRAD_register_activity ?>");
	      }else if(tab == 'coordinatore'){
		<?php if($REGISTER_coordinatore == $_SESSION['Username']){ ?>
		  $('.tab_coordinatore').html('<h2><?= $TRAD_register_coordinatore_welcome ?></h2><div class="register_icon" style="height: auto; background-color: transparent; cursor: default"><a href="<?= $MY_MAIN_DIRECTORY ?>/register?class=<?= $REGISTER_id ?>&tab=marks"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/tick.png" /><?= $TRAD_register_coordinatore_marks ?></a><a href="<?= $MY_MAIN_DIRECTORY ?>/register?class=<?= $REGISTER_id ?>&tab=marks"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/coordinatore.png" /><?= $TRAD_register_coordinatore_scrutini ?></a></div>');
		<?php } ?>
	      }
	    <?php } ?>
	  }
	  $('.tabs_tabs').removeClass('selected');
	  $('.tabs_'+tab).addClass('selected');
	}
	
	  
	function switchPeriod(period){
	  window.currentPeriod = period;
	  localStorage.setItem("currentPeriod", period);
	  if($('.tab_marks').is(':visible')){
	    $('.tab_tab').html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_black.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	    $('.tab_marks').load("<?= $MY_MAIN_DIRECTORY ?>/register_marks?class=<?= $_GET['class'] ?>&day=<?= $_GET['day'] ?>&subject="+window.currentSubject+"&period="+period);
	  }else if($('.tab_scrutini').is(':visible')){
	    $('.tab_tab').html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_black.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	    $('.tab_scrutini').load("<?= $MY_MAIN_DIRECTORY ?>/register_scrutini?class=<?= $_GET['class'] ?>&subject="+window.currentSubject+"&period="+period);
	  }
	}
	  
	<?php if($USER_type == 'docente'){ ?>
	  function switchSubject(subject){
	    window.currentSubject = subject;
	    localStorage.setItem("currentSubject", subject);
	    if($('.tab_marks').is(':visible')){
	      $('.tab_tab').html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_black.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	      $('.tab_marks').load("<?= $MY_MAIN_DIRECTORY ?>/register_marks?class=<?= $_GET['class'] ?>&day=<?= $_GET['day'] ?>&subject="+subject+"&period="+window.currentPeriod);
	    }else if($('.tab_scrutini').is(':visible')){
	      $('.tab_tab').html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_black.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	      $('.tab_scrutini').load("<?= $MY_MAIN_DIRECTORY ?>/register_scrutini?class=<?= $_GET['class'] ?>&subject="+subject+"&period="+window.currentPeriod);
	    }
	  }
	  
	  function selectMark(){
	    if($('.selectMark').is(':visible')){
	      $(".selectMark").fadeOut(200);
	    }else{
	      $(".selectMark").fadeIn(200);
	    }
	  }
	  
	  <?php if($BLOCK_EDITS === false){ ?>
	  function addMark(){
	    var add_mark_subject = $("#add_mark_subject").val();
	    var add_mark_subject_text = $("#add_mark_subject_text").val();
	    var add_mark_value_input = $("#add_mark_value_input").val();
	    var add_mark_type = $("#add_mark_type").val();
	    var add_mark_date = $("#add_mark_date").val();
	    var add_mark_descr = $("#add_mark_descr").val();
	    var content = tinyMCE.activeEditor.getContent();
	    content = escape(content);
	    
	    $.ajax({
	      type: "POST",
	      url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=register_add_mark",
	      data: "student="+window.username_status_marker+"&class=<?= $_GET['class'] ?>&subject="+add_mark_subject+"&mark="+add_mark_value_input+"&date="+add_mark_date+"&type="+add_mark_type+"&html="+content,
	      success: function(html){
		if(html == "true"){
		  $(".toast").css("background-color", "darkgreen");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_register_mark_added ?>");
		  switchSubject(window.currentSubject);
		  closeDialog();
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
	  
	  function propMark(){
	    var add_mark_value_input = $("#add_mark_value_input").val();
	    
	    $.ajax({
	      type: "POST",
	      url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=register_add_mark",
	      data: "student="+window.username_status_marker+"&class=<?= $_GET['class'] ?>&subject="+window.currentSubject+"&mark="+add_mark_value_input+"&type=scrutini&period="+window.currentPeriod,
	      success: function(html){
		if(html == "true"){
		  $(".toast").css("background-color", "darkgreen");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_register_mark_prop ?>");
		  switchSubject(window.currentSubject);
		  closeDialog();
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
	  
	  function finischScrutinio(){
	    $("#register_profile_frame").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	    $('#register_profile_dialog').fadeIn(200);
	    $('#dialog_overlay').fadeIn(200);
	    $('#register_profile_frame').load('<?= $MY_MAIN_DIRECTORY ?>/register_profile.php?type=finish_scrutinio_confirm&subject=' + window.currentSubject + '&class=<?= $_GET['class'] ?>&dialog=true');
	    $('#register_profile_dialog_title').html('<?= $TRAD_register_finalize_mark ?>');
	  }
	<?php } } ?>
	
	$(function(){
	  switch_tab('<?= $_GET['tab'] ?>');
	  
	  <?php if($USER_type == 'docente'){ ?>
	    $("#register_profile_frame").on("click", "#justify_button", function(){
	      var justify_type = $("#justify_type").val();
	      var justify_type2 = $("#type2").val();
	      var justify_descr = tinyMCE.activeEditor.getContent();
	      justify_descr = escape(justify_descr);
	      
	      $.ajax({
		type: "POST",
		url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=register_justify",
		data: "student="+window.justify_student+"&class=<?= $_GET['class'] ?>&date="+window.justify_date+"&type="+justify_type+"&html="+justify_descr+"&type2="+justify_type2,
		success: function(html){
		  if(html == "true"){
		    $(".toast").css("background-color", "darkgreen");
		    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_register_justify_added ?>");
		    switch_tab(window.currentTab);
		    closeDialog();
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
	      return false;
	    });
	  
	    $(document).on("click",".list_item, .profile_frame",function(e){
	      window.username_status_marker = $(this).attr('username');
	      $("#register_profile_frame").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	      $('#register_profile_dialog').fadeIn(200);
	      $('#dialog_overlay').fadeIn(200);
	      if($('.tab_overview').is(':visible') || $('.tab_appello').is(':visible')){
		$('#register_profile_frame').load('<?= $MY_MAIN_DIRECTORY ?>/register_profile.php?type=overview&username=' + window.username_status_marker + '&class=<?= $_GET['class'] ?>&dialog=true');
		$('#register_profile_dialog_title').html('<?= $TRAD_register_profile ?>');
	      }else if($('.tab_marks').is(':visible')){
		$('#register_profile_frame').load('<?= $MY_MAIN_DIRECTORY ?>/register_profile.php?type=marks&username=' + window.username_status_marker + '&class=<?= $_GET['class'] ?>&dialog=true');
		$('#register_profile_dialog_title').html('<?= $TRAD_register_add_mark_title ?>');
	      }else if($('.tab_lessons').is(':visible')){
		window.id_lessons = $(this).attr('id');
		$('#register_profile_frame').load('<?= $MY_MAIN_DIRECTORY ?>/register_profile.php?type=lessons&username=<?= $_SESSION['Username'] ?>&class=<?= $_GET['class'] ?>&id='+id_lessons+'&dialog=true');
		$('#register_profile_dialog_title').html('<?= $TRAD_register_edit_lesson_title ?>');
	      }else if($('.tab_scrutini').is(':visible')){
		$('#register_profile_frame').load('<?= $MY_MAIN_DIRECTORY ?>/register_profile.php?type=scrutini&username=' + window.username_status_marker + '&class=<?= $_GET['class'] ?>&dialog=true&subject='+window.currentSubject+'&period='+window.currentPeriod);
		$('#register_profile_dialog_title').html('<?= $TRAD_register_scrutinio ?>');
	      }
	    });
	    
	    $(document).on("click",".justify_text[student]",function(e){
	      var justify_student = $(this).attr("student");
	      var justify_date = $(this).attr("date");
	      window.justify_student = justify_student;
	      window.justify_date = justify_date;
	      
	      $('#register_profile_frame').html('<?= $TRAD_loading ?>');
	      $('#register_profile_dialog_title').html('<?= $TRAD_loading ?>');
	      $('#register_profile_frame').load('<?= $MY_MAIN_DIRECTORY ?>/register_profile.php?type=justify&username=' + justify_student + '&class=<?= $_GET['class'] ?>&dialog=true&date=' + justify_date, function(){
		$('#register_profile_dialog_title').html('<?= $TRAD_register_justify ?>');
	      });
	    });
	    
	    $(".dialog").on("click",".selectMark > center > span",function(e){
	      selectMark();
	      var mark_selected = $(this).attr("value");
	      if(mark_selected != ''){
		$("#add_mark_value_input").val(mark_selected);
		$("#link_selectedit_mark").html("<?= $TRAD_register_scrutinio_selected_p1 ?> " + mark_selected + ". <?= $TRAD_register_scrutinio_selected_p2 ?>");
	      }
	    });
	    
	    $(document).on('change','#subject_select',function(){
	      if($("#subject_select option:selected" ).text() == 'Altro'){
		$('#subject_text').show();
	      }else{
		$('#subject_text').hide();
	      }
	    });
	    $(".tab_tab").on("click","#show_present",function(e){
	      if($("#show_present").is(':checked')){
		$(".present").slideUp(200);
	      }else{
		$(".present").slideDown(200);
	      }
	    });
	    $(".tab_tab").on("click","#show_no_marks",function(e){
	      if($("#show_no_marks").is(':checked')){
		$(".hide_mark").slideUp(200);
	      }else{
		$(".hide_mark").slideDown(200);
	      }
	    });
	    $(".tab_tab").on("click","#show_insufficient",function(e){
	      if($("#show_insufficient").is(':checked')){
		$(".insufficient").slideUp(200);
	      }else{
		$(".insufficient").slideDown(200);
	      }
	    });
	  <?php } ?>
	});
	
	function change_date(){
	  $('#date').focus();
	}
	
	function doSearch(q){
	  if(q.length == 0){
	    $('.list_item').show();
	    $('.nothing_found_users').hide();
	  }else{
	    $('.list_item').hide();
	    q = q.toString().toLowerCase();
	    $('.list_item[name*="'+q+'"], .list_item[surname*="'+q+'"], .list_item[user_complete*="'+q+'"], .list_item[user_completeinv*="'+q+'"]').show();
	    if($('.list_item').is(':visible')) {
	      $('.nothing_found_users').hide();
	    }else{
	      $('.nothing_found_users').show();
	    }
	  }
	}
	
	function sign(){
	  $("#sign_frame").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	  $('#sign_dialog').fadeIn(200);
	  $('#dialog_overlay').fadeIn(200);
	  $('#sign_frame').load('<?= $MY_MAIN_DIRECTORY ?>/register_sign.php?class=<?= $_GET['class'] ?>&dialog=true');
	}
	
	<?php if($USER_type == 'docente'){ ?>
	  function appello(){
	    if(typeof window.presente_array === 'undefined'){
	      window.presente_array = new Array();
	    }
	    if(typeof window.assente_array === 'undefined'){
	      window.assente_array = new Array();
	    }
	    // switch_tab('appello');
	    $(".list_item").first().attr("class", "list_item list_item_selected");
	    window.appello_started = 'y';
	    window.this_student = $(".list_item").first().attr("username");
	    $(".toast").css("background-color", "darkgreen");
	    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_white.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_register_appello_iniziato ?>");
	    $(".toast").slideDown(400);
	  }
	  
	  function changeUserStatus(username){
	    if(typeof window.changeUserStatus_type !== 'undefined'){
	    alert("formpost.php?type=register_changeuserstatus&username="+username+"&request_type="+window.changeUserStatus_type+"&class=<?= $_GET['class'] ?>&day=<?= $_GET['day'] ?>");
	    }
	  }
	  
	  $(document).keyup(function(event){
	    if(window.appello_started == 'y'){
	      if(event.keyCode == 80 || event.keyCode == 65){
		$(".list_item_selected").attr("class", "list_item");
		var next = $('.list_item[username="'+window.this_student+'"]').next(".list_item");
	      }
	      
	      if(event.keyCode == 80){
		$(".toast").css("background-color", "darkgreen");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_white.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_register_appello_presente ?>");
		$('.status_marker[username="'+window.this_student+'"]').css("background-color", "darkgreen");
		window.presente_array[window.presente_array.length] = window.this_student; 
	      }else if(event.keyCode == 65){
		$(".toast").css("background-color", "red");
		$(".toast").html("<span style='background-color: red'><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_white.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_register_appello_absent ?></span>");
		$('.status_marker[username="'+window.this_student+'"]').css("background-color", "red");
		window.assente_array[window.assente_array.length] = window.this_student; 
	      }
	      
	      if(event.keyCode == 80 || event.keyCode == 65){
		window.this_student = next.attr("username");
		if(typeof next.attr("username") === 'undefined'){
		  window.appello_started = 'n';
		  $.ajax({
		    type: "POST",
		    url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=register_appello&class=<?= $_GET['class'] ?>",
		    data: "presente="+JSON.stringify(window.presente_array)+"&assente="+JSON.stringify(window.assente_array),
		    success: function(html){
		      if(html=='true'){
			$(".toast").css("background-color", "darkgreen");
			$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_white.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_register_appello_terminato ?>");
			window.presente_array = [];
			window.assente_array = [];
		      }else{
			$(".toast").css("background-color", "red");
			$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
			window.presente_array = [];
			window.assente_array = [];
		      }
		    },
		    beforeSend:function(){
		      $(".toast").css("background-color", "orange");
		      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
		    }
		  });
		  $(".toast").slideDown(400);
		}else{
		  next.attr("class", "list_item list_item_selected");
		}
	      }
	      
	      if(event.keyCode == 27){
		window.appello_started = 'n';
		$(".toast").css("background-color", "darkgreen");
		$(".list_item_selected").css({"background-color": "transparent", "color": "black"});
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_white.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_register_appello_interrotto ?>");
		$(".toast").slideDown(400);
	      }
	    }
	  });
	<?php } ?>
	
	/* Italian initialisation for the jQuery UI date picker plugin. */
	/* Written by Sorge Francesco (sorgefrancesco97{at}outlook.com) */
	(function(factory){
	  if(typeof define === "function" && define.amd){
	    // AMD. Register as an anonymous module.
	    define(["../jquery.ui.datepicker"], factory);
	  }else{
	    // Browser globals
	    factory( jQuery.datepicker );
	  }
	}(function(datepicker){
	  datepicker.regional['<?= $TRAD_regional ?>'] = {
	    closeText: 'Chiudi',
	    prevText: 'Indietro',
	    nextText: 'Avanti',
	    currentText: 'Oggi',
	    monthNames: ['<?= $TRAD_month[0] ?>', '<?= $TRAD_month[1] ?>', '<?= $TRAD_month[2] ?>', '<?= $TRAD_month[3] ?>', '<?= $TRAD_month[4] ?>', '<?= $TRAD_month[5] ?>', '<?= $TRAD_month[6] ?>', '<?= $TRAD_month[7] ?>', '<?= $TRAD_month[8] ?>', '<?= $TRAD_month[9] ?>', '<?= $TRAD_month[10] ?>', '<?= $TRAD_month[11] ?>'],
	    monthNamesShort: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
	    dayNames: ['Domenica', 'Luned&igrave;', 'Marted&igrave;', 'Mercoled&igrave;', 'Gioved&igrave;', 'Venerd&igrave;', 'Sabato'],
	    dayNamesShort: ['Domenica', 'Luned&igrave;', 'Marted&igrave;', 'Mercoled&igrave;', 'Gioved&igrave;', 'Venerd&igrave;', 'Sabato'],
	    dayNamesMin: ['<?= $TRAD_day_short[0] ?>','<?= $TRAD_day_short[1] ?>','<?= $TRAD_day_short[2] ?>','<?= $TRAD_day_short[3] ?>','<?= $TRAD_day_short[4] ?>','<?= $TRAD_day_short[5] ?>','<?= $TRAD_day_short[6] ?>'],
	    weekHeader: 'Settimana',
	    dateFormat: 'dd/mm/yy',
	    firstDay: <?= $TRAD_first_day ?>,
	    isRTL: false,
	    showMonthAfterYear: false,
	    yearSuffix: ''};
	  datepicker.setDefaults(datepicker.regional['<?= $TRAD_regional ?>']);
	  
	  return datepicker.regional['<?= $TRAD_regional ?>'];
	}));
	
	$(function() {
	  $("#date").datepicker({
	    onSelect: function(dateText, inst) {
	      window.location.href = "<?= $MY_MAIN_DIRECTORY ?>/register?class=<?= $_GET['class'] ?>&tab=" + window.currentTab + "&day="+dateText;
	    }
	  });
	  $("#date").datepicker("option", "showAnim", "slideDown");
	  $("#date").datepicker("option", $.datepicker.regional["it"]);
	});
	
	$(document).ready(function(){
	  $(".tab_marks").on("click","#marks_settings",function(e){
	    if($(".marks_settings").is(':visible')){
	      $(".marks_settings").slideUp(300);
	      $("#indicator").html('+');
	    }else{
	      $(".marks_settings").slideDown(300);
	      $("#indicator").html('-');
	    }
	  });
	});
      </script>
      <div class="dialog" id="register_profile_dialog">
	<div class="title"><span id="register_profile_dialog_title" style="float: left; cursor: default"><?= $TRAD_register_profile ?></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
	<div class="content" id="register_profile_frame">
	  <img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>
	</div>
      </div>
      <div class="dialog" id="sign_dialog">
	<div class="title"><?= $TRAD_register_sign ?><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
	<div class="content" id="sign_frame"></div>
      </div>
      <img src="" id="user_profile_picture_large" style="width: 56px; height: 56px; border: 1px solid black; position: fixed; top: calc(50% - 57px); left: calc(50% - 57px); background-color: white;
	opacity: 0;
	display:none;
	transition: opacity 0.5s linear;
	-webkit-transition: opacity 0.5s linear;
	-moz-transition: opacity 0.5s linear;
	-o-transition: opacity 0.5s linear;
	-ms-transition: opacity 0.5s linear;">
      <div class="content register_content">
	<div class="tab" style="margin-left: 20px !important">
	  <div class="tabs">
	    <span onclick="switch_tab('overview')" class="tabs_tabs tabs_overview"><?= $TRAD_register_overview ?></span>
	    <?php if($USER_type == 'docente'){ ?>
	      <span onclick="switch_tab('appello')" class="tabs_tabs tabs_appello"><?= $TRAD_register_appello ?></span>
	    <?php } ?>
	    <span onclick="switch_tab('marks')" class="tabs_tabs tabs_marks"><?= $TRAD_register_marks ?></span>
	    <span onclick="switch_tab('lessons')" class="tabs_tabs tabs_lessons"><?= $TRAD_register_lessons ?></span>
	    <?php if($USER_type == 'docente'){ ?>
	      <span onclick="switch_tab('activities')" class="tabs_tabs tabs_activities"><?= $TRAD_register_activities ?></span>
	    <?php } ?>
	    <span onclick="switch_tab('notes')" class="tabs_tabs tabs_notes"><?= $TRAD_register_notes ?></span>
	    <span onclick="switch_tab('scrutini')" class="tabs_tabs tabs_scrutini"><?= $TRAD_register_scrutini ?></span>
	    <?php if($USER_type == 'docente'){ ?>
	      <?php if($REGISTER_coordinatore == $_SESSION['Username']){ ?>
		<span onclick="switch_tab('coordinatore')" class="tabs_tabs tabs_coordinatore"><?= $TRAD_register_coordinatore ?></span>
	      <?php } ?>
	      <span onclick="sign()" class="tabs_tabs" style="float: right"><?= $TRAD_register_sign ?></span>
	    <?php } ?>
	  </div>
	  <div class="tab_content">
	    <div class="tab_tab tab_overview"></div>
	    <?php if($USER_type == 'docente'){ ?>
	      <div class="tab_tab tab_appello"></div>
	    <?php } ?>
	    <div class="tab_tab tab_marks"></div>
	    <div class="tab_tab tab_lessons"></div>
	    <?php if($USER_type == 'docente'){ ?>
	      <div class="tab_tab tab_activities"></div>
	    <?php } ?>
	    <div class="tab_tab tab_notes"></div>
	    <div class="tab_tab tab_scrutini"></div>
	    <?php if($USER_type == 'docente'){ ?>
	      <?php if($REGISTER_coordinatore == $_SESSION['Username']){ ?>
		<div class="tab_tab tab_coordinatore"></div>
	      <?php } ?>
	    <?php } ?>
	  </div>
	</div>
      </div>
    <?php }else{ ?>
      <p style="margin-top: 70px; margin-left: 50px"><?= $TRAD_register_no_class ?></p>
    <?php } ?>
    <?php include "menu.php"; ?>
  </body>
</html>
<?php }else{ ?>
<html>
  <head>
    <title><?= $TRAD_register ?> - LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <script type="text/javascript">
      function doSearch(q){
	if(q.length == 0){
	  $('.register_icon').show();
	  $('.nothing_found').hide();
	}else{
	  $('.register_icon').hide();
	  q = q.toString().toLowerCase();
	  $('.register_icon[class_name*="'+q+'"]').show();  
	  if($('.register_icon').is(':visible')) {
	    $('.nothing_found').hide();
	  }else{
	    $('.nothing_found').show();
	  }
	}
      }
    </script>
  </head>
  <body>
    <div class="content">
      <?php
	$_GET['SQL_type'] = "register_overview";
	include "view_management.php";
      ?>
      <div class="nothing_found"><?= $TRAD_register_no_class2 ?></div>
    </div>
    <?php include "menu.php"; ?>
  </body>
</html>
<?php } }else{ ?>
<html>
  <head>
    <title><?= $TRAD_register2 ?> - LightSchool</title>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <style type="text/css">
    @import url(//fonts.googleapis.com/css?family=Roboto:300);
      html, body{
	background-image: none;
	margin: 0px;
	font-family: arial;
      }
      .emergency, .cookie_bar{
	display: none;
      }
      
      @media screen and (min-width:800px) {
	html{
	  background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/classroom_login.jpg");
	  background-repeat: no-repeat;
	  background-attachment: fixed;
	  background-size: cover;
	}
	
	.register_window{
	  margin: 0 auto;
	  margin-top: 50px;
	  width: 100%;
	  min-width: 400px;
	  max-width: 800px;
	}
	.register_window .title{
	  border-radius: 20px 20px 0px 0px;
	}
	
	.dialog{
	  top: 50% !important;
	  left: 50% !important;
	  transform: translateY(-50%) translateX(-50%);
	  width: auto !important;
	  height: auto !important;
	  min-width: 400px !important;
	  max-width: 1000px !important;
	  max-height: 500px !important;
	}
	.dialog .content{
	  min-width: 400px !important;
	  width: calc(100% - 15px) !important;
	  max-width: 1000px !important;
	  max-height: 450px !important;
	  overflow-y: auto !important;
	  overflow-x: hidden !important;
	}
	.context .close{
	  display: none !important;
	}
	input[type=submit]{
	  float: right;
	  width: 200px !important;
	}
      }
      a{
	color: black;
	text-decoration: none;
      }
      a:hover, a:focus{
	text-decoration: underline;
      }
      .register_window{
	overflow-y: auto;
	max-height: 100%;
      }
      .register_window .title{
	padding: 20px;
	background-color: #004A7F;
	font-family: 'Roboto';
	color: white;
	font-size: 30pt;
	border-bottom: 6px solid #003358;
      }
      .register_window .content{
	background-color: white;
	padding: 20px;
      }
      .table{
	display: table;
	width: 100%;
	border-spacing: 5px;
      }
      .row{
	display: table-row;
	width: auto;
	clear: both;
      }
      .cell{
	float: left;
	display: table-column;
	width: 50%;
      }
      input{
	border: 1px solid gray;
	padding: 10px;
	font-size: 11pt;
	width: calc(100% - 30px);
	transition: .2s ease-in-out;
	margin-bottom: 5px;
      }
      input:hover, input:focus{
	border: 1px solid #0067CF;
	outline: none;
      }
      input:focus{
	-webkit-box-shadow: 0px 0px 10px #0067CF;
	-moz-box-shadow: 0px 0px 10px #0067CF;
	box-shadow: 0px 0px 10px #0067CF;
      }
      input[type=submit]{
	background-color: #0067CF;
	padding: 10px 20px 10px 20px;
	border: none;
	color: white;
	transition: .2s ease-in-out;
	cursor: pointer;
	width: 100%;
      }
      input:hover[type=submit], input:focus[type=submit]{
	background-color: #004F9F;
	box-shadow: none;
      }
      span.warning{
	display: inline-block;
	margin-bottom: 10px;
	color: red;
      }
      
      .overlay{
	position: fixed;
	top: 0px;
	left: 0px;
	background-color: rgba(0,0,0,0.3);
	width: 100%;
	height: 100%;
	cursor: default;
	display: none;
	z-index: 9997;
      }
  
      .dialog{
	position: fixed;
	background-color: white;
	display: none;
	border: 1px solid #0067CF;
	z-index: 9999;
	top: 0px;
	left: 0px;
	width: 100%;
	height: 100%;
	max-width: 100%;
	min-width: 100%;
      }
      .dialog .title{
	background-color: #0067CF;
	position: absolute;
	top: 0px;
	left: 0px;
	width: calc(100% - 20px);
	padding: 10px;
	color: white;
	cursor: default;
      }
      .dialog .content{
	margin: 40px 10px 10px 10px;
	display: block;
	width: calc(100% - 60px);
	height: calc(100% - 40px);
	max-width: 100%;
	min-width: 100%;
      }
      .dialog .title span{
	float: right;
	font-weight: bold;
	margin-left: 10px;
	cursor: pointer;
      }
      
      .link{
	cursor: pointer;
	color: <?= $USER_accent ?>;
	display: inline-block;
      }
      .link:hover{
	text-decoration: underline;
      }
      
      .subtitle{
	font-size: 10pt;
      }
      
      .weak, .good, .strong{
	font-weight: bold;
      }
      .short{
	color: #FF0000;
      }
      .weak{
	color: #E66C2C;
      }
      .good{
	color: #2D98F3;
      }
      .strong{
	color: #006400;
      }
    </style>
    <script type="text/javascript">
      $(document).ready(function(){
	$(".submit").click(function(e){
	  e.preventDefault();
	  
	  if($("#name").val() == ''){
	    $("#name_warning").html("<?= $TRAD_name_warning ?>");
	  }else{
	    $("#name_warning").html("&nbsp;");
	  }
	  
	  if($("#surname").val() == ''){
	    $("#surname_warning").html("<?= $TRAD_surname_warning ?>");
	  }else{
	    $("#surname_warning").html("&nbsp;");
	  }
	  
	  if($("#email").val() == ''){
	    $("#email_warning").html("<?= $TRAD_email_warning ?>");
	    window.email = '';
	  }else{
	    var email = $("#email").val();
	    if(email.indexOf('@') > -1){
	      var email_after = email.substr(email.indexOf("@") + 1);
	      if(email_after.indexOf('.') > -1){
		var email_after2 = email_after.substr(email_after.indexOf(".") + 1);
		if(email_after2.length > 0){
		  $("#email_warning").html("&nbsp;");
		  window.email = 'ok';
		}else{
		  $("#email_warning").html("<?= $TRAD_email_warning2 ?>");
		  window.email = '';
		}
	      }else{
		$("#email_warning").html("<?= $TRAD_email_warning2 ?>");
		window.email = '';
	      }
	    }else{
	      $("#email_warning").html("<?= $TRAD_email_warning2 ?>");
	      window.email = '';
	    }
	  }
	  
	  if($("#username2").val() == ''){
	    $("#username_warning").html("<?= $TRAD_username_warning ?>");
	    window.username = '';
	  }else{
	    var username = $("#username2").val();
	    if(username.indexOf('.') > -1 || username.indexOf(':') > -1 || username.indexOf(' ') > -1 || username.indexOf(',') > -1 || username.indexOf('/') > -1 || username.indexOf('@') > -1 || username.indexOf('\\') > -1){
	      $("#username_warning").html("<?= $TRAD_invalid_char ?> <strong>. , : / \ @ spazio</strong>");
	      window.username = '';
	    }else{
	      $("#username_warning").html("&nbsp;");
	      window.username = 'ok';
	    }
	  }
	  
	  if($("#password2").val() == ''){
	    $("#password_warning").html("<?= $TRAD_pwd_warning ?>");
	  }else{
	    $("#password_warning").html("&nbsp;");
	  }
	  
	  if($("#name").val() != '' && $("#surname").val() != '' && window.username == 'ok' && window.email == 'ok' && $("#password").val() != ''){
	    username = $("#username2").val();
	    password = $("#password2").val();
	    email = $("#email").val();
	    name = $("#name").val();
	    surname = $("#surname").val();
	    
	    $.ajax({
	      type: "POST",
	      url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=register",
	      data: "username="+username+"&password="+password+"&email="+email+"&name="+name+"&surname="+surname,
	      success: function(html){
		if(html.indexOf('true') > -1){
		  $(".content").html(html);
		}else{
		  $(".response").html(html);
		  $(".response").css('color', 'red', 'important');
		}
	      },
	      beforeSend:function(){
		$(".response").css('display', 'inline', 'important');
		$(".response").css('color', 'black', 'important');
		$(".response").html("<center><br/><br/><img src='<?= $IMAGES_MAIN_DIRECTORY.'/monochromatic/black/loading.gif' ?>' style='margin-right: 10px' /><?= $TRAD_loading ?></center>");
	      }
	    });
	  }
	});

	$('#password2').keyup(function(){
	  $('#result_password_strength').html(checkStrength($('#password2').val()));
	});
	
	function checkStrength(password){
	  //initial strength
	  var strength = 0
	  
	  //if the password length is less than 6, return message.
	  if(password.length < 3) { 
	    $('#result_password_strength').removeClass()
	    $('#result_password_strength').addClass('short')
	    return '<?= $TRAD_pwd_warning2 ?>';
	  }
	  
	  //length is ok, lets continue.
	  
	  //if length is 8 characters or more, increase strength value
	  if (password.length > 7) strength += 1
	  
	  //if password contains both lower and uppercase characters, increase strength value
	  if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
	  
	  //if it has numbers and characters, increase strength value
	  if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 
	  
	  //if it has one special character, increase strength value
	  if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
	  
	  //if it has two special characters, increase strength value
	  if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
	  
	  //now we have calculated strength value, we can return messages
	  
	  //if value is less than 2
	  if(strength < 2){
	    $('#result_password_strength').removeClass()
	    $('#result_password_strength').addClass('weak')
	    return '<?= $TRAD_pwd_warning3 ?>';
	  }
	  else if(strength == 2){
	    $('#result_password_strength').removeClass()
	    $('#result_password_strength').addClass('good')
	    return '<?= $TRAD_pwd_warning4 ?>';
	  }
	  else{
	    $('#result_password_strength').removeClass()
	    $('#result_password_strength').addClass('strong')
	    return '<?= $TRAD_pwd_warning5 ?>';
	  }
	}
      });
      
      function license(){
	$('#license_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
      }
      function privacy(){
	$('#privacy_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
      }
      function schools(){
	$('#schools_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
      }
      
      function closeDialog(){
	$('.dialog').fadeOut(200);
	$('#dialog_overlay').fadeOut(200);
      }
      
      function generatepassword(){
	  var text = "";
	  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	  for( var i=0; i < 8; i++ )
	      text += possible.charAt(Math.floor(Math.random() * possible.length));

	  $('#password2').val(text);
	  showhidepassword('force_show');
      }
      
      function showhidepassword(type){
	if($('#password2').attr('type') == 'password' || type == 'force_show'){
	  $('#password2').attr('type', 'text');
	  $('#showhidepassword').html('<?= $TRAD_pwd_hide ?>');
	}else{
	  $('#password2').attr('type', 'password');
	  $('#showhidepassword').html('<?= $TRAD_pwd_show ?>');
	}
      }
    </script>
  </head>
  <body>
    <div class="overlay" id="dialog_overlay">
      
    </div>
    <div class="dialog" id="license_dialog">
      <div class="title">Contratto d'utilizzo<span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_white.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content">
	<div id="license_frame" style="overflow-y: auto; min-height: 200px; height: 100%">
	  <center>
	    <h1>Condizioni d'utilizzo</h1>
	    <p style="font-size: 14pt; font-weight: bold">1. Diritto d'utilizzo del servizio LightSchool</p>
	    <p style="line-height:21px;">L'utente registrandosi a LightSchool dichiara di usarlo per fini non commerciali.
	    L' utente dichiara di essere il solo e unico responsabile del proprio account e della propria password.<br>
	    Se il tuo account dovesse essere hackerato, ti invitiamo a cambiare password e a contattare la nostra e-mail di supporto tecnico <a href="mailto:MAIL_SUPPORT_ADDRESS">MAIL_SUPPORT_ADDRESS<script cf-hash="f9e31" type="text/javascript">
	    /* <![CDATA[ */!function(){try{var t="currentScript"in document?document.currentScript:function(){for(var t=document.getElementsByTagName("script"),e=t.length;e--;)if(t[e].getAttribute("cf-hash"))return t[e]}();if(t&&t.previousSibling){var e,r,n,i,c=t.previousSibling,a=c.getAttribute("data-cfemail");if(a){for(e="",r=parseInt(a.substr(0,2),16),n=2;a.length-n;n+=2)i=parseInt(a.substr(n,2),16)^r,e+=String.fromCharCode(i);e=document.createTextNode(e),c.parentNode.replaceChild(e,c)}}}catch(u){}}();/* ]]> */</script></a>.</p><br>
	    <p style="font-size: 14pt; font-weight: bold">2. Diritto di eliminazione o sospensione dell'account da LightSchool</p>
	    <p style="line-height:21px;">Il Team di LightSchool si riserva il diritto di sospendere o eliminare permanentemente o temporaneamente un account se tale account dovesse violare il contratto d'utilizzo (il presente documento).
	    La sospensione dell'account consiste nel bloccare l'accesso all'utente (e ai relativi file come Quaderni, Diario, Orario e qualsiasi funzione legata all'account) per un tempo variabile, durata valutata in rapporto alla gravit&agrave; della trasgressione.
	    L'eliminazione dell'account pu&ograve; avvenire in casi di estrema gravit&agrave; e consiste nell'eliminazione permanente dell'account dal servizio, con conseguente perdita di tutti i file archiviati; l' utente potr&agrave; comunque creare un nuovo account, ma non potr&agrave; chiedere la restituzione dei file, dei dati personali o di tutto ci&ograve; che era stato precedentemente inserito nell' account, in quanto verr&agrave; immediatamente eliminato.</p><br>
	    <p style="font-size: 14pt; font-weight: bold">3. Materiale offensivo e/o illegale</p>
	    <p style="line-height:21px;">Tutti i dati inseriti in LightSchool non devono offendere un soggetto, un ente (o azienda), uno stato, un'idea politica e/o sociale e non devono contenere frasi di razzismo, discriminazione (sessuale, religiosa, ...), droghe o sostanze stupefacenti, porno, armi, pedofilia e qualsiasi altro materiale illegale.
	    Nel caso vi fosse la presenza di uno (o pi&ugrave;) di tali contenuti, il Team di LightSchool si avvale del diritto di eliminare (o moderare) tali contenuti e di richiamare l' utente tramite una email.<br>Se l'utente continuasse a pubblicare tali contenuti evitando di attenersi al regolamento e ai richiami, sar&agrave; sospeso o cancellato (vedi punto 2) con conseguente email di notifica da un membro del Team.</p><br>
	    <p style="font-size: 14pt; font-weight: bold">5. Comunicazioni tramite email</p>
	    <p style="line-height:21px;">LightSchool invia e-mail agli utenti registrati solo tramite il loro consenso. Comunicazioni importanti di servizio invece verranno comunicate a tutti, a prescindere dalla scelta di essere contattati o meno via e-mail.</p><br>
	    <p style="font-size: 14pt; font-weight: bold">6. Contenuti pubblicitari</p>
	    <p style="line-height:21px;">LightSchool non invier&agrave; materiale promozionale alla tua casella di posta elettronica senza il tuo consenso.</p><br>
	    <p style="font-size: 14pt; font-weight: bold">7. Funzione "Cerca Utenti"</p>
	    <p style="line-height:21px;">LightSchool ha di recente introdotto la funzione "Cerca Utenti" che permette agli iscritti a LightSchool di cercare studenti e docenti a loro volta iscritti al sito.<br>
	    Il tuo account &egrave; automaticamente visibile nei risultati di ricerca, ma puoi disattivare questa funzione dalle impostazioni del tuo account.<br>
	    Puoi inoltre scegliere cosa vuoi che venga mostrato pubblicamente del tuo account.</p>
	    <br>
	    <i>Ultimo aggiornamento:</i> Sabato 31 Gennaio 2015 14:00
	  </center>
	</div>
      </div>
    </div>
    <div class="dialog" id="privacy_dialog">
      <div class="title">Informativa sulla privacy<span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_white.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content">
	<div id="privacy_frame" style="overflow-y: auto; min-height: 200px; height: 100%">
	  <center>
	    <h1>Informativa ai sensi dell'art. 13 del Codice della Privacy - (D.lg. n. 196/2003)</h1>
	    <p style="line-height:21px;">LightSchool rispetta la privacy dei suoi clienti e si impegna a proteggerla.<br><br>LightSchool fornisce la presente Dichiarazione sulla riservatezza dei dati personali al fine di divulgare le norme e le procedure che regolano il trattamento di tali dati nonch&egrave; rendere pubbliche le modalit&agrave; di raccolta e di uso di essi e le scelte a disposizione dell'utente.&nbsp;<br><br>Il sito Web www.lightschool.it &egrave; strutturato in modo da consentire all'utente di visitarlo anche senza identificarsi o divulgare in alcun modo informazioni personali. La Dichiarazione sulla riservatezza dei dati personali &egrave; disponibile nella desktop page e al termine di ciascuna pagina Web.<br><br>l trattamento dei dati personali, raccolti con la compilazione dell'apposito modulo, avviene, con modalit&agrave; anche automatizzate, per l'invio di informazioni commerciali e pubblicitarie esclusivamente da parte di LightSchool, nonch&egrave; per l'esecuzione degli eventuali ordini di acquisto oltre che, ove specificatamente indicato nelle singole sezioni web, per altre finalit&agrave; ivi espresse e correlate alla fruizione di servizi specificatamente richiesti dall'interessato.<br><br>I dati sono conosciuti dal personale di LightSchool incaricato del trattamento.<br>Con il consenso dell'interessato potranno essere utilizzati tramite e-mail per l'invio di materiale pubblicitario, vendita diretta ed informazioni commerciali. I dati personali forniti dagli utenti che inoltrano richieste di invio di materiale informativo (bollettini, newsletter, risposte a quesiti, ecc.) sono utilizzati al solo fine di eseguire il servizio o la prestazione richiesta e sono comunicati a terzi nel solo caso in cui ci&ograve; sia a tal fine necessario (servizio di spedizione). Nel rispetto della legge, i dati saranno comunicati esclusivamente a soggetti per finalit&agrave; ausiliarie al rapporto principale (banche, posta, agenzie di recapito, ecc.) ovvero incaricati del trattamento dalla scrivente (ufficio commerciale, fatturazione, amministrazione, contabilit&agrave;, stampa, web hosting).&nbsp;<br><br>Per i diritti di accesso, correzione, integrazione, cancellazione, opposizione al trattamento di cui all'art. 7 del D.lg. 196/03 l'interessato potr&agrave; rivolgersi al nostro servizio di assistenza cliccando su: <a href="mailto:info@lightschool.it">info@lightschool.it<script cf-hash="f9e31" type="text/javascript">
	    /* <![CDATA[ */!function(){try{var t="currentScript"in document?document.currentScript:function(){for(var t=document.getElementsByTagName("script"),e=t.length;e--;)if(t[e].getAttribute("cf-hash"))return t[e]}();if(t&&t.previousSibling){var e,r,n,i,c=t.previousSibling,a=c.getAttribute("data-cfemail");if(a){for(e="",r=parseInt(a.substr(0,2),16),n=2;a.length-n;n+=2)i=parseInt(a.substr(n,2),16)^r,e+=String.fromCharCode(i);e=document.createTextNode(e),c.parentNode.replaceChild(e,c)}}}catch(u){}}();/* ]]> */</script></a> , presso cui si pu&ograve; inoltre conoscere l'elenco aggiornato, comprensivo degli indirizzi degli eventuali terzi destinatari di comunicazioni dei dati personali.&nbsp;<br><br>L'articolo 7 del D.Lgs. 196/03 dispone il "Diritto di accesso ai dati personali ed altri diritti":&nbsp;<br><br>1. L'interessato ha diritto di ottenere la conferma dell'esistenza o meno di dati personali che lo riguardano, anche se non ancora registrati, e la loro comunicazione in forma intelligibile.&nbsp;<br><br>2. L'interessato ha diritto di ottenere l'indicazione:&nbsp;<br><br>(a) dell'origine dei dati personali; (b) delle finalit&agrave; e modalit&agrave; del trattamento; (c) della logica applicata in caso di trattamento effettuato con l'ausilio di strumenti elettronici; (d) degli estremi identificativi del titolare, dei responsabili e del rappresentante designato ai sensi dell'articolo 5, comma 2; (e) dei soggetti o delle categorie di soggetti ai quali i dati personali possono essere comunicati o che possono venirne a conoscenza in qualit&agrave; di rappresentante designato nel territorio dello Stato, di responsabili o incaricati.&nbsp;<br><br>3. L'interessato ha diritto di ottenere: (a) l'aggiornamento, la rettificazione ovvero, quando vi ha interesse, l'integrazione dei dati; (b) la cancellazione, la trasformazione in forma anonima o il blocco dei dati trattati in violazione di legge, compresi quelli di cui non &egrave; necessaria la conservazione in relazione agli scopi per i quali i dati sono stati raccolti o successivamente trattati; (c) l'attestazione che le operazioni di cui alle lettere (a) e (b) sono state portate a conoscenza, anche per quanto riguarda il loro contenuto, di coloro ai quali i dati sono stati comunicati o diffusi, eccettuato il caso in cui tale adempimento si rivela impossibile o comporta un impiego di mezzi manifestamente sproporzionato rispetto al diritto tutelato.&nbsp;<br><br>
	    LightSchool includono una funzione denominata <i>Controllo accessi</i> che permette di disconnettere e bloccare i dispositivi collegati al proprio account. Il sistema si basa sull'acquisizione dell'indirizzo IP e user agent (sistema operativo e browser) del dispositivo dal quale si accede. L'acquisizione di queste informazioni viene effettuata al solo scopo di garantire maggiore sicurezza all'account.<br>
	    La funzione &egrave; tuttavia disattivabile a discrezione dell'utente. Per disattivare la funzione: accedere al sito &gt; cliccare su <i>Impostazioni</i> &gt; alla voce <i>Controllo accessi</i> cliccare nel box a fianco e selezionare <i>Disattivo</i>. Per riabilitare la funzione, seguire la stessa procedura, selezionando per&ograve; <i>Attivo</i> quando si clicca sul box.<br>
	    Quando la funzione &egrave; disattivata, il sistema smette di registrare i nuovi accessi, tuttavia gli accessi precedenti alla disattivazione rimangono salvati per evitare che un intruso ne approfitti.<br>
	    Per richiedere la cancellazione di tutte le registrazione, inviateci una e-mail a <a href="mailto:MAIL_SUPPORT_ADDRESS">MAIL_SUPPORT_ADDRESS<script cf-hash="f9e31" type="text/javascript">
	    /* <![CDATA[ */!function(){try{var t="currentScript"in document?document.currentScript:function(){for(var t=document.getElementsByTagName("script"),e=t.length;e--;)if(t[e].getAttribute("cf-hash"))return t[e]}();if(t&&t.previousSibling){var e,r,n,i,c=t.previousSibling,a=c.getAttribute("data-cfemail");if(a){for(e="",r=parseInt(a.substr(0,2),16),n=2;a.length-n;n+=2)i=parseInt(a.substr(n,2),16)^r,e+=String.fromCharCode(i);e=document.createTextNode(e),c.parentNode.replaceChild(e,c)}}}catch(u){}}();/* ]]> */</script></a> dal vostro indirizzo e-mail corrispondente a quello registrato sul vostro account.
	    </p>
	  </center>
	</div>
      </div>
    </div>
    <div class="dialog" id="schools_dialog">
      <div class="title"><?= $TRAD_supported_school ?><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_white.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content">
	<div id="schools_frame" style="overflow-y: auto; min-height: 200px; height: 50%">
	  <p><?= $TRAD_supported_school_descr ?></p>
	  <span style="font-weight: bold; font-size: 18pt">Italia</span><br/>
	  <span style="font-weight: bold; font-size: 15pt">Veneto</span><br/>
	  <span style="font-weight: bold; font-size: 11pt">Padova</span><br/>
	  <span style="font-size: 11pt">EinaudiGramsci @einaudigramsci.it</span>
	</div>
      </div>
    </div>
    <div class="register_window">
      <div class="title">
	<img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo.png" style="width: 54px; height: 54px; float: left; margin-right: 10px"><?= $TRAD_register2 ?>
      </div>
      <div class="content">
	<form method="post" action="">
	  <div class="response" style="color: red; font-weight: bold; text-align: center; margin-bottom: 20px"></div>
	  <div class="table">
	    <div class="row">
	      <div class="cell"><?= $TRAD_name ?></div>
	      <div class="cell"><?= $TRAD_surname ?></div>
	    </div>
	    <div class="row">
	      <div class="cell"><input type="text" id="name" name="name" placeholder="<?= $TRAD_name ?>" autocomplete="off" /><span id="name_warning" class="warning">&nbsp;</span></div>
	      <div class="cell"><input type="text" id="surname" name="surname" placeholder="<?= $TRAD_surname ?>" autocomplete="off" /><span id="surname_warning" class="warning">&nbsp;</span></div>
	    </div>
	    <div class="row">
	      <div class="cell"><?= $TRAD_email ?></div>
	      <div class="cell"><?= $TRAD_username ?><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/help.png" style="margin-left: 10px; width: 14px; height: 14px" onclick="alert('<?= $TRAD_username_descr ?>')"></div>
	    </div>
	    <div class="row">
	      <div class="cell"><input type="text" id="email" name="email" placeholder="<?= $TRAD_email ?>" autocomplete="off" /><span id="email_warning" class="warning">&nbsp;</span></div>
	      <div class="cell"><input type="text" id="username2" name="username2" placeholder="<?= $TRAD_username ?>" autocomplete="off" /><span id="username_warning" class="warning">&nbsp;</span></div>
	    </div>
	    <span class="subtitle">Assicurati che l'indirizzo e-mail sia corretto! Ti invieremo un link per attivare l'account.<br/>
	    Per registrarti come docente o scuola, utilizza un indirizzo e-mail <strong>@istruzione.it</strong> o <strong class="link" onclick="schools()">un indirizzo e-mail della tua scuola</strong>. Al primo accesso ti chiederemo se sei un docente o una scuola.<br/><br/></span>
	    <div class="row">
	      <div class="cell" style="width: 100%"><?= $TRAD_password ?><span onclick="generatepassword()" class="link" style="margin-left: 20px"><?= $TRAD_pwd_generate ?></span><span onclick="showhidepassword()" class="link" id="showhidepassword" style="margin-left: 20px"><?= $TRAD_pwd_show ?></span><span id="result_password_strength" style="margin-left: 20px; display: inline-block"></span></div>
	    </div>
	    <div class="row">
	      <div class="cell" style="width: 100%"><input type="password" id="password2" name="password2" placeholder="<?= $TRAD_password ?>" autocomplete="off" /><span id="password_warning" class="warning">&nbsp;</span></div>
	    </div>
	  </div>
	  <div><?= $TRAD_register_license ?><br/><br/></div>
	  <div><input type="submit" class="submit" value="<?= $TRAD_register_btn ?>"><br/><br/></div>
	</form>
      </div>
    </div>
  </body>
</html>
<?php } ?>