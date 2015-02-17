<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Home
 *
 * This template is a full-width home page.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>
       
    <div id="content" class="page col-full">
    	
		<section id="main" class="fullwidth">
           
        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>                                                             
                <article <?php post_class(); ?>>
                    
                    <?php echo get_new_royalslider(1); ?>
                    <section class="entry">
	                	<?php the_content(); ?>
	               	</section><!-- /.entry -->

                </article><!-- /.post -->
                                                    
			<?php
					} // End WHILE Loop
				} else {
			?>
				<article <?php post_class(); ?>>
                	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
                </article><!-- /.post -->
            <?php } ?>  
        
		</section><!-- /#main -->
		
		<?php //woo_main_after(); ?>
		
    </div><!-- /#content -->
	
	<div class="col-full">
		<div class="section group home-features">
			<div class="col span_3_of_12 home-link">
				<div class="home-link-wrapper" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/home-1.png');">
					<a href="<?php echo get_permalink('20'); ?>">
						<div class="home-text grey">
							<h3>Engine rebuild</h3>
						</div>
					</a>
				</div>
			</div>
			<div class="col span_3_of_12 home-link">
				<div class="home-link-wrapper" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/home-2.png');">
					<a href="<?php echo get_permalink('22'); ?>">
						<div class="home-text yellow">
							<h3>Servicing</h3>
						</div>
					</a>
				</div>
			</div>
			<div class="col span_3_of_12 home-link">
				<div class="home-link-wrapper" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/home-3.png');">
					<a href="<?php echo get_permalink('116' ); ?>">
						<div class="home-text lblue">
							<h3>Happy customers and gallery</h3>
						</div>
					</a>
				</div>
			</div>
			<div class="col span_3_of_12 home-link">
				<div class="home-link-wrapper" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/home-4.png');">
					<a href=" <?php echo get_post_type_archive_link( 'spares' ); ?> ">
						<div class="home-text blue">
							<h3>Spares</h3>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="section group home-blogs">
			<div class="col span_8_of_12">
				<h1 class="main-subheading">Latest from the Blog</h1>
				<?php 
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => '2'
						);
					$home_query = new WP_Query($args);
					if ($home_query->have_posts()):
				?>
				<div class="section group">
					<?php 
						while($home_query->have_posts()): 
						$home_query->the_post(); 
					?>
					<div class="col span_6_of_12 home-blog">
						<?php 
						if (has_post_thumbnail()) {
							the_post_thumbnail( 'home-thumb', array('class'=>'featured-blog') ); 
						} else {
							echo '<img src="'.get_template_directory_uri().'/images/logo_placeholder_small.png" class="featured-blog">';
						}
						?>
						<h2><?php echo the_title(); ?></h2>
						<a href="<?php echo the_permalink(); ?>"><button>Read More</button></a>
					</div>
				<?php endwhile; ?>
				</div>
				<?php endif; wp_reset_postdata(); ?>
			</div>
			<div class="col span_4_of_12">
				<h2 class="main-subheading">Follow the latest on our Facebook page</h2>
				<div class="fb-wrap">
					<div class="fb-like-box" data-href="https://www.facebook.com/RevivalCars" data-colorscheme="light" data-show-faces="false" data-header="false" data-height="344" data-width="343" data-stream="true" data-show-border="true"></div>
				</div>
			</div>
		</div>
	</div>
		
<?php get_footer(); ?>