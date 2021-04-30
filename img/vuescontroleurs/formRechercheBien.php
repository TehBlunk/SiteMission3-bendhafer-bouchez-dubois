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
            
            <select name="type" id="type">                 
                <option value=''>---</option>                 
                <option value=1>Maison</option>                 
                <option value=2>Appartement</option>                 
                <option value=5>Immeuble</option>                 
                <option value=3>Local</option>                 
                <option value=4>Terrain</option>             </select>

                        
   
		 <h2 class="titre">
                     Liste des biens
                     </h2>
		<ul >

			<?php 
                       
                        foreach ($listeBien as $bien){?>
                        
                            <li>
                         
					<?php echo $bien['ref'].' '.$bien['libelle'] .' de '. $bien['adresse'] . ' à '. $bien['prix'];
                                       $listeImage= recupererLesImages($lePdo, $bien['ref']);?>
                                       <div class="product-image"> 
                                               
                                        <?php  
                                                                 
                                        
                                            echo '<a href="biens.php?ref='.$bien['ref'].'"><img src = "../img/'.$listeImage[0]['numeroBien'] .'-'. $listeImage[0]['numero'] .'.'. $listeImage[0]['extension'].'"></a>';?>
                           </div> 
                            </li>        
				
                        <?php } ?> 
                        
                    
                </ul>
		</body>
		
		
		
</html>