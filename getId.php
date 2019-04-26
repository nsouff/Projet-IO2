<?php
  // $name est le lieu dont on veut l'indentifiant
  /* $i est une entier prenant comme valeur:
   * 0 si c'est une région
   * 1 si c'est un département
   * 2 si c'est une ville
   */

  function getId($connex, $name, $i){
    switch($i){
      case 0: return getId_reg($connex, $name); break;
      case 1: return getId_dep($connex, $name); break;
      case 2: return getId_city($connex, $name); break;
    }
  }
  function getId_reg($connex, $name){
    $req = "SELECT * FROM regions WHERE name=\"".$name."\";";
    $res = mysqli_query($connex, $req);
    $ligne = mysqli_fetch_assoc($res);
    return $ligne['id'];
  }
  function getId_dep($connex, $name){
    $req = "SELECT * FROM departements WHERE name=\"".$name."\";";
    $res = mysqli_query($connex, $req);
    $ligne = mysqli_fetch_assoc($res);
    return $ligne['id'];
  }
  function getId_city($connex, $name){
    $req = "SELECT * FROM cities WHERE name=\"".$name."\";";
    $res = mysqli_query($connex, $req);
    $ligne = mysqli_fetch_assoc($res);
    return $ligne['id'];
  }
 ?>
