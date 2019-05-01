<?php
include_once('connex_BD.php');

function verifLogin($login,$mdp,$table) {
  $req='select email,password from '.$table.' where email=\''.$login.'\'';
  $resultat=mysqli_query(connex_BD(),$req);
  if(!$resultat) {
	return false; }
  else {
    $result=mysqli_fetch_assoc($resultat);
    return (password_verify($mdp,$result['password']));
  }
}


function récupUser($mail) {
  $req='select first_name,last_name, id from user where email=\''.$mail.'\'';
  $resultat=mysqli_query(connex_BD(),$req);
  $result=mysqli_fetch_assoc($resultat);
  return $result;

}
function récupAnnouncer($mail) {
  $req='select name from announcer where email=\''.$mail.'\'';
  $resultat=mysqli_query(connex_BD(),$req);
  $result=mysqli_fetch_assoc($resultat);
  return $result;
}

?>
