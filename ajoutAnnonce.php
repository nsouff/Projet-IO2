<?php
session_start();
include_once('deroul.php');
include_once('connex_BD.php');
include_once('save.php');
$connex=connex_BD();
$a=isset($_SESSION['announcer_name']);
if($a) { $announcer=$_SESSION['announcer_name']; }
$b=(isset($_POST['short']) && isset($_POST['long']) && isset($_POST['type']) && isset($_POST['start']) && isset($_POST['regions']) && isset($_POST['departements']) && isset($_POST['cities']) && isset($_POST['end']) && isset($_POST['job']));
if($b) {
  echo $_POST['start'];
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
  save2(connex_BD(),$announcer,$lg,$sh,$type,$start,$end,$job,$reg,$dep,$cit);
  $c='index.php';
  $d='Location: '.$c;
  header($d);
}
 ?>
 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Ajouter une annonce</title>
   </head>
   <body>
     <?php if ($a): ?>
     <form class="inscription" action="ajoutAnnonce.php" method="post">
       <label for="sd">Courte description de l'annonce: </label>
       <input type="text" name="short" id="sd">
       <br>
       <label for="ld">Longue description de l'annonce: </label>
       <textarea name=long id="ld"> </textarea>
       <br>
       <input type="radio" name="type" value="CDD"> CDD<br>
       <input type="radio" name="type" value="CDI"> CDI<br>
       <br>
       <label for="start">Début du travail</label>
       <input type="date" name="start" id="start">
       <br>
       <label for="end">Fin du travail</label>
       <input type="date" name="end" id="end">
       <br>
       <label for="job">Appellation du travail:</label>
       <input type="text" name="job" id="job">
       <br>
       <?php
         deroul($connex, "regions");
         echo "<br>";
         deroul($connex, "departements");
         echo "<br>";
         deroul($connex, "cities");
         echo "<br>";
         ?>
       <input type="submit">
     </form>

         <?php endif; ?>
         <?php if(!$a) {
           echo "<h1>Erreur critique</h1>";
           echo "<h4>Vous n'êtes pas connectés à votre compte entreprise et ne pouvez pas ajouter une annonce. <br>";
           echo "<a href=connexionEntreprise.php>Connectez vous ici</a>";
         }
         ?>
   </body>
 </html>
