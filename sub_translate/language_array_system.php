<?php
  if($show_field === true){
    $arr = get_defined_vars();
    $count_variable = 0;
    $translate_string = array();
    if($get_variables_name === true){
      foreach($arr as $i => $value){
	if($j > $START_FROM_TRAD_STRING){
	  array_push($translate_string, $i);
	  $count_variable++;
	}
	$j++;
      }
    }else{
      foreach($arr as $i){
	if($j > $START_FROM_TRAD_STRING){
	  array_push($translate_string, $i);
	  $count_variable++;
	}
	$j++;
      }
    }
  }
?>