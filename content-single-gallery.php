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
		<?php the_content(); ?>
		<?php the_field( 'gallery_address' ); ?><br />
		<?php the_field( 'gallery_city'); ?>, <?php the_field( 'gallery_state' ); ?> <?php the_field( 'gallery_zip' ); ?><br />
		<?php the_field( 'gallery_phone' ); ?><br />
		<?php the_field( 'gallery_hours' ); ?><br />
		<img src="<?php the_field( 'gallery_photo' ); ?>" /><br />

		<?php the_field( 'gallery_description' ); ?><br />

		<!-- Add Google Map of gallery location -->
		<?php

		$location = get_field( 'gallery-map' );

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
