<?php
  class LightSchool{
    function temporary_class_id_generator(){
      $today = date_format(date("usiHYmd"));
      
      return $today;
    }
    
    function generateRandomString($length) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
	  $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }
    
    function request_string_database($type, $column, $other_data){
      // type è il tipo di richiesta che si vuole fare
      // column è il valore della colonna che si vuole richiede
      // other data è un array che può contenere qualsiasi altro tipo di informaione non rientri nelle altre due variabili
      
      // ottiene i dati di autenticazione al database dal Core.php e li rende global
      global $DBServer, $DBUser, $DBPass, $DBName, $conn, $MY_DIRECTORY, $default_profile_image_black_to_complete, $FN_sex;
      $REQUEST_sql = "";
      
      if($type === "school"){
	$conn = new mysqli($DBServer, $DBUser, $DBPass, "DB_CONFIG_NOT_SHIPPED");
      }
      
      if($type === "school"){
	$other_data = $conn->real_escape_string($other_data);
	$REQUEST_sql = "SELECT * FROM SC_users WHERE UserID = '$other_data' LIMIT 1";
      }elseif($type === "student_teacher" || $type === "TrustedLogin"){
	$other_data = $conn->real_escape_string($other_data);
	$REQUEST_sql = "SELECT * FROM MY_users WHERE Username = '$other_data' LIMIT 1";
      }
      
      if($conn->connect_error){ echo("Errore di collegamento. Codice errore: 1"); exit(); }
      
      $rs = $conn->query($REQUEST_sql);
      
      if($rs === false){ echo("Errore di esecuzione query. Codice errore: 2"); exit(); }else{
	$rows_returned = $rs->num_rows;
      }
      
      $rs->data_seek(0);
      $num = $rs->num_rows;
      
      if($num === 0){
	return "false";
      }else{
	while($row = $rs->fetch_assoc()){
	  $return = $conn->real_escape_string($row[$column]);
	  
	  if($column === "profile_image"){
	    $exist = file_exists("$MY_DIRECTORY/$return");
	    
	    if($exist === false){
	      $return = $default_profile_image_black_to_complete."$FN_sex.png";
	    }
	  }
	  
	  return $return;
	}
      }
    }
  }
  
  $LightSchool = new LightSchool;
?>