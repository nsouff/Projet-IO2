<?php
session_start();
include_once('connex_BD.php');
include_once('affiche_entreprise_à_valider.php');
include_once('gestionEntreprises.php');
include_once('head.php');
include_once('getResp.php');
$resp = getResp();
if ($resp != 2 && $resp != 3){
  if (isset($_SESSION['adresseRetour'])) $header = 'Location: '.$_SESSION['adresseRetour'];
  else $header = 'Location: index.php';
  header($header);
}
$connex=connex_BD();
foreach($_POST as $key => $val) {
  if($val=="suppr") {
    supprEntr($connex,$key);
  }
  else if($val=="valid") {
    validEntr($connex,$key);
  }
}

 ?>


 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="style.css">
     <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
     <title>Approuver les entreprises en attente</title>
   </head>
   <body>
     <?php head(); ?>
       <form action=ApprobationEntreprises.php method=post>
       <table class="tftable" border="1">
         <tr><th>Nom de l'Entreprise</th><th>Email</th><th>Valider</th><th>Supprimer</th></tr>
         <?php EntrepriseNonValidé(connex_BD()); ?>
       </table>
     <input type="submit" value="Envoyer">
     <input type="reset">
     </form>
   </body>
 </html>
