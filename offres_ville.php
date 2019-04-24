<?php
  function offres_ville($connex, $city){
    $req = 'SELECT * FROM announce WHERE city_id='.$city.';';
    $res = mysqli_query($connex, $req);
    if (!$res){
      echo "Il n'a actuellement aucune offre d'emploie dans votre ville";
    }
    else {
      while ($ligne = mysqli_fetch_assoc($res)){
        echo "<div><h3>".$ligne['announcer']." cherche un ".$ligne['job']." dans votre ville</h3>";
        echo "<ul><li>Type: ".$ligne['type']."</li>";
        if ($ligne['type'] == "CDD"){
          echo "<li> Du: ".$ligne['start_date']."</li>";
          echo "<li>jusqu'au: ".$ligne['end_date']."</li>";
        }
        else if (!empty($ligne['start_date'])) echo "<li>jusqu'au ".$ligne['start_date']."</li>";
        echo "<li>description: ".$ligne['short_description']."</li>";
        echo "</ul></div>";
      }
    }
  }




 ?>
