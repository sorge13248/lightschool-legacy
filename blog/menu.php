<?php
  if($current_page == 'home'){
    $HOME_SELECTED = 'active';
  }
?>
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand hide_control" href="home" style="display: none"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo2.png" style="width: 22px; height: 22px; float: left; margin-right: 10px" />LightSchool Today</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
	<li class="<?= $HOME_SELECTED ?> show_control" style="display: block"><a class="navbar-brand" href="home"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo2.png" style="width: 22px; height: 22px; float: left; margin-right: 10px" />LightSchool Today</a></li>
	<li><a href="<?= $MAIN_DIRECTORY ?>">Sito web principale</a></li>
      </ul>
    </div>
  </div>
</nav>