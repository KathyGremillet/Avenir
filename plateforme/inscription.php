<?php

	include('../settings.php');
	include('../config/fb-settings.php');

	if(isset($_POST['inscription'])) {

		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$mail = htmlspecialchars($_POST['mail']);
		$pass = cryptagePass($_POST['password']);
		$passConf = cryptagePass($_POST['passwordConfirm']);

		if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['passwordConfirm'])) {

			$nomLength = strlen($nom);
			$prenomLength = strlen($prenom);

			if($nomLength <= 25){
				if($prenomLength <= 25){
					if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
						$reqmail = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
						$reqmail->execute(array($mail));
						$mailexist = $reqmail->rowCount();
						if($mailexist == 0) {
							if($pass == $passConf){
								$insertMBR = $bdd->prepare("INSERT INTO user(nom, prenom, mail, password) VALUES(?, ?, ?, ?)");
								$insertMBR->execute(array($nom, $prenom, $mail, $pass));
								$erreur = "Votre compte a bien été crée ! <a href=\"connexion.php\">Me connecter</a>";
							} else {
								$erreur = "Vos mots de passe ne correspondent pas.";
							}
						} else {
							$erreur = "Adresse mail déjà utilisée !";
						}
					} else {
						$erreur = "Votre adresse mail n'est pas valide.";
					}
				} else {
					$erreur = "Votre prenom ne doit pas dépasser 25 caractères.";
				}
			} else {
				$erreur = "Votre nom ne doit pas dépasser 25 caractères.";
			}

		} else {
			$erreur = "Tous les champs doivent être complétés !";
		}
	}

	//FACEBOOK
	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['email']; // optional
	$loginUrl = $helper->getLoginUrl('http://localhost/Avenir/plateforme/login-callback.php', $permissions);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
</head>
<body>

<div align="center">
	<h2>Inscription</h2>
	<br><br><br>
	<form method="post" action="inscription.php">
		
		<label for="nom">Votre nom</label>
		<input type="text" placeholder="Votre nom" name="nom" id="nom" value="<?php if(isset($nom)) { echo $nom; } ?>">

		<label for="prenom">Votre prénom</label>
		<input type="text" placeholder="Votre prénom" name="prenom" id="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>">

		<label for="mail">Votre mail</label>
		<input type="email" placeholder="Votre mail" name="mail" id="mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
	
		<label for="password">Votre mot de passe</label>
		<input type="password" placeholder="Votre mot de passe" name="password" id="password">
	
		<label for="passwordConfirm">Confirmez votre mot de passe</label>				
		<input type="password" placeholder="Confirmez votre password" name="passwordConfirm" id="passwordConfirm">
	
		<a href="connexion.php">Je me connecte</a>
		<input type="submit" name="inscription" value="Je m'inscris">

	</form>

	<?php
		if(isset($erreur)){
			echo '<font color="red">'.$erreur.'</font>';
		}
	?>

	<a href="<?php $loginUrl ?>">Inscrivez-vous avec Facebook!</a>

</div>
	
</body>
</html>