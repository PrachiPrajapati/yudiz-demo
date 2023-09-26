<?php
/**
 * The template for displaying Join Our Team Content (Carrer Page)
 *
 * @package Yudiz
 * @author Amitsinh Thakor
 * @since Yudiz 1.0
 */
get_header(); ?>

	<main id="main" class="site-main">
		<section id="primary" class="content-area">

		<?php if ( have_posts() ) : ?>
			<?php
			// Start the Loop.
			
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'post-template/content-archive-join-our-team', get_post_format() );

				// End the loop.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

	</section><!-- .content-area -->
</main><!-- .site-main -->

<?php 
get_footer(); ?>