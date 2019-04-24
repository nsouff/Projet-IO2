<?php
  include_once('nTabulation.php');
  function offres_ville($connex, $city){
    $req = 'SELECT *, DATE_FORMAT(start_date, "%d/%m/%Y"), DATE_FORMAT(end_date, "%d/%m/%Y") FROM announce WHERE city_id='.$city.';';
    $res = mysqli_query($connex, $req);
    if (mysqli_num_rows($res) == 0){
      echo "Il n'a actuellement aucune offre d'emploie dans votre ville";
    }
    else {
      while ($ligne = mysqli_fetch_assoc($res)){
        echo "<div>\n".nTab(2)."<h3>".$ligne['announcer']." cherche un ".$ligne['job']." dans votre ville</h3>\n";
        echo nTab(2)."<ul>\n".nTab(3)."<li>Type: ".$ligne['type']."</li>\n";
        if ($ligne['type'] == "CDD"){
          echo nTab(3)."<li> Du: ".$ligne['DATE_FORMAT(start_date, "%d/%m/%Y")']."</li>\n";
          echo nTab(3)."<li>jusqu'au: ".$ligne['DATE_FORMAT(end_date, "%d/%m/%Y")']."</li>\n";
        }
        else if (!empty($ligne['start_date'])) echo nTab(3)."<li>jusqu'au ".$ligne['DATE_FORMAT(start_date, "%d/%m/%Y")']."</li>\n";
        echo nTab(3)."<li>description: ".$ligne['short_description']."</li>";
        echo "\n".nTab(2)."</ul>\n".nTab(1)."</div>\n".nTab(1);
      }
    }
    echo "\n";
  }




 ?>
