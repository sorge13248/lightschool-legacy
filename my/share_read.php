<?php include_once "base.php";
  $SHARE_status == false;
  
  if($_GET['s'] != ''){
    $GENERAL_conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if($GENERAL_conn->connect_error){
    
    }
    
    $GETSESCAPE = $GENERAL_conn->real_escape_string($_GET['s']);
    $GENERAL_sql = "SELECT * FROM MY_share WHERE Receiving = '$USER_uniqueid' AND id = '$GETSESCAPE'";
    
    $GENERAL_rs=$GENERAL_conn->query($GENERAL_sql);

    if($GENERAL_rs === false){
      echo "false";
    }else{
      $GENERAL_rows_returned = $GENERAL_rs->num_rows;
    }
    $GENERAL_rs->data_seek(0);
    $GENERAL_num = $GENERAL_rs->num_rows;
    
    
    if($GENERAL_num == 1){
      while($GENERAL_row = $GENERAL_rs->fetch_assoc()){
	$SHARED_file_id = $GENERAL_row['file_id'];
	$SHARED_sender = $GENERAL_row['Sender'];
	
	$SHARED_sender = lightschool_get_user($SHARED_sender, 'id_to_username');
	
	$GENERAL_conn2 = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	// check connection
	if($GENERAL_conn2->connect_error){
	
	}
	
	$SHARED_file_id = $GENERAL_conn2->real_escape_string($SHARED_file_id);
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$SHARED_sender' AND id = '$SHARED_file_id'";
	
	$GENERAL_rs=$GENERAL_conn2->query($GENERAL_sql);

	if($GENERAL_rs === false){
	  echo "false";
	}else{
	  $GENERAL_rows_returned = $GENERAL_rs->num_rows;
	}
	$GENERAL_rs->data_seek(0);
	$GENERAL_num = $GENERAL_rs->num_rows;
	
	
	if($GENERAL_num == 1){
	  while($GENERAL_row = $GENERAL_rs->fetch_assoc()){
	    $SHARED_type = $GENERAL_row['type'];
	    $SHARED_username = $GENERAL_row['Username'];
	    $_GET['id'] = $GENERAL_row['id'];
	    $_GET['s'] = $_GET['id'];
	    $_GET['f'] = $_GET['id'];
	    
	    $SHARE_status = true;
	  }
	}
      }
    }else{
      $GENERAL_conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

      // check connection
      if($GENERAL_conn->connect_error){
      
      }
      
      $SHARED_file_id = $GENERAL_conn->real_escape_string($_GET['s']);
      $GENERAL_sql = "SELECT * FROM MY_files WHERE id = '$SHARED_file_id'";
      $GENERAL_sql2 = $GENERAL_sql;
      
      $GENERAL_rs=$GENERAL_conn->query($GENERAL_sql);

      if($GENERAL_rs === false){
	echo "false";
      }else{
	$GENERAL_rows_returned = $GENERAL_rs->num_rows;
      }
      $GENERAL_rs->data_seek(0);
      $GENERAL_num = $GENERAL_rs->num_rows;
      
      
      if($GENERAL_num == 1){
	while($GENERAL_row = $GENERAL_rs->fetch_assoc()){
	  $not_found_folder_in_shared = true;
	  $SHARED_type = $GENERAL_row['type'];
	  $SHARED_username = $GENERAL_row['Username'];
	  $SHARED_folder = $GENERAL_row['folder'];
	  $_GET['id'] = $GENERAL_row['id'];
	  $_GET['s'] = $_GET['id'];
	  $_GET['f'] = $_GET['id'];
      
	  $GENERAL_conn2 = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

	  // check connection
	  if($GENERAL_conn2->connect_error){
	  
	  }
	  
	  $SHARED_folder = $GENERAL_conn2->real_escape_string($SHARED_folder);
	  $GENERAL_sql = "SELECT * FROM MY_share WHERE Receiving = '$USER_uniqueid' AND file_id = '$SHARED_folder'";
	  
	  $GENERAL_rs=$GENERAL_conn2->query($GENERAL_sql);

	  if($GENERAL_rs === false){
	    echo "false";
	  }else{
	    $GENERAL_rows_returned = $GENERAL_rs->num_rows;
	  }
	  $GENERAL_rs->data_seek(0);
	  $GENERAL_num = $GENERAL_rs->num_rows;
	  
	  
	  if($GENERAL_num == 1){
	    while($GENERAL_row = $GENERAL_rs->fetch_assoc()){
	      $SHARE_status = true;
	      if($SHARED_type == 'folder'){
		$SHARE_status = false;
		$GENERAL_name = 'Non trovato';
	      }
	    }
	  }
	}
      }
    }
?>
<html>
  <head>
    <?php include_once "style_$USER_skin.php"; 
    if($_GET['s'] != '' and $SHARE_status == true){
      if($SHARED_type == 'notebook'){
	$actually_page = 'read';
	
	$_GET['SQL_type'] = "read";
	include "view_management.php";
	
	$actually_page = 'read';
	include "menu.php";
      }elseif($SHARED_type == 'folder'){
	$actually_page = 'share_read';
	
	$_GET['SQL_type'] = 'folder';
	include "view_management.php";
	
	$actually_page = 'files_share';
	include "menu.php";
	
	$GENERAL_name = $FOLDER_name;
	
	$actually_page = 'share_read';
      }
    }?>
    <title><?= $GENERAL_name ?> - LightSchool</title>
    <?php $actually_page = basename($_SERVER['PHP_SELF']); include_once "file_management.php"; ?>
  </head>
  <body>
    <?php
      if($_GET['s'] != '' and $SHARE_status == true){
	if($SHARED_type == 'notebook'){
	  ?>
	  <div class="content">
	    <div class="page" id="page">
	      <?php echo($GENERAL_html); ?>
	    </div>
	  </div>
	<?php }elseif($SHARED_type == 'folder'){ ?>
	  <div class="content" id="files">
	    <?php
	      $actually_page = 'share_read';
	      
	      $_GET['SQL_type'] = "files";
	      include "view_management.php";
	    ?>
	  </div>
	<?php 
      }
    }else{
      include "menu.php";
      ?>
	<div class="content">
	  <h2><?= $TRAD_read_error ?></h2>
	</div>
      <?php
    }
  }
    ?>
  </body>
</html>