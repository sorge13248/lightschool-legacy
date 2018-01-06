<?php
  include_once "ABSOLUTE_PATH_TO_PUBLIC_HTML/Subdomains/LightSchool/System/Core.php";
  $MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS';
  $IMAGES_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/images_sub';
  $MY_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
  $PUBLISHERS_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_editori';
  $SUPPORT_DIRECTORY = '//MAIN_HTTP_ADDRESS/my/support';
  $BLOG_DIRECTORY = '//MAIN_HTTP_ADDRESS/blog';
  $UPLOAD_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/my';
  $SCHOOL_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_school';
  
  $MAIL_SUPPORT = 'MAIL_SUPPORT_ADDRESS';
  $MAIL_INFO = 'info@lightschool.it';
  $MAIL_BUSINESS = 'business@lightschool.it';
  
  if($_COOKIE['language'] != ''){
    $include_lang = $_COOKIE['language'];
  }else{
    $include_lang = 'it-IT';
  }
  
  include "language_".$include_lang.".php";
  
  $current_page = basename($_SERVER['PHP_SELF']);
  
  $order = array(".php");
  $current_page = str_replace($order, "", $current_page);
  
  if(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1)|| isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'){ }else{
    $redirect2 = $_SERVER["REQUEST_URI"];
    header("location: https:$MAIN_DIRECTORY$redirect2");
  }
  
  if($_COOKIE['LOGIN_username'] != '' and $_COOKIE['LOGIN_password'] != '' and $_SESSION['Username'] == ''){
    include_once "auto_login.php";
  }
  
  if($_COOKIE["ArchiveUnderstand"] != "y"){
    ?>
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
      <script type="text/javascript">
        $(document).on("click", ".HideArchiveNotice", function(e){
          e.preventDefault();
          
          document.cookie = "ArchiveUnderstand=y; domain=.francescosorge.com;path=/";
          
          $("#ArchiveNotice").html("<h1>Enjoy LightSchool!</h1>");
        });
      </script>
      <div style="width: 100%; height: 100%; padding: 20px; background-color: white; font-size: 14pt; position: fixed; top: 0px; left: 0px; z-index: 999999; text-align: center; overflow-y: auto" id="ArchiveNotice">
        <h1>LightSchool is in demo mode</h1>
        <p style="text-align: justify; margin: 0 auto; max-width: 1000px; width: 100%">
          Welcome user! Unfortunately, you came here too late; LightSchool has been developed between 2012 and 2015 and it is currently working as an archive version where you can just browse it (and use some of its features) and you may found several bugs that will not be fixed (you may report them to me, but I do not guarantee that I will fix them).<br/>
          LightSchool has been my greatest work until 2017 and that is why I decided to keep it online, even if its development has stopped.<br/>
          During its heyday, LightSchool used to have a multi language support system (English, Italian and Spanish were available) but it is now partially broken and some parts of LightSchool will be displayed in Italian despite your choose.<br/>
          From <a href="//MAIN_HTTP_ADDRESS/status" style="color: blue">this page</a> you can see which features are still working.</br>
          Maybe one day I will continue its development. Since that day, enjoy this version!<br/><br/>
          Kind regards,<br/>
          Francesco Sorge<br/><br/>
          <center>
            <button class="button HideArchiveNotice" id="HideArchiveNotice" onclick="document.getElementById('ArchiveNotice').style.display = 'none';">I undestand, take me to LightSchool!</button><br/>
            <span style="font-size: 10pt; color: gray">This notice will not be displayed again</span>
          </center>
        </p>
      </div>
    <?php
  }
?>