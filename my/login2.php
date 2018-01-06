<?php include_once "base.php";

if($_SESSION['Username'] != ''){
  header('location: desktop');
}
?>
<html>
  <head>
    <title>LightSchool</title>
    <?php if($_GET['classic'] != 'y'){ include "style_minimal.php"; } ?>
    <script type="text/javascript">
      $(document).ready(function(){
	$("#add_err").css('display', 'none', 'important');
	$("#login").click(function(){
	  username=$("#EmailAddress").val();
	  password=$("#Password").val();
	  $("#login").attr("disabled", "disabled");
	  
	  if(username == "" || password == ""){
	    $("#add_err").css('display', 'inline', 'important');
	    $("#form").css('display', 'block', 'important');
	    $("#auto").css('display', 'none', 'important');
	    $("#add_err").html("<center><br/><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/white/cross.png' style='width: 12px; margin-right: 5px' />Compilare i campi</center><br/>");
	    $( "#window" ).effect( "shake" );
	    $("#login").removeAttr("disabled");
	  }else{
	    remember = $('#remember_me').is(':checked');
	    $.ajax({
	      type: "POST",
	      url: "<?= $MY_MAIN_DIRECTORY ?>/ajaxLogin.php",
	      data: "EmailAddress="+username+"&Password="+password+"&remember_me="+remember+"&cookie_username=<?= $_COOKIE['LOGIN_username'] ?>&cookie_password=<?= $_COOKIE['LOGIN_password'] ?>",
	      success: function(html){
		if(html=='true'){
		  // $("#add_err").html(html);
		  location.reload();
		}else if(html=='first_login'){
		  // $("#add_err").html(html);
		  window.location.replace("<?= $MY_MAIN_DIRECTORY ?>/tour");
		}else{
		  $("#add_err").css('display', 'inline', 'important');
		  $("#form").css('display', 'block', 'important');
		  $("#auto").css('display', 'none', 'important');
		  $("#login").removeAttr("disabled");
		  $("#window").effect("shake");
		  $("#add_err").html("<center><br/><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/white/cross.png' style='width: 12px; margin-right: 5px' />"+html+"</center><br/>");
		}
	      },
	      beforeSend:function(){
		$("#add_err").css('display', 'inline', 'important');
		$("#add_err").html("<center><br/><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/white/loading.gif' style='margin-right: 10px' />Caricamento...</center><br/>");
	      }
	    });
	  }
	return false;
	});
	<?php
	if($_COOKIE['LOGIN_username'] != '' and $_COOKIE['LOGIN_password'] != ''){
	  $REMEMBER_CHECKED = 'checked="checked"';
	  $TYPE_TEXT = 'text';
	  ?>
	  $('#login').trigger('click');
	  $("#form").css('display', 'none', 'important');
	  $("#auto").css('display', 'block', 'important');
	  <?php
	}else{
	  $TYPE_TEXT = 'email';
	}
	?>
      });
    </script>
    <style type="text/css">
      html{
	background-color: #0067CF;
	color: white;
	overflow-x: hidden;
	max-width: 100%;
      }
      .window2{
	/* border: 1px solid black; */
	width: 100%;
	position: absolute;
	top: 50%;
	margin-top: -170px;/* half of #content height*/
	left: 0;
	width: 100%;
	padding: 40px;
      }
      .centered{
	margin-left: auto;
	margin-right: auto;
	height: 300px;
      }
      input{
	color: white;
	border: none !important;
	border-bottom: 1px solid white !important;
	display: inline-block;
	width: 200px;
	background-color: #0067CF !important;
      }
      input[type=submit]{
	border: none !important;
      }
      ::-webkit-input-placeholder { /* WebKit browsers */
	color:    white !important;
      }
      :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
	color:    white !important;
	opacity:  1;
      }
      ::-moz-placeholder { /* Mozilla Firefox 19+ */
	color:    white !important;
	opacity:  1;
      }
      :-ms-input-placeholder { /* Internet Explorer 10+ */
	color:    white !important;
      }
      input:-webkit-autofill {
	-webkit-box-shadow: 0 0 0px 1000px #0067CF inset;
	-webkit-text-fill-color:    white !important;
      }
  
      #EmailAddress{
	background: white url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/email.png");
	padding-left: 40px;      
	background-size: 16px 16px;  /* dimensioni sfondo */
	background-repeat: no-repeat;  /* immagine ripetuta solo una volta */
	background-position: 10px 10px;  /* spaziatura da sinistra e alto */
	padding-left: 33px;     /* testo a destra dell immagine */
	vertical-align: middle; /* testo al centro verticalmente */
      }
      #Password{
	background: white url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/password2.png");
	padding-left: 40px;           
	background-size: 16px 16px;  /* dimensioni sfondo */
	background-repeat: no-repeat;  /* immagine ripetuta solo una volta */
	background-position: 10px 10px;  /* spaziatura da sinistra e alto */
	padding-left: 33px;     /* testo a destra dell immagine */
	vertical-align: middle; /* testo al centro verticalmente */
      }
      
      a{
	color: white;
      }
      
      .cookie_bar{
	color: black;
      }
    </style>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>
      (function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&appId=454277971336669&version=v2.3";
	fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="window2" id="window">
      <center class="centered">
	<form method="post" id="form" action="<?= $MY_MAIN_DIRECTORY ?>/ajaxLogin?classic=<?= $_GET['classic'] ?>" style="width: 100%; text-align: left; max-width: 500px" autocomplete="off">
	  <center><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo2.png" style="width: 44px; height: 44px; margin-right: 10px" /><span style="font-size: 40pt; font-family: 'Roboto'; color: white">LightSchool</span></center><br/><br/>
	  <input type="<?= $TYPE_TEXT ?>" id="EmailAddress" name="EmailAddress" placeholder="Indirizzo e-mail" value="<?= $_COOKIE['LOGIN_username'] ?>" style="margin-left: -10px; margin-right: 20px" autocomplete="off" />
	  <input type="password" id="Password" name="Password" placeholder="Password" value="<?= $_COOKIE['LOGIN_password'] ?>" style="margin-left: -10px" /><br/>
	  <input type="submit" value="Accedi" id="login" style="margin-top: 10px; float: right; width: 100px; padding-right: 40px" /><label style="margin-top: 18px; float: right"><input type="checkbox" id="remember_me" name="remember_me" style="width: 40px" <?= $REMEMBER_CHECKED ?> />Ricordami</label>
	  <div class="err" id="add_err"></div><!-- <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false" style="float: right; margin-right: 30px; margin-top: 20px"></div>-->
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/register" style="display: inline-block; margin-top: 20px; margin-bottom: 10px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/white/newaccount.png" style="width: 17px; margin-right: 10px; float: left">Nuovo account</a>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/recover" style="display: block; margin-bottom: 20px; margin-top: 10px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/white/password2.png" style="width: 17px; margin-right: 10px; margin-top: 0px; float: left">Password dimenticata</a>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/support" style="display: block"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/white/help.png" style="width: 17px; margin-right: 10px; margin-top: 0px; float: left">Supporto tecnico</a>
	</form>
	<div id="auto" style="display: none">
	  <p style="font-size: 20pt; text-align: center">Collegamento in corso...</p>
	</div>
      </center>
    </div>
  </body>
</html>