<?php
include "base.php";
include "language_$USER_language.php";
$DBServer = 'localhost';
$DBUser   = 'DB_USER_VALUE';
$DBPass   = '';
$DBName   = 'DB_DATABASE_VALUE';

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

// check connection
if ($conn->connect_error) {
  trigger_error('Connessione al database fallita: '  . $conn->connect_error, E_USER_ERROR);
}
$sql="SELECT * FROM MY_users WHERE Username = '$Username' LIMIT 1";

$rs=$conn->query($sql);

if($rs === false) {
  trigger_error('Errore SQL: ' . $sql . ' Errore: ' . $conn->error, E_USER_ERROR);
} else {
  $rows_returned = $rs->num_rows;
}
$rs->data_seek(0);
$num = $rs->num_rows;

if($num == '1'){
  while($row = $rs->fetch_assoc()){
    if($_GET['require'] == 'complete_name'){
      $USER_name = $row['name'];
      $USER_surname = $row['surname'];
      $output = $USER_name.' '.$USER_surname;
    }
    elseif($_GET['require'] == 'profile_image'){
      $USER_image = $row['profile_image'];
      if($USER_image == 'default'){
	if($USER_sex == 'Maschio'){
	  $USER_image = 'images/icons/dark/profile_male.png';
	}
	elseif($USER_sex == 'Femmina'){
	  $USER_image = 'images/icons/dark/profile_female.png';
	}
      }
      $output = "//my.lightschool.it/".$USER_image;
    }elseif($_GET['require'] == 'email_address'){
      $output = $row['EmailAddress'];
    }elseif($_GET['require'] == 'username'){
      $output = $row['Username'];
    }elseif($_GET['require'] == 'beta'){
      $output = $row['is_beta'];
    }elseif($_GET['require'] == 'winbeta'){
      $output = $row['is_winbeta'];
    }
  }
?>
<title><?= $output ?></title>
<?php
}
?>
