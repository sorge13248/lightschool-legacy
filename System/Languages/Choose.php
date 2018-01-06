<?php
  if($_GET['lang'] != ''){
    $this_url = basename($_SERVER['PHP_SELF']);
    $this_url = str_replace(".php", "", $this_url);
    if($this_url == 'language'){
      $this_url = 'home';
    }
    setcookie('language', $_GET['lang'], time() + (86400 * 360), "/", ".francescosorge.com");
    header("location: $this_url");
    exit();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>LightSchool International</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <style type="text/css">
      html{
	background-color: #F6F6F6;
	background-image: url("<?= $IMAGES_DIRECTORY ?>/world_map.png");
	background-repeat: no-repeat;
	background-size: cover;
	font-family: 'Arial';
      }
      body{
	position: relative;
	height: calc(100% + 20px);
	width: 100%;
	margin: 0 auto;
	overflow: auto;
      }
      .language_card{
	background-color: rgba(0,0,0,0.7);
	color: white;
	width: calc(100% - 80px);
	min-height: 100%;
	margin: -10px 0px;
	padding-top: 20px;
	padding-left: 40px;
	padding-right: 40px;
	padding-bottom: 40px;
	border-radius: 0px;
      }
      h1 > img{
	display: none;
      }
      @media only all and (min-width:800px) and (min-height:600px) {
	.language_card{
	  background-color: rgba(0,0,0,0.7);
	  color: white;
	  width: calc(100% - 80px);
	  height: auto;
	  min-height: 400px;
	  /*transform: translate(-50%, -48%);*/
	  /*position: absolute;*/
	  /*top: 50%;*/
	  /*left: 50%;*/
	  padding-top: 20px;
	  padding-left: 40px;
	  padding-right: 40px;
	  padding-bottom: 40px;
	  border-radius: 20px;
	  max-width: 700px;
    margin: 0 auto;
    margin-top: 40px;
	}
	h1 > img{
	  display: block;
	  float: right;
	  margin-right: -20px;
	  margin-top: -20px;
	}
      }
      .language_card > a > img{
	float: left;
	width: 55px;
	height: 35px;
	margin-right: 10px;
      }
      .language_card > a{
	color: white;
	text-decoration: none;
	display: inline-block;
	margin-right: 10px;
	margin-bottom: 10px;
	padding: 15px 20px;
	min-width: 180px;
	transition: .1s ease-in-out;
	font-size: 12pt;
      }
      .language_card > a:hover{
	background-color: rgba(0,0,0,0.5);
      }
      .language_card > a > .sub{
	font-size: 10pt;
      }
      a{
	color: white;
      }
    </style>
  </head>
  <body>
    <div class="language_card">
      <h1>Select a language<img src="<?= $IMAGES_DIRECTORY ?>/logo.png" style="width: 64px; height: 64px" /></h1><br/>
      <a href="?lang=en-EN"><img src="<?= $IMAGES_DIRECTORY ?>/flag/en-EN.png" />English<br/><span class="sub">International</span></a>
      <a href="?lang=es-ES"><img src="<?= $IMAGES_DIRECTORY ?>/flag/es-ES.png" />Espa&ntilde;ol<br/><span class="sub">Espa&ntilde;a</span></a>
      <a href="?lang=it-IT"><img src="<?= $IMAGES_DIRECTORY ?>/flag/it-IT.png" />Italiano<br/><span class="sub">Italia</span></a>
      <br/><br/>
      <h1>Coming soon...</h1>
      <a href="#"><img src="<?= $IMAGES_DIRECTORY ?>/flag/fr-FR.png" />Fran&ccedil;ais<br/><span class="sub">France</span></a>
      <a href="#"><img src="<?= $IMAGES_DIRECTORY ?>/flag/de-DE.png" />Deutsch<br/><span class="sub">Deutschland</span></a>
      <a href="#"><img src="<?= $IMAGES_DIRECTORY ?>/flag/ro-RO.png" />Rom&acirc;n<br/><span class="sub">Rom&acirc;nia</span></a>
      <br/><br/>
      <center>This site uses cookies. <a href="<?= $MAIN_DIRECTORY ?>/golink?fwd_link=12">Read more &gt;</a></center>
    </div>
  </body>
</html> 