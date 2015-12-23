<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Forward
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'forward' ); ?></a>

	<header id="masthead" class="" role="banner">
		<div class="site-header header-container">

			<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/alfa-logo.png" alt="ALFA Logo" nopin="nopin" data-pin-no-hover="true" /></a>
			<div class="site-branding">
				<div class="site-title"><?php bloginfo( 'name' ); ?></div>
				<div class="site-description"><?php bloginfo( 'description' ); ?></div>
			</div><!-- .site-branding -->
		</div><!-- .header-container -->
	</header><!-- #masthead -->

	<div id="mobile-menu-switch">
		<a href="" class="toggle">Menu</a>
	</div><!-- .mobile-menu-switch -->

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="container">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
			<div class="search-box">
				<?php get_search_form(); ?>
			</div><!-- .search-box  -->
		</div><!-- .container -->
	</nav><!-- #site-navigation -->

	<div class="home-page-slider">
		<?php if ( function_exists( 'soliloquy' ) ) {
			soliloquy( 'main-home-page-slider', 'slug' );
		} ?>
	</div><!-- .home-page-slider -->

	<div id="content" class="site-content">
		<div class="content-container">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div id="home-page-columns" class="container home-page-columns">
				<div class="home-page-column"><?php dynamic_sidebar( 'home-col-1' ); ?></div>
				<div class="home-page-column"><?php dynamic_sidebar( 'home-col-2' ); ?></div>
				<div class="home-page-column"><?php dynamic_sidebar( 'home-col-3' ); ?></div>
				<div class="home-page-column"><?php dynamic_sidebar( 'home-col-4' ); ?></div>
			</div><!-- .home-page-columns -->

			<h3 class="home-carousel-title">New Artwork</h3>
			
			<?php if ( function_exists( 'soliloquy' ) ) {
				soliloquy( 'home-page-carousel', 'slug' );
			} ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
