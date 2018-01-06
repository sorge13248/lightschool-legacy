<?php
  $_GET['no_text'] = 'y';

  include "base.php";
  
  if($_SESSION['Username'] != ''){
    if(lightschool_is_school_class_correct($_GET['class']) == 'ok'){
      ?>
      <script src="<?= $MY_MAIN_DIRECTORY ?>/tinymce/tinymce.min.js"></script>
      <script type="text/javascript" src="//latex.codecogs.com/editor3.js"></script>
      <script type="text/javascript">
	$(function(){
	  $("#date_sign").datepicker();
	  $("#date_sign").datepicker("option", "showAnim", "slideDown");
	  $("#date_sign").datepicker("option", $.datepicker.regional["it"]);
	});
	
	tinymce.init({
	  selector: "textarea",
	  plugins: [
		  "advlist autolink link lists",
		  "textcolor textcolor colorpicker textpattern"
	  ],

	  toolbar1: "undo redo | bold italic underline| bullist numlist | fontselect forecolor",
	  toolbar2: "link unlink | subscript superscript blockquote",

	  width : 350,
	  menubar: false,
	  statusbar : false,
	  toolbar_items_size: 'small'
	});
      </script>
      <p style="text-transform: uppercase; font-size: 11pt; font-weight: bold">docente <?php echo($USER_surname.' '.$USER_name); ?></p>
      <select id="subject_select" name="subject_select" style="margin-bottom: 15px">
	<?php
	  foreach($USER_DOC_subject as $doc_subject_option){
	    echo("<option>$doc_subject_option</option>");
	  }
	?>
	<?php echo($option_separator); ?>
	<option>Supplenza</option>
	<option>Altro</option>
      </select>
      <input type="text" id="subject_text" name="subject_text" placeholder="Materia" style="display: none; width: calc(100% - 40px); display: none" /><br/>
      <select id="sign_type" name="sign_type" style="margin-bottom: 15px">
	<option>Lezione</option>
	<option>Spiegazione</option>
	<option>Interrogazione</option>
	<option>Spiegazione e interrogazione</option>
	<option>Attivit&agrave; di laboratorio</option>
	<option>Visita didattica</option>
	<option>Palestra</option>
	<?php echo($option_separator); ?>
	<option>Supplenza</option>
      </select><br/>
      <input type="text" id="date_sign" name="date_sign" placeholder="Data" style="width: calc(100% - 40px)" readonly="readonly" />
      <select id="sign_hour" name="sign_hour" style="margin-bottom: 15px">
	<option>1<sup>a</sup> ora</option>
	<option>2<sup>a</sup> ora</option>
	<option>3<sup>a</sup> ora</option>
	<option>4<sup>a</sup> ora</option>
	<option>5<sup>a</sup> ora</option>
	<option>6<sup>a</sup> ora</option>
	<option>7<sup>a</sup> ora</option>
	<option>8<sup>a</sup> ora</option>
	<option>9<sup>a</sup> ora</option>
	<option>10<sup>a</sup> ora</option>
	<option>11<sup>a</sup> ora</option>
	<option>12<sup>a</sup> ora</option>
	<option>13<sup>a</sup> ora</option>
	<option>14<sup>a</sup> ora</option>
      </select><br/>
      <select id="sign_hour" name="sign_hour" style="margin-bottom: 15px">
	<option>1 ora</option>
	<option>2 ore</option>
	<option>3 ore</option>
	<option>4 ore</option>
	<option>5 ore</option>
	<option>6 ore</option>
	<option>7 ore</option>
      </select>
      <textarea style="width: calc(100% - 40px)"></textarea>
      <?php
    }else{
      echo('Non fai parte di questa classe');
    }
  }else{
      echo('Non sei collegato. Premi F5 o ricarica la pagina dal pulsante per accedere nuovamente.');
    }
?>