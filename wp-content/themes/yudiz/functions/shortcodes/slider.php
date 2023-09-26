<?php

/************************ Shortcode for Slider ****************************/
function yspl_slider_shortcode($atts)
{
	ob_start();
	$args = array(
		'post_type' => "slider",
		'posts_per_page' => -1,
	);
	$the_query = new WP_Query($args);
	if ($the_query->have_posts()) :
?>
		<section class="main-banner" id="object-group">
			<div class="grid-line-container">
				<div class="row">
					<div class="col-xs-1 grid-line"></div>
					<div class="col-xs-1 grid-line"></div>
					<div class="col-xs-1 grid-line"></div>
					<div class="col-xs-1 grid-line"></div>
					<div class="col-xs-1 grid-line"></div>
					<div class="col-xs-1 grid-line"></div>
					<div class="col-xs-1 grid-line"></div>
					<div class="col-xs-1 grid-line"></div>
					<div class="col-xs-1 grid-line"></div>
					<div class="col-xs-1 grid-line"></div>
					<div class="col-xs-1 grid-line"></div>
					<div class="col-xs-1 grid-line"></div>
				</div>
			</div>
			<div class="obj obj3 rellax" data-rellax-speed="1"><span class="layer" data-depth="0.05"></span></div>
			<div class="obj obj4 rellax" data-rellax-speed="2"><span class="layer" data-depth="0.15"></span></div>
			<div class="obj obj7 rellax" data-rellax-speed="3"><span class="layer" data-depth="0.2"></span></div>
			<div class="obj obj8 rellax" data-rellax-speed="3"><span class="layer" data-depth="0.2"></span></div>
			<div class="obj obj9 rellax" data-rellax-speed="1"><span class="layer" data-depth="0.1"></span></div>
			<div class="banner-desc">
				<div class="hero-main-slider">
					<?php
					while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<?php
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
						?>
						<div class="slick-slide slick-current">
							<div class="slide-thumb">
								<img width="100%" height="100%" src="<?php echo $image[0] ?>" class="slick-lazy" alt="yudiz banner thumb" />
							</div>
							<div class="slide-box">
								<div class="main-title">
									<h2 class="h1"><?php echo get_the_title(); ?></h2>
								</div>
								<div class="main-content">
									<h6><?php echo strip_tags(get_the_content()); ?></h6>
								</div>
								<?php if (get_field('read_more_url')) { ?>
									<div class="readmore-link"><a href="<?php echo get_field("read_more_url"); ?>"><?php echo get_field("read_more_button_text"); ?></a></div>
								<?php } ?>
							</div>
						</div>
					<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
			<div class="obj obj1 rellax" data-rellax-speed="2"><span class="layer" data-depth="0.3"></span></div>
			<div class="obj obj2 rellax" data-rellax-speed="2"><span class="layer" data-depth="0.25"></span></div>
			<div class="obj obj5 rellax" data-rellax-speed="3"><span class="layer" data-depth="0.35"></span></div>
			<div class="obj obj10 rellax" data-rellax-speed="5"><span class="layer" data-depth="0.4"></span></div>
		</section>
<?php
	endif;
	$slider = ob_get_clean();
	return $slider;
}
add_shortcode('slider', 'yspl_slider_shortcode');
