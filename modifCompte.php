<?php

function modifCompte($connex,$mdp,$numero,$id) {
  $req1='UPDATE user SET phone_number=\''.$numero.'\', password=\''.$mdp.'\' WHERE id='.$id;
  $res=mysqli_query($connex,$req1);
} ?>
