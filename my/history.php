<?php
  $_GET['no_text'] = 'y';

  include "base.php";
  
  if($_SESSION['Username'] != ''){
    $_GET['SQL_type'] = "file_history";
    include "view_management.php";
  }
?>