<html>
<head>
	<title>Test</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/index.css"/>
    <link rel="stylesheet" href="../css/myGarden.css"/>

</head>

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
	


	<div id="bloc_liste">
		<div id="fond"> 
			<div class="ruban">     
				 <h2>Mes plantes !</h2>     
			</div>     
			<div class="ruban_gauche"></div>
			<div class="ruban_droit"></div>
		</div>
       

		<div class="liste_plante">

		</div>
        <hr>
	</div>
	<div id="bloc_controle">
		
	</div>

<script type="text/javascript" src="../lib/jquery/jquery.js"></script>
<script type="text/javascript" src="../lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/recup_plante.js"></script>

</body>
</html>