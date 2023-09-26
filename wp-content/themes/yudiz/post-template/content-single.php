<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="sinlge-blog-banner">
		<div class="d-flex">
			<div class="col-sm-6 col-md-5 col-md-offset-1 common-section">
				<small><?php echo get_the_date("jS M Y")?></small>
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
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' ); ?>
			<div class="col-sm-6 col-md-6 align-center text-center blog-topic-icon" style="background: url('<?php echo $image[0];?>') no-repeat center center / cover;">
				<?php if (get_field('icon')) { ?>
					<span class="watermark-icon" style="background: <?php echo get_field('color');?> url(<?php echo get_field('icon');?>) no-repeat center center / auto 70%;"></span>
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
												<h5 class="wow fadeIn">Thanks for reading</h5>
												<p class="wow fadeIn">Share via social media</p>
												<div class="wow fadeIn"><?php echo do_shortcode('[easy-social-share buttons="facebook,twitter,linkedin" counters=0 style="icon"]'); ?></div>
											</div>	
											<div class="author-info wow fadeIn">
												<div class="row-flex">
													<div class="author-image">
														<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>" style="background-image: url(<?php echo get_avatar_url(get_the_author_meta('ID')); ?>);"></a>
													</div>
													<div class="author-data">
														<p>Written By,</p>
														<div><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php echo get_the_author();?></a></div>
														<p><?php echo get_the_author_meta('designation'); if(get_the_author_meta('designation') != ""){?> at Yudiz Solutions Pvt. Ltd <?php }?></p>
													</div>
												</div>
											</div>								
											<!-- Your embedded comments code -->
											<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="10" data-order-by="social" data-colorscheme="light"></div>
										</div>
									</div>
									<div class="col-sm-4 col-md-3 hidden-xs">
										<div class="sidebar wow fadeIn"><?php dynamic_sidebar('sidebar-1'); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 3,
						'post__not_in' => array(get_the_ID()),
						'tax_query' =>  array(
							array(
								'taxonomy' => 'category',
								'field'    => 'slug',
								'terms'    => get_the_category()[0]->slug,
							),
						),
					);
					$loop = new WP_Query($args);
					if( $loop->have_posts() ) :
					?>
						<div class="blog-list-page related-blog">
							<div class="container">
								<h4 class="bold wow fadeIn">You may also like</h4>
								<div class="row">
									<?php
									while ( $loop->have_posts() ) : $loop->the_post(); 
										?>										
										<?php
										$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
										?>
									    <div class="col-sm-6 col-md-4">
									    	<div class="blog-item-box wow fadeIn">
									    		<span style="background: <?php echo get_field('color') ?>;"></span>
									    		<div class="blog-box-desc">
									    			<div class="blog-box-author">
														<small><a class="blog-author-thumb" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );  ?>" style="background: url('<?php echo get_avatar_url(get_the_author_meta('ID')); ?>') no-repeat center center / cover;"></a> By, <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );  ?>"><?php the_author();?></a></small>
									    			</div>
									    			<div class="blog-box-info">
									    				<h4>
									    					<a href="<?php the_permalink(); ?>">
										    					<?php 
										    					if( strlen(get_the_title()) > 100 ) {
																	echo substr(get_the_title(), 0, 85).'...';
																} else {
																	echo get_the_title();
																}
										    					?>
										    						
									    					</a>
									    				</h4>
									    				<small><?php echo contentLimit(get_the_title(), get_the_excerpt())?></small>
									    				<a href="<?php the_permalink(); ?>">
									    					<img src="<?php echo $image[0];?>" alt="<?php echo get_the_title(); ?>"/>
									    				</a>
									    			</div>
									    		</div>
									    		<div class="blog-box-footer">
									    			<small class="blog-box-category">
									    				<?php
									    				$blog_category = get_the_category(); $i = 1;
									    				foreach ($blog_category as $key => $value){
									    					if($i == 3){
									    					?>
										    				<span>+<?php echo count($blog_category) - 2; ?>
											    				<ul>
									    						<?php 
									    						}
									    						?>
									    						<?php if($i <= 2){ ?>
										    						<?php if($i > 1){ echo ','; }else{ echo ''; } ?>
										    						<a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name; ?></a><?php
										    					}elseif($i > 2){ ?>
							    									<li> 
											    						<a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name; ?></a>
										    						</li>
									    							<?php 
									    						} 
									    						if($i == count($blog_category)){ ?>
											    				</ul>
										    				</span>
									    					<?php }
									    					$i++;
									    				}
									    				?>
									    			</small>
									    			<small class="blog-box-date"><?php echo get_the_date("jS F Y")?></small>
									    		</div>
									    	</div>
									    </div>

										<?php
									endwhile;
									wp_reset_postdata();
									?>
								</div>
							</div>
						</div>
					<?php
				endif;
				?></div><?php
			}else{
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'twentyfifteen' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
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
