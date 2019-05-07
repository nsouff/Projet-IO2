<?php
//Sur cette page administrateurs et root peuvent valider ou supprimer les annonces non validées.
session_start();
include_once('connex_BD.php');
include_once('affiche_annonce_à_valider.php');
include_once('aff_annonce_detail.php');
include_once('gestionAnnonces.php');
include_once('getResp.php');
include_once('head.php');
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
     <link rel="stylesheet" href="style.css">
     <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
     <title>Approuver les annonces en attente</title>
   </head>
   <body>
     <?php if (!$b) echo "<a href=\"#\" class=\"go_top\">^</a>"?>
     <?php head(); ?>
     <div class=<?php if (!$b) echo "\"espace_admin\""; else echo "\"page_annonce\"" ?>>
     <?php if (!$b): ?>

        <form action=ApprobationAnnonces.php method=post>
          <input type="submit" value="Envoyer" class="input_validation">
          <input type="reset" class="input_validation" value="Réinitialiser">
          <table class="tftable">
            <tr><th>Employeur</th><th>Courte description</th><th>Type de contrat</th><th>Début du contrat</th><th>Fin du  contrat</th><th>Intitulé du job</th><th>Annonce  détaillée</th><th>Valider</th><th>Supprimer</th></tr>
            <?php afficheNonValidé(connex_BD()); ?>
          </table>
        </form>


     <?php endif; ?>
       <?php if($b) {
       aff_annonce_detail(connex_BD(),$_GET['id']);
     } ?>
      </div>
   </body>
 </html>
