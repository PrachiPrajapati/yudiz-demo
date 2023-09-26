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
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, viewport-fit=cover">
	<meta property="og:image" content="<?php echo $image[0]; ?>" />
	<!-- CODELAB: Add iOS meta tags and icons -->
	<meta http-equiv="X-Frame-Options" content="deny">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
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
	<link rel="apple-touch-icon" sizes="192x192" href="<?php echo home_url(); ?>/wp-content/uploads/2019/12/logo-192.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo home_url(); ?>/wp-content/uploads/2019/12/logo-192.png" />
	<title><?php wp_title(''); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php echo ( is_home() ) ? " <link rel='canonical' href='https://www.yudiz.com/' />  ":""; ?>
	<!-- <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>	 -->
	<!-- 	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> -->
	<!-- <style type="text/css">
		.site-loading {
			position: fixed;
			width: 100%;
			left: 0;
		}

		.loader {
			position: fixed;
			height: 100%;
			width: 100%;
			top: 0%;
			left: 0%;
			display: flex;
			display: -webkit-flex;
			justify-content: center;
			-webkit-justify-content: center;
			align-items: center;
			-webkit-align-items: center;
			flex-direction: column;
			-webkit-flex-direction: column;
			visibility: visible;
			z-index: 300000;
			background: #000;
			opacity: 1;
			transition-duration: 0.3s;
			-webkit-transition-duration: 0.3s;
			animation: loader-out 4s linear normal;
			animation-fill-mode: forwards;
			-webkit-animation: loader-out 4s linear normal;
			-webkit-animation-fill-mode: forwards;
		}

		/*		.active-load.loader { visibility: hidden; opacity: 0;} */
		.load-img img {
			max-width: 225px;
		}

		@-webkit-keyframes loader-out {
			0% {
				visibility: visible;
				opacity: 1;
			}

			95% {
				visibility: visible;
				opacity: 1;
			}

			100% {
				visibility: hidden;
				opacity: 0;
			}
		}

		@keyframes loader-out {
			0% {
				visibility: visible;
				opacity: 1;
			}

			95% {
				visibility: visible;
				opacity: 1;
			}

			100% {
				visibility: hidden;
				opacity: 0;
			}
		}
	</style> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" media="none" onload="if(media!=='all')media='all'" >
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css" media="none" onload="if(media!=='all')media='all'" > -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" media="none" onload="if(media!=='all')media='all'" >
	<link rel="stylesheet" href="https://www.yudiz.com/wp-content/themes/yudiz/style.css" media="none" onload="if(media!=='all')media='all'" >

	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script defer src="https://www.googletagmanager.com/gtag/js?id=UA-34963243-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-34963243-1');
	</script>

	<!-- Global site tag (gtag.js) - Google Ads: 832641733 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-832641733"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'AW-832641733');
	</script>

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
	if (is_page(19256)) {
	?>

		<!-- Global site tag (gtag.js) - Google Ads: 832641733 -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=AW-832641733"></script>
		<script>
			window.dataLayer = window.dataLayer || [];

			function gtag() {
				dataLayer.push(arguments);
			}
			gtag('js', new Date());

			gtag('config', 'AW-832641733');
		</script>
		<script>
			function gtag_report_conversion(url) {
				var callback = function() {
					if (typeof(url) != 'undefined') {
						// window.location = url;
					}
				};
				gtag('event', 'conversion', {
					'send_to': 'AW-832641733/J_1XCN3op4QCEMW1hI0D',
					'event_callback': callback
				});
				return false;
			}
		</script>
	<?php
	}
	?>

</head>

<body <?php body_class(); ?>>
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KCXFQBV" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<!-- <div class="loader active-load">
	<div class="load-img"><img width="100%" height="100%" src="<?php echo get_template_directory_uri() ?>/images/loader-logo.png" alt="yudiz_logo"/></div>
	<div class="load-me">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
</div> -->
<div class="new-loader-box">
    	<div class="nb-spinner">
	</div>
	</div>
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
				<div class="main-header hidden-xs hidden-sm">
					<div class="primary-head-menu">
						<?php wp_nav_menu(array("theme_location" =>	"primary-header-menu")) ?>
					</div>
					<div class="primary-logo">
						<?php
						$custom_logo_id = get_theme_mod('custom_logo');
						$image = wp_get_attachment_image_src($custom_logo_id, 'full');
						?>
						<a href="<?php echo home_url(); ?>"><img width="100%" height="100%" src="<?php echo $image[0]; ?>" alt="logo"></a>
					</div>
					<div class="overlay-head-icon">
						<div class="header-contactus theme-btn solid-blue">
							<a href="<?php echo get_the_permalink(157); ?>">get in touch</a>
						</div>
						<div class="hamburger hemburger-icon closed" id="trigger-overlay">
							<div class="burger-main">
								<div class="burger-inner">
									<span class="top"></span>
									<span class="mid"></span>
									<span class="bot"></span>
								</div>
							</div>
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
							<div class="mobile-nav-block">
								<a href="<?php echo home_url(); ?>">
									<figure><img data-src="<?php echo get_template_directory_uri(); ?>/images/mn-home.svg" alt="yudiz menu icon" /></figure>
								</a>
								<a href="<?php echo home_url(); ?>">
									<figure><img data-src="<?php echo $image[0]; ?>" alt="yudiz menu logo" /></figure>
								</a>
								<a href="#" class="close-menu">
									<figure><img data-src="<?php echo get_template_directory_uri(); ?>/images/mn-close.svg" alt="yudiz menu icon" /></figure>
								</a>
							</div>
							<?php wp_nav_menu(array("theme_location" =>	"mobile-menu")) ?>
							<?php //if (function_exists(clean_custom_menus())) clean_custom_menus(); 
							?>
						</nav>
					</div>
				</div>
			</header><!-- .site-header -->
			<div class="overlay overlay-hugeinc">
				<div class="overlay-menu-content">
					<div class="overlay-navigation">
						<?php wp_nav_menu(array("theme_location" =>	"overlay-header-menu")) ?>
					</div>
					<div class="overlay-content">
						<?php dynamic_sidebar('overlay-menu-content'); ?>
					</div>
				</div>
			</div>
		</div><!-- .sidebar -->
		<div id="content" class="site-content">