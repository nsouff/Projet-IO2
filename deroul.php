<?php

  // Fonction permettant d'afficher un liste déroulante de toutes les régions de la BD
  // $table peut avoir comme valeur regions, departements et cities
  // On affichera une liste déroulante en conséquent

  function deroul($connex, $table){
    if ($table != "regions" && $table != "departements" && $table != "cities") exit;
    switch ($table){
      case "regions": $lab = "région: "; break;
      case "departements": $lab = "département: "; break;
      case "cities": $lab = "ville: "; break;
    }
    echo "<label for=\"".$table."\">".$lab."</label>\n";
    echo "<select name=\"".$table."\" id=\"".$table."\">\n";
    $req = "SELECT id, name FROM ".$table." ORDER BY name;";
    $res = mysqli_query($connex, $req);
    while ($ligne = mysqli_fetch_assoc($res)){
      echo "<option value=\"".$ligne['id']."\">".$ligne['name']."</option>\n";
    }
    echo "</select>\n";

  }
 ?>
