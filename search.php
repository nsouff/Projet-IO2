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
  $b = (isset($_GET['key']) && isset($_GET['Où']));
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
      if (isset($_GET['key'])){
        if (isset($_GET['Où'])){ // i.e on a $b true
          $i = locate($connex, $où);
          if ($i != -1) $id = getId($connex, $où, $i);
          switch ($i) {
            case -1: erreur(); break;
            case 0: offre_search($connex, $key, "", $id, "", "", "", "", 20); break;
            case 1: offre_search($connex, $key, "", "", $id, "", "", "", 20); break;
            case 2: offre_search($connex, $key, "", "", "", $id, "", "", 20); break;
          }
        }
        if (!isset($_GET['début']) || !isset($_GET['fin'])) header('Location: search.php'); // Si l'utilisateur ne tape pas ce qu'il veut dans la barre de recherche il devrait être set (mais peuvent être empty)
        if (isset($_GET['cities'])){

          if (isset($_GET['type'])){
            offre_search($connex, $_GET['key'], $_GET['type'], "", "", $_GET['cities'], $_GET['début'], $_GET['fin'], 20);
          }

          else {
            offre_search($connex, $_GET['key'], "", "", "", $_GET['cities'], $_GET['début'], $_GET['fin'], 20);
          }

        }

        else if (isset($_GET['departements'])){

          if (isset($_GET['type'])){
            offre_search($connex, $_GET['key'], $_GET['type'], "", $_GET['departemnts'], "", $_GET['début'], $_GET['fin'], 20);
          }

          else {
            offre_search($connex, $_GET['key'], "", "", $_GET['departemnts'], "", $_GET['début'], $_GET['fin'], 20);
          }

          else if (isset($_GET['regions'])){

            if (isset($_GET['type'])){
              offre_search($connex, $_GET['key'], $_GET['type'], $_GET['regions'], "", "", $_GET['début'], $_GET['fin'], 20);
            }

            else {
              offre_search($connex, $_GET['key'], "", $_GET['regions'], "", "", $_GET['début'], $_GET['fin'], 20);
            }
          }

        else {
          if isset($_GET['type']){
            offre_search($connex, $_GET['key'], $_GET['type'], "", "", "", $_GET['début'], $_GET['fin'], 20);
          }
          else {
            offre_search($connex, $_GET['key'], "", "", "", "", $_GET['début'], $_GET['fin'], 20);
          }
        }

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
