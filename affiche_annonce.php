<?php
  include_once('nTabulation.php');
  function affiche_annonce($ligne){
    // echo "<ul class=\"announce\">\n";
    echo nTab(1)."<li class=\"announcer\">".$ligne['announcer']."</li>\n";
    echo nTab(1)."<li class=\"job\">".$ligne['job']."</li>\n";
    echo nTab(1)."<li class=\"short_description\">".$ligne['short_description']."</li>\n";
    echo nTab(1)."<li class=\"type\">Type: ".$ligne['type']."</li>\n";
    if ($ligne['type'] == "CDD"){
      echo nTab(1)."<li class=\"start_date\">Début: ".$ligne['start_date']."</li>\n";
      echo nTab(1)."<li class=\"end_date\">Fin: ".$ligne['end_date']."</li>\n";
    }
    else if (!empty($ligne['start_date'])) {
      echo nTab(1)."<li class=\"start_date\">Début: ".$ligne['start_date']."</li>\n";
    }
    // echo "</ul>\n";
  }
?>
