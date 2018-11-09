<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Education Booster 1.0.0
 */
?>
<div class="masonry-grid">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content' ); ?>>
		<div class="post-thumb-outer">
			<?php

			$args = array(
				'size' => 'education-booster-390-320'
			);

			# Disabling dummy thumbnails when its in search page, also support for jetpack's infinite scroll
			if( 'post' != get_post_type() && educationbooster_is_search() ){
				$args[ 'dummy' ] = false;
			}

			educationbooster_post_thumbnail( $args ); 
			if( 'post' == get_post_type() ){
			?>	
					<div class="post-detail">
						<a href="<?php echo esc_url( educationbooster_get_day_link() ); ?>" class="date">
							<span class="day"><?php echo esc_html(get_the_time('d')); ?></span>
							<span class="monthyear">
								<p><?php echo esc_html(get_the_time('M')); ?></p>
							</span>
						</a>
					</div>
			<?php } ?>
		</div>

		<?php if( 'post' == get_post_type() ): ?>
			<div class="post-format-outer">
				<span class="post-format">
					<a href="<?php echo esc_url( get_post_format_link( get_post_format() ) ); ?>">
						<span class="kfi <?php echo esc_attr( educationbooster_get_icon_by_post_format() ); ?>"></span>
					</a>
				</span>
			</div>
		<?php endif; ?>

		<div class="post-content-inner">
		<?php
		if( 'post' == get_post_type() ):
			$cat = educationbooster_get_the_category();
			if( $cat ):
		?>
				<span class="cat">
					<?php
						$term_link = get_category_link( $cat[ 0 ]->term_id );
					?>
					<a href="<?php echo esc_url( $term_link ); ?>">
						<?php  echo esc_html( $cat[0]->name ); ?>
					</a>
				</span>
		<?php
			endif;
		endif;
		?>
			<header class="post-title">
				<h3>
					<a href="<?php the_permalink(); ?>">
						<?php echo educationbooster_remove_pipe( get_the_title(), true ); ?>
					</a>
				</h3>
			</header>
			<div class="post-text"><?php educationbooster_excerpt( 15, true, '&hellip;' ); ?></div>
			<div class="button-container">
				<a href="<?php the_permalink(); ?>" class="button-text">
					<?php esc_html_e( 'Read More', 'education-booster' ); ?>
				</a>
				<?php if( get_edit_post_link()){
					educationbooster_edit_link();
				} ?>
			</div>
		</div>
	</article>
</div>
