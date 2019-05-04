<?php
  // Fonction qui affiche tout les détail d'une annonce

  function aff_annonce_detail($connex, $id){
    $req = "SELECT * FROM announce WHERE id=$id";
    $res = mysqli_query($connex, $req);
    if (mysqli_num_rows($res) == 0) echo "aucun id ne correspond";
    else {
      $an = mysqli_fetch_assoc($res);
      echo "<ul>\n";
      echo "<li>".$an['announcer']."</li>";
      echo "<li>".$an['type']."</li>";
      echo "<li>".$an['short_description']."</li>";
      echo "<li>".$an['long_description']."</li>";
      if ($an['type'] == "CDD"){
        echo "<li>".$an['start_date']."</li>";
        echo "<li>".$an['end_date']."</li>";
      }
      else if ($an['start_date'] != NULL) echo "<li>".$an['star_date']."</li>";
    }
    echo "\n";
    echo "</ul>";
  }
 ?>
