<?php
  include_once('connex_BD.php');
  include_once('save_user.php');
  include_once('head.php');
  $connex = connex_BD();
  $b = (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']));
  if ($b){
    $fn = mysqli_real_escape_string($connex, $_POST['first_name']);
    $ls = mysqli_real_escape_string($connex, $_POST['last_name']);
    $em = mysqli_real_escape_string($connex, $_POST['email']);
    $ph = mysqli_real_escape_string($connex, $_POST['phone']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
  }
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Inscription</title>
  </head>
  <body>
    <?php head(); ?>
    <?php if ($b): save_user($connex, $fn, $ls, $em, $ph, $pass); ?>
    <?php else: ?>
      <div class="inscription">
        <form action="inscription.php" method="post">
          <fieldset>
            <legend><strong>Coordronées</strong></legend>
            <label for="fn">Prénom: </label>
            <input type="text" name="first_name" id="fn" required><br>
            <label for="ln">Nom: </label>
            <input type="text" name="last_name" id="ln" required><br>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" required><br>
            <label for="phone">Téléphone: </label>
            <input type="tel" name="phone" pattern="0[0-9]{9}" id="phone" required><br>
          </fieldset>
          <label for="password">Mot de passe: </label>
          <input type="password" name="password" id="password" required><br>
          <label for="age">Vous confirmez avoir plus de 18ans</label>
          <input type="radio" id="age" required><br>
          <input type="submit">
          </form>
        </div>
      <?php endif; ?>
  </body>
</html>
