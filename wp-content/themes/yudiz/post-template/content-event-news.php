<?php
$banner_section = get_field('banner_section');
$team_section = get_field('team_section');
$products_section = get_field('products_section');
$expertise_sections = get_field('expertise_sections');
$solution_section = get_field('solution_section');
$testimonials_section = get_field('testimonials_section');
$reminder_section = get_field('reminder_section');
$choose_us_section = get_field('choose_us_section');
$gallery_section = get_field('gallery_section');
?>

<!-- Banner Section  Start -->
<section class="gitex-event-banner common-section">
	<div class="row">
		<div class="col-md-4 col-sm-6 gitex-order-left">
			<div class="gitexbanner-img-box">
				<img src="<?php echo get_template_directory_uri(); ?>/images/left-gitex-banner-pattern.webp" class="banner-pattern-gitex" alt="gitex-banner">
				<img src="<?php echo $banner_section['banner_left_image']; ?>" class="banner-photo banner-photo-left" alt="gitex-banner">
			</div>
		</div>
		<div class="col-md-4 col-sm-7 text-center">
			<div class="text-center-box">
				<h2>Meet Team Yudiz</h2>
				<h5 class="gitex-at">at</h5>
				<img src="<?php echo $banner_section['banner_center_image']; ?>" alt="gitex-banner">
				<div class="meeting-time-box"><?php echo $banner_section['meetus_venue']; ?></div>
				<div class="theme-btn solid-blue">
					<!-- class="ppc-form-btn" -->
					<a class="ppc-form-btn"><?php echo $banner_section['schedule_meeting_button']['title']; ?></a>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 gitex-order-right">
			<div class="gitexbanner-img-box">
				<img src="<?php echo get_template_directory_uri(); ?>/images/right-gitex-banner-pattern.webp" class="banner-pattern-gitex" alt="gitex-banner">
				<img src="<?php echo $banner_section['banner_right_image']; ?>" class="banner-photo banner-photo-right" alt="gitex-banner">
			</div>
		</div>
	</div>
