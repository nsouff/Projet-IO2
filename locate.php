<?php
  // On veut savoir si le paramètre rentré dans "Où" est une région, un département, ou une ville

  /* On a donc trois 4 valeurs de retour
   * -1: location inconnue
   * 0: est une région
   * 1: est un département
   * 2: est une ville
   */
  function locate($connex, $l){
    $req = "SELECT * FROM cities WHERE name=\"".$l."\";";
    $res = mysqli_query($connex, $req);
    if (mysqli_num_rows($res) != 0) return 2;

    $req = "SELECT * FROM departements WHERE name=\"".$l."\";";
    $res = mysqli_query($connex, $req);
    if (mysqli_num_rows($res) != 0) return 1;
    
    $req = "SELECT * FROM regions WHERE name=\"".$l."\";";
    $res = mysqli_query($connex, $req);
    if (mysqli_num_rows($res) != 0) return 0;

    return -1; // Car $l n'apparait dans aucune table
  }

 ?>
