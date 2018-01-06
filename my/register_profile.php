<?php
  $_GET['no_text'] = 'y';
  include "base.php";
  
  if($_SESSION['Username'] != ''){
    if(lightschool_is_school_class_correct($_GET['class']) == 'ok'){
      if($_GET['type'] == 'finish_scrutinio_confirm'){
	?>
	  <span style="font-family: 'Roboto'; font-size: 16pt">Sei sicuro di voler finalizzare lo scrutinio per <?php echo($_GET['subject']); ?>?</span><br/>
	  <p style="font-size: 11pt">Cos&igrave; facendo i voti proposti diventeranno i voti finali e non potranno <u>MAI</u> pi&ugrave; essere modificati. Inoltre quest'azione &egrave; necessaria affinch&eacute; i voti compaiano nella pagella dello studente e nel tabellone finale della classe.</p>
	  <button class="btn_red" onclick="closeDialog()">Annulla</button><button class="btn_green" style="float: right">Conferma</button>
	<?php
      }else{
	if(lightschool_is_user_member($_GET['class'], $_GET['username']) == 'ok'){
	  if($_GET['type'] == 'overview'){
	    $get_email = lightschool_get_user($_GET['username'], 'email_address');
	    ?>
	      <img src="<?php echo(lightschool_get_user($_GET['username'], 'profile_image')); ?>" style="border-radius: 50%; width: 64px; height: 64px; border: 1px solid black; float: left; margin-right: 20px" />
	      <span style="font-size: 25pt; font-family: 'Roboto'; display: inline-block; margin-bottom: 5px"><?php echo(lightschool_get_user($_GET['username'], 'surname')); ?> <?php echo(lightschool_get_user($_GET['username'], 'name')); ?></span><br/>
	      <span style="font-size: 12pt; font-family: 'Roboto'; display: inline-block; margin-bottom: 20px; max-width: calc(100% - 100px); overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo(lightschool_get_user($_GET['username'], 'date_of_birth')); ?><pre class='text_min2'></pre><span class="text_complete">&nbsp;&bull;&nbsp;</span><span onclick="alert('<?php echo($get_email); ?>');"><?php echo($get_email); ?></span></span><br/>
	      <?php include_once "justify_required.php"; ?>
	    <?php
	  }elseif($_GET['type'] == 'marks' and $USER_type == 'docente'){
	    ?>
	      <script src="<?= $MY_MAIN_DIRECTORY ?>/tinymce/tinymce.min.js"></script>
	      <script type="text/javascript" src="//latex.codecogs.com/editor3.js"></script>
	      <script type="text/javascript">
		$(function(){
		  $("#add_mark_date").datepicker();
		  $("#add_mark_date").datepicker("option", "showAnim", "slideDown");
		  $("#add_mark_date").datepicker("option", $.datepicker.regional["it"]);
		});
		
		tinymce.init({
		  selector: "textarea",
		  plugins: [
			  "textcolor colorpicker textpattern"
		  ],
		  toolbar1: "undo redo | bold italic underline | forecolor",

		  width : 370,
		  menubar: false,
		  statusbar : false,
		  toolbar_items_size: 'small'
		});
	      </script>
	      <div class="selectMark">
		<br/>
		<span class="link" onclick="selectMark()">&lt; Indietro</span><br/><br/>
		<center>
		  <span class="mark mark_never_mind" value="0">n.c.</span><span class="mark mark_never_mind" value="0.25">0+</span><span class="mark mark_never_mind" value="0.50">0 &frac12;</span><span class="mark mark_never_mind" value="0.75">1-</span><br/>
		  <span class="mark mark_never_mind" value="1">1</span><span class="mark mark_never_mind" value="1.25">1+</span><span class="mark mark_never_mind" value="1.50">1 &frac12;</span><span class="mark mark_never_mind" value="1.75">2-</span><br/>
		  <span class="mark mark_never_mind" value="2">2</span><span class="mark mark_never_mind" value="2.25">2+</span><span class="mark mark_never_mind" value="2.50">2 &frac12;</span><span class="mark mark_never_mind" value="2.75">3-</span><br/>
		  <span class="mark mark_bad" value="3">3</span><span class="mark mark_bad" value="3.25">3+</span><span class="mark mark_bad" value="3.50">3 &frac12;</span><span class="mark mark_bad" value="3.75">4-</span><br/>
		  <span class="mark mark_bad" value="4">4</span><span class="mark mark_bad" value="4.25">4+</span><span class="mark mark_bad" value="4.50">4 &frac12;</span><span class="mark mark_bad" value="4.75">5-</span><br/>
		  <span class="mark mark_bad" value="5">5</span><span class="mark mark_bad" value="5.25">5+</span><span class="mark mark_bad" value="5.50">5 &frac12;</span><span class="mark mark_soso" value="5.75">6-</span><br/>
		  <span class="mark mark_good" value="6">6</span><span class="mark mark_good" value="6.25">6+</span><span class="mark mark_good" value="6.50">6 &frac12;</span><span class="mark mark_good" value="6.75">7-</span><br/>
		  <span class="mark mark_good" value="7">7</span><span class="mark mark_good" value="7.25">7+</span><span class="mark mark_good" value="7.50">7 &frac12;</span><span class="mark mark_good" value="7.75">8-</span><br/>
		  <span class="mark mark_good" value="8">8</span><span class="mark mark_good" value="8.25">8+</span><span class="mark mark_good" value="8.50">8 &frac12;</span><span class="mark mark_good" value="8.75">9-</span><br/>
		  <span class="mark mark_perfect" value="9">9</span><span class="mark mark_perfect" value="9.25">9+</span><span class="mark mark_perfect" value="9.50">9 &frac12;</span><span class="mark mark_perfect" value="9.75">10-</span><br/>
		  <span class="mark mark_perfect" value="10">10</span><span class="mark">&nbsp;</span><span class="mark mark_good" value="plus">+</span><span class="mark mark_bad" value="minus">-</span>
		</center>
	      </div>
	      <div class="hideForSelectMark">
		<img src="<?php echo(lightschool_get_user($_GET['username'], 'profile_image')); ?>" style="border-radius: 50%; width: 28px; height: 28px; border: 1px solid black; float: left; margin-right: 10px" />
		<span style="font-size: 16pt; font-family: 'Roboto'; display: inline-block; margin-bottom: 5px"><?php echo(lightschool_get_user($_GET['username'], 'surname')); ?> <?php echo(lightschool_get_user($_GET['username'], 'name')); ?></span><br/><br/>
		<div id="mark_form">
		  <select id="add_mark_subject" name="subject_select" style="margin-bottom: 15px">
		    <?php
		      foreach($USER_DOC_subject as $doc_subject_option){
			echo("<option>$doc_subject_option</option>");
		      }
		    ?>
		    <option>Altro</option>
		  </select>
		  <input type="text" id="add_mark_subject_text" name="subject_text" placeholder="Materia" style="width: calc(100% - 40px); display: none" />
		  <span class="link" onclick="selectMark()" id="link_selectedit_mark">Seleziona voto</span><input type="text" hidden="hidden" style="display: none" id="add_mark_value_input" name="mark_value_input" placeholder="Voto" /><br/><br/>
		  <select id="add_mark_type" name="type" style="margin-bottom: 10px">
		    <option value="s">Scritto</option>
		    <option value="o">Orale</option>
		    <option value="p">Pratico</option>
		  </select>
		  <input type="text" id="add_mark_date" name="date_mark" placeholder="Data" style="width: calc(100% - 40px)" readonly="readonly" />
		  <textarea id="add_mark_descr" name="descr"></textarea>
		  <input type="submit" value="Aggiungi" style="float: right; width: auto; margin-right: 10px; margin-top: 10px" onclick="addMark()" />
		</div>
	      </div>
	    <?php
	  }elseif($_GET['type'] == 'scrutini' and $USER_type == 'docente'){
	    $SCHOOL_id = lightschool_get_class_details($Username, $_GET['class'], 'school_id');
	    $SCHOOL_periodo = lightschool_get_class_details($Username, $_GET['class'], 'periodo');
  
	    if($_GET['period'] == 'first'){
	      $DATE_array = array($SCHOOL_periodo[0], $SCHOOL_periodo[1]);
	    }elseif($_GET['period'] == 'second'){
	      $DATE_array = array($SCHOOL_periodo[2], $SCHOOL_periodo[3]);
	    }
	    
	    // marks
	    $MARK_media = lightschool_get_marks_media($_SESSION['Username'], $_GET['username'], $_GET['class'], $_GET['subject'], 'scrutini', $DATE_array);
	    
	    $MARK_media_graph = $MARK_media[0];
	    $MARK_media_value = $MARK_media[1];
	    ?>
	      <div class="selectMark">
		<br/>
		<span class="link" onclick="selectMark()">&lt; Indietro</span><br/><br/>
		<center>
		  <span class="mark mark_never_mind" value="0">n.c.</span><span class="mark mark_never_mind" value="0.25">0+</span><span class="mark mark_never_mind" value="0.50">0 &frac12;</span><span class="mark mark_never_mind" value="0.75">1-</span><br/>
		  <span class="mark mark_never_mind" value="1">1</span><span class="mark mark_never_mind" value="1.25">1+</span><span class="mark mark_never_mind" value="1.50">1 &frac12;</span><span class="mark mark_never_mind" value="1.75">2-</span><br/>
		  <span class="mark mark_never_mind" value="2">2</span><span class="mark mark_never_mind" value="2.25">2+</span><span class="mark mark_never_mind" value="2.50">2 &frac12;</span><span class="mark mark_never_mind" value="2.75">3-</span><br/>
		  <span class="mark mark_bad" value="3">3</span><span class="mark mark_bad" value="3.25">3+</span><span class="mark mark_bad" value="3.50">3 &frac12;</span><span class="mark mark_bad" value="3.75">4-</span><br/>
		  <span class="mark mark_bad" value="4">4</span><span class="mark mark_bad" value="4.25">4+</span><span class="mark mark_bad" value="4.50">4 &frac12;</span><span class="mark mark_bad" value="4.75">5-</span><br/>
		  <span class="mark mark_bad" value="5">5</span><span class="mark mark_bad" value="5.25">5+</span><span class="mark mark_bad" value="5.50">5 &frac12;</span><span class="mark mark_soso" value="5.75">6-</span><br/>
		  <span class="mark mark_good" value="6">6</span><span class="mark mark_good" value="6.25">6+</span><span class="mark mark_good" value="6.50">6 &frac12;</span><span class="mark mark_good" value="6.75">7-</span><br/>
		  <span class="mark mark_good" value="7">7</span><span class="mark mark_good" value="7.25">7+</span><span class="mark mark_good" value="7.50">7 &frac12;</span><span class="mark mark_good" value="7.75">8-</span><br/>
		  <span class="mark mark_good" value="8">8</span><span class="mark mark_good" value="8.25">8+</span><span class="mark mark_good" value="8.50">8 &frac12;</span><span class="mark mark_good" value="8.75">9-</span><br/>
		  <span class="mark mark_perfect" value="9">9</span><span class="mark mark_perfect" value="9.25">9+</span><span class="mark mark_perfect" value="9.50">9 &frac12;</span><span class="mark mark_perfect" value="9.75">10-</span><br/>
		  <span class="mark mark_perfect" value="10">10</span>
		</center>
	      </div>
	      <img src="<?php echo(lightschool_get_user($_GET['username'], 'profile_image')); ?>" style="border-radius: 50%; width: 28px; height: 28px; border: 1px solid black; float: left; margin-right: 10px" />
	      <span style="font-size: 16pt; font-family: 'Roboto'; display: inline-block; margin-bottom: 5px"><?php echo(lightschool_get_user($_GET['username'], 'surname')); ?> <?php echo(lightschool_get_user($_GET['username'], 'name')); ?></span><br/><br/>
	      <div class="hideForSelectMark">
		<div id="scrutini_form">
		  <span class="link" onclick="selectMark()" id="link_selectedit_mark">Seleziona voto</span><input type="num" hidden="hidden" style="display: none" id="add_mark_value_input" name="add_mark_value_input" placeholder="Voto" /><br/><span style="font-size: 10pt; color: gray; display: block; max-width: 300px">La media matematica &egrave; <?php echo($MARK_media_value); ?>.</span><br/>
		  <span class="link" id="">Allega file</span><br/>
		  <span style="font-size: 10pt; color: gray; display: block; max-width: 300px">Si accettano file Word, Open/LibreOffice e PDF per massimo 1 mb di dimensione file.</span><br/>
		  <input type="submit" value="Proponi voto" style="float: right; width: auto; margin-right: 10px; margin-top: 10px" onclick="propMark()" />
	      </div>
	    <?php
	  }elseif($_GET['type'] == 'lessons' and $USER_type == 'docente'){
	    $docente = lightschool_get_lesson($_GET['id']);
	    
	    if($docente == true){
	      ?>
		<img src="<?php echo(lightschool_get_user($_GET['username'], 'profile_image')); ?>" style="border-radius: 50%; width: 28px; height: 28px; border: 1px solid black; float: left; margin-right: 10px" />
		<span style="font-size: 16pt; font-family: 'Roboto'; display: inline-block; margin-bottom: 5px"><?php echo(lightschool_get_user($_GET['username'], 'surname')); ?> <?php echo(lightschool_get_user($_GET['username'], 'name')); ?></span><br/><br/>
		<div id="mark_form">
		  <input type="text" id="subject" name="subject" value="<?= $USER_DOC_subject ?>" placeholder="Materia" />
		  <input type="num" id="mark" name="mark" placeholder="Voto" />
		  <select id="type" name="type">
		    <option value="w">Scritto</option>
		    <option value="o">Orale</option>
		    <option value="p">Pratico</option>
		  </select>
		  <textarea id="descr" name="descr"></textarea>
		  <input type="submit" value="Aggiungi" style="float: right; width: auto; margin-right: 10px" />
		</div>
	      <?php
	    }else{
	      echo('Non puoi modificare la lezione di un altro docente');
	    }
	  }elseif($_GET['type'] == 'justify'){
	    if($USER_type == 'docente'){
	      $date = $_GET['date'];
	      $get_assent_justify = lightschool_get_justify($_GET['username'], 'assent', false, "$date");
	      
	      if($get_assent_justify == 1){
		$text = "un'assenza";
		$value = "assent";
	      }
	      
	      if($text == ""){
		$get_ritardi_justify = lightschool_get_justify($_GET['username'], 'ritardi', false, "$date");
	      }
	      if($get_ritardi_justify == 1){
		$get_hour = lightschool_get_justify($_GET['username'], 'ritardi', "hour", "$date");
		$text = "un ritardo delle $get_hour";
		$value = "ritardo";
	      }
	      
	      if($text == ""){
		$get_uscite_justify = lightschool_get_justify($_GET['username'], 'uscite', false, "$date");
	      }
	      if($get_uscite_justify == 1){
		$get_hour = lightschool_get_justify($_GET['username'], 'uscite', "hour", "$date");
		$text = "un'uscita alle $get_hour";
		$value = "uscita";
	      }
	      
	      if($text == ""){
		echo("Errore generale.");
		exit;
	      }
	      ?>
		<script src="<?= $MY_MAIN_DIRECTORY ?>/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="//latex.codecogs.com/editor3.js"></script>
		<script type="text/javascript">
		  tinymce.init({
		    selector: "textarea",
		    plugins: [
			    "textcolor colorpicker textpattern"
		    ],
		    toolbar1: "undo redo | bold italic underline | forecolor",

		    width : 400,
		    menubar: false,
		    statusbar : false,
		    toolbar_items_size: 'small'
		  });
		</script>
		<img src="<?php echo(lightschool_get_user($_GET['username'], 'profile_image')); ?>" style="border-radius: 50%; width: 28px; height: 28px; border: 1px solid black; float: left; margin-right: 10px" />
		<span style="font-size: 16pt; font-family: 'Roboto'; display: inline-block; margin-bottom: 5px"><?php echo(lightschool_get_user($_GET['username'], 'surname')); ?> <?php echo(lightschool_get_user($_GET['username'], 'name')); ?></span><br/><br/>
		Stai giustificando <?php echo($text); ?> del <?php echo($date); ?>.<br/>
		<span style="font-size: 10pt; color: gray; display: inline-block; max-width: 350px">NB: Verr&agrave; salvata nei nostri sistemi la data di registrazione della giustificazione e il docente in servizio che ha effettuato l'operazione.</span><br/><br/>
		<form method="post" action="<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=register_justify">
		  <input type="hidden" id="type2" name="type2" style="display: none" hidden="hidden" value="<?= $value ?>" />
		  <label><input type="radio" id="justify_type" name="justify_type" value="a">(A) Salute</label>
		  <label><input type="radio" id="justify_type" name="justify_type" value="b">(B) Motivi familiari</label>
		  <label><input type="radio" id="justify_type" name="justify_type" value="c">(C) Trasporto</label><br/>
		  <label><input type="radio" id="justify_type" name="justify_type" value="d">(D) Sciopero</label>
		  <label><input type="radio" id="justify_type" name="justify_type" value="e">(E) Altro (specificare)</label><br/>
		  <textarea id="justify_descr" name="justify_descr"></textarea><br/>
		  <input type="submit" value="Giustifica" style="float: right; margin-right: 40px" id="justify_button" />
		</form>
	      <?php
	    }else{
	      echo('Non puoi modificare la lezione di un altro docente');
	    }
	  }
	}else{
	  echo('Questo utente non fa parte di questa classe');
	}
      }
    }else{
      echo('Non fai parte di questa classe');
    }
  }else{
    echo('Non sei collegato. Premi F5 o ricarica la pagina dal pulsante per accedere nuovamente.');
  }
?>