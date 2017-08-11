<?php


// Register the Messages custom post type
function dweb_register_message_cpt() {	

	$labels = array(
		'name'                  => _x( 'Messages', 'Post Type General Name', 'dweb' ),
		'singular_name'         => _x( 'Message', 'Post Type Singular Name', 'dweb' ),
		'menu_name'             => __( 'DWeb Messages', 'dweb' ),
		'name_admin_bar'        => __( 'DWeb Message', 'dweb' ),
		'archives'              => __( 'Item Archives', 'dweb' ),
		'parent_item_colon'     => __( 'Parent Item:', 'dweb' ),
		'all_items'             => __( 'All Messages', 'dweb' ),
		'add_new_item'          => __( 'Add New Message', 'dweb' ),
		'add_new'               => __( 'Add New Message', 'dweb' ),
		'new_item'              => __( 'New Message', 'dweb' ),
		'edit_item'             => __( 'Edit Message', 'dweb' ),
		'update_item'           => __( 'Update Message', 'dweb' ),
		'view_item'             => __( 'View Message', 'dweb' ),
		'search_items'          => __( 'Search Message', 'dweb' ),
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
		'label'                 => __( 'Message', 'dweb' ),
		'description'           => __( 'A post type for your Messages', 'dweb' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-email-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',		
	);
	register_post_type( 'dweb_messages', $args );

}
add_action( 'init', 'dweb_register_message_cpt', 0 );


//Add Metaboxes for this custom post type
function dweb_create_options_message_cpt(){

	$titan = TitanFrameWork::getInstance( 'dweb' );

	$box = $titan->createMetaBox( array(
	    'name' 		=> 'Message Info',
	    'post_type' => 'dweb_messages'
	) );
	// Create an option inside the meta box above
	$box->createOption( array(
	    'name' => 'User Email Addess',
	    'id' => 'dweb_message_email',
	) );

}	
add_action( 'tf_create_options', 'dweb_create_options_message_cpt' );


//Manage Columns
function dweb_manage_dweb_messages_posts_columns( $Columns ){
	$new_columns 			= array();
	$new_columns['cb'] 		= '<input type="checkbox">';
	$new_columns['title'] 	= 'Full Name';
	$new_columns['email'] 	= 'Email';
	$new_columns['message'] = 'Message';
	$new_columns['date'] 	= 'Date';
	return $new_columns;
}
add_filter( 'manage_dweb_messages_posts_columns', 'dweb_manage_dweb_messages_posts_columns');	


//Manage the custom column look/content
function dweb_manage_dweb_messages_posts_custom_column( $column , $post_id ){
	switch ($column) {
		case 'message':
			echo get_the_excerpt();
			break;
		case 'email':
			$titan = TitanFrameWork::getInstance( 'dweb' );
			$email = $titan->getOption( 'dweb_message_email', $post_id );
			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
			break;	
	}
}
add_action( 'manage_dweb_messages_posts_custom_column', 'dweb_manage_dweb_messages_posts_custom_column', 10 ,2 );



add_shortcode( 'dweb_messages', 'dweb_messages_shortcode' );

function dweb_messages_shortcode( $atts ){

	$atts = shortcode_atts( array(
		'posts' => -1,
		'columns' => '2'
	), $atts);
	
	ob_start();	
	$query = new WP_Query( array(
        'post_type' => 'dweb_messages',
       	'post_status' => 'publish',
       	'posts_per_page' => $atts['posts']	
    ) );
	?>
	<div class="container">
		<div class="row">
			<?php	
		    if ( $query->have_posts() ) { ?>
		        <div class="<?php echo 'col-md-'.$atts['columns'];  ?>">
					
		            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

		   			<?php if ( has_post_thumbnail() ) : ?>
						<div class="thumbnail">
							<a title="" href="<?php esc_attr( the_permalink() ); ?>">
							<?php the_post_thumbnail(); ?>
							</a>
						</div>
					<?php endif; ?>

		   			<h1><a href="<?php esc_attr( the_permalink() ); ?>"><?php the_title(); ?></a></h1>
		            <p> <?php the_excerpt();?></p>
		            <p>
		            	<a href="<?php esc_attr( the_permalink() ); ?>">Read More</a>
		            </p>

		            <?php endwhile;

		            wp_reset_postdata(); ?>
		        </div>
		    <?php $myvariable = ob_get_clean();
		    return $myvariable;
		    }
		    ?>
    	</div><!-- end row -->
	</div><!--end container --	>
    <?php
}