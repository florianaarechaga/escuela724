<?php
/**
* Generates default options for customizer.
*
* @since  Education Booster 1.0.0
* @access public
* @param  array $options 
* @return array
*/
	
function educationbooster_default_options( $options ){

	$defaults = array(
		# Site identiry
		'site_title'         	         => esc_html__( 'Education Booster', 'education-booster' ),
		'site_title_color'   	         => '#ffffff',
		'site_tagline'       	         => esc_html__( 'Education WP Theme', 'education-booster' ),
		'site_tagline_color' 	         => '#d9d9d9',
		'display_header_text'            => false,

		# Primary color
		'site_primary_color' 	         => '#083a6f',

		# Slider
		'slider_control'     	         => true,
		'slider_timeout'     	         => 5,
		'slider_autoplay'    	         => false,
		
		'disable_service'                => false,
		'disable_feature'                => false,
		'disable_about'                  => false,
		'disable_callback'               => false,
		'disable_testimonial'            => false,
		'disable_blog'                   => false,
		'blog_title'                     => esc_html__( 'RECENT BLOG', 'education-booster' ),
		'blog_number'                    => 3,
		'blog_category'                  => 1,

		# Theme option
		# General
		'menu_padding_top'               => 0,
		'enable_scroll_top_in_mobile'    => false,
		# Header
		'top_header_background_color'    => false,
		'disable_top_header'             => false,
		'disable_fixed_header'           => false,
		# Footer
		'footer_text'                    => educationbooster_get_footer_text(),
	);

	return array_merge( $options, $defaults );
}
add_filter( 'Educationbooster_Customizer_defaults', 'educationbooster_default_options' );

if( !function_exists( 'educationbooster_get_footer_text' ) ):
/**
* Generate Default footer text
*
* @return string
* @since Education Booster 1.0.0
*/
function educationbooster_get_footer_text(){

	$text = esc_html__( '&copy Copyright 2018; All Rights Reserved. Proudly powered by', 'education-booster' );
	$text .= ' <a href="'.esc_url( '//wordpress.org' ).'" target="_blank">'.esc_html__( 'WordPress', 'education-booster' ).'</a> | ';

	$text .= esc_html__( 'Education Booster Theme by', 'education-booster' ).' <a href="'.esc_url( '//keonthemes.com' ).' target="_blank">';
	$text .= esc_html__( 'Keon Themes', 'education-booster' ).'</a>';
							
	return $text;
}
endif;