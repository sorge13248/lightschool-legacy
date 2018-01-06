<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Activate - LightSchool Translate</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 70px">
      <?php if($_SESSION['Username'] == ''){
	$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName4);

	// check connection
	if ($conn->connect_error) {}
	$code = $conn->real_escape_string($_GET['code']);
	$sql="SELECT * FROM temporary_user WHERE activation_code = '$code' LIMIT 1";

	$rs=$conn->query($sql);

	if($rs === false) {} else {
	  $rows_returned = $rs->num_rows;
	}
	$rs->data_seek(0);
	$numUSER = $rs->num_rows;

	if($numUSER == 1){
	  while($row = $rs->fetch_assoc()){
	    $EmailAddress = $row['EmailAddress'];
	    
	    $_SESSION['Username'] = $EmailAddress;
	    $_SESSION['temporary'] = true;
	    }
	  }
	?>
	<h2><?= $EmailAddress ?> logged in!</h2>
	<p>You can start translating our website! Click <a href="<?= $MAIN_DIRECTORY ?>/start">here</a> to start.</p>
      <?php }else{ echo("<h2>Start translating</h2><p>You can start translating our website! Click <a href='$MAIN_DIRECTORY/start'>here</a> to start.</p>"); } ?>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>