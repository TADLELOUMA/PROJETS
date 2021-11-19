<?php

session_start();
require_once('../_config/db.php');
require_once('../models/Inscription_model.php');
require_once('../models/validerCompteAvecCode_model.php');
require_once('../_functions/functions.php');

// On vérifie qu'un hash est présent

$codebb = $_SESSION['code'];
$id = $_SESSION['idUsers'];

if(isset($codebb))
{

	if (valider_compte_avec_code($id)) {
	
		// Affichage de la confirmation de validation du compte
		header('Location: ../views/valideCompte_view.php');
	} else {
		
		// Affichage de l'erreur de validation du compte
		echo "error activation vous aviez dejà valider votre compte";
	}

}
	
	
