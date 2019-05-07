<?php
//Sur cette page on peut cliquer sur un lien pour supprimer son compte utilisateur.
session_start();
include_once('head.php');
include_once('connex_BD.php');
include_once('supprCompte.php');
$resp=getResp();
$connex=connex_BD();
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
     <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
   </head>
   <body>
     <?php head(); ?>
     <div class="suppression">
      <h1>Voulez vous vraiment supprimer votre compte</h1>
      <h3>Il n'y aura pas de retour en arrière possible</h3>
      <a href="suppressionUser.php?suppr=oui">Cliquez ici pour supprimer définitivement votre compte</a>
    </div>
   </body>
 </html>
