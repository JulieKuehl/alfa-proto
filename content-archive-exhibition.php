<?php
/**
 * @package Forward
 */
?>

<div class="exhibition-archive-entry">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="exhibition-archive-photo">
			<?php
				$attachment_id = get_field('exhibition_photo_id');
				$size = 'large-thumbnail';
				$image = wp_get_attachment_image_src( $attachment_id, $size );
			?>

			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
				<img class="exhibition_photo" alt="Image of <?php echo the_title(); ?>" src="<?php echo $image[0]; ?>" />
			</a>


			<?php the_title( sprintf( '<h4 class="exhibition-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

			<p>
				<?php $starting_date = DateTime::createFromFormat('Ymd', get_field('exhibition_starting_date'));
				echo $starting_date->format('M jS, Y'); ?> &mdash; <?php $ending_date = DateTime::createFromFormat('Ymd', get_field('exhibition_ending_date')); 	echo $ending_date->format('M jS, Y'); ?>

				<br />

				<?php the_field( 'exhibition_location' ); ?>
			</p>

		</div><!-- .exhibition-archive-photo -->

<!--		<div class="entry-content">-->
<!--	-->
<!--			--><?php
//				wp_link_pages( array(
//					'before' => '<div class="page-links">' . __( 'Pages:', 'forward' ),
//					'after'  => '</div>',
//					'pagelink' => '<span>%</span>',
//				) );
//			?>
<!--		</div><!-- .entry-content -->

		<footer class="entry-footer">
<!--			--><?php //forward_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
</div><!-- .exhibition-archive-entry -->