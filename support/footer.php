
  <hr/>
  <div class="container">
      <div class="row">
	<?php if($current_page != 'submit'){ ?>
	  <div class="col-md-6">
	    <h3><div class="glyphicon glyphicon-question-sign" style="margin-right: 10px; font-size: 20px"></div>Hai ancora bisogno di aiuto?</h3>
	    <p>Non hai trovato la soluzione al tuo problema o la soluzione fornita dalla documentazione non ti &egrave; servita?<br/>
	    Apri un ticket di assistenza e saremo lieti di aiutarti.</p>
	    <a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/submit" class="btn btn-primary">Apri un ticket</a>
	  </div>
	  <div class="col-md-6" style="padding-top: 20px">
	<?php }else{ ?>
	  <div class="col-md-6">
	<?php } ?>
	  <div class="glyphicon glyphicon-time"></div>Il servizio di assistenza tecnica &egrave; disponibile nei seguenti orari:<br/>
	  Lun-ven&nbsp;&nbsp;&nbsp;7.00&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;22.00<br/>
	  Sab-dom&nbsp;&nbsp;12.00&nbsp;&nbsp;-&nbsp;&nbsp;17.00 (solo per richieste con priorit&agrave; Alta)
	</div>
    </div>
  </div>
<hr/>

<footer>
  <div class="container" style="padding-bottom: 40px">
    <p>Supporto di LightSchool fa parte di <a href="<?= $MAIN_DIRECTORY ?>/">LightSchool.it</a>.&nbsp; Condizioni d'utilizzo, informativa sulla privacy e qualsiasi altro documento legale sono presenti sul sito web principale.</p><br/>
    <p><span style="float: right">Tutti i diritti riservati. LightSchool di Francesco Sorge</span></p>
  </div>
</footer>