<?php
require_once('../_config/db.php');
require_once('../models/Inscription_model.php');

function valider_compte_avec_code($idUsers) {

  global $pdo ;

  $requete = $pdo->prepare('UPDATE Users SET
    verif = "1"
    WHERE
    idUsers = :idUsers');

  $requete->bindValue(':idUsers', $idUsers);
  
  $requete->execute();

  return ($requete->rowCount() == 1);
}



