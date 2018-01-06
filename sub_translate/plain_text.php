<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Plain text - LightSchool Translate</title>
  </head>
  <body>
    <?php 
    if($_SESSION['Username'] != ''){
      if($_GET['first'] != '' and $SUPPORTED_languages[$_GET['first']] != ''){ ?>
	<h2>Plain text strings in <?php echo($SUPPORTED_languages[$_GET['first']]); ?></h2>
	<table>
	<?php
	  $show_field = true; include "$ROOT_SERVER_DIRECTORY"."language/".$_GET['first'].".php";
	  $i = 1;
	  $COUNT = count($translate_string) - 0;
	  foreach($translate_string as $this_string){
	    if($i - 1 < $COUNT){
	      $this_string2 = implode(", ", $this_string);
	      if($this_string2 != ""){
		$this_string = $this_string2;
	      }
	      echo("
		<tr>
		  <td style='padding: 5px' valign='top'>
		    <span style='display: inline-block; width: 40px'>$i)</span> $this_string
		  </td>
		  <td>
		    
		  </td>
		</tr>
	      ");
	    }
	    $i++;
	  }
	?>
	</table>
      <?php }else{ ?>
	<h2>Error</h2>
	<p>The language you choose to translate doesn't exists or it is currently unsupported. Please, report a missing language to info@lightschool.it.</p>
      <?php
	}
      }else{
    ?>
      <h2>Error</h2>
      <p>You must be logged in in order to translate LightSchool.</p>
    <?php } ?>
  </body>
</html>