<?php
require ("plante.php");
if(isset($_GET['nA'])&&isset($_GET['nP'])&&isset($_GET['l'])&&isset($_GET['h'])&&isset($_GET['i'])){
	
	$nomArduino      = htmlentities($_GET["nA"], ENT_QUOTES);
	$nomPlante      = htmlentities($_GET["nP"], ENT_QUOTES);
	$luminosite    = intval($_GET["l"]);
	$humidite    = intval($_GET["h"]);
	$image    = htmlentities($_GET["i"], ENT_QUOTES);
	
	$plante = new plante('', $nomPlante, $nomArduino, $humidite , $luminosite, $image);
	$res=$plante->add();
	
	if($res){
		echo'created';
	}
}
?>

