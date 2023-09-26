<?php
$portfoliosLabels = array(
	'name' 					=> _x( 'Portfolio', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Portfolio', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Portfolio', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Portfolio', 'yudiz' ),
	'all_items' 			=> __( 'All Portfolios', 'yudiz' ),
	'view_item' 			=> __( 'View Portfolio', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Portfolio', 'yudiz' ),
	'add_new' 				=> __( 'Add New Portfolio', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Portfolio', 'yudiz' ),
	'update_item' 			=> __( 'Update Portfolio', 'yudiz' ),
	'search_items' 			=> __( 'Search Portfolio', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$portfoliosArgs = array(
	'label' 				=> __( 'Portfolio', 'yudiz' ),
	'description'			=> __( 'New Portfolio', 'yudiz' ),
	'labels' 				=> $portfoliosLabels,
	'supports' 				=> array( 'title', 'editor', 'thumbnail'),
	'hierarchical' 			=> false,
	'public' 				=> true,
	'show_ui' 				=> true,
	'show_in_menu' 			=> true,
	'menu_icon'           	=> 'dashicons-format-aside',
	'show_in_nav_menus' 	=> true,
	'show_in_admin_bar' 	=> true,
	'menu_position' 		=> 5,
	'can_export' 			=> true,
	'has_archive' 			=> true,
	'exclude_from_search' 	=> false,
	'publicly_queryable' 	=> true,
	'capability_type' 		=> 'post',
);
register_post_type( 'portfolio', $portfoliosArgs );

$portfoliosCatLabels = array(
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

$portfoliosCatArgs = array(
	'hierarchical' 			=> true,
	'labels' 				=> $portfoliosCatLabels,
	'show_ui' 				=> true,
	'show_admin_column' 	=> true,
	'query_var'				=> true,
	'rewrite' 				=> array( 'slug' => 'portfolios' ),
);

register_taxonomy( 'portfolio_categories', array( 'portfolio' ), $portfoliosCatArgs );