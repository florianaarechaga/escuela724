<?php
/**
 * The template for displaying the footer
 * Contains the closing of the body tag and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since Education Booster 1.0.0
 */
?>	
		<footer class="wrapper site-footer" role="contentinfo">
			<div class="container">
				<div class="footer-inner">
					<div class="site-info">
						<?php echo wp_kses_post(  educationbooster_get_option( 'footer_text' ) ); ?>
					</div><!-- .site-info -->
				</div>
			</div>
		</footer><!-- #colophon -->
		<?php wp_footer(); ?>
	</body>
</html>