<!-- tag base -->
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LightSchool">
    <meta name="author" content="Francesco Sorge">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>

    <!-- librerie aggiuntive -->
    <script src="<?= $MY_DIRECTORY ?>/Library/modernizr.js" type="text/javascript"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:500,400,300' rel='stylesheet' type='text/css'>
    <link href='https://code.jquery.com/ui/1.10.4/themes/black-tie/jquery-ui.css' rel='stylesheet' type='text/css'>
    <script src="<?= $MY_DIRECTORY ?>/Library/CookieManager.js"></script>

    <!-- stili di LightSchool -->
    <style type="text/css">
      html, body{
	padding: 0px;
	margin: 0px;
	font-size: 11pt;
	word-wrap: break-word;
	height: 100%;
	transition: .2s ease-in-out;
      }
      body{
	<?php if($_SESSION['Username'] != ''){ ?>
	  background-image: url("<?php echo("$USER_background") ?>");
	<?php } ?>
	background-size: cover;
	background-repeat: no-repeat;
	background-attachment: fixed;
      }
      
      .hide_scrollbar::-webkit-scrollbar{
	overflow-y: scroll;
      }
      .hide_scrollbar::-webkit-scrollbar{
	display: none;
      }
      
      .mobile{
	display: none;
      }
      .pc{
	display: block;
      }
      
      img{
	margin-right: 10px;
      }
      img.logo{
	width: 40px;
	height: 40px;
	float: left;
	margin-right: 10px;
      }
      
      .outer{
	display: table;
	position: absolute;
	height: 100%;
	width: 100%;
      }
      .middle{
	display: table-cell;
	vertical-align: middle;
      }
      .inner{
	margin-left: auto;
	margin-right: auto; 
	width: 100%;
	max-width: 800px;
	
      }
      
      h1, h2, h3, h4, h5, h6{
	padding: 0px;
	margin: 0px;
	font-family: 'Roboto';
	font-weight: 300;
      }
      
      input, select{
	margin: 5px 0px;
	padding: 5px;
	border: 1px solid lightgray;
	background-color: white;
	transition: .2s ease-in-out;
	color: black;
      }
      input:focus, select:focus{
	outline: none;
	box-shadow: 0px 0px 10px 0px <?= $USER_accent_darker ?>;
      }
      form.login > input{
	width: 100%;
      }
      input[type=submit], button{
	background-color: <?= $USER_accent ?>;
	border: 1px solid <?= $USER_accent_darker2 ?>;
	color: <?= $COL1 ?>;
	padding: 5px 20px;
      }
      
      .desktop{
	display: block;
	width: 100%;
	height: calc(100% - 50px);
      }
      
      .taskbar, .main_menu{
	position: fixed;
	bottom: 0px;
	left: 0px;
	width: 100%;
	background-color: rgba(<?= $r ?>, <?= $g ?>, <?= $b ?>, 0.8);
	color: white;
	z-index: 996;
      }
      .taskbar a, .taskbar span, .main_menu a, .main_menu span{
	display: inline-block;
	margin: 0px 5px;
	padding: 13px 15px 15px 15px;
	cursor: pointer;
	height: 50px;
	color: white;
      }
      .taskbar a:hover, .taskbar span:hover, .app_selected{
	transition: .2s ease-in-out;
	background-color: rgba(<?= $r_darker ?>, <?= $g_darker ?>, <?= $b_darker ?>, 0.7);
      }
      .taskbar img{
	width: 24px;
	height: 24px;
	margin-right: 0px;
      }
      .main_menu > .user > *{
	color: <?= $COL1 ?>;
      }
      .main_menu > .user img{
	width: 20px;
	height: 20px;
	margin-right: 10px;
	margin-top: 10px;
	cursor: pointer;
      }
      .taskbar > .tray{
	float: right;
      }
      .main_menu{
	display: none;
	max-width: 400px;
	width: 100%;
	max-height: 501px;
	height: 100%;
	overflow-x: hidden;
	overflow-y: auto;
	z-index: 996;
	border-top: 1px solid <?= $USER_accent_darker ?>;
	border-right: 1px solid <?= $USER_accent_darker ?>;
      }
      .main_menu > div{
	width: calc(100% - 40px);
	margin: 10px;
	margin-left: 20px;
	cursor: default;
      }
      .main_menu > .apps{
	height: 100%;
	max-height: 370px;
	overflow-y: auto;
	margin: 0px;
	margin-top: 20px;
	margin-left: -5px;
	width: calc(100% + 5px);
      }
      .main_menu > .apps > div{
	display: none;
      }
      .main_menu > .apps span{
	display: block;
	transition: .2s ease-in-out;
	padding-left: 20px;
	color: <?= $COL1 ?>;
	width: calc(100% - 5px);
      }
      .main_menu > .apps span:hover{
	background-color: rgba(<?= $r_darker ?>, <?= $g_darker ?>, <?= $b_darker ?>, 0.7);
      }
      .main_menu > .apps span > img{
	width: 20px;
	height: 20px;
	float: left;
      }
      .tray_clock{
	text-align: center;
      }
      
      .round{
	border-radius: 50%;
      }
      .container{
	background-color: rgba(255, 255, 255, 0.8);
      }
      
      .toast{
	position: fixed;
	top: 20px;
	right: -400px;
	width: 400px;
	height: 100px;
	background-color: <?= $USER_accent ?>;
	border: 1px solid <?= $USER_accent_darker ?>;
	padding: 10px 20px;
	color: <?= $COL1 ?>;
	cursor: pointer;
	z-index: 996;
      }
      .toast > btitle{
	font-size: 15pt;
	display: block;
	font-family: 'Roboto';
	font-weight: 300;
      }
      .toast > bdescr{
	display: block;
      }
      
      .truncate, .context > span, .tab > span, .tab > a{
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
      }
      
      .context{
	display: none;
	position: fixed;
	top: 0px;
	left: 0px;
	background-color: rgba(<?= $r ?>, <?= $g ?>, <?= $b ?>, 0.8);
	padding: 10px 0px;
	color: <?= $COL1 ?>;
	min-width: 250px;
	max-width: 400px;
	font-size: 12pt;
	z-index: 996;
      }
      .context span{
	display: block;
	padding: 10px 20px;
	width: 100%;
	transition: .1s ease-in-out;
	cursor: pointer;
      }
      .context span:hover{
	background-color: rgba(<?= $r_darker ?>, <?= $g_darker ?>, <?= $b_darker ?>, 0.7);
      }
      .context span img{
	float: left;
	width: 14px;
	height: 14px;
	margin-right: 10px;
	margin-top: 3px;
      }
      .context > .sub{
	background-color: <?= $USER_accent_darker ?>;
	padding: 10px 0px;
	margin: 10px 0px 0px 0px;
      }
      .context > .sub > span:hover{
	background-color: <?= $USER_accent_darker2 ?>;
      }
      
      .dialog{
	position: fixed;
	top: 0px;
	left: 0px;
	min-width: 400px;
	min-height: 150px;
	background-color: white;
	cursor: default;
	border: 1px solid <?= $USER_accent_darker2 ?>;
	display: none;
      }
      .dialog > .titlebar{
	position: relative;
	background-color: <?= $USER_accent_lighter ?>;
	color: <?= $COL1 ?>;
	text-align: center;
	padding: 0px;
	z-index: 997;
      }
      .dialog > .titlebar > .window_titlebar{
	display: inline-block;
	margin: 10px 10px 4px 10px;
	max-width: calc(100% - 150px);
      }
      .ui-draggable-dragging{
	cursor: move;
      }
      .dialog_selected > .titlebar{
	background-color: <?= $USER_accent ?>;
      }
      .dialog > .titlebar img{
	width: 38px;
	height: 38px;
	opacity: 1;
	padding: 12px;
	transition: .1s ease-in-out;
	cursor: pointer;
	margin: 0px;
      }
      .dialog > .titlebar img.create{
	padding: 10px;
      }
      .dialog > .titlebar img:hover{
	background-color: <?= $USER_accent ?>;
      }
      .dialog_selected > .titlebar img:hover{
	background-color: <?= $USER_accent_darker ?>;
      }
      .dialog > .titlebar img.close:hover{
	background-color: #DF0101;
      }
      .dialog > .content{
	overflow-y: auto;
	height: calc(100% - 41px);
      }
      .right_control{
	float: right;
      }
      .left_control{
	float: left;
      }
      
      .separator_with_text{
	width: 100%;
	height: 20px;
	border-bottom: 1px solid lightgray;
	margin-bottom: 20px;
      }
      .separator_with_text > :first-child{
	display: inline-block;
	padding: 5px 10px 5px 0px;
	background-color: white;
	color: gray;
      }
      
      .ui-icon-gripsmall-diagonal-se{
	background-color: white;
      }
      
      .icon{
	display: inline-block;
	padding: 10px;
	text-align: center;
	cursor: pointer;
	transition: .1s ease-in-out;
	border: 1px solid transparent;
	margin: 5px 5px 5px 0px;
      }
      .icon:hover{
	background-color: <?= $USER_accent_lighter2 ?>;
	border: 1px solid <?= $USER_accent_lighter ?>;
      }
      .icon > img{
	width: 32px;
	height: 32px;
	margin: 0 auto;
	display: block;
	margin-bottom: 5px;
      }
      
      a, .link{
	text-decoration: none;
	color: <?= $USER_accent_text ?>;
	cursor: pointer;
      }
      a:hover, .link:hover{
	text-decoration: underline;
	color: <?= $USER_accent_darker ?>;
      }
      
      .element_chooser{
	width: 100%;
	height: 300px;
	padding: 20px;
	border: 1px solid black;
	overflow-y: scroll;
      }
      .element_chooser > *{
	width: 150px;
	height: 100px;
	margin-right: 10px;
	margin-bottom: 10px;
	cursor: pointer;
	border: 4px solid transparent;
	border-radius: 10px;
	display: inline-block;
      }
      .element_chooser > *.selected{
	border: 4px solid <?= $USER_accent_text ?>;
      }
      .choose_color > *{
	width: 32px;
	height: 32px;
	margin: 10px;
      }
      .choose_icon > *{
	width: auto;
	height: auto;
	margin: 10px 10px 10px 0px;
	padding: 0px 10px 10px 10px;
	text-align: center;
      }
      .choose_icon > * > img{
	width: 22px;
	height: 22px;
	margin: 20px 10px 10px 10px;
      }
      
      .file_explorer{
	width: calc(100% - 200px);
      }
      .file_explorer > span, .folder_tree > span{
	display: inline-block;
	width: 100%;
	max-width: 250px;
	margin-right: 5px;
	margin-bottom: 5px;
	cursor: pointer;
	transition: .1s ease-in-out;
	border: 1px solid transparent;
	padding: 10px;
      }
      .file_explorer > span:hover{
	background-color: <?= $USER_accent_lighter2 ?>;
	border: 1px solid <?= $USER_accent ?>;
      }
      .file_explorer img, .folder_tree img{
	padding: 3px;
	width: 36px;
	height: 36px;
	float: left;
	margin-right: 10px;
      }
      .file_explorer .first_row, .folder_tree .first_row{
	font-size: 11pt;
	font-family: 'Roboto';
	display: block;
	width: calc(100% - 56px);
	font-weight: 500;
      }
      .file_explorer .second_row{
	font-size: 10pt;
	display: block;
	width: calc(100% - 56px);
      }
      
      .tab-content{
	padding: 10px;
	border: 1px solid #DDDDDD;
	border-top: 0px;
      }
      
      .folder_tree{
	background-color: <?= $USER_accent_lighter ?>;
	color: <?= $COL1 ?>;
      }
      .dialog_selected .folder_tree{
	background-color: <?= $USER_accent ?>;
      }
      .folder_tree span{
	display: block;
	margin-bottom: 5px;
	width: 100%;
	max-width: 100%;
	cursor: pointer;
	transition: .1s ease-in-out;
	padding: 5px;
	padding-bottom: 2px;
      }
      .folder_tree span:hover{
	background-color: <?= $USER_accent ?>;
      }
      .dialog_selected .folder_tree span:hover{
	background-color: <?= $USER_accent_darker ?>;
      }
      .folder_tree img{
	width: 22px;
	height: 22px;
	margin-top: 4px;
	margin-right: 2px;
	margin-left: 10px;
      }
      .folder_tree .first_row{
	width: calc(100% - 40px);
	font-weight: 400;
      }
      .folder_tree .second_row{
	display: none;
      }
      
      label{
	font-weight: bold;
	width: 100%;
	max-width: 200px;
	margin-right: 10px;
	margin-bottom: 5px;
      }
      .window_panel.language label, .window_panel.notifications label{
	font-weight: normal;
      }
      .window_panel.language select{
	min-width: 200px;
	width: 100%;
	max-width: 350px;
      }
      
      .notebook_content{
	min-height: 1122px;
	background-color: white;
	margin: 60px -10px 0px -10px;	
	margin: 0 auto;
	border: 1px solid gray;
	width: 100%;
	max-width: 755px;
	padding: 76px;
	margin-bottom: 100px;
	margin-top: 40px;
      }
      
      .dialog_viewer .ui-resizable-se{
	background-color: transparent;
      }
      .dialog_reader .titlebar{
	text-align: left;
      }
      .dialog_reader .window_titlebar{
	text-align: center;
	width: calc(100% - 350px);
      }
      
      .element{
	transition: .1s ease-in-out;
      }
      .element:hover{
	background-color: <?= $USER_accent ?>;
	color: <?= $COL1 ?>;
      }
      
      .class_list_item{
	width: 200px;
	text-align: center;
      }
      
      .tooltip{
	position: absolute;
	padding: 10px;
	background-color: <?= $USER_accent ?>;
	color: <?= $COL1 ?>;
	max-width: 300px;
	display: none;
	z-index: 996;
      }
      
      .tab{
	width: 100%;
      }
      .tab.accent_bkg{
	background-color: <?= $USER_accent ?>;
	color: <?= $COL1 ?>;
      }
      .dialog .tab.accent_bkg, .list.selected{
	background-color: <?= $USER_accent_lighter ?>;
	color: <?= $COL1 ?>;
      }
      .dialog_selected .tab.accent_bkg{
	background-color: <?= $USER_accent ?>;
	color: <?= $COL1 ?>;
      }
      .tab > span, .tab > a{
	transition: .1s ease-in-out;
	text-align: center;
	padding: 10px 5px;
	cursor: pointer;
	margin-right: -4px;
	margin-bottom: -6px;
	border: 1px solid transparent;
      }
      .tab.two_tabs > span, .tab.two_tabs > a{
	display: inline-block;
	width: 50%;
      }
      .tab.five_tabs > span, .tab.five_tabs > a{
	display: inline-block;
	width: 20%;
      }
      .tab > span:hover, .tab > a:hover, .tab > span.selected, .tab > a.selected{
	background-color: <?= $USER_accent_lighter2 ?>;
	border: 1px solid <?= $USER_accent_lighter ?>;
      }
      .tab.accent_bkg > span:hover, .tab.accent_bkg > a:hover, .tab.accent_bkg > span.selected, .tab.accent_bkg > a.selected{
	background-color: <?= $USER_accent_darker ?>;
	border: 1px solid <?= $USER_accent_darker ?>;
      }
      .ls_panel{
	display: none;
      }
      
      .list{
	padding: 10px 20px;
	cursor: pointer;
      }
      
      div.dialog .hover_accent{
	transition: .1s ease-in-out;
      }
      div.dialog .hover_accent:hover{
	background-color: <?= $USER_accent_lighter ?>;
	color: <?= $COL1 ?>;
      }
      div.dialog_selected .hover_accent:hover{
	background-color: <?= $USER_accent ?>;
	color: <?= $COL1 ?>;
      }
      
      img.round{
	border-radius: 50%;
	margin-right: 10px;
      }
      div.round{
	display: inline-block;
	border-radius: 50%;
	margin-right: 10px;
	background-color: gray;
      }
      div.round.student_status{
	text-align: center;
	font-size: 11pt;
	width: 16px;
	height: 16px;
	color: white;
      }
      
      @media screen and (max-width: 500px) , screen and (max-height: 300px) {
	.mobile{
	  display: block;
	}
	.pc{
	  display: none;
	}
	.taskbar{
	  top: 0px;
	  bottom: 0px;
	  height: 100%;
	  overflow-y: auto;
	}
	.taskbar .start{
	  display: block;
	  width: calc(100% - 10px);
	  text-align: left;
	  padding-top: 5px;
	}
	.taskbar .start app_name{
	  display: inline-block;
	  font-family: 'Roboto';
	  font-weight: 300;
	  font-size: 13pt;
	}
	.taskbar .tray{
	  display: none;
	}
	.taskbar > span, .taskbar > taskbar > span{
	  width: calc(50% - 10px);
	  height: 100px;
	  margin: 5px;
	  text-align: center;
	}
	.taskbar > taskbar > span > img{
	  width: 44px;
	  height: 44px;
	}
	
	.main_menu{
	  top: 50px;
	  bottom: auto;
	  width: 100%;
	  max-width: 100%;
	  height: 100%;
	  max-height: 100%;
	}
	.folder_tree{
	  display: none;
	}
	.file_explorer{
	  width: 100%;
	}
	
	.dialog{
	  min-width: auto;
	}
	.ui-resizable-handle{
	  display: none !important;
	}
	
	.icon{
	  width: calc(50% - 20px);
	}
	app_name.mobile{
	  display: block;
	  margin-top: 10px;
	}
      }
    </style>