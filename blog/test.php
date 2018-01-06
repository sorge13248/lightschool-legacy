<?php include_once "base.php"; ?>
<html>
  <head>
    <title>Pagina di test post</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container container_page">
      <div class="row">
	<div class="col-lg-8">
	  <div class="title" style="margin-bottom: 0px; font-size: 20pt">MY LightSchool disponibile in inglese!</div>
	  <hr/>
	  <span style="display: inline-block; font-size: 12pt; font-family: 'Roboto'"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Pubblicato in data AUTO_DATE</span>
	  <hr/>
	  <div class="content">
	    Era nell'aria gi&agrave; da un po' di tempo e finalmente ci siamo! MY LightSchool &egrave; stato tradotto in inglese! Per cambiare lingua, andare nelle impostazioni dell'account e cambiare la lingua o, in alternativa, dalla pagina di accesso selezionare Cambia lingua. &Egrave; possibile utilizzare anche questo link per cambiare la lingua: <a href="//my.lightschool.it/language">my.lightschool.it/language</a>.<br/>
	    Presto sar&agrave; tradotto anche il sito web principale e i post futuri sul blog potranno essere consultati in entrambe le lingue.
	  </div>
	</div>
	<div class="col-md-4">
	  <div class="well">
	    LightSchool Today &egrave; il blog ufficiale di LightSchool.<br/>
	    In questo blog vengono riportate tutte le comunicazioni ufficiali da parte del team quali: informazioni, novit&agrave;, problemi risolti e molto altro.<br/>
	    Se non sai di cosa si tratta LightSchool, ti invitiamo a leggere la breve descrizione sul <a href="<?= $MAIN_DIRECTORY ?>">sito web principale</a>.
	  </div>
	</div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>