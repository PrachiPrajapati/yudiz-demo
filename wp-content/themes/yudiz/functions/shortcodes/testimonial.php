<?php
function yspl_bp_testimonial_shortcode( $atts ) {
	ob_start();
	$args = array(
		'post_type' => 'testimonial',
		'posts_per_page' => -1,
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		?>
		<section class="testimonial-section common-section">
		    <article class="container">
		        <div class="row">
		            <div class="col-sm-10 col-sm-offset-1">
		                <ul>
							<?php while ($the_query->have_posts()) : $the_query->the_post();?>
								<?php
								$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
								?>
								<li>
								    <div class="testimonial-left-block">
								        <div class="left-block-inner">
								            <div class="img-holder wow fadeIn">
								                <div class="testimonial-img" style="background-image: url(<?php echo $image[0]?>);"></div>
								            </div>
								            <h5 class="wow fadeIn"><?php echo get_the_title();?></h5>
								            <p class="wow fadeIn"><?php echo get_field('designation');?></p>
								        </div>
								    </div>
								    <div class="testimonial-right-block">
								        <div class="content wow fadeIn">
								            <?php the_content();?>
								            <?php if(get_field('video_embedded_url_')) {?>
								            	<a href="<?php echo get_field('video_embedded_url_');?>"  data-fancybox="testimonial" data-caption="<?php echo get_the_title();?> - <?php echo get_field('designation');?>" class="play wow fadeIn"><span>Watch Video</span></a>
								            <?php } ?>
								        </div>
								    </div>
								</li>

							<?php endwhile;
							wp_reset_postdata();
							?>
		                </ul>
		            </div>
		        </div>
		    </article>
		</section>
		<?php
	endif;
	$testimonial = ob_get_clean();
    return $testimonial;
}
add_shortcode( 'testimonial', 'yspl_bp_testimonial_shortcode' );