<?php
function yspl_filter_blog(){
	$searchVal = $_POST['searchVal'];
	$filterVal = $_POST['filterVal'];
	// echo yspl_blog_featured_data(1,$filterVal,$searchVal);
	echo yspl_blog_data(1,$filterVal,$searchVal);
	die();
}
add_action( 'wp_ajax_filter_blog', 'yspl_filter_blog' );
add_action( 'wp_ajax_nopriv_filter_blog', 'yspl_filter_blog' );