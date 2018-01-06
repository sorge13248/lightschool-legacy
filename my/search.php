<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<html>
  <head>
    <title><?= $TRAD_search_of ?> "<?php echo($_GET['q']); ?>" - LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <?php $_GET['no_quick_search'] = 'y';
    include_once "file_management.php"; ?>
    <script type="text/javascript">
      var current_tab_for_AJAX;
      
      function switch_tab(tab){
	current_tab_for_AJAX = tab;
	$('.tab_tab').hide();
	selected_file = [];
	$('.tab_tab').html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set_black.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	$('.tab_'+tab).show();
	$('.tab_'+tab).load("<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=search_"+tab+"&q=<?= $_GET['q'] ?>", function(){
	  $("#num_"+tab).html("("+$('.tab_'+tab+' .icon_files').length+")");
	});
	$('.tabs_tabs').removeClass('selected');
	$('.tabs_'+tab).addClass('selected');
      }
      
      $(document).ready(function(){
	switch_tab('files');
      });
      
      function restore(id, name){
	document.getElementById("restore_frame").innerHTML = "<br/><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#restore_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#context_overlay').fadeOut(200);
	$('#context').slideUp(200);
	if(selected_file.length > 1){
	  document.getElementById("fileNameRestore").innerHTML = ' ' + selected_file.length + ' elementi';
	}else{
	  document.getElementById("fileNameRestore").innerHTML = ' "' + name + '"';
	}
	$('#restore_frame').load('<?= $MY_MAIN_DIRECTORY ?>/restore.php?id=' + id + '&dialog=true<?= $EXTEND_url ?>&combo='+JSON.stringify(selected_file));
      }
      
      function confirm_restore(file_id){
	file_id = JSON.stringify(file_id);
	
	$.ajax({
	  type: "POST",
	  url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=restore",
	  data: "file_id="+file_id,
	  success: function(html){
	    if(html=='true'){
	      $(".toast").css("background-color", "darkgreen");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_file_restored ?>");
	      closeDialog();
	      switch_tab(current_tab_for_AJAX);
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
    <div class="dialog" id="restore_dialog" style="min-width: 500px; max-width: 100% !important">
      <div class="title"><?= $TRAD_restore ?><span id="fileNameRestore" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content">
	<div id="restore_frame" style="overflow-y: auto; min-height: 100px; max-height: 500px; height: 50%; min-width: 500px">
	  <br/><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>
	</div>
      </div>
    </div>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="content" id="trash">
      <div class="tab">
	<div class="tabs">
	  <span onclick="switch_tab('files')" class="tabs_tabs tabs_files"><?= $TRAD_file ?> <font id="num_files"></font></span>
	  <span onclick="switch_tab('diary')" class="tabs_tabs tabs_diary"><?= $TRAD_diary ?> <font id="num_diary"></font></span>
	</div>
	<div class="tab_content">
	  <div class="tab_tab tab_files" style="display: block" id="files"></div>
	  <div class="tab_tab tab_diary" id="files"></div>
	</div>
      </div>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>