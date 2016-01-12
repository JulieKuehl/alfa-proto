<?php
/**
 * @package Forward
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php forward_featured_image(); ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<!-- Display the dates of the exhibition -->
		<p><?php $starting_date = DateTime::createFromFormat('Ymd', get_field('exhibition_starting_date'));
			echo $starting_date->format('l, F jS, Y'); ?> &mdash; <?php $ending_date = DateTime::createFromFormat('Ymd', get_field('exhibition_ending_date')); 	echo $ending_date->format('l, F jS, Y'); ?><br />

		<!-- Display the exhibition's location and link to it, if it has a link -->
		<?php
		$exhibitionlocation = get_field('exhibition_location');
		$exhibitionlocationlink = get_field('exhibition_location_link');

		if (isset( $exhibitionlocationlink[0] )) {
			// if has link
			echo '<a href="' . $exhibitionlocationlink . '">' . $exhibitionlocation . '</a><br />';
		} else {
			// if no link
			echo $exhibitionlocation . '<br />';
		}
		?>

		<!-- Display the photo for the exhibition -->
		<div class="exhibition-single-photo">
			<?php
			$attachment_id = get_field('exhibition_photo_id');
			$size = 'large-thumbnail';
			$image = wp_get_attachment_image_src( $attachment_id, $size );
			?>

			<img class="exhibition_photo" alt="Image of <?php echo the_title(); ?>" src="<?php echo $image[0]; ?>" />

		</div><!-- .exhibition-single-photo -->

		<div class="clearfix"></div>

		<!-- Display the details about the exhibition -->
		<?php the_field( 'exhibition_details' ); ?><br />

		<!-- Display connected artists -->
		<?php
		// Find connected artists
		$connected = new WP_Query( array(
			'connected_type' => 'exhibition_to_artist',
			'connected_items' => get_queried_object(),
			'nopaging' => true,
		) );

		if ( $connected->have_posts() ) :
		?>

		<div id="exhibition-artists" class="outer-container">
			<h2>Featured Artists:</h2>
			<ul class="products">
				<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
					<div class="featured-artists">
						<li>
							<a href="<?php the_permalink(); ?>">
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
		</div><!-- .exhibition-artists -->


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
			<h2>Featured Artwork:</h2>
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
		</div><!-- .exhibition-artwork -->


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
