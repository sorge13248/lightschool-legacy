<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Translations - LightSchool Translate</title>
    <?php include_once "style.php"; ?>
    <script type="text/javascript">
      $(document).ready(function(){
	$("tr:even").css("background-color", "#F6F6F6");
      });
      
      $(".toast").load("<?= $MAIN_DIRECTORY ?>/recover_draft.php?lang=<?= $_GET['lang'] ?>", function() {
	var response_array = $(".toast").html();
	response_array = response_array.split("//LS//"); 
	console.log(response_array);
	
	if(response_array != ''){
	  $(".translate_field").each(function(index){
	    var this_value2 = response_array[index].replace("_", " ");
	    $(this).val(this_value2);
	  });
	}
      });
      
      function saveDatabase(kind){
	var array = [];
	
	$(".translate_field").each(function(index){
	  var this_value = $(this).attr("value");
	  this_value = this_value.replace(/\s/g, "_");
	  this_value = this_value.replace("&lt;", "<");
	  this_value = this_value.replace("&gt;", ">");
	  this_value = this_value.replace('"', "'");
	  array.push(this_value);
	}).promise().done(function(){
	  array_string = array.join('//LS//');
	  $("#copy_textarea").html(array_string);
	  $.ajax({
	    type: "POST",
	    url: "<?= $MAIN_DIRECTORY ?>/formpost?type=save&language=<?= $_GET['lang'] ?>&kind=" + kind + "&array=" + array_string,
	    success: function(html){
	      if(html=='true'){
		if(kind == "draft"){
		  $("#save_text").html("Saved!");
		}
		setTimeout(function(){ $("#save_text").html("Save as draft"); }, 3000);
	      }else{
		$("#save_text").html("ERROR! CONTACT SUPPORT BEFORE LEAVING THE PAGE");
	      }
	    },
	    beforeSend:function(){
	      $("#save_text").html("Saving...");
	      setTimeout(function(){ $("#save_text").html("ERROR! CONTACT SUPPORT BEFORE LEAVING THE PAGE"); }, 15000);
	    }
	  });
	});
      }
      
      setInterval(function(){ saveDatabase("draft"); }, 600000);
      
      function step(int){
	$(".step").hide();
	$(".step_" + int).show();
	if(int === 3){
	  saveDatabase("finished");
	}
      }
      
      window.onbeforeunload = function() {
	return "Are you sure you want to close this page? Please make sure you've saved before closing.";
      }
    </script>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 70px">
      <?php 
      if($_SESSION['Username'] != ''){
	if($_GET['lang'] != '' and $SUPPORTED_languages[$_GET['lang']] != ''){ ?>
	  <div class="step step_1" style="display: block">
	    <h2>You're translating: <?php echo($SUPPORTED_languages[$_GET['start']]." &gt; ".$SUPPORTED_languages[$_GET['lang']]); ?></h2>
	    <p style="display: none">Is it your first time or do you need help? See <a href="<?= $SUPPORT_DIRECTORY ?>/docs/translating" target="_blank">How LightSchool Translate works</a>.</p>
	    <p>We save automatically your work as draft every 10 minutes. You can always save manually by clicking <i>Save as draft</i> button. If you close this page, we'll restore your draft automatically.<br/>
	    Click <i>Save as draft</i> if you haven't finished translating and you've to close the page or click <i>Next</i> if you're ready to submit it for a review.</p>
	    <p>Do you need to type particular signs that aren't available on your keyboard? Copy and paste symbols from <a href="http://dev.w3.org/html5/html-author/charref" target="_blank">this</a> site.</p>
	    <p>If you don't trust our save system, please click <a href="javascript:void()" onclick="step(4); saveDatabase('notepad')">here</a> and copy its content inside your notepad so if there're problems you can send it to us and we'll help you.</p><br/>
	    <table cellpadding="10" style="border: 4px solid #F6F6F6">
	      <?php
		$show_field = true; include "$ROOT_SERVER_DIRECTORY"."language/".$_GET['start'].".php";
		$i = 1;
		$COUNT = count($translate_string) - 0;
		foreach($translate_string as $this_string){
		  if($i - 1 < $COUNT){
		    $this_string2 = implode(", ", $this_string);
		    if($this_string2 != ""){
		      $this_string = $this_string2;
		    }
		    echo("
		      <tr>
			<td style='width: 50% !important; padding: 20px' valign='top'>
			  <span style='display: inline-block; width: 50px'>$i)</span> $this_string
			</td>
			<td valign='top' style='width: 50% !important; padding: 20px'>
			  <input type='text' style='width: 100%; margin-bottom: 0px' class='translate_field' placeholder='Type your translation here...' />
			</td>
		      </tr>
		    ");
		  }
		  $i++;
		}
	      ?>
	    </table>
	    <button style="position: fixed; bottom: 10px; right: 150px;" class="btn btn-primary btn-success" onclick="saveDatabase('draft')"><span class="glyphicon glyphicon-floppy-disk glyphicon_left"></span><span id="save_text">Save as draft</span></button>
	    <button style="position: fixed; bottom: 10px; right: 10px;" class="btn btn-primary btn-success" onclick="step(2)">Next<span class="glyphicon glyphicon-chevron-right glyphicon_right"></span></button>
	  </div>
	  <div class="step step_2">
	    <span class="btn btn-link" onclick="step(1)">&lt; Back</span><br/>
	    <h2>Submitting your translation</h2>
	    <p>We'll revise your translation and if it's good, we'll publish it as language on LightSchool and you will be credited for your work. It may takes about 2-3 days for us to check your translation. Once you've submitted your translation, there's no way to cancel it so submit only if you think that you've done a good work.</p>
	    <p>If you would like to change something, you can do that at any time by accessing this page with your account and then re-submit for review.</p>
	    <button class="btn btn-danger" onclick="step(1)"><span class="glyphicon glyphicon-chevron-left glyphicon_left"></span>Go back</button>
	    <button class="btn btn-success" style="float: right" onclick="step(3)"><span class="glyphicon glyphicon-ok glyphicon_left"></span>Submit</button>
	  </div>
	  <div class="step step_3">
	    <h2>Your translation has been submitted successfully</h2>
	    <p>Thank you in advance!</p>
	    <button class="btn btn-success" style="float: right" onclick="window.location.href = '<?= $MAIN_DIRECTORY ?>/start'"><span class="glyphicon glyphicon-globe glyphicon_left"></span>Start a new translation</button>
	  </div>
	  <div class="step step_4">
	    <span class="btn btn-link" onclick="step(1)">&lt; Back</span><br/>
	    <h4>Copy the content of this textarea and save it to your notepad</h4>
	    <textarea readonly style="width: 100%; height: 500px" id="copy_textarea"></textarea>
	  </div>
	<?php }else{ ?>
	  <h2>Error</h2>
	  <p>The language you choose to translate doesn't exists or it is currently unsupported. Please, report a missing language to info@lightschool.it.</p>
	<?php
	  }
	}else{
      ?>
	<h2>Error</h2>
	<p>You must be logged in in order to translate LightSchool.</p>
      <?php } ?>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>