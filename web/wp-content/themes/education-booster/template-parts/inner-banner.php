<?php
/**
* Template for Inner Banner Section for all the inner pages
*
* @since Education Booster 1.0.0
*/
?>

<section class="wrapper wrap-inner-banner" style="background-image: url('<?php header_image(); ?>')">
	<div class="container">
		<header class="page-header">
			<div class="inner-header-content">
				<h1 class="page-title"><?php echo esc_html( $args[ 'title' ] ); ?></h1>
				<?php if( $args[ 'description' ] ): ?>
					<div class="page-description">
						<?php echo esc_html( $args[ 'description' ] ); ?>
					</div>
				<?php endif; ?>
			</div>
		</header>
	</div>
	<?php 
		if( !is_front_page()){
			educationbooster_breadcrumb();
		}
	?>
</section>