<?php 
/*
    Template Name: Service template
*/ 
get_header();
$service_template = get_field("service_template");
$banner_fields = $service_template["banner_fields"];
$client_information_fields = $service_template["client_information_fields"];
$cta_first_fields = $service_template["cta_first_fields"];
$tech_stack_fields = $service_template["tech_stack_fields"];
$techstack_sec_fields = $service_template["techstack_sec_fields"];
$serving_industries_text = $service_template["serving_industries_text"];
$serving_industries_information = $service_template["serving_industries_information"];
$cta_second_fields = $service_template["cta_second_fields"];
$cta_third_fields = $service_template["cta_third_fields"];
$cta_fourth_fields = $service_template["cta_fourth_fields"];
$development_journey_title = $service_template["development_journey_title"];
$development_journey_fields = $service_template["development_journey_fields"];
$why_work_with_fields = $service_template["why_work_with_fields"];
$business_process_title = $service_template["business_process_title"];
$business_process_box = $service_template["business_process_box"];
$faq_section_title = $service_template["faq_section_title"];
$faq_section_questionanswer = $service_template["faq_section_questionanswer"];
$portfolio_shortcode = get_field("portfolio_shortcode"); 
$loading_img = get_stylesheet_directory_uri() . "/images/loader-img.svg";
?>
<main id="main" class="site-main data-to-paste">
<!-- Service Banner Section Start -->
<section class="service-banner-section common-section" style="background-color:<?php echo $banner_fields["background_colour"]; ?> !important;">
    <div class="container">
        <div class="row service-bannerbx">
            <div class="col-md-6 ">
                <h1 class="mid-h1 mb-32"><?php echo $banner_fields["title"]; ?></h1>
                <?php echo $banner_fields["description"]; ?>
                <div class="theme-btn solid-blue mt-32">
                    <a href="<?php echo $banner_fields["button_link"]["url"]; ?>" <?php echo ( $banner_fields["button_link"]["target"] ) ? " target='_blank' " : "" ; ?> ><?php echo $banner_fields["button_link"]["title"]; ?></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-7 service-img-ban">
                <div class="service-banner-image text-center">
                    <img src="<?php echo $loading_img; ?>" class="yswp_lazy" data-lzy_src="<?php echo $banner_fields["image"]["url"]; ?>" alt="banner-image" />
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
    <!-- Service Section Info Start -->
    <section class="service-list-info-section common-section">
        <div class="container">
            <div class="service-content-para">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="service-para-title"><?php echo $client_information_fields["expanding_business_text"]; ?></h3>
                    </div>
                    <div class="col-md-6 para-info-box">
                        <?php echo $client_information_fields["description_1"]; ?>
                    </div>
                </div>
            </div>
            <div class="service-list-content">
                <div class="row d-flex-wrap">
                <?php if( ! empty( $client_information_fields["description_2"] )  ): ?>
                        <div class="col-md-6 list-para-box service-item-bx">
                            <?php echo $client_information_fields["description_2"]; ?>
                        </div>
                    <?php endif; ?>
                    <?php if( ! empty( $client_information_fields["service_boxes"] ) ):
                        foreach( $client_information_fields["service_boxes"] as $single_box ): ?>
                            <div class="col-md-3 col-sm-6 service-item-bx">
                                <div class="service-item-wrp" style="background: <?php echo $single_box["background_colour"]; ?>;">
                                    <div class="img-wrp" style="background: <?php echo $single_box["icon_&_title_colour"]; ?>;">
                                        <?php echo ( $single_box["icon"]["url"] ) ? "<img src='$loading_img' class='yswp_lazy' data-lzy_src='" . $single_box['icon']['url'] . "' alt='Service Icon'>" : "" ; ?>
                                    </div>
                                    <div class="service-item-des">
                                        <h5 style="<?php echo "color: " . $single_box["icon_&_title_colour"] . ";" . " border-color:".$single_box["border_color"] . ";"; ?> "><?php echo $single_box["title"]; ?></h5>
                                        <p style="color: <?php echo $single_box["description_colour"]; ?>"><?php echo $single_box["description"]; ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section Info End -->
    <!-- First Cta Section Start -->
    <section class="service-first-cta common-section-small pt-0">
        <div class="container">
            <div class="service-first-cta-content text-center">
                <h3 class="mb-32"><?php echo $cta_first_fields["title"]; ?></h3>
                <p><?php echo $cta_first_fields["description"]; ?></p>
                <div class="btn-ser-box">
                    <div class="solid-blue theme-btn">
                    <a <?php echo ( $cta_first_fields["button_link_1"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_first_fields["button_link_1"]["url"]; ?>"> <?php echo $cta_first_fields["button_link_1"]["title"]; ?> </a>
                    </div>
                    <div class="solid-white theme-btn text-blk">
                    <a <?php echo ( $cta_first_fields["button_link_2"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_first_fields["button_link_2"]["url"]; ?>"> <?php echo $cta_first_fields["button_link_2"]["title"]; ?> </a>
                    </div>
                </div> 
                <div class="img-pattern-box">
                    <img src="<?php echo $loading_img; ?>" class="yswp_lazy left-pattern" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/left-cta-pattern.webp"  alt="image" />
                    <img src="<?php echo $loading_img; ?>" class="yswp_lazy right-pattern" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/right-cta-pattern.webp" alt="image" />
                </div>      
            </div>
        </div>
    </section>
    <!-- FIrst Cta Section End -->
    <!-- Service Section Tech Stack Start -->
    <?php if( ! empty( $techstack_sec_fields['title'] )  ): ?>
    <section class="service-section-techstack common-section" style="background:#fff;">
        <div class="container">
            <div class="service-tabstack-itembox">
                <div class="row d-flex-wrap align-center">
                    <div class="col-md-6">
                        <div class="service-techstack-content-box ser-tech-box">
                            <h5><?php echo $techstack_sec_fields['title']; ?></h5>
                            <h4><?php echo $techstack_sec_fields['sub_title']; ?></h4>
                            <p><?php echo $techstack_sec_fields['description']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-7 service-tabstack-conbx text-center">
                        <?php echo ( $techstack_sec_fields["feature_image"] ) ? "<img src='$loading_img' class='yswp_lazy' data-lzy_src='".$techstack_sec_fields['feature_image']['url'] ."' alt='industry-website'/>":""; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- Service Section Tech Stack End -->
    <!-- Service Section Tech Stack Start -->
    <?php if( ! empty( $tech_stack_fields["title"] )  ): ?>
    <section class="service-section-techstack common-section">
        <div class="container">
            <h3 class="service-para-title text-center"> <?php echo $tech_stack_fields["title"]; ?> </h3>
            <div class="techstack-content-para list-para-box mt-64">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-0"><?php echo $tech_stack_fields["description_1"]; ?></h4>
                    </div>
                    <div class="col-md-6 ">
                        <p><?php echo $tech_stack_fields["description_2"]; ?></p>
                    </div>
                </div>
            </div>
            <div class="techstacktab-service">
                <div class="tabs-nav-box">
                    <?php 
                        $html_data = "";
                        if( ! empty( $tech_stack_fields["technologies"] ) ): $counter = 0; ?>
                            <ul class="align-center service-techstack-tabbox">
                                <?php foreach( $tech_stack_fields["technologies"] as $single_item ): ++$counter; ?>
                                    <li <?php echo ( $counter === 1 ) ? " class='active' ":""; ?> data-tab="<?php echo $counter; ?>"> 
                                        <div class="service-techstack-item" style="border-color:<?php echo $single_item['colour']; ?>;">
                                            <div class="techtack-tab-icon" style="background-color:<?php echo $single_item['colour']; ?>;">
                                                <?php echo ( $single_item["icon_image"] ) ? "<img class='yswp_lazy' src='$loading_img'  data-lzy_src='" . $single_item['icon_image']['url'] ."' alt='techtack-tab-icon'>" : ""; ?>
                                            </div>
                                            <?php echo ( $single_item['technology_name'] ) ? "<span>" . esc_html( $single_item['technology_name'] ) . "</span>" : ""; ?>
                                        </div>
                                    </li>
                                    <?php ob_start(); // reducing one loop for tab content    ?>
                                        <div id="tab-<?php echo $counter; ?>" class="tab-content-box <?php echo ( $counter === 1 ) ? " active":""; ?>" >
                                            <div class="service-tabstack-itembox">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="service-techstack-content-box">
                                                            <h5><?php echo esc_html( $single_item['technologies_text'] ); ?></h5>
                                                            <?php echo $single_item['technologies_description']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 service-tabstack-conbx">
                                                        <?php if( ! empty( $single_item['technologies_gallery'] ) ): ?>
                                                            <ul class="service-tabstack-techicon">
                                                                <?php foreach( $single_item['technologies_gallery']  as $single_tech_img ):  ?>
                                                                    <li>
                                                                        <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_tech_img["url"]; ?>" alt="<?php echo $single_tech_img["alt"]; ?>">
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $html_data .= ob_get_clean(); ?>
                                <?php endforeach; ?>
                            </ul>
                    <?php endif; ?>
                </div>
                <section class="service-techstack-tabs-content">
                    <?php echo $html_data; ?>
                </section>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- Service Section Tech Stack End -->
    <!-- served in aal industries Section start -->
    <?php if( ! empty( $serving_industries_information )  ): ?>
        <div class="serviced-industries-section-wrapper ">
            <?php foreach( $serving_industries_information as $indx => $single_indus ): ?>
                <?php if($indx == 1): ?>
                    <section class="cta-sec-service-section common-section-small">
                        <div class="container">
                            <div class="cta-sec-ser-content">
                                <div class="row d-flex-wrap align-center">
                                    <div class="col-md-7 col-sm-6">
                                        <h4 class="mb-32"><?php echo $cta_second_fields['title'];?></h4>
                                        <p><?php echo $cta_second_fields['description']; ?></p>
                                        <div class="theme-btn solid-black cta-btn-bx">
                                            <a <?php echo ( $cta_second_fields["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_second_fields["button_link"]["url"]; ?>"> <?php echo $cta_second_fields["button_link"]["title"]; ?> </a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-6 text-right">
                                        <img class='yswp_lazy' src='<?php echo $loading_img; ?>' data-lzy_src='<?php echo $cta_second_fields['feature_image']['url']; ?>' alt='<?php echo $cta_second_fields['feature_image']['alt']; ?>'/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                <section class="serviced-industries-section common-section <?php echo ( $indx % 2 == 1 ) ? " reverse-serv-section ":""; ?>" style="background: <?php echo $single_indus["background_colour"]; ?>;">
                    <div class="container">
                        <?php echo ( $indx == 0 ) ? "<h3 class='service-para-title mb-64 text-center'> $serving_industries_text </h3>":""; ?> 
                        <div class="serviced-indus-wrap">
                            <div class="row d-flex-wrap">
                                <div class="col-md-6 col-sm-7 serviced-indus-itembox">
                                <div class="serviced-indus-imgbox">
                                        <?php echo ( $single_indus["image"] ) ? "<img class='yswp_lazy' src='$loading_img' data-lzy_src='".$single_indus['image']['url'] ."' alt='industry-website'/>":""; ?>
                                </div>
                                </div>
                                <div class="col-md-6 serviced-indus-itembox">
                                    <div class="serviced-indus-box">
                                        <h5><?php echo esc_html( $single_indus["title"] ) ; ?></h5>
                                        <p><?php echo esc_html( $single_indus["description"] ) ; ?></p>
                                        <div class="service-ind-acc-list mt-32">
                                            <?php if( ! empty( $single_indus["tabs_information"] ) ): ?>
                                                <div class="accordion">
                                                    <?php foreach( $single_indus["tabs_information"] as $ind => $single_acco ): ?>
                                                        <div class="title-<?php echo $ind+1; ?> acc-listbox" >
                                                            <a>
                                                                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_acco["image"]["url"]; ?>" alt="<?php echo esc_attr( $single_acco["image"]["alt"] ) ; ?>" /> 
                                                                <span><?php echo esc_html( $single_acco["title"] ); ?></span>
                                                            </a>
                                                            <div class="title-desc">
                                                               <?php echo $single_acco["description"]; ?>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if( ! empty( $single_indus["industries_list_content"] ) ): ?>
                                                <?php echo $single_indus["industries_list_content"]; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <!-- served in aal industries Section End -->
    <!-- Cta Third Start -->
    <section class="cta-third-ser-section common-section-small">
        <div class="container">
            <div class="cta-third-ser-content">
                <div class="row d-flex-wrap align-center">
                    <div class="col-md-8">
                        <div class="cta-third-desc">
                            <h4><?php echo $cta_third_fields['title'];?></h4>
                            <p><?php echo $cta_third_fields['description'];?></p>
                            <div class="theme-btn solid-black cta-thirdbtn-bx">
                                <a <?php echo ( $cta_third_fields["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_third_fields["button_link"]["url"]; ?>"> <?php echo $cta_third_fields["button_link"]["title"]; ?> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                    <?php echo ( $cta_third_fields["feature_image"] ) ? "<img class='yswp_lazy' src='$loading_img' data-lzy_src='".$cta_third_fields['feature_image']['url'] ."' alt='industry-website'/>":""; ?>   
                        <p><?php echo $cta_third_fields['image_description']; ?></p>                          
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cta Third End -->
    <!-- Development Journey Section Start -->
    <section class="development-journey-section" >
        <div class="container common-section">
            <h3 class="service-para-title text-center"> <?php echo $development_journey_title; ?> </h3>
            <div class="deve-jour-content mt-64">
                <?php if( ! empty( $development_journey_fields ) ): ?>
                    <div class="row d-flex-wrap">
                        <?php foreach( $development_journey_fields as $single_jrny ): ?>
                            <div class="col-md-3 col-sm-6 deve-jour-detail text-center">
                                <div class="dev-jour-detailbox ">
                                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_jrny["image"]["url"]; ?>" alt="<?php echo esc_attr( $single_jrny["image"]["alt"] ); ?>" />
                                    <div class="dev-jour-desc">
                                        <h5><?php echo esc_html( $single_jrny["title"] ); ?></h5>
                                        <p><?php echo  esc_html( $single_jrny["description"] ); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Development Journey Section End -->
    <!-- why-work-with-yudiz Section start -->
    <section class="why-work-with-yudiz-section common-section" style="background: linear-gradient(260.5deg, #D9D9DF 11.46%, #F8F6FA 82.97%);">
        <div class="container">
            <div class="why-work-with-yudiz-content">
                <div class="d-flex-wrap ">
                    <div class="why-work-with-yudiz-img">
                        <div class="img-bx">
                            <?php echo ( $why_work_with_fields["image"] ) ? "<img class='yswp_lazy' src='$loading_img' data-lzy_src='" . $why_work_with_fields['image']['url'] . "' alt='yudiz-img' />" : ""; ?>
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
    <!-- Cta four Section Start -->
    <section class="cta-four-section common-section-small" style="background:rgba(0,0,0,0.9);">
        <div class="container">
            <div class="row d-flex-wrap">
                <div class="col-md-5 col-sm-6">
                    <h6><?php echo $cta_fourth_fields['sub_title']; ?></h6>
                    <h4 class="mb-32"><?php echo $cta_fourth_fields['title']; ?></h4>
                    <div class="theme-btn solid-blue">
                        <a <?php echo ( $cta_fourth_fields["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_fourth_fields["button_link"]["url"]; ?>"> <?php echo $cta_fourth_fields["button_link"]["title"]; ?> </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 text-center">
                    <?php echo ( $cta_fourth_fields["feature_image"] ) ? "<img class='yswp_lazy' src='$loading_img' data-lzy_src='" . $cta_fourth_fields['feature_image']['url'] . "' alt='yudiz-img' />" : ""; ?>
                </div>
            </div>
        </div>
        <div class="img-pattern-box">
            <img src="<?php echo $loading_img; ?>" class="yswp_lazy left-pattern" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/cta-last-pattern-bg.webp"  alt="image" />
            <img src="<?php echo $loading_img; ?>" class="yswp_lazy right-pattern" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/cta-last-pattern-bg.webp" alt="image" />
        </div>
    </section>
    <!-- Cta four Section End -->
    <!-- Our Business Process Section start-->
    <section class="our-business-process-section common-section " style="padding-bottom:0;">
        <div class="container">
            <h3 class="sec-title"><?php echo $business_process_title; ?></h3>
            <div class="business-process-wrap">
                <?php if( ! empty( $business_process_box ) ): ?>
                    <div class="row d-flex-wrap">
                        <?php foreach( $business_process_box as $single_busi ): ?>
                            <div class="col-md-3 col-sm-6 business-process-box">
                                <div class="business-process-item"> 
                                    <img class="yswp_lazy" width="100" height="100" src="<?php echo $loading_img; ?>"  data-lzy_src="<?php echo $single_busi["icon"]["url"]; ?>"  alt="icon" />
                                    <h5><?php echo esc_html( $single_busi["title"] );  ?></h5>
                                    <p><?php echo esc_html( $single_busi["description"] );  ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Our Business Process Section End -->
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
        <?php echo do_shortcode('[blog]') ?>
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
    <?php echo do_shortcode('[startconversationcta]'); ?>
    <!-- faq section end -->
</main><!-- .site-main -->

<?php 
get_footer();
?>