<?php
$labels = array(
	'name' 					=> _x( 'Event', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Event', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Event', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Event', 'yudiz' ),
	'all_items' 			=> __( 'All Events', 'yudiz' ),
	'view_item' 			=> __( 'View Event', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Event', 'yudiz' ),
	'add_new' 				=> __( 'Add New Event', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Event', 'yudiz' ),
	'update_item' 			=> __( 'Update Event', 'yudiz' ),
	'search_items' 			=> __( 'Search Event', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$args = array(
	'label' 				=> __( 'Event', 'yudiz' ),
	'description'			=> __( 'New Event', 'yudiz' ),
	'labels' 				=> $labels,
	'supports' 				=> array( 'title', 'editor', 'thumbnail'),
	'hierarchical' 			=> false,
	'public' 				=> true,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-calendar-alt',
	'show_in_nav_menus' 	=> true,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> false,
	'exclude_from_search' 	=> false,
	'publicly_queryable' 	=> true,
	'capability_type' 		=> 'post',
);
register_post_type( 'event', $args );