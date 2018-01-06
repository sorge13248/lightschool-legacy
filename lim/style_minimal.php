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
<?php include_once "hint_css.php"; ?>
<style type="text/css">
  @import url(//fonts.googleapis.com/css?family=Roboto:300);
  *{
    font-family: arial, tahoma, sans-serif;
  }
  a{
    color: <?= $USER_accent ?>;
    text-decoration: none;
  }
  a:hover, a:focus{
    text-decoration: underline;
  }
  html{
    <?php if($actually_page != 'writer'){ ?>
      background-image: url("<?= $UPLOAD_MAIN_DIRECTORY ?>/<?= $USER_background ?>");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    <?php } ?>
    margin: none;
    height: calc(100% - 20px);
    max-width: 100%;
  }
  .transparent{
    background-color: rgba(255,255,255, <?= $USER_transparent ?>);
    position: fixed;
    top: 0px;
    left: 0px;
    z-index: -999;
    width: 100%;
    height: 100%;
  }
  .body_sidebar{
    margin-right: 300px !important;
  }
  .err{
    display: none;
  }
  a.icon_files{
    color: black;
    text-decoration: none;
  }
  .window{
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    background-color: #F6F6F6;
    padding-top: 30%;
  }
  .window form input{
    width: calc(100% - 60px);
    margin-bottom: 20px;
    padding: 10px;
    background-color: transparent !important;
  }
  .window form input:hover, .window form input:focus{
    outline: none;
  }
  .window form input[type=submit]{
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
  .window form input[type=submit]:hover, .window form input[type=submit]:focus{
    background-color: lightgray;
  }
  img{
    border: 0px;
  }
  
  button, input[type=button]{
    background-color: <?= $USER_accent ?>;
    color: <?= $COL1 ?> !important;
    padding: 10px 15px 10px 15px;
    font-size: 11pt;
    border: none;
    transition: .2s ease-in-out;
    margin-bottom: 10px;
    margin-right: 10px;
    cursor: pointer;
  }
  button:hover, button:focus, input[type=button]:hover, input[type=button]:focus{
    color: white;
    background-color: <?= $USER_accent_darker ?>;
    border: none;
  }
  button:hover span, button:focus span, input[type=button]:hover span, input[type=button]:focus span{
    color: white !important;
  }
  
  <?php if($_GET['app'] != 'winapp'){ ?>
  @media screen and (min-width:630px) {
  <?php } ?>
    .window{
      position: fixed;
      top: calc(50% - 160px);
      left: calc(50% - 230px);
      width: 400px;
      border: 1px solid gray;
      padding: 30px;
      border-radius: 30px;
      -webkit-box-shadow: 0px 0px 28px 0px rgba(50, 50, 50, 1);
      -moz-box-shadow:    0px 0px 28px 0px rgba(50, 50, 50, 1);
      box-shadow:         0px 0px 28px 0px rgba(50, 50, 50, 1);
      background: url("<?= $IMAGES_MAIN_DIRECTORY ?>/classroom_loginW.jpg") no-repeat fixed;
      background-size: cover;
    }
    
    .context{
      position: absolute !important;
      width: 250px !important;
      height: auto !important;
      padding-bottom: 10px !important;
    }
    
    .context_app{
      min-height: 150px !important;
      max-height: 270px !important;
    }
    
    .dialog{
      top: 50% !important;
      left: 50% !important;
      transform: translateY(-50%) translateX(-50%);
      width: auto !important;
      height: auto !important;
      max-height: 100% !important;
      overflow-y: auto !important;
      padding-right: 30px;
    }
    .dialog .content{
      width: 100% !important;
      min-width: 300px !important;
      max-width: 100% !important;
      min-height: 100px !important;
      padding: 10px !important;
      padding-top: 20px !important;
    }
    .context .close{
      display: none !important;
    }
    
    .icon_files{
      width: 273px !important;
      height: 40px !important;
    }
    .icon_files span.title_files{
      font-size: 14pt !important;
      width: 205px !important;
    }
    .icon_files span.subtitle{
      font-size: 10pt !important;
      color: gray;
      display: inline-block !important;
    }
    .icon_files img{
      width: 30px !important;
      height: 32px !important;
    }
    .content{ 
      <?php if($USER_taskbar_position == 'bottom'){ ?>
      margin: 80px 30px 80px 30px !important;   
      <?php }elseif($USER_taskbar_position == 'left'){ ?>
      margin: 80px 0px 30px 70px !important;   
      <?php } ?>
    }
    .text_min, .text_min2{
      display: none !important;
    }
    .text_complete{
      display: inline-block !important;
    }
    .toast{
      width: auto !important;
    }
    .page{
      margin: 0 auto !important;
      border: 1px solid gray !important;
      width: 755px !important;
      padding: 76px !important;
      margin-bottom: 100px !important;
      margin-top: 120px !important;
    }
    
    .header .tray{
      width: 400px;
    }
    .header .tray form{
      width: 400px;
    }
    .header .tray input{
      width: 100px;
    }
    .header .tray input:hover, .header .tray input:focus{
      width: 400px;
    }
    
    .diary_day{
      min-height: 15% !important;
      height: 15% !important;
      max-height: 15% !important;
      padding-top: 10px !important;
      padding-bottom: 10px !important;
    }
  
    .dialog_upload{
      width: calc(100% - 100px) !important;
      max-width: calc(100% - 100px) !important;
      height: calc(100% - 100px) !important;
      max-height: calc(100% - 100px) !important;
    }
    
  
    .dialog_upload{
      width: calc(100% - 100px);
      max-width: calc(100% - 100px);
      height: calc(100% - 200px) !important;
      max-height: calc(100% - 200px) !important;
    }
    
    #new_folder_dialog{
      height: 100px !important;
      overflow-y: hidden !important;
    }
    
    .main_menu{
      padding: 40px !important;
      <?php if($USER_taskbar_position == 'bottom'){ ?>
      height: calc(100% - 130px) !important;
      <?php }elseif($USER_taskbar_position == 'left'){ ?>
      width: calc(100% - 130px) !important;
      <?php } ?>
    }
    
    
    .register_lessons_sidebar{
      display: block !important;
      width: 100px !important;
    }
    .register_content{
      margin-left: 280px !important;
      width: calc(100% - 350px) !important;
    }
    .tab{
      min-width: 500px !important;
      max-height: calc(100% - 500px) !important;
    }
    .register_surname_and_name{
      width: calc(50% - 50px) !important;
    }
    
    /* finestre di dialogo */
    #share_dialog{
      max-width: 400px;
    }
    #register_profile_dialog{
      padding-top: 10px;
    }
    #register_profile_frame{
      max-width: auto;
    }
    
    #new_people{
      width: 500px !important;
      max-width: 500px !important;
    }
    #insert_image{
      max-height: calc(100% - 200px) !important;
    }
    #insert_image, #insert_image_frame{
      max-width: 1000px !important;
      width: 70% !important;
    }
    #insert_image_frame .selector_content{
      margin-left: 40px !important;
    }
    .folder_content_after_tree{
      margin-left: 220px !important;
    }
    
    .draggable_dialog{
      width: auto !important;
      height: auto !important;
      min-width: 200px !important;
      margin-top: 100px !important;
      margin-left: 100px !important;
    }
    
    .sidebar{
      top: 50px;
      <?php if($USER_taskbar_position == 'bottom'){ ?>
	left: 0px;
      <?php }elseif($USER_taskbar_position == 'left'){ ?>
	left: 40px;
      <?php } ?>
      width: 200px !important;
      background-color: <?= $USER_accent ?>;
      color: <?= $COL1 ?>;
      height: 100%;
      overflow-y: auto;
      transition: .2s ease-in-out;
      display: inline-block;
      padding: 0px !important;
      border-left: none !important;
    }
    
    #settings_save{
      margin-right: 300px !important;
    }
    
    .settings_content{
      <?php if($USER_taskbar_position == 'bottom'){ ?>
	margin-left: 260px !important;
      <?php }elseif($USER_taskbar_position == 'left'){ ?>
	margin-left: 290px !important;
      <?php } ?>
      margin-bottom: 70px !important;
      margin-top: 60px !important;
    }
    
    .tab_content{
      padding: 20px !important;
    }
    
    .settings_content .tab .tab_content{
      width: calc(100% - 50px) !important;
    }
    .settings_content .tab .tab_content label{
      display: inline-block !important;
      margin-right: 20px !important;
      width: 100% !important;
      max-width: 300px !important;
      min-width: 100px !important;
    }
    .settings_content .tab .tab_content input{
      width: 100% !important;
      <?php if($actually_page == 'settings'){ ?>
	max-width: 300px !important;
      <?php } ?>
      min-width: 100px !important;
    }
    
    .settings_sidebar{
      width: 250px !important;
    }
  <?php if($_GET['app'] != 'winapp'){ ?>
  }
  <?php }else{ ?>
    .header, .taskbar{
      display: none !important;
    }
  <?php } ?>
  
  textarea {
    resize: none;
  }
  .header, .taskbar{
    z-index: 9996;
    cursor: default;
    white-space: nowrap;
    transition: .2s ease-in-out;
    background-color: rgba(<?= $r ?>, <?= $g ?>, <?= $b ?>, 1.00);
  }
    
  .header{
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    color: <?= $COL1 ?>;
    font-family: open-sans-light;
    padding: 0px;
    margin: 0px;
    height: 50px;
    overflow-x: auto;
    overflow-y: hidden;
  }
  .header a{
    color: <?= $COL1 ?>;
  }
  .header .title{
    font-size: 20pt;         
    <?php if($USER_taskbar_position == 'bottom'){ ?>
      padding: 10px 10px 10px 20px;
    <?php }elseif($USER_taskbar_position == 'left'){ ?>
     padding: 10px 10px 10px 60px;
    <?php } ?>
    font-family: open-sans-light, arial, tahoma, sans-serif;
    cursor: default !important;
  }
  .header .title img{
    width: 25px;
  }
  .header .tray{
    position: fixed;
    <?php if($actually_page == 'read' or $actually_page == 'writer' or $actually_page == 'app_word'){ ?>
      right: -30px;
      top: 6px;
    <?php }else{ ?>
      right: 10px;
      top: 2px;
    <?php } ?>
    padding: 10px 0px 0px 20px;
    margin-right: 30px;
    max-height: 20px;
    text-align: right;
  }
  .header .tray .shadow{
    opacity: 0.3;
    transition: .2s ease-in-out;
  }
  .header .tray .shadow:hover{
    opacity: 1;
  }
  .header .tray span, .header .tray a{
    display: inline-block;
    margin-right: 5px;
    padding-left: 7.5px;
    padding-right: 7.5px;
    margin-top: 0px;
    cursor: pointer;
  }
  .header .tray span img, .header .tray a img{
    width: 20px;
  }
  .header .tray form{
    height: 0px;
    margin-left: 0px;
    width: 100%;
  }
  .header .tray input{
    padding: 5px;
    border: none;
    width: 100px;
    display: none;
  }
  .header .tray input:hover, .header .tray input:focus{
    padding: 5px;
    border: none;
    width: calc(100% - 90px) !important;
    box-shadow: none;
  }
  
  .main_menu{
    position: fixed;
    top: 0px;
    <?php if($USER_taskbar_position == 'bottom'){ ?>
    left: 0px;
    <?php }elseif($USER_taskbar_position == 'left'){ ?>
    left: 50px;
    <?php } ?>
    width: 100%;
    height: calc(100% - 70px);
    background-color: <?= $USER_accent ?>;
    padding: 10px;
    z-index: 9997;
    text-align: center;
    display: none;
    overflow-y: auto;
  }
  
  .main_menu a{
    color: <?= $COL1 ?>;
    text-decoration: none;
    text-align: center;
    display: inline-block;
    opacity: 0;
    margin: 20px 50px 0px 0px;
  }
  .main_menu a .border{
    border-radius: 50%;
    display: inline-block;
    margin-bottom: 10px;
    padding: 10px;
    background-color: <?= $USER_accent_darker ?>;
  }
  .main_menu a img{
    padding: 20px;
    width: 50px;
    height: 50px;
  }
  .main_menu a.selected{
    background-color: transparent;
    outline: none;
  }
  .main_menu a .border{
    transition: .2s ease-in-out;
  }
  .main_menu a:hover .border{
    -webkit-box-shadow: 0px 0px 40px -4px rgba(0,0,0,0.75) !important;
    -moz-box-shadow: 0px 0px 40px -4px rgba(0,0,0,0.75) !important;
    box-shadow: 0px 0px 40px -4px rgba(0,0,0,0.75) !important;
  }
  
  .taskbar{
    position: fixed;
    <?php if($USER_taskbar_position == 'bottom'){ ?>
      bottom: 0px;
      left: 0px;
      width: 100%;
      overflow-x: auto;
      overflow-y: hidden;
    <?php }elseif($USER_taskbar_position == 'left'){ ?>
      top: 0px;
      left: 0px;
      overflow-x: hidden;
      overflow-y: auto;
    <?php } ?>
    color: <?= $COL1 ?>;
    font-family: open-sans-light;
    padding-bottom: 10px;
    padding-left: 10px;
  }
  .normal_taskbar{
    <?php if($USER_taskbar_position == 'bottom'){ ?>
      height: 40px;
    <?php }elseif($USER_taskbar_position == 'left'){ ?>
      height: calc(100% + 20px);
      width: 40px; 
    <?php } ?>
  }
  
  .small_taskbar{
    <?php if($USER_taskbar_position == 'bottom'){ ?>
      height: 30px;
    <?php }elseif($USER_taskbar_position == 'left'){ ?>
      height: calc(100% + 20px);
      width: 30px; 
    <?php } ?>
  }
  .taskbar .app{
    <?php if($USER_taskbar_position == 'bottom'){ ?>
      display: inline-block; 
      margin-right: -3px;
    <?php }elseif($USER_taskbar_position == 'left'){ ?>
      display: block;
      margin-left: -16.5px;
      margin-bottom: 5px;
    <?php } ?>
    padding: 10px;
    transition: .2s ease-in-out;
    text-align: center;
    cursor: pointer;
    outline: none;
    z-index: 900 !important;
    background-color: <?= $USER_accent ?>;
    border: none !important;
  }
  .taskbar .app span{
    display: none;
  }
  
  .normal_taskbar .app{
    width: 2%;
    min-width: 40px;
  }
  .small_taskbar .app{
    width: 29px;
  }
  .taskbar .app:hover, .taskbar .app.selected{
    background-color: <?= $USER_accent_darker ?>;
  }
  .normal_taskbar .app img{
    padding-top: 3px;
    width: 25px;
  }
  .small_taskbar .app img{
    padding-top: 0px;
    width: 20px;
  }
  .taskbar .app .tray{
    float: right;
    margin-right: 20px;
    color: <?= $COL1 ?>;
    text-decoration: none;
    font-size: 18pt;
    display: inline-block;
    padding: 10px;
    transition: .2s ease-in-out;
    text-align: center;
    height: 100%;
  }
  .taskbar .app .tray img{
    border-radius: 50%;
    margin-right: 10px;
    float: left;
  }
  
  #fastnote{
    background-color: #F7D358;
    position: fixed;
    top: 70px;
    right: 20px;
    display: none;
    width: 200px;
    height: 170px;
    z-index: 9995;
  }
  #fastnote #fastnote_content{
    background-color: #F7D358;
    border: none;
    padding-left: 10px;
    padding-right: 10px;
    font-family: Comic Sans MS;
    height: 150px;
    width: calc(100% - 20px);
    overflow-y: auto;
    font-size: 10pt;
  }
  #fastnote #fastnote_content:empty:before{
    content: "Scrivi qui gli appunti rapidi...";
    cursor: text;
    color: gray;
  }
  #fastnote #fastnote_content:hover, #fastnote #fastnote_content:focus{
    outline: none;
  }
  #fastnote input[type=submit]{
    border: none;
    float: right;
    margin-top: 0px;
    margin-bottom: 0px;
    margin-right: -10px;
    cursor: pointer;
    background: transparent url("<?= $IMAGES_MAIN_DIRECTORY ?>/black/save2.png") 6px 9px no-repeat;
  }
  #fastnote input[type=submit]:focus{
    box-shadow: none;
  }
  
  .send_message{
    border: 1px solid gray;
    padding: 7px;
    font-size: 11pt;
    transition: .2s ease-in-out;
    margin-bottom: 10px;
    background-color: white;
  }
  .send_message_content{
    width: calc(100% - 110px);
    border: none;
    height: 100px;
    max-height: 100px;
    min-height: 100px;
    display: inline-block;
    overflow-y: auto;
    padding: 10px;
  }
  .send_message_content:empty:before{
    content: "Scrivi qui un messaggio...";
    cursor: text;
    color: gray;
  }
  .send_message_content:hover .send_message{
    border: 1px solid <?= $USER_accent ?>;
    outline: none;
  }
  .send_message_content:focus .send_message{
    -webkit-box-shadow: 0px 0px 10px <?= $USER_accent ?>;
    -moz-box-shadow: 0px 0px 10px <?= $USER_accent ?>;
    box-shadow: 0px 0px 10px <?= $USER_accent ?>;
  }
  .send_message_content, .send_message_content:hover, .send_message_content:focus{
    border: none;
    box-shadow: none;
    resize: none;
  }
  .send_message input[type=submit]{
    border: none;
    float: right;
    margin-top: -120px;
    margin-right: 10px !important;
    cursor: pointer;
    background-color: transparent;
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/send.png");
    background-repeat: no-repeat;
    background-size: 28px 28px;  /* dimensioni sfondo */
    padding-top: 40px;
    padding-left: 15px;
    background-origin: content-box;
    height: 120px !important;
    width: 60px !important;
  }
  .send_message input[type=submit]:focus, .send_message input[type=submit]:hover{
    background-color: <?= $USER_accent_lighter2 ?>;
    box-shadow: none;
  }
  
  #notebook_title:empty:before{
    content: "Titolo quaderno...";
    cursor: text;
    color: gray;
  }
  
  #q{
    background: white url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/search.png");
    background-size: 28px 28px;  /* dimensioni sfondo */
    background-repeat: no-repeat;  /* immagine ripetuta solo una volta */
    background-position: -2px 0px;  /* spaziatura da sinistra e alto */
    padding-left: 33px;     /* testo a destra dell immagine */
    vertical-align: middle; /* testo al centro verticalmente */
    padding-left: 25px;
    width: 200px !important;
    transition: .2s ease-in-out;
  }
  
  .content{
    margin: 70px 30px 60px 10px;
  }
  
  #EmailAddress{
    background: white url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/email.png");
    padding-left: 40px;      
    background-size: 16px 16px;  /* dimensioni sfondo */
    background-repeat: no-repeat;  /* immagine ripetuta solo una volta */
    background-position: 10px 10px;  /* spaziatura da sinistra e alto */
    padding-left: 33px;     /* testo a destra dell immagine */
    vertical-align: middle; /* testo al centro verticalmente */
  }
  #Username{
    background: white url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/profile_male.png");
    padding-left: 40px;      
    background-size: 16px 16px;  /* dimensioni sfondo */
    background-repeat: no-repeat;  /* immagine ripetuta solo una volta */
    background-position: 10px 10px;  /* spaziatura da sinistra e alto */
    padding-left: 33px;     /* testo a destra dell immagine */
    vertical-align: middle; /* testo al centro verticalmente */
  }
  #Password{
    background: white url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/password2.png");
    padding-left: 40px;           
    background-size: 16px 16px;  /* dimensioni sfondo */
    background-repeat: no-repeat;  /* immagine ripetuta solo una volta */
    background-position: 10px 10px;  /* spaziatura da sinistra e alto */
    padding-left: 33px;     /* testo a destra dell immagine */
    vertical-align: middle; /* testo al centro verticalmente */
  }
  
  input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px lightgray inset;
  }
  ::-webkit-input-placeholder { /* WebKit browsers */
    color:    gray;
  }
  :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color:    gray;
    opacity:  1;
  }
  ::-moz-placeholder { /* Mozilla Firefox 19+ */
    color:    gray;
    opacity:  1;
  }
  :-ms-input-placeholder { /* Internet Explorer 10+ */
    color:    gray;
  }
  
  input, textarea{
    border: 1px solid gray;
    padding: 7px;
    font-size: 11pt;
    transition: .2s ease-in-out;
    margin-bottom: 10px;
  }
  input[type=checkbox]{
    border: none;
    padding: none;
  }
  input[type=checkbox]:hover, input[type=checkbox]:focus{
    border: none;
    padding: none;
    box-shadow: none;
  }
  input:hover, input:focus, textarea:hover, textarea:focus{
    border: 1px solid <?= $USER_accent ?>;
    outline: none;
  }
  input:focus, textarea:focus{
    -webkit-box-shadow: 0px 0px 10px <?= $USER_accent ?>;
    -moz-box-shadow: 0px 0px 10px <?= $USER_accent ?>;
    box-shadow: 0px 0px 10px <?= $USER_accent ?>;
  }
  input[type=submit]{
    background-color: <?= $USER_accent ?>;
    padding: 10px 20px 10px 20px;
    border: none;
    color: white;
    transition: .2s ease-in-out;
    cursor: pointer;
  }
  input:hover[type=submit], input:focus[type=submit]{
    background-color: <?= $USER_accent_darker ?>;
  }
  
  /*
  input[readonly=readonly]{
    background-color: #F6F6F6;
  }
  */
  
  .icon_files{
    width: 100%;
    margin-right: 5px;
    margin-bottom: 2.5px;
    margin-top: 2.5px;
    padding: 10px;
    border: 1px solid transparent;
    display: inline-block;
    transition: .1s ease-in-out;
    cursor: pointer;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  .icon_files:hover, .selected, .selected_file{
    background-color: rgba(<?= $r_lighter2 ?>, <?= $g_lighter2 ?>, <?= $b_lighter2 ?>, 0.50);
    border: 1px solid <?= $USER_accent ?> !important;
  }
  .icon_files span.title_files{
    font-size: 13pt;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    width: calc(100% - 50px);
    display: inline-block;
    margin-bottom: -5px;
  }
  .icon_files span.subtitle{
    font-size: 13pt;
    display: none;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    width: calc(100% - 70px);
  }
  .icon_files img{
    width: 18px;
    height: 18px;
    float: left;
    margin-right: 10px;
    margin-top: 3px;
  }
  
  .settings_subtitle{
    display: block;
    margin-top: 0px;
    margin-bottom: -20px;
  }
  
  .overlay{
    position: fixed;
    top: 0px;
    left: 0px;
    background-color: rgba(0,0,0,0.3);
    width: 100%;
    height: 100%;
    cursor: default;
    display: none;
    z-index: 9998;
  }
  
  .context{
    position: fixed;
    background-color: <?= $USER_accent ?>;
    color: <?= $COL1 ?>;
    left: auto;
    top: auto;
    width: 100%;
    height: calc(100% - 100px);
    cursor: default;
    display: none;
    z-index: 9999;
    padding-top: 10px;
    padding-bottom: 90px;
    overflow-y: auto;
  }
  .context span, .context a{
    display: block;
    padding: 10px 20px 10px 20px;
    width: calc(100% - 40px);
    cursor: pointer;
    transition: .1s ease-in-out;
    text-decoration: none;
    color: <?= $COL1 ?>;
    margin-bottom: 5px;
  }
  .context span img, .context a img{
    margin-right: 10px;
    width: 14px;
    height: 14px;
  }
  .context span:hover, .context a:hover{
    background-color: <?= $USER_accent_darker ?>;
  }
  .context span.nohover:hover, .context a.nohover:hover{
    background-color: <?= $USER_accent ?>;
  }
  .context .close{
    color: white;
    font-weight: bold;
    display: inline-block;
    margin-right: 10px;
    text-align: center;
    display: block;
  }
  .context_hidden{
    display: none;
    background-color: <?= $USER_accent_darker ?>;
  }
  .context_hidden span:hover, .context_hidden a:hover{
    background-color: <?= $USER_accent_darker2 ?>;
  }
  
  .toast{
    background-color: darkgreen;
    color: white;
    position: fixed;
    top: 0px;
    right: 0px;
    z-index: 9999;
    padding: 16.5px 30px 16.5px 30px;
    display: none;
    cursor: default;
    width: calc(100% - 50px);
  }
  
  .link{
    color: <?= $USER_accent ?>;
    cursor: pointer;
  }
  
  .dialog, .draggable_dialog{
    position: fixed;
    background-color: #F6F6F6;
    display: none;
    border: 1px solid <?= $USER_accent ?>;
    z-index: 9999;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    overflow-x: hidden;
  }
  .dialog .title, .draggable_dialog_title{
    background-color: <?= $USER_accent ?>;
    position: absolute;
    top: 0px;
    left: 0px;
    width: calc(100% - 20px);
    padding: 10px;
    color: <?= $COL1 ?>;
    cursor: default;
  }
  .draggable_dialog_title{
    cursor: move;
  }
  .dialog .content, .draggable_dialog_content{
    margin: 40px 10px 10px 10px !important;
    display: block;
    width: 100%;
    max-width: calc(100% - 30px);
    overflow-y: auto;
    padding: 10px !important;
  }
  .dialog .title span{
    float: right;
    margin-left: 10px;
    cursor: pointer;
  }
  
  .autosuggestion{
    padding: 0px 20px 10px 20px;
    margin: 10px 10px 10px 0px;
    border: 1px solid black;
    border-radius: 0px 0px 10px 10px;
    height: 100%;
    max-height: 130px;
    overflow-y: auto;
    background-color: white;
    display: none;
  }
  .autosuggestion p{
    padding: 5px;
    cursor: pointer;
    transition: .1s ease-in-out;
    margin: -10px;
    margin-top: 3px;
    margin-bottom: 0px;
    display: block;
  }
  .autosuggestion p:hover{
    background-color: <?= $USER_accent ?>;
    color: <?= $COL1 ?> !important;
  }
  
  .warning{
    color: orange;
    font-weight: bold;
  }
  
  .background_agent{
    display: none;
  }
  
  .header .title:focus, .header .title:hover{
    outline: none;
    cursor: text;
  }
  .toolbar{
    top: 50px;
    text-align: center;
    display: none;
    z-index: 998;
    height: auto;
    max-width: 100%;
    overflow-x: auto;
    overflow-y: hidden;
    padding-bottom: 10px;
    padding-top: 10px;
    transition: none;
  }
  .toolbar span{
    display: inline-block;
    margin: 0px;
    margin-right: 10px;
    cursor: pointer;
    padding: 5px;
    transition: .1s ease-in-out;
    padding-bottom: 2.5px;
  }
  .toolbar span:hover{
    background-color: <?= $USER_accent_darker ?> !important;
  }
  .toolbar span.separator{
    cursor: default;
  }
  .toolbar span.separator:hover{
    background-color: transparent !important;
  }
  .toolbar img{
    width: 16px;
    height: 16px;
  }
  .toolbar select{
    padding: 5px;
    border: none;
  }
  .toolbar select:focus{
    outline: none;
  }
  .page{
    width: 100%;
    border: none;
    padding: 20px;
    min-height: 1122px;
    background-color: white;
    margin: 60px -10px 0px -10px;
    overflow-y: auto;
    height: 100%;
  }
  .page:focus{
    outline: none;
  }
  .page .defaultFont{
    margin-bottom: 22px;
  }
  .page table{
    width: 100%;
  }
  
  .add{
    display: inline-block;
    padding: 14.5px 10px 14.5px 10px;
    height: 100%;
    margin-left: 0px;
    font-size: 12pt;
    cursor: pointer;
    transition: .1s ease-in-out;
  }
  .add:hover{
    background-color: <?= $USER_accent_darker ?>;
  }
  .add img{
    transition: .1s ease-in-out;
  }
  .rotate_img_45{
    transform: rotate(45deg);
  }
  .new_menu{
    display: none;
    background-color: <?= $USER_accent_darker ?> !important;
  }
  .new_menu span{
    display: inline-block;
    margin-top: 1px !important;
    padding: 14.5px 10px 14.5px 10px;
    font-size: 12pt;
    cursor: pointer;
    transition: .1s ease-in-out;
    background-color: transparent;
  }
  .new_menu span:hover{
    background-color: <?= $USER_accent_darker2 ?>;
  }
  
  .sidebar{
    position: fixed;
    top: 50px;
    left: 0px;
    width: 100%;
    background-color: <?= $USER_accent ?>;
    color: <?= $COL1 ?>;
    height: 100%;
    overflow-y: auto;
    transition: .2s ease-in-out;
    display: inline-block;
    padding: 0px !important;
    border-left: none !important;
  }
    
  #settings_save{
    margin-right: 100px;
  }
    
  .settings_sidebar{
    height: calc(100% - 100px) !important;
  }
  
  .folder_tree{
    display: inline-block;
    font-size: 11pt;
    overflow-y: auto;
    height: calc(100% - 100px) !important;
  }
  
  .indent_tree{
    padding-left: 30px;
  }
  
  #sidebar_file{
    background-color: white;
    right: 0px;
    left: auto;
    color: black;
    padding: 20px !important;
    border-left: 1px solid black !important;
    transition: none;
    width: 300px !important;
    display: none;
  }
  
  .search_field{
    z-index: 9998;
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 50px;
    background-color: <?= $USER_accent ?>;
    display: none;
  }
  
   .sidebar_span_element{
    display: inline-block;
    padding: 10px 20px 10px 20px;
    cursor: pointer;
    margin-top: 5px;
    margin-bottom: 5px;
    transition: .1s ease-in-out;
    width: calc(100% - 40px);
  }
  .sidebar_span_element:hover{
    background-color: <?= $USER_accent_darker ?>;
  }
  
  .settings_content{
    margin-left: 20px;
    margin-bottom: 70px;
    margin-top: 60px;
  }
  
  .settings_content .tab .tab_content{
    display: none;
    width: calc(100% + 200px);
  }
  .settings_content .tab .tab_content label{
    font-weight: bold;
    display: block;
    margin-right: 0px;
    width: calc(100% - 40px);
    max-width: auto;
    min-width: auto;
    margin-bottom: 5px;
  }
  .settings_content .tab .tab_content input{
    padding: 5px;
    width: calc(100% - 40px);
    <?php if($actually_page == 'settings'){ ?>
      max-width: auto;
    <?php } ?>
    min-width: auto;
    margin-bottom: 15px;
  }
  .settings_content .tab .tab_content#notification_tab label{
    width: 180px !important;
    min-width: 180px !important;
  }
  .settings_content .tab .tab_content#notification_tab input{
    padding: 5px;
    width: 20px !important;
    min-width: 20px !important;
    margin-left: -1px;
    margin-right: 13px;
    margin-bottom: 15px;
  }
  .settings_content .tab .tab_content input[type=checkbox]:focus{
    box-shadow: none !important;
  }
  .settings_content .tab .tab_content br{
    line-height: 40px;
  }
  .settings_content .tab .tab_content select{
    padding: 5px;
    border: 1px solid gray;
    width: calc(100% + 20px);
    max-width: 312px;
    min-width: 100px;
    height: 28px;
    margin-left: -4px;
  }
  .settings_content .tab .tab_content select:focus{
    outline: none;
  }
  .settings_content .tab .tab_content #accentcolor{
    background-color: <?= $USER_accent ?>;
    border: 1px solid <?= $USER_accent ?>;
    color: <?= $USER_accent ?>;
  }
  .palette{
    background-color: #F6F6F6;
    width: auto;
    display: none;
    position: absolute;
    <?php if($actually_page == 'settings'){ ?>
      padding: 10px 3px 5px 10px;
    <?php }elseif($actually_page == 'timetable' or $actually_page == 'diary'){ ?>
      top: 30%;
      left: 45%;
      transform: scaleX(-1) rotate(90deg);
      filter: FlipH;
      -ms-filter: "FlipH";
      padding: 10px 5px 1px 10px;
    <?php } ?>
    border: 1px solid black;
    margin-bottom: 80px;
    z-index: 999;
  }
  .palette span{
    display: inline-block;
    width: 20px;
    height: 20px;
    margin-right: 6.2px;
    margin-bottom: 5px;
    border: 1px solid gray;
    cursor: pointer;
  }
  .palette br{
    line-height: 20px !important;
  }
  
  <?php if($actually_page != 'read'){ ?>
    hr{
      border: 0;
      height: 1px;
      background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
      background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
      background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
      background-image:      -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
    }
  <?php } ?>
  hr.white{
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(255,255,255,0.50), rgba(0,0,0,0));
    background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), rgba(255,255,255,0.50), rgba(0,0,0,0));
    background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), rgba(255,255,255,0.50), rgba(0,0,0,0));
    background-image:      -o-linear-gradient(left, rgba(0,0,0,0), rgba(255,255,255,0.50), rgba(0,0,0,0));
  }
  hr.white_left{
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left, rgba(255,255,255,0.75), rgba(255,255,255,0.20), rgba(0,0,0,0));
    background-image:    -moz-linear-gradient(left, rgba(255,255,255,0.75), rgba(255,255,255,0.20), rgba(0,0,0,0));
    background-image:     -ms-linear-gradient(left, rgba(255,255,255,0.75), rgba(255,255,255,0.20), rgba(0,0,0,0));
    background-image:      -o-linear-gradient(left, rgba(255,255,255,0.75), rgba(255,255,255,0.20), rgba(0,0,0,0));
  }
  
  #timetable span{
    display: inline-block;
    padding: 10px;
    min-width: 150px;
    cursor: pointer;
    color: <?= $USER_accent ?>;
  }
  #timetable span:hover{
    text-decoration: underline;
  }
  #timetable span.day{
    cursor: default;
    width: 100px;
    color: <?= $USER_accent_darker ?>;
    font-weight: bold;
  }
  #timetable span.day:hover{
    text-decoration: none;
  }
  
  :focus{
    outline:none;
  }
  ::-moz-focus-inner{
    border:0;
  }
    
  select{
    padding: 5px;
    border: 1px solid gray;
    width: 100%;
    max-width: 312px;
    min-width: 100px;
    height: 28px;
    transition: .2s ease-in-out;
    background-color: white;
    outline: 0;
  }
  select:focus{
    outline: none;
    -webkit-box-shadow: 0px 0px 10px <?= $USER_accent ?>;
    -moz-box-shadow: 0px 0px 10px <?= $USER_accent ?>;
    box-shadow: 0px 0px 10px <?= $USER_accent ?>;
  }
  select:hover{
    border: 1px solid <?= $USER_accent ?> !important;
  }
  
  input::-moz-focus-inner { 
    border: 0; 
  }
  
  label{
    font-weight: bold;
    display: inline-block;
    margin-bottom: 5px;
  }
  
  .text_min{
    display: inline-block;
  }
  .text_min2{
    display: block;
  }
  .text_complete{
    display: none;
  }
  
  .editor{
    float: right;
    width: 320px;
    margin-right: 30px;
    height: 299px;
  }
  .editor .toolbar{
    display: block;
  }
  .editor .toolbar span:hover img{
    -ms-filter: "Invert";
    -webkit-filter: invert(100%);
    filter: invert(100%);
  }
  .editor div[contenteditable=true]{
    height: 100% !important;
    max-height: calc(100% - 60px) !important;
    min-height: calc(100% - 60px) !important;
    overflow-y: auto;
    padding-top: 10px;
  }
  .editor div[contenteditable=true]:empty:before{
    content:"Scrivi qui i dettagli sull'evento come gli esercizi da eseguire o gli argomenti da studiare per la verifica...";
    cursor: text;
    color: gray;
  }
  .editor div[contenteditable=true]:focus{
    outline: none;
  }
  
  .width_700_important{
    width: 700px !important;
  }
  
  .toolbar select:hover{
    border: none !important;
  }
  
  .dialog_upload .content{
    width: calc(100% - 30px) !important;
    max-width: calc(100% - 30px) !important;
    height: calc(100% - 50px) !important;
    max-height: calc(100% - 50px) !important;
  }
  .dialog_upload .title{
    background-color: transparent !important;
    color: black !important;
  }
  .dialog_upload .content form{
    width: calc(100% - 50px) !important;
    max-width: calc(100% - 50px) !important;
    height: calc(100% - 0px) !important;
    max-height: calc(100% - 0px) !important;
  }
  
  
  .bubble_main_menu{
    background-color: <?= $USER_accent ?>;
    color: <?= $COL1 ?>;
    border: 2px solid <?= $USER_accent_darker ?>;
    -webkit-border-radius: 14px;
    -moz-border-radius: 14px;
    border-radius: 14px;
    cursor: default;
    padding: 25px;
    position: fixed;
    <?php if($USER_taskbar_position == 'bottom'){ ?>
      bottom: 70px;
      left: 13px;
    <?php }elseif($USER_taskbar_position == 'left'){ ?>
      top: 3px;
      left: 65px;
    <?php } ?>
    width: 350px;
    z-index: 9998;
  }
  .bubble_main_menu:after{
    content: '';
    position: absolute;
    border-style: solid;
    display: block;
    width: 0;
    z-index: 1;
    <?php if($USER_taskbar_position == 'bottom'){ ?>
      bottom: -15px;
      left: 16px;
      border-width: 15px 15px 0;
      border-color: <?= $USER_accent_darker ?> transparent;
    <?php }elseif($USER_taskbar_position == 'left'){ ?>
      left: -15px;
      top: 15px;
      border-width: 15px 15px 15px 0;
      border-color: transparent <?= $USER_accent_darker ?>;
    <?php } ?>
  }
  
  .bubble2{
    position: relative;
    background-color: <?= $USER_accent ?>;
    color: <?= $COL1 ?>;
    border: 2px solid <?= $USER_accent_darker ?>;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
  }
  .bubble_left:after{
    content: '';
    position: absolute;
    border-style: solid;
    border-width: 15px 15px 15px 0;
    border-color: transparent <?= $USER_accent_darker ?>;
    display: block;
    width: 0;
    z-index: 1;
    margin-top: -15px;
    left: -15px;
    top: 73%;
  }
  .bubble_right:after{
    content: '';
    position: absolute;
    border-style: solid;
    border-width: 15px 0 15px 15px;
    border-color: transparent <?= $USER_accent_darker ?>;
    display: block;
    width: 0;
    z-index: 1;
    margin-top: -15px;
    right: -15px;
    top: 73%;
  }
  
  .bubble_left{
    padding: 15px;
    bottom: 70px;
    left: 13px;
    width: 350px;
    width: 600px
  }
  .bubble_right{
    padding: 15px;
    bottom: 70px;
    margin-left: auto;
    margin-right: 0px;
    right: 13px;
    width: 350px;
    width: 600px
  }
  
  .messages_list{
    position: fixed;
    left: 0px;
    top: 60px;
    width: 420px;
    padding: 10px;
    height: calc(100% - 140px);
    max-height: calc(100% - 140px);
    min-height: calc(100% - 140px);
    overflow-y: auto;
  }
  .messages_content{
    position: absolute;
    top: 60px;
    margin-left: 420px;
    width: calc(100% - 580px);
    min-width: calc(100% - 580px);
    padding: 90px 50px 50px 50px;
    height: calc(100% - 250px);
    max-height: calc(100% - 250px);
    overflow-y: auto;
    border-left: 1px solid black;
    background-color: transparent;
  }
  .messages_list_element{
    transition: .1s ease-in-out;
    cursor: pointer;
    border: 1px solid transparent;
    margin-bottom: 10px;
    padding: 20px;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  .messages_list_element:hover{
    background-color: <?= $USER_accent_lighter2 ?>;
    border: 1px solid <?= $USER_accent ?>;
  }
  .messages_sender, .messages_subject, .messages_date{
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
  .messages_sender{
    font-size: 15pt;
    font-family: 'Roboto';
    display: inline-block;
    margin-top: -5px;
  }
  .messages_count{
    float: right;
  }
  .messages_subject, .messages_date{
    font-size: 10pt;
  }
  .messages_date{
    text-align: right;
  }
  
  /* icons for buttons */
  .icon-16{
    background-size: 16px 16px;  /* dimensioni sfondo */
    background-repeat: no-repeat;  /* immagine ripetuta solo una volta */
    background-position: 10px 10px;  /* spaziatura da sinistra e alto */
    cursor: pointer;        /* puntatore come link */
    padding-left: 33px;     /* testo a destra dell immagine */
    vertical-align: middle; /* testo al centro verticalmente */
  }
  .icon-16-3-position{
    background-size: 16px 14px;  /* dimensioni sfondo */
    background-repeat: no-repeat;  /* immagine ripetuta solo una volta */
    background-position: 3px 0px;  /* spaziatura da sinistra e alto */
    cursor: pointer;        /* puntatore come link */
    padding-left: 33px;     /* testo a destra dell immagine */
    vertical-align: middle; /* testo al centro verticalmente */
  }
  
  .icon-word-16{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/word.png");
  }
  .icon-pdf-16{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/pdf.png");
  }
  .icon-rtf-16{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/files.png");
  }
  .icon-html-16{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set1 ?>/html.png");
  }
  
  .icon-tick-16{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $USER_icon_set2 ?>/tick.png");
  }
  
  .diary_day{
    background-color: transparent;
    cursor: pointer;
    transition: .1s ease-in-out;
    height: 30px;
    max-height: 30px;
    min-height: 30px;
    padding: 0px;
    background-repeat: no-repeat;  /* immagine ripetuta solo una volta */
  }
  .diary_day:hover{
    background-color: <?= $USER_accent_lighter2 ?>;
  }
  .diary_day span{
    color: <?= $USER_accent ?>;
  }
  .diary_day_current{
    background-color: <?= $USER_accent_lighter ?>;
    color: <?= $COL1 ?>;
  }
  .diary_day_current_lighter{
    background-color: <?= $USER_accent_lighter2 ?>;
    color: <?= $COL2 ?>;
  }
  .diary_day_current:hover{
    background-color: <?= $USER_accent_darker ?> !important;
    color: <?= $COL1 ?>;
  }
  .diary_day_current_lighter:hover{
    background-color: <?= $USER_accent_lighter ?> !important;
    color: <?= $COL1 ?> !important;
  }
  .diary_day_current span{
    color: <?= $COL1 ?> !important;
  }
  
  /* images for diary */
  .diary-easter{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/diary/easter2.png");
    background-size: 42px 52px;  /* dimensioni sfondo */
    background-position: right 10px bottom 10px;  /* spaziatura da sinistra e alto */
  }
  .diary-antifascismo{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/diary/antifascismo.png");
    background-size: 42px 42px;  /* dimensioni sfondo */
    background-position: right 10px bottom 10px;  /* spaziatura da sinistra e alto */
  }
  
  .register_icon{
    display: inline-block;
    width: 330px;
    height: 140px;
    padding: 20px;
    margin-right: 20px;
    margin-bottom: 20px;
    transition: .2s ease-in-out;
    cursor: default;
  }
  .register_icon:hover{
    background-color: <?= $USER_accent_lighter2 ?>;
  }  
  .register_icon .register_name{
    font-size: 20pt;
    font-family: 'Roboto';
    display: inline-block;
    margin-bottom: 10px;
    max-width: 100%;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    margin-left: -20px;
  }
  .register_icon a{
    text-decoration: none;
    color: <?= $USER_accent ?>;
    display: inline-block;
    margin-bottom: 15px;
    width: 160px;
  }
  .register_icon img{
    width: 18px;
    height: 18px;
    float: left;
    margin-right: 5px;
  }
  
  .register_lessons_sidebar{
    height: calc(100% - 100px);
    display: none;
  }
  .register_content{
    margin-left: 0px;
    margin-top: 60px !important;
    width: 100%;
  }
  .sidebar_photo{
    width: 100%;
    text-align: center;
    cursor: pointer;
    height: 200px;
    background-size: cover;
  }
  .sidebar_no_photo{
    padding-top: 40px;
    padding-bottom: 40px;
    height: auto;
    background-color: <?= $USER_accent_darker ?>;
  }
  .sidebar_stat{
    padding: 40px;
  }
  
  .tab{
    <?php if($actually_page == 'settings'){ ?>
      margin-left: 0px;
      width: calc(100% - 70px);
      border: none;
      padding: 0px;
    <?php }else{ ?>
      border: 1px solid black;
      border-radius: 10px;
      cursor: default;
      min-width: 200px;
      width: calc(100% + 25px);
    <?php } ?>
  }
  .tabs{
    border-bottom: 1px solid black;
    padding: 0px 20px 0px 20px;
  }
  .tabs a, .tabs span{
    padding: 10px 20px 10px 20px;
    transition: .1s ease-in-out;
    display: inline-block;
    cursor: pointer;
    outline: none;
  }
  .tabs a:hover, .tabs a:focus, .tabs span:hover, .tabs .selected{
    border: none !important;
    background-color: <?= $USER_accent ?>;
    color: <?= $COL1 ?>;
  }
  .tab_content{
    padding: 0px;
  }
  .tab_tab{
    display: none;
  }
  .register_surname_and_name{
    display: inline-block;
    width: calc(100% - 80px);
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    padding-left: 63px;
  }
  
  .list_item{
    padding: 10px;
    transition: .1s ease-in-out;
    cursor: pointer;
  }
  .list_item:hover, .list_item_selected{
    background-color: <?= $USER_accent ?>;
    color: <?= $COL1 ?>;
  }
  .tabs .selected:hover{
    background-color: <?= $USER_accent_darker ?>;
    color: <?= $COL1 ?>;
  }
  
  .assent_highlight{
    background-color: #F4CCCC;
  }
  .assent_highlight:hover{
    background-color: #e68d8d;
    color: black;
  }
  
  .emergency{
    background-color: red;
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    z-index: 99999999999;
    display: none;
  }
  
  .folder_content_after_tree{
    margin-left: 0px;
  }
  
  /* meccanismo bottoni */
  <?php if($USER_button_style == 'img'){ ?>
    .button_text{
      display: none !important;
    }
  <?php } ?>
  
  <?php if($USER_button_style == 'text'){ ?>
    .button_img{
      display: none;
    }
  <?php } ?>
  
  .header select{
    background-color: <?= $USER_accent ?>;
    border: 1px solid <?= $USER_accent ?>;
    color: <?= $COL1 ?>;
    -webkit-appearance: none;
    -moz-appearance: none;
    text-indent: 1px;
    text-overflow: '';
    font-size: 12pt;
    background-repeat: no-repeat;
    background-size: 16px 16px;
    background-position: 0px 7px;
    padding-left: 15px;
    margin-left: 20px;
    transition: .2s ease-in-out;
    cursor: pointer;
  }
  .header select:hover, .header select:focus{
    background-color: <?= $USER_accent_darker ?>;
    border: 1px solid <?= $USER_accent_darker ?>;
  }
  .header select::-ms-expand{
    display: none;
  }
  
  select.sort{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $COL1 ?>/sort.png");
    width: 80px !important;
  }
  select.view{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $COL1 ?>/view.png");
    width: 100px;
  }
  
  .count_selected{
    display: inline;
    position: relative;
    float: right;
    margin: -10px;
    background-color: <?= $USER_accent_lighter2 ?>;
    padding: 5px;
    display: none;
  }
  
  .mark{
    display: inline-block;
    padding: 5px;
    width: 30px;
    text-align: center;
  }
  .mark_perfect{
    color: white;
    background-color: blue;
  }
  .mark_good{
    color: white;
    background-color: darkgreen;
  }
  .mark_soso{
    color: white;
    background-color: orange;
  }
  .mark_bad{
    color: white;
    background-color: red;
  }
  
  .search_panel{
    position: fixed;
    top: 50px;
    right: 0px;
    z-index: 9997;
    display: none;
    background-color: <?= $USER_accent ?>;
    color: <?= $COL1 ?>;
    padding: 15px;
  }
  .search_panel label{
    font-weight: normal;
    display: inline-block;
    margin-right: 10px;
  }
  .search_panel checkbox{
    margin-right: 10px;
  }
  
  .dropdown_menu{
    height: 100%;
    display: inline-block;
    margin-left: 10px;
  }
  .dropdown_menu div{
    display: inline-block;
    padding: 15px 20px;
    margin: 0px -3px;
    cursor: pointer;
    transition: .15s ease-in-out;
  }
  .dropdown_menu div:hover{
    background-color: <?= $USER_accent_darker ?>;
  }
  
  .dialog_close{
    width: 16px;
    height: 16px;
    float: right;
    cursor: pointer;
  }
  
  .dropdown_sub_menu{
    position: fixed;
    display: none;
    background-color: white;
    border: 1px solid black;
    border-top: none;
    border-radius: 0px 0px 10px 10px;
    min-width: 200px;
  }
  .dropdown_sub_menu .menu{
    padding: 10px 20px;
    cursor: pointer;
    margin: 10px 0px;
    transition: .15s ease-in-out;
  }
  .dropdown_sub_menu .menu:hover{
    background-color: <?= $USER_accent ?>;
    color: <?= $COL1 ?>;
  }
  
  #dialogInformazioni{
    max-width: 500px;
  }
  
  .cookie_bar{
    position: fixed;
    top: 0px;
    left: 0px;
    padding: 20px;
    width: calc(100% - 40px);
    background-color: #F6F6F6;
    z-index: 99999999999;
    cursor: default;
    text-align: center;
    display: none;
  }
  
  .font_title{
    font-family: 'Roboto', arial, tahoma, sans-serif;
    font-size: 20pt;
  }
  
  .horizontal_slider_selector{
    display: inline-block;
    overflow-x: auto;
    width: 100%;
    border: 1px solid lightgray;
    padding: 10px;
  }
  .horizontal_slider_selector > div{
    display: inline-block;
    cursor: pointer;
    padding: 10px;
    margin-right: 20px;
    transition: .2s ease-in-out;
  }
  .horizontal_slider_selector > div:hover{
    background-color: <?= $USER_accent_lighter2 ?>;
  }
  .horizontal_slider_selector > div > span{
    display: block;
    text-align: center;
  }
  .horizontal_slider_selector > div > img{
    display: inline-block;
    width: 32px;
    height: 32px;
    margin-right: 10px;
  }
  
  .group_title{
    display: block;
    margin-top: -2px;
    width: 300px;
  }
</style>
<div class="context" id="context">
  <span class="nohover">Caricamento...</span>
</div>
<div class="context context_app" id="contextapp">
  <span class="nohover">Caricamento...</span>
</div>
<div class="overlay" id="context_overlay" onclick="closecontext()" oncontextmenu="return false"></div>
<div class="overlay" id="contextapp_overlay" onclick="closecontextapp()" oncontextmenu="return false"></div>
<div class="overlay" id="dialog_overlay" oncontextmenu="return false"></div>
<div class="toast" onclick="$('.toast').slideUp(400)"></div>
<script type="text/javascript">
  function zoominqr(){
    $('#qrcode_img').css('position', 'relative');
    $('#qrcode_img').css('top', '-20px');
    $('#qrcode_img').css('right', '-20px');
    $('#qrcode_img').css('width', '100%');
    $('#qrcode_img').css('height', 'auto');
  }
  function zoomoutqr(){
    $('#qrcode_img').css('position', 'initial');
    $('#qrcode_img').css('top', 'initial');
    $('#qrcode_img').css('right', 'initial');
    $('#qrcode_img').css('width', '50px');
    $('#qrcode_img').css('height', '50px');
  }
  function imgError(image){
    $(image).attr('src', '<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $COL2 ?>/unknown_file.png');
    $(image).css('padding', '5px');
  }
      
  function closeDialog(){
    $('.dialog').fadeOut(200);
    $('#dialog_overlay').fadeOut(200);
  }
  
  function closeSidebar(){
    $("#sidebar_file").effect('slide', { direction: 'right', mode: 'hide' }, 300);
    $('body').removeClass('body_sidebar');
  }
</script>