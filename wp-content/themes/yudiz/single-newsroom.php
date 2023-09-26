<?php 
    get_header(); 
    $third_party_url = get_field("third_party_url");
    $we_are_also_on_this = get_field("we_are_also_on_this");
    $media_house = get_field("media_house");
?>
    <div id="primary" class="content-area news-deatil-page news-page">
        <main id="main" class="site-main">
            <div class="container">
                <section class="news-detail-section">
                    <div class="row">
                        <div class="col-md-8 news-detail-content-box">
                            <div class="news-featured-img">
                                <img src="<?php the_post_thumbnail_url( 'full' ) ?>" alt="news-featured"/>
                            </div>
                            <div class="news-detail-desc-box">
                                <p class="news-date"><?php echo get_the_date( 'd F Y' ); ?></p>
                                <h1 class="news-detail-title"><?php the_title( ) ?> | <?php echo ( $third_party_url ) ? "<a href='$third_party_url' target='_blank'>$media_house</a>":""; ?></h1>
                                <div class="news-detail-desc-wrapper">
                                    <?php the_content(); ?>
                                </div>
                                <!-- <?php //echo ( $third_party_url ) ? "<a href='$third_party_url'>Continue Reading</a>":""; ?> -->
                            </div>
                        </div>
                        <?php  
                            $l_newsArgs = array(
                                "post_status"   => "publish",
                                "post_type"     => "newsroom",
                                "posts_per_page"=> 2,
                                "post__not_in" => array( get_the_ID() )
                            );
                            $latesNews = new WP_Query( $l_newsArgs );
                        ?>
                        <div class="col-md-4 news-sidebar-section">
                            <div class="news-sidebar-latest-post">
                                <h5 class="sidebar-title">Latest News</h5>
                                <div class="latest-news-wrapper">
                                    <?php if( $latesNews->have_posts(  ) ): ?>
                                        <ul>
                                            <?php while( $latesNews->have_posts(  ) ): $latesNews->the_post(  ); ?>
                                                <li class="latest-news-box">
                                                    <p class="news-date"><?php echo get_the_date( 'd F Y' ); ?></p>
                                                    <p class="latest-news-title"><?php the_title(); ?></p>
                                                    <a href="<?php echo get_the_permalink( ); ?>">Continue Reading</a>
                                                </li>
                                            <?php endwhile; wp_reset_postdata(  ); ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="social-icon-news-sidebar">
                                <h5 class="sidebar-title">Follow us more</h5> 
                                <?php wp_nav_menu(array("theme_location" =>	"social-icon-menu")) ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php if(! empty( $we_are_also_on_this ) ): ?>
                <section class="other-publications common-section">
                    <div class="container">
                        <h3>We are also on this </h3>
                        <div class="custom-saperator"></div>
                        <div class="custom-saperator"></div>
                        <ul>
                            <?php foreach( $we_are_also_on_this as $single_press ): ?>
                                <li><a target="_blank" href="<?php echo  $single_press['press_site_url']; ?>"><?php echo $single_press['press_title']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section>
            <?php endif; ?>
        </main><!-- .site-main -->
    </div><!-- .content-area -->
<?php get_footer(); ?>