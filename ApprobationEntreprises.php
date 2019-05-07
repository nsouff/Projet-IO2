<?php
//Sur cette page administrateurs et root peuvent valider ou supprimer les comptes entreprises.
session_start();
include_once('connex_BD.php');
include_once('affiche_entreprise_à_valider.php');
include_once('gestionEntreprises.php');
include_once('head.php');
include_once('getResp.php');
$resp = getResp();
//Si la session n'est ni admin ni root elle retourne à l'adresse précédente.
if ($resp != 2 && $resp != 3){
  if (isset($_SESSION['adresseRetour'])) $header = 'Location: '.$_SESSION['adresseRetour'];
  else $header = 'Location: index.php';
  header($header);
}
$connex=connex_BD();
//Pour tous les élements du tableau, si la valeur est suppr on supprime, si la valeur est val on valide.
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
     <a href="#" class="go_top">^</a>
     <div class="espace_admin">
        <form action=ApprobationEntreprises.php method=post>
          <input type="submit" value="Envoyer" class="input_validation">
          <input type="reset" class="input_validation" value="Réinitialiser">
          <table class="tftable">
            <tr><th>Nom de l'Entreprise</th><th>Email</th><th>Valider</th><th>Supprimer</th></tr>
            <?php EntrepriseNonValidé(connex_BD()); ?>
          </table>
        </form>
      </div>

   </body>
 </html>
