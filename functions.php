<?php 

// on crée une fonction qui crypte, salt (ajout de caractère derrière) et re-crypte un mot de passe
function cryptagePass($mot){
	$etape1 = sha1($mot);
	$etape2 = $etape1.'espagne';
	$etape3 = sha1($etape2);

	return $etape3;

	// de manière plus rapide, on pourrait écrire
	// return sha1(sha1($mot).'espagne');
}

// gérer les messages d'erreurs
function classMessError($mess){
	return '<p class="error">'.$mess.'</p>';
}

?>