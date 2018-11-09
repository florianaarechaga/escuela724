<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education Zone
 */

get_header(); 

    $enabled_sections = education_zone_get_sections();  
   
    foreach( $enabled_sections as $section ){ ?>
    
        <section class="<?php echo esc_attr( $section['class'] ); ?>" id="<?php echo esc_attr( $section['id'] ); ?>">
            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
        </section>
    
    <?php
    }

get_footer(); 