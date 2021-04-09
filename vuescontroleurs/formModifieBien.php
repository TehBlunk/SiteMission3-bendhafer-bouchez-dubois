
<select name="type" id="type">
                <option value=""> <3 </option>
<?php
include_once '../modeles/mesFonctionsAccesBDD.php';
$lePdo = connexionBDD();
$biens = donneLesBiens($lePdo);
foreach ($biens as $Bien){
    echo '<option value="">'.$Bien['ref'].'</option>';
}
?>
                

<!--echo '<br><label for="adresse" title="Saisir l\'adresse du bien" id="text">Adresse :</label>
    <input type="text" name="adresse" id="adresse" title="Saisir l\'adresse du bien" value="' . $recupRequete[0]['adresse'] . '"required />';--!>
