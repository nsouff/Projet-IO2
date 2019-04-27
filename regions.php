<?php
  include_once('nTabulation.php');

  // Fonction permettant d'afficher un liste déroulante de toutes les régions de la BD

  function regions($connex){
    echo "<select name=\"regions\">\n";
    $req = "SELECT * FROM regions;";
    $res = mysqli_query($connex, $req);
    while ($ligne = mysqli_fetch_assoc($res)){
      echo nTab(1)."<option value=\"".$ligne['id']."\">".$ligne['name']."</option>\n";
    }
    echo "</select>\n";

  }
 ?>
