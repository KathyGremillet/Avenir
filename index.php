<?php 

include('settings.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Accueil</title>
</head>
<body>

	<header>

		<?php 

		// Si l'utilisateur est connecté
		if(!empty($_SESSION['mail'])) { 

			$id = $_SESSION['id'];
			$requete = $bdd->prepare('SELECT nom, prenom FROM user WHERE id = '."$id");
			$requete->execute();

			while($user = $requete->fetch()) { ?>		

			<p>Bonjour <?php echo $user['prenom'] .' '. $user['nom'] ;?>.</p>

			<a href="pages/profil.php?id=<?php echo $id; ?>">Accéder à mon profil</a>
			<a href="pages/deconnexion.php">Se déconnecter</a>

			<?php } // Sinon (il est deconnecté)
		} else { ?>

		<a href="pages/connexion.php">Se connecter</a>
		<a href="pages/inscription.php">Se créer un compte</a>

		<?php 
		// Fin du test
		} ?>

		
	</header>

</body>
</html>