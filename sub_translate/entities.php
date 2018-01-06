<?php
  echo(htmlentities($_POST['content'], ENT_QUOTES));
?>
<form method="post">
<textarea name="content"></textarea><input type="submit" />
</form>