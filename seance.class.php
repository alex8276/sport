<?php

class seance{
	private $_id;
	private $_date;
	private $_exercice;
	private $_poids;
	private $_series ;

	function __construct(array $donnees){
		$this->hydrate($donnees);
	}

	public function getId(){	
		return $this->_id;
	}
	public function setId($id){
		$this->_id = (int)$id;
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

	/*public function getSeries(){
		//for($i=0;$i<=count($this->_series;$i++)){

		//}
		return $this->_series;
	}*/

	public function getSeries(){
		$db = new PDO('mysql:host=localhost;dbname=sport', 'root', 'azerty');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$manager = new serieManager($db);
		$this->_series = $manager->getSerie($this->_id);
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
