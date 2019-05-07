<?php
include_once('connex_BD.php');
//Cette fonction vérifie que les identifiants rentrés pour la connexion user correspondent à une entrée
//dans la table user.
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

//Cette fonction permet de récupérer dans la table user les informations
//d'un user en fonctoin d'un email donné, pour pouvoir mettre ces
//informations dans $_SESSSION et s'en reservir.
function récupUser($mail) {
  $req='select phone_number,first_name,last_name, id, level from user where email=\''.$mail.'\'';
  $resultat=mysqli_query(connex_BD(),$req);
  $result=mysqli_fetch_assoc($resultat);
  return $result;

}
//Cette fonctoin permet de récupérer dans la table announcer les informations d'une
//entreprise en fonction d'un mail donnée
function récupAnnouncer($mail) {
  $req='select name, valid from announcer where email=\''.$mail.'\'';
  $resultat=mysqli_query(connex_BD(),$req);
  $result=mysqli_fetch_assoc($resultat);
  return $result;
}

?>
