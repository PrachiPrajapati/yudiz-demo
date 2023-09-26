<?php

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Yudiz
 * @author Amitsinh Thakor,Richa Kalaria, Pathiv Butani, Priya Patel, Nilay Panchal
 * @since Yudiz 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<?php
	$upload_dir = wp_upload_dir();
	$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
	?>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, viewport-fit=cover, shrink-to-fit=no">
	<meta property="og:image" content="<?php echo $image[0]; ?>" />
	<meta property="og:title" content="<?php echo wp_title(); ?>" />
	<?php if( get_field('meta_keywords') ): ?>
		<meta name="keywords" content="<?php the_field('meta_keywords'); ?>" />
	<?php endif; ?>	
	<!-- CODELAB: Add iOS meta tags and icons -->
	<!-- <meta http-equiv="X-Frame-Options" content="deny"> -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<!-- <meta name='dmca-site-verification' content='V2tFdGdFaUxMamhVa3oyVkpGSWRlZz090' /> -->
	<?php wp_head(); ?>
	<meta name="p:domain_verify" content="ffb3066c4def1bccb5bffa1b406f484d"/>
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<?php
		if ( is_front_page() ) { ?>
			<meta name='dmca-site-verification' content='V2tFdGdFaUxMamhVa3oyVkpGSWRlZz090' />
		<?php } ?>
	<!-- content security policy meta tag -->
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-KCXFQBV');
	</script>
	<!-- End Google Tag Manager -->
	<!-- NEW Google tag (gtag.js) new  START-->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-M5CZ0PWR9W">gtag('config', 'AW-832641733');</script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-M5CZ0PWR9W');
	</script>
	<!-- NEW Google tag (gtag.js) new END -->
	<link rel="apple-touch-icon" sizes="192x192" href="<?php echo home_url(); ?>/wp-content/uploads/2019/12/logo-192.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo home_url(); ?>/wp-content/uploads/2019/12/logo-192.png" />
	<title><?php wp_title(''); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php
	if (is_page(157)) {
	?>
		<script>
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
				console.log('gtag code run Ends');
				return false;
			}
			
		</script>
	<?php
	}
	/* if (is_page(19256)) {
	?>
	<?php
	} */
	?>
</head>
<body <?php body_class(); ?>>
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KCXFQBV" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- <div class="new-loader-box">
    	<div class="nb-spinner">
	</div>
	</div> -->
	<div id="page" class="hfeed site">
		<div id="sidebar" class="sidebar">
			<header id="masthead" class="site-header <?php echo $_SESSION['event_popup']; ?>">
				<?php
				$args = array(
					'post_type' => 'event',
					'posts_per_page' => 3,
				);
				$loop = new WP_Query($args);
				if ($_SESSION['event_popup'] == "unset") {
					if ($loop->have_posts()) :
				?>
						<div class="notification-header">
							<div class="container">
								<div class="notification-slider">
									<?php while ($loop->have_posts()) : $loop->the_post();
									?>
										<div>
											<p><?php echo get_field('event_meet_title'); ?> <?php echo get_the_title() ?> <a href="<?php echo get_the_permalink(); ?>">find more</a></p>
										</div>
									<?php endwhile;
									wp_reset_postdata();
									?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php } ?>
				<div class="main-header desktop-mega-header hidden-xs hidden-sm">
					<div class="primary-logo">
						<?php
						$custom_logo_id = get_theme_mod('custom_logo');
						$image = wp_get_attachment_image_src($custom_logo_id, 'full');
						?>
						<a href="<?php echo home_url(); ?>"><img width="100%" height="100%" src="<?php echo $image[0]; ?>" alt="logo"></a>
					</div>
					<div class="desktop-primary-menu">
						<div class="primary-head-menu">
							<?php wp_nav_menu(array("theme_location" =>	"primary-mega-menu")) ?>
						</div>
						<div class="header-contactus theme-btn solid-blue">
								<a href="<?php echo get_the_permalink(157); ?>">Business Inquiry</a>
						</div>
					</div>
				</div>
				<div class="visible-xs visible-sm new-mobile-menu-wrapper">
					<div class="main-header mobile-nav-header">
						<div class="primary-logo">
							<?php
							$custom_logo_id = get_theme_mod('custom_logo');
							$image = wp_get_attachment_image_src($custom_logo_id, 'full');
							?>
							<a href="<?php echo home_url(); ?>"><img src="<?php echo $image[0]; ?>" alt="logo"></a>
						</div>
						<div class="overlay-head-icon">
							<div class="burger-main mobile-menu-icon">
								<div class="burger-inner">
									<span class="top"></span>
									<span class="mid"></span>
									<span class="bot"></span>
								</div>
							</div>
						</div>
					</div>
					<div id="mobile-menu-new" class="mobile-cust-menu">
						<nav id="mobile-menu-nav">
							<?php wp_nav_menu(array("theme_location" =>	"mobile-menu")) ?>
						</nav>
					</div>
				</div>
			</header><!-- .site-header -->
		</div><!-- .sidebar -->
		<div id="content" class="site-content">