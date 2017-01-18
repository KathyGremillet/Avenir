<?php

	include('../config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user, profil WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();

	$page = "Top 5 des écoles de commerce";
    $description = "Avenir - La plateforme de la réoriention facile - Article : Top 5 des écoles de commerce";

    include('../includes/headerPlateforme.php');
?>

	<div class="articles" id="main-content">
		<?php include('../includes/secondNav.php'); ?>

		<div class="content-container">
			<div>
				<a href="accueil.php" title="Retour à l'accueil'" class="btn btn-retour">Retour à l'accueil</a>
			</div>

			<div class="article">
				<div class="header-article top5">
					<a href="#" title="Ajouter aux favoris" class="btn btn-favoris">Ajouter aux favoris</a>
				</div>
				<div class="content-article">
					<h2>Top 5 des écoles de commerce</h2>
					<span class="titre-deco"></span>
					<p class="auteur-date">par Aurélie Ribeiro | le 11/01/2017</p>

					<h3>1. HEC : Excellence</h3>
					<p>HEC est l’une des rares Ecoles de Commerce en France que l’on ne présente plus, même à l’étranger. Première école de commerce en France et en Europe, elle est également la plus sélective, et celle dont les diplômés ont les salaires les plus élevés à la sortie. En plus de l’excellence de son corps professoral, HEC est depuis 10 ans l’École de Commerce ayant le plus de diplômés répertoriés dans le Who’s Who, l’annuaire des personnes qui comptent en France.Parmi les anciens de l’école, on peut compter des personnalités telles que Pierre Kosciusko Morizet, PDG de Price Minister, Dominique Strauss-Kahn, Directeur du FMI, ou Jean Paul Agon PDG de L’Oréal.</p>

					<h3>2. ESSEC : Innovation</h3>
					<p>Au fil des années, l’ESSEC, pionnière dans de nombreux domaines, a fait de l’innovation un élément central de son identité. 20 ans avant qu’elles n’obtiennent le droit de vote, l’ESSEC a ouvert pour la 1ère fois ses portes aux femmes.Quarante ans plus tard, en 1967 elle devenait la première école hors des Etats-Unis à créer une Junior-Entreprise.C’est également la 1ère école à avoir intégré en 2e année des candidats ingénieurs, médecins, juristes, étudiants en sciences politiques ou diplômés de l’Université par admissions sur titre, et ce dès 1969. Plus récemment, depuis 1994, l’ESSEC propose l’option de l’apprentissage à ses étudiants, en devenant la 1ère école de commerce à se prêter à cet exercice.L’école continue ainsi son chemin sur la voie de l’innovation, faisant de ce thème l’ADN de nombreux de ses programmes d’enseignement.</p>

					<h3>3. ESCP-EUROPE : Europe</h3>
					<p>Fondée en 1819, ESCP-Europe est la plus ancienne École de commerce du continent.Elle dispose de 5 campus en Europe, et est la seule école de management ayant un campus dans le centre de cinq villes européennes majeures : Paris, Londres, Berlin, Madrid et Turin. D’ailleurs, et ce depuis 2007, ESCP-Europe est la seule école de management habilitée à délivrer un diplôme nationalement reconnu dans chacun de ses cinq campus : 5 diplômes européens : le diplôme Grande École français, le Diplom Kaufmann allemand, le diplôme MSc britannique, la Laurea Magistrale diplôme italien et le Master en Administración y Dirección de Empresas espagnol.</p>

					<h3>4. EM Lyon : Entrepreneuriat</h3>
					<p>L’EM Lyon, comme l’indique son slogan « Educating Entrepreneurs for the World » a fait du développement de l’esprit d’entreprendre son cheval de bataille depuis plus de vingt ans.Depuis 1984, EMLYON Business School prépare les futurs entrepreneurs ou repreneurs dans la conduite de leur projet à travers le Programme Entrepreneurs.En addition à un riche portefeuille de cours dans ce domaine, l’EM Lyon a pour particularité d’imposer à ses étudiants de 1ère année un Projet de création d’entreprise en Année Fondamentale.Il est obligatoire et permet aux étudiants encadrés par groupes de cinq, d’étudier un projet de création d’entreprise à partir de leur propre idée. L’EM Lyon a d’ailleurs été reconnue dans le classement des Masters européens par le Financial Times en 2005 comme 1ère en entrepreneuriat.</p>

					<h3>5. EDHEC : Finance</h3>
					<p>L’EDHEC est l’école de référence en France sur le plan de la finance.Le palmarès 2011 du magazine Le Point classe d’ailleurs l’école à la 1ère place dans ce domaine, reconnaissant ainsi l’excellence de sa recherche et de sa pédagogie, ainsi que la qualité des carrières de ses diplômés dans ce secteur.L’EDHEC s’est en effet énormément investie pour développer son pole de recherche en finance. L’Ecole offre depuis une quinzaine d’années à ses étudiants la possibilité d’aller étudier la finance pendant un an à la London School of Economics.L’EDHEC s’est également dotée d’un centre de recherche en Risk & Asset Management qui a aujourd’hui une réputation qui dépasse largement les frontières de la France.</p>
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