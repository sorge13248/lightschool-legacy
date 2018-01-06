<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Sfondi - LightSchool</title>
    <?php include_once "style.php"; ?>
    <script type="text/javascript">
      $('#app a').click(function (e) {
	e.preventDefault()
	$(this).tab('show')
      });
    </script>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 80px">
      <ol class="breadcrumb">
	<li><a href="<?= $MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
	<li><a href="<?= $MAIN_DIRECTORY ?>/download"><div class="glyphicon glyphicon-download-alt" style="margin-right: 10px"></div>Centro download</a></li>
	<li class="active">Sfondi</li>
      </ol>
      <div class="page-header">
	<h1>Sfondi</h1>
      </div>
      <div style="display: inline-block; margin-right: 40px; margin-top: 10px; margin-bottom: 10px">
	<img src="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/solid/solid_1366_768.png" style="width: 200px" /><br/>
	<div class="dropdown">
	  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="margin-top: 20px">
	    Scarica<span class="caret" style="display: inline-block; margin-left: 10px"></span>
	  </button>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	    <li class="dropdown-header">Risoluzione</li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/solid/solid_800_600.png" download>800x600</a></li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/solid/solid_1024_768.png" download>1024x768</a></li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/solid/solid_1280_800.png" download>1280x800</a></li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/solid/solid_1366_768.png" download>1366x768 (HD Ready)</a></li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/solid/solid_1920_1080.png" download>1920x1080 (Full HD)</a></li>
	  </ul>
	</div>
      </div>
      <div style="display: inline-block; margin-right: 40px; margin-top: 10px; margin-bottom: 10px">
	<img src="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/gradient/gradient_1366_768.png" style="width: 200px" /><br/>
	<div class="dropdown">
	  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="margin-top: 20px">
	    Scarica<span class="caret" style="display: inline-block; margin-left: 10px"></span>
	  </button>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	    <li class="dropdown-header">Risoluzione</li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/gradient/gradient_800_600.png" download>800x600</a></li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/gradient/gradient_1024_768.png" download>1024x768</a></li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/gradient/gradient_1280_800.png" download>1280x800</a></li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/gradient/gradient_1366_768.png" download>1366x768 (HD Ready)</a></li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/gradient/gradient_1920_1080.png" download>1920x1080 (Full HD)</a></li>
	  </ul>
	</div>
      </div>
      <div style="display: inline-block; margin-right: 40px; margin-top: 10px; margin-bottom: 10px">
	<img src="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/pattern/pattern_1920_1080.png" style="width: 200px" /><br/>
	<div class="dropdown">
	  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="margin-top: 20px">
	    Scarica<span class="caret" style="display: inline-block; margin-left: 10px"></span>
	  </button>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	    <li class="dropdown-header">Risoluzione</li>
	    <!--<li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/pattern/pattern_800_600.png" download>800x600</a></li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/pattern/pattern_1024_768.png" download>1024x768</a></li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/pattern/pattern_1280_800.png" download>1280x800</a></li>
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/pattern/pattern_1366_768.png" download>1366x768 (HD Ready)</a></li>-->
	    <li><a href="<?= $IMAGES_MAIN_DIRECTORY ?>/wallpaper/pattern/pattern_1920_1080.png" download>1920x1080 (Full HD)</a></li>
	  </ul>
	</div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>