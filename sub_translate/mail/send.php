<?php
require_once('class.phpmailer.php');

$link_as_button = "style='padding: 10px 20px; background-color: #0156a4; color: white; text-decoration: none' target='_blank'";

if($INCLUDE_MAIL_ACTION == 'send_temporary_email'){
  $Subject = "LightSchool Translate";
}

$HTML = "<div style='width: calc(100% - 40px)'><div style='padding: 10px 20px; width: 100%; background-color: #0156a4; color: white; font-size: 20pt'>$Subject</div><br/><div style='font-size: 12pt; padding: 0px 20px'>
Hi stranger!<br/>";

if($INCLUDE_MAIL_ACTION == 'send_temporary_email'){
  $link1 = "http://translate.lightschool.it/activate?code=$Activation_Code";
  $HTML .= "Welcome to LightSchool Translate! Use the link below to access your account everytime you need.<br/><br/>
  <a href='$link1' $link_as_button>Access your account</a><br/><br/>
  If your browser or e-mail software doesn't support link, copy and paste this web address on the address bar of your browser: $link1<br/>";
}

$HTML .= "</div><br/><div style='padding: 10px 20px; width: 100%; margin-bottom: 50px; background-color: #F6F6F6; font-size: 10pt'>This e-mail has been sent automatically. Do not reply to this message. If you need help, contact us at <a href='mailto:MAIL_SUPPORT_ADDRESS'>MAIL_SUPPORT_ADDRESS</a>.<br/>LightSchool will never ask you personal information and will never send you ads. If you think you've been phishing victim, ask for help our team<a href='mailto:MAIL_SUPPORT_ADDRESS'>MAIL_SUPPORT_ADDRESS</a>.</div></div>";

$SetFromName = "LightSchool Translate";
$mail = new PHPMailer(true);

$mail->IsSMTP(); // telling the class to use SMTP

try{
  $mail->Host       = ""; // SMTP server
  // $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = ""; // sets the SMTP server
  $mail->Port       = 0;                    // set the SMTP port for the GMAIL server
  $mail->Username   = ""; // SMTP account username
  $mail->Password   = "";        // SMTP account password
  $mail->AddAddress("$email", "Stranger");
  $mail->SetFrom('', "$SetFromName");
  $mail->Subject = "$Subject";
  $mail->MsgHTML("$HTML");
  $mail->Send();
  return 'true';
}catch(phpmailerException $e){
  return $e->errorMessage(); //Pretty error messages from PHPMailer
}catch(Exception $e){
  return $e->getMessage(); //Boring error messages from anything else!
}
?>
