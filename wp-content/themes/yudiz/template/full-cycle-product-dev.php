<?php
/*
Template Name: Full Cycle Product Development
 */
get_header();
$full_cycle_product_development_setting = get_field("full_cycle_product_development_setting");
$banner_fields = $full_cycle_product_development_setting["banner_fields"];
$client_information_fields = $full_cycle_product_development_setting["client_information_fields"];
$info_section_fields = $full_cycle_product_development_setting["info_section_fields"];
$shape_product_fields = $full_cycle_product_development_setting["shape_product_fields"];
$cta_fourth_fields = $full_cycle_product_development_setting["cta_fourth_fields"];
$cta_first_fields = $full_cycle_product_development_setting["cta_first_fields"];
$cta_last_fields = $full_cycle_product_development_setting["cta_last_fields"];
$service_information_fields = $full_cycle_product_development_setting["service_information_fields"];
$industries_section_fields = $full_cycle_product_development_setting["industries_section_fields"];
$enter_startup_section_fields = $full_cycle_product_development_setting["enter_startup_section_fields"];
$product_development_cycle_fields = $full_cycle_product_development_setting["product_development_cycle_fields"];
$product_fabricated_field = $full_cycle_product_development_setting["product_fabricated_field"];
$awardcontent = $full_cycle_product_development_setting["awardcontent"];
$firstinfobox = $awardcontent['firstinfobox'];
$secondbox = $awardcontent['secondbox'];
$thirdbox = $awardcontent['thirdbox'];
$lastbox = $awardcontent['lastbox'];
$faq_section_title = $full_cycle_product_development_setting["faq_section_title"];
$faq_section_questionanswer = $full_cycle_product_development_setting["faq_section_questionanswer"];
$portfolio_shortcode = get_field("portfolio_shortcode"); 
?>
<main id="main" class="site-main data-to-paste">
    <!-- Service Banner Section Start -->
    <section class="service-banner-section common-section" style="background:url('<?php echo $banner_fields["background_image"]; ?>')no-repeat right center/cover !important;">
        <div class="container">
            <div class="service-bannerbx">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="mid-h1"><?php echo $banner_fields["title"]; ?></h1>
                        <div class="custom-saperator"></div>
                        <?php echo $banner_fields["description"]; ?>
                        <div class="custom-saperator"></div>
                        <div class="theme-btn solid-blue">
                            <a href="<?php echo $banner_fields["button_link"]["url"]; ?>" <?php echo ( $banner_fields["button_link"]["target"] ) ? " target='_blank' " : "" ; ?> ><?php echo $banner_fields["button_link"]["title"]; ?></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-7 service-img-ban">
                        <div class="service-banner-image text-right">
                            <img class="yswp_lazy" data-lzy_src="<?php echo $banner_fields["image"]["url"]; ?>" alt="banner-image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Banner Section End -->
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
    <!-- Information section Start -->
    <section class="information-section common-section-small pb-0">
        <div class="container">
            <div class="info-content-bx">
                <img class='yswp_lazy' src='<?php echo $loading_img; ?>' data-lzy_src='<?php echo $info_section_fields['feature_image']['url']; ?>' alt='<?php echo $info_section_fields['feature_image']['alt']; ?>'/>
                <div class="custom-saperator"></div>
                <div class="row d-flex-wrap align-center">
                    <div class="col-md-6">
                        <h5><?php echo $info_section_fields['title'] ?></h5>
                    </div>
                    <div class="col-md-6">
                        <?php echo $info_section_fields['description']; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Information section End -->
    <!-- Shape-product Section  Start-->
    <section class="shape-product-section common-section">
        <div class="container">
            <div class="img-bx">
                <h3><?php echo $shape_product_fields['title'] ?></h3>
                <img class='yswp_lazy' src='<?php echo $loading_img; ?>' data-lzy_src='<?php echo $shape_product_fields['feature_image']['url']; ?>' alt='<?php echo $shape_product_fields['feature_image']['alt']; ?>'/>
            </div>
            <div class="pm-info-section common-section">
                <div class="row d-flex-wrap align-center">
                    <div class="col-md-6">
                        <h5><?php echo $shape_product_fields['info_box_title'] ?></h5>
                        <div class="custom-saperator"></div>
                        <?php echo $shape_product_fields['description']; ?>
                    </div>
                    <div class="col-md-6">
                        <ul class="mb-0">
                            <?php foreach( $shape_product_fields['pm_characteristics'] as $single_info ): ?>
                                <li>
                                    <img class='yswp_lazy' src='<?php echo $loading_img; ?>' data-lzy_src='<?php echo $single_info['image']['url']; ?>' alt='<?php echo $single_info['image']['alt']; ?>'/>
                                    <div class="info">
                                        <h4><?php echo $single_info['title'] ?></h4>
                                        <?php echo $single_info['description']; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shape-product Section  End-->
    <!-- Cta four Section Start -->
    <section class="cta-four-section common-section-small" style="background-image:url('<?php echo $cta_first_fields['background_image']['url']; ?>');">
        <div class="container">
            <div class="cta-four-ser-conten">
                <div class="row d-flex-wrap">
                    <div class="col-md-7 col-sm-6">
                        <h6><?php echo $cta_first_fields['sub_title']; ?></h6>
                        <h4><?php echo $cta_first_fields['title']; ?></h4>
                    </div>
                    <div class="col-md-5 col-sm-6 text-right">
                        <div class="theme-btn solid-blue">
                            <a <?php echo ( $cta_first_fields["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_first_fields["button_link"]["url"]; ?>"> <?php echo $cta_first_fields["button_link"]["title"]; ?> </a>
                        </div>
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
                    <?php $index=1; $mobindex=1; $lastindex=8; if( ! empty( $service_information_fields["service_boxes"] ) ):
                        foreach( $service_information_fields["service_boxes"] as $single_box ): ?>
                            <div class="col-md-3 col-sm-6 service-item-bx">
                                <div class="service-item-wrp" >
                                    <div class="img-wrp">
                                        <?php echo ( $single_box["icon"]["url"] ) ? "<img src='<?php echo $loading_img; ?>' class='yswp_lazy' data-lzy_src='" . $single_box['icon']['url'] . "' alt='Service Icon'>" : "" ; ?>
                                        <span class="show-desktop">0<?php if($index <=4) { echo $index++;  } else { echo $lastindex--;  }?></span>
                                        <span class="show-mob">0<?php  echo $mobindex++; ?></span>
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
    <!-- vr Inner Industries Section start -->
    <section class="indus-section-vr common-section">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-md-9">
                    <h3><?php echo $industries_section_fields['title']; ?></h3>
                    <div class="custom-saperator"></div>
                    <?php echo $industries_section_fields['description']; ?>
                </div>
            </div>
            <div class="custom-saperator"></div>
            <div class="indus-sec-cont">
                <ul class="mb-0">
                    <?php foreach( $industries_section_fields['indus_box'] as $single_ser ): ?>
                        <li>
                            <a href="<?php echo $single_ser['indus_link']; ?>">
                                <div class="indus-sing">
                                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_ser['image']['url']; ?>" alt="<?php echo $single_ser['image']['alt']; ?>" />
                                <h6><?php echo $single_ser['title']; ?></h6>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <!-- vr Inner Industries Section end -->
    <!-- Cta four Section Start -->
    <section class="cta-four-section common-section-small" style="background-image:url('<?php echo $cta_fourth_fields['background_image']['url']; ?>');">
        <div class="container">
            <div class="cta-four-ser-conten">
                <div class="row d-flex-wrap">
                    <div class="col-md-5 col-sm-6">
                        <h6><?php echo $cta_fourth_fields['sub_title']; ?></h6>
                        <h4><?php echo $cta_fourth_fields['title']; ?></h4>
                        <div class="custom-saperator"></div>
                        <div class="theme-btn solid-blue">
                            <a <?php echo ( $cta_fourth_fields["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_fourth_fields["button_link"]["url"]; ?>"> <?php echo $cta_fourth_fields["button_link"]["title"]; ?> </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 text-center">
                        <?php echo ( $cta_fourth_fields["feature_image"] ) ? "<img class='yswp_lazy' src='<?php echo $loading_img; ?>' data-lzy_src='" . $cta_fourth_fields['feature_image']['url'] . "' alt='yudiz-img' />" : ""; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cta four Section End -->
    <!-- Enterprise and Startup Provider Section Start  -->
    <section class="enterprise-startup-prov common-section">
        <div class="container">
            <div class="row d-flex align-center text-center">
                <div class="col-md-7">
                    <h3><?php echo $enter_startup_section_fields['title']; ?></h3>
                </div>
            </div>
            <div class="custom-saperator"></div><div class="custom-saperator"></div>
            <div class="enterprise-startup-content">
                <div class="row d-flex-wrap">
                    <div class="col-md-7 col-sm-6 enterprise-startup-col">
                        <div class="enterprise-startup-item" style="background-color:<?php echo $enter_startup_section_fields['background_color1']; ?>;">
                            <div class="content">
                                <h4><?php echo $enter_startup_section_fields['title1']; ?></h4>
                                <?php echo $enter_startup_section_fields['description1']; ?>
                            </div>
                            <img class='yswp_lazy' src='<?php echo $loading_img; ?>' data-lzy_src='<?php echo $enter_startup_section_fields['feature_image']['url']; ?>' alt='<?php echo $enter_startup_section_fields['feature_image']['alt']; ?>'/>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6">
                        <div class="enterprise-startup-item" style="background-color:<?php echo $enter_startup_section_fields['background_color2']; ?>;">
                            <div class="content">
                                <h4><?php echo $enter_startup_section_fields['title2']; ?></h4>
                                <?php echo $enter_startup_section_fields['description2']; ?>
                            </div>
                            <img class='yswp_lazy' src='<?php echo $loading_img; ?>' data-lzy_src='<?php echo $enter_startup_section_fields['feature_image2']['url']; ?>' alt='<?php echo $enter_startup_section_fields['feature_image2']['alt']; ?>'/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Enterprise and Startup Provider Section End -->
    <!-- Product Development Cycle Start -->
    <section class="product-development-cycle common-section" style="background:url('<?php echo $product_development_cycle_fields['background_image']; ?>')no-repeat center center/cover;">
        <div class="container">
            <h3 class="text-center"><?php echo $product_development_cycle_fields['title']; ?></h3>
            <div class="product-dev-cycle-content">
                <ul class="dev-cycle">
                    <?php foreach( $product_development_cycle_fields['process_box'] as $single_ser ): ?>
                    <li>
                        <div class="process-box">
                            <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_ser['image']['url']; ?>" alt="<?php echo $single_ser['image']['alt']; ?>" />
                            <h5><?php echo $single_ser['title']; ?></h5>
                            <?php echo $single_ser['description']; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <!-- Product Development Cycle End -->
    <!-- Award Section Start -->
    <section class="award-sec common-section">
        <div class="container">
            <div class="awrd-content">
                <div class="row d-flex-wrap justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="row d-flex-wrap">
                            <div class="col-sm-6 award-box">
                                <div class="awrd-item" style="background:#000;">
                                    <h5><?php echo $firstinfobox['title']; ?></h5>
                                    <ul class="imglist">
                                        <?php foreach( $firstinfobox['award_list'] as $single_info ): ?>
                                            <li>
                                                <img class='yswp_lazy' src='<?php echo $loading_img; ?>' data-lzy_src='<?php echo  $single_info['feature_image']['url']; ?>' alt='<?php echo  $single_info['feature_image']['alt']; ?>'/>
                                                <?php echo $single_info['description']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 award-box blk-box">
                                <div class="awrd-item" style="background:url('https://www.yudiz.com/wp-content/uploads/2023/06/awardbg.webp')no-repeat center center/cover;">
                                    <h5><?php echo $secondbox['title']; ?></h5>
                                    <ul class="imglist">
                                        <?php foreach( $secondbox['award_list'] as $single_info ): ?>
                                            <li>
                                                <img class='yswp_lazy' src='<?php echo $loading_img; ?>' data-lzy_src='<?php echo $single_info['image']['url']; ?>' alt='<?php echo $single_info['image']['alt']; ?>'/>
                                                <?php echo $single_info['description']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 award-box blk-box">
                                <div class="awrd-item" style="background:#D5E3FB;">
                                    <h5><?php echo $thirdbox['title']; ?></h5>
                                    <ul class="expertise-sec">
                                        <?php foreach( $thirdbox['award_list'] as $single_info ): ?>
                                            <li>
                                                <?php echo $single_info['title']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 award-box">
                                <div class="awrd-item" style="background:#000;">
                                    <h5><?php echo $lastbox['title']; ?></h5>
                                    <ul class="imglist">
                                        <?php foreach( $lastbox['award_list'] as $single_info ): ?>
                                            <li>
                                                <img class='yswp_lazy' src='<?php echo $loading_img; ?>' data-lzy_src='<?php echo  $single_info['feature_image']['url']; ?>' alt='<?php echo  $single_info['feature_image']['alt']; ?>'/>
                                                <?php echo $single_info['description']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Award Section End -->
    <!-- Cta four Section Start -->
    <section class="cta-four-section common-section-small" style="background-image:url('<?php echo $cta_last_fields['background_image']['url']; ?>');">
        <div class="container">
            <div class="cta-four-ser-conten">
                <div class="row d-flex-wrap" style="justify-content:start;">
                    <div class="col-md-6 col-sm-8" style="color:rgba(255,255,255,0.6);" >
                        <h4 style="color:#fff;"><?php echo $cta_last_fields['title']; ?></h4>
                        <div class="custom-saperator"></div>
                        <?php echo $cta_last_fields['description']; ?>
                        <div class="custom-saperator"></div>
                        <div class="theme-btn solid-white text-blk">
                            <a <?php echo ( $cta_last_fields["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_last_fields["button_link"]["url"]; ?>"> <?php echo $cta_last_fields["button_link"]["title"]; ?> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cta four Section End -->
    <!-- Product Fabricated Section Start -->
    <section class="product-fabricated-section common-section">
        <div class="container">
           <div class="row">
                <div class="col-md-7">
                    <div class="product-fab-content">
                        <h4><?php echo $product_fabricated_field['title']; ?></h4>
                        <div class="custom-saperator"></div>
                        <?php echo $product_fabricated_field['description']; ?>
                        <ul>
                            <?php foreach( $product_fabricated_field['product_fab_list'] as $single_ser ): ?>
                                <li>
                                    <h5><?php echo $single_ser['title']; ?></h5>
                                    <?php echo $single_ser['description']; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $product_fabricated_field['image']['url']; ?>" alt="<?php echo $product_fabricated_field['image']['alt']; ?>" />
                </div>
           </div>
        </div>
    </section>
    <!-- Product Fabricated Section End -->
    <!-- portfolio Section Start -->
    <section class="home-portfolio-section">
        <?php 
        if($portfolio_shortcode != ''){
            echo do_shortcode($portfolio_shortcode);	
        }else{
            echo do_shortcode('[our-work title="Our Projects" display=4 sub-title="Look at our Dynamic Portfolio" ids=17450,17448,110]');	
        }
        ?>
    <?php //echo do_shortcode('[our-work title="Our Projects" display=4 sub-title="Look at our Dynamic Portfolio" ids=17450,17448,110]') ?>
    </section>  
    <!-- portfoli Section End -->
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
                                <p><a href="javascript:;"><?php echo $index++.'. '; ?><?php echo $single_qa["question"];  ?></a></p>
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
</main>
<?php
get_footer();
?>