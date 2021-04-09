<?php

function connexionBDD()
{
$bdd = 'mysql:host=localhost;dbname=bdd_immo';
$user ='groupe1';
$password = 'groupe1';
try {
   
    $ObjConnexion=new PDO($bdd,$user,$password,array(
           PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
 catch (PDOException $e)
 {
     echo $e->getMessage();
 }
return $ObjConnexion;
}

function deconnexionBDD($cnx)
{
    $cnx=null;
}

function recupDonnee($pdo,$ref){
    $pdoStat = $pdo->prepare('SELECT ref FROM bien WHERE ref=:ref');

    $bv1=$pdoStat->bindValue(':ref', $ref);

    $pdoStat->execute();
    $bien = $pdoStat->fetchAll();

    return $bien;
}

function modifierBien($PDO, $adresse, $prix, $type, $ref){
    $monObjPdoStatement=$PDO->prepare("UPDATE bien SET adresse=:adresse, prix=:prix, type=:type WHERE ref=:ref");
    $monObjPdoStatement->bindValue(':adresse',$adresse);
    $monObjPdoStatement->bindValue(':prix',$prix);
    $monObjPdoStatement->bindValue(':type',$type);
    $monObjPdoStatement->bindValue(':ref',$ref);
    $execution=$monObjPdoStatement->execute();
    return $execution;
}

?>
