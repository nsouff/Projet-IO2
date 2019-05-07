<?php
include_once('connex_BD.php');

//Cette fonction permet d'afficher toutes les annonces non validées
//par l'administration, sous la forme d'un tableau, avec un formulaire POST
//permettant de cocher la validation ou la suppression pour chaque annonce et
//les informations relatives à l'annonce.
//Cette fonction est utilisée sur la page ApprobationAnnonces.php
function afficheNonValidé($connex) {
  $req='SELECT * FROM announce WHERE valid=0';
  $resultat=mysqli_query($connex,$req);
  if(!$resultat) exit();
  else {
    while($ligne=mysqli_fetch_assoc($resultat)) {
      echo "<tr><td>".$ligne['announcer']."</td><td>".$ligne['short_description']."</td><td>".$ligne['type']."</td><td>".$ligne['start_date']."</td><td>".$ligne['end_date']."</td><td>".$ligne['job']."</td><td><a href=\"ApprobationAnnonces.php?id=".$ligne['id']."\">Voir l'annonce</a></td><td><input type=\"radio\" name=\"".$ligne['id']."\" value=\"valid\"></td><td><input type=\"radio\" name=\"".$ligne['id']."\" value=\"suppr\"></td></tr>";
    }
  }

}












 ?>
