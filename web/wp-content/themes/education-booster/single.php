<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @since Education Booster 1.0.0
 */
get_header();

# Print banner with breadcrumb and post title.
educationbooster_inner_banner();
?>
<section class="wrapper wrap-detail-page" id="main-content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
				<main id="main" class="post-main-content" role="main">
					<?php
						# Loop Start
						while( have_posts() ): the_post();

							# Print posts respect to the post format
							get_template_part( 'template-parts/page/content', get_post_format() );

							# Print the author details of this post
							get_template_part( 'template-parts/page/content', 'author-detail' );

							# If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							# Navigate the post. Next post and Previou post.
							the_post_navigation( array(
								'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post', 'education-booster' ) . '</span><span class="nav-title">%title</span>',
								'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post', 'education-booster' ) . '</span><span class="nav-title">%title</span>',
							) );

						# Loop End
						endwhile; 
					?>
				</main>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
