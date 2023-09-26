<?php /* Template Name: Product Page */ 
get_header(); 
$loading_img = get_stylesheet_directory_uri() . "/images/loader-new.svg"; ?>
	<div id="primary" class="content-area product-page">
		<main id="main" class="site-main ">
			<!-- Product Banner Section Start -->
			<?php $banner_option = get_field("banner_option");?>
			<section class="productbanner-sec common-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-7 productinfobox">
							<img src="<?php echo $banner_option["product_logo"]; ?>" alt="Fansportiz" class="product-icon-logo">
							<div class="productinfo">
								<h1><span style="<?php  echo ( $banner_option["product_title_color"] ) ? "color:$banner_option[product_title_color];":"color:#042365;"; ?>"><?php echo $banner_option["product_title"]; ?></span> <?php echo $banner_option["product_subtitle"]; ?></h1>
								<h5 class="prod-tag-line"><?php echo $banner_option["product_quoteline"]; ?></h5>
								<div class=" theme-btn solid-blue">
									<a href="<?php echo home_url( "get-in-touch" ); ?>">Schedule A Demo</a>
								</div>
							</div>
						</div>
						<div class="col-lg-5 productinfowrapper">
							<p class="product-desc"><?php echo $banner_option["description"]; ?></p>
							<div class="product-counter-section" id="home-counter">
								<?php if( ! empty( $banner_option["counters"] ) ): ?>
									<div class="row">
										<?php foreach( $banner_option["counters"] as $single_cntr ): ?>
											<div class="col-sm-6 product-counter-wrapper">
												<div class="prod-cnt-box">
													<div class="stats-number" style="text-align: center;">
														<?php echo  $single_cntr["prefix"]; ?><span class="timer" data-count="<?php echo $single_cntr["number"]; ?>"> <?php echo $single_cntr["number"]; ?></span><?php echo $single_cntr["suffix"]; ?>
													</div>
													<p class="stats-text" style="text-align: center;"><?php echo  $single_cntr["title"]; ?>	</p>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				</section>
				<!-- Product Banner Section End -->
				<!-- Product Feature Slider Start -->
				<?php $features_slider = get_field("features_slider"); ?>
				<section class="product-feature-section">
					<div class="slider-gitext-solution-wrapper solution-gitex-event-slider">
						<?php foreach( $features_slider as $single_slide ): ?>
							<div>
								<section class="common-section our-solution-product-section solution-gitex-event white-color" style="background-color: <?php echo $single_slide["slide_colour"]; ?>;">
									<div class="container">
										<div class="our-solution-gitex-event">
											<div class="row">
												<div class="col-lg-4 col-md-5 sol-description-sec prod-feature-wrapper">
													<h2><?php echo $single_slide["title"]; ?></h2>
													<div class="custom-saperator"></div>
													<div class="custom-saperator"></div>
													<div class="prod-feature-title">
														
														<div class="prod-featureicon-box" style="background-color:<?php echo $single_slide["icon_bg_clr"]; ?>;">
															<img class="yswp_lazy" data-lzy_src="<?php echo $single_slide["icon"]; ?>" src="<?php echo $loading_img; ?>" alt="Math Tips">
														</div>
														<h3 style="color:#fff;"><?php echo $single_slide["sub_title"]; ?></h3>
													</div>
													<div class="custom-saperator"></div>
													<p class="feature-slide-desc"><?php echo $single_slide["description"]; ?></p>
												</div>
												<div class="col-lg-8 col-md-7">
													<div class="solution-image-box">
														<img class="yswp_lazy" data-lzy_src="<?php echo $single_slide["image"]; ?>"  src="<?php echo $loading_img; ?>"  alt="fantasy-sport-solution" />
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						<?php endforeach; ?>
					</div>
				</section>
				<!-- Product Feature Slider End -->
				<!-- ********** Overview Section Start *********** -->
				<?php 
					$over_sec = get_field("overview_section"); 
					if( ! empty( $over_sec ) ): $counter = 1 ; foreach( $over_sec as $single_sov ):	?>
							<section class="overview-section <?php echo ( $counter % 2 == 0 ) ? " overflow-reveres ":""; $counter++;  ?> common-section">
								<div class="container">
									<div class="row">
										<div class="col-md-5 overview-desc-section">
											<h3 class="bottom-line-title">
												Overview
											</h3>
											<?php echo $single_sov["description"]; ?>
										</div>
										<div class="col-md-7 overview-img-box">
											<img class="yswp_lazy" data-lzy_src="<?php echo $single_sov["image"]; ?>"  src="<?php echo $loading_img; ?>"  alt="Fansportiz overview"/>
										</div>
									</div>
								</div>
							</section>
					<?php endforeach; endif; ?>
				<!-- ********** Overview Section End *********** -->
				 <!-- Hire process section starts -->
				 <?php $our_clients = get_field("our_clients"); ?>
						<section class="technology-dev-sec common-section" style="background: url('<?php echo $our_clients["banner_image"]  ?>') no-repeat;">
							<div class="container">
								<h4><?php echo $our_clients["client_heading"]  ?></h4>
							</div>
						</section>
						<section class="payment-partner-sec secondary-bg">
							<div class="container">
								<div class="payment-partner-blk text-center">
									<ul class="payment-partner-logos">
										<?php foreach( $our_clients["clients_logo"] as $single_img ): ?>
											<li><img class="yswp_lazy" data-lzy_src="<?php echo $single_img["client_logo_image"]; ?>" src="<?php echo $loading_img; ?>" alt="clients logo"/></li>
                                        <?php endforeach; ?>
									</ul>
								</div>
							</div>
						</section>
			<!-- Hire process section ends -->
				<?php
					$home_id = get_option( 'page_on_front' ); 
					$testimonials_data = get_field("testimonials_section", $home_id); ?>
					<!-- Testimonials Section Start -->
					<div class="common-section home-testimonial-section secondary-bg gitext-testimony">
						<div class="container">
							<div class="row">
								<div class="col-sm-8">
									<h6><?php echo $testimonials_data["title"]; ?></h6>
									<h2><?php echo $testimonials_data["sub_title"]; ?></h2>
								</div>
							</div>
							<div class="custom-saperator"></div>
							<div class="home-testimonial-content">
								<?php if( ! empty( $testimonials_data["select_testimonials"] ) ): ?>
									<div class="row">
										<?php 
											foreach( $testimonials_data["select_testimonials"] as $single_quote ): 
												$content = $single_quote->post_content; ?>
												<div class="col-sm-6">
													<div class="client-testimony-box">
														<h5 class="client-name-box"><?php echo $single_quote->post_title; ?></h5>
														<h6 class="client-country-name"><?php echo get_field("country",$single_quote->ID); ?></h6>
														<?php echo apply_filters('the_content', $content); ?>
													</div>
												</div>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
								<div class="custom-saperator"></div>
								<div class="theme-btn solid-blue text-center">
									<a <?php echo ( $testimonials_data["button_link"]["target"] ) ? " target='_blank'" :""; ?> href="<?php echo $testimonials_data["button_link"]["url"]; ?>"><?php echo $testimonials_data["button_link"]["title"]; ?></a>
								</div>
							</div>
						</div>
					</div>
					<!-- Testimonial Section End -->
					<!-- =====Faq Section Start ===== -->
				<?php   
					$faq_section = get_field("faq_section"); ?>
					<section class="product-faq-sec common-section">
						<div class="container">
							<div class="row">
								<div class="col-sm-8">
									<h3>Frequently asked questions</h3>
								</div>
							</div>
							<div class="accordian-box">
								<?php if( ! empty( $faq_section ) ): $cntr = 0; ?>
									<dl class="accordion">
										<?php foreach( $faq_section as $single_fq ): ++$cntr; ?>
											<dt class="<?php echo ( $cntr === 1 ) ? "current":""; ?>">
												<p><a href="javascript:;"><?php echo $cntr . ". " . $single_fq["question"]; ?></a></p>
											</dt>
											<dd class="<?php echo ( $cntr === 1 ) ? "active":""; ?>">
												<p><?php echo $single_fq["answer"]; ?></p>
											</dd>
										<?php endforeach; ?>
									</dl>		
								<?php endif; ?>			
							</div>		
						</div>
					</section>
				<!-- =====Faq Section End ===== -->
        </main><!-- .site-main -->
	</div><!-- .content-area -->
	<script>
		 jQuery(document).ready(function () {
		jQuery(".product-feature-section .solution-gitex-event-slider").slick({
			fade: !0,
						pauseOnHover: !1,
						pauseOnFocus: !1,
						autoplay: !0,
						dots: !0,
						dotsClass: "custom-dots-count",
						customPaging: function (e, t) {
							return console.log(e), t + 1 + '<span class="seperator-dot-count">|</span><span class="slider-total-count">' + e.slideCount + "</span>";
						},
					});
					//accordian
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
					// lazy load on images
					var lazy_ele = [].slice.call(document.querySelectorAll("img.yswp_lazy"));
					if ("IntersectionObserver" in window) {
						let lazy_t = new IntersectionObserver(function (lazy_ele, lazy_o) {
							lazy_ele.forEach(function (lazy_ele) {
								if (lazy_ele.isIntersecting) {
									let lazy_o = lazy_ele.target;
									(lazy_o.src = lazy_o.dataset.lzy_src), lazy_o.classList.remove("yswp_lazy"), lazy_t.unobserve(lazy_o);
								}
							});
						});
						lazy_ele.forEach(function (lazy_ele) {
							lazy_t.observe(lazy_ele);
						});
					}
				});
				</script>
				<script>
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
    </script>
<?php get_footer(); ?>
<!-- script -->