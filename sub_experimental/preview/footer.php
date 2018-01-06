<hr/>

<div class="container">
  <footer>
    <div class="row">
      <div class="col-xs-6 col-md-4">
	<div style="margin-bottom: 20px">
	  <h3>Contatti</h3>
	  <strong>LightSchool</strong><br/>
	  <font class="label_for_email_contacts">Supporto tecnico:</font> <?php echo($MAIL_SUPPORT); ?><br/>
	  <font class="label_for_email_contacts">Informazioni generali:</font> <?php echo($MAIL_INFO); ?><br/>
	  <font class="label_for_email_contacts">Commerciale:</font> <?php echo($MAIL_BUSINESS); ?>
	</div>
	<div style="margin-bottom: 20px">
	  <h3>Social</h3>
	  <a href="https://www.facebook.com/LightSchoolIT" target="_blank"><img src="<?= $IMAGES_MAIN_DIRECTORY ?>/color/facebook.png" alt="Facebook" style="width: 32px; height: 32px" /></a>
	</div>
      </div>
      <div class="col-xs-12 col-md-8">
	<h3>Link utili</h3>
	<a class="label_for_useful_link" style="margin-top: 0px" href="<?= $MAIN_DIRECTORY ?>/golink?fwd_link=1">Condizioni d'utilizzo</a>
	<a class="label_for_useful_link" href="<?= $MAIN_DIRECTORY ?>/golink?fwd_link=2">Informativa sulla privacy</a>
	<a class="label_for_useful_link" href="<?= $MAIN_DIRECTORY ?>/golink?fwd_link=3">Note legali</a>
	<a class="label_for_useful_link" href="<?= $MAIN_DIRECTORY ?>/golink?fwd_link=4">Stato servizi</a>
	<a class="label_for_useful_link" href="<?= $MAIN_DIRECTORY ?>/golink?fwd_link=5">Accesso per studenti e docenti</a>
	<a class="label_for_useful_link" href="<?= $MAIN_DIRECTORY ?>/golink?fwd_link=8">Accesso per le scuole</a>
	<a class="label_for_useful_link" href="<?= $MAIN_DIRECTORY ?>/golink?fwd_link=6">Dashboard editori</a>
	<a class="label_for_useful_link" href="<?= $MAIN_DIRECTORY ?>/golink?fwd_link=9">App</a>
      </div>
    </div>
</div>

<hr>

<div class="container" style="padding-bottom: 40px">
    <p><span style="float: right">&copy; 2012-2015 LightSchool di Francesco Sorge</span></p>
  </footer>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug
<script src="//getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script> -->
<?php if($current_page == 'home'){ ?>
  <script src="owl-carousel/owl.carousel.js"></script>
  <script>
    $(document).ready(function(){
      $("#features-tour").owlCarousel({

	// Most important owl features
	items : 5,
	itemsCustom : false,
	itemsDesktop : [1199,4],
	itemsDesktopSmall : [980,3],
	itemsTablet: [768,2],
	itemsTabletSmall: false,
	itemsMobile : [479,1],
	singleItem : false,
	itemsScaleUp : false,
    
	//Basic Speeds
	slideSpeed : 200,
	paginationSpeed : 800,
	rewindSpeed : 1000,
    
	//Autoplay
	autoPlay : false,
	stopOnHover : false,
    
	// Navigation
	navigation : false,
	navigationText : [
	  "<i class='icon-chevron-left icon-white'>&lt;</i>",
	  "<i class='icon-chevron-right icon-white'>&gt;</i>"
	  ],
	rewindNav : true,
	scrollPerPage : false,
    
	//Pagination
	pagination : true,
	paginationNumbers: false,
    
	// Responsive 
	responsive: true,
	responsiveRefreshRate : 200,
	responsiveBaseWidth: window,
    
	// CSS Styles
	baseClass : "owl-carousel",
	theme : "owl-theme",
    
	//Lazy load
	lazyLoad : false,
	lazyFollow : true,
	lazyEffect : "fade",
    
	//Auto height
	autoHeight : false,
    
	//JSON 
	jsonPath : false, 
	jsonSuccess : false,
    
	//Mouse Events
	dragBeforeAnimFinish : true,
	mouseDrag : true,
	touchDrag : true,
    
	//Transitions
	transitionStyle : false,
    
	// Other
	addClassActive : false,
    
	//Callbacks
	beforeUpdate : false,
	afterUpdate : false,
	beforeInit: false, 
	afterInit: false, 
	beforeMove: false, 
	afterMove: false,
	afterAction: false,
	startDragging : false,
	afterLazyLoad : false
      });
    });
  </script>
<?php } ?>