<?php include_once "base.php";
if($_SESSION['Username'] != ''){
  if($USER_sex == '' or $USER_type == 'ask' or $USER_date_of_birth == ''){
    ?>
    <html>
      <head>
	<title>Configurazione finale - LightSchool</title>
	<?php include_once "style_$USER_skin.php"; ?>
	<style type="text/css">
	  label{
	    display: inline-block;
	    width: 200px;
	    text-align: right;
	    padding-right: 20px;
	  }
	  label, select{
	    display: inline-block;
	    margin-bottom: 40px;
	  }
	</style>
	<script type="text/javascript">
	  $(document).ready(function(){
	    $("#finished").click(function(e){
	      e.preventDefault();
	      sex = $("#sex").val();
	      type = $("#type").val();
	      date = $("#date").val();
	      
	      $.ajax({
		type: "POST",
		url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=finish_wizard",
		data: "sex="+sex+"&type="+type+"&date="+date,
		success: function(html){
		  if(html == 'true'){
		    window.location.replace("<?= $MY_MAIN_DIRECTORY ?>/desktop");
		  }else{
		    $(".toast").css('background-color', 'red');
		    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
		  }
		},
		beforeSend:function(){
		  $(".toast").css('background-color', 'orange');
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' />Esecuzione operazione...");
		}
	      });
	      $(".toast").slideDown(400);
	    });
	  });
	  
	  (function(factory){
	    if(typeof define === "function" && define.amd){
	      // AMD. Register as an anonymous module.
	      define(["../jquery.ui.datepicker"], factory);
	    }else{
	      // Browser globals
	      factory( jQuery.datepicker );
	    }
	  }(function(datepicker){
	    datepicker.regional['it'] = {
	      closeText: 'Chiudi',
	      prevText: 'Indietro',
	      nextText: 'Avanti',
	      currentText: 'Oggi',
	      monthNames: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
	      monthNamesShort: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
	      dayNames: ['Domenica', 'Luned&igrave;', 'Marted&igrave;', 'Mercoled&igrave;', 'Gioved&igrave;', 'Venerd&igrave;', 'Sabato'],
	      dayNamesShort: ['Domenica', 'Luned&igrave;', 'Marted&igrave;', 'Mercoled&igrave;', 'Gioved&igrave;', 'Venerd&igrave;', 'Sabato'],
	      dayNamesMin: ['D','L','M','M','G','V','S'],
	      weekHeader: 'Settimana',
	      dateFormat: 'dd/mm/yy',
	      firstDay: 1,
	      isRTL: false,
	      showMonthAfterYear: false,
	      yearSuffix: ''};
	    datepicker.setDefaults(datepicker.regional['it']);
	    
	    return datepicker.regional['it'];
	  }));
	  
	  $(function(){
	    $("#date").datepicker({
	      changeMonth: true,
	      changeYear: true,
	      yearRange: '1940:2007',
	      minDate: new Date(1940, 0, 1),
	      maxDate: new Date(2007, 0, 1)
	    });
	    $("#date").datepicker("option", "showAnim", "slideDown");
	    $("#date").datepicker("option", $.datepicker.regional["it"]);
	  });
	</script>
      </head>
      <body>
	<?php include "menu.php"; ?>
	<div class="content" id="wizard">
	  <?php if($USER_sex == ''){ ?>
	    <label for="sex">Sesso</label>
	    <select id="sex" name="sex">
	      <option value="male">Maschio</option>
	      <option value="female">Femmina</option>
	    </select><br/>
	  <?php } ?>
	  <?php if($USER_type == 'ask'){ ?>
	    <label for="type">Tipo utente</label>
	    <select id="type" name="type">
	      <option value="teacher">Docente</option>
	      <option value="school">Scuola</option>
	      <option value="student">Studente</option>
	    </select><br/>
	  <?php } ?>
	  <?php if($USER_date_of_birth == ''){ ?>
	    <label for="date">Data di nascita</label>
	    <input type="text" readonly="readonly" id="date" name="date" placeholder="Data di nascita" /><br/>
	  <?php } ?>
	  Prestare attenzione alle scelte effettuate perch&eacute; non saranno pi&ugrave; modificabili!<br/><br/>
	  <input type="submit" value="Finito" id="finished" style="width: 200px">
	</div>
      </body>
    </html>
    <?php 
  }else{
    header("location: $MY_MAIN_DIRECTORY/desktop");
  }
}else{
  include_once "login.php";
} ?>