<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<html>
  <head>
    <title><?= $TRAD_app_test ?> - LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
  </head>
  <body>
    <?php include "menu.php"; ?>
      <div class="content">
	<?php
	  $_GET['SQL_type'] = "quiz";
	  include "view_management.php";
	?>
      </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>