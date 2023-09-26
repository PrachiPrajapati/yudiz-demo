<?php
function yspl_load_more_portfolio(){
	$page_no = $_POST['page_no'];
	$filterVal = $_POST['filterVal'];
	$searchVal = $_POST['searchVal'];
	echo yspl_portfolio_data($page_no,$filterVal,$searchVal);
	die();
}
add_action( 'wp_ajax_load_more_portfolio', 'yspl_load_more_portfolio' );
add_action( 'wp_ajax_nopriv_load_more_portfolio', 'yspl_load_more_portfolio' );

function yspl_searchPortfolio(){
	ob_start();
		$search = $_POST['search'];
		
		$args = array(
		    'post_type' => 'portfolio',
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
add_action( 'wp_ajax_searchPortfolio', 'yspl_searchPortfolio' );
add_action( 'wp_ajax_nopriv_searchPortfolio', 'yspl_searchPortfolio' );