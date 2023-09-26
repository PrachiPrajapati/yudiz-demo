<?php
function yspl_filter_portfolio(){
	$searchVal = $_POST['searchVal'];
	$filterVal = $_POST['filterVal'];
	echo yspl_portfolio_featured_data(1,$filterVal,$searchVal);
	echo yspl_portfolio_data(1,$filterVal,$searchVal);
	die();
}
add_action( 'wp_ajax_filter_portfolio', 'yspl_filter_portfolio' );
add_action( 'wp_ajax_nopriv_filter_portfolio', 'yspl_filter_portfolio' );