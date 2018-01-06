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
} ?>
<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="<?= $MY_MAIN_DIRECTORY ?>/js/jquery.cookie.js"></script>
<script type="text/javascript">
  $(document).keyup(function(e){
    if (e.keyCode == 27) {
      if($('.dialog').is(':visible')) {
	closeDialog();
      }else{
	if($('.context').is(':visible')) {
	  closecontext();
	}else{	  
	  closeSidebar();
	}
      }
    }
  });
</script>
<?php include_once "hint_css.php"; ?>
<style type="text/css">
  @import url(//fonts.googleapis.com/css?family=Roboto:300);
  *{
    font-family: arial, tahoma, sans-serif;
  }
  /*
  html{
    background-image: url("<?= $UPLOAD_CURRENT_MAIN_DIRECTORY ?>/<?= $target_path ?>/<?= $USER_background ?>");
    margin: none;
    height: calc(100% + 0px) !important;
  }
  body{
    background-color: rgba(255,255,255, <?= $USER_transparent ?>);
    height: 100% !important;
    margin: -10px;
    padding-top: 20px;
    width: calc(100% + 10px);
  }*/
  html{
    background-color: #F6F6F6;
  }
  body{
    margin: 0 auto;
    margin-top: 20px;
    margin-bottom: 20px;
    min-width: 500px;
    width: 100%;
    max-width: 800px;
    border: 1px solid black;
    border-radius: 10px;
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
    border: none !important;
    border-bottom: 1px solid black !important;
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
    padding: 10px 30px 10px 30px;
    font-size: 11pt;
    border: none;
    transition: .2s ease-in-out;
    margin-bottom: 10px;
    margin-right: 10px;
  }
  button:hover, button:focus, input[type=button]:hover, input[type=button]:focus{
    background-color: <?= $USER_accent_darker ?>;
    border: none;
  }
  
  @media screen and (min-width:630px) {
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
    }
    
    .context_app{
      height: 150px !important;
    }
    
    .dialog{
      top: 50% !important;
      left: 50% !important;
      transform: translateY(-50%) translateX(-49%);
      width: auto !important;
      height: auto !important;
      position: absolute !important;
    }
    .dialog .content{
      width: 100% !important;
      min-width: 100px !important;
      max-width: 400px !important;
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
      width: 225px !important;
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
      padding: 30px 30px 30px 30px !important;
    }
    .text_min{
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
    
    .main_menu{
      padding: 40px !important;
    }
  }
  .header, .taskbar{
    z-index: 9996;
    cursor: default;
    white-space: nowrap;
    transition: .2s ease-in-out;
  }
    
  .header{
    position: relative;
    top: 0px;
    left: 0px;
    width: 100%;
    color: <?= $COL1 ?>;
    font-family: open-sans-light;
    background-color: <?= $USER_accent ?>;
    padding: 0px;
    margin: 0px;
    height: 50px;
    border-radius: 8px 8px 0px 0px;
    overflow-x: auto;
    overflow-y: hidden;
  }
  .header a{
    color: <?= $COL1 ?>;
  }
  .header .title{
    font-size: 20pt;
    padding: 10px 10px 10px 20px;
    font-family: open-sans-light, arial, tahoma, sans-serif;
  }
  .header .title img{
    width: 25px;
  }
  .header .tray{
    position: relative;
    top: 10px;
    right: 10px;
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
    width: calc(100% - 600px) !important;
    box-shadow: none;
  }
  
  .main_menu{
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    background-color: <?= $USER_accent ?>;
    padding: 10px;
    z-index: 9996;
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
    top: 0px;
    left: 0px;
    height: 100%;
    width: 40px;
    color: <?= $COL1 ?>;
    font-family: open-sans-light;
    padding-bottom: 10px;
    background-color: <?= $USER_accent ?>;
    padding-left: 10px;
    overflow-x: hidden;
    overflow-y: auto;
  }
  .taskbar .app{
    display: block;
    padding: 10px;
    width: 2%;
    transition: .2s ease-in-out;
    text-align: center;
    min-width: 40px;
    cursor: pointer;
    margin-left: -17px !important;
    margin-bottom: 10px;
  }
  .taskbar .app:hover, .taskbar .app.selected{
    background-color: <?= $USER_accent_darker ?>;
    outline: none;
  }
  .taskbar .app img{
    padding-top: 3px;
    width: 25px;
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
  
  #notebook_title:empty:before{
    content: "Scrivi qui gli appunti rapidi...";
    cursor: text;
    color: gray;
  }
  
  #q{
    background: white url("<?= $IMAGES_MAIN_DIRECTORY ?>/black/search2.png") 6px 6px no-repeat;
    padding-left: 25px;
    width: 100px;
    transition: .2s ease-in-out;
  }
  #q:hover, #q:focus{
    width: 250px;
  }
  
  .content{
    padding: 70px 30px 60px 10px;
    border-radius: 0px 0px 8px 8px;
    background-color: white;
  }
  
  #EmailAddress{
    background: white url("<?= $IMAGES_MAIN_DIRECTORY ?>/black/email.png") 8px 9px no-repeat;
    padding-left: 40px;
  }
  #Password{
    background: white url("<?= $IMAGES_MAIN_DIRECTORY ?>/black/password2.png") 8px 9px no-repeat;
    padding-left: 40px;
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
  
  
  input{
    border: 1px solid gray;
    padding: 7px;
    font-size: 11pt;
    transition: .2s ease-in-out;
    margin-bottom: 10px;
  }
  input:hover, input:focus{
    border: 1px solid <?= $USER_accent ?>;
    outline: none;
  }
  input:focus{
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
  
  .sidebar{
    position: fixed;
    top: 50px;
    right: 0px;
    width: 300px;
    height: 100%;
    padding: 20px;
    background-color: white;
    display: none;
    border-left: 1px solid black;
  }
  
  #sidebar_file{
    display: none;
  }
  
  .icon_files{
    width: 100%;
    margin-right: 5px;
    margin-bottom: 5px;
    padding: 10px;
    border: 1px solid transparent;
    display: inline-block;
    transition: .1s ease-in-out;
    cursor: pointer;
  }
  .icon_files:hover, .icon_files:focus, .selected{
    background-color: rgba(<?= $r_lighter2 ?>, <?= $g_lighter2 ?>, <?= $b_lighter2 ?>, 0.50);
    border: 1px solid <?= $USER_accent ?>;
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
  }
  .icon_files img{
    width: 18px;
    height: 18px;
    float: left;
    margin-right: 10px;
    margin-top: 3px;
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
    top: 0px;
    left: 0px;
    background-color: <?= $USER_accent ?>;
    color: <?= $COL1 ?>;
    width: 100%;
    height: 100%;
    cursor: default;
    display: none;
    z-index: 9999;
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .context span, .context a{
    display: block;
    padding: 10px 20px 10px 20px;
    width: calc(100% - 40px);
    cursor: pointer;
    transition: .1s ease-in-out;
    text-decoration: none;
    color: <?= $COL1 ?>;
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
  
  .dialog{
    position: fixed;
    background-color: white;
    display: none;
    border: 1px solid <?= $USER_accent ?>;
    z-index: 9999;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
  }
  .dialog .title{
    background-color: <?= $USER_accent ?>;
    position: absolute;
    top: 0px;
    left: 0px;
    width: calc(100% - 20px);
    padding: 10px;
    color: <?= $COL1 ?>;
    cursor: default;
  }
  .dialog .content{
    margin: 40px 10px 10px 10px !important;
    display: block;
    width: 100%;
  }
  .dialog .title span{
    float: right;
    font-weight: bold;
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
    background-color: <?= $USER_accent ?>;
  }
  .new_menu span{
    display: inline-block;
    margin-top: 1px !important;
    padding: 14.5px 10px 14.5px 10px;
    font-size: 12pt;
    cursor: pointer;
    transition: .1s ease-in-out;
    background-color: <?= $USER_accent ?>;
  }
  .new_menu span:hover{
    background-color: <?= $USER_accent_darker ?>;
  }
  
  .sidebar{
    position: fixed;
    top: 50px;
    left: 0px;
    width: 200px;
    background-color: <?= $USER_accent ?>;
    color: <?= $COL1 ?>;
    height: 100%;
    overflow-y: auto;
    transition: .2s ease-in-out;
    display: inline-block;
    padding: 0px !important;
    border-left: none !important;
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
    width: 300px;
  }
  
  .settings .sidebar span, .folder_tree span{
    display: inline-block;
    padding: 10px 20px 10px 20px;
    cursor: pointer;
    margin-top: 5px;
    margin-bottom: 5px;
    transition: .1s ease-in-out;
    width: calc(100% - 40px);
  }
  .settings .sidebar span:hover, .folder_tree span:hover{
    background-color: <?= $USER_accent_darker ?>;
  }
  
  .settings .content{
    margin-left: 230px !important;
    margin-bottom: 70px !important;
  }
  
  .settings .content .tab{
    margin-top: 30px;
    margin-left: 80px;
    background-color: white;
    padding: 40px;
    border: 1px solid black;
  }
  
  .settings .content .tab .tab_content{
    display: none;
  }
  .settings .content .tab .tab_content label{
    font-weight: bold;
    display: inline-block;
    margin-right: 20px;
    width: 100%;
    max-width: 300px;
    min-width: 100px;
    margin-bottom: 5px;
  }
  .settings .content .tab .tab_content input{
    padding: 5px;
    width: 100%;
    max-width: 300px;
    min-width: 100px;
    margin-bottom: 15px;
  }
  .settings .content .tab .tab_content#notification_tab label{
    width: 180px !important;
    min-width: 180px !important;
  }
  .settings .content .tab .tab_content#notification_tab input{
    padding: 5px;
    width: 20px !important;
    min-width: 20px !important;
    margin-left: -1px;
    margin-right: 13px;
    margin-bottom: 15px;
  }
  .settings .content .tab .tab_content input[type=checkbox]:focus{
    box-shadow: none !important;
  }
  .settings .content .tab .tab_content br{
    line-height: 40px;
  }
  .settings .content .tab .tab_content select{
    padding: 5px;
    border: 1px solid gray;
    width: calc(100% + 20px);
    max-width: 312px;
    min-width: 100px;
    height: 28px;
    margin-left: -4px;
  }
  .settings .content .tab .tab_content select:focus{
    outline: none;
  }
  .settings .content .tab .tab_content #accentcolor{
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
      top: 227px;
      left: 679px;
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
    z-index: 99999;
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
  
  hr{
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
    background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
    background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
    background-image:      -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
  }
  hr.white{
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(255,255,255,0.75), rgba(0,0,0,0));
    background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), rgba(255,255,255,0.75), rgba(0,0,0,0));
    background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), rgba(255,255,255,0.75), rgba(0,0,0,0));
    background-image:      -o-linear-gradient(left, rgba(0,0,0,0), rgba(255,255,255,0.75), rgba(0,0,0,0));
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
  
  /* icons for buttons */
  .icon-16{
    background-size: 16px 16px;  /* dimensioni sfondo */
    background-repeat: no-repeat;  /* immagine ripetuta solo una volta */
    background-position: 10px 10px;  /* spaziatura da sinistra e alto */
    cursor: pointer;        /* puntatore come link */
    padding-left: 33px;     /* testo a destra dell immagine */
    vertical-align: middle; /* testo al centro verticalmente */
  }
  
  .icon-word-16{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $COL1 ?>/word.png");
  }
  .icon-pdf-16{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $COL1 ?>/pdf.png");
  }
  .icon-rtf-16{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $COL1 ?>/files.png");
  }
  .icon-html-16{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/<?= $COL1 ?>/html.png");
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
</style>
<div class="context" id="context">
  <span class="nohover">Caricamento...</span>
</div>
<div class="context context_app" id="contextapp">
  <span class="nohover">Caricamento...</span>
</div>
<div class="overlay" id="context_overlay" onclick="closecontext()">
  
</div>
<div class="overlay" id="contextapp_overlay" onclick="closecontextapp()">
  
</div>
<div class="overlay" id="dialog_overlay">
  
</div>
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
</script>