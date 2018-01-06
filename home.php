<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>LightSchool</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="bkg_classroom">
      <h1 style="font-family: 'Roboto'">LightSchool: il futuro delle scuole</h1>
      <center>
	<p style="font-size: 13pt; max-width: 1150px">
	  D&igrave; addio al tuo zaino pesante! Porta con te un semplice tablet o il tuo smartphone e accedi ovunque a tutti i tuoi contenuti scolastici!<br/>
	  Ovunque tu sia potrai accedere ai tuoi appunti, controllare i compiti, giustificare un'assenza, controllare le materie della settimana, mandare e rispondere ai messaggi di studenti e docenti, studiare e molto altro! Non dovrai pi&ugrave; ricordarti di portare a scuola del materiale specifico perch&eacute; sar&agrave; sempre con te ovunque tu vada.
	</p>
      </center>
      <br/><br/>
    </div>

    <div class="container">
      <h2>Cos'&egrave; LightSchool?</h2>
      <p>
	Uno splendido futuro per ogni scuola nel mondo!<br/>
	Unisciti al miglior sito web per la gestione digitale della scuola e sii fra i primi a provare le nuove funzioni offerte.<br/>
	Prendere appunti, pianificare eventi e condividere file fra gli utenti sono alcune delle tante funzioni offerte.<br/>
	Il nostro obiettivo &egrave; di rendere pi&ugrave; economico il materiale scolastico e di rendere l'apprendimento pi&ugrave; facile e divertente grazie all'utilizzo delle moderne tecnologie.
      </p>
      <hr/>
      <h2>Funzioni <small><a href="<?= $MAIN_DIRECTORY ?>/overview" class="btn btn-link">Vai alla panoramica &gt;</a></small></h2>
      <div id="features-tour" class="owl-carousel">
	<div>
	  <h3>Quaderni</h3>
          <p>Prendi appunti e fai i compiti con il nostro editor di testi completo</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#file" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>File</h3>
          <p>Carica i tuoi file preferiti sul tuo spazio online</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#file" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Condivisioni</h3>
          <p>Condividi i tuoi quaderni, file e compiti con studenti e docenti</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#shared" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Correzioni</h3>
          <p>I docenti possono correggere e valutare i compiti degli alunni</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#test" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>LIM</h3>
          <p>Proietta i tuoi quaderni sulla LIM di classe in un click</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#lim" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Verifiche</h3>
          <p>Crea verifiche ed inviale ai tuoi alunni</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#test" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Diario</h3>
          <p>Segna compiti, verifiche ed altro sul tuo diario personale</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#diary" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Registro</h3>
          <p>Organizza classi, gestisci presenze e giustificazioni e altro</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#register" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Orario</h3>
          <p>Organizza le materie per giorni e assegna l'e-book correlato</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#timetable" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Messaggi</h3>
          <p>Invia messaggi in tempo reale a studenti e docenti</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#messages" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Rubrica</h3>
          <p>Aggiungi i contatti pi&ugrave; frequenti e crea gruppi</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#people" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Sicurezza</h3>
          <p>Disconnessioni e blocco di dispositivi in remoto</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#security" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Personalizzazione</h3>
          <p>Cambia le icone dei menu, i colori delle barre e altro</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#customize" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Versatile</h3>
          <p>Compatibile con tutti i browser, sistemi operativi e dispositivi</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#flexible" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Semplice</h3>
          <p>Menu e sezioni perfettamente organizzate per un facile utilizzo</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#simply" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>Gratuito</h3>
          <p>LightSchool &egrave; gratuito e lo sar&agrave; per sempre</p>
          <p><a class="btn btn-primary btn-sm" href="<?= $MAIN_DIRECTORY ?>/features#free" role="button">Pi&ugrave; informazioni &raquo;</a></p>
	</div>
	<div>
	  <h3>E ora?</h3>
          <p>Nuovo utente? <a href="#">Registrati</a></p>
          <p>Ci conosciamo gi&agrave;? <a href="#">Accedi</a></p>
	</div>
      </div>
      <?php include_once "work_in_progress.php"; ?>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>