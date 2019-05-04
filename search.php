<?php
  session_start();
  include_once('connex_BD.php');
  include_once('offre_search.php');
  include_once('locate.php');
  include_once('filtre.php');
  include_once('erreur.php');
  include_once('getId.php');
  include_once('getResp.php');
  include_once('head.php');
  $_SESSION['adresseRetour'] = 'search.php';
  $b = (isset($_GET['key']) && isset($_GET['Où']) && !empty($_GET['Où']));
  if ($b){
    // Lorsqu'on à $b on à une recherche qui vient de l'index du site

    $key = $_GET['key'];
    $où = $_GET['Où'];
    $_SESSION['adresseRetour'] .= '?key='.$key.'&Où='.$où;
  }
  $connex = connex_BD();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>SITE - emploie</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      head();
      if ($b){
        $i = locate($connex, $où);
        if ($i != -1) $id = getId($connex, $où, $i);
        switch ($i) {
          case -1: erreur(); break;
          case 0: offre_search($connex, $key, "", $id, "", "", "", "", 20); break;
          case 1: offre_search($connex, $key, "", "", $id, "", "", "", 20); break;
          case 2: offre_search($connex, $key, "", "", "", $id, "", "", 20); break;
        }
      }
      else {
        if (isset($_GET['key'])) $key = $_GET['key'];
        else $key = null;
        if (isset($_GET['type'])) $type = $_GET['type'];
        else $type = null;
        if (isset($_GET['regions'])) $regions = $_GET['regions'];
        else $regions = null;
        if (isset($_GET['departements'])) $dep = $_GET['departements'];
        else $dep = null;
        if (isset($_GET['cities'])) $cit = $_GET['cities'];
        else $cit = null;
        if (isset($_GET['début'])) $début = $_GET['début'];
        else $début = null;
        if (isset($_GET['type'])) $fin = $_GET['fin'];
        else $fin = null;
        if (isset($_GET['pages'])) $n = $_GET['pages'];
        else $n = 1;
        offre_search($connex, $key, $type, $regions, $dep, $cit, $début, $fin, $n);
      }

      echo "<h2>Filtre</h2>";
      echo "<form action=\"search.php\" method=\"get\">\n";
      echo "<input type=\"submit\">";
      echo "<input type=\"reset\">";
      echo "<label for=\"key\">Job</label><input type=\"text\" id=\"key\" name=\"key\">\n";
      print_filtre($connex);
      echo "</form>";
     ?>
  </body>
</html>
