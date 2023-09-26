<?php
$serviceLabels = array(
	'name' 					=> _x( 'Service', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Service', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Service', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Service', 'yudiz' ),
	'all_items' 			=> __( 'All Service', 'yudiz' ),
	'view_item' 			=> __( 'View Service', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Service', 'yudiz' ),
	'add_new' 				=> __( 'Add New Service', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Service', 'yudiz' ),
	'update_item' 			=> __( 'Update Service', 'yudiz' ),
	'search_items' 			=> __( 'Search Service', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$serviceArgs = array(
	'label' 				=> __( 'Service', 'yudiz' ),
	'description'			=> __( 'New Service', 'yudiz' ),
	'labels' 				=> $serviceLabels,
	'supports' 				=> array( 'title', 'editor', 'thumbnail'),
	'hierarchical' 			=> false,
	'public' 				=> true,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-desktop',
	'show_in_nav_menus' 	=> true,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> false,
	'exclude_from_search' 	=> false,
	'publicly_queryable' 	=> true,
	'capability_type' 		=> 'post',
	'rewrite' => '/',
);
register_post_type( 'services', $serviceArgs );