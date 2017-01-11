<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<title>Avenir - La réoriention facile - <?php echo $page ?></title>
	<meta name="description" xml:lang="en" content="<?php echo $description ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Latest compiled and minified CSS -->
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->

	<!-- Optional theme -->
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->

	<!-- Latest compiled and minified JavaScript -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->

	<link rel="stylesheet" type="text/css" href="../css/global.css" />		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/production.min.js"></script>
</head>

<body class="">
	<header class="" id="main-header">
		<div class="nav-menu">			
			<div class="logo">
				<img src="../images/logotype.png" alt="Avenir logotype">
				<h1 class="">Avenir</h1>
			</div>
			<nav class="menu-list">
			  <ul class="clearfix">
			  	<li<?php if ($page == 'Accueil') {echo ' class="active"';} ?> ><a href="../index.php">Accueil</a></li>
				<li<?php if ($page == 'Rechercher') {echo ' class="active"';} ?> ><a href="../plateforme/rechercher.php">Rechercher</a></li>
				<li<?php if ($page == 'S\'orienter') {echo ' class="active"';} ?> ><a href="../plateforme/s-orienter.php"><span class="premium-tag">Premium</span> S'orienter</a></li>
				<li<?php if ($page == 'Etre accompagne') {echo ' class="active"';} ?> ><a href="../plateforme/etre-accompagner.php"><span class="premium-tag">Premium</span> Être accompagné</a></li>	
			  </ul>
			</nav>			
		</div>		
	</header>