<?php 
/**
Template Page for the gallery overview

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<div class="ngg-galleryoverview" id="<?php echo $gallery->anchor ?>">

<?php if ($gallery->show_slideshow) { ?>
	<!-- Slideshow link -->
	<div class="slideshowlink">
		<a class="slideshowlink" href="<?php echo nextgen_esc_url($gallery->slideshow_link) ?>">
			<?php echo $gallery->slideshow_link_text ?>
		</a>
	</div>
<?php } ?>

<?php if ($gallery->show_piclens) { ?>
	<!-- Piclense link -->
	<div class="piclenselink">
		<a class="piclenselink" href="<?php echo nextgen_esc_url($gallery->piclens_link) ?>">
			<?php _e('[View with PicLens]','nggallery'); ?>
		</a>
	</div>
<?php } ?>
	<div class="section group">
		<!-- Thumbnails -->
	    <?php $i = 0; ?>
		<?php foreach ( $images as $image ) : ?>
		<div class="col span_3_of_12">
			<div id="ngg-image-<?php echo $image->pid ?>" class="ngg-gallery-thumbnail-box">
				<div class="ngg-gallery-thumbnail" >
					<a href="<?php echo nextgen_esc_url($image->imageURL) ?>"
		               title="<?php echo esc_attr($image->description) ?>"
		               data-src="<?php echo nextgen_esc_url($image->imageURL); ?>"
		               data-thumbnail="<?php echo nextgen_esc_url($image->thumbnailURL); ?>"
		               data-image-id="<?php echo esc_attr($image->pid); ?>"
		               data-title="<?php echo esc_attr($image->alttext); ?>"
		               data-description="<?php echo esc_attr($image->description); ?>"
		               <?php echo $image->thumbcode ?> >
						<?php if ( !$image->hidden ) { ?>
						<img title="<?php echo esc_attr($image->alttext) ?>" alt="<?php echo esc_attr($image->alttext) ?>" src="<?php echo nextgen_esc_url($image->thumbnailURL) ?>"/>
						<?php } ?>
					</a>
				</div>
			</div>
	<?php $i++; ?>
	<?php if (($i % 4) == 0): ?>
		</div>
	</div>
	<div class="section group">
	<?php else: ?>
		</div>
	<?php endif; ?>
	    <?php endforeach; ?>
	</div>
 	
	<!-- Pagination -->
 	<?php echo $pagination ?>
 	
</div>

<?php endif; ?>
