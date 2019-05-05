<?php
  function getValid($connex, $em){
    $req = "SELECT valid FROM announcer WHERE email=\"$em\"";
    $res = mysqli_query($connex, $res);
    return mysqli_fetch_assoc($res)['valid'];
  }
?>
