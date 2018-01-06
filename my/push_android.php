<?php
	//generic php function to send GCM push notification
   function sendPushNotificationToGCM($registatoin_ids, $message) {
		//Google cloud messaging GCM-API url
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
		// Google Cloud Messaging GCM API Key
		define("GOOGLE_API_KEY", "AIzaSyDA5dlLInMWVsJEUTIHV0u7maB82MCsZbU"); 		
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);	
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);				
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
?>
<?php
	
	//this block is to post message to GCM on-click
	$pushStatus = "";	
	if(!empty($_GET["push"])) {	
		$gcmRegID  = file_get_contents("GCMRegId.txt");
		$pushMessage = $_POST["message"];	
		if (isset($gcmRegID) && isset($pushMessage)) {		
			$gcmRegIds = array($gcmRegID);
			$message = array("m" => $pushMessage);	
			$pushStatus = sendPushNotificationToGCM($gcmRegIds, $message);
		}		
	}
	
	//this block is to receive the GCM regId from external (mobile apps)
	if(!empty($_GET["shareRegId"])) {
		$gcmRegID  = $_POST["regId"]; 
		file_put_contents("GCMRegId.txt",$gcmRegID);
		echo "Ok!";
		exit;
	}	
?>
<html>
  <head>
    <title>Google Cloud Messaging (GCM) Server in PHP</title>
    <style type="text/css">
      html{
	background-color: #F6F6F6;
	font-family: arial;
      }
      textarea{
	background-color: white;
	font-family: arial;
	padding: 10px;
	border: 1px solid gray;
      }
      input[type=submit]{
	background-color: #0067CF;
	padding: 10px;
	border: none;
	color: white;
	margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <h1>Servizio di notifiche push LightSchool per Android</h1>	
    <h4>Google Cloud Messaging (GCM) Server in PHP</h4>	
    <form method="post" action="gcm.php/?push=1">
      <div>
	  <textarea rows="2" name="message" cols="23" placeholder="Testo della notifica"></textarea>
      </div>
      <div><input type="submit" value="Invia notifica" /></div>
    </form>
    <p><h3><?php echo $pushStatus; ?></h3></p>
  </body>
</html>