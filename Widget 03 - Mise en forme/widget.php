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


<!-- Sources des 3 Widgets. -->
<?php 

/* ############################## */
/* # Encapsulation dans le try. # */
/* ################################################################################################################################## */

try{
	/* La fonction simplexml_load_file permet de charger un fichier XML. */
	/* La fonction retourne faux si le fichier ne se charge pas correctement. */
	/* Si le fichier n’a pas été trouvé, un ‘!’ lance une Exception qui arrête le script et renvoie au Bloc catch. */
	/* Le ‘@‘ devant la fonction simplexml_load_file permet de ne pas afficher les warning en cas de fichier introuvable. */
	if(!@$fluxrss=simplexml_load_file('../xml/rss_test_48.xml')){
		throw new Exception('Flux introuvable');}
		
		/* Utilisation de la fonction empty, si les données sont vides une erreur est renvoyée.  */
		if(empty($fluxrss->channel->title) || empty($fluxrss->channel->description) || empty($fluxrss->channel->item->title)) throw new Exception('Flux invalide');
		
			/* Affichage test du titre principale et de la description du Flux RSS */
			/* echo '<h3>'.$fluxrss->channel->title.'</h3>'; */
			/* echo ('<p>'.$fluxrss->channel->description.'</p>'); */

				/* Début du Javascript qui permet l'affichage du contenu du parser dans sa box via JavaScript. */
				echo '<script type="text/javascript">';
				
					/* Afficher plusieurs Widgets */
					echo 'var widget01=new Array();';
					echo 'var widget02=new Array();';
					echo 'var widget03=new Array();';

/* ######################################################### */					
/* # Boucle pour afficher le contenu dans le Widget xHTML. # */
/* ################################################################################################################################## */

				$i = 0; /* Déclaration de la variable $i permettant de boucler et affectation de la valeur 0 */
				$nb_affichage = 100; /* Déclaration de la variable $nb_affichage et affectation de la valeur 05*/

					/* Boucle pour afficher l'ensemble des informations du fichier .xml*/
					foreach($fluxrss->channel->item as $item){

						/* IMPORTANT */
						/* Permet d'ajouter la date de création de l'annonce, mais, certaines dates sont de 1970 sur le fichier actuel rss_48.xml */
						/* La fonction date prend en paramètre un format et un timestamp. La fonction strtotime convertit la date pudDate en timestamp. */
						/* echo('<i>publié le'.(string)date('d/m/Y à G\hi',strtotime($item->pubDate)).'</i>'); echo('<br/>'); */

						/* Le parsing et son rendu doit donner le modèle ci-dessous */
						/* Variable[0]='<a href="LIEN" target="_offres-emploi">TITRE DU LIEN</a><br />DESCRIPTION' */						

						/* Création du lien avec title et target. Titre de l'offre. Description */
						/* addslashes rajoute l'échappement des caractères attendu par le script JavaScript. */
						
						/* Widget01 : Parser et création des variables pour le script JavaScript du Widget01. */
						echo 'widget01['.$i.']=\'<a href="'.(string)$item->link.'" target="_offres-emploi" title="'.addslashes((string)$item->title).'">'.addslashes((string)$item->title).'</a><br />'.addslashes((string)$item->description).'\'';
						echo "\r"; /* Ajoute un retour chariot, pour un affichage propre du rendu du code source. */

						/* Widget02 : Parser et création des variables pour le script JavaScript du Widget02. */
						echo 'widget02['.$i.']=\'<a href="'.(string)$item->link.'" target="_offres-emploi" title="'.addslashes((string)$item->title).'">'.addslashes((string)$item->title).'</a><br />'.addslashes((string)$item->description).'\'';
						echo "\r"; /* Ajoute un retour chariot, pour un affichage propre du rendu du code source. */

						/* Widget03 : Parser et création des variables pour le script JavaScript du Widget03. */
						echo 'widget03['.$i.']=\'<a href="'.(string)$item->link.'" target="_offres-emploi" title="'.addslashes((string)$item->title).'">'.addslashes((string)$item->title).'</a><br />'.addslashes((string)$item->description).'\'';
						echo "\r"; /* Ajoute un retour chariot, pour un affichage propre du rendu du code source. */
						
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


<!-- Titre statique du Widget01 -->
<h3 style="width:200px; color:#ffffff; background-color:#990000; margin:0; text-align:center; padding:5px; border-radius: 10px 10px 0 0; border: 1px solid #ccc;">Offres en cours</h3>

<!-- Affichage du Widget01 -->
<div>
<script type="text/javascript">
new pausescroller(widget01, "pscroller01", "someclass", 2000)
</script>
</div>



<br/>###########SEPARATION###########<br/><br/>



<!-- Titre statique du Widget02 -->
<h3 style="width:200px; color:#ffffff; background-color:#990000; margin:0; text-align:center; padding:5px; border-radius: 10px 10px 0 0; border: 1px solid #ccc;">Offres en cours</h3>

<!-- Affichage du Widget02 -->
<div>
<script type="text/javascript">
new pausescroller(widget02, "pscroller02", "someclass", 2500)
</script>
</div>



<br/>###########SEPARATION###########<br/><br/>



<!-- Titre statique du Widget03 -->
<h3 style="width:200px; color:#ffffff; background-color:#990000; margin:0; text-align:center; padding:5px; border-radius: 10px 10px 0 0; border: 1px solid #ccc;">Offres en cours</h3>

<!-- Affichage du Widget03 -->
<div>
<script type="text/javascript">
new pausescroller(widget03, "pscroller03", "someclass", 2500)
</script>
</div>


</body>
</html>