<?php
function yspl_portfolio_featured_data($page_no = 1, $filterVal = "", $searchVal = ""){
	ob_start();
	$paged = ( $page_no ) ? $page_no : 1;
	$tax_query = "";
	if ($filterVal != "") {
		$tax_query = array(
			'taxonomy' => 'portfolio_categories',
			'field'    => 'slug',
			'terms'    => $filterVal
		);
	}

	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => 1,
		'search_prod_title' => $searchVal,
		'paged' => $paged,
		'meta_query' => array(
	        'relation' => 'AND',
	        array(
	            'key' => 'is_featured',
	            'value' => 1,
	        ),
	    ),
	    'post_status' => 'publish',
	    'tax_query' =>  array($tax_query),
	);
	add_filter( 'posts_where', 'title_filter', 10, 2 );
	$wp_query = new WP_Query($args);
	remove_filter( 'posts_where', 'title_filter', 10, 2 );
	if( $wp_query->have_posts() ) :
		while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
			$rgbaBackColor = rgb2hex2rgb(get_field('main_banner_background_color'))
			?>

		    <li class="col-sm-6 featured">
		        <div class="project-list-box wow fadeIn" style="background-color: rgba(<?php echo $rgbaBackColor['r'].','.$rgbaBackColor['g'].','.$rgbaBackColor['b'].',0.2';?>); background-image: url('<?php echo get_field('project_watermark_icon');?>');">
		            <a href="<?php echo get_the_permalink(); ?>" class="project-icon hide-content-text" style="background-image: url('<?php echo get_field('project_icon');?>');"><?php echo get_the_title();?></a>
		            <div class="project-desc" style="background-color: <?php echo get_field('main_banner_background_color'); ?>;">
		                <div>
		                    <a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a>
		                    <small>
		                    	<?php 
		                    	echo $categories_list = strip_tags(get_the_term_list(get_the_ID(), 'portfolio_categories' , '',', '));
		                    	?>
		                    </small>
		                </div>
		                <a class="hide-content-text" href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a>
		            </div>
		        </div>
		    </li>

			<?php
		endwhile;
		wp_reset_postdata();
	endif;

	return $load_join_team = ob_get_clean();
}
function yspl_portfolio_data($page_no = 1, $filterVal = '', $searchVal = ""){
	ob_start();
	global $wp_portfolio_query;
	$paged = ( $page_no ) ? $page_no : 1;
	$tax_query = "";
	if ($filterVal != "") {
		$tax_query = array(
			'taxonomy' => 'portfolio_categories',
			'field'    => 'slug',
			'terms'    => $filterVal
		);
	}
	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => 6,
		'search_prod_title' => $searchVal,
		'paged' => $paged,
		'meta_query' => array(
	        'relation' => 'OR',
	        array(
	            'key' => 'is_featured',
	            'value' => 0,
	        ),
	    ),
	    'tax_query' =>  array($tax_query),
	    'post_status' => 'publish',
	);
	add_filter( 'posts_where', 'title_filter', 10, 2 );
	$wp_query = new WP_Query($args);
	remove_filter( 'posts_where', 'title_filter', 10, 2 );
	$wp_portfolio_query = $wp_query;
	if( $wp_query->have_posts() ) :
		?>
		
		<?php
		while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
			?>
		    <li class="col-sm-6">
		        <div class="project-list-box wow fadeIn" style="background-image: url('<?php echo get_field('project_watermark_icon');?>');">
		            <a href="<?php echo get_the_permalink(); ?>" class="project-icon hide-content-text" style="background-color: <?php echo get_field('main_banner_background_color'); ?>; background-image: url('<?php echo get_field('project_icon');?>');"><?php echo get_the_title();?></a>
		            <div class="project-desc">
		                <div>
		                    <a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a>
		                    <small>
		                    	<?php 
		                    	echo $categories_list = strip_tags(get_the_term_list(get_the_ID(), 'portfolio_categories' , '',', '));
		                    	?>
		                    </small>
		                </div>
		                <a class="hide-content-text" href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a>
		            </div>
		        </div>
		    </li>
			<?php
		endwhile;
		wp_reset_postdata();
	else:
		if ($searchVal != "") {
			?>
			<div class="mt-32 col-sm-12">
				<h5>It looks like you are lost into the space!!</h5>
				<p>We couldn't find any content related to your search.</p>
			</div>
			<?php
		} else {
			?>
			<li>No Project Found</li>
			<?php
		}
	endif;
	?>
	<?php //echo "######". $wp_query->max_num_pages;?>
	<li style="display: none;"><input type="hidden" name="total_pages" value="<?php echo $wp_query->max_num_pages; ?>" class="total-pages"></li>
	<?php
	return $load_join_team = ob_get_clean();
}