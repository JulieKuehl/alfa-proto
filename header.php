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
	<?php wp_enqueue_script( 'jquery' ); ?>
	<?php wp_enqueue_script( 'jquery-ui-core' ); ?>
	<?php wp_enqueue_script( 'jquery-ui-tabs' ); ?>
	<?php wp_head(); ?>
	<!-- tabs script -->
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$("#tabs").tabs();
		});
	</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'forward' ); ?></a>

	<header id="masthead" class="" role="banner">
		<div class="site-header header-container">

			<div class="site-branding">
				<a href="<?php bloginfo( 'url' ); ?>">
					<div class="site-logo">
						<a href="<?php bloginfo( 'url' ); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/alfa-logo.png" alt="ALFA Logo" class="site-logo" nopin="nopin" data-pin-no-hover="true"/>
							</a>
					</div>

					<div class="site-title">
						<a href="<?php bloginfo( 'url' ); ?>">
							<?php bloginfo( 'name' ); ?>
						</a>
					</div>

					<div class="site-description">
						<a href="<?php bloginfo( 'url' ); ?>">
							<?php bloginfo( 'description' ); ?>
						</a>
					</div>
				</a>
			</div><!-- .site-branding -->

		</div><!-- .header-container -->
	</header><!-- #masthead -->

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="container">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
			<div class="search-box">
				<?php get_search_form(); ?>
			</div><!-- .search-box  -->
		</div><!-- .container -->
	</nav><!-- #site-navigation -->

	<div id="content" class="site-content">
		<div class="content-container">
