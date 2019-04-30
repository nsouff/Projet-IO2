<?php
  include_once('aff_annonce_detail.php');
  include_once('connex_BD.php');
  if (!isset($_GET['id'])) {
    header('LOCATION: index.php');
  }
  else $id = $_GET['id'];
  $connex = connex_BD();
 ?>
 <!DOCTYPE html>
 <html lang="fr">
   <head>
     <meta charset="utf-8">
     <title>SITE - annonce</title>
   </head>
   <body>
     <?php aff_annonce_detail($connex, $id); ?>
   </body>
 </html>
