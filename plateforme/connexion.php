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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
</head>
<body>

<div align="center">
	<h2>Connexion</h2>
	<br><br><br>
	<form method="post" action="connexion.php">
		
		<input type="text" name="mailConnect" placeholder="Votre mail" value="<?php
			if(!empty($_POST)){
				echo $_POST['mailConnect'];
			}
		?>">
		<input type="password" name="mdpConnect" placeholder="Votre mot de passe">

		<input type="submit" name="formConnect" value="Se connecter">

	</form>

	<?php
		if(isset($erreur)){
			echo '<font color="red">'.$erreur.'</font>';
		}
	?>

	<a href="<?php echo $loginUrl ?>">Connectez-vous avec Facebook!</a>

</div>
	
</body>
</html>