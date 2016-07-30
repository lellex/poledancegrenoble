<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php wp_title(''); ?></title>
		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/app.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Alex+Brush' rel='stylesheet' type='text/css'>
		<link rel="icon" href="<?php echo get_template_directory_uri() ; ?>/assets/img/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" sizes="32x32" href="<?php echo get_template_directory_uri() ; ?>/assets/img/icons/favicon-32.png">
	</head>
	<body <?php body_class(); ?>>

 	<header id="banner">
 		<?php if( is_home() || is_front_page() ) :?>
 		<div class="infos">
 			Deux adresses :<br/>
			<address>7 rue des Arts et métiers à <strong>Grenoble</strong><br/>
			14 A Rue Mayencin à <strong>Gières/Saint Martin d'hères</strong>
			</address>
 		</div>
 		<?php endif; ?>
 		<?php if( is_home() || is_front_page() ) :?>
			<div class="visuel visuel-1">
	 			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/bg-intro-01.jpg" alt="">
	 		</div>
	 		<div class="visuel visuel-2">
	 			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/bg-intro-02.jpg" alt="">
	 		</div>
	 		<div class="visuel visuel-3">
	 			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/bg-intro-03.jpg" alt="">
	 		</div>
			<a class="scrolldown" href="#ecole"></a>
		<?php else: ?>
			<div class="visuel-content"></div>
		<?php endif; ?>
	</header>

	<div class="container" role="document">

		<nav>
		    <?php wp_nav_menu( $mainMenu ) ?>
		    <a href="" class="menu-mob"><span></span></a>
		</nav>
