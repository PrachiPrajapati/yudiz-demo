<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package Yudiz
 * @author Hardik Lakkad, Prachi Prajapati
 * @since Yudiz 1.0
 */
?>
	</div><!-- .site-content -->
<?php 
$enable_get_in_touch = get_field('enable_get_in_touch',get_the_ID());
if( $enable_get_in_touch[0] ){
	$content=get_post(562);
	echo do_shortcode(apply_filters("the_content", $content->post_content));
	// postcontentcss($content->post_content);
}		
?>
	<footer id="colophon" class="site-footer new-footer">
		<div class="container">
			<div class="footer-content">
				<div class="row">
					<div class="col-md-3">
						<div class="footer-logo">
							<?php
							// check to see if the logo exists and add it to the page
							if ( get_theme_mod( 'footer_theme_logo' ) ) : ?>
							<img src="<?php echo get_theme_mod( 'footer_theme_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
							<?php // add a fallback if the logo doesn't exist
							else : ?>
							<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
							<?php endif; ?>
						</div>
						<div class="footer-company-text">
							<?php dynamic_sidebar('footer-company-text'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="footer-address-block">
								<?php dynamic_sidebar('footer-company-address-list'); ?>
							</div>
						</div>
						<!-- <h6 class="footer-item-title-new"><strong>Quick Links</strong></h6> -->
						<!-- <?php //wp_nav_menu(array("theme_location" =>	"footer-menu")) ?> -->
					</div>
					<div class="col-md-3">
						<div class="footer-contact-new-text">
										<h6 class="footer-item-title-new"><strong>Starts a Conversation</strong></h6>
										<?php dynamic_sidebar('footer-contact-text');?>
									</div>
					</div>
					<!-- <div class="col-sm-4">
						<div class="footer-contact">
							<h6 class="footer-item-title-new"><strong>Start A Conversation</strong></h6>
							<?php //dynamic_sidebar('footer-contact-text'); ?>
						</div>
					</div> -->
				</div>
				<div class="row footer-row-new" style="display:flex; flex-wrap:wrap;">
						<div class="col-md-8 col-sm-12">
							<div class="footer-links-box" >
									<div class="row">
										<div class="col-sm-4">
												<div>
													<h6 class="footer-item-title-new"><strong>About</strong></h6>
													<div class="new-footer-link">
														<?php wp_nav_menu(array("theme_location" =>	"footer-about-menu")) ?>
													</div>
												</div>
												<div>
													<h6 class="footer-item-title-new"><strong>Insights</strong></h6>
													<div class="new-footer-link">
														<?php wp_nav_menu(array("theme_location" =>	"footer-resources-menu")) ?>
													</div>
												</div>
										</div>
										<div class="col-sm-5">
											<div>
												<h6 class="footer-item-title-new"><strong>Solutions</strong></h6>
												<div class="new-footer-link">
													<?php wp_nav_menu(array("theme_location" =>	"footer-service-menu")) ?>
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div>
												<h6 class="footer-item-title-new"><strong>Industries</strong></h6>
												<div class="new-footer-link">
													<?php wp_nav_menu(array("theme_location" =>	"footer-industries-menu")) ?>
												</div>
											</div>
										</div>
									</div>
									<!-- <div class="footer-contact-new-text">
										<h6 class="footer-item-title-new"><strong>Starts a Conversation</strong></h6>
										<?php //dynamic_sidebar('footer-contact-text');?>
									</div> -->
								</div>
							</div>
						<div class="col-md-4 col-sm-7 footer-form-box">
								<h6 class="footer-item-title-new form-footer-title"><strong>Talk to our experts</strong></h6>	
									<p>Reach to us, we will reach you to the solutions.</p>
								<?php echo do_shortcode('[contact-form-7 id="21958" title="footer inquiry form"]') ?>
						</div>
						<!-- <div class="col-sm-4">
							<?php //dynamic_sidebar('footer-review-icon'); ?>
						</div> -->
					</div>			
				</div>
				<div class="row align-items-center site-info">
					<div class="col-sm-6 col-md-4">
						<?php dynamic_sidebar('footer-company-review-icon'); ?>
					</div>
					<div class="col-sm-12 col-md-4 footer-copyright-text text-center">
						<small>&copy; <?php echo date("Y") ?> 
						<?php echo get_theme_mod('footer_text');  ?></small></div>
					<div class="col-sm-6 col-md-4 copyright-social-menu">
						<?php wp_nav_menu(array("theme_location" =>	"copyright-menu")) ?>
						<?php wp_nav_menu(array("theme_location" =>	"social-icon-menu")) ?>
					</div>
				</div>
			</div>
		<div id="btn-click"><div class="scroll-to-top" id="go-top"></div></div><!-- .scroll-to-top -->
	</footer><!-- .site-footer -->	
</div><!-- .site -->
<?php if (is_page(157) || is_page(19256) || is_singular('join-our-team')) {?>
	<!-- Carrer Popup -->
	<div id="thank-you-popup" class="thank-you-popup" style="display: none;">
		<div class="row row-flex">
			<div class="col-sm-6">
				<figure><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/career-modal_2.png" alt="career" /></figure>
			</div>
			<div class="col-sm-6">
				<div class="thankyou-data">
					<img src="<?php echo get_template_directory_uri(); ?>/images/thank-you.svg" alt="thank-you" />
					<h5 class="green">For Your Interest</h5>
					<h6>Our HR Executive will contact you as soon as possible.</h6>
					<p>Email: <a href="mailto:career@yudiz.com">career@yudiz.com</a></p>
					<small>Follow us on <a class="twitter" href="https://twitter.com/yudizsolutions?lang=en" target="_blank" rel="noopener">Twitter</a>,<a class="twitter" href="https://www.linkedin.com/company/yudiz-solutions-ltd" target="_blank" rel="noopener">Linked in</a> and like us on <a class="facebook" href="https://www.facebook.com/yudizsolutions/" target="_blank" rel="noopener">Facebook</a> to keep up to date with all our news and announcements.</small>
				</div>
			</div>
		</div>
	</div>
	<!-- Inquiry Popup -->
	<div id="inquiry-thank-you-popup" class="thank-you-popup inquiry-thank-you-popup" style="display: none;">
		<div class="row row-flex reverse">
			<div class="col-sm-6">
				<div class="thankyou-data">
					<img src="<?php echo get_template_directory_uri(); ?>/images/thank-you.svg" alt="thank-you" />
					<small class="mb-none">&nbsp;</small>
					<h5>Your message has been sent successfully.</h5>
					<ul class="contact-info">
						<li>Email: <a href="mailto:contact@yudiz.com">contact@yudiz.com</a></li>
						<li>Skype: <a href="skype:yudizsolutions">yudizsolutions</a></li>
						<li>Call: <a href="tel:+919033975375">+91 90339 75375</a></li>
					</ul>
					<small>Follow us on <a class="twitter" href="https://twitter.com/yudizsolutions?lang=en" target="_blank" rel="noopener">Twitter</a>,<a class="twitter" href="https://www.linkedin.com/company/yudiz-solutions-ltd" target="_blank" rel="noopener">Linked in</a> and like us on <a class="facebook" href="https://www.facebook.com/yudizsolutions/" target="_blank" rel="noopener">Facebook</a> to keep up to date with all our news and announcements.</small>
				</div>
			</div>
			<div class="col-sm-6">
				<figure><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/thank-you-modal.png" alt="thank-you" /></figure>
			</div>
		</div>
	</div>
<?php }?>
<!-- Event Popup -->
<?php ysplEvent();?>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('.mobile-nav-header .burger-main').on('click', function() {
			jQuery('body.page-template-headermenu-template').toggleClass('open-menu')
			jQuery(this).toggleClass('open');
			jQuery('.menu-mobile-navigation-container').toggleClass('open');
		});
		jQuery('.menu-mobile-navigation-container .menu-item-has-children > a').on('click', function() {
			if (!jQuery(this).parent().hasClass('open-sub')) {
				jQuery('.menu-mobile-navigation-container .menu-item-has-children').removeClass('open-sub');
				jQuery(this).parent().addClass('open-sub');
			} else {
				jQuery(this).parent().removeClass('open-sub');
			}
		})
	})
