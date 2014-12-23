<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">
<head>
    <title>Widget RSS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Avec la bonne DTD les bords sont bien arrondis. -->
	
<!--  Intégrer Widget.css -->
	<link rel="stylesheet" href="widget.css" />

<!--  Intégrer Widget.js -->
	<script type="text/javascript" src="widget.js"></script>

</head>
<body>

<H3><?php 
echo("Hello Widget !");
?></H3>


<!--  Sources du Widget 1 en exemple. -->
<script type="text/javascript">
var pausecontent=new Array()
pausecontent[0]='<a href="http://www.oxado.com/?origin=pub15190" target="_blank">Oxado</a><br />Webmasters, gagnez de l\'argent en affichant des bannières contextuelles Oxado'
pausecontent[1]='<a href="http://www.atleticwong.be" target="_blank">AtleticWong.Be</a><br />Une équipe de football...'
pausecontent[2]='<a href="http://www.espacejavascript.com/DESIGN/chartegraphique.php">Charte Graphique</a><br />Besoin d\'une charte graphique ?.'
pausecontent[3]='<a href="http://www.espacejavascript.com/DESIGN/chartegraphique.php">Graphique</a><br />Besoin d\'une charte graphique ?.'
pausecontent[4]='<a href="http://www.espacejavascript.com/DESIGN/chartegraphique.php">Charte</a><br />Besoin d\'une charte graphique ?.'
pausecontent[5]='<a href="http://www.espacejavascript.com/DESIGN/chartegraphique.php">Chaque</a><br />Besoin d\'une charte graphique ?.'
</script>


<!-- >>> Ci-dessous il faut récupérer les informations depuis le fichier XML. <<< -->
<!--  Sources du Widget 2 a adapter. -->
<?php 

/* ############################## */
/* # Encapsulation dans le try. # */
/* ################################################################################################################################## */
/* Début */

try{
	/* La fonction simplexml_load_file permet de charger un fichier XML. */
	/* La fonction retourne faux si le fichier ne se charge pas correctement. */
	/* Si le fichier n’a pas été trouvé, un ‘!’ lance une Exception qui arrête le script et renvoie au Bloc catch. */
	/* Le ‘@‘ devant la fonction simplexml_load_file permet de ne pas afficher les warning en cas de fichier introuvable. */
	if(!@$fluxrss=simplexml_load_file('../xml/rss_test_48.xml')){
		throw new Exception('Flux introuvable');}
		
		/* Utilisation de la fonction empty, si les données sont vides une erreur est renvoyée.  */
		/* Un contrôle sur is_string peut être envisagé plutôt que d'utiliser empty. */
		if(empty($fluxrss->channel->title) || empty($fluxrss->channel->description) || empty($fluxrss->channel->item->title)) throw new Exception('Flux invalide');
		
			/* Affichage test du titre principale du Flux RSS */
			echo '<h3>'.$fluxrss->channel->title.'</h3>';
		
			/* Affichage test de la description principale du Flux RSS */
			echo ('<p>'.$fluxrss->channel->description.'</p>');

			/* Début du Javascript qui permet l'affichage du parser dans sa box. */
			echo '<script type="text/javascript">';
			echo 'var pausecontentNew=new Array()';
/* ######################################################### */					
/* # Boucle pour afficher le contenu dans le Widget xHTML. # */
/* ################################################################################################################################## */
/* Début */

				$i = 0; /* Déclaration de la variable $i permettant de boucler et affectation de la valeur 0 */
				$nb_affichage = 100; /* Déclaration de la variable $nb_affichage et affectation de la valeur 05*/

					/* Boucle pour afficher l'ensemble des informations du fichier .xml*/
					foreach($fluxrss->channel->item as $item){
						
						/* IMPORTANT */
						/* ERREUR RS A REPORTER */
						/* Permet d'ajouter la date de création de l'annonce, mais, certaines dates sont de 1970 sur le fichier actuel rss_48.xml */
						/* La fonction date prend en paramètre un format et un timestamp. La fonction strtotime convertit la date pudDate en timestamp. */
						/* echo('<i>publié le'.(string)date('d/m/Y à G\hi',strtotime($item->pubDate)).'</i>'); echo('<br/>'); */
						
						/* Le parsing et son rendu doit donner le modèle ci-dessous */
						/* pausecontentNew[0]='<a href="LIEN" target="_offres-emploi">TITRE DU LIEN</a><br />DESCRIPTION' */


		/* Le problème, la ligne ne rend pas correctement en JAVASCRIPT , puisque le rendu final ne fonctionne pas */
						

						/* Création du lien et du titre du lien. */
						/* Ajout du title et de la target. */
						/* Ajout de la description */
						/* addslashes rajoute l'échappement des caractères attendu par le javascript. */
						echo 'pausecontentNew['.$i.']=\'<a href="'.(string)$item->link.'" target="_offres-emploi" title="'.addslashes((string)$item->title).'">'.addslashes((string)$item->title).'</a><br />'.addslashes((string)$item->description).'\'';
						
						/* Ajoute un retour chariot, pour un affichage propre du code source rendu */
						echo "\r";

					if(++$i>=$nb_affichage)
					break;
			 		}
	 		
/* Fin de la boucle pour afficher le contenu dans le Widget xHTML. */
/* ################################################################################################################################## */

			echo '</script>';

				
			
			
/* Fin d'encapsulation dans le try. */
/* ################################################################################################################################## */
		 		
}


/* Gestion des erreurs avec la classe Exception native de PHP. */
/* Bloc catch qui va afficher le message d'erreur. */
catch(Exception $e){echo $e->getMessage();}
?>



<!-- Titre fixe du Widget 1 -->
<h3 style="width:200px; color:#ffffff; background-color:#990000; margin:0; text-align:center; padding:5px; border-radius: 10px 10px 0 0; border: 1px solid #ccc;">Offres en cours</h3>

<!-- Affichage du Widget 1 -->
<div>
<script type="text/javascript">
new pausescroller(pausecontent, "pscroller1", "someclass", 2000)
</script>
</div>



<br/><br/>



<!-- Titre fixe du Widget 2 -->
<h3 style="width:200px; color:#ffffff; background-color:#990000; margin:0; text-align:center; padding:5px; border-radius: 10px 10px 0 0; border: 1px solid #ccc;">Offres en cours</h3>

<!-- Affichage du Widget 2 -->
<div>
<script type="text/javascript">
new pausescroller(pausecontentNew, "pscroller2", "someclass", 2500)
</script>
</div>



<!-- Code exemple pour afficher les 2 Widget -->
<!-- new pausescroller(name_of_message_array, CSS_ID, CSS_classname, pause_in_miliseconds) -->

<!-- <script type="text/javascript"> -->
<!-- new pausescroller(pausecontent, "pscroller1", "someclass", 2000) -->
<!-- new pausescroller(pausecontentNew, "pscroller2", "someclass", 3000) -->
<!-- ... -->
<!-- </script> -->

</body>
</html>