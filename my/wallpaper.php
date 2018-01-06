<?php
  $_GET['no_text'] = 'y';

  include "base.php";
  
  if($_SESSION['Username'] != ''){
    if($_GET['f'] != '/'){
    ?>
      <span onclick="$('#wallpaper_frame').load('<?= $MY_MAIN_DIRECTORY ?>/wallpaper.php?f=/&dialog=true');" class="link"><?= $TRAD_back ?></span><br/>
    <?php
    }
    ?>
    <br/>
    <?php
	$_GET['SQL_type'] = "move";
	include "view_management.php";
      ?>
    <?php
  }
?>