</script>
<?php wp_footer(); ?>
<div id="fb-root"></div>

<script type="text/javascript">
	jQuery('body').on('click', '.ppc-form-btn', function() {
		jQuery("#ppc-form-popup").fancybox({
			touch: false
		}).trigger('click');
	});

	(function($) {
		jQuery('li.portfolio-category').click(function(e) {
			let $url = jQuery(this).find('a').attr("href");
			if ($url == '') {
				window.history.pushState(null, null, '<?php echo get_post_type_archive_link('portfolio'); ?>');
			} else {
				window.history.pushState(null, null, $url);
			}
		});

		$('select.filter-portfolio-cat').change(function(e) {
			let $url = jQuery(this).val();
			if ($url == '') {
				window.history.pushState(null, null, '<?php echo get_post_type_archive_link('portfolio'); ?>');
			} else {
				window.history.pushState(null, null, $url);
			}
		});
	})(jQuery);

	document.addEventListener('wpcf7invalid', function(event) {
		setTimeout(function() {
			jQuery('html').stop().animate({
				scrollTop: jQuery('.wpcf7-not-valid').eq(0).offset().top - 140,
			}, 500, 'swing');
		}, 100);
	}, false);
</script>
<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "Blog",
		"url": "https://blog.yudiz.com"
	}
