<?php

  function save_link_BD($connex, $cv_ext, $motiv_ext, $user_id, $an_id){
    $req = "INSERT INTO link (cv_ext, motiv_ext, user_id, announce_id) VALUES (\"$cv_ext\", \"$motiv_ext\", $user_id, $an_id);";
    $res = mysqli_query($connex, $req);
    if (!$res) echo "erreur";
  }
?>
