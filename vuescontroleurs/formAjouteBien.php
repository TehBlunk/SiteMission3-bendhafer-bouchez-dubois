<?php

function connexionBDD() {
    $bdd = 'mysql:host=localhost;dbname=agence';
    $user = 'SIO1BDD';
    $password = 'sio1';
    try {
        $ObjConnexion = new PDO($bdd, $user, $password, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $e) {

        echo $e->getMessage();
    }return $ObjConnexion;
}

function deconnexionBDD($cnx) {
    $cnx = null;
}
//----------------------------------------------------------------------

function ajouteBien($objetPDO, $ref, $adresse, $type, $prix){

    $pdoStat = $objetPDO->prepare('INSERT INTO bien (ref,prix,type,adresse) VALUES (:ref, :prix, :type, :adresse)');


        $pdoStat->bindValue (':ref', $ref);
        $pdoStat->bindValue (':adresse', $adresse);
        $pdoStat->bindValue (':type', $type);
        $pdoStat->bindValue (':prix', $prix);


$insertIsOk = $pdoStat->execute();

var_dump($insertIsOk);

if($insertIsOk==true){

    $message ='Le bien a été ajouté dans la bdd';

}

else{
    $message = 'Echec de l\'ajout';
}

return $message;
}
?>
<HTML>
    <body>
    <hl>
        <form action="../tests/testFonctionAjouter.php" method="post">
            <p>
                <label for="reference">Reference</label>
                <input type="int" id="ref" name="ref">
            </p>
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse">
            <p>
            
                <label for="type">Type</label>
                <input type="int" id="type" name="type">
            </p>
            <p>
                <label for="prix">Prix</label>
                <input type="int" id="prix" name="prix">
            </p>
    </hl>
    <input type="submit" id='submit' value='Valider'>
    </body>
</HTML>
