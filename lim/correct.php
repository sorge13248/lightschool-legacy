<?php
include "base.php";
if($_SESSION['UsernameLIM'] != ''){
?>
<html>
<head>
	<title>Correggi</title>
	<style type="text/css">
	html{
	  background-color: #383838;
	  color: white;
	  font-family: arial;
	}
	body{
	  background-color: white;
	  color: black;
	  margin: 0 auto;
	  width: 793px;
	  -webkit-box-shadow: 0px 0px 22px rgba(255,255,255, 0.9);
	  -moz-box-shadow:    0px 0px 22px rgba(255,255,255, 0.9);
	  box-shadow:         0px 0px 22px rgba(255,255,255, 0.9);
	}
	</style>
	<?php echo('
<style type="text/css">
	.topbar {
		width: 773px;
		padding-left: 10px;
		padding-right: 10px;
		background: '. $USER_accentLIM.';
		opacity: 0.9;
		z-index: 998;
	}
	.topelement {
		padding-left: 15px;
		padding-top: 10px;
		padding-right: 15px;
		padding-bottom: 9px;
		color: '.$color_linkLIM.';
		text-decoration: none;
		font-size: 16pt;
		-webkit-transition: .2s ease-in-out;
		-moz-transition: .2s ease-in-out;
		-o-transition: .2s ease-in-out;
		transition: .2s ease-in-out;
		line-height:2em;
		margin-left: 5px;
	}
	.topelement:hover {
		color: white;
		background: '.$darkerLIM.';
	}
</style>
'); ?>
</head>
<body onload="myFunction()">
    <div class="topbar" id="topbar">
	<a href="index.php" class="topelement" title="Pagina iniziale" style="background-color: <?= $darkerLIM ?>"><img src="/images/icons/<?= $theme_setLIM ?>/home.png" style="width: 16px; height: 16px; margin-right: 10px"><?php echo($USER_nameLIM); ?></a>
	<a href="history.php" class="topelement" title="Cronologia connessioni"><img src="/images/icons/<?= $theme_setLIM ?>/orario.png" style="width: 16px; height: 16px; margin-right: 10px">Cronologia connessioni</a>
	<a href="settings.php" class="topelement" title="Impostazioni"><img src="/images/icons/<?= $theme_setLIM ?>/settings.png" style="width: 16px; height: 16px"></a>
	<a href="logout.php" class="topelement" title="Disconnetti"><img src="/images/icons/<?= $theme_setLIM ?>/logout.png" style="width: 16px; height: 16px;"></a>
    </div>
    <div id="content" style="z-index: 999">
      <div id="read" style="padding: 40px">
	<strong>CORREGGI</strong><br/>
	Le modifiche verranno inviate come correzzione al quaderno dell'utente.<br/><br/>
	<?php
	$username="DB_USER_VALUE";
	$password="";
	$database="DB_DATABASE_VALUE";
	mysql_connect(localhost,$username,$password);
	@mysql_select_db($database) or die( "Non riesco a visualizzare i tuoi file. Riprova pi&ugrave; tardi.");
	$query= ("SELECT * FROM MYLIM_connection WHERE LimID = '$IDLIM' AND status = 'y' LIMIT 1");
	$result= mysql_query($query);
	$num = mysql_num_rows($result);
	mysql_close();
	if($num == '0'){
	echo('<span style="'.$fore.'">Nessun quaderno da modificare</span>');
	}
	else{
	  $UserID = mysql_result($result,$i,"UserID");
	  $ConnectionID = mysql_result($result,$i,"id");
	  $UserType = mysql_result($result,$i,"UserType");
	  $FileID = mysql_result($result,$i,"FileID");
	  $DateLIM = mysql_result($result,$i,"date");
	  $StatusLIM = mysql_result($result,$i,"status");
	  
	  
	  
	  if($UserType == 'MYS')
	  $TextUserType = 'Studente';
	  else
	  $TextUserType = 'Docente';
	  
	  mysql_connect(localhost,$username,$password);
	  @mysql_select_db($database) or die( "Non riesco a visualizzare i tuoi file. Riprova pi&ugrave; tardi.");
	  $query2= ("SELECT * FROM MY_users WHERE UserID = '$UserID' LIMIT 1");
	  $result2= mysql_query($query2);
	  $num2 = mysql_num_rows($result2);
	  mysql_close();
	  
	  $UserName = mysql_result($result2,0,"Name");
	  $UserSurname = mysql_result($result2,0,"Surname");
	  $User_UserName = mysql_result($result2,0,"Username");
	  $UserPicture = mysql_result($result2,0,"profile_image");
	  
	  
	  
	  mysql_connect(localhost,$username,$password);
	  @mysql_select_db($database) or die( "Non riesco a visualizzare i tuoi file. Riprova pi&ugrave; tardi.");
	  $query3= ("SELECT * FROM MY_files WHERE Username = '$User_UserName' AND id = '$FileID' LIMIT 1");
	  $result3= mysql_query($query3);
	  $num3 = mysql_num_rows($result3);
	  mysql_close();
	  
	  $FileName = mysql_result($result3,0,"Name");
	  $Filehtml = mysql_result($result3,0,"html");
	  
	  echo('
	  <style>
	  input[type=submit] {
		  background-color: '.$USER_accentLIM.';
		  padding: 5px;
		  font-size: 15px;
		  outline: none;
		  border: 1px solid gray;
		  -webkit-transition: .3s ease-in-out;
		  -moz-transition: .3s ease-in-out;
		  color: #ffffff;
		  border-radius: 0px;
	  }
	  input[type=submit]:hover {
		  border: 1px solid #222;
	  }
	  input[type=submit]:focus {
		  border: 1px solid '.$USER_accentLIM.';
		  -webkit-box-shadow: 0px 0px 10px '.$USER_accentLIM.';
		  -moz-box-shadow: 0px 0px 10px '.$USER_accentLIM.';
		  box-shadow: 0px 0px 10px '.$USER_accentLIM.';
	  }
	  </style>
	  ');
	  ?>
	  <script src="ckeditor/ckeditor.js"></script>
	  <script type="text/javascript">
	    function myFunction() {
	      CKEDITOR.replace('correct_content');
	    }
	  </script>
	  <form method="post" action="formpost.php?type=correct">
		  <textarea name="correct_content" id="correct_content"><?php echo($Filehtml); ?></textarea><br/>
		  <input type="submit" value="Correggi ed invia" style="width: 150px; float: right">
	  </form>
	  <?php
	}
	?>
      </div>
    </div>
    <div id="info" style="position: fixed; bottom: 20px; left: 20px; color: white; font-size: 11pt">
	<span class="versione_name" style="text-shadow: 0px 0px 22px rgba(150, 150, 150, 1);"><strong>LightSchool LIM</strong><br/>
	Versione 0.1<br/>
	Codice LIM: <?php echo($UsernameLIM); ?></span>
    </div>
</body>
</html>
<?php }elseif($_SESSION['UsernameLIM'] == '')
header("location: index.php");
?>