<?php
class serie{
	private $_id;
	private $_idExercice;
	private $_nom;
	private $_idSeance;
	private $_rep;
	private $_charge;


	function __construct(array $donnees){
		$this->hydrate($donnees);
		$this->getExercice();
	}

	public function setId($id){
		$this->_id = (int)$id;
	}
	public function getId(){
		return $this->_id;
	}
	public function getIdExercice(){
		return $this->_idExercice;
	}
	public function setIdExercice($idExercice){
		$this->_idExercice = (int) $idExercice;
	}

	public function getExercice(){
		$manager = new exerciceManager();
		$this->_nom = $manager->get($this->_idExercice)->getNom();

	}
	public function getIdSeance(){
		return $this->_idSeance;
	}
	public function setIdSeance($idSeance){
		$this->_idSeance = (int) $idSeance;
	}

	public function getRep(){
		return $this->_rep;
	}
	public function setRep($rep){
		$this->_rep = (int)$rep;
	}


	public function getCharge(){
		return $this->_charge;
	}
	public function setCharge($charge){
		$this->_charge = (int)$charge;
	}

	public function addSerie(Serie $serie/*$exo,$rep,$poids*/){
		//$this->_series[count($this->_series)] = ['exo'=>$exo,
		//				'rep'=>$rep,
		//				'poids'=>$poids];

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