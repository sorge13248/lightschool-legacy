<?php
  $_GET['no_text'] = 'y';
  include "base.php";
  
  if($_SESSION['Username'] != '' && $USER_language == $LANG_it){
    if($date_bkg2 != ''){
      $date_bkg2 = '';
    }
    
    if($COMPLETE_DATE == '14/02/2015'){
      $date_bkg2 = 'diary_valentine';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR San Valentino";
    }
    if($COMPLETE_DATE == '17/02/2015'){
      $date_bkg2 = 'diary_cat';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR <a href='https://it.wikipedia.org/wiki/Festa_del_gatto' target='_blank'>Cat International Day</a>";
    }
    if($COMPLETE_DATE == '08/03/2015'){
      $date_bkg2 = 'diary_women';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR <a href='https://it.wikipedia.org/wiki/Giornata_internazionale_della_donna' target='_blank' style='color: purple'>Festa della donna</a>";
    }
    if($COMPLETE_DATE == '19/03/2015'){
      $date_bkg2 = 'diary_dad';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR <a href='https://it.wikipedia.org/wiki/Festa_del_pap%C3%A0' target='_blank' style='color: blue'>Festa del pap&agrave;</a>";
    }
    if(strpos($COMPLETE_DATE,'01/04/') !== false){
      $date_bkg2 = 'diary_fool';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR <a href='https://it.wikipedia.org/wiki/Pesce_d%27aprile' target='_blank' style='color: red'>Pesce d'aprile</a>";
    }
    if($COMPLETE_DATE == '22/04/2015'){
      $date_bkg2 = 'diary_earth';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR <a href='https://it.wikipedia.org/wiki/Giornata_della_Terra' target='_blank' style='color: darkgreen'>Giornata della Terra</a>";
    }
    if($COMPLETE_DATE == '02/04/2015' or $COMPLETE_DATE == '03/04/2015' or $COMPLETE_DATE == '04/04/2015' or $COMPLETE_DATE == '05/04/2015' or $COMPLETE_DATE == '06/04/2015' or $COMPLETE_DATE == '07/04/2015'){
      $date_bkg2 = '';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR Vacanza";
    }
    if($COMPLETE_DATE == '05/04/2015'){
      $date_bkg2 = 'diary_easter';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR Pasqua";
    }
    if($COMPLETE_DATE == '06/04/2015'){
      $date_bkg2 = '';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR Luned&igrave; dell'Angelo";
    }
    if($COMPLETE_DATE == '25/04/2015'){
      $date_bkg2 = 'diary_antifascismo';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR Liberazione dal Fascismo";
    }
    if(strpos($COMPLETE_DATE,'01/05/') !== false){
      $date_bkg2 = 'diary_work';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR <a href='https://it.wikipedia.org/wiki/Festa_del_lavoro' target='_blank' style='color: black'>Festa del lavoro</a>";
    }
    if($COMPLETE_DATE == '10/05/2015'){
      $date_bkg2 = 'diary_mum';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR <a href='https://it.wikipedia.org/wiki/Festa_della_mamma' target='_blank' style='color: purple'>Festa della mamma</a>";
    }
    if($COMPLETE_DATE == '31/05/2015'){
      $date_bkg2 = 'diary_tobacco';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR <a href='https://it.wikipedia.org/wiki/Giornata_mondiale_senza_tabacco' target='_blank' style='color: black'>Giornata mondiale senza tabacco</a>";
    }
    if($COMPLETE_DATE == '18/07/2015'){
      $date_bkg2 = 'diary_mandela';
      $SPECIAl_TEXT .= "$MORE_SPECIAL_CHAR <a href='http://www.mandeladay.com/' target='_blank' title='Nelson Mandela International Day'>Nelson Mandela Int. Day</a>";
    }
  }
?>