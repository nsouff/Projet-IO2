<?php
//Cette fonction affiche tous les admins, soit les user where level=2
//en affichant sous forme de ligne de tableau leur nom prénom et email
//avec également un radio button avec un nom dépendant de l'id de l'utilisateur
//pour pouvoir le rétrograder si le bouton est coché.
//Elle sert sur la page EspaceRoot.php
function afficheAdmin($connex) {
  $req='SELECT * FROM user WHERE level=2';
  $resultat=mysqli_query($connex,$req);
  if(!$resultat) exit();
  else {
    while($ligne=mysqli_fetch_assoc($resultat)) {
      echo "<tr><td>".$ligne['first_name']."</td><td>".$ligne['last_name']."</td><td>".$ligne['email']."</td><td><input type=\"radio\" name=\"".$ligne['id']."\" value=\"retro\"></td></tr>";
    }
  }

}
 ?>
