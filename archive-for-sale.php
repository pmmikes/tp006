<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}

    $args = array(
        'post_type'=>'for-sale',
        'posts_per_page'=> -1
        );
    $for_sale = new WP_Query($args);
?>
<?php get_header(); ?>
    
    <div id="content" class="col-full">
    	
    	<?php woo_main_before(); ?>
    	
		<section class="listing"> 

		<?php if ($for_sale->have_posts()) : $count = 0; ?>
        
        <header class="archive-header">
            <h1><?php post_type_archive_title(); ?></h1>
        </header>
        <div id="main">
            <section class="entry">
                <?php echo get_post(148)->post_content; ?>
            </section>
        </div>
            
	        <div class="fix"></div>
        
        	<?php woo_loop_before(); ?>
        	
            <div class="section group">
            
    			<?php /* Start the Loop */ ?>
    			<?php while ( $for_sale->have_posts() ) : $for_sale->the_post(); $count++; ?>
                <div class="col span_3_of_12">

    				<?php
    					/* Include the Post-Format-specific template for the content.
    					 * If you want to overload this in a child theme then include a file
    					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
    					 */
    					get_template_part( 'content', 'listing' );
    				?>
                    <?php if (($count % 4) == 0): ?>
                            </div>
                        </div>
                        <div class="section group">
                    <?php else: ?>
                        </div>  
                    <?php endif ?>

    			<?php endwhile; ?>
            </div>
            
	        <?php else: ?>
	        
	            <article <?php post_class(); ?>>
	                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
	            </article><!-- /.post -->
	        
	        <?php endif; ?>  
	        
	        <?php woo_loop_after(); ?>
    
			<?php //woo_pagenav(); ?>
                
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>