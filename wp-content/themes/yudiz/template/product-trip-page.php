<?php
/*
Template Name: Product Trip Page
 */
get_header();
$product_trip_setting = get_field("product_trip_setting");
$banner_fields = $product_trip_setting["banner_fields"];
$client_information_fields = $product_trip_setting["client_information_fields"];
$information_section_fields = $product_trip_setting["information_section_fields"];
$services_fields = $product_trip_setting["services_fields"];
$cta_first_fields = $product_trip_setting["cta_first_fields"];
$product_fields = $product_trip_setting["product_fields_"];
$industries_section_fields = $product_trip_setting["industries_section_fields"];
$why_work_with_fields = $product_trip_setting["why_work_with_fields"];
$cta_second_fields = $product_trip_setting["cta_second_fields"];
$faq_section_title = $product_trip_setting["faq_section_title"];
$faq_section_questionanswer = $product_trip_setting["faq_section_questionanswer"];
$loading_img = get_stylesheet_directory_uri() ."/images/loader-img.svg";
?>
<main id="main" class="site-main data-to-paste">
    <!-- Banner Section Start -->
    <section class="product-trip-banner-section " style="background:url('<?php echo $banner_fields["background_image"]; ?>')no-repeat center center/cover;">
        <div class="container">
            <div class="product-trip-bannerbx">
                <div class="row d-flex-wrap">
                    <div class="col-md-6 col-sm-8 banner-desc-bx" style="color:<?php echo $banner_fields["description_color"]; ?>;">
                        <h1 class="mid-h1"><?php echo $banner_fields["title"]; ?></h1>
                        <?php echo $banner_fields["description"]; ?>
                        <div class="theme-btn solid-blue">
                        <a href="<?php echo $banner_fields["button_link"]["url"]; ?>" <?php echo ( $banner_fields["button_link"]["target"] ) ? " target='_blank' " : "" ; ?> ><?php echo $banner_fields["button_link"]["title"]; ?></a>
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
                    <div class="row d-flex-wrap align-center" > 
                        <div class="col-md-7">
                            <div class="infor-bx">
                                <h3><?php echo $information_section_fields["title"]; ?></h3>
                                <div class="custom-saperator"></div>
                                <?php echo $information_section_fields["description"]; ?>
                                <div class="custom-saperator"></div>
                                <div class="white-box">
                                    <?php echo $information_section_fields["extra_white_box_info"]; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-8">
                            <div class="img-info-bx text-right">
                                <img class="yswp_lazy" data-lzy_src="<?php echo $information_section_fields["image"]["url"]; ?>" alt="<?php echo $information_section_fields["image"]["alt"]; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Information content box End  -->
        <!-- Our Products Section Start -->
        <section class="our-product-trip-section common-section">
            <div class="container">
                <div class="tit-bx text-center">
                    <h3><?php echo $product_fields['title']; ?></h3>
                    <div class="custom-saperator"></div>
                    <?php echo $product_fields['description']; ?>
                </div>
                <div class="custom-saperator"></div>
                <div class="custom-saperator"></div>
                <div class="product-trip-content" >
                    <div class="row d-flex-wrap" id="product-trip-content">
                    <?php //if( have_rows($product_fields['product_box']) ): $total = count(get_field($product_fields['product_box'])); $count = 0; $number = 8; while ( have_rows($product_fields['product_box']) ) : the_row(); ?>
                    <?php $total = count($product_fields['product_box']); $count = 0; $number = 5;
                    foreach( $product_fields['product_box'] as $single_product ):   ?>
                        <div class="col-md-4 col-sm-6 product-trip-col">
                            <div class="product-trip-box">
                                <div class="product-detail-img">
                                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_product['image']['url']; ?>" alt="<?php echo $single_product['image']['alt']; ?>" /> 
                                </div>
                                <div class="prod-desc-box">
                                    <h5><?php echo $single_product['title']; ?></h5>
                                    <h6><?php echo $single_product['category']; ?></h6>
                                    <?php echo $single_product['description']; ?>
                                    <ul>
                                        <?php foreach( $single_product['keypoints'] as $single_key ): ?>
                                            <li><?php echo $single_key['title']; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php 
                        if ($count == $number) {
                            // we've shown the number, break out of loop
                            break;
                        }
                        $count++;
                    endforeach; ?>
                        <?php
                         ?>							
                        <!-- <?php  //endwhile;
                        //endif;
                        ?> -->
                    </div>
                    <input type="hidden" id="newoffset" name="offset" value="<?php echo $number + 1; ?>">
                    <div class="theme-btn solid-blue product-load-more text-center">
                        <a id="product-load-more"  href="javascript: my_repeater_show_more();" <?php if ($total < $count) { ?> style="display: none;"<?php } ?>>View more</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Products Section End -->
        <!-- Full Phase of Product Cycle Start -->
        <!-- Experties Section Start -->
        <?php $expert_section = $product_trip_setting["full_phase_product_cycle_fields"]; ?>
            <div class=" experties-tab-section product-cycle-section">
                <div class="container">
                    <div class="row d-flex-wrap">
                        <div class="col-lg-8 col-md-9 common-section">
                            <h2><?php echo $expert_section["title"]; ?></h2>
                            <div class="custom-saperator"></div>
                            <div class="custom-saperator"></div>
                            <div class="experties-content-box product-cycle-contentbox">
                                <?php if( ! empty( $expert_section["product_cycle_item"] ) ): $cntr = 1; $content_html = ""; ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="tabs-nav-box">
                                                <ul>
                                                    <?php foreach( $expert_section["product_cycle_item"] as $sigle_data ): ?>
                                                        <li data-tab="<?php echo $cntr; ?>" class="<?php echo ( $cntr === 1 ) ? "active":""; ?>">
                                                            <h5><?php echo $sigle_data["technology"]; ?></h5>
                                                            <p><?php echo $sigle_data["description"]; ?></p>
                                                        </li>
                                                        <?php ob_start(); ?>
                                                            <div id="tab-<?php echo $cntr; ?>" class="tab-content-box <?php echo ( $cntr === 1 ) ? " active":""; ?>">
                                                                <div style=" height:100%; display:flex; flex-direction:column; ">
                                                                    <div>
                                                                        <h3><?php echo $sigle_data["technology"]; ?>  </h3>
                                                                        <?php echo $sigle_data["technology_services"]; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php $content_html .= ob_get_clean(); ?>
                                                    <?php ++$cntr; endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <section class="experties-tabs-content">
                                                <?php echo $content_html; ?>
                                            </section>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 product-cycle-imgbox">
                            <div class="product-cycle-img text-right">
                                <img class="yswp_lazy shapeimg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/05/product-cycle-shape.svg" alt="product cycle shape" />
                                <img class="yswp_lazy mainimg" data-lzy_src="<?php echo $expert_section["image"]["url"]; ?>" alt="<?php echo $expert_section["image"]["alt"]; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Full Phase of Product Cycle End -->
        <!-- Cta Section Start -->
        <section class="service-first-cta design-second-cta  common-section-small " > 
            <div class="container"> 
                <div class="service-first-cta-content text-center" style="background:url('<?php echo $cta_second_fields["background_image"]; ?>')no-repeat right center/cover"> 
                    <div class="row d-flex-wrap justify-content-center">
                        <div class="col-md-7">
                            <h3><?php echo $cta_second_fields["title"]; ?></h3>
                            <?php echo $cta_second_fields["description"]; ?>
                            <div class="btn-ser-box">
                                <div class="solid-blue theme-btn"> 
                                    <a <?php echo ( $cta_second_fields["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_second_fields["button_link"]["url"]; ?>"> <?php echo $cta_second_fields["button_link"]["title"]; ?> </a>
                                </div> 
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
        <script>
            function my_repeater_show_more() {
                var my_repeater_field_post_id = <?php echo $post->ID; ?>;
                var my_repeater_field_offset = jQuery('#newoffset').val();
                var my_repeater_field_nonce = '<?php echo wp_create_nonce('my_repeater_field_nonce'); ?>';
                var my_repeater_ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
                var my_repeater_more = true;
                // make ajax request
                jQuery.post(
                    my_repeater_ajax_url, {
                        // this is the AJAX action we set up in PHP
                        'action': 'my_repeater_show_more',
                        'post_id': my_repeater_field_post_id,
                        'offset': my_repeater_field_offset,
                        'nonce': my_repeater_field_nonce
                    },
                    function (json) {
                        // add content to container
                        // this ID must match the containter 
                        // you want to append content to
                        jQuery('#product-trip-content').append(json['content']);
                        // update offset
                        // my_repeater_field_offset = json['offset'];
                        console.log(json['offset']);
                        jQuery('#newoffset').val(json['offset']);
                        // see if there is more, if not then hide the more link
                        //console.log(json['more']);
                        if (json['more'] == json['total']) {
                            // this ID must match the id of the show more link
                            jQuery('.product-load-more').css('display', 'none');
                            jQuery('#product-load-more').css('display', 'none');
                        }
                    },
                    'json'
                );
            }
        </script>
            <script type="text/javascript">
                jQuery(document).ready(function () {
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
</main><!-- .site-main -->
<?php
get_footer();
?>