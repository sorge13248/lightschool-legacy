<?php
  include_once "base.php";
  
  // Allow access to the converter system only from admins
  if($_SESSION['Username'] == 'USERNAME2'){
    ?>
      <title>Converter System</title>
      <style>
	code{
	  display: block;
	  background-color: lightgray;
	  width: calc(100% - 40px);
	  margin-top: 20px;
	  padding: 20px;
	}
      </style>
      <?php if($_POST['array'] != ''){
	$_POST['array'] = explode("//LS//", $_POST['array']);
	$show_field = true; $get_variables_name = true; include("$ROOT_SERVER_DIRECTORY"."language/it-IT.php");
	$i = 0;
	$empty = 0;
	$var = "";
	$COUNT = count($translate_string);
	$EMPTY_values = array();
	foreach($translate_string as $this_string){
	  $i++;
	  if($i > 0){
	    $this_string2 = implode(", ", $this_string);
	    if($this_string2 != ""){
	      $this_string = $this_string2;
	    }
	    $_POST['array'][$i - 1] = str_replace("_", " ", $_POST['array'][$i - 1]);
	    $_POST['array'][$i - 1] = str_replace('"', "'", $_POST['array'][$i - 1]);
	    $var .= '<br/>&nbsp;&nbsp;$'.$this_string.' = "'.$_POST['array'][$i - 1].'";';
	  }
	  if($_POST['array'][$i - 1] == "" and $i > 1){
	    $empty++;
	    array_push($EMPTY_values, "$".$this_string);
	  }
	}
	$myfile = fopen("generated_lang/".$_POST['locale'].".php", "w") or die("Unable to open file!");
	$php_var = str_replace("<br/>", "\n", $var);
	$php_var = str_replace("&nbsp;&nbsp;", "\t", $php_var);
	$txt = '<?php '."\n\n\t".'// Special thanks goes to the author of this translation: '.$_POST['author']."\n".$php_var."\n\n\t".'include_once "language_array_system.php";'."\n".'?>';
	fwrite($myfile, $txt);
	fclose($myfile);
	if($empty > 0){ ?>
	  <div style="padding: 10px; background-color: orange; color: white; position: fixed; bottom: 8px; right: 8px; text-align: right; cursor: pointer" onclick="alert('<?php echo(implode(", ", $EMPTY_values)); ?>')"><b><?= $empty  ?></b> empty fields.<br/>Click here for more information.</div>
	<?php }else{ ?>
	  <div style="padding: 10px; background-color: darkgreen; color: white; position: fixed; bottom: 8px; right: 8px; text-align: right">This translation is complete</div>
	<?php } ?>
	<h4 style="float: right">Powered by Francesco Sorge</h4>
	<h2>Conversion completed</h2>
	LightSchool's language file has been generated:<br/>
	<code><?= $_POST['locale'] ?>.php</code>
	<code>
	  &lt;?php<br/><br/>
	    &nbsp;&nbsp;// Special thanks goes to the author of this translation: <?= $_POST['author'] ?><br/>
	    <?php echo($var); ?>
	    <br/><br/>
	    &nbsp;&nbsp;include_once "language_array_system.php";<br/>
	  ?&gt;
	</code>
      <?php }else{ ?>
	<h4>+++ ATTENTION: YOU SHOULD NOT BE HERE IF NOT AUTHORIZED BY THE LIGHTSCHOOL FEDERAL AUTHORITY +++</h4>
	<h4>BEING HERE UNAUTHORIZED CONSIST IN A FEDERAL OFFENSE PUNISHABLE WITH 50 YEARS OF JAIL</h4>
	<h2>Welcome back Francesco :)</h2>
	<h4>Within this page you can convert a translation array to a LightSchool's language file.</h4>
	<form method="post">
	  <p>Locale code</p>
	  <input type="text" style="width: 100%; max-width: 200px" name="locale" id="locale" /><br/>
	  <p>Author</p>
	  <input type="text" style="width: 100%; max-width: 500px" name="author" id="author" placeholder="Name, surname and e-mail or website" />
	  <p>Type here the array:</p>
	  <textarea style="width: 100%; min-height: 150px; resize: vertical" id="array" name="array"></textarea>
	  <input type="submit" value="Convert" style="width: 100%; margin: 10px 0px; padding: 10px 0px; font-size: 14pt" />
	</form>
      <?php } ?>
    <?php
  }else{
    include_once "404.php";
  }
?>
