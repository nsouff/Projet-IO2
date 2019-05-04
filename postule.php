<?php
  include_once('save_link_BD.php');
  // On veut que les entreprises puissent voir le CV (et possiblement lettre de motivation) des personnes qui ont postulé cependant si l'on donne un nom trop simple au fichier lorsque l'on enregistre celui ci, alors une personne mal intentionnée pourrait facilement récuprérrer ces CV en cherchant quelle pourrait être le nom du fichier.

  // Pour contrer cela on donne un nom compliqué avec md5, seul nous savons comment est crypté le nom fichier il sera donc très difficile pour quelqu'un d'ouvrir un fichier qu'il n'est pas censé ouvrir.

  // Dans .htaccess on rend également index des dossiers innaccessible pour que la liste des CV ou lettre de motivation ne puisse pas être affiché

  function postule($connex){
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
  }
?>
