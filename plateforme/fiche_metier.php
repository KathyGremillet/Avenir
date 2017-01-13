<?php 

include('../config/settings.php');

$req = $bdd->prepare('SELECT * FROM fiche_metier ORDER BY id DESC');
$req->execute();

$domaine = $bdd->prepare('SELECT * FROM domaine');
$domaine->execute();

if(isset($_GET['q']) AND !empty($_GET['q'])) {
	$q = htmlspecialchars($_GET['q']);

	$req = $bdd->prepare('SELECT titre, domaine, description FROM fiche_metier WHERE titre LIKE "%'.$q.'%" ORDER BY id DESC');
	$req->execute();

	if($req->rowCount() == 0) {
		$req = $bdd->prepare('SELECT titre, domaine, description FROM fiche_metier WHERE CONCAT(titre, description) LIKE "%'.$q.'%" ORDER BY id DESC');
		$req->execute();
	}
}

/*if(isset($_GET['domaineSelect']) AND !empty($_GET['domaineSelect'])) {

	var_dump($_GET['domaineSelect']);
}*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Fiche métiers</title>
</head>
<body>


<form method="get">
	<input type="search" name="q" placeholder="Rechercher ...">
	<input type="submit" value="Valider">
</form>

<br>

<form method="get">
	<select name="q" id="q">
		<option value="tous" selected>Tous</option>
		<?php while ($donnees = $domaine->fetch()) { ?>
	    <option value=" <?php echo $donnees['nomDomaine']; ?>"> <?php echo $donnees['nomDomaine']; ?></option>
		<?php
		}
		?>
	</select>

	<input type="submit" value="Valider">
</form>

<?php 

if($req->rowCount() > 0) { ?>

<table>
	<?php while($r = $req->fetch()) { ?>
	<tr>
		<td><?php echo $r['titre']; ?></td>
		<td><?php echo $r['domaine']; ?></td>
		<td><?php echo $r['description']; ?></td>
	</tr>
	<?php } ?>
</ul>

<?php } else { ?>

Aucun résultat pour : <?php echo $q; ?> ... 

<?php } ?>

</table>
	
</body>
</html>