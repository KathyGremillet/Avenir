<?php

	include('../config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user, profil WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();

		$reqFiche = $bdd->prepare('SELECT * FROM fiche_metier WHERE id = ?');
		$reqFiche->execute(array($_GET['id']));
		$ficheInfo = $reqFiche->fetch();

		$exDesc = $bdd->prepare('SELECT description FROM fiche_metier WHERE id = ?');
		$exDesc->execute(array($_GET['id']));
		$description = $exDesc->fetch();
		$desc = explode('|',$description['description']);

		$exComp = $bdd->prepare('SELECT competencesRequises FROM fiche_metier WHERE id = ?');
		$exComp->execute(array($_GET['id']));
		$competences = $exComp->fetch();
		$comp = explode(';',$competences['competencesRequises']);

		$exEtude = $bdd->prepare('SELECT etude FROM fiche_metier WHERE id = ?');
		$exEtude->execute(array($_GET['id']));
		$etudes = $exEtude->fetch();
		$etu = explode(';',$etudes['etude']);

	$page = "M'orienter";
    $description = "Avenir - La plateforme de la réoriention facile - Fiche métier";

    include('../includes/headerPlateforme.php');
?>

	<div class="fiche-metier" id="main-content">

		<?php include('../includes/secondNav.php'); ?>

		<div class="fiches content-container">
			<div>
				<a href="recherche.php" title="Retour à la recherche" class="btn btn-retour">Retour à la recherche</a>
				<a href="#" title="Etre accompagné" class="btn btn-secondaire">Je veux être accompagné</a>
			</div>

			<div class="fiche">
				<div class="header-fiche">
					<a href="#" title="Ajouter aux favoris" class="btn btn-favoris">Ajouter aux favoris</a>
					<h2><?php echo $ficheInfo['metier']; ?></h2>
					<p><?php echo $ficheInfo['info']; ?></p>
				</div>
				<div class="content-fiche">
					<div class="informations">
						<p><strong>Niveau minimum d'accès :</strong> <?php echo $ficheInfo['niveauMinimum']; ?></p>
						<p><strong>Salaire débutant :</strong> <?php echo $ficheInfo['salaire']; ?> €</p>
						<p><strong>Statut(s) :</strong> <?php echo $ficheInfo['statut']; ?></p>
						<p><strong>Synonymes :</strong> <?php echo $ficheInfo['synonymes']; ?></p>
						<p><strong>Secteur(s) professionnel(s) :</strong> <?php echo $ficheInfo['domaine']; ?></p>
						<p><strong>Centre(s) d'intérêt :</strong> <?php echo str_replace("|",",",$ficheInfo['centreInteret']); ?></p>
					</div>

					<div class="description">
						<h3>Description</h3>

						<h4><?php echo $desc[0]; ?></h4>
						<p><?php echo $desc[1]; ?></p>

						<h4><?php echo $desc[2]; ?></h4>
						<p><?php echo $desc[3]; ?></p>

						<h4><?php echo $desc[4]; ?></h4>
						<p><?php echo $desc[5]; ?></p>

						<div class="competences">
							<h4>Compétences requises</h4>
							<ul>
								<?php 
								if(!empty($comp[0])) { echo '<li>'.$comp[0].'</li>'; } 
								if(!empty($comp[1])) { echo '<li>'.$comp[1].'</li>'; }
								if(!empty($comp[2])) { echo '<li>'.$comp[2].'</li>'; } ?>
							</ul>
						</div>
						
					</div>

					<div class="etudes">
						<h3>études</h3>

						<div>
							<?php
							if(!empty($etu[0])) { ?>
								<p><a href="#"><?php echo $etu[0]; ?></a></p>
							<?php } 
							if(!empty($etu[1])) { ?>
								<p><a href="#"><?php echo $etu[1]; ?></a></p>
							<?php } 
							if(!empty($etu[2])) { ?>
								<p><a href="#"><?php echo $etu[2]; ?></a></p>
							<?php }
							if(!empty($etu[3])) { ?>
								<p><a href="#"><?php echo $etu[3]; ?></a></p>
							<?php }
							if(!empty($etu[4])) { ?>
								<p><a href="#"><?php echo $etu[4]; ?></a></p>
							<?php }
							if(!empty($etu[5])) { ?>
								<p><a href="#"><?php echo $etu[5]; ?></a></p>
							<?php }
							if(!empty($etu[6])) { ?>
								<p><a href="#"><?php echo $etu[6]; ?></a></p>
							<?php } 
							if(!empty($etu[7])) { ?>
								<p><a href="#"><?php echo $etu[7]; ?></a></p>
							<?php }
							if(!empty($etu[8])) { ?>
								<p><a href="#"><?php echo $etu[8]; ?></a></p>
							<?php }
							if(!empty($etu[9])) { ?>
								<p><a href="#"><?php echo $etu[9]; ?></a></p>
							<?php }
							if(!empty($etu[10])) { ?>
								<p><a href="#"><?php echo $etu[10]; ?></a></p>
							<?php }

							?>
			
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