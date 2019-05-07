<?php
//Cette page sert pour une entreprise validée afin d'ajouter une annonce.
session_start();
include_once('deroul.php');
include_once('connex_BD.php');
include_once('save.php');
include_once('head.php');
include_once('getResp.php');
include_once('verifCohérenceAnnonce.php');
$_SESSION['adresseRetour'] = 'ajoutAnnonce.php';
$connex=connex_BD();
$a=(getResp() == 4);
if($a) { $announcer=$_SESSION['announcer_name']; }
$b=(isset($_POST['short']) && isset($_POST['long']) && isset($_POST['type']) && isset($_POST['start']) && isset($_POST['regions']) && isset($_POST['departements']) && isset($_POST['cities']) && isset($_POST['end']) && isset($_POST['job']));
if($b) {
  //On utilise mysqli_real_escape_string() pour éviter les injections SQL.
  $announcer = mysqli_real_escape_string($connex, $_SESSION['announcer_name']);
  $sh = mysqli_real_escape_string($connex, $_POST['short']);
  $lg = mysqli_real_escape_string($connex, $_POST['long']);
  $type = mysqli_real_escape_string($connex, $_POST['type']);
  $start = mysqli_real_escape_string($connex, $_POST['start']);
  $end= mysqli_real_escape_string($connex, $_POST['end']);
  $reg = mysqli_real_escape_string($connex, $_POST['regions']);
  $dep = mysqli_real_escape_string($connex, $_POST['departements']);
  $cit = mysqli_real_escape_string($connex, $_POST['cities']);
  $job = mysqli_real_escape_string($connex, $_POST['job']);
  //On vérifie la cohérence de l'annonce.
  $verif = verifCohérenceAnnonce($connex, $reg, $dep, $cit);
}
 ?>
 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="style.css">
     <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
     <title>Ajouter une annonce</title>
   </head>
   <body>
     <?php head(); ?>
     <?php if ($a && $_SESSION['valid']): ?>
       <?php
       if ($b && $verif)
       //Si l'annonce est correctement set et cohérente alors on l'ajoute
        save2($connex,$announcer,$lg,$sh,$type,$start,$end,$job,$reg,$dep,$cit);
       else if ($b) echo "<h3 class=\"center\">Erreur, il y a une incohérence dans le lieu que vous avez choisi</h3>";
       ?>
        <form class="ajoutAnnonce" action="ajoutAnnonce.php" method="post">
          <label for="sd">Courte description de l'annonce: </label>
          <input type="text" name="short" id="sd">
          <br>
          <label for="ld">Longue description de l'annonce: </label>
          <textarea name=long id="ld"> </textarea>
          <br>
          <label for="CDD">CDD</label>
          <input id="CDD" type="radio" name="type" value="CDD" required><br>
          <label for="CDI">CDI</label>
          <input id="CDI" type="radio" name="type" value="CDI"><br>
          <br>
          <label for="start">Début du travail</label>
          <input type="date" name="start" id="start" <?php echo "min=\"".date('Y-m-d')."\""; ?>>
          <br>
          <label for="end">Fin du travail</label>
          <input type="date" name="end" id="end" <?php echo "min=\"".date('Y-m-d')."\""; ?>>
          <br>
          <label for="job">Appellation du travail:</label>
          <input type="text" name="job" id="job" required>
          <br>
          <?php
            deroul($connex, "regions");
            echo "<br>";
            deroul($connex, "departements");
            echo "<br>";
            deroul($connex, "cities");
            echo "<br>";
            ?>
          <input type="submit" value="Ajouter" class="bouton_ajout_annonce"><input type="reset" value="Réinitialiser" class="bouton_ajout_annonce">
       </form>
       <?php
     endif;
     if ($a && !$_SESSION['valid']):
       ?>
        <h3 class="center">Votre compte n'a pas encore été validé par un administrateur du site, nous nous excusons pour la gène. Cela dervrait être fait dans les plus bref délais</h3>
     <?php endif; ?>
     <?php if(!$a) {
       //Si la session n'est pas celle d'une entreprise on affiche ce message d'erreur.
       echo "<h1 class=\"center\">Erreur critique</h1>";
       echo "<h3 class=\"center\">Vous n'êtes pas connectés à votre compte entreprise et ne pouvez pas ajouter une annonce. <br>";
       echo "<a href=connexionEntreprise.php>Connectez vous ici</a></h3>";
     }
     ?>
   </body>
 </html>
