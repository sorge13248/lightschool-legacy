<?php include_once "base.php";
  if($_GET['id'] != ''){
    $_GET['SQL_type'] = "read";
    include "view_management.php";
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <title><?= $GENERAL_name ?></title>
    <?php include_once "style_$USER_skin.php"; ?>
    <script type="text/javascript">
      $(document).ready(function(){
	$('#print_dialog').draggable({ handle: ".title", cursorAt: { top: -90, left: 0 } });
	
	$("#header2, #footer").click(function(){
	  var this_id = $(this).attr("id");
	  var this_element = $(this).attr("kind");
	  
	  if($("." + this_id + "." + this_element).is(":visible")){
	    $("." + this_id + "." + this_element).hide();
	  }else{
	    $("." + this_id + "." + this_element).show();
	  }
	});
      });
    </script>
    <style type="text/css">
      @media screen {
	thead { display: table-header-group; }
	tfoot { display: table-header-group; }
      }
      @media print {
	thead { display: table-header-group; }
	tfoot { display: table-footer-group; }
	.dialog{ display: none; }
      }
      .field{
	display: inline-block;
	padding-right: 5px;
	display: none;
      }
    </style>
    <div class="dialog" id="print_dialog" style="display: block">
      <div class="title" style="cursor: move">Stampa<span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="print_frame">
	<table cellpadding="20">
	  <tr>
	    <td>
	      <b><?= $TRAD_header ?></b><br/><br/>
	      <label><input type="checkbox" id="header2" kind="name" /><?= $TRAD_name ?></label><br/>
	      <label><input type="checkbox" id="header2" kind="surname" /><?= $TRAD_surname ?></label><br/>
	      <label><input type="checkbox" id="header2" kind="today" /><?= $TRAD_today_date ?></label><br/>
	      <label><input type="checkbox" id="header2" kind="create" /><?= $TRAD_create_date ?></label><br/>
	    </td>
	    <td>
	      <b><?= $TRAD_footer ?></b><br/><br/>
	      <label><input type="checkbox" id="footer" kind="name" /><?= $TRAD_name ?></label><br/>
	      <label><input type="checkbox" id="footer" kind="surname" /><?= $TRAD_surname ?></label><br/>
	      <label><input type="checkbox" id="footer" kind="today" /><?= $TRAD_today_date ?></label><br/>
	      <label><input type="checkbox" id="footer" kind="create" /><?= $TRAD_create_date ?></label><br/>
	    </td>
	  </tr>
	</table>
	<input type="submit" value="<?= $TRAD_print ?>" style="float: right" onclick="print()" />
      </div>
    </div>
  </head>
  <body>
    <?php
    if($_GET['id'] == ''){
	?>
	  <?= $TRAD_general_error ?>
	<?php
      }
    ?>
    <table>
      <thead><tr><td><b><span class="field header2 name"><?php echo($USER_name); ?></span><span class="field header2 surname"><?php echo($USER_surname); ?></span><span class="field header2 today">Stampa: <?php echo(date("d/m/Y H:i:s")); ?></span><span class="field header2 create">Creazione: <?php echo($GENERAL_create_date); ?></span></b></td></tr></thead>
      <tbody>
	<tr><td>
	  <?php echo($GENERAL_html); ?>
	</td></tr>
      </tbody>
      <tfoot><tr><td><b><span class="field footer name"><?php echo($USER_name); ?></span><span class="field footer surname"><?php echo($USER_surname); ?></span><span class="field footer today"><?php echo(date("d/m/Y H:i:s")); ?></span><span class="field footer create"><?php echo($GENERAL_create_date); ?></span></b></td></tr></tfoot>
    </table>
  </body>
</html>