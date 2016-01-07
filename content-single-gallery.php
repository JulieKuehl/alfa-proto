<?php
/**
 * @package Forward
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php forward_featured_image(); ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
<!--			--><?php //forward_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">

		<p><a href="http://maps.google.com/?q=<?php the_field( 'gallery_address' ); ?>, <?php the_field( 'gallery_city' ); ?>, <?php the_field( 'gallery_state' ); ?>, <?php the_field( 'gallery_zip' ); ?>" target="_blank"><?php the_field( 'gallery_address' ); ?><br />
		<?php the_field( 'gallery_city'); ?>, <?php the_field( 'gallery_state' ); ?> <?php the_field( 'gallery_zip' ); ?></a></p>
		<p><a href="tel:<?php the_field( 'gallery_phone' ); ?>"><?php the_field( 'gallery_phone' ); ?></a></p>
		<p><?php the_field( 'gallery_hours' ); ?></p>

		<div class="gallery-photo">
			<?php
				$attachment_id = get_field('gallery_photo_id');
				$size = 'large-artwork';
				$image = wp_get_attachment_image_src( $attachment_id, $size );
			?>

			<img alt="Image of <?php echo the_title(); ?>" src="<?php echo $image[0]; ?>" />

		</div><!-- .gallery-archive-photo -->

		<?php the_field( 'gallery_description' ); ?><br />

		<div class="clearfix"></div>

		<!-- Add Google Map of gallery location -->
		<?php

		$location = get_field( 'gallery_map' );

		if( !empty($location) ):
			?>
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
		<?php endif; ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'forward' ),
				'after'  => '</div>',
				'pagelink' => '<span>%</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="entry-social">
		<?php forward_social_links(); ?>
	</div>

	<footer class="entry-footer">
		<?php forward_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
