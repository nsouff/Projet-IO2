<?php
  session_start();
  include_once('connex_BD.php');
  include_once('head.php');
  $_SESSION['adresseRetour'] = 'index.php';
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>YES</title>
  </head>
  <body>
    <?php head(); ?>
      <div class="search">
      <form action="search.php" method="get">
        <div class="container">
          <h2><label for="key">Job</label></h2>
          <input class="" type="text" name="key" placeholder="Mot clé" id="key">
        </div>
        <div class="container">
          <h2><label for="Où">Où</label></h2>
          <input class="Ou" type="text" name="Où" placeholder="Ville, département, région" id="Où">
          <input type="hidden" name="pages" value="1">
        </div>
        <div class="container">
          <input class="chercher" type="submit" value="Chercher">

        </div>
      </form>
    </div>
  </body>
</html>
