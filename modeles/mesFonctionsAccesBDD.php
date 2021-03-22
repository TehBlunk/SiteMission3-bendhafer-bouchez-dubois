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


function donneLesBiens($objetPdo)
{
        
        
	$pdoStat = $objetPdo->prepare('SELECT * FROM bien INNER JOIN TypeBien ON bien.type=TypeBien.id ;');

	$pdoStat->execute();

	$biens= $pdoStat->fetchAll();
	
	return $biens;
}
?>