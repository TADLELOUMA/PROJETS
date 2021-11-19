<?php  
session_start();
require_once('../_config/db.php');
require_once('../models/Inscription_model.php');

if(isset($_GET['code']))
    $tt = (urldecode($_GET['code'])); 
    
?>
<html><head></head><body>
    <p>Merci de vous être inscrit sur "mon site" !</p>
    <form  method="POST" class="form-signin" action='../controllers/validerCompteAvecCode_controller.php?code='.urlencode($tt)>
        <p>Veuillez cliquer sur ce bouton <input  type = "submit" class="btn btn-primary" value ="submit" /> pour activer votre compte !</p>
    </form>

    </body></html>
