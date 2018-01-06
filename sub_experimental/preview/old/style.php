<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="<?= $MAIN_DIRECTORY ?>/js/parallax.js"></script>
<script type="text/javascript" src="<?= $MAIN_DIRECTORY ?>/js/scrollReveal.min.js"></script>  
<script type="text/javascript">
  $(document).ready(function(){
    var config = {
      easing: 'hustle',
      reset:  false,
      delay:  'onload',
      vFactor: 0.90,
      mobile: true
    }

    window.sr = new scrollReveal( config );
  });
</script>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Open+Sans);
#cssmenu{
  background-color: rgba(0,0,0,0.8) !important;
  padding: 10px;
  font-family: 'Open Sans', sans-serif;
  line-height: 1;
  position: fixed !important;
  top: 0px;
  left: 0px;
  width: 100%;
}
.cssmenuimg{
   margin-right: 10px;
   width: 16px;
   height: 13px;
   float: left;
}
#cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a,
#cssmenu ul li span,
#cssmenu #menu-button {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  z-index: 999;
}
#cssmenu:after,
#cssmenu > ul:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
#cssmenu #menu-button {
  display: none;
}
#menu-line {
  position: absolute;
  top: 0;
  left: 0;
  height: 3px;
  background: #009ae1;
  -webkit-transition: all 0.25s ease-out;
  -moz-transition: all 0.25s ease-out;
  -ms-transition: all 0.25s ease-out;
  -o-transition: all 0.25s ease-out;
  transition: all 0.25s ease-out;
}
#cssmenu > ul > li {
  float: left;
}
#cssmenu.align-center > ul {
  font-size: 0;
  text-align: center;
}
#cssmenu.align-center > ul > li {
  display: inline-block;
  float: none;
}
#cssmenu.align-center ul ul {
  text-align: left;
}
#cssmenu.align-right > ul > li {
  float: right;
}
#cssmenu.align-right ul ul {
  text-align: right;
}
#cssmenu > ul > li > a, #cssmenu > ul > li > span {
  padding: 10px;
  padding-left: 20px;
  padding-right: 20px;
  margin-left: 10px;
  font-size: 12px;
  text-decoration: none;
  text-transform: uppercase;
  color: white;
  -webkit-transition: color .2s ease;
  -moz-transition: color .2s ease;
  -ms-transition: color .2s ease;
  -o-transition: color .2s ease;
  transition: color .2s ease;
  cursor: pointer;
  border-top: 2px solid black;
}
#cssmenu > ul > li:hover > a,
#cssmenu > ul > li:hover > span,
#cssmenu > ul > li.active > a,
#cssmenu > ul > li.active > span{
  border-bottom: 2px solid white;
}
#cssmenu > ul > li.has-sub > a, #cssmenu > ul > li.has-sub > span {
  padding-right: 25px;
}
#cssmenu > ul > li.has-sub > a::after, #cssmenu > ul > li.has-sub > span::after {
  position: absolute;
  top: 21px;
  right: 10px;
  width: 4px;
  height: 4px;
  border-bottom: 1px solid white;
  border-right: 1px solid white;
  content: "";
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  -webkit-transition: border-color 0.2s ease;
  -moz-transition: border-color 0.2s ease;
  -ms-transition: border-color 0.2s ease;
  -o-transition: border-color 0.2s ease;
  transition: border-color 0.2s ease;
}
#cssmenu > ul > li.has-sub:hover > a::after, #cssmenu > ul > li.has-sub:hover > span::after {
  border-color: white;
}
#cssmenu ul ul {
  position: absolute;
  left: -9999px;
}
#cssmenu li:hover > ul {
  left: auto;
}
#cssmenu.align-right li:hover > ul {
  right: 0;
}
#cssmenu ul ul ul {
  margin-left: 100%;
  top: 0;
}
#cssmenu.align-right ul ul ul {
  margin-left: 0;
  margin-right: 100%;
}
#cssmenu ul ul li {
  height: 0;
  -webkit-transition: height .2s ease;
  -moz-transition: height .2s ease;
  -ms-transition: height .2s ease;
  -o-transition: height .2s ease;
  transition: height .2s ease;
}
#cssmenu ul li:hover > ul > li {
  height: 32px;
}
#cssmenu ul ul li a, #cssmenu ul ul li span {
  padding: 10px 20px;
  width: 200px;
  font-size: 12px;
  background-color: rgba(0,0,0,0.8) !important;
  text-decoration: none;
  margin-left: -106px;
  color: #dddddd;
  -webkit-transition: color .2s ease;
  -moz-transition: color .2s ease;
  -ms-transition: color .2s ease;
  -o-transition: color .2s ease;
  transition: color .2s ease;
  cursor: pointer;
}
#cssmenu ul ul li:hover > a,
#cssmenu ul ul li:hover > span,
#cssmenu ul ul li a:hover,
#cssmenu ul ul li span:hover{
  color: #ffffff;
}
#cssmenu ul ul li.has-sub > a::after, #cssmenu ul ul li.has-sub > span::after {
  position: absolute;
  top: 13px;
  right: 10px;
  width: 4px;
  height: 4px;
  border-bottom: 1px solid #dddddd;
  border-right: 1px solid #dddddd;
  content: "";
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  -webkit-transition: border-color 0.2s ease;
  -moz-transition: border-color 0.2s ease;
  -ms-transition: border-color 0.2s ease;
  -o-transition: border-color 0.2s ease;
  transition: border-color 0.2s ease;
}
#cssmenu.align-right ul ul li.has-sub > a::after, #cssmenu.align-right ul ul li.has-sub > span::after {
  right: auto;
  left: 10px;
  border-bottom: 0;
  border-right: 0;
  border-top: 1px solid #dddddd;
  border-left: 1px solid #dddddd;
}
#cssmenu ul ul li.has-sub:hover > a::after, #cssmenu ul ul li.has-sub:hover > span::after {
  border-color: #ffffff;
}
@media all and (max-width: 768px), only screen and (-webkit-min-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (min--moz-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (-o-min-device-pixel-ratio: 2/1) and (max-width: 1024px), only screen and (min-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (min-resolution: 192dpi) and (max-width: 1024px), only screen and (min-resolution: 2dppx) and (max-width: 1024px) {
  #cssmenu {
    width: 100%;
  }
  #cssmenu ul {
    width: 100%;
    display: none;
  }
  #cssmenu.align-center > ul,
  #cssmenu.align-right ul ul {
    text-align: left;
  }
  #cssmenu ul li,
  #cssmenu ul ul li,
  #cssmenu ul li:hover > ul > li {
    width: 100%;
    height: auto;
    border-top: 1px solid rgba(120, 120, 120, 0.15);
  }
  #cssmenu ul li a,
  #cssmenu ul li span,
  #cssmenu ul ul li a,
  #cssmenu ul ul li span{
    width: 100%;
  }
  #cssmenu > ul > li,
  #cssmenu.align-center > ul > li,
  #cssmenu.align-right > ul > li {
    float: none;
    display: block;
  }
  #cssmenu ul ul li a, #cssmenu ul ul li span {
    padding: 20px 20px 20px 30px;
    font-size: 12px;
    color: #000000;
    background: none;
  }
  #cssmenu ul ul li:hover > a,
  #cssmenu ul ul li:hover > span,
  #cssmenu ul ul li a:hover,
  #cssmenu ul ul li span:hover {
    color: #000000;
  }
  #cssmenu ul ul ul li a, #cssmenu ul ul ul li span {
    padding-left: 40px;
  }
  #cssmenu ul ul,
  #cssmenu ul ul ul {
    position: relative;
    left: 0;
    right: auto;
    width: 100%;
    margin: 0;
  }
  #cssmenu > ul > li.has-sub > a::after,
  #cssmenu > ul > li.has-sub > span::after,
  #cssmenu ul ul li.has-sub > a::after,
  #cssmenu ul ul li.has-sub > span::after{
    display: none;
  }
  #menu-line {
    display: none;
  }
  #cssmenu #menu-button {
    display: block;
    padding: 20px;
    color: #000000;
    cursor: pointer;
    font-size: 12px;
    text-transform: uppercase;
  }
  #cssmenu #menu-button::after {
    content: '';
    position: absolute;
    top: 20px;
    right: 20px;
    display: block;
    width: 15px;
    height: 2px;
    background: #000000;
  }
  #cssmenu #menu-button::before {
    content: '';
    position: absolute;
    top: 25px;
    right: 20px;
    display: block;
    width: 15px;
    height: 3px;
    border-top: 2px solid #000000;
    border-bottom: 2px solid #000000;
  }
  #cssmenu .submenu-button {
    position: absolute;
    z-index: 10;
    right: 0;
    top: 0;
    display: block;
    border-left: 1px solid rgba(120, 120, 120, 0.15);
    height: 52px;
    width: 52px;
    cursor: pointer;
  }
  #cssmenu .submenu-button::after {
    content: '';
    position: absolute;
    top: 21px;
    left: 26px;
    display: block;
    width: 1px;
    height: 11px;
    background: #000000;
    z-index: 99;
  }
  #cssmenu .submenu-button::before {
    content: '';
    position: absolute;
    left: 21px;
    top: 26px;
    display: block;
    width: 11px;
    height: 1px;
    background: #000000;
    z-index: 99;
  }
  #cssmenu .submenu-button.submenu-opened:after {
    display: none;
  }
}

  @font-face{
    font-family: 'open-sans-light';
    src: url('<?= $MAIN_DIRECTORY ?>/font/open-sans-light.eot');
    src: url('<?= $MAIN_DIRECTORY ?>/font/open-sans-light.eot?#iefix') format('embedded-opentype'),
    url('<?= $MAIN_DIRECTORY ?>/font/open-sans-light.ttf') format('truetype'),
    url('<?= $MAIN_DIRECTORY ?>/font/open-sans-light.svg#pt-sans') format('svg');
    font-weight: normal;
    font-style: normal;
  }
  *{
    font-family: open-sans-light, arial, tahoma, sans-serif !important;
  }
  html, body{
    height: 100%;
    margin: 0px;
    cursor: default;
    background-color: #424242;
  }
  .footer{
    position: fixed;
    bottom: 0px;
    left: 0px;
    width: 100%;
    background-color: rgba(0,0,0,0.8) !important;
    z-index: 9997;
    color: white;
  }
  .footer a{
    color: white;
    text-decoration: none;
  }
  .footer a:hover{
    color: white;
    text-decoration: underline;
  }
  .footer p{
    text-align: center;
    font-size: 11pt;
  }
  .slide{
    width: 100%;
    position: relative;
    padding: 100px 0;
    text-align: center;
    color: white;
  }
  #slide2, #slide4, #slide6{
    background-color: #424242;
    -webkit-box-shadow: 0px 0px 28px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow:    0px 0px 28px 0px rgba(50, 50, 50, 0.75);
    box-shadow:         0px 0px 28px 0px rgba(50, 50, 50, 0.75);
    z-index: 10;
  }
  #slide1{
    background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/background.png");
    background-color: #fff;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    text-align: center; 
    display: table;
    height: auto;
  }
  #slide3{
      background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/classroom.jpg");
      background-color: #fff;
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
  }
  #slide5{
      background-image: url("<?= $IMAGES_MAIN_DIRECTORY ?>/classroom2.jpg");
      background-color: #fff;
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
  }
  .menu{
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 999;
  }
  .menu a{
    color: white;
    text-decoration: none;
    display: block-inline;
    margin-right: 20px;
    margin-bottom: 20px;
    border-bottom: 2px solid transparent;
    padding: 10px;
    transition: .1s ease-in-out;
  }
  .menu a:hover{
    border-bottom: 2px solid white;
  }
  .login{
    border: 2px solid white !important;
    padding-left: 3px !important;
    padding-right: 10px !important;
    border-radius: 10px !important;
  }
  .login:hover{
    background-color: rgba(255,255,255,0.2);
    border-bottom: 2px solid white !important;
  }
  .login:hover > .login a{
    background-color: rgba(255,255,255,0.2);
    border-bottom: 0px solid white !important;
  }
  .register{
    border: 2px solid #298A08;
    background-color: #298A08;
    padding-left: 30px;
    padding-right: 30px;
    border-radius: 10px;
  }
  .register:hover{
    background-color: #04B404;
    border-bottom: 2px solid #298A08;
  }
  #overlay{
    background-color: rgba(255,255,255,0.3);
    position: fixed;
    top: 0px;
    left: 0px;
    height: 100%;
    width: 100%;
    z-index: 9998;
    display: none;
  }
  #overlay .title{
    background-color: #0174DF;
    color: white;
    font-size: 20pt;
    text-align: center;
    font-family: open-sans-light;
    padding: 10px;
    margin-bottom: 0px;
    margin-top: 0px;
    border-radius: 18px 18px 0px 0px;
  }
  #loginWindow{
    position: fixed;
    top: calc(50% - 150px);
    left: calc(50% - 220px);
    z-index: 999;
    background-color: white;
    border: 1px solid black;
    border-radius: 20px;
    display: none;
  }
  #registerWindow{
    position: fixed;
    top: 7%;
    left: calc(50% - 250px);
    z-index: 999;
    background-color: white;
    border: 1px solid black;
    border-radius: 20px;
    display: none;
    width: 500px;
    overflow-x: hidden;
    height: 100%;
    max-height: 760px;
  }
  .languageWindow{
    position: fixed;
    top: calc(50% - 70px);
    left: calc(50% - 220px);
    z-index: 999;
    background-color: white;
    border: 1px solid black;
    border-radius: 20px;
    display: none;
  }
  .window{
    z-index: 9999;
  }
  .window .close{
    float: right;
  }
  .window form{
    padding: 20px;
  }
  .window form input{
    padding: 10px;
    background-color: white;
    border-radius: 10px;
    border: 1px solid gray;
    font-size: 11pt;
    width: 400px;
    margin-bottom: 10px;
    transition: .2s ease-in-out;
  }
  .window form input:hover{
    outline-width: 0;
    border: 1px solid #0174DF;
  }
  .window form input:focus{
    outline-width: 0;
    border: 1px solid #0174DF;
    -webkit-box-shadow: 0px 0px 10px #0174DF;
    -moz-box-shadow: 0px 0px 10px #0174DF;
    box-shadow: 0px 0px 10px #0174DF;
  }
  .window form input[type=checkbox]:focus, .window form input[type=checkbox]:hover{
    outline-width: 0;
    border: 0px solid #0174DF;
    -webkit-box-shadow: 0px 0px 0px #0174DF;
    -moz-box-shadow: 0px 0px 0px #0174DF;
    box-shadow: 0px 0px 0px #0174DF;
  }
  a{
    text-decoration: none;
    color: white;
    transition: .2s ease-in-out;
  }
  .window a{
    color: black;
    transition: .2s ease-in-out;
  }
  a:hover, a:focus{
    color: #0174DF;
  }
  .window a:hover, .window a:focus{
    color: #0174DF;
  }
  
  .registerWindow input, .registerWindow select{
    font-family: open-sans-light;
    font-size: 14pt;
    padding: 5px;
    background-color: transparent;
    border: 1px solid lightgray !important;
    -webkit-transition: .2s ease-in-out;
    -moz-transition: .2s ease-in-out;
    -o-transition: .2s ease-in-out;
    transition: .2s ease-in-out;
    width: 200px !important;
    color: black;
  }
  .registerWindow .pwdfield{
    font-family: open-sans-light;
    font-size: 14pt;
    padding: 5px;
    background-color: transparent;
    border: 1px solid lightgray !important;
    -webkit-transition: .2s ease-in-out;
    -moz-transition: .2s ease-in-out;
    -o-transition: .2s ease-in-out;
    transition: .2s ease-in-out;
    width: 400px !important;
    color: black;
  }
  .registerWindow input:hover, .registerWindow input:focus, .registerWindow select:hover, .registerWindow select:focus{
    border: 1px solid #0174DF !important;
  }
  .registerWindow .pwdfield:focus, .registerWindow .pwdfield:hover{
    border: 1px solid #0174DF !important;
    box-shadow: none;
  }
  .registerWindow button{
    font-family: open-sans-light;
    border: 1px solid #0174DF;
    background-color: #0174DF;
    color: white;
    width: 100px;
    float: right;
    font-size: 14pt;
  }
  .registerWindow button:hover{
    border: 1px solid gray;
  }
  .registerWindow button:focus{
    border: 1px solid gray;
  }
  .registerWindow #Name{
    background: transparent url("<?= $MY_MAIN_DIRECTORY ?>/images/icons/profile2.png") 8px 9px no-repeat;
    padding-left: 40px;
  }
  .registerWindow #Surname{
    background: transparent url("<?= $MY_MAIN_DIRECTORY ?>/images/icons/profile2.png") no-repeat;
    background-position: right 8px center;
    padding-right: 40px;
  }
  .registerWindow #Username{
    background: transparent url("<?= $MY_MAIN_DIRECTORY ?>/images/icons/username2.png") no-repeat;
    background-position: right 8px center;
    padding-right: 40px;
  }
  .registerWindow #Email{
    background: transparent url("<?= $MY_MAIN_DIRECTORY ?>/images/icons/email2.png") 8px 9px no-repeat;
    padding-left: 40px;
  }
  .registerWindow #Sex{
    background: transparent url("<?= $MY_MAIN_DIRECTORY ?>/images/icons/gender2.png") 8px 9px no-repeat;
    padding-left: 40px;
  }
  .registerWindow .pwdfield{
    background: transparent url("<?= $MY_MAIN_DIRECTORY ?>/images/icons/password2.png") 8px 9px no-repeat;
  }
  .registerWindow a{
    font-family: open-sans-light;
    text-decoration: none;
    color: black;
  }
  .registerWindow input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px rgb(232,232,232) inset;
  }
  .registerWindow ::-webkit-input-placeholder { /* WebKit browsers */
    color:    gray;
  }
  .registerWindow :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color:    gray;
    opacity:  1;
  }
  .registerWindow ::-moz-placeholder { /* Mozilla Firefox 19+ */
    color:    gray;
    opacity:  1;
  }
  .registerWindow :-ms-input-placeholder { /* Internet Explorer 10+ */
    color:    gray;
  }
  .registerWindow input:focus, .registerWindow select:focus, .registerWindow button:focus{
    outline: 0;
  }
  .registerWindow .error{
    text-align: center;
    color: red;
    font-weight: bold;
    font-family: open-sans-light;
  }
  .registerWindow hr{
    border: 0;
    height: 0;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
  }
  button{
    font-family: open-sans-light;
    border: none;
    background-color: #0174DF;
    color: white;
    width: 200px;
    padding: 10px;
    margin-right: 10px;
    font-size: 12pt;
    height: 50px;
    transition: .2s ease-in-out;
  }
  button:hover, button:focus{
    background-color: #045FB4;
    cursor: pointer
  }
  .pwdfield{
    border-radius: 10px !important;
    max-width: 100% !important;
  }
  sup{
    font-size: 10pt;
  }
