<?php include_once "base.php"; $validate[0] = '0';
  $validate = lightschool_get_doc($_GET['name']);
  if($validate[0] == '0'){
    $page_title = "Categorie";
  }else{
    $page_title = $validate[0];
  }
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title><?= $page_title ?> - Supporto di LightSchool</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 80px">
      <?php if($validate[0] != '0'){ ?>
	<ol class="breadcrumb">
	  <li><a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	  <li><a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs"><div class="glyphicon glyphicon-th-large" style="margin-right: 10px"></div>Categorie</a></li>
	  <li class="active"><?php echo($validate[0]); ?></li>
	</ol>
	<div class="page-header">
	  <h3><?php echo($validate[0]); ?></h3>
	</div>
	<?php echo($validate[1]); ?>
      <?php }
      if($validate[0] == '0' and $_GET['name'] != ''){ ?>
	<div class="alert alert-danger" role="alert">
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  <span class="sr-only">Errore:</span>
	  La guida che hai tentato di aprire non esiste. Prova a cercarla nelle categorie.
	</div>
      <?php } if($validate[0] == '0'){ ?>
	<ol class="breadcrumb">
	  <li><a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	  <li class="active">Categorie</li>
	</ol>
	<div class="page-header">
	  <h3>Categorie</h3>
	</div>
	<p>In questa pagina troverai informazioni utili all'utilizzo delle funzioni del sito e alla risoluzione dei problemi comuni e conosciuti. Per una panoramica generale di una funzione clicca sull'intestazione.</p>
	<p><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>Sei un nuovo utente e desideri una guida rapida per cominciare? Leggi <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/welcome">Primi passi</a>.</p>
	<p><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>Questa guida attualmente si riferisce solo alla versione web di LightSchool e non alle app.</p>
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/register" class="group_title"><div class="glyphicon glyphicon-check"></div>Registrazione</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/register#why_email" class="sub_descr">A cosa vi serve l'indirizzo e-mail?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/register#what_username" class="sub_descr">Cos'&egrave; il nome utente?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/register#username_format" class="sub_descr">Che formato deve avere il nome utente?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/register#activate" class="sub_descr">Come attivo l'account al termine della registrazione?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/register#no_email" class="sub_descr">Non ho ricevuto l'e-mail per attivare l'account, che faccio?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/login" class="group_title"><div class="glyphicon glyphicon-log-in"></div>Accesso</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/login#not_correct" class="sub_descr">Il sito mi dice che l'indirizzo e-mail o la password sono errati ma sono sicuro che sono giusti, che faccio?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/login#button_not_working" class="sub_descr">Cosa faccio se il pulsante <i>Accedi</i> non funziona?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/login#infinite_loading" class="sub_descr">La scritta <i>Caricamento...</i> non scompare mai</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/login#device_blocked" class="sub_descr">Mi dice che l'accesso dal dispositivo &egrave; stato bloccato dal proprietario, come risolvo?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/login#recover_pwd" class="sub_descr">Ho dimenticato la password, come la recupero?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/menu" class="group_title"><div class="glyphicon glyphicon-th-large"></div>Menu principale</a><span class="group_title">&nbsp;e&nbsp;</span><a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/taskbar" class="group_title">Taskbar</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/menu" class="sub_descr">Cos'&egrave; il Menu principale?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/taskbar" class="sub_descr">Cos'&egrave; la Taskbar?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/taskbar#edit" class="sub_descr">Come aggiungo/rimuovo app dalla taskbar?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/taskbar#position" class="sub_descr">Come modifico la posizione e la dimensione della taskbar?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/notification_center" class="sub_descr">Cos'&egrave; l'icona <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/alert.png" /> (Centro notifiche) presente a destra nella Taskbar?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/notification_center" class="group_title"><div class="glyphicon glyphicon-list"></div>Centro notifiche</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/notification_center" class="sub_descr">Cos'&egrave; il Centro notifiche?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/notification_center#which" class="sub_descr">Che tipo di notifiche compaiono?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/notification_center#remove" class="sub_descr">Posso rimuovere una notifica?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/desktop" class="group_title"><div class="glyphicon glyphicon-th"></div>Desktop</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/desktop" class="sub_descr">Che cos'&egrave;?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#fav" class="sub_descr">Come aggiungo/rimuovo una cartella, un quaderno o un file al Desktop?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files" class="group_title"><div class="glyphicon glyphicon-folder-open"></div>File</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#create_folder" class="sub_descr">Come creo una cartella?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#create_notebook" class="sub_descr">Come si creano i quaderni?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#upload_file" class="sub_descr">Come si carica un file esterno?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#upload_criteria" class="sub_descr">Che tipo di file sono accettati e qual &egrave; la dimensione massima di ogni file?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#order" class="sub_descr">Come cambio l'ordine di visualizzazione delle icone?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#view" class="sub_descr">Come posso cambiare la visualizzazione da icone a dettagli e viceversa?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#share" class="sub_descr">Come condivido una cartella, un quaderno o un file con un altro utente LightSchool o un utente esterno privo di account?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#delete" class="sub_descr">Come sposto nel cestino o elimino definitivamente una cartella, un quaderno o un file?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#rename" class="sub_descr">Come rinomino una cartella, un quaderno o un file?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#export" class="sub_descr">Come esporto un quaderno in un file Word o PDF?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#embed" class="sub_descr">Come incorporo un quaderno nel mio sito web o blog?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#history" class="sub_descr">Come posso vedere la cronologia delle modifiche apportate a un quaderno nel corso del tempo?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#copy" class="sub_descr">Come copio il contenuto di un quaderno in uno nuovo?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#qr" class="sub_descr">Come posso vedere il QR Code per la condivisione pubblica e il contenuto di un quaderno, il tipo e il peso di un file caricato e il numero di elementi contenuti in una cartella?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#project" class="sub_descr">Come proietto un quaderno su una LIM?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#fav" class="sub_descr">Come aggiungo/rimuovo una cartella, un quaderno o un file al Desktop?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/share" class="group_title"><div class="glyphicon glyphicon-share"></div>Condivisi</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files#share" class="sub_descr">Come condivido una cartella, un quaderno o un file con un altro utente LightSchool o un utente esterno privo di account?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/share#where" class="sub_descr">Dove sono le cartelle, i quaderni e i file che gli altri utenti di LightSchool condividono con me?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/share#open" class="sub_descr">Come apro un elemento condiviso con me?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register" class="group_title"><div class="glyphicon glyphicon-book"></div>Registro</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#add_class" class="sub_descr">Come aggiungo una classe?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#add_users_to_class" class="sub_descr">Come assegno studenti e docenti ad una classe?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#coordinatore" class="sub_descr">Come assegno il ruolo di coordinatore ad un docente?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#communications" class="sub_descr">Come invio comunicazioni ai membri di una (o pi&ugrave;) classe/i?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#appello" class="sub_descr">Come faccio l'appello?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#student_status" class="sub_descr">Come cambio la presenza/assenza ad un alunno?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#justify" class="sub_descr">Che procedura devo seguire per giustificare un alunno?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#marks" class="sub_descr">Come attribuisco i voti?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#sign" class="sub_descr">Come firmo per la lezione?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#homeworks" class="sub_descr">Come invio i compiti agli alunni?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#share" class="sub_descr">Come invio i compiti fatti ai docenti?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#notes" class="sub_descr">Come posso sanzionare un alunno?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#scrutinio" class="sub_descr">Devo proporre un voto per lo scrutinio e infine convalidarlo in sede di scrutinio, come faccio?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#scrutinio_descr" class="sub_descr">Come posso aggiungere una descrizione alla situazione di un alunno per la mia materia in pagella?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#im_coordinatore" class="sub_descr">Sono il coordinatore della classe, che privilegi ho rispetto ai miei colleghi?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/class_register#coordinatore_marks" class="sub_descr">Sono coordinatore: come posso vedere i voti delle altre materie?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/diary" class="group_title"><div class="glyphicon glyphicon-calendar"></div>Diario</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/diary#create" class="sub_descr">Come creo un'attivit&agrave; (compiti, verifica, ecc.) nel diario?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/diary#edit" class="sub_descr">Come modifico un'attivit&agrave; gi&agrave; creata?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/diary#delete" class="sub_descr">Come sposto nel cestino o elimino un'attivit&agrave;?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/diary#share" class="sub_descr">Come e con chi posso condividere un'attivit&agrave;?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/diary#share_to_me" class="sub_descr">Dove vedo le attivit&agrave; condivise con me da parte di altri utenti?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/diary#view" class="sub_descr">Posso passare dalla vista mensile a quella settimanale e viceversa?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/timetable" class="group_title"><div class="glyphicon glyphicon-time"></div>Orario</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/timetable#add" class="sub_descr">Come aggiungo una materia (o classe) all'orario?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/timetable#edit" class="sub_descr">Come modifico una materia (o classe) gi&agrave; aggiunta?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/timetable#delete" class="sub_descr">Come elimino una materia (o classe)?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/timetable#colors" class="sub_descr">Posso assegnare un colore e un libro a una materia e poi aggiungerli automaticamente le volte successive che aggiungo una materia?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/timetable#share" class="sub_descr">Posso inviare la tabella completa ad altri utenti LightSchool?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/messages" class="group_title"><div class="glyphicon glyphicon-comment"></div>Messaggi</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/messages#read" class="sub_descr">Come posso leggere i messaggi che mi sono stati inviati?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/messages#notifications" class="sub_descr">C'&egrave; un modo di essere avvisati quando si riceve un nuovo messaggio anche quando non si &egrave; connessi a LightSchool?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/messages#send" class="sub_descr">Come invio un messaggio?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/messages#reply" class="sub_descr">Come rispondo ad un messaggio?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/messages#attach" class="sub_descr">Posso allegare dei file LightSchool?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/messages#is_read" class="sub_descr">Posso sapere se il destinatario di un messaggio ha letto il mio messaggio?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/messages#deactivate_is_read" class="sub_descr">&Egrave; possibile disattivare l'avviso di avvenuta lettura di un messaggio?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/messages#not_exists" class="sub_descr">Quando provo ad inviare un messaggio ad un utente compare il messaggio <i>Utente inesistente</i>, perch&eacute;?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/people" class="group_title"><div class="glyphicon glyphicon-user"></div>Rubrica</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/people#add" class="sub_descr">Come aggiungo un contatto?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/people#edit" class="sub_descr">Come modifico un contatto?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/people#delete" class="sub_descr">Come elimino un contatto?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/people#create_group" class="sub_descr">Come creo un gruppo?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/people#edit_group" class="sub_descr">Come modifico il nome e i membri di un gruppo?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/people#delete_group" class="sub_descr">Come elimino un gruppo?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/people#deactivated" class="sub_descr">Su un contatto compare <i>Account disattivato</i>, perch&eacute; e che cosa implica?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/trash" class="group_title"><div class="glyphicon glyphicon-trash"></div>Cestino</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/trash#move" class="sub_descr">Come sposto nel cestino una cartella, un quaderno, un file o un evento diario?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/trash#delete" class="sub_descr">Come elimino definitivamente uno o pi&ugrave; elementi?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/trash#restore" class="sub_descr">Come ripristino uno o pi&ugrave; elementi?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/trash#empty" class="sub_descr">Come svuoto il cestino?</a><br/>
	  
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings" class="group_title"><div class="glyphicon glyphicon-cog"></div>Impostazioni</a><br/>
	<hr style="margin-top: 5px" />
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#email" class="sub_descr">Come cambio l'indirizzo e-mail?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#phone" class="sub_descr">A cosa ci serve e come cambio il numero di telefono?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#subject" class="sub_descr">Come cambio le materie che insegno?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#language" class="sub_descr">Come cambio la lingua di visualizzazione?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#regione" class="sub_descr">A cosa serve e come cambio la regione?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#provincia" class="sub_descr">A cosa serve e come cambio la provincia di residenza?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#accent" class="sub_descr">Cos'&egrave; il colore preferito e come lo cambio?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#wallpaper" class="sub_descr">Come cambio lo sfondo?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#transparent" class="sub_descr">Come cambio il livello di trasparenza dello sfondo?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#icons" class="sub_descr">Cos'&egrave; e come cambio il set di icone?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#lim" class="sub_descr">Cos'&egrave; e come cambio la LIM predefinita?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#click" class="sub_descr">Cos'&egrave; e come cambio l'apertura file?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#timer" class="sub_descr">Cos'&egrave; e come cambio il timer di salvataggio automatico dei quaderni?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#control" class="sub_descr">Cos'&egrave; e come cambio il controllo accessi?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#history" class="sub_descr">Cos'&egrave; lo storico accesso dispositivi?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#browser" class="sub_descr">Cosa sono e come cambio le impostazioni di accesso dal software di navigazione (browser)?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#app" class="sub_descr">Cosa sono e come cambio le impostazioni di accesso dalle app?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#visibility" class="sub_descr">Cos'&egrave; e come cambio la visibilit&agrave; online?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#privacy_email" class="sub_descr">Cos'&egrave; e come cambio la possibilit&agrave; di mostrare/nascondere l'indirizzo e-mail agli altri utenti?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#privacy_school" class="sub_descr">Cos'&egrave; e come cambio la possibilit&agrave; di mostrare/nascondere la mia scuola agli altri utenti?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#notifications" class="sub_descr">Cosa sono le notifiche?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#change_pwd" class="sub_descr">Come cambio la password?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#logout_devices" class="sub_descr">In <i>Cambio password</i> cos'&egrave; <i>Disconnetti tutti i dispositivi attualmente connessi ad eccezione di questo</i>?</a><br/>
	  <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings#deactivate" class="sub_descr">Come disattivo l'account?</a><br/>
      <?php } ?>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>