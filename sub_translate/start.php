<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Translating - LightSchool Translate</title>
    <?php include_once "style.php"; ?>
    <script type="text/javascript">
      $(document).ready(function(){
	$("#start").removeAttr("disabled");
	
	$('#temporary_email').on('input', function(){
	  if($(this).val().length > 0){
	    $('#email, #password').attr("disabled", "disabled");
	  }else{
	    $('#email, #password').removeAttr("disabled");
	  }
	});
	$('#email, #password').on('input', function(){
	  if($("#email").val().length > 0 || $("#password").val().length > 0){
	    $('#temporary_email').attr("disabled", "disabled");
	  }else{
	    $('#temporary_email').removeAttr("disabled");
	  }
	});
	
	$("#start").click(function(){
	  $("#start").attr("disabled", "disabled");
	  <?php if($_SESSION['Username'] != ''){ ?>
	    email = "auto";
	    password = "auto";
	    temporary_email = "";
	  <?php }else{ ?>
	    email = $("#email").val();
	    password = $("#password").val();
	    temporary_email = $("#temporary_email").val();
	  <?php } ?>
	  
	  if((email == "" && password == "" && temporary_email != "") || (email != "" && password != "" && temporary_email == "")){
	    $.ajax({
	      type: "POST",
	      url: "<?= $MAIN_DIRECTORY ?>/formpost.php?type=start",
	      data: "email="+email+"&password="+password+"&temporary_email="+temporary_email,
	      success: function(html){
		if(html=='ok_temporary'){
		  $(".toast").css("background-color", "darkgreen");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/monochromatic/white/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />We sent you a confirmation e-mail");
		  $("#start").removeAttr("disabled");
		}else if(html=='ok_login'){
		  window.location.href = "<?= $MAIN_DIRECTORY ?>/translate?lang=" + $("#to").val() + "&start="+$("#from").val();
		}else{
		  $(".toast").css("background-color", "red");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/monochromatic/white/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
		  $("#start").removeAttr("disabled");
		}
	      },
	      beforeSend:function(){
		$(".toast").css("background-color", "orange");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/monochromatic/black/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	      }
	    });
	  }else{
	    $(".toast").css("background-color", "red");
	    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/monochromatic/white/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_fill_field ?>");
	    $("#start").removeAttr("disabled");
	  }
	  $(".toast").slideDown(400);
	  
	  return false;
	});
      });
      
      function step(int){
	$(".step").hide();
	$(".step_" + int).show();
      }
    </script>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 70px">
      <div class="step step_1" style="display: block">
	<p style="color: gray; text-align: right">LightSchool Translate - Version 1.0 beta</p>
	<form method="post" action="<?= $MAIN_DIRECTORY ?>/formpost?type=start" id="form_start">
	  <h2>Welcome translator!</h2><br/>
	  <h4>1) Select the language you want to translate LightSchool:</h4>
	  <select id="to">
	    <option value="fr-FR">Fran&ccedil;ais</option> <!-- francese -->
	    <option value="es-ES">Espa&ntilde;ol</option> <!-- spagnolo -->
	    <option value="de-DE">Deutsch</option> <!-- tedesco -->
	    <option value="da-DA">Dansk</option> <!-- danese -->
	    <option value="pl-PL">Polskie</option> <!-- polacco -->
	    <option value="fi-FI">Suomi</option> <!-- finlandese -->
	    <option value="la-LA">Latine</option> <!-- latino -->
	    <option value="nl-NL">Nederlandse</option> <!-- olandese -->
	    <option value="pt-PT">Portugu&ecirc;s</option> <!-- portoghese -->
	    <option value="ro-RO">Rom&ecirc;n</option> <!-- rumeno -->
	    <option value="sl-SL">Sloven&scaron;&ccaron;ina</option> <!-- sloveno -->
	    <option value="sv-SV">Svenska</option> <!-- svedese -->
	    <option value="tr-TR">T&uuml;rk</option> <!-- turco -->
	  </select>
	  <br/><br/>
	  <h4>2) From which language do you want to start?</h4>
	  <select id="from">
	    <option value="en-EN">English</option> <!-- inglese -->
	    <option value="it-IT">Italiano</option> <!-- italiano -->
	    <option value="es-ES">Espa&ntilde;ol</option> <!-- spagnolo -->
	  </select>
	  <br/><br/>
	  <h4>3) How would you like to authenticate?</h4>
	  <div class="ls_container">
	    <?php if($_SESSION['Username'] != ''){ ?>
	      <h4><img src="<?= $USER_image2 ?>" style="border-radius: 50%; height: 48px; width: 48px; margin-right: 20px; border: 1px solid black; float: left" />Welcome back, <?php echo($USER_name); ?><br/><small>You can continue</small></h4><br/>
	    <?php }else{?>
	      <h4 style="font-family: 'Roboto'">LightSchool Account</h4>
	      <p>If you're a registered user on MY LightSchool, please access with your account so we can keep things organized.</p>
	      <div class="input-group">
		<span class="input-group-addon" id="basic-addon1">@</span>
		<input type="text" class="form-control" placeholder="E-mail address" aria-describedby="basic-addon1" id="email">
	      </div>
	      <div class="input-group">
		<span class="input-group-addon" id="basic-addon1"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/password.png" /></span>
		<input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" id="password">
	      </div>
	      <a href="<?= $MY_MAIN_DIRECTORY ?>/recover" target="_blank">Recover password</a>
	      <hr/>
	      <h4 style="font-family: 'Roboto'; margin-bottom: -15px">Temporary e-mail address</h4><br/>
	      <p>We allow peoples who aren't registered to translate our website, anyway if you want to translate LightSchool you need to provide your e-mail address. This e-mail will be used only for know who's translating and we will use it as a contact information if there're trouble with translations. We will never send you ads or ask you to sign-up.<br/>
	      We will send you a confirmation e-mail and in order to continue you will have to click on the confirmation link inside that e-mail.</p>
	      <div class="input-group">
		<span class="input-group-addon" id="basic-addon1">@</span>
		<input type="text" class="form-control" placeholder="Your e-mail address" aria-describedby="basic-addon1" id="temporary_email">
	      </div>
	    <?php } ?>
	  </div>
	  <center>
	  <p>By clicking Next you accept LightSchool Translate's <span class="btn btn-link" style="padding: 0px; margin: 0px; max-width: auto; width: auto" onclick="step(2)">License agreement</span>.</p>
	  <a class="btn btn-secondary btn-danger" href="<?= $MAIN_DIRECTORY ?>/" role="button" style="margin-right: 20px"><span class="glyphicon glyphicon-remove glyphicon_left"></span>Cancel</a><input type="submit"  class="btn btn-primary btn-success" role="button" id="start" value="Next" /></center>
	</form>
      </div>
      <div class="step step_2">
	<span class="btn btn-link" onclick="step(1)">&lt; Back</span><br/>
	<h2>License agreement</h2>
	<h4>1. General</h4>
	<p>You will not be paid for your work. You will be credited everywhere we use your translation and we'll provide a link back to your website (or whatever you want) if you want.</p>
	<h4>2. How we will use your translation</h4>
	<p>We'll use it only for LightSchool's website (MY LightSchool, LightSchool Publishers, LightSchool for Schools, LightSchool Support and any other website related to LightSchool we'll build in the future).</p>
	<h4>3. E.T.A. after submitting</h4>
	<p>Usually we take about 2-3 days in order to review translations submitted by users. It could take more or less related to our workload.</p>
	<h4>4. Precautions for use</h4>
	<p>We've built-in an autosave system that saves (every 10 minutes) and loads automatically your translation while you're still working on it. You can always click <i>Save as draft</i> to manually save your translation. So if you close the page, turn off your device and resume your work the next day, you'll start where you left it. Anyway we suggest to take screenshoot while you work so if something goes wrong with autosave and load system, you can still submit us your screenshoots by e-mail. Until now we had no problem with autosave but hey! nothing is perfect.</p>
	<button class="btn btn-primary" onclick="step(1)"><span class="glyphicon glyphicon-chevron-left glyphicon_left"></span>Back</button>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>