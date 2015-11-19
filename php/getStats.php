<?php
require ("plante.php");


function getStats($nomArduino, $typeTemps){
$res = plante::selectStats($nomArduino,$typeTemps);
	$retourDay = array();
	$retourWeek = array();
	$c = count($res);
    if ($typeTemps == "1 DAY"){
		for ($i=0; $i < $c ; $i++) { 
		if(($i % 3) == 0)
			array_push($retourDay, $res[$i]);
			
		}
	}elseif($typeTemps == "7 DAY"){
		for ($i=0; $i < $c ; $i++) { 
		if(($i % 32) == 0)
			array_push($retourWeek, $res[$i]);
			
		}
			
	}else{
		echo json_encode($res);
	}
	
	if(count($retourDay) > 0)
		echo json_encode($retourDay);
	if(count($retourWeek) > 0)
		echo json_encode($retourWeek);	
	
}


if(!empty($_POST["typeTemps"]) && !empty($_POST["nomArduino"]) ){
	if($_POST["typeTemps"] == "hour")
		getStats($_POST["nomArduino"], "6 HOUR");
	else if($_POST["typeTemps"] == "day")
		getStats($_POST["nomArduino"], "1 DAY");
	else if($_POST["typeTemps"] == "week"){
		getStats($_POST["nomArduino"], "7 DAY");
	}	
}
