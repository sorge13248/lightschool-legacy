<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>App - LightSchool</title>
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
	<li class="active">App</li>
      </ol>
      <div class="page-header">
	<h1>App <small>Android / Windows 10 / Windows Desktop</small></h1>
      </div>
      Seleziona la tua piattaforma<br/><br/>
      <ul role="tablist" class="nav nav-tabs" id="user_type">
	<li class="active" role="presentation"><a aria-expanded="true" aria-controls="android" data-toggle="tab" role="tab" id="android-tab" href="#android">Android</a></li>
	<li role="presentation" class=""><a aria-controls="windows10" data-toggle="tab" id="windows10-tab" role="tab" href="#windows10" aria-expanded="false">Windows 10</a></li>
	<li role="presentation" class=""><a aria-controls="windows" data-toggle="tab" id="windows-tab" role="tab" href="#windows" aria-expanded="false">Windows Desktop</a></li>
      </ul>
      <div class="tab-content" id="myTabContent">
	<div aria-labelledby="android-tab" id="android" class="tab-pane fade active in" role="tabpanel">
	  <div class="row">
	    <div class="col-xs-6 col-md-2 text-center">
	      <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/app/android/screen.jpg" style="width: 100%; margin-right: 10px" />
	    </div>
	    <div class="col-xs-12 col-sm-6 col-md-10" style="text-align: left; padding: 0px 40px">
	      <h1>LightSchool per il robottino verde <small><span class="label label-default">Sperimentale</span></small></h1>
	      <p>Per poter utilizzare LightSchool per Android hai bisogno di una versione di Android uguale o superiore alla 4.0.<br/>
	      <small style="font-size: 8pt">N.B.: Se utilizzi Android 5 o superiore, &egrave; necessario che tu abbia Android WebView installato sul tuo dispositivo. Questo &egrave; installato di serie su tutti i dispositivi "occidentali" ma potrebbe essere assente su dispositivi "orientali" o di produttori sconosciuti.</small></p>
	      <?php
		if(strstr($_SERVER['HTTP_USER_AGENT'], 'Android')){
		  preg_match('/Android (\d+(?:\.\d+)+)[;)]/', $_SERVER['HTTP_USER_AGENT'], $matches);
		  
		  $new_array = array($matches[1]);
		  $new_array = implode($new_array, " ");
		  ?>
		    Attualmente stai utilizzando Android <?php echo($new_array); ?>.<br/><br/>
		  <?php
		  if($new_array >= 4.0){
		    ?>
		      <div class="alert alert-success" role="alert"><b>Congratulazioni!</b> Puoi utilizzare LightSchool per Android!</div>
		    <?php
		  }else{
		    ?>
		      <div class="alert alert-danger" role="alert"><b>Mi dispiace :(</b> Non utilizzare LightSchool per Android!</div>
		    <?php
		  }
		}else{
	      ?>
		<p>Per verificare la propria versione di Android seguire le indicazioni sotto riportate:<br/>
		  <ol>
		    <li>Andare in <i>Impostazioni</i></li>
		    <li>Alla fine della lista selezionare <i>Informazioni sul telefono/tablet</i></li>
		    <li>Controllare il numero presente sotto <i>Versione Android</i></li>
		  </ol>
		  In alternativa visita questa pagina dal tuo dispositivo Android per sapere che versione stai utilizzando e se l'app &egrave; compatibile con il tuo dispositivo.
		</p>
	      <?php } ?>
        <!--<a href="LightSchool.apk" class="btn btn-primary btn-sm" style="font-size: 14pt">Download</a>-->
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
	      <h1>LightSchool per le finestre moderne <small><span class="label label-default">Pianificato</span></small></h1>
	      <p>Per poter utilizzare LightSchool per Windows avrai bisogno di Windows 10.</p>
	      <?php
		if(getWindows() != '0'){
		  echo("Attualmente stai utilizzando Windows ".getWindowsName().".<br/><br/>");
		}
		if(getWindows() >= "10"){
	      ?>
		<div class="alert alert-success" role="alert"><b>Congratulazioni!</b> Puoi utilizzare LightSchool per Windows 10!</div>
	      <?php
		}elseif(getWindows() < "10" and getWindows() != '0'){
	      ?>
		<div class="alert alert-danger" role="alert"><b>Mi dispiace :(</b> Devi avere Windows 10</div>
	      <?php
		}else{
	      ?>
		Non stai utilizzando Windows.
	      <?php
		}
	      ?>
	      <b>Sistemi operativi e dispositivi supportati:</b>
	      <ul>
		<li>Microsoft Windows 10</li>
		<li>Microsoft Windows 10 Mobile</li>
		<li>Microsoft Windows 10 Xbox One</li>
		<li>Microsoft Windows 10 Surface Hub</li>
		<li>Microsoft HoloLens</li>
	      </ul>
	    </div>
	  </div>
	</div>
	<div aria-labelledby="windows-tab" id="windows" class="tab-pane fade in" role="tabpanel">
	    <h1>LightSchool per la finestra pi&ugrave; famosa <small><span class="label label-default">Sperimentale</span></small></h1>
	    <p>Per poter utilizzare LightSchool per Windows hai bisogno almeno di Windows XP.</p>
	    <?php
	      if(getWindows() != '0'){
		echo("Attualmente stai utilizzando Windows ".getWindowsName().".<br/><br/>");
	      }
	      if(getWindows() >= "5.1"){
	    ?>
	      <div class="alert alert-success" role="alert"><b>Congratulazioni!</b> Puoi utilizzare LightSchool per Windows Desktop!</div>
	    <?php
	      }elseif(getWindows() < "5" and getWindows() != '0'){
	    ?>
	      <div class="alert alert-danger" role="alert"><b>Mi dispiace :(</b> Devi avere Windows almeno Windows XP</div>
	    <?php
	      }else{
	    ?>
	      Non stai utilizzando Windows.
	    <?php
	      }
	    ?>
	    <b>Requisiti di sistema:</b>
	    <ul>
	      <li>Microsoft Windows XP o superiore</li>
	      <li>Microsoft .NET Framework 4.0 o superiore - <a href="https://www.microsoft.com/it-IT/download/details.aspx?id=42643" target="_blank">Download da Microsoft.it</a></li>
	    </ul>
	</div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>