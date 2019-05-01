<?php
  /* $connex est la connexion à la BD
   * $b un boolean qui nous dira si une lettre de motivation à été insérer
   * $user_id est l'id de l'utilisateur
   * $an_id est l'id de l'annonce
   */
  function save_link_BD($connex, $b, $user_id, $an_id){
    $req = "INSERT INTO link (motiv, user_id, announce_id) VALUES ($b, $user_id, $an_id);";
    $res = mysqli_query($connex, $req);
    if (!$res) echo "erreur";
  }
?>
