<?php
  $ALLOW_STRANGER = true; $NO_STYLE = true; $NO_SCRIPT = true; $NO_TOUCH = true; $NO_TEXT = true;
  include_once "System/Core.php";
  
  $_SESSION['Username'] = "";
  session_destroy();
  
  header("location: $MY_DIRECTORY");
?>