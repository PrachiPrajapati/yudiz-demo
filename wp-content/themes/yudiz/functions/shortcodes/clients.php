<?php
/************************ Shortcode for team ****************************/

function yspl_clients_partners_shortcode( $atts ){
	$loading_img = get_stylesheet_directory_uri() . "/images/loader-new.svg";
	$atts = shortcode_atts( array(
		'slider' => 'no',
		'category' => 'client',
		'title' => 'Our Clients',
		'subtitle' => 'Sub Title'
	), $atts, 'yudiz' );
	ob_start(); 
	$args = array(
		'post_type' => "clients-partners",
		'posts_per_page' => -1,
		'order' => 'DESC',
		'tax_query' => array(
			array(
				'taxonomy' => 'client_partner_categories',
				'field'    => 'slug',
				'terms'    => $atts['category']
			)
		),
	);
	$the_query = new WP_Query($args);

	if($the_query->have_posts()):?>
		<div class="common-section">
			<?php ($atts['category'] == 'client') ? $class = 'ourclient-title' : $class =''; ?>
			<div class="<?php echo $class;?>">
				<h6><?php echo $atts['subtitle']; ?></h6>
				<h2><?php echo $atts['title']; ?></h2>
			</div>		
			<?php ($atts['slider'] == 'yes') ? $styleclass = 'logos-slider' : $styleclass ='logos-grid'; ?>
			<div class="<?php echo $styleclass;?>">
				<?php while ($the_query->have_posts()) : $the_query->the_post();?>
			        <?php $image = get_the_post_thumbnail_url(get_the_ID(), 'full' ); ?>
			        <div>
			        	<figure>
								<img  class="yswp_lazy" src="<?php echo $loading_img; ?>"  data-lzy_src="<?php echo $image; ?>" alt="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
			        	</figure>
			        </div>
				<?php
				endwhile; wp_reset_postdata(); ?>
		    </div>	
		</div>
	<?php
	endif;
	return ob_get_clean();

}
add_shortcode( 'logos', 'yspl_clients_partners_shortcode' );