<?php
//Cette fonction modifie le numéro et le mot de passe d'un user avec un id donné. Elle sert sur la page compte.php
function modifCompte($connex,$mdp,$numero,$id) {
  $req1='UPDATE user SET phone_number=\''.$numero.'\', password=\''.$mdp.'\' WHERE id='.$id;
  $res=mysqli_query($connex,$req1);
}

//Cette fonction permet de remplacer le précédent mot de passe d'une entreprise par $mdp. Elle sert sur la page compte_entr.
function modifCompteEntr($connex,$mdp,$name) {
  $req1='UPDATE announcer SET password=\''.$mdp.'\' WHERE name=\''.$name.'\'';
  $res=mysqli_query($connex,$req1);
} ?>
