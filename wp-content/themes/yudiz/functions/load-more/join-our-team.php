<?php
function yspl_load_more_join_our_team(){
	$page_no = $_POST['page_no'];
	echo yspl_join_our_team_data($page_no);
	die();
}
add_action( 'wp_ajax_load_more_join_our_team', 'yspl_load_more_join_our_team' );
add_action( 'wp_ajax_nopriv_load_more_join_our_team', 'yspl_load_more_join_our_team' );