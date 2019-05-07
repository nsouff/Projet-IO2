<?php


//Ces fonctions ont pour fonction respective de retrograder un admin en settant son
//level à 1 ou à promouvoir un utilisateur en settant son level à 2.

function RetrograderAdmin($connex,$id) {
  $req='UPDATE user SET level=1 WHERE id='.$id;
  $res=mysqli_query($connex,$req);
  if(!$res) echo "probleme";
}

function PromouvoirAdmin($connex,$email) {
  $req='UPDATE user SET level=2 WHERE email=\''.$email.'\'';
  $res=mysqli_query($connex,$req);
}

 ?>
