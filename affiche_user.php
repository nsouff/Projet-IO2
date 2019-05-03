<?php
  function affiche_user($connex, $user, $link){
    echo "<li><ul>\n";
    echo "<li>".$user['first_name']." ".$user['last_name']."</li>\n";
    echo "<li>email: ".$user['email']."</li>\n";
    echo "<li>numéro de téléphone: ".$user['phone_number']."</li>\n";
    $cv_name = "CV/".md5($link['announce_id']."CV".$link['user_id']).".".$link['cv_ext'];
    echo "<li><a href=\"".$cv_name."\" target=\"_blank\">CV</a></li>\n";
    if (!empty($link['motiv_ext'])){
      $motiv_name = "Motiv/".md5($link['announce_id']."Motiv".$link['user_id']).".".$link['motiv_ext'];
      echo "<li><a href=\"".$motiv_name."\" target=\"_blank\">Lettre de motivation</a></li>\n";
    }
    echo "</ul></li>";
  }
?>
