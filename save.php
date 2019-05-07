<?php
  include_once('known_email.php');
  /* $connex est la connexion
   * $fn le prénom
   * $ln le nom
   * $em l'email
   * $ph le numéro de télephone
   * $reg l'id d'une région,
   * $dep l'id d'un département
   * $cit l'id d'une ville
   */
  function save($connex, $fn, $ln, $em, $ph, $reg, $dep, $cit, $pass) {
    if (known_email($connex, $em)) echo "Vous êtes déjà inscrit";
    else {
      $req = "INSERT INTO user (first_name, last_name, email, phone_number, region_id, departement_id, city_id, password) VALUES (\"$fn\", \"$ln\", \"$em\", $ph, $reg, \"$dep\", $cit, \"$pass\")";
      $res = mysqli_query($connex, $req);
      if (!$res) echo "erreur";
      else echo "enregistré";
    }
  }
  function save2($connex,$announcer,$long,$short,$type,$start,$end,$job,$reg,$dep,$cit) {
    $b = true;
    if ($type == 'CDD'){
      if (empty($start) || empty($end)) {
        echo "<h3 class=\"center\">Erreur, veuillez choisir une date pour un CDD ou choisir un CDI</h3>";
        $b = false;
      }
      else if ((int)str_replace('-', '', $start) > (int)str_replace('-', '', $end)) {
        echo "<h3 class=\"center\">Erreur, l'annonce demandé finis avant qu'elle ne commence</h3>";
        $b = false;
      }
      else $req = "INSERT INTO announce (announcer, short_description, long_description, type, start_date, end_date, job, region_id, departement_id, city_id) VALUES (\"$announcer\", \"$short\", \"$long\", \"$type\", \"$start\", \"$end\", \"$job\", $reg, \"$dep\", $cit)";
    }
    else if ($type == 'CDI'){
      if ($end != NULL){
        echo "<h3 class=\"center\">Erreur, Choisissez un CDD ou ne séléctionnez pas de date de fin</h3>";
        $b = false;
      }
      else if (!empty($start)) $req = "INSERT INTO announce (announcer, short_description, long_description, type, start_date, job, region_id, departement_id, city_id) VALUES (\"$announcer\", \"$short\", \"$long\", \"$type\", \"$start\", \"$job\", $reg, \"$dep\", $cit)";

      else $req = "INSERT INTO announce (announcer, short_description, long_description, type, job, region_id, departement_id, city_id) VALUES (\"$announcer\", \"$short\", \"$long\", \"$type\", \"$job\", $reg, \"$dep\", $cit)";
    }

    if ($b) {
      $res= mysqli_query($connex, $req);
      if (!$res) echo "<h3 class=\"center\">Erreur lors de l'enregistrement dans la base de donnée</h3>";
      else echo "<h3 class=\"center\">Enregistré</h3>";

    }
  }

 ?>
