<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<html>
  <head>
    <title>LightSchool Word Preview</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <?php include_once "color_management.php"; ?>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="page" id="page" contenteditable="true"></div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>