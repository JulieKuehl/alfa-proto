<?php
/**
 * @package Forward
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<div class="artist-archive-entry">

		<div class="artist-archive-photo">
			<?php
			$attachment_id = get_field('artist_photo_id');
			$size = 'large-thumbnail';
			$image = wp_get_attachment_image_src( $attachment_id, $size );
			$image_url = $image['sizes']['large-thumbnail'];
			// url = $image[0];
			// width = $image[1];
			// height = $image[2];
			?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">

				<img class="artist_photo" alt="Image of <?php echo the_title(); ?>" src="<?php echo $image[0]; ?>" />
			</a>

			<?php the_title( sprintf( '<h3 class="artist-archive-name"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		</div><!-- .artist-archive-photo -->

		<footer class="entry-footer">
			<?php forward_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	</div><!-- .artist-archive-entry -->

</article><!-- #post-## -->
