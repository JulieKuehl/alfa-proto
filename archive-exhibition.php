<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Forward
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">

				<h1 class="page-title"><?php echo str_replace( 'Archives: ', '', get_the_archive_title() ); ?></h1>

			</header><!-- .page-header -->

			<!-- Start the Loop -->
			<?php while ( have_posts() ) : the_post(); ?>

				<?php add_action( 'pre_get_posts', 'alfa_get_posts_exhbition' ); ?>

				<?php get_template_part( 'content', 'archive-exhibition' ); ?>

			<?php endwhile; ?>

			<?php forward_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
