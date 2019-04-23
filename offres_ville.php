<?php
  function offres_ville($connex, $city){
    $req = 'SELECT * FROM announce WHERE city_id='.$city.';';
    $res = mysqli_query($connex, $req);
    if (!$res){
      echo "Il n'a actuellement aucune offre d'emploie dans votre ville";
    }
    else {
      echo "<table>";
      while ($ligne = mysqli_fetch_assoc($res)){
        echo "<th>".$ligne['announcer']." cherche un ".$ligne['jobs']." dans votre vile</th>";
        }
        echo "</table>";
      }
    }

 ?>
