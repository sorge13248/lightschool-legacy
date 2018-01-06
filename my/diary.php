<?php include_once "base.php";
if($_SESSION['Username'] != ''){
  if($_GET['id'] != ''){
    ?>
      <html>
	<head>
	  <title>Evento diario - LightSchool</title>
	  <script>
	    $(function() {
	      $("#date2").datepicker();
	      $("#reminder2").datepicker({ 
		minDate: 0,
		beforeShow : function()
		{
		  jQuery(this).datepicker('option','maxDate', jQuery('#date').val());
		}
		}
	      );
	      $("#date2, #reminder2").datepicker("option", "showAnim", "slideDown");
	      $("#date2, #reminder2").datepicker("option", $.datepicker.regional["it"]);
	      
	    });
	  </script>
	</head>
	<body>
	  <div id="diary_event_overview">
	    <?php
	      $_GET['SQL_type'] = 'diary_element';
	      include "view_management.php";
	    ?>
	  </div>
	  <div id="diary_event_edit" style="display: none">
	    <?php
	      $_GET['SQL_type'] = 'diary_element_edit';
	      include "view_management.php";
	    ?>
	  </div>
	</body>
      </html>
    <?php
  }else{
  include_once "delete_management.php";
?>
<html>
  <head>
    <title><?= $TRAD_diary2 ?> - LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <?php include_once "color_management.php"; ?>
    <script type="text/javascript">
      var selected_file = new Array();
    
      function closeDialog(){
	$('.dialog').fadeOut(200);
	$('#dialog_overlay').fadeOut(200);
      }
      
      $(document).ready(function(){
	$('#diary, #more_frame').on('click',".diary_event_single", function(e){
	  closeDialog();
	  $("#details_diary, #details_frame").removeClass('width_700_important');
	  $('#dialog_overlay').fadeIn(200);
	  $('#details_diary').fadeIn(200);
	  window.id_diary_edit = $(this).attr("diary_id");
	  document.getElementById("diaryName").innerHTML = $(this).attr("diary_name");
	  $('#details_frame').html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	  $('#details_frame').load('diary.php?id=' + window.id_diary_edit + '&dialog=true');
	  e.stopPropagation();
	});
	$('#diary').on('click',".diary_day", function(e){
	  if($(document).width() <= 630){
	    window.id_diary_day = $(this).attr("day");
	    $('#dialog_overlay').fadeIn(200);
	    $('#more_dialog').fadeIn(200);
	    $('#more_frame').html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	    $('#more_frame').load('view_management.php?SQL_type=diary_more&day=' + window.id_diary_day + '&dialog=true');
	  }
	  e.stopPropagation();
	});
      });
      
      function subject_input_fun(name){
	if(name.length == 0){
	  $('#subject_input_autosuggestion').slideUp(200);
	}else{
	  name = name.toString().toLowerCase();
	  $('.autosuggestion > p').hide();
	  $('[subject*="'+name+'"]').show();
	  $('#subject_input_autosuggestion').slideDown(200);
	}
      }
      
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
	$("#date").datepicker();
	$("#reminder").datepicker({ 
	  minDate: 0,
	  beforeShow : function()
	  {
	    jQuery(this).datepicker('option','maxDate', jQuery('#date').val());
	  }
	  }
	);
	$("#date, #reminder").datepicker("option", "showAnim", "slideDown");
	$("#date, #reminder").datepicker("option", $.datepicker.regional["it"]);
	
      });
      
      function compile_subject(name, fore_color, book){
	$('#accentcolor').val(fore_color);
	$('#subject').val(name);
	$("#accentcolor").css('background-color', fore_color);
	$("#accentcolor, #subject").css('color', fore_color);
	$("#accentcolor").css('border', '1px solid ' + fore_color);
	$('#subject_input_autosuggestion').slideUp(200);
      }
      
      function update_diary(){
	$("#diary_event_overview").fadeOut(300);
	$("#diary_event_edit").delay(301).fadeIn(300);
	$("#details_diary, #details_frame").addClass('width_700_important');
	$("#date2").datepicker();
	$("#reminder2").datepicker({ 
	  minDate: 0,
	  beforeShow : function()
	  {
	    jQuery(this).datepicker('option','maxDate', jQuery('#date2').val());
	  }
	  }
	);
	$("#date2, #reminder2").datepicker("option", "showAnim", "slideDown");
	$("#date2, #reminder2").datepicker("option", $.datepicker.regional["it"]);
      }
      
      function update_diary_confirm(){
	date2=$("#date2").val();
	subject2=$("#subject2").val();
	type2=$("#type2").val();
	accentcolor2=$("#accentcolor2").val();
	reminder2=$("#reminder2").val();
	content_editable_true_div2=$(".content_editable_true_div_edit_diary").html();
	
	if(date2 != '' && subject2 != '' && type2 != ''){
	  $.ajax({
	    type: "POST",
	    url: "formpost.php?type=update_diary&id="+window.id_diary_edit,
	    data: "date="+date2+"&subject="+subject2+"&type="+type2+"&reminder="+reminder2+"&content_editable_true_div="+content_editable_true_div2+"&accentcolor="+accentcolor2,
	    success: function(html){
	      if(html=='true'){
		$(".toast").css("background-color", "darkgreen");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_diary_edit ?>");
		
		$("#subject").val('');
		$("#accentcolor").val('');
		$("#date").val('');
		$("#type").val('Compiti');
		$("#reminder").val('');
		$("#content_editable_true_div").html('');
		$('#subject_input_autosuggestion').slideUp(200);
		
		$('#diary').load('diary_view.php');
		closeDialog();
		// $("#fastnote_title").html(html);
	      }else{
		$(".toast").css("background-color", "red");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	      }
	    },
	    beforeSend:function(){
	      $(".toast").css("background-color", "orange");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	    }
	  });
	}else{
	  $(".toast").css("background-color", "red");
	  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_diary_field_error ?>");
	}
	$(".toast").slideDown(400);
      }
      
      function createDiary(){
	date=$("#date").val();
	subject=$("#subject").val();
	type=$("#type").val();
	accentcolor=$("#accentcolor").val();
	reminder=$("#reminder").val();
	content_editable_true_div=$("#content_editable_true_div").html();
	
	if(date != '' && subject != '' && type != ''){
	  $.ajax({
	    type: "POST",
	    url: "formpost.php?type=add_diary",
	    data: "date="+date+"&subject="+subject+"&type="+type+"&reminder="+reminder+"&content_editable_true_div="+content_editable_true_div+"&accentcolor="+accentcolor,
	    success: function(html){
	      if(html=='true'){
		$(".toast").css("background-color", "darkgreen");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_diary_created ?>");
		
		$("#subject").val('');
		$("#accentcolor").val('');
		$("#date").val('');
		$("#type").val('Compiti');
		$("#reminder").val('');
		$("#content_editable_true_div").html('');
		$('#subject_input_autosuggestion').slideUp(200);
		
		$('#diary').load('diary_view.php');
		closeDialog();
		// $("#fastnote_title").html(html);
	      }else{
		$(".toast").css("background-color", "red");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	      }
	    },
	    beforeSend:function(){
	      $(".toast").css("background-color", "orange");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	    }
	  });
	}else{
	  $(".toast").css("background-color", "red");
	  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_diary_field_error?>");
	}
	$(".toast").slideDown(400);
      }
    </script>
    <div class="dialog" id="more_dialog">
      <div class="title"><?= $TRAD_diary_details ?><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="more_frame"></div>
    </div>
    <div class="dialog" id="new_diary" style="width: 700px !important">
      <div class="title"><?= $TRAD_diary_new ?><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="new_diary_frame">
	<?php
	  $_GET['EDITOR_type'] = 'min';
	  $_GET['EDITOR_kind'] = 'new_diary';
	  include_once "editor.php";
	?>
	<label for="type"><?= $TRAD_type ?></label><br/>
	<select id="type" name="type" style="width: 320px !important">
	  <option><?= $TRAD_diary_type[0] ?></option>
	  <option><?= $TRAD_diary_type[1] ?></option>
	  <option><?= $TRAD_diary_type[2] ?></option>
	  <option><?= $TRAD_diary_type[3] ?></option>
	  <option><?= $TRAD_diary_type[4] ?></option>
	  <option><?= $TRAD_diary_type[5] ?></option>
	  <option><?= $TRAD_diary_type[6] ?></option>
	  <option><?= $TRAD_diary_type[7] ?></option>
	  <option><?= $TRAD_diary_type[8] ?></option>
	  <option><?= $TRAD_diary_type[9] ?></option>
	  <option><?= $TRAD_diary_type[10] ?></option>
	  <option><?= $TRAD_diary_type[11] ?></option>
	</select><br/><br/>
	<input type="text" id="accentcolor" name="accentcolor" placeholder="Colore" value="#000000" style="color: black; background-color: black; width: 10px; height: 10px; border-radius: 50%; margin-right: 10px" readonly="readonly" autocomplete="off" /><input type="text" id="subject" name="subject" placeholder="<?= $TRAD_subject ?>" oninput="subject_input_fun(this.value)" autocomplete="off" style="width: 260px !important" />
	<div id="subject_input_autosuggestion" class="autosuggestion" style="width: 270px !important; max-width: 270px !important; min-width: 270px !important">
	  <?php
	    $_GET['SQL_type'] = 'timetable_subject';
	    include "view_management.php";
	  ?>
	</div><br style="line-height: 20px"/>
	<label for="date"><?= $TRAD_date ?></label><br/>
	<input type="text" id="date" name="date" placeholder="<?= $TRAD_date ?>" autocomplete="off" readonly="readonly" style="width: 300px !important" /><br/>
	<label for="reminder"><?= $TRAD_reminder ?></label><br/>
	<input type="text" id="reminder" name="reminder" placeholder="<?= $TRAD_reminder ?>" autocomplete="off" readonly="readonly" style="width: 300px !important" /><br/><br/>
	<button style="margin-right: 25px" onclick="createDiary()"><?= $TRAD_save ?></button>
      </div>
    </div>
    <div class="dialog" id="details_diary">
      <div class="title"><span id="diaryName" style="float: left; font-weight: normal"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="details_frame"></div>
    </div>
  </head>
  <body>
    <div class="content" id="diary" style="margin-top: 40px !important; margin-bottom: 650px !important">
      <?php include_once "diary_view.php"; ?>
    </div>
    <script type="text/javascript">
      function newDiary(day){
	$("#reminder").val('');
	$('#new_diary').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	if(day.length == 1){
	  day = '0' + day;
	}
	if(day.length > 0){
	  $("#date").val(day + '/<?= $month ?>/<?= $year ?>');
	}else{
	  $("#date").val('');
	}
      }
    </script>
    <?php include_once "menu.php"; ?>
  </body>
</html>
<?php } }else{
  include_once "login.php";
} ?>