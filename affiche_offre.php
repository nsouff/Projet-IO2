<?php
  include_once('affiche_annonce.php');
  // $n est le nombre de ligne que l'on veut afficher
  // $tab est un tableau de tableau de tableau, il contient 4 tableau le premier contient les offres les plus pertinentes et le dernier celles qui le sont moins
  function affiche_offre($tab, $n){
    $i = 0;
    foreach ($tab as $value) {
      foreach ($value as $val) {
        if ($i >= $n)  break;
        echo "<ul class=\"annonce\">";
        affiche_annonce($val);
        echo "<li><a href=\"annonce.php?id=".$val['id']."\">Voir plus/Postuler</a></li>";
        echo "</ul>";
        $i++;
      }
      if ($i >= $n) break;
    }
  }
 ?>
