<?php

	include('../config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user, profil WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();

	$page = "Mon conseiller";
    $description = "Avenir - La plateforme de la réoriention facile - Page Mon conseiller";

    include('../includes/headerPlateforme.php');
?>

	<div class="conseiller" id="main-content">

		<?php include('../includes/secondNav.php'); ?>

		<div>
			<div class="complete-profile">
				<h2>Profitez exclusivement de 15min avec votre futur conseiller</h2>
				<p>Pour profiter de notre expertise et trouver ta voie, prend un rendez-vous avec un de nos conseiller.</p>
				<a href="#" class="btn">Prendre rendez-vous</a>
			</div>
			<div class="avantages row container-content">
				<h2>Les avantages</h2>

				<div class="col-lg-4 col-sm-12 ">	
					<span class="typcn typcn-group"></span>
					<h3>Lorem Ipsum</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rutrum, arcu at feugiat pharetra, eros massa hendrerit ipsum, et elementum lacus eros vel purus. </p>			
				</div>
				<div class="col-lg-4 col-sm-12 ">	
					<span class="typcn typcn-group"></span>
					<h3>Lorem Ipsum</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rutrum, arcu at feugiat pharetra, eros massa hendrerit ipsum, et elementum lacus eros vel purus. </p>			
				</div>
				<div class="col-lg-4 col-sm-12 ">	
					<span class="typcn typcn-group"></span>
					<h3>Lorem Ipsum</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rutrum, arcu at feugiat pharetra, eros massa hendrerit ipsum, et elementum lacus eros vel purus. </p>			
				</div>
			</div>

			<div class="offres row container-content">
				<h2>Nos offres</h2>

				<div class="col-lg-5 col-lg-offset-1 col-md-6 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0 freemium">	
					<div>
						<div class="offre"><h3>Freemium</h3></div>
						<div class="list">
							<ul>
								<li>15 minutes avec un conseiller</li>
								<li>Accès aux fiches métiers, écoles...</li>
								<li>Accès aux actualités</li>
								<li>Accès aux favoris</li>
								<li>Test d'orientation gratuit</li>
							</ul>

							<a href="#" class="btn">Prendre rendez-vous</a>
						</div>
					</div>							
				</div>
				<div class="col-lg-5 col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0 premium">	
					<div>
						<div class="offre"><h3>29€<br/><span>Premium</span></h3></div>
						<div class="list">
							<ul>
								<li>Suivi personnalisé avec un conseiller</li>
								<li>Accès aux fiches métiers, écoles...</li>
								<li>Accès aux actualités</li>
								<li>Tests de personnalité, d'orientation...</li>
								<li>Appels audio et vidéos illimités</li>
							</ul>

							<a href="#" class="btn">Commander</a>
						</div>
					</div>							
				</div>
			</div>
			<div class="complete-profile">
				<h2>N'attends plus pour réserver votre place</h2>
				<p>Profite de notre expertise et trouve ta voie.</p>
				<a href="#" class="btn">Prendre rendez-vous</a>
			</div>
		</div>

	</div>

<?php
	include('../includes/footerPlateforme.php');

	} else {
		header('Location: connexion.php');
	}
	
?>