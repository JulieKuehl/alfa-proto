<?php
/**
 * External product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php //do_action( 'alfa_get_price' ); ?>

<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="cart" method="post" enctype='multipart/form-data'>

	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

	<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

</form>

<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
