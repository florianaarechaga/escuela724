<?php
/**
 * Education Zone functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Education_Zone
 */

//define theme version
if ( !defined( 'EDUCATION_ZONE_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();
	
	define ( 'EDUCATION_ZONE_THEME_VERSION', $theme_data->get( 'Version' ) );
}

if ( ! function_exists( 'education_zone_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function education_zone_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Education Zone, use a find and replace
	 * to change 'education-zone' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'education-zone', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary', 'education-zone' ),
		'secondary' => esc_html__( 'Secondary', 'education-zone' ),		
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array( 'image', 'link', 'aside', 'status' ) );



	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'education_zone_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    /* Custom Logo */
    add_theme_support( 'custom-logo', array(    	
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );
    
    //Custom Image Sizes
    add_image_size( 'education-zone-banner', 1920, 692, true);
    add_image_size( 'education-zone-image-full', 1140, 458, true);
    add_image_size( 'education-zone-image', 750, 458, true);
    add_image_size( 'education-zone-recent-post', 70, 70, true);
    add_image_size( 'education-zone-search-result', 246, 246, true);
    add_image_size( 'education-zone-featured-course', 276, 276, true);
    add_image_size( 'education-zone-testimonial', 125, 125, true);
    add_image_size( 'education-zone-blog-full', 848, 480, true);
    add_image_size( 'education-zone-schema', 600, 60, true);
    
}
endif;
add_action( 'after_setup_theme', 'education_zone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function education_zone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'education_zone_content_width', 750 );
}
add_action( 'after_setup_theme', 'education_zone_content_width', 0 );

/**
* Adjust content_width value according to template.
*
* @return void
*/
function education_zone_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = education_zone_sidebar_layout_class();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1140;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1140;
	}

}
add_action( 'template_redirect', 'education_zone_template_redirect_content_width' );

/**
 * Query WooCommerce activation
 */
function education_zone_is_woocommerce_activated() {
    return class_exists( 'woocommerce' ) ? true : false;
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function education_zone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'education-zone' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'education-zone' ),
		'id'            => 'footer-one',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'education-zone' ),
		'id'            => 'footer-two',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'education-zone' ),
		'id'            => 'footer-three',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'education_zone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function education_zone_scripts() {
	
    $query_args = array(
		'family' => 'Roboto:400,700|Lato:400,900,700',
		);
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/css' . $build . '/font-awesome' . $suffix . '.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css' . $build . '/owl.carousel' . $suffix . '.css' );
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri(). '/css' . $build . '/owl.theme.default' . $suffix . '.css' );
    wp_enqueue_style( 'jquery-sidr-light', get_template_directory_uri(). '/css' . $build . '/jquery.sidr.light' . $suffix . '.css' );    
    wp_enqueue_style( 'education-zone-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
    wp_enqueue_style( 'education-zone-style', get_stylesheet_uri(), array(), EDUCATION_ZONE_THEME_VERSION );
    
    if( education_zone_is_woocommerce_activated() )
    wp_enqueue_style( 'education-zone-woocommerce-style', get_template_directory_uri(). '/css' . $build . '/woocommerce' . $suffix . '.css', EDUCATION_ZONE_THEME_VERSION );
  
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array('jquery'), '2.2.1', true );
    wp_enqueue_script( 'jquery-sidr', get_template_directory_uri() . '/js' . $build . '/jquery.sidr' . $suffix . '.js', array('jquery'), '2.6.0', true );
	wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/js' . $build . '/waypoint' . $suffix . '.js', array('jquery'), '2.0.3', true );
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/js' . $build . '/jquery.counterup' . $suffix . '.js', array('jquery', 'waypoint'), '1.0', true );
	
	wp_register_script( 'education-zone-custom', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array('jquery'), EDUCATION_ZONE_THEME_VERSION, true );
    
	$custom_array = array('rtl' => is_rtl(), );
	
	wp_localize_script( 'education-zone-custom', 'education_zone_data', $custom_array );
	wp_enqueue_script( 'education-zone-custom' );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'education_zone_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom functions for meta box.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Recent Post Widget.
*/ 
require get_template_directory() . '/inc/widget-recent-post.php';

/**
 * Popular Post Widget.
*/ 
require get_template_directory() . '/inc/widget-popular-post.php';

/**
 * Social Links Widget.
*/ 
require get_template_directory() . '/inc/widget-social-links.php';

/**
 * Info Section
 */
require get_template_directory() . '/inc/info.php';

/**
 * WooCommerce Related funcitons
*/
if( education_zone_is_woocommerce_activated() )
require get_template_directory() . '/inc/woocommerce-functions.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

