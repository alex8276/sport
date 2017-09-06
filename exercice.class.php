<?php

class exercice extends manager{

	private $_id;
	private $_nom;

	function __construct(array$donnee){
		$this->hydrate($donnee);
	}

	public function getId(){
		return $this->_id;
	}
	public function setId($id){
		$this->_id = (int)$id;
	}

	public function getNom(){
		return $this->_nom;
	}
	public function setNom($nom){
		if(is_string($nom) && strlen($nom) <= 30){
			$this->_nom = $nom;
		}
	}





	#Initialisation d'un objet
	public function hydrate (array $donnée){
		foreach ($donnée as $key => $value){
			$method = 'set'.ucfirst($key); #première lettre en majuscule

			if (method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}




}


?>