<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Informativa sull'app per Android - LightSchool</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 80px">
      <ol class="breadcrumb">
	<li><a href="<?= $MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	<li class="active">Informativa sull'app per Android</li>
      </ol>
      <div class="page-header">
	<h1>Informativa sull'app per Android</h1>
      </div>
      <div style="display: inline-block; margin-right: 40px; margin-top: 10px; margin-bottom: 10px">
	<div class="alert alert-warning" role="alert"><strong>Attenzione!</strong> Questa pagina potrebbe subire delle modifiche prima del rilascio dell'app per Android nel Google Play Store</div>
	<div class="alert alert-warning" role="alert"><strong>Attenzione!</strong> L'app &egrave; ancora nelle fasi iniziali dello sviluppo e potrebbe non vedere mai la luce</div>
	<p>LightSchool per Android occupa 25.00 MB&sim; e ti connette con tutto il mondo LightSchool permettendoti di fare, dalla classica interfaccia di Android che gi&agrave; ti &egrave; familiare, tutto quello che puoi fare sul sito web (o quasi).</p>
	<h3>Autorizzazioni</h3>
	<p>Per funzionare correttamente LightSchool chiede diverse autorizzazioni in fase d'installazione che, qualora negate, l'app non verr&agrave; installata. Qui vengono elencate le motivazioni e gli scopi per i quali richiediamo le autorizzazioni:
	<ul>
	  <li><b>Leggi i contenuti della scheda SD:</b> Permette di aprire i file dell'utente nella scheda SD. Senza questo permesso non sarebbe possibile scaricare ed in seguito aprire i file caricati dall'utente su LightSchool</li>
	  <li><b>Modifica o elimina i contenuti della scheda SD:</b> Permette di creare la cartalla <i>LightSchool</i> nella scheda SD la prima volta che si scarica un file e in seguito di scaricare i file dell'utente.</li>
	  <li><b>Crea account e imposta password:</b> Quando si accede a LightSchool, l'app legge automaticamente l'indirizzo e-mail principale impostato nel telefono e lo inserisce nel campo dell'indirizzo e-mail velocizzando la fase di accesso. Le informazioni personali <u>non</u> saranno salvate ed inviate a LightSchool.</li>
	  <li><b>Trova account sul dispositivo:</b> Vedi sopra.</li>
	  <li><b>Utilizza account sul dispositivo:</b> Vedi sopra.</li>
	  <li><b>Ricevere dati da Internet:</b> Serve a visualizzare l'elenco del materiale dell'utente come desktop, file, diario, quaderni ecc.</li>
	  <li><b>Accesso completo alla rete:</b> LightSchool per funzionare ha bisogno di un costante collegamento ad Internet e questo permesso &egrave; necessario per verificare lo stato della connessione ad Internet (presente o assente)</li>
	  <li><b>Visualizza connessioni di rete:</b> Vedi sopra.</li>
	  <li><b>Esegui all'avvio:</b> L'applicazione (in forma molto basilare) viene avviata automaticamente ogni volta che il dispositivo viene acceso. Questo serve per far funzionare le notifiche in tempo reale.</li>
	  <li><b>Disattivazione stand-by del telefono:</b> &Egrave; necessario per permettere al dispositivo Android di ricevere le notifiche in tempo reale.</li>
	  <li><b>Regola la vibrazione <i>(solo su dispositivi che la supportano)</i>:</b> Permette di far vibrare il dispositivo alla ricezione di una notifica.</li>
	</ul>
	<small>N.B.: Il nome delle autorizzazioni potrebbe variare da dispositivo a dispositivo.</small></p>
	<h3>Segnalazione errori</h3>
	<p>L'applicazione di LightSchool, come d'altronde qualsiasi altra app al mondo, &egrave; soggetta ad errori e blocchi improvvisi che nella peggiore delle ipotesi possono far chiudere l'app automaticamente (<abbr title="Also Know As = Conosciuto anche come">a.k.a.</abbr> crash). Per questo &egrave; stato integrato in LightSchool un segnalatore automatico di errori che ci invia automaticamente tutti i dettagli di cui abbiamo bisogno per risolvere il problema nel minor tempo possibile e permetterci di migliorare l'app. Al momento dell'invio, vengono inviati le parti del codice che ha causato il problema, il produttore del dispositivo (es: LG, Apple, Nokia ecc), la versione del sistema operativo Android (es: 4, 4.4.4, 5.1, 6.0 ecc), se il dispositivo &egrave; stato "rootato" (vedi <a href="http://www.androidworld.it/2010/11/15/root-su-android-la-grande-guida-cose-perche-e-come-ottenerlo-27587/" target="_blank">root</a>), la quantit&agrave; di spazio residuo sul dispositivo (utile a capire se il problema &egrave; stato causato dalla mancanza di spazio per salvare le informazioni - anche temporanee - piuttosto che per colpa dell'app) e la quantit&agrave; di RAM (vedi <a href="https://it.wikipedia.org/wiki/RAM" target="_blank">ram</a>) residua (applicasi lo stesso discorso dello spazio residuo) ma <u>non</u> viene inviato <u>nessun</u> dato personale dell'utente o che possa in qualche modo permetterci di identificarlo.<br/>
	&Egrave; comunque possibile disattivare la funzione di segnalazione degli errori dalle impostazioni dell'app.<br/>
	<small>N.B.: Le versioni sperimentali dell'app non permettono di disabilitare questa funzione.</small></p>
	<h3>Suggerimenti</h3>
	<p>All'interno dell'app di LightSchool per Android, nel menu laterale, &egrave; disponibile una voce che permette di suggerire miglioramenti e nuove funzioni all'app. Assieme ai dati richiesti, verr&agrave; inviato a LightSchool anche il nominativo dell'utente.</p>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>