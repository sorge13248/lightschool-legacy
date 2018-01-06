<?php
if($_GET['cron'] == '1'){
 $conn = new mysqli('localhost', 'DB_USER_VALUE', '', 'DB_DATABASE_VALUE');
  // check connection
  if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
  }

  $now = date("Y-m-d");

  // this person already has a b-day saved, update it
  $conn->query("UPDATE MY_users SET deactivated = deactivated+1 WHERE NOT deactivated = 'n'");
  // liberazione delle risorse occupate dal risultato
  $conn->close();

  $conn = new mysqli('localhost', 'DB_USER_VALUE', '', 'DB_DATABASE_VALUE');
  // check connection
  if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
  }

  // this person already has a b-day saved, update it
  $conn->query("UPDATE MY_users SET deleted = 'y' WHERE deactivated > 15");
  // liberazione delle risorse occupate dal risultato
  $conn->close(); 
}elseif($_GET['cron'] == '2'){
  $DBServer = 'localhost';
  $DBUser   = 'DB_USER_VALUE';
  $DBPass   = '';
  $DBName   = 'DB_DATABASE_VALUE';
  
  $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

  // check connection
  if ($conn->connect_error) {
    trigger_error('Connessione al database fallita: '  . $conn->connect_error, E_USER_ERROR);
  }
  $date = date("d/m/Y");
  $sql="SELECT * FROM MY_files WHERE type = 'diary' AND diary_reminder = '$date' AND NOT folder = 'c' AND NOT diary_reminder = ''";

  $rs=$conn->query($sql);
  
  if($rs === false) {
    trigger_error('Errore SQL: ' . $sql . ' Errore: ' . $conn->error, E_USER_ERROR);
  } else {
    $rows_returned = $rs->num_rows;
  }
  $rs->data_seek(0);
  $num = $rs->num_rows;
  
  if($num != '0'){
    while($row = $rs->fetch_assoc()){
      $diary_name = $row['name'];
      $Username = $row['Username'];
      $diary_id = $row['id'];
      $diary_type = $row['diary_type'];
      $diary_date = $row['diary_date'];
      $diary_reminder = $row['diary_reminder'];
      
      $conn2 = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

      // check connection
      if ($conn2->connect_error) {
	trigger_error('Connessione al database fallita: '  . $conn2->connect_error, E_USER_ERROR);
      }
      
      $sql2="SELECT * FROM MY_users WHERE Username = '$Username' AND deactivated = 'n' LIMIT 1";

      $rs2=$conn2->query($sql2);
      
      if($rs === false) {
	trigger_error('Errore SQL: ' . $sql2 . ' Errore: ' . $conn2->error, E_USER_ERROR);
      } else {
	$rows_returned2 = $rs2->num_rows;
      }
      $rs2->data_seek(0);
      $num2 = $rs2->num_rows;
      
      if($num2 != '0'){
	while($row2 = $rs2->fetch_assoc()){
	  $EmailAddress = $row2['EmailAddress'];
	  $name = $row2['name'];
	  $surname = $row2['surname'];
	  
	  require_once 'mailer/swift_required.php';
	  
	  // Create the mail transport configuration
	  $transport = Swift_MailTransport::newInstance();
	  
	  // Create the message
	  $message = Swift_Message::newInstance();
	  $message->setTo(array(
	    "$EmailAddress" => "$name $surname"
	  ));
	  $message->setSubject("$diary_type di $diary_name");
	  $message->setBody('<meta name="viewport" content="width=device-width, user-scalable=no">
			    <div style="width: 100%; max-width: 750px">
			    <table cellspacing="0" cellpadding="0" width="100%">
			    <tr>
			    <td style="background-color: #0C2978; color: white; font-weight: lighter; padding: 20px; font-size: 20pt">
			    '.$diary_type.' di '.$diary_name.'
			    </td>
			    </tr>
			    </table>
			    <br/>
			    Ciao ' . $name . ',<br/>
			    Ricordati di '.$diary_type.' di '.$diary_name.' in data '.$diary_date.'.<br/>
			    Per vedere l evento diario clicca qui:<br/><br/>
			    <a href="https://my.lightschool.it/read/'.$diary_id.'">https://my.lightschool.it/read/'.$diary_id.'</a><br/><br/>
			    Se il tuo browser o client e-mail non supporta i link, copia e incolla questo link nella finestra del tuo browser:<br/>https://my.lightschool.it/read/'.$diary_id.'<br/>
			    Buono studio!<br/><br/>
			    Cordiali saluti,<br/>
			    Team di LightSchool<br/><br/>
			    <span style="color: grey">LightSchool non ti chieder&agrave; mai informazioni personali per e-mail, n&egrave; ti invier&agrave; mai materiale pubblicitario per e-mail.<br/>
			    Se credi di essere stato vittima di phishing, rivolgiti alla nostra e-mail di supporto tecnico <a href="mailto:MAIL_SUPPORT_ADDRESS">MAIL_SUPPORT_ADDRESS</a>.</span>
			    </div>', 'text/html');
	  $message->setFrom("noreply@lightschool.it", "LightSchool");
	  
	  // Send the email
	  $mailer = Swift_Mailer::newInstance($transport);
	  $mailer->send($message);
	}
      }
    }
  }
}
?>