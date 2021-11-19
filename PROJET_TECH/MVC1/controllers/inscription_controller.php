<?
session_start();
require_once('../_config/db.php');
require_once('../models/Inscription_model.php');
require_once('../_functions/functions.php');

global $pdo;

$username =  $_POST['username'];
$adresse_email = $_POST['email'];
$mot_de_pass =  $_POST['password'];
$passwrd_confirmed =  $_POST['confirmedpassword'];

// Création d'un tableau des erreurs
$erreurs_inscription = array();

// On vérifie si les 2 mots de passe correspondent
if(str_secur($mot_de_pass) != str_secur($passwrd_confirmed) ){
  $erreurs_inscription[] = "Les deux mots de passes entrés sont différents !";
}
$inscription = new Inscription_model($username,$adresse_email,$mot_de_pass,$passwrd_confirmed);

$id_utilisateur= $inscription->ajouter_membre_dans_bdd();

  // Si la base de données a bien voulu ajouter l'utlilisateur (pas de doublons)
if(ctype_digit($id_utilisateur)) {

  //// On enregistre les informations dans la session
  echo "hello";
  $inscription->session();
  $code =  $_SESSION['code'];

  // Affichage de la confirmation de l'inscription
  

  //<a href="../controllers/validerCompteAvecCode_controller.php?code=".$code>Activation Compte!</a>

  header('Location: ../views/validerCompteAvecCode_view.php?code ='.$code);


// Gestion des doublons
} else{

  // Changement de nom de variable (plus lisible)
	$erreur =& $id_utilisateur;

  // On vérifie que l'erreur concerne bien un doublon
  if (23000 == $erreur[0]) { // Le code d'erreur 23000 siginife "doublon" dans le standard ANSI SQL

		preg_match("`Duplicate entry '(.+)' for key \d+`is", $erreur[2], $valeur_probleme);
    $valeur_probleme = $valeur_probleme[1];

    if ($adresse_email == $valeur_probleme) {

			$erreurs_inscription[] = "Cette adresse e-mail est déjà utilisée.";

		} else {

			$erreurs_inscription[] = "Erreur ajout SQL : doublon non identifié présent dans la base de données.";
		}

	} else {

    $erreurs_inscription[] = sprintf("Erreur ajout SQL : cas non traité (SQLSTATE = %d).", $erreur[0]);
  }
  // On affiche à nouveau le formulaire d'inscription
  include_once('../views/inscriptionError_view.php');


}
