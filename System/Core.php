<?php
  $EMERGENCY_BLOCK = false;
  $MAINTENANCE = false;
  $CURRENT_SITE = "$_SERVER[HTTP_HOST]";
  $BLOCKED_SITE = array("MAIN_HTTP_ADDRESS", "www.lightschool.it", "support.lightschool.it", "store.lightschool.it", "editori.lightschool.it", "school.lightschool.it", "experimental.lightschool.it");
  $ALLOW_IP = array();
  $current_page = str_replace(".php", "", basename($_SERVER['PHP_SELF']));
  $IMAGES_DIRECTORY = $IMAGES_MAIN_DIRECTORY = "//MAIN_HTTP_ADDRESS/images_sub";
  $CURRENT_SCHOOL_YEAR = "2015/2016";
  
  // ripristina l'IP originale dell'utente sovrascrivendo quello di CloudFlare
  if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
  }else{
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  
  // forza connessione sicura HTTPS
  if($SITE_force_https !== true and (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')){ }else{
    header("location: https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    exit();
  }
  
  if($SITE_debugging === true){
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
  }
  
  if(($EMERGENCY_BLOCK || $MAINTENANCE) && in_array($CURRENT_SITE, $BLOCKED_SITE) && !in_array($ip, $ALLOW_IP)){
    ?>
      <!DOCTYPE html>
      <html lang="it">
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="description" content="LightSchool">
	  <meta name="author" content="Francesco Sorge">
	  <title>LightSchool</title>
	  <style type="text/css">
	    html, body{
	      padding: 0px;
	      margin: 0px;
	      background-color: #F6F6F6;
	      font-family: 'Arial', 'Tahoma';
	    }
	    .content{
	      margin: 0 auto;
	      width: calc(100% - 40px);
	      max-width: 800px;
	      padding: 20px;
	      padding-top: 40px;
	    }
	  </style>
	</head>
	<body>
	  <div class="content">
	    <?php if($EMERGENCY_BLOCK){ ?>
	    <h1>Sicurezza di LightSchool</h1>
	    <hr/>
	    <p>
	      Il sito web di LightSchool &egrave; bloccato per motivi di emergenza. Per favore, lasciate immediatamente il sito e riprovate fra 15 minuti.<br/>
	      La Divisione Sicurezza di LightSchool sta gi&agrave; investigando sulle cause del blocco di emergenza.
	    </p>
	    <p>Ci dispiace per i problemi che questo blocco improvviso sta creando, cercheremo di risolvere il problema nel minor tempo possibile.</p>
	    <?php }elseif($MAINTENANCE){ ?>
	    <h1>LightSchool &egrave; in manutenzione</h1>
	    <hr/>
	    <p>
	      Il sito web di LightSchool &egrave; in fase di manutenzione straordinaria come comunicato il - dal giorno 03/01/2016 16:45 al giorno 05/01/2016 20:00.
	    </p>
	    <p>Ci dispiace per i problemi che questa manutenzione sta creando, torneremo online nel minor tempo possibile.<br/>Questa pagina verr&agrave; aggiornata frequentemente con lo stato dei lavori.</p><br/>
	    <h2>Stato dei lavori</h2>
	    <p><b>03/01/2016 16:46</b> Manutenzione straordinaria iniziata.</p>
	    <p><b>06/01/2016 11:21</b> Manutenzione straordinaria in fase finale, riapertura del sito a breve.</p>
	    <?php } ?>
	  </div>
	</body>
      </html>
    <?php
    exit();
  }
  
  if($_COOKIE['language'] == '' && $NO_LANGUAGE_SELECT !== true){
    include_once "Languages/Choose.php";
    exit();
  }
  
  $DBServer = 'localhost';
  $DBUser   = 'DB_USER_VALUE';
  $DBPass   = 'DB_PASSWORD_VALUE';
  $DBMain = $DBName   = 'DB_DATABASE_VALUE';
  $DBOther  = 'DB_CONFIG_NOT_SHIPPED';
?>