<?php
include_once "base.php";
include_once "language_$USER_language.php";
include_once "style.php";
?>
<?php
if($_GET['id'] == '1'){
  $H_title = 'Primi passi';
  $H_subtitle = 'Impara ad usare LightSchool in modo veloce';
}elseif($_GET['id'] == '2'){
  $H_title = 'Il desktop';
  $H_subtitle = "Cos'&egrave; e come funziona";
}elseif($_GET['id'] == '3'){
  $H_title = 'I miei file';
  $H_subtitle = "Tutte le tue cartelle, i tuoi quaderni e i tuoi file";
}elseif($_GET['id'] == '4'){
  $H_title = 'Condivisi';
  $H_subtitle = "Tutti i file che gli utenti condividono con te appariranno in questa pagina";
}elseif($_GET['id'] == '5'){
  $H_title = 'LightSchool Quiz';
  $H_subtitle = "Funzione riservata ai Docenti";
}elseif($_GET['id'] == '6'){
  $H_title = 'Il mio diario';
  $H_subtitle = "Tutti i tuoi compiti, verifiche e molto altro";
}elseif($_GET['id'] == '7'){
  $H_title = 'Il mio orario';
  $H_subtitle = "L'orario delle materie o delle classi";
}elseif($_GET['id'] == '9'){
  $H_title = 'Messaggi';
  $H_subtitle = "Il postino di LightSchool";
}elseif($_GET['id'] == '10'){
  $H_title = 'Rubrica';
  $H_subtitle = "Salva i tuoi contatti per mandare messaggi e condividere pi&ugrave; velocemente";
}elseif($_GET['id'] == '11'){
  $H_title = 'Cestino';
  $H_subtitle = "File ed eventi diario finiscono nel cestino prima di venire eliminati definitivamente";
}elseif($_GET['id'] == '12'){
  $H_title = 'Impostazioni';
  $H_subtitle = "Personalizza il tuo profilo, modifica le impostazioni di sicurezza e le notifiche via e-mail";
}else{
  $H_title = 'Errore';
  $H_subtitle = "Articolo non trovato";
}
?>
<html>
  <head>
    <title>Manuale dell'utente | LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <style type="text/css">
      div.block{
	overflow:hidden;
      }
      div.block label{
	width:160px;
	display:block;
	float:left;
	text-align:left;
      }
      div.block .input{
	margin-left:4px;
	float:left;
      }
      figcaption{
	text-align: center;
      }
      .title{
	font-size: 20pt;
	font-family: 'Roboto';
      }
    </style>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="content">
      <?php if($_GET['id'] == '' and $_GET['q'] == ''){ ?>
	<table style="width: 100%; max-width: 800px">
	  <tr>
	    <td style="width: 50%" valign="top">
	      <p><span class="title">Articoli pi&ugrave; importanti</span><br/>
	      Gli articoli pi&ugrave; importanti scelti da LightSchool</p>
	      <ul>
		<li><p><a href="?id=1">Primi passi</a></p></li>
		<li><p><a href="?id=2">Desktop</a></p></li>
		<li><p><a href="?id=3">File</a></p></li>
		<li><p><a href="?id=4">Condivisi</a></p></li>
		<li><p><a href="?id=5">Quiz</a></p></li>
		<li><p><a href="?id=6">Diario</a></p></li>
		<li><p><a href="?id=7">Orario</a></p></li>
		<!-- <li><p><a href="?id=8">Registro elettronico</a></p></li> -->
		<li><p><a href="?id=9">Messaggi</a></p></li>
		<li><p><a href="?id=10">Rubrica</a></p></li>
		<li><p><a href="?id=11">Cestino</a></p></li>
		<li><p><a href="?id=12">Impostazioni</a></p></li>
	      </ul>
	    </td>
	    <td style="width: 50%" valign="top">
	      <p><span class="title">Risoluzione problemi</span><br/>
	      Risoluzione dei problemi pi&ugrave; comuni e conosciuti</p>
	      <ul>
		<li><p><a href="?id=13">Mi sono appena registrato e non ricevo l'e-mail per attivare l'account</a></p></li>
		<li><p><a href="?id=14">Ho richiesto il recupero password ma non ricevo l'e-mail</a></p></li>
		<li><p><a href="?id=15">Non riesco ad entrare nel sito nonostante i miei dati di accesso siano corretti</a></p></li>
		<li><p><a href="?id=16">Non riesco a condividere un file con un utente perch&egrave; mi dice che &egrave; inesistente</a></p></li>
	      </ul>
	      Il problema non &egrave; elencato? Contattaci via e-mail a MAIL_SUPPORT_ADDRESS.
	    </td>
	  </tr>
	  <tr>
	    <td colspan="2">
	      <p>Hai dei suggerimenti su come migliorare LightSchool o vuoi segnalarci un problema? Siamo sempre disponibili a ricevere suggerimenti e ad aiutare utenti. Contattaci via e-mail a MAIL_SUPPORT_ADDRESS o inviaci un messaggio al nostro <a href="<?= $LS_MAIN_DIRECTORY ?>/user/search/?id=189">account ufficiale LightSchool</a>.</p>
	    </td>
	  </tr>
	</table>
      <?php }elseif($_GET['id'] != ''){ ?>
	<p><span class="title"><?php echo($H_title); ?></span><br/>
	<?php echo($H_subtitle); ?></p>
	<p>
	  <?php if($_GET['id'] == '1'){ ?>
	  <table>
	    <tr>
	      <td valign="top" style="width: 520px">
		<figure style="position: fixed; top: 180px; left: 0px">
		  <img src='<?= $IMAGES_MAIN_DIRECTORY ?>/help/files_overview.png' onmouseover="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/files_overviewhelp.png')" onmouseleave="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/files_overview.png')" alt='immagine 1' style='width: 500px; height: 270px; margin-right: 10px; margin-bottom: 10px' />
		  <figcaption>Immagine 1 (passa il mouse sopra l'immagine)</figcaption>
		</figure>
	      </td>
	      <td valign="top">
		Nell'immagine 1 &egrave; possibile vedere la grafica delle pagine di LightSchool che rimane invariata nelle pagine.<br/><br/>
		LightSchool ha una <i>barra superiore</i> detta <b>Testa</b> e una <i>barra inferiore</i> chiamata <b>Taskbar</b>.<br/>
		La <b>Testa</b> contiene:<br/>
		<ul>
		  <li>Il titolo della pagina;</li>
		  <li>Dei bottoni grandi a met&agrave; fra la barra e il contenuto chiamati <i>Pulsanti azione</i> utili per compiere le azioni pi&ugrave; comuni che si eseguono sulla pagine come la creazione di nuovi elementi;</li>
		  <li>Dei bottoni piccoli in alto a destra chiamati <i>Pulsanti impostazioni</i> che permettono di modificare le impostazioni della pagina, come la vista ad icone o ad elenco, e dei bottoni permanenti come le <i>Impostazioni</i>, la <i>Guida</i> e la <i>Disconnessione</i>;</li>
		  <li>La casella di ricerca in alto a destra per cercare file, eventi diario, contatti e messaggi nel proprio account.</li>
		</ul>
		La <b>Taskbar</b> contiene:<br/>
		<ul>
		  <li>Le icone delle App per passare da un'App all'altra;</li>
		  <li>Il nome dell'utente con l'immagine del profilo.</li>
		</ul>
		Ora spiegheremo le funzioni delle singole App in breve, in ordine da sinistra verso destra della Taskbar.<br/><br/>
		<b>DESKTOP</b><br/>
		Il Desktop &egrave; la prima pagina che si vede una volta effettuato l'accesso ed &egrave; un aggregatore di file, quaderni ed eventi diario preferiti.<br/>
		&Egrave; possibile aggiungere al desktop qualsiasi cartella, quaderno file ed evento diario per accedere pi&ugrave; velocemente ai contenuti pi&ugrave; usati.<br/><br/>
		<b>APP FILE</b><br/>
		L'app File &egrave; il cuore di LightSchool, &egrave; la parte dove si creano i quaderni o si caricano file e si organizzano in cartelle, &egrave; dove si prendono gli appunti di scuola e dove si fanno i compiti grazie a un programma di videoscrittura semplice ma completo delle funzioni pi&ugrave; utilizzate.<br/>
		Si possono inoltre caricare file come immagini, file Word, Excel e PowerPoint (anche file creati con Open/LibreOffice), file di testo semplice come txt e rtf e pagine HTML.<br/><br/>
		<b>APP CONDIVISI</b><br/>
		&Egrave; la pagina dove si vedono file, quaderni ed eventi diario che sono stati condivisi con noi da altri studenti e docenti.<br/>
		Possono essere visti <?php if($USER_type == 'docente' or $USER_type == ''){ ?> e modificati <?php if($USER_type == '') { ?>(se si &egrave; docenti)<?php } } ?> i quaderni<?php if($USER_type == 'studente') { ?>, file ed eventi diario.<?php } ?>.
		<?php if($USER_type == 'docente' or $USER_type == ''){ ?><br/>Al contrario, i file possono solo essere scaricati e gli eventi diario solo visti.<?php } ?><br/><br/>
		<b>APP QUIZ</b>&nbsp;Utilizzabile solo dai docenti. Tu sei uno: <b><?php echo(ucfirst($USER_type)); ?></b><br/>
		App Quiz &egrave; un'app che permette di creare quiz (o test) a crocette e domande aperte, con un sistema di autocorrezione e un tempo limitato per essere eseguito, ideato per sottoporre alunni o classi a delle verifiche fatte con strumenti digitali. Basta creare un quiz, inserire la risposta corretta (che ovviamente non verr&agrave; mostrata agli studenti), facoltativo un tempo entro il quale fare il test e condividerlo con gli studenti o le classi.<br/><br/>
		<b>APP DIARIO</b><br/>
		Visibile in vista <i>Mensile</i> o <i>Settimanale</i> &egrave; dove si segnano i compiti che ci sono da fare, gli argomenti delle verifiche ecc.<br/>
		Si possono assegnare anche diverse priorit&agrave; e chiedere al sito web di ricordarci di fare i compiti, impostando un promemoria ricevibile via e-mail.<br/><br/>
		<b>APP ORARIO</b><br/>
		Aggiungi le materie, usa colori e formattazioni diverse e seleziona il giorno e l'app organizzer&agrave; automaticamente le materie con una vista giornaliera.<br/><br/>
		<b>APP MESSAGGI</b><br/>
		LightSchool permette di scambiare messaggi tra studenti e docenti. Ti baster&agrave; conoscere il nome utente della persona con la quale vuoi interagire e potrai cominciare a scambiare messaggi con lei!<br/>
		Un utente ti disturba? Puoi bloccarlo dalle impostazioni all'interno dell'app o dalle impostazioni generali del sito.<br/><br/>
		<b>APP RUBRICA</b><br/>
		Troppi nomi utenti da ricordare per ogni persona e una memoria da pesce rosso? O pi&ugrave; semplicemente ti &egrave; pi&ugrave; comodo tenere una lista delle persone che contatti di pi&ugrave;? Allora rubrica fa al caso tuo!<br/>
		Rubrica permette di salvare nel proprio account i nomi utenti delle persone per poter facilmente inviare messaggi o condividere con loro dei file, in quanto nella finestra di condivisione o di invio messaggio comprarir&agrave; una lista con l'elenco delle persone presenti nella propria rubrica.<br/><br/>
		<b>APP CESTINO</b><br/>
		Tutti i file che elimini, prima che vengano eliminati, finiscono nel cestino (a patto che nella finestra di eliminazione non si sia scelta direttamente l'eliminazione definitiva).<br/>
		Da qui si possono recuperare file cancellati non definitivamente. Eventuali file cancellati definitivamente sono <u>irrecuperabili</u>.<br/><br/>
		<b>APP CALCOLATRICE</b><br/>
		L'app calcolatrice &egrave; una semplice calcolatrice priva di funzioni avanzate e si apre in una finestra all'interno della pagina e permette di eseguire le pi&ugrave; semplici operazioni come l'addizione, la sottrazione, la moltiplicazione e la divisione.<br/><br/><br/>
		Queste sono le basi per saper usare correttamente LightSchool. Per un'approfondimento delle app, consultare le pagine del manuale dedicate alle singole app.<br/><br/><br/>
	      </td>
	    </tr>
	  </table>
	  <?php }elseif($_GET['id'] == '2'){ ?>
	  <table>
	    <tr>
	      <td valign="top" style="width: 520px">
		<figure style="position: fixed; top: 180px; left: 0px">
		  <img src='<?= $IMAGES_MAIN_DIRECTORY ?>/help/desktop_overview.png' onmouseover="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/desktop_overviewhelp.png')" onmouseleave="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/desktop_overview.png')" alt='immagine 1' style='width: 500px; height: 270px; margin-right: 10px; margin-bottom: 10px' />
		  <figcaption>Immagine 1 (passa il mouse sopra l'immagine)</figcaption>
		</figure>
	      </td>
	      <td valign="top">
		Nell'immagine 1 viene illustrato il <b>Desktop</b>.<br/>
		Il Desktop &egrave; la prima pagina che viene mostrata quando si accede e contiene le cartelle, i quaderni, i file e gli eventi diario che sono stati aggiunti al desktop.<br/>
		&Egrave; inoltre presente un pannello laterale a destra che contiene le <i>Note rapide</i> o <i>Fastnote</i>. &Egrave; anche lo spazio dove compaiono eventuali quaderni corretti dai docenti.<br/>
		Ora vedremo come aggiungere e rimuovere un elemento al desktop.<br/>
		<ul>
		  <li><b>Una cartella:</b><br/>
		  Per aggiungere o rimuovere una cartella, bisogna recarsi all'interno della cartella stessa e cliccare sul 2&deg; pulsante azione contenente l'immagine di un ingranaggio.<br/>
		  Quindi selezionare <i>Aggiungi al Desktop</i> (per aggiungere) o <i>Rimuovi dal Desktop</i> (per rimuovere)<br/><br/></li>
		  <li><b>Un quaderno:</b><br/>
		  Per aggiungere o rimuovere un quaderno, bisogna recarsi all'interno del quaderno stesso e cliccare sul penultimo pulsante della barra in alto a contenente l'immagine di una stella.<br/>
		  Il pulsante indicato serve sia per aggiungere che per rimuovere il quaderno a seconda della situazione<br/><br/></li>
		  <li><b>Un file:</b><br/>
		  Per aggiungere o rimuovere un file caricato, bisogna fare un click destro sopra l'icona del file e nel menu a tendina che si apre, cliccare <i>Aggiungi al Desktop</i> (per aggiungere) o <i>Rimuovi dal Desktop</i> (per rimuovere)<br/><br/></li>
		  <li><b>Un evento diario:</b><br/>
		  Per aggiungere o rimuovere un evento diario, bisogna recarsi all'interno del quaderno stesso e cliccare sulla scritta <span style="color: darkgreen; font-weight: bold">verde <i>Desktop</i></span> con icona a stella presente in alto.<br/>
		  Il pulsante indicato serve sia per aggiungere che per rimuovere il quaderno a seconda della situazione<br/><br/></li>
		</ul>
		<b>Fastnote</b> &egrave; utile per prendere rapidamente appunti come ad esempio <i>Ricordarsi di far firmare il permesso per l'uscita anticipata</i> o altre note rapide che non riguardano necessariamente una materia o un argomento.<br/><br/>
		<b>Correzione quaderni</b> &egrave; invece una sezione che compare sopra le <i>Fastnote</i> solamente in caso un docente abbia corretto un quaderno o un compito che gli era stato inviato.
		<br/><br/><br/>
	      </td>
	    </tr>
	  </table>
	  <?php }elseif($_GET['id'] == '3'){ ?>
	  <table>
	    <tr>
	      <td valign="top" style="width: 520px">
		<figure style="position: fixed; top: 180px; left: 0px">
		  <img src='<?= $IMAGES_MAIN_DIRECTORY ?>/help/files_overview.png' onmouseover="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/files_overviewhelp.png')" onmouseleave="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/files_overview.png')" alt='immagine 1' style='width: 500px; height: 270px; margin-right: 10px; margin-bottom: 10px' />
		  <figcaption>Immagine 1 (passa il mouse sopra l'immagine)</figcaption>
		</figure>
	      </td>
	      <td valign="top">
		Nell'immagine 1 viene illustrato <b>I miei file</b>.<br/>
		I miei file raccoglie tutte le tue cartelle, i tuoi quaderni e i file che caricherai su LightSchool. &Egrave; il cuore di LightSchool!<br/>
		In questa pagina prendi appunti, carichi file Word, Excel, PowerPoint, immagini, pagine HTML e CSS e altro! Puoi organizzare i tuoi quaderni e file in cartelle e cambiarne le icone.<br/>
		<span id="howtocreate">Ora vedremo come si crea...</span><br/>
		<ul>
		  <li><b>...una cartella:</b><br/>
		  Per creare una cartella, bisogna puntare il mouse sopra il <i>pulsante azione</i> tondo con un'icona raffigurante un <i>pi&ugrave;</i>.<br/>
		  Si aprir&agrave; un menu a cascata e bisogner&agrave; scegliere <i>Nuova cartella</i>. Nella finestra di dialogo che si apre, digitare il nome della nuova cartella e premere <i>Crea</i>.<br/><br/></li>
		  <li><b>...un quaderno:</b><br/>
		  Per creare un quaderno, bisogna puntare il mouse sopra il <i>pulsante azione</i> tondo con un'icona raffigurante un <i>pi&ugrave;</i>.<br/>
		  Si aprir&agrave; un menu a cascata e bisogner&agrave; scegliere <i>Nuovo quaderno</i>. La pagina cambier&agrave; e si aprir&agrave; un editor di quaderni nel quale si potr&agrave; personalizzare qualsiasi aspetto del quaderno, dalle formattazioni del testo ai margini e l'intestazione e il pi&egrave; di pagina. Scrivere il quaderno nell'area a forma di foglio che compare e poi in alto a destra cliccare sull'icona a forma di <i>Floppy</i> <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/black/save.png" id="saveimg" style="width: 16px; height: 16px" />. Scegliere un nome e cliccare su <i>Salva</i>.<br/><br/></li>
		  <li><b>...un file:</b><br/>
		  Per caricare un file, bisogna puntare il mouse sopra il <i>pulsante azione</i> tondo con un'icona raffigurante un <i>pi&ugrave;</i>.<br/>
		  Si aprir&agrave; un menu a cascata e bisogner&agrave; scegliere <i>Carica file</i>. Nella finestra di dialogo che si apre, cliccare su <i>Sfoglia</i> e cercare nel computer o nel dispositivo il file che si desidera caricare su LightSchool. Sceglierlo e successivamente cliccare su <i>Carica</i>.<br/>
		  <b>Attenzione</b>: si possono caricare soltanto file accettati e con un peso inferiore a 1 MB.<br/><br/></li>
		</ul>
		<span id="howtodelete">Per eliminare un qualsiasi elemento</span>, fare un click destro sopra un'icona e scegliere <i>Elimina</i>. Nella finestra di dialogo che si apre si pu&ograve; scegliere se spostare nel cestino o eliminare direttamente l'elemento.<br/>
		In alternativa si pu&ograve; trascinare un'icona sul cestino nella taskbar per vedere l'elemento spostato nel cestino automaticamente.
		<br/><br/><br/>
	      </td>
	    </tr>
	  </table>
	  <?php }elseif($_GET['id'] == '4'){ ?>
	  <table>
	    <tr>
	      <td valign="top" style="width: 520px">
		<figure style="position: fixed; top: 180px; left: 0px">
		  <img src='<?= $IMAGES_MAIN_DIRECTORY ?>/help/share_overview.png' onmouseover="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/share_overviewhelp.png')" onmouseleave="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/share_overview.png')" alt='immagine 1' style='width: 500px; height: 270px; margin-right: 10px; margin-bottom: 10px' />
		  <figcaption>Immagine 1 (passa il mouse sopra l'immagine)</figcaption>
		</figure>
	      </td>
	      <td valign="top">
		Nell'immagine 1 viene illustrato <b>Condivisi</b>.<br/>
		In questa pagina appariranno tutti i quaderni, file ed eventi diario che gli utenti di LightSchool condivideranno con te.<br/>
		Per aprire un elemento, basta fare un doppio click.
		<br/><br/><br/>
	      </td>
	    </tr>
	  </table>
	  <?php }elseif($_GET['id'] == '5'){ ?>
	  <table>
	    <tr>
	      <td valign="top" style="width: 520px">
		<figure style="position: fixed; top: 180px; left: 0px">
		  <img src='<?= $IMAGES_MAIN_DIRECTORY ?>/help/quiz_overview.png' onmouseover="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/quiz_overviewhelp.png')" onmouseleave="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/quiz_overview.png')" alt='immagine 1' style='width: 500px; height: 270px; margin-right: 10px; margin-bottom: 10px' />
		  <figcaption>Immagine 1 (passa il mouse sopra l'immagine)</figcaption>
		</figure>
	      </td>
	      <td valign="top">
		Nell'immagine 1 viene illustrato <b>LightSchool Quiz</b>.<br/>
		In arrivo...
		<br/><br/><br/>
	      </td>
	    </tr>
	  </table>
	  <?php }elseif($_GET['id'] == '6'){ ?>
	  <table>
	    <tr>
	      <td valign="top" style="width: 520px">
		<figure style="position: fixed; top: 180px; left: 0px">
		  <img src='<?= $IMAGES_MAIN_DIRECTORY ?>/help/diary_overview.png' onmouseover="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/diary_overviewhelp.png')" onmouseleave="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/diary_overview.png')" alt='immagine 1' style='width: 500px; height: 270px; margin-right: 10px; margin-bottom: 10px' />
		  <figcaption>Immagine 1 (passa il mouse sopra l'immagine)</figcaption>
		</figure>
	      </td>
	      <td valign="top">
		Nell'immagine 1 viene illustrato <b>Il mio diario</b>.<br/>
		Il mio diario &egrave; il centro di comando e organizzazione dei tuoi compiti, verifiche e interrogazioni.<br/>
		<span id="howtocreate">Ora vedremo come si crea un evento diario.</span><br/>
		Ci sono due modi per creare un evento diario:<br/>
		<ul>
		  <li><b>Creazione ordinaria:</b><br/>
		  Cliccare il <i>pulsante azione</i> tondo con un'icona raffigurante un <i>pi&ugrave;</i>.<br/>
		  Si aprir&agrave; una finestra di dialogo contenente i campi <i>Tipo</i> (Verifica, interrogazione, compiti, relazione, esame, uscita didattica, ...), <i>Materia</i>, <i>Data</i>, <i>Priorit&agrave;</i> e <i>Dettagli</i>. Una volta compilati tutti i campi (Dettagli &egrave; facoltativo) basta cliccare su <i>Crea</i>.<br/><br/></li>
		  <li><b>Creazione automatica:</b><br/>
		  Cliccare il <i>pulsante azione</i> tondo con un'icona raffigurante una <i>bacchetta magica</i> <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/black/automatic.png" alt="Creazione automatica" style="width: 16px; height: 16px"/>.<br/>
		  Si aprir&agrave; un fumetto nel quale sar&agrave; presente solo un campo di testo.<br/>
		  Qui basta scrivere cosa si vuole creare e LightSchool lo creer&agrave; automaticamente.<br/>
		  <b>Attenzione:</b> per far si che funzioni correttamente &egrave; necessario che venga rispettato l'ordine e la dicitura esatta da scrivere.<br/>
		  Bisogna scrivere seguendo questa struttura: [Tipo] di [Materia] il [Data in formato gg/mm/aaaa]: [Dettagli]<br/>
		  Per esempio: Verifica di Matematica il 09/02/2015: sulla circonferenza .<br/></li>
		</ul>
		<span id="howtodelete">Per eliminare un evento diario</span>, fare un click destro sopra un'evento diario. Nella finestra di dialogo che si apre si pu&ograve; scegliere se spostare nel cestino o eliminare direttamente l'elemento.
		<br/><br/><br/>
	      </td>
	    </tr>
	  </table>
	  <?php }elseif($_GET['id'] == '7'){ ?>
	  <table>
	    <tr>
	      <td valign="top" style="width: 520px">
		<figure style="position: fixed; top: 180px; left: 0px">
		  <img src='<?= $IMAGES_MAIN_DIRECTORY ?>/help/timetable_overview.png' onmouseover="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/timetable_overviewhelp.png')" onmouseleave="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/timetable_overview.png')" alt='immagine 1' style='width: 500px; height: 270px; margin-right: 10px; margin-bottom: 10px' />
		  <figcaption>Immagine 1 (passa il mouse sopra l'immagine)</figcaption>
		</figure>
	      </td>
	      <td valign="top">
		Nell'immagine 1 viene illustrato <b>Il mio orario</b>.<br/>
		Il mio orario &egrave; il centro di comando e organizzazione dei tuoi compiti, verifiche e interrogazioni.<br/><br/>
		<span id="howtocreate" style="font-weight: bold">Come creare una materia:</span><br/>
		Cliccare il <i>pulsante azione</i> tondo con un'icona raffigurante un <i>pi&ugrave;</i>.<br/>
		Si aprir&agrave; una finestra di dialogo contenente i campi <i>Giorno</i>, <i>Materia</i>, <i>Ora</i>, <i>Data</i>, <i>Libro</i>, <i>Colore</i> ed <i>Effetto</i>. Una volta compilati tutti i campi (Libro, colore ed effetto sono facoltativi) basta cliccare su <i>Aggiungi materia</i>.<br/><br/>
		<span id="howtoedit" style="font-weight: bold">Come modificare una materia:</span><br/>
		Fare un click sopra una materia e modificare i campi, poi cliccare su <i>Aggiorna materia</i>.<br/><br/>
		<span id="howtodelete" style="font-weight: bold">Come eliminare una materia:</span><br/>
		Fare un click sopra una materia e scegliere <i>Elimina</i>. Nella finestra di dialogo che si apre cliccare su <i>Conferma</i>.
		<br/><br/><br/>
	      </td>
	    </tr>
	  </table>
	  <?php }elseif($_GET['id'] == '9'){ ?>
	  <table>
	    <tr>
	      <td valign="top" style="width: 520px">
		<figure style="position: fixed; top: 180px; left: 0px">
		  <img src='<?= $IMAGES_MAIN_DIRECTORY ?>/help/messages_overview.png' onmouseover="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/messages_overviewhelp.png')" onmouseleave="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/messages_overview.png')" alt='immagine 1' style='width: 500px; height: 270px; margin-right: 10px; margin-bottom: 10px' />
		  <figcaption>Immagine 1 (passa il mouse sopra l'immagine)</figcaption>
		</figure>
	      </td>
	      <td valign="top">
		Nell'immagine 1 viene illustrato <b>Messaggi</b>.<br/>
		Messaggi &egrave; il postino di LightSchool che porta e riceve le tue lettere per tutto il sito. &Egrave; instancabile!<br/><br/>
		<span id="howtosend" style="font-weight: bold">Come inviare un messaggio:</span><br/>
		Cliccare il <i>pulsante azione</i> tondo con un'icona raffigurante un <i>pi&ugrave;</i>.<br/>
		Si aprir&agrave; una finestra di dialogo contenente i campi <i>Destinatario</i> (se presenti contatti in rubrica si potr&agrave; scegliere fra uno di loro), <i>Oggetto</i> e <i>Messaggio</i>. Una volta compilati tutti i campi (oggetto &egrave; facoltativo) basta cliccare su <i>Invia</i>.<br/>
		<b>Attenzione:</b>Il campo <i>Nome utente</i> dev'essere lasciato vuoto se si vuole che il messaggio venga spedito al contatto scelto dalla rubrica.<br/><br/>
		<span id="howtoreplyforward" style="font-weight: bold">Come rispondere o inoltrare a un messaggio:</span><br/>
		Fare un click sopra un messaggio e poi scegliere <i>Rispondi o inoltra</i>.<br/>
		Qui scegli se rispondere lasciando invariato il destinatario o inoltrare cambiandone il destinatario.<br/>
		<b>Attenzione:</b>Il campo <i>Nome utente</i> dev'essere lasciato vuoto se si vuole che il messaggio venga spedito al contatto scelto dalla rubrica.<br/><br/>
		<span id="howtosentfolder" style="font-weight: bold">Passare alla Posta inviata:</span><br/>
		In alto a destra cliccare sull'icona a forma di aereoplanino di carta <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/black/sent.png" style="width: 16px; height: 16px" />.<br/><br/>
		<span id="howtoinboxfolder" style="font-weight: bold">Passare alla Posta in arrivo:</span><br/>
		In alto a destra cliccare sull'icona a forma di scatola <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/black/inbox.png" style="width: 16px; height: 16px" />.<br/><br/>
		<span id="howtoblockuser" style="font-weight: bold">Come bloccare un utente:</span><br/>
		In alto a destra cliccare sull'icona a forma di scudo <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/black/shield.png" style="width: 16px; height: 16px" />.
		<br/><br/><br/>
	      </td>
	    </tr>
	  </table>
	  <?php }elseif($_GET['id'] == '10'){ ?>
	  <table>
	    <tr>
	      <td valign="top" style="width: 520px">
		<figure style="position: fixed; top: 180px; left: 0px">
		  <img src='<?= $IMAGES_MAIN_DIRECTORY ?>/help/people_overview.png' onmouseover="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/people_overviewhelp.png')" onmouseleave="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/people_overview.png')" alt='immagine 1' style='width: 500px; height: 270px; margin-right: 10px; margin-bottom: 10px' />
		  <figcaption>Immagine 1 (passa il mouse sopra l'immagine)</figcaption>
		</figure>
	      </td>
	      <td valign="top">
		Nell'immagine 1 viene illustrata <b>Rubrica</b>.<br/>
		Salva nella rubrica tutti gli utenti che contatti pi&ugrave; frequentemente. Nelle pagine di condivisione ed invio messaggi potrai scegliere da un menu a tendina tutti i contatti salvati in rubrica, senza doverli ricordare a memoria.<br/><br/>
		<span id="howtosave" style="font-weight: bold">Come creare un contatto:</span><br/>
		Cliccare il <i>pulsante azione</i> tondo con un'icona raffigurante un <i>pi&ugrave;</i>.<br/>
		Si aprir&agrave; una finestra di dialogo contenente i campi <i>Nome</i>, <i>Cognome</i>, <i>Nome utente</i> e <i>Soprannome</i>. Una volta compilati tutti i campi (soprannome &egrave; facoltativo) basta cliccare su <i>Salva</i>.<br/>
		<b>Attenzione:</b>Il campo <i>Nome utente</i> deve corrispondere a quello utilizzato dalla persona su LightSchool.<br/><br/>
		<span id="howtosend" style="font-weight: bold">Come inviare a un messaggio:</span><br/>
		Fare click su <i>Invia messaggio</i> sulla casella del contatto al quale si vuole inviare un messaggio.<br/><br/>
		<span id="howtoedit" style="font-weight: bold">Come modificare un contatto:</span><br/>
		Fare click su <i>Modifica</i> sulla casella del contatto e poi modificare i campi. Infine premere <i>Salva</i>.<br/><br/>
		<span id="howtodelete" style="font-weight: bold">Come eliminare un contatto:</span><br/>
		Fare click su <i>Elimina</i> sulla casella del contatto e cliccare su <i>Conferma</i>.
		<br/><br/><br/>
	      </td>
	    </tr>
	  </table>
	  <?php }elseif($_GET['id'] == '11'){ ?>
	  <table>
	    <tr>
	      <td valign="top" style="width: 520px">
		<figure style="position: fixed; top: 180px; left: 0px">
		  <img src='<?= $IMAGES_MAIN_DIRECTORY ?>/help/trash_overview.png' onmouseover="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/trash_overviewhelp.png')" onmouseleave="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/trash_overview.png')" alt='immagine 1' style='width: 500px; height: 270px; margin-right: 10px; margin-bottom: 10px' />
		  <figcaption>Immagine 1 (passa il mouse sopra l'immagine)</figcaption>
		</figure>
	      </td>
	      <td valign="top">
		Nell'immagine 1 viene illustrato <b>Cestino</b>.<br/>
		Nel cestino finiscono tutti i quaderni, cartelle, file ed eventi diario che vengono cestinati prima dell'eliminazione definitiva.<br/><br/>
		<span id="howtorestore" style="font-weight: bold">Come ripristinare:</span><br/>
		Fare click destro sopra un file e scegliere <i>Ripristina</i>. Dalla finestra di dialogo che si apre, scegliere <i>Conferma</i>.<br/><br/>
		<span id="howtodelete" style="font-weight: bold">Come eliminare definitivamente:</span><br/>
		Fare click destro sopra un file e scegliere <i>Elimina</i>. Dalla finestra di dialogo che si apre, scegliere <i>Conferma</i>.<br/><br/>
		<span id="howtodeleteeverything" style="font-weight: bold">Come svuotare il cestino:</span><br/>
		Fare click su <i>Svuota cestino</i> e nella finestra di dialogo che si apre scegliere che sezione si desidera eliminare (File, Diario o tutti e due). Cliccare poi su <i>Svuota</i>.<br/><br/><br/>
	      </td>
	    </tr>
	  </table>
	  <?php }elseif($_GET['id'] == '12'){ ?>
	  <table>
	    <tr>
	      <td valign="top" style="width: 520px">
		<figure style="position: fixed; top: 180px; left: 0px">
		  <img src='<?= $IMAGES_MAIN_DIRECTORY ?>/help/settings_overview.png' onmouseover="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/settings_overviewhelp.png')" onmouseleave="$(this).attr('src','<?= $IMAGES_MAIN_DIRECTORY ?>/help/settings_overview.png')" alt='immagine 1' style='width: 500px; height: 270px; margin-right: 10px; margin-bottom: 10px' />
		  <figcaption>Immagine 1 (passa il mouse sopra l'immagine)</figcaption>
		</figure>
	      </td>
	      <td valign="top">
		Nell'immagine 1 viene illustrato <b>Impostazioni</b>.<br/>
		In questa pagina si pu&ograve; modificare qualsiasi cosa! Dal colore delle barre e delle icone, all'indirizzo e-mail, password, notifiche via e-mail, impostazioni di sicurezza e blocco accessi.<br/>
		Ora esamineremo ogni sezione.<br/>
		<ul>
		  <li><span id="personalinfo"><b>Informazioni personali</b></span><br/>
		    <ul>
		      <li>
			<span id="emailaddress"><b>Indirizzo e-mail</b> &egrave; l'indirizzo e-mail principale del tuo account al quale invieremo istruzioni per il recupero della password qualora la dimenticassi e dove invieremo le notifiche.</span><br/>
		      </li>
		      <li>
			<span id="phonenumber"><b>Numero di telefono</b> &egrave; utile per eventuali contatti dal personale di LightSchool e il numero di telefono al quale invieremo SMS per notifiche ed altro.</span><br/>
		      </li>
		      <li>
			<span id="school"><b>Scuola</b> verr&agrave; visualizzata nella pagina del proprio profilo e sar&agrave; mostrata agli altri utenti del sito se non specificato diversamente nella sezione <i>Privacy</i>.</span><br/>
		      </li>
		      <li>
			<span id="language"><b>Lingua</b> &egrave; la lingua utilizzata dal sito web e non influisce la lingua della app. Attualmente supportiamo l'italiano e l'inglese.</span><br/>
		      </li>
		      <li>
			<span id="county"><b>Provincia</b> verr&agrave; visualizzata nella pagina del proprio profilo e sar&agrave; mostrata agli altri utenti del sito se non specificato diversamente nella sezione <i>Privacy</i>.</span><br/><br/>
		      </li>
		    </ul>
		  </li>
		  <li><span id="personalinfo"><b>Personalizza</b></span><br/>
		    <ul>
		      <li>
			<span id="accentcolor"><b>Colore preferito</b> &egrave; il colore delle barre e di una parte degli elementi che compongono le pagine web di questo sito.</span><br/>
		      </li>
		      <li>
			<span id="subject"><b>Materia</b> &egrave; un campo visibile solo ai docenti e verr&agrave; utilizzato per precompilare il campo <i>Materia</i> nel registro elettronico.</span><br/>
		      </li>
		      <li>
			<span id="lim"><b>LIM predefinita</b> compila in automatico il campo LIM quando viene richiesto per proiettare un file sulla LIM.</span><br/>
		      </li>
		      <li>
			<span id="click"><b>Apertura oggetti</b> puoi scegliere se aprire le icone con un click singolo o un doppio click.</span><br/>
		      </li>
		      <li>
			<span id="autosavetimer"><b>Timer salvataggio automatico</b> &egrave; l'intervallo di tempo da 5 secondi a 60 minuti nel quale salvare nella bozza un quaderno finch&egrave; viene scritto per prevenire un blackout o un blocco del browser. Il contenuto della bozza non &egrave; (attualmente) sincronizzato ma permane nel dispositivo locale finch&egrave; non viene salvato.</span><br/><br/>
		      </li>
		    </ul>
		  </li>
		  <li><span id="security"><b>Sicurezza e privacy</b></span><br/>
		    <ul>
		      <li>
			<span id="accesscontrol"><b>Controllo accessi</b> tiene traccia di tutti gli accessi al tuo account e permette di bloccare o disconnettere i dispositivi che vi hanno accesso.<br/>
			Per usufruire di questa funzione, il sistema si basa sull'indirizzo IP e sull'user agent del browser di accesso.</span><br/>
		      </li>
		      <li>
			<span id="accessfrom"><b>Accesso da...</b> PC/smartphone/tablet/Windows/Windows Phone permette di bloccare alla radice qualsiasi accesso dai dispositivi precedentemente citati. Un dispositivo deve comunque rimanere accessibile per poter permettere l'utilizzo dell'account. In caso l'utente blocchi tutti gli accessi, verr&agrave; in automatico sbloccato l'accesso dai PC.</span><br/>
		      </li>
		      <li>
			<span id="visibility"><b>Visibilit&agrave;</b> permette agli utenti di trovarti nella ricerca globale degli utenti che utilizzano LightSchool.</span><br/><br/>
		      </li>
		    </ul>
		  </li>
		  <li><span id="email"><b>Comunicazioni via e-mail</b></span><br/>
		    <ul>
		      <li>
			<span id="accessnotification"><b>Notifiche accessi</b> ti invier&agrave; un'e-mail ogni volta che un nuovo dispositivo accede. Questa funzione &egrave; disponibile solo quando Controllo accessi &egrave; attivo.</span><br/>
		      </li>
		      <li>
			<span id="newmessages"><b>Nuovi messaggi</b> ti invier&agrave; un'e-mail ogni volta che ricevi un nuovo messaggio.</span><br/>
		      </li>
		      <li>
			<span id="newshare"><b>Nuova condivisione</b> Ti invier&agrave; un'e-mail ogni volta che una persona condivide qualcosa con te.</span><br/><br/>
		      </li>
		    </ul>
		  </li>
		  <li><span id="changepassword"><b>Cambia password</b></span><br/>
		    Cambia password ti permette di cambiare la password di accesso al tuo account.<br/><br/>
		  </li>
		  <li><span id="deactivateaccount"><b>Disattiva account</b></span><br/>
		    Quando disattivi l'account, rimane inattivo per 15 giorni allo scadere dei quali, tutti i tuoi file personali vengono definitivamente cancellati.<br/>
		    Tuttavia, l'indirizzo e-mail e il nome utente rimarranno occupati e non disponibili per una nuova registrazione, per i successivi 365 giorni.<br/>
		    Per riattivare l'account entro i 15 giorni, baster&agrave; effettuare l'accesso.<br/>
		  </li>
		</ul>
	      </td>
	    </tr>
	  </table>
	  <?php }else{ ?>
	  Questo articolo non esiste. Cerca in questa casella di ricerca quello che stavi cercando.<br/><br/>
	  <form method="get" action="help">
	    <input type="search" name="q" id="q" style="width: 100%; max-width: 550px" placeholder="Cerca nel manuale" value="<?= $_GET['q'] ?>" /><input type="submit" value="Cerca" style="display: none" />
	  </form>
	  <?php } ?>
	</p>
      <?php }elseif($_GET['q'] != ''){ ?>
	<b>Hai cercato</b> <?php echo($_GET['q']); ?>
      <?php } ?>
    </div>
  </body>
</html>