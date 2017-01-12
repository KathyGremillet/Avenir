<?php

	include('config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user, profil WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();

	$page = "Accueil";
    $description = "Avenir - La plateforme de la réoriention facile - Page profil";

    include('includes/headerPlateforme.php');
?>

	<div class="accueil" id="main-content">

		<?php include('includes/secondNav.php'); ?>

		<div>
			<div class="complete-profile">
				<img src="../images/mascotte.png" alt="Image de la mascotte d'Avenir"/>
				<h2>Complète ton profil</h2>
				<p>Pour profiter de notre expertise et trouver ta voie, complète entièrement ton profil.</p>
				<a href="editionProfil.php" class="btn">Je fonce</a>
			</div>
			<div class="news row container-content">
				<div class="col-lg-4 bloc-news">
					<a href="#" title="Top 10 des jobs du futur">
						<div class="">
							<h2>Top 10</h2>
							<p>Jobs du futur</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 bloc-news">
					<a href="#" title="Portrait de Doriann">
						<div class="">
							<h2>Doriann</h2>
							<p>Découvre son parcours</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 bloc-news">
					<a href="#" title="Top 5 des écoles de commerce gratuites">
						<div class="">
							<h2>Top 5</h2>
							<p>écoles de commerce gratuites</p>
						</div>
					</a>
				</div>
				<div class="col-lg-8 bloc-news">
					<div class="">
						<h2>Le sais-tu ?</h2>
						<p>61% des élèves à la fac arrêtent dès la première année.<br/>
							Alors destress tu n'est pas le seul.</p>
					</div>
				</div>
				<div class="col-lg-4 bloc-news">
					<a href="#" title="Les événements">
						<div class="">
							<img src="../images/icon-event.png">
							<h2>événements</h2>
						</div>
					</a>
				</div>
			</div>
		</div>

	</div>

<?php
	include('../includes/footerPlateforme.php');

	} else {
		header('Location: plateforme/connexion.php');
	}
	
?>