</script>
<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Yudiz Solutions",
		"url": "https://www.yudiz.com",
		"aggregateRating": {
			"@type": "AggregateRating",
			"ratingValue": "4.6",
			"reviewCount": "684"
		},
		"sameAs": [
			"https://www.facebook.com/yudizsolutions",
			"https://plus.google.com/+Yudiz",
			"https://twitter.com/yudizsolutions"
		]
	}
</script>
<script>
	document.addEventListener('wpcf7mailsent', function(event) {
		if ('19006' == event.detail.contactFormId) {
			console.log('gtag code run');
			gtag_report_conversion('<?php echo get_the_permalink(); ?>')

			console.log('gtag code run Ends');
		}
	}, false);
	<?php if (is_page("unity-game-development")): ?>
		document.addEventListener('wpcf7mailsent', function(event) {
			if ('20730' == event.detail.contactFormId) {
				gtag_report_conversion('<?php echo get_the_permalink(); ?>')
				function gtag_report_conversion(url) {
					var callback = function () {
						if (typeof(url) != 'undefined') {
						//window.location = url;
						}
					};
					gtag('event', 'conversion', {
						'send_to': 'AW-832641733/wFJVCJyS24MYEMW1hI0D',
						'event_callback': callback
					});
					return false;
				}
			}
		}, false);
	<?php endif;?>
	document.addEventListener('wpcf7mailsent', function(event) {
		if ('20328' == event.detail.contactFormId) {
			gtag_report_conversion('<?php echo get_the_permalink(); ?>')

			function gtag_report_conversion(url) {
				var callback = function() {
					if (typeof(url) != 'undefined') {
						// 				  window.location = url;
					}
				};
				gtag('event', 'conversion', {
					'send_to': 'AW-832641733/jx62CIbqp_0CEMW1hI0D',
					'event_callback': callback
				});
				return false;
			}
		}
	}, false);
	document.addEventListener('wpcf7submit', function(event) {
		if ('158' == event.detail.contactFormId || '366' == event.detail.contactFormId) {
			function gtag_report_conversion(url) {
				var callback = function() {
					if (typeof(url) != 'undefined') {
						window.location = url;
					}
				};
				gtag('event', 'conversion', {
					'send_to': 'AW-832641733/y-rXCMXbioACEMW1hI0D',
					'event_callback': callback
				});
				return false;
			}
		}
	}, false);
</script>
<script>
	/* client-logo-slider */
	if( jQuery('.ppc-logo-slider').length >= 1 ){
		jQuery('.ppc-logo-slider').slick({
			dots: false,
			infinite: true,
			arrows: false,
			fade: false,
			autoplay: true,
			speed: 2000,
			slidesToShow: 5,
			slidesToScroll: 2,
			responsive: [

				{
					breakpoint: 1500,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 2,
					}
				},
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 2,
					}
				},
				{
					breakpoint: 766,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 574,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			]
		});
	}
	if( jQuery('.ppc-portfolio-slider').length >= 1  ){
		jQuery('.ppc-portfolio-slider').slick({
			dots: false,
			infinite: true,
			arrows: false,
			fade: false,
			centerMode: true,
			centerPadding: '200px',
			autoplay: true,
			speed: 2000,
			slidesToShow: 4,
			slidesToScroll: 2,
			responsive: [{
					breakpoint: 1200,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 2,
						centerPadding: '80px',
						autoplay: true,
					}
				},
				{
					breakpoint: 766,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						centerPadding: '60px',
						autoplay: true,
					}
				},
				{
					breakpoint: 574,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						centerPadding: '60px',
						autoplay: true,
					}
				}
			]

		});
	}
</script>
<!-- <link rel='stylesheet' id='jcf-css'  href='<?php echo home_url(); ?>/wp-content/themes/yudiz/css/jcf.min.css' media='all' /> -->
<link rel='stylesheet' id='cstm-fontawesome-css'  href='<?php echo home_url(); ?>/wp-content/themes/yudiz/css/fontawesome.min.css' media='all' />
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
</body>
<script>
	 var lazyImages = [].slice.call(document.querySelectorAll("img.yswp_lazy"));
    if ("IntersectionObserver" in window) {
      let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            let lazyImage = entry.target;
            lazyImage.src = lazyImage.dataset.lzy_src;
            lazyImage.classList.remove("yswp_lazy");
            lazyImageObserver.unobserve(lazyImage);
          }
        });
      });
      lazyImages.forEach(function(lazyImage) {
        lazyImageObserver.observe(lazyImage);
      });
    } else {
      console.log("lazy load not avilable update browser!");
    }
</script>
<!-- <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"></script> -->
</html>