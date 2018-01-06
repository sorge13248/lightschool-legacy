<?php
  include "base.php";
  
  $link = "$MAIN_DIRECTORY";
  $extend;
  
  if($_GET['fwd_link'] == 1){
    $link = "$MAIN_DIRECTORY/license";
  }elseif($_GET['fwd_link'] == 2){
    $link = "$MAIN_DIRECTORY/privacy";
  }elseif($_GET['fwd_link'] == 3){
    $link = "$MAIN_DIRECTORY/legal";
  }elseif($_GET['fwd_link'] == 4){
    $link = "//status.lightschool.it/";
  }elseif($_GET['fwd_link'] == 5){
    $link = "$MY_MAIN_DIRECTORY/";
  }elseif($_GET['fwd_link'] == 6){
    $link = "$PUBLISHERS_MAIN_DIRECTORY/";
  }elseif($_GET['fwd_link'] == 7){
    $link = "$MAIN_DIRECTORY/download/forms";
  }elseif($_GET['fwd_link'] == 8){
    $link = "$SCHOOL_MAIN_DIRECTORY/";
  }elseif($_GET['fwd_link'] == 9){
    $link = "$MAIN_DIRECTORY/download/app";
  }elseif($_GET['fwd_link'] == 10){
    $link = "$MAIN_DIRECTORY/license/android";
  }elseif($_GET['fwd_link'] == 11){
    $link = "$SUPPORT_DIRECTORY";
  }elseif($_GET['fwd_link'] == 12){
    $link = "$MAIN_DIRECTORY/cookie";
  }
  
  if($_GET['app'] != ''){
    $extend = "?app=".$_GET['app'];
  }
  
  header("location: $link".$extend);
?>