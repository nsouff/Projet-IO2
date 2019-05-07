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
  if (isset($_SESSION['adresseRetour'])) header('Location: '.$adresseRetour);
  else header('Location: index.php');
} ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifiez votre compte</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  </head>
  <body>
    <?php head(); ?>
    <div class="modifCompte">

      <h3>Ici vous pouvez modifier votre numéro de téléphone et votre mot de passe</h3>
      <form action='compte.php' method=post>
        <label for="mdp">Nouveau mot de passe:</label>
        <input type='password' name='mdp' id="mdp" class="compte_text_input">
        <br>
        <label for='num'>Nouveau numéro de téléphone</label>
        <input class="compte_text_input" type='text' name='numero' pattern="0[0-9]{9}" id="num" value=<?php echo "".$ancien; ?>>
        <br>
        <input type='submit'>
      </form>
      <a href="suppressionUser.php">Cliquez ici pour supprimer votre compte </a><br>
      <p><strong>ATTENTION! cette suppression est irrévocable</strong></p>
    </div>
  </body>
</html>
