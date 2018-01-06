<?php
  $_GET['no_text'] = 'y';

  include "base.php";
  
  if($_SESSION['Username'] != ''){
    $COMPLETE_COLOR_PALETTE = array("settings");
  ?>
    <script type="text/javascript">
      $(document).ready(function(){
	$('#accentcolor, #accentcolor2').on('focus',function(){
	  $("#accentcolorpalette").fadeIn(300);
	  <?php if($actually_page == 'settings'){ ?>
	    var accentcolor_position = $("#accentcolor").position();
	    var accentcolor_height = $("#accentcolor").outerHeight();
	    $(".palette").attr("style", "left: "+accentcolor_position.left+"px !important; top: "+(accentcolor_position.top+accentcolor_height)+"px !important; display: block; z-index: 99999 !important");
	  <?php }elseif($actually_page == 'timetable'){ ?>
	    var accentcolor_position = $("#accentcolor").position();
	    var accentcolor_height = $("#accentcolor").outerHeight();
	    var accentcolor_position2 = $("#new_subject").position();
	    $(".palette").attr("style", "left: "+(accentcolor_position.left+accentcolor_position2.left)+"px !important; top: "+((accentcolor_position2.top)+accentcolor_height)+"px !important; display: block; z-index: 99999 !important");
	  <?php }elseif($actually_page == 'diary'){ ?>
	    var accentcolor_position = $("#accentcolor").position();
	    var accentcolor_height = $("#accentcolor").outerHeight();
	    var accentcolor_position2 = $("#new_diary").position();
	    $(".palette").attr("style", "left: "+(accentcolor_position.left+accentcolor_position2.left)+"px !important; top: "+((accentcolor_position2.top)+accentcolor_height)+"px !important; display: block; z-index: 99999 !important");
	  <?php } ?>
	});
	$('#accentcolor').on('focusout',function(){
	  if($('#accentcolorpalette:visible').length > 0){
	    $("#accentcolorpalette").fadeOut(300);
	  }
	});
	
	$('.palette span').on('click',function(){
	  var htmlcolor = rgb2hex($(this).css('background-color'));
	  $("#accentcolor").val(htmlcolor);
	  <?php if($actually_page == 'settings'){ ?>
	    $("#accentcolor, .header, .taskbar, .sidebar, .selected, #settings_save, .sidebar span, #wallpaper, .taskbar > .app, .main_menu, .border").css('background-color', htmlcolor);
	    $("#accentcolor").css('color', htmlcolor);
	    $("#accentcolor, .selected, .app").css('border', '1px solid ' + htmlcolor);
	    var htmlcolor2 = rgb2hex2($(this).css('background-color'));
	    if(getContrastYIQ(htmlcolor2) == 'dark'){
	      $(".header, .taskbar, .sidebar, .selected, #settings_save, .sidebar span").css('color', 'white');
	      $('.app img').each(function(){
		var newurl = $(this).attr('src').replace('monochromatic/black','monochromatic/white');
		$(this).attr('src', newurl);
	      });
	      $('hr').addClass('white');
	    }else{
	      $(".header, .taskbar, .sidebar, .selected, #settings_save, .sidebar span").css('color', 'black');
	      $('.app img').each(function(){
		var newurl = $(this).attr('src').replace('monochromatic/white','monochromatic/black');
		$(this).attr('src', newurl);
	      });
	      $('hr').removeClass('white');
	    }
	  <?php }elseif($actually_page == 'timetable' or $actually_page == 'diary'){ ?>
	    $("#accentcolor").css('background-color', htmlcolor);
	    $("#accentcolor, #subject").css('color', htmlcolor);
	    $("#accentcolor").css('border', '1px solid ' + htmlcolor);
	    var htmlcolor2 = rgb2hex2($(this).css('background-color'));
	  <?php } ?>
	});
      });
      
      function getContrastYIQ(hexcolor){
	var r = parseInt(hexcolor.substr(0,2),16);
	var g = parseInt(hexcolor.substr(2,2),16);
	var b = parseInt(hexcolor.substr(4,2),16);
	var yiq = ((r*299)+(g*587)+(b*114))/1000;
	return (yiq >= 128) ? 'light' : 'dark';
      }

      function rgb2hex(rgb){
      rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
      return "#" +
	("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
	("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
	("0" + parseInt(rgb[3],10).toString(16)).slice(-2);
      }

      function rgb2hex2(rgb){
      rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
      return "" +
	("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
	("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
	("0" + parseInt(rgb[3],10).toString(16)).slice(-2);
      }
    </script>
    <div class="palette" id="accentcolorpalette">
      <span style="background-color: #000000"></span>
      <span style="background-color: #202020"></span>
      <span style="background-color: #404040"></span>
      <span style="background-color: #606060"></span>
      <span style="background-color: #808080"></span>
      <?php if(in_array("$actually_page", $COMPLETE_COLOR_PALETTE)){ ?>
	<span style="background-color: #A0A0A0"></span>
	<span style="background-color: #C0C0C0"></span>
	<span style="background-color: #E0E0E0"></span>
	<span style="background-color: #FFFFFF"></span>
      <?php } ?>
      <br/>
      
      <span style="background-color: #610B0B"></span>
      <span style="background-color: #8A0808"></span>
      <span style="background-color: #B40404"></span>
      <span style="background-color: #DF0101"></span>
      <span style="background-color: #FF0000"></span>
      <?php if(in_array("$actually_page", $COMPLETE_COLOR_PALETTE)){ ?>
	<span style="background-color: #FE2E2E"></span>
	<span style="background-color: #FA5858"></span>
	<span style="background-color: #F78181"></span>
	<span style="background-color: #F5A9A9"></span>
      <?php } ?>
      <br/>
      
      <span style="background-color: #61380B"></span>
      <span style="background-color: #8A4B08"></span>
      <span style="background-color: #B45F04"></span>
      <span style="background-color: #DF7401"></span>
      <span style="background-color: #FF8000"></span>
      <?php if(in_array("$actually_page", $COMPLETE_COLOR_PALETTE)){ ?>
	<span style="background-color: #FE9A2E"></span>
	<span style="background-color: #FAAC58"></span>
	<span style="background-color: #F7BE81"></span>
	<span style="background-color: #F5D0A9"></span>
      <?php } ?>
      <br/>
      
      <span style="background-color: #5E610B"></span>
      <span style="background-color: #868A08"></span>
      <span style="background-color: #AEB404"></span>
      <span style="background-color: #D7DF01"></span>
      <span style="background-color: #FFFF00"></span>
      <?php if(in_array("$actually_page", $COMPLETE_COLOR_PALETTE)){ ?>
	<span style="background-color: #F7FE2E"></span>
	<span style="background-color: #F4FA58"></span>
	<span style="background-color: #F3F781"></span>
	<span style="background-color: #F2F5A9"></span>
      <?php } ?>
      <br/>
      
      <span style="background-color: #0B610B"></span>
      <span style="background-color: #088A08"></span>
      <span style="background-color: #04B404"></span>
      <span style="background-color: #01DF01"></span>
      <span style="background-color: #00FF00"></span>
      <?php if(in_array("$actually_page", $COMPLETE_COLOR_PALETTE)){ ?>
	<span style="background-color: #2EFE2E"></span>
	<span style="background-color: #58FA58"></span>
	<span style="background-color: #81F781"></span>
	<span style="background-color: #A9F5A9"></span>
      <?php } ?>
      <br/>
      
      <span style="background-color: #0B615E"></span>
      <span style="background-color: #088A85"></span>
      <span style="background-color: #04B4AE"></span>
      <span style="background-color: #01DFD7"></span>
      <span style="background-color: #00FFFF"></span>
      <?php if(in_array("$actually_page", $COMPLETE_COLOR_PALETTE)){ ?>
	<span style="background-color: #2EFEF7"></span>
	<span style="background-color: #58FAF4"></span>
	<span style="background-color: #81F7F3"></span>
	<span style="background-color: #A9F5F2"></span>
      <?php } ?>
      <br/>
      
      <span style="background-color: #0B3861"></span>
      <span style="background-color: #084B8A"></span>
      <span style="background-color: #045FB4"></span>
      <span style="background-color: #0174DF"></span>
      <span style="background-color: #0080FF"></span>
      <?php if(in_array("$actually_page", $COMPLETE_COLOR_PALETTE)){ ?>
	<span style="background-color: #2E9AFE"></span>
	<span style="background-color: #58ACFA"></span>
	<span style="background-color: #81BEF7"></span>
	<span style="background-color: #A9D0F5"></span>
      <?php } ?>
      <br/>
      
      <span style="background-color: #0B0B61"></span>
      <span style="background-color: #08088A"></span>
      <span style="background-color: #0404B4"></span>
      <span style="background-color: #0101DF"></span>
      <span style="background-color: #0000FF"></span>
      <?php if(in_array("$actually_page", $COMPLETE_COLOR_PALETTE)){ ?>
	<span style="background-color: #2E2EFE"></span>
	<span style="background-color: #5858FA"></span>
	<span style="background-color: #8181F7"></span>
	<span style="background-color: #A9A9F5"></span>
      <?php } ?>
      <br/>
      
      <span style="background-color: #610B5E"></span>
      <span style="background-color: #8A0886"></span>
      <span style="background-color: #B404AE"></span>
      <span style="background-color: #DF01D7"></span>
      <span style="background-color: #FF00FF"></span>
      <?php if(in_array("$actually_page", $COMPLETE_COLOR_PALETTE)){ ?>
	<span style="background-color: #FE2EF7"></span>
	<span style="background-color: #FA58F4"></span>
	<span style="background-color: #F781F3"></span>
	<span style="background-color: #F5A9F2"></span>
      <?php } ?>
      <br/>
      
      <!-- <span style="float: right; width: 100px; border: none; cursor: pointer; font-weight: bold">Altri colori...</span> -->
    </div>
  <?php 
  }
?>