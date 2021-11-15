<?
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


// Validation des champs suivant les règles en utilisant les données du tableau $_POST
if(isset($username) AND isset($adresse_email) AND isset($mot_de_pass) AND isset($passwrd_confirmed) )
{
  $inscription = new Inscription_model($username,$adresse_email,$mot_de_pass,$passwrd_confirmed);
  // On vérifie si les 2 mots de passe correspondent
  if(str_secur($mot_de_pass) != str_secur($passwrd_confirmed) ){
    $erreurs_inscription[] = "Les deux mots de passes entrés sont différents !";
  }
  // Si d'autres erreurs ne sont pas survenues
  if (empty($erreurs_inscription)) {
    $inscription->ajouter_membre_dans_bdd();
  
  } else{

    // On affiche à nouveau le formulaire d'inscription
    include_once('../views/inscriptionError_view.php');

  }

} else{
    
  // On affiche à nouveau le formulaire d'inscription
  include_once('../views/inscriptionError_view.php');

}
