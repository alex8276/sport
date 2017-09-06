<?php
class serieManager extends manager{
	//private $_db;


	/*function __construct($db){
		$this->setDB($db);
	}
	public function setDB(PDO $db){
		$this->_db = $db;
	}*/

	public function addSerie(Serie $serie){
		var_dump($series);

		try{
			$req = $this->_db->prepare('INSERT INTO serie(idExercice, idSeance,charge,rep) VALUES(:idExercice, :idSeance, :charge, :rep)');
			$req->bindValue(':idExercice',$serie->getIdExercice(),PDO::PARAM_INT);
			$req->bindValue(':idSeance',$serie->getIdSeance(),PDO::PARAM_INT);
			$req->bindValue(':charge',$serie->getCharge(),PDO::PARAM_INT);
			$req->bindValue(':rep',$serie->getReps(),PDO::PARAM_INT);

			$req->execute();
		}catch(PDOException $e){
			$log = fopen('serie.log','r+');
			fputs($log, $e);
			fclose($log);
		}
	}

	//Retourne une seule série
	public function getSerie($id){
		$req = $this->_db->query('SELECT * FROM serie WHERE id = '.$id);
		$donnee = $req->fetch(PDO::FETCH_ASSOC);
		//var_dump($donnee);

		return new serie($donnee);
	}

	public function getListSerie(){
		$req = $this->_db->query('SELECT s.*, e.* FROM serie s INNER JOIN exercice e ON s.idExercice = e.id ');

		while($donnee = $req->fetch(PDO::FETCH_ASSOC)){
			$series = new serie($donnee);
		}

		return $series;
	}

}


?>