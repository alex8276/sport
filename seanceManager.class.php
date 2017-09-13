<?php
class seanceManager extends manager{

	public function get($id){
		$req = connexion::getInstance()->query('SELECT * FROM seance
			WHERE id = '.$id);
		$donnee = $req->fetch(PDO::FETCH_ASSOC);

		return new seance($donnee);
	}

	public function add(seance $seance){
		$req = connexion::getInstance()->prepare('INSERT INTO seance (dateSeance) values (:dateSence)');

		$req->bindValue('dateSeance', $seance->getDate());
		$req->execute();
	}

	public function RecupIdSeance(){
		$req= connexion::getInstance()->query('SELECT MAX(id) id FROM seance ');
		$donnée = $req->fetch(PDO::FETCH_ASSOC);

		return $donnée;
	}

}




?>