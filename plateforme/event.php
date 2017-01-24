<?php

	include('../config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user, profil WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();

	$page = "Evénement";
    $description = "Avenir - La plateforme de la réoriention facile - Evénements";

    include('../includes/headerPlateforme.php');
?>

	<div class="articles event" id="main-content">
		<?php include('../includes/secondNav.php'); ?>

		<div class="content-container">
			<div>
				<a href="accueil.php" title="Retour à l'accueil'" class="btn btn-retour"><span class="typcn typcn-arrow-left-thick"></span> Retour à l'accueil</a>
			</div>

			<div class="article">
				<div class="header-article">
					<h2>Energie city</h2>
					<p>Transformations du secteur de l'énergie : nouveaux acteurs et services.</p>
				</div>
				<div class="content-article">
					<h3>28/01/2017 <br/> 19:00</h3>
					<p class="lieu"><span class="typcn typcn-location"></span> 39 Rue du Caire, 75002 Paris, France</p>

					<p>Dans le cadre de notre programme sur la ville de demain, Renault Innovation Lab - Le Square et NUMA vous invitent à une discussion sur les mutations du secteur de l'énergie, ses opportunités business et ses conséquences sur les citoyens.</p>
					<p>Attention : cet événement aura lieu au Square, 3 Passage Saint-Pierre - Amelot, 75011 Paris.</p>
					<p>Les nouvelles réglementations liées à l'énergie ont permis l'ouverture du marché à de nouveaux acteurs, à tous les niveaux de la chaîne : production, stockage, distribution. Cette ouverture a bouleversé les modèles centralisés historiques et favorisé l'émergence de nouveaux services.</p>
					<p>Après une keynote de présentation sur les principales mutations du secteur, ses conséquences et opportunités, nous échangerons autour de trois questions : </p>
					<p>Qui sont les nouveaux acteurs de l'énergie ? Comment les innovations technologiques ont-elles et vont-elles impacter le secteur et la façon dont nous produisons et consommons l'énergie en ville ? Comment les industries "classiques" peuvent-elles s'emparer de ces mutations et accompagner ces nouveaux modèles ?</p>
					<p>Quelle est la place des véhicules en ville dans ce nouveau marché ? Principalement consommateurs d'énergie les "objets roulants" peuvent-ils aussi en créer, la stocker et la redistribuer ?</p>
					<p>Consommateurs-investisseurs, coopératives, crowfunding : quels sont les nouveaux business modèles de l'énergie ? Comment répartir la valeur créée ?</p>
					<p>Cette discussion sera animée par Daniel Geiselhart, co-fondateur de Silex ID.</p>
					<p>Avec : <br/>
						Jérôme Perrin, Directeur Scientifique chez Renault<br/>
						Erwan Boumard, Directeur Général d'Energie Partagée<br/>
						Stéphane Labranche, Sociologue de l'Energie et du Climat, il a participé à l'étude "Scénarios de transition énergétique en ville - Acteurs, régulations, technologies*<br/>
						Engie</p>

					<a href="#" title="Ajouter à mon agenda" class="btn btn-secondaire">Ajouter à mon agenda</a>

				</div>	
			</div>
		</div>
	</div>

<?php
	include('../includes/footerPlateforme.php');

	} else {
		header('Location: connexion.php');
	}
	
?>