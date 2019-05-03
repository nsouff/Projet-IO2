<?php
  session_start();
  include_once('aff_annonce_detail.php');
  include_once('connex_BD.php');
  include_once('getResp.php');
  include_once('postule.php');
  include_once('can_postule.php');
  include_once('head.php');
  include_once('is_valid_announce.php');
  if (!isset($_GET['id'])) {
    header('Location: index.php');
  }
  $announce_id = $_GET['id'];
  $connex = connex_BD();
  if (!is_valid_announce($connex, $announce_id)) header('Location: index.php');
  $_SESSION['adresseRetour'] = 'annonce.php?id='.$announce_id;

  $resp = getResp();
  $b = isset($_POST['announce_id']);
  if ($resp == 1){
    $p = $_SESSION['prénom'];
    $n = $_SESSION['nom'];
    $user_id = $_SESSION['id'];
  }
 ?>
 <!DOCTYPE html>
 <html lang="fr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="style.css">
     <title>SITE - annonce</title>
   </head>
   <body>
     <?php head(); ?>
     <?php if ($b) postule($connex); ?>
     <?php aff_annonce_detail($connex, $announce_id); ?>
     <?php if ($b) echo "enregistré!"; ?>
     <?php if ($resp == 1 && can_postule($connex, $user_id, $announce_id)): ?>
       <form action=<?php echo "annonce.php?id=$user_id"; ?> method="post" enctype="multipart/form-data">
         <label for="CV">CV: </label>
         <input type="file" name="CV" id="CV" required>
         <label for="Motiv">Lettre de motivation: </label>
         <input type="file" name="Motiv" id="Motiv">
         <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
         <input type="hidden" name="announce_id" value="<?php echo $announce_id; ?>">
         <input type="submit">
       </form>
     <?php elseif ($resp == 1 && !$b): echo "Vous avez déjà postuler"; ?>
     <?php elseif ($resp != 1): echo "Connectez vous ou inscrivez vous pour postuler"; ?>
     <?php endif; ?>
   </body>
 </html>
