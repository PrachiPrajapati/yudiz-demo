<?php
$offerLabels = array(
	'name' 					=> _x( 'Offer', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Offer', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'We Offer', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Offer', 'yudiz' ),
	'all_items' 			=> __( 'All Offer', 'yudiz' ),
	'view_item' 			=> __( 'View Offer', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Offer', 'yudiz' ),
	'add_new' 				=> __( 'Add New Offer', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Offer', 'yudiz' ),
	'update_item' 			=> __( 'Update Offer', 'yudiz' ),
	'search_items' 			=> __( 'Search Offer', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$offerArgs = array(
	'label' 				=> __( 'Offer', 'yudiz' ),
	'description'			=> __( 'New Offer', 'yudiz' ),
	'labels' 				=> $offerLabels,
	'supports' 				=> array( 'title', 'thumbnail'),
	'hierarchical' 			=> false,
	'public' 				=> false,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-clipboard',
	'show_in_nav_menus' 	=> true,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> false,
	'exclude_from_search' 	=> false,
	'publicly_queryable' 	=> true,
	'capability_type' 		=> 'post',
);
register_post_type( 'we_offer', $offerArgs );