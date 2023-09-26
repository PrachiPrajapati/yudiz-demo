<?php
/*
Template Name: Virtual Inner Service
 */
get_header();
$virtual_inner_service_setting = get_field("virtual_inner_service_setting");
$banner_fields = $virtual_inner_service_setting["banner_fields"];
$client_information_fields = $virtual_inner_service_setting["client_information_fields"];
$services_fields = $virtual_inner_service_setting["services_fields"];
$cta_first_fields = $virtual_inner_service_setting["cta_first_fields"];
$feature_section_fields = $virtual_inner_service_setting["feature_section_fields"];
$industries_section_fields = $virtual_inner_service_setting["industries_section_fields"];
$business_outcomes_fields = $virtual_inner_service_setting["business_outcomes_fields"];
$cta_first_fields = $virtual_inner_service_setting["cta_first_fields"];
$faq_section_title = $virtual_inner_service_setting["faq_section_title"];
$cta_second_fields = $virtual_inner_service_setting["cta_second_fields"];
$faq_section_questionanswer = $virtual_inner_service_setting["faq_section_questionanswer"];
$why_work_with_fields = $virtual_inner_service_setting["why_work_with_fields"];
$loading_img = get_stylesheet_directory_uri() ."/images/loader-img.svg";
?>
<main id="main" class="site-main data-to-paste">
    <!-- Banner Section Start -->
    <section class="service-banner-section common-section  inner-service-section game-inner" style="background:url('<?php echo $banner_fields["background_image"]; ?>')no-repeat center center/cover !important;">
        <div class="container">
            <div class="service-bannerbx">
                <div class="row d-flex-wrap align-center">
                    <div class="col-md-7 banner-desc-bx" style="color:<?php echo $banner_fields["description_color"]; ?>;">
                        <h1 class="mid-h1 mb-32"><?php echo $banner_fields["title"]; ?></h1>
                        <p ><?php echo $banner_fields["description"]; ?></p>
                        <div class="theme-btn solid-blue mt-32">
                            <a href="<?php echo $banner_fields["button_link"]["url"]; ?>" <?php echo ( $banner_fields["button_link"]["target"] ) ? " target='_blank' " : "" ; ?> ><?php echo $banner_fields["button_link"]["title"]; ?></a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-7 service-img-ban">
                        <div class="service-banner-image text-center">
                            <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $banner_fields["image"]["url"]; ?>" alt="banner-image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- VR Services Section Start-->
    <section class="vr-service-section common-section pb-0">
        <div class="container">
            <h3 class="mb-32"><?php echo $services_fields['title']; ?></h3>
            <?php echo $services_fields['description']; ?>
            <div class="vr-inner-service-box">
                <div class="row d-flex-wrap">
                    <?php foreach( $services_fields['service_box'] as $single_ser ): ?>
                        <div class="col-md-4 col-sm-6 vr-inner-ser-col">
                            <div class="vr-inner-ser-box">
                                <div class="inner-ser-img" style=" background-color:<?php echo $single_ser['title_bg_color']; ?>;">
                                    <div class="img-bx" style=" border-color:<?php echo $single_ser['title_bg_color']; ?>;">
                                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_ser['image']['url']; ?>" alt="<?php echo $single_ser['image']['alt']; ?>" />
                                    </div>
                                    <h5><?php echo $single_ser['title']; ?></h5>
                                </div>
                                <?php echo $single_ser['description']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- VR Services Section End -->
    <!-- Cta Section Start -->
    <section class="service-first-cta common-section-small " > 
        <div class="container"> 
            <div class="service-first-cta-content" style="background:url('<?php echo $cta_first_fields["background_image"]; ?>')no-repeat right center/cover"> 
                <div class="row">
                    <div class="col-md-7">
                        <h3><?php echo $cta_first_fields["title"]; ?></h3>
                        <?php echo $cta_first_fields["description"]; ?>
                        <div class="btn-ser-box">  
                            <div class="solid-blue theme-btn"> 
                                <a <?php echo ( $cta_first_fields["button_link_1"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_first_fields["button_link_1"]["url"]; ?>"> <?php echo $cta_first_fields["button_link_1"]["title"]; ?> </a>
                            </div> 
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
    </section>
    <!-- Cta Section End -->
    <!-- vr Inner Industries Section start -->
    <section class="indus-section-vr feature-vr-section common-section" style="background:none;">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-md-11">
                    <h3 class="mb-32"><?php echo $feature_section_fields['title']; ?></h3>
                    <?php echo $feature_section_fields['description']; ?>
                </div>
            </div>
            <div class="feature-vr-inner mt-64">
                <div class="row d-flex-wrap">
                    <?php foreach( $feature_section_fields['feature_box'] as $single_feature ): ?>
                        <div class="col-md-4 col-sm-6 feature-inner-col">
                            <div class="feature-inner-content">
                                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_feature['image']['url']; ?>" alt="<?php echo $single_feature['image']['alt']; ?>" /> 
                                <h5><?php echo $single_feature['title']; ?></h5>
                                <?php echo $single_feature['description']; ?>
                            </div>                            
                        </div>
                    <?php endforeach; ?>
                    </div>
            </div>
        </div>
    </section>
    <!-- vr Inner Industries Section end -->
    <!-- vr Inner Industries Section start -->
    <section class="indus-section-vr common-section">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-md-9">
                    <h3 class="mb-32"><?php echo $industries_section_fields['title']; ?></h3>
                    <?php echo $industries_section_fields['description']; ?>
                </div>
            </div>
            <div class="indus-sec-cont mt-32">
                <ul class="mb-0">
                    <?php foreach( $industries_section_fields['indus_box'] as $single_ser ): ?>
                        <li>
                            <div class="indus-sing">
                                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_ser['image']['url']; ?>" alt="<?php echo $single_ser['image']['alt']; ?>" />
                                <h6><?php echo $single_ser['title']; ?></h6>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <!-- vr Inner Industries Section end -->
    <!-- Business Outcomes Section start -->
    <div class="business-outcomes-sec common-section">
        <div class="container">
            <div class="row d-flex-wrap" style="justify-content:center;">
                    <div class="col-md-11 col-lg-10 text-center">
                        <div class="business-outcom-bx">
                            <h2 class="mb-32"><?php echo $business_outcomes_fields['title'] ?></h2>
                            <p><?php echo $business_outcomes_fields['description'] ?></p>
                            <div class="business-outcomes-box">
                                <div class="busi-outcom-col">
                                    <div class="row d-flex-wrap ">
                                        <?php foreach( $business_outcomes_fields['counter_fields'] as $single_count ): ?>
                                            <div class="col-sm-4 busi-out-col">
                                                <div class="busi-outcom-content">
                                                    <h3><?php echo $single_count['counter_number'] ?></h3>
                                                    <span><?php echo $single_count['title'] ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- Business Outcomes Section End -->
    <!-- Cta Section Start -->
    <section class="service-first-cta common-section-small " style="background:url('<?php echo $cta_second_fields["background_image"]; ?>')no-repeat center center/cover !important"> 
        <div class="container"> 
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-6 col-md-5 col-sm-5">
                    <h3 class="mb-32"><?php echo $cta_second_fields["title"]; ?></h3>
                    <div class="btn-ser-box">  
                        <div class="solid-cyan theme-btn text-blk"> 
                            <a <?php echo ( $cta_second_fields["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_second_fields["button_link"]["url"]; ?>"> <?php echo $cta_second_fields["button_link"]["title"]; ?> </a>
                        </div> 
                    </div>
                </div>
            </div> 
        </div> 
    </section>
    <!-- Cta Section End -->
    <!-- portfolio Section Start -->
    <section class="home-portfolio-section">
        <?php echo do_shortcode('[our-work title="Our Projects" display=4 sub-title="Look at our Dynamic Portfolio" ids=17450,17448,110]') ?>
    </section>
    <!-- portfoli Section End -->
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
<?php
get_footer();
?>