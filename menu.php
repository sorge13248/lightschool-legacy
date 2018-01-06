<?php
  if($current_page == 'home'){
    $HOME_SELECTED = 'active';
  }elseif($current_page == 'overview'){
    $PRESENTATION_SELECTED = 'active';
  }elseif($current_page == 'features'){
    $FEATURES_SELECTED = 'active';
  }elseif($current_page == 'download' or $current_page == 'wallpaper' or $current_page == 'app' or $current_page == 'forms'){
    $DOWNLOAD_SELECTED = 'active';
  }elseif($current_page == 'register'){
    $ACCOUNT_SELECTED = 'active';
  }
?>
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	<span class="sr-only">Mostra/nascondi menu</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
      </button>
      <a class="navbar-brand hide_control" href="<?= $MAIN_DIRECTORY ?>/home" style="display: none"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo2.png" style="width: 22px; height: 22px; float: left; margin-right: 10px" />LightSchool</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
	<li class="<?= $HOME_SELECTED ?> show_control" style="display: block"><a class="navbar-brand" href="<?= $MAIN_DIRECTORY ?>/home"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo2.png" style="width: 22px; height: 22px; float: left; margin-right: 10px" />LightSchool</a></li>
	<li class="<?= $HOME_SELECTED ?> hide_control" style="display: none"><a href="<?= $MAIN_DIRECTORY ?>/home">Home</a></li>
	<!-- <li><a href="#about">Studenti e docenti</a></li>
	<li><a href="#contact">Scuole</a></li>
	<li><a href="#contact">Editori</a></li> -->
	<li class="<?= $PRESENTATION_SELECTED ?>"><a href="<?= $MAIN_DIRECTORY ?>/overview">Panoramica</a></li>
	<li class="<?= $FEATURES_SELECTED ?>"><a href="<?= $MAIN_DIRECTORY ?>/features">Funzioni</a></li>
	<li class="<?= $DOWNLOAD_SELECTED ?>"><a href="<?= $MAIN_DIRECTORY ?>/download">Download</a></li>
	<li><a href="<?= $SUPPORT_DIRECTORY ?>">Supporto</a></li>
	<li><a href="<?= $BLOG_DIRECTORY ?>">Blog</a></li>
	<?php if($_SESSION['Username'] != ''){ ?>
	  <li class="hide_control" style="display: none"><a href="<?= $MY_MAIN_DIRECTORY ?>"><img src="<?= $USER_image ?>" style="border-radius: 50%; height: 18px; width: 18px; margin-right: 10px" />Ciao <?php echo($USER_name) ?></a></li>
	  <li class="hide_control" style="display: none"><a href="<?= $MY_MAIN_DIRECTORY ?>/">Il mio account</a></li>
	  <li class="hide_control" style="display: none"><a href="<?= $MY_MAIN_DIRECTORY ?>/settings">Impostazioni</a></li>
	  <li class="hide_control" style="display: none"><a href="<?= $MY_MAIN_DIRECTORY ?>/logout">Esci</a></li>
	  <li class="dropdown show_control <?= $ACCOUNT_SELECTED ?>" style="display: block"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= $USER_image ?>" style="border-radius: 50%; height: 18px; width: 18px; margin-right: 10px" />Ciao <?php echo($USER_name) ?> <b class="caret"></b></a>
	    <ul class="dropdown-menu dropdown-menu-right" style="width: 300px">
	      <div style="padding: 10px; margin-bottom: 0px">
		<img src="<?= $USER_image ?>" style="border-radius: 50%; height: 32px; width: 32px; margin-right: 10px; float: left; margin-top: 7px" /><span style="font-family: 'Roboto'; font-size: 14pt"><?php echo("$USER_name $USER_surname"); ?></span><br/>
		<a href="<?= $MY_MAIN_DIRECTORY ?>/">Il mio account</a>
	      </div>
	      <li><a href="<?= $MY_MAIN_DIRECTORY ?>/settings">Impostazioni</a></li>
	      <li><a href="<?= $SUPPORT_DIRECTORY ?>">Supporto tecnico</a></li>
	      <li role="separator" class="divider"></li>
	      <li><a href="<?= $MY_MAIN_DIRECTORY ?>/logout">Esci</a></li>
	    </ul>
	  </li>
	<?php }else{ ?>
	  <li class="hide_control" style="display: none"><a href="<?= $MY_MAIN_DIRECTORY ?>">Accedi</a></li>
	  <li class="hide_control" style="display: none"><a href="<?= $MY_MAIN_DIRECTORY ?>/recover">Password dimenticata</a></li>
	  <li class="hide_control <?= $ACCOUNT_SELECTED ?>" style="display: none" data-toggle="modal" data-target="#register_type"><a href="javascript:void(0)">Nuovo utente</a></li>
	  <li class="dropdown show_control <?= $ACCOUNT_SELECTED ?>" style="display: block"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
	    <ul class="dropdown-menu dropdown-menu-right" style="text-align: right">
	      <!--<li> set element width: 624px
		  <li class="dropdown-submenu" style="padding-right: 20px; text-align: center">
		    <form class="navbar-form navbar-right" method="post" action="<?= $MY_MAIN_DIRECTORY ?>">
		      <b>Accedi</b><div class="form-group" style="margin-left: 10px">
			<input type="text" name="EmailAddress" placeholder="Indirizzo e-mail" class="form-control">
		      </div>
		      <div class="form-group">
			<input type="password" name="Password" placeholder="Password" class="form-control">
		      </div>
		      <button type="submit" class="btn btn-success">Accedi</button>
		    </form>
		    
		  </li>
	      </li>-->
	      <li><a href="<?= $MY_MAIN_DIRECTORY ?>/">Accedi</a></li>
	      <li><a href="<?= $MY_MAIN_DIRECTORY ?>/recover">Password dimenticata</a></li>
	      <li data-toggle="modal" data-target="#register_type" class="<?= $ACCOUNT_SELECTED ?>"><a href="javascript:void(0)">Nuovo utente</a></li>
	    </ul>
	  </li>
	<?php } ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="register_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrazione</h4>
      </div>
      <div class="modal-body" style="text-align: center">
	<p>Prima di passare al modulo online per la registrazione dobbiamo sapere chi sei</p>
        <div style="width: 400px; margin: 0 auto; margin-top: 40px; margin-bottom: 20px">
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/register" style="text-align: center; display: inline-block; margin-right: 100px"><div class="glyphicon glyphicon-user" style="font-size: 64px;"></div><br/>Studente</a>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/register" style="text-align: center; display: inline-block"><div class="glyphicon glyphicon-education" style="font-size: 64px;"></div><br/>Docente</a><br/>
	  <a href="<?= $MAIN_DIRECTORY ?>/register/schools" style="text-align: center; display: inline-block; margin-right: 100px; margin-top: 40px"><div class="glyphicon glyphicon-blackboard" style="font-size: 64px;"></div><br/>Scuola</a><a href="<?= $MAIN_DIRECTORY ?>/register/publishers" style="text-align: center; display: inline-block"><div class="glyphicon glyphicon-book" style="font-size: 64px;"></div><br/>Editore</a><br/>
	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>