<?php

function connexionBDD()
{
$bdd = 'mysql:host=localhost;dbname=bdd_immo';
$user ='groupe1';
$password = 'groupe1';
 $sLogin = htmlspecialchars($_POST['login']);
 $sPassword = htmlspecialchars($_POST['password']);
 
 // On établit la connexion
 $connection = new mysqli($servername, $username, $password);
 // On vérifie la connexion
 if( $connection->connect_error ){
    die('Echec de la connexion &agrave; la base de donn&eacute;es');
 }

switch ( verifieAuthentification( $connection, $login, $password ) ) {
    case 0 :
        echo 'Echec de la connexion : login et/ou password incorrects';
        break;
    case 1 :
        die('Echec de la requete SQL');
        break;
    case 2 :
        echo 'Connexion r&eacute;ussie';       
        break;
}

$connection->close();

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

function verifieAuthentification($connection, $login, $password) {
    $iReturn = 0;

    // On vérifie que les saisies des champs login et password ne sont pas vides       
    if ( strlen($login) > 0 && strlen($password) > 0 ) {
        
        $sqlSelect  = "SELECT login,password FROM utilisateurs";
        $sqlSelect .= "WHERE login='$login' AND password=MD5('$password')";
            
        // On execute la requete sql
        if ( !($result = $connection->query($sqlSelect)) ) {
            $iReturn = 1;
        } else {
            $row = $result->fetch_assoc();
            if ( $row['login'] == $login && $row['password'] == md5($password) ) {
                $iReturn = 2;    
            }         
        }
    }

    return $iReturn;
 }
?>
