<?php include "base.php"; ?>
<html>
  <head>
    <title>Pagina non trovata</title>
    <style type="text/css">
      @import url(//fonts.googleapis.com/css?family=Roboto:300);
      body{
	background-color: #F0F0F0;
	font-family: 'Roboto';
      }
      .content{
	margin: 0 auto;
	min-width: 500px;
	max-width: 800px;
	width: 40%;
	margin-top: 50px;
      }
      .depth {
	color: gray;
	font: bold 5em 'Roboto', arial, sans-serif;
	position: relative;
      }

      .depth:before, .depth:after {
	content: attr(title);
	color: rgba(0,0,0,.6);
	position: absolute;
      }

      .depth:before { top: 1px; left: 1px }
      .depth:after  { top: 2px; left: 2px }
      
      a{
	color: gray;
	text-decoration: none;
      }

      a:before, a:after {
	content: attr(title);
	color: rgba(0,0,0,.6);
	position: absolute;
      }

      a:before { top: 1px; left: 1px }
      a:after  { top: 2px; left: 2px }
      
      .persistent_Sub, .emergency, .cookie_bar{
	display: none;
      }
    </style>
  </head>
  <body>
    <div class="content">
      <?php if($_SESSION['Username'] != ''){ ?><a href="<?= $LS_MAIN_DIRECTORY ?>/" style="position: fixed; top: 20px; right: 20px; font-family: 'Roboto'; font-size: 20pt; color: <?= $USER_accent ?>; display: inline-block"><?php echo($USER_name); ?><img src="<?= $USER_image ?>" title="<?= $USER_name.' '.$USER_surname ?>" alt="<?= $USER_surname ?>" style="width: 32px; height: 32px; border-radius: 50%; margin-left: 10px" /></a><?php } ?>
      <center><span style="font-size: 180px; font-size: 12.5vw" class="depth">404</span><br>
      <span style="font-size: 30px; font-size: 2.3vw" class="depth">Pagina non trovata</span><br><br>
      <span style="font-size: 20px; font-size: 1.5vw" class="depth">Se sei stato portato qui da un link sul sito web ufficiale, contattaci a <a href="mailto:MAIL_SUPPORT_ADDRESS">MAIL_SUPPORT_ADDRESS</a>.</span></center>
    </div>
  </body>
</html>