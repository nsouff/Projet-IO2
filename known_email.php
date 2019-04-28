<?php
  function known_email($connex, $email){
    $req = "SELECT * FROM seeker WHERE email=\"$email\";";
    $res = mysqli_query($connex, $req);
    return (mysqli_num_rows($res) != 0); 
  }
 ?>
