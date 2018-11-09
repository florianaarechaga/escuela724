<?php
/**
* Sets settings for general fields
*
* @since  Education Booster 1.0.0
* @param  array $settings
* @return array Merged array
*/

function Educationbooster_Customizer_general_settings( $settings ){

	$general = array(
		'site_title_color' => array(
			'label'     => esc_html__( 'Site Title', 'education-booster' ),
			'transport' => 'postMessage',
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_tagline_color' => array(
			'label'     => esc_html__( 'Site Tagline', 'education-booster' ),
			'transport' => 'postMessage',
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_primary_color' => array(
			'label'     => esc_html__( 'Primary', 'education-booster' ),
			'section'   => 'colors',
			'type'      => 'colors',
		),

		# Theme Options Section
		# General
		'menu_padding_top' => array(
			'label'     => esc_html__( 'Additional Space on top of Menu.', 'education-booster' ),
			'section'   => 'general_options',
			'type'      => 'number',
			'transport' => 'postMessage'
		),
		'enable_scroll_top_in_mobile' => array(
			'label'     => esc_html__( 'Enable Scroll top in mobile', 'education-booster' ),
			'section'   => 'general_options',
			'transport' => 'postMessage',
			'type'      => 'checkbox' ,
		),
		# Header
		'top_header' => array(
			'label'   => esc_html__( 'Top Header Left Content', 'education-booster' ),
			'section' => 'header_options',
			'type'    => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23', 'education-booster' )
		),
		'top_header_background_color' => array(
			'label'   => esc_html__( 'Top Header Dark Background Color', 'education-booster' ),
			'section' => 'header_options',
			'type'    => 'checkbox',
		),
		'disable_top_header' => array(
			'label'     => esc_html__( 'Disable Top Header', 'education-booster' ),
			'section'   => 'header_options',
			'transport' => 'postMessage',
			'type'      => 'checkbox',
		),
		'disable_fixed_header' => array(
			'label'   => esc_html__( 'Disable Fixed Header', 'education-booster' ),
			'type'    => 'checkbox',
			'section' => 'header_options',
		),
		# Footer
		'footer_text' =>  array(
			'label'     => esc_html__( 'Footer Text', 'education-booster' ),
			'section'   => 'footer_options',
			'type'      => 'textarea'
		)
		
	);

	return array_merge( $settings, $general );
}
add_filter( 'Educationbooster_Customizer_fields', 'Educationbooster_Customizer_general_settings' );