<?php
session_start();
include_once('head.php');
include_once('connex_BD.php');
include_once('supprCompte.php');
$resp=getResp();
$connex=connex_BD();
echo $resp;
if($resp==4 || $resp==0 || $resp==3) {
   header('Location: index.php');
 }
$b=isset($_GET['suppr']);
$id=$_SESSION['id'];
if($b) {
  supprUser($connex,$id);
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
     <h1>Voulez vous vraiment supprimer votre compte</h1>
     <h3>Il n'y aura pas de retour en arrière possible</h3>
     <a href=suppressionUser.php?suppr=oui>Cliquez ici pour supprimer définitivement votre compte</a>
   </body>
 </html>
