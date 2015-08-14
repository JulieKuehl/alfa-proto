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

		<img src="<?php the_field( 'artist_photo' ); ?>" />
		<?php echo the_field( 'artist_biography' ); ?>

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
	// Find connected pages
	$connected = new WP_Query( array(
		'connected_type' => 'product_to_artist',
		'connected_items' => get_queried_object(),
		'nopaging' => true,
	) );

	// Display connected pages
	if ( $connected->have_posts() ) :
		?>
		<h3>Related artwork:</h3>
		<ul>
			<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php the_post_thumbnail( 'thumbnail'); ?></li>
			<?php endwhile; ?>
		</ul>

		<?php
// Prevent weirdness
		wp_reset_postdata();

	endif;
	?>

	<footer class="entry-footer">
		<?php forward_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->