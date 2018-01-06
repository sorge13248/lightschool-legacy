<?php include_once "base.php";
if($_SESSION['Username'] != ''){
  if($_GET['id'] != ''){
    $_GET['SQL_type'] = "writer";
    include "view_management.php";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>LightSchool Writer</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <?php include_once "style_editor.php"; ?>
    <script src="<?= $MY_MAIN_DIRECTORY ?>/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="//latex.codecogs.com/editor3.js"></script>
    <style type="text/css">
      html, body{
	background-color: #EDEDED;
      }
      
      .writer_tab{
	display: inline-block;
	padding-right: 15px;
	padding-left: 15px;
	margin-right: 5px;
	margin-left: 5px;
	cursor: pointer;
      }
      .separator{
	display: inline-block;
	width: 20px;
      }
      span{
	background-color: inital;
      }
      #mceu_20{
	position: fixed;
	top: 8px;
	left: 300px;
	z-index: 9997;
      }
      #mceu_28{
	position: fixed;
	top: 45px;
	left: 90px;
	z-index: 9997;
      }
      .page *{
	color: white !important;
	border: none !important;
	box-shadow: none !important;
	border: none;
      }
      button{
	background-color: <?= $USER_accent ?> !important;
      }
      .page button:hover, .mce-btn:hover{
	background-color: <?= $USER_accent_darker ?> !important;
      }
      .mce-close{
	padding-left: 5px !important;
	padding-right: 5px !important;
	background-color: red !important;
      }
      .mce-title{
	font-family: 'Roboto' !important;
	font-weight: normal !important;
      }
      #mceu_21{
	width: 40px !important;
      }
      #mceu_22{
	width: 70px !important;
      }
      #mceu_23{
	width: 70px !important;
      }
      #mceu_24{
	width: 75px !important;
      }
      #mceu_25{
	width: 70px !important;
      }
      #mceu_26{
	width: 65px !important;
      }
      #mceu_27-open{
	width: 85px !important;
	padding-left: 10px !important;
      }
      
      .loading{
	position: fixed;
	top: 0px;
	left: 0px;
	height: calc(100% - 80px);
	width: calc(100% - 80px);
	padding: 40px;
	color: white;
	font-family: 'Roboto';
	z-index: 9999999999;
	background-color: <?= $USER_accent ?>;
	overflow-y: auto;
      }
      
      .templates{
	position: fixed;
	top: 0px;
	left: 0px;
	height: calc(100% - 80px);
	width: calc(100% - 80px);
	padding: 40px;
	color: white;
	font-family: 'Roboto';
	z-index: 9999999;
	background-color: <?= $USER_accent ?>;
	overflow-y: auto;
	<?php if($_GET['id'] != ''){ ?>
	  display: none;
	<?php } ?>
      }
      
      .model{
	height: 200px;
	width: 150px;
	margin-right: 20px;
	margin-bottom: 20px;
	border: 1px solid black;
	cursor: pointer;
	transition: .15s ease-in-out;
	display: inline-block;
	background-color: white;
      }
      .model:hover{
	-webkit-box-shadow: 0px 0px 40px -4px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 0px 40px -4px rgba(0,0,0,0.75);
	box-shadow: 0px 0px 40px -4px rgba(0,0,0,0.75);
      }
      .model .image{
	width: 100%;
	height: 100%;
      }
      .model .caption{
	height: 20px;
	position: relative;
	bottom: 40px;
	left: 0px;
	background-color: rgba(0,0,0,0.8);
	padding: 10px;
	width: calc(100% - 20px);
	overflow: hidden;
	white-space: nowrap;
	text-overflow: ellipsis;
      }
      
      #blank{
	background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/models/blank.png");
      }
      #homework{
	background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/models/homework.png");
      }
      #research{
	background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/models/research.png");
      }
      #essay{
	background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/models/essay.png");
      }
      #formal_letter{
	background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/models/formal_letter.png");
      }
      #informal_letter{
	background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/models/informal_letter.png");
      }
      #commercial{
	background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/models/commercial_letter.png");
      }
      #int_curriculum{
	background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/models/int_curriculum.png");
      }
      #europass_curriculum{
	background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/models/europass_curriculum.png");
      }
      #programma_scolastico{
	background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/models/programma_scolastico.png");
      }
    </style>
   <?php
      setlocale(LC_TIME, 'ita', 'it_IT');
      $today_date_writer = strftime("%A %d %B %Y");
      $today_date_writer = str_replace('ì', '&igrave;', $today_date_writer);
      
      if($USER_provincia != ''){
	$text_city = $USER_provincia;
      }else{
	$text_city = 'CITT&Agrave;';
      }
      if($USER_class != ''){
	$text_class = $USER_class;
      }else{
	$text_class = 'CLASSE';
      }
    ?>
    <script type="text/javascript">
      window.editor_initialized = false;
    
      if(typeof(Storage) !== "undefined"){
	setInterval(function(){
	  if(window.editor_initialized === true){
	    saveDraft();
	  }
	}, <?= $USER_autosave_timer ?>000);
	
	setInterval(function(){
	  //hideToast();
	}, <?= $USER_autosave_timer/1.5 ?>000);
	
	function saveDraft(){
	  $(".toast").css("background-color", "darkgreen");
	  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />Bozza salvata automaticamente");
	  $(".toast").slideDown(300);
	  
	  var content = tinyMCE.activeEditor.getContent();
	  var notebook_title = $("#notebook_title").val();
	  
	  if(typeof(notebook_title) === "undefined"){
	    notebook_title = "Senza nome";
	  }
	  if(typeof(content) !== "undefined"){
	    localStorage.setItem("writer_draft_title", notebook_title);
	    localStorage.setItem("writer_draft_html", content);
	  }
	}
	function hideToast(){
	  $(".toast").slideUp(300);
	}
      }
      
      tinymce.init({
	  selector: "#editor1",
	  language : 'it',
	  statusbar: false,
	  width: '100%',
	  height: '100%',
	  plugins: [
	      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	      "searchreplace wordcount visualblocks visualchars code",
	      "insertdatetime media nonbreaking save table contextmenu directionality",
	      "emoticons template paste textcolor colorpicker textpattern autoresize"
	  ],
	  toolbar1: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor | preview superscript subscript",
	  image_advtab: true,
	  autoresize_min_height: 600,
	  content_css: "editor_style_content.css",
	  init_instance_callback : function(editor) {
	    $('.loading').fadeOut(300);
	  }
      });
    
      $(document).ready(function(){
	if(typeof(localStorage.getItem("writer_draft_html")) !== "undefined"){
	  $("#draft").show();
	}
      
	$(".model").on("click", function(){
	  window.editor_initialized = true;
	  
	  var selected_model = $(this).attr("id");
	  $(".templates").fadeOut(500);
	  tinyMCE.activeEditor.setContent('');
	  if(selected_model == 'draft'){
	    tinyMCE.activeEditor.setContent(localStorage.getItem("writer_draft_html"));
	  }else if(selected_model == 'homework'){
	    tinyMCE.activeEditor.setContent('<h2>Compiti di MATERIA</h2><h3>Es N pagina PAGINA</h3><p>Compiti qui...</p><br/><h3>Es N pagina PAGINA</h3><p>Compiti qui...</p><br/><br/><h3>Es N pagina PAGINA</h3><p>Compiti qui...</p><br/><br/><h3>Es N pagina PAGINA</h3><p>Compiti qui...</p><br/><br/><h3>Es N pagina PAGINA</h3><p>Compiti qui...</p><br/>');
	  }else if(selected_model == 'research'){
	    tinyMCE.activeEditor.setContent('<h2>Ricerca su ARGOMENTO</h2><p>Contenuto qui...</p>');
	  }else if(selected_model == 'formal_letter'){
	    tinyMCE.activeEditor.setContent('<p><strong>Mittente</strong>&nbsp;<?= $USER_surname ?>&nbsp;<?= $USER_name ?><span style="float: right; mso-spacerun: yes"><?= $text_city ?>, <?= $today_date_writer ?></span></p><p><strong>Destinatario</strong>&nbsp;COGNOME E NOME</p><p><strong>Oggetto</strong>&nbsp;OGGETTO</p><br/><p>Lettera qui...<br/><span style="color: gray">Suggerimento: utilizza un lessico ricercato, dai del Lei e dividi in paragrafi il contenuto della tua lettera</span></p>');
	  }else if(selected_model == 'informal_letter'){
	    tinyMCE.activeEditor.setContent('<p><strong>Mittente</strong>&nbsp;<?= $USER_surname ?>&nbsp;<?= $USER_name ?><span style="float: right; mso-spacerun: yes"><?= $text_city ?>, <?= $today_date_writer ?></span></p><p><strong>Destinatario</strong>&nbsp;COGNOME E NOME</p><p><strong>Oggetto</strong>&nbsp;OGGETTO</p><br/><p>Lettera qui...</p>');
	  }else if(selected_model == 'commercial'){
	    tinyMCE.activeEditor.setContent('<table style="width: auto; float: right"><tr><td>Nome societ&agrave; mittente</td></tr><tr><td>Indirizzo postale (via, citt&agrave;, provincia e CAP)</td></td></table><br/><table style="width: auto"><tr><td>Nome societ&agrave; destinataria</td></tr><tr><td>Indirizzo postale (via, citt&agrave;, provincia e CAP)</td></td></table><br/><p style="text-align: right"><?= $text_city ?>, <?= $today_date_writer ?></p><p><b>OGGETTO</b> Qui scrivi l&#39;oggetto</p><br/><p>Qui scrivi il contenuto</p><br/><p style="text-align: right">Nome societ&agrave; mittente<br/>Firma</p>');
	  }else if(selected_model == 'int_curriculum'){
	    tinyMCE.activeEditor.setContent('<h1 style="text-align: center">Curriculum Vitae <?= $USER_surname ?>&nbsp;<?= $USER_name ?></h1><table style="width: 100%" cellpadding="10"><tr><td valign="top" style="background-color: lightgray; width: 180px"><img src="<?= $USER_image2 ?>" alt="La tua foto" style="width: 100%; max-width: 200px" /><h3>ADDRESS</h3><p>INDIRIZZO<br/>CAP&nbsp;<?= $text_city ?><br/>STATO</p><br/><h3>TELEPHONE</h3><p>TELEFONO FISSO E/O CELLULARE</p><br/><h3>E-MAIL</h3><p><?= $USER_email ?></p><br/><h3>DATE OF BIRTH</h3><p><?= $USER_date_of_birth ?></p><br/><h3>SPOKEN LANGUAGES</h3><p>LE LINGUE CHE PARLI</p><br/><h3>SKILLS</h3><p>LE TUE ABILIT&Agrave; LAVORATIVE</p><br/><h3>INTERESTS</h3><p>SPORT, PASSATEMPI, HOBBY</p><br/></td><td valign="top"><h3>Education</h3><hr/><p>Qui devi scrivere che scuole e universit&agrave; hai frequentato e le qualificazioni ottenute (diplomi e lauree). Utilizza il modello qui sotto per aiutarti.<table style="width: 100%" cellpadding="10"><tr><th style="width: 50px">Years</th><th>School&#39;s name</th><th>City</th></tr><tr><td>2012-2017</td><td>Il nome della scuola</td><td><?= $text_city ?></td></tr></table></p><br/><h3>Professional Experience</h3><hr/><p>Esperienze lavorative passate partendo ad esempio gli stage estivi e lavori svolti presso ditte. Utilizza il modello qui sotto per aiutarti.<table style="width: 100%" cellpadding="10"><tr><th style="width: 50px">Years</th><th>Company&#39;s name</th><th>City</th></tr><tr><td>2017-2024</td><td>Il nome della ditta o organizzazione</td><td><?= $text_city ?></td></tr></table></p><br/><h3>Extracurricular experience</h3><hr/><p>Esperienze non lavorative, ma dove comunque hai eseguti attivit&agrave; di organizzazione e coordinamento, contabilit&agrave;, etc. Puoi anche scrivere della squadra sportiva di cui fai parte, se sei presidente di qualche comitato, etc.</p><h3>HONOURS AND AWARDS</h3><hr/><p>Riconoscimenti ottenuti e/o premi vinti per proprie invenzioni.</p></td></tr></table>');
	  }else if(selected_model == 'europass_curriculum'){
	    tinyMCE.activeEditor.setContent('<table style="width: 100%; margin-bottom: 20px"><tr><td style="text-align: right; width: 200px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/models/europass_logo.png" style="width: 80px; height: 50px; margin-right: 10px" /></td><td style="font-size: 17pt">Curriculum Vitae <?= $USER_surname ?>&nbsp;<?= $USER_name ?><br/><span style="font-size: 10pt">&copy; European Union, 2002-2013 | http://europass.cedefop.europa.eu</span></td></tr></table><table style="width: 100%" cellpadding="10"><tr><td>PERSONAL INFORMATION</td><td><?= $USER_name.' '.$USER_surname ?></td></tr><tr><td style="width: 200px"><img src="<?= $USER_image2 ?>" style="width: 100%; max-width: 200px" /></td><td><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/place.png" height="13" width="13" style="margin-right: 10px" />Replace with house number, street name, city, postcode, country<br/><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/phone.png" height="13" width="13" style="margin-right: 10px" />Replace telephone number&nbsp;&nbsp;<img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/mobile.png" height="13" width="13" style="margin-right: 10px" />Replace with mobile number<br/><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/mail.png" height="13" width="13" style="margin-right: 10px" /><?= $USER_email ?><br/><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/mouse.png" height="13" width="13" style="margin-right: 10px" />State personal website(s)<br/><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set_black ?>/messages.png" height="13" width="13" style="margin-right: 10px" />Replace with type of IM service and with messaging account(s)</td></tr><tr><td>JOB APPLIED FOR POSITION PREFERRED JOB STUDIES APPLIED FOR</td><td>Replace with job applied for / position / preferred job / studies applied for (delete non relevant headings in left column)</td></tr><tr><td>WORK EXPERIENCE<br/>Replace with dates (from - to)</td><td>Replace with occupation or position held Replace with employer&#39;s name and locality (if relevant, full address and website) <ul><li>Replace with main activities and responsibilities</li></ul>Business or sector Replace with type of business or sector</td></tr><tr><td>EDUCATION AND TRAINING<br/>Replace with dates (from - to)</td><td>Replace with qualification awarded<br/>Replace with education or training organisation&#39;s name and locality (if relevant, country) <ul><li>Replace with a list of principal subjects covered or skills acquired</li></ul></td></tr><tr><td>PERSONAL SKILLS</td><td></td></tr><tr><td>Mother tongue(s)</td><td>Replace with mother tongue(s)</td></tr><tr><td colspan="2"><table style="width: 100%" cellpadding="5"><tr><td>Other language(s)</td><td colspan="2">UNDERSTANDING</td><td colspan="2">SPEAKING</td><td>WRITING</td></tr><tr><td>&nbsp;</td><td>Listening</td><td>Reading</td><td>Spoken interaction</td><td>Spoken production</td><td>&nbsp;</td></tr><tr><td>Replace with language</td><td>Enter level</td><td>Enter level</td><td>Enter level</td><td>Enter level</td><td>Enter level</td></tr><tr><td>&nbsp;</td><td colspan="5">Replace with name of language certificate. Enter level if known.</td></tr><tr><td>Replace with language</td><td>Enter level</td><td>Enter level</td><td>Enter level</td><td>Enter level</td><td>Enter level</td></tr><tr><td>&nbsp;</td><td colspan="5">Replace with name of language certificate. Enter level if known.</td></tr></table></td></tr><tr><td>Communication skills</td><td>Replace with your communication skills. Specify in what context they were acquired. Example:<ul><li>good communication skills gained through my experience as sales manager</li></ul></td></tr><tr><td>Organisational / managerial skills</td><td>Replace with your organisational / managerial skills. Specify in what context they were acquired. Example:<ul><li>leadership (currently responsible for a team of 10 people)</li></ul></td></tr><tr><td>Job-related skills</td><td>Replace with any job-related skills not listed elsewhere. Specify in what context they were acquired. Example:<ul><li>good command of quality control processes (currently responsible for quality audit)</li></ul></td></tr><tr><td>Computer skills</td><td>Replace with your computer skills. Specify in what context they were acquired. Example:<ul><li>good command of Microsoft Office&trade; tools</li></ul></td></tr><tr><td>Other skills</td><td>Replace with other relevant skills not already mentioned. Specify in what context they were acquired. Example:<ul><li>carpentry</li></ul></td></tr><tr><td>Driving licence</td><td>Replace with driving licence category/-ies. Example:<ul><li>B</li></ul></td></tr><tr><td>ADDITIONAL INFORMATION</td><td></td></tr><tr><td>Publications<br/>Presentations<br/>Projects<br/>Conferences<br/>Seminars<br/>Honours and awards<br/>Memberships<br/>References</td><td>Replace with relevant publications, presentations, projects, conferences, seminars, honours and awards, memberships, references. Remove headings not relevant in the left column. Example of publication :<ul><li>How to write a successful CV, New Associated Publishers, London, 2002.</li></ul>Example of project:<ul><li>Devon new public library. Principal architect in charge of design, production, bidding and construction supervision (2008-2012).</li></ul></td></tr><tr><td>ANNEXES</td><td></td></tr><tr><td></td><td>Replace with list of documents annexed to your CV. Examples:<ul><li>copies of degrees and qualifications</li><li>testimonial of employment or work placement</li><li>publications or research.</li></ul></td></tr></table>');
	  }else if(selected_model == 'essay'){
	    tinyMCE.activeEditor.setContent('<h3><?= $USER_surname ?>&nbsp;<?= $USER_name ?>&nbsp;<?= $text_class ?>&nbsp;<?= $today_date_writer ?></h3><h3>Tema su ARGOMENTO</h3><div style="float: left; width: 50%; max-width: 50%">Contenuto...</div>');
	  }else if(selected_model == 'programma_scolastico'){
	    tinyMCE.activeEditor.setContent('<span style="float: right"><?= $text_city ?>, <?= $today_date_writer ?></span><br/><h2>Il programma scolastico di <?= $USER_surname ?>&nbsp;<?= $USER_name ?>&nbsp;della&nbsp;<?= $text_class ?></h2>');
	  }
	});
      });
      
      function saveDocument(){
	$('#save_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$("#notebook_title").focus();
      }
      
      function saveButton(){
	var content = tinyMCE.activeEditor.getContent();
	var notebook_title = $("#notebook_title").val();
	var content = escape(content);
	
	if(!notebook_title){
	  $(".toast").css('background-color', 'red');
	  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />Titolo obbligatorio");
	}else{
	  $.ajax({
	    type: "POST",
	    url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=save_notebook",
	    data: "content="+content+"&f=<?= $_GET['f'] ?>&title="+notebook_title+"&id=<?= $_GET['id'] ?>",
	    success: function(html){
	      if(html=='true'){
		$(".toast").css("background-color", "darkgreen");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />Quaderno creato");
		closeDialog();
	      }else{
		$(".toast").css('background-color', 'red');
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	      }
	    },
	    beforeSend:function(){
	      $(".toast").css('background-color', 'orange');
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' />Esecuzione operazione...");
	    }
	  });
	}
	$(".toast").slideDown(400);
      }
    </script>
    <div class="dialog" id="save_dialog">
      <div class="title">Salva quaderno<span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="save_frame">
	<input type="text" style="width: calc(100% - 120px)" placeholder="Titolo quaderno" id="notebook_title" value="<?= $GENERAL_name ?>" />
	<input type="button" value="Salva" style="float: right" onclick="saveButton()" />
      </div>
    </div>
  </head>
  <body>
   <div class="header" id="header" style="height: auto">
      <img src="<?= $USER_image ?>" style="height: 82px; margin-right: 10px; float: left"><span style="font-family: 'Roboto'; font-size: 20pt; display: inline-block; padding-top: 5px; padding-bottom: 5px"><?php echo($USER_name.' '.$USER_surname); ?></span><span class="link" style="display: inline-block; position: fixed; top: 10px; right: 10px; color: white" onclick="saveDocument()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/save.png" style="width: 16px; height: 16px; margin-right: 10px; float: left" />Salva</span>
    </div>
    <div class="loading">
      <center style="display: block; margin-top: 20%">
	<img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/loading2.gif" style="width: 32px; height: 32px; margin-right: 10px; margin-left: -40px" /><span style="font-size: 25pt; font-family: 'Roboto'">LightSchool Writer</span><br/>
	<span style="font-size: 17pt; font-family: 'Roboto'">Inizializzazione in corso...</span>
      </center>
    </div>
    <div class="templates">
      <span style="font-size: 12pt"><strong>LightSchool Writer</strong>&nbsp;Seleziona un modello</span>
      <span style="font-size: 16pt; float: right" class="text_complete"><img src="<?= $USER_image ?>" style="width: 24px; height: 24px; border-radius: 50%; border: 1px solid black; margin-right: 10px; float: left"><span style="display: inline-block; margin-top: -20px"><?php echo($USER_name.' '.$USER_surname); ?></span></span><br/>
      <span style="font-size: 20pt">Generale</span>
      <hr class="white_left" style="margin-top: 20px; margin-bottom: 40px" />
      <div class="model" title="Carica bozza" id="draft" style="display: none">
	<div class="image" id="draft"></div>
	<div class="caption">Carica bozza</div>
      </div>
      <div class="model" title="Vuoto" id="blank">
	<div class="image" id="blank"></div>
	<div class="caption">Vuoto</div>
      </div>
      <div class="model" title="Compiti per casa" id="homework">
	<div class="image" id="homework"></div>
	<div class="caption">Compiti per casa</div>
      </div>
      <div class="model" title="Ricerca" id="research">
	<div class="image" id="research"></div>
	<div class="caption">Ricerca</div>
      </div>
      <div class="model" title="Tema" id="essay">
	<div class="image" id="essay"></div>
	<div class="caption">Tema</div>
      </div>
      <!-- <div class="model" title="Tesina" id="tesina">
	<div class="image" id="tesina"></div>
	<div class="caption">Tesina</div>
      </div> -->
      <br/>
      <span style="font-size: 20pt">Lettere</span>
      <hr class="white_left" style="margin-top: 20px; margin-bottom: 40px" />
      <div class="model" title="Lettera formale" id="formal_letter">
	<div class="image" id="formal_letter"></div>
	<div class="caption">Formale</div>
      </div>
      <div class="model" title="Lettera informale" id="informal_letter">
	<div class="image" id="informal_letter"></div>
	<div class="caption">Informale</div>
      </div>
      <div class="model" title="Commerciale" id="commercial">
	<div class="image" id="commercial"></div>
	<div class="caption">Commerciale</div>
      </div>
      <!-- <div class="model" title="Candidatura spontanea" id="candidatura_spontanea">
	<div class="image" id="candidatura_spontanea"></div>
	<div class="caption">Candidatura spontanea</div>
      </div> -->
      <br/>
      <span style="font-size: 20pt">Curriculum Vitae</span>
      <hr class="white_left" style="margin-top: 20px; margin-bottom: 40px" />
      <div class="model" title="Curriculum internazionale" id="int_curriculum">
	<div class="image" id="int_curriculum"></div>
	<div class="caption">Internazionale</div>
      </div>
      <div class="model" title="Curriculum EuroPass" id="europass_curriculum">
	<div class="image" id="europass_curriculum"></div>
	<div class="caption">EuroPass</div>
      </div>
      <br/>
      <!-- <span style="font-size: 20pt">Economia aziendale</span>
      <hr class="white_left" style="margin-top: 20px; margin-bottom: 40px" />
      <div class="model" title="Fattura" id="fattura">
	<div class="image" id="fattura"></div>
	<div class="caption">Fattura</div>
      </div>
      <div class="model" title="Prima nota" id="first_note">
	<div class="image" id="first_note"></div>
	<div class="caption">Prima nota</div>
      </div>
      <div class="model" title="Libro mastro" id="master_book">
	<div class="image" id="master_book"></div>
	<div class="caption">Libro mastro</div>
      </div>
      <br/> -->
      <span style="font-size: 20pt">Altro</span>
      <hr class="white_left" style="margin-top: 20px; margin-bottom: 40px" />
      <div class="model" title="Programma scolastico" id="programma_scolastico">
	<div class="image" id="programma_scolastico"></div>
	<div class="caption">Programma scolastico</div>
      </div>
    </div>
    <div class="page">
      <textarea name="editor1" id="editor1" style="cursor: text"><?= $GENERAL_html ?></textarea>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>