<?php

	include('../config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();

		$reqProfil = $bdd->prepare('SELECT * FROM profil WHERE idUser = ?');
		$reqProfil->execute(array(
			$_SESSION['id']
			));
		$profil = $reqProfil->fetch();


		if(isset($_POST['newNom']) AND !empty($_POST['newNom']) AND $_POST['newNom'] != $userInfo['nom']){

			$newNom = htmlspecialchars($_POST['newNom']);
			$insertNom = $bdd->prepare("UPDATE user SET nom = ? WHERE id = ?");
			$insertNom->execute(array($newNom, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);

		}

		if(isset($_POST['newPrenom']) AND !empty($_POST['newPrenom']) AND $_POST['newPrenom'] != $userInfo['prenom']){

			$newPrenom = htmlspecialchars($_POST['newPrenom']);
			$insertPrenom = $bdd->prepare("UPDATE user SET prenom = ? WHERE id = ?");
			$insertPrenom->execute(array($newPrenom, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);

		}				

		if(isset($_POST['newMail']) AND !empty($_POST['newMail'])  AND $_POST['newMail'] != $userInfo['mail']){

			$updateMail = htmlspecialchars($_POST['newMail']);
			$insertMail = $bdd->prepare("UPDATE user SET mail = ? WHERE id = ?");
			$insertMail->execute(array($updateMail, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);		

		}

		if(isset($_POST['newAge']) AND !empty($_POST['newAge'])  AND $_POST['newAge'] != $userInfo['age']){

			$updateAge = htmlspecialchars($_POST['newAge']);
			$insertAge = $bdd->prepare("UPDATE user SET age = ? WHERE id = ?");
			$insertAge->execute(array($updateAge, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);		

		}

		if(isset($_POST['newAdresse']) AND !empty($_POST['newAdresse'])  AND $_POST['newAdresse'] != $userInfo['adresse']){

			$updateAdresse = htmlspecialchars($_POST['newAdresse']);
			$insertAdresse = $bdd->prepare("UPDATE user SET adresse = ? WHERE id = ?");
			$insertAdresse->execute(array($updateAdresse, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);		

		}

		if(isset($_POST['newAdresse2']) AND !empty($_POST['newAdresse2'])  AND $_POST['newAdresse2'] != $userInfo['adresse2']){

			$updateAdresse2 = htmlspecialchars($_POST['newAdresse2']);
			$insertAdresse2 = $bdd->prepare("UPDATE user SET adresse2 = ? WHERE id = ?");
			$insertAdresse2->execute(array($updateAdresse2, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);		

		}

		if(isset($_POST['newCP']) AND !empty($_POST['newCP'])  AND $_POST['newCP'] != $userInfo['cp']){

			$updateCP = htmlspecialchars($_POST['newCP']);
			$insertCP = $bdd->prepare("UPDATE user SET cp = ? WHERE id = ?");
			$insertCP->execute(array($updateCP, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);		

		}

		if(isset($_POST['newVille']) AND !empty($_POST['newVille'])  AND $_POST['newVille'] != $userInfo['ville']){

			$updateVille = htmlspecialchars($_POST['newVille']);
			$insertVille = $bdd->prepare("UPDATE user SET ville = ? WHERE id = ?");
			$insertVille->execute(array($updateVille, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);		

		}
			


		if(isset($_POST['newPassword']) AND !empty($_POST['newPassword']) AND isset($_POST['newPasswordConfirm']) AND !empty($_POST['newPasswordConfirm'])){

			$newPassword = cryptagePass($_POST['newPassword']);
			$newPasswordConfirm = cryptagePass($_POST['newPasswordConfirm']);
			
			if($newPassword == $newPasswordConfirm) {
			
				$insertPassword = $bdd->prepare("UPDATE user SET password = ? WHERE id = ?");
				$insertPassword->execute(array($newPassword, $_SESSION['id']));
				header('Location: profil.php?id='.$_SESSION["id"]);
			
			} else {
				
				$msg = "Vos mots de passe ne correspondent pas !";
			
			}
		
		}

		if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {

			$tailleMax = 2097152;
			$extensionValides = array('jpg', 'jpeg', 'gif', 'png');
			if($_FILES['avatar']['size'] <= $tailleMax) {

				$extensionUpload = strtolower(substr((strrchr($_FILES['avatar']['name'], '.')), 1));

				if(in_array($extensionUpload, $extensionValides)) {

					$chemin = "../membres/avatar/".$profil['idUser'].".".$extensionUpload;
					$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
					if($resultat) {

						$updateAvatar = $bdd->prepare('UPDATE profil SET avatar = :avatar WHERE idUser = :id');
						$updateAvatar->execute(array(
							'avatar' => $profil['idUser'].'.'.$extensionUpload,
							'id' => $profil['idUser']
							));
						header('Location: profil.php?id='.$profil['idUser']);

					} else {
						$msg = "Erreur durant l'importation de votre photo de profil.";
					}

				} else {
					$msg = "Votre photo doit être au format jpg, jpeg, gif ou png.";
				}

			} else {
				
				$msg = "Votre photo de profil ne doit pas dépasser 2Mo.";
			
			}
		}

		if(isset($_FILES['cv']) AND !empty($_FILES['cv']['name'])) {

			$tailleMax = 2097152;
			$extensionValides = array('pdf');
			if($_FILES['cv']['size'] <= $tailleMax) {

				$extensionUpload = strtolower(substr((strrchr($_FILES['cv']['name'], '.')), 1));

				if(in_array($extensionUpload, $extensionValides)) {

					$chemin = "../membres/cv/".$userInfo['prenom'].'-'.$userInfo['nom']."_cv.".$extensionUpload;
					$resultat = move_uploaded_file($_FILES['cv']['tmp_name'], $chemin);
					if($resultat) {

						$updateCV = $bdd->prepare('UPDATE profil SET  cv = :cv WHERE idUser = :id');
						$updateCV->execute(array(
							'cv' => $userInfo['prenom'].'-'.$userInfo['nom'].'_cv.'.$extensionUpload,
							'id' => $profil['idUser']
							));
						header('Location: profil.php?id='.$profil['idUser']);

					} else {
						$msg = "Erreur durant l'importation de votre CV.";
					}

				} else {
					$msg = "Votre CV doit être au format PDF.";
				}

			} else {
				
				$msg = "Votre CV ne doit pas dépasser 2Mo.";
			
			}
		}



		if(isset($_FILES['lm']) AND !empty($_FILES['lm']['name'])) {

			$tailleMax = 2097152;
			$extensionValides = array('txt');
			if($_FILES['lm']['size'] <= $tailleMax) {

				$extensionUpload = strtolower(substr((strrchr($_FILES['lm']['name'], '.')), 1));

				if(in_array($extensionUpload, $extensionValides)) {

					$chemin = "../membres/lettreMotivation/".$userInfo['prenom'].'-'.$userInfo['nom']."_lm.".$extensionUpload;
					$resultat = move_uploaded_file($_FILES['lm']['tmp_name'], $chemin);
					if($resultat) {

						$updateCV = $bdd->prepare('UPDATE profil SET  lm = :lm WHERE idUser = :id');
						$updateCV->execute(array(
							'lm' => $userInfo['prenom'].'-'.$userInfo['nom'].'_lm.'.$extensionUpload,
							'id' => $profil['idUser']
							));
						header('Location: profil.php?id='.$profil['idUser']);

					} else {
						$msg = "Erreur durant l'importation de votre photo de profil.";
					}

				} else {
					$msg = "Votre lettre de motivation doit être au format .txt.";
				}

			} else {
				
				$msg = "Votre lettre de motivation ne doit pas dépasser 2Mo.";
			
			}
		}	

	$page = "Profil";
    $description = "Avenir - La plateforme de la réoriention facile - Editer mon profil";

    include('../includes/headerPlateforme.php');
?>


<div class="edit-profil" id="main-content">
	<?php include('../includes/secondNav.php'); ?>

	<div class="content-container">
		<div class="row">
			<div class="col-lg-8">
				<h2>&Eacute;dition de mon profil</h2>
				<span class="titre-deco"></span>
			</div>
			<div class="col-lg-4 retour-profil">
				<a href='profil.php?id=<?php echo $_SESSION["id"]; ?>' class="btn btn-retour">Retourner sur mon profil</a>
			</div>
		</div>		

		<div class="infos">
			<form method="POST" action="editionProfil.php" enctype="multipart/form-data" class="clearfix">
				<div>
					<label for="avatar" class="">Avatar</label>
					<input type="file" id="avatar" name="avatar" class="">
				</div>
				<div>
					<label for="newNom">Votre nom : </label>
					<input type="text" id="newNom" name="newNom" value="<?php echo $userInfo['nom']; ?>">
				</div>
				<div>
					<label for="newPrenom">Votre prénom : </label>
					<input type="text" id="newPrenom" name="newPrenom" value="<?php echo $userInfo['prenom']; ?>">
				</div>
				<div>
					<label for="newMail">Votre email : </label>
					<input type="email" id="newMail" name="newMail" value="<?php echo $userInfo['mail']; ?>">
				</div>
				<div>				
					<label for="newPassword">Votre mot de passe : </label>
					<input type="password" id="newPassword" name="newPassword">
				</div>
				<div>
					<label for="newPassword">Confirmez votre mot de passe</label>
					<input type="password" id="newPasswordConfirm" name="newPasswordConfirm" placeholder="Confirmez votre mot de passe">
				</div>
				<div>
					<label for="newAge">Votre âge</label>
					<input type="text" placeholder="Votre âge" name="newAge" id="newAge" value="<?php echo $userInfo['age']; ?>">
				</div>
				<div>
					<label for="newAdresse">Votre adresse</label>
					<input type="text" placeholder="Votre adresse" name="newAdresse" id="newAdresse" value="<?php echo $userInfo['adresse']; ?>">
				</div>
				<div>
					<label for="newAdresse2">Votre adresse (suite)</label>
					<input type="text" placeholder="Votre adresse (suite)" name="newAdresse2" id="newAdresse2" value="<?php echo $userInfo['adresse2']; ?>">
				</div>
				<div>
					<label for="newCP">Votre code postal</label>
					<input type="text" placeholder="Votre code postal" name="newCP" id="newCP" value="<?php echo $userInfo['cp']; ?>">
				</div>
				<div>
					<label for="newVille">Votre ville</label>
					<input type="text" placeholder="Votre ville" name="newVille" id="newVille" value="<?php echo $userInfo['ville']; ?>">
				</div>
				<div>
					<label for="cv">Votre CV</label>
					<input type="file" id="cv" name="cv">
				</div>
				<div>
					<label for="lm">Lettre de Motivation</label>
					<input type="file" id="lm" name="lm">
				</div>
				<input type="submit" value="Enregistrer les modifications">
				
			</form>

			<?php 
				if(isset($msg)) { 
					echo $msg; 
				}
			?>	

		</div>		

	</div>	

</div>


<?php
	include('../includes/footerPlateforme.php');

	} else {
		header('Location: connexion.php');
	}
?>