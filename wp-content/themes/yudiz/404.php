<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Yudiz
 * @author Pathiv Butani, Priya Patel
 * @since Yudiz 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found text-center" id="page404">

				<div class="page-content">
					<h1><?php _e( 'Page Not Found', 'not-found' ); ?></h1>
					<p><?php _e( 'We are searching even out of space :)' , 'not-found'); ?></p>
					<ul class="">
						<li class="layer" data-depth="0.1"><img src="<?php echo get_template_directory_uri(); ?>/images/4.png" alt="4" class="img-responsive"></li>
						<li class="layer" data-depth="0.2"><img src="<?php echo get_template_directory_uri(); ?>/images/0.png" alt="0" class="img-responsive"></li>
						<li class="layer" data-depth="0.1"><img src="<?php echo get_template_directory_uri(); ?>/images/4.png" alt="4" class="img-responsive"></li>
					</ul>
					<div class="globe"></div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php wp_footer(); ?>
<script>
	var scene = document.getElementById('page404');
	var parallax = new Parallax(scene);
</script>