<?php 
    /* Template Name: Industries: Health Care */ 
    get_header(); 
    $banner_settings = get_field("banner_settings");
    $loading_img = get_stylesheet_directory_uri() . "/images/loader-new.svg";
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <!-- ============ Banner Section Start ============= -->
            <section class="industries-banner-section common-section secondary-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 banner-indus-desc-box">
                           <div class="banner-indus-desc">
                                <h1 class="mid-h1" style="font-weight:700;"><?php echo $banner_settings["title"]; ?></h1>
                                <p><?php echo $banner_settings["description"]; ?></p>
                                <div class="theme-btn solid-blue">
                                    <a href="<?php echo $banner_settings["button_link"]["url"]; ?>" <?php echo ($banner_settings["button_link"]["target"]) ? " target='_blank' ":""; ?> ><?php echo $banner_settings["button_link"]["title"]; ?></a>
                                </div>
                                
                           </div>
                        </div>
                        <div class="col-md-6 col-sm-8">
                            <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $banner_settings["image"]; ?>" alt="img">
                        </div>
                    </div>
                </div>
            </section>
            <!-- ============ Banner Section End ============= -->
           
            <link rel='stylesheet' id='animate-css' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css' media='all' />
            <!-- *************** Who We are Sectio Start ****************** -->
            <?php echo get_field("our_mission_settings"); ?>
            <!-- *************** Who We are Sectio End ****************** -->
            <!--============= Healthcare-intro Section Start ==============-->
            <?php $indstry_info = get_field("industry_information_section");  ?>
            <section class="healthcare-intro-section common-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 healthcare-intro-wrapper">
                            <div class="healthcare-intro-box">
                                <h4><?php echo $indstry_info["title"]; ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="healthcare-intro-box-list">
                                <?php echo $indstry_info["description"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ========== Healthcare-intro Section End =========== -->
            <!-- ============= Telehealth apps Start ================ -->
            <?php 
                $features_of_industries = get_field("features_of_industries");
                if( ! empty( $features_of_industries ) ):  ?>
                    <section class="telehealth-apps-section">
                        <div class="telehealth-content">
                            <div class="container">
                                <div class="row">
                                    <?php foreach( $features_of_industries as $single_feature ): ?>
                                        <div class="col-md-4 tele-health-content-box">
                                            <div class="telehealth-apps-wrapper">
                                                <div class="telehealth-img-box" style="background-color: <?php echo ( $single_feature["icon_color"] ) ?  $single_feature["icon_color"] : "#7B4689"; ?>;">
                                                    <?php echo ( $single_feature["icon"] ) ? "<img class='yswp_lazy' src='$loading_img' data-lzy_src='$single_feature[icon]' alt='tele'>":""; ?>
                                                </div>
                                                <h4><?php echo $single_feature["title"]; ?></h4>
                                                <p><?php echo $single_feature["description"]; ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            <!-- ============= Telehealth apps End ================ -->
            <!--  ******** solution-product section start ********* -->
            <?php $app_mockups = get_field("app_mockups"); ?>
            <div class="slider-gitext-solution-wrapper ">
                <section class="common-section our-solution-product-section solution-gitex-event   <?php echo ( $app_mockups['is_colour_white'] ) ? " white-color ":"black-color"; ?> " <?php echo ( $app_mockups["background_colour"] ) ? "style='background-color: $app_mockups[background_colour];'":""; ?> >
                            <div class="container">
                                <div class="our-solution-gitex-event">
                                        <div class="row">
                                            <div class="col-md-3  sol-description-sec">
                                                <?php echo $app_mockups["title"]; ?>
                                                <div class="custom-saperator"></div>
                                                <?php echo $app_mockups["sub_title"]; ?>
                                                <?php echo $app_mockups["description"]; ?>
                                                <div class="custom-saperator"></div>
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <div class="solution-image-box ">
                                                        <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src=" <?php echo $app_mockups["mockup_image"]; ?>" alt="fantasy-sport-solution">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </section>
            </div>
            <!-- ********* solution section end  ********** -->
            <!-- =============== types-of healthcare apps start ============== -->
            <?php 
            $types_of_apps = get_field("types_of_apps"); 
            if( ! empty( $types_of_apps["add_types_of_apps"] ) ): ?>
                <section class="types-of-healthcare common-section">
                    <div class="container">
                        <div class="row types-of-healthcare-heading-box">
                            <div class="col-md-5">
                                <div class="types-of-healthcare-heading">
                                    <h4><?php echo $types_of_appsp["title"] ?></h4>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <p><?php echo $types_of_appsp["description"] ?></p>
                            </div>
                        </div>
                        <div class="custom-saperator"></div>
                        <ul class="types-of-list ">
                            <?php foreach( $types_of_apps["add_types_of_apps"] as $single_type ):  ?>
                                <li>
                                    <h5 class="category-type-of"><?php echo $single_type["apps_for_label"]; ?></h5>
                                    <?php if( ! empty( $single_type["name_of_apps_icon"] )  ): ?>
                                        <ul class="growing-through-dot-list">
                                            <?php foreach( $single_type["name_of_apps_icon"] as $single_nm ): ?>
                                                <li>
                                                    <button><img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_nm["icon"]; ?>" alt="star"><?php echo $single_nm["title"]; ?></button>
                                                </li>
                                        <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section>
            <?php endif; ?>
            <!-- =============== types-of healthcare apps End ============== -->
            <!-- =========== why choose yudiz section start ============ -->
            <?php $why_yudiz = get_field("why_choose_yudiz"); ?>
            <section class="why-choose-yudiz-section common-section secondary-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="why-choose-content">
                                <?php echo $why_yudiz["description"]; ?>
                                <div class="custom-saperator"></div>
                                <div class="theme-btn solid-blue">
                                    <a href="https://www.yudiz.com/get-in-touch/" class="">Talk to our Experts</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-7">
                            <div class="why-choose-content-img">
                                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $why_yudiz["image"]; ?>" alt="why-choose-content-img"/>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- =========== why choose yudiz section End ============ -->
            <?php $helping_compamnies = get_field("helping_compamnies"); ?>
            <!-- ============= Helping Healthcare Companies start ============ -->
            <section class="healthcare-helping-section common-section secondary-bg">
                <div class="container">
                    <h5 class="text-center"><?php echo $helping_compamnies["title"]; ?></h5>
                    <div class="custom-saperator"></div>
                    <?php if( ! empty( $helping_compamnies["add_features"] ) ): ?>
                    <div class="row">
                        <?php foreach( $helping_compamnies["add_features"] as $single_fe ): ?>
                        <div class="col-md-6 healthcare-helping-box">
                            <div class="healthcare-helping-wrapper">
                                <div class="img-healthcare-helping">
                                    <img  class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_fe["icon"]; ?>" alt="app-feature">
                                </div>
                                <div class="desc-healthcare-helping">
                                    <h6><?php echo $single_fe["title"]; ?></h6>
                                    <?php echo $single_fe["description"]; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
            <!-- ============= Helping Healthcare Companies End ============ -->
            <!-- =============== platform-solution section start ================= -->
            <?php 
                $we_deliver = get_field("we_deliver"); 
                if( ! empty( $we_deliver["add_solutions"] )  ):    ?>
                    <section class="platfom-solution-section common-section">
                        <div class="container">
                            <div class="platform-desc-heading">
                                <h4><?php echo $we_deliver["title"]; ?></h4>
                                <div class="custom-saperator"></div>
                                <p><?php echo  $we_deliver["description"]; ?></p>
                            </div>   
                            <div class="custom-saperator"></div>
                            <div class="custom-saperator"></div>
                            <div class="row">
                                <?php foreach( $we_deliver["add_solutions"] as $single_solution ): ?>
                                    <div class="col-md-6 platform-desc-wrapper">
                                        <div class="platform-desc">
                                            <h5><?php echo $single_solution["solution_name"]; ?></h5>
                                            <p><?php echo $single_solution["description"]; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            <!-- =============== platform-solution section End ================= -->
            <!-- =========== 4d what we do section start ================ -->
            <?php 
                $what_we_do = get_field("what_we_do");
                if( ! empty( $what_we_do["add_work"] ) ): ?>
                    <section class="fd-what-we-do-section common-section secondary-bg">
                        <div class="container">
                            <h4 class="text-center"><?php echo $what_we_do["title"]; ?> </h4>
                            <div class="custom-saperator"></div>
                            <div class="custom-saperator"></div>
                            <div class="row">
                                <?php foreach( $what_we_do["add_work"] as $single_work ): ?>
                                    <div class="col-md-3 fd-what-we-do-wrapper">
                                        <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_work["icon"]; ?>" alt="fd-what-we-do-icon"/>
                                        <h5><?php echo $single_work["title"]; ?></h5>
                                        <p><?php echo $single_work["description"]; ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            <!-- =========== 4d what we do section End ================ -->
            <!-- Testimonials Section Start -->
            <?php $testimonials_data = get_field("testimonials_section"); ?>
            <!-- Testimonials Section Start -->
            <div class="common-section home-testimonial-section secondary-bg">
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
            <!-- faq section start -->
            <?php 
                $faq_section = get_field("faq_section");
                if( ! empty( $faq_section["add_q_and_ans"] ) ): ?>
                    <div class="faq-ind-section common-section">
                        <div class="container">
                            <div class="service-title">
                                <h4><?php echo $faq_section["title"]; ?></h4>
                            </div>
                            <div class="unity-game-faq-sec">
                                <dl class="accordion">
                                    <?php foreach( $faq_section["add_q_and_ans"] as $index => $single_que ): ?>
                                    <dt class="<?php echo ( $index == 0 ) ? "current":""; ?>">
                                        <p><a href="javascript:;"><?php echo $single_que["question"]; ?></a></p>
                                    </dt>
                                    <dd class="<?php echo ( $index == 0 ) ? "active":""; ?>">
                                        <?php echo $single_que["answer"];  ?>
                                    </dd>
                                    <?php endforeach; ?>
                                </dl>
                            </div>
                        </div>
                    </div>
            <?php endif; ?>
            <!-- faq section end -->
            <!-- Client Section Start -->
            <section class="secondary-bg  client-logo-new-section">
                <div class="container">
                    <?php echo do_shortcode("[logos slider='yes' category='client' title='Our Clients' subtitle='BADGE WE LIKE TO WEAR']") ?>
                </div>
            </section>
            <!-- Blog Section Start -->
            <section class="home-blog-section">
                    <?php echo do_shortcode('[blog title="Related Healthcare Blogs" sub-title="Interesting reading stuff"]') ?>
            </section>
            <!-- Blog Section End -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->
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
