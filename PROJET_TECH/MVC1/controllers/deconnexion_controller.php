<?php

require_once('../_functions/functions.php');
//require_once('../controllers/connexion_controller.php');

session_start();
session_unset();
session_destroy();

header('Location: ../views/deconnexion_ok_view.php');
