<?php
  $_GET['no_text'] = 'y';

  include "base.php";
  
  if($_SESSION['Username'] != '' or ($_GET['read'] == 'y' and $_SESSION['Username'] == '')){
    $_GET['SQL_type'] = "file_info";
    include "view_management.php";
  }
?>