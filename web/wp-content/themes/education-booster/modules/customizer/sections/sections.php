<?php
/**
* Sets sections for Educationbooster_Customizer
*
* @since  Education Booster 1.0.0
* @param  array $sections
* @return array Merged array
*/
function Educationbooster_Customizer_sections( $sections ){

	$educationbooster_sections = array(
		
		# Section for Fronpage panel
		'slider' => array(
			'title' => esc_html__( 'Slider', 'education-booster' ),
			'panel' => 'frontpage_options'
		),
		'home_service' => array(
			'title' => esc_html__( 'Service', 'education-booster' ),
			'panel' => 'frontpage_options'
		),
		'home_feature' => array(
			'title' => esc_html__( 'Feature', 'education-booster' ),
			'panel' => 'frontpage_options'
		),
		'home_about' => array(
			'title' => esc_html__( 'About', 'education-booster' ),
			'panel' => 'frontpage_options'
		),
		'home_callback' => array(
			'title' => esc_html__( 'Callback', 'education-booster' ),
			'panel' => 'frontpage_options'
		),
		'home_testimonial' => array(
			'title' => esc_html__( 'Testimonial', 'education-booster' ),
			'panel' => 'frontpage_options'
		),
		'home_blog' => array(
			'title' => esc_html__( 'Blog', 'education-booster' ),
			'panel' => 'frontpage_options'
		),

		# Section for Theme Options panel
		'general_options' => array(
			'title' => esc_html__( 'General', 'education-booster' ),
			'panel' => 'theme_options'
		),
		'header_options' => array(
			'title' => esc_html__( 'Header', 'education-booster' ),
			'panel' => 'theme_options'
		),
		'footer_options' => array(
			'title' => esc_html__( 'Footer', 'education-booster' ),
			'panel' => 'theme_options'
		)
	);

	return array_merge( $educationbooster_sections, $sections );
}
add_filter( 'Educationbooster_Customizer_sections', 'Educationbooster_Customizer_sections' );