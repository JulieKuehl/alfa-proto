<?php
/**
 * @package Forward
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php forward_featured_image(); ?>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?>, <?php the_field( 'team_member_position' ); ?></h1>

		<div class="entry-meta">
<!--			--><?php //forward_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			$attachment_id = get_field('team_member_photo_id');
			$size = 'large-thumbnail';
			$image = wp_get_attachment_image_src( $attachment_id, $size );
		?>

		<img class="team_member_photo" alt="Image of <?php echo the_title(); ?>" src="<?php echo $image[0]; ?>" />

		<?php the_field( 'team_member_details' ); ?>

		<?php the_title(); ?> can be reached at <a href="mailto:<?php the_field( 'team_member_email' ); ?>"><?php the_field( 'team_member_email' ); ?></a>
	</div>

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
