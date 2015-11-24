<html>
<head>
	<title>Test</title>
	<meta charset="utf-8" />
	<meta content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1" name="viewport">
	<link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="../lib/weather_icons/css/weather-icons.min.css"/>
	<link rel="stylesheet" href="../css/index.css"/>
	<link rel="stylesheet" href="../css/panelControl.css"/>
	<link rel="stylesheet" href="../css/tabs.css"/>
</head>
  <style>
   
  </style>
<body>
	<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
			<div class="container-fluid">
				<div class="navbar-header"><a class="navbar-brand" href="#"><p id="titre-global">Smart Garden</p></a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navbar-menubuilder adapt">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="../index.php"><p id="titres">Accueil</p></a>
						</li>
						<li><a href="#" active><p id="titres">My Garden</p></a>
						</li>
						<li><a href="/about-us"><p id="titres">About Us</p></a>
						</li>
						<li><a href="/contact"><p id="titres">Contact Us</p></a>
						</li>
					</ul>
				</div>
			</div>
	</div>
<div id="div_left">
    <div class="panel panel-success" style="margin-top: 10px;">
		<div class="panel-heading">
			<h3 class="panel-title" style="text-align:center;">Panneau de contrôle</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="sel1">Image plante:</label>
						<form action="#">
 
							<div id="circle"></div>
						   
							<fieldset>
							  <label for="temp">Période:</label>
							  <select name="temp" id="temp">
								<option value="hour">6H</option>
								<option value="day">1DAY</option>
								<option value="week">1WEEK</option>
							  </select>
						   
							  <label for="liste_plantes"></label>
							  <select name="liste_plantes" id="liste_plantes">
								<option value="../images/init.jpg">Liste arduinos:</option>
							  </select>
							</fieldset>
						   
						</form>
			</div>
		</div>
	</div>
</div>


<div id="div_right">
		<section>	
			<div class="board">
						<!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
						<div class="board-inner">
						<ul class="nav nav-tabs" id="myTab">
						<div class="liner"></div>
						
						 
						 <li class="active">
						 <a href="#humidite" data-toggle="tab" title="Humidité">
						  <span class="round-tabs one">
								  <i class="wi wi-humidity"></i>
						  </span> 
					  </a></li>
	
					  <li><a href="#lumiere" data-toggle="tab" title="Lumière">
						 <span class="round-tabs two">
							 <i class="wi wi-day-sunny"></i>
						 </span> 
						 </a>
					 </li>
					
					<button id="button1"><i class="wi wi-small-craft-advisory" id="glaph"></i></button>
					 
	
						 
						 </ul></div>
						<div class="tab-content">

						  <div class="tab-pane fade in active" id="humidite">
	
						  </div>
						  <div class="tab-pane fade" id="lumiere">
						
							  
						  </div>
							
						
						  <div class="clearfix"></div>
						</div>
						<div id="verifHumidite">
	
						</div>
	
			</div>

	</section>
                   
</div>

<script type="text/javascript" src="../lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../lib/chart/Chart.min.js"></script>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript" src="../js/recup_plante.js"></script>
<script type="text/javascript" src="../js/panelControl.js"></script>
</body>
</html>