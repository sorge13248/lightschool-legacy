<?php include_once "base.php";
if($_SESSION['Username'] != ''){
  if($USER_type == 'docente'){
    $_GET['SQL_type'] = "register_appello";
    include "view_management.php";

    $REGISTER_component_array_order = array();
    
    foreach($REGISTER_component_array as $usernameregister){
      $usernameregistertype = lightschool_get_user($usernameregister, 'type');
      if($usernameregistertype == 'studente'){
	$usernameregistername = lightschool_get_user($usernameregister, 'name');
	$usernameregistersurname = lightschool_get_user($usernameregister, 'surname');
	
	if($usernameregisterassent == ''){
	  $assent_text = '';
	  $assent_highlight = '';
	}else{
	  $assent_text = 'Giustificazioni richieste';
	  $assent_highlight = 'assent_highlight';
	}
	
	$ROW_CONTENT = "$usernameregistersurname $usernameregistername";
	array_push($REGISTER_component_array_order, "$ROW_CONTENT");
      }
    }
    
    asort($REGISTER_component_array_order);
  }
?>
  <span style="font-family: 'Roboto'; font-size: 20pt; display: inline-block; margin-bottom: 10px">Note disciplinari</span><br/>
  <?php
    if($USER_type == 'docente'){
      if(count($REGISTER_component_array_order) == 0){
	echo('<p>Nessun utente fa parte di questa classe. Chiedi alla tua scuola di aggiungerne.</p>');
      }else{
	echo("<label style='display: block'>Seleziona un alunno</label><select>");
	echo("<option disabled='disabled' selected='selected'>----- Seleziona -----</option>");
	foreach($REGISTER_component_array_order as $usernameregister2){
	  echo("<option>$usernameregister2</option>");
	}
	echo("</select>");
      }
    }else{
      echo("Non hai note disciplinari.");
    }
  ?>
<?php }else{
  include_once "login.php";
} ?>
