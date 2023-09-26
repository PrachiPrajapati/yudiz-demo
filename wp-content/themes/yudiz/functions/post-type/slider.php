<?php
$sliderLabels = array(
	'name' 					=> _x( 'Slider', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Slider', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Slider', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Slider', 'yudiz' ),
	'all_items' 			=> __( 'All Sliders', 'yudiz' ),
	'view_item' 			=> __( 'View Slider', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Slider', 'yudiz' ),
	'add_new' 				=> __( 'Add New Slider', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Slider', 'yudiz' ),
	'update_item' 			=> __( 'Update Slider', 'yudiz' ),
	'search_items' 			=> __( 'Search Slider', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$sliderArgs = array(
	'label' 				=> __( 'Slider', 'yudiz' ),
	'description'			=> __( 'New Slider', 'yudiz' ),
	'labels' 				=> $sliderLabels,
	'supports' 				=> array( 'title', 'editor', 'thumbnail'),
	'hierarchical' 			=> false,
	'public' 				=> false,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-images-alt2',
	'show_in_nav_menus' 	=> true,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> false,
	'exclude_from_search' 	=> false,
	'publicly_queryable' 	=> false,
	'capability_type' 		=> 'post',
);
//register_post_type( 'slider', $sliderArgs );