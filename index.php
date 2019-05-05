<?php
  session_start();
  include_once('connex_BD.php');
  include_once('offres_ville.php');
  include_once('head.php');
  $_SESSION['adresseRetour'] = 'index.php';
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./style.css">
    <title>NOM DU SITE</title>
  </head>
  <body>
    <?php head(); ?>
      <div class="search">
      <form action="search.php" method="get">
        <div class="container">
          <label for="key"><h2>Job</h2></label>
          <input class="" type="text" name="key" placeholder="Mot clé" id="key">
        </div>
        <div class="container">
          <label for="Où"><h2>Où</h2></label>
          <input class="Où" type="text" name="Où" placeholder="Ville, département, régions" id="Où">
          <input type="hidden" name="pages" value="1">
          <input type="submit" value="Chercher">
        </div>
      </form>
    </div>
  </body>
</html>
