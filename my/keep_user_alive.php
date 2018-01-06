<?php include_once "base.php";
if($_SESSION['Username'] != ''){
  $ip_status = lightschool_get_ip_status($Username, $ip);
  
  if($ip_status == 'block'){
    ?>
    <script type="text/javascript">
      setInterval(function() {
	window.location.replace("<?= $MY_MAIN_DIRECTORY ?>/logout?forget=y");
      }, 1000);
    </script>
    <?php;
  }
} ?>