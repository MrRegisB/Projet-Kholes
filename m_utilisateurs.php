<?php
function selectUtilisateur($login, $mdp)
{
  $pdo = connecBDD();
  $query = "SELECT idUtilisateur FROM utilisateur WHERE loginUtilisateur = :login AND mdpUtilisateur = :mdp";
  $req = $pdo->prepare($query);
  $req-> bindValue(":login", $login);
  $req-> bindValue(":mdp", $mdp);
  $req->execute();
  return $req;
}



?>
