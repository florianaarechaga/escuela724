<?php
/**
 * Template part for displaying features section
 *
 * @since Education Booster 1.0.0
 */
?>

<?php 
if( !educationbooster_get_option( 'disable_feature' ) ):

	$feature_ids = educationbooster_get_ids( 'feature_page' );
	if( !empty( $feature_ids ) && is_array( $feature_ids ) && count( $feature_ids ) > 0 ):

		$query = new WP_Query( apply_filters( 'educationbooster_features_args',  array( 
			'post_type'      => 'page',
			'post__in'       => $feature_ids, 
			'posts_per_page' => 3,
			'orderby'        => 'post__in'
		)));

		if( $query->have_posts() ):
	?>
			<!-- Feature Section -->
			<section class="wrapper block-grid block-feature">
				<?php 
					educationbooster_section_heading( array( 
						'id' => 'feature_main_page'
					));
				?>
				<div class="container">
					<div class="row">
			    		<?php
			    			$count = $query->post_count;
				    		while( $query->have_posts() ): 
				    			$query->the_post();

					    		$image = educationbooster_get_thumbnail_url( array(
					    			'size' => 'education-booster-390-320'
					    		));
				    	?>
				    			<div class="masonry-grid">
							    	<article class="post-content">
							    		<div class="post-thumb-outer">
	    										<div class="post-thumb">
	    					    					<img src="<?php echo esc_url( $image ); ?>">
								    		        <a href="<?php the_permalink(); ?>">
						    		                    <span class="icon-area">
						    		                        <span class="kfi kfi-link"></span>
						    		                    </span>
								    		        </a>
	    										</div>
							    		</div>
    									<div class="post-content-inner">
	    									<div class="post-title">
	    			    						<h3>
	    			    							<a href="<?php the_permalink(); ?>">
	    			    								<?php the_title();
	    			    								if( get_edit_post_link()){
	    													educationbooster_edit_link();
	    												}
	    			    								?>
	    			    							</a>
	    			    						</h3>
	    									</div>
    			    						<div class="text">
    			    							<?php 
    			    								educationbooster_excerpt( 25, true, '&hellip;' );
				    								if( get_edit_post_link()){
    													educationbooster_edit_link();
    												}
    			    							?>
    			    						</div>
    		    							<div class="button-container">
    		    								<a href="<?php the_permalink(); ?>" class="button-text">
    		    									<?php esc_html_e( 'Learn more', 'education-booster' ); ?>
    		    								</a>
    		    							</div>
    									</div>
							    	</article>
						    	</div>
						<?php  
							endwhile;
							wp_reset_postdata();
						?>
					</div>
				</div>
			</section> <!-- End Feature Section -->
	<?php
		endif; 
	endif; 
endif;
?>