<?php

//Cette fonction sert à vérifier la cohérence du choix des régions, département, et ville; elle vérifie notamment
//que la ville choisie est bien dans le départemenr choisie et que celui ci est bien dans la région choisie.


function verifCohérenceAnnonce($connex,$reg,$depart,$city) {
  $req1='SELECT departement_id from cities WHERE id='.$city;
  $req2='SELECT region_id from departements WHERE id=\''.$depart.'\'';
  $res1=mysqli_query($connex,$req1);
  $res2=mysqli_query($connex,$req2);
  $a=mysqli_fetch_assoc($res1);
  $b=mysqli_fetch_assoc($res2);
  return ($a['departement_id']==$depart && $b['region_id']==$reg);
} ?>
