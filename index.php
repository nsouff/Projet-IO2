<?php
  include_once('connex_BD.php');
  include_once('offres_ville.php');
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>NOM DU SITE</title>
  </head>
  <body>
    <?php
      $connex = connex_BD();
      offres_ville($connex, '1494');
     ?>
  </body>
</html>
