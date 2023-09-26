<?php
/**
 * The template for displaying Portfolio content (Projects Page)
 *
 * @package Yudiz
 * @author Amitsinh Thakor
 * @since Yudiz 1.0
 */
get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
			<?php
			// Start the Loop.
			
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'post-template/content-archive-portfolio', get_post_format() );

				// End the loop.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php 
$content=get_post(562);
echo do_shortcode(apply_filters("the_content", $content->post_content));
postcontentcss($content->post_content);
get_footer(); ?>