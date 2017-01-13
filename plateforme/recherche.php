<?php 

include('../config/settings.php');

$req = $bdd->prepare('SELECT * FROM fiche_metier ORDER BY id DESC');
$req->execute();

$optionDomaine = $bdd->prepare('SELECT DISTINCT domaine FROM fiche_metier');
$optionDomaine->execute();


// Début recherche
if(isset($_GET['q']) AND !empty($_GET['q'])) {
	$q = htmlspecialchars($_GET['q']);

	$req = $bdd->prepare('SELECT * FROM fiche_metier WHERE titre LIKE "%'.$q.'%" ORDER BY id DESC');
	$req->execute();
	if($req->rowCount() == 0) {
		$req = $bdd->prepare('SELECT * FROM fiche_metier WHERE CONCAT(titre, domaine, description) LIKE "%'.$q.'%" ORDER BY id DESC');
		$req->execute();
	}
}
// Fin recherche


?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Fiche métiers</title>
</head>
<body>

<!-- Début recherche -->
<form method="get">
	<input type="search" name="q" placeholder="Rechercher ...">
	<input type="submit" value="Valider">
</form>
<!-- Fin recherche -->
<br>

<select name="" id="">
	<?php while($oD = $optionDomaine->fetch()) {?>
		<option value="<?php echo $oD['domaine']; ?>"><?php echo $oD['domaine']; ?></option>
	<?php } ?>
</select>


<?php if($req->rowCount() > 0 ) { ?>

<table>
	<?php while($r = $req->fetch()) { ?>
	<tr>
		<td><?php echo $r['titre']; ?></td>
		<td><?php echo $r['domaine']; ?></td>
		<td><?php echo $r['description']; ?></td>
	</tr>
	<?php } ?>
</table>

<?php } else { ?>

Aucun résultat pour : <?php echo $q; ?> ... 
<?php } ?> 

</table>
	
</body>
</html>