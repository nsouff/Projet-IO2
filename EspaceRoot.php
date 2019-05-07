<?php
//Ici le root peut promouvoir des utilisateurs an rang d'admin ou à l'inverse rétrograder des admins.
session_start();
include_once('head.php');
include_once('connex_BD.php');
include_once('affiche_admin.php');
include_once('gestionAdmin.php');
include_once('getResp.php');
include_once('isUser.php');
$resp = getResp();
if ($resp != 3) header('Location: index.php');
$connex=connex_BD();
foreach($_POST as $key => $val) {
  if($val=="retro") {
    RetrograderAdmin($connex,$key);
  }
}
$b=isset($_POST['prom']);

if($b) {
  $prom=mysqli_real_escape_string($connex, $_POST['prom']);
  $c=isUser($connex,$prom);
  if($c) PromouvoirAdmin($connex,$prom);
}


 ?>


 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Espace Root</title>
     <link rel="stylesheet" href="style.css">
     <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
   </head>
   <body>
     <?php head(); ?>
     <a href="#" class="go_top">^</a>
     <div class="espace_admin">
       <form action=EspaceRoot.php method=post>
         <input type="submit" class="input_validation" value="Valider"><input type="reset" class="input_validation" value="Réinitialiser">
         <table class="tftable">
           <tr><th>Prénom</th><th>Nom de famille</th><th>Email</th><th>Rétrograder</th></tr>
           <?php afficheAdmin($connex); ?>
         </table>
         <br>
         <label for="prom">Rentrez ici le mail de l'utilisateur que vous voulez promouvoir administrateur:</label>
         <input type="text" name="prom" id="prom"><br>
       </form>
     </div>
   </body>
 </html>
