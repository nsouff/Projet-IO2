<?php
  // Deux entreprises ne peuvent pas avoir le même nom et ne peuvent pas avoir la même adresse mail

  function known_entr($connex, $n, $em){
    $req = "SELECT name, email FROM announcer WHERE name=\"$n\" OR email=\"$em\"";
    $res = mysqli_query($connex, $req);
    return (mysqli_num_rows($res) != 0);
  }
 ?>
