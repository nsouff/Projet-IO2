<?php
  include_once('affiche_offre.php');
  include_once('isAlmost.php');
  function offre_search($connex, $job, $type, $reg_id, $dep_id, $city_id, $start_date, $end_date, $n) {
    // $n est la n-ieme page a affiché, si c'est la première on affiche les 20 premières annonce si $n = 4 on affiche les affiches de 81 à 100

    // On écrit qu'une seule fonction qu'elle soit le nombre de paramètre envoyé par l'utilisateur

    // On veut traité $job et les deux dates utlèrieurment car on ne veut pas afficher des avec exactement job==$job de même pour les dates on veut afficher les annonces qui commencent je jour de $start_date ou plus tard, pour $end_date on veut afficher toutes les annonces qui finissent avant la $end_date

    // On ne peut donc pas mettre ces attributs tout de suite dans la requête

    if (useIt($city_id)) $req = "SELECT * FROM announce WHERE city_id=$city_id";
    else if (useIt($dep_id)) $req = "SELECT * FROM announce WHERE departement_id=\"".$dep_id."\"";
    else if (useIt($reg_id)) $req = "SELECT * FROM announce WHERE region_id=$reg_id.";

    // Sinon on n'a pas d'information sur la localisation

    else if (useIt($type)) $req = "SELECT * FROM announce WHERE type=\"$type\"";
    else $req = "SELECT * FROM announce";




    $res = mysqli_query($connex, $req);
    if (mysqli_num_rows($res) == 0){
      echo "<h2>Aucune offre n'a été trouvé</h2>";
    }

    else {
      $zero = array();
      $un = array();
      $deux = array();
      $trois = array();
      while($ligne = mysqli_fetch_assoc($res)){
        if ( ( !useIt($type) || $ligne['type'] == $type ) && ( !useIt($start_date) || $start_date <= $ligne['start_date'] ) && ( !useIt($end_date) || $end_date >= $ligne['end_date'] ) && $ligne['valid']) {
          if (!useIt($job)){
            array_push($trois, $ligne);
          }
          $i = isAlmost($ligne['job'], $job);
          switch($i){
            case 3: array_push($trois, $ligne);break;
            case 2: array_push($deux, $ligne); break;
            case 1: array_push($un, $ligne); break;
            case 0: array_push($zero, $ligne); break;
          }
        }
      }
      $b = affiche_offre(array($trois, $deux, $un, $zero), $n);

      $prev = $n - 1;
      $next = $n + 1;

      $href = "search.php?key=";
      if (isset($job)) $href .= $job;

      $href .= "&type=";
      if (isset($type)) $href .= $type;

      $href .= "&regions=";
      if (isset($job)) $href .= $reg_id;

      $href .= "&departements=";
      if (isset($dep_id)) $href .= $dep_id;

      $href .= "&cities=";
      if (isset($city_id)) $href .= $city_id;

      $href .= "&début=";
      if (isset($start_date)) $href .= $start_date;

      $href .= "&fin=";
      if (isset($end_date)) $href .= $end_date;

      $href .= "&pages=";
      if ($n > 1) echo "<a href=\"$href".$prev."\">Page précédente</a><br>";

      if ($b) echo "<a href=\"$href".$next."\">Pages suivante</a>";
    }

  }


  // Les paramètre passé à la fonction peuvent être vide ou null, on veut donc le savoir sans écrire de long if()
  function useIt($s){
    return (isset($s) && !empty($s));
  }

 ?>
