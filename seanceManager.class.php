<?php
class seanceManager extends manager{
	/*private $_db;

	public __construct($db){
		$this->setDb($db);
	}
	public function setDb(PDO $db){
		$this->_db = $db
	}*/

	public function get($id){
		$req = $this->_db->query('SELECT * FROM seance
			WHERE id = '.$id);
		$donnee = $req->fetch(PDO::FETCH_ASSOC);

		return new seance($donnee);
	}

}




?>