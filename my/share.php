<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<html>
  <head>
    <title><?= $TRAD_share ?> - LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <script type="text/javascript">
      function opencloseGroupShare(username){
	if($('#group_share_'+username).is(':visible')){
	  $('#group_share_'+username).css('display', 'none');
	  $('#opencloseGroupShare_icon_'+username).css('display', 'inline-block');
	}else{
	  $('#group_share_'+username).css('display', 'inline-block');
	  $('#opencloseGroupShare_icon_'+username).css('display', 'none');
	  $('#group_share_'+username).load('view_management.php?SQL_type=share&username='+username);
	}
      }
    </script>
  </head>
  <body>
    <?php
      $actually_page = 'share';
      include "menu.php"; ?>
    <div class="content" id="share">
      <?php
	$_GET['SQL_type'] = "share";
	include "view_management.php";
      ?>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>