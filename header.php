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
			<div class="search-box">
				<?php get_search_form(); ?>
			</div><!-- .search-box  -->
			<div class="site-branding">
				<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/alfa-logo.png" alt="ALFA Logo" /></a>
			</div><!-- .site-branding -->
		</div><!-- .header-container -->
	</header><!-- #masthead -->

	<div id="mobile-menu-switch">
		<a href="" class="toggle">Menu</a>
	</div><!-- .mobile-menu-switch -->
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="container">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
		</div><!-- .container -->
	</nav><!-- #site-navigation -->

	<div id="content" class="site-content">
		<div class="content-container">
