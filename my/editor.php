<?php
  $_GET['no_text'] = 'y';
  include_once "base.php";
  
  if($_SESSION['Username'] != ''){
    ?>
      <div class="editor">
	<!-- <div class="toolbar">
	  <span id="bold" onclick="document.execCommand('bold',null,false);"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/black/writer/bold.png" id="boldimg" /></span>
	  <span id="italic" onclick="document.execCommand('italic',null,false);"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/black/writer/italic.png" id="italicimg" /></span>
	  <span id="underline" onclick="document.execCommand('underline',null,false);"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/black/writer/underline.png" id="underlineimg" /></span>
	</div> -->
	<div contenteditable="true" id="content_editable_true_div" class="content_editable_true_div <?php if($DIARY_type != ''){ ?>content_editable_true_div_edit_diary<?php } ?>"><?php echo($GENERAL_html); ?></div>
      </div>
    <?php
  }
?>