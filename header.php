<!DOCTYPE html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="author" content="Thepixellary" />
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="">
	<meta name="keywords" content="" />
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/html5.js" type="text/javascript"></script>
	<![endif]-->

	<link rel="icon" type="image/png" href="<?php bloginfo('template_url') ?>/favicon.ico" />
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header>
		<div class="container_12">
			<div class="grid_12">

				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
								
				<nav>
					<ul>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					</ul>
				</nav><!-- end nav -->

			</div>
		</div>


	</header>

	<div class="main-wrapper">
		<div class="container_12">
			<div class="main">