<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Centro download - LightSchool</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 80px">
      <ol class="breadcrumb">
	<li><a href="<?= $MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	<li class="active">Centro download</li>
      </ol>
      <div class="page-header">
	<h1>Centro download <small>Sfondi / App / Documentazione</small></h1>
      </div>
      Benvenuto nel Centro download di LightSchool dove puoi trovare tutto il materiale ufficiale e scaricabile gratuitamente.<br/><br/>
      <div style="width: 400px; margin: 0 auto; margin-top: 20px; margin-bottom: 20px">
	<a href="<?= $MAIN_DIRECTORY ?>/download/wallpaper" style="text-align: center; display: inline-block; margin-right: 100px"><div class="glyphicon glyphicon-picture" style="font-size: 64px;"></div><br/>Sfondi</a>
	<a href="<?= $MAIN_DIRECTORY ?>/download/app" style="text-align: center; display: inline-block"><div class="glyphicon glyphicon-phone" style="font-size: 64px;"></div><br/>App</a><br/>
	<a href="<?= $MAIN_DIRECTORY ?>/download/forms" style="text-align: center; display: inline-block; margin-left: 70px; margin-top: 50px"><div class="glyphicon glyphicon-book" style="font-size: 64px;"></div><br/>Moduli</a>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>