<?php
  $ONLY_REFERENCE = true; $NO_STYLE = true; $NO_SCRIPT = true; $NO_TOUCH = true; $NO_TEXT = true;
  include_once "Core.php";
	      
  $id = $conn->real_escape_string($row['id']);
  $name = $original_name = $conn->real_escape_string($row['name']);
  $type = $conn->real_escape_string($row['type']);
  $file_type = $original_file_type = $conn->real_escape_string($row['file_type']);
  $file_url = $conn->real_escape_string($row['file_url']);
  $icon = $original_icon = $conn->real_escape_string($row['icon']);
  if($REQUEST_type === "reader"){ $html = $conn->real_escape_string($row['html']); }
  
  $name = str_replace("\'", "'", $name);
  $type_icon = str_replace("notebook", "files", $type);
  
  if($icon){
    $icon = "$IMAGES_DIRECTORY/color/$icon";
  }else{
    $icon = "$IMAGES_DIRECTORY/$ICON_SET/$type_icon.png";
    if(strpos($file_type, "image/") !== false){
      $icon = "$UPLOAD_DIRECTORY$file_url";
    }elseif(strpos($file_type, "application/msword") !== false || strpos($file_type, "application/vnd.openxmlformats-officedocument.wordprocessingml.document") !== false){
      $icon = "$IMAGES_DIRECTORY/$ICON_SET/file_type/word.png";
    }elseif(strpos($file_type, "application/pdf") !== false){
      $icon = "$IMAGES_DIRECTORY/$ICON_SET/file_type/pdf.png";
    }elseif(strpos($file_type, "text/html") !== false){
      $icon = "$IMAGES_DIRECTORY/$ICON_SET/file_type/html.png";
    }
  }
  
  $app_real_name = "";
  $app_name = "";
  $second_row = "";
  
  if($type === "folder"){
    $app_real_name = $original_name;
    $app_name = "files";
    $second_row = "Cartella";
  }elseif($type === "notebook"){
    $app_real_name = "Lettore";
    $app_name = "reader";
    $second_row = "Quadero";
  }elseif($type === "stuff"){
    $app_real_name = "Lettore";
    $app_name = "reader";
    $second_row = "Materiale online";
    $icon = $original_icon;
  }elseif($type === "file"){
    $app_real_name = "Visualizzatore file";
    $app_name = "viewer";
    $second_row = "File caricato";
  }elseif($type === "diary"){
    $app_real_name = "Calendario";
    $app_name = "calendar";
    $second_row = "Evento diario";
  }
?>