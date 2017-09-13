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


$se = new seanceManager();//Insere la nouvelle seance puis récup l'id qu'on passe a la boucle qui ajoiute les sseries
$se1 = $se->get(1);
$se1->addSerie(new serie(array('idSeance'=>1, 'idExercice'=>1,'charge'=>90, 'rep'=>20)));
$se1->addSerie(new serie(array('idSeance'=>1, 'idExercice'=>2,'charge'=>100, 'rep'=>20)));

var_dump($se1->getSeries());
var_dump($se->recupIdSeance());
echo('<h1>num de seance: '.$se->recupIdSeance()['id'].' </h1>');
$seance2 = new seance(array('date'=>'2017-08-21'));
var_dump($seance2);
/*var_dump($ser);
$test->addSerie($ser);*/

/*$se1->getSeries();
$se2 = $se1->getExercice();
var_dump($se1);*/

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
