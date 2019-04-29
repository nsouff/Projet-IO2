<?php
  include_once('nTabulation.php');
  include_once('save_entr.php');
  include_once('connex_BD.php');
  $connex = connex_BD();
  $b = (isset($_POST['name']) && isset($_POST['adresse']) && isset($_POST['email']) && isset($_POST['password']));

  if ($b){
    $n = mysqli_real_escape_string($connex, $_POST['name']);
    $adr = mysqli_real_escape_string($connex, $_POST['adresse']);
    $em = mysqli_real_escape_string($connex, $_POST['email']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
  }


 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>SITE - Sign in Entreprise</title>
  </head>
  <body>
    <?php if ($b): save_entr($connex, $n, $adr, $em, $pass)?>

    <?php else: ?>
      <form action="inscription_entr.php" method="post">
        <label for="name">Nom de l'entreprise: </label>
        <input type="text" name="name" id="name">
        <label for="adresse">Adresse du et code postal du siège: </label>
        <input type="text" name="adresse" id="adresse">
        <label for="email">Email: </label>
        <input type="email" name="email"id="email">
        <label for="password">Mot de passe: </label>
        <input type="password" name="password"  id="password">
        <input type="submit">
      </form>
  <?php endif; ?>
  </body>
</html>
