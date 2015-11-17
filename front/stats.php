<html>
<head>
	<title>Test</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="../css/index.css"/>
	<link rel="stylesheet" href="../css/tabs.css"/>
	<link rel="stylesheet" href="../css/panelControl.css"/>
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
    <div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title" style="text-align:center;">Panneau de contrôle</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="sel1">Select list:</label>
						<form action="#">
 
							<div id="circle"></div>
						   
							<fieldset>
							  <label for="radius">Circle radius</label>
							  <select name="radius" id="radius">
								<option value="50">50px</option>
								<option value="100">100px</option>
								<option value="150" selected="selected">150px</option>
								<option value="200">200px</option>
								<option value="250">250px</option>
							  </select>
						   
							  <label for="color">Circle color</label>
							  <select name="color" id="color">
								<option value="black">Black</option>
								<option value="red">Red</option>
								<option value="yellow" selected="selected">Yellow</option>
								<option value="blue">Blue</option>
								<option value="green">Green</option>
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
						 <a href="#home" data-toggle="tab" title="welcome">
						  <span class="round-tabs one">
								  <i class="glyphicon glyphicon-home"></i>
						  </span> 
					  </a></li>
	
					  <li><a href="#profile" data-toggle="tab" title="profile">
						 <span class="round-tabs two">
							 <i class="glyphicon glyphicon-user"></i>
						 </span> 
			   </a>
					 </li>
					 <li><a href="#messages" data-toggle="tab" title="bootsnipp goodies">
						 <span class="round-tabs three">
							  <i><img src="../images/icons/humidity.png" ></i>
						 </span> </a>
						 </li>
	
						 <li><a href="#settings" data-toggle="tab" title="blah blah">
							 <span class="round-tabs four">
								  <i class="glyphicon glyphicon-comment"></i>
							 </span> 
						 </a></li>
	
						 <li><a href="#doner" data-toggle="tab" title="completed">
							 <span class="round-tabs five">
								  <i class="glyphicon glyphicon-ok"></i>
							 </span> </a>
						 </li>
						 
						 </ul></div>
	
						 <div class="tab-content">
						  <div class="tab-pane fade in active" id="home">
	
							  <h3 class="head text-center">Welcome to Bootsnipp<sup>™</sup> <span style="color:#f48260;">♥</span></h3>
							  <p class="narrow text-center">
								  Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
							  </p>
							  
							  <p class="text-center">
						<a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
					</p>
						  </div>
						  <div class="tab-pane fade" id="profile">
							  <h3 class="head text-center">Create a Bootsnipp<sup>™</sup> Profile</h3>
							  <p class="narrow text-center">
								  Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
							  </p>
							  
							  <p class="text-center">
						<a href="" class="btn btn-success btn-outline-rounded green"> create your profile <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
					</p>
							  
						  </div>
						  <div class="tab-pane fade" id="messages">
							
						  </div>
						  <div class="tab-pane fade" id="settings">
							  <h3 class="head text-center">Drop comments!</h3>
							  <p class="narrow text-center">
								  Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
							  </p>
							  
							  <p class="text-center">
						<a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
					</p>
						  </div>
						  <div class="tab-pane fade" id="doner">
								<div class="text-center">
								  <i class="img-intro icon-checkmark-circle"></i>
							  </div>
							  <h3 class="head text-center">thanks for staying tuned! <span style="color:#f48260;">♥</span> Bootstrap</h3>
							  <p class="narrow text-center">
								Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
							  </p>
						  </div>
						  <div class="clearfix"></div>
						</div>
	
			</div>

	</section>
                   
</div>

<script type="text/javascript" src="../lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../lib/chart/Chart.min.js"></script>
<script type="text/javascript" src="../lib/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript" src="../js/panelControl.js"></script>
</body>
</html>