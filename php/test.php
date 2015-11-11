<?php

	if(isset($_GET['s'])&&isset($_GET['l'])&&isset($_GET['h'])){


	$host = '127.0.0.1'; 
	$user = 'root'; 
	$pass = ''; 

	// On récupère les valeurs du formulaire
	$salle = $_GET ['s']; 
	$luminosite = intval($_GET ['l']); 
	$humidite = intval($_GET ['h']); 
	


	$link=@mysql_connect ($host,$user,$pass);
	if (!$link) {
		die ('Erreur de connection au serveur '.mysql_error() ) ;
	}

	$db=mysql_select_db('test');
	if (!$db) {
		die ('Impossible de sélectionner la base de données : ' . mysql_error());
		}

	//Tables
	$table=mysql_query("Insert Into arduino (id, nom, luminosite, humidite) values ('', '$salle','$luminosite','$humidite')");
	if ($table){
		echo 'registred';
	}
}

/*
	if(isset($_POST['s'])&&isset($_POST['l'])&&isset($_POST['h'])){


	$host = '127.0.0.1'; 
	$user = 'root'; 
	$pass = ''; 

	// On récupère les valeurs du formulaire
	$salle = $_POST ['s']; 
	$luminosite = intval($_POST ['l']); 
	$humidite = intval($_POST ['h']); 
	


	$link=@mysql_connect ($host,$user,$pass);
	if (!$link) {
		die ('Erreur de connection au serveur '.mysql_error() ) ;
	}

	$db=mysql_select_db('test');
	if (!$db) {
		die ('Impossible de sélectionner la base de données : ' . mysql_error());
		}

	//Tables
	$table=mysql_query("Insert Into arduino (id, nom, luminosite, humidite) values ('', '$salle','$luminosite','$humidite')");
	if ($table){
		echo 'registred';
	}
}*/