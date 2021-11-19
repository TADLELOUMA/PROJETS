<?php

require_once('../_config/db.php');
require_once('../_functions/functions.php');
require_once('../models/Connexion_model.php');

global $pdo;


if(utilisateur_est_connecte()){

	// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté 
	echo "Inutile d'accéder à cette page si vous êtes connecté";
}else{

	$username =  $_POST['username'];
	$mot_de_pass =  $_POST['password'];


	// Création d'un tableau des erreurs
	$erreurs_connexion = array();

	if(isset($username) AND isset($mot_de_pass))
	{
		///$mdphash = password_hash($mot_de_pass, PASSWORD_DEFAULT);
  
  		$connexion = new Connexion_model($username,$mot_de_pass);
  		$id_utilisateur= $connexion->combinaison_connexion_valide(str_secur($username), str_secur($mot_de_pass));
  	
		  // Si les identifiants sont valides

		if($username == $id_utilisateur ){
			
			echo "Echec de connexion votre compte n'est pas validé veuillez le valider plus bas.";

			// On réaffiche la page de confirmation
			require_once('../views/validerCompteAvecCode_view.php');
		}else{
			if (false !== $id_utilisateur) 
		{
			$infos_utilisateur = $connexion->lire_infos_utilisateur($id_utilisateur);
			// On enregistre les informations dans la session
			$connexion->session();

			// Affichage de la confirmation de la connexion
			include_once('../views/connexion_ok_view.php');
		
		} else {

			$erreurs_connexion[] = "Couple nom d'utilisateur / mot de passe inexistant.";
		
			// On réaffiche le formulaire de connexion
			include_once('../views/connexionError_view.php');
		}
	
		}
		
		
	} else {

    	// On réaffiche le formulaire de connexion
    	include_once('../views/connexionError_view.php');
	}

}
