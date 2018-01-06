<?php
  $_GET['no_text'] = 'y';

  include "base.php";
  
  if($_SESSION['Username'] != ''){
    if($_GET['f'] != '/'){
    ?>
      <span onclick="$('#move_frame').load('<?= $MY_MAIN_DIRECTORY ?>/move.php?id=' + <?= $_GET['id'] ?> + '&f=/&sidebar=no');" class="link"><?= $TRAD_back ?></span><br/>
    <?php
    }
    ?>
    <br/>
    <?php
	$_GET['SQL_type'] = "move";
	include "view_management.php";
      ?>
    <button onclick="confirm_move('<?= $_GET['id'] ?>', '<?= $_GET['f'] ?>')" class="link" style="position: absolute; bottom: 10px; right: 10px"><?= $TRAD_move_here ?></button>
    <?php
  }
?>