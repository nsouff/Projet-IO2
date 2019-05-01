<?php
  function getAnnounce($connex, $name){
    $req = "SELECT * FROM announce WHERE announcer=\"$name\";";
    $res = mysqli_query($connex, $req);
    if ($res) return $res;
  }
?>
