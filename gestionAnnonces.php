<?php


//Ici on a deux fonctions permettant de au choix supprimer ou valider une annonce en fonction de son ID.

function supprAnn($connex,$id) {
  $req='DELETE from announce WHERE id='.$id;
  mysqli_query($connex,$req);

}

function validAnn($connex,$id) {
  $req='UPDATE announce SET valid=true WHERE id='.$id;
  mysqli_query($connex,$req);
}?>
