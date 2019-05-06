<?php
session_start();
include_once('connex_BD.php');
include_once('head.php');
include_once('getResp.php');
include_once('modifCompte.php');
$resp=getResp();
$connex=connex_BD();
$_SESSION ['adresseRetour']='index.php';
$adresseRetour=$_SESSION['adresseRetour'];

$b=isset($_POST['mdp']) && isset($_POST['numero']);
if($resp==0 || $resp==4) {
   header('Location : index.php');
 }
 else {
   $id=$_SESSION['id'];
   $ancien=$_SESSION['numero'];
 }

if($b) {
  $mdp=password_hash($_POST['mdp'], PASSWORD_DEFAULT);
  $numero=mysqli_real_escape_string($connex,$_POST['numero']);
  modifCompte($connex,$mdp,$numero,$id);
  $_SESSION['numero']=$numero;
  header('Location: '.$adresseRetour);
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
    <h3>Ici vous pouvez modifier votre numéro de téléphone et votre mot de passe</h3>
    <form action='compte.php' method=post>
      <label for=mdp>Nouveau mot de passe:</label>
      <input type='password' name='mdp'>
      <br>
      <label for='num'>Nouveau numéro de téléphone</label>
      <input type='text' name='numero' value=<?php echo "".$ancien; ?>>
      <input type='submit'>
    </form>
    <br><br><br>
    <a href="suppressionUser.php">Cliquez ici pour supprimer votre compte </a>
  </body>
</html>
