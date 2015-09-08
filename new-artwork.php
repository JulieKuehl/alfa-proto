<?php get_header(); ?>

<?php
// WP_Query arguments
$args = array (
	'category_name'          => 'new-artwork',
	'pagination'             => true,
	'posts_per_archive_page' => '20',
	'ignore_sticky_posts'    => false,
	'order'                  => 'DESC',
	'orderby'                => 'modified',
);

// The Query
$new_artwork = new WP_Query( $args );

// The Loop
if ( $new_artwork->have_posts() ) {
	while ( $new_artwork->have_posts() ) {
		$new_artwork->the_post();
		// do something ?>

		<?php the_title(); ?>
		<?php the_post_thumbnail(); ?>

<?php
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>

<?php get_footer(); ?>
