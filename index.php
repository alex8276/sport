<?php
function chargerClasse($classe){
	require_once $classe.'.class.php';
}
spl_autoload_register('chargerClasse');


$db = new PDO('mysql:host=localhost;dbname=sport', 'root', 'azerty');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

$s = new seance;
$t='developpé couché';
$s->setExercice($t);
$s->setPoids(150);
$exs = array(1,2);

//var_dump($s);
echo '<br> Tu as fais du '.$s->getExercice().' à '.$s->getPoids().' le '.date('d/m/Y H:i:s').'<br>';

//$s->addSerie(1,10,100);
//$s->addSerie(1,10,110);
//for($i=0;$i<3;$i++){
//$s->addSerie(2,$i+5,100);
//}
//$i = new serie();

//$manager = new manager($db);		
$test = new serieManager($db);
//$test->addSerie($i);
$toto = $test->getSerie(1);

var_dump($toto);

$r = $toto->getExercice();
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
