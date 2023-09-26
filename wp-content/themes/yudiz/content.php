<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Yudiz
 * @author Amitsinh Thakor
 * @since Yudiz 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="sinlge-blog-banner">
		<div class="d-flex">
			<div class="col-sm-6 col-md-5 col-md-offset-1 common-section">
				<small><?php echo get_the_date("jS F Y")?></small>
				<?php
					if ( is_single() ) :
						the_title( '<h2 class="entry-title">', '</h2>' );
					else :
						the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif;
				?>
				<p style="color: <?php echo get_field('color');?>;"><?php echo get_the_category_list(', ','',get_the_ID()); ?></p>
				<p>Written By, <strong><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );  ?>"><?php the_author();?></a></strong></p>

			</div>
			<div class="col-sm-6 col-md-6 align-center text-center blog-topic-icon" style="background-color: <?php echo get_field('color');?>;">
				<?php if (get_field('icon')) { ?>
					<img src="<?php echo get_field('icon');?>" alt="yudiz-blog-icon" />
					<img class="watermark-icon" src="<?php echo get_field('icon');?>" alt="yudiz-blog-icon" />
				<?php
				}
					// Post thumbnail.
					// twentyfifteen_post_thumbnail();
				?>
			</div>
		</div>
	</div>
	<div class="entry-content">
		<?php
			if (is_single()) {
				?>
				<div class="blog-inner-page padding-80">
					<div class="container">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<div class="row d-flex">
									<div class="col-sm-8 col-md-9">
										<div class="blog-content">
											<?php the_content(); ?>		
											<div class="sharing-text text-center padding-80">
												<h5>Thanks for reading</h5>
												<p>Share via social media</p>
												<?php echo do_shortcode('[easy-social-share buttons="twitter,linkedin" counters=0 style="icon"]'); ?> 
											</div>	
											<div class="author-info">
												<div class="row-flex">
													<div class="author-image">
														<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>" style="background-image: url(<?php echo get_avatar_url(get_the_author_meta('ID')); ?>);"></a>
													</div>
													<div class="author-data">
														<p>Written By,</p>
														<div><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php echo get_the_author();?></a></div>
														<p>Web Developer at Yudiz Solutions Pvt. Ltd</p>
													</div>
												</div>
											</div>								
											<!-- Your embedded comments code -->
											<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="10" data-order-by="social" data-colorscheme="light"></div>
										</div>
									</div>
									<div class="col-sm-4 col-md-3 hidden-xs">
										<div class="sidebar"><?php dynamic_sidebar('sidebar-1'); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}else{
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'yudiz' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'yudiz' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'yudiz' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			}			
		?>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	 <!-- <footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php //edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer> --><!-- .entry-footer -->

</article><!-- #post-## -->
