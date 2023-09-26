<?php
$caseStudyLabels = array(
	'name' 					=> _x( 'Case Study', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Case Study', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Case Study', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Case Study', 'yudiz' ),
	'all_items' 			=> __( 'All Case Study', 'yudiz' ),
	'view_item' 			=> __( 'View Case Study', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Case Study', 'yudiz' ),
	'add_new' 				=> __( 'Add New Case Study', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Case Study', 'yudiz' ),
	'update_item' 			=> __( 'Update Case Study', 'yudiz' ),
	'search_items' 			=> __( 'Search Case Study', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$caseStudyArgs = array(
	'label' 				=> __( 'Case Study', 'yudiz' ),
	'description'			=> __( 'New Case Study', 'yudiz' ),
	'labels' 				=> $caseStudyLabels,
	'rewrite' 				=> array( 'slug' => 'case-study' ),
	'supports' 				=> array( 'title', 'editor', 'thumbnail'),
	'hierarchical' 			=> true,
	'public' 				=> true,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-analytics',
	'show_in_nav_menus' 	=> true,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> true,
	'exclude_from_search' 	=> false,
	'publicly_queryable' 	=> true,
	'capability_type' 		=> 'post',
);
register_post_type( 'case-study', $caseStudyArgs );

$CaseStudyCatLabels = array(
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

$CaseStudyCatArgs = array(
	'hierarchical' 			=> true,
	'labels' 				=> $CaseStudyCatLabels,
	'show_ui' 				=> true,
	'show_admin_column' 	=> true,
	'query_var'				=> true,
	'rewrite' 				=> array( 'slug' => 'case-study-categories' ),
);

register_taxonomy( 'case-study-categories', array( 'case-study' ), $CaseStudyCatArgs );