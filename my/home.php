<?php include_once "base.php";
if($_SESSION['Username'] != ''){
  $PHP_hour = date("H");
  
  if($PHP_hour >= 21){
    $BKG = "night";
  }elseif($PHP_hour >= 14){
    $BKG = "evening";
  }elseif($PHP_hour >= 12){
    $BKG = "lunchtime";
  }elseif($PHP_hour >= 8){
    $BKG = "morning_b";
  }elseif($PHP_hour >= 6){
    $BKG = "morning_a";
  }elseif($PHP_hour >= 0){
    $BKG = "night";
  }
  
  $wallpaper = array("http://hdwallpapersfit.com/wp-content/uploads/2015/03/famous-paintings-wallpapers-hd.jpg", "http://www.download-hd-wallpapers.com/wp-content/uploads/2014/07/famous-art-desktop-wallpaper.jpg", "http://www.dream-wallpaper.com/free-wallpaper/art-wallpaper/world-famous-paintings-episode-3-wallpaper/1440x900/free-wallpaper-11.jpg", "http://hivewallpaper.com/wallpaper/2014/10/mona-lisa-27-wallpaper-background-hd.jpg");
shuffle($wallpaper);
  $url = $wallpaper[0];
?>
<html>
  <head>
    <title>LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <script type="text/javascript">
      $(document).ready(function(){
	$('#test').rssfeed('http://www.repubblica.it/rss/homepage/rss2.0.xml', {
	  limit: 6,
	  media: false,
	  date: false
	});
      });
    </script>
    <script type="text/javascript" src="<?= $MY_MAIN_DIRECTORY ?>/jquery.zrssfeed.min.js"></script>
    <style type="text/css">
      .link[category]{
	display: block;
	margin-top: 10px;
	margin-bottom: 10px;
      }
      .div-table{
	display: table;
	width: auto;
	background-color: transparent;
	border: none;
	border-spacing: 5px;
	width: 100%;
      }
      .div-table-row{
	display: table-row;
	width: auto;
	clear: both;
      }
      .div-table-col{
	float: left;
	display: table-column;
	width: 200px;
	background-color: transparent;
      }
      
      .rssHeader{
	display: none;
      }
      
      .rssBody ul{
	margin-left: -40px;
	list-style-type: none;
      }
      
      .rssRow h4{
	font-family: 'Roboto';
	font-size: 15pt;
	width: 100%;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
      }
      .rssRow p{
	font-size: 11pt;
      }
      
      .bkg_animated{
	border-bottom: 1px solid black;
	padding: 40px 80px 40px 80px;
	background-image: url("<?= $url ?>");
	background-size: 900px;
      }
    </style>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="content" id="home" style="margin-bottom: 50px">
      <div style="margin: 0 auto; width: 100%; max-width: 900px; padding: 0px; border: 1px solid black; margin-top: -31px">
	<div class="bkg_animated">
	  <form method="get" action="https://encrypted.google.com/search" class="inner_form" style="background-color: white; border-radius: 10px">
	    <input type="search" placeholder="Cerca con Google..." id="q2" name="q" style="background-color: transparent" /><input type="submit" id="search_button" value="Cerca" />
	  </form>
	</div>
	 <div class="div-table" style="padding: 20px">
	  <div class="divRow">
	    <div class="div-table-col" style="width: 300px">
	      <h2>Meteo</h2>
	      <iframe width="200" height="130" scrolling="no" frameborder="no" noresize="noresize" src="http://www.ilmeteo.it/box/previsioni.php?citta=4074&type=real1&width=200&ico=5&lang=ita&days=6&font=Arial&fontsize=12&bg=FFFFFF&fg=000000&bgtitle=FFFFFF&fgtitle=000000&bgtab=FFFFFF&fglink=1773C2"></iframe>
	      <h2>Categorie</h2>
	      <span class="link" category="latest">Notizie</span>
	      <span class="link" category="news">Politica</span>
	      <span class="link" category="news">Economia</span>
	      <span class="link" category="news">Italia</span>
	      <span class="link" category="news">Estero</span>
	      <span class="link" category="news">Ambiente</span>
	      <span class="link" category="news">Arte</span>
	      <span class="link" category="news">Cultura</span>
	      <span class="link" category="news">Educazione</span>
	      <span class="link" category="news">Salute</span>
	      <span class="link" category="news">Scienza &amp; Tecnologia</span>
	    </div>
	    <div class="div-table-col" style="width: calc(100% - 380px)">
	      <h2 style="float: left">Notizie di</h2><img src="http://www.repubblica.it/images/logo_repubblica.gif" style="float: left; margin-top: 27px" /><br/><br/><br/>
	      <div id="test"></div>
	    </div>
	  </div>
	</div>
      </div>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>