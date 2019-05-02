<?php
  include_once('affiche_offre.php');
  include_once('isAlmost.php');
  function offre_search($connex, $job, $type, $reg_id, $dep_id, $city_id, $start_date, $end_date, $n) {
    // $n est le nombre d'annonce maximum que l'on veut afficher

    // On écrit qu'une seule fonction qu'elle soit le nombre de paramètre envoyé par l'utilisateur

    if (!empty($city_id)) $req = "SELECT * FROM announce WHERE city_id=$city_id;";
    else if (!empty($dep_id)) $req = "SELECT * FROM announce WHERE departement_id=\"".$dep_id."\";";
    else if (!empty($reg_id)) $req = "SELECT * FROM announce WHERE region_id=$reg_id.;";

    else {
      // Demander d'insérer un lieu
      // Afficher un nouveau formulaire
      // exit;
    }

    $res = mysqli_query($connex, $req);
    if (mysqli_num_rows($res) == 0){
      // affiche aucune offre dans la ville
      // Envoie nouveau formulaire
    }

    else {
      $zero = array();
      $un = array();
      $deux = array();
      $trois = array();
      while($ligne = mysqli_fetch_assoc($res)){
        if ( ( empty($type) || $ligne['type'] == $type ) && ( empty($start_date) || $start_date == $ligne['start_date'] ) && ( empty($end_date) || $end_date == $ligne['end_date'] ) ) {
          $i = isAlmost($ligne['job'], $job);
          switch($i){
            case 3: array_push($trois, $ligne);break;
            case 2: array_push($deux, $ligne); break;
            case 1: array_push($un, $ligne); break;
            case 0: array_push($zero, $ligne); break;
          }
        }
      }
      affiche_offre(array($trois, $deux, $un, $zero), $n);
    }

  }

 ?>
