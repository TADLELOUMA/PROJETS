<?php

//include_once('../_config/db.php');

//$bdd = Bdd();
//permet de securiser une chaine caractere
function str_secur($string){
    return trim(htmlspecialchars($string));
}

//Debug plus lisible des differentes variables
function debug($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

// Vérifie si l'utilisateur est connecté
function utilisateur_est_connecte() {

	return !empty($_SESSION['id']);
}
