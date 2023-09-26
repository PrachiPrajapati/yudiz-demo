<div class="listing-padding project-listing">
    <div class="container">
        <div class="title-bar">
            <div class="row align-center">
                <div class="col-md-9 col-sm-8">
                    <h1 class="medium">Projects</h1>
                </div>
                <div class="col-md-3 col-sm-4">
                    <form method="get" action="<?php echo home_url()?>" id="portfolio-search" class="search-form">
                        <div class="form-group">                    
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                </span>
                                <input type="text" class="form-control search1" name="s" id="searchid1" placeholder="Search" autocomplete="off"/>
                                <input type="hidden" name="post" value="portfolio">
                            </div>
                            <div id="result" class="search-result-box">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php 
            $categories = get_categories( array(
                'taxonomy' => 'portfolio_categories',
                'orderby' => 'name',
                // 'hide_empty'    => true, 
            ) );
            ?>
            <div class="hidden-xs filter-box">
                <ul class="filter">
                    <li class="active portfolio-category" data-val="">
                        <a class="filter-btn filter-all" href="" data-toggle="tooltip" title="All">
                            <span>All</span>
                        </a>
                    </li>
                </ul>
                <ul class="filter filter-slider">               
                    
                    <?php 
                    foreach ($categories as $key => $value) {
                        ?>
                        <li class="portfolio-category" data-val="<?php echo $value->slug;?>">
                            <a class="filter-btn" href="<?php echo esc_url( get_category_link( $value->term_id ) )?>" title="<?php echo esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $value->name ) )?>">
                                <?php echo $value->name;?> 
                                <span class="counter"><?php echo $value->count;?></span>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
                <div class="custom-navigation"></div>
            </div>
            <div class="visible-xs">               
                <div class="filter-select">
                    <select class="filter-portfolio-cat">
                        <option value="">All</option>
                        <?php 
                        foreach ($categories as $key => $value) {
                            ?>
                            <option value="<?php echo $value->slug; ?>"><?php echo $value->name; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="project-list-block">
            <ul class="project-list row main-lists">
                <?php echo yspl_portfolio_featured_data(); ?>
                <?php echo yspl_portfolio_data(1); ?>
            </ul>
            <?php
            global $wp_portfolio_query;
            if($wp_portfolio_query->max_num_pages > 1): 
                ?> 
                <div class="text-center mt-64 load-more-main">
                    <form id="load-more-portfolio" class="load-more-form">
                        <div>
                            <input class="load-more load-more-portfolio-btn" type="submit" name="load-more" value="Load More">
                            <input type="hidden" name="page_no" value="2" class="page-no">
                            <input type="hidden" name="filterVal" value="" class="filterVal">
                            <input type="hidden" name="searchVal" value="" class="searchVal">
                            <input type="hidden" name="action" value="load_more_portfolio" class="action">
                            <!-- <input type="hidden" name="total_pages" value="<?php //echo $wp_query->max_num_pages; ?>" class="total-pages"> -->
                        </div>
                    </form>
                </div>
                <?php
            endif; 
            ?>
            <div class="ajax-loader"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/filter-loader.gif" alt="loader"></div>
            <!-- <div class="filter-loader-overlay"></div> -->
        </div>
    </div>
</div>