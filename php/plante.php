<?php
require ("database.php");

class plante{

	private $id;
	private $nom;
	private $nomArduino;
	private $valHum;
	private $valLum;
	private $image;
	public static $nb=0;


	public function __construct($id, $nom, $nomArduino, $valHum, $valLum, $image){
	
		$this->id= $id;
		$this->nom= $nom;
		$this->nomArduino =$nomArduino;
		$this->valHum= $valHum;
		$this->valLum= $valLum;
		$this->image= $image;
		self::$nb++;

	}

	public function add(){

		$dataBase = new dataBase('iot');
		
		$res = $dataBase->prepare("INSERT Into plante (id, nom, nomArduino, valHum, valLum, date, image) VALUES (:id, :nom, :nomArduino, :valHum, :valLum, :date, :image)",
	 array(
		'id' => $this->id,
		'nom'=> $this->nom,
		'nomArduino'=> $this->nomArduino,
		'valHum'=> $this->valHum,
		'valLum'=> $this->valLum,
		'date'=> date("Y-m-d H:i:s"),
		'image'=> 'images/image-plante/'.$this->image
	
	));

		return $res;
	}
	
	public static function select(){

		$dataBase = new dataBase('iot');
		
		$res = $dataBase->query("SELECT DISTINCT nom, image, nomArduino FROM plante");
                  
				  
		return $res;
		
	}
	
	public static function selectStats($nomArduino, $typeTemps){

		$dataBase = new dataBase('iot');
		
		$res = $dataBase->prepareSelect("SELECT valHum, valLum, date FROM plante WHERE (nomArduino= :nomArduino And date >  DATE_SUB( NOW() , INTERVAL $typeTemps ) )",
										
		array(
			  'nomArduino' => $nomArduino
			  ));
                  
				  
		return $res;
		
	}


	public function getId(){
		return $this->id;
	}
	public function getNom(){
		return $this->nom;
	}
	public function getNomArduino(){
		return $this->nomArduino;
	}
	public function getValHum(){
		return $this->valHum;
	}
	public function getValLum(){
		return $this->valLum;
	}
	public function getImage(){
		return $this->image;
	}


	public function setId($id){
		$this->id= $id;
	}
	public function setNom($nom){
		$this->nom= $nom;
	}
	public function setNomArduino($nomArduino){
		$this->nomArduino= $nomArduino;
	}
	public function setValHum($valHum){
		$this->valHum= $valHum;
	}
	public function setValLum($valLum){
		$this->valLum= $valLum;
	}
	public function setImage($image){
		$this->image= $image;
	}


}