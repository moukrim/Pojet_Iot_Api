<?php
require ("plante.php");

function getStats($nomArduino, $typeTemps){
$res = plante::selectStats($nomArduino,$typeTemps);
	$retour = array();
	
	$c = count($res);
    if ($typeTemps == "1 DAY"){
		for ($i=0; $i < $c ; $i++) { 
		if(($i % 3) == 0)
			array_push($retour, $res[$i]);
		}
	}else{
		echo json_encode($res);
	}
	
	if(count($retour) > 0)
		echo json_encode($retour);
	
}
/*
function getTempFocus($nom, $typeTemps, $focus){
	
	$focus = "'%".$focus.":00%'";
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=projet_temp', 'root', 'root'); 
	$tab = "temperatures";
	$sql = "SELECT temperature_salle, datePost, batterie FROM temperatures WHERE datePost > DATE_SUB( NOW() , INTERVAL 30 DAY ) AND DATE_FORMAT(datePost, '%H:%i') like $focus AND nom_salle = :nom";
	$req = $pdo->prepare($sql); 
	$req->bindParam(":nom", $nom);
	$req->execute();
	$row = $req->fetchall(PDO::FETCH_ASSOC);
	echo json_encode($row);
}*/

if(!empty($_POST["typeTemps"]) && !empty($_POST["nomArduino"]) ){
	if($_POST["typeTemps"] == "hour")
		getStats($_POST["nomArduino"], "6 HOUR");
	else if($_POST["typeTemps"] == "day")
		getStats($_POST["nomArduino"], "1 DAY");
	/*else if($_GET["typeTemps"] == "month" && isset($_GET["foc"])){
		getTempFocus($_GET["nom"], "30 DAY", $_GET["foc"]);
	}	*/
}
