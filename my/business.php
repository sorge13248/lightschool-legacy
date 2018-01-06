<?php include_once "base.php";
  if($_SESSION['Username'] != ''){
    ?>
    <html>
      <head>
	<title>Contabilit&agrave; - LightSchool</title>
	<?php include_once "style_$USER_skin.php"; ?>
	<style type="text/css">
	  @media screen and (min-width:630px) {
	    .column{
	      width: 500px !important;
	      display: table-cell !important;
	      margin-bottom: 0px !important;
	    }
	  }
	  .container{
	    display: table;
	  }
	  .row{
	    display: table-row;
	  }
	  .column{
	    display: block;
	    padding: 5px 20px;
	    width: 100%;
	    margin-bottom: 50px;
	  }
	  
	  .dialog .content input{
	    width: calc(100% - 40px);
	  }
	  .dialog .content select{
	    width: 100%;
	    margin-bottom: 10px;
	  }
	  .dialog .content input[type=button]{
	    width: auto;
	    margin-right: 25px;
	    border: none !important;
	    box-shadow: none;
	  }
	  .dialog .content input[type=button]:hover{
	    background-color: <?= $USER_accent_darker ?>;
	  }
	</style>
	<script type="text/javascript">
	  $(document).ready(function(){
	    if(typeof(Storage) !== "undefined") {
	      $('.container').show();
	    }else{
	      $('.not_supported').show();
	    }
	    
	    $(".draggable_dialog").draggable({ handle: ".draggable_dialog_title" });
	    
	    $('.dropdown_sub_menu div').on('click', function(e){
	      $('.dropdown_sub_menu').hide();
	    });
	  });
	    
	  function startActivity(){
	    $('#new_dialog').fadeIn(200);
	    $('#dialog_overlay').fadeIn(200);
	  }
	    
	  function createActivity(){
	    $('#new_dialog').fadeOut(200);
	    $('#dialog_overlay').fadeOut(200);
	  }
	  
	  function showMenu(sub_menu){
	    $('.dropdown_sub_menu').hide();
	    var offset = $("#"+sub_menu).offset();
	    $(sub_menu).attr('css', 'background-color: <?= $USER_accent_darker ?> !important');
	    $('#sub_'+sub_menu).css({'margin-left': (offset.left-8)+'px', 'margin-top': (offset.top-30)+'px'});
	    $('#sub_'+sub_menu).show();
	  }
	</script>
	<div class="dropdown_sub_menu" id="sub_azienda">
	  <div class="menu" onclick="$('#dialog'+'').fadeIn(200)">Modifica nome azienda</div>
	  <div class="menu" onclick="$('#dialog'+'').fadeIn(200)">Modifica ragione sociale</div>
	</div>
	<div class="dropdown_sub_menu" id="sub_fornitori">
	  <div class="menu" onclick="$('#dialog'+'').fadeIn(200)">Gestione fornitori</div>
	</div>
	<div class="dropdown_sub_menu" id="sub_clienti">
	  <div class="menu" onclick="$('#dialogClienti').fadeIn(200)">Gestione clienti</div>
	</div>
	<div class="dropdown_sub_menu" id="sub_pa">
	  <div class="menu" onclick="$('#dialog'+'').fadeIn(200)">INPS</div>
	</div>
	<div class="dropdown_sub_menu" id="sub_bilancio">
	  <div class="menu" onclick="$('#dialog'+'').fadeIn(200)">Bilancio di fine anno</div>
	</div>
	<div class="dropdown_sub_menu" id="sub_imp">
	  <div class="menu" onclick="$('#dialog'+'').fadeIn(200)">Impostazioni</div>
	  <div class="menu" onclick="$('#dialog'+'').fadeIn(200)">Supporto tecnico</div>
	  <div class="menu" onclick="$('#dialogInformazioni').fadeIn(200)">Informazioni su Contabilit&agrave;</div>
	</div>
	<div class="dialog" id="new_dialog">
	  <div class="title">Avvia attivit&agrave;<span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
	  <div class="content" id="new_frame" style="padding-top: 20px !important">
	    <input type="text" id="name" name="name" placeholder="Nome attivit&agrave;" /><br/>
	    <select>
	      <optgroup label="Societ&agrave; individuali">
		<option>Sas</option>
		<option>Snc</option>
		<option>Ss</option>
	      </optgroup>
	      <optgroup label="Societ&agrave; di capitali">
		<option>Srl</option>
		<option>Spa</option>
		<option>Sapa</option>
	      </optgroup>
	    </select>
	    <input type="button" value="Avvia" style="float: right" onclick="createActivity()" />
	  </div>
	</div>
      </head>
      <body>
	<div class="content" id="business">
	  <?php if($_GET['id'] != ''){ ?>
	    <?php
	      $_GET['SQL_type'] = 'business_online';
	      include "view_management.php";
	    ?>
	  <?php }else{ ?>
	    <p style="width: 1100px">
	      LightSchool Contabilit&agrave; &egrave; un simulatore di software gestionale aziendale. Permette l'apprendimento delle operazioni elementari della P.D. (Partita Doppia), della gestione dell'evasione degli ordini e dei rapporti con la P.A. (Pubblica Amministrazione).<br/><br/>
	    </p>
	    <div class="container" style="display: none">
	      <div class="row">
		<div class="column"><strong>ATTIVIT&Agrave; LOCALI</strong><br/>
		Le attivit&agrave; locali sono quelle salvate solo sul dispositivo in uso e non ancora caricate nel proprio Cloud.<br/><br/>
		Non ci sono attivit&agrave; locali</div>
		<div class="column"><strong>ATTIVIT&Agrave; ONLINE</strong><br/>
		Le attivit&agrave; online comprendono tutte le attivit&agrave; che sono state salvate nel proprio Cloud.<br/><br/>
		<?php
		  $_GET['SQL_type'] = 'business_online';
		  include "view_management.php";
		?></div>
	      </div>
	    </div>
	  <?php } ?>
	  
	  <div class="not_supported" style="display: none">
	    <p style="font-size: 25pt; font-family: 'Roboto'; line-height: 0px">Browser non supportato</p>
	    <p style="font-family: 'Roboto'">Aggiorna a un browser pi&ugrave; recente in quanto <i>Contabilit&agrave;</i> utilizza tecnologie di ultima generazione per funzionare</p>
	  </div>
	</div>
      </body>
    </html>
    <?php include "menu.php";
  }else{
    include_once "login.php";
} ?>