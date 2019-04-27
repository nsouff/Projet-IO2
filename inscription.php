<?php
  include_once('deroul.php');
  include_once('connex_BD.php');
  $connex = connex_BD();
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>SITE - inscription</title>
  </head>
  <body>
    <form class="inscription" action="index.html" method="post">
      <label for="fn">Prénom: </label>
      <input type="text" name="first_name" id="fn">
      <label for="ln">Nom: </label>
      <input type="text" name="last_name" id="ln">
      <label for="email">Email: </label>
      <input type="email" name="email">
      <label for="phone">Téléphone: </label>
      <input type="tel" name="phone" id="phone">
      <?php
        deroul($connex, "regions");
        deroul($connex, "departements");
        deroul($connex, "cities");
        ?>

    </form>
  </body>
</html>
