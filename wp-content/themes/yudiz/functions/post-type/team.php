<?php
$teamLabels = array(
	'name' 					=> _x( 'Team', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Team', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Team', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Team', 'yudiz' ),
	'all_items' 			=> __( 'All Teams', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Team', 'yudiz' ),
	'add_new' 				=> __( 'Add New Team', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Team', 'yudiz' ),
	'update_item' 			=> __( 'Update Team', 'yudiz' ),
	'search_items' 			=> __( 'Search Team', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$teamArgs = array(
	'label' 				=> __( 'Team', 'yudiz' ),
	'description'			=> __( 'New Team', 'yudiz' ),
	'labels' 				=> $teamLabels,
	'supports' 				=> array( 'title', 'editor', 'thumbnail'),
	'hierarchical' 			=> false,
	'public' 				=> false,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-groups',
	'show_in_nav_menus' 	=> false,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> false,
	'exclude_from_search' 	=> false,
	'publicly_queryable' 	=> false,
	'capability_type' 		=> 'post',
	'query_var' => false
);
register_post_type( 'our-team', $teamArgs );

$teamCatLabels = array(
	'name' 					=> _x( 'Team Categories', 'taxonomy general name', 'emprende-latino' ),
	'singular_name' 		=> _x( 'Team Category', 'taxonomy singular name', 'emprende-latino' ),
	'search_items' 			=> __( 'Search Team Category', 'emprende-latino' ),
	'all_items' 			=> __( 'All Teams Categories', 'emprende-latino' ),
	'parent_item' 			=> __( 'Parent Team Category', 'emprende-latino' ),
	'parent_item_colon' 	=> __( 'Parent Team Category:', 'emprende-latino' ),
	'edit_item' 			=> __( 'Edit Team Category', 'emprende-latino' ),
	'update_item' 			=> __( 'Update Team Category', 'emprende-latino' ),
	'add_new_item' 			=> __( 'Add New Team Category', 'emprende-latino' ),
	'new_item_name' 		=> __( 'New Team Category Name', 'emprende-latino' ),
	'menu_name' 			=> __( 'Team Categories', 'emprende-latino' ),
);

$teamCatArgs = array(
	'hierarchical' 			=> true,
	'labels' 				=> $teamCatLabels,
	'show_ui' 				=> true,
	'show_admin_column' 	=> true,
	'query_var'				=> true,
	'rewrite' 				=> array( 'slug' => 'team_categories' ),
);

register_taxonomy( 'team_categories', array( 'our-team' ), $teamCatArgs );