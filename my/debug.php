<div style="position: fixed; top: 0px; left: 0px; width: calc(100% - 40px); height: calc(100% - 40px); background-color: black; color: white; z-index: 999999999999999999999; padding: 20px">
  <?php
    $first_date = date("15/09/2014");
    $second_date = date("15/01/2015");
    $third_date = date("16/01/2015");
    $fourth_date = date("15/06/2015");
    echo("$first_date<br/>");
    echo("$second_date<br/><br/>");
    echo("$third_date<br/>");
    echo("$fourth_date<br/><br/>");
    $today = date("d/m/Y");
    echo("$today<br/><br/>");
    
    echo("PRIMA PROVA<br/>");
    if($today > $first_date and $today < $second_date){
      echo("compreso");
    }else{
      echo("non compreso");
    }
    echo("<br/><br/>");
    echo("SECONDA PROVA<br/>");
    $first_date = explode("/", $first_date);
    $first_date[2] = str_replace("2014", "2015", $first_date[2]);
    echo("$bodytag");
  ?>
</div>