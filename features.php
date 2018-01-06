<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Funzioni - LightSchool</title>
    <?php include_once "style.php"; ?>
    <script type="text/javascript">
      $('#user_type a').click(function (e) {
	e.preventDefault()
	$(this).tab('show')
      });
    </script>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 80px">
      <ol class="breadcrumb">
	<li><a href="<?= $MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	<li class="active">Funzioni</li>
      </ol>
      <div class="page-header">
	<h1>Funzioni <small>Studenti / Docenti / Scuole / Editori</small></h1>
      </div>
      <p style="font-size: 10pt; color: gray">LightSchool si riserva il diritto di cambiare in qualsiasi momento e senza preavviso tutte le informazioni fornite in questa pagina.</p>
      <ul role="tablist" class="nav nav-tabs" id="user_type">
	<li class="active" role="presentation"><a aria-expanded="true" aria-controls="students" data-toggle="tab" role="tab" id="students-tab" href="#students">Studenti</a></li>
	<li role="presentation" class=""><a aria-controls="teachers" data-toggle="tab" id="teachers-tab" role="tab" href="#teachers" aria-expanded="false">Docenti</a></li>
	<li role="presentation" class=""><a aria-controls="schools" data-toggle="tab" id="schools-tab" role="tab" href="#schools" aria-expanded="false">Scuole</a></li>
	<li role="presentation" class=""><a aria-controls="publishers" data-toggle="tab" id="publishers-tab" role="tab" href="#publishers" aria-expanded="false">Editori</a></li>
      </ul>
      <div class="tab-content" id="myTabContent">
	<div aria-labelledby="students-tab" id="students" class="tab-pane fade active in" role="tabpanel">
	  <div id="file">
	    <h3>Quaderni</h3>
	    <p>Un programma di videoscrittura sempre con te, completo, efficente e gratuito!</p>
	    <p>Sono presenti tutte le formattazioni di testo pi&ugrave; utilizzate, come grassetto, corsivo, sottolineato, dimensioni del testo, colore, carattere, allineamenti, elenchi puntati e numerati, apici e pedici e rientri.</p>
	    <p>&Egrave; inoltre possibile aggiungere immagini semplicemente trascinandole all'interno del documento nella posizione desiderata.</p>
	    <p>I quaderni sono condivisibili e possono essere creati insieme a pi&ugrave; persone<sup>1</sup>.</p>
	    <h5><small>1. Funzione attualmente non disponibile</small></h5>
	  </div>
	  <div id="shared">
	    <h3>File</h3>
	    <p>Puoi caricare tutti i file che desideri, a patto che siano fra questi tipi:
	      <ul>
		<li>Microsoft Office Word (doc, docx)</li>
		<li>Microsoft Office Excel (xls, xlsx)</li>
		<li>Microsoft Office Powerpoint (ppt, pptx)</li>
		<li>OpenDocument Writer (odt)</li>
		<li>OpenDocument Spreadsheet (ods)</li>
		<li>OpenDocument Impress (odp)</li>
		<li>Immagini (bmp, png, jpg/jpeg, gif)</li>
		<li>File di testo semplice (txt)</li>
		<li>File di testo Rich Text Format (rtf)</li>
	      </ul>
	    e che non superino la dimensione di 1mb ciascuno.</p>
	  </div>
	  <div id="lim">
	    <h3>Condivisioni</h3>
	    <p>Condividi i tuoi quaderni, file e compiti con studenti e docenti in un click!</p>
	    <p>Si possono condividere i propri appunti e fare i compiti assieme oppure organizzare gruppi studio.</p>
	  </div>
	  <div id="test">
	    <h3>LIM</h3>
	    <p>&Egrave; possibile proiettare i propri quaderni sulla LIM della classe in un click, senza la necessit&agrave; di dover installare software aggiuntivi sulla LIM. Baster&agrave; sulla LIM collegarsi a <a href="https://lim.lightschool.it" target="_blank" role="link">lim.lightschool.it</a> e accedere con i dati della LIM forniti dal personale della scuola<sup>2</sup>.</p>
	    <h5><small>2. Non cedere le credenziali di accesso della LIM agli studenti.</small></h5>
	  </div>
	  <div id="diary">
	    <h3>Verifiche</h3>
	    <p>I docenti possono creare verifiche e somministrarle agli studenti. Gli studenti possono solamente eseguirle entro il tempo stabilito e le modalit&agrave; fornite dal docente.</h5>
	  </div>
	  <div id="register">
	    <h3>Diario</h3>
	    <p>Una verifica? Compiti? Una relazione da consegnare? Nessun problema, perch&eacute; LightSchool Diario &egrave; in grado di ricordarsi tutto!</p>
	    <p>Puoi segnare tutti gli eventi che vuoi sul tuo diario personale, organizzarli per tipo e data, aggiungere dettagli e cambiare la vista da mensile a settimanale.</p>
	    <p>Non hai voglia di controllare di persona il diario giorno per giorno? Nessun problema! Diario pu&ograve; inviarti dei promemoria via e-mail o notifiche<sup>3</sup> sul tuo dispositivo.</p>
	    <h5><small>3. &Egrave; necessario avere l'app di LightSchool installata sul proprio dispositivo. Lista compatibilit&agrave; e download <a href="<?= $MAIN_DIRECTORY ?>/golink?fwd_link=9">qui</a></small></h5>
	  </div>
	  <div id="timetable">
	    <h3>Registri di classe</h3>
	    <p>Qui sono presenti le comunicazioni per la famiglia, le note disciplinari, i voti, le lezioni e gli esiti degli scrutini.</p>
	  </div>
	  <div id="messages">
	    <h3>Orario</h3>
	    <p>Organizza le materie del tuo corso per giorno, utilizzando il pratico e veloce strumento messo a disposizione da LightSchool. Puoi assegnare a ogni materia, un colore e il nome del libro di testo.</p>
	  </div>
	  <div id="people">
	    <h3>Messaggi</h3>
	    <p>Puoi inviare messaggi a qualsiasi utente su LightSchool, come ad esempio studenti e docenti, per chiedere aiuto, delucidazioni o semplicemente per scambiare due parole con l'utente dall'altro lato dello schermo.</p>
	  </div>
	  <div id="security">
	    <h3>Rubrica</h3>
	    <p>Aggiungi i contatti con cui interagisci pi&ugrave; frequentemente e crea gruppi per inviare messaggi e condividere materiale velocemente con tutti i membri del gruppo.</p>
	  </div>
	  <div id="customize">
	    <h3>Sicurezza</h3>
	    <p>Ogni accesso, ammenoch&eacute; non venga scelto diversamente, viene registrato e si pu&ograve; scegliere di disconnettere o bloccare i dispositivi che hanno effettuato accesso al proprio account in remoto.</p>
	    <p>Se invece per vari motivi si decide di disattivare la funzione del <i>Controllo accessi</i> non si potranno disconnettere e bloccare i dispositivi, n&eacute; verranno pi&ugrave; registrati finch&eacute; non si decider&agrave; di riattivare la funzione.</p>
	  </div>
	  <div id="flexible">
	    <h3>Personalizzazione</h3>
	    <p>LightSchool offre il massimo della personalizzazione che si possa offrire: si possono infatti cambiare le icone dei menu, i colori delle barre e la visualizzazione e l'ordine delle icone. Puoi anche personalizzare le icone presenti nella barra principale del sito.</p>
	  </div>
	  <div id="simply">
	    <h3>Versatile</h3>
	    <p>LightSchool &egrave; compatibile con tutti i browser, sistemi operativi e dispositivi con poche e trascurabili differenze grafiche.</p>
	  </div>
	  <div id="free">
	    <h3>Semplice</h3>
	    <p>I menu e le sezioni sono perfettamente organizzate per un facile utilizzo da parte di chiunque utilizzi il sito.</p>
	  </div>
	  <div>
	    <h3>Gratuito</h3>
	    <p>LightSchool &egrave; gratuito e lo sar&agrave; per sempre.</p>
	  </div>
	</div>
	<div aria-labelledby="teachers-tab" id="teachers" class="tab-pane fade" role="tabpanel">
	  <div>
	    <h3>Quaderni</h3>
	    <p>Un programma di videoscrittura sempre con te, completo, efficente e gratuito!</p>
	    <p>Sono presenti tutte le formattazioni di testo pi&ugrave; utilizzate, come grassetto, corsivo, sottolineato, dimensioni del testo, colore, carattere, allineamenti, elenchi puntati e numerati, apici e pedici e rientri.</p>
	    <p>&Egrave; inoltre possibile aggiungere immagini semplicemente trascinandole all'interno del documento nella posizione desiderata.</p>
	    <p>I quaderni sono condivisibili e possono essere creati insieme a pi&ugrave; persone<sup>1</sup>.</p>
	    <h5><small>1. Funzione attualmente non disponibile</small></h5>
	  </div>
	  <div>
	    <h3>File</h3>
	    <p>Puoi caricare tutti i file che desideri, a patto che siano fra questi tipi:
	      <ul>
		<li>Microsoft Office Word (doc, docx)</li>
		<li>Microsoft Office Excel (xls, xlsx)</li>
		<li>Microsoft Office Powerpoint (ppt, pptx)</li>
		<li>OpenDocument Writer (odt)</li>
		<li>OpenDocument Spreadsheet (ods)</li>
		<li>OpenDocument Impress (odp)</li>
		<li>Immagini (bmp, png, jpg/jpeg, gif)</li>
		<li>File di testo semplice (txt)</li>
		<li>File di testo Rich Text Format (rtf)</li>
	      </ul>
	    e che non superino la dimensione di 1mb ciascuno.</p>
	  </div>
	  <div>
	    <h3>Condivisioni</h3>
	    <p>Condividi i tuoi quaderni, file e compiti con studenti e docenti in un click!</p>
	    <p>I docenti possono correggere i quaderni e compiti che gli sono stati inviati dagli alunni e assegnare direttamente un voto al lavoro svolto.</p>
	    <p>Anche gli studenti possono condividere i loro appunti e fare i compiti assieme oppure organizzare gruppi studio.</p>
	  </div>
	  <div>
	    <h3>LIM</h3>
	    <p>&Egrave; possibile proiettare i propri quaderni sulla LIM della classe in un click, senza la necessit&agrave; di dover installare software aggiuntivi sulla LIM. Baster&agrave; sulla LIM collegarsi a <a href="https://lim.lightschool.it" target="_blank" role="link">lim.lightschool.it</a> e accedere con i dati della LIM forniti dal personale della scuola<sup>2</sup>.</p>
	    <h5><small>2. Non cedere le credenziali di accesso della LIM agli studenti.</small></h5>
	  </div>
	  <div>
	    <h3>Verifiche</h3>
	    <p>I docenti possono creare facilmente e velocemente verifiche e inviarle agli alunni<sup>3</sup>!</p>
	    <p>Scegli fra domande a risposta aperta o a scelta multipla, imposta un tempo limite entro il quale svolgere la verifica.</p>
	    <p>Puoi inoltre impostare il sistema di autocorrezione affinch&egrave; ogni verifica venga valutata automaticamente secondo i parametri impostati. La correzione manuale &egrave; comunque prevista.</p>
	    <h5><small>3. Solo i docenti possono creare quiz mentre gli studenti possono solo eseguirli</small></h5>
	  </div>
	  <div>
	    <h3>Diario</h3>
	    <p>Una verifica? Compiti? Una relazione da ritirare a un alunno o a una classe? Nessun problema, perch&eacute; LightSchool Diario &egrave; in grado di ricordarsi tutto!</p>
	    <p>Puoi segnare tutti gli eventi che vuoi sul tuo diario personale, organizzarli per tipo e data, aggiungere dettagli e cambiare la vista da mensile a settimanale.</p>
	    <p>Non hai voglia di controllare di persona il diario giorno per giorno? Nessun problema! Diario pu&ograve; inviarti dei promemoria via e-mail o notifiche<sup>4</sup> sul tuo dispositivo.</p>
	    <h5><small>4. &Egrave; necessario avere l'app di LightSchool installata sul proprio dispositivo. Lista compatibilit&agrave; e download <a href="<?= $MAIN_DIRECTORY ?>/golink?fwd_link=9">qui</a></small></h5>
	  </div>
	  <div>
	    <h3>Registri di classe</h3>
	    <p>Fai l'appello in modo rapido ed efficace! Basta aprire la pagina dell'appello e automaticamente la riga del primo alunno verr&agrave; evidenziata. Baster&agrave; premere sulla tastiera P per segnarlo presente o A nel caso sia assente e automaticamente il sito applicher&agrave; la scelta e passer&agrave; all'alunno successivo.</p>
	    <p>I docenti possono applicare voti a tutti i loro studenti, vedere le loro medie. Tuttavia anche gli studenti possono aggiungere manualmente voti a una materia che tuttavia non influiranno il registro del docente.</p>
	    <p>Si possono caricare file, condividerli, firmare il registro, applicare note disciplinari e comunicare con le famiglie.</p>
	  </div>
	  <div>
	    <h3>Orario</h3>
	    <p>Organizza le materie del tuo corso per giorno, utilizzando il pratico e veloce strumento messo a disposizione da LightSchool. Puoi assegnare a ogni materia, un colore e il nome del libro di testo.</p>
	  </div>
	  <div>
	    <h3>Messaggi</h3>
	    <p>Puoi inviare messaggi a qualsiasi utente su LightSchool, come ad esempio studenti e docenti, per chiedere aiuto, delucidazioni o semplicemente per scambiare due parole con l'utente dall'altro lato dello schermo.</p>
	  </div>
	  <div>
	    <h3>Rubrica</h3>
	    <p>Aggiungi i contatti con cui interagisci pi&ugrave; frequentemente e crea gruppi per inviare messaggi e condividere materiale velocemente con tutti i membri del gruppo.</p>
	  </div>
	  <div>
	    <h3>Sicurezza</h3>
	    <p>Ogni accesso, ammenoch&eacute; non venga scelto diversamente, viene registrato e si pu&ograve; scegliere di disconnettere o bloccare i dispositivi che hanno effettuato accesso al proprio account in remoto.</p>
	    <p>Se invece per vari motivi si decide di disattivare la funzione del <i>Controllo accessi</i> non si potranno disconnettere e bloccare i dispositivi, n&eacute; verranno pi&ugrave; registrati finch&eacute; non si decider&agrave; di riattivare la funzione.</p>
	  </div>
	  <div>
	    <h3>Personalizzazione</h3>
	    <p>LightSchool offre il massimo della personalizzazione che si possa offrire: si possono infatti cambiare le icone dei menu, i colori delle barre e la visualizzazione e l'ordine delle icone. Puoi anche personalizzare le icone presenti nella barra principale del sito.</p>
	  </div>
	  <div>
	    <h3>Versatile</h3>
	    <p>LightSchool &egrave; compatibile con tutti i browser, sistemi operativi e dispositivi con poche e trascurabili differenze grafiche.</p>
	  </div>
	  <div>
	    <h3>Semplice</h3>
	    <p>I menu e le sezioni sono perfettamente organizzate per un facile utilizzo da parte di chiunque utilizzi il sito.</p>
	  </div>
	  <div>
	    <h3>Gratuito</h3>
	    <p>LightSchool &egrave; gratuito e lo sar&agrave; per sempre.</p>
	  </div>
	</div>
	<div aria-labelledby="schools-tab" id="schools" class="tab-pane fade" role="tabpanel">
	  <div>
	    <h3>Dashboard</h3>
	    <p>La pagina iniziale (Dashboard) mostra le statistiche sulla presenza e assenza di alunni, quelli assenti da pi&ugrave; di 7 giorni, le ultime 7 note inflitte dai docenti e messaggi interni e prioritari.</p>
	  </div>
	  <div>
	    <h3>Organizzazione</h3>
	    <p>Per organizzare studenti e docenti<sup>1</sup> bisogna creare le <i>Classi</i> usando la funzione predisposta nella pagina iniziale.</p>
	    <p>&Egrave; possibile assegnare pi&ugrave; alunni pi&ugrave; classi o gruppi di studio.</p>
	    <h5><small>1. Studenti e docenti devono creare il proprio account per conto proprio. Limitazione soggetta a cambiamento in futuro.</small></h5>
	  </div>
	  <div>
	    <h3>Comunicazioni scuola/famiglia</h3>
	    <p>Le comunicazioni avvengono creando una comunicazione nella sezione dedicata scegliendo poi la classe a cui inviarla o anche a singoli studenti o docenti.</p>
	    <p>I destinatari delle comunicazioni le riceveranno nel proprio account personale, via e-mail e tramite notifiche app<sup>2</sup>.</p>
	    <h5><small>2. &Egrave; necessario avere l'app di LightSchool installata sul proprio dispositivo. Lista compatibilit&agrave; e download <a href="<?= $MAIN_DIRECTORY ?>/golink?fwd_link=9">qui</a></small></h5>
	  </div>
	  <div>
	    <h3>Emergenze</h3>
	    <p>La scuola, in caso di emergenza, pu&ograve; inviare un messaggio di emergenza a tutti gli alunni e docenti della scuola che interromper&agrave; temporaneamente le attivit&agrave; in corso sulla piattaforma LightSchool trasmettendo il messaggio e invitando a lasciare l'edificio.</p>
	  </div>
	</div>
	<div aria-labelledby="publishers-tab" id="publishers" class="tab-pane fade" role="tabpanel">
	  <div>
	    <h3>Dashboard</h3>
	    <p>Tutte le informazioni di cui si necessita! Statistiche di vendita, recensioni, stato aggiornamento e-book e molto altro disponibili in un'unica pagina.</p>
	    <p>Le statistiche sono fornite in valore assoluto e in valore percentuale.</p>
	  </div>
	</div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>