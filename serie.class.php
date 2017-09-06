<?php
class serie{
	private $_id;
	private $_idExercice;
	private $_idSeance;
	private $_rep;
	private $_charge;


	function __construct(array $donnees){
		/*$this->_id = 1;
		$this->_idExercice = 1;
		$this->_idSeance = 1;
		$this->_reps = 10;
		$this->_charge = 100;*/
		$this->hydrate($donnees);
	}
	public function getIdExercice(){
		return $this->_idExercice;
	}
	public function setIdExercice($idExercice){
		$this->_idExercice = (int) $idExercice;
	}

	public function getExercice(){
		$db = new PDO('mysql:host=localhost;dbname=sport', 'root', 'azerty');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$manager = new exerciceManager($db);
		return $manager->get($this->_idExercice);
		
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