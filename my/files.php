<?php include_once "base.php";
if($_SESSION['Username'] != ''){ 
  if($_GET['f'] == ''){
    $_GET['f'] = '/';
  }
  
  if($_GET['f'] != '/'){
    $_GET['SQL_type'] = "folder";
    include "view_management.php";
    
    $PAGE_title = $FOLDER_name;
    $STYLE_FOLDER = 'folder_content_after_tree';
  }else{
    $PAGE_title = $TRAD_files;
  }
?>
<html>
  <head>
    <title><?= $PAGE_title ?> - <?= $SITE_TITLE ?></title>
    <?php include_once "style_$USER_skin.php"; ?>
    <?php include_once "file_management.php"; ?>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <?php
      if($_GET['f'] != '/' and $_GET['sidebar'] != 'no'){
	?>
	  <div class="sidebar folder_tree text_complete" id="tree">
	    <?php
	      $_GET['SQL_type'] = "folder_tree";
	      include "view_management.php";
	    ?>
	  </div>
	<?php
      }
    ?>
    <div class="content <?= $STYLE_FOLDER ?>" id="files">
      <?php
	$_GET['SQL_type'] = "files";
	include "view_management.php";
      ?>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>