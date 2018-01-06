<?php
  $_GET['no_text'] = 'y';

  include "base.php";
  
  if($_SESSION['Username'] != ''){
    $_GET['SQL_type'] = "context";
    include "view_management.php";
  }else{
    ?>
      <span><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' /><?= $TRAD_no_logged_in ?></span>
    <?php
  }
?>