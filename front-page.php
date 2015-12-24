<?php get_header(); ?>

	<div id="primary" class="content-area home-page-content-area">
		<main id="main" class="site-main" role="main">

			<div class="home-page-slider">
				<?php if ( function_exists( 'soliloquy' ) ) {
					soliloquy( 'main-home-page-slider', 'slug' );
				} ?>
			</div><!-- .home-page-slider -->

			<div id="home-page-columns" class="container home-page-columns">
				<div class="home-page-column"><?php dynamic_sidebar( 'home-col-1' ); ?></div>
				<div class="home-page-column"><?php dynamic_sidebar( 'home-col-2' ); ?></div>
				<div class="home-page-column"><?php dynamic_sidebar( 'home-col-3' ); ?></div>
				<div class="home-page-column"><?php dynamic_sidebar( 'home-col-4' ); ?></div>
			</div><!-- .home-page-columns -->

			<div class="home-page-carousel">
				<h3 class="home-carousel-title">New Artwork</h3>

				<?php if ( function_exists( 'soliloquy' ) ) {
					soliloquy( 'home-page-carousel', 'slug' );
				} ?>
			</div><!-- .home-page-carousel -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
