<?php
  function connex_BD(){
    $connex = mysqli_connect('localhost','site', 'IO2_site', 'Site');
    if (!$connex) exit;
    mysqli_set_charset($connex, "utf8");
    return $connex;
  }
 ?>
