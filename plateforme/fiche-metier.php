<?php

	include('config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user, profil WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();

	$page = "Rechercher";
    $description = "Avenir - La plateforme de la réoriention facile - Fiche métier";

    include('includes/headerPlateforme.php');
?>

	<div class="fiche-metier" id="main-content">
	</div>

<?php
	include('../includes/footerPlateforme.php');

	} else {
		header('Location: plateforme/connexion.php');
	}
	
?>