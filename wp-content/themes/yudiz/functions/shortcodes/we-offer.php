<?php
function yspl_bp_we_offer_shortcode( $atts ) {
	ob_start();

	$args = array(
		'post_type' => 'we_offer',
		'posts_per_page' => -1
	);
	$loop = new WP_Query($args);
	if( $loop->have_posts() ):
		?>
		<ul class="list-inline we-offer">
			<?php
			while( $loop->have_posts() ): $loop->the_post();
				$id = get_the_ID();
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
				$thumb_alt = get_post_meta( get_post_thumbnail_id( $id ), '_wp_attachment_image_alt', true );
				?>
				<?php $link_data = get_field('service_link');?>
				<li>
					<a href="<?php echo get_permalink($link_data->ID);?>" class="slide-content">
						<div class="front">
							<figure>
								<img width="200px" height="200px" class="slick-lazy" src="<?php echo $image[0]; ?>" alt="<?php echo $thumb_alt;?>">
							</figure>
							<h5><?php echo get_the_title(); ?></h5>
						</div>
						
					</a>
				</li>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</ul>
		<?php
	endif;

	$we_offer = ob_get_clean();
	return $we_offer;
}
add_shortcode( 'we-offer', 'yspl_bp_we_offer_shortcode' );