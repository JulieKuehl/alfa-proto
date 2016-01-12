<?php
/**
 * @package Forward
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php forward_featured_image(); ?>

	<header class="blog-entry-header">
		<!-- forced font-size because CSS targeting wasn't working -->
		<?php the_title( sprintf( '<h1 class="blog-title"><span style="font-size:40px"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></span></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php forward_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
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