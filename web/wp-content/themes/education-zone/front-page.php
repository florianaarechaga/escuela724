<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business One Page
 */

    $enabled_sections = education_zone_get_sections();  

get_header(); 
            
    if ( 'posts' == get_option( 'show_on_front' ) ) {

        include( get_home_template() );

    }elseif( $enabled_sections ){ 

        foreach( $enabled_sections as $section ){ ?>
    
            <section class="<?php echo esc_attr( $section['class'] ); ?>" id="<?php echo esc_attr( $section['id'] ); ?>">
                <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
            </section>
        
    <?php
        }
        
    }else {

        include( get_page_template() );

    }
                  
get_footer();