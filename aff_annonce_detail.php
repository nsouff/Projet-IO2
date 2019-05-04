<?php
  // Fonction qui affiche tout les détail d'une annonce
  include_once('getLieu.php');
  function aff_annonce_detail($connex, $id){
    $req = "SELECT * FROM announce WHERE id=$id";
    $res = mysqli_query($connex, $req);
    if (mysqli_num_rows($res) == 0) echo "aucun id ne correspond";
    else {
      $an = mysqli_fetch_assoc($res);
      echo "<ul>\n";
      echo "<li>".$an['announcer']."</li>\n";
      echo "<li>".$an['type']."</li>\n";
      echo "<li>".getLieu($connex, $an['city_id'], $an['departement_id'])."</li>\n";
      echo "<li>".$an['short_description']."</li>\n";
      echo "<li>".$an['long_description']."</li>\n";
      if ($an['type'] == "CDD"){
        echo "<li>".$an['start_date']."</li>\n";
        echo "<li>".$an['end_date']."</li>\n";
      }
      else if ($an['start_date'] != NULL) echo "<li>".$an['star_date']."</li>\n";
    }
    echo "\n";
    echo "</ul>\n";
  }
 ?>
