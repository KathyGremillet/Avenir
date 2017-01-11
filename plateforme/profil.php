<?php

	include('../settings.php');

	if(isset($_GET['id']) AND $_GET['id'] > 0){

		$getID = intval($_GET['id']);
		$reqUser = $bdd->prepare("SELECT * FROM user, profil WHERE id = ?");
		$reqUser->execute(array($getID));
		$userInfo = $reqUser->fetch();

		$cheminCV = "../membres/cv/".$userInfo['cv'];
		$cheminLM = "../membres/lettreMotivation/".$userInfo['lm'];


	$page = "Profil";
    $description = "Avenir - La plateforme de la réoriention facile - Page profil";

    include('../includes/headerPlateforme.php');
?>

	<div class=" profil" id="main-content">
		
		<?php include('../includes/secondNav.php'); ?>

		<div align="center">
			<h2>Profil de <?php echo $userInfo['prenom'].' '.$userInfo['nom'] ; ?></h2>
			<br><br>
			<?php
				if(!empty($userInfo['avatar'])) { ?>

				<img src="../membres/avatar/<?php echo $userInfo['avatar']; ?>" alt="">

			<?php }
			?> <br>
			Prenom = <?php echo $userInfo['prenom']; ?>
			<br>
			Nom = <?php echo $userInfo['nom']; ?>
			<br>
			Mail = <?php echo $userInfo['mail']; ?>
			<br>
			Âge = <?php echo $userInfo['age']; ?>
			<br>
			Adresse = <?php if(isset($userInfo['adresse'])) { echo $userInfo['adresse']; } else { echo "Vous n'avez pas encore rempli votre adresse"; } ?>
			<br>
			Adresse (suite) = <?php if(isset($userInfo['adresse2'])) { echo $userInfo['adresse2']; } else { echo "Vous n'avez pas encore rempli votre adresse (suite)"; } ?>
			<br>
			Code postal = <?php if(isset($userInfo['cp'])) { echo $userInfo['cp']; } else { echo "Vous n'avez pas encore rempli votre code postal"; } ?>
			<br>
			Ville = <?php if(isset($userInfo['ville'])) { echo $userInfo['ville']; } else { echo "Vous n'avez pas encore rempli votre ville"; } ?>
			<br>
			CV = <?php if(isset($userInfo['cv'])) { echo '<a target="_blank" href="'.$cheminCV.'" onclick="window.open(this.href, \'Popup\', \'scrollbars=1,resizable=1,height=560,width=770\'); return false;">'.$userInfo['cv'].'</a>'; } else { echo "Vous n'avez pas encore attaché de CV"; } ?>
			<br>
			Lettre de motivation = <?php if(isset($userInfo['lm'])) { echo '<a target="_blank" href="'.$cheminLM.'" onclick="window.open(this.href, \'Popup\', \'scrollbars=1,resizable=1,height=560,width=770\'); return false;">'.$userInfo['lm'].'</a>'; } else { echo "Vous n'avez pas encore attaché de lettre de motivation"; } ?>
			<br>
			<?php
			if(isset($_SESSION['id']) AND $userInfo['id'] == $_SESSION['id']) { ?>
				<a href="editionProfil.php">Editer mon profil</a>
				<a href='../index.php'>Retourner sur l'accueil</a>
				<a href="deconnexion.php">Se déconnecter</a>
			<?php } ?>

		</div>

	</div>
	
</body>
</html>

<?php
}
?>