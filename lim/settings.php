<?php
include "base.php";
if($_SESSION['UsernameLIM'] != ''){
?>
<html>
<head>
	<title>Impostazioni LIM</title>
	<style type="text/css">
	html{
	  background-color: #383838;
	  color: white;
	  font-family: arial;
	}
	body{
	  background-color: white;
	  color: black;
	  margin: 0 auto;
	  width: 793px;
	  -webkit-box-shadow: 0px 0px 22px rgba(255,255,255, 0.9);
	  -moz-box-shadow:    0px 0px 22px rgba(255,255,255, 0.9);
	  box-shadow:         0px 0px 22px rgba(255,255,255, 0.9);
	}
	</style>
	<?php echo('
<style type="text/css">
	.topbar {
		width: 773px;
		padding-left: 10px;
		padding-right: 10px;
		background: '. $USER_accentLIM.';
		opacity: 0.9;
		z-index: 998;
	}
	.topelement {
		padding-left: 15px;
		padding-top: 10px;
		padding-right: 15px;
		padding-bottom: 9px;
		color: '.$color_linkLIM.';
		text-decoration: none;
		font-size: 16pt;
		-webkit-transition: .2s ease-in-out;
		-moz-transition: .2s ease-in-out;
		-o-transition: .2s ease-in-out;
		transition: .2s ease-in-out;
		line-height:2em;
		margin-left: 5px;
	}
	.topelement:hover {
		color: white;
		background: '.$darkerLIM.';
	}
	input {
		padding: 5px;
		font-size: 15px;
		outline: none;
		border: 1px solid #ccc;
		-webkit-transition: .3s ease-in-out;
		-moz-transition: .3s ease-in-out;
		-o-transition: .2s ease-in-out;
		transition: .2s ease-in-out;
	}
	input:-webkit-autofill {
		-webkit-box-shadow: 0 0 0px 1000px white inset;
	}
	input:hover {
		border: 1px solid '.$USER_accentLIM.';
	}
	input:focus {
		border: 1px solid '.$USER_accentLIM.';
		-webkit-box-shadow: 0px 0px 10px '.$USER_accentLIM.';
		-moz-box-shadow: 0px 0px 10px '.$USER_accentLIM.';
		box-shadow: 0px 0px 10px '.$USER_accentLIM.';
	}
	input[type=submit] {
		background-color: '.$USER_accentLIM.';
		padding: 5px;
		font-size: 15px;
		outline: none;
		border: 1px solid gray;
		-webkit-transition: .3s ease-in-out;
		-moz-transition: .3s ease-in-out;
		color: #ffffff;
		border-radius: 0px;
	}
	input[type=submit]:hover {
		border: 1px solid #222;
	}
	input[type=submit]:focus {
		border: 1px solid '.$USER_accentLIM.';
		-webkit-box-shadow: 0px 0px 10px '.$USER_accentLIM.';
		-moz-box-shadow: 0px 0px 10px '.$USER_accentLIM.';
		box-shadow: 0px 0px 10px '.$USER_accentLIM.';
	}
	select {
	      padding: 5px;
	      font-size: 15px;
	      outline: none;
	      border: 1px solid #ccc;
	      -webkit-transition: .3s ease-in-out;
	      -moz-transition: .3s ease-in-out;
	      background-color: white;
	      overflow: hidden;
	}
	select:hover {
		border: 1px solid '.$USER_accentLIM.';
	}
	select:focus {
		border: 1px solid '.$USER_accentLIM.';
		-webkit-box-shadow: 0px 0px 10px '.$USER_accentLIM.';
		-moz-box-shadow: 0px 0px 10px '.$USER_accentLIM.';
		box-shadow: 0px 0px 10px '.$USER_accentLIM.';
	}
	@font-face{
		font-family: open-sans-light;
		src: url(font/open-sans-light.ttf);
	}
	a{
		color: '.$USER_accentLIM.';
		text-decoration: none;
	}
	</style>
'); ?>
<script src="accent.js"></script>
</head>
<body>
    <div class="topbar" id="topbar">
	<a href="index.php" class="topelement" title="Pagina iniziale"><img src="/images/icons/<?= $theme_setLIM ?>/home.png" style="width: 16px; height: 16px; margin-right: 10px"><?php echo($USER_nameLIM); ?></a>
	<a href="history.php" class="topelement" title="Cronologia connessioni"><img src="/images/icons/<?= $theme_setLIM ?>/orario.png" style="width: 16px; height: 16px; margin-right: 10px">Cronologia connessioni</a>
	<a href="settings.php" class="topelement" title="Impostazioni" style="background-color: <?= $darkerLIM ?>"><img src="/images/icons/<?= $theme_setLIM ?>/settings.png" style="width: 16px; height: 16px"></a>
	<a href="logout.php" class="topelement" title="Disconnetti"><img src="/images/icons/<?= $theme_setLIM ?>/logout.png" style="width: 16px; height: 16px;"></a>
    </div>
    <div id="content" style="z-index: 999">
	<div id="read" style="padding: 40px">
		<span style="font-family: open-sans-light; font-size: 26pt">Impostazioni LIM</span><br/>
		Modifica nome e colore<br/><br/>
		<form method="post" action="formpost.php?type=settings">
			<label for="name"><b>NOME LIM</b></label><br/>
			<input type="text" id="name" name="name" placeholder="Nome LIM" value="<?= $USER_nameLIM ?>" style="margin-left: 0px"><br/><br/>
			<label for="name"><b>COLORE PREFERITO</b></label><br/>
			<input type="text" id="accent" name="accent" placeholder="Colore preferito" value="<?= $USER_accentLIM ?>" class="setting_input; color" onchange="checkFilled();" autocomplete="off" required /><br/><br/>
			<input type="submit" value="Salva" style="width: 100px"><br/><br/>
			<span style="font-family: open-sans-light; font-size: 26pt">Informazioni</span><br/>
			<b>LightSchool LIM</b><br/>
			Versione 0.1<br/><br/>
			<b>Nome:</b>&nbsp;<?php echo($USER_nameLIM); ?><br/>
			<b>Codice LIM:</b>&nbsp;<?php echo($UsernameLIM); ?><br/>
			<b>Scuola:</b>&nbsp;<?php echo($USER_schoolLIM); ?><br/>
			<b>Provincia:</b>&nbsp;<?php echo($USER_provinciaLIM); ?><br/>
			<b>Telefono:</b>&nbsp;<a href="tel:<?= $USER_phoneLIM ?>"><?php echo($USER_phoneLIM); ?></a><br/>
		</form>
	</div>
    </div>
    <div id="info" style="position: fixed; bottom: 20px; left: 20px; color: white; font-size: 11pt">
	<span class="versione_name" style="text-shadow: 0px 0px 22px rgba(150, 150, 150, 1);"><strong>LightSchool LIM</strong><br/>
	Versione 0.1<br/>
	Codice LIM: <?php echo($UsernameLIM); ?></span>
    </div>
</body>
</html>
<?php }elseif($_SESSION['UsernameLIM'] == '')
header("location: index.php");
?>