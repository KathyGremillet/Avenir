<?php 

include('../config/settings.php');

$req = $bdd->prepare('SELECT * FROM fiche_metier ORDER BY id DESC');
$req->execute();

$titre = $bdd->prepare('SELECT * FROM fiche_metier ORDER BY id DESC');
$titre->execute();

$optionDomaine = $bdd->prepare('SELECT DISTINCT domaine FROM fiche_metier');
$optionDomaine->execute();

$optionTest = $bdd->prepare('SELECT DISTINCT test FROM fiche_metier');
$optionTest->execute();


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

if(isset($_POST['critere1']) || isset($_POST['critere2'])) {
	$sqlConditions = "";
	if (isset($_POST['critere1']) && !empty($_POST['critere1']) && $_POST['critere1'] != 'tous'){
		$sqlConditions .= " and domaine =\"". $_POST['critere1'] ."\"";
	}
	if (isset($_POST['critere2']) && !empty($_POST['critere2']) && $_POST['critere2'] != 'tous'){
		$sqlConditions .= " and test =\"". $_POST['critere2'] ."\"";
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
			<h2>Résultats <?php echo $req->rowCount(); ?> fiches métiers</h2>
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
					<?php while($oT = $optionTest->fetch()) {?>
						<option  value="<?php echo $oT['test']; ?>"><?php echo $oT['test']; ?></option>
					<?php } ?>
				</select>

				<input type="submit" value="Rechercher">
			</form>

			<?php if($req->rowCount() > 0 ) { ?>

			<table>
				<?php while($r = $req->fetch()) { 

					?>
				<tr>
					<td><?php echo $r['metier']; ?></td>
					<td><?php echo $r['domaine']; ?></td>
					<td><?php echo $r['test']; ?></td>
					<td><?php echo $r['description']; ?></td>
				</tr>
				<?php } ?>
			</table>

			<?php } ?>
	

		</div>
	</div>
	
<?php

	include('../includes/footerPlateforme.php');

	} else {
		header('Location: connexion.php');
	}
?>