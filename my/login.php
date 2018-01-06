<?php include_once "base.php";

if($_SESSION['Username'] != ''){
  header('location: home');
}
?>
<html>
  <head>
    <title><?= $SITE_TITLE ?></title>
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
	    $("#add_err").html("<center><br/><br/><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/cross.png' style='width: 12px; margin-right: 5px' /><?= $TRAD_fill_field ?></center>");
	    $("#window").effect("shake");
	    $("#login").removeAttr("disabled");
	  }else{
	    remember = $('#remember_me').is(':checked');
	    $.ajax({
	      type: "POST",
	      url: "<?= $MY_MAIN_DIRECTORY ?>/ajaxLogin.php",
	      data: "EmailAddress="+username+"&Password="+password+"&remember_me="+remember+"&cookie_username=<?= $_COOKIE['LOGIN_username'] ?>&cookie_password=<?= $_COOKIE['LOGIN_password'] ?>",
	      success: function(html){
		if(html.indexOf('true') > -1){
		  // $("#add_err").html(html);
		  location.reload();
		}else if(html.indexOf('first_login') > -1){
		  // $("#add_err").html(html);
		  window.location.replace("<?= $MY_MAIN_DIRECTORY ?>/desktop");
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
		$("#add_err").html("<center><br/><br/><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/loading.gif' style='margin-right: 10px' /><?= $TRAD_loading ?></center>");
	      }
	    });
	  }
	  return false;
	});
	<?php
	if($_COOKIE['LOGIN_username'] != '' and $_COOKIE['LOGIN_password'] != ''){
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
	background-color: white;
      }
      input{
	border: none;
	border-bottom: 1px solid gray;
      }
      input:focus, input:hover{
	box-shadow: none;
	border: none;
	border-bottom: 1px solid gray;
      }
      a{
	color: black;
	text-decoration: none;
      }
      a:hover, a:focus{
	text-decoration: underline;
      }
      
      .window2{
	position: absolute;
	top: 0px;
	left: 0px;
	right: auto;
	width: calc(100% - 40px);
	background-color: white;
	padding: 50px 20px;
      }
      .window2 form input{
	width: calc(100% - 60px);
	margin-bottom: 20px;
	padding: 10px;
	background-color: transparent !important;
      }
      .window2 form input:hover, .window2 form input:focus{
	outline: none;
      }
      .window2 form input[type=submit]{
	padding: 10px;
	font-size: 12pt;
	margin-bottom: 30px;
	margin-top: 10px;
	background-color: white;
	transition: .2s ease-in-out;
	margin-bottom: 0px;
	width: 150px;
	float: right;
	margin-right: 10px;
	border: 1px solid black !important;
	border-radius: 20px;
      }
      .window2 form input[type=submit]:hover, .window2 form input[type=submit]:focus{
	background-color: lightgray;
      }
      #window_title{
	display: none;
      }
      
      @media screen and (min-width:630px) {
	html{
	  background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/classroom_login.jpg");
	  background-repeat: no-repeat;
	  background-attachment: fixed;
	  background-size: cover;
	}
	.header{
	  display: none;
	}
	#window_title{
	  display: block;
	  background-color: <?= $USER_accent ?>;
	  padding: 10px;
	  margin-top: -51px;
	  margin-left: -20px;
	  width: calc(100% + 20px);
	  text-align: center;
	}
	.window2{
	  position: fixed;
	  top: calc(50% - 250px);
	  left: calc(50% - 230px);
	  width: 400px;
	  padding: none;
	  -webkit-box-shadow: 0px 0px 28px 0px rgba(50, 50, 50, 1);
	  -moz-box-shadow:    0px 0px 28px 0px rgba(50, 50, 50, 1);
	  box-shadow:         0px 0px 28px 0px rgba(50, 50, 50, 1);
	  background: url("<?= $IMAGES_MAIN_DIRECTORY ?>/classroom_loginW.jpg") no-repeat fixed;
	  background-size: cover;
	}
      }
    </style>
  </head>
  <body>
    <div class="header" style="text-align: center">
      <span class="title" style="display: inline-block; margin-top: -1px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo.png" style="width: 32px; height: 32px; margin-right: 10px; float: left" />LightSchool</span>
    </div>
    <div class="window2" id="window">
      <form method="post" id="form" action="<?= $MY_MAIN_DIRECTORY ?>/ajaxLogin?classic=<?= $_GET['classic'] ?>">
	<span id="window_title"><span><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo.png" style="width: 32px; height: 32px; margin-right: 10px; margin-top: 4px" /><span style="font-size: 25pt; font-family: 'Roboto'; color: white">LightSchool</span></span></span><br/><br/>
	<div style="padding: -20px 20px">
	  <input type="<?= $TYPE_TEXT ?>" id="EmailAddress" name="EmailAddress" placeholder="<?= $TRAD_email ?>" value="<?= $_COOKIE['LOGIN_username'] ?>" autocomplete="off" />
	  <input type="password" id="Password" name="Password" placeholder="<?= $TRAD_password ?>" value="<?= $_COOKIE['LOGIN_password'] ?>" style="margin-bottom: 14px" />
	  <label style="margin-top: 20px; display: none"><input type="checkbox" id="remember_me" name="remember_me" hidden="hidden" style="width: 40px" <?= $REMEMBER_CHECKED ?> checked /><?= $TRAD_remember_me ?></label><br/>
	  <input type="submit" value="<?= $TRAD_login ?>" id="login" style="margin-top: 10px; color: black !important" />
	  <div class="err" id="add_err"></div>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/register" style="float: left; margin-left: 13px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/newaccount.png" style="width: 17px; margin-right: 10px; margin-top: 10px"><?= $TRAD_new_account ?></a><br/><br/>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/recover" style="float: left; margin-left: 13px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/password2.png" style="width: 17px; margin-right: 10px; margin-top: 10px"><?= $TRAD_recover_pwd ?></a><br/><br/>
	  <a href="<?= $MY_MAIN_DIRECTORY ?>/support" style="float: left; margin-left: 13px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/help.png" style="width: 17px; margin-right: 10px; margin-top: 10px"><?= $TRAD_support ?></a><br/><br/><br/>
	  <center style="display: block; margin-bottom: -20px"><a href="<?= $MY_MAIN_DIRECTORY ?>/language" style="margin-left: 13px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/flag/<?= $_COOKIE['language'] ?>.png" style="width: 17px; margin-right: 10px; margin-top: 10px"><?= $TRAD_change_language ?></a></center>
	</div>
      </form>
      <div id="auto" style="display: none">
	<p style="font-size: 20pt; text-align: center"><?= $TRAD_logging_in ?></p>
      </div>
    </div>
  </body>
</html>