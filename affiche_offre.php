<?php
  include_once('affiche_annonce.php');
  // $n est la n-ieme page a affiché, si c'est la première on affiche les 20 premières annonce si $n = 4 on affiche les affiches de 81 à 100

  // $tab est un tableau de tableau de tableau, il contient 4 tableau le premier contient les offres les plus pertinentes et le dernier celles qui le sont moins

  function affiche_offre($tab, $n){
    $i = 20*$n;
    $m = 20 * ($n + 1);
    foreach ($tab as $value) {
      foreach ($value as $val) {
        if ($i >= $m || $i < 20*$n) break;
        echo "<ul class=\"annonce\">";
        affiche_annonce($val);
        echo "<li><a href=\"annonce.php?id=".$val['id']."\">Voir plus/Postuler</a></li>";
        echo "</ul>";
        $i++;
      }
      if ($i >= $m || $i < 20*$n) break;
    }
  }
 ?>
