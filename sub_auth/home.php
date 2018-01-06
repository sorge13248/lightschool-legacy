<?php
include_once "base.php";
//print_r($_GET); die();
if($_POST['email'] != '' and $_POST['password'] != ''){
  $hostname_localhost ="localhost";
  $database_localhost ="DB_DATABASE_VALUE";
  $username_localhost ="DB_USER_VALUE";
  $password_localhost ="DB_PASSWORD_VALUE";
  $localhost = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
  or
  trigger_error(mysql_error(),E_USER_ERROR);
  
  mysql_select_db($database_localhost, $localhost);
  
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $query_search = "select * from MY_users where EmailAddress = '".$email."' AND Password = '".$password. "' LIMIT 1";
  
  $query_exec = mysql_query($query_search) or die(mysql_error());
  $rows = mysql_num_rows($query_exec);
  //echo $rows;
  if($rows == 0) { 
    echo "No Such User Found"; 
  }
  elseif($rows == 1){
      echo "User Found"; 
      session_start();
      $_SESSION['Username'] = $email;
  }
}else{
?>
  <html>
    <head>
      <title>LightSchool Auth</title>
      <style type="text/css">
	html{
	  font-family: arial;
	  font-size: 11pt;
	  margin: 0 auto;
	  width: 50%;
	  border-left: 1px solid black;
	  border-right: 1px solid black;
	  border-bottom: 1px solid black;
	  padding: 40px;
	}
	.selector{
	  background-color: transparent;
	  margin: 0 auto;
	  max-width: 500px;
	  padding-top: 20px;
	}
	.os{
	  text-align: center;
	}
      </style>
    </head>
    <body>
      <img src="//MAIN_HTTP_ADDRESS/images_sub/logo.png" style="float: left; width: 32px; height: 32px; margin-right: 10px" /><h2>LightSchool Auth</h2>
      <p>LightSchool Auth &egrave; l'autorit&agrave; che gestisce le app di LightSchool su tutte le piattaforme</p>
      <p>Auth si deve interfacciare ogni giorno e costantemente con dispositivi che parlano Java, Objective-C e C#, traducendo quindi in JSON tutti i dati richiesti al server dalle app.</p><br/>
      <table cellpadding="10" class="os" style="width: 100%; cursor: pointer" onclick="location.href = 'https://MAIN_HTTP_ADDRESS/download/app';">
        <tr>
          <td style="width: 25%">
            <img src="//MAIN_HTTP_ADDRESS/android.png" style="width: 50px; height: 50px; margin-bottom: 10px"><br/>
            Android
          </td>
          <td style="width: 25%">
            <img src="//MAIN_HTTP_ADDRESS/windows_8.png" style="width: 50px; height: 50px; margin-bottom: 10px"><br/>
            Windows Desktop e Windows 10
          </td>
          <td style="width: 25%">
            <img src="//MAIN_HTTP_ADDRESS/windowsphone.png" style="width: 50px; height: 50px; margin-bottom: 10px"><br/>
            Windows 10 Mobile
          </td>
        </tr>
      </table>
    </body>
  </html>
<?php } ?>
