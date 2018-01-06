<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<html>
  <head>
    <title><?= $TRAD_timetable ?> - LightSchool</title>
    <?php
      include_once "style_$USER_skin.php";
      include_once "color_management.php";
    ?>
    <script type="text/javascript">
      var selected_file = new Array();
      
      function newTimetable(id, day, hour, name, book, fore_color){
	closecontext();
	window.timetableID = id;
	if(id != ''){
	  $('#add_subject_button').html('<?= $TRAD_edit_subject ?>');
	  $('#new_subject .title .subject_title').html('<?= $TRAD_edit_subject ?>');
	  $('#day').val(day);
	  $('#hour').val(hour);
	  $('#day, #hour').trigger("chosen:updated");
	  $('#subject').val(name);
	  $('#book').val(book);
	  $('#accentcolor').val(fore_color);
	  $("#accentcolor").css('background-color', fore_color);
	  $("#accentcolor, #subject").css('color', fore_color);
	  $("#accentcolor").css('border', '1px solid ' + fore_color);
	}else{
	  $('#add_subject_button').html('<?= $TRAD_add_subject ?>');
	  $('#new_subject .title .subject_title').html('<?= $TRAD_new_subject?>');
	  restoreValues();
	}
	$('#new_subject').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
      }
      
      function restoreValues(){
	$('#day').val('1');
	$('#hour').val('0800');
	$('#day, #hour').trigger("chosen:updated");
	$("#subject").val('');
	$("#book").val('');
	$('#accentcolor').val('#000000');
	$("#accentcolor").css('background-color', '#000000');
	$("#accentcolor, #subject").css('color', '#000000');
	$("#accentcolor").css('border', '1px solid ' + '#000000');
      }
      
      function closeDialog(){
	$('.dialog').fadeOut(200);
	$('#dialog_overlay').fadeOut(200);
      }
      
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
      
      function compile_subject(name, fore_color, book){
	$('#subject').val(name);
	$('#accentcolor').val(fore_color);
	$("#accentcolor").css('background-color', fore_color);
	$("#accentcolor, #subject").css('color', fore_color);
	$("#accentcolor").css('border', '1px solid ' + fore_color);
	$('#book').val(book);
	$('#subject_input_autosuggestion').slideUp(200);
      }
      
      function addSubject(){
	day=$("#day").val();
	hour=$("#hour").val();
	subject=$("#subject").val();
	fore_color=$("#accentcolor").val();
	book=$("#book").val();
	
	if(day != '' && hour != '' && subject != ''){
	  $.ajax({
	    type: "POST",
	    url: "formpost.php?type=add_subject",
	    data: "day="+day+"&hour="+hour+"&subject="+subject+"&fore_color="+fore_color+"&book="+book+"&id="+window.timetableID,
	    success: function(html){
	      if(html=='true'){
		$(".toast").css("background-color", "darkgreen");
		if(window.timetableID != ''){
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_subject_edited ?>");
		  closeDialog();
		}else{
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_subject_added ?>");
		}
		restoreValues();
		$('#subject_input_autosuggestion').slideUp(200);
		
		$('#subject_input_autosuggestion').load('view_management.php?SQL_type=timetable_subject');
		$('#timetable').load('view_management.php?SQL_type=timetable');
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
      
      $(function(){
	$("#timetable").on("contextmenu", ".timetable_subject",function(e){
	  $("#context").css({left:e.pageX, top:e.pageY});
	  contextmenu($(this).attr('id'));
	  e.preventDefault();
	});
      });
      
      function contextmenu(id){
	$('#context').html('<span class="nohover"><?= $TRAD_loading ?></span>');
	$('#context').load('<?= $MY_MAIN_DIRECTORY ?>/contextmenu.php?id='+id+'&type=subject');
	$('#context').slideDown(200);
	$('#context_overlay').fadeIn(200);
      }
    </script>
    <?php
      include "delete_management.php";
    ?>
    <div class="dialog" id="new_subject">
      <div class="title"><font class="subject_title"><?= $TRAD_new_subject ?></font><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="new_subject_frame">
	<label for="day"><?= $TRAD_day2 ?></label><br/>
	<select id="day" name="day" style="">
	  <option value="1"><?= $TRAD_day[1] ?></option>
	  <option value="2"><?= $TRAD_day[2] ?></option>
	  <option value="3"><?= $TRAD_day[3] ?></option>
	  <option value="4"><?= $TRAD_day[4] ?></option>
	  <option value="5"><?= $TRAD_day[5] ?></option>
	  <option value="6"><?= $TRAD_day[6] ?></option>
	</select><br/><br/>
	<label for="hour">Ora</label><br/>
	<select id="hour" name="hour" style="">
	  <option value="0800"><?= $TRAD_timetable_hour[0] ?></option>
	  <option value="0900"><?= $TRAD_timetable_hour[1] ?></option>
	  <option value="1000"><?= $TRAD_timetable_hour[2] ?></option>
	  <option value="1100"><?= $TRAD_timetable_hour[3] ?></option>
	  <option value="1200"><?= $TRAD_timetable_hour[4] ?></option>
	  <option value="1300"><?= $TRAD_timetable_hour[5] ?></option>
	  <option value="1400"><?= $TRAD_timetable_hour[6] ?></option>
	  <option value="1500"><?= $TRAD_timetable_hour[7] ?></option>
	  <option value="1600"><?= $TRAD_timetable_hour[8] ?></option>
	  <option value="1700"><?= $TRAD_timetable_hour[9] ?></option>
	  <option value="1800"><?= $TRAD_timetable_hour[10] ?></option>
	  <option value="1900"><?= $TRAD_timetable_hour[1] ?></option>
	  <option value="2000"><?= $TRAD_timetable_hour[12] ?></option>
	</select><br/><br/>
	<input type="text" id="accentcolor" name="accentcolor" placeholder="<?= $TRAD_color ?>" value="#000000" style="color: black; background-color: black; width: 10px; height: 10px; border-radius: 50%; margin-right: 10px" readonly="readonly" autocomplete="off" /><input type="text" id="subject" name="subject" placeholder="<?= $TRAD_subject ?>" oninput="subject_input_fun(this.value)" autocomplete="off" style="width: calc(100% - 77px)" />
	<div id="subject_input_autosuggestion" class="autosuggestion" style="width: calc(100% - 65px) !important; max-height: 100px !important">
	  <?php
	    $_GET['SQL_type'] = 'timetable_subject';
	    include "view_management.php";
	  ?>
	</div><br/>
	<input type="text" id="book" name="book" placeholder="Libro" autocomplete="off" style="width: calc(100% - 40px)" /><br/><br/>
	<button style="float: right; margin-right: 25px" id="add_subject_button" onclick="addSubject()"><?= $TRAD_add_subject ?></button>
      </div>
    </div>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="content" id="timetable" style="margin-top: 40px !important">
      <?php
	$_GET['SQL_type'] = "timetable";
	include "view_management.php";
      ?>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>