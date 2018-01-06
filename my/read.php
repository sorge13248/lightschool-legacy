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
    <?php include_once "file_management.php"; ?>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="content">
      <?php
      if($_GET['id'] == ''){
	  ?>
	    <?= $TRAD_general_error ?>
	  <?php
	}
      ?>
      <div class="page" id="page">
	<?php echo($GENERAL_html); ?>
      </div>
    </div>
  </body>
</html>