<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}

?>
<?php get_header(); ?>
    
    <div id="content" class="col-full">
    	
    	<?php woo_main_before(); ?>
    	
		<section class="listing-single"> 

		<?php if (have_posts()) : $count = 0; ?>
        
            <header class="archive-header">
                <h1><?php echo get_post_type_object(get_post_type())->labels->name; ?></h1>
                
                    <h3 class="back"><a href="/<?php echo get_post_type(); ?>">Back to full list</a></h2>
            </header>
        
	        <div class="fix"></div>
        
        	<?php woo_loop_before(); ?>
        	
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); $count++; ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'single-listing' );
				?>

			<?php endwhile; ?>
            
	        <?php else: ?>
	        
	            <article <?php post_class(); ?>>
	                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
	            </article><!-- /.post -->
	        
	        <?php endif; ?>  
	        
	        <?php woo_loop_after(); ?>
    
			<?php woo_pagenav(); ?>
                
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>