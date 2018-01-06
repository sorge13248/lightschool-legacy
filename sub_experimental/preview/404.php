<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>404 <?= $TRAD_page_not_found ?> - LightSchool</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 80px">
      <ol class="breadcrumb">
	<li><a href="<?= $MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	<li class="active">404 <?= $TRAD_page_not_found ?></li>
      </ol>
      <div class="page-header">
	<h1>Errore 404 <small><?= $TRAD_page_not_found ?></small></h1>
      </div>
      <div class="alert alert-danger" role="alert"><?= $TMAIN_404_descr ?></div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>