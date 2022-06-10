<?php
include_once dirname(dirname(__FILE__)) .'/Models/utilisateur.php';
include_once dirname(dirname(__FILE__)) .'/Models/capacite.php';
include_once dirname(dirname(__FILE__)) .'/Models/match.php';
include_once dirname(dirname(__FILE__)) .'/Models/orientation.php';
include_once dirname(dirname(__FILE__)) .'/Models/personnage.php';
include_once dirname(dirname(__FILE__)) .'/Models/poste.php';
include_once dirname(dirname(__FILE__)) .'/Models/poule.php';
include_once dirname(dirname(__FILE__)) .'/Models/race.php';
include_once dirname(dirname(__FILE__)) .'/Models/type_match.php';
 
$testUtilisateur = new Utilisateur("Cucumberbatch", "cucumber@batch.fr","passw0rd", "compte premium");
var_dump($testUtilisateur);

echo "<br>";
echo "<br>";

$testCapacite = new Capacite("Jambes engourdies", "Magie", 15, "Ralentissement", 6);
var_dump($testCapacite);

echo "<br>";
echo "<br>";

$testMatch = new Match("1", "109", "54");
var_dump($testMatch);

echo "<br>";
echo "<br>";

$testOrientation = new Orientation("1", "Libéro");
var_dump($testOrientation);

echo "<br>";
echo "<br>";

$testPersonnage = new Personnage("Billy Butcher", 1);
var_dump($testPersonnage);

echo "<br>";
echo "<br>";

$testPoste = new Poste("Défenseur");
var_dump($testPoste);

echo "<br>";
echo "<br>";

$testPoule = new Poule("Bronze II", 1, 3, 4);
var_dump($testPoule);

echo "<br>";
echo "<br>";

$testRace = new Race("Elfe");
var_dump($testRace);

echo "<br>";
echo "<br>";

$testTypeMatch = new TypeMatch("Compétitif", 15, 1);
var_dump($testTypeMatch);

?>