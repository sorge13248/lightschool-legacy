<?php
  if($_GET['redirect'] == ''){
    $_GET['redirect'] = 'home';
  }

  setcookie("language", $_GET['lang'], time() + (86400 * 30), "/");
  header("location: ".$_GET['redirect']);
?>