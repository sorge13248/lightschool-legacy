<?php
  include_once "ABSOLUTE_PATH_TO_PUBLIC_HTML/System/Core.php";
  
  session_start();
    
  $MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_translate';
  $IMAGES_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/images_sub';
  $MY_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
  $PUBLISHERS_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_editori';
  $SUPPORT_DIRECTORY = '//MAIN_HTTP_ADDRESS/support';
  $BLOG_DIRECTORY = '//MAIN_HTTP_ADDRESS/blog';
  $UPLOAD_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
  $SCHOOL_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_school';
  
  $MAIL_SUPPORT = 'MAIL_SUPPORT_ADDRESS';
  $MAIL_INFO = 'info@lightschool.it';
  $MAIL_BUSINESS = 'business@lightschool.it';
  
  $ROOT_SERVER_DIRECTORY = "ABSOLUTE_PATH_TO_PUBLIC_HTML/";
  
  $DBServer = 'localhost';
  $DBUser   = 'DB_USER_VALUE';
  $DBPass   = 'DB_PASSWORD_VALUE';
  $DBName   = 'DB_DATABASE_VALUE';
  $DBName2  = 'DB_CONFIG_NOT_SHIPPED';
  $DBName3  = 'DB_CONFIG_NOT_SHIPPED';
  $DBName4  = 'DB_CONFIG_NOT_SHIPPED';
  $START_FROM_TRAD_STRING = 35;
  
  $current_page = basename($_SERVER['PHP_SELF']);
  
  $order = array(".php");
  $current_page = str_replace($order, "", $current_page);
  $USER_icon_set1 = "monochromatic/white";
  $USER_icon_set2 = "monochromatic/black";
  
  if(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1)|| isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'){ }else{
    $redirect2 = $_SERVER["REQUEST_URI"];
    header("location: https:$MAIN_DIRECTORY$redirect2");
  }
  
  if($_COOKIE['LOGIN_username'] != '' and $_COOKIE['LOGIN_password'] != ''){
    $_SESSION['temporary'] = false;
    include_once "auto_login.php";
  }
  
  if($_SESSION['temporary'] === true){
    $USER_image = "$IMAGES_MAIN_DIRECTORY/monochromatic/white/profile_male.png";
    $USER_image2 = "$IMAGES_MAIN_DIRECTORY/monochromatic/black/profile_male.png";
    $USER_name = $_SESSION['Username'];
  }
  
  if($_SESSION['Username'] != '' and $USER_name == '' and $current_page != "logout" and $current_page != 'formpost' and $current_page != 'activate'){
    include "logout.php";
  }
  
  $SUPPORTED_languages = array("it-IT" => "Italiano", "en-EN" => "English", "fr-FR" => "Fran&ccedil;ais", "es-ES" => "Espa&ntilde;ol", "de-DE" => "Deutsch", "da-DA" => "Dansk", "pl-PL" => "Polskie", "fi-FI" => "Suomi", "la-LA" => "Latine", "nl-NL" => "Nederlandse", "pt-PT" => "Portugu&ecirc;s", "ro-RO" => "Rom&ecirc;n", "sl-SL" => "Sloven&scaron;&ccaron;ina", "sv-SV" => "Svenska", "tr-TR" => "T&uuml;rk");
  
  // Lock access to some user by their username
  /*if($_SESSION['Username'] == 'USERNAME1'){
    ?>
      <h2>LIGHTSCHOOL TRANSLATE LOCKDOWN</h2>
      <p>LightSchool sta venendo ricostruito interamente da zero e utilizzer&agrave; delle parole e frasi completamente diverse da quelle attuali. Fino a quando non uscir&agrave; ufficialmente il nuovo LightSchool, il sito delle traduzioni rimarr&agrave; bloccato.</p>
    <?php
    exit();
  }*/
?>
