<?php


if ( function_exists('siteorigin_panels_activate') ) {
	require get_template_directory() . "/widgets/dweb-title.php";
	require get_template_directory() . "/widgets/dweb-portfolio.php";
	require get_template_directory() . "/widgets/dweb-services.php";
	require get_template_directory() . "/widgets/dweb-employees.php";
	require get_template_directory() . "/widgets/dweb-recent-posts.php";
	require get_template_directory() . "/widgets/dweb-contact-form.php";
}

function dweb_widgets(){

	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'dweb' ),
		'id' => 'dweb-right-sidebar',
		'description' => __( 'Right Sidebar for theme DWeb', 'dweb' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
		) );

	register_sidebar(array(
		'name' => __('Footer Area 1'),
		'id' => 'dweb-footer1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		));

	register_sidebar(array(
		'name' => __('Footer Area 2'),
		'id' => 'dweb-footer2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		));
	
	register_sidebar(array(
		'name' => __('Footer Area 3'),
		'id' => 'dweb-footer3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		));

	//Register Widgets//Register the front page widgets
	if ( function_exists('siteorigin_panels_activate') ) {
		register_widget( 'DWeb_Title' );
		register_widget( 'DWeb_Portfolio' );
		register_widget( 'DWeb_Services' );
		register_widget( 'DWeb_Employees' );
		register_widget( 'DWeb_Recent_Posts' );
		register_widget( 'DWeb_Contact_Form' );
	}	
}


function widget_categories_args_filter( $cat_args ) {
	// $exclude_arr = array( 4 );
	
	// if( isset( $cat_args['exclude'] ) && !empty( $cat_args['exclude'] ) )
	// 	$exclude_arr = array_unique( array_merge( explode( ',', $cat_args['exclude'] ), $exclude_arr ) );
	// $cat_args['exclude'] = implode( ',', $exclude_arr );
	// return $cat_args;
	var_dump( $cat_args );
	die();
}
