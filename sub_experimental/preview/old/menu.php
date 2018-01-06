<?php
  if($actually_page == 'home'){
    $SELECTEDHOME = 'class="active"';
  }elseif($actually_page == 'features'){
    $SELECTEDFEATURES = 'class="active"';
  }
  
  if($_COOKIE['language'] == ''){
    $cookie_language = 'it-IT';
  }else{
    $cookie_language = 'it-IT';
  }
?>
<div id="cssmenu">
  <ul>
    <li <?= $SELECTEDHOME ?>><a href="<?= $HOME_DIRECTORY ?>/home">Home</a></li>
    <li <?= $SELECTEDFEATURES ?>><a href="<?= $HOME_DIRECTORY ?>/features"><?php echo($TRAD_menu_student_and_teacher); ?></a></li>
    <li><a href="<?= $HOME_DIRECTORY ?>/school"><?php echo($TRAD_menu_school); ?></a></li>
    <li><a href="<?= $HOME_DIRECTORY ?>/publisher"><?php echo($TRAD_menu_publisher); ?></a></li>
    <li><a href="<?= $HOME_DIRECTORY ?>/support"><?php echo($TRAD_menu_support); ?></a></li>
    <li><a href="<?= $HOME_DIRECTORY ?>/app">App</a></li>
    <li><a href="//blog.lightschool.it/">Blog</a></li>
    <li onclick="register()"><span><?php echo($TRAD_menu_register); ?></span></li>
    <li onclick="login()"><span><?php echo($TRAD_menu_login); ?></span></li>
    <li class="has-sub language" style="float: right; display: inline-block; margin-top: - 20px"><span><img src="<?= $IMAGES_MAIN_DIRECTORY.'/'.$cookie_language.'.png' ?>" class="cssmenuimg" /><?php echo(substr($cookie_language,0,2)); ?></span>
      <ul>
	<li><a href="switch_language?lang=it-IT&redirect=<?= $actually_page ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY.'/it-IT.png' ?>" class="cssmenuimg" />Italiano - Italia</a></li>
	<li><a href="switch_language?lang=en-US&redirect=<?= $actually_page ?>"><img src="<?= $IMAGES_MAIN_DIRECTORY.'/en-US.png' ?>" class="cssmenuimg" />English - United States</a></li>
      </ul>
    </li>
  </ul>
</div>
<div class="footer">
  <p><?php echo($TRAD_footer); ?></p>
</div>