<?php
$_GET['no_text'] = 'y';

include "base.php";

  if($_SESSION['Username'] != ''){
    if($_GET['SQL_type'] == 'contextapp'){
    
    }else{
      if($_GET['SQL_type'] == 'business_online'){
	$DBName_text = $DBName2;
      }else{
	$DBName_text = $DBName;
      }
      $GENERAL_conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName_text);

      // check connection
      if ($GENERAL_conn->connect_error) {
      
      }
      
      $FILES_ORDER_TEXT = "(CASE WHEN type = 'folder' THEN '1' WHEN type = 'file' THEN '2' WHEN type = 'notebook' THEN '2' WHEN type = 'stuff' THEN '3' ELSE type END), name";
      
      if($_GET['SQL_type'] == 'desktop'){
	$GENERAL_sql = "SELECT * FROM MY_files WHERE Username = '$Username' AND (type = 'folder' OR type = 'notebook' OR type = 'file' OR type = 'notebook' OR type = 'ebook' OR type = 'stuff') AND fav = 'y' AND history = '' AND NOT folder = 'c' ORDER BY $FILES_ORDER_TEXT";
	$SQL_no_num_text = 'Nessun collegamento sul Desktop';
	$COL_ICON = $USER_icon_set2;
      }else{
	$GENERAL_sql = "error";
	$SQL_no_num_text = 'Qualcosa &egrave; andato storto...';
      }

      $GENERAL_rs=$GENERAL_conn->query($GENERAL_sql);

      if($GENERAL_rs === false) {
	echo "Pagina non disponibile. SQL_type not defined or incorrect.";
      } else {
	$GENERAL_rows_returned = $GENERAL_rs->num_rows;
      }
      $GENERAL_rs->data_seek(0);
      $GENERAL_num = $GENERAL_rs->num_rows;
      
      if($GENERAL_num == 0){
	echo("$SQL_no_num_text");
      }else{
	while($GENERAL_row = $GENERAL_rs->fetch_assoc()){
	  if($_GET['SQL_type'] == 'people_contacts'){
	    
	  ?>
	    <a class="icon_files" title="<?= $GENERAL_name ?>" id="<?= $GENERAL_id ?>" <?= $USER_click_type ?>="window.location.href = '<?= $GENERAL_link_type ?>'" name="<?= strtolower($GENERAL_name) ?>" draggable="true" <?php if($GENERAL_type == 'folder'){ ?> ondrop="drop(event, this.id)" ondragover="allowDrop(event)" <?php } ?> ondragstart="drag(event, this.id)" <?= $STYLE_HISTORY ?> href="javascript:void(0);">
	      <div id="count_<?= $GENERAL_id ?>" class="count_selected"></div><?php echo($checkbox); ?>
	      <img src="<?= $GENERAL_icon ?>" class="quick_peek_image" id="<?= $GENERAL_id ?>" /><span class="title_files" id="title_<?= $GENERAL_id ?>" file_name="<?= $GENERAL_name ?>" <?= $STYLE_HISTORY2 ?>><?php echo($GENERAL_name); ?></span><br/>
	      <span class="subtitle" id="subtitle_<?= $GENERAL_id ?>"><?php echo($GENERAL_type_translate); ?></span>
	    </a>
	  <?php
	  }
	}
      }
    }
  }
?>

