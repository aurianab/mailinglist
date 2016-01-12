<?php
// Affichage des erreurs
function message_erreur($erreur, $clef){
	if($erreur[$clef] != ''){
		return '<p class="erreurs">'.$erreur[$clef].'</p>';
	}else{
		return false;
	}
}

function is_valid_email($n_email) {
  return filter_var($n_email, FILTER_VALIDATE_EMAIL);
}


// nettoyage input

function clean($argument){
    $clean = trim(strip_tags($argument));
    return $clean;
}


?>