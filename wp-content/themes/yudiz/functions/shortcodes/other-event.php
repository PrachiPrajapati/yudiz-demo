<?php
function yspl_bp_other_event_shortcode( $atts ) {
	ob_start();
	$args = array(
		'post_type' => 'otherevents',
		'posts_per_page' => -1,
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		?>
		<div class="awards-slider">
			<?php while ($the_query->have_posts()) : $the_query->the_post();?>
				<?php
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
				?>
				<div>
			        <h6><?php echo get_field('other_event_month'); ?></h6>
			        <blockquote>
			        	<?php echo get_the_title();?>
			        	<a data-fancybox="other-events-<?php echo get_the_ID()?>" href="<?php echo $image[0];?>">
			        		<span>
			        			<img class="slick-lazy" src="<?php echo $image[0];?>" alt="<?php echo get_the_title();?> Other Event" />
					        </span>
			        	</a>
			        </blockquote>
		        	<div class="hidden">
		        		<?php $gallary = get_field('other_event_images');?>
		        		<?php
		        		foreach ($gallary as $gallaryKey => $gallaryValue) {
		        			# code...
			        		?>
			        		<a data-fancybox="other-events-<?php echo get_the_ID()?>" href="<?php echo $gallaryValue;?>"> <img class="slick-lazy" data-lazy="<?php echo $gallaryValue;?>" alt="<?php echo get_the_title();?> Other Event"></a><?php 
		        		}
		        		?>
		        	</div>
			        <p><?php echo get_field('other_event_name');?></p>
			    </div>

				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		<?php
	endif;
	$other_event = ob_get_clean();
    return $other_event;
}
add_shortcode( 'other_event', 'yspl_bp_other_event_shortcode' );