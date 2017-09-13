<?php
class serieManager /*extends manager*/{

	public function addSerie(Serie $serie){
		var_dump($series);

		try{
			$req = connexion::getInstance()->prepare('INSERT INTO serie(idExercice, idSeance,charge,rep) VALUES(:idExercice, :idSeance, :charge, :rep)');
			$req->bindValue(':idExercice',$serie->getIdExercice(),PDO::PARAM_INT);
			$req->bindValue(':idSeance',$serie->getIdSeance(),PDO::PARAM_INT);
			$req->bindValue(':charge',$serie->getCharge(),PDO::PARAM_INT);
			$req->bindValue(':rep',$serie->getRep(),PDO::PARAM_INT);

			$req->execute();
		}catch(PDOException $e){
			$log = fopen('serie.log','r+');
			fputs($log, $e);
			fclose($log);
		}
	}

	//Retourne une seule série
	public function getSerie($id){
		$req = connexion::getInstance()->query('SELECT * FROM serie WHERE id = '.$id);
		$donnee = $req->fetch(PDO::FETCH_ASSOC);
		return new serie($donnee);
	}

	public function getListSerie(){
		$req = connexion::getInstance()->query('SELECT * FROM serie');
		while($donnee = $req->fetch(PDO::FETCH_ASSOC)){
			$series[] = new serie($donnee);
		}
		return $series;
	}

}


?>