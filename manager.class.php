<?php

class manager {
function __construct($db){
		$this->setDB($db);
	}
	public function setDB(PDO $db){
		$this->_db = $db;
	}
	
}


?>