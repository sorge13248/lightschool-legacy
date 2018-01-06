<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Supporto di LightSchool</title>
    <?php include_once "style.php"; ?>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 70px; text-align: center">
      <h3>Benvenuto sul supporto tecnico ufficiale di LightSchool</h3>
      <p>In che cos'hai bisogno di aiuto?</p>
      <div style="margin-top: 40px; margin-bottom: 20px">
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/register" class="group_selector"><div class="glyphicon glyphicon-check" style="font-size: 64px;"></div><br/>Registrazione</a>
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/login" class="group_selector"><div class="glyphicon glyphicon-log-in" style="font-size: 64px;"></div><br/>Accesso</a>
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/files" class="group_selector"><div class="glyphicon glyphicon-folder-open" style="font-size: 64px;"></div><br/>File</a><br/>
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/share" class="group_selector"><div class="glyphicon glyphicon-share" style="font-size: 64px;"></div><br/>Condivisi</a>
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/register" class="group_selector"><div class="glyphicon glyphicon-book" style="font-size: 64px;"></div><br/>Registro</a>
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/diary" class="group_selector"><div class="glyphicon glyphicon-calendar" style="font-size: 64px;"></div><br/>Diario</a><br/>
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/timetable" class="group_selector"><div class="glyphicon glyphicon-time" style="font-size: 64px;"></div><br/>Orario</a>
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/messages" class="group_selector"><div class="glyphicon glyphicon-comment" style="font-size: 64px;"></div><br/>Messaggi</a>
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/people" class="group_selector"><div class="glyphicon glyphicon-user" style="font-size: 64px;"></div><br/>Rubrica</a><br/>
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/trash" class="group_selector"><div class="glyphicon glyphicon-trash" style="font-size: 64px;"></div><br/>Cestino</a>
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs/settings" class="group_selector"><div class="glyphicon glyphicon-cog" style="font-size: 64px;"></div><br/>Impostazioni</a>
	<a href="<?= $SUPPORT_MAIN_DIRECTORY ?>/docs" class="group_selector"><div class="glyphicon glyphicon-tasks" style="font-size: 64px"></div><br/>Altro...</a>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>