<?php
  function offre_ville($connex, $city){
    $req = 'SELECT * FROM announce WHERE city_id='.$cty.';';
    $res = mysqli_query($connex, $req);
    while ($ligne = mysqli_fetch_assoc($res)){
      print_r($ligne);
    }
  }
 ?>
