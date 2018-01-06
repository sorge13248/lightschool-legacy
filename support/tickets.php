<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>I miei ticket - Supporto di LightSchool</title>
    <?php include_once "style.php"; ?>
    <script type="text/javascript">
      function updateTickets(){
	$("#tickets").load("<?= $SUPPORT_MAIN_DIRECTORY ?>/view_management.php?SQL_type=tickets");
      }
      
      $(document).ready(function(){
	updateTickets();
      });
    </script>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 70px">
      <ol class="breadcrumb">
	<li><a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	<li class="active">I miei ticket</li>
      </ol>
      <div class="page-header">
	<h3>I miei ticket</h3>
      </div>
      <?php if($_SESSION['Username'] == ''){ ?>
	<div class="alert alert-danger" role="alert">
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  <span class="sr-only">Errore:</span>
	  Accesso negato. Per visualizzare questa pagina devi accedere con il tuo account LightSchool.
	</div>
      <?php }else{ ?>
	<p>
	  Visualizza&nbsp;
	  <select>
	    <option>Tutti</option>
	    <optgroup label="Priorit&agrave;">
	      <option>Alta</option>
	      <option>Normale</option>
	      <option>Bassa</option>
	    </optgroup>
	    <optgroup label="Risposti">
	      <option>S&igrave;</option>
	      <option>No</option>
	    </optgroup>
	    <optgroup label="Risolti">
	      <option>S&igrave;</option>
	      <option>No</option>
	    </optgroup>
	  </select>
	</p>
	<div id="tickets">Caricamento...</div>
      <?php } ?>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>