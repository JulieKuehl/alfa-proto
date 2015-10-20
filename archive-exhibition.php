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

			<header class="page-header">

				<h1 class="page-title"><?php echo str_replace( 'Archives: ', '', get_the_archive_title() ); ?></h1>

			</header><!-- .page-header -->

			<div class="exhibitions">

				<h2><span>Current Exhibitions</span></h2>

				<!-- Identify CURRENT exhibitions -->
				<?php

				$today         = date( 'Ymd' );
				$starting_date = get_field( 'exhibition_starting_date' );
				$ending_date   = get_field( 'exhibition_ending_date' );

				$args = array(
					'post_type'      => 'exhibition',
					'meta_query'     => array(
						array(
							'key'     => 'exhibition_starting_date',
							'value'   => $today,
							'compare' => '<=',
							'type'    => 'DATE'
						),
						array(
							'key'     => 'exhibition_ending_date',
							'value'   => $today,
							'compare' => '>=',
							'type'    => 'DATE'
						),
					)
				);

				$current = new WP_Query( $args );
				?>

				<!-- Display CURRENT exhibitions -->
				<?php
				if ( $current->have_posts() ) :
					while ( $current->have_posts() ) :
						$current->the_post(); ?>

						<?php get_template_part( 'content', 'archive-exhibition' ); ?>

					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

				<?php else : ?>

					<p class="info-box"><?php _e( 'No current exhibitions', 'forward' ); ?></p>

				<?php endif; ?>


				<h2><span>Upcoming Exhibitions</span></h2>

				<!-- Identify UPCOMING exhibitions -->
				<?php

				$today         = date( 'Ymd' );
				$starting_date = get_field( 'exhibition_starting_date' );
				$ending_date   = get_field( 'exhibition_ending_date' );

				$args = array(
					'post_type'      => 'exhibition',
					'meta_query'     => array(
						array(
							'key'     => 'exhibition_starting_date',
							'value'   => $today,
							'compare' => '>',
							'type'    => 'DATE'
						),
					)
				);

				$upcoming = new WP_Query( $args );
				?>

				<!-- Display UPCOMING exhibitions -->
				<?php
				if ( $upcoming->have_posts() ) :
					while ( $upcoming->have_posts() ) :
						$upcoming->the_post(); ?>

						<?php get_template_part( 'content', 'archive-exhibition' ); ?>

					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

				<?php else : ?>

					<p class="info-box"><?php _e( 'No upcoming exhibitions', 'forward' ); ?></p>

				<?php endif; ?>


				<h2><span>Previous Exhibitions</span></h2>

				<!-- Identify PREVIOUS exhibitions -->
				<?php

				$today         = date( 'Ymd' );
				$starting_date = get_field( 'exhibition_starting_date' );
				$ending_date   = get_field( 'exhibition_ending_date' );

				$args = array(
					'post_type'      => 'exhibition',
					'meta_query'     => array(
						array(
							'key'     => 'exhibition_ending_date',
							'value'   => $today,
							'compare' => '<',
							'type'    => 'DATE'
						),
					)
				);

				$previous = new WP_Query( $args );
				?>

				<!-- Display PREVIOUS exhibitions -->
				<?php
				if ( $previous->have_posts() ) :
					while ( $previous->have_posts() ) :
						$previous->the_post(); ?>

						<?php get_template_part( 'content', 'archive-exhibition' ); ?>

					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

				<?php else : ?>

					<p class="info-box"><?php _e( 'No previous exhibitions', 'forward' ); ?></p>

				<?php endif; ?>

			</div><!-- .exhibitions -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
