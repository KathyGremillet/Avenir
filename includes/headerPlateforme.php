<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<title>Avenir - La réoriention facile - <?php echo $page ?></title>
	<meta name="description" xml:lang="en" content="<?php echo $description ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../css/global.css" />		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/production.min.js"></script>
	<script type="text/javascript">$crisp=[];CRISP_WEBSITE_ID="1d13b762-89c4-4f62-a9f5-2ecc98acdc4a";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.im/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
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
			  	<li<?php if ($page == 'Accueil') {echo ' class="active"';} ?> ><a href="./accueil.php?id=<?php echo $_SESSION['id']?>">Accueil</a></li>
				<li<?php if ($page == 'Rechercher') {echo ' class="active"';} ?> ><a href="../plateforme/rechercher.php">Rechercher</a></li>
				<li<?php if ($page == 'S\'orienter') {echo ' class="active"';} ?> ><a href="../plateforme/s-orienter.php"><span class="premium-tag">Premium</span> S'orienter</a></li>
				<li<?php if ($page == 'Etre accompagne') {echo ' class="active"';} ?> ><a href="../plateforme/etre-accompagner.php"><span class="premium-tag">Premium</span> Être accompagné</a></li>	
				<li<?php if ($page == 'Favoris') {echo ' class="active"';} ?> ><a href="../plateforme/favoris.php">Favoris</a></li>
			  </ul>
			</nav>			
		</div>		
	</header>