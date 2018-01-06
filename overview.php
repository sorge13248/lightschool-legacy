<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Presentazione - LightSchool</title>
    <?php include_once "style.php"; ?>
    <script type="text/javascript">
      $('#tabs a').click(function (e) {
	e.preventDefault()
	$(this).tab('show')
      });
    </script>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="image_bkg" style="width: 100%; color: white; text-align: center; height: 300px; padding-top: 80px; background-image: url('<?= $IMAGES_MAIN_DIRECTORY ?>/presentation/desktop2.png');">
      
    </div>
    <div class="container tab_no_border" style="padding-top: 30px">
      <center>
	<ul role="tablist" class="nav nav-tabs" id="tabs">
	  <li class="active" role="presentation"><a aria-expanded="true" aria-controls="notebook_overview" data-toggle="tab" role="tab" id="notebook_overview-tab" href="#notebook_overview"><div class="glyphicon glyphicon-pencil"></div>L'editor</a></li>
	  <li role="presentation" class=""><a aria-controls="models" data-toggle="tab" id="models-tab" role="tab" href="#models" aria-expanded="false"><div class="glyphicon glyphicon-th-large"></div>I modelli</a></li>
	</ul>
	<div class="tab-content" id="myTabContent">
	  <div aria-labelledby="notebook_overview-tab" id="notebook_overview" class="tab-pane fade active in" role="tabpanel">
	    <h2>Prendere appunti non &egrave; mai stato cos&igrave; facile</h2>
	    <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/presentation/writer.png" rel="image_src" style="width: 100%; margin-top: -20px" />
	  </div>
	  <div aria-labelledby="models-tab" id="models" class="tab-pane fade in" role="tabpanel">
	    <h2>Tanti modelli pronti all'uso</h2>
	    <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/presentation/templates.png" style="width: 100%; margin-top: -20px" />
	  </div>
	</div>
	<hr style="padding-bottom: 30px"/>
	<ul role="tablist" class="nav nav-tabs" id="tabs">
	  <li class="active" role="presentation"><a aria-expanded="true" aria-controls="diary_overview" data-toggle="tab" role="tab" id="diary_overview-tab" href="#diary_overview"><div class="glyphicon glyphicon-calendar"></div>L'organizzazione</a></li>
	  <li role="presentation" class=""><a aria-controls="new_event" data-toggle="tab" id="new_event-tab" role="tab" href="#new_event" aria-expanded="false"><div class="glyphicon glyphicon-plus"></div>Creazione evento</a></li>
	</ul>
	<div class="tab-content" id="myTabContent">
	  <div aria-labelledby="diary_overview-tab" id="diary_overview" class="tab-pane fade active in" role="tabpanel">
	    <h2>Organizza al meglio le tue attivit&agrave;</h2>
	    <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/presentation/diary.png" style="width: 100%; margin-top: -20px" />
	  </div>
	  <div aria-labelledby="new_event-tab" id="new_event" class="tab-pane fade in" role="tabpanel">
	    <h2>Creazione intelligente</h2>
	    <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/presentation/new_event.png" style="width: 100%; margin-top: -20px" />
	  </div>
	</div>
	<hr style="padding-bottom: 30px"/>
	<h2>Gestisci le tue lezioni settimanali</h2>
	<img src="<?= $IMAGES_MAIN_DIRECTORY ?>/presentation/timetable.png" style="width: 100%; margin-top: -20px" />
	<hr style="padding-bottom: 30px"/>
	<h2>La tua classe: voti, lezioni, compiti, scrutini, note <small>e molto altro...</small></h2>
	<img src="<?= $IMAGES_MAIN_DIRECTORY ?>/presentation/register.png" style="width: 100%; margin-top: -20px" />
	<hr style="padding-bottom: 30px"/>
	<ul role="tablist" class="nav nav-tabs" id="tabs">
	  <li class="active" role="presentation"><a aria-expanded="true" aria-controls="before" data-toggle="tab" role="tab" id="before-tab" href="#before"><div class="glyphicon glyphicon-chevron-left"></div>Prima</a></li>
	  <li role="presentation" class=""><a aria-controls="after" data-toggle="tab" id="after-tab" role="tab" href="#after" aria-expanded="false"><div class="glyphicon glyphicon-chevron-right"></div>Dopo</a></li>
	</ul>
	<div class="tab-content" id="myTabContent">
	  <div aria-labelledby="before-tab" id="before" class="tab-pane fade active in" role="tabpanel">
	    <h2>Personalizza qualsiasi aspetto del sito</h2>
	    <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/presentation/settings.png" style="width: 100%; margin-top: -20px" />
	  </div>
	  <div aria-labelledby="after-tab" id="after" class="tab-pane fade in" role="tabpanel">
	    <h2>Cambia le icone, i colori, lo sfondo <small>e molto altro...</small></h2>
	    <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/presentation/settings_after.png" style="width: 100%; margin-top: -20px" />
	  </div>
	</div>
	<hr style="padding-bottom: 30px"/>
	<h3>E ora?</h3>
	<p>Questa era una presentazione panoramica delle funzioni del sito web. Per vedere l'elenco completo delle funzioni e le loro descrizioni, vai a <a href="<?= $MAIN_DIRECTORY ?>/features">Funzioni</a>.</p>
	<div class="col-md-6" style="text-align: right">
	  <p>Nuovo utente?</p>
	  <p><a data-toggle="modal" data-target="#register_type" href="javascript:void(0)" class="btn btn-primary">Registrarti</a></p>
	</div>
	<div class="col-md-6" style="text-align: left; padding: 0px 40px">
	  <p>Oppure ci conosciamo gi&agrave;?</p>
	  <p><a href="<?= $MY_MAIN_DIRECTORY ?>/" class="btn btn-primary" style="margin-left: 50px">Accedi</a></p>
	</div>
      </div>
      </center>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>