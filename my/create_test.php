<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<html>
  <head>
    <title>Quiz e verifiche - LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <style>
      .tab{
	width: calc(100% - 200px);
	background-color: rgba(255,255,255, <?= $USER_transparent + 0.05 ?>) !important;
      }

      .selector{
	background-color: <?= $USER_accent?>;
	color: <?= $COL1 ?>;
	padding: 0px 10px;
	height: auto;
	width: calc(100% - 20px);
	position: fixed;
	top: 50px;
	left: 0px;
	z-index: 9999;
      }
      .selector .option{
	padding: 10px 20px;
	transition: .2s ease-in-out;
	cursor: pointer;
	display: inline-block;
      }
      .selector .option:hover{
	background-color: <?= $USER_accent_darker ?>;
      }

      .quiz_content{
	width: 100%;
	max-width: 1000px;
	min-width: 500px;
	padding: 20px;
	margin: auto;
	margin-top: 50px;
	border: 1px solid black;
      }

      #descr{
	width: 100% !important;
      }
      input{
	width: 300px !important;
	margin-right: 20px !important;
      }
      input[type=checkbox], input[type=radio]{
	width: auto !important;
	margin-right: 10px !important;
      }
      
      .suggest_box{
	display: none;
	padding: 15px;
	position: fixed;
	top: 100px;
	left: 20px;
	background-color: <?= $USER_accent ?>;
	color: <?= $COL1 ?>;
	z-index: 10000;
      }
      
      .selector_content{
	border: 1px dashed transparent;
	padding: 20px;
	padding-bottom: 40px;
	transition: .2s ease-in-out;
      }
      .selector_content:hover{
	border: 1px dashed black;
      }
      
      .hidden_button{
	display: none;
	position: absolute;
	cursor: pointer;
	z-index: 999999;
      }
      
      .dialog .selector_content{
	width: 100% !important;
      }
      
      .dialog{
	z-index: 999999;
      }
      
      #single .img{
	background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>");
      }
    </style>
    <script type="text/javascript">
      $(document).ready(function(){
	var num = 0;
	var image_mode = false;
	$('.selector .option').on('click',function (){
	  if(image_mode == true){
	    var element_add_to = '#insert_question_image';
	  }else if(image_mode == false){
	    var element_add_to = '.quiz_content';
	  }
	  
	  if(num == 0){
	    $('#start').hide();
	  }else{
	    $(element_add_to).append('<hr/><br/><br/>');
	  }
	  
	  if(type_selected == 'image' && num > 0){
	  
	  }else{
	    num++;
	  }
	  var type_selected = $(this).attr('id');
	  $("html, body").animate({ scrollTop: $(document).height() }, 1000);
	  if(type_selected == 'single'){
	    $(element_add_to).append('<div class="selector_content single" id="'+num+'"><strong>'+num+')&nbsp;&nbsp;</strong><input type="text" placeholder="Testo domanda" class="answer" /><br/><br/><input type="text" placeholder="Risposta 1" class="answer" /><label><input type="radio" id="correct" name="correct" value="y" style="width: auto">Corretta</label><br/><input type="text" placeholder="Risposta 2" class="answer" /><label><input type="radio" id="correct" name="correct" value="y"  style="width: auto">Corretta</label><br/><input type="text" placeholder="Risposta 3" class="answer" /><label><input type="radio" id="correct" name="correct" value="y"  style="width: auto">Corretta</label><br/><input type="text" placeholder="Risposta 4" class="answer" /><label><input type="radio" id="correct" name="correct" value="y"  style="width: auto">Corretta</label><br/><input type="text" placeholder="Risposta 5" class="answer" /><label><input type="radio" id="correct" name="correct" value="y"  style="width: auto">Corretta</label><br/></div><br/>');
	  }else if(type_selected == 'multi'){
	    $(element_add_to).append('<div class="selector_content multi" id="'+num+'"><strong>'+num+')&nbsp;&nbsp;</strong><input type="text" placeholder="Testo domanda" class="answer" /><br/><br/><input type="text" placeholder="Risposta 1" class="answer" /><label><input type="checkbox" id="correct" name="correct" value="y" style="width: auto">Corretta</label><br/><input type="text" placeholder="Risposta 2" class="answer" /><label><input type="checkbox" id="correct" name="correct" value="y"  style="width: auto">Corretta</label><br/><input type="text" placeholder="Risposta 3" class="answer" /><label><input type="checkbox" id="correct" name="correct" value="y"  style="width: auto">Corretta</label><br/><input type="text" placeholder="Risposta 4" class="answer" /><label><input type="checkbox" id="correct" name="correct" value="y"  style="width: auto">Corretta</label><br/><input type="text" placeholder="Risposta 5" class="answer" /><label><input type="checkbox" id="correct" name="correct" value="y"  style="width: auto">Corretta</label><br/></div><br/>');
	  }else if(type_selected == 'open'){
	    $(element_add_to).append('<div class="selector_content open" id="'+num+'"><strong>'+num+')&nbsp;&nbsp;</strong><input type="text" placeholder="Testo domanda" class="answer" /><br/><br/><input type="text" placeholder="Qui gli studenti scriveranno la risposta" value="Qui gli studenti scriveranno la risposta" class="answer" disabled="disabled" /></div><br/>');
	  }else if(type_selected == 'complete'){
	    $(element_add_to).append('<div class="selector_content complete" id="'+num+'"><strong>'+num+')&nbsp;&nbsp;</strong><br/><br/><textarea style="width: calc(100% - 20px)"></textarea><p style="font-size: 10pt; margin-top: -5px">Dove andr&agrave; la parola da completare scrivere CAMPO (in maiuscolo).</p><input type="text" placeholder="Suggerimenti (facoltativo)" style="width: calc(100% - 20px) !important" /></div><br/>');
	  }else if(type_selected == 'image'){
	    $('#insert_image_frame').html('<div class="image" id="'+num+'" style="min-height: 320px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/transparent.png" style="width: 300px; width: 300px; background-color: #C4C4C4; float: left; margin-right: 15px; cursor: pointer" onclick="" id="image_'+num+'" /><div id="insert_question_image">Inserisci domande</div></div><br/><button style="position: fixed; bottom: 20px; right: 10px" onclick="add_image()">Fatto</button>');
	    image_mode = true;
	    $('#insert_image').fadeIn(200);
	    $('#dialog_overlay').fadeIn(200);
	  }
	});
	
	$('.selector .option').on('mouseover',function (){
	  var type_selected = $(this).attr('id');
	  if(type_selected == 'single'){
	    $('.suggest_box').html('Gli studenti saranno in grado di selezionare solo una risposta');
	  }else if(type_selected == 'multi'){
	    $('.suggest_box').html('Gli studenti saranno in grado di selezionare pi&ugrave; risposte');
	  }else if(type_selected == 'open'){
	    $('.suggest_box').html('Gli studenti dovranno digitare una loro risposta');
	  }else if(type_selected == 'complete'){
	    $('.suggest_box').html('Gli studenti dovranno completare un testo, con o senza suggerimenti');
	  }else if(type_selected == 'image'){
	    $('.suggest_box').html('Gli studenti guarderanno un&#39;immagine e dovranno rispondere alle domande');
	  }else if(type_selected == 'listening'){
	    $('.suggest_box').html('Gli studenti ascolteranno un audio e dovranno rispondere alle domande');
	  }
	  $('.suggest_box').show();
	});
	
	$('.selector .option').on('mouseleave',function (){
	  $('.suggest_box').hide();
	});
	
	$("#new_tab").on("mouseover",".selector_content",function(e){
	  $('.hidden_button').hide();
	  var type_selected = $(this).attr('id');
	  var offset = $(this).offset();
	  var height = $(this).height();
	  var width = $(this).width();
	  $('.hidden_button').css({'margin-left': (offset.left+width-70)+'px', 'margin-top': (offset.top+height-50)+'px'});
	  $('.hidden_button').fadeIn(200);
	});
	
	$("#new_tab").on("mouseleave",".selector_content",function(e){
	  $('.hidden_button').fadeOut(200);
	});
      });
    </script>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="suggest_box"></div>
    <div class="dialog" id="insert_image">
      <div class="title">Inserimento immagine<span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="insert_image_frame"></div>
    </div>
    <div class="hidden_button"><span onclick="alert()"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/cross.png" style="width: 24px; height: 24px; padding-right: 10px; float: left" />Elimina</span></div>
    <div class="content">
      <div class="tab_content" id="new_tab" style="display: block">
	<div class="selector">
	  <div class="option" id="single">
	    <div class="img"></div>
	    <div class="descr">Risposta singola</div>
	  </div>
	  <div class="option" id="multi">
	    <div class="img"></div>
	    <div class="descr">Risposta multipla</div>
	  </div>
	  <div class="option" id="open">
	    <div class="img"></div>
	    <div class="descr">Aperta</div>
	  </div>
	  <div class="option" id="complete">
	    <div class="img"></div>
	    <div class="descr">Completamento</div>
	  </div>
	  <div class="option" id="image">
	    <div class="img"></div>
	    <div class="descr">Grafica</div>
	  </div>
	  <div class="option" id="listening">
	    <div class="img"></div>
	    <div class="descr">Ascolto</div>
	  </div>
	</div>
	<div class="quiz_content">
	  <span id="start">Fai click su un elemento qui sopra per cominciare</span>
      </div>
      <input type="button" value="Finito" style="border: none !important; position: fixed; bottom: 70px; right: 20px" />
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>