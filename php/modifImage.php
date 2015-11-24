<?php
require ("plante.php");
if(isset($_POST['nom'])&&isset($_POST['nomArduino'])&&isset($_POST['image'])){
	
	$nomPlante     = htmlentities($_POST['nom'], ENT_QUOTES);
	$nomArduino      = htmlentities($_POST['nomArduino'], ENT_QUOTES);
	$image   = $_POST['image'];

	
	$res=plante::modifImage($image,$nomPlante,$nomArduino);
	if($res){
		echo ('updated');
	}
}
?>
