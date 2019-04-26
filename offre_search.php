<?php
  include_once('affiche_annonce.php');
  function offre_search($connex, $job, $type, $reg_id, $dep_id, $city_id, $start_date, $end_date) {
    // On écrit qu'une seule fonction qu'elle soit le nombre de paramètre envoyé par l'utilisateur
    if (!empty($city_id)) $req = "SELECT * FROM announce WHERE city_id=\"".$city_id."\";";
    else if (!empty($departement_id)) $req = "SELECT * FROM announce WHERE departement_id=\"".$dep_id."\";";
    else if (!empty($regions)) $req = "SELECT * FROM announce WHERE region_id=\"".$reg_id."\";";
    else {
      // Demander d'insérer un lieu
      // Afficher un nouveau formulaire
      exit;
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
      affiche_offre(array($trois, $deux, $un, $zero), 10);
    }

  }

  // Si un utilisateur cherche Vendur au lieu de Vendeur on veut tout de même qu'il trouve les annonces pour vendeur, on écrit donc une fonction qui teste si deux String sont presque pareil
  function isAlmost($var, $fixe){
    // $var sera une annonce de la BD, $fixe sera la cherche de l'utilisateur
    // On veut donner un degré de ressemblance entre les deux String
    /* Valeur de retour
     * 3 si elles sont égales
     * 2-0 de très ressemblant à un peu
     * -1 signifie qu'on ne voit aucune ressemblance
    */
    if ($var == $fixe) return 3;
    $l = levenshtein($var, $fixe);
    if ($l == 1) return 2;
    similar_text($var, $fixe, $perc1);
    similar_text($fixe, $var, $perc2);
    if ($perc1 > $perc2) $perc = $prec1;
    else $perc = $perc2;
    if ($perc >= 90 || $l <= 3) return 1;
    if ($perc >= 70 || $l < 5) return 0;
    return -1;
  }
  function affiche_offre($tab, $n){
    // $n est le nombre de ligne que l'on veut afficher
    // $tab est un tableau de tableau de tableau, il contient 4 tableau le premier contient les offres les plus pertinentes et le dernier celles qui le sont moins
    $i = 0;
    foreach ($tab as $value) {
      foreach ($value as $val) {
        if ($i >= $n)  break;
        $i++;
        affiche_annonce($val);
      }
      if ($i >= $n) break;
    }
  }

 ?>
