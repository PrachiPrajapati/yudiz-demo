<?php
$labels = array(
	'name' 					=> _x( 'Our Work', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Our Work', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Our Work', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Our Work', 'yudiz' ),
	'all_items' 			=> __( 'All Our Works', 'yudiz' ),
	'view_item' 			=> __( 'View Our Work', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Our Work', 'yudiz' ),
	'add_new' 				=> __( 'Add New Our Work', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Our Work', 'yudiz' ),
	'update_item' 			=> __( 'Update Our Work', 'yudiz' ),
	'search_items' 			=> __( 'Search Our Work', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$args = array(
	'label' 				=> __( 'Our Work', 'yudiz' ),
	'description'			=> __( 'New Our Work', 'yudiz' ),
	'labels' 				=> $labels,
	'supports' 				=> array( 'title', 'editor', 'thumbnail'),
	'hierarchical' 			=> false,
	'public' 				=> false,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-format-aside',
	'show_in_nav_menus' 	=> true,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> false,
	'exclude_from_search' 	=> false,
	'publicly_queryable' 	=> true,
	'capability_type' 		=> 'post',
);
register_post_type( 'our_work_post', $args );

$labels = array(
	'name' 					=> _x( 'Our Work Categories', 'taxonomy general name', 'emprende-latino' ),
	'singular_name' 		=> _x( 'Our Work Category', 'taxonomy singular name', 'emprende-latino' ),
	'search_items' 			=> __( 'Search Our Work Category', 'emprende-latino' ),
	'all_items' 			=> __( 'All Our Workes Categories', 'emprende-latino' ),
	'parent_item' 			=> __( 'Parent Our Work Category', 'emprende-latino' ),
	'parent_item_colon' 	=> __( 'Parent Our Work Category:', 'emprende-latino' ),
	'edit_item' 			=> __( 'Edit Our Work Category', 'emprende-latino' ),
	'update_item' 			=> __( 'Update Our Work Category', 'emprende-latino' ),
	'add_new_item' 			=> __( 'Add New Our Work Category', 'emprende-latino' ),
	'new_item_name' 		=> __( 'New Our Work Category Name', 'emprende-latino' ),
	'menu_name' 			=> __( 'Our Work Categories', 'emprende-latino' ),
);

$args = array(
	'hierarchical' 			=> true,
	'labels' 				=> $labels,
	'show_ui' 				=> true,
	'show_admin_column' 	=> true,
	'query_var'				=> true,
	'rewrite' 				=> array( 'slug' => 'our_work_categories' ),
);

register_taxonomy( 'our_work_categories', array( 'our_work_post' ), $args );