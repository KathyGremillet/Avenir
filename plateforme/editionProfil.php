<?php

	include('../settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$user = $reqUser->fetch();


		if(isset($_POST['newNom']) AND !empty($_POST['newNom']) AND $_POST['newNom'] != $user['nom']){

			$newNom = htmlspecialchars($_POST['newNom']);
			$insertNom = $bdd->prepare("UPDATE user SET nom = ? WHERE id = ?");
			$insertNom->execute(array($newNom, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);

		}

		if(isset($_POST['newPrenom']) AND !empty($_POST['newPrenom']) AND $_POST['newPrenom'] != $user['prenom']){

			$newPrenom = htmlspecialchars($_POST['newPrenom']);
			$insertPrenom = $bdd->prepare("UPDATE user SET prenom = ? WHERE id = ?");
			$insertPrenom->execute(array($newPrenom, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);

		}				

		if(isset($_POST['newMail']) AND !empty($_POST['newMail'])  AND $_POST['newMail'] != $user['mail']){

			$updateMail = htmlspecialchars($_POST['newMail']);
			$insertMail = $bdd->prepare("UPDATE user SET mail = ? WHERE id = ?");
			$insertMail->execute(array($updateMail, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);		

		}
			


		if(isset($_POST['newPassword']) AND !empty($_POST['newPassword']) AND isset($_POST['newPasswordConfirm']) AND !empty($_POST['newPasswordConfirm'])){

			$newPassword = cryptagePass($_POST['newPassword']);
			$newPasswordConfirm = cryptagePass($_POST['newPasswordConfirm']);
			
			if($newPassword == $newPasswordConfirm) {
			
				$insertPassword = $bdd->prepare("UPDATE user SET password = ? WHERE id = ?");
				$insertPassword->execute(array($newPassword, $_SESSION['id']));
				header('Location: profil.php?id=' .$_SESSION["id"]);
			
			} else {
				
				$msg = "Vos mots de passe ne correspondent pas !";
			
			}
		
		}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil</title>
</head>
<body>

<div align="center">
	<h2>Edition de mon profil</h2>

	<div align="left">
		<form method="POST" action="editionProfil.php">
			<label for="newNom">Votre nom : </label>
			<input type="text" id="newNom" name="newNom" value="<?php echo $user['nom']; ?>"><br>
			
			<label for="newPrenom">Votre prénom : </label>
			<input type="text" id="newPrenom" name="newPrenom" value="<?php echo $user['prenom']; ?>"><br>

			<label for="newMail">Votre email : </label>
			<input type="email" id="newMail" name="newMail" value="<?php echo $user['mail']; ?>"><br>
			
			<label for="newPassword">Votre mot de passe : </label>
			<input type="password" id="newPassword" name="newPassword"><br>
			
			<label for="newPassword">Confirmez votre mot de passe</label>
			<input type="password" id="newPasswordConfirm" name="newPasswordConfirm" placeholder="Confirmez votre mot de passe"><br>

			<input type="submit" value="Modifier mon compte">
			
		</form>

		<?php 
			if(isset($msg)) { 
				echo $msg; 
			}
		?>	

	</div>

</div>

<a href='profil.php?id=<?php echo $_SESSION["id"]; ?>'>Retourner sur mon profil</a>
<a href='../index.php'>Retourner sur l'accueil</a>
</body>
</html>

<?php
	} else {
		header('Location: connexion.php');
	}
?>