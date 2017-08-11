<?php

function dweb_enqueue(){

	wp_register_style( 'dweb_style', get_stylesheet_uri() );
	wp_enqueue_style( 'dweb_style' );


	wp_register_style( 'dweb_base', get_template_directory_uri() . '/assets/css/base.css' );
	wp_enqueue_style( 'dweb_base' );

	wp_register_style( 'dweb_main', get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'dweb_main' );

	wp_register_style( 'dweb_media-queries', get_template_directory_uri() . '/assets/css/media-queries.css' );
	wp_enqueue_style( 'dweb_media-queries' );


	wp_register_script( 'dweb_modernizr', get_template_directory_uri() . '/assets/js/modernizr.js' );
	wp_enqueue_script( 'dweb_modernizr' );

	wp_register_script( 'dweb_flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array('jquery'), false, true );
	wp_enqueue_script( 'dweb_flexslider' );

	wp_register_script( 'dweb_fittext', get_template_directory_uri() . '/assets/js/jquery.fittext.js', array('jquery'), false, true );
	wp_enqueue_script( 'dweb_fittext' );

	wp_register_script( 'dweb_backstretch', get_template_directory_uri() . '/assets/js/backstretch.js', array('jquery'), false, true  );
	wp_enqueue_script( 'dweb_backstretch');

	wp_register_script( 'dweb_waypoints', get_template_directory_uri() . '/assets/js/waypoints.js', array('jquery'), false, true  );
	wp_enqueue_script( 'dweb_waypoints' );

	wp_register_script( 'dweb_main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), false, true  );
	wp_enqueue_script( 'dweb_main' );
}