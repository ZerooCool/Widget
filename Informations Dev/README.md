Widget
======
#############    #
# Objectif ########
#############    #
# Premier essai avec la communauté GIT/GITHUB.
# First test with the GIT/GITHUB community.

# Lire un flux RSS.xml
# Read a RSS.xml

# Créer un Widget.
# Create a Widget.

# Résultat attendu :
# Une lecture du code xml + affichage du contenu du flux RSS dans un Widget.



#################    #
# Possibilités ########
#################    #
# Les solutions pour afficher des données xml.

	¤ 00 Base du widget = Le squelette xHTML/JavaScript.

	¤ 01 Affichage RSS avec le Module SimpleXML = La récupération du contenu avec PHP.
	  SimpleXML est libre d'utilisation. XML comme PHP devient un standard. Le fichier phpinfo() trouvera les éléments suivants activés :
	  XML comes with PHP as standard. The phpinfo() find the following already enabled :
		-> libxml
		-> SimpleXML
		-> xml
		-> xmlreader

	¤ 02 Sinon passer par dom pour manipuler le contenu. Dom est libre d'utilisation. 
	
	¤ 03 Les Data Islands. Solution simpliste et rapide.



############    #
# Licence ########
############    #
# Identifier les auteurs des sources.

¤ 00 Base du widget
  Le script JavaScript est développé et sous copyright de http://www.dynamicdrive.com
  Pausing up-down scroller- © Dynamic Drive (www.dynamicdrive.com)
		-> Un mail est envoyé à l'auteur le 11 novembre 2014 à 16h pour demander son accord d'utilisation.



#####################    #
# Informations Dev ########
#####################    #
# Ajout de la capture d'écran du Widget type attendu.JPG
# Ajout de la capture d'écran de l'affichage actuel de SimpleXML.JPG
# NotesTMP.txt informations annexes pour le développement.


###############    #
# Nouveautés ########
###############    #
# Ajout du dossier xml et du fichier rss_test_47.xml pour tester en local.
# Ajout du dossier xml et du fichier rss_test_48.xml pour tester en local.
# Ajout du fichier decouverte-structure.php pour visualiser la structure et les noms des éléments a manipuler.



###########    #
# Codage ########
###########    #
# A faire - Générer un code lecture automatique du flux en PHP.
# Inclure l'affichage du flux dans un widget.


# Ajouter des bords arrondis sur le squelette.


# Un lien qui présente une solution intéressante également : 
http://unpointvirgule.fr/2012/06/afficher-un-flux-rss-avec-simplexml/