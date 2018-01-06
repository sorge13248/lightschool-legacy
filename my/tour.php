<?php include_once "base.php";
if($_SESSION['Username'] != ''){
  if($USER_first_login == 'y'){
    $_GET['type'] = 'remove_first_login';
    include_once "formpost.php";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Benvenuto su LightSchool</title>
    <script src="//code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <style type="text/css">
      @import url(//fonts.googleapis.com/css?family=Roboto:300);
      *{
	color: white;
	font-family: 'Roboto', arial, tahoma, sans-serif;
	font-weight: normal;
      }
      html, body{
	margin: none;
	padding: none;
	background-color: #0174DF;
	/* cursor: none; */
	width: calc(100% - 5px);
	height: 100%;
	overflow: hidden;
      }
      
      h1{
	position: absolute;
	top: 50%;
	left: 50%;
	margin-top: -50px;
	margin-left: -7vh;
	width: 100px;
	height: 100px;
	font-size: 40pt;
      }
      
      p{
	position: absolute;
	top: 50%;
	left: 50%;
	margin-top: 20px;
	width: auto;
	height: 100px;
	font-size: 20pt;
	text-align: center;
      }
      
      .emergency, .slide, .cookie_bar, .background_agent{
	display: none
      }
      
      .bkg{
	position: fixed;
	top: 0px;
	left: 0px;
	height: 100%;
	width: 100%;
	display: none;
      }
      
      #bkg_files{
	background-image: url('<?= $MY_MAIN_DIRECTORY ?>/tour_image/file.png');
      }
      #bkg_diary{
	background-image: url('<?= $MY_MAIN_DIRECTORY ?>/tour_image/diary.png');
      }
      #bkg_timetable{
	background-image: url('<?= $MY_MAIN_DIRECTORY ?>/tour_image/timetable.png');
      }
      #bkg_settings{
	background-image: url('<?= $MY_MAIN_DIRECTORY ?>/tour_image/settings.png');
      }
      
      #bkg_more{
	background-image: url('<?= $MY_MAIN_DIRECTORY ?>/tour_image/more.png');
	background-repeat: no-repeat;
	background-position: center; 
	background-attachment: fixed;
	background-size: 600px 398px;
      }
    </style>
    <?php
      $string_length = strlen($USER_name);
      
      if($string_length > 20){
	$style_length = '340';
      }elseif($string_length > 15){
	$style_length = '280';
      }elseif($string_length > 10){
	$style_length = '250';
      }elseif($string_length > 5){
	$style_length = '220';
      }else{
	$style_length = '150';
      }
    ?>
    <script type="text/javascript">
      $(document).ready(function (){
	$('#1').delay(500).fadeIn(400);
	$('#1').delay(1000).fadeOut(400, function(){
	  $('#2').fadeIn(400);
	  $('#2').delay(2300).fadeOut(400, function(){
	    $('#3').fadeIn(400);
	    $('#bkg_files').fadeIn(400);
	    $('#bkg_files').delay(4000).fadeOut(400);
	    $('#3').delay(4000).fadeOut(400, function(){
	      $('#4').fadeIn(400);
	      $('html, body').css('background-color', '#2E8DE4');
	      $('#bkg_diary').fadeIn(400);
	      $('#bkg_diary').delay(4000).fadeOut(400);
	      $('#4').delay(4000).fadeOut(400, function(){
		$('#5').fadeIn(400);
		$('#bkg_timetable').fadeIn(400);
		$('#bkg_timetable').delay(4000).fadeOut(400);
		$('#5').delay(4000).fadeOut(400, function(){
		  $('#6').fadeIn(400);
		  $('#bkg_settings').fadeIn(400);
		  $('#bkg_settings').delay(4000).fadeOut(400);
		  $('#6').delay(4000).fadeOut(400, function(){
		    $('#7').fadeIn(400);
		    $('#bkg_more').fadeIn(400);
		    setTimeout(function() { location.href = '<?= $MY_MAIN_DIRECTORY ?>/desktop' },5000);
		  });
		});
	      });
	    });
	  });
	});
      });
    </script>
  </head>
  <body>
    <div class="bkg" id="bkg_files">
    </div>
    <div class="bkg" id="bkg_diary">
    </div>
    <div class="bkg" id="bkg_timetable">
    </div>
    <div class="bkg" id="bkg_settings">
    </div>
    <div class="bkg" id="bkg_more">
    </div>
    
    <div id="1" class="slide">
      <h1 style="width: auto; margin-left: -<?php echo($style_length) ?>px">Ciao <?php echo($USER_name); ?>!</h1>
      <p style="margin-left: -180px">Benvenuto su LightSchool!</p>
    </div>
    <div id="2" class="slide">
      <h1>Tour</h1>
      <p style="margin-left: -300px">Ora ti insegneremo il funzionamento basilare del sito</p>
    </div>
    <div id="3" class="slide">
      <h1>File</h1>
      <p style="margin-left: -300px">Qui vengono raggruppati tutti i file e quaderni,<br/> puoi creare nuovi quaderni e caricare nuovi file</p>
    </div>
    <div id="4" class="slide">
      <h1>Diario</h1>
      <p style="margin-left: -300px">Qui puoi segnare tutti i compiti, verifiche e interrogazioni<br/>
      esattamente come faresti con un diario cartaceo</p>
    </div>
    <div id="5" class="slide">
      <h1>Orario</h1>
      <p style="margin-left: -300px">Assegna a ogni materia un colore e compila l'orario delle<br/>
      lezioni settimanali</p>
    </div>
    <div id="6" class="slide">
      <h1 style="margin-left: -250px">Personalizzazione</h1>
      <p style="margin-left: -350px">Moltissime impostazioni per personalizzare al meglio la<br/>
      propria esperienza utente e il modo d'interagire con il sito</p>
    </div>
    <div id="7" class="slide">
      <h1 style="width: auto; margin-left: -150px">... e molto altro!</h1>
      <p style="margin-left: -200px">Compatibilit&agrave; con qualsiasi dispositivo e<br/>
      browser, privo di pubblicit&agrave; e gratis.<br/>
      Se hai bisogno di aiuto, consulta la <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>">guida</a></p>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>