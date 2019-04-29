<?php
  include_once('deroul.php');
  include_once('connex_BD.php');
  include_once('save_user.php');
  $connex = connex_BD();
  $b = (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['regions']) && isset($_POST['departements']) && isset($_POST['cities']) && isset($_POST['password']));
  if ($b){
    $fn = mysqli_real_escape_string($connex, $_POST['first_name']);
    $ls = mysqli_real_escape_string($connex, $_POST['last_name']);
    $em = mysqli_real_escape_string($connex, $_POST['email']);
    $ph = mysqli_real_escape_string($connex, $_POST['phone']);
    $reg = mysqli_real_escape_string($connex, $_POST['regions']);
    $dep = mysqli_real_escape_string($connex, $_POST['departements']);
    $cit = mysqli_real_escape_string($connex, $_POST['cities']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
  }
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>SITE - inscription</title>
  </head>
  <body>
    <?php if ($b): save_user($connex, $fn, $ls, $em, $ph, $reg, $dep, $cit, $pass); ?>
    <?php else: ?>
      <form class="inscription" action="inscription.php" method="post">
        <label for="fn">Prénom: </label>
        <input type="text" name="first_name" id="fn">
        <label for="ln">Nom: </label>
        <input type="text" name="last_name" id="ln">
        <label for="email">Email: </label>
        <input type="email" name="email">
        <label for="phone">Téléphone: </label>
        <input type="tel" name="phone" pattern="0[0-9]{9}" id="phone">
        <?php
          deroul($connex, "regions");
          deroul($connex, "departements");
          deroul($connex, "cities");
          ?>
          <label for="password">Mot de passe: </label>
          <input type="password" name="password" id="password">
          <input type="submit" name="Envoyer">

        </form>
      <?php endif; ?>
  </body>
</html>
