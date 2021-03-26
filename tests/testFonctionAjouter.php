<?php
//on insère le fichier qui contient les fonctions
include_once '../modeles/mesFonctionsAccesBDD.php';

//appel de la fonction qui permet de se connecter à la base de données
$lePdo = connexionBDD();

$ref= $_POST['ref'];
$adresse= $_POST['adresse'];
$type= $_POST['type'];
$prix= $_POST['prix'];

$test = ajouteBien($lePdo, $ref, $adresse, $type, $prix);
        
//var_dump permet d'afficher le contenu d'un objet. Utilisable uniquement lors de test de validation
var_dump($test);