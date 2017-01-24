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

		if(isset($_POST['newAdresse']) AND $_POST['newAdresse'] != $userInfo['adresse']){

			$updateAdresse = htmlspecialchars($_POST['newAdresse']);
			$insertAdresse = $bdd->prepare("UPDATE user SET adresse = ? WHERE id = ?");
			$insertAdresse->execute(array($updateAdresse, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);		

		}

		if(isset($_POST['newAdresse2']) AND $_POST['newAdresse2'] != $userInfo['adresse2']){

			$updateAdresse2 = htmlspecialchars($_POST['newAdresse2']);
			$insertAdresse2 = $bdd->prepare("UPDATE user SET adresse2 = ? WHERE id = ?");
			$insertAdresse2->execute(array($updateAdresse2, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);		

		}

		if(isset($_POST['newCP']) AND $_POST['newCP'] != $userInfo['cp']){

			$updateCP = htmlspecialchars($_POST['newCP']);
			$insertCP = $bdd->prepare("UPDATE user SET cp = ? WHERE id = ?");
			$insertCP->execute(array($updateCP, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);		

		}

		if(isset($_POST['newVille']) AND $_POST['newVille'] != $userInfo['ville']){

			$updateVille = htmlspecialchars($_POST['newVille']);
			$insertVille = $bdd->prepare("UPDATE user SET ville = ? WHERE id = ?");
			$insertVille->execute(array($updateVille, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);		

		}

		if(isset($_POST['newTel']) AND $_POST['newTel'] != $userInfo['tel']){

			$updateVille = htmlspecialchars($_POST['newTel']);
			$insertVille = $bdd->prepare("UPDATE user SET tel = ? WHERE id = ?");
			$insertVille->execute(array($updateVille, $_SESSION['id']));
			header('Location: profil.php?id=' .$_SESSION["id"]);		

		}
		if(isset($_POST['newDesc']) AND $_POST['newDesc'] != $userInfo['description']){

			$updateVille = htmlspecialchars($_POST['newDesc']);
			$insertVille = $bdd->prepare("UPDATE user SET description = ? WHERE id = ?");
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

		if(isset($_POST['newCI1']) || isset($_POST['newCI2']) || isset($_POST['newCI3']) || isset($_POST['newCI4']) || isset($_POST['newCI5'])) {
			$centreInteret = "";
			if(isset($_POST['newCI1']) && !empty($_POST['newCI1'])) {
				$centreInteret .= "".$_POST['newCI1'].";";
			}
			if(isset($_POST['newCI2']) && !empty($_POST['newCI2'])) {
				$centreInteret .= "".$_POST['newCI2'].";";
			}
			if(isset($_POST['newCI3']) && !empty($_POST['newCI3'])) {
				$centreInteret .= "".$_POST['newCI3'].";";
			}
			if(isset($_POST['newCI4']) && !empty($_POST['newCI4'])) {
				$centreInteret .= "".$_POST['newCI4'].";";
			}
			if(isset($_POST['newCI5']) && !empty($_POST['newCI5'])) {
				$centreInteret .= "".$_POST['newCI5'].";";
			}

			$insertCI = $bdd->prepare("UPDATE profil SET centreInteret = ? WHERE idUser = ?");
			$insertCI->execute(array($centreInteret, $_SESSION['id']));
		}

		$exCentreInteret = $bdd->prepare('SELECT centreInteret FROM profil WHERE idUser = ?');
		$exCentreInteret->execute(array($_SESSION['id']));
		$CeIn = $exCentreInteret->fetch();
		$CI = explode(';',$CeIn['centreInteret']);

		if(isset($_POST['newC1']) || isset($_POST['newC2']) || isset($_POST['newC3']) || isset($_POST['newC4']) || isset($_POST['newC5'])) {
			$competences = "";
			if(isset($_POST['newC1']) && !empty($_POST['newC1'])) {
				$competences .= "".$_POST['newC1'].";";
			}
			if(isset($_POST['newC2']) && !empty($_POST['newC2'])) {
				$competences .= "".$_POST['newC2'].";";
			}
			if(isset($_POST['newC3']) && !empty($_POST['newC3'])) {
				$competences .= "".$_POST['newC3'].";";
			}
			if(isset($_POST['newC4']) && !empty($_POST['newC4'])) {
				$competences .= "".$_POST['newC4'].";";
			}
			if(isset($_POST['newC5']) && !empty($_POST['newC5'])) {
				$competences .= "".$_POST['newC5'].";";
			}

			$insertCI = $bdd->prepare("UPDATE profil SET competences = ? WHERE idUser = ?");
			$insertCI->execute(array($competences, $_SESSION['id']));
		}

		$exCompetences = $bdd->prepare('SELECT competences FROM profil WHERE idUser = ?');
		$exCompetences->execute(array($_SESSION['id']));
		$Comp = $exCompetences->fetch();
		$C = explode(';',$Comp['competences']);

		// POSTE
		if(isset($_POST['newP1']) || isset($_POST['newP2'])) {
			$intitulePoste = "";
			if(isset($_POST['newP1']) && !empty($_POST['newP1'])) {
				$intitulePoste .= "".$_POST['newP1'].";";
			}
			if(isset($_POST['newP2']) && !empty($_POST['newP2'])) {
				$intitulePoste .= "".$_POST['newP2'].";";
			}

			$insertP = $bdd->prepare("UPDATE profil SET intituleExperience = ? WHERE idUser = ?");
			$insertP->execute(array($intitulePoste, $_SESSION['id']));

		}

		$exPoste = $bdd->prepare('SELECT intituleExperience FROM profil WHERE idUser = ?');
		$exPoste->execute(array($_SESSION['id']));
		$Pos = $exPoste->fetch();
		$P = explode(';',$Pos['intituleExperience']);

		// Entreprise
		if(isset($_POST['newEN1']) || isset($_POST['newEN2'])) {
			$intituleEntreprise = "";
			if(isset($_POST['newEN1']) && !empty($_POST['newEN1'])) {
				$intituleEntreprise .= "".$_POST['newEN1'].";";
			}
			if(isset($_POST['newEN2']) && !empty($_POST['newEN2'])) {
				$intituleEntreprise .= "".$_POST['newEN2'].";";
			}

			

			$insertEN = $bdd->prepare("UPDATE profil SET intituleEntreprise = ? WHERE idUser = ?");
			$insertEN->execute(array($intituleEntreprise, $_SESSION['id']));

		}

		$exIntituleEntreprise = $bdd->prepare('SELECT intituleEntreprise FROM profil WHERE idUser = ?');
		$exIntituleEntreprise->execute(array($_SESSION['id']));
		$InEn = $exIntituleEntreprise->fetch();
		$IEn = explode(';',$InEn['intituleEntreprise']);

		//Description poste
		if(isset($_POST['newDescP1']) || isset($_POST['newDescP2'])) {
			$descriptionPoste = "";
			if(isset($_POST['newDescP1']) && !empty($_POST['newDescP1'])) {
				$descriptionPoste .= "".$_POST['newDescP1'].";";
			}
			if(isset($_POST['newDescP2']) && !empty($_POST['newDescP2'])) {
				$descriptionPoste .= "".$_POST['newDescP2'].";";
			}

			$insertDP = $bdd->prepare("UPDATE profil SET descriptionExperience = ? WHERE idUser = ?");
			$insertDP->execute(array($descriptionPoste, $_SESSION['id']));

		}

		$exDescriptionPoste = $bdd->prepare('SELECT descriptionExperience FROM profil WHERE idUser = ?');
		$exDescriptionPoste->execute(array($_SESSION['id']));
		$DescPos = $exDescriptionPoste->fetch();
		$DP = explode(';',$DescPos['descriptionExperience']);
		
		// Formation
		if(isset($_POST['newFor1']) || isset($_POST['newFor2'])) {
			$intituleFormation = "";
			if(isset($_POST['newFor1']) && !empty($_POST['newFor1'])) {
				$intituleFormation .= "".$_POST['newFor1'].";";
			}
			if(isset($_POST['newFor2']) && !empty($_POST['newFor2'])) {
				$intituleFormation .= "".$_POST['newFor2'].";";
			}

			$insertFor = $bdd->prepare("UPDATE profil SET intituleFormation = ? WHERE idUser = ?");
			$insertFor->execute(array($intituleFormation, $_SESSION['id']));

		}

		$exFormation = $bdd->prepare('SELECT intituleFormation FROM profil WHERE idUser = ?');
		$exFormation->execute(array($_SESSION['id']));
		$Form = $exFormation->fetch();
		$F = explode(';',$Form['intituleFormation']);

		// Ecole
		if(isset($_POST['newEco1']) || isset($_POST['newEco2'])) {
			$intituleEcole = "";
			if(isset($_POST['newEco1']) && !empty($_POST['newEco1'])) {
				$intituleEcole .= "".$_POST['newEco1'].";";
			}
			if(isset($_POST['newEco2']) && !empty($_POST['newEco2'])) {
				$intituleEcole .= "".$_POST['newEco2'].";";
			}

			$insertEN = $bdd->prepare("UPDATE profil SET intituleEcole = ? WHERE idUser = ?");
			$insertEN->execute(array($intituleEcole, $_SESSION['id']));

		}

		$exIntituleEcole = $bdd->prepare('SELECT intituleEcole FROM profil WHERE idUser = ?');
		$exIntituleEcole->execute(array($_SESSION['id']));
		$InEc = $exIntituleEcole->fetch();
		$IE = explode(';',$InEc['intituleEcole']);

		//Description formation
		if(isset($_POST['newDescF1']) || isset($_POST['newDescF2'])) {
			$descriptionFormation = "";
			if(isset($_POST['newDescF1']) && !empty($_POST['newDescF1'])) {
				$descriptionFormation .= "".$_POST['newDescF1'].";";
			}
			if(isset($_POST['newDescF2']) && !empty($_POST['newDescF2'])) {
				$descriptionFormation .= "".$_POST['newDescF2'].";";
			}

			$insertDF = $bdd->prepare("UPDATE profil SET descriptionFormation = ? WHERE idUser = ?");
			$insertDF->execute(array($descriptionFormation, $_SESSION['id']));

		}

		$exDescriptionFormation = $bdd->prepare('SELECT descriptionFormation FROM profil WHERE idUser = ?');
		$exDescriptionFormation->execute(array($_SESSION['id']));
		$DescFor = $exDescriptionFormation->fetch();
		$DF = explode(';',$DescFor['descriptionFormation']);

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
					<label for="newTel">Votre numéro de téléphone</label>
					<input type="text" placeholder="Votre numéro de téléphone" name="newTel" id="newTel" value="<?php echo $userInfo['tel']; ?>">
				</div>	
				<div>
					<label for="newTel">Votre description</label>
					<textarea name="newDesc" id="newDesc" cols="30" rows="10"><?php echo $userInfo['description']; ?></textarea>
				</div>
				<div>
					<label>Expériences professionnelles</label>
					<input type="text" placeholder="Poste" name="newP1" id="newP1" value="<?php if(!empty($P[0])) { echo $P[0]; } ?>">
					<input type="text" placeholder="Nom de l'entreprise" name="newEN1" id="newEN1" value="<?php if(!empty($IEn[0])) { echo $IEn[0]; } ?>">
					<textarea placeholder="Description du poste" name="newDescP1" id="newDescP1" cols="30" rows="10"><?php if(!empty($DP[0])) { echo $DP[0]; } ?></textarea>
					<input type="text" placeholder="Poste" name="newP2" id="newP2" value="<?php if(!empty($P[1])) { echo $P[1]; } ?>">
					<input type="text" placeholder="Nom de l'entreprise" name="newEN2" id="newEN2" value="<?php if(!empty($IEn[1])) { echo $IEn[1]; } ?>">
					<textarea placeholder="Description du poste" name="newDescP2" id="newDescP2" cols="30" rows="10"><?php if(!empty($DP[1])) { echo $DP[1]; } ?></textarea>
				</div>
				<div>
					<label>Cursus scolaire</label>
					<input type="text" placeholder="Formation" name="newFor1" id="newFor1" value="<?php if(!empty($F[0])) { echo $F[0]; } ?>">
					<input type="text" placeholder="École" name="newEco1" id="newEco1" value="<?php if(!empty($IE[0])) { echo $IE[0]; } ?>">
					<textarea placeholder="Description de la formation" name="newDescF1" id="newDescF1" cols="30" rows="10"><?php if(!empty($DF[0])) { echo $DF[0]; } ?></textarea>
					<input type="text" placeholder="Formation" name="newFor2" id="newFor2" value="<?php if(!empty($F[1])) { echo $F[1]; } ?>">
					<input type="text" placeholder="École" name="newEco2" id="newEco2" value="<?php if(!empty($IE[1])) { echo $IE[1]; } ?>">
					<textarea placeholder="Description de la formation" name="newDescF2" id="newDescF2" cols="30" rows="10"><?php if(!empty($DF[1])) { echo $DF[1]; } ?></textarea>
				</div>
				<div>
					<label for="competences">Vos compétences</label>
					<input type="text" name="newC1" id="newC1" value="<?php if(!empty($C[0])) { echo $C[0]; } ?>">
					<input type="text" name="newC2" id="newC2" value="<?php if(!empty($C[1])) { echo $C[1]; } ?>">
					<input type="text" name="newC3" id="newC3" value="<?php if(!empty($C[2])) { echo $C[2]; } ?>">
					<input type="text" name="newC4" id="newC4" value="<?php if(!empty($C[3])) { echo $C[3]; } ?>">
					<input type="text" name="newC5" id="newC5" value="<?php if(!empty($C[5])) { echo $C[4]; } ?>">
				</div>
				<div>
					<label for="centreInteret">Vos centres d'intérêts</label>
					<input type="text" name="newCI1" id="newCI1" value="<?php if(!empty($CI[0])) { echo $CI[0]; } ?>">
					<input type="text" name="newCI2" id="newCI2" value="<?php if(!empty($CI[1])) { echo $CI[1]; } ?>">
					<input type="text" name="newCI3" id="newCI3" value="<?php if(!empty($CI[2])) { echo $CI[2]; } ?>">
					<input type="text" name="newCI4" id="newCI4" value="<?php if(!empty($CI[3])) { echo $CI[3]; } ?>">
					<input type="text" name="newCI5" id="newCI5" value="<?php if(!empty($CI[4])) { echo $CI[4]; } ?>">
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