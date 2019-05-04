<?php
  function getLieu($connex, $cit, $dep){
    $req = "SELECT name FROM cities WHERE id=$cit";
    $res = mysqli_query($connex, $req);
    $ligne = mysqli_fetch_assoc($res);
    $s = "Lieu: ".$ligne['name'];
    $req = "SELECT name FROM departements WHERE id=\"$dep\"";
    $res = mysqli_query($connex, $req);
    $ligne = mysqli_fetch_assoc($res);
    $s .= ", ".$ligne['name'];
    return $s;
  }
?>
