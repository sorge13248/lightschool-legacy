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
	  $("#login").attr("disabled", "disabled");
	  username=$("#EmailAddress").val();
	  password=$("#Password").val();
	  
	  if(username == "" || password == ""){
	    $("#add_err").css('display', 'inline', 'important');
	    $("#form").css('display', 'block', 'important');
	    $("#auto").css('display', 'none', 'important');
	    $("#add_err").html("<center><br/><br/><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/cross.png' style='width: 12px; margin-right: 5px' />Compilare i campi</center>");
	    $( "#window" ).effect( "shake" );
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
		  $("#add_err").html("<center><br/><br/><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/cross.png' style='width: 12px; margin-right: 5px' />"+html+"</center>");
		}
	      },
	      beforeSend:function(){
		$("#add_err").css('display', 'inline', 'important');
		$("#add_err").html("<center><br/><br/><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/loading.gif' style='margin-right: 10px' />Caricamento...</center>");
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
	background-image: none;
      }
      @media screen and (min-width:900px) {
	html{
	  background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/classroom_login.jpg");
	  background-repeat: no-repeat;
	  background-attachment: fixed;
	  background-size: cover;
	}
      }
      input:focus{
	box-shadow: none;
      }
      a{
	color: black;
	text-decoration: none;
      }
      a:hover, a:focus{
	text-decoration: underline;
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
    <div class="window" id="window">
      <form method="post" id="form" action="<?= $MY_MAIN_DIRECTORY ?>/ajaxLogin?classic=<?= $_GET['classic'] ?>">
	<center><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo.png" style="width: 32px; height: 32px; margin-right: 5px" /><span style="font-size: 25pt; font-family: 'Roboto'; color: #004A7F">LightSchool</span></center><br/><br/>
	<input type="<?= $TYPE_TEXT ?>" id="EmailAddress" name="EmailAddress" placeholder="Indirizzo e-mail" value="<?= $_COOKIE['LOGIN_username'] ?>" autocomplete="off" />
	<input type="password" id="Password" name="Password" placeholder="Password" value="<?= $_COOKIE['LOGIN_password'] ?>" style="margin-bottom: 14px" />
	<label style="margin-top: 20px; display: inline-block"><input type="checkbox" id="remember_me" name="remember_me" style="width: 40px" <?= $REMEMBER_CHECKED ?> />Ricordami</label><br/>
	<input type="submit" value="Accedi" id="login" style="margin-top: -30px; color: black !important" />
	<div class="err" id="add_err"></div>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/register" style="float: left; margin-left: 13px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/newaccount.png" style="width: 17px; margin-right: 10px; margin-top: 10px">Nuovo account</a><br/><!-- <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false" style="float: right; margin-right: 30px; margin-top: 20px"></div>--><br/>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/recover" style="float: left; margin-left: 13px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/password2.png" style="width: 17px; margin-right: 10px; margin-top: 10px">Password dimenticata</a><br/><br/>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/support" style="float: left; margin-left: 13px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/help.png" style="width: 17px; margin-right: 10px; margin-top: 10px">Supporto tecnico</a>
      </form>
      <div id="auto" style="display: none">
	<p style="font-size: 20pt; text-align: center">Collegamento in corso...</p>
      </div>
    </div>
  </body>
</html>