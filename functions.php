<?php
/**
 * Forward functions and definitions
 *
 * @package Forward
 */


/**
 * Adds google font support.
 * 
 */
if ( ! function_exists( 'forward_google_fonts' ) ) :

add_action('wp_enqueue_scripts', 'forward_google_fonts');

function forward_google_fonts() {
	$query_args = array(
		'family' => 'Source+Sans+Pro:200,300,400,600',

		// Here's an example for changing fonts.
		// 
		// 'family' => 'Open+Sans:400,700|Oswald:700',
		// 'subset' => 'latin,latin-ext',
	);

	wp_register_style( 'source-sans', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

	wp_enqueue_style('source-sans');
}
endif; // forward_google_fonts


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( ! function_exists( 'forward_setup' ) ) :

add_action( 'after_setup_theme', 'forward_setup' );

function forward_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Forward, use a find and replace
	 * to change 'forward' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'forward', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'small-thumbnail', 75, 9999, false );
	add_image_size( 'large-thumbnail', 225, 225, true );
	add_image_size( 'large-artwork', 500, 9999, false );
	add_image_size( 'slider', 1200, 400, true );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'forward' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'forward_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // forward_setup


/**
 * Register widget areas
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
if ( ! function_exists( 'forward_widgets_init' ) ) :

add_action( 'widgets_init', 'forward_widgets_init' );

function forward_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'forward' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Column 1', 'forward' ),
		'id'            => 'home-col-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="home-col-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Column 2', 'forward' ),
		'id'            => 'home-col-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="home-col-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Column 3', 'forward' ),
		'id'            => 'home-col-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="home-col-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Column 4', 'forward' ),
		'id'            => 'home-col-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="home-col-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'forward' ),
		'id'            => 'footer-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="footer-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Right', 'forward' ),
		'id'            => 'footer-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="footer-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Contact Page', 'forward' ),
		'id'            => 'contact-page',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="contact-page-sidebar">',
		'after_title'   => '</h2>',
	) );
}
endif; // forward_widgets_init


/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'forward_scripts' ) ) :

add_action( 'wp_enqueue_scripts', 'forward_scripts' );

function forward_scripts() {
	wp_enqueue_style( 'forward-style', get_stylesheet_uri() );

	// Front-end scripts
	if ( ! is_admin() ) {

		// Load minified scripts if debug mode is off
		if ( WP_DEBUG === true ) {
			$suffix = '';
		} else {
			$suffix = '.min';
		}

		// Load theme-specific JavaScript with versioning based on last modified time; http://www.ericmmartin.com/5-tips-for-using-jquery-with-wordpress/
		wp_enqueue_script( 'forward-js-core', get_stylesheet_directory_uri() . '/js/core' . $suffix . '.js', array( 'jquery' ), filemtime( get_template_directory() . '/js/core' . $suffix . '.js' ), true );

		// Conditionally load another script
		// if ( is_singular() ) {
		//   wp_enqueue_script( 'my-theme-extras', get_stylesheet_directory_uri() . '/js/extras' . $suffix . '.js', array( 'jquery' ), filemtime( get_template_directory() . '/js/extras' . $suffix . '.js' ), true );
		// }
	}

	// wp_enqueue_script( 'forward-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	// wp_enqueue_script( 'forward-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	// Add Google Maps support
	wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '3', true );
	wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/js/google-maps.js', array(
		'google-map',
		'jquery'
	), '0.1', true );
}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	endif; // forward_scripts


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Enable automatic theme updates.
 */
require_once( 'wp-updates-theme.php' );
new WPUpdatesThemeUpdater_1511( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );


/**
 * Add WooCommerce support
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'forward_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'forward_wrapper_end', 10 );

function forward_wrapper_start() {
	echo '<section id="main">';
}
function forward_wrapper_end() {
	echo '</section>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );

function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}


/**
 * Customize WooCommerce single product page
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 30 );


/**
 * Remove WooCommerce breadcrumbs
 */
add_action( 'init', 'jk_remove_wc_breadcrumbs' );

function jk_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/**
 * Add HTML5 search form support
 */
add_theme_support( 'html5', array( 'search-form' ) );


// SET ARCHIVE ORDERING CRITERIA

/*
 * Sort Find Artwork (products) archive page by product title
 */
add_action( 'pre_get_posts', 'alfa_get_posts_product' );

function alfa_get_posts_product( $query ) {

	if ( is_post_type_archive( 'product' ) ) {

		// Sort artwork (product) by title
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	}

	return $query;
}


/*
 * Sort Artists archive page by last name
 */
add_action( 'pre_get_posts', 'alfa_sort_artists' );

function alfa_sort_artists( $query ) {

	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( is_post_type_archive( 'artist' ) ) {
		// Sort artists by lastname
		$query->set( 'meta_key', 'artist_lastname' );
		$query->set( 'orderby', 'meta_value' );
		$query->set( 'order', 'ASC' );
	}
}


/*
 * Sort exhibitions archive page by ending date
 */
add_action( 'pre_get_posts', 'alfa_get_posts_exhibition' );

function alfa_get_posts_exhibition( $query ) {

	if ( is_post_type_archive( 'exhibition' ) ) {

		// Stock: sort exhibitions by ending date
		$query->set( 'orderby', 'exhibition_ending_date' );
		$query->set( 'order', 'DESC' );
	}

	return $query;
}

/*
 * Sort Team Members archive page by display order field
 */
add_action( 'pre_get_posts', 'alfa_sort_team_members' );

function alfa_sort_team_members( $query ) {

	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( is_post_type_archive( 'team_member' ) ) {
		// Sort team members by display order
		$query->set( 'meta_key', 'team_member_display_order' );
		$query->set( 'orderby', 'meta_value_num' );
		$query->set( 'order', 'ASC' );
	}
}


/*
 * Increase the number of posts displayed on the specified archive pages
 */
add_filter('pre_option_posts_per_page', 'team_member_posts_per_page');

function team_member_posts_per_page() {
	if ( is_post_type_archive( 'team_member') || is_post_type_archive( 'artist' ) || is_post_type_archive( 'gallery' ) || is_post_type_archive( 'exhibition' ) || is_post_type_archive( 'product' ) )
		return 999;
	else
		return 10; // default: 5 posts per page
}


/*
 * Move Yoast to bottom
 */
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

function yoasttobottom() {
	return 'low';
}


/**
 * Make the list on the My Collections page persistent
 *
 */
add_filter( 'ywraq_clear_list_after_send_quote', 'ywraq_clear_list_after_send_quote' );
function ywraq_clear_list_after_send_quote( $return ){
  return false;
}