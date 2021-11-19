

<h2>Inscription au site</h2>

<?php

require_once('../controllers/inscription_controller.php');
//require_once('views/connexionInscription_view.php');
//require_once('../_functions/functions.php');

if (!empty($erreurs_inscription)) {

	echo '<ul>'."\n";
	
	foreach($erreurs_inscription as $e) {
	
		echo '	<li>'.$e.'</li>'."\n";
	}
	
	echo '</ul>';
}

include_once('inscription_view.php');
