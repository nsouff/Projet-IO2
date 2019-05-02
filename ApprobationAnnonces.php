<?php
session_start();
include_once('connex_BD.php');
include_once('affiche_annonce_à_valider.php');
include_once('aff_annonce_detail.php');
include_once('gestionAnnonces.php');
include_once('getResp.php');
$resp = getResp();
if ($resp != 2 && $resp != 3) header('Location: index.php');
$connex=connex_BD();
$b=isset($_GET['id']);
foreach($_POST as $key => $val) {
  if($val=="suppr") {
    supprAnn($connex,$key);
  }
  else if($val=="valid") {
    validAnn($connex,$key);
  }
}

 ?>


 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Approuver les annonces en attente</title>
   </head>
   <body>
     <?php if (!$b): ?>
       <form action=ApprobationAnnonces.php method=post>
       <table class="tftable" border="1">
         <tr><th>Employeur</th><th>Courte description</th><th>Type de contrat</th><th>Début du contrat</th><th>Fin du contrat</th><th>Intitulé du job</th><th>Annonce détaillée</th><th>Valider</th><th>Supprimer</th></tr>
         <?php afficheNonValidé(connex_BD()); ?>
       </table>


     <?php endif; ?>
     <?php if ($b): ?>
       <?php if($b) {
       aff_annonce_detail(connex_BD(),$_GET['id']);
     } ?>
       <?php endif; ?>
       <input type="submit" name="Envoyer">
     </form>
   </body>
 </html>
