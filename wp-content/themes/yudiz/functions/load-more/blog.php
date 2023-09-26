<?php
function yspl_load_more_blog(){
	$page_no = $_POST['page_no'];
	$filterVal = $_POST['filterVal'];
	$searchVal = $_POST['searchVal'];
	$authorVal = $_POST['authorVal'];
	echo yspl_blog_data($page_no,$filterVal,$searchVal,$authorVal);
	die();
}
add_action( 'wp_ajax_load_more_blog', 'yspl_load_more_blog' );
add_action( 'wp_ajax_nopriv_load_more_blog', 'yspl_load_more_blog' );

function yspl_searchblog(){
	ob_start();
		$search = $_POST['search'];
		
		$args = array(
		    'post_type' => 'post',
		    'posts_per_page' => -1,
		    'search_prod_title' => $search,
		    'post_status' => 'publish',
		    'orderby'     => 'title', 
		    'order'       => 'ASC'
		);

		add_filter( 'posts_where', 'title_filter', 10, 2 );
		$loop = new WP_Query($args);
		remove_filter( 'posts_where', 'title_filter', 10, 2 );
		if( $loop->have_posts() ) :
			while ( $loop->have_posts() ) : $loop->the_post(); 
				?>
			    
			    <div class="name">
			        <?php echo get_the_title();?>
			    </div>

				<?php
			endwhile;
			wp_reset_postdata();
		endif;

		echo $load_join_team = ob_get_clean();
	die();
}
add_action( 'wp_ajax_searchblog', 'yspl_searchblog' );
add_action( 'wp_ajax_nopriv_searchblog', 'yspl_searchblog' );