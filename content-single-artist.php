<?php
/**
 * @package Forward
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<!-- Begin tabbed content -->
		<div id="tabs" class="ui-tabs">

			<!-- if Artist is a gallery artist, then show all the tabs -->
			<?php
			$artist_category = get_field('artist_category');
			if ($artist_category === 'Gallery') : ?>

			<!-- Full tab navigation menu -->
			<ul class="tabs ui-tabs-nav">
				<li><a href="#tab-available-work">Available Work</a></li>
				<li><a href="#tab-archives">Archives</a></li>
				<li><a href="#tab-biography">Biography</a></li>
				<li><a href="#tab-selected-exhibitions">Selected Exhibitions</a></li>
				<li><a href="#tab-commissions">Commissions</a></li>
				<li><a href="#tab-art-reviews">Art Reviews</a></li>
				<li><a href="#tab-press">Press and Publications</a></li>
				<li><a href="#tab-visit">Studio Visit</a></li>
			</ul>

			<!-- if Artist is not a gallery artist, then reduce tabs -->
			<?php else : ?>

			<!-- Reduced tab navigation menu -->
			<ul class="tabs ui-tabs-nav">
				<li><a href="#tab-available-work">Available Work</a></li>
				<li><a href="#tab-archives">Archives</a></li>
				<li><a href="#tab-biography">Biography</a></li>
				<li><a href="#tab-press">Press and Publications</a></li>
			</ul>

			<?php endif; ?>

			<!-- Available Work tab -->
			<div id="tab-available-work" class="ui-tabs-panel">

				<!-- Find the artwork related to this artist and show only available products -->
				<?php
					$args = array(
					'post_type'       => 'artist',
					'meta_key'        => 'artwork_availability',
					'connected_type'  => 'product_to_artist',
					'connected_items' => get_queried_object(),
					'nopaging'        => true,

					'meta_query' => array(
								'key'     => 'artwork_availability',
								'value'   => array( 'Available' ),
								'compare' => 'IN',
						),
					);

					$connected = new WP_Query( $args );
				?>


				<!-- Display connected artwork (product) -->
				<?php
				if ( $connected->have_posts() ) :
				while ( $connected->have_posts() ) :
				$connected->the_post(); ?>

				<div class="related outer-container artist-available-works">

					<ul class="products">
						<li>
							<div class="artist-available-work-image">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium-thumbnail'); ?>
									<h3><?php the_title(); ?></h3>
								</a>
							</div><!-- .artist-available-work-image -->
						</li>
					</ul>

				</div>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

				<?php else : ?>

					<p class="info-box"><?php _e( 'Nothing currently available', 'forward' ); ?></p>

				<?php endif; ?>

			</div><!-- .tab-available-work -->


			<!-- Archives tab -->
			<div id="tab-archives" class="ui-tabs-panel">

				<!-- Find the artwork related to this artist and show only archive products -->
				<?php
					$args = array(
						'post_type'       => 'artist',
						'meta_key'        => 'artwork_availability',
						'connected_type'  => 'product_to_artist',
						'connected_items' => get_queried_object(),
						'nopaging'        => true,

						'meta_query' => array(
							'key'     => 'artwork_availability',
							'value'   => array( 'Archive' ),
							'compare' => 'IN',
						),
					);

					$connected = new WP_Query( $args );
				?>

				<!-- Display connected artwork (product) -->
				<?php
				if ( $connected->have_posts() ) :
					while ( $connected->have_posts() ) :
						$connected->the_post(); ?>

						<ul class="products artist-archives">
							<li>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium-thumbnail'); ?>
									<h3><?php the_title(); ?></h3>
								</a>
							</li>
						</ul>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

				<?php else : ?>

					<p class="info-box"><?php _e( 'No archives available', 'forward' ); ?></p>

				<?php endif; ?>

			</div><!-- .tab-archives -->


			<!-- Biography tab -->
			<div id="tab-biography" class="ui-tabs-panel">

				<div class="artist-photo">
					<?php
						$attachment_id = get_field('artist_photo_id');
						$size = 'large-thumbnail';
						$image = wp_get_attachment_image_src( $attachment_id, $size );
					?>
					<img class="artist_photo" alt="Image of <?php echo the_title(); ?>" src="<?php echo $image[0]; ?>" />
				</div><!-- .artist-photo -->

				<?php echo the_field( 'artist_biography' ); ?>

			</div><!-- .tab-biography -->


			<!-- Selected Exhibitions tab -->
			<div id="tab-selected-exhibitions" class="ui-tabs-panel">

				<!-- Find the exhibitions related to this artist -->
				<?php
				$args = array(
					'post_type'       => 'exhibition',
					'connected_type'  => 'exhibition_to_artist',
					'connected_items' => get_queried_object(),
					'nopaging'        => true,
				);

				$connected = new WP_Query( $args );
				?>

				<!-- Display connected exhibitions -->
				<?php
				if ( $connected->have_posts() ) :
				while ( $connected->have_posts() ) :
				$connected->the_post(); ?>

					<div class="related outer-container artist-exhibitions">

						<ul class="products">
							<li>
								<a href="<?php the_permalink(); ?>">

									<div class="exhibition-photo">
										<?php
											$attachment_id = get_field('exhibition_photo_id');
											$size = 'large-thumbnail';
											$image = wp_get_attachment_image_src( $attachment_id, $size );
										?>
										<img class="exhbition_photo" alt="Image of <?php echo the_title(); ?> Exhibition" src="<?php echo $image[0]; ?>" />
									</div><!-- .exhibition-photo -->

									<h3><?php the_title(); ?></h3>

								</a>
							</li>
						</ul>

					</div><!-- .artist-exhibitions -->

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

				<?php else : ?>

					<p class="info-box"><?php _e( 'No exhibitions', 'forward' ); ?></p>

				<?php endif; ?>

			</div><!-- .tab-selected-exhibitions -->

			<!-- Commissions tab -->
			<div id="tab-commissions" class="ui-tabs-panel">
				<?php echo the_field( 'artist_commissions' ); ?>
			</div><!-- .tab-commissions -->

			<!-- Art Reviews tab -->
			<div id="tab-art-reviews" class="ui-tabs-panel">
				<?php echo the_field( 'artist_reviews' ); ?>
			</div><!-- .tab-art-reviews -->

			<!-- Press and Publications tab -->
			<div id="tab-press" class="ui-tabs-panel">
				<?php echo the_field( 'artist_news' ); ?>
			</div><!-- .tab-press -->

			<!-- Studio Visit tab -->
			<div id="tab-visit" class="ui-tabs-panel">
				<?php echo the_field( 'artist_studio_visit' ); ?>
			</div><!-- .tab-visit -->

		</div><!-- .tabs -->


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