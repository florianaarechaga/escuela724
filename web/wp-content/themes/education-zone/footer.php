<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Zone
 */
    $enabled_sections = education_zone_get_sections();  

 if( is_home() || ! $enabled_sections ||  ! ( is_front_page()  || is_page_template( 'template-home.php' ) ) ){?>
            </div>
        </div>
	</div><!-- #content -->
<?php } ?>

	<footer id="colophon" class="site-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
	    <div class="container">
	      <?php if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ) { ?>
            <div class="widget-area">
				<div class="row">
					
                    <?php if( is_active_sidebar( 'footer-one') ) { ?>
                        <div class="col"><?php dynamic_sidebar( 'footer-one' ); ?></div>                        
                    <?php } ?> 
                    
                    <?php if( is_active_sidebar( 'footer-two') ) { ?>
                        <div class="col"><?php dynamic_sidebar( 'footer-two' ); ?></div>                        
                    <?php } ?> 
                    
                    <?php if( is_active_sidebar( 'footer-three') ) { ?>
                        <div class="col"><?php dynamic_sidebar( 'footer-three' ); ?></div>                        
                    <?php } ?>
                        				
				</div>
			</div>
            <?php } ?>
            
			<div class="site-info">
			    <?php if( get_theme_mod('education_zone_ed_social') ) do_action('education_zone_social'); 

                $copyright_text = get_theme_mod( 'education_zone_footer_copyright_text' ); ?>
                    
                <p> 
                <?php 
                    if( $copyright_text ){
                        echo '<span>' .wp_kses_post( $copyright_text ) . '</span>';
                    }else{
                        echo '<span>';
                        echo  esc_html__( 'Copyright &copy;', 'education-zone' ) . esc_html( date_i18n('Y') ); 
                        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>.</span>';
                    }?>
    			    <span class="by">
                        <a href="<?php echo esc_url( 'https://raratheme.com/wordpress-themes/education-zone/' ); ?>" rel="designer"><?php esc_html_e( 'Education Zone ', 'education-zone' ); ?>
                        </a>
                        <?php printf( esc_html__( ' by Rara Theme. Powered by %s', 'education-zone' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'education-zone' ) ) .'">WordPress</a>' ); ?>.
                    </span>
                    <?php if ( function_exists( 'the_privacy_policy_link' ) ) {
                            the_privacy_policy_link();
                         } ?>
                </p>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
