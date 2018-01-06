<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title><?php echo($SCHOOL_name); ?> - LightSchool</title>
    <?php include_once "style.php"; ?>
    <?php include_once "menu.php"; ?>
  </head>
  <body>
    <div class="container" style="padding-top: 90px">
      <div class="row vertical-divider">
	<div class="col-md-4">
	  <h4>1459 studenti</h4>
	  <h6><span style="color: darkgreen">1360 presenti</span> - <span style="color: red">99 assenti</span></h6>
	</div>
	<div class="col-md-4">
	  <h4>146 docenti</h4>
	</div>
	<div class="col-md-4">
	  <h4>43 membri del personale A.T.A.</h4>
	</div>
      </div><br/>
      <hr/>
      <div class="row">
	<div class="col-md-6">
	  <h3>Alunni assenti da pi&ugrave; di 7 giorni</h3>
	  <p>Nessun alunno &egrave; assente da pi&ugrave; di 7 giorni.</p>
	</div>
	<div class="col-md-6">
	  <h3>Ultime 6 note disciplinari inflitte</h3>
	  <p>Nessun alunno &egrave; stato sanzionato negli ultimi 7 giorni.</p>
	</div>
      </div>
      <div class="row">
	<div class="col-md-6">
	  <h3>Messaggi<select style="font-size: 11pt; margin-left: 20px"><option>Tutti</option><option>Studenti</option><option>Docenti</option><option>Prioritari</option></select></h3>
	  <p>Nessun messaggio non letto in arrivo.</p>
	</div>
	<div class="col-md-6">
	  <h3>Circuito interno</h3>
	  <p>Non ci sono messaggi interni.</p>
	</div>
      </div>
    </div>
  </body>
</html>

<?php }else{
  include_once "login.php";
} ?>