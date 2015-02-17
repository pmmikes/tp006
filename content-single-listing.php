<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * The default template for displaying content
 */

	global $woo_options;
 
/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */

 	$settings = array(
					'thumb_w' => 787, 
					'thumb_h' => 300, 
					'thumb_align' => 'aligncenter'
					);
					
	$settings = woo_get_dynamic_values( $settings );
 
?>

	<article <?php post_class(); ?>>
		
		<section class="post-content">
		    <?php 
		    	if ( isset( $woo_options['woo_post_content'] ) && $woo_options['woo_post_content'] != 'content' ) { 
		    		woo_image( 'width=' . $settings['thumb_w'] . '&height=' . $settings['thumb_h'] . '&class=thumbnail ' . $settings['thumb_align'] ); 
		    	} 
		    ?>
			<div class="section group">
		    	<div class="col span_6_of_12">
		    		<?php 
			    	if (has_post_thumbnail()) {
						the_post_thumbnail( 'listing-featured', array('class'=>'listing-featured') );  
					}
					?>
		    	</div>
		    	<div class="col span_6_of_12">
		    		<header>
						<h1><?php the_title(); ?></h1>
					</header>
					<section class="entry">
						<?php the_content(); ?>
					</section>
					<section class="price">
						<span class="price">
						<?php if (types_render_field('listing-sold', array('raw'=>'true')) == 0 && types_render_field('listing-price',array()) != '') {
							echo '£'.types_render_field('listing-price',array());
						} elseif (types_render_field('listing-sold', array('raw'=>'true')) == 1) {
							echo '£SOLD';
						} ?>
						</span>
					</section>
		    	</div>
		    </div>
		    <?php $listing_gallery = get_post_meta(get_the_ID(), 'wpcf-listing-images'); ?>
		    <div class="section group">
		    	<?php $counter = 0; ?>
		    	<?php foreach ((array)$listing_gallery as $item) {
		    		if ($item) {
			    		echo '<div class="col span_3_of_12">';
			    		echo '<a href="'.$item.'"><img class="list-gallery" src="'.$item.'"></a>';
			    		echo '</div>';
			    		$counter++;
		    		}
		    		if (($counter % 4) == 0) {
		    			echo '</div><div class="section group">';
		    		}
		    	} ?>
		    </div>

		</section><!--/.post-content -->

		<div class="addthis_sharing_toolbox"></div>

	</article><!-- /.post -->