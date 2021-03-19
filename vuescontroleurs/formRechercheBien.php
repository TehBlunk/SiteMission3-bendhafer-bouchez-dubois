<?php

$objetPdo = new PDO('mysql:host=localhost;dbname=bdd_immo','group1','groupe1');

$pdoStat = $objetPdo->prepare('SELECT * FROM bien INNER JOIN TypeBien ON bien.ref=TypeBien.id ;');

$executeIsOk = $pdoStat->execute();

$biens= $pdoStat->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
   <!-- En-tête -->
    <head>
        <meta http-equiv="content-type" content="text/html"; charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site agence</title>
    
	     <link rel="stylesheet" href="css/StyleProjet.css"  type="text/css"/>
		 
		 
		 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
     </head>
	 <!-- Corps -->
    <body>
	  
	    <header role="header"/>
		
		   <nav class="menu" role="navigation"/>
		     <div class="m-right">
			    <h1 class ="logo">AGENCE</h1>
			</div>
			<div class="m-left">
			   <a href="Accueil.html"class="m-link"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
			   <a href="Acheter.html"class="m-link"><i class="fa fa-paste" aria-hidden="true"></i> Acheter</a>
			   <a href="Page 3.html"class="m-link"><i class="fa fa-info-circle" aria-hidden="true"></i> Contact</a>
			</div>
	       </nav>
		   
		</header>
		<h2>Liste des biens<h2>
		<ul>
			<?php foreach ($biens as $bien):?>
				<li>
					<?= $bien['libelle'] ?> de <?= $bien['adresse'] ?> <?=  $bien['prix'] ?>
					
				</li>
			<?php endforeach; ?>
		
		</body>
		
		
		
		</html>