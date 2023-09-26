<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $tid= get_the_ID();
	$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
	$background_color = get_field('main_banner_background_color');
	?>
	<div class="entry-content">
		<div class="padding-80 project-inner-banner" style="background-color: <?php if($background_color){ echo $background_color; } ?>">
			<div class="container">
				<div class="bg-section row align-center">
					<div class="col-sm-6 text-center mobile-bg">
						<?php //if($image[0]){ ?>
							<img src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-new.svg" data-lzy_src="<?php echo $image[0];?>" class="wow fadeIn yswp_lazy" alt="project-image">
						<?php// }?>
					</div>
					<div class="col-sm-6">
						<div class="padding-50">
							<h1 class="small wow fadeIn"><?php echo get_the_title(); ?></h1>
							<p class="wow fadeIn"><?php echo get_field("tag_line"); ?></p>
							<div class="row project-info">
								<?php if (get_field('project_related_to')) {
									?>
									<div class="col-sm-5">
										<h6 class="wow fadeIn">Project</h6>
										<p class="wow fadeIn">- <?php echo get_field("project_related_to"); ?></p>
									</div>
									<?php
								}?>
								<?php if (get_field('platform')) {
									?>
									<div class="col-sm-6">
										<h6 class="wow fadeIn">Platform</h6>
										<p class="wow fadeIn">- <?php echo get_field("platform"); ?></p>
									</div>
									<?php
								}?>
							</div>
							
							<?php if (get_field('technologies')) {
								?>
								<div class="proj-tech">
									<h6 class="wow fadeIn">Technologies</h6>
									<p class="wow fadeIn">- <?php echo get_field("technologies"); ?></p>
								</div>
								<?php
							}?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="portfolio-content">
			<div class="container data-to-paste">
				<?php the_content(); ?>
			</div>
			<?php
			$terms = get_the_terms( get_the_ID(), 'portfolio_categories' );
			$args = array(
				'post_type' => 'portfolio',
				'posts_per_page' => 2,
				'orderby'=>'rand',
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio_categories',
						'field'    => 'slug',
						'terms'    => $terms[0]->slug,
					),
				),
				'post__not_in' => array( get_the_ID() )
			);
			$loop = new WP_Query($args);
			if( $loop->have_posts() ):
				?>
				<div class="common-section other-projects">
					<div class="container">
						<h4>You may also like</h4>
			            <ul class="project-list row">
							<?php
							while( $loop->have_posts() ) : $loop->the_post();
								$id = get_the_ID();
								$project_watermark_img = get_field('project_watermark_icon');
								$project_icon_img = get_field('project_icon');
								?>
				                <li class="col-sm-6">
				                    <div class="project-list-box" style="background-image: url(<?php echo $project_watermark_img; ?>);">
				                        <a href="<?php echo get_the_permalink(); ?>" class="project-icon hide-content-text" style="background-color: <?php echo get_field('main_banner_background_color'); ?>; background-image: url(<?php echo $project_icon_img; ?>);"><?php echo get_the_title(); ?></a>
				                        <div class="project-desc">
				                            <div>
				                                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?>
				                                </a>
				                                <small>
			                                	    <?php 
			                                	    $project_terms = get_the_terms($id, 'portfolio_categories');
			                                	    $last_element = end($project_terms);
			                                	    foreach ($project_terms as $key => $value) {
			                                	    	echo $value->name;
			                                	    	if($value->name == $last_element->name){
			                                	    		echo '';
			                                	    	}else{
			                                	    		echo ', ';
			                                	    	}
			                                		}
			                                		?>
				                                </small>
				                            </div>
				                            <a class="hide-content-text" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
				                        </div>
				                    </div>
				                </li>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
			            </ul>
			            <div class="theme-btn bordered-blue"><a href="<?php echo home_url().'/portfolio'; ?>">All Projects</a></div>
			        </div>
		    	</div>
				<?php
			endif;
			?>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
<script>
	jQuery(function() {
	  	jQuery('li#responsive-menu-item-16483').addClass('responsive-menu-current-item');
	});
</script>
