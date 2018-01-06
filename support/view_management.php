<?php
  $_GET['no_text'] = 'y';
  include "base.php";

  if($_SESSION['Username'] != ''){
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if ($conn->connect_error) {
    }
    
    $_GET['SQL_type'] = $conn->real_escape_string($_GET['SQL_type']);
    
    if($_GET['SQL_type'] == 'tickets'){
      if($Username == 'lightschool'){
	$sql = "SELECT * FROM SU_tickets LIMIT 0, 20";
	$NO_result = "Nessun ticket ricevuto";
      }else{
	$sql = "SELECT * FROM SU_tickets WHERE Username = '$Username' LIMIT 0, 20";
	$NO_result = "Nessun ticket inviato";
      }
    }

    $rs=$conn->query($sql);

    if($rs === false) {
    } else {
      $rows_returned = $rs->num_rows;
    }
    $rs->data_seek(0);
    $num = $rs->num_rows;
    
    if($num == 0){
      echo($NO_result);
    }else{
      while($row = $rs->fetch_assoc()){
	if($_GET['SQL_type'] == 'tickets'){
	  $TICKET_id = $row['id'];
	  $TICKET_Username = $row['Username'];
	  $TICKET_title = $row['title'];
	  $TICKET_priority = $row['priority'];
	  $TICKET_solved = $row['solved'];
	  $TICKET_date = $row['date'];
	  ?>
	    <div class="request" priority="<?= $TICKET_priority ?>" reply="no" solved="<?= $TICKET_solved ?>" id="<?= $TICKET_id ?>" onclick="window.location.href = '<?= $SUPPORT_MAIN_DIRECTORY ?>/ticket?id=<?= $TICKET_id ?>'">
	      <?php if($Username == 'lightschool'){ ?>
		<div class="title"><?php echo($TICKET_title); ?></div>
		<div class="descr"><?php echo("Di $TICKET_Username"); ?></div>
	      <?php }else{ ?>
		<div class="title"><?php echo($TICKET_title); ?></div>
	      <?php } ?>
	      </div>
	    </div>
	  <?php
	}
      }
      if($_GET['SQL_type'] == 'tickets' and $num >= 20){
	?>
	  <div class="request" onclick="loadMore()">
	    <div class="descr" style="text-align: center">Carica richieste di supporto pi&ugrave; vecchie</div>
	  </div>
	<?php
      }
    }
  }
?>