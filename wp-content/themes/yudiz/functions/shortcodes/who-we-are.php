<?php
// who we are new section
function yswp_who_we_are_section( $atts ){ 
	ob_start(); 
	$loading_img = get_stylesheet_directory_uri() . "/images/loader-new.svg";
	$attr_ary = shortcode_atts( array(
		'title'			=> "The Comprehensive Digital Solutions Partner",
        'description' => 'We are digital transformation catalysts offering web, mobile, game and blockchain solutions for your business!An ISO 9001:2015 certified IT development company'
    ), $atts );		?>
	<section class=" common-section who-we-are-new-sec">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h6>Our Mission</h6>
					<h2>Who we are?</h2>
				</div>
			</div>
			<div class="custom-saperator"></div>
			<div class="who-we-are-desc-wrapper ">
				<div class="row">
					<div class="col-md-6">
						<div class="who-we-are-imgbox">
							<img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo home_url(); ?>/wp-content/uploads/2022/12/who-we-are-yudiz-office-new.jpeg" alt="who-we-are">
						</div>
					</div>
					<div class="col-md-6">
						<div class="who-we-are-descbox">
							<h3><?php echo wp_strip_all_tags( $attr_ary['title'] ); ?></h3>
							<p><?php echo wp_strip_all_tags(  $attr_ary['description'] ) ; ?></p>
							<div class="home-counter-section" id="home-counter">
								<div class="row">
									<div class="col-sm-6 home-counter-wrapper">
										<div class="stats-number" style="text-align: center;">
											<span class="timer" data-count="13">13</span>+
										</div>
										<p class="stats-text" style="text-align: center;">Years Experience</p>
									</div>
									<div class="col-sm-6 home-counter-wrapper">
										<div class="stats-number" style="text-align: center;">
											<span class="timer" data-count="6000">6000</span>+
										</div>
										<p class="stats-text" style="text-align: center;">Successful Projects</p>
									</div>
									<div class="col-sm-6 home-counter-wrapper">
										<div class="stats-number" style="text-align: center;">
											<span class="timer" data-count="81">81</span>%
										</div>
										<p class="stats-text" style="text-align: center;">Repeated Clients</p>
									</div>
									<div class="col-sm-6 home-counter-wrapper">
										<div class="stats-number" style="text-align: center;">
											<span class="timer" data-count="400">400</span>+
										</div>
										<p class="stats-text" style="text-align: center;">Employees</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="partner-logo-section">
					<?php// echo do_shortcode("[logos slider='yes' category='partner' subtitle='Our Dedicated Partners']") ?>
						<?php
						/* short-code for News Event Post Start (Pagination)  */
						$args = array(
						'post_type' => 'clients-partners',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'client_partner_categories',
								'field'    => 'slug',
								'terms'    => 'partner'
							)
						),
						);
						$partnerposts = new WP_Query($args);
						if ( $partnerposts->have_posts() ) { 
							add_filter('the_content', 'wpautop'); ?>
								<section class="client-section-box common-section-small  pb-0">
									<h6 class="clnt-title">OUR DEDICATED PARTNERS</h6>
									<div class="client-section-content">
										<div class="custom-saperator"></div>
										<?php while($partnerposts->have_posts()): $partnerposts->the_post(); ?>
										<?php $image = get_the_post_thumbnail_url(get_the_ID(), 'full' ); ?>
										<div class="clien-bx-img">
											<img  class="yswp_lazy" src="<?php echo $loading_img; ?>"  data-lzy_src="<?php echo $image; ?>" alt="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
										</div>
										<div class="custom-saperator"></div>
										<?php endwhile; ?>
										<?php wp_reset_postdata(); ?> 
									</div>
								</section>
							<?php } else { echo __( 'No Results Found!', 'Client' );
						} 
						wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</section>
	<?php return  ob_get_clean();
}
add_shortcode("new-who-we-are","yswp_who_we_are_section");