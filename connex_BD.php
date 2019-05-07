<?php
  //include_once('../code.php');
  function connex_BD(){
    $connex = mysqli_connect('localhost','admin', 'admin2308', 'Site');
    if (!$connex) exit;
    mysqli_set_charset($connex, "utf8");
    return $connex;
  }
 ?>
