<?php 

include('../settings.php');

// on crée un message d'erreur vide
$erreur = '';

// on vérifie que les données sont valides et sinon, on crée le message d'erreur correspondant

$id = $_SESSION['id'];
$requete = $bdd->prepare('SELECT * FROM user WHERE id = '."$id");

// on exécute la requête
$requete->execute();



if(empty($_POST['nomModif'])){
	$erreur = $erreur.'Le nom doit être rempli.';
}

if(empty($_POST['prenomModif'])){
	$erreur = $erreur.'Le prénom doit être rempli.';
}

if(empty($_POST['mailModif'])){
	$erreur = $erreur.'Le mail doit être rempli.';
}

// si on n'a pas crée de message d'erreur
if($erreur == ''){

	$nom = $_POST['nomModif'];
	$prenom = $_POST['prenomModif'];
	$mail = $_POST['mailModif'];
	$age = $_POST['ageModif'];
	$adresse = $_POST['adresseModif'];
	$adresse2 = $_POST['adresse2Modif'];
	$cp = $_POST['cpModif'];
	$ville = $_POST['villeModif'];

	$update = $bdd->prepare("UPDATE user SET nom= '$nom', prenom = '$prenom', mail = '$mail', age = '$age', adresse = '$adresse', adresse2 = '$adresse2', cp = '$cp', ville = '$ville' WHERE id = '$id'");

	$update->execute();
	
	header('Location: ../index.php');

// fin du test
}

// fin du traitement du formulaire

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modification du compte</title>
</head>
<body>
	
<form method="post" action="modificationCompte.php">
	<?php 

		if(isset($erreur) && $erreur != ''){
			echo $erreur;
		}

	while($user = $requete->fetch()) {
	?>
	
	<label for="nomModif">Nom :</label><input id="nomModif" name="nomModif" type="text" value="<?php echo $user['nom']; ?>">
	<label for="prenomModif">Prenom :</label><input id="prenomModif" name="prenomModif" type="text" value="<?php echo $user['prenom']; ?>">
	<label for="mailModif"> Email :</label><input id="mailModif" name="mailModif" type="email" value="<?php echo $user['mail']; ?>">
	<label for="ageModif"> Âge :</label><input id="ageModif" name="ageModif" type="number" value="<?php echo $user['age']; ?>">
	<label for="adresseModif">Adresse :</label><input id="adresseModif" name="adresseModif" type="text" value="<?php echo $user['adresse']; ?>">
	<label for="adresse2Modif">Adresse (suite) :</label><input id="adresse2Modif" name="adresse2Modif" type="text" value="<?php echo $user['adresse2']; ?>">
	<label for="cpModif">Code postal :</label><input id="cpModif" name="cpModif" type="number" value="<?php echo $user['cp']; ?>">
	<label for="villeModif">Ville :</label><input id="villeModif" name="villeModif" type="text" value="<?php echo $user['ville']; ?>">

	<input type ='submit' value='Modifier le compte' />

	<?php }
	?>
</form>

</body>
</html>