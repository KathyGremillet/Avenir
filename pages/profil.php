<?php

	include('../settings.php');

	if(isset($_GET['id']) AND $_GET['id'] > 0){

		$getID = intval($_GET['id']);
		$reqUser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
		$reqUser->execute(array($getID));
		$userInfo = $reqUser->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil</title>
</head>
<body>

<div align="center">
	<h2>Profil de <?php echo $userInfo['prenom'].' '.$userInfo['nom'] ; ?></h2>
	<br><br>
	<?php
		if(!empty($userInfo['avatar'])) { ?>

		<img src="../membres/avatar/<?php echo $userInfo['avatar']; ?>" alt="">

	<?php }
	?> <br>
	Prenom = <?php echo $userInfo['prenom']; ?>
	<br>
	Nom = <?php echo $userInfo['nom']; ?>
	<br>
	Mail = <?php echo $userInfo['mail']; ?>
	<br>
	Âge = <?php echo $userInfo['age']; ?>
	<br>
	Adresse = <?php if(isset($userInfo['adresse'])) { echo $userInfo['adresse']; } else { echo "Vous n'avez pas encore rempli votre adresse"; } ?>
	<br>
	Adresse (suite) = <?php if(isset($userInfo['adresse2'])) { echo $userInfo['adresse2']; } else { echo "Vous n'avez pas encore rempli votre adresse (suite)"; } ?>
	<br>
	Code postal = <?php if(isset($userInfo['cp'])) { echo $userInfo['cp']; } else { echo "Vous n'avez pas encore rempli votre code postal"; } ?>
	<br>
	Ville = <?php if(isset($userInfo['ville'])) { echo $userInfo['ville']; } else { echo "Vous n'avez pas encore rempli votre ville"; } ?>
	<br>
	<?php
	if(isset($_SESSION['id']) AND $userInfo['id'] == $_SESSION['id']) { ?>
		<a href="editionProfil.php">Editer mon profil</a>
		<a href='../index.php'>Retourner sur l'accueil</a>
		<a href="deconnexion.php">Se déconnecter</a>
	<?php } ?>

</div>
	
</body>
</html>

<?php
}
?>