<?php
session_start();
include_once('getResp.php');
include_once('head.php');
include_once('connex_BD.php');
$resp = getResp();
$connex = connex_BD();
include_once('login.php');
$b= (isset($_POST['mail']) && isset($_POST['mdp']));
$a=false;
if($b) {
  $a=verifLogin(mysqli_real_escape_string($connex, $_POST['mail']),$_POST['mdp'],"user");
  if($a) {
    $_SESSION['mail']=$_POST['mail'];
    $infos=récupUser($_POST['mail']);
    $_SESSION['prénom']=$infos['first_name'];
    $_SESSION['nom']=$infos['last_name'];
    $_SESSION['id']=$infos['id'];
    $_SESSION['level']=$infos['level'];
    $_SESSION['numero']=$infos['phone_number'];
    if (empty($_SESSION['adresseRetour'])) $_SESSION['adresseRetour']='index.php';
    $return='Location: '.$_SESSION['adresseRetour'];
    header($return);
  }
}
 ?>




<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Connexion</title>
  </head>
  <body>
    <?php
    head();
    echo "<div class=\"login\">";
    if ($resp == 4){
      echo "<h1>Vous êtes connecté en tant qu'entreprise</h1>\n<br>\n<a href=\"deconnexion.php\">voulez vous vous deconnectez?</a>";
    }
    else if ($resp <= 3 && $resp >= 1){
      echo "<h1>Vous êtes déjà connectez</h1><br><a href=\"compte.php\">Accédez à votre compte</a>";
    }
    else {
      if (!$a && $b) echo "<h4>Identifiants incorrect</h4>";
      if (!$b || !$a) {
        echo '<h1> Connectez vous à votre compte Chercheur d\'emploi </h1>
        <form action=page_login.php method=POST>
        <label for="e">Adresse mail:</label>
        <input type=email name=mail id=e>
        <br>
        <label for"a">Mot de passe:</label>
        <input type=password name=mdp id=a>
        <br>
        <input type=submit>
        </form>
        <p>Pas encore inscrit? <a href="inscription.php">Inscrivez vous</a></p>'; }
      if (!$a) {

      }
    }

    ?>
  </div>
  </body>
</html>
