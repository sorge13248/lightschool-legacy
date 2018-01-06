<?php include_once "base.php"; ?>
<html>
  <head>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container container_page">
      <div class="row">
	<div class="col-lg-8">
	  <?php
	    $DBServer = 'localhost';
	    $DBUser   = 'lightsch_wp';
	    $DBPass   = '';
	    $DBName   = 'lightsch_wordpress';
	    
	    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	    // check connection
	    if ($conn->connect_error) {
	      echo('Errore generale 0');
	    }
	    $GETIDESCAPE = $conn->real_escape_string($_GET['id']);
	    $sql="SELECT * FROM wp_posts WHERE post_status = 'publish' AND id = '$GETIDESCAPE' ORDER BY ID DESC LIMIT 1";

	    $rs=$conn->query($sql);

	    if($rs === false) {
	      echo('Errore generale 1');
	    } else {
	      $rows_returned = $rs->num_rows;
	    }
	    $rs->data_seek(0);
	    $num = $rs->num_rows;

	    if($num == '1'){
	      while($row = $rs->fetch_assoc()){
		$post_title = $row['post_title'];
		$post_content = $row['post_content'];
		$post_date = $row['post_date'];
		$post_date_IT = substr($post_date,8,2).'/'.substr($post_date,5,2).'/'.substr($post_date,0,4).' alle '.substr($post_date,11,5);
		$post_id = $row['ID'];
		if($post_id <= 408){
		  $post_content = preg_replace("/<img[^>]+\>/i", "", $post_content);
		}
		?>
		  <title><?php echo($post_title); ?></title>
		  <div class="title" style="margin-bottom: 0px; font-size: 20pt"><?php echo($post_title); ?></div>
		  <hr/>
		  <span style="display: inline-block; font-size: 12pt; font-family: 'Roboto'"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Pubblicato in data <?php echo($post_date_IT); ?></span>
		  <hr/>
		  <div class="content"><?php echo($post_content); ?></div>
		<?php
	      }
	    }else{
	      ?>
	      <title>LightSchool Today</title>
	      <?php
	      echo('Nessun post trovato');	  
	    }
	  ?>
	</div>
	<div class="col-md-4">
	  <div class="well">
	    LightSchool Today &egrave; il blog ufficiale di LightSchool.<br/>
	    In questo blog vengono riportate tutte le comunicazioni ufficiali da parte del team quali: informazioni, novit&agrave;, problemi risolti e molto altro.<br/>
	    Se non sai di cosa si tratta LightSchool, ti invitiamo a leggere la breve descrizione sul <a href="<?= $MAIN_DIRECTORY ?>">sito web principale</a>.
	  </div>
	</div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>