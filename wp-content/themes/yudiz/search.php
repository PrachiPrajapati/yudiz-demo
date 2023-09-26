<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php $post = $_GET['post'];
			if($post == "portfolio") :
				?>
				<div class="listing-padding project-listing">
				    <div class="container">
				        <div class="title-bar">
				            <div class="row align-center">
				                <div class="col-sm-9">
				                    <h3 class="bold"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h3>
				                </div>
				                <div class="col-sm-3">
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
				        </div>
				        <div class="project-list-block">
				        	<ul class="project-list row main-lists">

				        	    <?php echo yspl_portfolio_featured_data(1,"",$_GET['s']); ?>
			             
				        	    <?php echo yspl_portfolio_data(1,"",$_GET['s']); ?>    
				        	</ul>    
			                
				            <div class="ajax-loader" style="display: none;"><div class="ajx-loader">Loading...</div></div>
				            <?php
	                        $paged = ( $page_no ) ? $page_no : 1;
	                        $tax_query = "";
	                        $args = array(
	                        	'post_type' => 'portfolio',
	                        	'posts_per_page' => 6,
	                        	'search_prod_title' => $_GET['s'],
	                        	'paged' => 1,
	                        );
	                        add_filter( 'posts_where', 'general_filter', 10, 2 );
	                        $loop = new WP_Query($args);
	            			remove_filter( 'posts_where', 'general_filter', 10, 2 );
	                        global $wp_portfolio_query;
            				if($wp_portfolio_query->max_num_pages > 1): 
				                ?> 
				                <div class="text-center mt-64">
				                    <form id="load-more-portfolio" class="load-more-form">
				                    	<div>
					                        <input class="load-more load-more-portfolio-btn" type="submit" name="load-more" value="Load More">
					                        <input type="hidden" name="page_no" value="2" class="page-no">
					                        <input type="hidden" name="total_pages" class="total-pages" value="<?php echo $loop->max_num_pages; ?>">
					                        <input type="hidden" name="filterVal" value="" class="filterVal">
					                        <input type="hidden" name="searchVal" value="<?php echo $_GET['s']?>" class="searchVal">
					                        <input type="hidden" name="action" value="load_more_portfolio" class="action">
					                    </div>
					                </form>
				                </div>
				                <?php
				            endif; 
				            ?>
				        </div>
				    </div>
				</div>
				<?php

			elseif($post == "posts") :
				?>
				<?php $category = get_queried_object();?>
				<div class="listing-padding project-listing">
				    <div class="container">
				        <div class="title-bar">
				            <div class="row align-center hidden-xs">
				                <div class="col-sm-9">
				                    <h3 class="bold"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h3>
				                </div>
				                <div class="col-sm-3">
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
				    	</div>

				        <div class="mt-32">
				        	<div class="project-list-block">
					        	<div class="row main-lists">
						            <?php 
						            echo yspl_blog_data(1,'',$_GET['s'],''); 
						            ?>
						            <!-- <div class="filter-loader-overlay"></div> -->
						        </div>
					            <?php
					            $paged = ( $page_no ) ? $page_no : 1;
					            $tax_query = "";
					            $args = array(
					            	'post_type' => 'post',
					            	'posts_per_page' => 6,
					            	'search_prod_title' => $_GET['s'],
					            	'paged' => 1,
					            );
					            add_filter( 'posts_where', 'title_filter', 10, 2 );
				            	$loop = new WP_Query($args);
				            	remove_filter( 'posts_where', 'title_filter', 10, 2 );
					            if($loop->max_num_pages > 1): 
					                ?> 
					                <div class="text-center mt-64 load-more-main">
					                    <form id="load-more-blog" class="load-more-form">
					                        <div>
					                            <input class="load-more load-more-blog-btn" type="submit" name="load-more" value="Load More">
					                            <input type="hidden" name="page_no" value="2" class="page-no">
					                            <input type="hidden" name="filterVal" value="" class="filterVal">
					                            <input type="hidden" name="searchVal" value="<?php echo $_GET['s']?>" class="searchVal">
					                            <input type="hidden" name="authorVal" value="" class="authorVal">
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
				<?php
			elseif($post == "case-study") :
				?>
				<div class="listing-padding project-listing">
				    <div class="container">
				        <div class="title-bar">
				            <div class="row align-center">
				                <div class="col-sm-9">
				                    <h3 class="bold"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h3>
				                </div>
				                <div class="col-sm-3">
				                    <form method="get" action="<?php echo home_url()?>" id="posts-search" class="search-form">
				                        <div class="form-group">                    
				                            <div class="input-group">
				                                <span class="input-group-btn">
				                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
				                                </span>
				                                <input type="text" class="form-control search1" name="s" id="searchid1" placeholder="Search" value="<?php echo $_GET['s']?>">
					      						<input type="hidden" name="post" value="case-study">
				                            </div>
				                            <div id="result" class="search-result-box">
				                            </div>
				                        </div>
				                    </form>
				                </div>
				            </div>
				    	</div>

				    	<div class="mt-32">
				    		<?php
    						echo yspl_case_study_data(1,'',$_GET['s']);
				            $paged = ( $page_no ) ? $page_no : 1;
				            $tax_query = "";
				            $args = array(
				            	'post_type' => 'case-study',
				            	'posts_per_page' => 3,
				            	'search_prod_title' => $_GET['s'],
				            	'paged' => 1,
				            );
				            add_filter( 'posts_where', 'general_filter', 10, 2 );
				            $loop = new WP_Query($args);
							remove_filter( 'posts_where', 'general_filter', 10, 2 );
			            	if($loop->max_num_pages > 1): 
				                ?> 
				                <div class="text-center">
	                				<form id="load-more-case-study" class="load-more-form">
	                					<div>
	                						<input type="submit" class="load-more load-more-blog-btn loadmore-casestudy-btn" name="load-more" value="Load More">
	                						<input type="hidden" name="page_no" class="page-no" value="2">
	                						<input type="hidden" name="total_pages" class="total-pages" value="<?php echo $loop->max_num_pages; ?>">
	                						<input type="hidden" name="searchVal" value="<?php echo $_GET['s']?>" class="searchVal">
	                						<input type="hidden" name="category" value="">
	                						<input type="hidden" name="action" value="load_more_casestudy">
	                					</div>
	                				</form>
	                			</div>
				                <?php
				            endif; 
				            ?>
				    	</div>
				    </div>
				</div>
				<?php
			endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php 
$content=get_post(562);
echo do_shortcode(apply_filters("the_content", $content->post_content));
postcontentcss($content->post_content);
get_footer(); ?>