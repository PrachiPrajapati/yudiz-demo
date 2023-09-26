<div class="listing-padding project-listing">
    <div class="container">
        <div class="title-bar">
            <div class="row align-center hidden-xs">
                <div class="col-md-9 col-sm-8">
                    <h3 class="bold">Blog</h3>
                </div>
                <div class="col-md-3 col-sm-4">
                    <form method="get" action="<?php echo home_url()?>" id="posts-search" class="search-form">
                        <div class="form-group">                    
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                </span>
                                <input type="text" class="form-control search1" name="s" id="searchid1" placeholder="Search" autocomplete="off"/>
                                <input type="hidden" name="post" value="posts">
                            </div>
                            <div id="result" class="search-result-box">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
	        <?php 
	        $categories = get_categories( array(
	            'taxonomy' => 'category',
	            'orderby' => 'name',
	            // 'hide_empty'    => true, 
	        ) );
	        ?>
	        <div class="hidden-xs filter-box">
                <ul class="filter">
                    <li class="active blog-category" data-val="">
                        <a class="filter-btn filter-all" href="#" data-toggle="tooltip" title="All">
                            <span>All</span>
                        </a>
                    </li>
                </ul>
                <ul class="filter filter-slider">        
                    <?php 
                    foreach ($categories as $key => $value) {
                        ?>
                        <li class="blog-category" data-val="<?php echo $value->slug;?>">
                            <a class="filter-btn" href="<?php echo esc_url( get_category_link( $value->term_id ) )?>" alt="<?php echo esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $value->name ) )?>">
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
	            <div class="d-flex filter-header">
	                <h3 class="bold">Blog</h3>
	                <form method="get" action="<?php echo home_url()?>" class="search-form">
	                    <div class="form-group">                    
	                        <div class="input-group">
	                            <span class="input-group-btn">
	                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
	                            </span>
	                                <input type="text" class="form-control search1" name="s" id="searchid2" placeholder="Search" />
	                                <input type="hidden" name="post" value="posts">
	                                <div id="result">
	                                </div>
	                        </div>
	                    </div>
	                </form>
	            </div>
	            <div class="filter-select">
	                <select class="filter-blog-cat">
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
        <div class="mt-32">
        	<div class="project-list-block">
	        	<div class="row main-lists">
		            <?php echo yspl_blog_data(1); ?>
		            <!-- <div class="filter-loader-overlay"></div> -->
		        </div>
	            <?php
	            global $wp_query;
	            if($wp_query->max_num_pages > 1): 
	                ?> 
	                <div class="text-center mt-64 load-more-main">
	                    <form id="load-more-blog" class="load-more-form">
	                        <div>
	                            <input class="load-more load-more-blog-btn" type="submit" name="load-more" value="Load More">
	                            <input type="hidden" name="page_no" value="2" class="page-no">
	                            <input type="hidden" name="filterVal" value="" class="filterVal">
	                            <input type="hidden" name="searchVal" value="" class="searchVal">
	                            <input type="hidden" name="action" value="load_more_blog" class="action">
	                            <!-- <input type="hidden" name="total_pages" value="<?php //echo $wp_query->max_num_pages; ?>" class="total-pages"> -->
	                        </div>
	                    </form>
	                </div>
	                <?php
	            endif; 
	            ?>
	            <div class="ajax-loader"><div class="ajx-loader">Loading...</div></div>
		    </div>
	    </div>
	</div>
</div>