<?php
/**
 * Template part for displaying about us section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Education Booster 1.0.0
 */
if( !educationbooster_get_option( 'disable_about' ) ):
	$id = educationbooster_get_option( 'about_page' );
	if( $id ):
		$query = new WP_Query( apply_filters( 'educationbooster_about_page_args',  array( 
			'post_type'  => 'page', 
			'p'          => $id, 
		)));
		while( $query->have_posts() ): 
			$query->the_post();
			$image = educationbooster_get_thumbnail_url( array(
				'size' => 'full'
			));
	?>
	<!-- About Section -->
	<section class="wrapper block-about">
		<div class="thumb-block-outer">
			<div class="container">
				<div class="row">
					<?php
					$class = 'col-xs-12 col-sm-12 col-md-12';
						if( has_post_thumbnail() ):
							$class = 'col-xs-12 col-sm-12 col-md-6';
					?>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="area-div thumb-outer">
							<?php the_post_thumbnail( 'education-booster-570-380' ); ?>
						</div>
					</div>
					<?php endif; ?>
					<div class="<?php echo esc_attr( $class ); ?>">
						<div class="area-div content-outer">
							<div class="section-title-group">
								<h2 class="section-title">
									<?php the_title();
									 if( get_edit_post_link()){
										educationbooster_edit_link();
									}
									?>
								</h2>
							</div>
							<?php educationbooster_excerpt(30); ?>
							<div class="button-container">
								<a href="<?php the_permalink(); ?>" class="button-primary button-round">
									<?php esc_html_e( 'Register Now', 'education-booster' ); ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> <!-- End About Section -->
	<?php 
		endwhile;
		wp_reset_postdata();
	endif;
endif;
