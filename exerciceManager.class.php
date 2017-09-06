<?php
class exerciceManager extends manager{
	/*private $_db;


	function __construct($db){
		$this->setDB($db);
	}

	public function setDB(PDO $db){
		$this->_db = $db;
	}*/

	public function get($id){
		$req = $this->_db->query('SELECT * FROM exercice WHERE id = '.$id);
		$donnee = $req->fetch(PDO::FETCH_ASSOC);
		var_dump($donnee);
		return new exercice($donnee);
	}
}



?>