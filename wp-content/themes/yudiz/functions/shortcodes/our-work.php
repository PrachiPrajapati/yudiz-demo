<?php
/************************ Shortcode for our work ****************************/

function yspl_ow_our_work_shortcode( $atts ){
	$atts = shortcode_atts( array(
		'type' => 'our_work_post',
		'display' =>	5,
		'title' => 'Our work',
		'sub-title' => 'things we are proud of',
		'ids' => '',
		'category' => ''
	), $atts, 'yudiz' );
	ob_start();
	$display = ($atts['display'] != '' ? $atts['display'] : 5); // returns true
	$type = ($atts['type'] != '' ? $atts['type'] : "our_work_post"); // returns true
	$title = ($atts['title'] != '' ? $atts['title'] : "Our work"); // returns true
	$sub_title = ($atts['sub-title'] != '' ? $atts['sub-title'] : "things we are proud of"); // returns true
	$ids = ($atts['ids'] != '' ? $atts['ids'] : ""); 
	$category = ($atts['category'] != '' ? $atts['category'] : ""); 
	$args = array(
		'post_type' => $type,
		'posts_per_page' => $display,
	);
	if($ids != ''){
		$args['post__in'] = explode(',',$ids);
	}
	if($category != ''){
		$args['our_work_categories'] = $category;
	}
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):?>
		<div class="common-section home-work-slider-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="row">
							<div class="col-sm-8">
								<h6><?php echo $sub_title; ?></h6>
								<h2><?php echo $title; ?></h2>
							</div>
							<div class="col-sm-4 theme-btn bordered-blue text-right">
								<a class="sdf" href="<?php echo site_url()?>/portfolio">See our Work</a>
							</div>
						</div>
						<div class="custom-saperator"></div>
						<div class="work-slider">
							<?php while ($the_query->have_posts()) : $the_query->the_post();?>
							<div>
								<div style="background: <?php echo get_field('background_color'); ?>;">
									<div class="col-sm-6 work-featured" media="(min-width: 768px)">
										<img  width="100%" height="100%" src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg" data-lzy_src="<?php echo get_field('home_page_work_feature_image'); ?>" class="yswp_lazy" alt=""/>
									</div>
									<div class="col-sm-6 col-lg-5">
										<div class="work-slide-desc">
											<div class="work-logo">
												<!-- <picture>
													<source srcset="<?php //echo get_field('work_logo'); ?>">  -->
													<img width="100%" height="100%" src="https://www.yudiz.com/wp-content/themes/yudiz/images/loader-img.svg" data-lzy_src="<?php echo get_field('work_logo'); ?>" class="yswp_lazy" alt=""/>
												<!-- </picture> -->
											</div>
											<h4><?php echo wp_trim_words(get_the_title(),10); ?></h4>
											<p class="tech-list"><?php echo strip_tags ( get_the_term_list( get_the_ID(), 'our_work_categories', ' ',', ')); ?></p>
											<p><?php echo wp_trim_words(get_the_content(),20); ?></p>
											<a class="hide-content-text" href="<?php echo get_field('portfolio_url'); ?>"><?php echo wp_trim_words(get_the_title(),10); ?></a>
										</div>
									</div>
								</div>
							</div>
							<?php
							endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	endif;

	return ob_get_clean();

}
add_shortcode( 'our-work', 'yspl_ow_our_work_shortcode' );