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

	<header id="masthead" class="site-header" role="banner">
		<div class="header-container">
			<div class="site-branding">
				<h1 class="site-title"><a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<div class="site-description"><?php bloginfo( 'description' ); ?></div>
			</div><!-- .site-branding -->
			<div id="mobile-menu-switch">
				<a href="" class="toggle">Menu</a>
			</div><!-- .mobile-menu-switch -->
		</div><!-- .header-container -->
	</header><!-- #masthead -->

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="container">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?> <?php get_search_form(); ?>
		</div><!-- .container -->
	</nav><!-- #site-navigation -->

	<div class="home-page-slider">
		<?php if ( function_exists( 'soliloquy' ) ) {
			soliloquy( 'main-home-page-slider', 'slug' );
		} ?>
	</div>

	<div id="content" class="site-content">
		<div class="content-container">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<!--		--><?php //if ( have_posts() ) : ?>
<!---->
<!--			--><?php ///* Start the Loop */ ?>
<!--			--><?php //while ( have_posts() ) : the_post(); ?>
<!---->
<!--				--><?php
//					/* Include the Post-Format-specific template for the content.
//					 * If you want to override this in a child theme, then include a file
//					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
//					 */
//					get_template_part( 'content-front-page', get_post_format() );
//				?>
<!---->
<!--			--><?php //endwhile; ?>
<!---->
<!--			--><?php //forward_posts_navigation(); ?>
<!---->
<!--		--><?php //else : ?>
<!---->
<!--			--><?php //get_template_part( 'content', 'none' ); ?>
<!---->
<!--		--><?php //endif; ?>

		<div id="home-page-columns" class="container">
			<div class="home-page-column"><?php dynamic_sidebar( 'home-col-1' ); ?></div>
			<div class="home-page-column"><?php dynamic_sidebar( 'home-col-2' ); ?></div>
			<div class="home-page-column"><?php dynamic_sidebar( 'home-col-3' ); ?></div>
			<div class="home-page-column"><?php dynamic_sidebar( 'home-col-4' ); ?></div>
		</div>

		<h3 class="home-carousel-title">New Artwork</h3>
		<?php if ( function_exists( 'soliloquy' ) ) {
			soliloquy( 'home-page-carousel', 'slug' );
		} ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
