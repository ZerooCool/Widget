<!--
Simple script pour découvrir la structure du fichier XML

Solution automatique qui déroule un fichier .xml pour identifier les éléments de la structure : tables, champs et données.
Le résultat du parser construit le tableau associatif qui permet de manipuler les ‘tables’, ‘éléments’ et ‘données’.
-->

<?php
//Script xml_parser.php?file='fichier_test.xml'

$file = ( !empty($_GET['file']) ? $_GET['file'] : 'xml/rss_test_48.xml');
$tb = array();

function pere_ou_fils( $_elt ){
	global $tb;
	$tb['TABLES'][] = strtoupper($_elt->getName());
	foreach( $_elt as $_pere => $_fils ){
		
		if ( count( $_fils->children() ) > 0 ){
			pere_ou_fils( $_fils );}
			
			else {
				$tb['CHAMPS'][strtoupper($_elt->getName())][]=strtoupper($_pere);
				$_donnee=$_elt->$_pere;
				$tb['DONNEES'][strtoupper($_elt->getName())][]=$_donnee;
			}
	}
}

if (file_exists( $file ) ){
	$xml = simplexml_load_file( $file );
	pere_ou_fils($xml);
	$xml='';
	echo '<pre>';
	print_r($tb);
	echo '</pre>';}else{
		exit( '<pre>Echec lors de l\'ouverture du fichier '.$file.'</pre>' );}
?>

<!--
Le lien suivant complète le code ci-dessus.
Il permet d'exploiter le contenu d'un fichier XML, toujours avec SimpleXML.
http://www.aurelienpiat.com/2011/03/25/traiter-simplement-un-fichier-xml-avec-simplexml-en-php/
-->