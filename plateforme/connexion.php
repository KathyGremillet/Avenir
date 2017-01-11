<?php

	include('../settings.php');
	include('../config/fb-settings.php');

	if(isset($_POST['formConnect'])) {

		$mailConnect = htmlspecialchars(($_POST['mailConnect']));
		$mdpConnect = cryptagePass($_POST['mdpConnect']);

		if(!empty($mailConnect) AND !empty($mdpConnect)){

			$reqUser = $bdd->prepare("SELECT * FROM user WHERE mail = ? AND password = ?");
			$reqUser->execute(array($mailConnect, $mdpConnect));
			$userExist = $reqUser->rowCount();
			if($userExist == 1) {
				$userInfo = $reqUser->fetch();
				$_SESSION['id'] = $userInfo['id'];
				$_SESSION['mail'] = $userInfo['mail'];
				header('Location: profil.php?id='.$_SESSION['id']);
			} else {
				$erreur = "Mauvais identifiants !";
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
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<title>Avenir - La réoriention facile - Connexion</title>
	<meta name="description" xml:lang="en" content="Avenir - La plateforme de la réoriention facile - Page de connexion" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/global.css" />		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/production.min.js"></script>
</head>

<body>
	<div class="wrapper connexion" id="main-content">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-sm-12"></div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<h1 class="logo"><img src="../images/logotype.png"></h1>
				
				<p class="error">
					<?php
						if(isset($erreur)){
							echo '<font>'.$erreur.'</font>';
						}
					?>
				</p>
				<form method="post" action="connexion.php">					
					<input type="text" name="mailConnect" placeholder="Votre mail" value="<?php
						if(!empty($_POST)){
							echo $_POST['mailConnect'];
						}
					?>">
					<input type="password" name="mdpConnect" placeholder="Votre mot de passe">

					<a href="#" class="mdp-oublie"> Mot de passe oublié ?</a>

					<input type="submit" name="formConnect" value="Se connecter">
				</form>				

				<span class="separation"></span>

				<a href="<?php echo $loginUrl ?>" alt="Se connecter avec Facebook" class="btn-fb"><span><img src="../images/icon-btn-facebook.png" alt="Icône Facebook"></span> Connectez-vous avec Facebook!</a>

			</div>
		</div>
	</div>		
</body>
</html>