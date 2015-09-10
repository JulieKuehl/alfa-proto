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

		<p><?php $starting_date = DateTime::createFromFormat('Ymd', get_field('exhibition_starting_date'));
			echo $starting_date->format('l, F jS, Y'); ?> &mdash; <?php $ending_date = DateTime::createFromFormat('Ymd', get_field('exhibition_ending_date')); 	echo $ending_date->format('l, F jS, Y'); ?><br />

		<?php the_field( 'exhibition_location' ); ?><br />

		<div class="exhibition-archive-photo">
			<?php
			$attachment_id = get_field('exhibition_photo_id');
			$size = 'large-thumbnail';
			$image = wp_get_attachment_image_src( $attachment_id, $size );
			$image_url = $image['sizes']['large-thumbnail'];
			// url = $image[0];
			// width = $image[1];
			// height = $image[2];
			?>

			<img class="exhibition_photo" alt="Image of <?php echo the_title(); ?>" src="<?php echo $image[0]; ?>" />

		</div><!-- .exhibition-archive-photo -->

		<?php the_field( 'exhibition_details' ); ?><br />


	<!-- Display connected artwork (product) -->
		<?php
		// Find connected artwork (product)
		$connected = new WP_Query( array(
			'connected_type' => 'product_to_exhibition',
			'connected_items' => get_queried_object(),
			'nopaging' => true,
		) );

		if ( $connected->have_posts() ) :
		?>

		<div id="exhibition-artwork" class="outer-container">
			<h2>Related artwork:</h2>
			<ul class="products">
				<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
					<div class="new-artwork-entry related-products">
						<li>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium-thumbnail'); ?>
								<h3><?php the_title(); ?></h3>
							</a>
						</li>
					</div><!-- .related-products -->
				<?php endwhile; ?>
			</ul>

			<?php
			// Prevent weirdness
			wp_reset_postdata();

			endif;
			?>
		</div><!-- .related -->


		<!-- Add Google Map of gallery location -->
		<?php

		$location = get_field( 'exhibition_location_map' );

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
