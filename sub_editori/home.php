<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo($COMPANY_name); ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Impostazioni</a></li>
            <li><a href="#"><?php echo($USER_surname.' '.$USER_name); ?></a></li>
            <li><a href="#">Aiuto</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Cerca...">
          </form>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Panoramica <span class="sr-only">(attuale)</span></a></li>
            <li><a href="#">Rapporti</a></li>
            <li><a href="#">Statistiche</a></li>
            <li><a href="#">Guadagni</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="#">E-book</a></li>
            <li><a href="#">Recensioni</a></li>
            <li><a href="#">Contenuti multimediali</a></li>
            <li><a href="#">Test delle competenze</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-md-6 col-sm-3 placeholder">
              <h4>Top e-book venduti</h4>
              <canvas id="countries" width="300" height="300" style="margin-top: 20px"></canvas>
	      <script>
		var pieData = [
		  {
		      value: 20,
		      color:"#878BB6"
		  },
		  {
		      value : 40,
		      color : "#4ACAB4"
		  },
		  {
		      value : 10,
		      color : "#FF8153"
		  },
		  {
		      value : 20,
		      color : "#FFEA88"
		  },
		  {
		      value : 10,
		      color : "blue"
		  }
		];
		// Get the context of the canvas element we want to select
		var countries= document.getElementById("countries").getContext("2d");
		new Chart(countries).Pie(pieData);
	      </script>
              <p><a href="">Pi&ugrave; dettagli &gt;</a></p>
            </div>
            <div class="col-md-6 placeholder">
              <h4>Top valutati migliori</h4>
              <canvas id="countries2" width="300" height="300" style="margin-top: 20px"></canvas>
	      <script>
		var pieData = [
		  {
		      value: 10,
		      color:"#878BB6"
		  },
		  {
		      value : 40,
		      color : "#4ACAB4"
		  },
		  {
		      value : 20,
		      color : "#FF8153"
		  },
		  {
		      value : 10,
		      color : "#FFEA88"
		  },
		  {
		      value : 20,
		      color : "blue"
		  }
		];
		// Get the context of the canvas element we want to select
		var countries= document.getElementById("countries2").getContext("2d");
		new Chart(countries).Pie(pieData);
	      </script>
              <p><a href="">Pi&ugrave; dettagli &gt;</a></p>
            </div>
          </div>

          <h2 class="sub-header">E-book pi&ugrave; venduti</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Prezzo</th>
                  <th># Copie</th>
                  <th>Ricavi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>MatEsamiMedie</td>
                  <td>Preparazione all'esame di matematica per la scuole secondaria di primo grado</td>
                  <td>&euro; 26,00</td>
                  <td>15</td>
                  <td>&euro; 390,00</td>
                </tr>
                <tr>
                  <td>PHPEasy</td>
                  <td>Il PHP facile</td>
                  <td>&euro; 5,00</td>
                  <td>44</td>
                  <td>&euro; 220,00</td>
                </tr>
                <tr>
                  <td>LSWelcome</td>
                  <td>LightSchool: Guida rapida per iniziale</td>
                  <td>GRATIS</td>
                  <td>7</td>
                  <td>&euro; 0,00</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<?php }else{
  include_once "login.php";
} ?>