<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_Zone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php if(has_post_thumbnail()){ ?>
        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
          <?php the_post_thumbnail('education-zone-search-result'); ?>
        </a>
    <?php } ?>
    
    <div class="text">
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php education_zone_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'education-zone' ); ?></a>
	</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
