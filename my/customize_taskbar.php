<?php
  $_GET['no_text'] = 'y';
  include "base.php";
  
  if($_SESSION['Username'] != ''){
    ?>
      <style type="text/css">
	.subtitle_taskbar{
	  font-size: 10pt;
	}
      </style>
      <br/>
      <label for="taskbar_position" style="width: 150px"><?= $TRAD_taskbar_position ?></label>
      <select id="taskbar_position" name="taskbar_position" style="width: auto; width: 150px">
	<option value="bottom"><?= $TRAD_USER_taskbar_position_translate_bottom ?></option>
	<option value="left"><?= $TRAD_USER_taskbar_position_translate_left ?></option>
	<option value="right"><?= $TRAD_USER_taskbar_position_translate_right ?></option>
      </select><br/>
      <span class="subtitle_taskbar"><?= $TRAD_taskbar_position_descr ?></span><br/><br/>
      <label for="taskbar_size" style="width: 150px"><?= $TRAD_taskbar_size ?></label>
      <select id="taskbar_size" name="taskbar_size" style="width: auto; width: 150px">
	<option value="normal"><?= $TRAD_USER_taskbar_size_translate_normal ?></option>
	<option value="small"><?= $TRAD_USER_taskbar_size_translate_small ?></option>
      </select><br/>
      <span class="subtitle_taskbar"><?= $TRAD_taskbar_size_descr ?></span><br/><br/>
      <button style="padding-top: 10px; padding-bottom: 10px; float: right; cursor: pointer" onclick="changeTaskbar()"><?= $TRAD_apply ?></button>
    <?php
  }
?>