</style>
<script type="text/javascript">
  jQuery(document).ready(function ($) {
    $("#container").stellar();
  });
</script>
<script type="text/javascript">
  function login(){
    $('#overlay').fadeIn(300);
    document.getElementById("loginWindow").style.display = "inline-block";
    document.getElementById("registerWindow").style.display = "none";
    document.getElementById("languageWindow").style.display = "none";
  }
  function register(){
    $('#overlay').fadeIn(300);
    document.getElementById("registerWindow").style.display = "inline-block";
    document.getElementById("loginWindow").style.display = "none";
    document.getElementById("languageWindow").style.display = "none";
  }
  function hide(){
    $('#overlay').fadeOut(300);
  }
  
  function validateForm(){
    if(registrationForm.name.value == ""){
      document.getElementById('nameStatus').innerHTML = '<?php echo($TRAD_register_name_empty); ?>';
    }else{
      document.getElementById('nameStatus').innerHTML = '';
    }
    if(registrationForm.surname.value == ""){
      document.getElementById('surnameStatus').innerHTML = '<?php echo($TRAD_register_surname_empty); ?>';
    }else{
      document.getElementById('surnameStatus').innerHTML = '';
    }
    if(registrationForm.email.value == ""){
      document.getElementById('emailStatus').innerHTML = "<?php echo($TRAD_register_email_empty); ?>";
    }else{
      if(registrationForm.email.value.search("@") != -1 && registrationForm.email.value.search(".") != -1) {
	document.getElementById('emailStatus').innerHTML = '';
      }else{
	document.getElementById('emailStatus').innerHTML = '<?php echo($TRAD_register_email_wrong); ?>';
      }
    }
    if(registrationForm.username.value == ""){
      document.getElementById('usernameStatus').innerHTML = "<?php echo($TRAD_register_username_empty); ?>";
    }else{
      document.getElementById('usernameStatus').innerHTML = '';
    }
    if(registrationForm.regpwd_id.value == "" && registrationForm.regpwd_text_id.value == ""){
      document.getElementById('passwordStatus').innerHTML = "<?php echo($TRAD_register_password_empty); ?>";
    }else{
      document.getElementById('passwordStatus').innerHTML = '';
    }
    if(registrationForm.name.value != "" && registrationForm.surname.value != "" && registrationForm.email.value != "" && registrationForm.email.value.search("@") != -1 && registrationForm.email.value.search(".") != -1 && registrationForm.username.value != "" && (registrationForm.regpwd_id.value != "" || registrationForm.regpwd_text_id.value != "")){
      document.getElementById("registrationForm").submit();
    }
  }
  
  function showUser(str) {
    if (str=="") {
      document.getElementById("validateuserdiv").innerHTML="";
      return;
    } 
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	document.getElementById("validateuserdiv").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","<?= $MY_MAIN_DIRECTORY ?>/validate_user?usernamecheck="+str,true);
    xmlhttp.send();
  }
  
  function showEmail(str) {
  if(registrationForm.email.value != ""){
    if(registrationForm.email.value.search("@") != -1 && registrationForm.email.value.search(".") != -1) {
      if (str=="") {
	document.getElementById("validateemaildiv").innerHTML="";
	return;
      } 
      if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
      } else { // code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	  document.getElementById("validateemaildiv").innerHTML=xmlhttp.responseText;
	}
      }
      xmlhttp.open("GET","<?= $MY_MAIN_DIRECTORY ?>/validate_user?emailcheck="+str,true);
      xmlhttp.send();
      document.getElementById('emailStatus').innerHTML = '';
    }else{
      document.getElementById('emailStatus').innerHTML = '<?php echo($TRAD_register_email_wrong); ?>';
      document.getElementById('validateemaildiv').innerHTML = '';
    }
  }else{
      document.getElementById('emailStatus').innerHTML = '';
    }
  }
  </script>
