<?php
  include_once('known_email.php');
  /* $connex est la connexion
   * $fn le prénom
   * $ln le nom
   * $em l'email
   * $ph le numéro de télephone
   */

  function save_user($connex, $fn, $ln, $em, $ph, $pass){
    if (known_email($connex, $em)) echo "Vous êtes déjà inscrit";
    else {
      $req = "INSERT INTO user (first_name, last_name, email, phone_number, password) VALUES (\"$fn\", \"$ln\", \"$em\", \"$ph\", \"$pass\")";
      $res = mysqli_query($connex, $req);
      if (!$res) echo "erreur";
      else echo "enregistré";
    }
  }
 ?>
