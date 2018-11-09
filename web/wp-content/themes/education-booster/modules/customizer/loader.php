<?php
/**
* Loads all the components related to customizer 
*
* @since Education Booster 1.0.0
*/
require get_parent_theme_file_path( '/modules/customizer/framework/customizer.php' );
require get_parent_theme_file_path( '/modules/customizer/panels/panels.php' );
require get_parent_theme_file_path( '/modules/customizer/sections/sections.php' );

require get_parent_theme_file_path( '/modules/customizer/settings/general.php' );
require get_parent_theme_file_path( '/modules/customizer/settings/frontpage.php' );
require get_parent_theme_file_path( '/modules/customizer/defaults/defaults.php' );


function educationbooster_modify_default_settings( $wp_customize ){

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Background', 'education-booster' );
}
add_action( 'educationbooster_customize_register', 'educationbooster_modify_default_settings' );

function educationbooster_default_styles(){
	
	$site_title_color           = educationbooster_get_option( 'site_title_color' );
	$site_tagline_color         = educationbooster_get_option( 'site_tagline_color' );
	$primary_color              = educationbooster_get_option( 'site_primary_color' );

	$slider_control             = educationbooster_get_option( 'slider_control' );
	$menu_padding_top           = educationbooster_get_option( 'menu_padding_top' );


	?>
	<style type="text/css">
		.offcanvas-menu-open .kt-offcanvas-overlay {
		    position: fixed;
		    width: 100%;
		    height: 100%;
		    background: rgba(0, 0, 0, 0.7);
		    opacity: 1;
		    z-index: 9;
		    top: 0px;
		}

		.kt-offcanvas-overlay {
		    width: 0;
		    height: 0;
		    opacity: 0;
		    transition: opacity 0.5s;
		}
		
		#primary-nav-container{
			padding-top: <?php echo esc_attr( $menu_padding_top ) . 'px'; ?>;
		}

		<?php if( educationbooster_get_option( 'top_header_background_color' ) ): ?>
			.top-header {
			    background-color: #262626;
			}
			.top-header, .top-header .top-header-left .list a, .top-header .top-header-right .socialgroup a {
			    color: #ccc;
			}
		<?php endif; ?>

		<?php if( is_admin_bar_showing() ): ?>
			.site-header {
				padding-top: 47px !important;
			}
			@media screen and (max-width: 782px){
				.site-header {
					padding-top: 61px !important;
				}
			}
		<?php endif; ?>

		<?php if( !$slider_control ): ?>
			.block-slider .controls, .block-slider .owl-pager{
				opacity: 0;
			}
		<?php endif; ?>

		<?php if( educationbooster_get_option( 'disable_fixed_header' ) ): ?>
			.site-header {
				position: relative;
				top: 0 !important;
			}
			.block-slider .banner-overlay {
				padding-top: 175px;
			}
			.wrap-inner-banner .page-header {
				margin-top: 100px;
			}
		<?php endif; ?>

		/*======================================*/
		/* Site title */
		/*======================================*/
		.site-header .site-branding .site-title,
		.site-header .site-branding .site-title a {
			color: <?php echo esc_attr( $site_title_color ); ?>;
		} 

		/*======================================*/
		/* Tagline title */
		/*======================================*/
		.site-header .site-branding .site-description {
			color: <?php echo esc_attr( $site_tagline_color ); ?>;
		}

		/*======================================*/
		/* Primary color */
		/*======================================*/

		/*======================================*/
		/* Background Primary color */
		/*======================================*/
		.button-primary,
		#go-top span,
		.site-header,
		.block-slider #kt-slide-pager .owl-dot span:hover,
		.block-slider #kt-slide-pager .owl-dot span:focus,
		.block-slider #kt-slide-pager .owl-dot span:active,
		.block-slider #kt-slide-pager .owl-dot.active span:hover,
		.block-slider #kt-slide-pager .owl-dot.active span:focus,
		.block-slider #kt-slide-pager .owl-dot.active span:active,
		article.hentry.sticky .post-format-outer > span a,
		.icon-block-outer .list-inner .icon-area .icon-outer a,
		.searchform .search-button,
		.block-grid .post-content .post-content-inner span.cat a,
		.top-header .top-header-right .socialgroup a:hover,
		.top-header .top-header-right .socialgroup a:focus,
		.top-header .top-header-right .socialgroup a:active, .sub-title:before {
			background-color: <?php echo esc_attr( $primary_color ); ?>
		}

		/*======================================*/
		/* Border Primary color */
		/*======================================*/
		.button-primary,
		.block-grid .post-content .post-content-inner span.cat a,
		.block-slider #kt-slide-pager .owl-dot span:hover,
		.block-slider #kt-slide-pager .owl-dot span:focus,
		.block-slider #kt-slide-pager .owl-dot span:active,
		.searchform .search-button {
			border-color: <?php echo esc_attr( $primary_color ); ?>
		}

		/*======================================*/
		/* Primary text color */
		/*======================================*/
		.block-testimonial .slide-item article.post-content .post-content-inner .post-title span, .sub-title {
			color: <?php echo esc_attr( $primary_color ); ?>
		}
		
	</style>
	<?php
}
add_action( 'wp_head', 'educationbooster_default_styles' );

/**
* Load customizer preview js file
*/
function educationbooster_customize_preview_js() {
	wp_enqueue_script( 'education-booster-customize-preview', get_theme_file_uri( '/assets/js/customizer/customize-preview.js' ), array( 'jquery', 'customize-preview'), '1.0', true );
}
add_action( 'customize_preview_init', 'educationbooster_customize_preview_js' );