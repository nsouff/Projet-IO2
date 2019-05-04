<?php




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
