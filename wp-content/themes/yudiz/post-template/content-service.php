<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
		$sid = get_the_ID();
		$args = array(
			'post_type' => "services",
			'posts_per_page' => -1,
		);
		$the_query = new WP_Query($args);
		if($the_query->have_posts()):?>
			<div class="service-side-list">
				<ul class="hidden-xs">
					<?php while ($the_query->have_posts()) : $the_query->the_post(); 
						$show_in_navigation_menu = get_field('show_in_navigation_menu');
						if($show_in_navigation_menu == 'yes'){
						$categories = get_the_terms(get_the_ID(),'portfolio_categories');
						$terms = get_field('projects_category', get_the_ID());
						$terms_name = get_term_by( 'id', $terms, 'portfolio_categories');
					?>						
						<li class="<?php if($sid == get_the_ID() ) { echo "active" ;} ?> wow fadeIn"><a href="<?php echo get_the_permalink();?>"><img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo get_field("icon");?>" alt="<?php echo $terms_name->name;?>"><span><?php echo $terms_name->name; ?></span></a></li>
					<?php } endwhile; wp_reset_postdata(); ?>
				</ul>
				<div class="visible-xs">
					<div class="filter-select">
						<form>
				            <select class="wow fadeIn">
				            	<?php while ($the_query->have_posts()) : $the_query->the_post(); 
									$categories = get_the_terms(get_the_ID(),'portfolio_categories');
									$terms = get_field('projects_category', get_the_ID());
									$terms_name = get_term_by( 'id', $terms, 'portfolio_categories');
								?>	
				                <option value="<?php echo get_the_permalink();?>"><?php echo get_the_title(); ?></option>
				                <?php endwhile; wp_reset_postdata(); ?>
				            </select>
				        </form>
			        </div>
		        </div>
			</div>
		<?php endif ;?>		
		<div class="common-section-small service_desc_section">
			<div class="container">
				<div class="row align-center">
					<div class="col-sm-6 col-md-5 col-md-offset-1">
						<div>
							<?php
							$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
							?>
							<div class="service-title wow fadeIn hidden-xs"><h1><span><img src="<?php echo get_field("icon");?>" alt="yudiz service"/></span><?php the_title();?></h1></div>
							
							<div class="wow fadeIn"><?php the_field("short_description")?></div>
						</div>
						<div class="theme-btn solid-blue wow fadeIn">
							<a href="javascript:void(0);" class="down-scroll-btn">
								<svg width="24px" height="15px" viewBox="0 0 24 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								    <!-- Generator: Sketch 58 (84663) - https://sketch.com -->
								    <title>Path 7</title>
								    <desc>Created with Sketch.</desc>
								    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								        <g id="scroll-icon" transform="translate(-327.000000, -673.000000)" stroke-width="3.33333333">
								            <g id="Group-44" transform="translate(0.000000, 119.000000)">
								                <g id="Group-33" transform="translate(311.000000, 118.000000)">
								                    <g id="Group-3-Copy" transform="translate(0.000000, 415.000000)">
								                        <polyline id="Path-7" transform="translate(28.000000, 28.000000) rotate(90.000000) translate(-28.000000, -28.000000) " points="23 18 33 28 23 38"></polyline>
								                    </g>
								                </g>
								            </g>
								        </g>
								    </g>
								</svg>
							</a>
							<a href="<?php echo get_the_permalink(157);?>">Get a Quote</a>
						</div>
					</div>
					<div class="col-sm-6 text-center service-banner-img">
						<div class="service-title wow fadeIn test visible-xs"><blockquote class="text-left"><span><img src="<?php echo get_field("icon");?>" alt="yudiz service"/></span><?php the_title();?></blockquote></div>
						<?php if (get_field('banner_animation_id')) { ?>
							<div id="<?php echo get_field("banner_animation_id")?>" class="scroll-anim <?php echo get_field("banner_animation_id")?>"></div>
						<?php } else {?>
							<img class="wow fadeIn yswp_lazy"  src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $image[0]?>" alt="yudiz-mobile-service" />
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<div id="intro"></div>
		<div class="container data-to-paste">
				
				<?php the_content(); ?>
			<script>
				jQuery(document).ready(function () {
					var allPanels = jQuery('.accordion > dd').hide();
					jQuery('.accordion > dd.active').show();
					jQuery('.accordion > dt a').click(function() {
						$this = jQuery(this);
						jQuery('.accordion > dt').removeClass('current');
						$this.parent().parent().addClass('current');
						$target = $this.parent().parent().next();
						if (!$target.hasClass('active')) {
							allPanels.removeClass('active').slideUp();
							$target.addClass('active').slideDown();
						}
						return false;
					});
					/* our projects slider */
					jQuery('.our-project-slider').slick({
						dots: false,
						infinite: true,
						arrows: true,
						fade: false,
						autoplay: false,
						speed: 1000,
						slidesToShow: 5,
						slidesToScroll: 1,
						centerMode: true,
						centerPadding: '0px',
						responsive: [{
								breakpoint: 992,
								settings: {
									slidesToShow: 3,
									slidesToScroll: 1,
								}
							},
							{
								breakpoint: 767,
								settings: {
									slidesToShow: 1,
									slidesToScroll: 1,
								}
							}
						]
					});
				});
			</script>
		</div>
			<?php
			// $terms = get_the_terms( get_the_ID(), 'portfolio_categories' );
			$terms = get_field('projects_category', get_the_ID());
			$args = array(
				'post_type' => 'portfolio',
				'posts_per_page' => 2,
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio_categories',
						'field'    => 'ID',
						'terms'    => $terms,
					),
				),
			);
			$loop = new WP_Query($args);
			if( $loop->have_posts() ):
				?>
				<div class="common-section other-projects project-listing">
					<div class="container">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<!-- <div class="service-title wow fadeIn"><h4><?php //echo get_the_title($sid).' Projects'; ?></h4></div> -->
								<div class="service-title wow fadeIn"><h4>Related Projects</h4></div>
							    <ul class="project-list row">
										<?php
										while( $loop->have_posts() ) : $loop->the_post();
											$id = get_the_ID();
											$project_watermark_img = get_field('project_watermark_icon');
											$project_icon_img = get_field('project_icon');
											?>
									        <li class="col-sm-6">
									            <div class="project-list-box wow fadeIn" style="background-image: url(<?php echo $project_watermark_img; ?>);">
									                <div class="project-icon" style="background-color: <?php echo get_field('main_banner_background_color'); ?>; background-image: url(<?php echo $project_icon_img; ?>);"></div>
									                <div class="project-desc">
									                    <div>
									                        <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
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
							    <div class="theme-btn bordered-blue"><a data-href="<?php echo site_url();?>/portfolio">Find More</a></div>
							</div>
						</div>
					</div>
				</div>
				<?php
			endif;
			?>
		
	</div><!-- .entry-content -->

</article><!-- #post-## -->
<div class="secondary-bg">
	<?php
	$content=get_post(562);
	echo do_shortcode(apply_filters("the_content", $content->post_content));
	postcontentcss($content->post_content);		
	?>
</div>