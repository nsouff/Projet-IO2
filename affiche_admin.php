<?php
function afficheAdmin($connex) {
  $req='SELECT * FROM user WHERE level=2';
  $resultat=mysqli_query($connex,$req);
  if(!$resultat) exit();
  else {
    while($ligne=mysqli_fetch_assoc($resultat)) {
      echo "<tr><td>".$ligne['first_name']."</td><td>".$ligne['last_name']."</td><td>".$ligne['email']."</td><td><input type=\"radio\" name=\"".$ligne['id']."\" value=\"prom\"></td></tr>";
    }
  }

}
 ?>
