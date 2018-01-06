<?php
include_once "base.php";

if($_SESSION['UsernameLIM'] != ''){
  if($_GET['type'] == 'accept' or $_GET['type'] == 'refuse' or $_GET['type'] == 'close'){
    $conn = new mysqli('localhost', 'DB_USER_VALUE', '', 'DB_DATABASE_VALUE');
    
    if (mysqli_connect_errno()) {
    exit('Connect failed: '. mysqli_connect_error());
    }
    
    if($_GET['type'] == 'accept'){
      $conn->query("UPDATE MYLIM_connection SET status = 'y' WHERE LimID = '$IDLIM' AND status = 's' LIMIT 1");
    }elseif($_GET['type'] == 'refuse'){
      $conn->query("UPDATE MYLIM_connection SET status = 'n' WHERE LimID = '$IDLIM' AND status = 's' LIMIT 1");
    }elseif($_GET['type'] == 'close'){
      $conn->query("UPDATE MYLIM_connection SET status = 'c' WHERE LimID = '$IDLIM' AND status = 'y' LIMIT 1");
    }
    
    $conn->close();
    
    echo('true');
  }elseif($_GET['type'] == 'settings'){
    $conn = new mysqli('localhost', 'DB_USER_VALUE', '', 'DB_DATABASE_VALUE');
    
    if (mysqli_connect_errno()) {
    exit('Connect failed: '. mysqli_connect_error());
    }
    
    $conn->query("UPDATE MYLIM_users SET Name = '".$_POST['name']."', accent = '#".$_POST['accent']."' WHERE UserID = '$IDLIM' LIMIT 1");
    
    $conn->close();
    
    echo('true');
  }
}
?>