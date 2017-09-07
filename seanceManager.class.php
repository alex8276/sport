<?php
class seanceManager extends manager{

	public function get($id){
		$req = connexion::getInstance()->query('SELECT * FROM seance
			WHERE id = '.$id);
		$donnee = $req->fetch(PDO::FETCH_ASSOC);

		return new seance($donnee);
	}

}




?>