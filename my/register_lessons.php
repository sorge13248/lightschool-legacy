<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
  <span style="font-family: 'Roboto'; font-size: 20pt; display: inline-block; margin-bottom: 10px"><?= $TRAD_register_lessons_of ?> <?php echo($_GET['day']); ?></span>
  <?php
    $_GET['SQL_type'] = 'register_lessons';
    include "view_management.php";
  ?>
<?php }else{
  include_once "login.php";
} ?>
