<?php
  include_once('known_entr.php');

  /* $connex est la connexion
   * $n le nom de l'entreprise
   * $adr l'adresse et code postal de l'entreprise
   * $em l'email
   * $pass le mot de passe
   */

  function save_entr($connex, $n, $adr, $em, $pass){
    if (known_entr($connex, $n, $em))  echo "Vous êtes déja inscirt";
    else {
      $req = "INSERT INTO announcer (name, adresse, email, password) VALUES (\"$n\", \"$adr\", \"$em\", \"$pass\", FALSE)";
      $res = mysqli_query($connex, $req);
      if (!$res) echo "erreur";
      else echo "enregistré";
    }
  }
 ?>
