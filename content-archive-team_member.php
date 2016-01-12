<?php
/**
 * @package Forward
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php forward_featured_image(); ?>

	<header class="entry-header">
<!--		--><?php //the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<h2 class="entry-title team-member-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>, <?php the_field( 'team_member_position' ); ?></a></h2>

		<div class="team-member-archive-photo">
			<?php
				$attachment_id = get_field('team_member_photo_id');
				$size = 'large-thumbnail';
				$image = wp_get_attachment_image_src( $attachment_id, $size );
			?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">

				<img class="team_member_photo" alt="Image of <?php echo the_title(); ?>" src="<?php echo $image[0]; ?>" />
			</a>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php forward_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_field( 'team_member_details'); ?>

		<?php the_title(); ?> can be reached at <a href="mailto:<?php the_field( 'team_member_email' ); ?>"><?php the_field( 'team_member_email' ); ?></a>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'forward' ),
				'after'  => '</div>',
				'pagelink' => '<span>%</span>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->