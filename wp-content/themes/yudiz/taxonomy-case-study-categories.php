<?php get_header(); ?>

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
				get_template_part( 'post-template/content-taxonomy-case-study-categories', get_post_format() );

				// End the loop.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</section><!-- .content-area -->
	</main><!-- .site-main -->
<script>
	jQuery(function() {
	  	jQuery('li#responsive-menu-item-16485').addClass('responsive-menu-current-item');
	});
</script>
<?php 
get_footer(); ?>