</section>
<!-- Banner Section End -->
<!-- gitext-representative  -->
<section class=" gitex-representative-section common-section secondary-bg">
	<div class="container">
		<div class="row gitex-representative-teambox">
			<div class="col-md-5 gitex-repre-desc">
				<h6><?php echo $team_section['sub_title']; ?></h6>
				<h2><?php echo $team_section['title']; ?></h2>
				<div class="custom-saperator"></div>
				<div class="repre-dec-box">
					<?php echo $team_section['description']; ?>
					<div class="theme-btn solid-blue">
						<a class="ppc-form-btn"><?php echo $team_section['book_a_consultant_button']['title']; ?></a>
					</div>
				</div>
			</div>
			<?php if ($team_section['team_members']) { ?>
				<div class="col-md-7 gitex-repre-team-wrapper">
					<ul class="gitex-team-wrapper">
						<?php foreach ($team_section['team_members'] as $team_members) { ?>
							<li>
								<div class="gitex-repre-team">
									<img src="<?php echo $team_members['image']; ?>" class="gitex-repre-img" alt="t-chirag-leuva">
									<div class="repre-member-desc">
										<h5><?php echo $team_members['name']; ?></h5>
										<h6 class="member-designation"><?php echo $team_members['designation']; ?></h6>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="repre-pattern-box">
		<img src="<?php echo get_template_directory_uri(); ?>/images/gitex-represe-pattern-left.webp" class="repre-pattern-left repre-pattern" alt="left">
		<img src="<?php echo get_template_directory_uri(); ?>/images/gitex-represe-pattern-right.webp" class="repre-pattern-right repre-pattern" alt="right">
	</div>
</section>
<!-- gitex representative -->
<!-- Market ready section Start -->
<?php if ($products_section['products']) { ?>
	<section class="market-ready-product common-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h6><?php echo $products_section['sub_title']; ?></h6>
					<h2><?php echo $products_section['title']; ?></h2>
				</div>
			</div>
			<div class="custom-saperator"></div>
			<div class="market-ready-product-wrapper">
				<div class="row">
					<?php foreach ($products_section['products'] as $products) { ?>
						<div class="col-md-4">
							<div class="market-ready-product-box">
								<a href="<?php echo $products['link_and_text']['url']; ?>">
									<img src="<?php echo $products['logo_image']; ?>" alt="logo-event" />
									<p><?php echo $products['link_and_text']['title']; ?></p>
								</a>
							</div>
						</div>
					<?php } ?>
				</div>
				<h2 class="stroke-text-box"><?php echo $products_section['stroke text']; ?></h2>
			</div>
		</div>
	</section>
<?php } ?>
<!-- Market ready section End -->
<?php if ($expertise_sections['tabs']) { ?>
	<!-- Experties Section Start -->
	<div class="common-section experties-tab-section secondary-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h6><?php echo $expertise_sections['sub_title']; ?></h6>
					<h2><?php echo $expertise_sections['title']; ?></h2>
				</div>
			</div>
			<div class="custom-saperator"></div>
			<div class="experties-content-box">
				<div class="row ">
					<div class="col-md-4">
						<div class="tabs-nav-box">
							<ul>
								<?php $i = 0;
								foreach ($expertise_sections['tabs'] as $tabs) { ?>
									<li data-tab="<?php echo $i; ?>" class="<?php if ($i++ == 0) echo 'active'; ?>"><img src="<?php echo $tabs['icon']; ?>" alt="<?php echo $tabs['title']; ?>"><?php echo $tabs['title']; ?></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="col-md-8">
						<section class="experties-tabs-content">
							<?php $i = 0;
							foreach ($expertise_sections['tabs'] as $tabs) { ?>
								<div id="tab-<?php echo $i; ?>" class="tab-content-box <?php if ($i++ == 0) echo 'active'; ?>">
									<h3><?php echo $tabs['title']; ?></h3>
									<p><?php echo $tabs['content']; ?></p>
									<ul class="experties-tab-list">
										<?php foreach ($tabs['expertises_list'] as $expertises_list) { ?>
											<li><?php echo $expertises_list['expertise']; ?></li>
										<?php } ?>
									</ul>
									<ul class="experties-tab-technology">
										<?php foreach ($tabs['expertises_technology'] as $expertises_technology) { ?>
											<li><img src="<?php echo $expertises_technology['technology']; ?>" alt="<?php echo $tabs['title']; ?>"></li>
										<?php } ?>
									</ul>
								</div>
							<?php } ?>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Experties Section End -->
<?php } ?>
<?php if ($solution_section['slides']) { ?>
	<!--  ******** solution-product section start ********* -->
	<div class="slider-gitext-solution-wrapper solution-gitex-event-slider">
		<?php foreach ($solution_section['slides'] as $slides) {
			$slidedarker = "";
			if ($slides['dark_or_light']) {
				$slidedarker = "white-color";
			}
		?>
			<div>
				<section class="common-section our-solution-product-section solution-gitex-event <?php echo $slidedarker; ?>" style="background-image:url('<?php echo $slides['background_image']; ?>');">
					<div class="container">
						<div class="our-solution-gitex-event">
							<div class="row">
								<div class="col-md-3  sol-description-sec">
									<h6><?php echo $slides['sub_title']; ?></h6>
									<h2><?php echo $slides['title']; ?></h2>
									<div class="custom-saperator"></div>
									<h3 style="color:<?php echo $slides['color']; ?>;"><?php echo $slides['color_title']; ?></h3>
									<p><?php echo $slides['description']; ?></p>
									<div class="custom-saperator"></div>

								</div>
								<div class="col-md-9">
									<div class="solution-image-box ">
										<img src="<?php echo $slides['image']; ?>" alt="fantasy-sport-solution">
									</div>
								</div>
							</div>
							<h2 class="stroke-text-box"><?php echo $slides['stroke_text']; ?></h2>
						</div>
					</div>
				</section>
			</div>
		<?php } ?>
	</div>
	<!-- ********* solution section end  ********** -->
<?php } ?>
<?php if ($testimonials_section['testimonials']) { ?>
	<!-- Testimonials Section Start -->
	<div class="common-section home-testimonial-section secondary-bg gitext-testimony">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h6><?php echo $testimonials_section['sub_title']; ?></h6>
					<h2><?php echo $testimonials_section['title']; ?></h2>
				</div>
			</div>
			<div class="custom-saperator"></div>
			<div class="home-testimonial-content ">
				<div class="gitext-testimonial-slider">
					<?php foreach ($testimonials_section['testimonials'] as $testimonials) { ?>
						<div>
							<div class="gitex-testi-box">
								<div class="client-testimony-box">
									<h5 class="client-name-box"><?php echo $testimonials['client_name']; ?></h5>
									<h6 class="client-country-name"><?php echo $testimonials['location']; ?></h6>
									<?php echo $testimonials['review']; ?>
								</div>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>
		<img src="<?php echo $testimonials['background_image']; ?>" class="gitext-g" alt="gitext-g">
	</div>
	<!-- Testimonial Section End -->
<?php } ?>
<!-- set a reminder Section Start -->
<section class="set-reminder-section">
	<div class="container">
		<div class="row set-reminder-wrapper">
			<div class="col-md-4 col-sm-3">
				<img src="<?php echo $reminder_section['left_image']; ?>" alt="clock-reminder">
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="set-reminder-desc">
					<h2><?php echo $reminder_section['reminder_text']; ?></h2>
					<div class="theme-btn white-blue-btn">
						<a class="ppc-form-btn"><?php echo $reminder_section['reminder_link']['title']; ?></a>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-3">
				<img src="<?php echo $reminder_section['right_image']; ?>" alt="clock-reminder">
			</div>
		</div>
	</div>
</section>
<!-- set a reminder Section End -->
<!-- why choose us section start -->
<section class="wht-choose-us-gitex-event common-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h6><?php echo $choose_us_section['sub_title']; ?></h6>
				<h2><?php echo $choose_us_section['title']; ?></h2>
				<div class="custom-saperator"></div>
				<div class="why-choose-desc-box">
					<?php echo $choose_us_section['descriptions']; ?>
				</div>
			</div>
			<div class="col-md-6">
				<img src="<?php echo $choose_us_section['right_image']; ?>" alt="why-choose-us-img">
			</div>
		</div>
	</div>
</section>
<!-- why choose us section End -->
<?php if ($gallery_section['images']) { ?>
	<!-- gallery Section Start -->
	<div class="gitex-gallery-section common-section secondary-bg">
		<div class="container">
			<div class="gitex-gallery-box">
				<ul>
					<?php foreach ($gallery_section['images'] as $image) { ?>
						<li><img src="<?php echo $image['url']; ?>" alt="gitex-gallery"></li>
					<?php } ?>
				</ul>
				<div class="custom-saperator"></div>
				<div class="theme-btn solid-blue text-center">
					<a class="ppc-form-btn"><?php echo $gallery_section['button']['title']; ?></a>
				</div>
			</div>
		</div>
		<div class="repre-pattern-box">
			<img src="<?php echo get_template_directory_uri(); ?>/images/gitex-represe-pattern-left.webp" class="repre-pattern-left repre-pattern" alt="left">
			<img src="<?php echo get_template_directory_uri(); ?>/images/gitex-represe-pattern-right.webp" class="repre-pattern-right repre-pattern" alt="right">
		</div>

	</div>
	<!-- gallery Section End -->
<?php } ?>
<div id="event-thankyou-popup" class="thank-you-popup" style="display: none;">
	<div class="row row-flex">
		<div class="col-sm-6">
			<figure><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/event-thank-you.png" alt="image" /></figure>
		</div>
		<div class="col-sm-6">
			<div class="thankyou-data">

				<img src="<?php echo get_template_directory_uri(); ?>/images/thank-you.svg" alt="thank-you" />
				<h5 class="green">For Your Interest</h5>
				<h6>Our Team will contact you as soon as possible.</h6>
				<small>Follow us on <a class="twitter" href="https://twitter.com/yudizsolutions?lang=en" target="_blank" rel="noopener">Twitter</a> and like us on <a class="facebook" href="https://www.facebook.com/yudizsolutions/" target="_blank" rel="noopener">Facebook</a> to keep up to date with all our news and announcements.</small>

			</div>
		</div>
	</div>
</div>
<!-- form  -->
<div class="p-b-100 common-section " id="gitext-event-formdata" style="background-color:transparent !important;">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<?php
						echo do_shortcode('[contact-form-7 id="22233" title="gitex-event-form"]');
						?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>