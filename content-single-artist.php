<?php
/**
 * @package Forward
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php forward_featured_image(); ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php forward_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<div id="tabs" class="ui-tabs">

			<ul class="tabs ui-tabs-nav">
				<li><a href="#tab-available-work" class="ui-tabs-anchor" >Available Work</a></li>
				<li><a href="#tab-archives" class="ui-tabs-anchor">Archives</a></li>
				<li><a href="#tab-biography" class="ui-tabs-anchor">Biography</a></li>
				<li><a href="#tab-selected-exhibitions" class="ui-tabs-anchor">Selected Exhibitions</a></li>
				<li><a href="#tab-commissions" class="ui-tabs-anchor">Commissions</a></li>
				<li><a href="#tab-art-reviews" class="ui-tabs-anchor">Art Reviews</a></li>
				<li><a href="#tab-press" class="ui-tabs-anchor">Press and Publications</a></li>
				<li><a href="#tab-visit" class="ui-tabs-anchor">Studio Visit</a></li>
			</ul>

			<div id="tab-available-work" class="ui-tabs-panel">
				<!-- Related artwork connected posts -->
				<?php
				// Find connected artwork (product)
				$connected = new WP_Query( array(
					'connected_type' => 'product_to_artist',
					'connected_items' => get_queried_object(),
					'nopaging' => true,
				) );

				// Display connected artwork (product)
				if ( $connected->have_posts() ) :
				?>

				<div id="related-artwork-archive" class="related outer-container">
<!--					<h2>Related Artwork:</h2>-->
					<ul class="products artist-work">
						<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
							<div class="related-artwork-entry">
								<li>
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'medium-thumbnail'); ?>
										<h3><?php the_title(); ?></h3>
									</a>
								</li>
							</div><!-- .related-products -->
						<?php endwhile; ?>
					</ul>

					<?php else : ?>

						<p class="info-box"><?php _e( 'Nothing currently available', 'alfa' ); ?></p>

					<?php
					// Prevent weirdness
					wp_reset_postdata();

					endif;
					?>
				</div><!-- .related-artwork-archive -->
				

			<div id="tab-archives" class="ui-tabs-panel">

				<!-- Related artwork connected posts -->
				<?php
				// Find connected artwork (product)
				$connected = new WP_Query( array(
					'connected_type' => 'product_to_artist',
					'connected_items' => get_queried_object(),
					'nopaging' => true,
				) );

				// Display connected artwork (product)
				if ( $connected->have_posts() ) :
				?>

				<div id="related-artwork-archive" class="related outer-container">
<!--					<h2>Related Artwork:</h2>-->
					<ul class="products artist-work">
						<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
							<div class="related-artwork-entry">
								<li>
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'medium-thumbnail'); ?>
										<h3><?php the_title(); ?></h3>
									</a>
								</li>
							</div><!-- .related-products -->
						<?php endwhile; ?>
					</ul>

					<?php else : ?>

						<p class="info-box"><?php _e( 'No archives available', 'alfa' ); ?></p>

					<?php
					// Prevent weirdness
					wp_reset_postdata();

					endif;
					?>
				</div><!-- .related -->

			</div>

			<div id="tab-biography" class="ui-tabs-panel">
				<div class="artist-photo">
					<?php
					$attachment_id = get_field('artist_photo_id');
					$size = 'large-thumbnail';
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					$image_url = $image['sizes']['large-thumbnail'];
					// url = $image[0];
					// width = $image[1];
					// height = $image[2];
					?>

					<img class="artist_photo" alt="Image of <?php echo the_title(); ?>" src="<?php echo $image[0]; ?>" />
				</div><!-- .artist-archive-photo -->

				<?php echo the_field( 'artist_biography' ); ?>

			</div>

			<div id="tab-selected-exhibitions" class="ui-tabs-panel">
				<?php echo the_field( 'artist_exhibitions' ); ?>
			</div>

			<div id="tab-commissions" class="ui-tabs-panel">
				<?php echo the_field( 'artist_commissions' ); ?>
			</div>

			<div id="tab-art-reviews" class="ui-tabs-panel">
				<?php echo the_field( 'artist_reviews' ); ?>
			</div>

			<div id="tab-press" class="ui-tabs-panel">
				<?php echo the_field( 'artist_news' ); ?>
			</div>

			<div id="tab-visit" class="ui-tabs-panel">
				<?php echo the_field( 'artist_studio_visit' ); ?>
			</div>

		</div>


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