<?php
  if($current_page == 'home'){
    $HOME_SELECTED = 'active';
  }elseif($current_page == 'history'){
    $HISTORY_SELECTED = 'active';
  }elseif($current_page == 'settings'){
    $SETTINGS_SELECTED = 'active';
  }
?>
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="min-width: 10px">
	<span class="sr-only">Mostra/nascondi menu</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
      </button>
      <a class="navbar-brand hide_control" href="<?= $LIM_MAIN_DIRECTORY ?>/home" style="display: none"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo2.png" style="width: 22px; height: 22px; float: left; margin-right: 10px" />LIM</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
	<li class="<?= $HOME_SELECTED ?> show_control" style="display: block"><a class="navbar-brand" href="<?= $LIM_MAIN_DIRECTORY ?>/home"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo2.png" style="width: 22px; height: 22px; float: left; margin-right: 10px" /><?php echo($USER_nameLIM); ?></a></li>
	<li class="<?= $HOME_SELECTED ?> hide_control" style="display: none"><a href="<?= $LIM_MAIN_DIRECTORY ?>/home">Home</a></li>
	<!-- <li><a href="#about">Studenti e docenti</a></li>
	<li><a href="#contact">Scuole</a></li>
	<li><a href="#contact">Editori</a></li> -->
	<li class="<?= $HISTORY_SELECTED ?>"><a href="<?= $LIM_MAIN_DIRECTORY ?>/history">Cronologia</a></li>
	<li class="<?= $SETTINGS_SELECTED ?>"><a href="<?= $LIM_MAIN_DIRECTORY ?>/settings">Impostazioni LIM</a></li>
	<li title="Disconnetti"><a href="<?= $LIM_MAIN_DIRECTORY ?>/logout"><div class="glyphicon glyphicon-log-out" style="margin-right: 0px"></div></a></li>
      </ul>
      <span style="float: right; color: white; display: inline-block; padding-top: 15px">Codice LIM: <?php echo($UsernameLIM); ?></span>
    </div>
  </div>
</nav>