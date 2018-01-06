<?php
  $_GET['no_text'] = 'y';
  include "base.php";
  
  if($_SESSION['Username'] != ''){
    if($actually_page == 'timetable'){
      $EXTEND_url = '&type=subject';
      $EXTEND_url2 = '&subject=y';
    }elseif($actually_page == 'diary'){
      $EXTEND_url = '&type=diary';
      $EXTEND_url2 = '&diary=y';
    } ?>
    <script type="text/javascript">
      function delete_f(id, name){
	document.getElementById("delete_frame").innerHTML = "<br/><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#delete_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#context_overlay').fadeOut(200);
	$('#context').slideUp(200);
	if(selected_file.length > 1){
	  document.getElementById("fileName6").innerHTML = ' ' + selected_file.length + ' elementi';
	}else{
	  document.getElementById("fileName6").innerHTML = ' "' + name + '"';
	}
	$('#delete_frame').load('<?= $MY_MAIN_DIRECTORY ?>/delete.php?id=' + id + '&dialog=true<?= $EXTEND_url ?>&combo='+JSON.stringify(selected_file));
      }
      
      function confirm_delete_trash(file_id){
	file_id = JSON.stringify(file_id);
	
	$.ajax({
	  type: "POST",
	  url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=delete_trash<?= $EXTEND_url2 ?>",
	  data: "file_id="+file_id,
	  success: function(html){
	    if(html=='true'){
	      $(".toast").css("background-color", "darkgreen");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_file_in_trash ?>");
	      closeDialog();
	      <?php if($actually_page == 'diary'){ ?>
		$('#diary').load('<?= $MY_MAIN_DIRECTORY ?>/diary_view.php?month=<?= $_GET['month'] ?>&year=<?= $_GET['year'] ?>');
	      <?php }elseif($actually_page == 'trash'){ ?>
		switch_tab(current_tab_for_AJAX);
	      <?php }elseif($actually_page = 'files'){ ?>
		$('#files').load('<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=files&f='+current_folder_for_AJAX);
	      <?php } ?>
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
      function confirm_delete(file_id){
	file_id = JSON.stringify(file_id);
	
	$.ajax({
	  type: "POST",
	  url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=delete_forever<?= $EXTEND_url2 ?>",
	  data: "file_id="+file_id,
	  success: function(html){
	    if(html=='true'){
	      $(".toast").css("background-color", "darkgreen");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_file_deleted ?>");
	      closeDialog();
	      <?php if($actually_page == 'diary'){ ?>
		$('#diary').load('<?= $MY_MAIN_DIRECTORY ?>/diary_view.php?month=<?= $_GET['month'] ?>&year=<?= $_GET['year'] ?>');
	      <?php }elseif($actually_page == 'trash'){ ?>
		switch_tab(current_tab_for_AJAX);
	      <?php }elseif($actually_page = 'files'){ ?>
		$('#files').load('<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=files&f='+current_folder_for_AJAX);
	      <?php } ?>
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
    <div class="dialog" id="delete_dialog" style="min-width: 500px; max-width: 100% !important">
      <div class="title"><?= $TRAD_delete ?><span id="fileName6" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content">
	<div id="delete_frame" style="overflow-y: auto; min-height: 100px; max-height: 500px; height: 50%; min-width: 500px"></div>
      </div>
    </div>
  <?php
  }
?>
