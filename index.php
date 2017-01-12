<?php

	include('config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user, profil WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();	

		header('Location: plateforme/accueil.php?id='.$_SESSION['id']);

	} else {
		header('Location: plateforme/connexion.php');
	}
	
?>