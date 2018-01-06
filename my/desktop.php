<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<html>
  <head>
    <title>LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <?php include_once "file_management.php"; ?>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="content" id="desktop">
      <?php
	$_GET['SQL_type'] = "desktop";
	include "view_management.php";
      ?>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>