<?php
/**
 * Education Booster functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since Education Booster 1.0.0
 */

/**
 * Education Booster only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

function educationbooster_scripts(){

	# Enqueue Vendor's Script & Style
	$scripts = array(
		array(
			'handler'  => 'education-booster-google-fonts',
			'style'    => esc_url( '//fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' ),
			'absolute' => true
		),
		array(
			'handler' => 'bootstrap',
			'style'   => 'bootstrap/css/bootstrap.min.css',
			'script'  => 'bootstrap/js/bootstrap.min.js', 
			'version' => '3.3.7'
		),
		array(
			'handler' => 'kfi-icons',
			'style'   => 'kf-icons/css/style.css',
			'version' => '1.0.0'
		),
		array(
			'handler' => 'owlcarousel',
			'style'   => 'OwlCarousel2-2.2.1/assets/owl.carousel.min.css',
			'script'  => 'OwlCarousel2-2.2.1/owl.carousel.min.js',
			'version' => '2.2.1'
		),
		array(
			'handler' => 'owlcarousel-theme',
			'style'   => 'OwlCarousel2-2.2.1/assets/owl.theme.default.min.css',
			'version' => '2.2.1'
		),
		array(
			'handler'  => 'education-booster-style',
			'style'    => get_stylesheet_uri(),
			'absolute' => true,
		),
		array(
			'handler'    => 'education-booster-script',
			'script'     => get_theme_file_uri( '/assets/js/main.js' ),
			'absolute'   => true,
			'prefix'     => '',
			'dependency' => array( 'jquery', 'masonry' )
		)
	);

	educationbooster_enqueue( $scripts );

	$locale = apply_filters( 'educationbooster_localize_var', array(
		'is_admin_bar_showing'        => is_admin_bar_showing() ? true : false,
		'enable_scroll_top_in_mobile' => educationbooster_get_option( 'enable_scroll_top_in_mobile' ) ? 1 : 0,
		'home_slider' => array(
			'autoplay' => educationbooster_get_option( 'slider_autoplay' ),
			'timeout'  => absint( educationbooster_get_option( 'slider_timeout' ) ) * 1000
		),
		'is_rtl' => is_rtl(),
		'search_placeholder'=> esc_html__( 'hit enter for search.', 'education-booster' ),
		'search_default_placeholder'=> esc_html__( 'search...', 'education-booster' )
	));

	wp_localize_script( 'education-booster-script', 'EDUCATIONBOOSTER', $locale );

	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'educationbooster_scripts' );

/**
* Adds a submit button in search form
* 
* @since Education Booster 1.0.0
* @param string $form
* @return string
*/
function educationbooster_modify_search_form( $form ){
	return str_replace( '</form>', '<button type="submit" class="search-button"><span class="kfi kfi-search"></span></button></form>', $form );
}
add_filter( 'get_search_form', 'educationbooster_modify_search_form' );

