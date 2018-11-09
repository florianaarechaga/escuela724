<?php
/**
* Template Name: Front Page
*
* This is the static homepage of this theme. Will be rendered when user select such a page whose 
* page template is home in static front page setting. 
* @since Education Booster 1.0.0
*/ 
get_header(); 

$sections = educationbooster_get_homepage_sections();

do_action( 'educationbooster_before_homepage_sections' );

foreach( $sections as $section ){
	get_template_part( 'template-parts/front-page/' . $section, '' );
}

do_action( 'educationbooster_after_homepage_sections' );

get_footer();