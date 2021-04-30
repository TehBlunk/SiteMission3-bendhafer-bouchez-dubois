<?php
//on insère le fichier qui contient les fonctions
include_once '../modeles/mesFonctionsAccesBDD.php';

//appel de la fonction qui permet de se connecter à la base de données
$lePdo = connexionBDD();
$type=2;
$tranche=300000;
$surface=200;
$nbpiece=5;
$jardin='sans';
$listeImages= donneLesBiensType($lePdo, $type,$tranche,$surface,$nbpiece,$jardin);


//var_dump permet d'afficher le contenu d'un objet. Utilisable uniquement lors de test de validation
var_dump($lePdo);
var_dump($listeImages);