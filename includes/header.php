<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Alexandre de Mortemart - <?php echo $page ?></title>
		<meta name="description" xml:lang="en" content="<?php echo $description ?>" />

		<link rel="stylesheet" type="text/css" href="css/global.css" />
		
		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>		
		
		<!-- bxSlider Javascript file -->
		<script src="./js/jquery.bxslider/jquery.bxslider.min.js"></script>
		<!-- bxSlider CSS file -->
		<link href="./js/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
		<!-- ImagesLoaded Plugin Javascript file -->
		<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
		<!-- Site's Javascript file -->
		<script type="text/javascript" src="./js/production.min.js"></script>


	</head>

	<body>

		<header class="wrapper" id="main-header">
			<div class="nav-menu">
				<div class="row">
					<div class="col-lg-4 col-md-12" id="menu-button">
						<img src="./images/menu.png" alt="bouton menu" >
						<h1 class="logo">Alexandre <br /><span><span>de</span> Mortemart</span></h1>
					</div>
					<nav class="menu-list col-lg-8 col-md-12">
					  <ul class="clearfix">
					  	<li<?php if ($page == 'Home') {echo ' class="active"';} ?> ><a href="./">Home</a></li>
						<li<?php if ($page == 'Collections') {echo ' class="active"';} ?> ><a href="./collections.php">Photographies</a></li>
						<li<?php if ($page == 'Films') {echo ' class="active"';} ?> ><a href="./films.php">Films</a></li>
						<li<?php if ($page == 'News') {echo ' class="active"';} ?> ><a href="./news.php">News</a></li>
						<li<?php if ($page == 'About') {echo ' class="active"';} ?> ><a href="./about.php">About</a></li>
						<li<?php if ($page == 'Contact') {echo ' class="active"';} ?> ><a href="./contact.php">Contact</a></li>						
					  </ul>
					</nav>
				</div>
			</div>		
		</header>

		<div class="wrapper" id="main-content">