<?php

//Ici on a deux fonctions permettant de au choix supprimer ou valider une entreprise en fonction de son ID.

function supprEntr($connex,$id) {
  $req='DELETE from announcer WHERE name=\''.$id.'\'';
  mysqli_query($connex,$req);

}

function validEntr($connex,$id) {
  $req='UPDATE announcer SET valid=true WHERE name=\''.$id.'\'';
  mysqli_query($connex,$req);
}



 ?>
