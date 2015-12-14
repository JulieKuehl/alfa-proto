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
							'meta_key' => 'artist_lastname',
							'orderby' => 'meta_value',
							'order' => 'ASC',
							'meta_query' => array(
								array(
									'key' => 'artist_category',
									'value' => 'Gallery',
								),
							),
						);

						$gallery = new WP_Query( $args );
						?>

						<!-- Display artwork (products) connected to gallery artists -->
						<?php
						if ( $gallery->have_posts() ) :
							while ( $gallery->have_posts() ) :
								$gallery->the_post(); ?>

									<?php get_template_part( 'content', 'archive-artist' ); ?>

							<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>

						<?php else : ?>

							<p class="info-box"><?php _e( 'No gallery artists have been found.', 'forward' ); ?></p>

						<?php endif; ?>

					</div><!-- #tab-gallery-artists -->

					<!-- Historic Artists tab -->
					<div id="tab-historic-artists" class="ui-tabs-panel">

						<!-- Identify HISTORIC ARTISTS -->
						<?php

						$args = array(
							'post_type' => 'artist',
							'meta_key' => 'artist_lastname',
							'orderby' => 'meta_value',
							'order' => 'ASC',
							'meta_query' => array(
								array(
									'key' => 'artist_category',
									'value' => 'Historic',
								),
							),
						);

						$gallery = new WP_Query( $args );
						?>

						<!-- Display artwork (products) connected to historic artists -->
						<?php
						if ( $gallery->have_posts() ) :
							while ( $gallery->have_posts() ) :
								$gallery->the_post(); ?>

								<?php get_template_part( 'content', 'archive-artist' ); ?>

							<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>

						<?php else : ?>

							<p class="info-box"><?php _e( 'No historic artists have been found.', 'forward' ); ?></p>

						<?php endif; ?>

					</div><!-- #tab-historic-artists -->

					<!-- Additional Artwork tab -->
					<div id="tab-additional-artwork" class="ui-tabs-panel">

						<!-- Identify ADDITIONAL ARTWORK -->
						<?php

						$args = array(
							'post_type' => 'artist',
							'meta_key' => 'artist_lastname',
							'orderby' => 'meta_value',
							'order' => 'ASC',
							'meta_query' => array(
								array(
									'key' => 'artist_category',
									'value' => 'Additional',
								),
							),
						);

						$gallery = new WP_Query( $args );
						?>

						<!-- Display additional artwork (products) -->
						<?php
						if ( $gallery->have_posts() ) :
							while ( $gallery->have_posts() ) :
								$gallery->the_post(); ?>

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
