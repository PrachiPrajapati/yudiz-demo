<?php
function yspl_load_more_case_study(){
	$page_no = $_POST['page_no'];
	$category = $_POST['category'];
	$searchVal = $_POST['searchVal'];
	echo yspl_case_study_data($page_no,$category);
	die();
}
add_action( 'wp_ajax_load_more_casestudy', 'yspl_load_more_case_study' );
add_action( 'wp_ajax_nopriv_load_more_casestudy', 'yspl_load_more_case_study' );