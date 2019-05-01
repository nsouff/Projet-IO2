<?php
  session_start();
  include_once('aff_annonce_detail.php');
  include_once('connex_BD.php');
  if (!isset($_GET['id'])) {
    header('LOCATION: index.php');
  }
  $announce_id = $_GET['id'];
  $connex = connex_BD();

  $b = (isset($_SESSION['id']) && isset($_SESSION['prénom']) && isset($_SESSION['nom']));

  if ($b){
    $p = $_SESSION['prénom'];
    $n = $_SESSION['nom'];
    $user_id = $_SESSION['id'];
  }
 ?>
 <!DOCTYPE html>
 <html lang="fr">
   <head>
     <meta charset="utf-8">
     <title>SITE - annonce</title>
   </head>
   <body>
     <?php aff_annonce_detail($connex, $announce_id); ?>
     <?php if ($b): ?>
       <form action="postule.php" method="post" enctype="multipart/form-data">
         <label for="CV">CV: </label>
         <input type="file" name="CV" id="CV" required>
         <label for="Motiv">Lettre de motivation: </label>
         <input type="file" name="Motiv" id="Motiv">
         <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
         <input type="hidden" name="announce_id" value="<?php echo $announce_id; ?>">
         <input type="submit">
     <?php else: echo "Connectez vous ou inscrivez vous pour postuler"; ?>
     <?php endif; ?>
     </form>
   </body>
 </html>
