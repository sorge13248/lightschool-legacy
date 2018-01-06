<?php
  $_GET['only_reference'] = 'true';
  include_once "System/Config.php";;
  
  if($_GET['id'] != ''){
    require_once('pdf_converter_dir/tcpdf.php');

    session_start();

    $_GET['only_reference'] = 'true';
    include_once "System/Config.php";;
    
    $DBServer = 'localhost';
    $DBUser   = 'DB_USER_VALUE';
    $DBPass   = '';
    $DBName   = 'DB_DATABASE_VALUE';
    
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if ($conn->connect_error) {
    
    }
    
    $notebook_id = $conn->real_escape_string($_GET['id']);
    
    $sql="SELECT * FROM MY_files WHERE id = '$notebook_id' AND Username = '".$_SESSION['Username']."' LIMIT 1";
    $rs=$conn->query($sql);

    if($rs === false) {
      echo "false";
    } else {
      $rows_returned = $rs->num_rows;
    }
    $rs->data_seek(0);
    $num = $rs->num_rows;
    
    
    if($num == 1){
      while($row = $rs->fetch_assoc()){
	$GENERAL_id = $row['id'];
	$GENERAL_username = $row['Username'];
	$GENERAL_name = $row['name'];
	$GENERAL_type = $row['type'];
	$GENERAL_icon = $row['icon'];
	$GENERAL_html = $row['html'];
	$GENERAL_folder = $row['folder'];
	$GENERAL_file_url = $row['file_url'];
	$GENERAL_file_size = $row['file_size'];
	$GENERAL_file_type = $row['file_type'];
	$GENERAL_create_date = $row['create_date'];
	$GENERAL_last_edit = $row['last_edit'];
	$GENERAL_last_view = $row['last_view'];
      }
    }

    $title = $GENERAL_name;
    $html2 = $GENERAL_html;

    // crea un documento PDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetMargins(PDF_MARGIN_LEFT, 160, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderData(false, false, "$title", "di ".$_SESSION['Username']);
    $pdf->SetPrintFooter(false);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->SetTitle("$GENERAL_name");
    $pdf->AddPage();

    $html2 = str_replace('à', '&agrave;', "$html2");
    $html2 = str_replace('ò', '&ograve;', "$html2");
    $html2 = str_replace('ù', '&ugrave;', "$html2");
    $html2 = str_replace('è', '&egrave;', "$html2");
    $html2 = str_replace('é', '&eacute;', "$html2");

$html = <<<EOD
$html2
EOD;

    $pdf->writeHTMLCell(0, 0, 10, 10, $html);

    // Invia PDF inline
    $pdf->Output("$GENERAL_name.pdf", 'D');
  }else{
    ?>
      Nessun file selezionato
    <?php
  }
?>