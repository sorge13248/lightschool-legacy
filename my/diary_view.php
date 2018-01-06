<?php
  $_GET['no_text'] = 'y';

  include "base.php";
  
  if($_SESSION['Username'] != ''){
    if($_GET['month'] == ''){
      //This gets today's date
      $date = time() ; //This puts the day, month, and year in seperate variables
      $day = date('d', $date);
      $month = date('m', $date);
      $month2 = date('m', $date) + 1;
      $year = date('Y', $date);
    }elseif($_GET['month'] != ''){
      $day = $_GET['day'];
      $month = $_GET['month'];
      $month2 = $_GET['month'] + 1;
      $year = $_GET['year'];
    }
    
    if(strlen($month) == 1){
      $month = '0'.$month;
    }

    //Here we generate the first day of the month
    $first_day = mktime(0,0,0,$month, 0, $year);

    //This gets us the month name
    $title = date('F', $first_day);
    
    if($title == 'December'){
      $title = $TRAD_month[0];
    }elseif($title == 'January'){
      $title = $TRAD_month[1];
    }elseif($title == 'February'){
      $title = $TRAD_month[2];
    }elseif($title == 'March'){
      $title = $TRAD_month[3];
    }elseif($title == 'April'){
      $title = $TRAD_month[4];
    }elseif($title == 'May'){
      $title = $TRAD_month[5];
    }elseif($title == 'June'){
      $title = $TRAD_month[6];
    }elseif($title == 'July'){
      $title = $TRAD_month[7];
    }elseif($title == 'August'){
      $title = $TRAD_month[8];
    }elseif($title == 'September'){
      $title = $TRAD_month[9];
    }elseif($title == 'October'){
      $title = $TRAD_month[10];
    }elseif($title == 'November'){
      $title = $TRAD_month[11];
    }
    
    $first_day = mktime(0,0,0,$month, 0, $year);

    //Here we find out what day of the week the first day of the month falls on  
    $day_of_week = date('D', $first_day);
    //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero  
    switch($day_of_week){
      case "Sun": $blank = 0; break;
      case "Mon": $blank = 1; break;
      case "Tue": $blank = 2; break;
      case "Wed": $blank = 3; break;
      case "Thu": $blank = 4; break;
      case "Fri": $blank = 5; break;
      case "Sat": $blank = 6; break;
    }
    //We then determine how many days are in the current month 
    $days_in_month = cal_days_in_month(0, $month, $year); 

    //Here we start building the table heads
    ?>
    <table cellspacing='20' style='margin-top: 50px; text-align: center; height: calc(100% - 150px); width: calc(100% - 20px); position: absolute; top: 0; bottom: 0; left: 10px; right: 0; margin-bottom: 70px'>
    <tr style="height: 10px; font-size: 20pt"><th colspan="7" style="font-family: 'Roboto'"><?php echo($title.' '.$year); ?></th></tr>
    <tr style='font-weight: bold; height: 10px'><td style='width: 14.28%'><span class='text_complete'><?= $TRAD_day_short[1] ?></span><span class='text_min'><?= $TRAD_day_short[1] ?></span></td><td style='width: 14.28%'><span class='text_complete'><?= $TRAD_day_short[2] ?></span><span class='text_min'><?= $TRAD_day_short[2] ?></span></td><td style='width: 14.28%'><span class='text_complete'><?= $TRAD_day_short[3] ?></span><span class='text_min'><?= $TRAD_day_short[3] ?></span></td><td style='width: 14.28%'><span class='text_complete'><?= $TRAD_day_short[4] ?></span><span class='text_min'><?= $TRAD_day_short[4] ?></span></td><td style='width: 14.28%'><span class='text_complete'><?= $TRAD_day_short[5] ?></span><span class='text_min'><?= $TRAD_day_short[5] ?></span></td><td style='width: 14.28%'><span class='text_complete'><?= $TRAD_day_short[6] ?></span><span class='text_min'><?= $TRAD_day_short[6] ?></span></td><td style='width: 14.28%'><span class='text_complete'><?= $TRAD_day_short[0] ?></span><span class='text_min'><?= $TRAD_day_short[0] ?></span></td></tr>
    <?php
    
    //This counts the days in the week, up to 7  
    $day_count = 1;
    
    echo "<tr>";
    
    if($_GET['month'] == ''){
      $today_date = date("d");
    }elseif($_GET['month'] != ''){
      $today_date = "";
    }
    
    //first we take care of those blank days
    while($blank > 0){
      echo "<td></td>";
      $blank = $blank - 1;
      $day_count++;
    }

    //sets the first day of the month to 1   
    $day_num = 1;    
    //count up the days, untill we've done all of them in the month  
    while($day_num <= $days_in_month){      
      $day_num_show = $day_num;
      
      if(strlen($day_num) == 1){
	$day_num = "0".$day_num;
      }
      
      $COMPLETE_DATE = $day_num.'/'.$month.'/'.$year;
      
      $date_bkg = "";
      $SPECIAl_TEXT = "";
  
      $MORE_SPECIAL_CHAR = "<br/><span style='color: gray' class='text_complete'><span style='color: $USER_accent' class='text_min'>&#9679;</span>";
      
      include "event_management.php";
      
      if($today_date == $day_num){
	$date_bkg2 .= " diary_day_current";
      }
      ?>
      <!-- <td onclick="newDiary('<?= $day_num ?>')" class="diary_day <?= $date_bkg2 ?>" valign="top"> -->
      <td class="diary_day <?= $date_bkg2 ?>" valign="top" day="<?= "$day_num/$month/$year" ?>">
      <?php echo($day_num_show); ?>
	<?php
	  echo($SPECIAl_TEXT);
	  
	  $_GET['SQL_type'] = 'diary';
	  include "view_management.php";
	?>
      </td>
      <?php
      $day_num++;
      $day_count++;
    
      //Make sure we start a new row every week 
      if($day_count > 7){
	echo "</tr><tr>"; 
	$day_count = 1;
      }
    }

    //Finaly we finish out the table with some blank details if needed  
    while($day_count >1 && $day_count <=7){
      echo "<td></td>";
      $day_count++;
      }
    echo "</tr></table>";
  }
?>