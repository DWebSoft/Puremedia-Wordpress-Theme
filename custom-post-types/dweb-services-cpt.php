<?php


// Register the Services custom post type
function dweb_register_service_cpt() {	

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'dweb' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'dweb' ),
		'menu_name'             => __( 'DWeb Services', 'dweb' ),
		'name_admin_bar'        => __( 'DWeb Service', 'dweb' ),
		'archives'              => __( 'Item Archives', 'dweb' ),
		'parent_item_colon'     => __( 'Parent Item:', 'dweb' ),
		'all_items'             => __( 'All Services', 'dweb' ),
		'add_new_item'          => __( 'Add New Service', 'dweb' ),
		'add_new'               => __( 'Add New Service', 'dweb' ),
		'new_item'              => __( 'New Service', 'dweb' ),
		'edit_item'             => __( 'Edit Service', 'dweb' ),
		'update_item'           => __( 'Update Service', 'dweb' ),
		'view_item'             => __( 'View Service', 'dweb' ),
		'search_items'          => __( 'Search Service', 'dweb' ),
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
		'label'                 => __( 'Service', 'dweb' ),
		'description'           => __( 'A post type for your Services', 'dweb' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-awards',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',		
	);
	register_post_type( 'dweb_services', $args );

}
add_action( 'init', 'dweb_register_service_cpt', 0 );


//Add Metaboxes for this custom post type
function dweb_create_options_service_cpt(){

	$titan = TitanFrameWork::getInstance( 'dweb' );

	$box = $titan->createMetaBox( array(
	    'name' 		=> 'Service Info',
	    'post_type' => 'dweb_services'
	) );
	// Create an option inside the meta box above
	$box->createOption( array(
	    'name' => 'Service icon',
	    'id' => 'dweb_service_icon',
	    'desc' => 'Example: <strong>fa-android</strong>. Full list of icons is <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">here</a>'
	) );

	$box->createOption( array(
	    'name' => 'Service link',
	    'id' => 'dweb_service_url',
	    'desc' => 'You can link your service to a page of your choice by entering the URL in this field'
	) );

}	
add_action( 'tf_create_options', 'dweb_create_options_service_cpt' );	