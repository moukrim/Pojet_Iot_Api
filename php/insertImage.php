<?php
require ("database.php");
if(isset($_POST['image'])){
	
    $dataBase = new dataBase('iot');

	$res = $dataBase->prepare("INSERT Into images (id, image) VALUES (:id, :image)",
	 array(
		'id' => '',
		'image'=> $_POST['image']
	
	));
    
	if($res){
		echo'insred';
	}
}

?>