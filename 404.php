<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>404 Pagina non trovata - LightSchool</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 80px">
      <ol class="breadcrumb">
	<li><a href="<?= $MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	<li class="active">404 Pagina non trovata</li>
      </ol>
      <div class="page-header">
	<h1>Errore 404 <small>Pagina non trovata</small></h1>
      </div>
      <div class="alert alert-danger" role="alert"><strong>Errore!</strong> La pagina che stavi cercando potrebbe essere stata spostata oppure non &egrave; pi&ugrave; disponibile</div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>