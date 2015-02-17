<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'zdmv5lp26tfbp7jcwiw51ix9sj389e712' );

// WooFramework init
require_once ( get_template_directory() . '/functions/admin-init.php' );

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php',			// Theme widgets
				'includes/theme-install.php',			// Theme installation
				'includes/theme-woocommerce.php',		// WooCommerce options
				'includes/theme-plugin-integrations.php'	// Plugin integrations
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

// Including some google fonts

function register_customscripts() {
	wp_register_style('google-fonts', 'http://fonts.googleapis.com/css?family=Roboto:500,500italic400,400italic,300,300italic,700,700italic|Merriweather:400,300,300italic,700,700italic,400italic100,100italic');
	wp_enqueue_style( 'google-fonts' );
	wp_register_script('addthis', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54d348a9076425e3');
	wp_enqueue_script('addthis');
} add_action( 'wp_enqueue_scripts', 'register_customscripts' );

// Let's enable featured images
add_theme_support( 'post-thumbnails' ); 
	// And configure some sizes
		add_image_size( 'content-img', 1040, 350 ); // Main featured image on content pages	
		add_image_size( 'home-thumb', 333, 214 ); // To be shown on the home page	
		add_image_size( 'blog-featured', 640, 357 ); // To be shown on the home page		
		add_image_size( 'listing-featured', 510, 510); // Main listing image
		add_image_size( 'listing-gallery', 245, 245); // Listing gallery thumbnails


/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>