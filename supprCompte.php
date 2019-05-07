<?php

//Cette fonction supprime tout ce qui a un lien avec l'entreprise dont le nom est $name.
//Elle sélectionne d'abord toutes les annonces dont le nom d'announcer est celui de l'entreprise.
//Puis, elle select toutes les postulations (link dans la BD) qui sont reliées à ces annonces et les supprime.
//Ensuite on supprime les annonces en question.
//Enfin on supprime l'entreprise de la table announcer.
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

//Cette fonction supprime tout ce qui à un lien avec un user dont l'id est $id.
//Elle supprime toutes les postulations que l'user a fait, puis l'user en question
//de la table user.
function supprUser($connex,$id) {
  $req1='DELETE from link WHERE user_id='.$id;
  $req2='DELETE from user WHERE id='.$id;
  $res1=mysqli_query($connex,$req1);
  $res2=mysqli_query($connex,$req2);
} ?>
