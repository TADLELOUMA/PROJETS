<?

// Vérification des droits d'accès de la page
if (utilisateur_est_connecte()) {

  // On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté
  echo "Inutile d'accéder à cette page si vous êtes connecté";
   


 } else {

    // Reste de la page comme avant
  }
