<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Note legali - LightSchool</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 80px">
      <ol class="breadcrumb">
	<li><a href="<?= $MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	<li class="active">Note legali</li>
      </ol>
      <div class="page-header">
	<h1>Note legali</h1>
      </div>
      <div style="display: inline-block; margin-right: 40px; margin-top: 10px; margin-bottom: 10px">
	<p>Blogger, editori, amministratori, web masters, web designers e membri dell'area Tecnica non sono responsabili di quanto pubblicato dai lettori nei commenti relativi ad ogni singolo post.<br/>
	Lo staff si riserva la possibilit&agrave; di cancellare in ogni momento commenti ritenuti offensivi o lesivi dell'immagine o della onorabilit&agrave; di terzi.</p>
	<p>Non &egrave; tollerata alcuna forma di spam, di razzismo, di diffamazione o commenti contenenti dati personali non conformi al codice in materia di protezione dei dati personali (D.Lgs 30 giugno 2003, n. 196)  tali commenti verranno cancellati immediatamente.</p>
	<p>Alcuni testi o immagini inserite in questo sito web sono tratte da internet e pertanto ritenute di dominio pubblico: qualora la loro pubblicazione violasse eventuali diritti d'autore vogliate comunicarlo via mail a <?php echo($MAIL_SUPPORT); ?> e saranno rimossi entro 4 giorni.</p>
	<p>L'amministratore e i membri tutti dello staff non sono responsabili dei siti esterni collegati tramite link nel contenuto dei commenti.</p>
	<center><a rel="license" href="//creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Licenza Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br /><span xmlns:dct="//purl.org/dc/terms/" href="//purl.org/dc/dcmitype/InteractiveResource" property="dct:title" rel="dct:type">LightSchool</span> di <a xmlns:cc="//creativecommons.org/ns#" href="//www.lightschool.it" property="cc:attributionName" rel="cc:attributionURL">Francesco Sorge</a> &egrave; distribuito con Licenza <a rel="license" href="//creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Attribuzione - Non commerciale - Non opere derivate 4.0 Internazionale</a>.<br />Per permessi ulteriori rispetto alle finalit&agrave; previste dalla presente licenza contattare <a xmlns:cc="//creativecommons.org/ns#" href="mailto:<?php echo($MAIL_INFO); ?>" rel="cc:morePermissions"><?php echo($MAIL_INFO); ?></a>.</center><br/>
	<h2>Crediti</h2>
	<p>
	  <ul>
	    <li>Bootstrap - <a href="http://getbootstrap.com/" target="_blank">getbootstrap.com</a></li>
	    <li>Glyphicons - <a href="http://glyphicons.com/" target="_blank">glyphicons.com</a></li>
	    <li>Owl Carousel - <a href="http://owlgraphic.com/owlcarousel/" target="_blank">owlgraphic.com/owlcarousel</a></li>
	  </ul>
	</p>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>