<?php
  $MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_experimental/preview';
  $IMAGES_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/images_sub';
  $MY_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
  $PUBLISHERS_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_editori';
  $SUPPORT_DIRECTORY = '//MAIN_HTTP_ADDRESS/my/support';
  $BLOG_DIRECTORY = '//MAIN_HTTP_ADDRESS/blog';
  $UPLOAD_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
  $SCHOOL_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_school';
  
  $MAIL_SUPPORT = 'MAIL_SUPPORT_ADDRESS';
  $MAIL_INFO = 'info@lightschool.it';
  $MAIL_BUSINESS = 'business@lightschool.it';
  
  $current_page = basename($_SERVER['PHP_SELF']);
  $current_page = str_replace(".php", "", $current_page);
  
  if($_COOKIE['language'] != ''){
    $include_lang = $_COOKIE['language'];
  }else{
    include_once "language.php";
    exit();
  }
  
  include("ABSOLUTE_PATH_TO_PUBLIC_HTML/language/$include_lang.php"); 
  
   // forza connessione sicura HTTPS
  if($SITE_force_https !== true and (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')){ }else{
    header("location: https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    exit();
  }
  
  if($_COOKIE['LOGIN_username'] != '' and $_COOKIE['LOGIN_password'] != '' and $_SESSION['Username'] == ''){
    include_once "auto_login.php";
  }
?>