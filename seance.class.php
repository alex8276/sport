<?php

class seance{
	private $_id;
	private $_date;
	private $_exercice;
	private $_poids;
	private $_series = array();

	function __construct(){
		echo "c est ta première séance";
	}

	public function getId(){	
		return $this->_id;
	}

	public function getDate(){	
		return $this->_date;
	}
	public function setDate($date){
		$this->_date = $date;
	}

	public function getExercice(){	
		return $this->_exercice;
	}
	public function setExercice($exo){
		$this->_exercice = $exo;
	}

	public function getPoids(){	
		return $this->_poids;
	}
	public function setPoids($poids){
		$this->_poids = $poids;
	}

	public function getSeries(){
		//for($i=0;$i<=count($this->_series;$i++)){

		//}
		return $this->_series;
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
