<?php
  session_start();
  include_once('head.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <style media="screen">
      body{ text-align: center;}
    </style>
    <title>ERREUR 404</title>
  </head>
  <body>
    <?php head(); ?>
    <h1>ERREUR 404</h1>
    <h2>Vous avez dû vous trompez d'url, nous ne trouvons pas la page recherchée</h2>
    <h2>Ne vous inquiétez pas, cela ne se passera pas comme cela pour votre recherche d'emploie! </h2>
    <img src="jobs.jpg" alt="Panneau vers un job">
  </body>
</html>
