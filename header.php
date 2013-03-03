<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if gte IE 9 ]><html class="no-js ie9" lang="en"> <![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<title>
		   <?php
			  if (function_exists('is_tag') && is_tag()) {
				 single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
			  elseif (is_archive()) {
				 wp_title(''); echo ' Archive - '; }
			  elseif (is_search()) {
				 echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
			  elseif (!(is_404()) && (is_single()) || (is_page())) {
				 wp_title(''); echo ' - '; }
			  elseif (is_404()) {
				 echo 'Not Found - '; }
			  if (is_home()) {
				bloginfo('name'); }
			  else {
				  bloginfo('name'); }
			  if ($paged>1) {
				 echo ' - page '. $paged; }
		   ?>
	</title>
	<meta name="author" content="Thepixellary" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="keywords" content="" />
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link rel="icon" type="image/png" href="<?php bloginfo('template_url') ?>/favicon.ico" />

	<script type="text/javascript">	
	// Edit to suit your needs.
	var ADAPT_CONFIG = {
	  // Where is your CSS?
	  path: '<?php bloginfo('template_url') ?>/css/',

	  // false = Only run once, when page first loads.
	  // true = Change on window resize and page tilt.
	  dynamic: true,

	  // First range entry is the minimum.
	  // Last range entry is the maximum.
	  // Separate ranges by "to" keyword.
	  range: [
	    '0px    to 760px  = mobile.css',
	    '760px  to 1008px  = 720.css',
	    '1008px  to 3000px = 978.css'
	  ]
	};
	</script>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="header-wrapper">	
		<div class="container_12">
			<div class="grid_12">
				<header>

					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
									
					<nav>
						<ul>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu dropdown' ) ); ?>
						</ul>
					</nav><!-- end nav -->

				</header>
			</div>
		</div>
	</div><!-- / header-wrapper -->

	<div class="container_12">
		<div class="grid_12">
			<div class="breadcrumb">
				<?php echo px_breadcrumb(); ?>
			</div><!-- .breadcrumb -->
		</div>
	</div>

	<div id="main-wrapper">
		<div class="container_12">
			<div class="main">