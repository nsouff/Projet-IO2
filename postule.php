<?php
  include_once('connex_BD.php');
  include_once('save_link_BD.php');
  $connex = connex_BD();

  session_start();
  if ($_FILES['CV']['error'] != 0) echo "des erreurs dans l'upload CV";
  $max_size = 2 * 1024 * 1024;
  if ($_FILES['CV']['size'] > $max_size) echo "max_size";
  $b = file_exists($_FILES['Motiv']['tmp_name']);
  $ext_valide = array('doc', 'docx', 'pdf');
  $cv_ext = pathinfo($_FILES['CV']['name'], PATHINFO_EXTENSION);
  if (!in_array($cv_ext, $ext_valide)) echo "ext pb ";
  if ($b){
    $motiv_ext = pathinfo($_FILES['CV']['name'], PATHINFO_EXTENSION);
    if (!in_array($motiv_ext, $ext_valide)) echo $motiv_ext;
  }
  else $motiv_ext = '';
  $an_id = $_POST['announce_id'];
  $user_id = $_POST['user_id'];
  $cv_name = "CV/".md5($an_id."CV".$user_id).".".$cv_ext;
  $res = move_uploaded_file($_FILES['CV']['tmp_name'], $cv_name);
  if ($b){
    $motiv_name = "Motiv/".md5($an_id."Motiv".$user_id).".".$motiv_ext;
    $res = $res && move_uploaded_file($_FILES['Motiv']['tmp_name'], $motiv_name);
  }
  save_link_BD($connex, $cv_ext, $motiv_ext, $user_id, $an_id);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Postule</title>
  </head>
  <body>
    <?php if ($res) echo "yeeees"; ?>
  </body>
</html>
