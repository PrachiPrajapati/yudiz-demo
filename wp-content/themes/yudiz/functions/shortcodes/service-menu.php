<?php
/************************ Shortcode for Service Menu ****************************/
function yspl_service_menu_shortcode( $atts ) {
	ob_start();
	$pageID = get_the_ID();
	$args = array(
		'post_type' => "page",
		'posts_per_page' => -1,
	);
	$the_query = new WP_Query($args);
	$loading_img = get_stylesheet_directory_uri() . "/images/loader-new.svg";
	
	if($the_query->have_posts()):?>
		<div class="sub-menu-wrapper">
			<ul>
				<?php while ($the_query->have_posts()) : $the_query->the_post(); 
					if ($pageID == get_the_ID()) {
						$active = "current-menu-item";
					} else {
						$active = "";
					}
					$show_in_navigation_menu = get_field('show_in_navigation_menu');
					if($show_in_navigation_menu == 'yes'){
					?>
					<li class="service-menu-item <?php echo $active;?>">
						<a href="<?php echo get_the_permalink();?>">
							<p class="menu-item-icon">
								<img width="100%" height="100%" class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo get_field("icon");?>" alt="<?php echo get_the_title();?>" />
							</p>
							<p class="menu-item-desc">
								<?php // for title
								$service_template = get_field("service_template");
								$banner_fields = $service_template["banner_fields"];?>
								<span><?php echo $banner_fields["title"]; ?></span>
								<?php
									if( have_rows('technology') ): ?>
									<small>
										<?php 
										$i = 1;
										while ( have_rows('technology') ) : the_row(); ?>
									        <?php 
									        $titleCount = count(get_field('technology'));
									        $seprator = '';
									        if ($i < $titleCount) {
									        	$seprator = ', ';
									        }
									        echo get_sub_field('title').$seprator; 

									        ?>
									    <?php $i++; endwhile;?>
								    </small>
								<?php endif; ?>
							</p>
						</a>
					</li>
				<?php }
						endwhile; wp_reset_postdata(); ?>
			</ul>
		</div>
	<?php endif ;?>
	
	<?php
	$slider = ob_get_clean();
    return $slider;
}
add_shortcode( 'service-menu', 'yspl_service_menu_shortcode' );