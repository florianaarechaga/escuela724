<?php
/**
* Education Booster breadcrumb.
*
* @since Education Booster 1.0.0
* @uses breadcrumb_trail()
*/
require get_parent_theme_file_path( '/modules/breadcrumbs/breadcrumbs.php' );
if ( ! function_exists( 'educationbooster_breadcrumb' ) ) :

	function educationbooster_breadcrumb() {

		$breadcrumb_args = apply_filters( 'educationbooster_breadcrumb_args', array(
			'show_browse' => false,
		) );

		breadcrumb_trail( $breadcrumb_args );
	}

endif;

function educationbooster_modify_breadcrumb( $crumb ){

	$i = count( $crumb ) - 1;
	$title = educationbooster_remove_pipe( $crumb[ $i ] );

	$crumb[ $i ] = $title;

	return $crumb;
}
add_filter( 'breadcrumb_trail_items', 'educationbooster_modify_breadcrumb' );