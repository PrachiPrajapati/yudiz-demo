<?php
$otherEventsLabels = array(
	'name' 					=> _x( 'Other Events', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Other Events', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Other Events', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Other Events', 'yudiz' ),
	'all_items' 			=> __( 'All Other Events', 'yudiz' ),
	'view_item' 			=> __( 'View Other Events', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Other Events', 'yudiz' ),
	'add_new' 				=> __( 'Add New Other Events', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Other Events', 'yudiz' ),
	'update_item' 			=> __( 'Update Other Events', 'yudiz' ),
	'search_items' 			=> __( 'Search Other Events', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$otherEventsArgs = array(
	'label' 				=> __( 'Other Events', 'yudiz' ),
	'description'			=> __( 'New Other Events', 'yudiz' ),
	'labels' 				=> $otherEventsLabels,
	'supports' 				=> array( 'title', 'thumbnail'),
	'hierarchical' 			=> false,
	'public' 				=> false,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-images-alt',
	'show_in_nav_menus' 	=> true,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> false,
	'exclude_from_search' 	=> false,
	'publicly_queryable' 	=> true,
	'capability_type' 		=> 'post',
);
register_post_type( 'otherevents', $otherEventsArgs );