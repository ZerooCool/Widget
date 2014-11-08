<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    		<title>Afficher un flux RSS</title>
	
	</head>
  	<body>
	<?php
	try{
		
		if(!@$fluxrss=simplexml_load_file('http://www.lemonde.fr/rss/sequence/0,2-651865,1-0,0.xml')){
			throw new Exception('Flux introuvable');
		}		
		if(empty($fluxrss->channel->title) || empty($fluxrss->channel->description) || empty($fluxrss->channel->item->title))
			throw new Exception('Flux invalide');
			
		echo '<h3>'.(string)$fluxrss->channel->title.'</h3>
				<p>'.(string)$fluxrss->channel->description.'</p>';
		
		$i = 0;
		$nb_affichage = 5;
		echo '<ul>';
		foreach($fluxrss->channel->item as $item){
			echo '<li><a href="'.(string)$item->link.'">'.(string)$item->title.'</a> <i>publié le'.(string)date('d/m/Y à G\hi',strtotime($item->pubDate)).'</i></li>';
			if(++$i>=$nb_affichage)
				break;
		}
		echo '</ul>';
	}
	catch(Exception $e){
		echo $e->getMessage();
	}

?>
