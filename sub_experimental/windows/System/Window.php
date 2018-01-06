<?php
  $NO_STYLE = true; $NO_SCRIPT = true; $NO_TOUCH = true; $NO_TEXT = true;
  include_once "Core.php";
  
  $WINDOW = $_GET['window'];
  $ID = $_GET['id'];
  $PANEL = $_GET['panel'];
  
  if($WINDOW !== ""){
    ?>
      <style type="text/css">
	.main_panel, .window_panel{
	  padding: 20px;
	}
	.main_panel{
	  display: block;
	}
	.window_panel{
	  display: none;
	}
      </style>
      <script type="text/javascript">
	$(document).ready(function(){
	  var title = $(".main_panel.<?= $WINDOW ?>").parent().parent().children(".titlebar").children(".window_titlebar").html();
	  
	  $("body").on("click", "div.dialog div.titlebar img.back", function(){
	    this_i = parseInt($(this).parent().parent().parent().attr("dialog_i"));
	    $(this).parent().parent().children(".window_titlebar").html(dialog_title[this_i]);
	    $(this).parent().parent().parent().children().children(".window_panel").fadeOut(200);
	    $(this).parent().parent().parent().children().children(".main_panel").delay(199).fadeIn(200);
	    $(this).parent().html("");
	  });
	  
	  $(".main_panel").on("click", "*[window_panel]", function(){
	    changePanel($(this));
	  });
	  
	  <?php if($PANEL){ ?>
	    $(".main_panel:last *[window_panel='<?= $PANEL ?>']").trigger("click");
	  <?php } ?>
	});
	
	function changePanel(element){
	  element.parent().fadeOut(200);
	  element.parent().parent().children(".window_panel." + element.attr("window_panel")).delay(210).fadeIn(200);
	  element.parent().parent().parent().children(".titlebar").children(".left_control").html(back_dialog_button);
	  element.parent().parent().parent().children(".titlebar").children(".window_titlebar").html(element.text());
	}
      </script>
    <?php
  }
  if($WINDOW === "settings"){
    ?>
      <style type="text/css">
	.settings .icon{
	  padding: 10px 20px;
	  margin-right: 10px;
	}
      </style>
      <script type="text/javascript">
	var new_background = "<?= $USER_background ?>", new_accent = "<?= $USER_accent ?>", new_icon_set = "<?= $USER_icon_set ?>";
	
	$(document).ready(function(){
	  current_bkg = $("body").css("background-image");
	  current_bkg = current_bkg.replace("url(\"", "");
	  current_bkg = current_bkg.replace("\")", "");
	  $(".window_panel.customize .choose_src img[src='" + current_bkg + "']").addClass("selected");
	  
	  $(".window_panel.customize .choose_icon div[icon_set='" + new_icon_set + "']").addClass("selected");
	  
	  $(".dialog_selected .window_panel.customize").on("click", ".choose_src img", function(){
	    $(".dialog_selected .save_customize_btn").fadeIn(200);
	    new_background = $(this).attr("src");
	    $("body").css("background-image", "url(" + new_background + ")");
	  });
	  $(".dialog_selected .window_panel.customize").on("click", ".choose_color span", function(){
	    $(".dialog_selected .save_customize_btn").fadeIn(200);
	    new_accent = $(this).css("background-color");
	    $(".titlebar").css("background-color", new_accent);
	  });
	  $(".dialog_selected .window_panel.customize").on("click", ".choose_icon div", function(){
	    $(".dialog_selected .save_customize_btn").fadeIn(200);
	    new_icon_set = new_icon_set_white = new_icon_set_black = $(this).attr("icon_set");
	    
	    if(new_icon_set === "monochromatic"){
	      new_icon_set_white = "monochromatic/white";
	      new_icon_set_black = "monochromatic/black";
	    }
	    
	    $("img:not([class='no_edit'])").each(function(){
	      src = $(this).attr("src");
	      src = src.replace("monochromatic/white", new_icon_set_white);
	      src = src.replace("monochromatic/black", new_icon_set_black);
	      src = src.replace("color", new_icon_set_black);
	      $(this).attr("src", src);
	    });
	  });
	  
	  $(".dialog_selected").on("click", ".save_customize_btn", function(){
	    window.fra_ajax_DATA = "background=" + new_background + "&accent=" + new_accent + "&icon_set=" + new_icon_set;
	    fra_ajax("customize", ".toast_only_errors");
	  });
	});
      </script>
      <div class="main_panel <?= $WINDOW ?>">
	<div class="separator_with_text"><h3>Account</h3></div>
	<span class="icon" window_panel="customize">
	  <img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set_black ?>/customize.png" />
	  Aspetto
	</span>
	<span class="icon" window_panel="language">
	  <img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set_black ?>/world.png" />
	  Lingua e regione
	</span>
	<span class="icon" window_panel="notifications">
	  <img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set_black ?>/bell.png" />
	  Notifiche
	</span>
	<span class="icon" window_panel="sounds">
	  <img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set_black ?>/sounds.png" />
	  Suoni
	</span>
	<span class="icon" window_panel="security">
	  <img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set_black ?>/shield.png" />
	  Sicurezza
	</span>
	<span class="icon" window_panel="profile">
	  <img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set_black ?>/profile.png" />
	  Profili
	</span>
	<br/><br/>
	<div class="separator_with_text"><h3>LightSchool</h3></div>
	<span class="icon" window_panel="support">
	  <img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set_black ?>/help.png" />
	  Aiuto
	</span>
	<span class="icon" window_panel="support">
	  <img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set_black ?>/email.png" />
	  Supporto
	</span>
	<span class="icon" window_panel="about">
	  <img src="<?= $IMAGES_DIRECTORY ?>/logo.png" />
	  Informazioni
	</span>
      </div>
      <div class="window_panel customize">
	<button style="float: right; display: none" class="save_customize_btn">Salva</button>
	<ul class="nav nav-tabs bts-tab" role="tablist">
	  <li class="active"><a href="#tab_wallaper" aria-controls="tab_wallaper" role="tab" data-toggle="tab">Sfondo</a></li>
	  <li><a href="#accent" aria-controls="accent" role="tab" data-toggle="tab">Colori</a></li>
	  <li><a href="#icons" aria-controls="icons" role="tab" data-toggle="tab">Icone</a></li>
	</ul>
	<div class="tab-content" style="height: 100%; max-height: 100%">
	  <div role="tabpanel" class="tab-pane fade in active" id="tab_wallaper">
	    <h3>Modifica sfondo</h3>
	    <p>Scegli uno sfondo dalla raccolta sfondi di LightSchool oppure selezionane uno dalla tua libreria personale.</p>
	    <div class="element_chooser choose_src" style="height: calc(100% - 10px); border: 0px; padding: 0px; overflow-y: auto">
	      <img src="https://MAIN_HTTP_ADDRESS/my/upload/7bed0e8bfbe9068d3031f6f95ca3028a/11-09-2015/Tribute_in_Light_-_11_September_2010_-_1.jpg" />
	      <img src="https://static.pexels.com/photos/7919/pexels-photo.jpg" />
	      <img src="http://thewallpaper.co/wp-content/uploads/2016/03/skyline-buildings-new-york-skyscrapers-hd-city-wallpapers-amazing-city-view-beautiful-place-wallpaper-cool-city-images-amazing-photo-shot-free-city-photos-city-images-for-windows-large-places-1600x724.jpg" />
	      <img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Earth_2.jpg" />
	      <img src="https://static1.squarespace.com/static/58950f30b3db2b05e851f73a/t/58b0e09120099eeee6a35573/1487986837837/minimalist_metal_wallpaper_by_malkowitch-d5k14s4.jpg?format=1500w" />
	      <img src="https://farm4.staticflickr.com/3775/13594482653_6581f349e0_o_d.jpg" />
	      <img src="https://farm4.staticflickr.com/3937/15679025431_ec7f853235_o_d.jpg" />
	      <img src="https://farm4.staticflickr.com/3739/11255092594_b7873bd5b4_o_d.jpg" />
	      <img src="https://farm5.staticflickr.com/4129/4972978130_6fe51acf76_o_d.jpg" />
	      <img src="https://s.camptocamp.org/uploads/images/1300914878_2019442736.jpg" />
	    </div>
	  </div>
	  <div role="tabpanel" class="tab-pane fade in" id="accent">
	    <h3>Modifica colore preferito</h3>
	    <div class="element_chooser choose_color" style="height: calc(100% - 10px); border: 0px; padding: 0px; overflow-y: auto">
	      <span style="background-color: black"></span>
	      <span style="background-color: #6E6E6E"></span>
	      <span style="background-color: #DF0101"></span>
	      <span style="background-color: #DF7401"></span>
	      <span style="background-color: #FFFF00"></span>
	      <span style="background-color: #40FF00"></span>
	      <span style="background-color: #088A08"></span>
	      <span style="background-color: #01DFD7"></span>
	      <span style="background-color: #045FB4"></span>
	      <span style="background-color: #08088A"></span>
	      <span style="background-color: #8904B1"></span>
	      <span style="background-color: #FF00FF"></span>
	      <span style="background-color: #FFFFFF; border-color: black"></span>
	    </div>
	  </div>
	  <div role="tabpanel" class="tab-pane fade in" id="icons">
	    <h3>Modifica set di icone</h3>
	    <div class="element_chooser choose_icon" style="height: calc(100% - 10px); border: 0px; padding: 0px; overflow-y: auto">
	      <div icon_set="monochromatic">
		<img src="<?= $IMAGES_DIRECTORY ?>/monochromatic/black/files.png" class="no_edit" />
		<img src="<?= $IMAGES_DIRECTORY ?>/monochromatic/black/diary.png" class="no_edit" />
		<img src="<?= $IMAGES_DIRECTORY ?>/monochromatic/black/timetable.png" class="no_edit" />
		<img src="<?= $IMAGES_DIRECTORY ?>/monochromatic/black/share.png" class="no_edit" />
		<img src="<?= $IMAGES_DIRECTORY ?>/monochromatic/black/settings.png" class="no_edit" />
		<br/>Monocromatiche
	      </div>
	      <div icon_set="color">
		<img src="<?= $IMAGES_DIRECTORY ?>/color/files.png" class="no_edit" />
		<img src="<?= $IMAGES_DIRECTORY ?>/color/diary.png" class="no_edit" />
		<img src="<?= $IMAGES_DIRECTORY ?>/color/timetable.png" class="no_edit" />
		<img src="<?= $IMAGES_DIRECTORY ?>/color/share.png" class="no_edit" />
		<img src="<?= $IMAGES_DIRECTORY ?>/color/settings.png" class="no_edit" />
		<br/>Colorate
	      </div>
	    </div>
	  </div>
	</div>
      </div>
      <div class="window_panel language">
	<p>
	  <label for="language">Lingua visualizzata&nbsp;&nbsp;</label>
	  <select id="language" name="language">
	    <?php
	      foreach($LANGUAGE_AVAILABLE as $i => $value){
		echo("<option value='$i'>$value</option>");
	      }
	    ?>
	  </select>
	</p>
	<p>
	  <label for="language">Sistema scolastico&nbsp;&nbsp;</label>
	  <select id="language" name="language">
	    <?php
	      foreach($SCHOOLS_SYSTEM_AVAILABLE as $i => $value){
		echo("<option value='$i'>$value</option>");
	      }
	    ?>
	  </select>
	</p>
	<p>
	  <label for="timezone">Fuso orario&nbsp;&nbsp;</label>
	  <select id="timezone" name="timezone">
	    <option>-12:00&nbsp;&nbsp; Linea cambiamento di data ad occidente</option>
	    <option>-11:00&nbsp;&nbsp; U.S./Saoma</option>
	    <option>-10:00&nbsp;&nbsp; U.S./Hawaii</option>
	    <option>-9:30&nbsp;&nbsp;&nbsp;&nbsp; U.S./Alaska</option>
	    <option>-9:00&nbsp;&nbsp;&nbsp;&nbsp; U.S./Baja California</option>
	    <option>-8:00&nbsp;&nbsp;&nbsp;&nbsp; Pacific Daylight Time</option>
	    <option>-7:00&nbsp;&nbsp;&nbsp;&nbsp; U.S./Arizona</option>
	    <option>-6:00&nbsp;&nbsp;&nbsp;&nbsp; Central Standard Time</option>
	    <option>-5:00&nbsp;&nbsp;&nbsp;&nbsp; Eastern Standard Time</option>
	    <option>-4:30&nbsp;&nbsp;&nbsp;&nbsp; Venezuela/Caracas</option>
	    <option>-4:00&nbsp;&nbsp;&nbsp;&nbsp; Atlantic Standard Time</option>
	    <option>-3:30&nbsp;&nbsp;&nbsp;&nbsp; Terranova</option>
	    <option>-3:00&nbsp;&nbsp;&nbsp;&nbsp; Brazil/Buenos Aires</option>
	    <option>-2:00&nbsp;&nbsp;&nbsp;&nbsp; Coordinated Universal Time</option>
	    <option>-1:00&nbsp;&nbsp;&nbsp;&nbsp; Portugal/Azzorre</option>
	    <option>&nbsp;0:00&nbsp;&nbsp;&nbsp;&nbsp; England/Greenwich</option>
	    <option>+1:00&nbsp;&nbsp;&nbsp; Italy/Rome</option>
	    <option>+2:00&nbsp;&nbsp;&nbsp; Greece/Athene</option>
	    <option>+3:00&nbsp;&nbsp;&nbsp; Russia/Moscow</option>
	    <option>+4:00&nbsp;&nbsp;&nbsp; United Arab Emirates/Abu Dhabi</option>
	    <option>+4:30&nbsp;&nbsp;&nbsp; Afghanistan/Kabul</option>
	    <option>+5:00&nbsp;&nbsp;&nbsp; Pakistan/Islamabad</option>
	    <option>+5:30&nbsp;&nbsp;&nbsp; India/New Delhi</option>
	    <option>+5:45&nbsp;&nbsp;&nbsp; Nepal/Kathmandu</option>
	    <option>+6:00&nbsp;&nbsp;&nbsp; Bangladesh/Dhaka</option>
	    <option>+6:30&nbsp;&nbsp;&nbsp; Birmania/Yangon</option>
	    <option>+7:00&nbsp;&nbsp;&nbsp; Thailandia/Bangkok</option>
	    <option>+8:00&nbsp;&nbsp;&nbsp; China/Pechino</option>
	    <option>+8:30&nbsp;&nbsp;&nbsp; North Korea/Pyongyang</option>
	    <option>+9:00&nbsp;&nbsp;&nbsp; South Korea/Seoul</option>
	    <option>+9:30&nbsp;&nbsp;&nbsp; Australia/Darwin</option>
	    <option>+10:00&nbsp; Australia/Canberra</option>
	    <option>+10:30&nbsp; New Caledonia/Noum&eacute;a</option>
	    <option>+12:00&nbsp; Coordinated Universal Time</option>
	    <option>+13:00&nbsp; Samoa/Apia</option>
	    <option>+14:00&nbsp; Kiribati/Kiritimati Island</option>
	  </select>
	</p>
      </div>
      <div class="window_panel notifications">
	<div class="toast toast_not_removable toast_fixed" style="display: block; position: relative; top: 0px; bottom: auto; left: 0px; right: auto; margin-right: 10px; margin-bottom: 10px">
	  <btitle>Titolo</btitle>
	  <bdescr>Questa &egrave; una notifica di prova per mostrare in tempo reale le modifiche applicate.</bdescr>
	</div>
	<p>
	  <label for="notifications_timeout" style="max-width: 100%">Tempo in secondi per la scomparsa automatica delle notifiche:</label><br/>
	  <input type="number" id="notifications_timeout" name="notifications_timeout" placeholder="Tempo in secondi. Es: 5" min="0" max="180" style="width: 100%; max-width: 300px" />
	</p>
	<p>
	  <label for="notifications_sound">Suono notifica</label><br/>
	  <select id="notifications_sound" name="notifications_sound">
	    <option>Nessuno</option>
	  </select>
	</p>
      </div>
      <div class="window_panel security">
	<?php if($USER_access_control === "y"){ ?>
	  <h3 style="color: darkgreen">Centro sicurezza attivo</h3>
	  <span class="link">Clicca qui per disattivare il servizio</span><br/><br/>
	  <div class="separator_with_text"><h4 style="margin-top: 5px">Azioni</h4></div>
	  <div class="tab two_tabs">
	    <span tab="Security_UniKey" panel="security">Autorizza accesso</span>
	    <span tab="Security_Devices" panel="security">Dispositivi registrati</span>
	  </div>
	  <br/>
	  <div class="ls_panel" tab_id="home" panel_id="security" style="display: block">
	    <i>Seleziona una scheda per cominciare</i>
	  </div>
	  <div class="ls_panel" tab_id="Security_UniKey" panel_id="security">
	    Caricamento...
	  </div>
	  <div class="ls_panel" tab_id="Security_Devices" panel_id="security">
	    Caricamento...
	  </div>
	<?php }elseif($USER_access_control === "n"){ ?>
	  <h3 style="color: red; font-weight: 400">Centro sicurezza disattivo</h3>
	  <span class="link">Clicca qui per riattivare il servizio</span><br/><br/>
	  <p>Finch&eacute; Centro sicurezza &egrave; disattivato gli accessi al tuo account da dispositivi sconosciuti non verranno monitorati e bloccati se necessario e non potrai utilizzare la funzione di accesso senza password da dispositivi sui quali non ti fidi a scrivere la tua password personale.</p>
	<?php } ?>
      </div>
      <div class="window_panel about">
	<img src="<?= $IMAGES_DIRECTORY ?>/logo.png" style="float: left; margin-right: 10px; width: 48px; height: 48px" /><h3>LightSchool Frames</h3>
	<h5 style="font-weight: 500">Versione 6.0 Milestone 1</h5><hr/>
	<p>LightSchool Frames &egrave; una versione avanzatissima e futuristica del LightSchool classico. Sostituir&agrave; completamente il LightSchool classico a fine estate 2016.</p>
	<p>Durante la fase di sviluppo &egrave; possibile che si riscontrino malfunzionamenti e problemi generali. Se si dovessero riscontrare problemi o vuoi suggerire un miglioramento, contattaci a MAIL_SUPPORT_ADDRESS.</p>
	<p>LightSchool &egrave; di proriet&agrave; di Francesco Sorge che ne &egrave; l'ideatore, il programmatore, il designer e colui che risponde alle e-mail e mantiene aggiornato blog e profili sui social network.</p>
      </div>
    <?php
  }elseif($WINDOW === "files"){
    if(!$ID){
      $ID = "/";
    }
    $ID = $conn->real_escape_string($ID);
    ?>
      <?php if($_GET['only_content'] !== 'true'){ ?>
      <style type="text/css">
	
      </style>
      <script type="text/javascript">
	$("div.dialog.dialog_selected .content .main_panel .folder_tree").resizable({handles: "e"});
	
	function changePanelWidth(ui){
	  min_width_panel = $("div.dialog.dialog_selected .content .main_panel .folder_tree").css("min-width");
	  min_width_panel = min_width_panel.replace("px", "");
	  width_panel = ui.size.width;
	  
	  if(width_panel < min_width_panel){
	    width_panel = min_width_panel;
	  }
	  
	  $("div.dialog.dialog_selected .content .main_panel .file_explorer").css("width", "calc(100% - " + width_panel + "px)");
	}
	
	$('div.dialog.dialog_selected .content .main_panel .folder_tree').bind('resize', function(event, ui){ changePanelWidth(ui); });
      </script>
      <div class="main_panel <?= $WINDOW ?>" style="padding: 0px; height: 100%">
	<div style="float: left; min-width: 90px; width: 200px; max-width: calc(100% - 100px); height: 100%; overflow-y: scroll; overflow-x: hidden" class="folder_tree">
	  <?php
	    
	    $ICON_SET = $USER_icon_set1;
	    $_GET['request'] = array("files", "SELECT * FROM MY_files WHERE Username = '$Username' AND folder = '/' AND type = 'folder' AND trash = '' ORDER BY name");
	    include "View.php";
	  ?>
	</div>
	<div style="float: left; padding: 10px; min-width: 100px; height: 100%; overflow-y: scroll; overflow-x: hidden" class="file_explorer">
	<?php } ?>
	  <?php
	    $ICON_SET = $USER_icon_set_black;
	    $_GET['request'] = array("files", "SELECT * FROM MY_files WHERE Username = '$Username' AND folder = '$ID' AND (type = 'folder' OR type = 'notebook' OR type = 'file' OR type = 'stuff') AND history = '' AND trash = '' ORDER BY $FILES_ORDER_TEXT");
	    include "View.php";
	  ?>
	<?php if($_GET['tree'] !== 'false'){ ?>
	</div>
      </div>
      <?php } ?>
    <?php
  }elseif($WINDOW === "viewer"){
    $ID = $conn->real_escape_string($ID);
    $_GET['request'] = array("viewer", "SELECT * FROM MY_files WHERE Username = '$Username' AND id = '$ID' LIMIT 1");
    include "View.php";
    
    $file_url = "$UPLOAD_DIRECTORY$file_url";
    
    if(strpos($file_type, "image/") !== false){
      $file_type = "image";
      $file_type_real = "Immagine";
    }elseif(strpos($file_type, "text/html") !== false){
      $file_type = "webpage";
      $file_type_real = "Pagina web";
    }
    ?>
      <script type="text/javascript">
	$(document).ready(function(){
	  titlebar_element = $("div.dialog.dialog_selected .titlebar");
	  titlebar_element.children(".window_titlebar").html("<?= $name ?> [<?= $file_type_real ?>] - " + titlebar_element.children(".window_titlebar").html());
	  
	  titlebar_element.children(".right_control").children(".download_btn").attr("href", "<?= $file_url ?>");
	});
      </script>
      <div class="main_panel <?= $WINDOW ?>" style="padding: 0px; height: 100%; overflow-y: hidden">
	<?php 
	  if($file_type === "image"){
	    ?>
	    <div id="image" style="background-image: url('<?= $file_url ?>'); background-size: contain; background-repeat: no-repeat; background-position: center; width: 100%; height: 100%"></div>
	    <?php
	  }elseif($file_type === "webpage"){
	    ?>
	    <iframe src="<?= $file_url ?>" frameborder="0" style="width: 100%; height: calc(100% - 0px)" class="webpage"></iframe>
	    <script type="text/javascript">
	      /* $("div.dialog.dialog_selected .content .main_panel .webpage").on("load", function(){
		alert($(this).contents().find("title").text());
		titlebar_element.children(".window_titlebar").html($(this).contents().find("title").text() + titlebar_element.children(".window_titlebar").html());
	      }); */
	    </script>
	    <?php
	  }
	?>
      </div>
    <?php
  }elseif($WINDOW === "reader"){
    ?>
      <div class="main_panel <?= $WINDOW ?>" style="padding: 0px; height: 100%">
	<div class="notebook_content">
	  <?php
	    $ID = $conn->real_escape_string($ID);
	    $_GET['request'] = array("reader", "SELECT * FROM MY_files WHERE Username = '$Username' AND id = '$ID' LIMIT 1");
	    include "View.php";
	  ?>
	</div>
      </div>
      <script type="text/javascript">
	$(document).ready(function(){
	  titlebar_element = $("div.dialog.dialog_selected .titlebar");
	  titlebar_element.children(".window_titlebar").html("<?= $name ?>");
	  
	  titlebar_element.children(".right_control").prepend("<span class='edit_btn'><img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/edit.png' class='edit' title='Modifica' /></span><span class='print_btn'><img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/print.png' class='print' title='Stampa' /></span><span class='history_btn'><img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/history.png' class='history' title='Proietta su LIM' /></span><span class='share_btn'><img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/share.png' class='share' title='Condividi' /></span><span class='lim_btn'><img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/lim.png' class='lim' title='Proietta su LIM' /></span><span class='fav_btn'><img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/fav.png' class='fav' title='Aggiungi/rimuovi al menu principale' /></span><span class='info_btn'><img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/info.png' class='info' title='Propriet&agrave;' /></span>" + titlebar_separator);
	});
      </script>
    <?php
  }elseif($WINDOW === "timetable"){
    ?>
      <style type="text/css">
	
      </style>
      <script type="text/javascript">
	$(document).ready(function(){
	  
	});
      </script>
      <div class="main_panel <?= $WINDOW ?>">
	<?php
	  $_GET['request'] = array("timetable", "SELECT * FROM MY_timetable WHERE Username = '$Username' ORDER BY day_of_week, hour_of_day");
	  include "View.php";
	?>
      </div>
    <?php
  }elseif($WINDOW === "add_subject"){
    ?>
      <div class="main_panel <?= $WINDOW ?>">
	<form method="post" action="" class="login">
	  <select id="day" name="day">
	    <?php
	      $i = 1;
	      foreach($TRAD_day as $day){
		echo($day[$i]);
		$i++;
	      }
	      print_r($TRAD_day);
	    ?>
	  </select>
	</form>
      </div>
    <?php
  }elseif($WINDOW === "register"){
    $ID = $conn->real_escape_string($_GET['id']);
    
    if(!$ID){
      $_GET['request'] = array("register_list_class", "SELECT * FROM MY_REG_class WHERE Component like '%$Username%' AND year = '$CURRENT_SCHOOL_YEAR' ORDER BY school, name");
    }
    ?>
      <?php if($ID){ ?>
	<div class="tab five_tabs accent_bkg" class_id="<?= $ID ?>">
	  <span tab="students" panel="my_class">Alunni</span>
	  <span tab="lessons" panel="my_class">Lezioni</span>
	  <span tab="marks" panel="my_class">Voti</span>
	  <span tab="coordinatore" panel="my_class">Coordinatore</span>
	  <span tab="scrutini" panel="my_class">Scrutini</span>
	</div>
      <?php } ?>
      <div class="main_panel my_class <?= $WINDOW ?>" style="max-height: calc(100% - 43px); overflow-y: auto;">
	<?php if($ID && !$_GET['tab']){
	  ?>
	  <div class="ls_panel" tab_id="home" panel_id="my_class" style="display: block">
	    <i>Seleziona una scheda per cominciare</i>
	  </div>
	  <div class="ls_panel" tab_id="students" panel_id="my_class">
	    Caricamento...
	  </div>
	  <div class="ls_panel" tab_id="lessons" panel_id="my_class">
	    Caricamento...
	  </div>
	  <div class="ls_panel" tab_id="marks" panel_id="my_class">
	    Caricamento...
	  </div>
	  <div class="ls_panel" tab_id="coordinatore" panel_id="my_class">
	    Caricamento...
	  </div>
	  <div class="ls_panel" tab_id="scrutini" panel_id="my_class">
	    Caricamento...
	  </div>
	  <div class="present_array"></div>
	  <div class="absent_array"></div>
	  <div class="late_array"></div>
	  <?php
	} ?>
	<?php
	  if(!$ID){ include "View.php"; }
	?>
      </div>
    <?php
  }else{
    ?>
    <div class="main_panel <?= $WINDOW ?>">
      <p>Applicazione non trovata.</p>
      <button style="float: right">Segnala a LightSchool</button>
    </div>
    <?php
  }
?>