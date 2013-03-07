<?php 

// ---------------------------------------------------
// Theme setup
// ---------------------------------------------------
function px_theme_setup() {

	load_theme_textdomain( 'thepixellary', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Register menus
	register_nav_menu( 'primary', __( 'Primary Menu', 'thepixellary' ) );

	// Add support for featured images
	add_theme_support( 'post-thumbnails' );

}

add_action( 'after_setup_theme', 'px_theme_setup' );

// ---------------------------------------------------
// Enqueue scripts
// ---------------------------------------------------
function px_scripts() {
	    
    if ( ! is_admin() ) {

        // deregister the original version of jQuery
        wp_deregister_script('jquery');

        // register it again, this time with no file path
        wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"), false);

        // add it back into the queue
        wp_enqueue_script('jquery');

		wp_enqueue_script( 'adapt', get_template_directory_uri() . '/js/vendor/adapt.min.js', 'jquery');

		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', 'jquery');

		wp_enqueue_script( 'carouFredSel', get_template_directory_uri() . '/js/vendor/jquery.carouFredSel-6.2.0-packed.js', 'jquery');

		wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', 'jquery');

		wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', 'jquery');

		wp_enqueue_style( 'px-style', get_stylesheet_uri() );

    } else {
		
		//wp_enqueue_script("json2");

    }

}
add_action( 'wp_enqueue_scripts', 'px_scripts' );

// ---------------------------------------------------
// Show home in menu
// ---------------------------------------------------
function px_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'px_page_menu_args' );

// ---------------------------------------------------
// Custom excerpt
// ---------------------------------------------------
function get_the_custom_excerpt($length){
	return substr( get_the_excerpt(), 0, strrpos( substr( get_the_excerpt(), 0, $length), ' ' ) ).'...';
}

// ---------------------------------------------------
// Register sidebars
// ---------------------------------------------------
function px_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'thepixellary' ),
		'id' => 'sidebar-1',
		'description' => __( 'Widget area', 'thepixellary' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'px_widgets_init' );

// ---------------------------------------------------
// add classes to body
// ---------------------------------------------------
function px_body_class( $classes ) {
	
	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width-template.php' ) )
		$classes[] = 'full-width-template';

	if ( is_page_template( 'page-templates/front-page.php' ) ) 
		$classes[] = 'template-front-page';	
	
	global $wp_query;
	$classes[] = $wp_query->post->post_name;

	return $classes;
}
add_filter( 'body_class', 'px_body_class' );

// ---------------------------------------------------
// Add Breadcrumb Navigation
// ---------------------------------------------------
function px_breadcrumb() {
	
	global $post;
    $pid = $post->ID;
	$trail = '<a href="'. home_url('/') .'">'. __('Home', 'thepixellary') .'</a>';
 
    if (is_front_page()) {
        // do nothing
	} elseif ( get_post_type() == 'sample_cpt' ) { //customized trail for custom post type
		
		//$terms = get_the_term_list($pid, 'sample_tax', ' ', ', ', '');
		$trail.= ' &raquo; '. $post->post_title."\n";	

	} elseif (is_page()) {
		$bcarray = array();
		$pdata = get_post($pid);
		$bcarray[] = ' &raquo; '.$pdata->post_title."\n";
		while ($pdata->post_parent) {
			$pdata = get_post($pdata->post_parent);
			$bcarray[] = ' &raquo; <a href="'.get_permalink($pdata->ID).'">'.$pdata->post_title.'</a>';
		}
	   $bcarray = array_reverse($bcarray);
		 foreach ($bcarray AS $listitem) {
			 $trail .= $listitem;
		 }
	} elseif (is_single()) {
		$pdata = get_the_category($pid);
		$adata = get_post($pid);
		if(!empty($pdata)){
			$data = get_category_parents($pdata[0]->cat_ID, TRUE, ' &raquo; ');
			$trail .= " &raquo; ".substr($data,0,-8);
		}
		$trail.= ' &raquo; '.$adata->post_title."\n";
	} elseif (is_category()) {
		$pdata = get_the_category($pid);
		$data = get_category_parents($pdata[0]->cat_ID, TRUE, ' &raquo; ');
		if(!empty($pdata)){
			$trail .= " &raquo; ".substr($data,0,-8);
		}
	}

	$trail.="";

	return $trail;
}

// ---------------------------------------------------
// Adds a current_top_ancestor class to the top level parent
// ---------------------------------------------------
add_filter('nav_menu_css_class', 'current_top_nav_class', 10, 2);
function current_top_nav_class($classes, $item) {
   
    $post_type = get_query_var('post_type');

    //top level current
    /*if( in_array( 'current-menu-item', $classes ) && $item->menu_item_parent == 0 || in_array( 'current-' . $post_type .'-ancestor', $classes ) ){
    	array_push($classes, 'current-top-ancestor');
    	array_push($classes, 'parent-'.$item->menu_item_parent);
    }*/ 
    if( in_array( 'current-' . $post_type .'-ancestor', $classes ) || in_array( 'current-page-ancestor', $classes )){
    	if( $item->menu_item_parent == 0 ){
        	array_push($classes, 'current-top-ancestor');
		}
	}elseif(in_array( 'current-menu-item', $classes ) && $item->menu_item_parent == 0 ){
		array_push($classes, 'current-top-ancestor');
	}

    return $classes;
}

	


// ---------------------------------------------------
// Helper function to return the theme option value.
// ---------------------------------------------------
if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option($name, $default = false) {
		
		$optionsframework_settings = get_option('optionsframework');
		
		// Gets the unique option id
		$option_name = $optionsframework_settings['id'];
		
		if ( get_option($option_name) ) {
			$options = get_option($option_name);
		}
			
		if ( isset($options[$name]) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}
}	

require_once(TEMPLATEPATH . '/metaboxes/meta_box.php');
require_once(TEMPLATEPATH . '/inc/sample.php');
require_once(TEMPLATEPATH . '/core/mobile.php');
require_once(TEMPLATEPATH . '/core/uploader.php');
//require_once(TEMPLATEPATH . '/options.php');
//require_once(TEMPLATEPATH . '/px_helper.php');

//require_once(TEMPLATEPATH . '/core/destinations.php');
//require_once(TEMPLATEPATH . '/core/trips.php');

?>