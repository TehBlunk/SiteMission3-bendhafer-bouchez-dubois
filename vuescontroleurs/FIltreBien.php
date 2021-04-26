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
	  <div class="filtre">
	  <?php include_once '../inc/menu.inc';
          if(isset($_GET["type"])&& isset($_GET["tranche"])==10){
              $type=$_GET["type"];
              $tranche=200000;
          
              
             $listeBien= donneLesBiensType($lePdo, $type,$tranche);
             

          }
          elseif(isset($_GET["type"])&& isset($_GET["tranche"])==20){
              $type=$_GET["type"];
              $tranche=300000;
              
              
             $listeBien= donneLesBiensType($lePdo, $type,$tranche);
             
          }
           elseif(isset($_GET["type"])&& isset($_GET["tranche"])==30){
              $type=$_GET["type"];
              $tranche=400000;
              
              
             $listeBien= donneLesBiensType($lePdo, $type,$tranche);
             
          }
           elseif(isset($_GET["type"])&& isset($_GET["tranche"])==40){
              $type=$_GET["type"];
              $tranche=500000;
              
              
             $listeBien= donneLesBiensType($lePdo, $type,$tranche);
             
          }
           elseif(isset($_GET["type"])&& isset($_GET["tranche"])==50){
              $type=$_GET["type"];
              $tranche=1000000;
              
              
             $listeBien= donneLesBiensType($lePdo, $type,$tranche);
             
          }
          else{
              $listeBien= donneLesBiens($lePdo);
          }
          ?>
           
        
          <form action="" methode="GET">
            <select name="tranche" id="tranche">                 
                <option value="">Prix</option>                 
                <option value=10>100 000 € à 200 000 € </option>                 
                <option value=20>200 000 € à 300 000 €</option>                 
                <option value=30>300 000 € à 400 000 €</option>                 
                <option value=40>400 000 € à 500 000 €</option>                 
                <option value=50>500 000 € à 1 000 000 €</option>             </select>
        
             <form action="" methode="GET">
            <select name="type" id="type">                 
                <option value="">Type</option>                 
                <option value=1>Maison</option>                 
                <option value=2>Appartement</option>                 
                <option value=5>Immeuble</option>                 
                <option value=3>Local</option>                 
                <option value=4>Terrain</option>             </select>
                   
                 <form action="" methode="GET">
            <select name="surface" id="surface">                 
                <option value="">Surface</option>                 
                <option value=100> 100m²</option>                 
                <option value=150> 150m²</option>                 
                <option value=200>200m²</option>                 
                <option value=250>250m²</option>                 
                <option value=300>300m²</option>             </select>
               <form action="" methode="GET">
            <select name="piece" id="piece">                 
                <option value="">Nombre de piece</option>                 
                <option value=5>5 pieces </option>                 
                <option value=6>6 pieces</option>                 
                <option value=7>7 pieces</option>                 
                <option value=8>8 pieces</option>                 
                <option value=9>9 pieces</option>             </select>
             <form action="" methode="GET">
            <select name="jardin" id="jardin">                 
                <option value="">Jardin</option>                 
                <option value=1>Avec</option>                 
                <option value=2>Sans</option>                 
               
            <input type="submit" value="rechercher">                
        </form>
          </div>
		 <h2 class="titre">
                     Liste des biens 
                     </h2>
		<ul >

			<?php 
                       
                        foreach ($listeBien as $bien){?>
                        
                            <li>
                         
					<?php echo $bien['ref'].' '.$bien['libelle'] .' de '. $bien['adresse'] . ' à '. $bien['prix'].' € de ' .$bien['surface']. ' m² avec '.$bien['nbpiece']. ' pieces '.$bien['jardin'].' jardin.' ;
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