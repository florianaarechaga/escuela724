<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Zone
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
    <div id="page" class="site">
        <header id="masthead" class="site-header header-two" role="banner">
            <?php 
                $ed_social_link = get_theme_mod( 'education_zone_ed_social' ); 
                $phone          = get_theme_mod( 'education_zone_phone' );
                $email          = get_theme_mod( 'education_zone_email' );
                $address        = get_theme_mod( 'school_zone_header_address' );
                $cta_lebel      = get_theme_mod( 'school_zone_header_cta_label', '' );
                $cta_links      = get_theme_mod( 'school_zone_header_cta_link' );
            ?>
            <div class="header-holder">
                <?php 
                if( has_nav_menu( 'secondary' ) || $ed_social_link ){ ?>
                    <div class="header-top">
                        <div class="container">
                            <div class="top-links">
                                <?php 
                                if( has_nav_menu( 'secondary' ) ){ ?>
                                    <div id="mobile-header-2">
                                        <a id="responsive-btn-child" href="#sidr-secondary-child"><i class="fa fa-bars"></i></a>
                                    </div>
                                    <nav id="top-navigation" class="secondary-nav" role="navigation">                  
                                        <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'fallback_cb' => false ) ); ?>
                                    </nav><!-- #site-navigation -->
                                <?php 
                                } ?>
                            </div>
                            <?php if( $ed_social_link ) do_action('education_zone_social'); ?>
                        </div>
                    </div>
                <?php 
                } ?>
                <div class="header-m">
                    <div class="container">
                        <div class="site-branding">
                            <?php 
                                if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                                    the_custom_logo();
                                } 
                            ?>
                            <div class="text-logo">

                                <?php if ( is_front_page() ) : ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php 
                                else : ?>
                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></p>
                                <?php endif; 

                                    $description = get_bloginfo( 'description', 'display' );
                                    if ( $description || is_customize_preview() ) : ?>
                                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                                <?php
                                    endif; 
                                ?> 
                            </div><!-- .text-logo -->                   
                        </div><!-- .site-branding -->
                        <?php if( $cta_lebel && $cta_links ): ?>
                        <a href="<?php echo esc_url( $cta_links ); ?>" class="apply-btn"><?php echo esc_html( $cta_lebel ); ?></a>
                        <?php
                        endif; 
                        if( $address ){ ?>
                            <div class="info-box">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span class="header-address"><?php echo esc_html( $address ); ?></span>
                            </div>

                        <?php
                        } 
                        if( $email || $phone ){ ?>
                            <div class="info-box"> 
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                <?php 
                                    if( $phone ){
                                        echo '<a class="header-phone" href="'. esc_url( 'tel:'. preg_replace('/\D/', '', $phone) ) .'">'. esc_html( $phone ) .'</a>';
                                    }

                                    if( $email ){
                                        echo ' <a class="header-email" href="'. esc_url( 'mailto:'. sanitize_email( $email ) ) .'">'. esc_html( $email ) .'</a>';
                                    }
                                ?>
                                </span>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="sticky-holder"></div>  
            <div class="header-bottom">
                <div class="container">

                    <?php school_zone_primary_nav(); ?>
                    
                    <div class="form-section">
                    <a href="#" id="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <div class="example">                       
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </header>
    <?php do_action( 'education_zone_page_header' );

    $enabled_sections = school_zone_get_sections();  

    if( is_home() || ! $enabled_sections || ! ( is_front_page()  || is_page_template( 'template-home.php' ) ) ){ 
        $class = is_404() ? 'not-found' : 'row' ;    
        ?>
        <div id="content" class="site-content">
            <div class="container">
                <div class="<?php echo esc_attr( $class ); ?>">
    <?php } 
