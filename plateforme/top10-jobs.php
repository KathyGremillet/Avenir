<?php

	include('../config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user, profil WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();

	$page = "Top 10 des jobs du futur";
    $description = "Avenir - La plateforme de la réoriention facile - Article : Top 10 des jobs du futur";

    include('../includes/headerPlateforme.php');
?>

	<div class="articles" id="main-content">
		<?php include('../includes/secondNav.php'); ?>

		<div class="content-container">
			<div>
				<a href="accueil.php" title="Retour à l'accueil'" class="btn btn-retour">Retour à l'accueil</a>
			</div>

			<div class="article">
				<div class="header-article top10">
					<a href="#" title="Ajouter aux favoris" class="btn btn-favoris">Ajouter aux favoris</a>
				</div>
				<div class="content-article">
					<h2>Top 10 des jobs du futur</h2>
					<span class="titre-deco"></span>
					<p class="auteur-date">par Aurélie Ribeiro | le 15/01/2017</p>

					<h3>1. Infirmier</h3>
					<p>C'est un fait : rien ne va si l'on a pas la santé. Nous aurons toujours besoin d'infirmiers et infirmières pour prendre soin de la population ! Les professionnels de la santé de manière générale seront toujours indispensables au quotidien.</p>

					<h3>2. Chercheur</h3>
					<p>Chercheur en sciences, en recherche médicale, en technologie... Les chercheurs font bouger et avancer le monde ! Ils sont là pour trouver des solutions à des problèmes ou à des attentes, et en plus, tu peux être chercheur dans un domaine qui te correspond !</p>

					<h3>3. Data Scientist</h3>
					<p>Le Big Data prend de plus en plus d'ampleur. Il nécessite beaucoup de ressources humaines pour comprendre et analyser ces données afin qu'elles soient efficaces et significatives.</p>

					<h3>4. Spécialiste de l'environnement</h3>
					<p>Le développement durable est une véritable préoccupation dans notre société actuelle. Les professions en rapport avec ce domaine devraient connaître un essor sur les prochaines années. Nous devrions tous être sensibles au monde que nous laissons à nos prochains.</p>

					<h3>5. Planificateur / Analyste financier</h3>
					<p>Savoir gérer ses ressources pour faire survivre une entreprise... L'argent dirige (en quelque sorte) le monde ! Ces métiers sont indispensables au bon fonctionnement d'une organisation.</p>

					<h3>6. Vétérinaire</h3>
					<p>Au même titre que les humains, nos amis les bêtes ont également besoin d'être soignés et chouchoutés !</p>

					<h3>7. Conseiller / Coach</h3>
					<p>Prendre en compte la psychologie des individus, c'est important. Le psychique est lié au physique, c'est une machine complexe qu'il faut entretenir pour qu'elle reste en bon état. Observer, comprendre les gens avec aisance sont des capacités nécessaires à l'exercice de ces métiers.</p>

					<h3>8. Analyste en systèmes informatique</h3>
					<p>Il étudie les différentes manières de mettre en oeuvre un besoin informatique au sein d'une structure, il intègre les dernières technologies au système de l'entreprise qui l'emploie... Ce métier a de beaux jours devant lui.</p>

					<h3>9. Professeur</h3>
					<p>Nous aurons toujours besoin de transmettre le savoir aux plus jeunes d'entre nous. Un professeur est indispensable afin d'éduquer et de cultiver chacun d'entre nous. La preuce, la réorientation serait bien plus complexe sans eux ;) !</p>

					<h3>10. Gendarme / Policier / Militaire </h3>
					<p>Avec les menaces terroristes qui pèsent sur notre pays ces dernières années, un renfort de la sécurité du pays est très largement sollicité.</p>
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