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

	<div class="fiche-formation" id="main-content">

		<?php include('../includes/secondNav.php'); ?>

		<div class="fiches">
			<div>
				<a href="#" title="Retour à la recherche" class="btn btn-retour">Retour à la recherche</a>
				<a href="#" title="Etre accompagné" class="btn btn-secondaire">Je veux être accompagné</a>
			</div>

			<div class="fiche">
				<div class="header-fiche">
					<a href="#" title="Ajouter aux favoris" class="btn btn-favoris">Ajouter aux favoris</a>
					<h2>DUT Information-communication - Option publicité</h2>					
				</div>
				<div class="content-fiche">
					<div class="informations">
						<p><strong>Ministère(s) de Tutelle :</strong> Ministère chargé de l'Enseignement supérieur et de la Recherche</p>
						<p><strong>Nature du diplôme :</strong> Diplôme national ou diplôme d'Etat</p>
						<p><strong>Niveau d'admission requis :</strong> Bac ou équivalent</p>
						<p><strong>Durée de la formation :</strong> 2 ans</p>
						<p><strong>Niveau terminal d'études :</strong> bac + 2</p>
					</div>

					<div class="Description">
						<h3>Description</h3>

						<p>
							Le titulaire du DUT Information-communication option publicité est un spécialiste de la communication, du marketing et des réalisations publicitaires.<br>
En amont, il réalise des études de marché, qui servent à déterminer les arguments, les supports et les moyens publicitaires pertinents. Il intervient ensuite à toute les étapes de la campagne : étude et définition de la cible, des objectifs, des thèmes, du message, et répartition du budget. Il suit tout le processus de la conception à la fabrication, veille au respect des délais et des coûts, recherche des supports, et achète des espaces et temps publicitaires dans les différents médias (affichage, télévisons, presse, radio, Web…) en négociant le meilleur prix.<br>
Le diplômé peut travailler dans des agences conseils, des agences médias ou chez les annonceurs. S'il commence par des postes d'assistant, il peut évoluer avec de l'expérience vers des postes à responsabilité comme chef de publicité, planneur stratégique, consultant, directeur artistique, concepteur-rédacteur, ou responsable marketing.
						</p>

						<div>
							<h4>Débouchés professionnels</h4>

							<ul>
								<li><a href="#">Acheteur/euse d'espace publicitaire</a></li>
								<li><a href="#">Chargé/e d'études média</a></li>
								<li><a href="#">Chef/fe de publicité</a></li>
								<li><a href="#">Concepteur/trice-rédacteur/trice</a></li>
							</ul>
						</div>	

						<div>
							<h4>Admission</h4>

							<p>L'accès au DUT se fait sur dossier, entretien, voire tests avec le bac ; le plus souvent bac L, ES, S et STMG. En année spéciale (la durée de la formation est de un an), il faut avoir validé 60 crédits européens ou suivi un enseignement supérieur de 2 ans et passer devant un jury d'admission.</p>
						</div>

						<div>
							<h4>Poursuite d'études</h4>

							<ul>
								<li><a href="#">Licence pro activités et techniques de communication spécialité création publicitaire</a></li>
								<li><a href="#">Licence pro activités et techniques de communication spécialité métiers de la publicité</a></li>
								<li><a href="#">Licence pro commerce spécialité marketing et nouvelles technologies de l'information et de la communication</a></li>
								<li><a href="#">Responsable projet communication interne et externe</a></li>
							</ul>
						</div>	
						
					</div>

					<div class="ou-se-former">
						<h3>Où se former ?</h3>

						<table>
							<thead>
								<tr>
									<td>Nom de l'établissement</td>
									<td>Durée</td>
									<td>Commune</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>IUT Robert Schuman, Université de Strasbourg</td>
									<td>2 ans</td>
									<td>Illkirch-Graffenstaden</td>
								</tr>
								<tr>
									<td>IUT Bordeaux Montaigne, Université Bordeaux Montaigne</td>
									<td>2 ans</td>
									<td>Bordeaux</td>
								</tr>
								<tr>
									<td>IUT Paris Descartes, Université Paris Descartes</td>
									<td>2 ans</td>
									<td>Paris</td>
								</tr>
							</tbody>
						</table>
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