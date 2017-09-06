<?php
class seanceManager{
	private $_db;

	public __construct($db){
		$this->setDb($db);
	}
	public function setDb(PDO $db){
		$this->_db = $db
	}

	public function get($id){
		$req = $this->_db->query('SELECT s.*,e.*,se.* FROM seance s
			INNER JOIN serie se ON s.id = se.idSeance
			INNER JOIN exercice e ON e.id = se.idExercice
			WHERE s.id = '.$id);
		$donnee = $req->fetch(PDO::FETCH_ASSOC);

		return new seance($donnee);
	}

}




?>