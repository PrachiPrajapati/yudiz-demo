<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script> -->
<?php $category = get_queried_object();?>
<div class="listing-padding project-listing">
    <div class="container">
        <div class="title-bar">
            <div class="row align-center hidden-xs">
                <div class="col-sm-9">
                    <h3 class="bold"><?php echo $category->name?></h3>
                </div>
                <!-- <div class="col-sm-3">
                    <form method="get" action="<?php //echo home_url()?>" id="posts-search" class="search-form">
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
                </div> -->
            </div>
    	</div>

        <div class="mt-64">
        	<div class="project-list-block">
	        	<div class="row main-lists">
	        		<?php 
		            echo yspl_blog_data(1,$category->slug); 
		            ?>
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
	                            <input type="hidden" name="filterVal" value="<?php echo $category->slug?>" class="filterVal">
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