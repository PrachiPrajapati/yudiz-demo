<?php
/*
Template Name: Inner Service
 */
get_header();
$mobile_inner_service_setting = get_field("mobile_inner_service_setting");
$banner_fields = $mobile_inner_service_setting["banner_fields"];
$client_information_fields = $mobile_inner_service_setting["client_information_fields"];
$experties_section = $mobile_inner_service_setting["experties_section"];
$custom_app_dev_section = $mobile_inner_service_setting["custom_app_dev_section"];
$industries_section_fields = $mobile_inner_service_setting["industries_section_fields"];
$business_outcomes_fields = $mobile_inner_service_setting["business_outcomes_fields"];
$cta_first_fields = $mobile_inner_service_setting["cta_first_fields"];
$cta_second_fields = $mobile_inner_service_setting["cta_second_fields"];
$faq_section_title = $mobile_inner_service_setting["faq_section_title"];
$faq_section_questionanswer = $mobile_inner_service_setting["faq_section_questionanswer"];
$why_work_with_fields = $mobile_inner_service_setting["why_work_with_fields"];
$loading_img = get_stylesheet_directory_uri() ."/images/loader-new.svg";
?>
<main id="main" class="site-main data-to-paste">
    <!-- Service Banner Section Start -->
    <section class="service-banner-section common-section pb-0 inner-service-section" style="background:url('<?php echo $banner_fields["background_image"]; ?>')no-repeat center center/cover !important;">
        <div class="container">
            <div class="service-bannerbx">
                <div class="row">
                    <div class="col-md-7 banner-desc-bx" style="color:<?php echo $banner_fields["description_color"]; ?>;">
                        <h1 class="mid-h1" style="color:<?php echo $banner_fields["title_color"]; ?>;"><?php echo $banner_fields["title"]; ?></h1>
                        <div class="custom-saperator"></div>
                        <p ><?php echo $banner_fields["description"]; ?></p>
                        <div class="custom-saperator"></div>
                        <div class="theme-btn solid-blue">
                        <a href="<?php echo $banner_fields["button_link"]["url"]; ?>" <?php echo ( $banner_fields["button_link"]["target"] ) ? " target='_blank' " : "" ; ?> ><?php echo $banner_fields["button_link"]["title"]; ?></a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-7 service-img-ban">
                        <div class="service-banner-image text-center">
                            <img class="yswp_lazy" data-lzy_src="<?php echo $banner_fields["image"]["url"]; ?>" alt="banner-image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Banner Section End -->
   
        <div class="main-expert-wrap common-section pt-0">
            <div class="inner-exper-wrapbox">
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
            <div class="experties-box-content common-section">
                <div class="container">
                    <div class="expert-col-wrap">
                        <div class="title-expe-sec">
                            <h2><?php echo $experties_section["title"]; ?></h2>
                        </div>
                        <div class="experties-item-col-wrap <?php $cnt = $experties_section['experties_count']; if($cnt==1) { echo 'odd'; } else { echo 'even'; } ?> " >
                            <div class="row d-flex-wrap">
                            <?php foreach( $experties_section['expertise_box_content'] as $single_exper ): ?>
                                <div class="col-sm-6 experties-item-col">
                                    <div class="experties-it-bx">
                                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_exper["expertise_icon"]["url"]; ?>" alt="<?php echo esc_attr( $single_exper["expertise_icon"]["alt"] ); ?>" />
                                        <h5><?php echo esc_html( $single_exper["title"] ); ?></h5>
                                        <?php echo $single_exper["description"] ?>
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
        <!-- Cta Section Start -->
        <section class="service-first-cta common-section-small " > 
            <div class="container"> 
                <div class="service-first-cta-content text-center" style="background:url('<?php echo $cta_first_fields["background_image"]; ?>')no-repeat center center/cover"> 
                    <h3><?php echo $cta_first_fields["title"]; ?></h3> 
                    <div class="btn-ser-box">  
                        <div class="solid-white theme-btn text-blk"> 
                            <a <?php echo ( $cta_first_fields["button_link_1"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_first_fields["button_link_1"]["url"]; ?>"> <?php echo $cta_first_fields["button_link_1"]["title"]; ?> </a>
                        </div> 
                    </div> 
                </div> 
            </div> 
        </section>
        <!-- Cta Section End -->
        <!-- custom app development start -->
        <section class="custom-development-box common-section">
            <div class="container">
                <div class="custom-dev-wrapper">
                    <div class="row">
                        <div class="col-lg-10">
                            <h2><?php echo $custom_app_dev_section['title'] ?></h2>
                            <p><?php echo $custom_app_dev_section['description'] ?></p>
                        </div>
                    </div>
                    <div class="inner-services-sec">
                        <div class="row d-flex-wrap">
                            <?php $index = 1; foreach( $custom_app_dev_section['custom_app_feature_box'] as $single_cus ): ?>
                                <div class="col-md-4 inner-services-bx" style="background-color:<?php echo $custom_app_dev_section['background_color']; ?>;">
                                    <div class="inner-services-custom-dev">
                                        <div class="inner-title-bx d-flex-wrap">
                                            <span><?php echo '0'.$index++ ?></span> <h5><?php echo $single_cus['title'] ?></h5>
                                        </div>
                                        <p><?php echo $single_cus['description'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- custom app development End -->
        <!-- industries experties Section start -->
        <div class="indus-expert-sec common-section">
            <div class="container">
                <div class="indus-exper-content">
                    <div class="indus-title-box">
                        <h3><?php echo $industries_section_fields['title'] ?></h3>
                    </div>
                    <div class="wrapper-data-col">
                        <ul class="wrapper-data-indus">
                            <?php foreach( $industries_section_fields['industries_data'] as $single_indus ): ?>
                            <li>
                                <a href="<?php if($single_indus['page_link']) { echo $single_indus['page_link']; } else { echo 'javascript:void(0);'; } ?>">
                                    <div class="indus-ex-bx">
                                        <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_indus["icon"]["url"]; ?>" alt="<?php echo esc_attr( $single_indus["icon"]["alt"] ); ?>" />
                                        <h5> <?php echo $single_indus['title'] ?></h5>
                                    </div>
                                </a>
                            </li>  
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- industries experties Section End -->
        <!-- Business Outcomes Section start -->
        <div class="business-outcomes-sec common-section">
            <div class="container">
            <div class="row d-flex-wrap" style="justify-content:center;">
                    <div class="col-md-11 col-lg-10 text-center">
                        <div class="business-outcom-bx">
                            <h2><?php echo $business_outcomes_fields['title'] ?></h2>
                            <div class="custom-saperator"></div>
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
        <!-- Cta Second Start -->
        <section class="service-sec-cta common-section " > 
            <div class="container"> 
                <div class="service-sec-cta-content " style="background:url('<?php echo $cta_second_fields['background_image'];?>')no-repeat center center/cover"> 
                    <div>
                        <h3><?php echo $cta_second_fields['title'];?></h3> 
                        <div class="d-flex-wrap sec-btn-right">
                            <p><?php echo $cta_second_fields['description']; ?></p>
                            <div class="btn-ser-box mt-0">  
                                <div class="solid-black theme-btn text-white"> 
                                    <a <?php echo ( $cta_second_fields["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_second_fields["button_link"]["url"]; ?>"> <?php echo $cta_second_fields["button_link"]["title"]; ?> </a>
                                </div> 
                            </div>
                        </div>
                    </div> 
                    <div class="img-box">
                        <img class='yswp_lazy' data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/04/cta-top-line-vec.svg" alt="img box" />
                    </div>
                </div> 
            </div> 
        </section>
        <!-- Cta Second End -->
        <!-- portfolio Section Start -->
        <section class="home-portfolio-section">
            <?php echo do_shortcode('[our-work title="Our Projects" display=4 sub-title="Look at our Dynamic Portfolio" ids=17450,17448,110]') ?>
        </section>
        <!-- portfoli Section End -->
        <!-- Why Work Yudiz -->
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
                                <?php foreach( $faq_section_questionanswer as $indx => $single_qa ): ?>
                                    <dt <?php echo ( $indx == 0 ) ? "class='current'":""; ?>>
                                        <p><a href="javascript:;"><?php echo $single_qa["question"];  ?></a></p>
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
            <!-- faq section end -->
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