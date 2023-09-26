<?php 
    $news_terms = get_terms(
        array(
            'taxonomy'   => 'newsroom',
            'hide_empty' => false,
        )
    );
    $current_new_obj = ( get_queried_object()->term_id ) ? get_queried_object() :  false ;
    $selected_dt = ( isset( $_GET["news-yr"] ) && ! empty( trim( $_GET["news-yr"] ) ) ) ? $_GET["news-yr"]: false ; 
    $posts = get_posts(
                array(
                    'post_status'   => 'publish',
                    'post_type'     => 'newsroom', 
                    'numberposts'   => -1
                )
            );
    $years = [];
    // seperate posts by years
    foreach($posts as $post){
        $year = date('Y', strtotime($post->post_date));
        if( ! isset( $years[$year] ) ) $years[$year] = [];
        array_push($years[$year], $post->post_date );
    }
    $latest_args = array(
        "post_type"      => "newsroom",
        "post_status"    => 'publish',
        "posts_per_page" => 1,
        "paged"          => 1
    );
    if( $current_new_obj ){
        $latest_args["tax_query"] = array(
            array(
                'taxonomy' => 'newsroom',
                'field'    => 'slug',
                'terms'    => $current_new_obj->slug
            ),
        );
    }
    if( $selected_dt ){
        $latest_args["date_query"] = array(
            array( 'year' => $selected_dt    )
        );
    }
    $news_query = new WP_Query( $latest_args );
    $latest_post = ( $news_query->have_posts(  ) ) ? $news_query->posts[0] : false;
    if( $latest_post )  $latest_args["post__not_in"] = array( $latest_post->ID );
    $latest_args["posts_per_page"] = 9;
    $news_query = new WP_Query( $latest_args );
    $hidden_html = "";
    $hidden_html .= ( $selected_dt ) ? "<input type='hidden' name='filter-year' value='$selected_dt' >":"" ;
    $hidden_html .= ( $current_new_obj ) ? "<input type='hidden' name='filter-tax' value='$current_new_obj->slug' >":"" ;
    $hidden_html .= ( $latest_post ) ? "<input type='hidden' name='hidden_id' value='$latest_post->ID' >":"" ;
    $query_para = ( $selected_dt ) ? "?news-yr=$selected_dt" : '';
    $loading_img = get_stylesheet_directory_uri() . "/images/loader-new.svg";
?>
<div id="primary" class="content-area news-listing-page news-page">
    <main id="main" class="site-main">
        <div class="container">
            <div class="news-listing-heading">
                <h1 class="mid-h1">News Center</h1>
                    <div class="newstabs-nav-box">
                        <?php if( ! empty( $news_terms ) ): ?>
                            <ul class="news-nav-tabs">
                                <li <?php echo ( $current_new_obj === false ) ? ' class="active" ':''; ?>><a href="<?php echo home_url("newsroom/$query_para"); ?>">In the News</a></li>
                                <?php foreach( $news_terms  as $single_term ): ?>
                                    <li <?php echo ( $current_new_obj->term_id == $single_term->term_id ) ? ' class="active" ':''; ?> >
                                    <a href="<?php echo get_term_link( $single_term ) . $query_para; ?>"><?php echo $single_term->name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="filter-select">
                            <form id="filter-form">
                                    <select name="news-yr" id="submit-year">
                                        <?php if( ! empty( $years ) ): ?>
                                            <option value="" <?php echo ( $selected_dt === false ) ? " selected ":""; ?>  > Filter by year  </option>
                                            <?php foreach( $years as $single_yr => $posts ){
                                                echo "<option ". (   $selected_dt == $single_yr  ? " selected " : "" ) . " value='$single_yr'>" . $single_yr ."</option>";
                                            } ?>
                                        <?php endif; ?>
                                    </select>
                            </form>
                        </div>
                    </div>
            </div>
            <div class="news-content-box">
                <section class="news-tabs-content">
                    <div  class="tabcontentbox active">
                        <ul class="news-content-wrapper">
                            <?php if( $latest_post ) : $terms = get_the_terms( $latest_post->ID, 'newsroom' ); $fst_term = ( is_array( $terms ) ) ? array_pop($terms)->name : ''; ?>
                                <li>
                                    <div class="news-content-box">
                                        <div class="newsimgbox">
                                            <img src="<?php echo  get_the_post_thumbnail_url( $latest_post->ID, 'full'  ); ?>" alt="news-img"/>
                                        </div>
                                        <div class="news-content-desc">
                                            <h5 class="category-news"><?php echo $fst_term; ?></h5>
                                            <h4><a href="<?php echo get_the_permalink( $latest_post ); ?>"><?php echo get_the_title( $latest_post ); ?></a></h4>
                                            <p class="news-date"><?php echo get_the_date( 'd F Y', $latest_post ) ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php if( $news_query->have_posts() ):
                                    while( $news_query->have_posts() ): $news_query->the_post(  );
                                        $terms = get_the_terms( get_the_ID(  ) , 'newsroom' ); $fst_term = ( is_array( $terms ) ) ? array_pop($terms)->name : '';  ?>
                                        <li>
                                            <div class="news-content-box">
                                                <div class="newsimgbox">
                                                    <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="news img"/>
                                                </div>
                                                <div class="news-content-desc">
                                                    <h5 class="category-news"><?php echo $fst_term; ?></h5>
                                                    <h4><a href="<?php echo get_the_permalink(); ?>"><?php the_title( ); ?></a></h4>
                                                    <p class="news-date"><?php echo get_the_date( 'd F Y' ); ?></p>
                                                </div>
                                            </div>
                                        </li>
                            <?php endwhile; wp_reset_postdata(  ); endif; ?>
                        </ul>
                        <div class="loadr_svg_img text-center d-none" > 
                            <img height="200" width="200" src="<?php echo $loading_img; ?>" alt="loading-svg">
                        </div>
                        <div class="<?php echo ( $news_query->max_num_pages > 1 ) ? "":"d-none"; ?> btn_cstm_div theme-btn solid-blue text-center" data-maxpage="<?php echo $news_query->max_num_pages; ?>" >
                            <div class="custom-saperator"></div>
                                <form id="load-more-form">
                                    <?php echo $hidden_html; ?>
                                    <input type="hidden" name="action" value="yspl_news_loadmore">
                                    <input type="hidden" id="next_page_id" name="page" value="2">
                                    <button type="submit" >See More</button>
                                    <!-- <a href="javascript:;">See More</a> -->
                                </form>
                            <div class="custom-saperator"></div>
                        </div>              
                    </div>
                </section>
            </div>
        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->
<script>
jQuery(document).on('change','#submit-year', function () {
    jQuery("#filter-form").submit(); 
});
jQuery(document).on("submit",'#load-more-form', function (e) {
    e.preventDefault();
    var target_div = jQuery(".btn_cstm_div");
    jQuery(".loadr_svg_img").removeClass("d-none");
    target_div.addClass('d-none');
    var max_page = target_div.attr('data-maxpage');
    var next_page = jQuery("#next_page_id").val();
    jQuery.ajax({
        type: "POST",
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        data:  jQuery(this).serialize(),
        success: function (response) {
            jQuery(".news-content-wrapper").append( response.html_resp )
            jQuery("#next_page_id").val(++next_page);
            if( max_page >= next_page ){
                jQuery(".btn_cstm_div").removeClass('d-none');
            }
            jQuery(".loadr_svg_img").addClass("d-none");
        }
    });
});
</script>