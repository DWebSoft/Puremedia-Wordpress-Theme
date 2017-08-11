<?php

//Setup
add_theme_support( 'menus' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption') );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_image_size('dweb-work-thumb', 291);
add_image_size('dweb-large-thumb', 830);
//Includes
require_once( get_template_directory() . '/inc/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/inc/titan-framework-checker.php' );

include( get_template_directory() . '/inc/front/enqueue.php' );
include( get_template_directory() . '/inc/setup.php' );
include( get_template_directory() . '/inc/widgets.php' );
include( get_template_directory() . '/inc/custom-post-types.php' );
include( get_template_directory() . '/inc/options.php' );
include( get_template_directory() . '/inc/ajax.php' );
require( get_template_directory() . '/inc/front/styles.php' );
require( get_template_directory() . '/inc/page-builder.php' );

//Actions and filter hooks
add_action( 'tgmpa_register', 'dweb_recommend_plugin' );
add_action( 'wp_enqueue_scripts','dweb_enqueue');
add_action('after_setup_theme', 'dweb_setup_theme');
// add_filter('excerpt_more', 'remove_excerpt_more');
add_filter('excerpt_length', 'new_excerpt_length');
add_action( 'widgets_init', 'dweb_widgets');
add_filter( 'comment_form_fields', 'dweb_move_comment_field_to_bottom' );
add_filter( "comment_form_defaults", 'dweb_change_submit_to_button' );
add_action( 'tf_create_options', 'dweb_create_options' );
add_action( 'wp_ajax_dweb_save_user_contact_form', 'dweb_save_contact_form');
add_action( 'wp_ajax_dweb_save_user_contact_form', 'dweb_save_contact_form'); // For no privileges
//Show Custom Post Types in Archive Pages And Search Page
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

// Shortcodes

