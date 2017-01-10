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

	Prenom = <?php echo $userInfo['prenom']; ?>
	<br>
	Nom = <?php echo $userInfo['nom']; ?>
	<br>
	Mail = <?php echo $userInfo['mail']; ?>
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