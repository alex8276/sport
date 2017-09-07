<?php
function chargerClasse($classe){
	require_once $classe.'.class.php';
}
spl_autoload_register('chargerClasse');


//$db = connexion::getInstance();

//var_dump($db);


$manager = new manager();		
$test = new serieManager();
//$test->addSerie($i);
$toto = $test->getSerie(1);


$se = new seanceManager();
$se1 = $se->get(1);
$se1->getSeries();
//$se2 = $se1->getExercice();
//echo $se2->merde();
var_dump($se1);
//echo $r->getNom();
//var_dump($s->getSeries());
//$tab = $s->getSeries();

/*foreach($exs as $ex){
	echo '<h3>Tu réalises l\'exo '.$ex.'</h3>';
	for($i=0;$i<count($tab);$i++){
		if($tab[$i]['exo'] == $ex){
		echo "Serie 1 de l'exo ".$tab[$i]['exo']." rep = ".$tab[$i]['rep'] ." x ".$tab[$i]['poids']." !! <br>";
		}
		
	}
}*/


?>
