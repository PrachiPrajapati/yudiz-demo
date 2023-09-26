<?php
function yspl_bp_award_shortcode( $atts ) {
	ob_start();
	$args = array(
		'post_type' => 'award',
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
			        <figure>
			            <img class="slick-lazy" data-lazy="<?php echo get_field('award_icon');?>" alt="<?php echo get_the_title();?> Award" />
			        </figure>
					<h6><?php echo get_field('award_date'); ?></h6>
			        <h2 class="big-h2">
			        	<?php echo get_the_title();?>
			        	<!-- <a style="display:none;" data-fancybox="awards-<?php //echo get_the_ID()?>" href="<?php //echo $image[0];?>">
			        		<span>
			        			<img class="slick-lazy" data-lazy="<?php //echo $image[0];?>" alt="<?php //echo get_the_title();?> Award" />
					        </span>
			        	</a> -->
						<span data-fancybox-trigger="awards-<?php echo get_the_ID()?>" class="award-img-box" style="  background-image: url('<?php echo $image[0];?>');">
                    		<img data-fancybox="awards-<?php echo get_the_ID()?>" data-lazy="<?php echo $image[0];?>" class="slick-lazy" alt="<?php echo get_the_title();?> Award" />
                  		</span>
					</h2 >
		        	<div class="hidden">
		        		<?php $gallary = get_field('award_images');?>
		        		<?php
		        		foreach ($gallary as $gallaryKey => $gallaryValue) {
		        			# code...
			        		?>
			        		<a data-fancybox="awards-<?php echo get_the_ID()?>" href="<?php echo $gallaryValue;?>"></a><?php 
		        		}
		        		?>
		        	</div>
			        <p><?php echo get_field('award_name');?></p>
			    </div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		<?php
	endif;
	$award = ob_get_clean();
    return $award;
}
add_shortcode( 'award', 'yspl_bp_award_shortcode' );