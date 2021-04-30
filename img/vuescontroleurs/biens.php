<?php
//on insère le fichier qui contient les fonctions
include_once '../modeles/mesFonctionsAccesBDD.php';

//appel de la fonction qui permet de se connecter à la base de données
$lePdo = connexionBDD();



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
<body>
	  
	  <?php include_once '../inc/menu.inc';?>
    <div class="contenu">
		<div id="slider" class="produit">
                    
		<div  id="precedent" onclick="ChangeSlide(-1)"><img src="fleche-gauche.gif"></div>
                <?php
                if (isset($_GET['ref'])){ // on vérifie qu’un id est bien passé en GET (dans l’URL)
                     $ref=$_GET['ref'];
                        echo  "Affichage du bien d'identifiant $ref";
}
                    $images= recupererLesImages($lePdo, $ref);
                foreach($images as $image):
                    ?>
                
		 <img  src="../img/'<?=$image['numeroBien']?>-<?=$image['numero']?>.<?=$image['extension']?>" id="slide"></img>
		 <?php endforeach; ?>
		  <div style="position:absolute;top:400px;right:200px; width:1110px; height:100px; z-index:2;font-size:200%;color:#3498db">
      <center><b></b></center>
    </div> 
	 <div id="suivant" onclick="ChangeSlide(1)"><img src="fleche-droite.gif"></div>
   </div>
    
    
    
    

</body>
<script type="text/javascript">

	var slide = new Array("Maison2-1.jpg", "Maison2-2.jpg", "Maison2-3.jpg", "Maison2-4.jpg");
	var numero = 0;

	function ChangeSlide(sens) {
		numero = numero + sens;
		if (numero < 0)
			numero = slide.length - 1;
		if (numero > slide.length - 1)
			numero = 0;
		document.getElementById("slide").src = slide[numero];
}
	setInterval("ChangeSlide(1)", 10000);
</script>
</html> 