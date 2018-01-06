<?php include "base.php"; ?>
<html>
  <head>
    <title>LightSchool Preview</title>
    <?php include "style.php"; ?>
    <script src="//code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="slide" id="slide2">
      <div style="font-size: 50pt" align="center" data-sr="scale up 20% wait 1s">
	<table cellpadding="20" style="width: 100%">
	  <tr>
	    <td style="padding-left: 6%; width: 510px">
	      <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/writer.png" style="width: 500px" />
	    </td>
	    <td style="padding-right: 6%">
	      <p style="font-size: 30pt; color: white; text-align: center"><?php echo($TRAD_welcome_notebook); ?></p>
	      <?php echo($TRAD_welcome_notebook_subtitle); ?>
	    </td>
	  </tr>
	</table>
      </div>
    </div>
    <div class="slide" id="slide3">
      
    </div>
    <div class="slide" id="slide4">
      <div style="font-size: 50pt" align="center" data-sr="scale up 20% wait 1s">
	<table cellpadding="20" style="width: 100%">
	  <tr>
	    <td style="padding-left: 6%; width: 510px">
	      <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/diary.png" style="width: 500px" />
	    </td>
	    <td style="padding-right: 6%">
	      <p style="font-size: 30pt; color: white; text-align: center"><?php echo($TRAD_welcome_diary); ?></p>
	      <?php echo($TRAD_welcome_diary_subtitle); ?>
	    </td>
	  </tr>
	</table>
      </div>
    </div>
    <div class="slide" id="slide5">
      
    </div>
    <div class="slide" id="slide6">
      <div style="font-size: 50pt" align="center" data-sr="scale up 20% wait 1s">
	<table cellpadding="20" style="width: 100%">
	  <tr>
	    <td style="padding-left: 6%; width: 510px">
	      <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/quiz.png" style="width: 500px" />
	    </td>
	    <td style="padding-right: 6%">
	      <p style="font-size: 30pt; color: white; text-align: center"><?php echo($TRAD_welcome_quiz); ?></p>
	      <?php echo($TRAD_quiz_subtitle); ?>
	    </td>
	  </tr>
	</table>
      </div>
    </div>
    <div class="slide" id="slide3">
      
    </div>
    <div class="slide" id="slide6">
      <div style="font-size: 50pt" align="center" data-sr="scale up 20% wait 1s">
	<table cellpadding="20" style="width: 100%">
	  <tr>
	    <td style="padding-left: 6%; width: 510px">
	      <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/register.png" style="width: 500px" />
	    </td>
	    <td style="padding-right: 6%">
	      <p style="font-size: 30pt; color: white; text-align: center"><?php echo($TRAD_welcome_register); ?></p>
	      <?php echo($TRAD_register_subtitle); ?>
	    </td>
	  </tr>
	</table>
      </div>
    </div>
    <div class="slide" id="slide5">
      
    </div>
    <div class="slide" id="slide6">
      <div style="font-size: 50pt" align="center" data-sr="scale up 20% wait 1s">
	<table cellpadding="20" style="width: 100%">
	  <tr>
	    <td style="padding-left: 6%; width: 510px">
	      <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/timetable.png" style="width: 500px" />
	    </td>
	    <td style="padding-right: 6%">
	      <p style="font-size: 30pt; color: white; text-align: center"><?php echo($TRAD_welcome_timetable); ?></p>
	      <?php echo($TRAD_timetable_subtitle); ?>
	    </td>
	  </tr>
	</table>
      </div>
    </div>
    <div class="slide" id="slide3">
      
    </div>
    <div class="slide" id="slide6" style="padding-bottom: 150px">
      <div style="font-size: 50pt" align="center" data-sr="scale up 20% wait 1s">
	<p style="font-size: 30pt; color: white; text-align: center"><?php echo($TRAD_welcome_other_title); ?></p>
	<table cellpadding="20" style="width: 700px" align="center">
	  <tr>
	    <td style="padding-left: 6%; width: 50%">
	      <p style="font-size: 14pt; color: white; text-align: center">
	      <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/quiz_icon.png" /><br/>
	      <?php echo($TRAD_welcome_quiz); ?></p>
	    </td>
	    <td style="padding-right: 6%">
	      <p style="font-size: 14pt; color: white; text-align: center">
	      <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/register_icon.png" /><br/>
	      <?php echo($TRAD_welcome_register); ?></p>
	    </td>
	  </tr>
	  <tr>
	    <td style="padding-left: 6%; width: 50%">
	      <p style="font-size: 14pt; color: white; text-align: center">
	      <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/timetable_icon.png" /><br/>
	      <?php echo($TRAD_welcome_timetable); ?></p>
	    </td>
	    <td style="padding-right: 6%; cursor: pointer" onclick="window.location.href = 'features'">
	      <p style="font-size: 14pt; color: white; text-align: center">
	      <img src="<?= $IMAGES_MAIN_DIRECTORY ?>/welcome_more.png" style="width: 64px; margin-bottom: 7px" /><br/>
	      <?php echo($TRAD_welcome_more); ?></p>
	    </td>
	  </tr>
	</table>
      </div>
    </div>
  </body>
</html>