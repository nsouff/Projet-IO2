<?php
session_start();
include_once('connex_BD.php');
include_once('head.php');
include_once('getResp.php');
include_once('modifCompte.php');
$resp=getResp();
$connex=connex_BD();
echo $resp;
$b=isset($_POST['mdp']);
if($resp!=4) {
   header('Location: index.php');
 }
 else {
   $name=$_SESSION['announcer_name'];
 }

if($b) {
  $mdp=password_hash($_POST['mdp'], PASSWORD_DEFAULT);
  modifCompteEntr($connex,$mdp,$name);
  header('Location: index.php');
} ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifiez votre compte</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php head(); ?>
    <h3>Ici vous pouvez modifier votre mot de passe</h3>
    <form action='compte_entr.php' method=post>
      <label for=mdp>Nouveau mot de passe:</label>
      <input type='password' name='mdp'>
      <br>
      <input type='submit'>
    </form>
    <br> <br> <br>
    <a href=suppressionEntr.php>Cliquez ici pour supprimer votre compte entreprise</a>
  </body>
</html>
