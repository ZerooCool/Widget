<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">
<head>
    <title>Widget RSS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php 

/* Encapsulation dans le try ( ! ) */
try{
	/* La fonction simplexml_load_file permet de charger un fichier XML. */
	/* La fonction retourne faux si le fichier ne se charge pas correctement. */
	/* Si le fichier n’a pas été trouvé, un ‘!’ lance une Exception qui arrête le script et renvoie au Bloc catch. */
	/* Le ‘@‘ devant la fonction simplexml_load_file permet de ne pas afficher les warning en cas de fichier introuvable. */
	if(!@$fluxrss=simplexml_load_file('../xml/rss_test_48.xml')){
		throw new Exception('Flux introuvable');}
		
		/* Utilisation de la fonction empty, si les données sont vides une erreur est renvoyée.  */
		if(empty($fluxrss->channel->title) || empty($fluxrss->channel->description) || empty($fluxrss->channel->item->title)) throw new Exception('Flux invalide');
		
			/* Affichage du titre principale du Flux RSS */
			echo '<h3>'.$fluxrss->channel->title.'</h3>';
		
			/* Affichage de la description principale du Flux RSS */
			echo '<p>'.$fluxrss->channel->description.'</p>';

/* ##################################################################### */					
/* # Boucle a exploiter pour afficher le contenu dans le Widget xHTML. # */
/* ################################################################################################################################## */			
/* Début */
			
				$i = 0; /* Déclaration de la variable $i permettant de boucler et affectation de la valeur 0 */
				$nb_affichage = 100; /* Déclaration de la variable $nb_affichage et affectation de la valeur 05*/
				
				echo '<ul>'; /* Ouverture de l'élément principale conteneur de la liste à puce qui va être crée jusqu'à 100 fois grâce à la boucle. */
		
					/* Boucle pour afficher l'ensemble des informations du fichier .xml*/
					foreach($fluxrss->channel->item as $item){
						
						/* Ouverture de la liste à puce. */
						echo('<li>');
							
							/* IMPORTANT */
							/* ERREUR RS A REPORTER */
							/* Permet d'ajouter la date de création de l'annonce, mais, certaines dates sont de 1970 sur le fichier actuel rss_48.xml */
							/* echo('<i>publié le'.(string)date('d/m/Y à G\hi',strtotime($item->pubDate)).'</i>'); echo('<br/>'); */
						
						/* Création du lien */
						echo('<a href="'.(string)$item->link.'">'.(string)$item->title.'</a>');
						
						/* Fermeture de la liste à puce. */
						echo ('</li>');
						
						/* Affichage de la description. */
						echo (''.(string)$item->description.'');
						
					if(++$i>=$nb_affichage)
					break;
			 		}
		 		
		 		echo '</ul>'; /* Fermeture de l'élément principale conteneur de la liste à puce. */
		
/* Fin */
/* ################################################################################################################################## */
		 				 
		
		
		
			

			

		/* A supprimer. */
		echo'<br/><br/>Fin de l\'intégration.<br/><br/>Source : http://www.snoupix.com/lire-un-flux-rss-avec-simplexml_tutorial_17.html';
		echo'Une autre source : http://unpointvirgule.fr/2012/06/afficher-un-flux-rss-avec-simplexml/';
}


/* Gestion des erreurs avec la classe Exception native de PHP. */
/* Bloc catch qui va afficher le message d'erreur. */
catch(Exception $e){echo $e->getMessage();}
?>





