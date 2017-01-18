<?php

	include('../config/settings.php');

	if(isset($_GET['id']) AND $_GET['id'] > 0){

		$getID = intval($_GET['id']);
		$reqUser = $bdd->prepare("SELECT * FROM user, profil WHERE id = ?");
		$reqUser->execute(array($getID));
		$userInfo = $reqUser->fetch();

		$cheminCV = "../membres/cv/".$userInfo['cv'];
		$cheminLM = "../membres/lettreMotivation/".$userInfo['lm'];


	$page = "M'orienter";
    $description = "Avenir - La plateforme de la réoriention facile - Page de recherche";

    include('../includes/headerPlateforme.php');
?>

	<div class="" id="main-content">
		
		<?php include('../includes/secondNav.php'); ?>

		<div class="profil">
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
										<span class="typcn typcn-device-phone"></span> 06 00 00 00 00
									</div>
									<div class="col-lg-4">
										<span class="typcn typcn-mail"></span> <?php echo $userInfo['mail']; ?>
									</div>
								</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
						<li>Sens du contact</li>
						<li>Résistance au stress</li>
						<li>Spécialisation et technicité</li>
					</ul>
					<a href="editionProfil.php"><span class="typcn typcn-edit"></span></a>
				</div>
				<div class="ctr-interets col-lg-6">
					<h3><span class="typcn typcn-heart-outline"></span> Centres d'intérêts</h3>
					<ul>
						<li>Running</li>
						<li>Dessin</li>
						<li>Partir à l'aventure</li>
						<li>Manager</li>
					</ul>
					<a href="editionProfil.php"><span class="typcn typcn-edit"></span></a>
				</div>
			</div>
		</div>	

	</div>
	
<?php

	include('../includes/footerPlateforme.php');
	}
?>