<?php
  include_once('nTabulation.php');
  include_once('save_entr.php');
  include_once('connex_BD.php');
  include_once('head.php');
  $connex = connex_BD();
  $b = (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']));

  if ($b){
    $n = mysqli_real_escape_string($connex, $_POST['name']);
    $em = mysqli_real_escape_string($connex, $_POST['email']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
  }


 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Inscription Entreprise</title>
  </head>
  <body>
    <?php head(); ?>
    <?php if ($b): save_entr($connex, $n, $em, $pass)?>

    <?php else: ?>
      <div class="inscription_entr">
        <form action="inscription_entr.php" method="post">
          <label for="name">Nom de l'entreprise: </label>
          <input type="text" name="name" id="name" pattern="[^_]*">
          <small>Le charchatère '_' est intérdit</small>
          <br>
          <label for="email">Email: </label>
          <input type="email" name="email"id="email">
          <br>
          <label for="password">Mot de passe: </label>
          <input type="password" name="password"  id="password">
          <br>
          <input type="submit">
        </form>
      </div>
  <?php endif; ?>
  </body>
</html>
