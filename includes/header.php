<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		<title>Avenir - <?php echo $page ?></title>
		<meta name="description" xml:lang="en" content="<?php echo $description ?>" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="css/global.css" />		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script type="text/javascript" src="js/production.min.js"></script>
	</head>

	<body>

		<header class="wrapper" id="main-header">
			<div class="nav-menu">
				<div class="row">
					<div class="col-lg-4 col-md-12">
						<h1 class="logo">Avenir</span></h1>
					</div>
					<nav class="menu-list col-lg-8 col-md-12">
					  <ul class="clearfix">
					  	<li<?php if ($page == 'Accueil') {echo ' class="active"';} ?> ><a href="./">Accueil</a></li>
						<li<?php if ($page == 'A propos') {echo ' class="active"';} ?> ><a href="./a-propos.php">A propos</a></li>
											
					  </ul>
					</nav>
				</div>
			</div>		
		</header>

		<div class="wrapper" id="main-content">