<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Nuovo ticket - Supporto di LightSchool</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 70px">
      <ol class="breadcrumb">
	<li><a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	<li class="active">Apri un nuovo ticket</li>
      </ol>
      <div class="page-header">
	<h3>Apri un nuovo ticket</h3>
      </div>
      <?php if($_SESSION['Username'] == ''){ ?>
	<div class="alert alert-danger" role="alert">
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  <span class="sr-only">Errore:</span>
	  Accesso negato. Per visualizzare questa pagina devi accedere con il tuo account LightSchool.
	</div>
	Se hai problemi di accesso al tuo account e quindi non puoi inviare la richiesta di aiuto, controlla la sezione dedicata ai problemi d'accesso e se non risolve il problema contattaci inviando una e-mail a MAIL_SUPPORT_ADDRESS comunicando il seguente codice: <?php echo(md5(date("d/m/Y H:i:s"))); ?>.
      <?php }else{ ?>
	<p>Saremo lieti di aiutarti a risolvere il problema. Ricordati di descrivere come meglio puoi il problema per permettere al nostro team di assistenza di aiutarti al meglio.</p>
	<div style="margin-top: 30px">
	  <label for="type">Reparto</label>
	  <select id="type" name="type" class="form-control">
	    <option>Sito web principale - www.lightschool.it</option>
	    <option>Sito web studenti/docenti/scuole - my.lightschool.it</option>
	    <option>Sito web editori - editori.lightschool.it</option>
	    <option>Sito web LIM - lim.lightschool.it</option>
	    <option>Sito web supporto - support.lightschool.it</option>
	  </select>
	  <label for="priority">Priorit&agrave;</label>
	  <select id="priority" name="priority" class="form-control">
	    <option>Bassa</option>
	    <option selected="selected">Normale</option>
	    <option>Alta</option>
	  </select>
	  <label for="title">Oggetto del problema</label>
	  <input type="text" id="title" name="title" class="form-control" placeholder="Descrizione breve del problema (max. 128 caratteri)" />
	  <label for="descr">Descrizione dettagliata del problema</label>
	  Gentile LightSchool,
	  <textarea id="descr" name="descr" class="form-control" rows="5" style="margin-top: 5px; margin-bottom: 5px"></textarea>
	  Cordiali saluti,<br/>
	  <?php echo("$USER_name $USER_surname"); ?>
	  <p style="margin-top: 20px">Il nostro team risponder&agrave; quanto prima possibile.<button class="btn btn-primary submit_button">Invia</button></p>
	</div>
      <?php } ?>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>