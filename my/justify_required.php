<?php
  $_GET['no_text'] = 'y';
  include "base.php";
  
  if($_SESSION['Username'] != ''){
    $_GET['SQL_type'] = "justify_required";
    ?>
    <span style="font-family: 'Roboto'; font-size: 20pt; display: inline-block; margin-bottom: 10px">Da giustificare</span><span class="link" style="margin-left: 10px">Gi&agrave; giustificate</span><br/>
    <table style="width: 100%" cellspacing="10">
      <tr>
	<td>
	  <span style="font-size: 11pt; display: inline-block; margin-bottom: 10px; text-transform: uppercase; font-weight: bold">Assenza/e</span>
	</td>
	<td>
	  <span style="font-size: 11pt; display: inline-block; margin-bottom: 10px; text-transform: uppercase; font-weight: bold">Ritardo/i</span>
	</td>
	<td>
	  <span style="font-size: 11pt; display: inline-block; margin-bottom: 10px; text-transform: uppercase; font-weight: bold">Uscita/e</span>
	</td>
      </tr>
      <tr>
	<td>
	  <?php
	    $_GET['type'] = "assent";
	    include "view_management.php";
	  ?>
	</td>
	<td>
	  <?php
	    $_GET['type'] = "ritardi";
	    include "view_management.php";
	  ?>
	</td>
	<td>
	  <?php
	    $_GET['type'] = "uscite";
	    include "view_management.php";
	  ?>
	</td>
      </tr>
    </table>
    <?php
  }
?>