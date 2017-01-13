<?php

	include('../config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user, profil WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();

	$page = "M'orienter";
    $description = "Avenir - La plateforme de la réoriention facile - Fiche métier";

    include('../includes/headerPlateforme.php');
?>

	<div class="fiche-ecole" id="main-content">

		<?php include('../includes/secondNav.php'); ?>

		<div class="fiches">
			<div>
				<a href="#" title="Retour à la recherche" class="btn btn-retour">Retour à la recherche</a>
				<a href="#" title="Etre accompagné" class="btn btn-secondaire">Je veux être accompagné</a>
			</div>

			<div class="fiche">
				<div class="header-fiche">
					<a href="#" title="Ajouter aux favoris" class="btn btn-favoris">Ajouter aux favoris</a>
					<h2>IUT Bordeaux Montaigne, université Bordeaux Montaigne</h2>					
				</div>
				<div class="content-fiche">
					<div class="informations">
						<p><strong>Tutelle :</strong> Ministère chargé de l'Enseignement supérieur et de la Recherche</p>
						<p><strong>Statut de l'établissement :</strong> Public</p>
						<p><strong>Journées portes ouvertes :</strong> Le 11/02/2017, de 10h à 16h</p>
						<p><strong>Voir aussi :</strong> CFA Université Bordeaux Montaigne</p>
						<p><strong>Site web :</strong> www.iut.u-bordeaux-montaigne.fr</p>
						<p><strong>Contact :</strong> scolarite-iut@iut.u-bordeaux.montaigne.fr</p>
					</div>

					<div class="formations">
						<h3>Formations</h3>

						<div>
							<h4>Bac +2</h4>		
							<div>
								<p><strong>DUT (Diplôme universitaire de technologie)</strong></p>
								<p>
									<ul>
										<li><a href="#">Carrières sociales</a></li>
										<li><a href="#">Information-communication</a></li>
										<li><a href="#">Métiers du multimédia et de l'Internet</a></li>
									</ul>
								</p>
							</div>
							<div>
								<p><strong>Préparation aux concours de la fonction publique</strong></p>
								<p>
									<ul>
										<li><a href="#">Préparation au concours de bibliothécaire d'Etat (catégorie A)</a></li>
									</ul>
								</p>
							</div>
						</div>
						<div>
							<h4>Bac +3</h4>		
							<div>
								<p><strong>Licence professionnelle</strong></p>
								<p>
									<ul>
										<li><a href="#">E-commerce et marketing numérique</a></li>
										<li><a href="#">Gestion de projets et structures artistiques et culturels</a></li>
										<li><a href="#">Métiers de l'animation sociale, socio-éducative et socio-culturelle</a></li>
										<li><a href="#">Métiers de l'information : archives, médiation et patrimoine</a></li>
										<li><a href="#">Métiers de la communication : chef de projet communication</a></li>
									</ul>
								</p>
							</div>
							<div>
								<p><strong>DU (Diplôme d'université)</strong></p>
								<p>
									<ul>
										<li><a href="#">Etudes technologiques internationales</a></li>
									</ul>
								</p>
							</div>
						</div>
						
						
					</div>

					<div class="localisation">
						<h3>Localisation</h3>

						<div>
							<p>
								<strong>Université Bordeaux Montaigne</strong>
							</p>
							<p>1 Rue Jacques Ellul <br>
								33080 Bordeaux Cedex</p>
							<p>Tèl. : 05 57 12 20 44</p>
						</div>
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