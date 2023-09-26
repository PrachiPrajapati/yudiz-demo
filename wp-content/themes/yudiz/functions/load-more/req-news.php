<?php
    function yspl_news_loadmore(){
        ob_start();
        $page_no = (int) $_POST['page'];
        $category = ( isset( $_POST['filter-tax']) && ! empty( trim(  $_POST['filter-tax']  ) ) ) ?  $_POST['filter-tax'] : false;
        $year = ( isset( $_POST['filter-year'] ) && ! empty( trim(  $_POST['filter-year'] ) ) ) ? $_POST['filter-year'] : false;
        $hidden_id = ( isset( $_POST['hidden_id'] ) && ! empty( trim(  $_POST['hidden_id'] ) ) ) ? $_POST['hidden_id'] : false;
        $latest_args = array(
            "post_type"      => "newsroom",
            "post_status"    => 'publish',
            "posts_per_page" => 9,
            "paged"          => $page_no
        );
        if( $category ){
            $latest_args["tax_query"] = array(
                array(
                    'taxonomy' => 'newsroom',
                    'field'    => 'slug',
                    'terms'    => $category
                )
            );
        }
        if( $year ){
            $latest_args["date_query"] = array(
                array( 
                    'year' => $year  
                )
            );
        }
        if( $hidden_id )  $latest_args["post__not_in"] = array( $hidden_id );
        $news_query = new WP_Query( $latest_args );
        if( $news_query->have_posts() ):
            while( $news_query->have_posts() ): $news_query->the_post(  );
                $terms = get_the_terms( get_the_ID(  ) , 'newsroom' ); $fst_term = ( is_array( $terms ) ) ? array_pop($terms)->name : '';  ?>
                <li>
                    <div class="news-content-box">
                        <div class="newsimgbox">
                            <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="news-img"/>
                        </div>
                        <div class="news-content-desc">
                            <h5 class="category-news"><?php echo $fst_term; ?></h5>
                            <h4><a href="<?php echo get_the_permalink(); ?>"><?php the_title( ); ?></a></h4>
                            <p class="news-date"><?php echo get_the_date( 'd F Y' ); ?></p>
                        </div>
                    </div>
                </li>
        <?php endwhile; wp_reset_postdata(  ); endif; 
        $arr_res["html_resp"] = ob_get_clean();
        wp_send_json( $arr_res ); 
    }
    add_action( 'wp_ajax_yspl_news_loadmore', 'yspl_news_loadmore' );
    add_action( 'wp_ajax_nopriv_yspl_news_loadmore', 'yspl_news_loadmore' );