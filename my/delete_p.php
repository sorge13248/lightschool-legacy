<?php
  $_GET['no_text'] = 'y';
  include "base.php";
  
  if($_SESSION['Username'] != ''){
    $_GET['SQL_type'] = "delete_people";
    include "view_management.php";
  }
?>