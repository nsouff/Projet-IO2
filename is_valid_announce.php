<?php
  function is_valid_announce($connex, $id){
    $req = "SELECT valid FROM announce WHERE id=$id;";
    $res = mysqli_query($connex, $req);
    if (mysqli_num_rows($res) == 0) return false;
    $an = mysqli_fetch_assoc($res);
    return $an['valid'];
  }
?>
