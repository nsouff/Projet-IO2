<?php
  include_once('connex_BD.php');
  include_once('offres_ville.php');
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./style.css">
    <title>NOM DU SITE</title>
  </head>
  <body>
    <header class="menu">
      <h1>NOM DU SITE</h1>
      <nav>
        <a href="">Trouver un emploie</a>
        <a href="">Entreptise - Publier une annonce</a>
        <a href="inscription.php">S'inscrire</a>
        <!-- <a href="">Etc...</a> -->
      </nav>
    </header>
    <nav class="go_top">
      <a href="#">^^</a>
    </nav>
    <div class="search">
      <form action="search.php" method="get">
        <div class="container">
          <label for="key"><h2>Job</h2></label>
          <input class="" type="text" name="key" placeholder="Mot clé" id="key">
        </div>
        <div class="container">
          <label for="Où"><h2>Où</h2></label>
          <input class="Où" type="text" name="Où" placeholder="Ville, département, régions" id="Où">
          <input type="submit" value="chercher">
        </div>
      </form>
    </div>
  </body>
</html>
