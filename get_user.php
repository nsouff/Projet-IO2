<?php
  function get_user($connex, $user_id){
    $req = "SELECT * FROM user WHERE id=$user_id;";
    $res = mysqli_query($connex, $req);
    return mysqli_fetch_assoc($res);
  }
?>
