<?php
session_start();
include_once('login.php');
$b= (isset($_POST['mail']) && isset($_POST['mdp']));
$a=false;
if($b) {
  $a=verifLogin($_POST['mail'],$_POST['mdp'],"announcer");
  if($a) {
    $_SESSION['mail']=$_POST['mail'];
    //$_SESSION['adresseRetour']='http://localhost/io2/projet-io2/inscription.php';
    $infos=récupAnnouncer($_POST['mail']);
    $_SESSION['announcer_name']=$infos['name'];
    $return='Location: '.$_SESSION['adresseRetour'];
    header($return);
    exit();
  }
}
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Page de Login</title>
  </head>
  <body>
    <?php

    if (!$a) {
      if($b) echo "vos identifiants sont faux";
    echo '<h1> Connectez vous à votre compte Entreprise </h1>
    <form action=connexionEntreprise.php method=POST>
      <label for="e">Adresse mail:</label>
      <input type=email name=mail id=e>
      <br>
      <label for"a">Mot de passe:</label>
      <input type=password name=mdp id=a>
      <br>
      <input type=submit>
    </form>'; }
      ?>

  </body>
</html>