/**
* Modify some markup for comment section
*
* @since Education Booster 1.0.0
* @param array $defaults
* @return array $defaults
*/
function educationbooster_modify_comment_form_defaults( $defaults ){

	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$defaults[ 'logged_in_as' ] = '<p class="logged-in-as">' . sprintf(
          /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
          __( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a> <a href="%4$s">Log out?</a>', 'education-booster' ),
          get_edit_user_link(),
          /* translators: %s: user name */
          esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.', 'education-booster' ), $user_identity ) ),
          $user_identity,
          wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) )
      ) . '</p>';
	return $defaults;
}
add_filter( 'comment_form_defaults', 'educationbooster_modify_comment_form_defaults',99 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 *
 * @since Education Booster 1.0.0
 * @return void
 */
function educationbooster_pingback_header(){
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'educationbooster_pingback_header' );

/**
* Add a class in body when previewing customizer
*
* @since Education Booster 1.0.0
* @param array $class
* @return array $class
*/
function educationbooster_body_class_modification( $class ){
	if( is_customize_preview() ){
		$class[] = 'keon-customizer-preview';
	}
	
	if( is_404() || ! have_posts() ){
 		$class[] = 'content-none-page';
	}

	if( ( is_front_page() && ! is_home() ) || is_search() ){

		$class[] = 'grid-col-3';
	}else if( is_home() || is_archive() ){

		$class[] = 'grid-col-2';
	}

	return $class;
}
add_filter( 'body_class', 'educationbooster_body_class_modification' );

if( ! function_exists( 'educationbooster_get_ids' ) ):
/**
* Fetches setting from customizer and converts it to an array
*
* @uses educationbooster_explode_string_to_int()
* @return array | false
* @since Education Booster 1.0.0
*/
function educationbooster_get_ids( $setting ){

    $str = educationbooster_get_option( $setting );
    if( empty( $str ) )
    	return;

    return educationbooster_explode_string_to_int( $str );

}
endif;

if( !function_exists( 'educationbooster_section_heading' ) ):
/**
* Prints the heading section for home page
*
* @return void
* @since Education Booster 1.0.0
*/
function educationbooster_section_heading( $args ){

	$defaults = array(
	    'divider'  => false,
	    'query'    => true,
	    'sub_title' => true
	);

	$args = wp_parse_args( $args, $defaults );

	# No need to query if already inside the query.
	if( !$args[ 'query'] ){
		set_query_var( 'args', $args );
		get_template_part( 'template-parts/page/home', 'heading' );
		return;
	}

	$id = educationbooster_get_option( $args[ 'id' ] );

	if( !empty( $id ) ){

		$query = new WP_Query( array(
			'p' => $id,
			'post_type' => 'page'
		));

		while( $query->have_posts() ){
			$query->the_post();
			set_query_var( 'args', $args );
			get_template_part( 'template-parts/page/home', 'heading' );
		}
		wp_reset_postdata();
	}
}
endif;

if( ! function_exists( 'educationbooster_inner_banner' ) ):
/**
* Includes the template for inner banner
*
* @return void
* @since Education Booster 1.0.0
*/
function educationbooster_inner_banner(){

	$description = false;

	if( is_archive() ){

		# For all the archive Pages.
		$title       = get_the_archive_title();
		$description = get_the_archive_description();
	}else if( !is_front_page() && is_home() ){

		# For Blog Pages.
		$title = single_post_title( '', false );
	}else if( is_search() ){

		# For search Page.
		$title = esc_html__( 'Search Results for: ', 'education-booster' ) . get_search_query();
	}else if( is_front_page() && is_home() ){
		# If Latest posts page

		$title = esc_html__( 'Blog', 'education-booster' );
	}else{

		# For all the single Pages.
		$title = get_the_title();
	}

	$args = array(
		'title'       => educationbooster_remove_pipe( $title ),
		'description' => $description
	);

	set_query_var( 'args', $args );
	get_template_part( 'template-parts/inner', 'banner' );
}
endif;

if( !function_exists( 'educationbooster_testimonial_title' ) ):
/**
* Prints the title for testimonial in more attractive way
*
* @return void
* @since Education Booster 1.0.0
*/
function educationbooster_testimonial_title(){

	$title = str_replace( "\|", "&exception", get_the_title() );

	$arr = explode( '|', $title );

	echo '<span>' . str_replace( '&exception', '|', $arr[ 0 ] ) . '</span>' ;

	if( isset( $arr[ 1 ] ) ){
		echo '<p>' . esc_html( $arr[ 1 ] ) . '</p>';
	}
}
endif;

if( !function_exists( 'educationbooster_get_piped_title' ) ):
/**
* Returns the title and sub title from piped title
*
* @return array
* @since Education Booster 1.0.0
*/
function educationbooster_get_piped_title(){

	$title = str_replace( "\|", "&exception", get_the_title() );

	$arr = explode( '|', $title );
	$data = array(
		'title' => $arr[ 0 ],
		'sub_title'  => false
	);

	if( isset( $arr[ 1 ] ) ){
		$data[ 'sub_title' ] = trim( $arr[ 1 ] );
	}

	$data[ 'title' ] = str_replace( '&exception', '|', $arr[ 0 ] );
	return $data;
}
endif;

if( !function_exists( 'educationbooster_remove_pipe' ) ):
/**
* Removes Pipes from the title
*
* @return string
* @since Education Booster 1.0.0
*/
function educationbooster_remove_pipe( $title, $force = false ){

	if( $force || ( is_page() && !is_front_page() ) ){

		$title = str_replace( "\|", "&exception", $title );
		$arr = explode( '|', $title );

		$title = str_replace( '&exception', '|', $arr[ 0 ] );
	}

	return $title;
}
add_filter( 'the_title', 'educationbooster_remove_pipe',9999 );

endif;

function educationbooster_remove_title_pipe( $title ){
	$title[ 'title' ] = educationbooster_remove_pipe( $title[ 'title' ], true );
	return $title;
}
add_filter( 'document_title_parts', 'educationbooster_remove_title_pipe',9999 );

if( !function_exists( 'educationbooster_get_icon_by_post_format' ) ):
/**
* Gives a css class for post format icon
*
* @return string
* @since Education Booster 1.0.0
*/
function educationbooster_get_icon_by_post_format(){
	$icons = array(
		'standard' => 'kfi-pushpin-alt',
		'sticky'  => 'kfi-pushpin-alt',
		'aside'   => 'kfi-documents-alt',
		'image'   => 'kfi-image',
		'video'   => 'kfi-arrow-triangle-right-alt2',
		'quote'   => 'kfi-quotations-alt2',
		'link'    => 'kfi-link-alt',
		'gallery' => 'kfi-images',
		'status'  => 'kfi-comment-alt',
		'audio'   => 'kfi-volume-high-alt',
		'chat'    => 'kfi-chat-alt',
	);

	$format = get_post_format();
	if( empty( $format ) ){
		$format = 'standard';
	}

	return apply_filters( 'educationbooster_post_format_icon', $icons[ $format ] );
}
endif;

if( !function_exists( 'educationbooster_has_sidebar' ) ):

/**
* Check whether the page has sidebar or not.
*
* @see https://codex.wordpress.org/Conditional_Tags
* @since Education Booster 1.0.0
* @return bool Whether the page has sidebar or not.
*/
function educationbooster_has_sidebar(){

	if( is_page() || is_search() || is_single() ){
		return false;
	}

	return true;
}
endif;

if( !function_exists( 'educationbooster_is_search' ) ):
/**
* Conditional function for search page / jet pack supported
* @since Education Booster 1.0.0
* @return Bool 
*/
function educationbooster_is_search(){

	if( ( is_search() || ( isset( $_POST[ 'action' ] ) && $_POST[ 'action' ] == 'infinite_scroll'  && isset( $_POST[ 'query_args' ][ 's' ] ))) ){
		return true;
	}

	return false;
}
endif;

function educationbooster_post_class_modification( $classes ){

	# Add no thumbnail class when its search page
	if( educationbooster_is_search() && ( 'post' !== get_post_type() && !has_post_thumbnail() ) ){
		$classes[] = 'no-thumbnail';
	}
	return $classes;
}
add_filter( 'post_class', 'educationbooster_post_class_modification' );

require_once get_parent_theme_file_path( '/inc/setup.php' );
require_once get_parent_theme_file_path( '/inc/template-tags.php' );
require_once get_parent_theme_file_path( '/modules/loader.php' );

if( !function_exists( 'educationbooster_get_homepage_sections' ) ):
/**
* Returns the section name of homepage
* @since Education Booster 1.0.0
* @return array 
*/
function educationbooster_get_homepage_sections(){

	$arr = array(
		'slider',
		'services',
		'features',
		'about',
		'callback',
		'testimonials',
		'pricing-table',
		'blog'
	);

	return apply_filters( 'educationbooster_homepage_sections', $arr );
}
endif;