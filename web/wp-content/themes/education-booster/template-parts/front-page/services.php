<?php
/**
 * Template part for displaying services section
 *
 * @since Education Booster 1.0.0
 */

if( !educationbooster_get_option( 'disable_service' ) ):

	$srvc_ids = educationbooster_get_ids( 'service_page' );
	if( !empty( $srvc_ids ) && is_array( $srvc_ids ) && count( $srvc_ids ) > 0 ):

		$query = new WP_Query( apply_filters( 'educationbooster_services_args',  array( 
			'post_type'      => 'page',
			'post__in'       => $srvc_ids, 
			'posts_per_page' => 3,
			'orderby'        => 'post__in'
		)));

		if( $query->have_posts() ):
?>
			<!-- Service Section -->
			<section class="wrapper block-service">
				<?php 
					educationbooster_section_heading( array( 
						'id' => 'service_main_page'
					));
				?>
				<div class="container">
					<div class="row">
			    		<?php
			    			$count = $query->post_count;
				    		while( $query->have_posts() ): 
				    			$query->the_post();
				    			$title = educationbooster_get_piped_title();
				    	?>
						    	<div class="col-xs-12 col-sm-6 col-md-4">
						    		<div class="icon-block-outer">
						    			<div class="post-content-inner">
						    				<div class="list-inner">
					    						<?php 
					    							$icon = $title[ 'sub_title' ] ;
					    							if( !empty( $icon ) ):
					    						?>
					    								<div class="icon-area">
					    									<span class="icon-outer">
					    										<a href="<?php the_permalink(); ?>">
					    											<span class="kfi <?php echo esc_attr( $icon ); ?>"></span>
					    										</a>
					    									</span>
					    								</div>
					    						<?php endif; ?>
												<div class="icon-content-area">
						    						<h3>
						    							<a href="<?php the_permalink(); ?>">
						    								<?php echo esc_html( $title[ 'title' ] ); ?>
						    							</a>
						    						</h3>
						    						<div class="text">
						    							<?php 
						    								educationbooster_excerpt( 20, true, '&hellip;' );
						    								if( get_edit_post_link()){
		    													educationbooster_edit_link();
		    												}
						    							?>
						    						</div>
					    							<div class="button-container">
					    								<a href="<?php the_permalink(); ?>" class="button-text">
					    									<?php esc_html_e( 'More', 'education-booster' ); ?>
					    								</a>
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
				</div>
			</section> <!-- End Service Section -->
<?php
		endif; 
	endif; 
endif;