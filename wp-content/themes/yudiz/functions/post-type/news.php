<?php
///////////////////////////////////////////////////////
$newsroomLabels = array(
	'name' 					=> _x( 'Newsroom', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Newsroom', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Newsroom', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Newsroom', 'yudiz' ),
	'all_items' 			=> __( 'All Newsroom', 'yudiz' ),
	'view_item' 			=> __( 'View Newsroom', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Newsroom', 'yudiz' ),
	'add_new' 				=> __( 'Add New Newsroom', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Newsroom', 'yudiz' ),
	'update_item' 			=> __( 'Update Newsroom', 'yudiz' ),
	'search_items' 			=> __( 'Search Newsroom', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$NewsroomArgs = array(
	'label' 				=> __( 'Newsroom', 'yudiz' ),
	'description'			=> __( 'New Newsroom', 'yudiz' ),
	'labels' 				=> $newsroomLabels,
	'supports' 				=> array( 'title', 'editor', 'thumbnail'),
	'hierarchical' 			=> false,
	'public' 				=> true,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-pressthis',
	'show_in_nav_menus' 	=> true,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> false,
	'exclude_from_search' 	=> false,
	'publicly_queryable' 	=> true,
	'capability_type' 		=> 'post',
);
register_post_type( 'newsroom', $NewsroomArgs );
$news_cat_labels = array(
	'name' => _x( 'Newsroom', 'taxonomy general name' ),
	'singular_name' => _x( 'Newsroom', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search Newsrooms' ),
	'all_items' => __( 'All Newsrooms' ),
	'parent_item' => __( 'Parent Newsroom' ),
	'parent_item_colon' => __( 'Parent Newsroom:' ),
	'edit_item' => __( 'Edit Newsroom' ), 
	'update_item' => __( 'Update Newsroom' ),
	'add_new_item' => __( 'Add New Newsroom' ),
	'new_item_name' => __( 'New Newsroom Name' ),
	'menu_name' => __( 'Newsroom' ),
);
register_taxonomy('newsroom',array('newsroom'), array(
	'hierarchical' => true,
	'labels' => $news_cat_labels,
	'show_ui' => true,
	'show_admin_column' => true,
	'query_var' => true,
	'rewrite' => array( 'slug' => 'newsroom' ),
));