<?php
  $_GET['no_text'] = 'y';

  include "base.php";
  
  if($_SESSION['Username'] != ''){
    $_GET['SQL_type'] = "status_marker";
    include "view_management.php";
  }
?>