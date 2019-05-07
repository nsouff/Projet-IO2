<?php
  session_start();
  include_once('connex_BD.php');
  include_once('offre_search.php');
  include_once('locate.php');
  include_once('filtre.php');
  include_once('getId.php');
  include_once('getResp.php');
  include_once('head.php');
  $_SESSION['adresseRetour'] = 'search.php';
  $b = (isset($_GET['key']) && isset($_GET['Où']) && !empty($_GET['Où']));
  $connex = connex_BD();
  if ($b){
    // Lorsqu'on à $b on à une recherche qui vient de l'index du site

    $key = mysqli_real_escape_string($connex, $_GET['key']);
    $où = mysqli_real_escape_string($connex, $_GET['Où']);
    $_SESSION['adresseRetour'] .= '?key='.$key.'&Où='.$où;
  }
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Emploie</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  </head>
  <body>
    <?php
      head();
      echo "<a href=\"#\" class=\"go_top\">^</a>";
      echo "<div class=\"res_search\">\n<h2>Résultat</h2>\n";
      if ($b){
        $i = locate($connex, $où);
        if ($i != -1) $id = getId($connex, $où, $i);
        switch ($i) {
          case -1: echo "<h3>Le lieu que vous cherchez nous est inconnue</h3>"; break;
          case 0: offre_search($connex, $key, "", $id, "", "", "", "", 1); break;
          case 1: offre_search($connex, $key, "", "", $id, "", "", "", 1); break;
          case 2: offre_search($connex, $key, "", "", "", $id, "", "", 1); break;
        }
      }
      else {
        if (isset($_GET ['key'])) $key = mysqli_real_escape_string($connex, $_GET['key']);
        else $key = null;
        if (isset($_GET['type'])) $type = mysqli_real_escape_string($connex, $_GET['type']);
        else $type = null;
        if (isset($_GET['regions'])) $regions = mysqli_real_escape_string($connex, $_GET['regions']);
        else $regions = null;
        if (isset($_GET['departements'])) $dep = mysqli_real_escape_string($connex, $_GET['departements']);
        else $dep = null;
        if (isset($_GET['cities'])) $cit = mysqli_real_escape_string($connex, $_GET['cities']);
        else $cit = null;
        if (isset($_GET['début'])) $début = mysqli_real_escape_string($connex, $_GET['début']);
        else $début = null;
        if (isset($_GET['type'])) $fin = mysqli_real_escape_string($connex, $_GET['fin']);
        else $fin = null;
        if (isset($_GET['pages'])) $n = mysqli_real_escape_string($connex, $_GET['pages']);
        else $n = 1;
        offre_search($connex, $key, $type, $regions, $dep, $cit, $début, $fin, $n);
      }
      echo "</div>";

      echo "<div class=\"filtre\">";
      echo "<h2>Filtre</h2>";
      echo "<form action=\"search.php\" method=\"get\">\n";
      echo "<input type=\"submit\" value=\"Chercher\" class=\"chercher_filtre\">";
      echo "<input type=\"reset\"><br>";
      echo "<label for=\"key\"><strong>Job: </strong></label><input type=\"text\" id=\"key\" name=\"key\">\n";
      print_filtre($connex);
      echo "</form>";
      echo "</div>";
     ?>
  </body>
</html>
