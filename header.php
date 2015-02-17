<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $woo_options, $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if ( $woo_options['woo_boxed_layout'] == 'true' ) echo 'boxed'; ?> <?php if (!class_exists('woocommerce')) echo 'woocommerce-deactivated'; ?>">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(''); ?></title>
<?php woo_meta(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	wp_head();
	woo_head();
?>

</head>

<body <?php body_class(); ?>>

<?php //Facebook nonsense ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=1446016002355235&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<?php woo_top(); ?>

<div id="wrapper">

    <?php woo_header_before(); ?>

	<header id="header" class="col-full">
		<hgroup>

			<div class="fl" id="logo">
		    	

		    	<?php
				    $logo = esc_url( get_template_directory_uri() . '/images/logo.png' );
					if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' ) { $logo = $woo_options['woo_logo']; }
					if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' && is_ssl() ) { $logo = preg_replace("/^http:/", "https:", $woo_options['woo_logo']); }
				?>
				<?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>
				    <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( get_bloginfo( 'description' ) ); ?>">
				    	<img src="<?php echo $logo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
				    </a>
			    <?php } ?>

				<h3 class="nav-toggle"><a href="#navigation"><mark class="websymbols">&#178;</mark> <span><?php _e('Navigation', 'woothemes'); ?></span></a></h3>

				
		    </div>
		    <div class="fr nav-wrapper">
		    	<nav id="nav-container" class="fix" role="navigation">
					<div class="social-media fr">
						<a class="social-icon" href="http://facebook.com/RevivalCars"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt=""></a>
					</div>
					<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>
					<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fr', 'theme_location' => 'top-menu' ) ); ?>
					<?php } ?>
					<?php
						if ( class_exists( 'woocommerce' ) ) {
							echo '<ul class="nav wc-nav">';
							woocommerce_cart_link();
							echo '<li class="checkout"><a href="'.esc_url($woocommerce->cart->get_checkout_url()).'">'.__('Checkout','woothemes').'</a></li>';
							echo get_search_form();
							echo '</ul>';
						}
					?>
				</nav>
				<?php woo_nav_before(); ?>

				<nav id="navigation" class="col-full" role="navigation">
					<ul id="main-nav" class="nav fr">
						<?php
					if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
						wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'theme_location' => 'primary-menu', 'items_wrap' => '%3$s') );
						if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) {
							wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'theme_location' => 'top-menu', 'items_wrap' => '%3$s') );
						} ?>
					</ul>
					<?php
					} else {
					?>
			        <ul id="main-nav" class="nav fl">
						<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
						<li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
						<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
					</ul><!-- /#nav -->
			        <?php } ?>

				</nav><!-- /#navigation -->

				<?php woo_nav_after(); ?>
		    </div>
		    </hgroup>

	</header><!-- /#header -->

	<?php woo_content_before(); ?>