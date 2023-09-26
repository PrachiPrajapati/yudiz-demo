<?php 
    /* Template Name: Home New */ 
    get_header(); 
    $loading_img = get_stylesheet_directory_uri() . "/images/loader-new.svg";
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main data-to-paste">
        <?php 
            $banner_options = get_field("banner_options"); 
            $client_information_fields = get_field("client_information_fields"); 
        ?>
        <!-- Banner Section Start -->
        <section class="newhome-banner-section position-relative">
            <!-- <div class="newhome-banner-img desktop-new-banner" <?php// echo ( $banner_options['background_image'] ) ? " style='background-image:url($banner_options[background_image])' " : ""; ?> ></div>
            <div class="newhome-banner-img mobile-new-banner" <?php //echo ( $banner_options['phone_background_image'] ) ? " style='background-image:url($banner_options[phone_background_image])' " : ""; ?> ></div> -->
            <img class="newhome-banner-img desktop-new-banner" src="<?php echo $banner_options['background_image'] ?>"  />
            <img class="newhome-banner-img mobile-new-banner yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $banner_options['phone_background_image'] ?>" />
            <div class="homenew-banner-desc banner-desc-block">
                <h1 class="we-are-h2 mid-h1" data-animated-text="<?php echo $banner_options["animation_text"]; ?>">
                    <?php echo $banner_options["banner_title"]; ?> 
                    <strong id="typingText" class="text_to_animate" >
                        <?php $anim_text_array = explode("|",$banner_options["animation_text"]);  echo ($anim_text_array[0]) ? $anim_text_array[0] : "Yudiz!"; ?>
                    </strong>
                </h1>
                <p><?php echo $banner_options["description"]; ?></p>
                <div class="theme-btn solid-blue">
                    <a <?php echo ( $banner_options["get_in_touch_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $banner_options["get_in_touch_link"]["url"]; ?>"> <?php echo $banner_options["get_in_touch_link"]["title"]; ?> </a>
                </div>
            </div>
            <div class="banner-char-object yswp_lazy">
                <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php //echo home_url(); ?>/wp-content/uploads/2023/07/bones-club-banner-image-final.png" class="pigto-banner-object yswp_lazy" alt="Banner Objects" />
                <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo home_url(); ?>/wp-content/uploads/2022/09/robo-banner-object.webp" class="robo-banner-object yswp_lazy" alt="Banner Objects"/>
                <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo home_url(); ?>/wp-content/uploads/2022/09/girl-banner-object.webp" class="girl-banner-object yswp_lazy"alt="Banner Objects" />
                <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo home_url(); ?>/wp-content/uploads/2022/09/moon-banner-object.webp" class="moon-banner-object yswp_lazy"alt="Banner Objects" />
                <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo home_url(); ?>/wp-content/uploads/2022/09/podium-banner-object.webp" class="podium-banner-object yswp_lazy" alt="Banner Objects"/>
            </div>
            <!-- <div class="mobile-banner-img-bx" style="display:none !important;">
                <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo home_url(); ?>/wp-content/uploads/2023/04/final-banner-img-webp.webp" class="mob-ban-img-home yswp_lazy" alt="Banner Objects" /> 
            </div> -->
        </section>
        <!-- Banner Section End -->
        <!-- Client Section Start -->
        <section class="client-section-box common-section-small  pb-none">
            <div class="container">
                <h6 class="clnt-title"><?php echo $client_information_fields["global_companies_text"]; ?></h6>
                <?php if( ! empty( $client_information_fields["global_companies_image"] ) ): ?>
                    <div class="client-section-content common-section-small">
                        <?php foreach( $client_information_fields["global_companies_image"] as $single_img ): ?>
                            <div class="clien-bx-img">
                                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_img["url"]; ?>" alt="client-bx" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
<!-- Client Section End -->
            <?php the_field('who_we_are'); ?>
            <!-- ******** growing through experience section start ******* -->
            <?php 
                $workspace_slider = get_field("workspace_slider"); 
                if( ! empty( $workspace_slider ) ):  $btn_html = ""; $counter = 0; ?>
                    <section class="growing-through-exp common-section">
                        <div class="container">
                            <div class="growing-through-slider">
                                <?php foreach( $workspace_slider as $single_slide ): ?>
                                    <div>
                                        <div  class="growing-through-box" data-cntr="<?php echo $counter; ?>">
                                            <div class="row">
                                            
                                                <div class="col-md-7 col-sm-6">
                                                    <div class="growing-through-desc-box">
                                                        <h4><?php echo $single_slide["title"]; ?></h4>
                                                        <p><?php echo $single_slide["description"]; ?> </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-sm-6">
                                                    <div class="growing-through-imgbox">
                                                        <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_slide["hero_image"]; ?>" alt="growing-through">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php ob_start(); ?>
                                        <li class="<?php echo ( $counter === 0 ) ? "active":""; ?>" data-cntr="<?php echo $counter; ?>">
                                            <button><img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_slide["tab_icon"]; ?>" alt=""> <?php echo $single_slide["tab_title"]; ?></button>
                                        </li>
                                    <?php $btn_html .= ob_get_clean(); ?>
                                <?php ++$counter; endforeach; ?>
                            </div>
                            <div class="growing-through-slider-dots">
                                <ul class="growing-through-dot-list">
                                <?php echo $btn_html; ?>
                                </ul>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            <!-- ******** growing through experience section End ******* -->
            <!-- Experties Section Start -->
            <?php $expert_section = get_field("we_are_expert_section"); ?>
            <div class="common-section experties-tab-section secondary-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <h6><?php echo $expert_section["title"]; ?></h6>
                            <h2><?php echo $expert_section["sub_title"]; ?></h2>
                        </div>
                    </div>
                    <div class="custom-saperator"></div>
                    <div class="experties-content-box">
                        <?php if( ! empty( $expert_section["expertise_technology"] ) ): $cntr = 1; $content_html = ""; ?>
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="tabs-nav-box">
                                        <ul>
                                            <?php foreach( $expert_section["expertise_technology"] as $sigle_data ): ?>
                                                <li data-tab="<?php echo $cntr; ?>" class="<?php echo ( $cntr === 1 ) ? "active":""; ?>">
                                                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $sigle_data["logo"]; ?>" alt="blockchain-dev">
                                                    <?php echo $sigle_data["technology"]; ?>
                                                </li>
                                                <?php ob_start(); ?>
                                                    <div id="tab-<?php echo $cntr; ?>" class="tab-content-box <?php echo ( $cntr === 1 ) ? " active":""; ?>">
                                                        <div style=" height:100%; display:flex; flex-direction:column; ">
                                                            <div>
                                                                <h3><a href="<?php echo $sigle_data["link_button"]["url"]; ?>"><?php echo $sigle_data["technology"]; ?>    </a></h3>
                                                                <p><?php echo $sigle_data["description"]; ?></p>
                                                                <?php echo $sigle_data["technology_services"]; ?>
                                                                <ul class="experties-tab-technology">
                                                                    <?php foreach( $sigle_data["technology_images"] as $single_img ): ?>
                                                                        <li><img class="yswp_lazy" src="<?php echo $loading_img; ?>"  data-lzy_src="<?php echo $single_img; ?>" alt="<?php echo $sigle_data["technology"]; ?>"></li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            </div>
                                                            <?php if(! empty($sigle_data["link_button"]["url"]) ): ?>
                                                                <div class="theme-btn solid-blue" style="margin-top:auto; margin-bottom:0;">
                                                                    <a <?php echo ($sigle_data["link_button"]["target"]) ? " target='_blank' ":""; ?> href="<?php echo $sigle_data["link_button"]["url"]; ?>">
                                                                        <?php echo $sigle_data["link_button"]["title"] . " " . $sigle_data["technology"]; ?>
                                                                    </a>
                                                                </div>
                                                        <?php endif; ?>
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
            </div>
            <?php 
                $indus_data =  get_field("our_industries_section"); 
                $slider_options = $indus_data["slider_options"];
            ?>
            <!--  ******** solution-product section start ********* -->
            <?php if( $slider_options ): ?>
            <div class="slider-gitext-solution-wrapper solution-gitex-event-slider ">
                <?php foreach( $slider_options as $single_data ): ?>
                    <div>
                        <section class="common-section our-solution-product-section solution-gitex-event <?php echo ( $single_data["is_text_white"] ) ? " white-color ":" black-color "; ?>" <?php echo ( $single_data["background_color"] ) ? " style='background-color:$single_data[background_color];'":""; ?> >
                            <div class="container">
                                <div class="our-solution-gitex-event">
                                    <div class="row">
                                        <div class="col-md-3  sol-description-sec">
                                            <h6><?php echo $indus_data["title"]; ?></h6>
                                            <h2><?php echo $indus_data["sub_title"]; ?></h2>
                                            <div class="custom-saperator"></div>
                                            <h3 style="color:<?php echo ( $single_data["color"] ) ? $single_data["color"] :"#0BFFB6"; ?>;"><a style="color:<?php echo ( $single_data["color"] ) ? $single_data["color"] :"#0BFFB6"; ?>;" href="<?php echo $single_data["industries_page_url"] ?>"><?php echo $single_data["industry_name"]; ?></a></h3>
                                            <p><?php echo $single_data["description"]; ?></p>
                                            <div class="custom-saperator"></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="solution-image-box ">
                                                <?php if( $single_data["industry_image"] ): ?>
                                                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_data["industry_image"]; ?>" alt="fantasy-sport-solution">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="stroke-text-box"><?php echo $single_data["industry_name"]; ?></h2>
                                </div>
                            </div>
                            <img class="white-pattern-img yswp_lazy"   src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo get_stylesheet_directory_uri() ?>/images/home-page-industrie-slider-pattern.webp" alt="">
                            <img class="blk-pattern-img yswp_lazy"   src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo get_stylesheet_directory_uri() ?>/images/homepage-pattern-blk.webp" alt="">
                        </section>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
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
                        <div class="custom-saperator"> </div>
                        <div class="theme-btn solid-blue text-center">
                            <a <?php echo ( $testimonials_data["button_link"]["target"] ) ? " target='_blank'" :""; ?> href="<?php echo $testimonials_data["button_link"]["url"]; ?>"><?php echo $testimonials_data["button_link"]["title"]; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial Section End -->
            <!-- portfolio Section Start -->
            <section class="home-portfolio-section">
                <?php echo do_shortcode('[our-work title="Our Projects" display=4 sub-title="Look at our Dynamic Portfolio" ids=17450,17448,110]') ?>
            </section>
            <!-- portfoli Section End -->
            <!-- News Section Start -->
            <?php 
                 $latest_3args = array(
                    "post_type"      => "newsroom",
                    "post_status"    => 'publish',
                    "posts_per_page" => 3,
                    "paged"          => 1
                );
                $news_query = new WP_Query( $latest_3args );
            ?>
            <div class="common-section home-news-section  secondary-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <h6>we are in</h6>
                            <h2>News</h2>
                        </div>
                    </div>
                    <div class="custom-saperator"></div>
                    <div class="home-news-content">
                        <?php if( $news_query->have_posts() ): ?>
                            <div class="row">
                                <?php while( $news_query->have_posts() ): $news_query->the_post(  ); ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="home-news-box">
                                            <div class="news-top-head">
                                                <div class="news-img-box">
                                                    <img class="yswp_lazy" src="" data-lzy_src="<?php the_post_thumbnail_url(get_the_ID(), "full"  ) ?>" alt="yudiz-in-news">
                                                </div>
                                                <h4 class="home-news-title"> <a class="" href="<?php echo get_the_permalink(); ?>"> <?php the_title(); ?> </a></h4>
                                            </div>
                                            <h6 class="news-publish-date"><?php echo get_the_date("d F Y", get_the_ID() ); ?></h6>
                                        </div>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="custom-saperator"> </div>
                        <div class="custom-saperator"> </div>
                        <div class="theme-btn solid-blue text-center">
                            <!-- <a <?php //echo ($news_section["button_link"]["target"]) ? " target='_blank' ":"";  ?> 
                            href="<?php //echo  $news_section["button_link"]["url"]; ?>"><?php //echo $news_section["button_link"]["title"]; ?></a> -->
                            <a href="https://www.yudiz.com/newsroom">See More</a>
                        </div>
                    </div>
                </div>
                <img loading="lazy" src="<?php echo get_stylesheet_directory_uri() ?>/images/triangle-pattern-news.png" class="triangle-shape-newhome-left" alt="">
            </div>
            <!--News Section End -->
            <!-- Blog Section Start -->
            <section class="home-blog-section">
                <?php echo do_shortcode('[blog title="Our Blog" sub-title="INTERESTING READING STUFF"]') ?>
            </section>
            <!-- Blog Section End -->
            </main><!-- .site-main -->
        </div><!-- .content-area -->
            <!-- Blog Section End -->
<script>
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
            // slick slider active script
            jQuery('.growing-through-slider').on('afterChange', function() {
                    var dataId = jQuery('.growing-through-slider .slick-current').attr("data-slick-index");    
                    jQuery(".growing-through-dot-list li").removeClass("active");
                    jQuery(`.growing-through-dot-list li[data-cntr="${dataId}"]`).addClass("active");
                });
                jQuery(document).on("click",".growing-through-dot-list li", function () {
                    jQuery('.growing-through-slider').slick( 'slickGoTo',jQuery(this).attr('data-cntr') );
                });
            // slick slider active script
            jQuery('.growing-through-slider').on('afterChange', function() {
                var dataId = jQuery('.growing-through-slider .slick-current').attr("data-slick-index");    
                jQuery(".growing-through-dot-list li").removeClass("active");
                jQuery(`.growing-through-dot-list li[data-cntr="${dataId}"]`).addClass("active");
            });
            jQuery(document).on("click",".growing-through-dot-list li", function () {
                jQuery('.growing-through-slider').slick( 'slickGoTo',jQuery(this).attr('data-cntr') );
            });
            /// animation script
            var text = jQuery(".newhome-banner-section .we-are-h2").attr("data-animated-text");
            var textArray = text.split("|");
            if( textArray.length > 0 ){
                var dataText = textArray;
                console.log("animating");
                function typeWriter(text, i, fnCallback) {
                    // chekc if text isn't finished yet
                    if ( text != undefined  && i < (text.length) ) {
                        // add next character to h1
                        document.getElementById("typingText").innerHTML = text.substring(0, i + 1);
                        // wait for a while and call this function again for next character
                        setTimeout(function() {
                            typeWriter(text, i + 1, fnCallback)
                        }, 100);
                    }
                    // text finished, call callback if there is a callback function
                    else if (typeof fnCallback == 'function') {
                        // call callback after timeout
                        setTimeout(fnCallback, 2000);
                    }
                }
                // start a typewriter animation for a text in the dataText array
                function StartTextAnimation(i) {
                    if (typeof dataText[i] == 'undefined') {
                        setTimeout(function() {
                            StartTextAnimation(0);
                        }, 2000);
                    }
                    // check if dataText[i] exists
                    if (dataText[i] != undefined && i < dataText[i].length ) {
                        // text exists! start typewriter animation
                        typeWriter(dataText[i], 0, function() {
                            // after callback (and whole text has been animated), start next text
                            StartTextAnimation(i + 1);
                        });
                    }
                }
                // start the text animation
                StartTextAnimation(0);
            } 
        });
</script>
<?php get_footer(); ?>