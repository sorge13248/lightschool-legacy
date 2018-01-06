<?php $ALLOW_STRANGER = true; include_once "System/Core.php"; ?>
    <title>Accesso a LightSchool</title>
    <script src="//crypto-js.googlecode.com/svn/tags/3.0.2/build/rollups/md5.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
	$("#login").click(function(){
	  window.fra_ajax_DATA = "email="+$("#email").val()+"&password="+CryptoJS.MD5($("#password").val());
	  fra_ajax("login", ".login_response");
	  return false;
	});
	$("#login_trusted").click(function(){
	  window.fra_ajax_DATA = "username="+$("#username").val()+"&trusted=true";
	  fra_ajax("login", ".login_trusted_response");
	  return false;
	});
	$("body").on("click", "#login_code", function(){
	  window.fra_ajax_DATA = "code="+$("#code").val();
	  fra_ajax("login_code", ".login_trusted_response");
	  return false;
	});
      });
      
      function loginTrusted(){
	if($(".login_trusted").is(":visible")){
	  $(".login_trusted").fadeOut(200);
	  $(".login_traditional").delay(199).fadeIn(200);
	}else{
	  $(".login_traditional").fadeOut(200);
	  $(".login_trusted").delay(199).fadeIn(200);
	}
      }
    </script>
  </head>
  <body style="background-color: #004A7F; color: white">
    <div class="outer">
      <div class="middle">
	<div class="inner">
	  <div class="row">
	    <div class="col-md-5" style="background-color: #045FB4; color: white; padding: 40px; height: 340px">
	      <h2>LightSchool</h2>
	      <hr style="margin: 10px 0px"/>
	      <p>LightSchool &egrave; un progetto italiano volto alla digitalizzazione intera della scuola.</p>
	      <p>Potrai prendere appunti, segnarti compiti e verifiche sul nostro diario, controllare l'orario delle materie, i tuoi voti, fare verifiche e condividere il tuo materiale con studenti e professori.</p>
	      <p>La registrazione &egrave; <b>gratuita</b>!</p>
	    </div>
	    <div class="col-md-7" style="background-color: #FFFFFF; color: black; padding: 40px; height: 340px">
	      <p style="font-size: 13pt"><span style="color: #045FB4">Accedi</span><span style="display: inline-block; margin: 0px 20px">/</span><a href="<?= $MY_DIRECTORY ?>/register" style="color: gray">Registrati</a></p>
	      <div class="login_traditional">
		<form method="post" action="process.php?type=login" class="login">
		  <input type="email" id="email2" name="email2" placeholder="Indirizzo e-mail" style="display: none" />
		  <input type="password" id="password2" name="password2" placeholder="Password" style="display: none" />
		  <input type="email" id="email" name="email" placeholder="Indirizzo e-mail" /><br/>
		  <input type="password" id="password" name="password" placeholder="Password" /><br/>
		  <input type="submit" value="Accedi" style="float: right; width: auto" id="login" />
		</form>
		<p style="margin-top: 10px" class="login_response"></p>
		<p><br/><br/>Sei su un computer pubblico? <span class="link" onclick="loginTrusted()">Accedi autorizzando l'accesso da un dispositivo attendibile</span>.</p>
	      </div>
	      <div class="login_trusted" style="display: none">
		<form method="post" action="process.php?type=login" class="login">
		  <input type="text" id="trusted" name="trusted" value="true" disabled hidden />
		  <input type="text" id="username" name="username" placeholder="Nome utente" /><br/>
		  <input type="submit" value="Accedi" style="float: right; width: auto" id="login_trusted" />
		</form>
		<p style="margin-top: 10px" class="login_trusted_response"></p>
		<p><br/><br/>Preferisci accedere utilizzando indirizzo e-mail e password? <span class="link" onclick="loginTrusted()">Clicca qui</span>.</p>
	      </div>
	    </div>
	  </div>
	  <p style="margin-top: 10px; text-align: center; color: #BDBDBD">Non hai un'account? <a href="<?= $MY_DIRECTORY ?>/register" style="color: white">Registrati</a><span style="display: inline-block; margin: 0px 20px">/</span>Password dimenticata? <a href="<?= $MY_DIRECTORY ?>/recover" style="color: white">Recuperala</a><span style="display: inline-block; margin: 0px 20px">/</span><a href="<?= $MY_DIRECTORY ?>/language" style="color: white"><img src="<?= $IMAGES_DIRECTORY ?>/flag/<?= $SITE_language ?>.png" style="width: 22px; height: 16px; margin-top: -2px" />Cambia lingua</a></p>
	</div>
      </div>
    </div>
  </body>
</html>