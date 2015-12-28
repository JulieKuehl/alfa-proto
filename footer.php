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

	<div class="footer-border fullwidth">
		<p>&nbsp;</p>
	</div>

	<footer id="colophon" class="site-footer footer-container" role="contentinfo">
			<div class="fat-footer">
				<div class="footer-left"><?php dynamic_sidebar( 'footer-left' ); ?></div>
				<div class="footer-right"><?php dynamic_sidebar( 'footer-right' ); ?></div>
			</div><!-- .fat-footer -->
			 <div class="site-credits">
				 &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'title' ); ?> | Built by <a href="http://straightforwardwebsolutions.com" >straightFORWARD Web Solutions</a>
			</div><!-- .site-credits -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
