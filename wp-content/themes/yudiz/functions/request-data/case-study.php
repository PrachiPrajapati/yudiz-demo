<?php
function yspl_case_study_data($page_no = 1, $filterVal = '', $searchVal = ""){
	ob_start();
	$paged = ( $page_no ) ? $page_no : 1;
	$tax_query = "";
	if ($filterVal != "") {
		$tax_query = array(
			'taxonomy' => 'case-study-categories',
			'field'    => 'slug',
			'terms'    => $filterVal
		);
	}
	$args = array(
		'post_type' => 'case-study',
		'posts_per_page' => 3,
		'search_prod_title' => $searchVal,
		'paged' => $paged,
	    'tax_query' =>  array($tax_query),
	    'post_status' => 'publish',
	);
	add_filter( 'posts_where', 'title_filter', 10, 2 );
	$loop = new WP_Query($args);
	remove_filter( 'posts_where', 'title_filter', 10, 2 );
	if( $loop->have_posts() ) :
		?>
		<div class="row">
			<ul class="col-md-10 col-md-offset-1 case-study-lst">
				<?php
				while ( $loop->have_posts() ) : $loop->the_post(); 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
					?>	    
				    <li class="row sector-block">
						<div class="col-md-6 sector-thumb" style="background: #f4f4f4">
							<img class="slick-lazy" src="<?php echo $image[0]; ?>" alt="case-study-banner"/>
						</div>
				    	<div class="col-md-6 sector-desc">
				    		<h5><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
				    		<small><?php echo strip_tags(get_the_term_list(get_the_ID(), 'case-study-categories' , '',', ')); ?></small>
				    		<?php if(get_field('short_description')){ ?><p><?php echo get_field('short_description'); ?></p><?php } ?>
				    		<a class="hide-content-text" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
				    	</div>
				    </li>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</ul>
		</div>
		<?php
	else:
		?>
		<div>
			<h5>It looks like you are lost into the space!!</h5>
			<p>We couldn't find any content related to your search.</p>
		</div>
		<?php
	endif;
	?>
	<input type="hidden" name="total_pages" value="<?php echo $loop->max_num_pages; ?>" class="total-pages">
	<?php
	return $load_case_study = ob_get_clean();
}

function general_filter( $where, &$wp_query )
{
    global $wpdb;
    if ( $search_term = $wp_query->get( 'search_prod_title' ) ) {
        $where .= ' AND (' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( like_escape( $search_term ) ) . '%\' OR ' . $wpdb->posts . ' .post_excerpt LIKE \'%' . esc_sql( like_escape( $search_term ) ) . '%\' OR ' . $wpdb->posts . ' .post_content LIKE \'%' . esc_sql( like_escape( $search_term ) ) . '%\')';
    }
    return $where;
}