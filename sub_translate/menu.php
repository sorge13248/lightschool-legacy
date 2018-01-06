<?php
  if($current_page == 'home'){
    $HOME_SELECTED = 'active';
  }elseif($current_page == 'start' or $current_page == 'translate'){
    $START_SELECTED = 'active';
  }
  include_once "language_$include_lang.php";
?>
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	<span class="sr-only">Show/hide menu</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
      </button>
      <a class="navbar-brand hide_control" href="<?= $MAIN_DIRECTORY ?>/home" style="display: none"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo2.png" style="width: 22px; height: 22px; float: left; margin-right: 10px" />LightSchool Translate</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
	<li class="<?= $HOME_SELECTED ?> show_control" style="display: block"><a class="navbar-brand" href="<?= $MAIN_DIRECTORY ?>/home"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo2.png" style="width: 22px; height: 22px; float: left; margin-right: 10px" />LightSchool Translate</a></li>
	<li class="<?= $HOME_SELECTED ?> hide_control" style="display: none"><a href="<?= $MAIN_DIRECTORY ?>/home">Home</a></li>
	<li class="<?= $START_SELECTED ?>"><a href="<?= $MAIN_DIRECTORY ?>/start">Translate</a></li>
	<?php if($_SESSION['Username'] != ''){ ?>
	  <?php if($_SESSION['temporary'] === true){ ?>
	    <li><a href="<?= $MAIN_DIRECTORY ?>/logout">Logout <?= $USER_name ?></a></li>
	  <?php }else{ ?>
	    <li><a href="<?= $MY_MAIN_DIRECTORY ?>"><img src="<?= $USER_image ?>" style="border-radius: 50%; height: 18px; width: 18px; margin-right: 10px" /><?= $TRAD_hello ?> <?php echo($USER_name) ?></a></li>
	  <?php } ?>
	<?php } ?>
      </ul>
    </div>
  </div>
</nav>