<link rel="stylesheet" type="text/css" href="<?= $MY_MAIN_DIRECTORY ?>/pwdwidget.css" />
<script src="<?= $MY_MAIN_DIRECTORY ?>/pwdwidget.js" type="text/javascript"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
if(!isset($_COOKIE['language'])){
  ?>
  <div id="overlay" style="display: inline-block">
    <div class="window languageWindow" style="display: inline-block">
      <p class="title">Select your favorite language</p>
      <div style="padding: 20px">
	<button onclick="window.location.href = 'switch_language?lang=it-IT'">Italian</button>
	<button onclick="window.location.href = 'switch_language?lang=en-US'" style="font-size: 12pt">English - United States</button>
      </div>
    </div>
    <?php
  }else{
  ?>
  <div id="overlay">
  <?php } ?>
  <div id="loginWindow" class="window">
    <p class="title">
      <?php echo($TRAD_menu_login); ?>
      <span class="close" onclick="hide()"><img src="close_pop.png" title="<?= $TRAD_menu_close ?>" alt="<?= $TRAD_menu_close ?>" /></span>
    </p>
    <form method="post" action="<?= $MY_MAIN_DIRECTORY ?>">
      <input type="email" name="Email" id="Email" placeholder="<?= $TRAD_email ?>" /><br/>
      <input type="password" name="Password" id="Password" placeholder="<?= $TRAD_password ?>" /><br/>
      <label><input type="checkbox" style="float: left; margin-left: 10px; width: 20px" /><?php echo($TRAD_remember_me); ?></label><input type="submit" value="<?= $TRAD_login ?>" style="float: right; width: 70px" />
      <br/><br/>
      <a class="forgot" href="<?= $MY_MAIN_DIRECTORY ?>/recover?type=password">Password dimenticata?</a>
    </form>
  </div>
  <div id="registerWindow" class="window registerWindow">
    <p class="title">
      <?php echo($TRAD_menu_register); ?>
      <span class="close" onclick="hide()"><img src="close_pop.png" title="<?= $TRAD_menu_close ?>" alt="<?= $TRAD_menu_close ?>" /></span>
    </p>
    <form method="post" action="<?= $MY_MAIN_DIRECTORY ?>/register" id="registrationForm" name="registrationForm">
      <input type="text" style="display: none" >
      <input type="password" style="display: none" >
      <table style="width: 100%">
	<tr>
	  <td><hr/></td>
	  <td style="width: 1%; white-space: nowrap; font-size: 16pt">&nbsp;&nbsp;&nbsp;<?php echo($TRAD_profile); ?>&nbsp;&nbsp;&nbsp;</td>
	  <td><hr/></td>
	</tr>
      </table>
      <table style="width: 100%">
	<tr>
	  <td style="width: 50%" valign="top"><input type="text" id="name" name="name" placeholder="Nome" class="input" autocomplete="off"><br/><span id="nameStatus" class="error"></span></td>
	  <td style="width: 50%" valign="top"><input type="text" id="surname" name="surname" placeholder="Cognome" class="input" autocomplete="off"><br/><span id="surnameStatus" class="error"></span></td>
	</tr>
	<tr>
	  <td style="width: 50%" valign="top"><input type="email" id="email" name="email" placeholder="<?= $TRAD_email ?>" class="input" autocomplete="off" oninput="showEmail(this.value)"><br/><div id="validateemaildiv" style="display: inline"></div>
	  <span id="emailStatus" class="error"></span></td>
	  <td style="width: 50%" valign="top"><input type="text" id="username" name="username" placeholder="Nome utente" class="input" autocomplete="off" oninput="showUser(this.value)"><br/><div id="validateuserdiv" style="display: inline"></div>
	  <span id="usernameStatus" class="error"></span></td>
	</tr>
	<tr>
	  <td style="width: 100%" colspan="2"><span style="font-size: 10pt">Assicurati che l'indirizzo e-mail sia corretto! Ti invieremo un'e-mail di conferma.<br/>
	  Per registrarti come docente, utilizza un indirizzo e-mail <b>@istruzione.it</b> o <b>@einaudigramsci.it</b>.</span></td>
	</tr>
	<tr>
	  <td style="width: 100%" colspan="2"><select id="sex" name="sex" style="border-radius: 10px; width: 100% !important"><option value="Maschio" <?php if($user_profile['gender'] == 'male') echo('selected="selected"'); ?>>Maschio</option><option value="Femmina"<?php if($user_profile['gender'] == 'female') echo('selected="selected"'); ?>>Femmina</option><option value="Altro">Altro</option></select></td>
	</tr>
      </table>
      <br/>
      <table style="width: 100%">
	<tr>
	  <td><hr/></td>
	  <td style="width: 1%; white-space: nowrap; font-size: 16pt">&nbsp;&nbsp;&nbsp;Sicurezza&nbsp;&nbsp;&nbsp;</td>
	  <td><hr/></td>
	</tr>
      </table>
      <div class='pwdwidgetdiv' id='thepwddiv'></div>
      <script  type="text/javascript" >
      var pwdwidget = new PasswordWidget('thepwddiv','regpwd');
      pwdwidget.MakePWDWidget();
      </script>
      <noscript>
      Javascript risulta disabilitato. Attivalo per poter usare LightSchool.
      </noscript><br/><br/><span id="passwordStatus" class="error"></span><br/>
      <center><div class="g-recaptcha" data-sitekey="6LeFjvoSAAAAADUG-pcCE--Pg9EheYvuLY3bd_QI"></div>
      <noscript>
	<div style="width: 302px; height: 352px;">
	  <div style="width: 302px; height: 352px; position: relative;">
	    <div style="width: 302px; height: 352px; position: absolute;">
	      <iframe src="https://www.google.com/recaptcha/api/fallback?k=6LeFjvoSAAAAADUG-pcCE--Pg9EheYvuLY3bd_QI"
		      frameborder="0" scrolling="no"
		      style="width: 302px; height:352px; border-style: none;">
	      </iframe>
	    </div>
	    <div style="width: 250px; height: 80px; position: absolute; border-style: none;
			bottom: 21px; left: 25px; margin: 0px; padding: 0px; right: 25px;">
	      <textarea id="g-recaptcha-response" name="g-recaptcha-response"
			class="g-recaptcha-response"
			style="width: 250px; height: 80px; border: 1px solid #c1c1c1;
			      margin: 0px; padding: 0px; resize: none;" value="">
	      </textarea>
	    </div>
	  </div>
	</div>
      </noscript></center>
      <br/>
      <p id="text" style="font-size: 10pt">Ho letto e accettato le <a href="<?= $LS_MAIN_DIRECTORY ?>/redirect?id=1" target="_blank" style="font-weight: bold">condizioni d'utilizzo</a> e le <a href="<?= $LS_MAIN_DIRECTORY ?>/redirect?id=2" target="_blank" style="font-weight: bold">norme sulla privacy</a></p>
      <button type="button" name="register" id="register" style="float: right" class="submit" onclick="validateForm()">Registrati</button><br/><br/>
    </form>
  </div>
</div>