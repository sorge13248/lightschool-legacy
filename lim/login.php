<?php include_once "base.php";

if($_SESSION['Username'] != ''){
  header('location: home');
}
?>
<html>
  <head>
    <title>LightSchool Preview</title>
    <?php if($_GET['classic'] != 'y'){ include "style_minimal.php"; } ?>
    <script type="text/javascript">
      $(document).ready(function(){
	$("#add_err").css('display', 'none', 'important');
	$("#login").click(function(){
	  $("#login").attr("disabled", "disabled");
	  username=$("#Username").val();
	  password=$("#Password").val();
	  
	  $("#login").attr("disabled", "disabled");
	  
	  if(username == "" || password == ""){
	    $("#add_err").css('display', 'inline', 'important');
	    $("#form").css('display', 'block', 'important');
	    $("#auto").css('display', 'none', 'important');
	    $("#add_err").html("<center><br/><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/cross.png' style='width: 12px; margin-right: 5px' />Compilare i campi</center>");
	    $( "#window" ).effect( "shake" );
	    $("#login").removeAttr("disabled");
	  }else{
	    remember = $('#remember_me').is(':checked');
	    $.ajax({
	      type: "POST",
	      url: "<?= $MY_MAIN_DIRECTORY ?>/ajaxLogin.php",
	      data: "EmailAddress="+username+"&Password="+password+"&remember_me="+remember,
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
		  $("#add_err").html("<center><br/><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/cross.png' style='width: 12px; margin-right: 5px' />"+html+"</center>");
		}
	      },
	      beforeSend:function(){
		$("#add_err").css('display', 'inline', 'important');
		$("#add_err").html("<center><br/><img src='<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/loading.gif' style='margin-right: 10px' />Caricamento...</center>");
	      }
	    });
	  }
	return false;
	});
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
      
      input[type=password], input[type=text]{
	width: 100% !important;
	border: none !important;
	border-bottom: 1px solid gray !important;
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
	<center><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo.png" style="width: 24px; height: 24px; margin-right: 10px" /><span style="font-size: 25pt; font-family: 'Roboto'; color: #004A7F">LightSchool LIM</span></center><br/><br/>
	<input type="text" id="Username" name="Username" placeholder="Codice LIM" autocomplete="off" />
	<input type="password" id="Password" name="Password" placeholder="Password" style="margin-bottom: 14px" /><br/>
	<input type="submit" value="Accedi" id="login" style="margin-top: 0px; color: black !important" /><br/><br/>
	<div class="err" id="add_err"></div>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/register" style="float: left; margin-left: 13px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/newaccount.png" style="width: 17px; margin-right: 10px; margin-top: 10px">Nuovo account</a><br/><!-- <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false" style="float: right; margin-right: 30px; margin-top: 20px"></div>--><br/>
	<a href="<?= $MY_MAIN_DIRECTORY ?>/recover" style="float: left; margin-left: 13px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/password2.png" style="width: 17px; margin-right: 10px; margin-top: 10px">Password dimenticata</a><br/><br/>
	<a href="//support.lightschool.it/" style="float: left; margin-left: 13px"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/monochromatic/black/help.png" style="width: 17px; margin-right: 10px; margin-top: 10px">Supporto tecnico</a>
      </form>
    </div>
  </body>
</html>