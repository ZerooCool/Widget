
Intégrer Widget.css

Intégrer Widget.js





<script type="text/javascript">

/* ICI LE CONTENU QUI EST AFFICHE SUR LA PAGE */

var pausecontent=new Array()
pausecontent[0]='<a href="http://www.oxado.com/?origin=pub15190" target="_blank">Oxado</a><br />Webmasters, gagnez de l\'argent en affichant des banni�res contextuelles Oxado'
pausecontent[1]='<a href="http://www.atleticwong.be" target="_blank">AtleticWong.Be</a><br />Une �quipe de football...'
pausecontent[2]='<a href="http://www.espacejavascript.com/DESIGN/chartegraphique.php">Charte Graphique</a><br />Besoin d\'une charte graphique ?.'
pausecontent[3]='<a href="http://www.espacejavascript.com/DESIGN/chartegraphique.php">Graphique</a><br />Besoin d\'une charte graphique ?.'
pausecontent[4]='<a href="http://www.espacejavascript.com/DESIGN/chartegraphique.php">Charte</a><br />Besoin d\'une charte graphique ?.'
pausecontent[5]='<a href="http://www.espacejavascript.com/DESIGN/chartegraphique.php">Chaque</a><br />Besoin d\'une charte graphique ?.'

// Ici il faut boucler avec les informations r�cup�r�es depuis le fichier XML.

// var pausecontent2=new Array()
// pausecontent2[0]='<a href="http://www.oxado.com/?origin=pub15190">Webmasters, gagnez de l\'argent en affichant des banni�res</a>'
// pausecontent2[1]='<a href="http://www.cnn.com">CNN: Headline and breaking news 24/7</a>'
// pausecontent2[2]='<a href="http://news.bbc.co.uk">BBC News: UK and international news</a>'

</script>

// <script type="text/javascript">
// new pausescroller(name_of_message_array, CSS_ID, CSS_classname, pause_in_miliseconds)
// new pausescroller(pausecontent, "pscroller1", "someclass", 2000)

// document.write("<br />")


// new pausescroller(pausecontent2, "pscroller2", "someclass", 3000)
// </script>

<p><br/><font face="verdana" size="1">Reste a adapter la r�cup�ration du contenu du XML.</font></a></p>
<p><br/><font face="verdana" size="1">Puis a cr�er une boucle avec ce code, pour afficher toutes les informations du fichier XML.</font></a></p>


<TABLE BORDER="1"> 
  <CAPTION> Voici le titre du tableau </CAPTION> 
  <TR> 
 <TH> Titre A1 </TH> 
 <TH> Titre A2 </TH> 
 <TH> Titre A3 </TH> 
 <TH> Titre A4 </TH> 
  </TR> 
  <TR> 
 <TH> Titre B1 </TH> 
 <TD> Valeur B2 </TD> 
 <TD> Valeur B3 </TD> 
 <TD>
 
<!-- Ajout d'un titre au Widget -->
 <h3 style="color:#ffffff; background-color:#990000; margin:0; text-align:center; padding:5px; border-radius: 10px 10px 0 0; border: 1px solid #ccc;">Offres en cours</h3>
 
<script type="text/javascript">
//new pausescroller(name_of_message_array, CSS_ID, CSS_classname, pause_in_miliseconds)
new pausescroller(pausecontent, "pscroller1", "someclass", 2000)
</script>

</TD> 
  </TR> 
</TABLE> 
