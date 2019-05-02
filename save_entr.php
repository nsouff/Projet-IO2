<?php
  include_once('known_entr.php');

  /* $connex est la connexion
   * $n le nom de l'entreprise
   * $em l'email
   * $pass le mot de passe
   */

  function save_entr($connex, $n, $em, $pass){
    if (known_entr($connex, $n, $em))  echo "Vous êtes déja inscirt";
    else {
      $req = "INSERT INTO announcer (name, email, password) VALUES (\"$n\", \"$em\", \"$pass\")";
      $res = mysqli_query($connex, $req);
      if (!$res) echo "erreur";
      else echo "enregistré";
    }
  }
 ?>
