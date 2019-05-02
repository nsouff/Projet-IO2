<?php
session_start();
include_once('getResp.php');
include_once('head.php');
$resp = getResp();

include_once('login.php');
$b= (isset($_POST['mail']) && isset($_POST['mdp']));
$a=false;
if($b) {
  $a=verifLogin($_POST['mail'],$_POST['mdp'],"user");
  if($a) {
    $_SESSION['mail']=$_POST['mail'];
    $_SESSION['adresseRetour']='annonce.php?id=1';
    $infos=récupUser($_POST['mail']);
    $_SESSION['prénom']=$infos['first_name'];
    $_SESSION['nom']=$infos['last_name'];
    $_SESSION['id']=$infos['id'];
    $_SESSION['level']=$infos['level'];
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
    <link rel="stylesheet" href="style.css">
    <title>Page de Login</title>
  </head>
  <body>
    <?php
    head();
    if ($resp == 4){
      echo "<h1>Vous êtes connecté en tant qu'entreprise</h1>\n<br>\n<a href=\"compte.php\">voulez vous vous deconnectez?</a>";
    }
    else if ($resp <= 3 && $resp >= 1){
      echo "<h1>Vous êtes déjà connectez</h1><br><a href=\"compte.php\">Accédez à votre compte</a>";
    }
    else {

      if (!$b) {
        echo '<h1> Connectez vous à votre compte Chercheur d\'emploi </h1>
        <form action=page_login.php method=POST>
        <label for="e">Adresse mail:</label>
        <input type=email name=mail id=e>
        <br>
        <label for"a">Mot de passe:</label>
        <input type=password name=mdp id=a>
        <br>
        <input type=submit>
        </form>'; }
      if ($a) {
          echo $_SESSION['prénom'];
          echo $_SESSION['nom'];
          echo $_SESSION['mail'];
      }
    }

    ?>

  </body>
</html>
