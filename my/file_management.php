<?php
  $_GET['no_text'] = 'y';
  include "base.php";
  
  if($_SESSION['Username'] != '' or ($actually_page == 'read' and $_SESSION['Username'] == '')){
    include_once "dropzone.php";
    include "delete_management.php";
    ?>
    <script type="text/javascript">
      var selected_file = new Array();
      var current_folder_for_AJAX = "<?= $_GET['f'] ?>";
    
      $(document).ready(function(e){
	$(function(){
	  $("#desktop, #files").on("contextmenu",".icon_files",function(e){
	    var left;
	    var top;
	    if($(document).width() < 630){
	      left = 0;
	      top = 0;
	      position = 'fixed';
	    }else{
	      left = e.pageX;
	      top = e.pageY;
	      position = 'absolute';
	      
	      if(left > ($(document).width() - $("#context").width())){
		left = $(document).width() - $("#context").width();
	      }
	    }
	    $("#context").css({left: left, top: top, position: position});
	    contextmenu($(this).attr('id'));
	    e.preventDefault();
	  });
	  
	  $("#desktop, #files").on("mouseenter",".icon_files",function(){
	    if($(document).width() >= 630){
	      $('#file_selector_'+$(this).attr('id')).attr("style", "display: block !important");
	    }
	  });
	  
	  $("#desktop, #files").on("mouseleave",".icon_files",function(){
	    if($(document).width() >= 630){
	      $('.file_selector').attr("style", "display: none");
	    }
	  });
	  
	  $("#desktop, #files").on("click",".file_selector",function(e){
	    e.stopPropagation();
	    if($(this).is(':checked')){
	      selected_file[selected_file.length] = $(this).attr('value');
	      $('#'+$(this).attr('value')).addClass('selected_file');
	    }else{
	      var index = selected_file.indexOf($(this).attr('value'));
	      selected_file.splice(index, 1);
	      $('#'+$(this).attr('value')).removeClass('selected_file');
	    }
	  });
	  
	  $("#icon_frame").on("click",".icons_for_file, #restore_original_icon",function(e){
	    var icon_name = $(this).attr("icon_name");
	    
	    $.ajax({
	      type: "POST",
	      url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=change_icon",
	      data: "icon_name="+icon_name+"&id="+window.currentFile,
	      success: function(html){
		if(html == "true"){
		  $(".toast").css("background-color", "darkgreen");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />Icona cambiata");
		  $("#desktop").load("<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=desktop");
		  $("#files").load("<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=files&f=<?= $_GET['f'] ?>");
		  $("#sidebar_file_content").load("<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=file_info&id="+window.currentFile);
		}else{
		  $(".toast").css("background-color", "red");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
		}
	      },
	      beforeSend:function(){
		$(".toast").css('background-color', 'orange');
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	      }
	    });
	    $(".toast").slideDown(400);
	  });
	
	  $(".header, .context").on("click","span[action='fav_button']",function(e){
	    var file_id = $(this).attr("id");
	    
	    $.ajax({
	      type: "POST",
	      url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=fav_read",
	      data: "id="+file_id,
	      success: function(html){
		if(html.indexOf("File") > -1){
		  $(".toast").css("background-color", "darkgreen");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
		  if(html.indexOf("aggiunto") > -1){
		    $('img#fav_icon').each(function(){
		      var newurl = $(this).attr('src').replace('fav.png','fav_filled.png');
		      $(this).attr('src', newurl);
		    });
		    $("#fav_"+file_id).html("<?= $TRAD_remove_from ?>");
		  }else if(html.indexOf("rimosso") > -1){
		    $('img#fav_icon').each(function(){
		      var newurl = $(this).attr('src').replace('fav_filled.png','fav.png');
		      $(this).attr('src', newurl);
		    });
		    $("#fav_"+file_id).html("<?= $TRAD_add_to ?>");
		    <?php if($actually_page2 == 'desktop'){ ?>
		      closecontext();
		      $("[file_id='" + file_id + "']").remove();
		    <?php } ?>
		  }
		}else{
		  $(".toast").css("background-color", "red");
		  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
		}
	      },
	      beforeSend:function(){
		$(".toast").css('background-color', 'orange');
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	      }
	    });
	    $(".toast").slideDown(400);
	  });
	  
	  $("#desktop, #files").on("dblclick",".file_selector",function(e){
	    e.stopImmediatePropagation();
	  });
	  
	  $("#desktop, #files").on("dragover",".icon_files",function(e){
	    $('.count_selected').hide();
	  });
	  
	  $(document).on('click', '#file_search_panel',function(e) {
	    $("#q").focus();
	  });
	});
      });

      function allowDrop(ev) {
	ev.preventDefault();
      }

      function drag(ev, id) {
	var icon_id = id;
	window.icon_idSTART = id;
	
	if(selected_file.length <= 1){
	  selected_file[selected_file.length] = id;
	}
	
	$('#count_'+id).html(selected_file.length);
	if(selected_file.length > 1){
	  $('#count_'+id).show();
	}
	
	ev.dataTransfer.setData("text", ev.target.id);
      }

      function drop(ev, id2){
	ev.preventDefault();
	var icon_id2 = id2;
	
	confirm_move(JSON.stringify(selected_file), icon_id2);
	
	var data = ev.dataTransfer.getData("text");
      }
      
      function contextmenu(id){
	var combo;
	if(selected_file.length <= 1){
	  combo = '';
	}else{
	  combo = selected_file.length;
	}
	$('#context').html('<span class="nohover"><?= $TRAD_loading ?></span>');
	$('#context').load('<?= $MY_MAIN_DIRECTORY ?>/contextmenu.php?id='+id+'&combo='+combo);
	$('#context').slideDown(200);
	$('#context_overlay').fadeIn(200);
      }
      
      function move(id, f, type, name){
	var combo;
	if(selected_file.length <= 1){
	  combo = '';
	  document.getElementById("fileName").innerHTML = ' "' + name + '"';
	}else{
	  combo = selected_file.length;
	  document.getElementById("fileName").innerHTML = ' '+combo+' <?= lcfirst($TRAD_elements) ?>';
	}
	document.getElementById("move_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#move_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#context_overlay').fadeOut(200);
	$('#context').slideUp(200);
	$('#move_frame').load('<?= $MY_MAIN_DIRECTORY ?>/move.php?id=' + id + '&f=' + f + '&dialog=true');
      }
      
      function export_file(id, name){
	document.getElementById("export_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#export_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#context_overlay').fadeOut(200);
	$('#context').slideUp(200);
	document.getElementById("fileName7").innerHTML = ' "' + name + '"';
	$('#export_frame').load('<?= $MY_MAIN_DIRECTORY ?>/export.php?id=' + id + '&dialog=true');
      }
      
      function change_icon(id, name){
	document.getElementById("icon_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#icon_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#context_overlay').fadeOut(200);
	$('#context').slideUp(200);
	document.getElementById("fileNameIcon").innerHTML = ' "' + name + '"';
	$('#icon_frame').load('<?= $MY_MAIN_DIRECTORY ?>/file_icon.php?id=' + id + '&dialog=true');
	window.currentFile = id;
      }
      
      function lim(id, name){
	$('#lim_frame').html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	$('#lim_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#context_overlay').fadeOut(200);
	$('#context').slideUp(200);
	$('#fileName9').html(' "' + name + '"');
	$('#lim_frame').load('<?= $MY_MAIN_DIRECTORY ?>/lim.php?id=' + id + '&dialog=true');
      }
      
      function share(id, name){
	var combo;
	if(selected_file.length <= 1){
	  combo = '';
	  document.getElementById("fileName2").innerHTML = ' "' + name + '"';
	}else{
	  combo = selected_file.length;
	  document.getElementById("fileName2").innerHTML = ' '+combo+' <?= lcfirst($TRAD_elements) ?>';
	}
	document.getElementById("share_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#share_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#context_overlay').fadeOut(200);
	$('#context').slideUp(200);
	window.id_share_remove = id;
	$('#share_frame').load('<?= $MY_MAIN_DIRECTORY ?>/file_share.php?id=' + id + '&dialog=true&combo='+JSON.stringify(selected_file));
      }
      
      function profile_picture(id){
	document.getElementById("picture_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#picture_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#context_overlay').fadeOut(200);
	$('#context').slideUp(200);
	window.id_share_remove = id;
	$('#picture_frame').load('<?= $MY_MAIN_DIRECTORY ?>/profile_picture.php?id=' + id + '&dialog=true');
      }
      
      $(document).ready(function(){
	$("#desktop, #files").on("click",".quick_peek_image",function(e){
	  e.stopPropagation();
	  var id_peek = $(this).attr('id');
	  var name_peek = $("#title_"+id_peek).attr('file_name');
	  quick_peek(id_peek, name_peek);
	});
	$(".my-awesome-dropzone").dropzone({ url: "<?= $MY_MAIN_DIRECTORY ?>/formpost?type=upload&f=<?= $_GET['f'] ?>" });
      });
      function quick_peek(id, name) {
	document.getElementById("quick_peek_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#quick_peek_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	document.getElementById("fileName3").innerHTML = ' "' + name + '"';
	$('#quick_peek_frame').load('<?= $MY_MAIN_DIRECTORY ?>/quick_peek.php?id=' + id + '&dialog=true');
      }
      
      function history(id, name){
	document.getElementById("history_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#history_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#context_overlay').fadeOut(200);
	$('#context').slideUp(200);
	document.getElementById("fileName4").innerHTML = ' "' + name + '"';
	$('#history_frame').load('<?= $MY_MAIN_DIRECTORY ?>/history.php?id=' + id + '&dialog=true');
      }
      
      function rename(id, name){
	document.getElementById("rename_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#rename_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#context_overlay').fadeOut(200);
	$('#context').slideUp(200);
	document.getElementById("fileName5").innerHTML = ' "' + name + '"';
	$('#rename_frame').load('<?= $MY_MAIN_DIRECTORY ?>/rename.php?id=' + id + '&dialog=true');
      }
      
      function embed(id, name){
	document.getElementById("embed_frame").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$('#embed_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	$('#context_overlay').fadeOut(200);
	$('#context').slideUp(200);
	document.getElementById("fileName5").innerHTML = ' "' + name + '"';
	$('#embed_frame').load('<?= $MY_MAIN_DIRECTORY ?>/file_embed.php?id=' + id + '&dialog=true');
      }
      
      function info(id){
	document.getElementById("sidebar_file_content").innerHTML = "<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>";
	$("#sidebar_file").effect('slide', { direction: 'right', mode: 'show' }, 300);
	$('body').addClass('body_sidebar');
	$('#context_overlay').fadeOut(200);
	$('#context').slideUp(200);
	var combo;
	if(selected_file.length <= 1){
	  combo = '';
	}else{
	  combo = selected_file.length;
	}
	<?php if($actually_page == 'read'){
	  $extend_url = '&read=y';
	} ?>
	$('#sidebar_file_content').load('<?= $MY_MAIN_DIRECTORY ?>/info.php?id=' + id + '&dialog=true&combo='+combo+'<?= $extend_url ?>');
      }
      
      function new_folder(){
	$('#new_folder_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	closecontext();
      }
      
      function tree_folder(id){
	$('#tree_'+id).load('<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=folder_tree&f_tree='+id);
      }
      
      function confirm_move(id, f){
	$.ajax({
	  type: "POST",
	  url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=move",
	  data: "id="+id+"&f="+f,
	  success: function(html){
	    if(html=='true'){
	      $(".toast").css("background-color", "darkgreen");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_file_moved ?>");
	      $('#files').load('<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=files&f=<?= $_GET['f'] ?>');
	      closeDialog();
	    }else{
	      $(".toast").css('background-color', 'red');
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><!--<?= $TRAD_general_error ?>-->"+html);
	    }
	  },
	  beforeSend:function(){
	    $(".toast").css('background-color', 'orange');
	    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	  }
	});
	$(".toast").slideDown(400);
      }
      function confirm_copy(id, f){
	$.ajax({
	  type: "POST",
	  url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=copy",
	  data: "id="+id+"&f="+f,
	  success: function(html){
	    if(html.indexOf('true') >= 0){
	      $(".toast").css("background-color", "darkgreen");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_copied_notebook ?>");
	      $('#desktop, #files').load('<?= $MY_MAIN_DIRECTORY ?>/view_management?SQL_type=files&f=<?= $_GET['f'] ?>');
	      localStorage.setItem("file_id_copy", "");
	      $('.paste').hide();
	    }else{
	      $(".toast").css('background-color', 'red');
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	    }
	  },
	  beforeSend:function(){
	    $(".toast").css('background-color', 'orange');
	    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	  }
	});
	$(".toast").slideDown(400);
      }
      
      function share_confirm(id_share){
	$("#share_err").css('display', 'none', 'important');
	share_input=$("#share_input").val();
	var share_array = JSON.stringify(id_share);
	if(share_input == ""){
	  $("#share_err").css('display', 'inline', 'important');
	  $("#share_err").html("<?= $TRAD_fill_field ?>");
	}else{
	  $("#share_err").css('display', 'none', 'important');
	  $("#share_err").html("");
	  $.ajax({
	    type: "POST",
	    url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=start_share",
	    data: "share_input="+share_input+"&id="+share_array,
	    success: function(html){
	      $("#share_err").css('display', 'inline', 'important');
	      $(".toast").css("background-color", "green");
	      $(".toast").html(html);
	      $("#share_input").val('');
	      $('#share_list_users').load('<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=list_share&id='+id_share);
	    },
	    beforeSend:function(){
	      $(".toast").css("background-color", "orange");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	    }
	  });
	  $(".toast").slideDown(400);
	  $("#share_input").focus();
	}
      }
      
      function project_confirm(id_share){
	$("#share_err").css('display', 'none', 'important');
	project_input=$("#lim_project").val();
	
	if(project_input == ""){
	  $(".toast").css('background-color', 'red');
	  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_lim_code_error ?>");
	}else{
	  $.ajax({
	    type: "POST",
	    url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=start_project",
	    data: "project_input="+project_input+"&id="+id_share,
	    success: function(html){
	      if(html.indexOf('true') >= 0){
		$(".toast").css("background-color", "darkgreen");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_project_started ?>");
	      }else{
		$(".toast").css('background-color', 'red');
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	      }
	    },
	    beforeSend:function(){
	      $(".toast").css("background-color", "orange");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	    }
	  });
	  $("#lim_project").focus();
	}
	$(".toast").slideDown(400);
      }
      
      function share_input_fun(name){
	if(name.length == 0){
	  $('#share_input_autosuggestion').slideUp(200);
	}else{
	  $("#share_err").css('display', 'none', 'important');
	  $("#share_err").html("");
	  name = name.toString().toLowerCase();
	  $('.autosuggestion > p').hide();
	  $('[username*="'+name+'"]').show();
	  $('[lim*="'+name+'"]').show();
	  $('[name*="'+name+'"]').show();
	  $('[surname*="'+name+'"]').show();
	  $('[complete_name*="'+name+'"]').show();
	  $('[complete_name_inv*="'+name+'"]').show();
	  $('#share_input_autosuggestion').slideDown(200);
	}
      }
      
      function lim_input_fun(name){
	if(name.length == 0){
	  $('#lim_input_autosuggestion').slideUp(200);
	}else{
	  name = name.toString().toLowerCase();
	  $('.autosuggestion > p').hide();
	  $('[lim*="'+name+'"]').show();
	  $('#lim_input_autosuggestion').slideDown(200);
	}
      }
      
      function copy(id){
	localStorage.setItem("file_id_copy", id);
	$('.paste').show();
	closecontext();
      }
      
      <?php if($_GET['no_quick_search'] != 'y'){ ?>
	function doSearch(q){
	  if(q.length == 0){
	    $('.icon_files').show();
	    $('.nothing_found_files').hide();
	  }else{
	    $('.icon_files').hide();
	    q = q.toString().toLowerCase();
	    $('.icon_files[name*="'+q+'"]').show();  
	    if($('.icon_files').is(':visible')) {
	      $('.nothing_found').hide();
	    }else{
	      $('.nothing_found').show();
	    }
	  }
	}
      <?php } ?>
      
      function share_people(name){
	$('#share_input').val(name);
	$('#share_input_autosuggestion').slideUp(200);
      }
      
      function remove_share(id){
	$.ajax({
	  type: "POST",
	  url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=stop_share",
	  data: "share_id="+id,
	  success: function(html){
	    if(html=='true'){
	      $(".toast").css("background-color", "darkgreen");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_share_finished ?>");
	      $('#share_list_users').load('<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=list_share&id='+window.id_share_remove);
	    }else{
	      $(".toast").css("background-color", "red");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	    }
	  },
	  beforeSend:function(){
	    $(".toast").css("background-color", "orange");
	    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	  }
	});
	$(".toast").slideDown(400);
      }
      
      function setImage(url){
	$.ajax({
	  type: "POST",
	  url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=profile_picture",
	  data: "url="+url,
	  success: function(html){
	    if(html=='true'){
	      $(".toast").css("background-color", "darkgreen");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_profile_picture_updated ?>");
	      $('.profile_picture_image').attr('src', '<?= $UPLOAD_MAIN_DIRECTORY ?>/' + url);
	      closeDialog();
	    }else{
	      $(".toast").css("background-color", "red");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	    }
	  },
	  beforeSend:function(){
	    $(".toast").css("background-color", "orange");
	    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	  }
	});
	$(".toast").slideDown(400);
      }
      
      function confirm_rename(id_rename){
	$("#rename_err").css('display', 'none', 'important');
	rename_input=$("#rename_input").val();
	
	if(rename_input == ""){
	  $("#rename_err").css('display', 'inline', 'important');
	  $("#rename_err").html("<?= $TRAD_fill_field ?>");
	}else{
	  $("#rename_err").css('display', 'none', 'important');
	  $("#rename_err").html("");
	  $.ajax({
	    type: "POST",
	    url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=rename",
	    data: "rename="+rename_input+"&id="+id_rename,
	    success: function(html){
	      $("#rename_err").css('display', 'inline', 'important');
	      if(html=='true'){
		$(".toast").css("background-color", "darkgreen");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_file_renamed ?>");
		$("#title_"+id_rename).html(rename_input);
		closeDialog();
	      }else{
		$(".toast").css("background-color", "red");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	      }
	    },
	    beforeSend:function(){
	      $(".toast").css("background-color", "orange");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	    }
	  });
	  $(".toast").slideDown(400);
	  $("#rename_input").focus();
	}
      }
      
      function create_folder(){
	new_folder_input=$("#new_folder_input").val();
	
	if(new_folder_input == ""){
	  $(".toast").css("background-color", "red");
	  $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_fill_field ?>");
	}else{
	  $.ajax({
	    type: "POST",
	    url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=create_folder",
	    data: "title="+new_folder_input+"&f=<?= $_GET['f'] ?>",
	    success: function(html){
	      if(html=='true'){
		$(".toast").css("background-color", "darkgreen");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_folder_created ?>");
		$('#desktop, #files').load('<?= $MY_MAIN_DIRECTORY ?>/files.php?f=<?= $_GET['f'] ?>');
		closeDialog();
		$(".content").attr('style', 'margin-left: 0px !important; margin-right: -8px !important');
	      }else{
		$(".toast").css("background-color", "red");
		$(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	      }
	    },
	    beforeSend:function(){
	      $(".toast").css("background-color", "orange");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	    }
	  });
	}
	$(".toast").slideDown(400);
      }
      
      function upload_file(){
	$('#upload_dialog').fadeIn(200);
	$('#dialog_overlay').fadeIn(200);
	closecontext();
      }
    </script>
    <div class="dialog" id="move_dialog">
      <div class="title"><?= $TRAD_move ?><span id="fileName" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="move_frame"></div>
    </div>
    <div class="dialog" id="share_dialog">
      <div class="title"><?= $TRAD_share ?><span id="fileName2" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="share_frame"></div>
    </div>
    <div class="dialog" id="icon_dialog" style="max-height: calc(100% - 4px); height: 80%">
      <div class="title"><?= $TRAD_change_icon ?><span id="fileNameIcon" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="icon_frame"></div>
    </div>
    <div class="dialog" id="picture_dialog" style="max-width: 450px">
      <div class="title"><?= $TRAD_set_as_profile_picture ?><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="picture_frame"></div>
    </div>
    <div class="dialog" id="lim_dialog">
      <div class="title"><?= $TRAD_lim ?><span id="fileName9" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="lim_frame"></div>
    </div>
    <div class="dialog" id="embed_dialog">
      <div class="title"><?= $TRAD_embed ?><span id="fileName8" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="embed_frame"></div>
    </div>
    <div class="dialog" id="quick_peek_dialog">
      <div class="title"><?= $TRAD_quick_peek ?><span id="fileName3" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="quick_peek_frame"></div>
    </div>
    <div class="dialog" id="history_dialog">
      <div class="title"><?= $TRAD_edit_history ?><span id="fileName4" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="history_frame"></div>
    </div>
    <div class="dialog" id="rename_dialog">
      <div class="title"><?= $TRAD_rename ?><span id="fileName5" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="rename_frame"></div>
    </div>
    <div class="dialog" id="export_dialog">
      <div class="title"><?= $TRAD_export ?><span id="fileName7" style="float: none; font-weight: normal; margin-left: 0px; cursor: default"></span><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="export_frame"></div>
    </div>
    <div class="dialog" id="new_folder_dialog">
      <div class="title"><?= $TRAD_new_folder ?><span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" id="new_folder_frame">
	<input type="text" id="new_folder_input" name="new_folder_input" placeholder="<?= $TRAD_title ?>" style="width: calc(100% - 120px) !important" /><button style="margin-left: 10px" onclick="create_folder()"><?= $TRAD_create ?></button>
      </div>
    </div>
    
    <div class="dialog dialog_upload" id="upload_dialog">
      <div class="title">Carica file<span onclick="closeDialog()"><img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/cross2.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' /></span></div>
      <div class="content" style="height: calc(100% - 80px) !important">
	<form action="<?= $MY_MAIN_DIRECTORY ?>/formpost?type=upload&f=<?= $_GET['f'] ?>" method="post" enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone"></form>
      </div>
    </div>
    
    <div class="sidebar" id="sidebar_file">
      <div id="sidebar_file_content" style="height: 100%; max-height: 100%"></div>
    </div>
    
    <!-- <div id="file_search_panel" class="search_panel">
      Cerca:<br/><label><input type="checkbox" checked="checked">E-book</label><label><input type="checkbox" checked="checked">Cartelle</label><label><input type="checkbox" checked="checked">Quaderni</label><label><input type="checkbox" checked="checked">File</label><label><input type="checkbox" checked="checked">Materiale</label>
    </div> -->
  <?php 
  }
?>