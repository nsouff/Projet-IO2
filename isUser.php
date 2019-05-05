<?php


function isUser($connex,$mail) {
  $req='SELECT email FROM user WHERE email=\''.$mail.'\'';
  $res=mysqli_query($connex,$req);
  $row=mysqli_num_rows($res);
  if($row==0) { return false;}
  else if($row==1) { return true; }
} ?>
