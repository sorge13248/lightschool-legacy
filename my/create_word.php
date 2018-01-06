<?php
include_once "base.php";

if($_SESSION['Username'] != ''){
  if($_POST['form_title'] == ''){
    $_POST['form_title'] = 'Documento senza titolo';
  }
  $_POST['form_title2'] = preg_replace('/\s+/', '_', $_POST['form_title']);

  require_once 'create_word_dir/Autoloader.php';
  \PhpOffice\PhpWord\Autoloader::register();

  // Creating the new document...
  $phpWord = new \PhpOffice\PhpWord\PhpWord();

  /* Imposta proprieta file */

  $properties = $phpWord->getDocInfo();
  $properties->setCreator("$USER_name $USER_surname");
  $properties->setTitle($_POST['form_title']);
  $properties->setLastModifiedBy("$USER_name $USER_surname");
  $properties->setCreated(date("Y-m-d H:i:s"));
  
  $section = $phpWord->addSection();
  $html = addslashes($_POST['form_html']);
  \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);

  if(!file_exists($target_path)){
    mkdir($target_path, 0777, true);
  }
  
  $date_now = date("d/m/Y H:i:s");
  
  if($_GET['type'] == 'word2007'){
    // Saving the document as OOXML file...
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save($target_path.$_POST['form_title2'].'.docx');
    
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	
    if (mysqli_connect_errno()) {
      echo('false');
      exit();
    }
    
    if($_GET['f'] == ''){
      $_GET['f'] = '/';
    }
    
    $POSTNAMEESCAPE = $conn->real_escape_string($_POST['form_title'].'.docx');
    $GETFOLDERESCAPE = $conn->real_escape_string($_GET['f']);
    $date_now = $conn->real_escape_string($date_now);
    
    $POSTNAMEESCAPE = str_replace("<br/>","",$POSTNAMEESCAPE);
    $POSTNAMEESCAPE = str_replace("<br>","",$POSTNAMEESCAPE);
  
    $sql="INSERT INTO MY_files (Username, type, name, folder, file_url, file_type, file_size, create_date) VALUES ('$Username', 'file', '$POSTNAMEESCAPE', '$GETFOLDERESCAPE', '".$target_path.$_POST['form_title2'].".docx', 'application/msword', 'Unknown', '$date_now')";
    
    $rs=$conn->query($sql);
    
    $conn->close();
	
    echo('true word2007');
  }elseif($_GET['type'] == 'openoffice'){
    // Saving the document as ODF file...
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
    $objWriter->save($target_path.$_POST['form_title2'].'.odt');
  }elseif($_GET['type'] == 'html'){
    // Saving the document as HTML file...
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
    $objWriter->save($target_path.$_POST['form_title2'].'.html');
  }
}else{
  echo('<h1>Accesso negato</h1>');
}
?>
