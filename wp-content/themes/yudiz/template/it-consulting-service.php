<?php
/*
Template Name: It Consulting Service
 */
get_header();
$it_consulting_service_setting = get_field("it_consulting_service_setting");
$banner_fields = $it_consulting_service_setting["banner_fields"];
$client_information_fields = $it_consulting_service_setting["client_information_fields"];
$information_section_fields = $it_consulting_service_setting["information_section_fields"];
$cta_fourth_fields = $it_consulting_service_setting["cta_fourth_fields"];
$cta_last_fields = $it_consulting_service_setting["cta_last_fields"];
$service_information_fields = $it_consulting_service_setting["service_information_fields"];
$cta_first_fields = $it_consulting_service_setting["cta_first_fields"];
$feature_section_tab_fields= $it_consulting_service_setting["feature_section_tab_fields"];
$industries_section_fields = $it_consulting_service_setting["industries_section_fields"];
$way_to_reach_success_fields = $it_consulting_service_setting["way_to_reach_success_fields"];
$cta_second_fields = $it_consulting_service_setting["cta_second_fields"];
$business_outcomes_fields = $it_consulting_service_setting["business_outcomes_fields"];
$faq_section_title = $it_consulting_service_setting["faq_section_title"];
$faq_section_questionanswer = $it_consulting_service_setting["faq_section_questionanswer"];
$why_work_with_fields = $it_consulting_service_setting["why_work_with_fields"];
$loading_img = get_stylesheet_directory_uri() ."/images/loader-img.svg";
?>
<main id="main" class="site-main data-to-paste">
    <!-- Banner Section Start -->
    <section class="service-banner-section common-section  inner-service-section " style="background:url('<?php echo $banner_fields["background_image"]; ?>')no-repeat center center/cover !important;">
        <div class="container">
            <div class="service-bannerbx">
                <div class="row d-flex-wrap align-center">
                    <div class="col-md-6 banner-desc-bx" style="color:<?php echo $banner_fields["description_color"]; ?>;">
                        <h1 class="mid-h1 mb-32"><?php echo $banner_fields["title"]; ?></h1>
                        <p ><?php echo $banner_fields["description"]; ?></p>
                        <div class="theme-btn solid-blue mt-32">
                        <a href="<?php echo $banner_fields["button_link"]["url"]; ?>" <?php echo ( $banner_fields["button_link"]["target"] ) ? " target='_blank' " : "" ; ?> ><?php echo $banner_fields["button_link"]["title"]; ?></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-7 service-img-ban">
                        <div class="service-banner-image text-center">
                            <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $banner_fields["image"]["url"]; ?>" alt="banner-image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2><span>IT Consulting</span></h2>
    </section>
    <!-- Banner Section End -->
    <!-- Client Section Start -->
    <section class="client-section-box common-section-small pb-0">
        <div class="container">
            <h6 class="clnt-title"><?php echo $client_information_fields["global_companies_text"]; ?></h6>
            <?php if( ! empty( $client_information_fields["global_companies_image"] ) ): ?>
                <div class="client-section-content common-section-small">
                    <?php foreach( $client_information_fields["global_companies_image"] as $single_img ): ?>
                        <div class="clien-bx-img">
                            <img src="<?php echo $loading_img; ?>" class="yswp_lazy" data-lzy_src="<?php echo $single_img["url"]; ?>" alt="client-bx" />
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Client Section End -->
        <!-- Feature tab Section Start -->
        <section class="feature-tab-section experties-tab-section common-section" style="background:url('<?php echo $feature_section_tab_fields["background_image"]; ?>')no-repeat center center/cover !important;">
            <div class="container">
                <div class="tit-bx">
                    <h3 class="mb-32"><?php echo $feature_section_tab_fields["title"]; ?></h3>
                    <?php echo $feature_section_tab_fields["description"]; ?>
                </div>
                <div class="experties-content-box feature-tab-contentbox">
                    <?php if( ! empty( $feature_section_tab_fields["feature_tab_field_item"] ) ): $index=1; $cntr = 1; $content_html = ""; ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="tabs-nav-box">
                                    <ul>
                                        <?php foreach( $feature_section_tab_fields["feature_tab_field_item"] as $sigle_data ): ?>
                                            <li data-tab="<?php echo $cntr; ?>" class="<?php echo ( $cntr === 1 ) ? "active":""; ?>">
                                                <h5><?php echo '0'.$index++; ?>. <?php echo $sigle_data["feature_title"]; ?></h5>
                                            </li>
                                            <?php ob_start(); ?>
                                                <div id="tab-<?php echo $cntr; ?>" class="tab-content-box <?php echo ( $cntr === 1 ) ? " active":""; ?>">
                                                        <div>
                                                            <h3><?php echo $sigle_data["feature_title"]; ?></h3>
                                                            <?php echo $sigle_data["description"]; ?>
                                                        </div>
                                                </div>
                                            <?php $content_html .= ob_get_clean(); ?>
                                        <?php ++$cntr; endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <section class="experties-tabs-content common-section pt-0">
                                    <?php echo $content_html; ?>
                                </section>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="feature-tab-imgbox">
                        <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $feature_section_tab_fields['image']['url']; ?>" alt="<?php echo $feature_section_tab_fields['image']['alt']; ?>" />
                    </div>
                </div>
            </div>
        </section>
        <!-- Feature tab Section End -->
        <!-- Cta four Section Start -->
        <section class="cta-four-section common-section-small" style="background-image:url('<?php echo $cta_fourth_fields['background_image']['url']; ?>');">
            <div class="container">
                <div class="cta-four-ser-conten">
                    <div class="row d-flex-wrap">
                        <div class="col-md-7 col-sm-7">
                            <h4><?php echo $cta_fourth_fields['title']; ?></h4>
                            <?php echo $cta_fourth_fields['description']; ?>
                            <div class="theme-btn solid-blue mt-32">
                                <a <?php echo ( $cta_fourth_fields["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_fourth_fields["button_link"]["url"]; ?>"> <?php echo $cta_fourth_fields["button_link"]["title"]; ?> </a>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 text-right">
                            <?php echo ( $cta_fourth_fields["feature_image"] ) ? "<img class='yswp_lazy' src='$loading_img
                            ' data-lzy_src='" . $cta_fourth_fields['feature_image']['url'] . "' alt='yudiz-img' />" : ""; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Cta four Section End -->
        <!-- Service Section Info Start -->
        <section class="service-list-info-section common-section">
            <div class="container">
                <div class="service-content-para">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="service-para-title"><?php echo $service_information_fields["expanding_business_text"]; ?></h3>
                        </div>
                        <div class="col-md-6 para-info-box">
                            <?php echo $service_information_fields["description_1"]; ?>
                        </div>
                    </div>
                </div>
                <div class="service-list-content">
                    <div class="row d-flex-wrap">
                        <?php  if( ! empty( $service_information_fields["service_boxes"] ) ):
                            foreach( $service_information_fields["service_boxes"] as $single_box ): ?>
                                <div class="col-md-4 col-sm-6 service-item-bx" >
                                    <div class="service-item-wrp" >
                                        <div class="img-wrp" style="border-color:<?php echo $single_box['color_info']; ?>; background-color:<?php echo $single_box['color_info']; ?>;">
                                            <?php echo ( $single_box["icon"]["url"] ) ? "<img src=' $loading_img' class='yswp_lazy' data-lzy_src='" . $single_box['icon']['url'] . "' alt='Service Icon'>" : "" ; ?>
                                        </div>
                                        <div class="service-item-des">
                                            <h5><?php echo $single_box["title"]; ?></h5>
                                            <p><?php echo $single_box["description"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Service Section Info End -->
        <!-- Way to reach success Start -->
        <section class="way-to-reach-success common-section" style="background:url('<?php echo $way_to_reach_success_fields["background_image"]; ?>')no-repeat center center/cover !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h3><?php echo $way_to_reach_success_fields['title']; ?></h3>
                    </div>
                </div>
                <div class="custom-saperator"></div>
                <div class="way-to-reach-content mt-64">
                    <ul>
                        <?php $index=1; foreach( $way_to_reach_success_fields['consulting_process_box'] as $single_ser ): ?>
                        <li>
                            <div class="way-to-reach-item">
                                <div class="img-box">
                                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_ser['image']['url']; ?>" alt="<?php echo $single_ser['image']['alt']; ?>" />
                                    <div class="cnter">
                                        <span>0<?php echo $index++; ?></span>
                                    </div>
                                </div>
                                <h5><?php echo $single_ser['title']; ?></h5>
                                <?php echo $single_ser['description']; ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Way to reach success End -->
        <!-- Cta four Section Start -->
        <section class="cta-four-section common-section-small" style="background-image:url('<?php echo $cta_last_fields['background_image']['url']; ?>');">
            <div class="container">
                <div class="cta-four-ser-conten">
                    <div class="row d-flex-wrap justify-content-center text-center">
                        <div class="col-md-7">
                            <h4><?php echo $cta_last_fields['title']; ?></h4>
                            <?php echo $cta_last_fields['description']; ?>
                            <div class="theme-btn solid-white text-blk mt-32">
                                <a <?php echo ( $cta_last_fields["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_last_fields["button_link"]["url"]; ?>"> <?php echo $cta_last_fields["button_link"]["title"]; ?> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Cta four Section End -->
        <!-- why-work-with-yudiz Section start -->
        <section class="why-work-with-yudiz-section common-section" style="background: linear-gradient(260.5deg, #D9D9DF 11.46%, #F8F6FA 82.97%);">
            <div class="container">
                <div class="why-work-with-yudiz-content">
                    <div class="d-flex-wrap ">
                        <div class="why-work-with-yudiz-img">
                            <div class="img-bx">
                            <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $why_work_with_fields['image']['url']; ?>" alt="yudiz-img" />
                                <!-- <?php //echo ($why_work_with_fields["image"]) ? "<img class='yswp_lazy' src='<?php echo $loading_img ?>' data-lzy_src='".$why_work_with_fields['image']['url'] . "' alt='yudiz-img' />" : ""; ?>  -->
                            </div>
                        </div>
                        <div class=" why-work-with-yudiz-detail">
                            <div class="why-work-wt-box d-flex-wrap align-center">
                                <div class="why-work-detail-desc">
                                    <h5><?php echo  $why_work_with_fields["title"]; ?></h5>
                                    <p class="bottom-bor"><?php echo  $why_work_with_fields["subtitle"]; ?></p>
                                    <?php echo $why_work_with_fields["work_with_list"]; ?>
                                </div>
                                <div class="why-work-shape-img">
                                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $why_work_with_fields["cta_image"]["url"]; ?>" alt="shape" />
                                    <div class="get-in-touch-arrow-btn ">
                                        <a href="<?php echo $why_work_with_fields["cta_url"]; ?>"><img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/white-arrow.svg" alt="whiote arroe"/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- why-work-with-yudiz Section End -->
        <!-- ********* solution section end  ********** -->
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
                <div class="home-testimonial-content mt-32">
                    <?php if( ! empty( $testimonials_data["select_testimonials"] ) ): ?>
                        <div class="testimony-slider-content">
                            <?php 
                                foreach( $testimonials_data["select_testimonials"] as $single_quote ): 
                                    $content = $single_quote->post_content; ?>
                                    <div>
                                        <div class="client-testimony-box">
                                            <h5 class="client-name-box"><?php echo $single_quote->post_title; ?></h5>
                                            <h6 class="client-country-name"><?php echo get_field("country",$single_quote->ID); ?></h6>
                                            <?php echo apply_filters('the_content', $content); ?>
                                        </div>
                                    </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="theme-btn solid-blue text-center mt-64">
                        <a <?php echo ( $testimonials_data["button_link"]["target"] ) ? " target='_blank'" :""; ?> href="<?php echo $testimonials_data["button_link"]["url"]; ?>"><?php echo $testimonials_data["button_link"]["title"]; ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial Section End -->
        <!-- Blog Section Start -->
        <section class="home-blog-section">
            <?php echo do_shortcode('[blog title="Our Blog" sub-title="INTERESTING READING STUFF"]') ?>
        </section>
        <!-- Blog Section End -->
        <!-- faq section start -->
        <div class="faq-ind-section common-section">
            <div class="container">
                <div class="service-title">
                    <h4><?php echo $faq_section_title; ?></h4>
                </div>
                <div class="unity-game-faq-sec">
                    <?php if( ! empty( $faq_section_questionanswer ) ): ?>
                        <dl class="accordion">
                            <?php $index = 1; foreach( $faq_section_questionanswer as $indx => $single_qa ): ?>
                                <dt <?php echo ( $indx == 0 ) ? "class='current'":""; ?>>
                                    <p><a href="javascript:;"><?php echo $index++.'. '; ?><?php  echo $single_qa["question"];  ?></a></p>
                                </dt>
                                <dd <?php echo ( $indx == 0 ) ? "class='active'":""; ?>>
                                    <p><?php echo $single_qa["answer"];  ?></p>
                                </dd>
                            <?php endforeach; ?>
                        </dl>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</main><!-- .site-main -->
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
    <script>
        jQuery(document).ready(function () {
            jQuery('.testimony-slider-content').slick({
            arrows: true,
            dots: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            pauseOnFocus: false,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    },
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                        arrows: true
                    },
                }
            ]
        });
            jQuery(".tabs-nav-box li").click(function () {
                jQuery(".tabs-nav-box ul").toggleClass("expanded-tab");
                var e = jQuery(this).attr("data-tab");
                jQuery(this).addClass("active").siblings().removeClass("active"),
                    jQuery("#tab-" + e)
                        .addClass("active")
                        .siblings()
                        .removeClass("active");
            });
        });
    </script>
<?php
get_footer();
?>