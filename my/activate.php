<?php
$_GET['only_reference'] = 'n';
include_once "base.php";

$validate_status = lightschool_get_user($_GET['code'], 'activation_code_to_username');
if($validate_status != 'not_exists'){
  $validate_name = lightschool_get_user($validate_status, 'name');
  $validate_pwd = lightschool_get_user($validate_status, 'password');
  
  setcookie('LOGIN_username', $validate_status, time() + (86400 * 360), "/");
  setcookie('LOGIN_password', $validate_pwd, time() + (86400 * 360), "/");
}

if($_SESSION['Username'] != ''){
  header('location: desktop');
}
?>
<html>
  <head>
    <title><?= $activate ?> - LightSchool</title>
    <?php include "style_minimal.php"; ?>
    <style type="text/css">
      html{
	background-image: none;
	overflow-y: hidden;
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
    <div class="window" id="window">
      <form method="post" id="form">
	<center><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo.png" style="width: 32px; height: 32px; margin-right: 5px" /><span style="font-size: 25pt; font-family: 'Roboto'; color: #004A7F"><?= $activate ?></span></center><br/>
	<?php
	  if($validate_status != 'not_exists'){
	    ?>
	      <?= $TRAD_hello ?> <?php echo($validate_name); ?>! <?= $activate_descr ?>
	      <meta http-equiv="refresh" content="5;URL=<?= $MY_MAIN_DIRECTORY ?>/login">
	    <?php
	    $_GET['type'] = 'activate_user';
	    include_once "formpost.php";
	  }else{
	    echo($activate_error);
	  }
	?>
      </form>
    </div>
  </body>
</html>