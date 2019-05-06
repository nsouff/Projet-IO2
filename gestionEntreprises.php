<?php

//Ici on a deux fonctions permettant de au choix supprimer ou valider une entreprise en fonction de son ID.

function supprEntr($connex,$name) {
  $name=str_replace("_"," ",$name);
  $req='DELETE FROM announcer WHERE name=\''.$name.'\'';
  mysqli_query($connex,$req);

}

function validEntr($connex,$name) {
  $name=str_replace("_"," ",$name);
  $req='UPDATE announcer SET valid=true WHERE name=\''.$name.'\'';
  mysqli_query($connex,$req);
}



 ?>
