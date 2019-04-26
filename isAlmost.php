<?php
  // Si un utilisateur cherche Vendur au lieu de Vendeur on veut tout de même qu'il trouve les annonces pour vendeur, on écrit donc une fonction qui teste si deux String sont presque pareil


  // $var sera une annonce de la BD, $fixe sera la cherche de l'utilisateur
  // On veut donner un degré de ressemblance entre les deux String
  /* Valeur de retour
  * 3 si elles sont égales
  * 2-0 de très ressemblant à un peu
  * -1 signifie qu'on ne voit aucune ressemblance
  */


  function isAlmost($var, $fixe){
    if ($var == $fixe) return 3;
    $l = levenshtein($var, $fixe);
    if ($l == 1) return 2;
    similar_text($var, $fixe, $perc1);
    similar_text($fixe, $var, $perc2);
    if ($perc1 > $perc2) $perc = $prec1;
    else $perc = $perc2;
    if ($perc >= 90 || $l <= 3) return 1;
    if ($perc >= 70 || $l < 5) return 0;
    return -1;
  }

 ?>
