<?php
  session_start();
  include_once('connex_BD.php');
  include_once('offre_search.php');
  include_once('locate.php');
  include_once('erreur.php');
  include_once('getId.php');
  include_once('getResp.php');
  include_once('head.php');
  $b = (isset($_GET['key']) && isset($_GET['Où']));
  $_SESSION['adresseRetour'] = 'search.php';
  if ($b){
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
          case 0: offre_search($connex, $key, "", $id, "", "", "", "", 10); break;
          case 1: offre_search($connex, $key, "", "", $id, "", "", "", 10); break;
          case 2: offre_search($connex, $key, "", "", "", $id, "", "", 10); break;
        }
      }
     ?>
  </body>
</html>
