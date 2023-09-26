<?php
/* Template Name: Home Final*/
get_header();
$loading_img = get_stylesheet_directory_uri() . "/images/loader-img.svg";
$home_template = get_field("home_template");
$banner_fields = $home_template["banner_fields"];
$client_information_fields = $home_template["client_information_fields"];
$counter_fields = $home_template["counter_fields"];
$who_we_are_fields = $home_template["who_we_are_fields"];
$service_section_fields = $home_template["service_section_fields"];
$our_mission_fields = $home_template["our_mission_fields"];
$industries_section_fields = $home_template["industries_section_fields"];
$about_section_fields = $home_template["about_section_fields"];
$award_section_fields = $home_template["award_section_fields"];
$testimonials_section_fields = $home_template["testimonials_section_fields"];
$work_section_fields = $home_template["work_section_fields"];
?>
<main id="main" class="site-main">
    <!-- Banner Section Start -->
    <section class="banner-section">
        <div class="container">
            <div class="row d-flex-wrap align-center">
                <div class="col-md-6 banner-desc">
                    <h1 class="mid-h1"><?php echo $banner_fields["title"]; ?></h1>
                    <?php echo $banner_fields["description"]; ?>
                    <div class="theme-btn solid-blue">
                        <a href="<?php echo $banner_fields["button_link"]["url"]; ?>" <?php echo ( $banner_fields["button_link"]["target"] ) ? " target='_blank' " : "" ; ?> ><?php echo $banner_fields["button_link"]["title"]; ?></a>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $banner_fields["image"]["url"]; ?>" alt="<?php echo $banner_fields["image"]["alt"]; ?>" />
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->
    <!-- Client Section Start -->
    <section class="client-section-box common-section-small  pb-none">
        <div class="container">
            <h6 class="clnt-title"><?php echo $client_information_fields["global_companies_text"]; ?></h6>
            <?php if (!empty($client_information_fields["global_companies_image"])): ?>
                <div class="client-section-content common-section-small">
                    <?php foreach ($client_information_fields["global_companies_image"] as $single_img): ?>
                        <div class="clien-bx-img">
                            <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_img["url"]; ?>" alt="client-bx" />
                        </div>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div>
    </section>
    <!-- Client Section End -->
    <!-- Counter Section Start -->
    <section class="counter-section common-section">
        <div class="container">
            <div class="counter-detail">
                <div class="row">
                    <?php foreach( $counter_fields as $single_count ): ?>
                        <div class="col-sm-4 cuntr-col text-center">
                            <div class="cuntr-box">
                                <h5><?php echo $single_count['label']; ?></h5>
                                <h3><?php echo $single_count['count']; ?></h3>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="extra-img-box">
                    <img class="yswp_lazy left-img"  src="<?php echo $loading_img; ?>" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/extra-shape-conter-homenew.svg" alt="shape" />
                    <img class="yswp_lazy right-img"  src="<?php echo $loading_img; ?>" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/extra-shape-conter-homenew.svg" alt="shape" />
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Section End -->
    <!-- who we are section start -->
    <section class="who-we-are-section common-section">
        <div class="container">
            <div class="row d-flex-wrap align-center">
                <div class="col-md-6 who-we-col">
                    <div class="who-we-text">
                        <div class="title-box">
                            <h6><?php echo $who_we_are_fields["sub_title"]; ?></h6>
                            <h3><?php echo $who_we_are_fields["title"]; ?></h3>
                        </div>
                        <?php echo $who_we_are_fields["description"]; ?>
                        <div class="theme-btn solid-blue mt-32">
                            <a href="<?php echo $who_we_are_fields["button_link"]["url"]; ?>" <?php echo ( $who_we_are_fields["button_link"]["target"] ) ? " target='_blank' " : "" ; ?> ><?php echo $who_we_are_fields["button_link"]["title"]; ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 our-feature-col">
                    <ul class="feature-box">
                        <?php foreach( $who_we_are_fields['who_we_are_feature'] as $single_field ): ?>
                            <li>
                                <div class="img-box">
                                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_field["image"]["url"]; ?>" alt="<?php echo $single_field["image"]["alt"]; ?>" />
                                </div>
                                <div class="desc-bx">
                                    <h4><?php echo $single_field["title"]; ?></h4>
                                    <?php echo $single_field["description"]; ?>
                                </div>
                                <div class="img-extra">
                                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_field["shape_image"]["url"]; ?>" alt="<?php echo $single_field["shape_image"]["alt"]; ?>" />
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="img-extra">
                        <img class="yswp_lazy img-top-dotted"  src="<?php echo $loading_img; ?>" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/dotted-patt-homenew.svg" alt="shape" />
                        <img class="yswp_lazy img-bottom-dotted"  src="<?php echo $loading_img; ?>" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/dotted-patt-homenew.svg" alt="shape" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- who we are section End -->
    <!-- Service Section Start -->
    <section class="service-section common-section">
        <div class="container">
            <div class="title-box text-center bg-drk">
                <h6><?php echo $service_section_fields["sub_title"]; ?></h6>
                <h3><?php echo $service_section_fields["title"]; ?></h3>
            </div>
            <div class="row service-provide-box d-flex-wrap">
                <?php foreach( $service_section_fields['service_box'] as $single_ser ): ?>
                    <div class="col-md-4 col-sm-6 service-provide-col">
                        <div class="service-colbox">
                            <div class="img-box">
                                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_ser["image"]["url"]; ?>" alt="<?php echo $single_ser["image"]["alt"]; ?>" />
                            </div>
                            <div class="desc-bx">
                                <h5><?php echo $single_ser["title"]; ?></h5>
                                <?php echo $single_ser["description"]; ?>
                            </div>
                        </div>
                        <a class="linebtn" href="<?php echo $single_ser["button_link"]["url"]; ?>" <?php echo ( $single_ser["button_link"]["target"] ) ? " target='_blank' " : "" ; ?> ><?php echo $single_ser["button_link"]["title"]; ?><img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/08/text-btn-arrow.svg" alt="Arrow" /></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Service Section End -->
    <!-- our mission Section Start  -->
    <section class="our-mission-section common-section">
        <div class="container">
            <div class="row our-mission-sec d-flex-wrap align-center">
                <div class="col-md-6 img-box">
                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $our_mission_fields["image"]["url"]; ?>" alt="<?php echo $our_mission_fields["image"]["alt"]; ?>" /> 
                </div>
                <div class="col-md-6 our-mission-desc">
                    <div class="title-box">
                        <h6><?php echo $our_mission_fields["sub_title"]; ?></h6>
                        <h3><?php echo $our_mission_fields["title"]; ?></h3>
                    </div>
                    <?php echo $our_mission_fields["description"]; ?>
                    <div class="theme-btn solid-blue mt-32">
                        <a href="<?php echo $our_mission_fields["button_link"]["url"]; ?>" <?php echo ( $our_mission_fields["button_link"]["target"] ) ? " target='_blank' " : "" ; ?> ><?php echo $our_mission_fields["button_link"]["title"]; ?></a>
                    </div>
                </div>
            </div>
        </div>
        <img class="yswp_lazy mission-map"  src="<?php echo $loading_img; ?>" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/our-offering-map-homenew.webp" alt="our mission" />
        <img class="yswp_lazy mission-shape"  src="<?php echo $loading_img; ?>" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/bottom-right-shape.svg" alt="our mission" />
    </section>
    <!-- our mission Section End  -->
    <!-- Industries Section Start -->
    <section class="industries-section">
        <div class="container">
            <div class="indus-sec-box">
                <div class="indus-ele">
                    <div class="title-box text-center bg-drk">
                        <h6><?php echo $industries_section_fields["sub_title"]; ?></h6>
                        <h3><?php echo $industries_section_fields["title"]; ?></h3>
                    </div>
                    <?php echo $industries_section_fields["description"]; ?>
                </div>
                <ul class="industry-elements">
                    <?php foreach( $industries_section_fields['industries_box'] as $single_ind ): ?>
                        <li>
                            <a href="<?php echo $single_ind["industries_link"]; ?>">
                                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_ind["image"]["url"]; ?>" alt="<?php echo $single_ind["image"]["alt"]; ?>" />
                                <h5><?php echo $single_ind["title"]; ?></h5> 
                            </a>    
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <img class="yswp_lazy indus-img right-bot-ind"  src="<?php echo $loading_img; ?>" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/left-top-indus-shape.svg" alt="our mission" />
        <img class="yswp_lazy indus-img  left-top-ind"  src="<?php echo $loading_img; ?>" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/right-bottom-indus-shape.svg" alt="our mission" />
    </section>
    <!-- Industries Section End -->
    <!-- About Us Section Start -->
    <section class="about-us-section common-section">
        <div class="container">
            <div class="row about-detail d-flex-wrap align-center">
                <div class="col-lg-6 about-desc">
                    <div class="title-box">
                        <h6><?php echo $about_section_fields["sub_title"]; ?></h6>
                        <h3><?php echo $about_section_fields["title"]; ?></h3>
                    </div>
                    <?php echo $about_section_fields["description"]; ?>
                    <div class="theme-btn solid-blue">
                        <a href="<?php echo $about_section_fields["button_link"]["url"]; ?>" <?php echo ( $about_section_fields["button_link"]["target"] ) ? " target='_blank' " : "" ; ?> ><?php echo $about_section_fields["button_link"]["title"]; ?></a>
                    </div>
                </div>
                <div class="col-lg-6 about-col-main">
                    <div class="row about-colbox d-flex-wrap">
                        <?php foreach( $about_section_fields['about_box'] as $single_abt ): ?>
                            <div class="col-sm-6 about-col">
                                <div class="about-det-box">
                                    <h5><?php echo $single_abt["title"]; ?></h5>
                                    <div class="img-box">
                                        <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_abt["image"]["url"]; ?>" alt="<?php echo $single_abt["image"]["alt"]; ?>" />
                                    </div>
                                    <?php echo $single_abt["description"]; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->
    <!-- Award Section start -->
    <section class="award-section common-section">
        <div class="container">
            <div class="title-box text-center">
                <h6><?php echo $award_section_fields["sub_title"]; ?></h6>
                <h3><?php echo $award_section_fields["title"]; ?></h3>
            </div>
            <div class="row d-flex-wrap">
                <?php foreach( $award_section_fields['awardbox'] as $single_awd ): ?>
                    <div class="col-md-4 col-sm-6 award-box">
                        <div class="awrd-item">
                            <h5><?php echo $single_awd["title"]; ?></h5>
                            <ul class="imglist">
                                <?php foreach( $single_awd['award_list'] as $single_box ): ?>
                                    <li>
                                        <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_box["feature_image"]["url"]; ?>" alt="<?php echo $single_box["feature_image"]["alt"]; ?>" />
                                        <p><?php echo $single_box["description"]; ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Award Section End -->
    <!-- Testimonials Section Start -->
    <section class="testimonials-section common-section">
        <div class="container">
            <div class="title-box bg-drk">
                <h6><?php echo $testimonials_section_fields["sub_title"]; ?></h6>
                <h3><?php echo $testimonials_section_fields["title"]; ?></h3>
            </div>
            <div class="testimonial-det">
                <div class="row d-flex-wrap ">
                    <?php foreach( $testimonials_section_fields['testimony_box'] as $single_test ): ?>
                        <div class="col-lg-3 col-sm-6 testimonial-col">
                            <div class="testimonial-box">
                                <p><?php echo $single_test["description"]; ?></p>
                                <div class="testimony-box">
                                    <div class="name-client-box">
                                        <h4><?php echo $single_test["client_name"]; ?></h4>
                                        <h5><?php echo $single_test["country_name"]; ?></h5>
                                    </div>
                                    <span class="first-let" style="background-color:<?php echo $single_test["color_box"]; ?>;"> <?php echo $single_test["client_name"][0]; ?> </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class=" text-center">
                <div class="theme-btn solid-blue ">
                    <a href="https://www.yudiz.com/testimonials/">See More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section End -->
    <!-- Work Section Start -->
    <section class="work-section common-section">
        <div class="container">
            <div class="title-box text-center">
                <h6><?php echo $work_section_fields["sub_title"]; ?></h6>
                <h3><?php echo $work_section_fields["title"]; ?></h3>
            </div>
            <ul class="work-box-det">
                <?php foreach( $work_section_fields['work_box'] as $single_work ): ?>
                    <li class="row d-flex-wrap align-center">
                        <div class="col-md-6 port-desc-box">
                            <div class="img-bx">
                                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_work["icon"]["url"]; ?>" alt="<?php echo $single_work["icon"]["alt"]; ?>" />
                            </div>
                            <h5><?php echo $single_work["title"]; ?></h5>
                            <p><?php echo $single_work["description"]; ?></p>
                            <div class="theme-btn solid-blue ">
                                <a href="<?php echo $single_work["button_link"]["url"]; ?>" <?php echo ( $single_work["button_link"]["target"] ) ? " target='_blank' " : "" ; ?> ><?php echo $single_work["button_link"]["title"]; ?></a>
                            </div>
                        </div>
                        <div class="col-md-6 port-img-box">
                            <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_work["image"]["url"]; ?>" alt="<?php echo $single_work["image"]["alt"]; ?>" />
                            <ul class="keypoints-list">
                                <?php foreach( $single_work['work_list'] as $single_list ): ?>
                                    <li><?php echo $single_list["title"]; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <!-- Work Section End -->
    <!-- News Section Start -->
    <?php 
        $latest_3args = array(
        "post_type"      => "newsroom",
        "post_status"    => 'publish',
        "posts_per_page" => 2,
        "paged"          => 1
        );
        $news_query = new WP_Query( $latest_3args );
    ?>
    <section class="news-section common-section">
        <div class="container">
            <div class="title-box text-center">
                <h6>News & Article</h6>
                <h3>We're Making Headlines </h3>
            </div>
            <?php if( $news_query->have_posts() ): ?>
                <div class="row d-flex-wrap">
                    <?php while( $news_query->have_posts() ): $news_query->the_post(  ); ?>
                        <div class="col-sm-6 homenews-col">
                            <div class="home-news-box">
                                <div class="news-img-box">
                                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php the_post_thumbnail_url(get_the_ID(), "full"  ) ?>" alt="yudiz-in-news">
                                    <!-- <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2023/07/image-14383.png" alt="yudiz-in-news"> -->
                                </div>
                                <div class="news-desc-box">
                                    <h4 class="home-news-title"> <a class="" href="<?php echo get_the_permalink(); ?>"> <?php the_title(); ?> </a></h4>
                                    <p><?php echo get_the_excerpt(); ?></p>
                                    <div class="readmorelink">
                                        <a href="<?php echo get_the_permalink(); ?>" class="linebtn" >Explore More <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/08/text-btn-arrow.svg" alt="Arrow" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- News Section End -->
    <!-- Blog Post Section Start -->
    <?php 
        $latest_2args = array(
        "post_type"      => "post",
        "post_status"    => 'publish',
        "posts_per_page" => 3,
        "paged"          => 1
        );
        $blog_query = new WP_Query( $latest_2args );
    ?>
    <section class="blog-post-section common-section-small">
        <div class="container">
            <div class="title-box text-center">
                <h6>Our Blogs</h6>
                <h3>Technically Speaking</h3>
            </div>
            <div class="blog-post-box">
                <?php if( $blog_query->have_posts() ): ?>
                    <div class="row d-flex-wrap">
                        <?php while( $blog_query->have_posts() ): $blog_query->the_post(  ); ?>
                            <div class="col-md-4 col-sm-6 homeblogpost-col">
                                <div class="home-blogpost-box">
                                    <div class="blogpost-img-box">
                                        <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php the_post_thumbnail_url(get_the_ID(), "full"  ) ?>" alt="yudiz-in-blogpost">
                                        <h6 class="blog-publish-date"><?php echo get_the_date("d F Y", get_the_ID() ); ?></h6>
                                    </div>
                                    <div class="blogpost-desc-box">
                                        <small class="cat-bx" style="color:<?php echo get_field('colortext'); ?>; background-color:<?php echo get_field('bg_color'); ?>;">
                                            <?php //$blog_categories = get_the_category(); echo $blog_categories[0]->name; 
                                                $blog_categories = get_the_category();
                                                $lastElement = end($blog_categories);
                                                foreach ($blog_categories as $value) {
                                                    echo $value->name;
                                                    if($value == $lastElement){
                                                        echo '';
                                                    }else{
                                                        echo ', ';
                                                    }
                                                }
                                            ?>
                                        </small>
                                        <h4 class="home-blogpost-title"> 
                                            <a class="" href="<?php echo get_field('blog_url'); ?>"> <?php the_title(); ?> </a>
                                        </h4>
                                        <p><?php echo get_the_excerpt(); ?></p>
                                        <div class="blog-box-author">
                                            <div class="auth-img">
                                                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo get_field('author_image'); ?>" alt="Author image">
                                            </div>
                                            <div class="writer-data">
                                                <p><a href="<?php echo esc_url( get_field('author_url') );  ?>"><?php echo get_field('blog_author'); ?></a></p>
                                                <small><?php echo get_field('author_designation'); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="theme-btn solid-blue text-center">
                    <a href="https://blog.yudiz.com/">See More</a>
                </div>
        </div>
    </section>
    <!-- Blog Post Section End -->
    <div id="get-in-touch-scroll" class="common-section">
        <div class="get-project-section text-center">
            <h6>Let’s create something Amazing</h6>
            <h2>Start a Conversation</h2>
            <div class="custom-saperator"> </div>
            <div class="theme-btn bordered-black">
                <a class="talk-btn" data-href="https://www.yudiz.com/get-in-touch/">Talk with us</a>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>