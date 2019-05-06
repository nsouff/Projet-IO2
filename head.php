<?php
  include_once('getResp.php');
  function head(){
    $resp = getResp();
    echo "<header class=\"menu\">";
    echo "<h1><a href=\"index.php\">YES</a></h1>";
    if ($resp != 0) echo "<nav class=\"compte\">";
    if ($resp == 0){
      echo "<nav class=\"non_logged\">";
      echo "<a href=\"inscription.php\">Inscription</a>";
      echo "<a href=\"page_login.php\">Connexion</a>";
      echo "<a href=\"inscription_entr.php\">Entrprise? Inscrivez-vous</a>";
      echo "<a href=\"connexionEntreprise.php\">Connexion entreprise</a>";
      echo "</nav>";
    }
    else if ($resp < 4){
      echo "<a href=\"compte.php\">Compte</a>";
    }
    else echo "<a href=\"compte_entr.php\">Compte</a>";
    if ($resp != 0) echo "<a href=\"deconnexion.php\">Déconnexion</a>";
    if ($resp != 0) echo "</nav>";
    echo "<nav class=\"option\">";
    if ($resp == 1) {
      echo "<a href=\"search.php\">Trouver un emploie</a>";
    }
    if ($resp == 2 || $resp == 3){
      echo "<a href=\"ApprobationAnnonces.php\">Valider des annonces</a>";
      echo "<a href=\"ApprobationEntreprises.php\">Valider des entreprises</a>";
      if ($resp == 3) echo "<a href=\"EspaceRoot.php\">Ajoutez/Supprimer des administrateur</a>";
    }
    else if ($resp == 4){
      echo "<a href=\"espace_entreprise.php\">Espace entreprise</a>";
      echo "<a href=\"ajoutAnnonce.php\">Ajoutez une annonce</a>";
    }
    echo "</nav>";
    echo "</header>";

  }
 ?>
