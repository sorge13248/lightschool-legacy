<?php
$stable_version = '0.7';
$beta_version = '0.7';
if($_GET['cur_version'] == $stable_version and $_GET['channel'] == 'stable'){
	echo('<title>'.$stable_version.'</title>');
}
elseif($_GET['cur_version'] < $stable_version and $_GET['channel'] == 'stable'){
	echo('<title>'.$stable_version.'</title>');
	if($_GET['download'] == 'y'){
	header("location: /windows/setup.exe");
	}
}
elseif($_GET['cur_version'] == $beta_version and $_GET['channel'] == 'beta'){
	echo('<title>'.$beta_version.'</title>');
}
elseif($_GET['cur_version'] < $beta_version and $_GET['channel'] == 'beta'){
	echo('<title>'.$beta_version.'</title>');
	if($_GET['download'] == 'y'){
	header("location: /windows/setup_beta.exe");
	}
}
elseif($_GET['cur_version'] > $stable_version){
	echo('<title>NO-TO-UP</title>');
}
else{
	echo('<title>Errore</title>');
}
?>