<?php
//Cette page détruit la session et renvoie à l'index, elle fait office de déconnexion.
  session_start();
  session_destroy();
  header('Location: index.php');
 ?>
