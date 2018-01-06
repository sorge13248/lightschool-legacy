<html>
  <head>
    <title>Supporto - LightOS</title>
    <?php include "style.php"; ?>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="content">
      <img src="<?= $LS_MAIN_DIRECTORY ?>/image1.png" alt="immagine 1" class="center" />
      <p class="title">Supporto di LightOS</p>
      <p class="subtitle">Guida all'installazione e alla configurazione iniziale. Risoluzione problemi comuni.</p>
      <hr/>
      <p class="title">Come installare</p>
      <p>
	<b>PREMESSA</b> Il dispositivo deve avere gi&agrave; il bootloader sbloccato e gi&agrave; configurato con una custom recovery come ad esempio la TWRP.<br/>
	Sbloccare il bootloader comporta il decadimento automatico della garanzia.
	<ol>
	  <li>Scaricare il file ZIP da Download. <b>ATTENZIONE</b> Attualmente &egrave; supportato solo l'ASUS MeMO Pad Smart 10 (ME301T)</li>
	  <li>Accendere il dispositivo e collegarlo al computer</li>
	  <li>Copiare il file ZIP scaricato nella memoria interna del dispositivo (non all'interno di cartelle ma nella cartella principale <i>sdcard</i>)</li>
	  <li>Spegnere il tablet</li>
	  <li>Accendere il tablet tenendo premuto il tasto accensione insieme al tasto volume gi&ugrave; finch&egrave; non compare una schermata con 3 icone</li>
	  <li>Posizionarsi sopra l'icona RCK e premere volume su</li>
	  <li>Attendere l'avvio della recovery</li>
	  <li>Selezionare <i>Backup</i></li>
	  <li>Selezionare le caselle
	    <ul>
	      <li>System</li>
	      <li>Data</li>
	      <li>Boot</li>
	    </ul>
	  </li>
	  <li>Quindi fare trascinare il dito da sinistra a destra su <i>Swipe to Back up</i></li>
	  <li>Tornare alla home cliccando in alto a destra sull'icona a forma di casa</li>
	  <li>Selezionare <i>Wipe</i> e poi <i>Advanced Wipe</i></li>
	  <li>Selezionare le caselle
	    <ul>
	      <li>Dalvik Cache</li>
	      <li>Cache</li>
	      <li>Data</li>
	    </ul>
	  </li>
	  <li>A fine procedura, tornare alla home cliccando in alto a destra sull'icona a forma di casa</li>
	  <li>Selezionare quindi <i>Install</i></li>
	  <li>Cliccare sopra <i>LightOS_[DISPOSITIVO]_[VERSIONE ANDROID]_[BUILD]</i></li>
	  <li>Quindi fare trascinare il dito da sinistra a destra su <i>Swipe to Confirm Flash</i></li>
	  <li>In pochi minuti dovrebbe terminare la procedura e dovrebbe comparire una picocla scritta <i>Benvenuto in LightOS</i></li>
	  <li>Inoltre la recovery ci informer&agrave; che la procedura &egrave; andata a buon fine scrivendo <i>Flash succefull</i></li>
	  <li>Premere quindi su <i>Reboot System</i></li>
	  <li>LightOS &egrave; pronto e in pochi minuti dovrebbe avviarsi</li>
	  <li>Verr&agrave; subito chiesto di collegarsi a una rete WiFi per poter accedere con il proprio account <i>LightSchool</i></li>
	  <li>Ci sar&agrave; una breve procedura guidata per configurare il tablet, LightOS e LightSchool affinch&egrave; lavorino in perfetta sintonia</li>
	  <li>LightOS &egrave; pronto ed utilizzabile!</li>
	</ol>
      </p>
    </div>
  </body>
</html>