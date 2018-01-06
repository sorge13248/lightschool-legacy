<?php include_once "base.php";
  if($_GET['type'] == 'schools'){
    $PAGE_title = 'scuole';
  }elseif($_GET['type'] == 'publishers'){
    $PAGE_title = 'editori';
  }else{
    exit();
  }
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Registrazione <?php echo($PAGE_title); ?> - LightSchool</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 80px">
      <ol class="breadcrumb">
	<li><a href="<?= $MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	<li class="active">Registrazione <?php echo($PAGE_title); ?></li>
      </ol>
      <div class="page-header">
	<h1>Registrazione <?php echo($PAGE_title); ?> <small><span class="label label-default">Sperimentale</span></small></h1>
      </div>
      <div style="display: inline-block; margin-right: 40px; margin-top: 10px; margin-bottom: 10px">
	<?php
	if($_GET['type'] == 'schools'){
	  ?>
	    <p>La registrazione per le scuole non &egrave; ancora disponibile in modo automatizzato. Prego inviare una e-mail a <?php echo($MAIL_SUPPORT); ?> per ricevere indicazioni. Ricordarsi di comunicare il codice meccanografico della scuola disponibile sul sito ufficiale del <a href="http://www.trampi.istruzione.it/vseata/action/promptSelectProvincia.do" target="_blank">MIUR</a>.</p>
	  <?php
	}elseif($_GET['type'] == 'publishers'){
	  ?>
	    <p>La registrazione per gli editori non &egrave; ancora disponibile in modo automatizzato. Prego inviare una e-mail a <?php echo($MAIL_SUPPORT); ?> per ricevere indicazioni.</p>
	  <?php
	}
	?>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>