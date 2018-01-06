<?php
require_once('class.phpmailer.php');

function lightschool_send_email($type, $address, $name, $surname, $username, $id, $sex, $accent, $fore_color, $field6, $field7, $field8, $lang){
  $_GET['only_reference'] = 'true';
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/base.php";
  
  include_once "$path";
  $link_as_button = "style='padding: 10px 20px; background-color: $accent; color: white; text-decoration: none' target='_blank'";
  
  if($type == 'register'){
    if($sex == 'm'){
      $sex_complete = 'o';
    }else{
      $sex_complete = 'a';
    }
    $Subject = "Benvenut$sex_complete su LightSchool";
  }elseif($type == 'recover'){
    $Subject = "Recupero password";
  }
  
  $HTML = "<div style='width: calc(100% - 40px)'><div style='padding: 10px 20px; width: 100%; background-color: $accent; color: white; font-size: 20pt'>$Subject</div><br/><div style='font-size: 12pt; padding: 0px 20px'>
  Ciao $name $surname!<br/>";
  
  if($type == 'register'){
    $link1 = "http://MAIN_HTTP_ADDRESS/my/activate?code=$field6";
    $HTML .= "Ti diamo il benvenuto su LightSchool! Prima di poter utilizzare il tuo account, ti chiediamo gentilmente di verificare il tuo indirizzo e-mail cliccando sul pulsante qui sotto.<br/><br/>
    <a href='$link1' $link_as_button>Attiva l'account</a><br/><br/>
    Se il tuo browser o programma e-mail non supporta i link, copia e incolla questo indirizzo web nella barra degli indirizzi del tuo browser: $link1<br/>";
  }elseif($type == 'recover'){
    $link1 = "http://MAIN_HTTP_ADDRESS/my/recover?code=$field6";
    $HTML .= "Per completare la procedura di recupero password, clicca sul pulsante qui sotto.<br/><br/>
    <a href='$link1' $link_as_button>Recupera password</a><br/><br/>
    Se il tuo browser o programma e-mail non supporta i link, copia e incolla questo indirizzo web nella barra degli indirizzi del tuo browser: $link1<br/>";
  }
  
  $HTML .= "</div><br/><div style='padding: 10px 20px; width: 100%; margin-bottom: 50px; background-color: #F6F6F6; font-size: 10pt'>Questo messaggio &egrave; stato inviato automaticamente. Non rispondere a questo messaggio. In caso di problemi contattare <a href='mailto:MAIL_SUPPORT_ADDRESS'>MAIL_SUPPORT_ADDRESS</a>.<br/>
  LightSchool non ti chieder&agrave; mai informazioni personali per e-mail, n&egrave; ti invier&agrave; mai materiale pubblicitario per e-mail. Se credi di essere stato vittima di phishing, rivolgiti alla nostra e-mail di supporto tecnico <a href='mailto:MAIL_SUPPORT_ADDRESS'>MAIL_SUPPORT_ADDRESS</a>.</div></div>";
  
  if($lang == 'it-IT'){
    $SetFromName = "LightSchool Italia";
  }elseif($lang == 'en-EN'){
    $SetFromName = "LightSchool International";
  }elseif($lang == 'fr-FR'){
    $SetFromName = "LightSchool France";
  }
  $mail = new PHPMailer(true);

  $mail->IsSMTP(); // telling the class to use SMTP

  try{
    $mail->Host       = "mail.francescosorge.com"; // SMTP server
    // $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Host       = "mail.francescosorge.com"; // sets the SMTP server
    //$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
    $mail->Port       = 587;                    // set the SMTP port for the GMAIL server
    $mail->SMTPSecure = 'tls';
    $mail->Username   = "MAIL_ACCOUNT_USERNAME"; // SMTP account username
    $mail->Password   = "MAIL_ACCOUNT_PASSWORD";        // SMTP account password
    $mail->AddAddress("$address", "$AddAddressName");
    $mail->SetFrom('MAIL_ACCOUNT_USERNAME', "$SetFromName");
    $mail->Subject = "$Subject";
    $mail->MsgHTML("$HTML");
    $mail->Send();
    return 'true';
  }catch(phpmailerException $e){
    return $e->errorMessage(); //Pretty error messages from PHPMailer
  }catch(Exception $e){
    return $e->getMessage(); //Boring error messages from anything else!
  }
}
?>
