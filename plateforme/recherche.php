<?php 

include('../config/settings.php');

$req = $bdd->prepare('SELECT * FROM fiche_metier ORDER BY id ASC');
$req->execute();

$titre = $bdd->prepare('SELECT * FROM fiche_metier ORDER BY id ASC');
$titre->execute();

$optionDomaine = $bdd->prepare('SELECT DISTINCT domaine FROM fiche_metier');
$optionDomaine->execute();

$optionSalaire = $bdd->prepare('SELECT DISTINCT salaire FROM fiche_metier');
$optionSalaire->execute();

$optionEtude = $bdd->prepare('SELECT DISTINCT niveauMinimum FROM fiche_metier');
$optionEtude->execute();

$optionStatut = $bdd->prepare('SELECT DISTINCT statut FROM fiche_metier');
$optionStatut->execute();

// Début recherche
if(isset($_GET['q']) AND !empty($_GET['q'])) {
	$q = htmlspecialchars($_GET['q']);

	$req = $bdd->prepare('SELECT * FROM fiche_metier WHERE metier LIKE "%'.$q.'%" ORDER BY id DESC');
	$req->execute();
	if($req->rowCount() == 0) {
		$req = $bdd->prepare('SELECT * FROM fiche_metier WHERE CONCAT(metier, domaine, description) LIKE "%'.$q.'%" ORDER BY id DESC');
		$req->execute();
	}
}

if(isset($_POST['critere1']) || isset($_POST['critere2']) || isset($_POST['critere3'])) {
	$sqlConditions = "";
	if (isset($_POST['critere1']) && !empty($_POST['critere1']) && $_POST['critere1'] != 'tous'){
		$sqlConditions .= " and domaine =\"". $_POST['critere1'] ."\"";

	}
	if (isset($_POST['critere2']) && !empty($_POST['critere2']) && $_POST['critere2'] != 'tous'){
		$sqlConditions .= " and salaire =\"". $_POST['critere2'] ."\"";
	}
	if (isset($_POST['critere3']) && !empty($_POST['critere3']) && $_POST['critere3'] != 'tous'){
		$sqlConditions .= " and niveauMinimum =\"". $_POST['critere3'] ."\"";
	}
	if (isset($_POST['critere4']) && !empty($_POST['critere4']) && $_POST['critere4'] != 'tous'){
		$sqlConditions .= " and statut =\"". $_POST['critere4'] ."\"";
	}

	$sqlQuery = "SELECT * FROM fiche_metier WHERE 1 ". $sqlConditions ." ORDER BY id DESC";
	$req = $bdd->prepare($sqlQuery);
	$req->execute();
}

// Fin recherche

if(isset($_SESSION['id']) AND $_SESSION['id'] > 0){

	$getID = intval($_SESSION['id']);
	$reqUser = $bdd->prepare("SELECT * FROM user, profil WHERE id = ?");
	$reqUser->execute(array($getID));
	$userInfo = $reqUser->fetch();


$page = "M'orienter";
$description = "Avenir - La plateforme de la réoriention facile - Page de recherche";

include('../includes/headerPlateforme.php');
?>

	<div class="recherche" id="main-content">
	
		<?php include('../includes/secondNav.php'); ?>

		<div class="content-container">
			<h2><?php echo $req->rowCount(); ?> fiches métiers</h2>
			<span class="titre-deco"></span>

			<!-- Champ de recherche -->
			<form method="get">
				<input type="search" name="q" placeholder="Rechercher ...">
				<input type="submit" value="Valider">
			</form>

			<!-- Filtres -->
			<form action="" method="post">
				<select  name="critere1" id="">
						<option value="tous">Tous</option>
					<?php while($oD = $optionDomaine->fetch()) {?>
						<option value="<?php echo $oD['domaine']; ?>"><?php echo $oD['domaine']; ?></option>
					<?php } ?>
				</select>

				<select name="critere2" id="">
						<option value="tous">Tous</option>
					<?php while($oS = $optionSalaire->fetch()) {?>
						<option  value="<?php echo $oS['salaire']; ?>"><?php echo $oS['salaire']; ?> €</option>
					<?php } ?>
				</select>

				<select name="critere3" id="">
						<option value="tous">Tous</option>
					<?php while($oE = $optionEtude->fetch()) {?>
						<option  value="<?php echo $oE['niveauMinimum']; ?>"><?php echo $oE['niveauMinimum']; ?></option>
					<?php } ?>
				</select>

				<select name="critere4" id="">
						<option value="tous">Tous</option>
					<?php while($oSt = $optionStatut->fetch()) {?>
						<option  value="<?php echo $oSt['statut']; ?>"><?php echo $oSt['statut']; ?></option>
					<?php } ?>
				</select>

				<input type="submit" value="Rechercher">
			</form>

			<div class="results">
				<?php if($req->rowCount() > 0 ) { ?>

				<table>
					<thead>
						<tr>
							<td>Métier</td>
							<td>Domaine</td>
							<td>Salaire minimum</td>
							<td>Niveau minimum</td>
							<td>Statut</td>
						</tr>
					</thead>

					<tbody>
						<?php while($r = $req->fetch()) { 

							?>
						<tr>
							<td><a href="fiche-metier.php?id=<?php echo $r['id']; ?>"><?php echo $r['metier']; ?></a></td>
							<td><?php echo $r['domaine']; ?></td>
							<td><?php echo $r['salaire']; ?> €</td>
							<td><?php echo $r['niveauMinimum']; ?></td>
							<td><?php echo $r['statut']; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

				<?php } ?>
			</div>
	

		</div>
	</div>
	
<?php

	include('../includes/footerPlateforme.php');

	} else {
		header('Location: connexion.php');
	}
?>