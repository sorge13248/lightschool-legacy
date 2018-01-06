<?php include_once "base.php";
  if($_GET['id'] != ''){
    $_GET['SQL_type'] = "read";
    include "view_management.php";
  }
?>
<html>
  <head>
    <title><?= $GENERAL_name ?></title>
    <?php include_once "style_$USER_skin.php"; ?>
    <style>
      html, body{
	background-color: white;
      }
    </style>
  </head>
  <body>
    <?php echo($GENERAL_html); ?>
  </body>
</html>