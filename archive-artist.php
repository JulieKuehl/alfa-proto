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

			<div class="outer-container facetwp-template">

				<header class="page-header">
					<h1 class="page-title"><?php echo str_replace( 'Archives: ', '', get_the_archive_title() ); ?></h1>
				</header><!-- .page-header -->

				<!-- Begin tabbed content -->
				<div id="tabs" class="ui-tabs">

					<!-- Tab navigation menu -->
					<ul class="tabs ui-tabs-nav">
						<li><a href="#tab-gallery-artists">Gallery Artists</a></li>
						<li><a href="#tab-historic-artists">Historic Artists</a></li>
						<li><a href="#tab-additional-artwork">Additional Artwork</a></li>
					</ul>

					<!-- Gallery Artists tab -->
					<div id="tab-gallery-artists" class="ui-tabs-panel">

						<!-- Identify GALLERY ARTISTS -->
						<?php

						$args = array(
							'post_type' => 'artist',
							'meta_key' => 'artist_category',
							'meta_value' => array('Gallery')
						);

						$gallery = new WP_Query( $args );
						?>

						<!-- Display connected artwork (product) -->
						<?php
						if ( $gallery->have_posts() ) :
							while ( $gallery->have_posts() ) :
								$gallery->the_post(); ?>

									<?php add_action( 'pre_get_posts', 'alfa_sort_artists' ); ?>
									<?php get_template_part( 'content', 'archive-artist' ); ?>

							<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>

						<?php else : ?>

							<p class="info-box"><?php _e( 'No gallery artists have been found.', 'forward' ); ?></p>

						<?php endif; ?>

					</div><!-- #tab-gallery-artists -->

					<!-- Historic Artists tab -->
					<div id="tab-historic-artists" class="ui-tabs-panel">

						<!-- Identify GALLERY ARTISTS -->
						<?php

						$args = array(
							'post_type' => 'artist',
							'meta_key' => 'artist_category',
							'meta_value' => array('Historic')
						);

						$gallery = new WP_Query( $args );
						?>

						<!-- Display connected artwork (product) -->
						<?php
						if ( $gallery->have_posts() ) :
							while ( $gallery->have_posts() ) :
								$gallery->the_post(); ?>

								<?php add_action( 'pre_get_posts', 'alfa_sort_artists' ); ?>
								<?php get_template_part( 'content', 'archive-artist' ); ?>

							<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>

						<?php else : ?>

							<p class="info-box"><?php _e( 'No historic artists have been found.', 'forward' ); ?></p>

						<?php endif; ?>

					</div><!-- #tab-historic-artists -->

					<!-- Additional Artwork tab -->
					<div id="tab-additional-artwork" class="ui-tabs-panel">

						<!-- Identify GALLERY ARTISTS -->
						<?php

						$args = array(
							'post_type' => 'artist',
							'meta_key' => 'artist_category',
							'meta_value' => array('Additional')
						);

						$gallery = new WP_Query( $args );
						?>

						<!-- Display connected artwork (product) -->
						<?php
						if ( $gallery->have_posts() ) :
							while ( $gallery->have_posts() ) :
								$gallery->the_post(); ?>

								<?php add_action( 'pre_get_posts', 'alfa_sort_artists' ); ?>
								<?php get_template_part( 'content', 'archive-artist' ); ?>

							<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>

						<?php else : ?>

							<p class="info-box"><?php _e( 'No additional artwork has been found.', 'forward' ); ?></p>

						<?php endif; ?>

					</div><!-- #tab-additional-artwork -->

			</div><!-- .outer-container -->

			<?php forward_posts_navigation(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
