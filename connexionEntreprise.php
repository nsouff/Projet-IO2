<?php
session_start();
include_once('connex_BD.php');
include_once('getResp.php');
include_once('login.php');
include_once('head.php');
if (getResp() != 0) header('index.php');
$connex=connex_BD();
$b= (isset($_POST['mail']) && isset($_POST['mdp']));
$a=false;
if($b) {
  $a=verifLogin(mysqli_real_escape_string($connex, $_POST['mail']),$_POST['mdp'],"announcer");
  if($a) {
    $_SESSION['mail']=$_POST['mail'];
    if (!isset($_SESSION['adresseRetour'])) $_SESSION['adresseRetour']='index.php';
    $infos=récupAnnouncer($_POST['mail']);
    $_SESSION['announcer_name']=$infos['name'];
    $_SESSION['valid']=$infos['valid'];
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
    <title>Connexion Entreprise</title>
  </head>
  <body>
    <?php
    head();
    echo "<div class=\"login\">";
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
    </form>';
    echo "<p>Pas encore inscrit? <a href=\"inscription_entr.php\">Inscrivez vous</a></p>";}
      ?>
    </div>
  </body>
</html>
