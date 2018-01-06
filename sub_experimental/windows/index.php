<?php include_once "System/Core.php"; ?>
    <title>LightSchool</title>
    <script type="text/javascript">
      $(document).ready(function(){
	$(window).resize(function(){
	  var taskbar_height = $(".taskbar").height();
	  $(".main_menu").css("bottom", taskbar_height + "px");
	  $(".context").css({"bottom": taskbar_height + "px"});
	  
	  if($(document).width() <= 500 || $(document).height() <= 300){
	    $(".file_explorer").css("width", "");
	  }else{
	    $(".taskbar").fadeIn(200);
	  }
	});
	
	$("body").on("dblclick", "div.dialog_selected div.titlebar", function(e){
	  e.preventDefault();
	  
	  var ls_window = $(this).parent();
	  maximized = ls_window.attr("maximized");
	  
	  if(maximized === "true"){
	    ls_window.attr("maximized", "");
	    
	    $(ls_window).animate({width: ls_window.attr("original_width"), height: ls_window.attr("original_height"), top: ls_window.attr("original_top"), left: ls_window.attr("original_left")}, 300);
	  }else{
	    ls_window.attr("maximized", "true");
	    
	    ls_window.attr("original_width", ls_window.css("width"));
	    ls_window.attr("original_height", ls_window.css("height"));
	    ls_window.attr("original_top", ls_window.css("top"));
	    ls_window.attr("original_left", ls_window.css("left"));
	    
	    $(ls_window).animate({width: "100%", height: $(window).height() - $(".taskbar").height() + "px", top: "0px", left: "0px"}, 300);
	  }
	  
	  return false;
	});
	
	$("body").on("mouseenter", "[tooltip]", function(e){
	  e.preventDefault();
	  
	  $(".tooltip").html("Test").css({"top": "0px", "left": "0px"}).fadeIn(300);
	  
	  return false;
	});
	
	$("body").on("click", "div.dialog div.titlebar img.close", function(){
	  closeDialog($(this));
	});

	$("body").on("contextmenu", "[context]", function(e){
	  e.preventDefault();
	  closeStart();
	  
	  var context_type = $(this).attr("context");
	  var top = e.pageY / $(document).height() * 100;
	  var left = e.pageX / $(document).width() * 100;
	  
	  if(context_type === "desktop"){
	    $(".context").html(loading_text_context).load("<?= $MY_DIRECTORY ?>/System/View.php?request=context&app=wallpaper");
	  }else if(context_type === "files"){
	    $(".context").html(loading_text_context).load("<?= $MY_DIRECTORY ?>/System/View.php?request=context_file&id=" + $(this).attr("file_id"));
	  }
	    
	  if($('.context').is(":visible")){
	    $(".context").hide();
	  }
	  
	  $(".context").css({"top": top + "%", "bottom": "auto", "left": left + "%"});
	  $(".context").slideDown(200);
	  
	  return false;
	});
	
	$(".taskbar").on("click", ".start", function(){
	  var taskbar_height = $(".taskbar").height();
	  $(".main_menu").css("bottom", taskbar_height + "px");
	  
	  if($('.main_menu').is(":visible")){
	    closeStart();
	  }else{
	    $(this).addClass("app_selected");
	    $('.main_menu').show("slide", { direction: "down" }, 200);
	  }
	});
	$(".taskbar, .apps").on("mousedown", "span[app_name]", function(e){
	  e.preventDefault();
	  closeStart();
	  
	  app_name = $(this).attr("app_name");
	  app_real_name = $(this).attr("app_real_name");
	  
	  app_instances = getAppInstances(app_name);
	    
	  if(e.which === 1){
	    closeContext();
	    if(app_instances === 0){
	      open_dialog(app_name, app_real_name, "System/Window.php?window=" + app_name);
	    }
	  }else if(e.which === 2){
	    closeContext();
	    open_dialog(app_name, app_real_name, "System/Window.php?window=" + app_name);
	  }else if(e.which === 3){
	    var left = $(this).offset().left / $(document).width() * 100;
	    var context_width = $(".context").width() / 2.5 / $(document).width() * 100;
	    left = left - context_width;
	    var bottom = $(".taskbar").height();
	    
	    $(".context").html(loading_text_context + "<br/><br/>").load("<?= $MY_DIRECTORY ?>/System/View.php?request=context&app=" + app_name + "&app_real_name=" + app_real_name);
	    
	    if($('.context').is(":visible")){
	      $(".context").hide();
	    }
	    
	    $(".context").css({"top": "auto", "bottom": bottom + "px", "left": left + "%"});
	    $(".context").slideDown(200);
	  }
	  
	  return false;
	});
	$(".taskbar, .apps").on("contextmenu", "span[app_name]", function(e){
	  return false;
	});
	
	$("body").on("mouseenter", ".toast", function(){
	  if(!$(this).hasClass("toast_not_removable")){
	    current_toast_id = $(this).attr('class').split(' ').pop();
	    clearTimeout(window[current_toast_id]);
	    window[current_toast_id] = 0;
	  }
	});
	$("body").on("mouseleave", ".toast", function(){
	  if(!$(this).hasClass("toast_not_removable")){
	    current_toast_id = $(this).attr('class').split(' ').pop();
	    window[current_toast_id] = setTimeout(function(){ closeToast("remove"); }, 5000);
	  }
	});
	$("body").on("click", ".toast", function(){
	  if(!$(this).hasClass("toast_not_removable")){
	    closeToast("remove");
	  }
	});
	
	$("#sortable").sortable({revert: true, stop: function(event, ui){ updateTaskbar("reorder"); }, helper : 'clone'});
	
	startTime();
	
	$("body").on("click", "div.dialog.dialog_selected .file_explorer span.icon_file, div.dialog.dialog_selected .folder_tree span.icon_file, div.dialog.dialog_selected .window_titlebar .back_folder", function(e){
	  e.stopPropagation();
	  closeStart();
	  closeContext();
	  
	  app_name = $(this).attr("app_name");
	  app_real_name = $(this).attr("app_real_name");
	  file_id = $(this).attr("file_id");
	  file_img = $(this).children(".icon_file_img").attr("src");
	  file_name = $(this).children(".first_row").text();
	  current_window_title = $("div.dialog.dialog_selected .titlebar .window_titlebar").html();
	  
	  if($("div.dialog.dialog_selected").attr("current_folder") !== file_id){
	    if(app_name === "files"){
	      $("div.dialog.dialog_selected").attr("current_folder", file_id);
	      $("div.dialog.dialog_selected .titlebar .window_titlebar").html(current_window_title + "<span> > <span class='back_folder link' app_name='files' file_id='" + file_id + "' style='color: <?= $COL1 ?>'><span class='first_row'>" + file_name + "</span></span></span>");
	      $("div.dialog.dialog_selected .file_explorer").load('System/Window.php?window=files&id=' + file_id + "&only_content=true");
	    }else{
	      open_dialog(app_name, app_real_name, 'System/Window.php?window=' + app_name + '&id=' + file_id);
	    }
	  }
	});
	
	$("body").on("click", "div.dialog_selected .class_selector_element", function(){
	    class_id = $(this).attr("class_id");
	    class_name = $(this).text();
	    
	    if(class_id){
	      $("div.dialog_selected .window_titlebar").html("<span class='class_selector_element link' style='color: white' class_id=''>Registro</span> > " + class_name);
	    }else{
	      $("div.dialog_selected .window_titlebar").html("Registro");
	    }
	    $("div.dialog_selected .right_control").html(right_control_original);
	    $("div.dialog_selected .content").html(loading_text_dialog).load("<?= $MY_DIRECTORY ?>/System/Window?window=register&id=" + class_id);
	  });
	
	$("body").on("click", "div.dialog_selected .tab > span, div.dialog_selected .tab > a", function(){
	  tab_id = $(this).attr("tab");
	  panel_id = $(this).attr("panel");
	  
	  $(this).parent().children(".selected").removeClass("selected");
	  $(this).addClass("selected");
	  
	  $("div.dialog_selected div[panel_id='" + panel_id + "']").fadeOut(200);
	  $("div.dialog_selected div[panel_id='" + panel_id + "'][tab_id='" + tab_id + "']").delay(200).fadeIn(200);
	});
	
	$("body").on("click", "div.dialog_selected[dialog_app='settings'] .tab > span", function(){
	  class_id = $(this).parent().attr("class_id");
	  tab_id = $(this).attr("tab");
	  
	  $("div.dialog_selected div[tab_id='" + tab_id + "']").load("<?= $MY_DIRECTORY ?>/System/View?request=" + tab_id);
	});
	
	$("body").on("click", "div.dialog_selected[dialog_app='register'] .tab > span", function(){
	  class_id = $(this).parent().attr("class_id");
	  tab_id = $(this).attr("tab");
	  
	  if(tab_id === "students"){
	    $("div.dialog_selected .right_control").html("<img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/play.png' class='appello' title='Fai l&#39;appello' />" + titlebar_separator + right_control_original);
	  }
	  
	  $("div.dialog_selected div[tab_id='" + tab_id + "']").load("<?= $MY_DIRECTORY ?>/System/View?request=register_" + tab_id + "&class_id=" + class_id);
	});
	
	$("body").on("click", "div.dialog_selected[dialog_app='timetable'] .right_control .add_subject", function(){
	  open_dialog("add_subject", "Aggiungi materia", "System/Window.php?window=add_subject");
	});
	$("body").on("click", "div.dialog_selected .right_control .appello", function(){
	  $("div.dialog_selected .ls_panel[tab_id='students'] .student_appello").removeClass("selected");
	  $("div.dialog_selected .ls_panel[tab_id='students'] .student_appello .student_status").css("background-color", "gray");
	  $("div.dialog_selected .ls_panel[tab_id='students'] .student_appello:first").addClass("selected");
	  $("div.dialog_selected .present_array, div.dialog_selected .absent_array, div.dialog_selected .late_array").html("");
	});
	
	$("body").on('click', "div.dialog", function(e){ bringFront($(this).attr("dialog_id")); });
      });
      
      $(document).keyup(function(event){
	var student_elem = $("div.dialog_selected .ls_panel[tab_id='students'] .student_appello.selected");
	student = student_elem.attr("username");
	if(student){
	  if(event.keyCode == 80 || event.keyCode == 65 || event.keyCode == 82){
	    var next = $("div.dialog_selected .ls_panel[tab_id='students'] .student_appello.selected").next(".student_appello");
	    if(event.keyCode == 80){
	      student_elem.children(".student_status").css("background-color", "darkgreen");
	      $("div.dialog_selected .present_array").append(student);
	    }else if(event.keyCode == 65){
	      student_elem.children(".student_status").css("background-color", "red");
	      $("div.dialog_selected .absent_array").append(student);
	    }else if(event.keyCode == 82){
	      student_elem.children(".student_status").css("background-color", "orange");
	      $("div.dialog_selected .late_array").append(student);
	    }
	    $("div.dialog_selected .ls_panel[tab_id='students'] .student_appello").removeClass("selected");
	    next.addClass("selected");
	  }
	}
      });
      
      function closeDialog(id){
	app_name = $(id).parent().parent().parent().attr("dialog_app");

	dialog_opened.splice(dialog_opened.indexOf(app_name ), 1);
	
	$(id).parent().parent().parent().fadeOut(300, function(){
	  $(id).parent().parent().parent().remove();
	});
	
	$("div.dialog").each(function(){
	  window.z_index_dialog_array.push($(this).css("z-index"));
	});
	
	window.z_index_dialog = Math.max.apply(Math, window.z_index_dialog_array);
	
	if($(document).width() <= 500 || $(document).height() <= 300){
	  $(".taskbar").fadeIn(200);
	}
      }
      
      function closeStart(){
	$("div.taskbar").children("span.start").removeClass("app_selected");
	$('.main_menu').hide("slide", { direction: "down" }, 200);
	$(".main_menu .apps .fav_list").show(200);
	$(".main_menu .apps .apps_list").hide(200);
	$(".switchStartPanelImg").attr("title", "Tutte le app");
	$(".switchStartPanelImg").attr("src", "<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/list.png");
      }
      
      $(document).click(function(e){
	var context = $(".context");
	var taskbar = $("span[app_name]");
	var desktop = $(".desktop");
	var main_menu = $(".main_menu");
	var main_menu_start = $(".start");

	closeContext();
	
	if(!main_menu_start.is(e.target) && main_menu_start.has(e.target).length === 0 && !main_menu.is(e.target) && main_menu.has(e.target).length === 0){
	  closeStart();
	}
      });
      $(document).contextmenu(function(e){
	var context = $(".context");
	var taskbar = $("span[app_name]");
	var desktop = $(".desktop");

	if((!context.is(e.target) && context.has(e.target).length === 0) || (!taskbar.is(e.target) && taskbar.has(e.target).length === 0) || (!desktop.is(e.target) && desktop.has(e.target).length === 0)){
	  closeContext();
	}
      });
      
      function closeContext(){
	$(".context").slideUp(200);
      }
      
      function closeToast(remove){
	$("." + current_toast_id).animate({"right": "-400px"}, 300, function(){
	  if(remove === "remove"){
	    $(this).remove();
	  }
	});
      }
      
      function updateTaskbar(type){
	if(!previous_array_taskbar){
	  previous_array_taskbar = "<?= $USER_taskbar_text ?>";
	}
	
	array_taskbar = [];
	$("taskbar#sortable > span").each(function(){
	  array_taskbar.push($(this).attr("app_name"));
	});
	array_taskbar = javascript_array_php(array_taskbar);
	window.fra_ajax_DATA = "array_taskbar=" + array_taskbar + "&previous_array_taskbar=" + previous_array_taskbar + "&kind=" + type;
	fra_ajax("taskbar", ".toast_only_errors");
	
	previous_array_taskbar = array_taskbar;
      }
      
      function startTime(){
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	m = checkTime(m);
	s = checkTime(s);
	document.getElementById('tray_clock').innerHTML = "<span style='margin: 0px; padding: 0px; margin-top: -7px; color: <?= $COL1 ?>'>" + h + ":" + m + "<br/><?= date("d/m/Y"); ?></span>";
	var t = setTimeout(startTime, 500);
      }
      function checkTime(i) {
	  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
	  return i;
      }
      
      function removeAppTaskbar(app){
	$("taskbar span[app_name='" + app + "']").remove();
	updateTaskbar("remove");
      }
      
      function switchStartPanel(){
	if($(".fav_list").is(":visible")){
	  $(".fav_list").fadeOut(200);
	  $(".apps_list").delay(200).fadeIn(200);
	  $(".switchStartPanelImg").attr("title", "Indietro");
	  $(".switchStartPanelImg").attr("src", "<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/back.png");
	}else if($(".apps_list").is(":visible")){
	  $(".apps_list").fadeOut(200);
	  $(".fav_list").delay(200).fadeIn(200);
	  $(".switchStartPanelImg").attr("title", "Tutte le app");
	  $(".switchStartPanelImg").attr("src", "<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/list.png");
	}
      }
    </script>
  </head>
  <body class="hide_scrollbar">
    <div class="desktop" context="desktop"></div>
    <div class="tooltip"></div>
    <div class="context">
      <!--<span><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/share.png">Condividi</span>
      <span><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/edit.png">Rinomina</span>
      <span><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/folder.png">Sposta</span>
      <span><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/cross.png">Elimina</span>
      <span><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/info.png">Propriet&agrave;</span>
      <div class="sub">
	<span><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/download.png">Esporta</span>
	<span><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/lim.png">Proietta su LIM</span>
	<span><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/embed.png">Incorpora</span>
	<span><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/history.png">Cronologia modifiche</span>
	<span><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/copy.png">Copia</span>
	<span><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/fav.png">Aggiungi/rimuovi al menu Start</span>
      </div>-->
    </div>
    <div class="main_menu">
      <div class="user">
	<span style="font-family: 'Roboto'; font-weight: 300; font-size: 13pt; margin: 0px; padding: 5px 2px; margin-bottom: -20px"><img src="<?= $USER_image ?>" class="round" style="width: 30px; height: 30px;" /><?php echo("$USER_name $USER_surname"); ?></span>
	<a href="<?= $MY_DIRECTORY ?>/logout" style="padding: 0px; margin: 0px; float: right" title="Disconnetti"><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/logout.png" style="float: right; margin-right: 0px" /></a><img src="<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/list.png" style="float: right; margin-right: 20px" title="Tutte le app" class="switchStartPanelImg" onclick="switchStartPanel()" />
      </div>
      <div class="apps">
	<div class="fav_list" style="display: block">
	<?php
	  $_GET['request'] = array("start_menu", "SELECT * FROM MY_files WHERE Username = '$Username' AND fav = 'y' ORDER BY $FILES_ORDER_TEXT");
	  include_once "System/View.php";
	?>
	</div>
	<div class="apps_list">
	  <?php
	    foreach($APP_array_name as $app => $title){
	      $icon = $app;
	      if($app === "trash"){
		$icon = $trash_icon.'_'.$icon;
	      }
	      $app_real_name = $APP_array_name[$app];
          
	      echo('<span app_name="'.$app.'" app_real_name="'.$app_real_name.'" href="'.$MY_DIRECTORY.'/'.$app.'"><img src="'.$IMAGES_DIRECTORY.'/'.$USER_icon_set1.'/'.$icon.'.png" />'.$title.'</span>');
	    }
	  ?>
	</div>
      </div>
      <div class="search">
	<form method="post" action="search">
	  <input type="search" id="search" name="search" placeholder="Cerca nel tuo account..." style="width: 100%" />
	</form>
      </div>
    </div>
    <div class="taskbar">
      <span class="start" style="height: auto"><img src="<?= $USER_image ?>" class="round" /><app_name class="mobile"><?php echo("$USER_name $USER_surname"); ?></app_name></span>
      <taskbar id="sortable">
	<?php echo($USER_taskbar_real); ?>
      </taskbar>
      <div class="tray">
	<span class="tray_clock" app_name="diary" app_real_name="Diario" id="tray_clock">Orologio</span>
      </div>
    </div>
  </body>
</html>