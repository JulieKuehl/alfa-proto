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
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
		</div><!-- .container -->
	</nav><!-- #site-navigation -->

	<div id="content" class="site-content">
		<div class="content-container">
