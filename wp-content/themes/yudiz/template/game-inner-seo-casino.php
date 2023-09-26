<?php 
/*
    Template Name: Game Inner template (SEO) (Casino)
*/ 
    get_header();
    $loading_img = get_stylesheet_directory_uri() . "/images/loader-new.svg";
?>
<!-- Banner Section Start -->
<?php 
    $banner_section = get_field("banner_section"); 
?>
<?php if( ! empty( $banner_section['background'] ) ): ?>
<section class="casino-banner-section" style="background-image:url('<?php echo $banner_section['background']; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-6 cs-banner-desc">
                <div class="cs-banner-content">
                    <h6><?php echo $banner_section['banner_sub_title']; ?></h6>
                    <h1><?php echo $banner_section['title']; ?></h1>
                    <div class="custom-saperator"></div>
                    <p><?php echo $banner_section['banner_text']; ?></p>
                    <div class="custom-saperator"></div>
                    <div class="theme-btn solid-white text-blk">
                        <a <?php echo ( $banner_section["cta"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $banner_section["cta"]["url"]; ?>"> <?php echo $banner_section["cta"]["title"]; ?> </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-8 cs-banner-imgbox">
                <div class="cs-banner-image text-center">
                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $banner_section['banner_image']; ?>" alt="Banner_Image" />
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- Banner Section End -->
<!-- Statics of page STart-->
<section class="client-stastics-section">
    <div class="container">
        <div class="row d-flex-wrap">
            <div class="col-md-3 col-sm-6 client-sta-box">
                <div class="client-sta-wrap">
                    <img src="https://www.yudiz.com/wp-content/uploads/2023/02/game-inner-sta-projetcs.svg" class="stat-ic" alt="projetcs" />
                    <div class="clnt-sta-desc">
                        <h6>Projects Launched</h6>
                        <span class="cnt-num">3200+</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 client-sta-box">
                <div class="client-sta-wrap">
                    <img src="https://www.yudiz.com/wp-content/uploads/2023/02/game-inner-sta-team.svg" class="stat-ic" alt="team" />
                    <div class="clnt-sta-desc">
                        <h6>Team Strength </h6>
                        <span class="cnt-num">100+</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 client-sta-box">
                <div class="client-sta-wrap">
                    <img src="https://www.yudiz.com/wp-content/uploads/2023/02/game-inner-sta-clnt.svg" class="stat-ic" alt="clnt" />
                    <div class="clnt-sta-desc">
                        <h6>Client Retention Rate</h6>
                        <span class="cnt-num">86%</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 client-sta-box">
                <div class="client-sta-wrap">
                    <img src="https://www.yudiz.com/wp-content/uploads/2023/02/game-inner-sta-exper.svg" class="stat-ic" alt="exper" />
                    <div class="clnt-sta-desc">
                        <h6>Years Experience</h6>
                        <span class="cnt-num">14+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Statics of page End-->
<!-- Game Solution Section Start -->
<?php $game_solutions_data = get_field("game_solutions_data");  
$game_solution_box = $game_solutions_data["game_solution_box"]; 
?>
 <?php if(! empty(  $game_solutions_data['background_image'] )): ?>
<section class="game-solution-section common-section-small" style="background:url('<?php echo $game_solutions_data['background_image'] ?>')no-repeat center center/cover;">
    <div class="container">
        <div class="cs-title-box white-text"> 
            <h2 class="big-h2"><?php echo $game_solutions_data['title']; ?></h2> 
            <div class="custom-saperator"></div>
            <p><?php echo $game_solutions_data['description']; ?></p>
        </div>
        <?php if( $game_solution_box ): ?>
        <div class="game-sol-fe-bx">
            <div class="row d-flex-wrap">
            <?php foreach( $game_solution_box as $single_data ): ?>
                <div class="col-md-3 col-sm-4 game-sol-it-bx">
                    <div class="game-sol-it-wrap">
                        <img src="<?php echo $single_data['icon']; ?>" alt="sneckladders" />
                        <h6><?php echo $single_data['title']; ?></h6>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<!-- Game Solution Section End -->
<!-- CTA Section Start -->
<?php 
    $cta_section_first = get_field("cta_section_first");
?>
<?php if(! empty(  $cta_section_first['background_image'] )): ?>
 <section class="game-inner-cta hire-now-section">
    <div class="hire-now-wrap"  style="background:url('<?php echo $cta_section_first['background_image']; ?>')no-repeat center center/cover;">
        <div class="container">
            <div class="hire-now-content text-center">
                <h6><?php echo $cta_section_first['sub_title']; ?></h6>
                <h3><?php echo $cta_section_first['title']; ?></h3>
                <div class="custom-saperator"></div>
                <div class="wpb_raw_code wpb_content_element wpb_raw_html theme-btn solid-white text-blk text-center">
                    <div class="wpb_wrapper">
                        <a <?php echo ( $cta_section_first["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_section_first["button_link"]["url"]; ?>"> <?php echo $cta_section_first["button_link"]["title"]; ?> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- CTA Section End -->
<!-- Feature Section Start -->
<?php 
    $feature_section = get_field("feature_section"); 
    $feature_list = $feature_section["feature_list"]; 
?>
<?php if( ! empty( $feature_section["feature_list"] )): ?>
<section class="cs-feature-section common-section-small" style="background-image:url('<?php echo $feature_section['background_image']; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-8 cs-feature-img-sec text-center">
                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $feature_section['feature_image']; ?>" alt="feature-casino" />
            </div>
            <div class="col-md-7 cs-feature-desc-sec">
                <h6> <?php echo $feature_section['sub_title']; ?></h6>
                <h2 class="big-h2"><?php echo $feature_section['title']; ?></h2>
                <div class="custom-saperator"></div>
                <p><?php echo $feature_section['description']; ?></p>
                <?php if( $feature_list ): ?>
                <ul class="cs-feature-list two-col-feature">
                    <?php foreach( $feature_list as $single_data ): ?>
                        <li><?php echo $single_data['feature_list_content']; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- Feature Section End -->
<!-- tech and solution start -->
<?php 
    $tech_and_sol_architecture = get_field("tech_and_sol_architecture"); 
    $tech_info = $tech_and_sol_architecture["tech_info"]; 
?>
<?php if( ! empty( $tech_and_sol_architecture["tech_info"] )): ?>
<section class="tech-sol-section common-section-small">
    <div class="container">
        <div class="cs-title-box">
            <h2 class="text-center" style="font-weight:700;"><?php echo $tech_and_sol_architecture['title']; ?></h2>
        </div>
        <div class="tech-sol-box">
        <?php if( $tech_info ): ?>
            <div class="row">
                <?php foreach( $tech_info as $single_data ): ?>
                    <div class="col-md-4 col-sm-4 tech-sol-item">
                        <div class="tech-sol-item-content text-center" style="border-color:<?php echo $tech_and_sol_architecture['border_color']; ?> !important;">
                            <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_data['tech_icon']; ?>" alt="">
                            <h5><?php echo $single_data['tech_label']; ?></h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- tech and solution End -->
<!-- CTA Section Start -->
<?php 
    $cta_section_second = get_field("cta_section_second"); 
?>
<?php if( ! empty( $cta_section_second['background_image'] )): ?>
<section class="game-inner-cta hire-now-section">
    <div class="hire-now-wrap"  style="background:url('<?php echo $cta_section_second['background_image']; ?>')no-repeat center center/cover;">
        <div class="container">
            <div class="hire-now-content text-left col-lg-6">
                <h6><?php echo $cta_section_second['sub_title']; ?></h6>
                <h3><?php echo $cta_section_second['title']; ?></h3>
                <div class="custom-saperator"></div>
                <div class="wpb_raw_code wpb_content_element wpb_raw_html theme-btn solid-white text-blk ">
                    <div class="wpb_wrapper">
                        <a <?php echo ( $cta_section_second["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_section_second["button_link"]["url"]; ?>"> <?php echo $cta_section_second["button_link"]["title"]; ?> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- CTA Section End -->
<!-- Modes of game Section start-->
<?php 
    $modes_of_game_section = get_field("modes_of_game_section"); 
    $mode_box_content = $modes_of_game_section["mode_box_content"]; 
?>
<?php if( ! empty( $modes_of_game_section["mode_box_content"] ) ): ?>
<section class="mode-of-game-section common-section-small" style="background-image:url('<?php echo $modes_of_game_section['background_image']; ?>');">
    <div class="container">
        <div class="cs-title-box">
            <?php if( ! empty( $modes_of_game_section['sub_title'] ) ): ?>
                <h6><?php echo $modes_of_game_section['sub_title']; ?></h6>
            <?php endif; ?>
            <h2 class="big-h2"><?php echo $modes_of_game_section['title']; ?></h2>
            <div class="custom-saperator"></div>
            <?php if( ! empty( $modes_of_game_section['description'] ) ): ?>
                <p><?php echo $modes_of_game_section['description']; ?></p>
            <?php endif; ?>
        </div>
        <div class="common-container-box-style">
            <?php if( $mode_box_content ): ?>
            <div class="row d-flex-wrap">
                <?php foreach( $mode_box_content as $single_data ): ?>
                    <div class="col-md-3 common-box-stly" >
                        <div class="cm-bx-st-content" style="border-color:<?php echo $modes_of_game_section['mode_box_border_color']; ?>;">
                            <div class="cm-bx-img" >
                                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_data['image_icon']; ?>" alt="common" />
                            </div>
                            <div class="cm-bx-desc">
                                <h5><?php echo $single_data['title']; ?></h5>
                                <p><?php echo $single_data['description']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php if( $modes_of_game_section['mode_box_right_shape'] ): ?>
                <div class="img-box">
                    <img  src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $modes_of_game_section['mode_box_right_shape']; ?>" alt="common left" class="common-right-img yswp_lazy" />
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="img-sec-bx">
        <?php if( $modes_of_game_section['left_top_image'] ): ?>
            <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $modes_of_game_section['left_top_image']; ?>" alt="common left" class="common-left-img yswp_lazy" />
        <?php endif; ?>
        <?php if( $modes_of_game_section['background_shape_right_top'] ): ?>
            <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $modes_of_game_section['background_shape_right_top']; ?>" alt="common left" class="bg-right-shape yswp_lazy" />
        <?php endif; ?>
        <?php if( $modes_of_game_section['background_shape_left_bottom'] ): ?>
            <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $modes_of_game_section['background_shape_left_bottom']; ?>" alt="common left" class="bg-left-shape yswp_lazy" />
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<!-- Modes of game Section End-->
<!-- Feature Section Start -->
<?php 
    $how_to_develop_game_section = get_field("how_to_develop_game_section"); 
    $feature_list = $how_to_develop_game_section["feature_list"]; 
?>
<?php if( ! empty( $how_to_develop_game_section["feature_list"]) ): ?>
<section class="cs-feature-section common-section-small flip-feature-bg" style="background-image:url('<?php echo $how_to_develop_game_section['background_image']; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-6 cs-feature-desc-sec white-text">
                <h6> <?php echo $how_to_develop_game_section['sub_title']; ?></h6>
                <h2 class="big-h2" style="color:<?php echo $how_to_develop_game_section['title_color'] ?> !important;"><?php echo $how_to_develop_game_section['title']; ?></h2>
                <div class="custom-saperator"></div>
                <p><?php echo $how_to_develop_game_section['description']; ?></p>
                <?php if( $feature_list ): ?>
                <ul class="cs-feature-list">
                    <?php foreach( $feature_list as $single_data ): ?>
                        <li><?php echo $single_data['feature_list_content']; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <div class="col-md-6 col-sm-8 cs-feature-img-sec text-center">
                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $how_to_develop_game_section['feature_image']; ?>" alt="feature-casino" />
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- Feature Section End -->
<!-- CTA Section Start -->
<?php 
    $cta_section_third = get_field("cta_section_third"); 
?>
<?php if( ! empty( $cta_section_third['background_image']) ): ?>
<section class="game-inner-cta hire-now-section">
    <div class="hire-now-wrap"  style="background:url('<?php echo $cta_section_third['background_image']; ?>')no-repeat center center/cover;">
        <div class="container">
            <div class="hire-now-content text-center">
            <h6><?php echo $cta_section_third['sub_title']; ?></h6>
                <h3><?php echo $cta_section_third['title']; ?></h3>
                <div class="custom-saperator"></div>
                <div class="wpb_raw_code wpb_content_element wpb_raw_html theme-btn solid-white text-blk text-center">
                    <div class="wpb_wrapper">
                        <a <?php echo ( $cta_section_third["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_section_third["button_link"]["url"]; ?>"> <?php echo $cta_section_third["button_link"]["title"]; ?> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- CTA Section End -->
<!-- Development Process Section start-->
<?php 
    $development_process_section = get_field("development_process_section"); 
    $mode_box_content = $development_process_section["mode_box_content"]; 
?>
<?php if( ! empty( $development_process_section["mode_box_content"]) ): ?>
<section class="mode-of-game-section common-section-small" style="background:url('<?php echo $development_process_section['background_image']; ?>')no-repeat center center/cover;">
    <div class="container">
        <div class="cs-title-box">
            <h6><?php echo $development_process_section['sub_title']; ?></h6>
            <h2 class="big-h2"><?php echo $development_process_section['title']; ?></h2>
            <div class="custom-saperator"></div>
            <?php if( $development_process_section['description'] ): ?>
                <p><?php echo $development_process_section['description']; ?></p>
            <?php endif; ?>
        </div>
        <div class="common-container-box-style">
        <?php if( $mode_box_content ): ?>
            <div class="row d-flex-wrap">
                <?php foreach( $mode_box_content as $single_data ): ?>
                    <div class="col-md-3 common-box-stly " >
                        <div class="cm-bx-st-content" style="height:100%; border-color:<?php echo $development_process_section['mode_box_border_color']; ?>; background-color:<?php echo $development_process_section['mode_box_border_color']; ?>;">
                            <div class="cm-bx-img" >
                                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_data['image_icon']; ?>" alt="common" />
                            </div>
                            <div class="cm-bx-desc white-text">
                                <h5><?php echo $single_data['title']; ?></h5>
                                <p><?php echo $single_data['description']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php if( $development_process_section['mode_box_right_shape'] ): ?>
                <div class="img-box">
                    <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $development_process_section['mode_box_right_shape']; ?>" alt="common left" class="common-right-img yswp_lazy" />
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="img-sec-bx">
        <?php if( $development_process_section['left_top_image'] ): ?>
            <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $development_process_section['left_top_image']; ?>" alt="common left" class="common-left-img yswp_lazy" />
        <?php endif; ?>
        <?php if( $development_process_section['background_shape_right_top'] ): ?>
            <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $development_process_section['background_shape_right_top']; ?>" alt="common left" class="bg-right-shape yswp_lazy" />
        <?php endif; ?>
        <?php if( $development_process_section['background_shape_left_bottom'] ): ?>
            <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $development_process_section['background_shape_left_bottom']; ?>" alt="common left" class="bg-left-shape yswp_lazy" />
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<!-- Development Process Section End-->

<!-- Development Cost Section start-->
<?php 
    $development_cost_section = get_field("development_cost_section"); 
    $mode_box_content = $development_cost_section["mode_box_content"]; 
?>
<?php if( ! empty( $development_cost_section["mode_box_content"] )): ?>
<section class="mode-of-game-section cost-box-section common-section-small" style="background-image:url('<?php echo $development_cost_section['background_image']; ?>');">
    <div class="container">
        <div class="cs-title-box">
            <h2 class=" " style="font-weight:700;"><?php echo $development_cost_section['title'] ?></h2>
            <div class="custom-saperator"></div>
            <?php if( $development_cost_section['description'] ): ?>
            <p><?php echo $development_cost_section['description'] ?></p>
            <?php endif; ?>
        </div>
        <div class="common-container-box-style cost-box-section-style">
        <?php if( $mode_box_content ): ?>
            <div class="row" style="position:relative; z-index:20;">
                <?php foreach( $mode_box_content as $single_data ): ?>
                    <div class="col-md-6 common-box-stly " >
                        <div class="cm-bx-st-content d-flex" style="border-color:<?php echo $development_cost_section['mode_box_border_color'] ?>;">
                            <div class="fc-bx-im">
                                <div class="cm-bx-img" >
                                    <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $single_data['image_icon'] ?>" alt="common" />
                                </div>
                                <div class="cm-bx-desc">
                                    <h5><?php echo $single_data['title']; ?></h5>
                                    <?php $list_box = $single_data['list_box'];
                                        ?>
                                        <?php if( $list_box ): ?>
                                    <ul class="cs-feature-list">
                                    <?php foreach( $list_box as $single_list ): ?>
                                        <li><?php echo $single_list['list_content']; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="fc-bx-con">
                                <img src="<?php echo $single_data['right_side_image']; ?>" alt="right image" />
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="img-box">
                <?php if(  $development_cost_section['left_card_shape'] ): ?>
                <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo  $development_cost_section['left_card_shape']; ?>" alt="common left" class="box-left-img yswp_lazy" />
                <?php endif; ?>
                <?php if(  $development_cost_section['right_card_shape'] ): ?>
                    <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo  $development_cost_section['right_card_shape']; ?>" alt="common left" class=" box-right-img yswp_lazy" />
                <?php endif; ?>
            </div>
           <?php endif; ?>
        </div>
    </div>
    <div class="img-sec-bx">
        <?php if( $development_cost_section['left_top_image'] ): ?>
            <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $development_cost_section['left_top_image']; ?>" alt="common left" class="common-left-img yswp_lazy" />
        <?php endif; ?>
        <?php if( $development_cost_section['background_shape_right_top'] ): ?>
            <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $development_cost_section['background_shape_right_top']; ?>" alt="common left" class="bg-right-shape yswp_lazy" />
        <?php endif; ?>
        <?php if( $development_cost_section['background_shape_left_bottom'] ): ?>
            <img src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $development_cost_section['background_shape_left_bottom']; ?>" alt="common left" class="bg-left-shape yswp_lazy" />
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<!-- Development Cost Section End-->
<!-- CTA Section Start -->
<?php 
    $cta_section_fourth = get_field("cta_section_fourth"); 
?>
<?php if( ! empty( $cta_section_fourth['background_image']) ): ?>
<section class="game-inner-cta hire-now-section">
    <div class="hire-now-wrap"  style="background:url('<?php echo $cta_section_fourth['background_image']; ?>')no-repeat center center/cover;">
        <div class="container">
            <div class="hire-now-content text-center">
            <h6><?php echo $cta_section_fourth['sub_title']; ?></h6>
                <h3><?php echo $cta_section_fourth['title']; ?></h3>
                <div class="custom-saperator"></div>
                <div class="wpb_raw_code wpb_content_element wpb_raw_html theme-btn solid-white text-blk text-center">
                    <div class="wpb_wrapper">
                        <a <?php echo ( $cta_section_fourth["button_link"]["target"] ) ? " target='_blank' ":""; ?>  href="<?php echo $cta_section_fourth["button_link"]["url"]; ?>"> <?php echo $cta_section_fourth["button_link"]["title"]; ?> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- CTA Section End -->
<!-- Feature Section Start -->
<?php 
    $why_choose_us_section = get_field("why_choose_us_section"); 
    $feature_list = $why_choose_us_section["feature_list"]; 
?>
<?php if( ! empty( $why_choose_us_section["feature_list"]) ): ?>
<section class="cs-feature-section why-choose-section flip-feature-bg" style="background-image:url('<?php echo $why_choose_us_section['background_image']; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-6 cs-feature-desc-sec why-choose-con-bx">
                <h6> <?php echo $why_choose_us_section['sub_title']; ?></h6>
                <h2 class="big-h2"><?php echo $why_choose_us_section['title']; ?></h2>
                <div class="custom-saperator"></div>
                <p><?php echo $why_choose_us_section['description']; ?></p>
                <?php if( $feature_list ): ?>
                <ul class="cs-feature-list">
                    <?php foreach( $feature_list as $single_data ): ?>
                        <li><?php echo $single_data['feature_list_content']; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <div class="col-md-6 col-sm-8 cs-feature-img-sec text-center">
                <img class="yswp_lazy" src="<?php echo $loading_img; ?>" data-lzy_src="<?php echo $why_choose_us_section['feature_image']; ?>" alt="feature-casino" />
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- Feature Section End -->
<!-- faq section start -->
<?php $faq_section = get_field("faq_section");
    if( ! empty( $faq_section["add_que_and_ans"] ) ): ?>
        <div class="faq-ind-section common-section-small">
            <div class="container">
                <div class="service-title">
                    <h4><?php echo $faq_section["title"]; ?></h4>
                </div>
                <div class="unity-game-faq-sec">
                    <dl class="accordion">
                        <?php foreach( $faq_section["add_que_and_ans"] as $index => $single_que ): ?>
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