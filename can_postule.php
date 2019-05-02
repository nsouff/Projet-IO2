<?php
  function can_postule($connex, $user_id, $an_id){
    $req = "SELECT user_id, announce_id FROM link WHERE user_id=$user_id AND announce_id=$an_id;";
    $res = mysqli_query($connex, $req);
    return (mysqli_num_rows($res) == 0);
  }
?>
