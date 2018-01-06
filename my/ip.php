<?php
  $_GET['no_text'] = 'y';
  include "base.php";
  
  if($_SESSION['Username'] != ''){
    $validate = lightschool_get_ip_status($_SESSION['Username'], $_GET['ip']);
    
    if($validate == 'add'){
      echo("$TRAD_ip_error");
    }else{
      $agent = lightschool_get_ip($_SESSION['Username'], $_GET['ip'], 'agent');
      $id = lightschool_get_ip($_SESSION['Username'], $_GET['ip'], 'id');
      ?>
	<!-- <iframe width="800" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDNP_rm_qEa6IS4Lt6KbnOQOrdBaxtzkAM&q=Padova" allowfullscreen></iframe> -->
	<div style="padding: 0px 20px 10px 20px">
	  <p style="font-size: 10pt; color: gray"><?= $TRAD_no_geoloc ?></p>
	  <p><?php echo($agent); ?></p>
	  <p><?= $TRAD_ip_window_descr ?></p>
	  <button class="btn_orange" onclick="ip('<?= $id ?>', 'logout')"><?= $TRAD_logout ?></button>
	  <button class="btn_red" onclick="ip('<?= $id ?>', 'block')"><?= $TRAD_block ?></button>
	  <button onclick="ip('<?= $id ?>', 'forget')"><?= $TRAD_forget ?></button>
	</div>
      <?php
    }
  }else{
    echo("$TRAD_not_logged_error");
  }
?>