<?php
  include_once('connex_BD.php');
  include_once('offres_ville.php');
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>NOM DU SITE</title>
  </head>
  <body>
    <header class="menu">
      <h1>NOM DU SITE</h1>
      <nav>
        <a href="">Trouver un emploie</a>
        <a href="">Entreptise - Publier une annonce</a>
        <!-- <a href="">Partie du site 3</a> -->
        <!-- <a href="">Etc...</a> -->
      </nav>
    </header>
    <form class="" action="index.php" method="post">
      <input type="text" name="" value="">
    </form>
    <div class="annonces">
      <?php
        $connex = connex_BD();
        offres_ville($connex, '1494', 4);
      ?>
    </div>
  </body>
</html>
