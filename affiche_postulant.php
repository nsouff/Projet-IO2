<?php
  include_once('affiche_user.php');
  include_once('get_user.php');
  
  function affiche_postulant($connex, $an_id){
    $req = "SELECT * FROM link WHERE announce_id=$an_id;";
    $res = mysqli_query($connex, $req);
    if (mysqli_num_rows($res) == 0) echo "Personne n'a postuler";
    else{
      while ($link = mysqli_fetch_assoc($res)){
        affiche_user($connex, get_user($connex, $link['user_id']), $link);
      }
    }
  }
?>
