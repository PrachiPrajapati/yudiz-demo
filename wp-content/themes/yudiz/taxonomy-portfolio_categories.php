<?php
/**
 * The template for displaying Portfolio content (Projects Page)
 *
 * @package Yudiz
 * @author Amitsinh Thakor
 * @since Yudiz 1.0
 */
get_header();
$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') ); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
			<?php
			// Start the Loop.
			
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				// get_template_part( 'post-template/content-archive-portfolio', get_post_format() ); ?>
				<div class="listing-padding project-listing">
					<div class="container">
						<div class="title-bar">
							<div class="row align-center">
								<div class="col-md-9 col-sm-8">
									<h1 class="medium"><?php _e('Projects','yudiz');?></h1>
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
									<li class="portfolio-category" data-val="">
										<a class="filter-btn filter-all" href="" data-toggle="tooltip" title="All">
											<span><?php _e('All','yudiz');?></span>
										</a>
									</li>
								</ul>
								<ul class="filter filter-slider">               
									
									<?php 
									foreach ($categories as $key => $value) {
										$active = ($value->term_id == $term->term_id)? "active" : ""; ?>
										<li class="<?php echo $active; ?> portfolio-category" data-val="<?php echo $value->slug;?>">
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
									<select class="filter-portfolio-cat" onchange="javascript:handleSelect(this)">
										<option value=""><?php _e('All','yudiz');?></option>
										<?php 
										foreach ($categories as $key => $value) {
											$active = ($value->term_id == $term->term_id)? "selected" : ""; ?>
											<option value="<?php echo $value->slug; ?>" <?php echo $active; ?>><?php echo $value->name; ?></option>
											<?php
										}
										?>
									</select>
								</div>
							</div>
						</div>
						
						<div class="project-list-block">
							<ul class="project-list row main-lists">
								<?php# echo yspl_portfolio_featured_data(); ?>
								<?php echo yspl_portfolio_data(1,$term->slug); ?>
							</ul>
							<div class="text-center mt-64 load-more-main">
								<form id="load-more-portfolio" class="load-more-form">
									<div>
										<?php global $wp_portfolio_query; $style = '';
										if($wp_portfolio_query->max_num_pages < 2): $style = 'style="display:none;"';  endif; ?>
										<input class="load-more load-more-portfolio-btn" type="submit" name="load-more" <?php echo $style;?> value="Load More">
										<input type="hidden" name="page_no" value="2" class="page-no">
										<input type="hidden" name="filterVal" value="<?php echo $term->slug; ?>" class="filterVal">
										<input type="hidden" name="searchVal" value="" class="searchVal">
										<input type="hidden" name="action" value="load_more_portfolio" class="action">
									</div>
								</form>
							</div>
							<div class="ajax-loader"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/filter-loader.gif" alt="loader"></div>
							<!-- <div class="filter-loader-overlay"></div> -->
						</div>
					</div>
				</div>
				<?php // End the loop.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php 
$content=get_post(562);
echo do_shortcode(apply_filters("the_content", $content->post_content));
postcontentcss($content->post_content);
get_footer(); ?>