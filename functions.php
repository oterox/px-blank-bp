<?php 

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


function px_scripts() {
	    
    if ( ! is_admin() ) {

        // deregister the original version of jQuery
        wp_deregister_script('jquery');

        // register it again, this time with no file path
        wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"), false);

        // add it back into the queue
        wp_enqueue_script('jquery');

		wp_enqueue_script( 'px-script', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', 'jquery');

		wp_enqueue_script( 'px-script', get_template_directory_uri() . '/js/plugins.js', 'jquery');

		wp_enqueue_script( 'px-script', get_template_directory_uri() . '/js/main.js', 'jquery');

		wp_enqueue_style( 'px-style', get_stylesheet_uri() );

    }


}
add_action( 'wp_enqueue_scripts', 'px_scripts' );


function px_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'px_page_menu_args' );

function get_the_custom_excerpt($length){
	return substr( get_the_excerpt(), 0, strrpos( substr( get_the_excerpt(), 0, $length), ' ' ) ).'...';
}

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


function px_body_class( $classes ) {
	
	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) 
		$classes[] = 'template-front-page';	
	
	return $classes;
}
add_filter( 'body_class', 'px_body_class' );

	
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

//require_once(TEMPLATEPATH . '/options.php');
//require_once(TEMPLATEPATH . '/px_helper.php');

//require_once(TEMPLATEPATH . '/core/destinations.php');
//require_once(TEMPLATEPATH . '/core/trips.php');

?>