<?php
  /* Pour savoir quelle type d'utilisateurs est cnnecté, différentes valeurs de retour:
   * 0: non connecté:
   * 1: chercheur d'emploie
   * 2: adminstrateur
   * 3: root
   * 4: entreprise
   */
  function getResp(){
    if (isset($_SESSION['mail']) && isset($_SESSION['prénom']) && isset($_SESSION['nom']) && isset($_SESSION['id']) && isset($_SESSION['level'])) return $_SESSION['level'];
    else if (isset($_SESSION['announcer_name']) && isset($_SESSION['mail'])) return 4;
    else return 0;
  }
?>
