<?php

	include('../config/settings.php');

	if(isset($_GET['id']) AND $_GET['id'] > 0){

		$getID = intval($_GET['id']);
		$reqUser = $bdd->prepare("SELECT * FROM user, profil WHERE id = ?");
		$reqUser->execute(array($getID));
		$userInfo = $reqUser->fetch();

		$cheminCV = "../membres/cv/".$userInfo['cv'];
		$cheminLM = "../membres/lettreMotivation/".$userInfo['lm'];

		$exIntituleExperience = $bdd->prepare('SELECT intituleExperience FROM profil WHERE idUser = ?');
		$exIntituleExperience->execute(array($_SESSION['id']));
		$IntiExp = $exIntituleExperience->fetch();
		$IE = explode(';',$IntiExp['intituleExperience']);

		$exCentreInteret = $bdd->prepare('SELECT centreInteret FROM profil WHERE idUser = ?');
		$exCentreInteret->execute(array($_SESSION['id']));
		$CeIn = $exCentreInteret->fetch();
		$CI = explode(';',$CeIn['centreInteret']);

		$exCompetences = $bdd->prepare('SELECT competences FROM profil WHERE idUser = ?');
		$exCompetences->execute(array($_SESSION['id']));
		$Comp = $exCompetences->fetch();
		$C = explode(';',$Comp['competences']);

		$exPoste = $bdd->prepare('SELECT intituleExperience FROM profil WHERE idUser = ?');
		$exPoste->execute(array($_SESSION['id']));
		$Pos = $exPoste->fetch();
		$P = explode(';',$Pos['intituleExperience']);

		$exIntituleEntreprise = $bdd->prepare('SELECT intituleEntreprise FROM profil WHERE idUser = ?');
		$exIntituleEntreprise->execute(array($_SESSION['id']));
		$InEn = $exIntituleEntreprise->fetch();
		$IEn = explode(';',$InEn['intituleEntreprise']);

		$exDescriptionPoste = $bdd->prepare('SELECT descriptionExperience FROM profil WHERE idUser = ?');
		$exDescriptionPoste->execute(array($_SESSION['id']));
		$DescPos = $exDescriptionPoste->fetch();
		$DP = explode(';',$DescPos['descriptionExperience']);

		$exFormation = $bdd->prepare('SELECT intituleFormation FROM profil WHERE idUser = ?');
		$exFormation->execute(array($_SESSION['id']));
		$Form = $exFormation->fetch();
		$F = explode(';',$Form['intituleFormation']);

		$exIntituleEcole = $bdd->prepare('SELECT intituleEcole FROM profil WHERE idUser = ?');
		$exIntituleEcole->execute(array($_SESSION['id']));
		$InEc = $exIntituleEcole->fetch();
		$IE = explode(';',$InEc['intituleEcole']);

		$exDescriptionFormation = $bdd->prepare('SELECT descriptionFormation FROM profil WHERE idUser = ?');
		$exDescriptionFormation->execute(array($_SESSION['id']));
		$DescFor = $exDescriptionFormation->fetch();
		$DF = explode(';',$DescFor['descriptionFormation']);


	$page = "Profil";
    $description = "Avenir - La plateforme de la réoriention facile - Page de recherche";

    include('../includes/headerPlateforme.php');
?>

	<div class="" id="main-content">
		
		<?php include('../includes/secondNav.php'); ?>

		<div class="profil content-container">
			<a href="deconnexion.php" title="Déconnexion" class="btn btn-retour deco">Déconnexion</a>
			<div class="presentation row">
				<div class=" col-lg-8">
					<div class="blocs">
						<div class="clearfix">
							<div class="avatar col-lg-4">
								<?php
									if(!empty($userInfo['avatar'])) {

									echo '<img src="../membres/avatar/' . $userInfo['avatar'] . '" alt="Photo de profil">';
								
									} else{ 
										echo '<img src="../membres/avatar/default.jpg" alt="Photo de profil par défaut">';
									}
								?>
							</div>	
							<div class="infos col-lg-8">
								<h2><?php echo $userInfo['prenom'] . ' ' . $userInfo['nom']; ?></h2>
								<div class="coordonnees row">
									<div class="col-lg-3">
										<span class="typcn typcn-location"></span> <?php if(!empty($userInfo['ville'])) { echo $userInfo['ville']; } else { echo "Vous n'avez pas rempli la ville."; } ?>
									</div>
									<div class="col-lg-5">
										<span class="typcn typcn-device-phone"></span> <?php if(!empty($userInfo['tel'])) { echo $userInfo['tel']; } else { echo "Vous n'avez pas rempli le téléphone."; } ?>
									</div>
									<div class="col-lg-4">
										<span class="typcn typcn-mail"></span> <?php echo $userInfo['mail']; ?>
									</div>
								</div>
								<p>
									<?php if(!empty($userInfo['description'])) { echo $userInfo['description']; } else { echo "Vous n'avez pas rempli la partie description."; } ?>
								</p>						
							</div>
						</div>
						
						<a href="editionProfil.php"><span class="typcn typcn-edit"></span></a>
					</div>					
				</div>
				<div class="cv col-lg-2">
					<div>
						<img src="../images/profil-cv.png" alt="Icône CV">
						<p>CV</p>
						<a href="editionProfil.php"><span class="typcn typcn-download-outline"></span></a>
					</div>
				</div>
				<div class="lm col-lg-2">
					<div>
						<img src="../images/profil-LettreDeMotivation.png" alt="Icône Lettre de motivation">
						<p>Lettre de motivation</p>
						<a href="editionProfil.php"><span class="typcn typcn-download-outline"></span></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="exp-pro col-lg-6">
					<h3><span class="typcn typcn-briefcase"> Expérience professionnelle</h3>
					<div class="blocs">
						<div>
							<?php if(empty($P[0]) || empty($IEn[0]) || empty($DP[0])) { echo 'Vous n\'avez pas rempli toutes les informations de votre cursus'; } else { 
								if(!empty($P[0])) { echo '<h4>'.$P[0].'</h4>'; }
								if(!empty($IEn[0])) { echo '<h5>'.$IEn[0].'</h5>'; }
								if(!empty($DP[0])) { echo '<p>'.$DP[0].'</p>'; }
							} ?>
						</div>
						<div>
							<?php if(empty($P[1]) || empty($IEn[1]) || empty($DP[1])) { echo 'Vous n\'avez pas rempli toutes les informations de votre cursus'; } else { 
								if(!empty($P[1])) { echo '<h4>'.$P[1].'</h4>'; }
								if(!empty($IEn[1])) { echo '<h5>'.$IEn[1].'</h5>'; }
								if(!empty($DP[1])) { echo '<p>'.$DP[1].'</p>'; }
							} ?>
						</div>
						<a href="editionProfil.php"><span class="typcn typcn-edit"></span></a>
					</div>
				</div>
				<div class="cursus col-lg-6">
					<h3><span class="typcn typcn-mortar-board"> Cursus scolaire</h3>
					<div class="blocs">
						<div>
							<?php if(empty($F[0]) || empty($IE[0]) || empty($DF[0])) { echo 'Vous n\'avez pas rempli toutes les informations de votre cursus'; } else { 
								if(!empty($F[0])) { echo '<h4>'.$F[0].'</h4>'; }
								if(!empty($IE[0])) { echo '<h5>'.$IE[0].'</h5>'; }
								if(!empty($DF[0])) { echo '<p>'.$DF[0].'</p>'; }
							} ?>
						</div>
						<div>
							<?php if(empty($F[1]) || empty($IE[1]) || empty($DF[1])) { echo 'Vous n\'avez pas rempli toutes les informations de votre cursus'; } else {
								if(!empty($F[1])) { echo '<h4>'.$F[1].'</h4>'; }
								if(!empty($IE[1])) { echo '<h5>'.$IE[1].'</h5>'; }
								if(!empty($DF[1])) { echo '<p>'.$DF[1].'</p>'; }
							} ?>
						</div>
						<a href="editionProfil.php"><span class="typcn typcn-edit"></span></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="competences col-lg-6">
					<h3><span class="typcn typcn-puzzle-outline"></span> Compétences</h3>
					<ul>
						<?php if(empty($C[0])) { echo 'Vous n\'avez pas rempli vos compétences'; } else {
							if(!empty($C[0])) { echo '<li>'.$C[0].'</li>'; }
							if(!empty($C[1])) { echo '<li>'.$C[1].'</li>'; }
							if(!empty($C[2])) { echo '<li>'.$C[2].'</li>'; }
							if(!empty($C[3])) { echo '<li>'.$C[3].'</li>'; }
							if(!empty($C[4])) { echo '<li>'.$C[4].'</li>'; }
						} ?>
					</ul>
					<a href="editionProfil.php"><span class="typcn typcn-edit"></span></a>
				</div>
				<div class="ctr-interets col-lg-6">
					<h3><span class="typcn typcn-heart-outline"></span> Centres d'intérêts</h3>
					<ul>
						<?php if(empty($CI[0])) { echo 'Vous n\'avez pas rempli vos centres d\'intérêts'; } else {
							if(!empty($CI[0])) { echo '<li>'.$CI[0].'</li>'; }
							if(!empty($CI[1])) { echo '<li>'.$CI[1].'</li>'; }
							if(!empty($CI[2])) { echo '<li>'.$CI[2].'</li>'; }
							if(!empty($CI[3])) { echo '<li>'.$CI[3].'</li>'; }
							if(!empty($CI[4])) { echo '<li>'.$CI[4].'</li>'; }
						} ?>
					</ul>
					<a href="editionProfil.php"><span class="typcn typcn-edit"></span></a>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-lg-12">
					<h3><span class="typcn typcn-briefcase"> Expérience professionnelle</h3>
					<div class="blocs">
						<table>
							<thead>
								<tr>
									<td>Intitulé</td>
									<td>&Eacute;tat</td>
									<td>Résultat</td>
									<td>Date</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Test de personnalité</td>
									<td>60%</td>
									<td>Mordu des Arts</td>
									<td>15/01/2017</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>				
			</div> -->
		</div>	

	</div>
	
<?php

	include('../includes/footerPlateforme.php');
	}
?>