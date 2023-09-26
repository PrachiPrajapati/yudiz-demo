<?php
/*
Template Name: Game Inner Service
 */
get_header();
$game_inner_service_setting = get_field("game_inner_service_setting");
$banner_fields = $game_inner_service_setting["banner_fields"];
$client_information_fields = $game_inner_service_setting["client_information_fields"];
$information_section_fields = $game_inner_service_setting["information_section_fields"];
$game_services_fields = $game_inner_service_setting["game_services_fields"];
$cta_first_fields = $game_inner_service_setting["cta_first_fields"];
$game_expertise_fields = $game_inner_service_setting["game_expertise_fields"];
$game_genre_fields = $game_inner_service_setting["game_genre_fields"];
$business_outcomes_fields = $game_inner_service_setting["business_outcomes_fields"];
$faq_section_title = $game_inner_service_setting["faq_section_title"];
$cta_second_fields = $game_inner_service_setting["cta_second_fields"];
$faq_section_questionanswer = $game_inner_service_setting["faq_section_questionanswer"];
$why_work_with_fields = $game_inner_service_setting["why_work_with_fields"];
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
                            <img class="yswp_lazy" data-lzy_src="<?php echo $banner_fields["image"]["url"]; ?>" alt="banner-image" />
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
    <!-- Information content box Start  -->
    <section class="information-section-bx common-section">
        <div class="container">
            <div class="info-content">
                <div class="row d-flex-wrap align-center" style="justify-content:space-between;"> 
                    <div class="col-md-5">
                        <div class="infor-bx">
                            <h3><?php echo $information_section_fields["title"]; ?></h3>
                            <?php echo $information_section_fields["description"]; ?>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-8">
                        <div class="img-info-bx text-right">
                            <img class="yswp_lazy" data-lzy_src="<?php echo $information_section_fields["image"]["url"]; ?>" alt="<?php echo $information_section_fields["image"]["alt"]; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Information content box End  -->
    <!-- Services Game Inner Box Start -->
    <div class="game-inner-service-section common-section pb-0">
        <div class="container">
            <div class="game-in-ser-bx">
                <h3><?php echo $game_services_fields['title']; ?></h3>
                <p><?php echo $game_services_fields['description']; ?></p>
                <div class="serv-game-content mt-64">
                    <div class="row d-flex-wrap">
                        <?php foreach( $game_services_fields['service_box_content'] as $single_ser ): ?>
                            <div class="col-md-6 serv-game-col">
                                <div class="serv-game-det">
                                    <div class="titl">
                                        <h5><?php echo $single_ser['title']; ?></h5>
                                        <img src="<?php echo $single_ser['image']['url']; ?>" alt="<?php echo $single_ser['image']['alt']; ?>" />
                                    </div>
                                    <p><?php echo $single_ser['description']; ?></p>
                                    <div class="ser-shape-bx"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Game Inner Box End -->
    <!-- Cta Section Start -->
    <section class="service-first-cta common-section-small " > 
        <div class="container"> 
            <div class="service-first-cta-content" style="background:url('<?php echo $cta_first_fields["background_image"]; ?>')no-repeat right center/cover"> 
                <div class="row">
                    <div class="col-md-8">
                        <h3><?php echo $cta_first_fields["title"]; ?></h3> 
                        <div class="btn-ser-box">  
                            <div class="solid-cyan theme-btn text-blk"> 
                                <a <?php echo ( $cta_first_fields["button_link_1"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_first_fields["button_link_1"]["url"]; ?>"> <?php echo $cta_first_fields["button_link_1"]["title"]; ?> </a>
                            </div> 
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
    </section>
    <!-- Cta Section End -->
    <!-- Game Experties Section Start -->
    <section class="game-expert-section common-section pt-0">
        <div class="game-expert-bx">
            <div class="expertimg-box">
                <img src="<?php echo $game_expertise_fields['image']['url']; ?>" alt="<?php echo $game_expertise_fields['image']['alt']; ?>" />
            </div>
            <div class="expert-text">
                <div class="experttitle-box">
                    <h3><?php echo $game_expertise_fields['title']; ?></h3>
                </div>
                <ul>
                    <?php $index = 1; foreach(  $game_expertise_fields['expert_content_box'] as $single_count ): ?>
                    <li class="common-section">
                        <span class="count"><?php echo '0'.$index++ ?></span>
                        <div class="title-desc-expert">
                            <h4><?php echo $single_count['title']; ?></h4>
                            <p><?php echo $single_count['description']; ?></p>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <!-- Game Experties Section End -->
    <!-- Game Gerne tab Box Start-->
    <section class="game-gerne-section common-section experties-tab-section ">
        <div class="container">
            <h3 class="mb-32"><?php echo $game_genre_fields["title"]; ?></h3>
            <?php echo $game_genre_fields["description"]; ?>
            <div class="mt-64 experties-content-box game-genre-service-box">
                <?php if( ! empty( $game_genre_fields["expertise_technology"] ) ): $cntr = 1; $content_html = ""; ?>
                    <div class="generes-box">
                        <ul class="row mb-0">
                            <?php foreach( $game_genre_fields["expertise_technology"] as $sigle_data ): ?>
                                <li class="col-md-4 generes-single-col">
                                    <div class="generes-single-content">
                                        <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $sigle_data["logo"]; ?>" alt="blockchain-dev">
                                        <?php echo $sigle_data["technology"]; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Game Gerne tab Box End-->
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
    <!-- Cta Second Section Start -->
    <section class="common-section-small cta-sec-bx text-center" style="background-color:#000;">
        <div class="container"> 
           <div class="row d-flex-wrap justify-content-center">
            <div class="col-md-8 col-sm-11">
                <h3 class="mb-64"><?php echo $cta_second_fields['title'];?></h3>
                <div class="solid-blue theme-btn"> 
                    <a <?php echo ( $cta_second_fields["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_second_fields["button_link"]["url"]; ?>"> <?php echo $cta_second_fields["button_link"]["title"]; ?> </a>
                </div>
            </div>
           </div>
           <div class="img-bx">
                <img class="yswp_lazy cta-img-left" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/05/left-cta-img.webp" alt="banner-image" />
                <img class="yswp_lazy cta-img-right" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/05/right-cta-img.webp" alt="banner-image" />
           </div>
        </div>
    </section>
    <!-- Cta Second Section End -->
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
<script>
    jQuery(document).ready(function () {
        jQuery(".tabs-nav-box li").click(function () {
            // jQuery(".tabs-nav-box ul").toggleClass("expanded-tab");
            var e = jQuery(this).attr("data-tab");
            jQuery(this).addClass("active").siblings().removeClass("active"),
                jQuery("#tab-" + e)
                    .addClass("active")
                    .siblings()
                    .removeClass("active");
        });
        jQuery(".tabs-nav-box ul").click(function () {
            if (jQuery(window).width() < 767)
            {
                jQuery(".tabs-nav-box ul").toggleClass("expanded-tab");
            }
        });
    });
    </script>
<?php
get_footer();
?>