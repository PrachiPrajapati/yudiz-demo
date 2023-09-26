<?php
$TestimonialLabels = array(
	'name' 					=> _x( 'Testimonial', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Testimonial', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Testimonial', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Testimonial', 'yudiz' ),
	'all_items' 			=> __( 'All Testimonial', 'yudiz' ),
	'view_item' 			=> __( 'View Testimonial', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Testimonial', 'yudiz' ),
	'add_new' 				=> __( 'Add New Testimonial', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Testimonial', 'yudiz' ),
	'update_item' 			=> __( 'Update Testimonial', 'yudiz' ),
	'search_items' 			=> __( 'Search Testimonial', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$TestimonialArgs = array(
	'label' 				=> __( 'Testimonial', 'yudiz' ),
	'description'			=> __( 'New Testimonial', 'yudiz' ),
	'labels' 				=> $TestimonialLabels,
	'supports' 				=> array( 'title', 'editor', 'thumbnail'),
	'hierarchical' 			=> false,
	'public' 				=> false,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-testimonial',
	'show_in_nav_menus' 	=> true,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> false,
	'exclude_from_search' 	=> true,
	'publicly_queryable' 	=> false,
	'capability_type' 		=> 'post',
);
register_post_type( 'testimonial', $TestimonialArgs );