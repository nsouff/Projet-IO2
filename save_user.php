<?php
  include_once('known_email.php');
  /* $connex est la connexion
   * $fn le prénom
   * $ln le nom
   * $em l'email
   * $ph le numéro de télephone
   */

  function save_user($connex, $fn, $ln, $em, $ph, $pass){
    if (known_email($connex, $em)) echo "<h3 class=\"center\">Vous êtes déjà inscrit</h3>";
    else {
      $req = "INSERT INTO user (first_name, last_name, email, phone_number, password) VALUES (\"$fn\", \"$ln\", \"$em\", \"$ph\", \"$pass\")";
      $res = mysqli_query($connex, $req);
      if (!$res) echo "<h3 class=\"center\">Erreur</h3>";
      else echo "<h3 class=\"center\">Inscription réussie! Vous pouvez désormais vous connecté";
    }
  }
 ?>
