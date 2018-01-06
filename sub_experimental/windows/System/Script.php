<script type="text/javascript">
  loading_text = "Caricamento";
  three_dot = "...";
  loading_text_dialog = "<div style='display: flex; flex-direction: column; justify-content: center; height: 100%; font-size: 25pt; font-family: Roboto; font-weight: 300; color: gray'><center>" + loading_text + three_dot + "</center></div>";
  loading_img = "";
  loading_text_context = "<span>" + loading_text + three_dot + "</span>";
  titlebar_separator = "<span style='width: 1px; height: 22px; background-color: <?= $USER_accent_darker ?>; display: inline-block; margin: 0px 4px'>&nbsp;</span>";
  
  function fra_ajax(type, id){
    $.ajax({
      type: "POST",
      url: "<?= $MY_DIRECTORY ?>/process.php?type="+type,
      data: window.fra_ajax_DATA,
      success: function(html){
	if(type === "login_code" && html.indexOf('true') > -1){
	  location.reload();
	}else if(html.indexOf('correttamente') > -1 || html.indexOf('true') > -1){
	  fra_toast("darkgreen", html, "text", id);
	  if(type == 'login'){
	    fra_toast("darkgreen", "Accesso eseguito. Attendi il caricamento della pagina.", "text", id);
	    location.reload();
	  }else if(type == 'customize'){
	    $(".dialog_selected .save_customize_btn").fadeOut(200);
	  }
	}else if(type === "login" && html.indexOf('starting_trusted_procedure') > -1){
	  $(".login_trusted").html(html);
	}else{
	  $("#code").val("");
	  fra_toast("red", html, "text", id);
	}
      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
	fra_toast("red", "Risposta HTTP: " + textStatus + ", Tipo di errore: " + errorThrown, "text", id);
      },
      beforeSend:function(){
	fra_toast("orange", "loading", "text", id);
      }
    });
  }
  
  function fra_toast(color, text, type, id){
    console.log(text);
    
    text_original = text;
    text = text.replace("true", "");
    
    var temporary_class_id = temporary_class_id_generator();
    
    if(text == 'loading'){
      text = "Caricamento...";
    }
    
    if(color === "red"){
      fore_color = "white";
    }else if(color === "darkgreen"){
      color = "<?= $USER_accent ?>";
      fore_color = "<?= $COL1 ?>";
    }
    
    if(id.indexOf("toast") > -1 && !id.indexOf("only_errors") > -1 && text_original !== "loading" && text_original.indexOf("hidden") <= -1){
      $(".toast").each(function(){
	if(!$(this).hasClass("toast_fixed")){
	  var top = $(this).offset().top - $(window).scrollTop() + 130;
	  $(this).animate({"top": top + "px"}, 300);
	}
      });
      $("body").append("<div class='toast toast_" + temporary_class_id + "' style='background-color: " + color + "; color: " + fore_color +"'><btitle>Sistema LightSchool</btitle><bdescr>" + text + "</bdescr></div>");
      $('.toast_' + temporary_class_id).animate({"right": "20px"}, 300);
      window["toast_" + temporary_class_id] = setTimeout(function(){ $('.toast_' + temporary_class_id).animate({"right": "-400px"}, 300); }, 5000);
      return;
    }
    
    if(text !== "loading"){
      // $(id).effect("highlight", {}, 500);
    }
    
    $(id).html(text);
    
    if(type == 'text'){
      $(id).css("color", color);
    }else{
      $(id).css("background-color", color);
    }
    
    if(!$(id).is(":visible")){
      $(id).show();
    }
  }
  
  function password_field(id, field){
    if($("#" + id).is(":checked")){
      $("#" + field).attr("type", "text");
    }else{
      $("#" + field).attr("type", "password");
    }
  }
  
  function javascript_array_php(array){
    array = array.join(", ");
    return array;
  }
  
  function temporary_class_id_generator(){
    var today = new Date();
    var d = today.getDate().toString();
    var m = today.getMonth().toString();
    var y = today.getFullYear().toString();
    var h = today.getHours().toString();
    var mm = today.getMinutes().toString();
    var s = today.getSeconds().toString();
    var mil = today.getMilliseconds().toString();
    
    return (mil+s+mm+h+y+m+d);
  }
  
  window.max_z_index, window.selected_dialog, window.z_index_dialog = 5, window.z_index_dialog_array = [], left_control = "", right_control = "", titlebar = "", back_dialog_button = "<img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/back.png' class='back' />";
  
  var dialog_i = 0, dialog_title = [], dialog_opened = [], previous_array_taskbar;
  
  function bringFront(dialog_id){
    if(window.selected_dialog !== dialog_id){
      $("div.dialog").each(function(){
	var z_index = parseInt($(this).css("z-index"));
	$(this).removeClass("dialog_selected");
	window.z_index_dialog_array.push(z_index);
      });
      
      window.max_z_index = parseInt(Math.max.apply(Math, window.z_index_dialog_array));
      
      $("div.dialog_" + dialog_id).addClass("dialog_selected");
      $("div.dialog_" + dialog_id).css("z-index", window.max_z_index + 1);
      window.selected_dialog = dialog_id;
      window.z_index_dialog = window.max_z_index + 1;
      // alert(window.z_index_dialog_array + "\n" + window.max_z_index + "\n" + window.selected_dialog + "\n" + window.z_index_dialog);
    }
  }
  
  function getAppInstances(app_name){
    var istances = 0;
    for(var i = 0; i < dialog_opened.length; i++){
      if(dialog_opened[i] === app_name){
	istances++;
      }
    }
    return istances;
  }
  
  function open_dialog(type, titlebar, url, position_x, position_y, width, height){
    left_control = "", current_folder = "", right_control = right_control_original = "<img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/cross2.png' class='close' title='Chiudi finestra' />";
    
    dialog_opened.push(type);
    
    if(type === "security"){
      titlebar = "Impostazioni di sistema";
      url = "System/Window.php?window=settings&panel=security";
      type = "settings";
    }
    
    if(type === "settings"){
      if(!width){
	width = "789px";
      }
      if(!height){
	height = "386px";
      }
    }
    
    if(type === "files"){
      titlebar = titlebar.replace("File", "<span class='back_folder link' app_name='files' file_id='/' file_name='File' style='color: <?= $COL1 ?>'><span class='first_row'>File</span></span>");
      current_folder = "current_folder='/'";
      
      if(!width){
	width = "759px";
      }
      if(!height){
	height = "486px";
      }
      right_control += "<img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png' class='create' title='Nuovo elemento' />" + titlebar_separator;
    }
    
    if(type === "viewer"){
      if(!width){
	width = "759px";
      }
      if(!height){
	height = "486px";
      }
      right_control += "<a href='' class='download_btn' target='_blank' download><img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/download.png' class='download' title='Scarica file' /></a>" + titlebar_separator;
    }
    
    if(type === "reader"){
      if(!width){
	width = "785px";
      }
      if(!height){
	height = "486px";
      }
    }
    
    if(type === "timetable"){
      if(!width){
	width = "823px";
      }
      if(!height){
	height = "400px";
      }
      right_control += "<img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/plus.png' class='add_subject' title='Aggiungi materia' />" + titlebar_separator;
    }
    
    if(type === "add_subject"){
      if(!width){
	width = "400px";
      }
      if(!height){
	height = "300px";
      }
    }
    
    if(type === "register"){
      if(!width){
	width = "650px";
      }
      if(!height){
	height = "300px";
      }
      right_control += "<img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/lim.png' class='all_class' title='Tutte le classi' /><img src='<?= $IMAGES_DIRECTORY ?>/<?= $USER_icon_set1 ?>/back.png' class='previous_years' title='Anni precedenti' />" + titlebar_separator;
    }
    
    original_height = height, original_width = width;
    
    if(!position_x && width){
      position_x = $(document).width() / 2;
      position_x = original_position_x = position_x - width.replace("px", "") / 2;
    }
    
    if(!position_y && height){
      position_y = ($(document).height() - $(".taskbar").height()) / 2;
      position_y = original_position_y = position_y - height.replace("px", "") / 2;
    }
    
    var uni_id = temporary_class_id_generator();
    window.z_index_dialog = window.z_index_dialog + 1;
    
    if($(document).width() <= 500 || $(document).height() <= 300){
      $(".taskbar").fadeOut(300);
      position_x = 0, position_y = 0, width = "100%", height = "100%";
    }
    
    $("body").append("<div " + current_folder + " dialog_app='" + type + "' dialog_i='" + dialog_i + "' class='dialog dialog_" + uni_id + " dialog_" + type + "' dialog_id='" + uni_id + "' style='left: " + position_x + "px; top: " + position_y + "px; width: " + width + "; height: " + height + "; z-index: 0'><div class='titlebar'><span class='left_control'>" + left_control + "</span><span class='window_titlebar truncate'>" + titlebar + "</span><span class='right_control'>" + right_control + "</span></div><div class='content'></div></div>");
    $("div.dialog_" + uni_id).fadeIn(300);
    $("div.dialog_" + uni_id).children("div.content").html(loading_text_dialog).load(url + "&uni_id=" + uni_id);
    $("div.dialog_" + uni_id).draggable({iframeFix: true, start: function(e, ui){ bringFront(uni_id); closeStart(); closeContext(); }, handle: ".titlebar", stack: "div.dialog_" + uni_id});
    $("div.dialog_" + uni_id).resizable({handles: "n, e, s, w, se, sw, nw, ne", start: function(e, ui) { closeStart(); closeContext(); }});
    $('div.dialog_' + uni_id).bind('drag', function(e, ui){ if(e.pageY < 2 || e.pageY > ($(document).height() - $(".taskbar").height() - 2) || e.pageX < 2 || e.pageX > ($(document).width() - 2)){ return false; } });
    bringFront(uni_id);
    
    if(type === "files" && url.indexOf("&id=") > -1){
      z_index_new = parseInt($("div.dialog_" + uni_id).css("z-index"));
      $("div.dialog_" + uni_id).css("z-index", z_index_new + 2);
    }
    
    dialog_title.push(titlebar);
    dialog_i = dialog_i + 1;
  }
  
  $(document).on("click", ".element_chooser *", function(){
    $(this).parent().children("*").each(function(){
      $(this).removeClass("selected");
    });
    $(this).addClass("selected");
  });
  
  $.cssHooks.backgroundColor = {
    get: function(elem) {
        if (elem.currentStyle)
            var bg = elem.currentStyle["backgroundColor"];
        else if (window.getComputedStyle)
            var bg = document.defaultView.getComputedStyle(elem,
                null).getPropertyValue("background-color");
        if (bg.search("rgb") == -1)
            return bg;
        else {
            bg = bg.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            function hex(x) {
                return ("0" + parseInt(x).toString(16)).slice(-2);
            }
            return "#" + hex(bg[1]) + hex(bg[2]) + hex(bg[3]);
        }
    }
}
</script>