<?php
  include_once('nTabulation.php');

  // Fonction permettant d'afficher un liste déroulante de toutes les régions de la BD
  // $table peut avoir comme valeur regions, departements et cities
  // On affichera une liste déroulante en conséquent

  function deroul($connex, $table){
    if ($table != "regions" && $table != "departements" && $table != "cities") exit;
    echo "<select name=\"".$table."\">\n";
    $req = "SELECT id, name FROM ".$table.";";
    $res = mysqli_query($connex, $req);
    while ($ligne = mysqli_fetch_assoc($res)){
      echo nTab(1)."<option value=\"".$ligne['id']."\">".$ligne['name']."</option>\n";
    }
    echo "</select>\n";

  }
 ?>
