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
		
		/* Récupérer une donnée dans le fichier XML devient facile sous forme de tableau. */
		/* Exemple pour $fluxrss->channel->title qui va renvoyer : */
		/* Le contenu de la balise title, avec pour parent « channel »  lui même ayant pour parent $fluxrss qui est l’élement racine rss. */
		/* Pour connaitre le contenu de l’objet $fluxrss : echo ('var_dump($fluxrss)'); */


		/* Si le fichier n’a pas été trouvé, un ‘!’ lance une Exception qui arrête le script et renvoie au Bloc catch. */
		/* Utilisation de la fonction empty, si les données sont vides une erreur est renvoyée.  */
		/* La fonction empty peut être remplacée par la fonction is_string qui spécifie à PHP le type de contenu "chaîne de caractères". */
		if(!is_string($fluxrss->channel->title) || empty($fluxrss->channel->description) || empty($fluxrss->channel->item->title)) throw new Exception('Flux invalide');
		echo '<h3>'.$fluxrss->channel->title.'</h3><p>'.$fluxrss->channel->description.'</p>';
		
		
		
		/*  A FAIRE, Le controle sur les string à la place des empty.
		La question du string !
		// if(isset($fluxrss->channel->title) && is_string($fluxrss->channel->title) && str_lenght($fluxrss->channel->title)>=4)
		
		
		$ctrl1 = (isset($fluxrss->channel->title) && is_string($fluxrss->channel->title) && str_lenght($fluxrss->channel->title)>=4)?"oui":"non";
		echo  $ctrl1;
		$ctrl2 = (isset($fluxrss->channel->title) && is_string($fluxrss->channel->title) && str_lenght($fluxrss->channel->title)>=4) ;
		echo  $ctrl2;

		----------------------->
		
		$ctrl1 = (isset($fluxrss->channel->title) && is_string($fluxrss->channel->title) && str_length($fluxrss->channel->title)>=4)?$fluxrss->channel->title:null;
		if(null!==$ctrl1){
			//work
		}
		
		 */
		
		
		
		echo'Fin.<br/><br/>Source : http://www.snoupix.com/lire-un-flux-rss-avec-simplexml_tutorial_17.html';
}


/* Gestion des erreurs avec la classe Exception native de PHP. */
/* Bloc catch qui va afficher le message d'erreur. */
catch(Exception $e){echo $e->getMessage();}
?>





