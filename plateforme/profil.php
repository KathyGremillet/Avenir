<?php

	include('../config/settings.php');

	if(isset($_GET['id']) AND $_GET['id'] > 0){

		$getID = intval($_GET['id']);
		$reqUser = $bdd->prepare("SELECT * FROM user, profil WHERE id = ?");
		$reqUser->execute(array($getID));
		$userInfo = $reqUser->fetch();

		$cheminCV = "../membres/cv/".$userInfo['cv'];
		$cheminLM = "../membres/lettreMotivation/".$userInfo['lm'];

		$exCentreInteret = $bdd->prepare('SELECT centreInteret FROM profil WHERE idUser = ?');
		$exCentreInteret->execute(array($_SESSION['id']));
		$CeIn = $exCentreInteret->fetch();
		$CI = explode(';',$CeIn['centreInteret']);

		$exCompetences = $bdd->prepare('SELECT competences FROM profil WHERE idUser = ?');
		$exCompetences->execute(array($_SESSION['id']));
		$Comp = $exCompetences->fetch();
		$C = explode(';',$Comp['competences']);


	$page = "Profil";
    $description = "Avenir - La plateforme de la réoriention facile - Page de recherche";

    include('../includes/headerPlateforme.php');
?>

	<div class="" id="main-content">
		
		<?php include('../includes/secondNav.php'); ?>

		<div class="profil content-container">
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
										<span class="typcn typcn-location"></span> <?php if(isset($userInfo['ville'])) { echo $userInfo['ville']; } ?>
									</div>
									<div class="col-lg-5">
										<span class="typcn typcn-device-phone"></span> <?php if(isset($userInfo['tel'])) { echo $userInfo['tel']; } ?>
									</div>
									<div class="col-lg-4">
										<span class="typcn typcn-mail"></span> <?php echo $userInfo['mail']; ?>
									</div>
								</div>
								<p>
									<?php echo $userInfo['description']; ?>
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
							<h4>Poste</h4>
							<h5>Entreprise</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						</div>
						<div>
							<h4>Poste</h4>
							<h5>Entreprise</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						</div>
						<a href="editionProfil.php"><span class="typcn typcn-edit"></span></a>
					</div>
				</div>
				<div class="cursus col-lg-6">
					<h3><span class="typcn typcn-mortar-board"> Cursus scolaire</h3>
					<div class="blocs">
						<div>
							<h4>Formation</h4>
							<h5>École</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						</div>
						<div>
							<h4>Formation</h4>
							<h5>École</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						</div>
						<a href="editionProfil.php"><span class="typcn typcn-edit"></span></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="competences col-lg-6">
					<h3><span class="typcn typcn-puzzle-outline"></span> Compétences</h3>
					<ul>
						<?php if(!empty($C[0])) { echo '<li>'.$C[0].'</li>'; } ?>
						<?php if(!empty($C[1])) { echo '<li>'.$C[1].'</li>'; } ?>
						<?php if(!empty($C[2])) { echo '<li>'.$C[2].'</li>'; } ?>
						<?php if(!empty($C[3])) { echo '<li>'.$C[3].'</li>'; } ?>
						<?php if(!empty($C[4])) { echo '<li>'.$C[4].'</li>'; } ?>
					</ul>
					<a href="editionProfil.php"><span class="typcn typcn-edit"></span></a>
				</div>
				<div class="ctr-interets col-lg-6">
					<h3><span class="typcn typcn-heart-outline"></span> Centres d'intérêts</h3>
					<ul>
						<?php if(!empty($CI[0])) { echo '<li>'.$CI[0].'</li>'; } ?>
						<?php if(!empty($CI[1])) { echo '<li>'.$CI[1].'</li>'; } ?>
						<?php if(!empty($CI[2])) { echo '<li>'.$CI[2].'</li>'; } ?>
						<?php if(!empty($CI[3])) { echo '<li>'.$CI[3].'</li>'; } ?>
						<?php if(!empty($CI[4])) { echo '<li>'.$CI[4].'</li>'; } ?>
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