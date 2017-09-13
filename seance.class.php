<?php

class seance{
	private $_id;
	private $_date;
	private $_exercice;
	private $_series ;
	private $_series1 ;

	function __construct(array $donnees){
		$this->hydrate($donnees);
		if($this->_id == null){
			$manager = new seanceManager();
			$this->_id = $manager->recupIdSeance()['id']+1;
		}
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
	public function addSerie(serie $serie){
		$this->_serie[] = $serie;
		var_dump($serie);
	}
	public function getSeries(){
		$manager = new serieManager();
		$this->_series = $manager->getListSerie();
		return $this->_series;
	}
	/*public function getSeries(){
		return $this->_series;
	}*/


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
