<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mystery Themes
 * @subpackage Scholarship
 * @since 1.0.0
 */

	if( ! is_page_template( 'templates/template-home.php' ) ) { 
    	echo '</div><!-- .mt-container -->';
	}
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php 
			$footer_widget_option = get_theme_mod( 'footer_widget_option', 'show' );
			if( $footer_widget_option == 'show' ) {
				get_sidebar( 'footer' );
			}
		?>
		
		<div class="site-info-wrapper">
			<div class="site-info">
				<div class="mt-container">

					<div class="mt-sub-footer-right">
						<?php
							if ( function_exists( 'the_privacy_policy_link' ) ) {
								the_privacy_policy_link( '', '' );
							}
							 
							$mt_sub_footer_type = get_theme_mod( 'mt_sub_footer_type', 'social_icon' );
							if( $mt_sub_footer_type == 'social_icon' ) {
						?>
			                <div class="mt-footer-social">
				           		<?php scholarship_social_icons(); ?>
				           	</div><!-- .mt-footer-social -->
				        <?php } else { ?>
				           	<nav id="site-footer-navigation" class="footer-navigation" role="navigation">
						        <?php wp_nav_menu( array( 'theme_location' => 'scholarship_footer_menu', 'menu_id' => 'footer-menu', 'fallback_cb' => false ) ); ?>
				           	</nav><!-- #site-navigation -->
			           	<?php } ?>
			        </div><!-- .mt-sub-footer-right -->

				</div>
			</div><!-- .site-info -->
		</div><!-- .site-info-wrapper -->

	</footer><!-- #colophon -->
	<div id="mt-scrollup" class="animated arrow-hide"><i class="fa fa-chevron-up"></i></div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>