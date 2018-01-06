<?php
  include_once "ABSOLUTE_PATH_TO_PUBLIC_HTML/System/Core.php";
  
  $MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/';
  $SUPPORT_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/support';
  $IMAGES_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/images_sub';
  $MY_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
  $UPLOAD_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
  
  $MAIL_SUPPORT = 'MAIL_SUPPORT_ADDRESS';
  $MAIL_INFO = 'info@lightschool.it';
  $MAIL_BUSINESS = 'business@lightschool.it';
  
  $DBServer = 'localhost';
  $DBUser   = 'DB_USER_VALUE';
  $DBPass   = 'DB_PASSWORD_VALUE';
  $DBName   = 'DB_DATABASE_VALUE';
  $DBName2  = 'DB_CONFIG_NOT_SHIPPED';
  $DBName3  = 'DB_CONFIG_NOT_SHIPPED';
  
  if($_COOKIE['language'] != ''){
    $include_lang = $_COOKIE['language'];
  }else{
    $include_lang = 'it-IT';
  }
  
  include "language_$include_lang.php";
  include "functions.php";
  
  $current_page = basename($_SERVER['PHP_SELF']);
  
  $order = array(".php");
  $current_page = str_replace($order, "", $current_page);
  $_GET['name'] = str_replace($order, "", $_GET['name']);
  
  if(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1)|| isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'){ }else{
    $redirect2 = basename($_SERVER['REQUEST_URI']);
    header("location: https:$SUPPORT_MAIN_DIRECTORY/".$redirect2);
  }
  if($_COOKIE['LOGIN_username'] != '' and $_COOKIE['LOGIN_password'] != '' and $_SESSION['Username'] == ''){
    include_once "auto_login.php";
  }
  
  function lightschool_get_doc($get_name){
    global $MAIN_DIRECTORY;
    global $MY_MAIN_DIRECTORY;
    global $IMAGES_MAIN_DIRECTORY;
    global $SUPPORT_MAIN_DIRECTORY;
    global $MAIL_SUPPORT;
    
    function lightschool_automate($get_text){
      global $MAIN_DIRECTORY;
      global $MY_MAIN_DIRECTORY;
      global $IMAGES_MAIN_DIRECTORY;
      global $SUPPORT_MAIN_DIRECTORY;
      global $MAIL_SUPPORT;
    
      $return = $get_text;
    
      $return = str_replace("LightSchool", "<a href='$MAIN_DIRECTORY' class='automated'>LightSchool</a>", "$return");
      $return = str_replace("Testa", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/header' class='automated'>Testa</a>", "$return");
      $return = str_replace("Taskbar", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/taskbar' class='automated'>Taskbar</a>", "$return");
      $return = str_replace("Centro notifiche", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/notification_center' class='automated'>Centro notifiche</a>", "$return");
      $return = str_replace("Pulsanti azione", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/action_button' class='automated'>Pulsanti azione</a>", "$return");
      $return = str_replace("Pulsanti impostazioni", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/settings_button' class='automated'>Pulsanti impostazioni</a>", "$return");
      $return = str_replace("Disconnessione", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/logout' class='automated'>Disconnessione</a>", "$return");
      $return = str_replace("Casella di ricerca", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/search' class='automated'>Casella di ricerca</a>", "$return");
      $return = str_replace("Ricerca", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/search' class='automated'>Ricerca</a>", "$return");
      $return = str_replace("Desktop", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/desktop' class='automated'>Desktop</a>", "$return");
      $return = str_replace("File", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/files' class='automated'>File</a>", "$return");
      $return = str_replace("I miei file", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/files' class='automated'>I miei file</a>", "$return");
      $return = str_replace("Quiz", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/quiz' class='automated'>Quiz</a>", "$return");
      $return = str_replace("Condivisi", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/share' class='automated'>Condivisi</a>", "$return");
      $return = str_replace("Diario", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/diary' class='automated'>Diario</a>", "$return");
      $return = str_replace("Orario", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/timetable' class='automated'>Orario</a>", "$return");
      $return = str_replace("Messaggi", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/messages' class='automated'>Messaggi</a>", "$return");
      $return = str_replace("Rubrica", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/people' class='automated'>Rubrica</a>", "$return");
      $return = str_replace("Cestino", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/trash' class='automated'>Cestino</a>", "$return");
      $return = str_replace("Accesso", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/login' class='automated'>Accesso</a>", "$return");
      $return = str_replace("accesso_ext", "<a href='$MY_MAIN_DIRECTORY/' class='automated'>Accesso</a>", "$return");
      $return = str_replace("Registrazione_ext", "<a href='$MY_MAIN_DIRECTORY/register' class='automated'>Registrazione</a>", "$return");
      $return = str_replace("registrazione", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/register' class='automated'>Registrazione</a>", "$return");
      $return = str_replace("Recupero password_ext", "<a href='$MY_MAIN_DIRECTORY/recover' class='automated'>Recupero password</a>", "$return");
      $return = str_replace("Ticket_open", "<a href='$SUPPORT_MAIN_DIRECTORY/submit' class='automated'>Ticket</a>", "$return");
      $return = str_replace("support_email", "$MAIL_SUPPORT", "$return");
      $return = str_replace("Controllo accessi", "<a href='$SUPPORT_MAIN_DIRECTORY/docs/access_control' class='automated'>Controllo accessi</a>", "$return");
      
      return $return;
    }
    
    if($get_name == 'welcome'){
      $return = array("Primi passi", "<div class='row'>
			<div class='col-xs-6 col-md-4'>
			  <figure>
			    <img src='$IMAGES_MAIN_DIRECTORY/help/files_overview.png' alt='Immagine 1' title='Immagine 1' style='width: 100%; margin-right: 10px; margin-bottom: 10px' />
			    <figcaption><div class='glyphicon glyphicon-chevron-up'></div>La pagina dei File (immagine 1)</figcaption>
			  </figure>
			  <figure>
			    <img src='$IMAGES_MAIN_DIRECTORY/help/diary_overview.png' alt='Immagine 2' title='Immagine 2' style='width: 100%; margin-right: 10px; margin-bottom: 10px' />
			    <figcaption><div class='glyphicon glyphicon-chevron-up'></div>La pagina del Diario (immagine 2)</figcaption>
			  </figure>
			  <figure>
			    <img src='$IMAGES_MAIN_DIRECTORY/help/timetable_overview.png' alt='Immagine 3' title='Immagine 3' style='width: 100%; margin-right: 10px; margin-bottom: 10px' />
			    <figcaption><div class='glyphicon glyphicon-chevron-up'></div>La pagina dell'Orario (immagine 3)</figcaption>
			  </figure>
			</div>
			<div class='col-xs-12 col-md-8'>
			  LightSchool ha una <i>barra superiore</i> detta <b>Testa</b> e una <i>barra inferiore</i> chiamata <b>Taskbar</b>.<br/><br/>
			  La <b>Testa</b> contiene:<br/>
			  <ul>
			    <li>Il titolo della pagina;</li>
			    <li>Dei pulsanti chiamati <i>Pulsanti azione</i> utili per compiere le azioni pi&ugrave; comuni che si eseguono sulla pagine come la creazione di nuovi elementi;</li>
			    <li>Dei bottoni piccoli in alto a destra chiamati <i>Pulsanti impostazioni</i> che includono link rapidi alla <i>Guida</i> e alla <i>Disconnessione</i>;</li>
			    <li>La Casella di ricerca in alto a destra per cercare file, eventi diario, contatti, messaggi e classi nel proprio account e utenti da tutto il mondo.</li>
			  </ul>
			  La <b>Taskbar</b> contiene:<br/>
			  <ul>
			    <li>Le icone delle App per passare da un'App all'altra;</li>
			    <li>Centro notifiche;</li>
			    <li>Data e ora</li>
			  </ul>
			  Ora spiegheremo le funzioni delle singole App in breve, in ordine da sinistra verso destra della Taskbar.<br/><br/>
			  <b class='minititle'>app Desktop</b>
			  Il Desktop &egrave; la prima pagina che si vede una volta effettuato l'accesso ed &egrave; un aggregatore di file, quaderni ed eventi diario preferiti.<br/>
			  &Egrave; possibile aggiungere al Desktop qualsiasi cartella, quaderno file ed evento diario per accedere pi&ugrave; velocemente ai contenuti pi&ugrave; usati.<br/><br/>
			  <b class='minititle'>app File</b>
			  L'app File &egrave; il cuore di LightSchool, &egrave; la parte dove si creano i quaderni o si caricano file e si organizzano in cartelle, &egrave; dove si prendono gli appunti di scuola e dove si fanno i compiti grazie a un programma di videoscrittura semplice ma completo delle funzioni pi&ugrave; utilizzate.<br/>
			  Si possono inoltre caricare file come immagini, file Word, Excel e PowerPoint (anche file creati con Open/LibreOffice), file di testo semplice come txt e rtf e pagine HTML.<br/><br/>
			  <b class='minititle'>app Condivisi</b>
			  &Egrave; la pagina dove si vedono file, quaderni ed eventi diario che sono stati condivisi con noi da altri studenti e docenti.<br/>
			  I quaderni possono essere modificati se si &egrave; docenti.<br/>
			  Al contrario, i file possono solo essere scaricati e gli eventi diario solamente visti.<br/><br/>
			  <b class='minititle'>app Quiz (utilizzabile solo dai docenti)</b>
			  L'app Quiz &egrave; un'app che permette di creare Quiz (o test) a risposta singola o multipla, domande aperte, a completament, grafiche e con ascolto, con un sistema di autocorrezione e un tempo limitato per essere eseguito, ideato per sottoporre alunni o classi a delle verifiche fatte con strumenti digitali. Basta creare un quiz, inserire la risposta corretta (che ovviamente non verr&agrave; mostrata agli studenti), facoltativo un tempo entro il quale fare il test e condividerlo con gli studenti o le classi.<br/><br/>
			  <b class='minititle'>app Diario</b>
			  Visibile in vista mensile &egrave; dove si segnano i compiti che ci sono da fare, gli argomenti delle verifiche ecc.<br/>
			  Si pu&ograve; chiedere al sito web di ricordarci di fare i compiti, impostando un promemoria ricevibile via e-mail o tramite notifica in app.<br/><br/>
			  <b class='minititle'>app Orario</b>
			  Aggiungi le materie, usa colori e formattazioni diverse e seleziona il giorno e l'app organizzer&agrave; automaticamente le materie con una vista giornaliera.<br/><br/>
			  <b class='minititle'>app Messaggi</b>
			  LightSchool permette di scambiare messaggi tra studenti e docenti. Ti baster&agrave; conoscere il nome utente della persona con la quale vuoi interagire e potrai cominciare a scambiare messaggi con lei!<br/>
			  Un utente ti disturba? Puoi bloccarlo dalle impostazioni all'interno dell'app o dalle impostazioni generali del sito.<br/><br/>
			  <b class='minititle'>app Rubrica</b>
			  Troppi nomi utenti da ricordare per ogni persona e una memoria da pesce rosso? O semplicemente ti &egrave; pi&ugrave; comodo tenere una lista delle persone che contatti di pi&ugrave;? Allora Rubrica fa al caso tuo!<br/>
			  Rubrica permette di salvare nel proprio account i nomi utenti delle persone per poter facilmente inviare messaggi o condividere con loro dei file cos&igrave; quando sar&agrave; necessario inviare un messaggio o condividere un file, iniziando a scrivere comparir&agrave; l'elenco dei contatti.<br/><br/>
			  <b class='minititle'>app Cestino</b>
			  Tutti i file che elimini, prima che vengano eliminati, finiscono nel Cestino (a patto che nella finestra di eliminazione non si sia scelta direttamente l'eliminazione definitiva).<br/>
			  Da qui si possono recuperare file cancellati non definitivamente. Eventuali file cancellati definitivamente sono <u>irrecuperabili</u>.
		      </div>");
    }elseif($get_name == 'register'){
      $return = array("Registrazione", "<div class='row'>
			  <center>
			  <img src='$IMAGES_MAIN_DIRECTORY/help/register.png' alt='Immagine 4' title='Immagine 4' style='width: 100%; max-width: 862px; margin-right: 10px; margin-top: 10px; margin-bottom: 10px' />
			  </center><br/>
			  Per registrarsi a LightSchool collegarsi a Registrazione_ext e compilare i campi richiesti come seguente:
			  <ul>
			    <li><b>Nome:</b> Il tuo nome reale. Non potrai modificarlo in seguito.</li>
			    <li><b>Cognome:</b> Il tuo cognome reale. Non potrai modificarlo in seguito.</li>
			    <li><b>Indirizzo e-mail:</b> Il tuo indirizzo e-mail reale. &Egrave; fondamentale per portare a termine correttamente la registrazione. Potr&agrave; essere modificato.</li>
			    <li><b>Nome utente:</b> Un nome di fantasia. Non deve contenere i caratteri indicati (es: segni di punteggiatura, spazi ecc). Non potrai modificarlo in seguito.</li>
			    <li><b>Password:</b> La tua password &egrave; segreta. Non devi condividerla con nessuno. Potr&agrave; essere modificata.</li>
			  </ul>
			  <b>DOCENTI:</b> se desideri registrarti come docente per sfruttarne tutti i vantaggi, devi utilizzare l'indirizzo e-mail istituzionale, come indicato nella pagina di registrazione.<br/>
			  Prima di completare la registrazione, leggere attentamente le Condizioni d'utilizzo e la Normativa sulla Privacy.<br/>
			  Una volta premuto su <i>Registrati</i>, errori a parte, la registrazione sar&agrave; completata. Dovreste vedere una schermata simile alla seguente se la procedura &egrave; andata a buon fine.
			  <center>
			  <img src='$IMAGES_MAIN_DIRECTORY/help/register_successful.png' alt='Immagine 5' title='Immagine 5' style='width: 100%; max-width: 862px; margin-right: 10px; margin-top: 10px; margin-bottom: 10px' />
			  </center><br/>
			  <h3>Risoluzione problemi</h3>
			  <ul>
			    <li><b>Caratteri non validi . , : / @ spazio:</b> hai digitato uno dei precedenti caratteri e non puoi continuare la registrazione in quanto tali caratteri non sono accettati. Rimuovili.</li>
			    <li><b>Nome utente gi&agrave; esistente.:</b> non puoi utilizzare il nome utente scelto perch&egrave; gi&agrave; stato usato da un altro utente.</li>
			    <li><b>Indirizzo e-mail gi&agrave; usato.:</b> non puoi utilizzare l'indirizzo e-mail scelto perch&egrave; gi&agrave; stato usato da un altro utente. Se sei il proprietario dell'account e hai dimenticato la password, segui la procedura di Recupero password_ext o consulta la sezione Accesso.</li>
			    <li><b>Ci sono stati dei problemi. Invia questo codice di errore a MAIL_SUPPORT_ADDRESS se desideri ricevere aiuto...:</b> abbiamo avuto dei problemi ad inviarti la e-mail. Se non la ricevi entro 10 minuti, inviaci una e-mail a support_email.</li>
			  </ul>
			  <h3>Domande frequenti</h3>
			  <ul>
			    <li id='why_email'><b>A cosa vi serve l'indirizzo e-mail?</b> L'indirizzo e-mail ci permette di verificare l'identit&agrave; dell'utente assicurandoci che possa aprire massimo un account ed &egrave; l'indirizzo al quale invieremo le istruzioni per recuperare la password qualora l'utente la dimenticasse e l'indirizzo dove si riceveranno le notifiche.</li>
			    <li id='what_username'><b>Cos'&egrave; il nome utente?</b> Un nome di fantasia... inventane uno a tua scelta!</li>
			    <li id='username_format'><b>Che formato deve avere il nome utente?</b> Non deve contenere i caratteri indicati (es: segni di punteggiatura, spazi ecc). Non deve contenere offese o altro materiale che inciti all'odio o alla discriminazione.</li>
			    <li id='activate'><b>Come attivo l'account al termine della registrazione?</b> Entro 10 minuti dal termine della registrazione riceverai all'indirizzo e-mail indicato un link univoco per attivare il tuo account. Premi il pulsante blu nella e-mail per attivare l'account. Sarai reindirizzato automaticamente a LightSchool dove sarai automaticamente collegato e il tuo account sar&agrave; attivato.</li>
			    <li id='no_email'><b>Non ho ricevuto l'e-mail per attivare l'account, che faccio?</b> Scrivici un e-mail dall'indirizzo con il quale ti sei registrato a support_email.</li>
			  </ul>");
    }elseif($get_name == 'login'){
      $return = array("Accesso", "<div class='row'>
			  <center>
			  <img src='$IMAGES_MAIN_DIRECTORY/help/login.png' alt='Immagine 6' title='Immagine 6' style='width: 100%; max-width: 862px; margin-right: 10px; margin-top: 10px; margin-bottom: 10px' />
			  </center><br/>
			  Per accedere a LightSchool collegarsi a accesso_ext ed inserire il proprio indirizzo e-mail e la password.<br/>
			  Se sei un nuovo utente, prima di poter accedere al tuo account dovrai aver attivato il tuo account cliccando sul link che ti abbiamo inviato via e-mail in fase di registrazione.
			  <h3>Domande frequenti</h3>
			  <ul>
			    <li id='not_correct'><b>Il sito mi dice che l'indirizzo e-mail o la password sono errati ma sono sicuro che sono giusti, che faccio?:</b> ti suggeriamo di cambiare immediatamente la password perch&eacute; il tuo account potrebbe essere stato soggetto di un attacco. Segui la procedura di Recupero password_ext. Una volta che sarai nuovamente entrato in possesso del tuo account, controlla la pagina del Controllo accessi e blocca tutti gli accessi che non riconosci.</li>
			    <li id='button_not_working'><b>Cosa faccio se il pulsante <i>Accedi</i> non funziona?:</b> &egrave; possibile che premendo il pulsante non accada niente. In questo caso ricaricare la pagina premendo F5 sulla tastiera o il simbolo di <i>Ricarica</i> del proprio browser. Se il problema non viene risolto, inviateci un e-mail a support_email.</li>
			    <li id='infinite_loading'><b>Il caricamento &egrave; infinito:</b> se la scritta <i>Caricamento...</i> non scompare mai &egrave; possibile che ci siano dei problemi con la tua connessione ad internet. Prova ad aprire un altro sito web e vedi se funziona. Se viene caricato, vuol dire che &egrave; un problema di LightSchool. In tal caso segnalacelo a support_email.</li>
			    <li id='device_blocked'><b>Mi dice che l'accesso dal dispositivo &egrave; stato bloccato dal proprietario, come risolvo?:</b> il proprietario (tu?) hai bloccato l'accesso dal dispositivo dal quale stai tentando di accedere. Se pensi di non essere stato tu e che qualcuno stia tentando di rubarti l'account, prova ad accedere da un altro dispositivo. Se non dovesse funzionare contattaci immediatamente a support_email e ti chiederemo, tramite diversi metodi, di provare la tua identit&agrave; e ti restituiremo l'accesso all'account.</li>
			    <li id='recover_pwd'><b>Ho dimenticato la password, come la recupero?:</b> segui la procedura di Recupero password_ext.</li>
			  </ul>");
    }else{
      $return = array(0, 0);
    }
    
    $return[1] = lightschool_automate($return[1]);
    return $return;
  }
?>