<?php
/**
 * Template part for displaying callback section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Education Booster 1.0.0
 */
if( ! educationbooster_get_option( 'disable_callback' ) ):

	$callback_page = educationbooster_get_option( 'callback_page' );

	if( !empty( $callback_page ) ):

		$query = new WP_Query( apply_filters( 'educationbooster_callback_args', array(
			'p'         => $callback_page,
			'post_type' => 'page'
		)));

		while( $query->have_posts() ):
			$query->the_post();
			$image = educationbooster_get_callback_banner_url();
		?>
			<style type="text/css">
				.block-callback{
					background-image: url(<?php echo esc_url( $image ); ?> );
				}
			</style>
			<!-- Callback Section -->
			<section class="wrapper block-callback block-search-callback banner-content">
				<div class="banner-overlay">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
								<?php
									educationbooster_section_heading( array(
										'divider' => false,
										'query'   => false
									));
								?>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-8 col-sm-offset-3 col-md-offset-2">
								<div id="search-form">
									<?php get_search_form(); ?>
								</div><!-- /#search-form -->
							</div>
						</div>
					</div>
				</div>
			</section><!-- End Callback Section -->
<?php
		endwhile;
		wp_reset_postdata();
	endif;
endif; 