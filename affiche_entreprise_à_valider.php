<?php


function EntrepriseNonValidé($connex) {
  $req='SELECT * FROM announcer WHERE valid=0';
  $resultat=mysqli_query($connex,$req);
  if(!$resultat) exit();
  else {
    while($ligne=mysqli_fetch_assoc($resultat)) {
      echo "<tr><td>".$ligne['name']."</td><td>".$ligne['adresse']."</td><td>".$ligne['email']."</td><td><input type=\"radio\" name=\"".$ligne['name']."\" value=\"valid\"></td><td><input type=\"radio\" name=\"".$ligne['name']."\" value=\"suppr\"></td></tr>";
    }
  }

} ?>
