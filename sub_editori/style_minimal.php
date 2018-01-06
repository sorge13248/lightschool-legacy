<?php if($_SESSION['Username'] == ''){
  $USER_accent = '#0067CF';
  $USER_accent_darker = '#004F9F';
  $USER_accent_darker2 = '#004081';
  $USER_themeset = 'light';
  $USER_themeset2 = 'dark';
  $r = '0';
  $g = '103';
  $b = '207';
  $USER_fore_opposite = 'white';
  $USER_font = 'open-sans-light';
  $COL1 = 'white';
  $COL2 = 'black';
  $USER_icon_set2 = 'monochromatic/black';
  $USER_icon_set1 = 'monochromatic/white';
} ?>
<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<!-- //code.jquery.com/ui/1.11.4/jquery-ui.js -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script src="<?= $MY_MAIN_DIRECTORY ?>/js/jquery.cookie.js"></script>
<script src="<?= $MY_MAIN_DIRECTORY ?>/js/chosen.jquery.js" type="text/javascript"></script>
<script src="<?= $MY_MAIN_DIRECTORY ?>/js/Chart.js" type="text/javascript"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php include_once "jquery.nicescroll.php"; include_once "css/chosen.php"; ?>
<script type="text/javascript">
  $(document).ready(function(){
    <?php if($actually_page != 'register' and $actually_page != 'create_test' and $actually_page != 'settings'){ ?>
      $("html, .scrollable, .sidebar, .quick_peek_content_html").niceScroll({horizrailenabled:false});
    <?php } ?>
  });
  
  $(document).ready(function(){ 
    <?php if($actually_page == 'settings'){ ?>
      $('#language').val('<?= $USER_language ?>');
      $('#regione').val('<?= $USER_regione ?>');
      $('#provincia').val('<?= $USER_provincia ?>');
      
      $('#click_type').val('<?= $USER_click_type ?>');
      $('#timer').val('<?= $USER_autosave_timer ?>');
      
      $('#accesscontrol').val('<?= $USER_access_control ?>');
      $('#pc').val('<?= $USER_access_pc ?>');
      $('#tablet').val('<?= $USER_access_tablet ?>');
      $('#mobile').val('<?= $USER_access_mobile ?>');
      
      $('#android').val('<?= $USER_access_androidapp ?>');
      $('#windows').val('<?= $USER_access_winapp ?>');
      $('#wp').val('<?= $USER_access_wpapp ?>');
      
      $('#visibility').val('<?= $USER_visible ?>');
    <?php } ?>
    
    if(localStorage.getItem("accept_cookie") != 'y'){
      $(".cookie_bar").slideDown(200);
    }
    
    <?php if($actually_page != 'wizard'){ ?>
      $("select").chosen({ width:"200px", no_results_text: "Nessun risultato trovato" });
    <?php } ?>
  });
</script>
<style>
/*
 * Base structure
 */

/* Move down content because we have a fixed navbar that is 50px tall */
body {
  padding-top: 50px;
}


/*
 * Global add-ons
 */

.sub-header {
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

/*
 * Top navigation
 * Hide default border to remove 1px line.
 */
.navbar-fixed-top {
  border: 0;
}

/*
 * Sidebar
 */

/* Hide for mobile, show later */
.sidebar {
  display: none;
}
@media (min-width: 768px) {
  .sidebar {
    position: fixed;
    top: 51px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    background-color: #f5f5f5;
    border-right: 1px solid #eee;
  }
}

/* Sidebar navigation */
.nav-sidebar {
  margin-right: -21px; /* 20px padding + 1px border */
  margin-bottom: 20px;
  margin-left: -20px;
}
.nav-sidebar > li > a {
  padding-right: 20px;
  padding-left: 20px;
}
.nav-sidebar > .active > a,
.nav-sidebar > .active > a:hover,
.nav-sidebar > .active > a:focus {
  color: #fff;
  background-color: #428bca;
}


/*
 * Main content
 */

.main {
  padding: 20px;
}
@media (min-width: 768px) {
  .main {
    padding-right: 40px;
    padding-left: 40px;
  }
}
.main .page-header {
  margin-top: 0;
}


/*
 * Placeholder dashboard ideas
 */

.placeholders {
  margin-bottom: 30px;
  text-align: center;
}
.placeholders h4 {
  margin-bottom: 0;
}
.placeholder {
  margin-bottom: 20px;
}
.placeholder img {
  display: inline-block;
  border-radius: 50%;
}

</style>