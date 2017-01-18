<?php

	include('../config/settings.php');

	if(isset($_SESSION['id'])){

		$reqUser = $bdd->prepare('SELECT * FROM user, profil WHERE id = ?');
		$reqUser->execute(array($_SESSION['id']));
		$userInfo = $reqUser->fetch();

	$page = "Doriann";
    $description = "Avenir - La plateforme de la réoriention facile - Portrait : Doriann";

    include('../includes/headerPlateforme.php');
?>

	<div class="articles" id="main-content">
		<?php include('../includes/secondNav.php'); ?>

		<div class="content-container">
			<div>
				<a href="#" title="Retour à la recherche" class="btn btn-retour">Retour à l'accueil</a>
			</div>

			<div class="article">
				<div class="header-article doriann">
					<a href="#" title="Ajouter aux favoris" class="btn btn-favoris">Ajouter aux favoris</a>
				</div>
				<div class="content-article">
					<h2>Doriann</h2>
					<span class="titre-deco"></span>
					<p class="auteur-date">par Aurélie Ribeiro | le 13/01/2017</p>

					<h3>Son parcours</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet porta nisl. Morbi tempor et nisl id placerat. Vivamus pharetra nulla augue, eget consequat risus eleifend eu. Aliquam vel mollis elit, ut maximus urna. Nullam vitae erat turpis. Fusce vitae suscipit quam. Nam eget pharetra mi. Vestibulum ac consequat arcu. Maecenas feugiat lobortis quam id sollicitudin. Nullam vitae arcu convallis, accumsan mi nec, cursus tortor. Nunc velit justo, venenatis id tristique nec, rhoncus ac nunc. Nullam vestibulum nec turpis in rhoncus. <br />
					Suspendisse felis odio, interdum non mauris id, lacinia tincidunt sem. Quisque vel luctus mi. Praesent consectetur condimentum arcu, a consectetur nibh. Nullam vitae erat turpis. Fusce vitae suscipit quam. Nam eget pharetra mi. Vestibulum ac consequat arcu. Maecenas feugiat lobortis quam id sollicitudin. Nam vitae arcu convallis, accumsan mi nec, cursus tortor.</p>

					<h3>Pourquoi la réorientation ?</h3>
					<p>Nam ut ante lobortis, vestibulum lacus nec, aliquet quam. Nullam eu efficitur magna, vel tincidunt felis. Proin eleifend dolor leo, at pellentesque orci imperdiet id. Pellentesque commodo nisi eget porttitor aliquam. Curabitur scelerisque tellus sodales justo rhoncus convallis. Pellentesque et efficitur elit. Nullam hendrerit commodo lacus, eget gravida nulla sagittis id. Mauris nec dignissim urna. Sed faucibus justo sapien, efficitur fringilla sem egestas ac. Etiam mi ante, auctor id varius ut, tempus sit amet nunc.</p>

					<h3>Comment il s'y ai prit</h3>
					<p>Nam ut ante lobortis, vestibulum lacus nec, aliquet quam. Nullam eu efficitur magna, vel tincidunt felis. Proin eleifend dolor leo, at pellentesque orci imperdiet id. Pellentesque commodo nisi eget porttitor aliquam. Curabitur scelerisque tellus sodales justo rhoncus convallis. Pellentesque et efficitur elit. Nullam hendrerit commodo lacus, eget gravida nulla sagittis id. Mauris nec dignissim urna. Sed faucibus justo sapien, efficitur fringilla sem egestas ac. Etiam mi ante, auctor id varius ut, tempus sit amet nunc.<br />
					Donec volutpat dictum ultricies. Praesent eleifend ornare elit a iaculis. Cras elementum quam hendrerit tellus fermentum sodales. Fusce mattis eros vitae blandit venenatis. Praesent porttitor eleifend finibus. Mauris sodales massa purus, ut ultrices nisl vestibulum ut. Aliquam feugiat turpis ut nunc varius, et mollis magna ullamcorper. Nullam ultrices dolor at nunc consequat lobortis. Integer rhoncus semper vulputate. Sed rhoncus nibh eu nisi interdum, vitae egestas elit varius. Nam sed sapien magna. Vivamus vel sodales libero. Curabitur congue elit eget suscipit sodales.</p>

					<h3>Une réussite !</h3>
					<p>Nam ut ante lobortis, vestibulum lacus nec, aliquet quam. Nullam eu efficitur magna, vel tincidunt felis. Proin eleifend dolor leo, at pellentesque orci imperdiet id. Pellentesque commodo nisi eget porttitor aliquam. Curabitur scelerisque tellus sodales justo rhoncus convallis. Pellentesque et efficitur elit. Nullam hendrerit commodo lacus, eget gravida nulla sagittis id. Mauris nec dignissim urna. Sed faucibus justo sapien, efficitur fringilla sem egestas ac. Etiam mi ante, auctor id varius ut, tempus sit amet nunc.</p>					
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