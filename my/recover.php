<?php
$_GET['only_reference'] = 'n';
include_once "base.php";

if($_GET['code'] != ''){
  $validate = lightschool_get_user($_GET['code'], 'recovery_key');
}

if($_SESSION['Username'] != ''){
  header('location: desktop');
  exit();
}
?>
<html>
  <head>
    <title><?= $TRAD_recover_pwd2 ?> - LightSchool</title>
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
    <script type="text/javascript">
      $(document).ready(function(){
	<?php if($_GET['code'] != ''){ ?>
	<?php }else{?>
	  $("#finished").click(function(e){
	    e.preventDefault();
	    email = $("#emailaddress").val();
	    
	    $.ajax({
	      type: "POST",
	      url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=recover",
	      data: "email="+email,
	      success: function(html){
		if(html == 'true'){
		  $(".window").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/monochromatic/black/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_recover_pwd_ok ?>");
		}else{
		  $("#error").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/monochromatic/black/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
		}
	      },
	      beforeSend:function(){
		$("#error").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/monochromatic/black/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	      }
	    });
	  });
	<?php } ?>
      });
    </script>
  </head>
  <body>
    <div class="window" id="window">
      <form method="post" id="form">
	<center><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/logo.png" style="width: 32px; height: 32px; margin-right: 5px" /><span style="font-size: 25pt; font-family: 'Roboto'; color: #004A7F"><?= $TRAD_recover_pwd2 ?></span></center><br/>
	<?php if($_GET['code'] != ''){
	  function generateRandomString($length) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for($i = 0; $i < $length; $i++){
	      $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	  }
	  
	  if($validate === true){
	    $new_pwd = generateRandomString(7);
	    ?>
	      <img src='<?= $IMAGES_MAIN_DIRECTORY.'/monochromatic/black/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_recover_pwd_step2 ?><br/><br/><?php echo($new_pwd); ?><br/><br/><?= $TRAD_recover_pwd_step2_2 ?><br/><br/>
	      <button onclick="window.location.href = '<?= $MY_MAIN_DIRECTORY ?>/'; return false;"><?= $TRAD_login ?></button>
	    <?php
	    $change_pwd = lightschool_recovery_pwd($_GET['code'], "$new_pwd");
	  }else{
	    ?>
	      <img src='<?= $IMAGES_MAIN_DIRECTORY.'/monochromatic/black/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_recover_pwd_error_code ?>
	    <?php
	  } ?>
	<?php }else{?>
	  <form method="post" action="">
	    <input type="email" id="emailaddress" name="emailaddress" placeholder="<?= $TRAD_email ?>" />
	    <input type="submit" value="<?= $TRAD_recover ?>" id="finished" style="color: black" />
	    <div id="error"></div>
	  </form>
	<?php } ?>
      </form>
    </div>
  </body>
</html>