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

 
?>

	<article <?php post_class(); ?>>
		
		<section class="post-content">
			<?php if (types_render_field('listing-sold', array('raw'=>'true')) == 1): ?>
				<div class="ribbon-wrapper"><div class="ribbon">SOLD</div></div>
			<?php endif; ?>
			<header>
				<?php 
			    	if (has_post_thumbnail()) {
						the_post_thumbnail( 'listing-gallery', array('class'=>'listings') );  
					}
				?>
				<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			</header>
	
			<section class="entry">
				<?php if ( isset( $woo_options['woo_post_content'] ) && $woo_options['woo_post_content'] == 'content' ) { the_content( __( 'Continue Reading &rarr;', 'woothemes' ) ); } else { the_excerpt(); } ?>
				<span class="price">
					<?php if (types_render_field('listing-sold', array('raw'=>'true')) == 0 && types_render_field('listing-price',array()) != '') {
						echo '£'.types_render_field('listing-price',array());
					} elseif (types_render_field('listing-sold', array('raw'=>'true')) == 1) {
						echo '£SOLD';
					} ?>
				</span>
			</section>
	
			  
		</section><!--/.post-content -->

	</article><!-- /.post -->