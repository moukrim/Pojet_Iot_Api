<?php


class dataBase{

	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;


	public function __construct($db_name, $db_user='root', $db_pass='', $db_host='localhost'){

			$this->db_name = $db_name;
			$this->db_user = $db_user;
			$this->db_pass = $db_pass;
			$this->db_host = $db_host;

	}

	public function getPDO(){

		if($this->pdo === null){
		$pdo = new PDO('mysql:dbname='.$this->db_name.';host='.$this->db_host.'', $this->db_user,$this->db_pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->pdo = $pdo;
	}
		return $this->pdo;

	}	

	public function query($statement, $one = false){

		$req = $this->getPDO()->query($statement);
		$req->setFetchMode(PDO::FETCH_OBJ);
	if($one){

		$data = $req->fetch();
	}else{
		$data = $req->fetchAll();
	}

		return $data;

	}

	public function prepareSelect($statement, $attributes, $one = false)
{
	$req = $this->getPDO()->prepare($statement);
	$req->execute($attributes);
	$req->setFetchMode(PDO::FETCH_OBJ);
	if($one){

		$datas = $req->fetch();
	}else{
		$datas = $req->fetchAll();
	}

	return $datas;
}

public function prepare($statement, $attributes)
{
	$req = $this->getPDO()->prepare($statement);
	$retour= $req->execute($attributes);
	return $retour;
}
/*
public function query($statement){

		$req = $this->getPDO()->query($statement);

	}*/

}	



