<?php

	include('../config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user, profil WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();

	$page = "Mes tests";
    $description = "Avenir - La plateforme de la réoriention facile - Fiche métier";

    include('../includes/headerPlateforme.php');
?>

	<div class="fiche-metier fiches" id="main-content">

		<?php include('../includes/secondNav.php'); ?>

		<div class="">
			<div>
				<a href="#" title="Retour à la recherche" class="btn">Retour à la recherche</a>
				<a href="#" title="Etre accompagné" class="btn">Je veux être accompagné</a>
			</div>

			<div class="fiche">
				<div class="header-fiche">
					<a href="#" title="Ajouter aux favoris" class="btn">Ajouter aux favoris</a>
					<h2>Acheteur / Acheteuse d'espaces publicitaires</h2>
					<p>Blablabla tzyeuirtgjzoe euziropgbj ueoizrjgk</p>
				</div>
				<div class="content-fiche">
					<div class="informations">
						<p><strong>Niveau minimum d'accès :</strong> bac +2</p>
						<p><strong>Salaire débutant :</strong> 2 100€</p>
						<p><strong>Statut(s) :</strong> Statut salarié</p>
						<p><strong>Synonymes :</strong> Acheteur/euse d'e-pub, Acheteur/euse médias, Média-acheteur euse</p>
						<p><strong>Secteur(s) professionnel(s) :</strong> Communication - Publicité</p>
						<p><strong>Centre(s) d'intérêt :</strong> J'ai la bosse du commerce, J'ai le sens du contact, J'aime bouger</p>
					</div>

					<div class="description">
						<h3>Description</h3>

						<h4>Cerner les besoins</h4>
						<p>Objectif de l'acheteur d'espaces publicitaires : maximiser l'impact d'une campagne de publicité. Pour cela, il s'appuie sur les études du chargé d'études média
		et de son plan média. Ce plan sert de base de travail puisqu'il détermine la nature du produit, les données du marché, le calendrier et le budget prévisionnel, la
		cible, les objectifs, etc. L'acheteur élabore avec le chargé d'études le plan de diffusion qui est ensuite soumis à l'approbation du client. Dans les petites
		structures, notamment dans le Web, une seule personne remplit ces deux fonctions.</p>

						<h4>Obtenir l'emplacement idéal</h4>
						<p>Après validation par le client, l'acheteur d'espaces publicitaires contacte divers interlocuteurs (entreprises d'affichage, régies publicitaires des radios, des télés
		et du Web, presse...) avec qui il négocie l'emplacement le mieux situé, l'horaire de diffusion le plus pertinent à la radio et/ou à la télé, la meilleure place dans un
		magazine... en fonction de la durée de la campagne publicitaire, du calendrier et du budget prévisionnel.</p>

						<h4>Optimiser les coûts</h4>
						<p>L'achat d'espaces dans les médias peut représenter jusqu'à 80 % du coût d'une campagne publicitaire. L'acheteur doit donc négocier, quel que soit le support
		retenu, et toujours chercher à obtenir le meilleur rapport qualité-prix.</p>

						<h4>Compétences requises</h4>
						<ul>
							<li>Sens du contact</li>
							<li>Résistance au stress</li>
							<li>Spécialisation et technicité</li>
						</ul>
					</div>

					<div class="etudes">
						<h3>études</h3>

						<p>
							<span class="niveau">bac + 2</span>
							<a href="#">BTS Communication</a><br>
							<a href="#">DUT Information-communication option publicité</a>
						</p>
						<p>
							<span class="niveau">bac + 3</span>
							<a href="#">Licence pro e-commerce et marketing numérique</a><br>
							<a href="#">Licence pro métiers du marketing opérationnel</a>
						</p>
						<p>
							<span class="niveau">bac + 5</span>
							<a href="#">Master marketing, vente</a><br>
							<a href="#">Master pro information et communication spécialité marketing, publicité et communication</a>
						</p>
					</div>
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