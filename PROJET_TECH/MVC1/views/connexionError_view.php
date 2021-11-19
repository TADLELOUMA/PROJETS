<h2>Connexion au site</h2>

<!--<p>Si vous n'êtes pas encore inscrit, vous pouvez le faire en <a href="index.php?page=membres&amp;action=inscription">cliquant sur ce lien</a>.</p> -->

<?php

require_once('../controllers/connexion_controller.php');

if (!empty($erreurs_connexion)) {

	echo '<ul>'."\n";
	
	foreach($erreurs_connexion as $e) {
	
		echo '	<li>'.$e.'</li>'."\n";
	}
	
	echo '</ul>';
}

include_once('connexion_view.php');