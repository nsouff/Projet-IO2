<?php
  include_once('../code.php');
  function connex_BD(){
    $connex = mysqli_connect('localhost','site', getPass(), 'Site');
    if (!$connex) exit;
    mysqli_set_charset($connex, "utf-8");
    return $connex;
  }
 ?>
