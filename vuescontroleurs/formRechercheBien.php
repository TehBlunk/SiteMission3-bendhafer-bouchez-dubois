<?php
//on insère le fichier qui contient les fonctions
include_once '../modeles/mesFonctionsAccesBDD.php';

//appel de la fonction qui permet de se connecter à la base de données
$lePdo = connexionBDD();
$listeBien=donneLesBiens($lePdo);
?>
<!DOCTYPE html>
<html lang="fr">
   <!-- En-tête -->
    <head>
        <meta http-equiv="content-type" content="text/html"; charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site agence</title>
    
        <link rel="stylesheet" href="../css/StyleProjet.css"  type="text/css"/>
		 
		 
		 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
     </head>
	 <!-- Corps -->
    <body>
	  
	  <?php include_once '../inc/menu.inc';?>
         
		 <h2 class="titre">
                     Liste des biens
                     </h2>
		<ul >
			<?php foreach ($listeBien as $bien):?>
                     <li id="liste">
					<?php echo $bien['ref'].' '.$bien['libelle'] .' de '. $bien['adresse'] . ' à '. $bien['prix']; ?>
					
				</li>
			<?php endforeach; ?>
                </ul>
		</body>
		
		
		
		</html>