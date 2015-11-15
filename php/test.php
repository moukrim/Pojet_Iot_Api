<?php
require ("plante.php");
	
	$plante = new plante('', 'cactus', 'Arduino1', '12' , '13', 'cactus');
	$res=$plante->add();
	
	if($res){
		echo'created';
	}

?>
