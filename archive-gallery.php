<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Forward
 */

get_header(); ?>

	<div id="primary" class="content-area fullwidth">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">

				<h1 class="page-title"><?php echo str_replace( 'Archives: ', '', get_the_archive_title() ); ?></h1>

			</header><!-- .page-header -->

			<!-- Sort by gallery_display_order and start the Loop -->
			<?php

				$args = array(
					'post_type' => 'gallery',
					'meta_key' => 'gallery_display_order',
					'orderby' => 'meta_value',
					'order' => 'ASC',
				);

				$gallery = new WP_Query( $args );
			?>


			<?php while ( $gallery->have_posts() ) : $gallery->the_post(); ?>

				<?php get_template_part( 'content', 'archive-gallery' ); ?>

			<?php endwhile; ?>

			<?php forward_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
