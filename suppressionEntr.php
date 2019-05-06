<?php
session_start();
include_once('head.php');
include_once('connex_BD.php');
include_once('supprCompte.php');
$resp=getResp();
$connex=connex_BD();
if($resp!=4) header('Location: index.php');
$b=isset($_GET['suppr']);
$name=$_SESSION['announcer_name'];
if($b) {
  $name=str_replace("_"," ",$name);
  supprEntr($connex,$name);
  header('Location: deconnexion.php');
}

 ?>

 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Supprimer votre compte</title>
     <link rel="stylesheet" href="style.css">
   </head>
   <body>
     <?php head(); ?>
     <h1>Voulez vous vraiment supprimer votre compte entreprise</h1>
     <h3>Il n'y aura pas de retour en arrière possible</h3>
     <a href=suppressionEntr.php?suppr=oui>Cliquez ici pour supprimer définitivement votre compte</a>
   </body>
 </html>
