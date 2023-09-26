<?php
function yspl_search_portfolio(){
	$searchVal = $_POST['searchVal'];
	$filterVal = $_POST['filterVal'];
	echo yspl_portfolio_featured_data(1,$filterVal,$searchVal);
	echo yspl_portfolio_data(1,$filterVal,$searchVal);
	die();
}
add_action( 'wp_ajax_search_portfolio', 'yspl_search_portfolio' );
add_action( 'wp_ajax_nopriv_search_portfolio', 'yspl_search_portfolio' );