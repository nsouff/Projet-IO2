<?php
  include_once('connex_BD.php');
  include_once('getLieu.php');
  function affiche_annonce($ligne){
    echo "<li class=\"announcer\">".$ligne['announcer']."</li>\n";
    echo "<li class=\"job\">".$ligne['job']."</li>\n";
    echo "<li class=\"short_description\">".$ligne['short_description']."</li>\n";
    echo "<li class=\"type\">Type: ".$ligne['type']."</li>\n";
    echo "<li class=\"lieu\">".getLieu(connex_BD(), $ligne['city_id'], $ligne['departement_id'])."</li>";
    if ($ligne['type'] == "CDD"){
      echo "<li class=\"start_date\">Début: ".$ligne['start_date']."</li>\n";
      echo "<li class=\"end_date\">Fin: ".$ligne['end_date']."</li>\n";
    }
    else if (!empty($ligne['start_date'])) {
      echo "<li class=\"start_date\">Début: ".$ligne['start_date']."</li>\n";
    }
  }
?>
