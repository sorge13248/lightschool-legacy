<?php include_once "base.php";
if($_SESSION['UsernameLIM'] != ''){
  ?>
  <!DOCTYPE html>
  <html lang="it">
    <head>
      <title>Cronologia LIM</title>
      <?php include_once "style.php"; ?>
      <script type="text/javascript">
	$(document).ready(function(){
	  $("#history_settings").click(function(){
	    if($(".history_settings").is(':visible')){
	      $(".history_settings").slideUp(300);
	      $("#indicator").html('+');
	    }else{
	      $(".history_settings").slideDown(300);
	      $("#indicator").html('-');
	    }
	  });
	  
	  $("#hide_element").click(function(){
	    if($("#hide_element").is(':checked')){
	      $(".to_be_hidden").slideUp(200);
	    }else{
	      $(".to_be_hidden").slideDown(200);
	    }
	  });
	  
	  $("#hide_students").click(function(){
	    if($("#hide_students").is(':checked')){
	      $(".studente").slideDown(200);
	    }else{
	      $(".studente").slideUp(200);
	    }
	  });
	  
	  $("#hide_teachers").click(function(){
	    if($("#hide_teachers").is(':checked')){
	      $(".docente").slideDown(200);
	    }else{
	      $(".docente").slideUp(200);
	    }
	  });
	});
      </script>
    </head>
    <body>
      <?php include_once "menu.php"; ?>
      <div class="container" style="padding-top: 80px">
	<strong>CRONOLOGIA CONNESSIONI</strong><br/>
	Qui viene mostrato lo storico delle connessioni effettuate a questa LIM.<br/><br/>
	<a href="javascript:void(0)" id="history_settings"><span id="indicator" style="display: inline-block; width: 20px; text-align: center">+</span>Filtra contenuto</a><br/>
	<div class="history_settings">
	  <h4>Cosa desideri visualizzare o nascondere?</h4>
	  <label><input type="checkbox" value="n" id="hide_element">Nascondi gli account disattivati e i file eliminati</label><br/>
	  <label><input type="checkbox" value="n" id="hide_students" checked="cheched">Mostra studenti</label><br/>
	  <label><input type="checkbox" value="n" id="hide_teachers" checked="cheched">Mostra docenti</label><br/>
	</div>
	<hr/>
	<?php
	  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	  // check connection
	  if ($conn->connect_error) {
	    ?>
	      Connessione non riuscita. Database offline.
	  <?php
	  }
	  $IDLIM = $conn->real_escape_string($IDLIM);
	  $sql="SELECT * FROM MYLIM_connection WHERE LimID = '$IDLIM' ORDER BY id DESC";
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
	    echo('Nessuna connessione da mostrare.');
	  }else{
	    while($row = $rs->fetch_assoc()){
	      $UserID = $row['UserID'];
	      $ConnectionID = $row['id'];
	      $FileID = $row['FileID'];
	      $Date_connLIM = $row['date'];
	      $StatusLIM = $row['status'];
	      
	      if($StatusLIM == 'n'){
		$StatusLIM = '<span style="color: red; font-weight: bold">Rifiutata</span>';
	      }
	      elseif($StatusLIM == 'c'){
		$StatusLIM = '<span style="color: red">Chiusa</span>';
	      }
	      elseif($StatusLIM == 'y'){
		$StatusLIM = '<span style="color: green; font-weight: bold">Aperta</span>';
	      }
	      elseif($StatusLIM == 's'){
		$StatusLIM = '<span style="color: orange">In attesa...</span>';
	      }
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

	      if($num3 != 1){
		echo('<div class="element to_be_hidden">Account disattivato');
	      }else{
		while($row3 = $rs3->fetch_assoc()){
		  $User_Username = $row3['Username'];
		  $UserSurname = $row3['name'];
		  $UserName = $row3['surname'];
		  $UserType = $row3['User_type'];
		  $profile_image = $UPLOAD_MAIN_DIRECTORY.'/'.$row3['profile_image'];
		  
		  $TextUserType2 = $UserType;
		  $TextUserType = ucfirst($UserType);
		}
	      }
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

	      if($num2 == 0){
		echo("<div class='element to_be_hidden $TextUserType2'><img src='$profile_image' style='float: left; width: 30px; height: 30px; border: 1px solid black; border-radius: 50%; margin-right: 10px; margin-top: 5px' /><strong>$UserName $UserSurname ($TextUserType)</strong> | <i style='color: gray' class='change_color'><span>File cancellato</span></i><br/>&nbsp;");
	      }else{
		while($row2 = $rs2->fetch_assoc()){
		  $FileName = $row2['name'];
		  ?>
		  <div class="element <?= $TextUserType2 ?>"><img src='<?= $profile_image ?>' style='float: left; width: 30px; height: 30px; border: 1px solid black; border-radius: 50%; margin-right: 10px; margin-top: 5px' /><?php echo('<strong>'.$UserName.' '.$UserSurname.' ('.$TextUserType.')</strong> | '.$FileName.'<span style="float: right">'.$Date_connLIM.'</span>'); ?><br/>
		  <span class='change_color'><?php echo($StatusLIM); ?></span>
		  <?php
		}
	      }
	      ?>
	      </div>
	      <?php
	    }
	  }
	?>
      </div>
    </body>
  </html>
<?php }elseif($_SESSION['UsernameLIM'] == ''){
  include_once "login.php";
} ?>