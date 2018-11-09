<?php
/**
* Sets setting field for homepage
* 
* @since  Education Booster 1.0.0
* @param  array $settings
* @return array Merged array of settings
*
*/
function educationbooster_frontpage_settings( $settings ){

	$home_settings = array(
		# Settings for slider
		'slider_page' => array(
			'label'       => esc_html__( 'Slider Page', 'education-booster' ),
			'section'     => 'slider',
			'type'        => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23. Supports Maximum 3 sliders.', 'education-booster' )
		),
		'slider_control' => array(
			'label'     => esc_html__( 'Show Slider Control', 'education-booster' ),
			'section'   => 'slider',
			'type'      => 'checkbox',
			'transport' => 'postMessage',
		),
		'slider_autoplay' => array(
			'label'   => esc_html__( 'Slider Auto Play', 'education-booster' ),
			'section' => 'slider',
			'type'    => 'checkbox'
		),
		'slider_timeout' => array(
			'label'    => esc_html__( 'Slider Timeout ( in sec )', 'education-booster' ),
			'section'  => 'slider',
			'type'     => 'number'
		),

		# Settings for service section
		'service_main_page' => array(
			'label'   => esc_html__( 'Select Main Page for Services', 'education-booster' ),
			'section' => 'home_service',
			'type'    => 'dropdown-pages',
		),
		'service_page' => array(
			'label'   => esc_html__( 'Service Page', 'education-booster' ),
			'section' => 'home_service',
			'type'    => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23', 'education-booster' )
		),
		'disable_service' => array(
			'label'   => esc_html__( 'Disable Service Section', 'education-booster' ),
			'section' => 'home_service',
			'type'    => 'checkbox',
		),

		# Settings for feature section
		'feature_main_page' => array(
			'label'   => esc_html__( 'Select Main Page for Features', 'education-booster' ),
			'section' => 'home_feature',
			'type'    => 'dropdown-pages',
		),

		'feature_page' => array(
			'label'   => esc_html__( 'Feature Page', 'education-booster' ),
			'section' => 'home_feature',
			'type'    => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23', 'education-booster' )
		),
		'disable_feature' => array(
			'label'   => esc_html__( 'Disable Feature Section', 'education-booster' ),
			'section' => 'home_feature',
			'type'    => 'checkbox',
		),

		# Settings for about page
		'about_page' => array(
			'label'   => esc_html__( 'Select About Page', 'education-booster' ),
			'section' => 'home_about',
			'type'    => 'dropdown-pages',
		),
		'disable_about' => array(
			'label'   => esc_html__( 'Disable About Us Section', 'education-booster' ),
			'section' => 'home_about',
			'type'    => 'checkbox',
		),

		# Settings for callback section
		'callback_page' => array(
			'label'   => esc_html__( 'Select a Callback Page', 'education-booster' ),
			'section' => 'home_callback',
			'type'    => 'dropdown-pages'
		),
		'disable_callback' => array(
			'label'   => esc_html__( 'Disable Callback Section', 'education-booster' ),
			'section' => 'home_callback',
			'type'    => 'checkbox',
		),
		
		# Settings for Testimonials
		'testimonial_main_page' => array(
			'label'   => esc_html__( 'Select a main page for Testimonial', 'education-booster' ),
			'section' => 'home_testimonial',
			'type'    => 'dropdown-pages',
		),
		'testimonial_page' => array(
			'label'   => esc_html__( 'Testimonial Pages', 'education-booster' ),
			'section' => 'home_testimonial',
			'type'    => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23', 'education-booster' )
		),
		'disable_testimonial' => array(
			'label'   => esc_html__( 'Disable Testimonial Section', 'education-booster' ),
			'section' => 'home_testimonial',
			'type'    => 'checkbox',
		),

		# Settings for Blog section
		'blog_main_page' => array(
			'label'   => esc_html__( 'Select a main page for Blog', 'education-booster' ),
			'section' => 'home_blog',
			'type'    => 'dropdown-pages',
		),
		'blog_category' => array(
			'label'   => esc_html__( 'Choose Blog Category', 'education-booster' ),
			'section' => 'home_blog',
			'type'    => 'dropdown-categories',
		),
		'blog_number' => array(
			'label' => esc_html__( 'Number of Posts', 'education-booster' ),
			'section' => 'home_blog',
			'type'    => 'number',
			'input_attrs' => array(
				'max' => 3,
				'min' => 1
			)
		),
		'disable_blog' => array(
			'label'   => esc_html__( 'Disable Blog Section', 'education-booster' ),
			'section' => 'home_blog',
			'type'    => 'checkbox',
		),
	);

	return array_merge( $home_settings, $settings );
}
add_filter( 'Educationbooster_Customizer_fields', 'educationbooster_frontpage_settings' );