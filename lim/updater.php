<?php
include "base.php";

if($_SESSION['UsernameLIM'] != ''){
  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

  // check connection
  if ($conn->connect_error) {
    ?>
      Connessione non riuscita. Database offline.
  <?php
  }
  $IDLIM = $conn->real_escape_string($IDLIM);
  $sql="SELECT * FROM MYLIM_connection WHERE LimID = '$IDLIM' AND (status = 's' OR status = 'y') LIMIT 1";
  $rs=$conn->query($sql);

  if($rs === false) {
    ?>
      Non riesco ad interpretare la query.
  <?php
  } else {
    $rows_returned = $rs->num_rows;
  }
  $rs->data_seek(0);
  $num = $rs->num_rows;

  if($num == 0){
    echo("<h2><div class='spinner'></div>In attesa di connessioni...</h2><br/>");
  }else{
    while($row = $rs->fetch_assoc()){
      $UserID = $row['UserID'];
      $ConnectionID = $row['id'];
      $FileID = $row['FileID'];
      $status_connection = $row['status'];
      
      $conn3 = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

      // check connection
      if ($conn3->connect_error) {
      
      }
      $UserID = $conn3->real_escape_string($UserID);
      $sql3="SELECT * FROM MY_users WHERE UserID = '$UserID' LIMIT 1";
      
      $rs3=$conn3->query($sql3);

      if($rs3 === false) {
      
      } else {
	$rows_returned3 = $rs3->num_rows;
      }
      $rs3->data_seek(0);
      $num3 = $rs3->num_rows;

      if($num3 == 1){
	while($row3 = $rs3->fetch_assoc()){
	  $User_Username = $row3['Username'];
	  $UserSurname = $row3['name'];
	  $UserName = $row3['surname'];
	  $UserType = $row3['User_type'];
	  $profile_image = $UPLOAD_MAIN_DIRECTORY.'/'.$row3['profile_image'];
	  
	  $TextUserType2 = $UserType;
	  $TextUserType = ucfirst($UserType);
	  
	  $conn2 = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	  // check connection
	  if ($conn2->connect_error) {
	  
	  }
	  $User_Username = $conn2->real_escape_string($User_Username);
	  $FileID = $conn2->real_escape_string($FileID);
	  $sql2="SELECT * FROM MY_files WHERE id = '$FileID' AND Username = '$User_Username' LIMIT 1";
	  $rs2=$conn2->query($sql2);

	  if($rs2 === false) {
	  
	  } else {
	    $rows_returned2 = $rs2->num_rows;
	  }
	  $rs2->data_seek(0);
	  $num2 = $rs2->num_rows;

	  if($num2 == 1){
	    while($row2 = $rs2->fetch_assoc()){
	      $FileName = $row2['name'];
	      $Filecreate_date = $row2['create_date'];
	      $Filelast_edit = $row2['last_edit'];
	      
	      if($Filelast_edit == ''){
		$Filelast_edit = 'Mai';
	      }
	      
	      if($status_connection == 's'){
		?>
		  <script type="text/javascript">
		    document.title = 'Richiesta di connessione da <?php echo($UserName.' '.$UserSurname); ?>';
		  </script>
		  <img src='<?= $profile_image ?>' style='float: left; width: 64px; height: 64px; border: 1px solid black; border-radius: 50%; margin-right: 20px; margin-top: 20px; margin-bottom: 90px' />
		  <h2>Richiesta di connessione da <?php echo($UserName.' '.$UserSurname); ?></h2>
		  Richiesta di proiezione del quaderno <b><?php echo($FileName); ?></b>.<br/><br/>
		  <button class="btn btn-success" style="margin-right: 20px" id="accept"><div class="glyphicon glyphicon-ok"></div>Accetta</button><button class="btn btn-danger" id="refuse"><div class="glyphicon glyphicon-remove"></div>Rifiuta</button>
		<?php
	      }elseif($status_connection == 'y'){
		$FileHtml = $row2['html'];
		?>
		  <script type="text/javascript">
		    document.title = '<?= $FileName ?> di <?php echo($UserName.' '.$UserSurname); ?>';
		  </script>
		  <div style="height: 220px; padding-top: 70px; position: fixed; top: 30px; left: 50%; margin-left: -396px; padding-left: 50px; border-bottom: 1px solid gray; width: 791px; background-color: rgba(255,255,255,0.9)">
		    <button class="btn btn-danger" style="float: right" id="close_connection">Chiudi connessione</button>
		    <img src='<?= $profile_image ?>' style='float: left; width: 64px; height: 64px; border: 1px solid black; border-radius: 50%; margin-right: 20px; margin-top: 5px' />
		    <h2>Connesso con <?php echo($UserName.' '.$UserSurname); ?></h2>
		    <div class="table-responsive">
		      <table class="table info_table_connection table-condensed">
			<tr>
			  <td>
			    <p class="table_header">Titolo</p>
			    <p><?php echo($FileName); ?></p>
			  </td>
			  <td>
			    <p class="table_header">Data di creazione</p>
			    <p><?php echo($Filecreate_date); ?></p>
			  </td>
			  <td>
			    <p class="table_header">Ultima modifica</p>
			    <p><?php echo($Filelast_edit); ?></p>
			  </td>
			</tr>
		      </table>
		    </div>
		  </div>
		  <div class="a4_page">
		    <?php echo($FileHtml); ?>
		  </div>
		<?php
	      }
	    }
	  }
	}
      }
    }
  }
}else{
  echo('Sono spiacente, ma sono in confusione. Ricarica la pagina...');
}?>