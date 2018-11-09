<?php
/**
 * Template part for displaying slider section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Education Booster 1.0.0
 */

$slider_ids = educationbooster_get_ids( 'slider_page' );
if( !empty( $slider_ids ) && is_array( $slider_ids ) && count( $slider_ids ) > 0 ){
?>
	<section class="wrapper block-slider">

		<div class="controls">
		</div>
		<div class="owl-pager" id="kt-slide-pager"></div>

		<div class="home-slider owl-carousel">
			<?php
				$query = new WP_Query( apply_filters( 'educationbooster_slider_args', array(
					'posts_per_page' => 3,
					'post_type'      => 'page',
					'orderby'        => 'post__in',
					'post__in'       => $slider_ids,
				)));
				
				while ( $query->have_posts() ) :  $query->the_post();
					$image = educationbooster_get_thumbnail_url( array( 'size' => 'education-booster-1920-650' ) );
			?>
					<div class="slide-item" style="background-image: url( <?php echo esc_url( $image ); ?> );">
						<div class="banner-overlay">
					    	<div class="container">
					    		<div class="row">
					    			<div class="col-xs-10 col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
					    				<div class="slide-inner text-center">
					    					<div class="post-content-inner-wrap">
						    					<header class="post-title">
						    						<h2><?php the_title(); ?></h2>
						    					</header>
						    					<?php  
						    						educationbooster_excerpt( 16, true );
						    						if( get_edit_post_link()){
		    											educationbooster_edit_link();
		    										}
						    					?>
							    				<div class="button-container">
							    					<a href="<?php the_permalink(); ?>" class="button-primary button-round">
							    						<?php esc_html_e( 'Learn More', 'education-booster' ); ?>
							    					</a>
							    				</div>
						    				</div>
					    				</div>
					    			</div>
					    		</div>
					    	</div>
						</div>
					</div>
			<?php
				endwhile; 
				wp_reset_postdata(); 	
			?>
		</div>
		<div id="after-slider"></div>
	</section>
<?php 
}else {
	educationbooster_inner_banner();
}