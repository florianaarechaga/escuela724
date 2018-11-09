<?php
/**
* Sets the panels and returns to Educationbooster_Customizer
*
* @since  Education Booster 1.0.0
* @param  array An array of the panels
* @return array
*/
function Educationbooster_Customizer_panels( $panels ){

	$panels = array(
		'frontpage_options' => array(
			'title' => esc_html__( 'Front Page Options', 'education-booster' )
		),
		'theme_options' => array(
			'title' => esc_html__( 'Theme Options', 'education-booster' )
		)
	);

	return $panels;	
}
add_filter( 'Educationbooster_Customizer_panels', 'Educationbooster_Customizer_panels' );