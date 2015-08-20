<?php
/**
 * @package Forward
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php forward_featured_image(); ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<p><?php the_field( 'exhibition_starting_date' ); ?> &mdash; <?php the_field( 'exhibition_ending_date' ); ?><br />
			<?php the_field( 'exhibition_location' ); ?></p>

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
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">

				<img class="exhibition_photo" alt="Image of <?php echo the_title(); ?>" src="<?php echo $image[0]; ?>" />
			</a>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php forward_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue Reading %s', 'forward' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'forward' ),
				'after'  => '</div>',
				'pagelink' => '<span>%</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php forward_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->