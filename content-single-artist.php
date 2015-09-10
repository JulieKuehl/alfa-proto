<?php
/**
 * @package Forward
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php forward_featured_image(); ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php forward_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
<!--		--><?php
//			/* translators: %s: Name of current post */
//			the_content( sprintf(
//				__( 'Continue Reading %s', 'forward' ),
//				the_title( '<span class="screen-reader-text">"', '"</span>', false )
//			) );
//		?>

		<div class="artist-photo">
			<?php
			$attachment_id = get_field('artist_photo_id');
			$size = 'large-thumbnail';
			$image = wp_get_attachment_image_src( $attachment_id, $size );
			$image_url = $image['sizes']['large-thumbnail'];
			// url = $image[0];
			// width = $image[1];
			// height = $image[2];
			?>

			<img class="artist_photo" alt="Image of <?php echo the_title(); ?>" src="<?php echo $image[0]; ?>" />

		</div><!-- .artist-archive-photo -->

		<h2>Biography</h2>
		<?php echo the_field( 'artist_biography' ); ?>

		<h2>Selected Exhibitions</h2>
		<?php echo the_field( 'artist_exhibitions' ); ?>

		<h2>Commissions</h2>
		<?php echo the_field( 'artist_commissions' ); ?>

		<h2>Art Reviews</h2>
		<?php echo the_field( 'artist_reviews' ); ?>

		<h2>Press & Publications</h2>
		<?php echo the_field( 'artist_news' ); ?>

		<h2>Studio Visit</h2>
		<?php echo the_field( 'artist_studio_visit' ); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'forward' ),
				'after'  => '</div>',
				'pagelink' => '<span>%</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<!-- Related artwork connected posts -->
	<?php
	// Find connected artwork (product)
	$connected = new WP_Query( array(
		'connected_type' => 'product_to_artist',
		'connected_items' => get_queried_object(),
		'nopaging' => true,
	) );

	// Display connected artwork (product)
	if ( $connected->have_posts() ) :
		?>

	<div id="related-artwork-archive" class="related outer-container">
		<h2>Related Artwork:</h2>
		<ul class="products artist-work">
			<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
			<div class="related-artwork-entry">
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

	<footer class="entry-footer">
		<?php forward_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->