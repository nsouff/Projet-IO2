<?php
  include_once('known_email.php');
  /* $connex est la connexion
   * $fn le prénom
   * $ln le nom
   * $em l'email
   * $ph le numéro de télephone
   * $reg l'id d'une région,
   * $dep l'id d'un département
   * $cit l'id d'une ville
   */
  function save($connex, $fn, $ln, $em, $ph, $reg, $dep, $cit, $pass){
    if (known_email($connex, $em)) echo "Vous êtes déjà inscrit";
    else {
      $req = "INSERT INTO seeker (first_name, last_name, email, phone_number, region_id, departement_id, city_id, password) VALUES (\"$fn\", \"$ln\", \"$em\", $ph, $reg, \"$dep\", $cit, \"$pass\")";
      $res = mysqli_query($connex, $req);
      if (!$res) echo "erreur";
      else echo "enregistré";
    }
  }
 ?>
