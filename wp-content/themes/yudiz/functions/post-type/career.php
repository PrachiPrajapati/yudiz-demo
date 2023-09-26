<?php
$careerLabels = array(
	'name' 					=> _x( 'Career', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Career', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Career', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Career', 'yudiz' ),
	'all_items' 			=> __( 'All Career', 'yudiz' ),
	'view_item' 			=> __( 'View Career', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Career', 'yudiz' ),
	'add_new' 				=> __( 'Add New Career', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Career', 'yudiz' ),
	'update_item' 			=> __( 'Update Career', 'yudiz' ),
	'search_items' 			=> __( 'Search Career', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$careerArgs = array(
	'label' 				=> __( 'Career', 'yudiz' ),
	'description'			=> __( 'New Career', 'yudiz' ),
	'labels' 				=> $careerLabels,
	'supports' 				=> array( 'title', 'editor', 'thumbnail'),
	'hierarchical' 			=> false,
	'public' 				=> true,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-index-card',
	'show_in_nav_menus' 	=> true,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> true,
	'exclude_from_search' 	=> false,
	'publicly_queryable' 	=> true,
	'capability_type' 		=> 'post',
);
register_post_type( 'join-our-team', $careerArgs );

$joinOurTeamCatLabels = array(
	'name' 					=> _x( 'Categories', 'taxonomy general name', 'yudiz' ),
	'singular_name' 		=> _x( 'Category', 'taxonomy singular name', 'yudiz' ),
	'search_items' 			=> __( 'Search Category', 'yudiz' ),
	'all_items' 			=> __( 'All Categories', 'yudiz' ),
	'parent_item' 			=> __( 'Parent Category', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Category:', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Category', 'yudiz' ),
	'update_item' 			=> __( 'Update Category', 'yudiz' ),
	'add_new_item' 			=> __( 'Add New Category', 'yudiz' ),
	'new_item_name' 		=> __( 'New Category Name', 'yudiz' ),
	'menu_name' 			=> __( 'Categories', 'yudiz' ),
);

$joinOurTeamCatArgs = array(
	'hierarchical' 			=> true,
	'labels' 				=> $joinOurTeamCatLabels,
	'show_ui' 				=> true,
	'show_admin_column' 	=> true,
	'query_var'				=> true,
	'rewrite' 				=> array( 'slug' => 'join-our-team-category' ),
);

register_taxonomy( 'join-our-team-category', array( 'join-our-team' ), $joinOurTeamCatArgs );