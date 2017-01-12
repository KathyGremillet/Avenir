<?php

	include('../config/settings.php');
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
								$lastID = $bdd->lastInsertId();

								if(!empty($lastID)) {
								
									$insertAvatar = $bdd->prepare("INSERT INTO profil(idUser) VALUES(?)");
									$insertAvatar->execute(array($lastID));
								}

								header('Location: profil.php?id='.$lastID);
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
	$loginUrl = $helper->getLoginUrl('http://avenir.maevaridard.com/plateforme/login-callback.php', $permissions);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<title>Avenir - La réoriention facile - Connexion</title>
	<meta name="description" xml:lang="en" content="Avenir - La plateforme de la réoriention facile - Page de connexion" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/global.css" />		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/production.min.js"></script>
	<script src="../js/jquery.matchHeight.js" type="text/javascript"></script>
</head>

<body>

	<div class="wrapper inscription" id="main-content">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-sm-12"></div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="logo">
					<img src="../images/logotype.png" alt="Avenir logotype">
					<h1 class="">Avenir</h1>
				</div>

				<p class="error">
					<?php
						if(isset($erreur)){
							echo '<font>'.$erreur.'</font>';
						}
					?>
				</p>
				<form method="post" action="inscription.php">	
					<input type="text" placeholder="Votre nom" name="nom" id="nom" value="<?php if(isset($nom)) { echo $nom; } ?>">
					<input type="text" placeholder="Votre prénom" name="prenom" id="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>">
					<input type="email" placeholder="Votre mail" name="mail" id="mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
					<input type="password" placeholder="Votre mot de passe" name="password" id="password">		
					<input type="password" placeholder="Confirmez votre password" name="passwordConfirm" id="passwordConfirm">
				
					<input type="submit" name="inscription" value="Je m'inscris">
				</form>

				<span class="separation"></span>

				<a href="<?php echo $loginUrl ?>" alt="Se connecter avec Facebook" class="btn-fb"><span><img src="../images/icon-btn-facebook.png" alt="Icône Facebook"></span> Inscrivez-vous avec Facebook !</a>
			</div>
		</div>
	</div>
	
</body>
</html>