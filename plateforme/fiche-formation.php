<?php

	include('../config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user, profil WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();

		$reqFiche = $bdd->prepare('SELECT * FROM fiche_formation WHERE idFormation = ?');
		$reqFiche->execute(array($_GET['id']));
		$ficheInfo = $reqFiche->fetch();

		$exDesc = $bdd->prepare('SELECT description FROM fiche_formation WHERE idFormation = ?');
		$exDesc->execute(array($_GET['id']));
		$description = $exDesc->fetch();
		$desc = explode('|',$description['description']);

		$exDebou = $bdd->prepare('SELECT debouches FROM fiche_formation WHERE idFormation = ?');
		$exDebou->execute(array($_GET['id']));
		$debouches = $exDebou->fetch();
		$deb = explode(';',$debouches['debouches']);

		$exPoursuite = $bdd->prepare('SELECT poursuite FROM fiche_formation WHERE idFormation = ?');
		$exPoursuite->execute(array($_GET['id']));
		$poursuite = $exPoursuite->fetch();
		$po = explode(';',$poursuite['poursuite']);

		$exLieu = $bdd->prepare('SELECT lieuFormation FROM fiche_formation WHERE idFormation = ?');
		$exLieu->execute(array($_GET['id']));
		$lieuF = $exLieu->fetch();
		$lieu = explode(';',$lieuF['lieuFormation']);

		$exDuree = $bdd->prepare('SELECT dureeFormation FROM fiche_formation WHERE idFormation = ?');
		$exDuree->execute(array($_GET['id']));
		$duree = $exDuree->fetch();
		$dur = explode(';',$duree['dureeFormation']);

		$exCommune = $bdd->prepare('SELECT communeFormation FROM fiche_formation WHERE idFormation = ?');
		$exCommune->execute(array($_GET['id']));
		$commune = $exCommune->fetch();
		$comm = explode(';',$commune['communeFormation']);

	$page = "M'orienter";
    $description = "Avenir - La plateforme de la réoriention facile - Fiche métier";

    include('../includes/headerPlateforme.php');
?>

	<div class="fiche-formation" id="main-content">

		<?php include('../includes/secondNav.php'); ?>

		<div class="fiches content-container">
			<div>
				<a href="#" title="Retour à la recherche" class="btn btn-retour"> <span class="typcn typcn-arrow-left-thick"></span>Retour à la recherche</a>
				<a href="#" title="Etre accompagné" class="btn btn-secondaire">Je veux être accompagné</a>
			</div>

			<div class="fiche">
				<div class="header-fiche">
					<a href="#" title="Ajouter aux favoris" class="btn btn-favoris"><span class="typcn typcn-star-outline"></span> Ajouter aux favoris</a>
					<h2><?php echo $ficheInfo['formation']; ?></h2>
				</div>
				<div class="content-fiche">
					<div class="informations">
						<p><strong>Ministère(s) de Tutelle :</strong> <?php echo $ficheInfo['ministere']; ?></p>
						<p><strong>Nature du diplôme :</strong> <?php echo $ficheInfo['natureDiplome']; ?></p>
						<p><strong>Niveau d'admission requis :</strong> <?php if(!empty($ficheInfo['natureAdmission'])) { echo $ficheInfo['natureAdmission']; } ?></p>
						<p><strong>Durée de la formation :</strong> <?php echo $ficheInfo['duree']; ?></p>
						<p><strong>Niveau terminal d'études :</strong> <?php echo $ficheInfo['niveauTerminal']; ?></p>
					</div>

					<div class="Description">
						<h3>Description</h3>

						<p>
							<?php if(!empty($desc[0])) { echo $desc[0]; } ?> <br>
							<?php if(!empty($desc[1])) { echo $desc[1]; } ?> <br>
							<?php if(!empty($desc[2])) { echo $desc[2]; } ?> <br>
							<?php if(!empty($desc[3])) { echo $desc[3]; } ?>
						</p>

						<div>
							<h4>Débouchés professionnels</h4>

							<ul>
								<?php if(!empty($deb[0])) { echo '<li>'.$deb[0].'</li>'; } ?>
								<?php if(!empty($deb[1])) { echo '<li>'.$deb[1].'</li>'; } ?>
								<?php if(!empty($deb[2])) { echo '<li>'.$deb[2].'</li>'; } ?>
								<?php if(!empty($deb[3])) { echo '<li>'.$deb[3].'</li>'; } ?>
								<?php if(!empty($deb[4])) { echo '<li>'.$deb[4].'</li>'; } ?>
								<?php if(!empty($deb[5])) { echo '<li>'.$deb[5].'</li>'; } ?>
								<?php if(!empty($deb[6])) { echo '<li>'.$deb[6].'</li>'; } ?>
								<?php if(!empty($deb[7])) { echo '<li>'.$deb[7].'</li>'; } ?>
								<?php if(!empty($deb[8])) { echo '<li>'.$deb[8].'</li>'; } ?>
								<?php if(!empty($deb[9])) { echo '<li>'.$deb[9].'</li>'; } ?>
								<?php if(!empty($deb[10])) { echo '<li>'.$deb[10].'</li>'; } ?>
								<?php if(!empty($deb[11])) { echo '<li>'.$deb[11].'</li>'; } ?>
								<?php if(!empty($deb[12])) { echo '<li>'.$deb[12].'</li>'; } ?>
								<?php if(!empty($deb[13])) { echo '<li>'.$deb[13].'</li>'; } ?>
								<?php if(!empty($deb[14])) { echo '<li>'.$deb[14].'</li>'; } ?>
								<?php if(!empty($deb[15])) { echo '<li>'.$deb[15].'</li>'; } ?>
								<?php if(!empty($deb[16])) { echo '<li>'.$deb[16].'</li>'; } ?>
								<?php if(!empty($deb[17])) { echo '<li>'.$deb[17].'</li>'; } ?>
								<?php if(!empty($deb[18])) { echo '<li>'.$deb[18].'</li>'; } ?>
								<?php if(!empty($deb[19])) { echo '<li>'.$deb[19].'</li>'; } ?>
								<?php if(!empty($deb[20])) { echo '<li>'.$deb[20].'</li>'; } ?>
							</ul>
						</div>	

						<div>
							<h4>Admission</h4>

							<p><?php if(!empty($ficheInfo['admission'])) { echo $ficheInfo['admission']; } ?></p>
						</div>

						<div>
							<h4>Poursuite d'études</h4>

							<ul>
								<?php if(!empty($po[0])) { echo '<li>'.$po[0].'</li>'; } ?>
								<?php if(!empty($po[1])) { echo '<li>'.$po[1].'</li>'; } ?>
								<?php if(!empty($po[2])) { echo '<li>'.$po[2].'</li>'; } ?>
								<?php if(!empty($po[3])) { echo '<li>'.$po[3].'</li>'; } ?>
								<?php if(!empty($po[4])) { echo '<li>'.$po[4].'</li>'; } ?>
								<?php if(!empty($po[5])) { echo '<li>'.$po[5].'</li>'; } ?>
								<?php if(!empty($po[6])) { echo '<li>'.$po[6].'</li>'; } ?>
								<?php if(!empty($po[7])) { echo '<li>'.$po[7].'</li>'; } ?>
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
								<?php if(!empty($lieu[0])) { ?>
									<tr>
										<td><?php echo $lieu[0]; ?></td>
										<td><?php if(!empty($dur[0])) { echo $dur[0]; } ?></td>
										<td><?php echo $comm[0]; ?></td>
									</tr>
								<?php } ?>

								<?php if(!empty($lieu[1])) { ?>
									<tr>
										<td><?php echo $lieu[1]; ?></td>
										<td><?php if(!empty($dur[1])) { echo $dur[1]; } ?></td>
										<td><?php echo $comm[1]; ?></td>
									</tr>
								<?php } ?>

								<?php if(!empty($lieu[2])) { ?>
									<tr>
										<td><?php echo $lieu[2]; ?></td>
										<td><?php if(!empty($dur[2])) { echo $dur[2]; } ?></td>
										<td><?php echo $comm[2]; ?></td>
									</tr>
								<?php } ?>

								<?php if(!empty($lieu[3])) { ?>
									<tr>
										<td><?php echo $lieu[3]; ?></td>
										<td><?php if(!empty($dur[3])) { echo $dur[3]; } ?></td>
										<td><?php echo $comm[3]; ?></td>
									</tr>
								<?php } ?>

								<?php if(!empty($lieu[4])) { ?>
									<tr>
										<td><?php echo $lieu[4]; ?></td>
										<td><?php if(!empty($dur[4])) { echo $dur[4]; } ?></td>
										<td><?php echo $comm[4]; ?></td>
									</tr>
								<?php } ?>

								<?php if(!empty($lieu[5])) { ?>
									<tr>
										<td><?php echo $lieu[5]; ?></td>
										<td><?php if(!empty($dur[5])) { echo $dur[5]; } ?></td>
										<td><?php echo $comm[5]; ?></td>
									</tr>
								<?php } ?>
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