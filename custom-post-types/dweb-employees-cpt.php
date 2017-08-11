<?php


// Register the Employees custom post type
function dweb_register_employees_cpt() {	

	$labels = array(
		'name'                  => _x( 'Employes', 'Post Type General Name', 'dweb' ),
		'singular_name'         => _x( 'Employee', 'Post Type Singular Name', 'dweb' ),
		'menu_name'             => __( 'DWeb Employees', 'dweb' ),
		'name_admin_bar'        => __( 'DWeb Employee', 'dweb' ),
		'archives'              => __( 'Item Archives', 'dweb' ),
		'parent_item_colon'     => __( 'Parent Item:', 'dweb' ),
		'all_items'             => __( 'All Employees', 'dweb' ),
		'add_new_item'          => __( 'Add New Employee', 'dweb' ),
		'add_new'               => __( 'Add New Employee', 'dweb' ),
		'new_item'              => __( 'New Employee', 'dweb' ),
		'edit_item'             => __( 'Edit Employee', 'dweb' ),
		'update_item'           => __( 'Update Employee', 'dweb' ),
		'view_item'             => __( 'View Employee', 'dweb' ),
		'search_items'          => __( 'Search Employee', 'dweb' ),
		'not_found'             => __( 'Not found', 'dweb' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'dweb' ),
		'featured_image'        => __( 'Featured Image', 'dweb' ),
		'set_featured_image'    => __( 'Set featured image', 'dweb' ),
		'remove_featured_image' => __( 'Remove featured image', 'dweb' ),
		'use_featured_image'    => __( 'Use as featured image', 'dweb' ),
		'insert_into_item'      => __( 'Insert into item', 'dweb' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'dweb' ),
		'items_list'            => __( 'Items list', 'dweb' ),
		'items_list_navigation' => __( 'Items list navigation', 'dweb' ),
		'filter_items_list'     => __( 'Filter items list', 'dweb' ),
	);
	$args = array(
		'label'                 => __( 'Employee', 'dweb' ),
		'description'           => __( 'A post type for your Employees', 'dweb' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',		
	);
	register_post_type( 'dweb_employees', $args );

}
add_action( 'init', 'dweb_register_employees_cpt', 0 );


//Add Metaboxes for this custom post type
function dweb_create_options_employees_cpt(){

	$titan = TitanFrameWork::getInstance( 'dweb' );

	$box = $titan->createMetaBox( array(
	    'name' 		=> 'Employee Info',
	    'post_type' => 'dweb_employees'
	) );
	// Create an option inside the meta box above
	$box->createOption( array(
	    'name' => 'Employee Positon',
	    'id' => 'dweb_employee_position',
	) );

	$box->createOption( array(
	    'name' => 'Employee Twitter',
	    'id' => 'dweb_employee_twitter',
	) );

	$box->createOption( array(
	    'name' => 'Employee Facebook',
	    'id' => 'dweb_employee_fb',
	) );

	$box->createOption( array(
	    'name' => 'Employee Google Plus',
	    'id' => 'dweb_employee_gplus',
	) );

	$box->createOption( array(
	    'name' => 'Employee Linkedin',
	    'id' => 'dweb_employee_linkedin',
	) );

	
	$box->createOption( array(
	    'name' => 'Employee Link',
	    'id' => 'dweb_employee_link',
	    'desc' => 'Add a link here if you want the employee name to link somewhere.'
	) );

}	
add_action( 'tf_create_options', 'dweb_create_options_employees_cpt' );	