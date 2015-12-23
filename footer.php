<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Forward
 */
?>

		</div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-container">
			<div class="fat-footer">
				<div class="footer-left"><?php dynamic_sidebar( 'footer-left' ); ?></div>
				<div class="footer-right"><?php dynamic_sidebar( 'footer-right' ); ?></div>
			</div><!-- .fat-footer -->
			 <div class="site-credits">
				<?php printf( __( 'Website by %1$s', 'forward' ), '<a href="http://straightforwardwebsolutions.com" >straightFORWARD Web Solutions</a>' ); ?>
			</div><!-- .site-credits -->
		</div><!-- .footer-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
