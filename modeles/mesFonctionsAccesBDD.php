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
        
        
	$pdoStat = $objetPdo->prepare('SELECT * FROM bien INNER JOIN TypeBien ON bien.type=TypeBien.id;');

	$pdoStat->execute();

	$biens= $pdoStat->fetchAll();
	
	return $biens;
}
function donneLesBiensType($objetPdo,$type,$tranche,$surface,$nbpiece,$jardin)
{
        
        
	$pdoStat = $objetPdo->prepare('SELECT * FROM bien INNER JOIN TypeBien ON bien.type=TypeBien.id WHERE bien.type=:type AND prix<=:tranche AND surface>:suface AND nbpiece<:nbpiece AND jardin=:jardin;');
        $pdoStat->bindValue(':type',$type);
        $pdoStat->bindValue(':tranche',$tranche);
        $pdoStat->bindValue(':surface',$surface);
        $pdoStat->bindValue(':nbpiece',$nbpiece);
        $pdoStat->bindValue(':jardin',$jardin);
	$pdoStat->execute();

	$biens= $pdoStat->fetchAll();
	
	return $biens;
}
function recupererLesImages($objetPdo,$id){
    
    $pdoStat= $objetPdo->prepare('SELECT * FROM image where numeroBien=:biencherche');
    $bvc1=$pdoStat->bindValue(':biencherche',$id);
    $execution=$pdoStat->execute();
    $images=$pdoStat->fetchAll();
    
    return $images ;    
}
function recupererImagePrecise($objetPdo,$id){
    
    $pdoStat= $objetPdo->prepare('SELECT * FROM image where bien.ref=:biencherche');
    $bvc1=$pdoStat->bindValue(':biencherche',$id);
    $execution=$pdoStat->execute();
    $images=$pdoStat->fetchAll();
    
    return $images ;    
}
function connexionUser($objConnexion, $login, $passe) {
    $monObjPdoStatement = $objConnexion->prepare("select passe from utilisateur where login = :login");
    $bvc1 = $monObjPdoStatement->bindValue(':login', $login);

    var_dump($bvc1);

    $tab = $monObjPdoStatement->execute();
    $test = $monObjPdoStatement->fetchAll();
    $monObjPdoStatement->closeCursor();


    if (sizeof($test) == 0) {
        return false;
    } else {
        $passe_hash = $test[0]['passe'];
        if (password_verify($passe, $passe_hash)) {
            return true;
        } else {
            return false;
        }
    }
}
?>