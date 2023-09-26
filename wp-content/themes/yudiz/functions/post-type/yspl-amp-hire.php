<?php
$amp_data_lbl = array(
    'name'                => _x( 'HIRE FORM', 'Post Type General Name', 'yudiz' ),
    'singular_name'       => _x( 'HIRE FORM', 'Post Type Singular Name', 'yudiz' ),
    'menu_name'           => __( 'HIRE FORM', 'yudiz' ),
    'parent_item_colon'   => __( 'Parent HIRE FORM', 'yudiz' ),
    'all_items'           => __( 'All HIRE FORM', 'yudiz' ),
    'view_item'           => __( 'View HIRE FORM', 'yudiz' ),
    'add_new_item'        => __( 'Add New HIRE FORM', 'yudiz' ),
    'add_new'             => __( 'Add New', 'yudiz' ),
    'edit_item'           => __( 'Edit HIRE FORM', 'yudiz' ),
    'update_item'         => __( 'Update HIRE FORM', 'yudiz' ),
    'search_items'        => __( 'Search HIRE FORM', 'yudiz' ),
    'not_found'           => __( 'Not Found', 'yudiz' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'yudiz' ),
);
$amp_args = array(
    'label'               => __( 'HIRE FORM', 'yudiz' ),
    'description'         => __( 'Save hire form data', 'yudiz' ),
    'labels'              => $amp_data_lbl,
    'supports'            => array( 'title' ),
    'hierarchical'        => false,
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_icon'           => 'dashicons-media-spreadsheet',
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => false,
    'capability_type'     => 'post'
);
register_post_type( 'yswp_amp_data', $amp_args );	
function add_custom_meta_box() {
    add_meta_box("demo-meta-box", "Details", "custom_meta_box_markup", "yswp_amp_data", "advanced", "core", null);
}
add_action("add_meta_boxes", "add_custom_meta_box");
function custom_meta_box_markup($post_object) { 
    $data = unserialize( $post_object->post_content ); ?>
    <ul>
        <li><p><b> Name : </b> <?php echo $data['name'];  ?> </p></li>
        <li><p><b> Email : </b> <?php echo $data['email'];  ?> </p></li>
        <li><p><b> Phone : </b> <?php echo $data['phone'];  ?> </p></li>
        <li><p><b> Message : </b> <?php echo $data['message'];  ?> </p></li>
        <li><p><b> Ip Address : </b> <?php echo $data['ip'];  ?> </p></li>
    </ul>
<?php   
}