<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title><?= $TMAIN_app ?> - LightSchool</title>
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
	<li><a href="<?= $MAIN_DIRECTORY ?>/download"><div class="glyphicon glyphicon-download-alt" style="margin-right: 10px"></div><?= $TMAIN_download_centre ?></a></li>
	<li class="active"><?= $TMAIN_app ?></li>
      </ol>
      <div class="page-header">
	<h1><?= $TMAIN_app ?> <small>Android / Windows 10 / Windows</small></h1>
      </div>
      <?= $TMAIN_select_platform ?><br/><br/>
      <ul role="tablist" class="nav nav-tabs" id="user_type">
	<li class="active" role="presentation"><a aria-expanded="true" aria-controls="android" data-toggle="tab" role="tab" id="android-tab" href="#android">Android</a></li>
	<li role="presentation" class=""><a aria-controls="windows10" data-toggle="tab" id="windows10-tab" role="tab" href="#windows10" aria-expanded="false">Windows 10</a></li>
	<li role="presentation" class=""><a aria-controls="windows" data-toggle="tab" id="windows-tab" role="tab" href="#windows" aria-expanded="false">Windows</a></li>
      </ul>
      <div class="tab-content" id="myTabContent">
	<div aria-labelledby="android-tab" id="android" class="tab-pane fade active in" role="tabpanel">
	  <div class="row">
	    <div class="col-xs-6 col-md-2 text-center">
	      <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/app/android/screen.jpg" style="width: 100%; margin-right: 10px" />
	    </div>
	    <div class="col-xs-12 col-sm-6 col-md-10" style="text-align: left; padding: 0px 40px">
	      <h1><?= $TMAIN_android_title ?> <small><span class='label label-default'><?= $TMAIN_experimental ?></span></small></h1>
	      <p><?= $TMAIN_android_descr1 ?><br/>
	      <small style='font-size: 8pt'><?= $TMAIN_android_descr2 ?></small></p>
	      <?php
		if(strstr($_SERVER['HTTP_USER_AGENT'], 'Android')){
		  preg_match('/Android (\d+(?:\.\d+)+)[;)]/', $_SERVER['HTTP_USER_AGENT'], $matches);
		  
		  $new_array = array($matches[1]);
		  $new_array = implode($new_array, " ");
		  ?>
		    <?= $TMAIN_android_now ?> <?php echo($new_array); ?>.<br/><br/>
		  <?php
		  if($new_array >= 4.0){
		    ?>
		      <div class="alert alert-success" role="alert"><b><?= $TMAIN_congrats ?></b> <?= $TMAIN_android_success ?></div>
		    <?php
		  }else{
		    ?>
		      <div class="alert alert-danger" role="alert"><b><?= $TMAIN_sorry ?></b> <?= $TMAIN_android_sorry ?></div>
		    <?php
		  }
		}else{
	      ?>
		<p>
		  <?= $TMAIN_android_manually ?><br/>
		  <ol>
		    <li><?= $TMAIN_android_manually2 ?></li>
		    <li><?= $TMAIN_android_manually3 ?></li>
		    <li><?= $TMAIN_android_manually4 ?></li>
		  </ol>
		</p>
		<?= $TMAIN_android_manually5 ?>
	      <?php } ?>
	    </div>
	  </div>
	</div>
	<div aria-labelledby="windows10-tab" id="windows10" class="tab-pane fade in" role="tabpanel">
	  <div class="row">
	    <div class="col-md-4 text-center">
	      <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/app/win10/screen.png" style="width: 100%; margin-right: 10px; margin-top: 22px" />
	    </div>
	    <div class="col-md-8 col-md-10" style="text-align: left; padding: 0px 40px">
	      <?php
		$user_agent  = $_SERVER['HTTP_USER_AGENT'];
		function getWindows(){ 
		    global $user_agent;
		    $os_platform = "0";
		    $os_array = array(
		      '/windows nt 10/i'      =>  '10',
		      '/windows nt 6.3/i'     =>  '6.3', // 8.1
		      '/windows nt 6.2/i'     =>  '6.2', // 8
		      '/windows nt 6.1/i'     =>  '6.1', // 7
		      '/windows nt 6.0/i'     =>  '6', // vista
		      '/windows nt 5.2/i'     =>  '5.2', //server 2003 basato su XP
		      '/windows nt 5.1/i'     =>  '5.1', //xp
		      '/windows xp/i'         =>  '5.1', //xp
		      '/windows nt 5.0/i'     =>  '5', // 2000
		      '/windows me/i'         =>  '4', // ME
		      '/win98/i'              =>  '3.3', // 98
		      '/win95/i'              =>  '3.2', // 95
		      '/win16/i'              =>  '3.11'
		    );
		    foreach($os_array as $regex => $value){
		      if(preg_match($regex, $user_agent)){
			$os_platform = $value;
		      }
		    }
		    return $os_platform;
		}
		
		function getWindowsName(){
		  global $user_agent;
		  $os_platform = "0";
		  $os_array = array(
		    '/windows nt 10/i'     =>  '10',
		    '/windows nt 6.3/i'     =>  '8.1',
		    '/windows nt 6.2/i'     =>  '8',
		    '/windows nt 6.1/i'     =>  '7',
		    '/windows nt 6.0/i'     =>  'Vista',
		    '/windows nt 5.2/i'     =>  'Server 2003/XP x64',
		    '/windows nt 5.1/i'     =>  'XP',
		    '/windows xp/i'         =>  'XP',
		    '/windows nt 5.0/i'     =>  '2000',
		    '/windows me/i'         =>  'ME',
		    '/win98/i'              =>  '98',
		    '/win95/i'              =>  '95',
		    '/win16/i'              =>  '3.11'
		  );

		  foreach($os_array as $regex => $value){
		      if(preg_match($regex, $user_agent)){
			  $os_platform = $value;
		      }
		  }
		  return $os_platform;
	      }
	      ?>
	      <h1><?= $TMAIN_win10_title ?> <small><span class='label label-default'><?= $TMAIN_planned ?></span></small></h1>
	      <p><?= $TMAIN_win10_descr1 ?>
	      <?php
		if(getWindows() != '0'){
		  echo("$TMAIN_win10_now".getWindowsName().".<br/><br/>");
		}
		if(getWindows() >= "10"){
	      ?>
		<div class="alert alert-success" role="alert"><b><?= $TMAIN_congrats ?></b> <?= $TMAIN_win10_success ?></div>
	      <?php
		}elseif(getWindows() < "10" and getWindows() != '0'){
	      ?>
		<div class="alert alert-danger" role="alert"><b><?= $TMAIN_sorry ?></b> <?= $TMAIN_win10_sorry ?></div>
	      <?php
		}else{
	      ?>
		<?= $TMAIN_win10_error2 ?>
	      <?php
		}
	      ?>
	      <b><?= $TMAIN_win10_manually1 ?></b>
	      <ul>
		<li><?= $TMAIN_win10_manually2 ?></li>
		<li><?= $TMAIN_win10_manually3 ?></li>
		<li><?= $TMAIN_win10_manually4 ?></li>
		<li><?= $TMAIN_win10_manually5 ?></li>
		<li><?= $TMAIN_win10_manually6 ?></li>
	      </ul>
	    </div>
	  </div>
	</div>
	<div aria-labelledby="windows-tab" id="windows" class="tab-pane fade in" role="tabpanel">
	    <h1>LightSchool per la finestra pi&ugrave; famosa <small><span class="label label-default">Sperimentale</span></small></h1>
	    <p>Per poter utilizzare LightSchool per Windows hai bisogno almeno di Windows XP.</p>
	    <?php
	      if(getWindows() != '0'){
		echo("$TMAIN_win_now".getWindowsName().".<br/><br/>");
	      }
	      if(getWindows() >= "5.1"){
	    ?>
		<div class="alert alert-success" role="alert"><b><?= $TMAIN_congrats ?></b> <?= $TMAIN_win_success ?></div>
	    <?php
	      }elseif(getWindows() < "5" and getWindows() != '0'){
	    ?>
	      <div class="alert alert-success" role="alert"><b><?= $TMAIN_sorry ?></b> <?= $TMAIN_win_sorry ?></div>
	    <?php
	      }else{
	    ?>
	      <?= $TMAIN_win_error2 ?>
	    <?php
	      }
	    ?>
	    <?= $TMAIN_win_manually ?>
	</div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>