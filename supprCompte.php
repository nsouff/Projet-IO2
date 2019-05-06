<?php


function supprEntr($connex,$name) {
  $req1='SELECT id from announce WHERE announcer=\''.$name.'\'';
  $res1=mysqli_query($connex,$req1);
  while($ligne=mysqli_fetch_assoc($res1)) {
    $req2='DELETE from link WHERE announce_id='.$ligne['id'];
    $res2=mysqli_query($connex,$req2);
  }
  $req3='DELETE from announce WHERE announcer=\''.$name.'\'';
  $req4='DELETE from announcer WHERE name=\''.$name.'\'';
  echo $req4;
  $res3=mysqli_query($connex,$req3);
  $res4=mysqli_query($connex,$req4);
}
function supprUser($connex,$id) {
  $req1='DELETE from link WHERE user_id='.$id;
  $req2='DELETE from user WHERE id='.$id;
  $res1=mysqli_query($connex,$req1);
  $res2=mysqli_query($connex,$req2);
} ?>
