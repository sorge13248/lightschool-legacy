<?php include_once "base.php";
if($_SESSION['UsernameLIM'] != ''){
  ?>
  <!DOCTYPE html>
  <html lang="it">
    <head>
      <title>LightSchool LIM</title>
      <?php include_once "style.php"; ?>
      <script type="text/javascript">
	var updater = setInterval(function () {
	  $("body > .updater").load("<?= $LIM_MAIN_DIRECTORY ?>/updater.php");
        },2000);
        
	$(document).ready(function(e){
	  $(function(){
	    $(".updater").on("click","#accept",function(e){
	      $(".background_agent").load("<?= $LIM_MAIN_DIRECTORY ?>/formpost.php?type=accept");
	      $("#accept").html("Mi sto connettendo...");
	      $("#accept").attr("disabled", "disabled");
	      $("#refuse").attr("disabled", "disabled");
	    });
	    $(".updater").on("click","#refuse",function(e){
	      $(".background_agent").load("<?= $LIM_MAIN_DIRECTORY ?>/formpost.php?type=refuse");
	      $("#refuse").html("Sto rifiutando...");
	      $("#accept").attr("disabled", "disabled");
	      $("#refuse").attr("disabled", "disabled");
	    });
	    
	    $(".updater").on("click","#close_connection",function(e){
	      $(".background_agent").load("<?= $LIM_MAIN_DIRECTORY ?>/formpost.php?type=close");
	      $("#close_connection").html("Chiusura in corso...");
	      $("#close_connection").attr("disabled", "disabled");
	      document.title = 'LightSchool LIM';
	    });
	  });
	});
      </script>
    </head>
    <body>
      <?php include_once "menu.php"; ?>
      <div class="container updater" style="padding-top: 80px">
	<h2><div class="spinner"></div>Caricamento interfaccia...</h2><br/>
      </div>
    </body>
  </html>
<?php }elseif($_SESSION['UsernameLIM'] == ''){
  include_once "login.php";
} ?>