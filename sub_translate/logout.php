<?php
  include_once "base.php";
  
  $_SESSION['Username'] = '';
  session_destroy();
  setcookie("LOGIN_username","",time()-3600,"/", ".lightschool.it");
  setcookie("LOGIN_password","",time()-3600,"/", ".lightschool.it");
  
  header("location: $MAIN_DIRECTORY");
?>