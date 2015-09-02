<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
?>
<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<div class="artwork-product-image">
			<a href="<?php the_permalink(); ?>">
				<?php

					/**
					 * woocommerce_before_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 * @hooked woocommerce_template_loop_product_thumbnail - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item_title' );

				?>
			</a>
		</div><!-- .artwork-product-image -->


		<div class="artwork-product-metainfo">
			<?php
				/**
				 * woocommerce_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' );

				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
BOO!
			<?php

				/**
				 * woocommerce_after_shop_loop_item hook
				 *
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				// commented out to prevent "Read More" buttons from displaying
		//		do_action( 'woocommerce_after_shop_loop_item' );

			?>

			<?php
				/**
				* Related artist connected posts
				*/

				// Find connected artist
				$connected = new WP_Query( array(
				'connected_type' => 'product_to_artist',
				'connected_items' => get_queried_object(),
				'nopaging' => true,
				) );

				// Display connected artist
				if ( $connected->have_posts() ) :
				?>

			<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				<ul>
					<li class="artwork-product-artist"><?php the_title(); ?></li>
				</ul>
			<?php endwhile; ?>

			<?php
			// Prevent weirdness
			wp_reset_postdata();

			endif;
			?>

			<div class="view-artwork-link"><button><a href="<?php the_permalink(); ?>">View this piece</a></button></div>

		</div><!-- .artwork-product-metainfo -->

</li>
