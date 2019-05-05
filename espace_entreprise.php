<?php
  session_start();
  include_once('connex_BD.php');
  include_once('getAnnounce.php');
  include_once('affiche_annonce.php');
  include_once('affiche_postulant.php');
  include_once('getResp.php');
  include_once('head.php');
  $connex = connex_BD();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
    <title>SITE - espace entreprise</title>
  </head>
  <body>
    <?php head(); ?>
    <?php
      if (getResp() != 4) echo "<h1>Vous n'êtes pas connecté</h1><a href=\"connexionEntreprise.php\">Connectez vous</a>";
      else {
        $res = getAnnounce($connex, $_SESSION['announcer_name']);
        while ($ligne = mysqli_fetch_assoc($res)){
          echo "Pour l'annonce: \n";
          echo "<ul>";
          affiche_annonce($ligne);
          affiche_postulant($connex, $ligne['id']);
          echo "</ul>";
        }
      }
     ?>
  </body>
</html>
