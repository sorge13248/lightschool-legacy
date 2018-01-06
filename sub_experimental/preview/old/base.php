<?php
  $MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/preview_sub/old';
  $HOME_DIRECTORY = $MAIN_DIRECTORY;
  $IMAGES_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/images_sub';
  $MY_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
  
  if($_COOKIE['language'] != ''){
    $include_lang = $_COOKIE['language'];
  }else{
    $include_lang = 'it-IT';
  }
  
  include "language_".$include_lang.".php";
  
  $actually_page = basename($_SERVER['PHP_SELF']);
  
  $order = array(".php");
  $actually_page = str_replace($order, "", $actually_page);
?>
<!DOCTYPE html>