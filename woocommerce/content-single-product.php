<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?> >


	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">

		<!-- Related artist connected posts -->
		<?php
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
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php endwhile; ?>

			<?php
			// Prevent weirdness
			wp_reset_postdata();

		endif;
		?>

		<!-- Display the artwork title -->
		<h1 class="product_title entry-title">
			<?php the_title(); ?>
		</h1>

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 */
			do_action( 'alfa_woocommerce_single_product_info' );
		?>

		<?php
		// Display an Add to My Collection button
		do_action( 'woocommerce_template_single_add_to_cart' );
		?>

		<?php
		// Display material / substrate
		the_field( 'artwork_material' );
		?>

		<br />

		<?php
		// Display the Dimensions
		$height = get_field( 'artwork_height' );
		$width = get_field( 'artwork_width' );
		$depth = get_field( 'artwork_depth' );

		if (isset($height) && isset($width) && ! empty($height) && !empty($width)) {
			echo $height . '" x ' . $width . '"';
		} else {
			echo '';
		}

		if (isset($depth) && ! empty($depth)) {
			echo ' x ' . $depth . '"';
		} else {
			echo '';
		}
		?>


		<?php
		// Display the button
		?>

		<p><?php
		// Display the content
		the_content();
		?></p>

		<p>
			<?php
			// Display the provenance
			the_field( 'artwork_provenance' );
			?>
		</p>

		<?php
		/**
		 * woocommerce_single_product_summary hook
		 *
		 * @hooked woocommerce_template_single_price - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 */
		do_action( 'alfa_woocommerce_single_product_summary' );
		?>

		<p>For more information, <a href="/contact/">please contact us.</a></p>

	</div><!-- .summary -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @unhooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
