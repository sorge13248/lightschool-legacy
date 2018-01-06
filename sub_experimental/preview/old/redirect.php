<?php
  include "base.php";
  
  if($_GET['id'] == '1'){
    header("location: $LS_MAIN_DIRECTORY/license");
  }elseif($_GET['id'] == '2'){
    header("location: $LS_MAIN_DIRECTORY/privacy");
  }elseif($_GET['id'] == '3'){
    header("location: $LS_MAIN_DIRECTORY/legal");
  }elseif($_GET['id'] == '4'){
    header("location: $LS_MAIN_DIRECTORY/cookie");
  }else{
    header("location: $LS_MAIN_DIRECTORY");
  }
?>