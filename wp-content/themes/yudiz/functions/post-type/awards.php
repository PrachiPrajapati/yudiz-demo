<?php
$awardLabels = array(
	'name' 					=> _x( 'Award', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Award', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Award', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Award', 'yudiz' ),
	'all_items' 			=> __( 'All Award', 'yudiz' ),
	'view_item' 			=> __( 'View Award', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Award', 'yudiz' ),
	'add_new' 				=> __( 'Add New Award', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Award', 'yudiz' ),
	'update_item' 			=> __( 'Update Award', 'yudiz' ),
	'search_items' 			=> __( 'Search Award', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$awardArgs = array(
	'label' 				=> __( 'Award', 'yudiz' ),
	'description'			=> __( 'New Award', 'yudiz' ),
	'labels' 				=> $awardLabels,
	'supports' 				=> array( 'title', 'thumbnail'),
	'hierarchical' 			=> false,
	'public' 				=> false,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-awards',
	'show_in_nav_menus' 	=> true,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> false,
	'exclude_from_search' 	=> false,
	'publicly_queryable' 	=> true,
	'capability_type' 		=> 'post',
);
register_post_type( 'award', $awardArgs );