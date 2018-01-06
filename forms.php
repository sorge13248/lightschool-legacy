<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Moduli - LightSchool</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 80px">
      <ol class="breadcrumb">
	<li><a href="<?= $MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	<li><a href="<?= $MAIN_DIRECTORY ?>/download"><div class="glyphicon glyphicon-download-alt" style="margin-right: 10px"></div>Centro download</a></li>
	<li class="active">Moduli</li>
      </ol>
      <div class="page-header">
	<h1>Moduli</h1>
      </div>
      <div style="display: inline-block; margin-right: 40px; margin-top: 10px; margin-bottom: 10px">
	<p>Non ci sono moduli attualmente disponibili.</p>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>