<?php
session_start();
include_once('connex_BD.php');
include_once('head.php');
include_once('getResp.php');
include_once('modifCompte.php');
$resp=getResp();
$connex=connex_BD();
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
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  </head>
  <body>
    <?php head(); ?>
    <div class="modifCompte">
      <h3>Ici vous pouvez modifier votre mot de passe</h3>
      <form action='compte_entr.php' method=post>
        <label for=mdp>Nouveau mot de passe:</label>
        <input class="compte_text_input" type='password' name='mdp' id="mdp">
        <br>
        <input type='submit' value="Valider">
      </form>
      <a href=suppressionEntr.php>Cliquez ici pour supprimer votre  compte entreprise</a><br>
      <p><strong>ATTENTION! Cette suppression est irrévocable</strong></p>
    </div>
  </body>
</html>
