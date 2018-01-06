<?php
  $_GET['no_text'] = 'y';
  include "base.php";
  
  if($_SESSION['Username'] != ''){
    if($_GET['share'] != ''){
      $TO = $_GET['share'];
      $TO_name = lightschool_get_user($TO, 'name');
      $TO_surname = lightschool_get_user($TO, 'surname');
      $PRE_text = "$TRAD_share_contact_message_text<span id='shared_$TO' shared_contact='$TO' class='link' onclick='save_contact()'>$TO_name $TO_surname</span>.";
    }
    ?>
      <script type="text/javascript">
	$(document).ready(function(){
	  <?php if($_GET['to'] != ''){ ?>
	    $(".send_message_content").focus();
	  <?php }else{ ?>
	    $("#share_input").focus();
	  <?php } ?>
	});
      </script>
	<div style="margin-top: -80px">
	<label for="share_input"><?= $TRAD_to2 ?></label><br/>
	<input type="text" id="share_input" name="share_input" placeholder="<?= $TRAD_share_input_placeholder ?>" value="<?= $_GET['to'] ?>" style="width: 100%" oninput="share_input_fun(this.value)" />
	<div id="share_input_autosuggestion" class="autosuggestion">
	  <?php
	    $_GET['SQL_type'] = 'people_share';
	    include "view_management.php";
	  ?>
	</div><br/>
	<label for="subject"><?= $TRAD_content ?></label><br/>
	<div class="send_message" onclick="$('.send_message_content').focus();" style="width: 100%">
	  <div style="" class="send_message_content" contenteditable="true"><?php echo($PRE_text); ?></div><input type="submit" value="" style="height: 80px; width: 32px; margin-top: 3px" onclick="sendmessage($('#share_input').val(), $('.send_message_content').html())" />
	</div>
      </div>
    <?php
  }
?>