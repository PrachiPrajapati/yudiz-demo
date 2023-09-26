<?php
function yspl_bp_blog_shortcode( $atts ) {
	$blogargs = array(
        "post_type"      => "post",
        "post_status"    => 'publish',
        "posts_per_page" => 3,
        "paged"          => 1
        );
        $blogs_query = new WP_Query( $blogargs );
	$loading_img = get_stylesheet_directory_uri() . "/images/loader-new.svg";
	ob_start();
	if($blogs_query->have_posts()):
		?>
		<section class="blog-post-section common-section-small">
        <div class="container">
            <div class="title-box text-center">
                <h6>Our Blogs</h6>
                <h3>Technically Speaking</h3>
            </div>
            <div class="blog-post-box">
                <?php if( $blogs_query->have_posts() ): ?>
                    <div class="row d-flex-wrap">
                        <?php while( $blogs_query->have_posts() ): $blogs_query->the_post(  ); ?>
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
            <div class="theme-btn solid-blue text-center mt-32">
                    <a href="https://blog.yudiz.com/">See More</a>
                </div>
        </div>
    </section>
		<?php
	endif;
	$book_form = ob_get_clean();
    return $book_form;
}
add_shortcode( 'blog', 'yspl_bp_blog_shortcode' );