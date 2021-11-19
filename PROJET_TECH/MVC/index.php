<?php

include_once '_config/config.php';
include_once '_config/db.php';
include_once '_functions/functions.php';



include_once '_classes/Users.php';
include_once '_classes/Categories.php';
include_once '_classes/Catalogues.php';
include_once '_classes/Contenir.php';


//$var = Categories::getAllCategories();
/*$var = Contenir::getAllCatalogueContent(1);
debug($var);
exit;*/

//Définition de la page courante
if(isset($_GET['page']) AND !empty($_Get['page'])) {

    //un trim pour enlever les espace strtolower pour etre sur que c'est minuscule
    $page = trim(strtolower($_GET['page'])); // ' HOME '
} else {
    $page = 'home';

}
//Array contenant toutes les pages
$allPages = scandir('controllers/');

//Vérification de l'éxistence de la page
if(in_array($page.'_controller.php', $allPages)) {
    //Inclusion de la page
    include_once 'models/'.$page.'_model.php';
    include_once 'controllers/'.$page.'_controller.php';
    include_once 'views/'.$page.'_view.php';
} else{
    //retour d'une erreur
    echo 'Error 404';
}

?>