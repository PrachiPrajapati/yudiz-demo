<?php
$logosLabels = array(
	'name' 					=> _x( 'Clients/Partners', 'Post Type General Name', 'yudiz' ),
	'singular_name' 		=> _x( 'Client/Partner', 'Post Type Singular Name', 'yudiz' ),
	'menu_name' 			=> __( 'Client/Partner', 'yudiz' ),
	'parent_item_colon' 	=> __( 'Parent Client/Partner', 'yudiz' ),
	'all_items' 			=> __( 'All Clients/Partners', 'yudiz' ),
	'view_item' 			=> __( 'View Client/Partner', 'yudiz' ),
	'add_new_item'			=> __( 'Add New Client/Partner', 'yudiz' ),
	'add_new' 				=> __( 'Add New Client/Partner', 'yudiz' ),
	'edit_item' 			=> __( 'Edit Client/Partner', 'yudiz' ),
	'update_item' 			=> __( 'Update Client/Partner', 'yudiz' ),
	'search_items' 			=> __( 'Search Client/Partner', 'yudiz' ),
	'not_found' 			=> __( 'Not Found', 'yudiz' ),
	'not_found_in_trash' 	=> __( 'Not found in Trash', 'yudiz' ),
); 
// Set other options for Custom Post Type 
$logosArgs = array(
	'label' 				=> __( 'Client/Partner', 'yudiz' ),
	'description'			=> __( 'New Client/Partner', 'yudiz' ),
	'labels' 				=> $logosLabels,
	'supports' 				=> array( 'title', 'thumbnail'),
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
	'exclude_from_search' 	=> true,
	'publicly_queryable' 	=> false,
	'capability_type' 		=> 'post',
);
register_post_type( 'clients-partners', $logosArgs );

$logosCatLabels = array(
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

$logosCatArgs = array(
	'hierarchical' 			=> true,
	'labels' 				=> $logosCatLabels,
	'show_ui' 				=> true,
	'show_admin_column' 	=> true,
	'query_var'				=> false,
	'rewrite' 				=> array( 'slug' => 'client_partner_categories' ),
);

register_taxonomy( 'client_partner_categories', array( 'clients-partners' ), $logosCatArgs );